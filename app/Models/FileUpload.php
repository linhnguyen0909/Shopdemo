<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table = 'upload_files';
    protected $fillable= [
        'name','image'
    ];
}
