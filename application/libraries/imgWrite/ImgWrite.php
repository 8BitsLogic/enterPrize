<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImgWrite
 *
 * @author Syed
 */
class ImgWrite {
    /*
     * memberName => member name
     * certificateFile => certificate image (PNG)
     * public_file_path => themeUrl
     * imageSavePath => output file save path
     * $imageSaveName => output file save name
     * 
     */

    function signCertificate($memberName, $certificateFile, $public_file_path, $imageSavePath, $imageSaveName) {

        // Copy and resample the imag
        list($width, $height) = getimagesize($certificateFile);
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefrompng($certificateFile);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);

        // Prepare font size and colors
        $text_color = imagecolorallocate($image_p, 0, 0, 0);
//        $bg_color = imagecolorallocate($image_p, 255, 255, 255);
        $fontFile = file_get_contents($public_file_path . '/front/fonts/lovely_home.ttf');
//        $font = '/fonts/home.ttf';
        file_put_contents('font.ttf', $fontFile);
        $font_size = 30;

        // Set the offset x and y for the text position
        $offset_x = 170;
        $offset_y = 510;

        // Get the size of the text area
//        $dims = imagettfbbox($font_size, 0, $font, $text);
//        $dims = imagettfbbox($font_size, 0, 'font.ttf', $text);
//        var_dump($dims);exit;
//        $text_width = $dims[4] - $dims[6] + $offset_x;
//        $text_height = $dims[3] - $dims[5] + $offset_y;
        // Add text background
//        imagefilledrectangle($image_p, $offset_x, $offset_y, $text_width, $text_height, $bg_color);
        // Add text
//        imagettftext($image_p, $font_size, 0, $offset_x, $offset_y, $text_color, $font, $text);
        imagettftext($image_p, $font_size, 0, $offset_x, $offset_y, $text_color, 'font.ttf', $memberName);

        // Save the picture
//        header('Content-type: image/png');
//        imagejpeg($image_p);
        imagejpeg($image_p, $imageSavePath .'/'. $imageSaveName, 100);

        // Clear
        imagedestroy($image);
        imagedestroy($image_p);
    }

}
