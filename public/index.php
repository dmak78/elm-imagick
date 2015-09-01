<?php

define('ROOT', dirname(realpath(__FILE__)) . '/');

$package = 'iron';
$title = '';
$desc = '';
$color = 'white';
$title_size = 33.5;
$desc_size = 22;
$regular_font = 'fonts/utopia.otf';
$italic_font = 'fonts/utopia-italic.otf';

$title_position_x = 300;
$title_position_y = 600;
$desc_position_x = 300;
$desc_position_y = 640;

if( ! empty($_GET['package'])) {
  $package = $_GET['package'];
}

if( ! empty($_GET['title'])) {
  $title = $_GET['title'];
}

if( ! empty($_GET['desc'])) {
  $desc = $_GET['desc'];
}

if( ! empty($_GET['color'])) {
  $color = $_GET['color'];
}

if( ! empty($_GET['title_size'])) {
  $title_size = $_GET['title_size'];
}

if( ! empty($_GET['desc_size'])) {
  $desc_size = $_GET['desc_size'];
}

if( ! empty($_GET['title_position_x'])) {
  $title_position_x = $_GET['title_position_x'];
}

if( ! empty($_GET['title_position_y'])) {
  $title_position_y = $_GET['title_position_y'];
}

if( ! empty($_GET['desc_position_x'])) {
  $desc_position_x = $_GET['desc_position_x'];
}

if( ! empty($_GET['desc_position_y'])) {
  $desc_position_y = $_GET['desc_position_y'];
}

/* Create some objects */
$image = new Imagick('static/'.$package.'.png');
$draw = new ImagickDraw();

/* Black text */
$draw->setFillColor($color);

/* Font properties */
$draw->setFont($regular_font);
$draw->setFontSize($title_size);

/* Create Title */
$image->annotateImage($draw, $title_position_x, $title_position_y, 0, $title);

$draw->setFont($italic_font);
$draw->setFontSize( $desc_size );

/* Create Description */
$image->annotateImage($draw, $desc_position_x, $desc_position_y, 0, $desc);

/* Give image a format */
$image->setImageFormat('png');

/* Output the image with headers */
header('Content-type: image/png');
die($image);

?>