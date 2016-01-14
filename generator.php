<?php
function gen($input, $secret='0JAg0YLRiyDQu9GO0LHQvtC30L3QsNGC0LXQu9GM0L3Ri9C5KSDQlNCw0Lkg0LzQvdC1INC40L3QstCw0LnRgiDQvdCwINGF0LDQsdGALCDQsD8p'){
	$hesh=sha1($input.$secret).sha1($input.sha1($input.$secret).$secret).sha1($input.sha1($input.$secret).sha1($input.sha1($input.$secret).$secret).$secret); 
	$numbers = $hesh;	
	for($i=0;$i<count(['a', 'b', 'c', 'd', 'e', 'f']);$i++){
		$numbers = str_replace(['a', 'b', 'c', 'd', 'e', 'f', '0'][$i], ['2', '3', '4', '5', '6', '7', '8'][$i], $numbers);		
	}


	$im = imagecreatetruecolor(200, 200);
	$color = imagecolorallocate($im, $numbers[0]*28, $numbers[1]*28, $numbers[2]*28);
	imagefilledrectangle($im, 0, 0, 200, 200, $color);
	
	for($i=0; $i < round((strlen($numbers)/4), 0); $i++) {

		$k = round((strlen($numbers)/10), 0);

		$x = $numbers[$i*4]*$k;
		$y = $numbers[$i*4+1]*$k;


		$w = 5 + $numbers[$i*4+2]*$k;
		$h = 5 + $numbers[$i*4+3]*$k;

		$color = imagecolorallocatealpha($im, $numbers[$i*4+1]*40, $numbers[$i*4+2]*40, $numbers[$i*4+3]*40, 70);

		imagefilledrectangle($im, $x, $y, $x+$w, $y+$h, $color);
	}
	return $im;
	imagedestroy($im); 
}