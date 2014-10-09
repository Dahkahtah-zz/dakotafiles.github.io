<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || JSFS Ores</title>
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
function cmp($a, $b) {
        return $b["abba"] - $a["abba"];
}
$active = array();
$totCoal = 0;
$totIron = 0;
$totQuartz = 0;
$totRedstone = 0;
$totLapis = 0;
$totGold = 0;
$totEmerald = 0;
$totDiamond = 0;
$totAbba = 0;
foreach($wlJD as $key => $val){
	$name = $wlJD[$key]["name"];
	$uuid = $wlJD[$key]["uuid"];
	
	$statsJson = @file_get_contents("http://jsanofanserver.com/jsonstats/" . $uuid . ".json");
	$statsJD = json_decode($statsJson, true);
	
	if(isset($statsJD)){
		$whitelist[$uuid] = $name;
		
		$coal = ""; if(isset($statsJD["stat.mineBlock.minecraft.coal_ore"])){$coal = $statsJD["stat.mineBlock.minecraft.coal_ore"];}else{$coal = 0;}
		$iron = ""; if(isset($statsJD["stat.mineBlock.minecraft.iron_ore"])){$iron = $statsJD["stat.mineBlock.minecraft.iron_ore"];}else{$iron = 0;}
		$quartz = ""; if(isset($statsJD["stat.mineBlock.minecraft.quartz_ore"])){$quartz = $statsJD["stat.mineBlock.minecraft.quartz_ore"];}else{$quartz = 0;}
		$redstone = ""; if(isset($statsJD["stat.mineBlock.minecraft.redstone_ore"])){$redstone = $statsJD["stat.mineBlock.minecraft.redstone_ore"];}else{$redstone = 0;}
		$lapis = ""; if(isset($statsJD["stat.mineBlock.minecraft.lapis_ore"])){$lapis = $statsJD["stat.mineBlock.minecraft.lapis_ore"];}else{$lapis = 0;}
		$gold = ""; if(isset($statsJD["stat.mineBlock.minecraft.gold_ore"])){$gold = $statsJD["stat.mineBlock.minecraft.gold_ore"];}else{$gold = 0;}
		$emerald = ""; if(isset($statsJD["stat.mineBlock.minecraft.emerald_ore"])){$emerald = $statsJD["stat.mineBlock.minecraft.emerald_ore"];}else{$emerald = 0;}
		$diamond = ""; if(isset($statsJD["stat.mineBlock.minecraft.diamond_ore"])){$diamond = $statsJD["stat.mineBlock.minecraft.diamond_ore"];}else{$diamond = 0;}
		
		$abba = ($emerald * 7) + ($diamond * 5) + ($gold * 3) + $lapis + $redstone;
		
		$totCoal = $totCoal + $coal;
		$totIron = $totIron + $iron;
		$totQuartz = $totQuartz + $quartz;
		$totRedstone = $totRedstone + $redstone;
		$totLapis = $totLapis + $lapis;
		$totGold = $totGold + $gold;
		$totEmerald = $totEmerald + $emerald;
		$totDiamond = $totDiamond + $diamond;
		$totAbba = $totAbba + $abba;
		
		$active[$uuid] = array("name" => $name, "coal" => $coal, "iron" => $iron, "quartz" => $quartz, "redstone" => $redstone, "lapis" => $lapis, "gold" => $gold, "emerald" => $emerald, "diamond" => $diamond, "abba" => $abba);
	}
}
usort($active, "cmp");


echo "<table id=\"item\" class=\"sortable\">";
echo "<thead id=\"title\"><td>Place</td><td>Name</td><td><img src=\"media/coal.png\"></td><td><img src=\"media/iron.png\"></td><td><img src=\"media/quartz.png\"></td><td><img src=\"media/redstone.png\"></td><td><img src=\"media/lapis.png\"></td><td><img src=\"media/gold.png\"></td><td><img src=\"media/emerald.png\"></td><td><img src=\"media/diamond.png\"></td><td>Abba Points</td></thead><tbody>";
$i = 1;
foreach($active as $uuid => $array){
	$name = $active[$uuid]["name"];
	
	$coal = $active[$uuid]["coal"];
	$iron = $active[$uuid]["iron"];
	$quartz = $active[$uuid]["quartz"];
	$redstone = $active[$uuid]["redstone"];
	$lapis = $active[$uuid]["lapis"];
	$gold = $active[$uuid]["gold"];
	$emerald = $active[$uuid]["emerald"];
	$diamond = $active[$uuid]["diamond"];
	
	$abba = $active[$uuid]["abba"];
	
	echo "<tr><td>".$i."</td><td><img src=\"http://wynncraft.com/api/avatar/".$name."/24.png\"/>&nbsp;&nbsp;&nbsp;&nbsp;".$name."</td><td>".$coal."</td><td>".$iron."</td><td>".$quartz."</td><td>".$redstone."</td><td>".$lapis."</td><td>".$gold."</td><td>".$emerald."</td><td>".$diamond."</td><td>".$abba."</td></tr>";
	$i++;
}

echo "<tr><td></td><td>Total</td><td>".$totCoal."</td><td>".$totIron."</td><td>".$totQuartz."</td><td>".$totRedstone."</td><td>".$totLapis."</td><td>".$totGold."</td><td>".$totEmerald."</td><td>".$totDiamond."</td><td>".$totAbba."</td></tr>";
echo "</tbody></table>";

?>

<div id="thumbnail"><img src="../../media/wombo.png"></div>
</body>
</html>