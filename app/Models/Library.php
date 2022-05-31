<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $table = "library";
    protected $guarded = [];

    public static function uploadFile($ext)
    {
        return  'Library_'.date('Y-m-d_H-i-s').".".$ext;
    }
}
