<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Permission;
use App\Models\company;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index($role){
       
        // $role = ($role === 'admin') ? 'admin' : 'company';
        if($role == 'admin'){
            $usersList = Employee::where('owner_user_id', auth()->id())->get();
        }
        elseif($role == 'company'){
            $usersList = company::all();
        }
        elseif($role == 'selfCompany'){
            $usersList = Employee::where('owner_user_id', auth()->id())->get();
        }
        return view('admin.permissions.index', compact('role', 'usersList'));
    }
    
public function store(Request $request)
{
    $userId = $request->name;
    
    $submittedPermissions = $request->input('permissions', []);
    $userRole = User::find($userId)?->role;
    $ownerUserId = Employee::where('e_user_id', $userId)->value('owner_user_id');
    $ownerRole = User::find($ownerUserId)?->role;
    
    if($userRole == 'admin' || $ownerRole == 'admin')
        $modules = ['users', 'companies', 'vehicle', 'brands', 'categories', 'features', 'models', 'locations', 'featured_vehicles', 'analytics', 'earning_summary', 'transaction_history', 'calendar', 'bookings', 'financial', 'clients', 'user_ip', 'blogs', 'activity_log', 'contacts', 'currencies'];
    else 
        $modules = ['vehicle', 'locations', 'featured_vehicles', 'analytics', 'calendar', 'bookings', 'financial', 'earning_summary', 'transaction_history', 'clients', 'activity_log',];
    $actions = ['view', 'edit'];

    foreach ($modules as $module) {
        foreach ($actions as $action) {
            $value = $submittedPermissions[$module][$action] ?? 0;

            // Look for existing permission
            $permission = Permission::where('user_id', $userId)
                ->where('module', $module)
                ->where('key', $action)
                ->first();

            if ($permission) {
                // Update if value changed
                if ($permission->value != $value) {
                    $permission->value = $value;
                    $permission->save();
                }
            } else {
                // Create only if checked (value == 1)
                if ($value) {
                    Permission::create([
                        'user_id' => $userId,
                        'module' => $module,
                        'key' => $action,
                        'value' => 1,
                    ]);
                }
            }
        }
    }

    return redirect()->back()->with('status', 'Permissions saved successfully.');
}

    public function selectedUsersList(Request $request){
        $usersList = Employee::where('owner_user_id', $request->selectedCompany)->get();
        $html = view('admin.permissions.includes.usersList', ['usersList' => $usersList ])->render();
        return response()->json([
            'status' => 'Success',
            'usersList' => $usersList,
            'html' => $html,
        ]);
    }

    public function getUserPermissions(Request $request){
        $userPermissions = Permission::where( 'user_id' , $request->selectedUserId)->get();
        $userRole = User::find($request->selectedUserId)?->role;
        $ownerUserId = Employee::where('e_user_id', $request->selectedUserId)->value('owner_user_id');
        $ownerRole = User::find($ownerUserId)?->role; 
        $html = view('admin.permissions.includes.permissionsTable', ['userPermissions' => $userPermissions , 'user_id' => $request->selectedUserId , 'user_role' => $userRole, 'ownerRole' => $ownerRole] )->render();
        return response()->json([
            'status' => 'Success',
            'html' => $html,
        ]);
    }
}

