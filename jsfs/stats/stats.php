<?php
if(isset($_GET["u"]) && !empty($_GET["u"])){
	
}else{
	header("Location: index.html");
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || Stats</title>
<link href="statstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="Back1"></div>
<div id="Back2"></div>
<div id="Back3"></div>


<?php
$name = $_GET['u'];
$uuidJson = @file_get_contents("https://api.mojang.com/users/profiles/minecraft/" . $name);
if(!$uuidJson){
	echo "<div id=\"error\">Not a valid username!</div>";
}else{
	$uuidJD = json_decode($uuidJson,true);
	$uuidF = $uuidJD["id"];
	echo $uuidF;
	/*$uuid = substr($uuidF, 0, 8) . "-" . substr($uuidF, 8, 4) . "-" . substr($uuidF, 12, 4) . "-" . substr($uuidF, 16, 4) . "-" . substr($uuidF, 20, 12);
	$statsJson = @file_get_contents("http://jsanofanserver.com/jsonstats/" . $uuid . ".json");
	if(!$statsJson){
		echo "<div id=\"error\">No stats recorded!</div>";
	}else{
		$stats = json_decode($statsJson,true);
		echo "<div id=\"username\">" . $name . "</div><br><img src=\"";
	}*/
}

?>
</body>
</html>