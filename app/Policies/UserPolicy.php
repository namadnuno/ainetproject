<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determina se user pode bloquear outro
     *
     * @param \App\Policies\User $user
     * @param \App\Policies\User $userModel
     * @return bool
     */
    public function block(User $user, User $userModel)
    {
        return $user->isAdmin() && $user->id != $userModel->id;
    }
}
