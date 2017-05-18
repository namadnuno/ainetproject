<?php

function isImage($file)
{
    return explode('/', $file->getMimeType())[0] === 'image';
}
