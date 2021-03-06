<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user.blocked', 'user.ativated']);
    }

    /**
     * Dashboard
     * @return \Illuminate\Http\Request
     */
    public function index()
    {
        return view('dashboard');
    }
}
