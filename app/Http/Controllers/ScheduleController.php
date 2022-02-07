<?php

namespace App\Http\Controllers;

use App\Models\Clinc;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function index()
    {
        $clincs = Clinc::where('doctor', Auth::id())->get();
        $schedules = Schedule::with('clinc')->where('doctor', Auth::id())->orderBy("day")->orderBy("from")->get();

        return view('doctors.schedule')->with('clincs',$clincs)->with('schedules', $schedules);
    }
    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'clincs' => ['required', 'string', 'max:255'],
            'day' => ['required', 'string', 'max:255'],
            'from' => ['required',  'max:255'],
            'to' => ['required',  'max:255'],
        ])->validate();

        Schedule::create([
            'clinc' => $request['clincs'],
            'day' => $request['day'],
            'from' => $request['from'],
            'to' => $request['to'],
            'doctor' => Auth::id()
        ]);
        return redirect()->back()->with('success', 'تم تسجيل معاد العيادة');
    }
}
