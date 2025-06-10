<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Service;

use Illuminate\Support\Facades\DB;
class MessageController extends Controller
{
        public function create()
    {
        return view('clients.contact');  // ou 'contact.blade.php' selon votre arborescence
    }
    /**
     * Stocke un nouveau message de contact.
     */
    public function store(Request $request)
    {
        // Validation des données

         dd(
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|in:service-information,order-question,price-quote,feedback,complaint,partnership,other',
            'message' => 'required|string',
            'privacy' => 'accepted',
        ]);

        // Enregistrement en base
        Message::create($data);

        // Si le formulaire est soumis via AJAX (fetch, axios…), on renvoie du JSON
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Votre message a bien été envoyé.',
            ]);
        }

        // Sinon on redirige et on stocke un flash message
        return redirect()
            ->back()
            ->with('success', 'Votre message a bien été envoyé. Nous vous répondrons bientôt.');
    }
}
