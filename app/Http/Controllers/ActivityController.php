<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivity;

class ActivityController extends Controller
{
public function trackClick(Request $request)
{
    try {
        $browser = $request->input('browser') ?? $request->header('User-Agent');

        UserActivity::create([
            'ip_address' => $request->ip(),
            'browser' => $browser,
            'url' => $request->input('current_url'),
            'user_id' => Auth::check() ? Auth::id() : null,
            'method' => 'click',
            'referrer' => $request->headers->get('referer'),
            'action_type' => 'click',
            'element_clicked' => $request->input('element_clicked'),
        ]);
    } catch (\Exception $e) {
        \Log::error('UserActivity error: ' . $e->getMessage());
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }

    return response()->json(['status' => 'success']);
}

}
