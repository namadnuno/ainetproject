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
    } elseif (File::extension($request->file) == "pdf") {
        return "file-pdf-o";
    } elseif (File::extension($request->file) == "xlsx") {
        return "file-excel-o";
    } elseif (File::extension($request->file) == "docx") {
        return "file-word-o";
    } elseif (File::extension($request->file) == "odt") {
        return "file-text-o";
    }
    return "file";
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
