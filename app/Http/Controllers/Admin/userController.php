<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_user = Auth::id();
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.user.index', compact('users','current_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate all required fields at once
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];
        $user->password = $validatedData['password'];
        $user->save();
        // save logs
       $userId = Auth::id();
       $userName = Auth::user()->name;
       $desciption = $userName.' Created [ User Name '.$validatedData['name'].'] [User Email '.$validatedData['email'].'] Successfully.';
       $action = 'Create';
       $module = 'User';
       activityLog($userId, $desciption,$action,$module);
        return redirect()->route('users')->with('status','User Registered Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $current_user = Auth::id();
        $user = user::find($id);
        return view('admin.user.edit', compact('user','current_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        //$user->password = $validatedData['password'];
        //$user->phone = $validatedData['phone'];
        //$user->website = $validatedData['website'];
        $user->role = $validatedData['role'];
        $user->status = $request->input('status') == true ? '1' : '0';
        $user->update();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Updated [ User Name '.$validatedData['name'].'] [User Email '.$validatedData['email'].'] Successfully.';
        $action = 'Update';
        $module = 'User';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('users')->with('status', 'User Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if(isset($user->companies))
            {
                if($user->companies->exists())
                    {
                        return redirect()->route('users')-> with('statusDanger','Can Not Delete User. Please Delete Child Table Entries First To Delete User');
                    }
            }
        //$user->userIps()->delete();
        $user->delete();
        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Deleted [ User Name '.$user['name'].'] [User Email '.$user['email'].'] Successfully.';
        $action = 'Delete';
        $module = 'User';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('users')-> with('status','Company Data Deleted Successfully.');
    }
}
