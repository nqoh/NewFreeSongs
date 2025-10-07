<?php

namespace App;

trait ResizeImage
{
    public function reisze($newImageName)
    {
        $input = public_path('images/'.$newImageName);
        exec("magick convert {$input} -resize 364x350 {$input}");
    }
}
