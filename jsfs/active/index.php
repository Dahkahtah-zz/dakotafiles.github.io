<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || JSFS Activity</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../../wynncraft/items/sorttable.js"></script>
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

	<li id="im"><a href="../../"><img src="../../media/minimal.png" width="150" height="42"  alt=""/></a></li>
    
    <li id="first"><a href="../old/">Home</a></li>
    
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
            <li><a href="../../wynncraft/signature/">Signature</a></li>
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
<br/><br/><br/>

<?php
$wlJson = @file_get_contents("http://jsanofanserver.com/whitelist.json");
$wlJD = json_decode($wlJson, true);
$whitelist = array();
$active = array();
foreach($wlJD as $key => $val){
	$name = $wlJD[$key]["name"];
	$uuid = $wlJD[$key]["uuid"];
	
	$statsJson = @file_get_contents("http://jsanofanserver.com/jsonstats/" . $uuid . ".json");
	$statsJD = json_decode($statsJson, true);
	
	if(isset($statsJD)){
		$whitelist[$uuid] = $name;
		$active[$uuid] = $statsJD["stat.playOneMinute"];
	}
}
arsort($active);


echo "<table id=\"item\" class=\"sortable\">";
echo "<thead id=\"title\"><td>Place</td><td>Name</td><td>Deaths</td><td>Mobs Killed</td><td>Players Killed</td><td>Online Time</td></thead><tbody>";
$i = 1;
foreach($active as $uuid => $minutes){
	$statsJson = @file_get_contents("http://jsanofanserver.com/jsonstats/" . $uuid . ".json");
	$statsJD = json_decode($statsJson, true);
	
	$name = $whitelist[$uuid];
	$deaths = ""; if(isset($statsJD["stat.deaths"])){$deaths = $statsJD["stat.deaths"];}else{$deaths = 0;}
	$mobs = ""; if(isset($statsJD["stat.mobKills"])){$mobs = $statsJD["stat.mobKills"];}else{$mobs = 0;}
	$kills = ""; if(isset($statsJD["stat.playerKills"])){$kills = $statsJD["stat.playerKills"];}else{$kills = 0;}
	$timeR = $minutes * 0.052;
	$hours = round($timeR / 3600);
	$minutes = round(($timeR % 3600) / 60);
	$seconds = ($timeR % 3600) % 60;
	
	echo "<tr><td>".$i."</td><td><img src=\"http://wynncraft.com/api/avatar/".$name."/24.png\"/>&nbsp;&nbsp;&nbsp;&nbsp;".$name."</td><td>".$deaths."</td><td>".$mobs."</td><td>".$kills."</td><td>".$hours." Hours, ".$minutes." Minutes, ".$seconds." Seconds</td></tr>";
	$i++;
}

echo "</tbody></table>";

?>

<div id="thumbnail"><img src="../../media/wombo.png"></div>
</body>
</html>