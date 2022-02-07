<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function showProfile($id)
    {
        $doctor = Doctor::find($id);
        $schedules = Schedule::with('clinc')->where('doctor', $id)->orderBy("day")->orderBy("from")->get();
        return view('users.doctorprofile')->with('doctor', $doctor)->with('schedules', $schedules);
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
