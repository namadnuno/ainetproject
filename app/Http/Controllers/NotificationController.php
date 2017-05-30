<?php

namespace App\Http\Controllers;

use App\Departament;
use App\Request;

class NotificationController extends Controller
{
    /**
     * Numero de notificações por página
     */
    const NUM_PER_PAGE = 10;

    /**
     * Apresenta todos os pedidos pendentes segundo a sua data de expiração
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('notifications', auth()->user() );
        if(request('department')) {
            $requests = Departament::find(request('department'))
                ->requests()
                ->pendente()
                ->orderBy('due_date', 'ASC')
                ->paginate(self::NUM_PER_PAGE);
        } else {
            $requests = Request::pendente()->orderBy('due_date', 'ASC')->paginate(self::NUM_PER_PAGE);
        }

        $departments = Departament::all();

        return view('requests.notification', compact('requests', 'departments'));
    }
}
