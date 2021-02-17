<?php

class Helper{

    public static function GetGallery($theme_setting, $id)
    {
        $images = explode(',',$theme_setting[$id]);
        $slider = [];
        foreach ($images as $image) {
            $slider[] = wp_get_attachment_image_url($image, 'full');
        }
        return $slider;
    }
    
}