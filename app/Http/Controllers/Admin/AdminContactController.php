<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{


public function received()
{
    $contacts = Contact::whereIn('status', [0, 1])
                       ->orderBy('id', 'desc')
                       ->paginate(10);

    return view('admin.contact.received', compact('contacts'));
}


    public function delete(Request $request)
    {
        $request->validate([
            'selected_ids' => 'required|array',
            'selected_ids.*' => 'exists:contacts,id', 
        ]);
    
        Contact::whereIn('id', $request->selected_ids)->delete();
    
        return redirect()->route('contact.received')->with('status', 'Selected contacts deleted successfully.');
    }

}
