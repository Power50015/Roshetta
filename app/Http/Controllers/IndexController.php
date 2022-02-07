<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function indexView()
    {
        if (Auth::guard('doctor')->check())
            return redirect()->route('doctor.dashboard');
        elseif (Auth::guard('doctor')->check())
            return redirect()->route('users.dashboard');
        else
            return view('index');
    }
}
