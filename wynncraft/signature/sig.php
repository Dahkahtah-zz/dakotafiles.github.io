<?php
	if(isset($_GET['u'])){
			$name = $_GET['u'];
		if(empty($_GET['u'])){
			$error = imagecreatetruecolor(528, 84);
			
			$red = imagecolorallocate($error, 207, 0, 0);
			$white = imagecolorallocate($error, 255, 255, 255);
			
			imagefilledrectangle($error, 0, 0, 527, 83, $white);
			
			imagestring($error, 6, 10, 38, "Error: Please Enter Username", $red);
			imagerectangle($error, 0, 0, 527, 83, $red);
			
			header('Content-type: image/png');
			imagepng($error) or die('Imaged failed to load');
			imagedestroy($error);
		}else{
				$userJson = @file_get_contents("http://wynncraft.com/api/public_api.php?action=playerStats&command=" . $name);
			if (!$userJson){
				$error = imagecreatetruecolor(528, 84);
			
				$red = imagecolorallocate($error, 207, 0, 0);
				$white = imagecolorallocate($error, 255, 255, 255);
			
				imagefilledrectangle($error, 0, 0, 527, 83, $white);
			
				imagestring($error, 6, 10, 38, "Error: User has never been on WynnCraft", $red);
				imagerectangle($error, 0, 0, 527, 83, $red);
			
				header('Content-type: image/png');
				imagepng($error) or die('Imaged failed to load');
				imagedestroy($error);
			}else{
				$userJsonDecode = json_decode($userJson,true);
				$fri = 0;
				foreach($userJsonDecode["friends"] as $val){
					$fri++;
				}
				
				$rank = $userJsonDecode["rank"];
				
				$levelWa = $userJsonDecode["classes"]["warrior"]["level"];
				$levelMa = $userJsonDecode["classes"]["mage"]["level"];
				$levelAr = $userJsonDecode["classes"]["archer"]["level"];
				$levelAs = $userJsonDecode["classes"]["assassin"]["level"];
				$levelKn = $userJsonDecode["classes"]["knight"]["level"];
				$levelDw = $userJsonDecode["classes"]["darkwizard"]["level"];
				$levelHu = $userJsonDecode["classes"]["hunter"]["level"];
				$levelNi = $userJsonDecode["classes"]["ninja"]["level"];
				
				$timeR = $userJsonDecode["playtime"];
				$blocksR = $userJsonDecode["global"]["blocks_walked"];
				$idsR = $userJsonDecode["global"]["items_identified"];
				
				$server = $userJsonDecode["current_server"];
				
				$chestsR = $userJsonDecode["global"]["chests_found"];
				$kills = $userJsonDecode["global"]["pvp_kills"];
				$deaths = $userJsonDecode["global"]["pvp_deaths"];
				$deathsNa = $userJsonDecode["global"]["deaths"];
				$mobs = $userJsonDecode["global"]["mobs_killed"];
				
				$time = $timeR;
				$ids = $idsR;
				$chests = $chestsR;
				$blocks = $blocksR;
				
				if(strlen((string)$blocksR) > 8){
					$blLen = strlen((string)$blocksR);
					$blDe = $blocksR / pow(10, ($blLen - 1));
					$blDe = round($blDe, 2);
					$blocks = $blDe . "x10^" . ($blLen - 1);
				}else{
					$blocks = strval(number_format($blocksR, 0, '.', ','));
				}
				
				if(strlen((string)$chestsR) > 5){
					$chLen = strlen((string)$chestsR);
					$chDe = $chestsR / pow(10, ($chLen - 1));
					$chDe = round($chDe, 1);
					$chests = $chDe . "x10^" . ($chLen - 1);
				}else{
					$chests = strval(number_format($chestsR, 0, '.', ','));
				}
				
				if(strlen((string)$idsR) > 5){
					$idLen = strlen((string)$idsR);
					$idDe = $idsR / pow(10, ($idLen - 1));
					$idDe = round($idDe, 1);
					$ids = $idDe . "x10^" . ($idLen - 1);
				}else{
					$ids = strval(number_format($idsR, 0, '.', ','));
				}
				
				if(strlen((string)$timeR) > 7){
					$tiLen = strlen((string)$timeR);
					$tiDe = $timeR / pow(10, ($tiLen - 1));
					$tiDe = round($tiDe, 2);
					$time = $tiDe . "x10^" . ($tiLen - 1);
				}else{
					$time = strval(number_format($timeR, 0, '.', ','));
				}
				
				
				$classLvl = array(
					"levelWa" => $levelWa, 
					"levelMa" => $levelMa, 
					"levelAr" => $levelAr, 
					"levelAs" => $levelAs, 
					"levelKn" => $levelKn, 
					"levelDw" => $levelDw, 
					"levelHu" => $levelHu, 
					"levelNi" => $levelNi
				);
				
				foreach($classLvl as $key => $val){
					if($val === null){
						${$key} = 0;
						$classLvl[$key] = 0;
					}
				}
				
				rsort($classLvl, SORT_NUMERIC);
				$kdr = 0;
				if($deaths == 0){
					$kdr = $kills;
				}else{
					$kdr = $kills/$deaths;
				}
				
				$wbss = round(((((((($classLvl[0]+($classLvl[1]*0.75)+($classLvl[2]*0.5)+($classLvl[3]*0.25))*3)+($kdr*1000))*2)+($chestsR*3)/2)/$timeR)*200));
				//$wbss = round(((((($classLvl[0]+($classLvl[1]*0.75)+($classLvl[2]*0.5)+($classLvl[3]*0.25))*3)+(($kdr)*1000))*2)+($chestsR*10)/2));
				$wbss1 = round(($mobs/7500)*(($classLvl[0]+($classLvl[1]*0.75)+($classLvl[2]*0.5)+($classLvl[3]*0.25))*1.15)-($deathsNa));
				
				
				//time to create that image yo
				$sig = imagecreatetruecolor(528, 84);
				
				$black = imagecolorallocate($sig, 0, 0, 0);
				$background = imagecolorallocate($sig, 107, 225, 156);
				
				$faded = imagecolorallocatealpha($sig, 0, 0, 0, 65);
				
				
				if(isset($_GET['c'])){
					if(empty($_GET['c'])){
						$background = imagecolorallocate($sig, 107, 225, 156);
					}else{
						$hex = $_GET['c'];
						$hex = str_replace("#", "", $hex);
						$r = hexdec(substr($hex,0,2));
						$g = hexdec(substr($hex,2,2));
						$b = hexdec(substr($hex,4,2));
						$background = imagecolorallocate($sig, $r, $g, $b);
					}
				}else{
					$background = imagecolorallocate($sig, 107, 225, 156);
				}
				
				$current = imagecolorallocate($sig, 249, 90, 90);
				if($server == "null"){
					$current = imagecolorallocate($sig, 249, 90, 90);
					$server = "Offline";
				}else{
					$current = imagecolorallocate($sig, 90, 250, 90);
				}
				
				
				$rankCol = imagecolorallocate($sig, 112, 112, 112);
				if($rank == "Player"){
					$rankCol = imagecolorallocate($sig, 112, 112, 112);
				}elseif($rank == "VIP" || $rank == "Veteran"){
					$rankCol = imagecolorallocate($sig, 0, 111, 0);
				}elseif($rank == "VIP+"){
					$rankCol = imagecolorallocate($sig, 13, 201, 173);
				}elseif($rank == "Media"){
					$rankCol = imagecolorallocate($sig, 153, 51, 153);
				}elseif($rank == "Game Master" || $rank == "Builder"){
					$rankCol = imagecolorallocate($sig, 38, 97, 158);
				}elseif($rank == "Moderator"){
					$rankCol = imagecolorallocate($sig, 168, 112, 0);
				}elseif($rank == "Administrator"){
					$rankCol = imagecolorallocate($sig, 155, 0, 0);
				}else{
					$rankCol = imagecolorallocate($sig, 112, 112, 112);
				}
				
				$shadow1 = imagecolorallocatealpha($sig, 0, 0, 0, 97);
				$shadow2 = imagecolorallocatealpha($sig, 0, 0, 0, 100);
				$shadow3 = imagecolorallocatealpha($sig, 0, 0, 0, 103);
				$shadow4 = imagecolorallocatealpha($sig, 0, 0, 0, 106);
				$shadow5 = imagecolorallocatealpha($sig, 0, 0, 0, 109);
				$shadow6 = imagecolorallocatealpha($sig, 0, 0, 0, 112);
				$shadow7 = imagecolorallocatealpha($sig, 0, 0, 0, 115);
				$shadow8 = imagecolorallocatealpha($sig, 0, 0, 0, 118);
				$shadow9 = imagecolorallocatealpha($sig, 0, 0, 0, 121);
				$shadow10 = imagecolorallocatealpha($sig, 0, 0, 0, 124);
				
				$qub = 'QUB.ttf';
				
				$noSkin = $name;
				$check = @file_get_contents('http://skins.minecraft.net/MinecraftSkins/' . $name . '.png');
				if($check == ''){
					$noSkin = 'char';
				}
				
				$skin = file_get_contents('http://signaturecraft.us/avatars/6/body/' . $noSkin . '.png');
				$body = imagecreatefromstring($skin);
				$sprites = imagecreatefrompng("spritesheet.png");
				
				imagefilledrectangle($sig, 0, 0, 527, 83, $background);
				
				if(isset($_GET['t']) && !empty($_GET['t'])){
					
					imagefilledrectangle($sig, 20, 30, 47, 57, $rankCol);
					imagefilledrectangle($sig, 8, 54, 59, 80, $rankCol);
					
					$hex2 = $_GET['t'];
					$hex2 = str_replace("#", "", $hex2);
					$r2 = hexdec(substr($hex2,0,2));
					$g2 = hexdec(substr($hex2,2,2));
					$b2 = hexdec(substr($hex2,4,2));
					
					$rankCol = imagecolorallocate($sig, $r2, $g2, $b2);
				}
				
				imagettftext($sig, 36, 0, 73, 43, $rankCol, $qub, $name);
				
				imagecopy($sig, $sprites, 73, 47, 0, 0, 281, 31);
				
				imagefilledrectangle($sig, 22, 32, 45, 55, $black);
				
				imagestring($sig, 2, 89, 47, $levelWa, $black);
				imagestring($sig, 2, 132, 47, $levelMa, $black);
				imagestring($sig, 2, 177, 47, $levelAr, $black);
				imagestring($sig, 2, 219, 47, $levelAs, $black);
				
				imagestring($sig, 2, 89, 65, $levelKn, $black);
				imagestring($sig, 2, 132, 65, $levelDw, $black);
				imagestring($sig, 2, 177, 65, $levelHu, $black);
				imagestring($sig, 2, 219, 65, $levelNi, $black);
				
				imagestring($sig, 2, 270, 47, $time . "hr", $black);
				imagestring($sig, 2, 356, 47, $chests, $black);
				
				imagestring($sig, 3, 410, 47, "Friends:", $black);
				imagestring($sig, 2, 469, 47, $fri, $black);
				
				imagestring($sig, 2, 270, 65, $blocks . "m", $black);
				imagestring($sig, 2, 356, 65, $ids, $black);
				
				if(isset($_GET['w'])){
					if($_GET['w'] == "2"){
						imagestring($sig, 3, 410, 65, "WBSS2:", $black);
						imagestring($sig, 2, 455, 65, $wbss, $black);
						
						$fww = imagefontwidth(2);
						$lw = strlen($wbss);
						$tww = $lw * $fww;
					
						//imagestring($sig, 1, 456 + $tww, 69, "(21st)", $faded);
					}elseif($_GET['w'] == "1"){
						imagestring($sig, 3, 410, 65, "WBSS1:", $black);
						imagestring($sig, 2, 455, 65, $wbss1, $black);
						
						$fww = imagefontwidth(2);
						$lw = strlen($wbss1);
						$tww = $lw * $fww;
					
						//imagestring($sig, 1, 456 + $tww, 69, "(21st)", $faded);
					}
				}
				
				
				
				imagecopy($sig, $body, 10, 32, 0, 0, 48, 48);
				
				
				imagefilledrectangle($sig, 0, 0, 527, 4, $black);
				imagefilledrectangle($sig, 0, 83, 527, 79, $black);
				
				$x1 = 5;
				$y1 = 10;
				$x2 = 66;
				$y2 = 26;
				$radius = 2; 
				
				imagefilledrectangle($sig, $x1+$radius, $y1, $x2-$radius, $y2, $black);
				imagefilledrectangle($sig, $x1, $y1+$radius, $x2, $y2-$radius, $black);
				imagefilledellipse($sig, $x1+$radius, $y1+$radius, $radius*2, $radius*2, $black);
				imagefilledellipse($sig, $x2-$radius, $y1+$radius, $radius*2, $radius*2, $black);
				imagefilledellipse($sig, $x1+$radius, $y2-$radius, $radius*2, $radius*2, $black);
				imagefilledellipse($sig, $x2-$radius, $y2-$radius, $radius*2, $radius*2, $black);
				
				$x12 = 6;
				$y12 = 11;
				$x22 = 65;
				$y22 = 25;
				
				imagefilledrectangle($sig, $x12+$radius, $y12, $x22-$radius, $y22, $current);
				imagefilledrectangle($sig, $x12, $y12+$radius, $x22, $y22-$radius, $current);
				imagefilledellipse($sig, $x12+$radius, $y12+$radius, $radius*2, $radius*2, $current);
				imagefilledellipse($sig, $x22-$radius, $y12+$radius, $radius*2, $radius*2, $current);
				imagefilledellipse($sig, $x12+$radius, $y22-$radius, $radius*2, $radius*2, $current);
				imagefilledellipse($sig, $x22-$radius, $y22-$radius, $radius*2, $radius*2, $current);
				
				
				$fw = imagefontwidth(2);
				$l = strlen($server);
				$tw = $l * $fw;
				$iw = 61;
				$xpos = (($iw - $tw)/2)+6;
				
				imagestring($sig, 2, $xpos, 12, $server, $faded);
				
				imagefilledrectangle($sig, 0, 3, 527, 3, $shadow1);
				imagefilledrectangle($sig, 0, 4, 527, 4, $shadow2);
				imagefilledrectangle($sig, 0, 5, 527, 5, $shadow3);
				imagefilledrectangle($sig, 0, 6, 527, 6, $shadow4);
				imagefilledrectangle($sig, 0, 7, 527, 7, $shadow5);
				imagefilledrectangle($sig, 0, 8, 527, 8, $shadow6);
				imagefilledrectangle($sig, 0, 9, 527, 9, $shadow7);
				imagefilledrectangle($sig, 0, 10, 527, 10, $shadow8);
				imagefilledrectangle($sig, 0, 11, 527, 11, $shadow9);
				imagefilledrectangle($sig, 0, 12, 527, 12, $shadow10);
				
				imagefilledrectangle($sig, 0, 70, 527, 70, $shadow10);
				imagefilledrectangle($sig, 0, 71, 527, 71, $shadow9);
				imagefilledrectangle($sig, 0, 72, 527, 72, $shadow8);
				imagefilledrectangle($sig, 0, 73, 527, 73, $shadow7);
				imagefilledrectangle($sig, 0, 74, 527, 74, $shadow6);
				imagefilledrectangle($sig, 0, 75, 527, 75, $shadow5);
				imagefilledrectangle($sig, 0, 76, 527, 76, $shadow4);
				imagefilledrectangle($sig, 0, 77, 527, 77, $shadow3);
				imagefilledrectangle($sig, 0, 78, 527, 78, $shadow2);
				imagefilledrectangle($sig, 0, 79, 527, 79, $shadow1);
				
				
				header('Content-type: image/png');
				imagepng($sig) or die('Imaged failed to load');
				imagedestroy($sig);
				
				// http://minecraft-skin-viewer.com/body-all.php?u=Dakotafiles&s=200
			}
		}
	}else{
		$error = imagecreatetruecolor(528, 84);
			
		$red = imagecolorallocate($error, 207, 0, 0);
		$white = imagecolorallocate($error, 255, 255, 255);
			
		imagefilledrectangle($error, 0, 0, 527, 83, $white);
			
		imagestring($error, 6, 10, 38, "Error: Please Enter Username", $red);
		imagerectangle($error, 0, 0, 527, 83, $red);
			
		header('Content-type: image/png');
		imagepng($error) or die('Imaged failed to load');
		imagedestroy($error);
	}
	
?>