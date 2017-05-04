<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DownloadController extends Controller
{
    /**
     * Get the file
     * @param  string $file
     * @return Illuminate\Http\Response
     */
    public function show()
    {
//        dd( str_slug("11 Cores  1 Cópia  É agrafado  A4  tipo de papel é normal"));
        return response()->download( 'files/' . request('file'));
    }
}
