<?php

namespace App\Http\Controllers;

use App\Request;
use App\Departament;

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
        $departments = Departament::withCount(['users','requests'])->get();
        return view('home', compact('pedidos', 'departments'));
    }
}
