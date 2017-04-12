<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * The Home of the project
     */
    public function index()
    {
        return view('home');
    }
}
