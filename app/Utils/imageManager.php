<?php

namespace App\Utils;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class imageManager
{

    public function UploadSingleImage($image ,$path,$disk)
    {
        $fileName = Str::uuid() . '_'  . '.' . $image->getClientOriginalExtension();
        $image->storeAs($path,$fileName, ['disk' => $disk]);
        return $fileName;
    }

    public static function deleteImagefromLocaleAndDb($post): void
    {
        if ($post->images->count() > 0) {
            foreach ($post->images as $image) {
                self::deleteImageFromLocale($image->path);
                $image->delete();
            }

        }
    }

    public function deleteImageFromLocale($imagePath): void
    {
        if (File::exists(public_path($imagePath))) {
            File::delete(public_path($imagePath));
        }
    }


}
