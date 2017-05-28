<?php

namespace App\Http\Controllers;

use App\Mail\ActivationMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ActivationController extends Controller
{

    /**
     * Ativa o utilizador dado um token por request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activate()
    {
        $this->validate(request(), [
            'token' => 'required'
        ]);

        $user = User::where('remember_token', request('token'))->first();

        if(!$user->can('activation', $user) || !$user) {
            abort(404);
        }

        $user->activated = 1;

        $user->save();

        return view('activated');
    }

    /**
     * Verifica apresenta a view de não ativação
     * se for dado o token completa logo o form
     * @param null $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function notActivated($token = null)
    {
        $this->authorize('ressendActivation', auth()->user());

        return view('not-activated', compact('token'));
    }

    /**
     * Envia por mail o código de ativcação
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(User $user)
    {
        $this->authorize('ressendActivation', auth()->user());

        auth()->user()->remember_token = str_random(10);

        auth()->user()->save();

        Mail::to(auth()->user())->send(new ActivationMail(auth()->user()));

        return redirect()->route('not-activated', ' ');
    }
}
