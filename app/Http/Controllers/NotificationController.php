<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Affiche la liste des notifications.
     */
    public function index()
    {
        $notifications = Notification::latest()->paginate(10);
        return view('admins.notifications.index', compact('notifications'));
    }

    /**
     * Affiche une notification spécifique.
     */
    public function show($id)
    {
        $notification = Notification::findOrFail($id);
        return view('admins.notifications.show', compact('notification'));
    }

    /**
     * Supprime une notification.
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notification supprimée avec succès.');
    }

    /**
     * Marquer une notification comme lue (optionnel).
     */
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->is_read = true;
        $notification->save();

        return redirect()->back()->with('success', 'Notification marquée comme lue.');
    }
}
