<?php 

use App\Request as RequestModel;

function typeFile(RequestModel $request)
{
    if(pathinfo(asset($request->file))['extension'] == 'pdf')
        return "pdf";
    elseif(
    pathinfo(asset($request->file))['extension'] == "png"|| 
    pathinfo(asset($request->file))['extension'] == "jpg"||
    pathinfo(asset($request->file))['extension'] == "jpeg"||
    pathinfo(asset($request->file))['extension'] == "tiff")
        return "photo";
    elseif(pathinfo(asset($request->file))['extension'] == "xlsx")
        return "exel";
    elseif(pathinfo(asset($request->file))['extension'] == "docx")
        return "word";
    elseif(pathinfo(asset($request->file))['extension'] == "odt")
        return "text";

    return null;
}