<?php

$x = $_REQUEST['posX'];
$y = $_REQUEST['posY'];

if($x != 0 ) {
  $x = $x - 258;
}
if($y != 0) {
  $y = $y - 258;
  
}
header('Content-Type: image/jpeg');

  //MERGE IMAGES
  $icon     = imagecreatefrompng("item12910194505103.png");
  $background = imagecreatefromjpeg("origin13280545623901.jpeg");
  imagealphablending($background, true);
  imagealphablending($icon, true);

  imagecolortransparent($icon,imagecolorat($icon,0,0));

  $icon_width = imagesx( $icon );
  $icon_height = imagesy( $icon );

  imagecopymerge($background, $icon, $x, $y, 0 , 0, $icon_width, $icon_height, 100);
  
  imagejpeg($background,"",100);

  imagedestroy($icon);
  imagedestroy($original);

