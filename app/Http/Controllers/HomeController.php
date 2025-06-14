<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function contact()
    {
        return view('clients.contact');
    }

    public function about()
    {
        return view('clients.about');
    }

    public function service()
    {
        $services = Service::all();
        $categories = Category::all();

        return view('clients.services', compact('services', 'categories'));
    }


    public function order(Request $request)
    {
        $service = $request->query('service'); // récupère ?service=pack-premium
        $promo =  $request->query('promo');
        $services = Service::all();

        return view('clients.order', compact('service', 'services', 'promo'));
    }

    public function tracking()
    {
        return view('clients.tracking');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'zip' => 'required|string|max:10',
            'payment-method' => 'required|in:cash,mobile',
            'terms-agree' => 'required',

            // Conditional validation based on service type
            'pressing-type' => 'required_without_all:car-type,pack-type|in:standard,express,luxe',
            'car-type' => 'required_without_all:pressing-type,pack-type|in:exterior,interior,complete',
            'pack-type' => 'required_without_all:pressing-type,car-type|in:family,premium,business',

            'car-type-select' => 'required_with:car-type|in:city-car,sedan,suv,pickup',
            'pack-people' => 'required_with:pack-type|in:1-2,3-4,5+',
            'pack-frequency' => 'required_with:pack-type|in:once,weekly,biweekly,monthly',

            // 'item-name.*' => 'string|max:255',
            'item-qty.*' => 'integer|min:1',
        ]);

        // Determine service category and type based on request data
        $serviceCategory = 'pack'; // Default
        $serviceType = 'pack_family'; // Default

        if ($request->has('pressing-type')) {
            $serviceCategory = 'pressing';
            $serviceType = 'pressing_' . $request->input('pressing-type');
        } elseif ($request->has('car-type')) {
            $serviceCategory = 'car';
            $serviceType = 'car_' . $request->input('car-type');
        } elseif ($request->has('pack-type')) {
            $serviceCategory = 'pack';
            $serviceType = 'pack_' . $request->input('pack-type');
        }

        // Prepare items array for pressing service
        $items = [];
        if ($request->has('item-name') && $request->has('item-qty')) {
            $itemNames = $request->input('item-name', []);
            $itemQtys = $request->input('item-qty', []);

            foreach ($itemNames as $index => $itemName) {
                if (!empty($itemName)) {
                    $items[] = [
                        'name' => $itemName,
                        'quantity' => $itemQtys[$index] ?? 1
                    ];
                }
            }
        }

        // Prepare service options
        $serviceOptions = array_filter([
            'pressing_instructions' => $request->input('pressing-instructions'),
            'car_instructions' => $request->input('car-instructions'),
            'pack_instructions' => $request->input('pack-instructions')
        ]);

        // Calculate pricing (implement your pricing logic here)
        $basePrice = $this->calculateBasePrice($serviceCategory, $serviceType, $request);
        $optionsPrice = $this->calculateOptionsPrice($serviceOptions, $request);
        $totalPrice = $basePrice + $optionsPrice;

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => auth()->id() ?? null, // Handle guest orders
                'driver_id' => null, // Will be assigned later

                // Service details
                'service_category' => $serviceCategory,
                'service_type' => $serviceType,
                'status' => 'pending',

                // Customer information
                'fullname' => $request->input('fullname'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'zip' => $request->input('zip'),
                'delivery_instructions' => $request->input('delivery-instructions'),

                // Scheduling (you may want to add date/time fields to your form)
                'scheduled_date' => $request->input('scheduled_date', now()->addDay()),
                'time_slot' => $request->input('time_slot', '09:00-12:00'),

                // Service-specific details
                'items' => !empty($items) ? json_encode($items) : null,
                'service_options' => !empty($serviceOptions) ? json_encode($serviceOptions) : null,
                'special_instructions' => $request->input('pressing-instructions') ??
                    $request->input('car-instructions') ??
                    $request->input('pack-instructions'),

                // Car details (if applicable)
                'car_type' => $request->input('car-type-select'),
                'car_model' => $request->input('car-model'),

                // Pack details (if applicable)
                'pack_people' => $request->input('pack-people'),
                'pack_frequency' => $request->input('pack-frequency'),

                // Pricing
                'base_price' => $basePrice,
                'options_price' => $optionsPrice,
                'discount_amount' => 0,
                'total_price' => $request->input('total_price'),
                'promo_code' => $request->input('promo_code'),

                // Payment
                'payment_method' => $request->input('payment-method'),
                'payment_status' => 'pending'
            ]);

            if ($order) {
                // Créer une notification liée à la commande créée
                Notification::create([
                    'user_id' => auth()->id() ?? null, // ou $order->user_id si besoin
                    'order_id' => $order->id,
                    'type' => 'order_created',
                    'title' => 'Nouvelle commande créée',
                    'message' => 'Votre commande #' . $order->id . ' a été créée avec succès.',
                    'is_read' => false,
                ]);
            }

            DB::commit();

            // Return success response (for API)
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Order created successfully',
                    'order_id' => $order->id,
                    'data' => $order
                ], 201);
            }

            // Redirect for web requests
            // return redirect()->route('order')
            //     ->with('success', 'Order created successfully!');
            return redirect()->route('order')->with('success_data', [
                'order_id' => $order->id,
                'service_type' => $order->service_type,
                'scheduled_date' => $order->scheduled_date,
                'time_slot' => $order->time_slot,
                'total_price' => $order->total_price
            ]);
        } catch (\Exception $e) {
            DB::rollback();

            // Log the error
            \Log::error('Order creation failed: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'user_id' => auth()->id()
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to create order',
                    'error' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create order. Please try again.');
        }
    }

    /**
     * Calculate base price based on service type
     */
    private function calculateBasePrice($serviceCategory, $serviceType, Request $request)
    {
        // Implement your pricing logic here
        $prices = [
            'pressing_standard' => 25.00,
            'pressing_express' => 35.00,
            'pressing_luxe' => 50.00,
            'car_exterior' => 30.00,
            'car_interior' => 25.00,
            'car_complete' => 50.00,
            'pack_family' => 40.00,
            'pack_premium' => 60.00,
            'pack_business' => 80.00,
        ];

        return $prices[$serviceType] ?? 0;
    }

    /**
     * Calculate options price
     */
    private function calculateOptionsPrice($serviceOptions, Request $request)
    {
        // Implement your options pricing logic here
        $optionsPrice = 0;

        // Example: Add pricing for special instructions or options
        if (!empty($serviceOptions)) {
            $optionsPrice += 5.00; // Base charge for special instructions
        }

        return $optionsPrice;
    }
}
