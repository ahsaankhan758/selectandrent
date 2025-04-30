<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Auth;

class ActivityLogController extends Controller
{
    public function index()
        {
            $query = ActivityLog::orderBy('created_at', 'desc');
    
            if (Auth::user()->role === 'company') {
                $query->where('user_id', Auth::id());
            }
        
            $activityLogs = $query->paginate(20);
        
            return(view('admin.activityLogs', compact('activityLogs')));
            // $activityLogs = ActivityLog::orderBy('created_at', 'desc')->paginate(10);
            // return view('admin.activityLogs', compact('activityLogs'));
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
