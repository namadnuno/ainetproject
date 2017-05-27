<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

/**
 * Obter o tipo do ficheiro
 * @param $request
 * @return string
 */
function typeFile($request)
{
    if (isImage($request)) {
        return "photo";
    }
    return "file-pdf-o";
}

/**
 * Para poder fazer parse a uma data
 * @param null $time
 * @return static
 */
function carbon($time = null)
{
    if ($time) {
        return Carbon::parse($time);
    }
    return Carbon::now();
}
