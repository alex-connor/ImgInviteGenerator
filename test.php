<?php
error_reporting(0);
include('generator.php');

$UserID = rtrim(base64_encode(sha1($_POST['UserID'])), '=');
$name1 = './files/image1_'.$UserID.'.png';

if (copy($_FILES['uploadfile']['tmp_name'], $name1)){
	$im = imagecreatefrompng($name1);

	function getColor($im, $x, $y){
		$rgb = imagecolorat($im, $x, $y);
		$r = ($rgb >> 16) & 0xFF;
		$g = ($rgb >> 8) & 0xFF;
		$b = $rgb & 0xFF;
		return array($r, $g, $b);
	}

	$max_count = 0;
	$counted = 0;

	for($i=0;$i<100;$i++){
			$max_count++;
		if(
			getColor($im, 99, $i)[0] == getColor($im, 100, $i)[1] AND 
			getColor($im, 99, $i)[1] == getColor($im, 100, $i)[2] AND 
			getColor($im, 99, $i)[2] == getColor($im, 100, $i)[0] AND

			(getColor($im,  99, $i)[0] != getColor($im, 100, $i)[0] OR
			getColor($im,  99, $i)[1] != getColor($im,  100, $i)[1] OR
			getColor($im,  99, $i)[2] != getColor($im,  100, $i)[2])){
			$counted++;
		}
	}
	for($i=0;$i<100;$i++){
		$max_count++;
		if(
			getColor($im,  $i, 99)[0] == getColor($im, $i, 100)[1] AND 
			getColor($im,  $i, 99)[1] == getColor($im,  $i, 100)[0] AND 
			getColor($im,  $i, 99)[2] == getColor($im,  $i, 100)[2] AND

			(getColor($im,  $i, 99)[0] != getColor($im, $i, 100)[0] OR
			getColor($im,  $i, 99)[1] != getColor($im,  $i, 100)[1] OR
			getColor($im,  $i, 99)[2] != getColor($im,  $i, 100)[2])){
			$counted++;
		}
	}
	for($i=101;$i<200;$i++){
		$max_count++;
		if(
			getColor($im,  $i, 99)[0] == getColor($im, $i, 100)[1] AND 
			getColor($im,  $i, 99)[1] == getColor($im,  $i, 100)[0] AND 
			getColor($im,  $i, 99)[2] == getColor($im,  $i, 100)[2] AND

			(getColor($im,  $i, 99)[0] != getColor($im, $i, 100)[0] OR
			getColor($im,  $i, 99)[1] != getColor($im,  $i, 100)[1] OR
			getColor($im,  $i, 99)[2] != getColor($im,  $i, 100)[2])){
			$counted++;
		}
	}
	for($i=101;$i<200;$i++){
		$max_count++;
		if(
			getColor($im,  99, $i)[0] == getColor($im, 100, $i)[2] AND 
			getColor($im,  99, $i)[1] == getColor($im,  100, $i)[0] AND 
			getColor($im,  99, $i)[2] == getColor($im,  100, $i)[1] AND

			(getColor($im,  99, $i)[0] != getColor($im, 100, $i)[0] OR 
			getColor($im,  99, $i)[1] != getColor($im, 100, $i)[1] OR
			getColor($im,  99, $i)[2] != getColor($im, 100, $i)[2])){
			$counted++;
		}
	}

	if($counted>$max_count*0.9){
		echo " COMPLETE";
	}else{
		echo " FAILED";
	}
}else{
	echo "ERROR ".$_FILES['uploadfile']['error'];
}
?>