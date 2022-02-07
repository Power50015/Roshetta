<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        Reservation::create([
            'user' => Auth::id(),
            'doctor' => $request['doctor'],
            'clinc' => $request['clinc'],
            'schedules' => $request['schedules'],
            'states' => '0' // 0 wating 1 done 2 cancled
        ]);
        return redirect()->route('reservation')->with('success', 'تم تسجيل معاد ');
    }
    public function UserReservation()
    {
        $reservationData =  Reservation::with('clinc')->with('doctor')->with('schedules')->with('user')->where('user', Auth::id())->get();
        return view('users.reservation')->with('reservationdata', $reservationData);
    }
    public function update(Request $request)
    {
        $reservation = Reservation::find($request['id']);
        $reservation->states = $request['states'];
        $reservation->save();

        return back();
    }
}
