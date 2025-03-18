<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\IP_Address;
use Illuminate\Support\Facades\Auth;

class IP_AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_user = Auth::id();
        $current_user_ip = request()->ip();
        //$public_ip = Http::get('https://api.ipify.org')->body();
        $internet_ip = file_get_contents('https://api.ipify.org');
        $all_IP = IP_Address::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.ip_address.index', compact('current_user_ip','internet_ip', 'all_IP', 'current_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ip_address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ip_address' => 'required|ip|unique:ip_address',
        ]);
        $ipAddress = new IP_Address;
        $ipAddress->ip_address = $validatedData['ip_address'];
        $ipAddress->user_name = $request['user_name'];
        $ipAddress->save();
        // Save Logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Created [ IP Address '.$validatedData['ip_address'].'] Successfully.';
        $action = 'Create';
        $module = 'IP Address';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('ipAddresses')->with('status','Ip Address Successfully Added.');
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
        $ip_address = IP_Address::find($id);
        return view('admin.ip_address.edit', compact('ip_address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'ip_address' => 'required|ip',
        ]);
        $ip_address = IP_Address::find($id);
        $ip_address->ip_address = $validatedData['ip_address'];
        $ip_address->update();
        // Save Logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Updated [ IP Address '.$validatedData['ip_address'].'] Successfully.';
        $action = 'Update';
        $module = 'IP Address';
        activityLog($userId, $desciption,$action,$module);
        return redirect('ipAddresses')->with('status', 'IP_Address Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ipAddress = IP_Address::find($id);
        $ipAddress->delete();
        // Save Logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Deleted [ IP Address '.$ipAddress->ip_address.'] Successfully.';
        $action = 'Delete';
        $module = 'IP Address';
        activityLog($userId, $desciption,$action,$module);
        return redirect()->route('ipAddresses')->with('status', 'IP_Address Deleted Successfully.');
    }
}
