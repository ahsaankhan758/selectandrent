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

    public function notificationView()
    {
        $user = auth()->user();

        $query = Notification::orderBy('created_at', 'desc');

        
        $query->where('to_user_id', $user->id);
        

        $notifications_data = $query->paginate(10);

        return view('admin.notifications.notification_view', compact('notifications_data'));
    }




    public function getNotifications()
    {
        $userId = auth()->id();

        $notifications_data = Notification::where('to_user_id', $userId)
            ->orderBy('created_at', 'desc')->paginate(10);

        $html = view('admin.notifications.notification', compact('notifications_data'))->render();

        return response()->json(['html' => $html]);
    }


}
