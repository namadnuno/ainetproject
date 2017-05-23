<?php

namespace App\Http\Controllers;

use App\Departament;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Número de departamentos por página
     */
    const NUM_PER_PAGE = 6;

    /**
     * Mostra todos os departamentos ao publico
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexAsGuest()
    {
        $departments = Departament::withCount(['users','requests'])->search(request('filter'))
            ->orderBy(
                request('orderby') ? request('orderby') : 'created_at',
                request('order') ? request('order') : 'DESC'
            )->paginate(static::NUM_PER_PAGE);

        return view('departments.indexAsGuest', compact('departments'));
    }
}
