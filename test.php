<?php
error_reporting(0);
include('generator.php');

$UserID = rtrim(base64_encode(sha1($_POST['UserID'])), '=');

if (copy($_FILES['uploadfile']['tmp_name'], './files/image1_'.$UserID.'.png')){
	imagepng(gen($_POST['KOD']), './files/image2_'.$UserID.'.png');
	if (file_get_contents('./files/image2_'.$UserID.'.png') == file_get_contents('./files/image1_'.$UserID.'.png')){echo 'True';}else{echo 'False';}
}else{
	echo "ERROR ".$_FILES['uploadfile']['error'];
}
?>