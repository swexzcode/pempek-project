<?php
session_start();
$random_alpha = md5(rand());
$captcha_code = substr($random_alpha, 0, 6);
$_SESSION["captcha_code"] = $captcha_code;
$target_layer = imagecreatetruecolor(70,30);
$captcha_background = imagecolorallocate($target_layer, 255, 160, 119);
imagefill($target_layer,0,0,$captcha_background);
$captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);
imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color);
// Draw random lines for noise
$line_color = imagecolorallocate($target_layer, 64, 64, 64);
for ($i = 0; $i < 5; $i++) {
    imageline($target_layer, 0, rand() % 30, 70, rand() % 30, $line_color);
}

// Add random pixels for additional noise
$pixel_color = imagecolorallocate($target_layer, 0, 0, 255);
for ($i = 0; $i < 100; $i++) {
    imagesetpixel($target_layer, rand() % 70, rand() % 30, $pixel_color);
}
header("Content-type: image/jpeg");
imagejpeg($target_layer);

?>