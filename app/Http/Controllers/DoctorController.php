<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

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

    public function showProfile($id)
    {
        return Doctor::find($id);
    }

    public function dashbordView(Request $request)
    {
        if ($request["specialty"] && $request["area"]) {
            
            $doctorsData =  Doctor::whereHas('clinc', function ($area) use ($request) {
                $area->where('area', $request["area"]);
            })->where('specialty', $request["specialty"])->get();
        
        } elseif ($request["specialty"]) {

            $doctorsData = Doctor::where('specialty', $request["specialty"])->get();
            
        } elseif ($request["area"]) {
            $doctorsData = Doctor::whereHas('clinc', function ($area) use ($request) {
                $area->where('area', $request["area"]);
            })->get();
        } else {
            $doctorsData = Doctor::get();
        }

        return view('users.dashboard')->with('doctors', $doctorsData);
    }
}
