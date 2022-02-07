<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $reservationData =  Reservation::with('clinc')->with('doctor')->with('schedules')->with('user')->where('doctor', Auth::id())->orderBy("states")->get();
        return view('doctors.dashboard')->with('reservationdata', $reservationData);
    }
    public function profileView(Request $request)
    {
        // dd($request->user());
        return view('doctors.profile', [
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
            $user = Doctor::find($userDetails->id);
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
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
        ]);

        $userDetails = Auth::user();
        $user = Doctor::find($userDetails->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return back();
    }
}
