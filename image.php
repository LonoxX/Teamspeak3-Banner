<?php
$image = imagecreatefrompng("images/banner.png");

// setup color
$r = 255;
$g = 255;
$b = 255;

$rdate = 47;
$gdate = 132;
$bdate = 189;

// text-color
$text_color = imagecolorallocate($image, $r, $g, $b);
$date_color = imagecolorallocate($image, $rdate, $gdate, $bdate);

// font
$font = "font/Ubuntu-B.ttf";

// string that will be displayed on the image
$message = "Welcome on our TeamSpeak-Server!";
$date = "It's " . date("H:i", time());

// apply image, font-size, angle, position-x, position-y, color, font, message
imagettftext($image, 15, 0, 25, 50, $text_color, $font, $message);
imagettftext($image, 25, 0, 45, 150, $date_color, $font, $date);

// set the header type to an image 
header('Content-type: image/png');

// echo the image
imagepng($image);

// clear cache
imagedestroy($image);
