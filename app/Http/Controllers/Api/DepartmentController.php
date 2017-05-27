<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departament;

class DepartmentController extends Controller
{
    /**
     * Retorna em json o numero de pedidos a cores e a pretro e branco
     * @param Department $department
     * @return \Illuminate\Http\JsonResponse
     */
    public function depatementColors(Departament $department)
    {
        $labels = ['Cores', 'Preto & Branco'];
        $data = [
            $department->requests()->colored()->count(),
            $department->requests()->blackAndWhite()->count()
        ];
        return response()->json(compact('data', 'labels'));
    }
}
