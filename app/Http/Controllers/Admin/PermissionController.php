<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        return view('admin.permissions.index');
    }
    
public function store(Request $request)
{
    $userId = $request->name;
    $submittedPermissions = $request->input('permissions', []);

    // Define your full list of modules and actions
    $modules = ['users', 'companies', 'vehicle', 'analytics', 'calendar', 'bookings', 'financial', 'clients', 'user_ip', 'blogs', 'activity_log'];
    $actions = ['view', 'add', 'edit', 'delete'];

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
        $role = $request->role;
        $usersList = User::where('role', $role)->get();
        // echo '<pre>';
        // print_r($usersList);
        $html = view('admin.permissions.includes.usersList', ['usersList' => $usersList, 'role' => $role ])->render();
        return response()->json([
            'status' => 'Success',
            'usersList' => $usersList,
            'html' => $html,
        ]);
    }

    public function getUserPermissions(Request $request){
        $userPermissions = Permission::where( 'user_id' , $request->selectedUserId)->get();
        $html = view('admin.permissions.includes.permissionsTable', ['userPermissions' => $userPermissions , 'user_id' => $request->selectedUserId] )->render();
        return response()->json([
            'status' => 'Success',
            'html' => $html,
        ]);
    }
}

