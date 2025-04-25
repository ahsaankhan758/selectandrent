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
    
    // public function store(Request $request)
    // {
    //     $permissions = $request->input('permissions', []);

    //     foreach ($permissions as $module => $actions) {
    //         foreach ($actions as $action => $value) {
    //             if ($value) {
    //                 Permission::create([
    //                     'user_id' => $request->name,
    //                     'module' => $module,
    //                     'key' => $action,
    //                     'value' => 1,
    //                 ]);
    //             }
    //         }
    //     }
    
    //     return redirect()->back()->with('status', 'Permissions saved successfully.');    
    // }

    public function store(Request $request)
{
    $permissions = $request->input('permissions', []);
    $userId = $request->name; // Make sure this is user_id, not just name

    foreach ($permissions as $module => $actions) {
        foreach ($actions as $action => $value) {
            // Check if a permission entry already exists
            $existing = Permission::where('user_id', $userId)
                ->where('module', $module)
                ->where('key', $action)
                ->first();

            if ($existing) {
                // Update only if the value has changed
                if ($existing->value != $value) {
                    $existing->value = $value;
                    $existing->save();
                }
            } else {
                // Create new permission if it doesn't exist and value is 1
                if ($value == 1) {
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

    return redirect()->back()->with('status', 'Permissions updated successfully.');
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

