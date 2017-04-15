<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PerfilRequest;

class PerfilController extends Controller
{

    /**
     * Repositório
     * @var User
     */
    private $repo;

    /**
     * Contrutor com dependency injection
     * @param User $repo
     */
    public function __construct(User $repo)
    {
        $this->repo = $repo;
    }

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

    public function update(PerfilRequest $request)
    {
        $user = $this->repo->find(auth()->user()->id);

        if ($request->hasFile('profile_photo')) {
            $user->profile_photo =  $request->profile_photo->move(public_path('profile_photo'), 'profile_photo-' . $user->id . '.' . $request->profile_photo->extension());
        }

        if (!$request->password == '') {
            $user->password = Hash::make($request->password);
        } else {
            unset($request['password']);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->profile_url = $request->profile_url;
        $user->presentation = $request->presentation;
        $user->save();

        return back();
    }
}
