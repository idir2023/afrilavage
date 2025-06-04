<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Affiche la liste paginée des commandes
    public function index()
    {
        $orders = Order::paginate(15); // 15 commandes par page
        return view('admins.orders.index', compact('orders'));
    }


    public function show($id)
    {
        $order = Order::findOrFail($id);

        // Réponse uniquement en AJAX avec HTML directement ici
        if (request()->ajax()) {
            $html = '
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr><th>ID</th><td>' . $order->id . '</td></tr>
                <tr><th>Client</th><td>' . ($order->user->username ?? 'N/A') . '</td></tr>
                <tr><th>Service</th><td>' . ucfirst($order->service_type) . '</td></tr>
                <tr><th>Date prévue</th><td>' . \Carbon\Carbon::parse($order->scheduled_date)->format('d/m/Y') . '</td></tr>
                <tr><th>Créneau horaire</th><td>' . $order->time_slot . '</td></tr>
                <tr><th>Status</th><td>' . ucfirst($order->status) . '</td></tr>
                <tr><th>Total</th><td>' . number_format($order->total_price, 2, ',', ' ') . ' €</td></tr>
            </table>
        </div>';

            return response()->json(['html' => $html]);
        }

        // Si jamais une requête non-AJAX est envoyée
        abort(404);
    }



    // Supprime une commande
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Commande supprimée avec succès.');
    }

    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->is_read = true;
        $notification->save();

        return response()->json(['success' => true]);
    }
}
