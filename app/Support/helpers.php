<?php

use App\Request;

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
