<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $owner = EmployeeOwner(auth()->id());
        $query = Reminder::orderby('created_at','desc');
        if ($user->role === 'company' || ($owner && isset($owner->role) && $owner->role === 'company')) {
            $query->where('user_id', $owner?->id ?? $user->id);
        }
        $reminders = $query->paginate(10);
        return view('admin.reminder.reminder', compact('reminders'));
    }

    public function create()
    {
        return view('admin.reminder.create');
    }

    public function store(Request $request)
     {
        $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        ]);

        Reminder::create([
        'name' => $request->name,
        'description' => $request->description,
        'status' => 1,
        'user_id' => auth()->id(),
        ]);

        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Created Reminder [ Name: '.$request->name.' ] Successfully.';
        $action = 'Create';
        $module = 'Reminder';
        activityLog($userId, $desciption,$action,$module);

        return redirect()->route('reminder')->with('success', 'Reminder created successfully.');
     }

     public function edit($id)
      {
        $reminder = Reminder::findOrFail($id);
        return view('admin.reminder.edit', compact('reminder'));
      }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $reminder = Reminder::findOrFail($id);
        $reminder->name = $request->name;
        $reminder->description = $request->description;
        $reminder->save();

        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Updated Reminder [ Name: '.$request->name.' ] Successfully.';
        $action = 'Update';
        $module = 'Reminder';
        activityLog($userId, $desciption,$action,$module);

        return redirect()->route('reminder')->with('success', 'Reminder updated successfully!');
    }

    public function destroy($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();

        // save logs
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $desciption = $userName.' Deleted Reminder [ Name: '.$reminder->name.' ] Successfully.';
        $action = 'Delete';
        $module = 'Reminder';
        activityLog($userId, $desciption,$action,$module);

        return redirect()->route('reminder')->with('success', 'Reminder deleted successfully!');
    }

}
