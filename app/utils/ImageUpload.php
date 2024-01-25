<?php

namespace App\utils;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ImageUpload {
    public static function  uploadImage($request, $witdth=null, $height=null, $path=null){

        $imgName = Str::uuid(). '@'.date('y-m-d').'.'.$request->extension();
        [$widthDefault, $heightDefault] = getimagesize($request);
        $height = $height ?? $heightDefault;
        $witdth = $witdth ?? $widthDefault;
        $img = Image::make($request->path());
        $img->fit($witdth, $height, function ($constraint) {
        $constraint->upsize();
        })->stream();
        Storage::disk('images')->put($path.$imgName, $img);
        return  $path. $imgName;
    }
}