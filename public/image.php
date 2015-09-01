<?php

$package = 'iron';
$title = '';
$desc = '';
$color = 'black';
$title_size = 33.5;
$desc_size = 22;
$regular_font = 'fonts/utopia.otf';
$italic_font = 'fonts/utopia-italic.otf';

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

/* Create some objects */
$image = new Imagick('static/'.$package.'.png');
$draw = new ImagickDraw();

/* Black text */
$draw->setFillColor($color);

/* Font properties */
$draw->setFont($regular_font);
$draw->setFontSize($title_size);

/* Create text */
$image->annotateImage($draw, 300, 600, 0, $title);

$draw->setFont($italic_font);
$draw->setFontSize( $desc_size );

$image->annotateImage($draw, 300, 640, 0, $desc);

/* Give image a format */
$image->setImageFormat('png');

/* Output the image with headers */
header('Content-type: image/png');
die($image);

?>