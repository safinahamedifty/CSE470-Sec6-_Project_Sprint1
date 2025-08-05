<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppliedJobsController extends Controller
{
    public function index()
    {
        return view('applied-jobs.dashboard');
    }
}