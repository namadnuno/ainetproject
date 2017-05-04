<?php

namespace App\Http\Controllers;

use App\Request;

class HomeController extends Controller
{

    /**
     * Página principal
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$pedidos = Request::done();
        return view('home', compact('pedidos'));
    }
}
