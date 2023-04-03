<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SaveImage
{
    /**
     * Set slug attribute.
     *
     * @param string $value
     * @return void
     */
    public function cnic_image($image)
    {
        // $this->attributes['slug'] = Str::slug($image, config('roles.separator'));
        $img = $image;
        $number = rand(1,999);
        $numb = $number / 7 ;
        $extension      = $img->extension();
        $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
        $filenamepath   = 'image'.'/'.'cnic_image/'.$filenamenew;
        $filename       = $img->move(public_path('storage/image'.'/'.'cnic_image/'),$filenamenew);
        return $filenamepath;
    }

    public function work_history($image)
    {
        // $this->attributes['slug'] = Str::slug($image, config('roles.separator'));
        $img = $image;
        $number = rand(1,999);
        $numb = $number / 7 ;
        $extension      = $img->extension();
        $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
        $filenamepath   = 'image'.'/'.'work_history/'.$filenamenew;
        $filename       = $img->move(public_path('storage/image'.'/'.'work_history/'),$filenamenew);
        return $filenamepath;
    }

    public function picture($image)
    {
        $img = $image;
        $number = rand(1,999);
        $numb = $number / 7 ;
        $extension      = $img->extension();
        $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
        $filenamepath   = 'image'.'/'.'picture/'.$filenamenew;
        $filename       = $img->move(public_path('storage/image'.'/'.'picture/'),$filenamenew);
        return $filenamepath;

    }
    public function ProductImage($image)
    {
        $img = $image;
        $number = rand(1,999);
        $numb = $number / 7 ;
        $extension      = $img->extension();
        $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
        $filenamepath   = 'image'.'/'.'product/image/'.$filenamenew;
        $filename       = $img->move(public_path('storage/image'.'/'.'product/image/'),$filenamenew);
        return $filenamepath;

    }
    public function serviceImage($image)
    {
        $img = $image;
        $number = rand(1,999);
        $numb = $number / 7 ;
        $extension      = $img->extension();
        $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
        $filenamepath   = 'service/image'.'/'.'img/'.$filenamenew;
        $filename       = $img->move(public_path('storage/service/image'.'/'.'img'),$filenamenew);
        return $filenamepath;

    }
}
