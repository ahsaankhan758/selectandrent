<?php

use Illuminate\Support\Facades\File;
use App\Models\Notification;
use Illuminate\Support\Carbon;

if (!function_exists('saveNotification')) {

    function saveNotification($notificationType, $fromUserId, $toUserId, $userId, $message = '', $status = 0)
    {
        return Notification::create([
            'type'              => $notificationType,
            'from_user_id'      => $fromUserId,
            'to_user_id'        => $toUserId,
            'user_id'           => $userId,
            'text'              => $message,
            'status'            => $status,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
    }

}
?>