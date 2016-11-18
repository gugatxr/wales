<?php

session_start();
$_SESSION = array();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();


$_SESSION['captcha'] = simple_php_captcha( array(
    'min_length' => 5,
    'max_length' => 5,
    'backgrounds' => array('backgrounds/45-degree-fabric.png'),
    'fonts' => array('fonts/times_new_yorker.ttf'),
    'characters' => 'ABCDEFGHJKLMNPRSTUVWXYZabcdefghjkmnprstuvwxyz23456789',
    'min_font_size' => 28,
    'max_font_size' => 28,
    'color' => '#666',
    'angle_min' => 0,
    'angle_max' => 10,
    'shadow' => true,
    'shadow_color' => '#fff',
    'shadow_offset_x' => -1,
    'shadow_offset_y' => 1
));

echo('<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">');
echo('<br><br>');
echo('O código gerado foi '.$_SESSION['captcha']['code']);

?>
