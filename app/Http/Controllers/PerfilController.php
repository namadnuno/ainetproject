<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class PerfilController extends Controller
{

    /**
     * Contrutor com dependency injection
     */
    public function __construct()
    {
        $this->middleware('web');
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
        $user = auth()->user();
        return view('perfil.edit', compact('user'));
    }

    public function update(PerfilRequest $request)
    {
        $user = User::find(auth()->user()->id);

        $user->profile_photo = $this->storePerfilPhoto($request);
        
        if (!$request->password == '') {
            $user->password = Hash::make($request->password);
        }

        $user->fill(
            request([
                'name', 'email', 'phone', 'profile_url', 'presentation', 'department_id'
            ])
        );
        
        $user->save();

        return redirect()->route('perfil.index')->with('success', 'Perfil Alterado!');
    }

    public function storeAsAdmin(PerfilRequest $request)
    {
        $user = new User();
        
        $user->password = Hash::make($request->password);
        
        $user->blocked = 0;

        $user->admin = 0;

        $user->print_evals = 0;

        $user->print_counts = 0;

        $user->profile_photo = $this->storePerfilPhoto($request);
        
        $user->fill(
            request([
                'name', 'email', 'phone', 'profile_url', 'presentation', 'department_id'
            ])
        );
        
        $user->save();

        return redirect()->route('users.index')->with('success', 'Perfil Criado!');
    }

    /**
     * Guarda a foto de perfil
     * @param  Illuminate\Http\Request $request
     * @return string Nome da imagem
     */
    private function storePerfilPhoto($request)
    {
        if ($request->hasFile('profile_photo')) {
            $filename = Uuid::uuid1()->toString() . '.' . $request->profile_photo->extension();

            $request->profile_photo->storeAs('/public/profiles/', $filename);
            
            return $filename;
        }

        return null;
    }
}
