<?php

namespace App\Http\Controllers;

use App\Departament;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Número de departamentos por página
     */
    const NUM_PER_PAGE = 20;

    /**
     * Mostra todos os departamentos ao publico
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexAsGuest()
    {
        $departments = Departament::withCount(['users','departments'], function ($query) {
            $query->where('requests.status', '2');
        })->search(request('filter'))
            ->orderBy(
                request('orderby') ? request('orderby') : 'created_at',
                request('order') ? request('order') : 'DESC'
            )->paginate(static::NUM_PER_PAGE);

        return view('departments.indexAsGuest', compact('departments'));
    }

    /**
     * Página com todas os departamentos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $departments = auth()->user()->requests()->search(request('filter'))
        ->orderBy(
            request('orderby') ? request('orderby') : 'created_at',
            request('order') ? request('order') : 'DESC'
        )->paginate(static::NUM_PER_PAGE);

        return view('departments.index', compact('departments'));
    }

    /**
     * Mostra a página de para criar Departamento
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $department = new Departament;
        return view('departments.create', compact('department'));
    }

    /**
     * Mostra a página para editar department
     * @param Departament $department
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Departament $department)
    {
        return view('departments.edit', compact('department'));
    }


    public function store(Departament $department)
    {
        $department = new Departament;

        $department->create();

        return redirect()->route('departments.index')->with('success', 'Departamento criado com sucesso');
    }

    /**
     * Atualiza um departamento
     * @param Departament $department
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Departament $department)
    {
        $department->update();

        return  redirect()->route('departments.index')->with('success', 'Departamento editado com sucesso');
    }
}
