<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || JSFS Members</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="../../favicon.ico">
</head>

<body background="../../media/bg.png">
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

	<li id="im"><a href="/"><img src="../../media/minimal.png" width="150" height="42"  alt=""/></a></li>
    
    <li id="first"><a href="../../old/">Home</a></li>
    
    <li><a>Katoa</a>
    	<ul>
        	<li><a href="../../">Forums</a></li>
            <li><a href="../../katoa/active/">Active List</a></li>
            <li><a href="../../katoa/online/">Online Users</a></li>
        </ul>
	</li>
    
        <li><a>WynnCraft</a>
    	<ul>
        	<li><a href="../../wynncraft/items">Item Guide</a></li>
            <li><a href="../../wynncraft/online/">Online Faces</a></li>
        	<li><a href="../../wynncraft/active/">Staff Activity</a></li>
            <li><a href="../../wynncraft/active/youtube/">YT Activity</a></li>
            <li><a href="../../wynncraft/mob/">GM Mobs</a></li>
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
<div id="faces">
<?php
	$json = "http://jsanofanserver.com/whitelist.json";
	$userJson = file_get_contents($json);
	$ujd = json_decode($userJson,true);
	
	$users = array();
	$i = 0;
	
	//, "" => ""
	//, "alt" => ""
	//, "youtube" => "xx"
	//, "twitter" => ""
	
	$userInfo = array(
	"94keegan" => array("name" => "94keegan"),
	"aceneye" => array("name" => "aceneye", "youtube" => "https://www.youtube.com/user/kaywhyelleee", "reddit" => "http://www.reddit.com/user/aceneye", "twitter" => "https://twitter.com/Aceneye"),
	"Ames1" => array("name" => "Ames1"),
	"AwesomeMexican" => array("name" => "AwesomeMexican"),
	"BlueBayou" => array("name" => "BlueBayou", "youtube" => "https://www.youtube.com/user/justcallmebluelp", "reddit" => "http://www.reddit.com/user/BlueBayou", "twitter" => "https://twitter.com/justcallmeblue"),
	"BrewCam" => array("name" => "BrewCam", "alt" => "specialbreh"),
	"buufudyne" => array("name" => "buufudyne", "twitter" => "https://twitter.com/bufudyner"),
	"canuckbacon" => array("name" => "canuckbacon", "reddit" => "http://www.reddit.com/user/CanuckBacon"),
	"Chriscraft98" => array("name" => "Chriscraft98"),
	"ckreidler" => array("name" => "ckreidler", "reddit" => "http://www.reddit.com/user/mechakreidler", "twitter" => "https://twitter.com/chriskreidler"),
	"cleverstupidity" => array("name" => "cleverstupidity"),
	"Conflictt99" => array("name" => "Conflictt99", "youtube" => "https://www.youtube.com/user/Conflicttion", "reddit" => "http://www.reddit.com/user/Conflictt", "twitter" => "https://twitter.com/Conflicttion"),
	"Dakotafiles" => array("name" => "Dakotafiles", "youtube" => "https://www.youtube.com/user/DakotaTheLeprechaun", "reddit" => "http://www.reddit.com/user/DakotaTheLeprechaun"),
	"demultiplexer" => array("name" => "demultiplexer", "reddit" => "http://www.reddit.com/user/demultiplexer"),
	"Diavolo1998" => array("name" => "Diavolo1998", "youtube" => "https://www.youtube.com/user/Diavolomc", "reddit" => "http://www.reddit.com/user/Diavolo1998", "twitter" => "https://twitter.com/Diavolomc"),
	"Dravarden" => array("name" => "Dravarden", "reddit" => "http://www.reddit.com/user/Dravarden", "youtube" => "https://www.youtube.com/user/Dravarden"),
	"Exschwasion" => array("name" => "Exschwasion"),
	"Flygon1234" => array("name" => "Flygon1234", "reddit" => "http://www.reddit.com/user/Flygon1234"),
	"Froot_Fly" => array("name" => "Froot_Fly", "youtube" => "https://www.youtube.com/user/FrootFlyVids", "reddit" => "http://www.reddit.com/user/Froot_Fly", "twitter" => "https://twitter.com/Froot_Fly"),
	"gerhuyy" => array("name" => "gerhuyy"),
	"gomenemui" => array("name" => "gomenemui"),
	"h123456" => array("name" => "h123456"),
	"Hollywood828" => array("name" => "Hollywood828", "youtube" => "https://www.youtube.com/user/TheHollywood828", "reddit" => "http://www.reddit.com/user/Hollywood828", "twitter" => "https://twitter.com/TheHollywood828"),
	"iSuchtel" => array("name" => "iSuchtel", "youtube" => "https://www.youtube.com/user/iSuchtel", "reddit" => "http://www.reddit.com/user/iSuchtel", "twitter" => "https://twitter.com/AdrianG_e"),
	"ixamxcool" => array("name" => "ixamxcool", "reddit" => "http://www.reddit.com/user/suckitbears", "youtube" => "https://www.youtube.com/user/IxamLP"),
	"jadmurdoch1986" => array("name" => "jadmurdoch1986", "youtube" => "https://www.youtube.com/user/jadmurdoch1986", "reddit" => "http://www.reddit.com/user/Jadmurdoch1986", "twitter" => "https://twitter.com/Jadmurdoch1986"),
	"jonnymaster3ooo" => array("name" => "jonnymaster3ooo", "reddit" => "http://www.reddit.com/user/jonnymaster3ooo", "youtube" => "https://www.youtube.com/user/JDFFilms"),
	"Jrobb812" => array("name" => "Jrobb812", "reddit" => "http://www.reddit.com/user/Me_WaitForIt_Ta"),
	"jsano19" => array("name" => "jsano19", "youtube" => "https://www.youtube.com/user/JSano19", "twitter" => "https://twitter.com/jsano19", "twitch" => "http://www.twitch.tv/jsano19", "reddit" => "http://www.reddit.com/user/Jsano19"),
	"Kusag" => array("name" => "Kusag", "reddit" => "http://www.reddit.com/user/Placidlogic"),
	"Lemonszz" => array("name" => "Lemonszz", "reddit" => "http://www.reddit.com/user/lemonszz", "youtube" => "https://www.youtube.com/user/LemonVerse", "twitter" => "https://twitter.com/Lem0nverse"),
	"Lleweyln" => array("name" => "Lleweyln"),
	"lnbooks" => array("name" => "lnbooks", "youtube" => "https://www.youtube.com/user/TheAceCanoe", "reddit" => "http://www.reddit.com/user/Ace_Canoe"),
	"Lurkki2" => array("name" => "Lurkki2"),
	"LythoT" => array("name" => "LythoT", "youtube" => "https://www.youtube.com/user/LythoT", "reddit" => "http://www.reddit.com/user/LythoT", "twitter" => "https://twitter.com/LythoT"),
	"M3w2" => array("name" => "M3w2", "reddit" => "http://www.reddit.com/user/M3w2", "youtube" => "https://www.youtube.com/user/gruosd"),
	"Maradar" => array("name" => "Maradar", "reddit" => "http://www.reddit.com/user/Maradar", "youtube" => "https://www.youtube.com/user/MaradarLPS"),
	"matthamew" => array("name" => "matthamew", "youtube" => "https://www.youtube.com/user/MatthamewP", "reddit" => "http://www.reddit.com/user/Matthamew", "twitter" => "https://twitter.com/Matthamew"),
	"meh699" => array("name" => "meh699", "youtube" => "https://www.youtube.com/user/Multitasker1023", "reddit" => "http://www.reddit.com/user/meh699", "twitter" => "https://twitter.com/R3dd_slayer"),
	"momohime2000" => array("name" => "momohime2000"),
	"Muckluck" => array("name" => "Muckluck", "youtube" => "https://www.youtube.com/user/MrMuckluckable", "reddit" => "http://www.reddit.com/user/Muckluck92", "twitter" => "https://twitter.com/MrMuckluckable"),
	"natman50" => array("name" => "natman50", "alt" => "Froot_Fly"),
	"nfrogs1" => array("name" => "nfrogs1", "alt" => "TheMerryGamer"),
	"niallww41" => array("name" => "niallww41", "twitter" => "https://twitter.com/_niallwalsh_"),
	"NotoriousPark" => array("name" => "NotoriousPark", "youtube" => "https://www.youtube.com/channel/UCieH5ZSbpnB-uPdR6ho8otA", "reddit" => "http://www.reddit.com/user/The_Puzzler", "twitter" => "https://twitter.com/The_Puzzler111"),
	"ottsboy" => array("name" => "ottsboy", "youtube" => "https://www.youtube.com/user/ottsboy2000", "reddit" => "http://www.reddit.com/user/ottsboy"),
	"pinkeyeZ" => array("name" => "pinkeyeZ", "reddit" => "http://www.reddit.com/user/pinkeyeZ", "youtube" => "https://www.youtube.com/user/thepinkeyezz"),
	"PoshNPie" => array("name" => "PoshNPie", "reddit" => "http://www.reddit.com/user/PoshNpie", "youtube" => "https://www.youtube.com/user/PoshLP"),
	"quisnam" => array("name" => "quisnam", "reddit" => "http://www.reddit.com/user/Quisnam", "youtube" => "https://www.youtube.com/user/QuisnamOfGallifrey", "twitter" => "https://twitter.com/BenDownie"),
	"rad504" => array("name" => "rad504", "youtube" => "https://www.youtube.com/user/rad504lp", "reddit" => "http://www.reddit.com/user/rad504", "twitter" => "https://twitter.com/rad504lp"),
	"radrdff" => array("name" => "radrdff", "alt" => "rad504"),
	"RajPatel23" => array("name" => "RajPatel23"),
	"randytan" => array("name" => "randytan", "youtube" => "https://www.youtube.com/user/makahabradda2", "reddit" => "http://www.reddit.com/user/dedbird808"),
	"rdude343" => array("name" => "rdude343"),
	"RebekahWSD" => array("name" => "RebekahWSD", "twitter" => "https://twitter.com/RebekahWSD"),
	"Red_No_Blue" => array("name" => "Red_No_Blue", "youtube" => "https://www.youtube.com/user/rednobluenz", "reddit" => "http://www.reddit.com/user/Rednoblue"),
	"ripck" => array("name" => "ripck", "youtube" => "https://www.youtube.com/user/MrRipck", "reddit" => "http://www.reddit.com/user/ripck", "twitter" => "https://twitter.com/Ripck"),
	"RoosterBread" => array("name" => "RoosterBread"),
	"Scazzerd98" => array("name" => "Scazzerd98", "reddit" => "http://www.reddit.com/user/Scazzerd"),
	"Schnitzel_Cam" => array("name" => "Schnitzel_Cam", "alt" => "iSuchtel"),
	"sfroggy1" => array("name" => "sfroggy1"),
	"SirMaxus" => array("name" => "SirMaxus", "youtube" => "https://www.youtube.com/user/SirMaxusLP", "reddit" => "http://www.reddit.com/user/SirMaxus", "twitter" => "https://twitter.com/SirMaxus"),
	"SkunoLP" => array("name" => "SkunoLP"),
	"Skylinerw" => array("name" => "Skylinerw"),
	"slaveheus" => array("name" => "slaveheus"),
	"specialbreh" => array("name" => "specialbreh", "youtube" => "https://www.youtube.com/user/specialbreh", "reddit" => "http://www.reddit.com/user/specialbreh", "twitter" => "https://twitter.com/specialbreh"),
	"spg_SCOTT" => array("name" => "spg_SCOTT", "reddit" => "http://www.reddit.com/user/spg_SCOTT"),
	"Tbone211" => array("name" => "Tbone211", "alt" => "LythoT"),
	"thebigestkiller" => array("name" => "thebigestkiller", "twitter" => "https://twitter.com/thebigestkiller", "reddit" => "http://www.reddit.com/user/thebigestkiller"),
	"TheMerryGamer" => array("name" => "TheMerryGamer", "youtube" => "https://www.youtube.com/user/TheMerryGamer", "reddit" => "http://www.reddit.com/user/TheMerryGamer", "twitter" => "https://twitter.com/TheMerryGamer"),
	"tylark" => array("name" => "tylark", "youtube" => "https://www.youtube.com/user/TylarkLP", "reddit" => "http://www.reddit.com/user/natureprick"),
	"ultim8kip" => array("name" => "ultim8kip", "alt" => "__owlie"),
	"W92Baj" => array("name" => "W92Baj", "youtube" => "https://www.youtube.com/user/W92Baj", "twitter" => "https://twitter.com/W92Baj", "twitch" => "http://www.twitch.tv/w92baj", "reddit" => "http://www.reddit.com/user/W92Baj"),
	"WynnCraft" => array("name" => "WynnCraft", "alt" => "Dakotafiles"),
	"zigaP9" => array("name" => "zigaP9"),
	"__owlie" => array("name" => "__owlie", "reddit" => "http://www.reddit.com/user/woofwolf", "twitter" => "https://twitter.com/hanidog")
	);
	
	foreach($ujd as $key => $val){
		$name = $ujd[$key]["name"];
		$users[$i] = $name;
		$i++;
	}
	natcasesort($users);
	foreach($users as $key => $val){
		$face = "<img src=\"http://wynncraft.com/api/avatar/" . $val . "/96.png\" title=\"" . $val . "\">";
		$reddit = "<img src=\"media/noreddit.png\">";
		$twitter = "<img src=\"media/notwitter.png\">";
		$youtube = "<img src=\"media/noyoutube.png\">";
		$twitch = "<img src=\"media/notwitch.png\">";
		
		if(isset($userInfo[$val]["reddit"])){
			$reddit = "<a href=\"" . $userInfo[$val]["reddit"] . "\"><img src=\"media/reddit.png\"></a>";
		}
		
		if(isset($userInfo[$val]["twitter"])){
			$twitter = "<a href=\"" . $userInfo[$val]["twitter"] . "\"><img src=\"media/twitter.png\"></a>";
		}
		
		if(isset($userInfo[$val]["youtube"])){
			$youtube = "<a href=\"" . $userInfo[$val]["youtube"] . "\"><img src=\"media/youtube.png\"></a>";
		}
		
		if(isset($userInfo[$val]["twitch"])){
			$twitch = "<a href=\"" . $userInfo[$val]["twitch"] . "\"><img src=\"media/twitch.png\"></a>";
		}
		
		$images = "<div class=\"websites\">" . $reddit . $twitter . $youtube . $twitch . "</div>";
		
		if(isset($userInfo[$val]["alt"])){
			$images = "<div class=\"websites\"><img src=\"http://wynncraft.com/api/avatar/" . $userInfo[$val]["alt"] ."/16.png\" title=\"Alt of " . $userInfo[$val]["alt"] . "\">" . $userInfo[$val]["alt"] . "</div>";
		}
		
		echo "<div class=\"wrapper\">" . $face . "<span class=\"playerBack\"><span class=\"playerName\">" . $val . "</span></span>" . $images . "</div>";
	}


?>
</div>
</body>
</html>