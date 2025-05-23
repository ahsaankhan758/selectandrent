<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    //
    public function markAsRead($id)
    {
        $notification = Notification::where('id', $id)->where('to_user_id', auth()->id())->first();
        if ($notification) {
            $notification->update(['status' => 1]);
        }
        return back();
    }

    public function clear()
    {
        Notification::where('to_user_id', auth()->id())->update(['status' => 1]);
        return back();
    }

    public function index()
    {
        $notifications = Notification::where('to_user_id', auth()->id())
                                    ->latest()
                                    ->paginate(20);
        return view('notifications.index', compact('notifications'));
    }

    public function getNotifications()
    {
        $userId = auth()->id();

        $notifications = Notification::where('to_user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $html = view('admin.notifications.notification', compact('notifications'))->render();

        return response()->json(['html' => $html]);
    }


}
