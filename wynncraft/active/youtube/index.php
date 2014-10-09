<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || Stalking</title>

<link href='http://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../../../favicon.ico">
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

	<li id="im"><a href="../../../"><img src="../../../media/minimal.png" width="150" height="42"  alt=""/></a></li>
    
    <li id="first"><a href="../../../old/">Home</a></li>
    
    <li><a>Katoa</a>
    	<ul>
        	<li><a href="../../../">Forums</a></li>
            <li><a href="../../../katoa/active/">Active List</a></li>
            <li><a href="../../../katoa/online/">Online Users</a></li>
        </ul>
	</li>
    
    <li class="current"><a>WynnCraft</a>
    	<ul>
        	<li id="currentL"><a href="../../items/">Item Guide</a></li>
            <li id="currentL"><a href="../../online/">Online Faces</a></li>
        	<li id="currentL"><a href="../">Staff Activity</a></li>
            <li id="currentL2"><a href="">YT Activity</a></li>
            <li id="currentL"><a href="../../mob/">GM Mobs</a></li>
            <li id="currentL"><a href="../../signature/">Signature</a></li>
        </ul>
	</li>
    
    <li><a>Colour</a>
    	<ul>
        	<li><a href="../../../colour/green/">Green</a></li>
            <li><a href="../../../colour/pink/">Pink</a></li>
            <li><a href="../../../colour/orange/">Orange</a></li>
        </ul>
	</li>
    
    <li><a href="../../../choice/">Choices</a></li>
    
    <li><a href="../../../insult/">Insults</a></li>
    
</ul>
</div>
<br><br>
<div id="title"><div id="left"></div>Youtubers' Last Login<div id="right"></div></div>
<br><br>
<?php
$users = array("adlingtont", "AnderZEL", "AntVenom", "Arkas", "ASFjerome", "Aureylian", "AvidyaZEN", "BajanCanadian", "Bashur", "BdoubleO100", "BebopVox", "BertieChap", "BlameTC", "BouledeNeige", "BruceWillakers", "CaptainSparklez", "Coestar", "DanTDM", "Dartron", "deadlox", "direwolf20", "Docm77", "Etho", "GameChap", "generikb", "Guude", "Honeydew", "HuskyMudkipper", "ihasCupquake", "inthelittlewood", "ItsHarry", "ItsJerry", "jsano19", "kurtmac", "mcgamer", "Mhykol", "Millbee", "MunchingBrotato", "Nebris", "OldManWillakers", "Pakratt0013", "paulsoaresjr", "PauseUnpause", "Pyro_0", "Salted", "SethBling", "sevadus", "Sips_", "Sjin", "SkythekidRS", "SSundee", "thejims", "TrueMU", "Vechs_", "VintageBeef", "W92Baj", "Xephos", "Zisteau");

foreach($users as $key => $value) {
	$web = "http://wynncraft.com/api/public_api.php?action=playerStats&command=" . $value;
	if (@get_headers($web)[0] == "HTTP/1.1 200 OK"){
		$userJson = file_get_contents($web);
		$userJsonDecode = json_decode($userJson,true);
		$time = $userJsonDecode["since_last_login"];
		if($userJsonDecode["current_server"] == "null"){
			$online = "";
		}else{
			$online = "- User is currently on server " . $userJsonDecode["current_server"] . "! -";
		}
		echo "<div class=\"line\"><img src=\"http://wynncraft.com/api/avatar/" . $users[$key] . "/32.png\" class=\"img\" > <span class=\"name\"><a href=\"http://wynncraft.com/player/" . $users[$key] . "\" class=\"name\">" . $users[$key] . ":</a></span><span class=\"time\">" . $time . "</span><span class=\"online\">" . $online . "</span></div>";
	}
}
unset($value);
?>
<div id="namesHover"><span id="hoverText">- Hover to view youtubers being checked -</span><div id="names">Currently checking the youtubers: adlingtont, AnderZEL, AntVenom, Arkas, ASFjerome, Aureylian, AvidyaZEN, BajanCanadian, Bashur, BdoubleO100, BebopVox, BertieChap, BlameTC, BouledeNeige, BruceWillakers, CaptainSparklez, Coestar, DanTDM, Dartron, deadlox, direwolf20, Docm77, Etho, GameChap, generikb, Guude, Honeydew, HuskyMudkipper, ihasCupquake, inthelittlewood, ItsHarry, ItsJerry, jsano19, kurtmac, mcgamer, Mhykol, Millbee, MunchingBrotato, Nebris, OldManWillakers, Pakratt0013, paulsoaresjr, PauseUnpause, Pyro_0, Salted, SethBling, sevadus, Sips_, Sjin, SkythekidRS, SSundee, thejims, TrueMU, Vechs_, VintageBeef, W92Baj, Xephos, and Zisteau<br>
If I got a name wrong, or you want me to add other ones, <a href="http://forums.wynncraft.com/conversations/add?to=Dakota">message me!</a></div></div>
</body>
</html>