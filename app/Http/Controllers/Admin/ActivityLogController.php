<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
        {
            $activityLogs = ActivityLog::orderBy('created_at', 'desc')->paginate(10);
            return view('admin.activityLogs', compact('activityLogs'));
        }
    public function destroy(Request $request)
        {
            $request->validate([
                'activityLogs' => 'required|array',
                'activityLogs.*' => 'exists:activity_logs,id',
            ]);
        
            ActivityLog::whereIn('id', $request->activityLogs)->delete();
            return redirect()->route('activityLogs')->with('status','Activity Logs Deleted Successfully.');
        }
}
