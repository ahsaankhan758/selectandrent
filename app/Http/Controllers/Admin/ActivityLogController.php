<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Employee;
use Illuminate\Http\Request;
use Auth;

class ActivityLogController extends Controller
{
    public function index()
        {
            $query = ActivityLog::orderBy('created_at', 'desc');

            $loggedInUser = Auth::user();
            $owner = EmployeeOwner($loggedInUser->id);
            if ($loggedInUser->role === 'company') {
                $employeeUserIds = Employee::where('owner_user_id', $loggedInUser->id)
                    ->pluck('e_user_id');
                $allUserIds = $employeeUserIds->push($loggedInUser->id);
                $query = ActivityLog::whereIn('user_id', $allUserIds)
                    ->orderBy('created_at', 'desc');
            }elseif(isset($owner) && $owner->role === 'company' && $loggedInUser->role === 'employee'){
                $query->where('user_id', $loggedInUser->id);
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
