<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(){
        return view('admin.permissions.index');
    }
    public function store(Request $request){
    //     $role = $request->input('role'); // From dropdown
    //     $permissions = $request->input('permissions'); // From checkboxes
        
    //  //For debugging
    //  dd($role, $permissions);
    dd($request->all());
    }
}

