<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('dashboards.admin');
        }
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}