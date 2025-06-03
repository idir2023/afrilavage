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

    // Affiche les détails d'une commande
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admins.orders.show', compact('order'));
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
