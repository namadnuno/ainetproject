<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ActivationController extends Controller
{
    public function activate($token)
    {
        $blockedUsers = User::active()->get();

        foreach ($blockedUsers as $user) {
            dd(serialize($user->toArray()));
            if (Hash::check(serialize($user->toArray()), $token)) {
                dd('done');
            }
        }
    }
}
