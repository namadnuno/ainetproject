<?php

use App\Request;

/**
 * Devolve o tipo de imagem
 * @param Request $request
 * @return bool
 */
function isImage(Request $request)
{
    $path = storage_path('app/print-jobs/'. $request->owner_id . '/' . $request->file);

    if (!File::exists($path)) {
        return false;
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    return explode('/', $type)[0] == "image";
}

/**
 * Devolve se existe algum pedido expirado
 * @return bool
 */
function expiredStatus()
{
    if(Request::pendente()->count() == 0 ) {
        return -1;
    }

    $num = Request::pendente()->expirado()->count();

    return $num > 0;
}