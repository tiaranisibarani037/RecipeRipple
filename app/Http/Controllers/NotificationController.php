<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $unreads = Notification::where('user_id', Auth::id())->where('is_read', false)->get();
        $reads = Notification::where('user_id', Auth::id())->where('is_read', true)->get();
        $unreadNotificationsCount = $unreads->count();
        return view('notificationPage', compact('unreads', 'reads', 'unreadNotificationsCount'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->is_read = true;
        $notification->save();

        return redirect()->route('resep.show', ['id' => $notification->recipe_id]);
    }
}