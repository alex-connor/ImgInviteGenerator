<?
include "generator.php";
header ("Content-type: image/png");
header('Content-Disposition: attachment; filename="image.png"');
imagepng(generateImage());