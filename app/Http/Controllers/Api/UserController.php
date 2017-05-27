<?php

namespace App\Http\Controllers\Api;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Dá todos os pedidos do utilizador durante esta semana
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function requests(User $user)
    {

        $labels = [];
        $data = [];

        $begin = Carbon::now()->startOfWeek();
        $end = Carbon::now()->endOfWeek();

        do {
            $data[] = $user->requests()->between($begin->copy()->startOfDay(), $begin->copy()->endOfDay())->count();
            $labels[] = $begin->toDateString();
        } while ($begin->addDay()->lt($end));

        return response()->json(compact('data', 'labels'));
    }

    /**
     * Dá a divisão de cores do utilizador
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function colors(User $user)
    {
        $labels = ['Cores', 'Preto & Branco'];
        $data = [
            $user->requests()->colored()->count(),
            $user->requests()->blackAndWhite()->count()
        ];
        return response()->json(compact('data', 'labels'));
    }
}
