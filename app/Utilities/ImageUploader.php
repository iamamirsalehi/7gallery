<?php

namespace App\Utilities;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ImageUploader
{
    public static function upload($image, $path, $diskType = 'public_storage')
    {
        if(!is_null($image))
        {
            Storage::disk($diskType)->put($path, File::get($image));
        }
    }

    public static function uploadMany(array $images, $path, $diskType = 'public_storage')
    {
        $imagesPath = [];

        foreach($images as $key => $image)
        {
            $fullPath = $path . $key . '_' . $image->getClientOriginalName();
        
            if(!is_null($image))
            {
                self::upload($image, $fullPath,  $diskType);
            }

            $imagesPath += [$key => $fullPath];
        }

        return $imagesPath;
    }
    
}