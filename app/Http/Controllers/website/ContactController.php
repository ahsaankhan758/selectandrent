<?php

namespace App\Http\Controllers\website;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactView(){
        return view('website.contact');
    }

    // public function submit(Request $request)
    // {
    //     $validated = $request->validate([
    //         'first_name' => 'required|string|max:255',
    //         'last_name'  => 'required|string|max:255',
    //         'email'      => 'required|email',
    //         'phone'      => 'required|string|max:20',
    //         'message'    => 'required|string',
    //     ]);
    
    //     $contact = new Contact($validated);
    //     $contact->status = 0;
    //     $contact->save();
    
    //     try {
    //         Mail::to('farhan.nisar24@gmail.com')->send(new ContactFormMail($validated));
    //         $contact->status = 1;
    //         $contact->save();
    
    //         return response()->json([
    //             'status' => true,
    //             'message' => 'Your message has been sent successfully!',
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Message could not be sent. Please try again later.',
    //         ], 500);
    //     }
    // }
    public function submit(Request $request)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'email'      => 'required|email',
        'phone'      => 'required|string|max:20',
        'message'    => 'required|string',
        'subject' => 'required|string',
    ]);

    $contact = new Contact($validated);
    $contact->status = 0;
    $contact->save();

    try {
        Mail::to('farhan.nisar24@gmail.com')->send(new ContactFormMail($validated));

        $contact->status = 1;
        $contact->save();

        $userId = Auth::id();
        $userName = Auth::user()->name ?? 'Guest';
        $description = $userName . ' submitted a contact form [ Name: ' . $contact->first_name . ' ' . $contact->last_name . ' ] [ Email: ' . $contact->email . ' ]';
        $action = 'Submit Contact form';
        $module = 'Contact';
        activityLog($userId, $description, $action, $module);

        return response()->json([
            'status' => true,
            'message' => 'Your message has been sent successfully!',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Message could not be sent. Please try again later.',
        ], 500);
    }
}
}
