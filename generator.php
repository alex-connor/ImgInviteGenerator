<?
	function generateImage($str){
	$secret="SECRET_STRING";
	if(!isset($str)){
		$str = sha1(rand(-99999,99999).$secret);
	}else{
		$str = sha1($str.$secret);
	}

	$WH = 200;

	$im = imagecreatetruecolor($WH, $WH);
	$im1 = imagecreatetruecolor($WH, $WH);
	$im2 = imagecreatetruecolor($WH, $WH);
	$im3 = imagecreatetruecolor($WH, $WH);
	$im4 = imagecreatetruecolor($WH, $WH);


	for($i=0;$i<6*$WH+1;$i++){
		$str .= sha1($str.$secret); 
	}
	$arr = array();
	for($i=0;$i<round(strlen($str)/6, 0);$i++){
		$arr[] = hex2rgb(substr($str, $i*6, 6)); 
	}

	for ($i=0;$i<$WH/2;$i++){
		$r = $arr[$i][0];
		$g = $arr[$i][1];
		$b = $arr[$i][2];

		$color = imagecolorallocate($im, $r, $g, $b);
		imagefilledrectangle($im1, $i, $i, $WH-$i, $WH-$i, $color);

		$color = imagecolorallocate($im, $b, $r, $g);
		imagefilledrectangle($im2, $i, $i, $WH-$i, $WH-$i, $color);

		$color = imagecolorallocate($im, $g, $r, $b);
		imagefilledrectangle($im3, $i, $i, $WH-$i, $WH-$i, $color);

		$color = imagecolorallocate($im, $r, $b, $g);
		imagefilledrectangle($im4, $i, $i, $WH-$i, $WH-$i, $color);
	}


	imagecopy($im, $im1, 0, 0, 0, 0, $WH/2, $WH/2);
	imagecopy($im, $im2, $WH/2, 0, $WH/2, 0, $WH/2, $WH/2);
	imagecopy($im, $im3, 0, $WH/2, 0, $WH/2, $WH/2, $WH/2);
	imagecopy($im, $im4, $WH/2, $WH/2, $WH/2, $WH/2, $WH, $WH);

	return $im;
}
	function hex2rgb($hex){
	$hex = str_replace("#", "", $hex);
		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		return $rgb;
	}