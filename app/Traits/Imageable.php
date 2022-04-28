<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Imageable
{
    public static function imagePath($image) : ?string
    {
        $path = strtolower(substr(strrchr(__CLASS__, '\\'), 1));

        if (isset($image)) {
            return $image->storePublicly($path, 'public');
        } else {
            return null;
        }
    }

    public function updateImage($image) : ?string
    {
        if (isset($this->image) && isset($image)) {
            Storage::delete($this->image);
            self::imagePath($image);
        } else {
            return null;
        }
    }
}
