<?php

namespace Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function showDashboard()
    {
        return view('Dashboard::main');
    }
    public function handlePost(){

        return redirect()->route('dashboard')->withInput();
    }
}
