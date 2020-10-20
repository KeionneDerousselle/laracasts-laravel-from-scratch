<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class UserNotificationsController extends Controller
{
    public function show()
    {
        $notifications = auth()->user()->unreadNotifications;
  
        DatabaseNotification::whereIn('id', $notifications->pluck('id'))->update(['read_at' => now()]);

        return view('notifications.show', [
            'notifications' => $notifications
        ]);
    }
}
