<?php

namespace App\Http\Controllers\Api;

use App\Printer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrinterController extends Controller
{
    public function requests(Printer $printer)
    {
        $labels = ['Cores', 'Preto & Branco'];
        $data = [
            $printer->requests()->colored()->count(),
            $printer->requests()->blackAndWhite()->count()
        ];
        return response()->json(compact('data', 'labels'));
    }
}
