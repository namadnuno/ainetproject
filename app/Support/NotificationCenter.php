<?php

namespace App\Support;


use App\Notifications\NovoPedido;
use App\Request;
use App\User;

class NotificationCenter
{
    public static function sendNewRequestToAdmins(Request $request)
    {
        $admins = User::admins()->get();

        $admins->map(function ($user) use ($request) {
            $user->notify(new NovoPedido($request));
        });
    }
}