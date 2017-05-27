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
    public function administrate($user)
    {
        return true;
    }
    /**
     * Determine whether the user can update the request.
     *
     * @param  \App\User  $user
     * @param  \App\Request  $request
     * @return mixed
     */
    public function update(User $user, Request $request)
    {
        return $request->owner_id == $user->id;
    }

     /**
      * Determine whether the user can delete the request.
      *
      * @param  \App\User  $user
      * @param  \App\Request  $request
      * @return mixed
      */
    public function delete(User $user, Request $request)
    {
        return $request->owner_id == $user->id || $user->isAdmin();
    }

    public function evaluate(User $user, Request $request)
    {
        return $request->owner_id == $user->id;
    }
}
