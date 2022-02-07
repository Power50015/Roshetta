<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function indexView()
    {
        if (Auth::guard('doctor')->check())
            return redirect()->route('doctor.dashboard');
        elseif (Auth::guard('web')->check())
            return redirect()->route('dashboard');
        else
            return view('index');
    }
}
