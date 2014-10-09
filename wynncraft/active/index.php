<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || Active</title>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../../favicon.ico">
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('require', 'displayfeatures');
  ga('create', 'UA-45368737-2', 'auto');
  ga('send', 'pageview');

</script>
<div id="navbar">
<ul>

	<li id="im"><a href="../../"><img src="../../media/minimal.png" width="150" height="42"  alt=""/></a></li>
    
    <li id="first"><a href="../old/">Home</a></li>
    
    <li><a>Katoa</a>
    	<ul>
        	<li><a href="../../">Forums</a></li>
            <li><a href="../../katoa/active/">Active List</a></li>
            <li><a href="../../katoa/online/">Online Users</a></li>
        </ul>
	</li>
    
    <li class="current"><a>WynnCraft</a>
    	<ul>
        	<li id="currentL"><a href="../items/">Item Guide</a></li>
            <li id="currentL"><a href="../online/">Online Faces</a></li>
        	<li id="currentL2"><a href="">Staff Activity</a></li>
            <li id="currentL"><a href="../active/youtube/">YT Activity</a></li>
            <li id="currentL"><a href="../mob/">GM Mobs</a></li>
            <li id="currentL"><a href="../signature/">Signature</a></li>
        </ul>
	</li>
    
    <li><a>Colour</a>
    	<ul>
        	<li><a href="../../colour/green/">Green</a></li>
            <li><a href="../../colour/pink/">Pink</a></li>
            <li><a href="../../colour/orange/">Orange</a></li>
        </ul>
	</li>
    
    <li><a href="../../choice/">Choices</a></li>
    
    <li><a href="../../insult/">Insults</a></li>
    
</ul>
</div>
<br><br><br>
<div id="title"><div id="left"></div>Staff Last Login<div id="right"></div></div>
<br><br>
<div class="name">Admins: </div><br>
<?php
$admins = array("CrunkleSticks", "Grian", "HiMyNameIsAJ", "Jumla", "MrTwiggy", "rmb938", "Tama63", "Salted");

$mods = array("Acer78", "Chbar", "Chimental", "Compmaster", "D14m0nD", "DaJazzy3", "Dakotafiles", "Emerly_Nickel", "fibunny", "filifolia", "IgbarX", "J6Unlimited", "k_gurl", "LuxioCat", "Marraino", "MissMarionn", "MostValuedPlayer", "Mulax", "Needlr", "Nohats", "PhoenixJHyde", "pinkvest123", "PixelVox", "pretzule", "Riuzake", "Roudan", "sci_fi_nut_123", "steelxawesome", "TheBloking", "TheThinKing", "Tiffany0601", "TKWild", "Unknowninja");

$builders = array("alexkh", "badseed33", "BU1LD", "Capa360", "Chimental", "D14m0nD", "DaJazzy3", "erwintrude", "Grian", "Gudjon262", "hanssie21", "Headset_O", "Henny_cat", "im4life1", "iMannyHD", "just_stijn", "Kaasjen", "Kealron", "KingBob12th", "Mekyr", "MizukiSaito", "N06ody", "Nohats", "oculus27", "pretzule", "S3ok", "Sage33", "shellboy1", "sko1997", "Storm_Smurf", "Svennert", "thomonios", "Trinityde", "UltimateJerkO", "Wortho27", "YoshaMC", "Zanaboss", "_InfinityBox", "_PYREABLE_", "_Tenku_");

$gms = array("bigsnugglebunny", "carlos2x2", "Dakotafiles", "Didag", "Firoblaze", "Grian", "hcbboyhammer12", "Headset_O", "Mekyr", "montyis1000", "Pink_Floyd13", "Salted");
$ia = 0;
$im = 0;
$ib = 0;
$ig = 0;
$i = 0;
$online = array();
foreach($admins as $key => $value) {
	$value = "http://wynncraft.com/api/public_api.php?action=playerStats&command=" . $value;
	$userJson = file_get_contents($value);
	$userJsonDecode = json_decode($userJson,true);
	$time = $userJsonDecode["since_last_login"];
	if($userJsonDecode["current_server"] == "null"){
		$online = "";
	}else{
		$online = "- User is currently on server " . $userJsonDecode["current_server"] . "! -";
		$ia++;
	}
	echo "<div class=\"line\"><img src=\"http://wynncraft.com/api/avatar/" . $admins[$key] . "/32.png\" class=\"img\" > <span class=\"name\"><a href=\"http://wynncraft.com/player/" . $admins[$key] . "\" class=\"name\">" . $admins[$key] . ":</a></span><span class=\"time\">" . $time . "</span><span class=\"online\">" . $online . "</span></div>";
}

echo "<br><br><div class=\"name\">Moderators: </div><br>";
foreach($mods as $key => $value) {
	$value = "http://wynncraft.com/api/public_api.php?action=playerStats&command=" . $value;
	$userJson = file_get_contents($value);
	$userJsonDecode = json_decode($userJson,true);
	$time = $userJsonDecode["since_last_login"];
	if($userJsonDecode["current_server"] == "null"){
		$online = "";
	}else{
		$online = "- User is currently on server " . $userJsonDecode["current_server"] . "! -";
		$im++;
	}
	echo "<div class=\"line\"><img src=\"http://wynncraft.com/api/avatar/" . $mods[$key] . "/32.png\" class=\"img\" > <span class=\"name\"><a href=\"http://wynncraft.com/player/" . $mods[$key] . "\" class=\"name\">" . $mods[$key] . ":</a></span><span class=\"time\">" . $time . "</span><span class=\"online\">" . $online . "</span></div>";
}

echo "<br><br><div class=\"name\">Builders: </div><br>";
foreach($builders as $key => $value) {
	$value = "http://wynncraft.com/api/public_api.php?action=playerStats&command=" . $value;
	$userJson = file_get_contents($value);
	$userJsonDecode = json_decode($userJson,true);
	$time = $userJsonDecode["since_last_login"];
	if($userJsonDecode["current_server"] == "null"){
		$online = "";
	}else{
		$online = "- User is currently on server " . $userJsonDecode["current_server"] . "! -";
		$ib++;
	}
	echo "<div class=\"line\"><img src=\"http://wynncraft.com/api/avatar/" . $builders[$key] . "/32.png\" class=\"img\" > <span class=\"name\"><a href=\"http://wynncraft.com/player/" . $builders[$key] . "\" class=\"name\">" . $builders[$key] . ":</a></span><span class=\"time\">" . $time . "</span><span class=\"online\">" . $online . "</span></div>";
}

echo "<br><br><div class=\"name\">Game Masters: </div><br>";
foreach($gms as $key => $value) {
	$value = "http://wynncraft.com/api/public_api.php?action=playerStats&command=" . $value;
	$userJson = file_get_contents($value);
	$userJsonDecode = json_decode($userJson,true);
	$time = $userJsonDecode["since_last_login"];
	if($userJsonDecode["current_server"] == "null"){
		$online = "";
	}else{
		$online = "- User is currently on server " . $userJsonDecode["current_server"] . "! -";
		$ig++;
	}
	echo "<div class=\"line\"><img src=\"http://wynncraft.com/api/avatar/" . $gms[$key] . "/32.png\" class=\"img\" > <span class=\"name\"><a href=\"http://wynncraft.com/player/" . $gms[$key] . "\" class=\"name\">" . $gms[$key] . ":</a></span><span class=\"time\">" . $time . "</span><span class=\"online\">" . $online . "</span></div>";
	
}
unset($value);
echo "<br/><br/>";
$pla = "admins";
$plm = "moderators";
$plb = "builders";
$plg = "game masters";
$plTest = array("pla" => "iadmin", "plm" => "imoderator", "plb" => "ibuilder", "plg" => "igame master");
foreach($plTest as $key => $val){
	$a = substr($val, 0, 2);
	$b = substr($val, 1);
	if(${$a} == 1){
		${$key} = $b;
	}
}
echo "<div class=\"name\">There are currently " . $ia . " " . $pla .", " . $im . " " . $plm .", " . $ib . " " . $plb .", and " . $ig . " " . $plg ." online!</div>";
?>
<br/><br/>
</body>
</html>