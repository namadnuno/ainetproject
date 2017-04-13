<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Mostra o perfil do user autenticado
     * @return Illuminate\Http\Request
     */
    public function index()
    {
        return view('perfil.index');
    }

    /**
     * Apresenta a página de edição do perfil
     * de um utilizador autenticado
     * @return Illuminate\Http\Request
     */
    public function edit()
    {
        return view('perfil.edit');
    }
    
    public function update(Request $request)
    {
        //@TODO
    }
}
