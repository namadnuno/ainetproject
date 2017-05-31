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

    /**
     * Determina se um utilizador pode reenviar o código de ativação
     * @param User $user
     * @param User $userModel
     * @return bool
     */
    public function ressendActivation(User $user, User $userModel)
    {
        return !$userModel->isActivated();
    }

    /**
     * Determina se um utilizador se pode ativar
     * @param User $user
     * @param User $userModel
     * @return bool
     */
    public function activation(User $user, User $userModel)
    {
        return !$userModel->isActivated();
    }

    /**
     * Determina se um utilizador pode ou não ver as notificações
     * @param User $user
     * @return bool
     */
    public function notifications(User $user, User $userModel)
    {
        return $user->isAdmin();
    }

    public function changeTipoConta(User $user, User $userModel)
    {
        return $user->isAdmin() && $user->id != $userModel->id;
    }
}
