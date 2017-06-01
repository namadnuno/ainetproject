<?php

namespace App\Policies;

use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentsPolicy
{
    use HandlesAuthorization;

    /**
     * Determina se um user poder ver os comentários
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determina se um user poder alterar o estado do comentário
     * @param User $user
     * @return bool
     */
    public function change(User $user)
    {
        return $user->isAdmin();
    }
}
