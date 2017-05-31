<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Contrutor
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    const NUM_PER_PAGE = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::ofType(request('filter'))
        ->orderBy(
            request('orderby') ? request('orderby') : 'created_at',
            request('order') ? request('order') : 'DESC'
        )->paginate(static::NUM_PER_PAGE);

        return view('users.index', compact('users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAsGuest()
    {
        $users = User::active()->ofType(request('filter'))
        ->orderBy(
            request('orderby') ? request('orderby') : 'created_at',
            request('order') ? request('order') : 'DESC'
        )->paginate(static::NUM_PER_PAGE);

        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        return view('perfil.create', compact('user'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user', ['user' => $user]);
    }

    public function change()
    {
        $user = User::find(request('user_id'));
        $this->authorize('block', $user);
        if ($user->blocked == '1') {
            $user->blocked = 0;
        } else {
            $user->blocked = 1;
        }
        $user->save();
        return back()->with(
            'success',
            $user->blocked == '1' ? 'Bloquado' : 'Desbloqueado'
        );
    }

    public function changeTipoConta()
    {
        $user = User::find(request('user_id'));

        $this->authorize('changeTipoConta', $user);

        $user->admin = $user->admin == 1 ? 0 : 1;

        $user->save();
        return back()->with(
            'success',
            $user->admin == '1' ? 'Utilizador é agora Administrador' : 'Utilizador é agora Funcionário'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
