<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || Online JSFS</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body background="../../media/bg.png">
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
        	<li><a href="../../wynncraft/items/">Item Guide</a></li>
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
<br><br><br><br>
<div id="title">Players Online: 
<?php
require 'query.php';
$Query = new MinecraftQuery();
try{
    $Query->Connect('jsanofanserver.com', 25567);
    $online = 'true';
	$stats = $Query->GetInfo();
}
catch( MinecraftQueryException $e ){
	echo $e->getMessage( );
	$online = 'false';
	$stats = array('Players' => '0', 'MaxPlayers' => '0');
}
if($online = true){
	echo $stats['Players'];
?>
</div>
<br><br>
<div id="faces">
<?php
	if(($Players = $Query->GetPlayers()) !== false) {
		foreach($Players as $Player) {
			$value = "<div class=\"wrapper\" id=\"" . $Player . "\"><img src=\"http://wynncraft.com/api/avatar/" . $Player . "/80.png\" class=\"hover\" title=\""  . $Player . " is online!\"></div>";
			echo $value;
		}
	}
}
?>
</div>

</body>
</html>