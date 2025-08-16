<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class FileUploadService
{
    public static function fileUpload($file, $path)
    {
        $imageName = null;

        if ($file) {
            $imageName = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $imageName);
        }
        return $imageName;
    }


    public static function deleteFile($imageUrl, $folderPath)
    {
        if (!$imageUrl || !$folderPath) return;

        $fileName = basename($imageUrl);
        $filePath = public_path($folderPath . $fileName);

        if (File::exists($filePath)) {
            File::delete($filePath);
        } else {
            Log::warning("File not found for deletion: $filePath");
        }
    }
}
