<?php
if (!function_exists('upload_image')){
    function upload_image($imagefile ,$path ){

        return true;


    }
}

if (!function_exists('convert_slug')){
    function convert_slug($string ){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }
}




