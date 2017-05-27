<?php

namespace App\Policies;

use App\User;
use App\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestPolicy
{
    use HandlesAuthorization;


    /**
     * Determina se um user poder ver um pedido
     *
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function show(User $user, Request $request)
    {
        return ($request->owner_id == $user->id || $user->isAdmin());
    }

    /**
     * Determina se um user poder fazer download do ficheiro do request
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function download(User $user, Request $request)
    {
        return ($request->owner_id == $user->id || $user->isAdmin());
    }


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
 * Determina se um user poder readmitir um pedido
 * @param User $user
 * @param Request $request
 * @return bool
 */
    public function readmit(User $user, Request $request)
    {
        return $user->isAdmin();
    }

    /**
     * Determina se um user poder recusar um pedido
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function refuse(User $user, Request $request)
    {
        return $user->isAdmin();
    }

    /**
     * Determina se um user poder acabar um pedido
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function finish(User $user, Request $request)
    {
        return $user->isAdmin();
    }

     /**
      * Autorizar a remoção do Request
      * @param  \App\User  $user
      * @param  \App\Request  $request
      * @return mixed
      */
    public function delete(User $user, Request $request)
    {
        return ($request->owner_id == $user->id || $user->isAdmin());
    }

    /**
     *
     * @param User $user
     * @param Request $request
     * @return bool
     */
    public function evaluate(User $user, Request $request)
    {
        return $request->owner_id == $user->id;
    }
}
