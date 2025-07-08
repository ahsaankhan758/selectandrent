<?php

namespace App\Http\Controllers\Admin;
use App\Models\PaymentGateways;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminPaymentGateways extends Controller
{
    public function index()
    {
        $gateways = PaymentGateways::orderBy('name')->get();
        return view('admin.payment_gateways.payment_gateways', compact('gateways'));
    }

    public function getGateway($id)
    {
        $gateway = PaymentGateways::find($id);

        if ($gateway) {
            return response()->json($gateway);
        }

        return response()->json(['error' => 'Not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $gateway = PaymentGateways::find($id);
        
        if ($gateway) {
            $gateway->update([
                'c1' => $request->c1,
                'c2' => $request->c2,
                'c3' => $request->c3,
                'c4' => $request->c4,
                'c5' => $request->c5,
                'dev' => $request->dev,
                'dev_endpoint' => $request->dev_endpoint,
                'pro_endpoint' => $request->pro_endpoint,
            ]);
            // save logs
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $desciption = $userName.' Updated [ Payment Gateway Name: '.$gateway->name.' ] Successfully.';
            $action = 'Update';
            $module = 'Payment Gateway';
            activityLog($userId, $desciption,$action,$module);
            return response()->json(['success' => 'Payment gateway updated successfully!']);
        }

        return response()->json(['error' => 'Payment gateway not found!'], 404);
    }

    public function storeGatewayName(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    PaymentGateways::create([
        'name' => $request->name,
        'c1' => null,
        'c2' => null,
        'c3' => null,
        'c4' => null,
        'c5' => null,
        'dev' => 0,
        'dev_endpoint' => null,
        'pro_endpoint' => null,
    ]);

    // save logs
    $userId = Auth::id();
    $userName = Auth::user()->name;
    $desciption = $userName.' Created [ Payment Gateway Name: '.$request->name.' ] Successfully.';
    $action = 'Create';
    $module = 'Payment Gateway';
    activityLog($userId, $desciption,$action,$module);

    return response()->json(['success' => 'Payment Gateway created successfully.']);
}


}
