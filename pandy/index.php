<?php
$webpage = file_get_contents('http://pandyland.net/random/?');
$images = explode( "<img src=\"" , $webpage );
$imageOne = explode("\"/>" , $images[2] );
$imageTwo = explode("\"/>" , $images[3] );
$imageThree = explode("\"/>" , $images[4] );
//echo "http://pandyland.net/random/" . $imageOne[0];

$sig = imagecreatetruecolor(708, 236);
imagesavealpha($sig, true);
$trans_colour = imagecolorallocatealpha($sig, 0, 0, 0, 127);
imagefill($sig, 0, 0, $trans_colour);

$one = imagecreatefrompng("http://pandyland.net/random/" . $imageOne[0]);
$two = imagecreatefrompng("http://pandyland.net/random/" . $imageTwo[0]);
$three = imagecreatefrompng("http://pandyland.net/random/" . $imageThree[0]);

imagecopy($sig, $one, 0, 0, 0, 0, 236, 236);
imagecopy($sig, $two, 235, 0, 0, 0, 236, 236);
imagecopy($sig, $three, 471, 0, 0, 0, 236, 236);



if(isset($_GET['s']) && !empty($_GET['s'])){
	$finalH = $_GET['s'];
	if($finalH > 600 || $finalH < 5){
		$final = imagecreatetruecolor(528, 84);
			
		$red = imagecolorallocate($final, 207, 0, 0);
		$white = imagecolorallocate($final, 255, 255, 255);
			
		imagefilledrectangle($final, 0, 0, 527, 83, $white);
			
		imagestring($final, 6, 10, 38, "Error: size must be between 5 and 600 yo", $red);
		imagerectangle($final, 0, 0, 527, 83, $red);
	}else{
		$finalW = $finalH * 3;
		$final = imagecreatetruecolor($finalW, $finalH);
		imagealphablending($final, TRUE); 
		imagesavealpha($final, true);
		$trans_colour2 = imagecolorallocatealpha($final, 0, 0, 0, 127);
		imagefill($final, 0, 0, $trans_colour2);
	
		imagecopyresampled($final, $sig, 0, 0, 0, 0, $finalW, $finalH, 708, 236);
	
		$water = imagecreatefrompng("water.png");
		imagealphablending($final, TRUE); 
		imagesavealpha($water, true);
	
		if($finalH == 200){
			$sx = imagesx($water);
			$sy = imagesy($water);
	
			imagecopy($final, $water, imagesx($final) - 1 - $sx, imagesy($final) - 1 - $sy, 0, 0, imagesx($water), imagesy($water));
		}else{
			$waterH = round($finalH / 10);
			$waterW = round($waterH * 4.1);
		
			$finalWater = imagecreatetruecolor($waterW, $waterH);
			imagesavealpha($water, true);
			$trans_colour3 = imagecolorallocatealpha($finalWater, 0, 0, 0, 127);
			imagefill($finalWater, 0, 0, $trans_colour3);
		
			imagecopyresampled($finalWater, $water, 0, 0, 0, 0, $waterW, $waterH, 82, 20);
		
			$sx2 = imagesx($finalWater);
			$sy2 = imagesy($finalWater);
	
			imagecopy($final, $finalWater, imagesx($final) - 1 - $sx2, imagesy($final) - 1 - $sy2, 0, 0, imagesx($finalWater), imagesy($finalWater));
		}
	}
}else{
	$final = imagecreatetruecolor(600, 200);
	imagealphablending($final, TRUE); 
	imagesavealpha($final, true);
	$trans_colour2 = imagecolorallocatealpha($final, 0, 0, 0, 127);
	imagefill($final, 0, 0, $trans_colour2);

	imagecopyresampled($final, $sig, 0, 0, 0, 0, 600, 200, 708, 236);

	$water = imagecreatefrompng("water.png");
	imagesavealpha($water, true);
	
	$sx = imagesx($water);
	$sy = imagesy($water);
	
	imagecopy($final, $water, imagesx($final) - 1 - $sx, imagesy($final) - 1 - $sy, 0, 0, imagesx($water), imagesy($water));
}

header('Content-type: image/png');
imagepng($final) or die('Imaged failed to load');
imagedestroy($sig);
imagedestroy($final);
?>
