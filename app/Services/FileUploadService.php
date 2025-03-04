<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public static function upload(UploadedFile $file, $folder = 'uploads/general/media')
    {
        return $file->store($folder, 'public');
    }
}
