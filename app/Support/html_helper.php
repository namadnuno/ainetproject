<?php

use Illuminate\Support\Facades\Storage;

function typeFile($request)
{
    if (isImage($request)) {
        return "photo";
    }
    return "file-pdf-o";
}
