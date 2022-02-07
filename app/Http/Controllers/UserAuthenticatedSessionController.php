<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticatedSessionController extends Controller
{

    public function registerView()
    {
        return view('users.register');
    }

    public function loginView()
    {
        return view('users.login');
    }

    public function profileView(Request $request)
    {
        // dd($request->user());
        return view('users.profile', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }

    public function profileImgUpdate(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        Auth::user()->deleteProfilePhoto();
        $imageName = time() . '.' . $request->image->extension();

        if ($request->image->storeAs('public/profile-photos/', $imageName)) {

            $userDetails = Auth::user();
            $user = User::find($userDetails->id);
            $user->profile_photo_path = 'profile-photos/' . $imageName;
            $user->save();
        }

        return back();
    }

    public function profileImgDelete(Request $request)
    {
        Auth::user()->deleteProfilePhoto();
        return back();
    }
}
