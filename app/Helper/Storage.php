<?php

namespace App\Helper;

use App\Models\Library;
class Storage
{
    public static function uploadLibrary($fileLibrary)
    {
        $ext = $fileLibrary->getClientOriginalExtension();
        $name = Library::uploadFile($ext);
        $fileLibrary->move(base_path("public/assets/library"), $name);
        return $name;
    }
}

?>