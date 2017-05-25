<?php

namespace App\Policies;

use App\User;
use App\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestPolicy
{
    use HandlesAuthorization;

    /**
     *  Determina se o utilizador pode ver
     *  todos os pedidos da plataforma
     * @param  User   $user
     * @return mixed
     */
    public function administrate(User $user)
    {
        return $user->isAdmin();
    }
}
