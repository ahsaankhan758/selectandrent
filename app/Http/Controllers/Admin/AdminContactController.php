<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{

    public function received()
    {
        $contacts = Contact::where('status', 1)
                           ->latest()
                           ->paginate(10);

        return view('admin.contact.received', compact('contacts'));
    }

    public function failed()
    {
        $failedContacts = Contact::where('status', 0)
                                 ->latest()
                                 ->paginate(10);

        return view('admin.contact.failed', compact('failedContacts'));
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

    public function deleteFailed(Request $request)
{
    $request->validate([
        'selected_ids' => 'required|array',
        'selected_ids.*' => 'exists:contacts,id',
    ]);

    Contact::whereIn('id', $request->selected_ids)->delete();

    return redirect()->route('contact.failed')->with('status', 'Selected failed contacts deleted successfully.');
}

    
    

}
