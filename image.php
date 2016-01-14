<?
include('generator.php');
header('Content-Disposition: attachment; filename="image.png"');

header ("Content-type: image/png");
imagepng(gen($_GET['in']));


?>