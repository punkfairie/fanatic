<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Imageable
{
    public static function imagePath($image) : ?string
    {
        $path = strtolower(static::class);

        if (isset($image)) {
            return Storage::putFile($path, $image);
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
