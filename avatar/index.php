<?php
if(isset($_GET["u"]) && !empty($_GET["u"]) && isset($_GET["t"]) && !empty($_GET["t"])){
	$name = $_GET["u"];
	$uuidJson = @file_get_contents("https://api.mojang.com/users/profiles/minecraft/" . $name);
	if(!$uuidJson){
		echo "error: not a valid minecraft username";
	}else{
		$uuidJD = json_decode($uuidJson,true);
		$uuid = $uuidJD["id"];
		
		echo $uuid;
		
		$textureJson = @file_get_contents("https://sessionserver.mojang.com/session/minecraft/profile/" . $uuid);
		$textureJD = json_decode($textureJson,true);
		if(isset($textureJD["error"])){
			echo "error: mojang is an asshole";
		}else{
			$base64 = $textureJD["properties"]["value"];
		
			echo base64_decode($base64);
		}
		
	}
}else{
	echo "error: must include type and size";
}


?>