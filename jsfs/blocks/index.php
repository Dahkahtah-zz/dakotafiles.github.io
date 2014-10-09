<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || JSFS Blocks</title>
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
function cmp($a, $b)
{
    return strcasecmp($a["name"], $b["name"]);
}
$active = array();
$totStone = 0;
$totGravel = 0;
$totDirt = 0;
$totSand = 0;
$totLog = 0;
$totNetherrack = 0;
foreach($wlJD as $key => $val){
	$name = $wlJD[$key]["name"];
	$uuid = $wlJD[$key]["uuid"];
	
	$statsJson = @file_get_contents("http://jsanofanserver.com/jsonstats/" . $uuid . ".json");
	$statsJD = json_decode($statsJson, true);
	
	if(isset($statsJD)){
		$whitelist[$uuid] = $name;
		
		$stone = ""; if(isset($statsJD["stat.mineBlock.minecraft.stone"])){$stone = $statsJD["stat.mineBlock.minecraft.stone"];}else{$stone = 0;}
		$gravel = ""; if(isset($statsJD["stat.mineBlock.minecraft.gravel"])){$gravel = $statsJD["stat.mineBlock.minecraft.gravel"];}else{$gravel = 0;}
		$dirt = ""; if(isset($statsJD["stat.mineBlock.minecraft.dirt"])){$dirt = $statsJD["stat.mineBlock.minecraft.dirt"];}else{$dirt = 0;}
		$sand = ""; if(isset($statsJD["stat.mineBlock.minecraft.sand"])){$sand = $statsJD["stat.mineBlock.minecraft.sand"];}else{$sand = 0;}
		$log1 = ""; if(isset($statsJD["stat.mineBlock.minecraft.log"])){$log1 = $statsJD["stat.mineBlock.minecraft.log"];}else{$log1 = 0;}
		$log2 = ""; if(isset($statsJD["stat.mineBlock.minecraft.log2"])){$log2 = $statsJD["stat.mineBlock.minecraft.log2"];}else{$log2 = 0;}
		$log = $log1 + $log2;
		$netherrack = ""; if(isset($statsJD["stat.mineBlock.minecraft.netherrack"])){$netherrack = $statsJD["stat.mineBlock.minecraft.netherrack"];}else{$netherrack = 0;}
		
		$totStone = $totStone + $stone;
		$totGravel = $totGravel + $gravel;
		$totDirt = $totDirt + $dirt;
		$totSand = $totSand + $sand;
		$totLog = $totLog + $log;
		$totNetherrack = $totNetherrack + $netherrack;
		
		$active[$uuid] = array("name" => $name, "stone" => $stone, "gravel" => $gravel, "dirt" => $dirt, "sand" => $sand, "log" => $log, "netherrack" => $netherrack);
	}
}
usort($active, "cmp");


echo "<table id=\"item\" class=\"sortable\">";
echo "<thead id=\"title\"><td></td><td>Name</td><td><img src=\"media/stone.gif\"></td><td><img src=\"media/gravel.png\"></td><td><img src=\"media/dirt.gif\"></td><td><img src=\"media/sand.gif\"></td><td><img src=\"media/log.gif\"></td><td><img src=\"media/netherrack.png\"></td></thead><tbody>";
$i = 1;
foreach($active as $uuid => $array){
	$name = $active[$uuid]["name"];
	
	$stone = $active[$uuid]["stone"];
	$gravel = $active[$uuid]["gravel"];
	$dirt = $active[$uuid]["dirt"];
	$sand = $active[$uuid]["sand"];
	$log = $active[$uuid]["log"];
	$netherrack = $active[$uuid]["netherrack"];
	
	echo "<tr><td>".$i."</td><td><img src=\"http://wynncraft.com/api/avatar/".$name."/24.png\"/>&nbsp;&nbsp;&nbsp;&nbsp;".$name."</td><td>".$stone."</td><td>".$gravel."</td><td>".$dirt."</td><td>".$sand."</td><td>".$log."</td><td>".$netherrack."</td></tr>";
	
	$i++;
}

echo "<tr><td></td><td>Total</td><td>".$totStone."</td><td>".$totGravel."</td><td>".$totDirt."</td><td>".$totSand."</td><td>".$totLog."</td><td>".$totNetherrack."</td></tr>";
echo "</tbody></table>";

?>

<div id="thumbnail"><img src="../../media/wombo.png"></div>
</body>
</html>