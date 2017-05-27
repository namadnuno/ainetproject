<?php

namespace App\Http\Controllers;

use App\Request as RequestModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{

    /**
     * FileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Vai buscar o ficheiro e dá uma representação do mesmo
     * @param  RequestModel $request
     * @return Illuminaate\Http\Response
     */
    public function getFile(RequestModel $request)
    {
        $this->authorize('download', $request);
        $path = storage_path('app/print-jobs/' . $request->owner_id . '/' . $request->file);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        return response($file, 200)->header("Content-Type", $type);
    }

    /**
     * Faz download do ficheiro do Requests
     * @param  Requets $request
     * @return Illuminate\Http\Response
     */
    public function downloadFile(RequestModel $request)
    {
        $this->authorize('download', $request);
        $path = storage_path('app/print-jobs/' . $request->owner_id . '/' . $request->file);

        if (!File::exists($path)) {
            abort(404);
        }
        
        return response()->download($path);
    }
}
