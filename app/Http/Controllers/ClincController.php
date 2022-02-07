<?php

namespace App\Http\Controllers;

use App\Models\Clinc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClincController extends Controller
{
    public function index()
    {
        return view('doctors.clinc')->with('clincs', Clinc::where('doctor', Auth::id())->get());
    }
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'address' => ['required', 'string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],
        ])->validate();

        Clinc::create([
            'address' => $request['address'],
            'area' => $request['area'],
            'doctor' => Auth::id()
        ]);
        return redirect()->back()->with('success', 'تم تسجيل العيادة');
    }
}
