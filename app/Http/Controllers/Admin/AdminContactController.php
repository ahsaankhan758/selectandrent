<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Auth;

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
    
        $contacts = Contact::whereIn('id', $request->selected_ids)->get(); // fetch first

        foreach ($contacts as $contact) {
            // save logs for each contact
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $description = $userName . ' Deleted [ Contact Email: ' . $contact->email . ' ] Successfully.';
            $action = 'Deleted';
            $module = 'Contact';
            activityLog($userId, $description, $action, $module);
        }

        // now delete them
        Contact::whereIn('id', $request->selected_ids)->delete();

        return redirect()->route('contact.received')->with('status', 'Selected contacts deleted successfully.');
    }

}
