<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Message;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.index', [
            'totalServices' => Service::count(),
            'totalContacts' => Message::count(),
            'totalOrders' => Order::count(),
            'totalNotifications' => Notification::count(),
        ]);
    }
}
