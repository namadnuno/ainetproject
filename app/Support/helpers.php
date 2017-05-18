<?php

function isImage($file)
{
    return explode('/', Storage::mimeType($file))[0] == "image";
}
