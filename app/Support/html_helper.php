<?php

use Illuminate\Support\Facades\Storage;

function typeFile($request)
{
    if (isImage($request->file)) {
        return "photo";
    }
    return "pdf";
    /*if (pathinfo(asset($request->file))['extension'] == 'pdf') {
        
    } elseif (
    pathinfo(asset($request->file))['extension'] == "png"||
    pathinfo(asset($request->file))['extension'] == "jpg"||
    pathinfo(asset($request->file))['extension'] == "jpeg"||
    pathinfo(asset($request->file))['extension'] == "tiff"
    ) {
        return "photo";
    } elseif (pathinfo(asset($request->file))['extension'] == "xlsx") {
        return "exel";
    } elseif (pathinfo(asset($request->file))['extension'] == "docx") {
        return "word";
    } elseif (pathinfo(asset($request->file))['extension'] == "odt") {
        return "text";
    }*/
    return '';
}

function image($path)
{
    return Storage::url($path);
}
