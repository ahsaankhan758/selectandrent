<?php

namespace App\Http\Controllers\website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EditProfileController extends Controller
{
    public function editProfile($id)
    {
        if (Auth::id() != $id) {
            abort(403, 'Unauthorized action.');
        }

        $user = User::findOrFail($id);
        return view('website.edit_profile', compact('user'));
    }


    public function updateProfile(Request $request, $id)
{
    if (Auth::id() != $id) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        // 'email' => 'required|email',
        'phone' => 'nullable|string|max:20',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    // $user->email = $request->email;
    $user->phone = $request->phone;

    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('frontend-assets/assets/profile'), $imageName);
        $user->profile_image = 'frontend-assets/assets/profile/' . $imageName;
    }

    $user->save();

    return redirect()->route('website.edit_profile', $id)->with('success', 'Profile updated successfully!');
}

}

