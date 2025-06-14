<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Message;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $myOrders = Order::where('user_id', Auth::id())->get();
        
        return view('admins.index', [
            'myOrders' => $myOrders,
            'totalServices' => Service::count(),
            'totalContacts' => Message::count(),
            'totalOrders' => Order::count(),
            'totalNotifications' => Notification::count(),
        ]);
    }
}
