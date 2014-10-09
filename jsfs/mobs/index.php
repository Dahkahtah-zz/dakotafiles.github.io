<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || JSFS MOBS</title>
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
if(isset($_GET['m']) && !empty($_GET['m'])){
	function cmp($a, $b) {
		$sortMob = $_GET['m'];
		return $b[$sortMob] - $a[$sortMob];
	}
}else{
	function cmp($a, $b) {
		return $b["total"] - $a["total"];
	}
}



$active = array();

foreach($wlJD as $key => $val){
	$name = $wlJD[$key]["name"];
	$uuid = $wlJD[$key]["uuid"];
	
	$statsJson = @file_get_contents("http://jsanofanserver.com/jsonstats/" . $uuid . ".json");
	$statsJD = json_decode($statsJson, true);
	
	if(isset($statsJD)){
		$whitelist[$uuid] = $name;
		
		$total = ""; if(isset($statsJD["stat.mobKills"])){$total = $statsJD["stat.mobKills"];}else{$total = 0;}
		
		if($total != 0){
			$blaze = ""; if(isset($statsJD["stat.killEntity.Blaze"])){$blaze = $statsJD["stat.killEntity.Blaze"];}else{$blaze = 0;}
			$cave_spider = ""; if(isset($statsJD["stat.killEntity.CaveSpider"])){$cave_spider = $statsJD["stat.killEntity.CaveSpider"];}else{$cave_spider = 0;}
			$creeper = ""; if(isset($statsJD["stat.killEntity.Creeper"])){$creeper = $statsJD["stat.killEntity.Creeper"];}else{$creeper = 0;}
			$enderman = ""; if(isset($statsJD["stat.killEntity.Enderman"])){$enderman = $statsJD["stat.killEntity.Enderman"];}else{$enderman = 0;}
			$endermite = ""; if(isset($statsJD["stat.killEntity.Endermite"])){$endermite = $statsJD["stat.killEntity.Endermite"];}else{$endermite = 0;}
			$ender_dragon = ""; if(isset($statsJD["stat.killEntity.EnderDragon"])){$ender_dragon = $statsJD["stat.killEntity.EnderDragon"];}else{$ender_dragon = 0;}
			$ghast = ""; if(isset($statsJD["stat.killEntity.Ghast"])){$ghast = $statsJD["stat.killEntity.Ghast"];}else{$ghast = 0;}
			$guardian = ""; if(isset($statsJD["stat.killEntity.Guardian"])){$guardian = $statsJD["stat.killEntity.Guardian"];}else{$guardian = 0;}
			$lava_slime = ""; if(isset($statsJD["stat.killEntity.LavaSlime"])){$lava_slime = $statsJD["stat.killEntity.LavaSlime"];}else{$lava_slime = 0;}
			$pig_zombie = ""; if(isset($statsJD["stat.killEntity.PigZombie"])){$pig_zombie = $statsJD["stat.killEntity.PigZombie"];}else{$pig_zombie = 0;}
			$silverfish = ""; if(isset($statsJD["stat.killEntity.Silverfish"])){$silverfish = $statsJD["stat.killEntity.Silverfish"];}else{$silverfish = 0;}
			$skeleton = ""; if(isset($statsJD["stat.killEntity.Skeleton"])){$skeleton = $statsJD["stat.killEntity.Skeleton"];}else{$skeleton = 0;}
			$slime = ""; if(isset($statsJD["stat.killEntity.Slime"])){$slime = $statsJD["stat.killEntity.Slime"];}else{$slime = 0;}
			$spider = ""; if(isset($statsJD["stat.killEntity.Spider"])){$spider = $statsJD["stat.killEntity.Spider"];}else{$spider = 0;}
			$witch = ""; if(isset($statsJD["stat.killEntity.Witch"])){$witch = $statsJD["stat.killEntity.Witch"];}else{$witch = 0;}
			$wither_boss = ""; if(isset($statsJD["stat.killEntity.WitherBoss"])){$wither_boss = $statsJD["stat.killEntity.WitherBoss"];}else{$wither_boss = 0;}
			$zombie = ""; if(isset($statsJD["stat.killEntity.Zombie"])){$zombie = $statsJD["stat.killEntity.Zombie"];}else{$zombie = 0;}
			$bat = ""; if(isset($statsJD["stat.killEntity.Bat"])){$bat = $statsJD["stat.killEntity.Bat"];}else{$bat = 0;}
			$chicken = ""; if(isset($statsJD["stat.killEntity.Chicken"])){$chicken = $statsJD["stat.killEntity.Chicken"];}else{$chicken = 0;}
			$cow = ""; if(isset($statsJD["stat.killEntity.Cow"])){$cow = $statsJD["stat.killEntity.Cow"];}else{$cow = 0;}
			$entity_horse = ""; if(isset($statsJD["stat.killEntity.EntityHorse"])){$entity_horse = $statsJD["stat.killEntity.EntityHorse"];}else{$entity_horse = 0;}
			$mushroom_cow = ""; if(isset($statsJD["stat.killEntity.MushroomCow"])){$mushroom_cow = $statsJD["stat.killEntity.MushroomCow"];}else{$mushroom_cow = 0;}
			$ozelot = ""; if(isset($statsJD["stat.killEntity.Ozelot"])){$ozelot = $statsJD["stat.killEntity.Ozelot"];}else{$ozelot = 0;}
			$pig = ""; if(isset($statsJD["stat.killEntity.Pig"])){$pig = $statsJD["stat.killEntity.Pig"];}else{$pig = 0;}
			$rabbit = ""; if(isset($statsJD["stat.killEntity.Rabbit"])){$rabbit = $statsJD["stat.killEntity.Rabbit"];}else{$rabbit = 0;}
			$sheep = ""; if(isset($statsJD["stat.killEntity.Sheep"])){$sheep = $statsJD["stat.killEntity.Sheep"];}else{$sheep = 0;}
			$snow_man = ""; if(isset($statsJD["stat.killEntity.SnowMan"])){$snow_man = $statsJD["stat.killEntity.SnowMan"];}else{$snow_man = 0;}
			$squid = ""; if(isset($statsJD["stat.killEntity.Squid"])){$squid = $statsJD["stat.killEntity.Squid"];}else{$squid = 0;}
			$villager = ""; if(isset($statsJD["stat.killEntity.Villager"])){$villager = $statsJD["stat.killEntity.Villager"];}else{$villager = 0;}
			$villager_golem = ""; if(isset($statsJD["stat.killEntity.VillagerGolem"])){$villager_golem = $statsJD["stat.killEntity.VillagerGolem"];}else{$villager_golem = 0;}
			$wolf = ""; if(isset($statsJD["stat.killEntity.Wolf"])){$wolf = $statsJD["stat.killEntity.Wolf"];}else{$wolf = 0;}
		
			$active[$uuid] = array("name" => $name, "blaze" => $blaze, "cave_spider" => $cave_spider, "creeper" => $creeper, "enderman" => $enderman, "endermite" => $endermite, "ender_dragon" => $ender_dragon, "ghast" => $ghast, "guardian" => $guardian, "lava_slime" => $lava_slime, "pig_zombie" => $pig_zombie, "silverfish" => $silverfish, "skeleton" => $skeleton, "slime" => $slime, "spider" => $spider, "witch" => $witch, "wither_boss" => $wither_boss, "zombie" => $zombie, "bat" => $bat, "chicken" => $chicken, "cow" => $cow, "entity_horse" => $entity_horse, "mushroom_cow" => $mushroom_cow, "ozelot" => $ozelot, "pig" => $pig, "rabbit" => $rabbit, "sheep" => $sheep, "snow_man" => $snow_man, "squid" => $squid, "villager" => $villager, "villager_golem" => $villager_golem, "wolf" => $wolf, "total" => $total);
		}
		
		
	}
}
usort($active, "cmp");

$mobsList = array("blaze", "cave_spider", "creeper", "enderman", "endermite", "ender_dragon", "ghast", "guardian", "lava_slime", "pig_zombie", "silverfish", "skeleton", "slime", "spider", "witch", "wither_boss", "zombie", "bat", "chicken", "cow", "entity_horse", "mushroom_cow", "ozelot", "pig", "rabbit", "sheep", "snow_man", "squid", "villager", "villager_golem", "wolf");

$current = "";
if(isset($_GET['m']) && !empty($_GET['m'])){
	$currentMob = $_GET['m'];
	$current = ucwords(str_replace("_", " ", $currentMob));
}else{
	$current = "Total";
}
echo "<div id=\"title\">- JSFS Mobs -</div><hr/><div id=\"sortTitle\">Sort By: <span id=\"currentMob\">" . $current . "</span></div><div id=\"mobSort\">";
foreach($mobsList as $key => $mob){
	if($mob == "guardian" || $mob == "skeleton" || $mob == "zombie"){
		echo "<a href=\"index.php?m=" . $mob . "\"><img src=\"media/" . $mob . ".gif\"></a>";
	}else{
		echo "<a href=\"index.php?m=" . $mob . "\"><img src=\"media/" . $mob . ".png\"></a>";
	}
}
echo "</div><div id=\"container\"><hr/>";
foreach($active as $uuid => $array){
	$name = $active[$uuid]["name"];
	
	$total = $active[$uuid]["total"];
	
	if($total != 0){
		$blaze = $active[$uuid]["blaze"];
		$cave_spider = $active[$uuid]["cave_spider"];
		$creeper = $active[$uuid]["creeper"];
		$enderman = $active[$uuid]["enderman"];
		$endermite = $active[$uuid]["endermite"];
		$ender_dragon = $active[$uuid]["ender_dragon"];
		$ghast = $active[$uuid]["ghast"];
		$guardian = $active[$uuid]["guardian"];
		$lava_slime = $active[$uuid]["lava_slime"];
		$pig_zombie = $active[$uuid]["pig_zombie"];
		$silverfish = $active[$uuid]["silverfish"];
		$skeleton = $active[$uuid]["skeleton"];
		$slime = $active[$uuid]["slime"];
		$spider = $active[$uuid]["spider"];
		$witch = $active[$uuid]["witch"];
		$wither_boss = $active[$uuid]["wither_boss"];
		$zombie = $active[$uuid]["zombie"];
		$bat = $active[$uuid]["bat"];
		$chicken = $active[$uuid]["chicken"];
		$cow = $active[$uuid]["cow"];
		$entity_horse = $active[$uuid]["entity_horse"];
		$mushroom_cow = $active[$uuid]["mushroom_cow"];
		$ozelot = $active[$uuid]["ozelot"];
		$pig = $active[$uuid]["pig"];
		$rabbit = $active[$uuid]["rabbit"];
		$sheep = $active[$uuid]["sheep"];
		$snow_man = $active[$uuid]["snow_man"];
		$squid = $active[$uuid]["squid"];
		$villager = $active[$uuid]["villager"];
		$villager_golem = $active[$uuid]["villager_golem"];
		$wolf = $active[$uuid]["wolf"];
		
		$mobs = array($blaze, $cave_spider, $creeper, $enderman, $endermite, $ender_dragon, $ghast, $guardian, $lava_slime, $pig_zombie, $silverfish, $skeleton, $slime, $spider, $witch, $wither_boss, $zombie, $bat, $chicken, $cow, $entity_horse, $mushroom_cow, $ozelot, $pig, $rabbit, $sheep, $snow_man, $squid, $villager, $villager_golem, $wolf);
		$mobsName = array("blaze", "cave_spider", "creeper", "enderman", "endermite", "ender_dragon", "ghast", "guardian", "lava_slime", "pig_zombie", "silverfish", "skeleton", "slime", "spider", "witch", "wither_boss", "zombie", "bat", "chicken", "cow", "entity_horse", "mushroom_cow", "ozelot", "pig", "rabbit", "sheep", "snow_man", "squid", "villager", "villager_golem", "wolf");
		
		$noMobs = array();
		
		foreach($mobs as $key => $val){
			if($val == 0){
				$noMobs[$key] = $mobsName[$key];
				unset($mobs[$key]);
				unset($mobsName[$key]);
			}
				
		}
		$noMobs = array_values($noMobs);
		$mobs = array_values($mobs);
		$mobsName = array_values($mobsName);
		for ($i = 0; $i < count($mobs); $i += 3) {
			if($mobsName[$i] == "guardian" || $mobsName[$i] == "skeleton" || $mobsName[$i] == "zombie"){
				$mobsName[$i] = "<tr><td><img src=\"media/" . $mobsName[$i] . ".gif\" title=\"" . ucwords(str_replace("_", " ", $mobsName[$i])) . "\"> x " . $mobs[$i] . "</td>";
			}else{
				$mobsName[$i] = "<tr><td><img src=\"media/" . $mobsName[$i] . ".png\" title=\"" . ucwords(str_replace("_", " ", $mobsName[$i])) . "\"> x " . $mobs[$i] . "</td>";
			}
		}
		for ($i = 1; $i < count($mobs); $i += 3) {
			if($mobsName[$i] == "guardian" || $mobsName[$i] == "skeleton" || $mobsName[$i] == "zombie"){
				$mobsName[$i] = "<td><img src=\"media/" . $mobsName[$i] . ".gif\" title=\"" . ucwords(str_replace("_", " ", $mobsName[$i])) . "\"> x " . $mobs[$i] . "</td>";
			}else{
				$mobsName[$i] = "<td><img src=\"media/" . $mobsName[$i] . ".png\" title=\"" . ucwords(str_replace("_", " ", $mobsName[$i])) . "\"> x " . $mobs[$i] . "</td>";
			}
		}
		for ($i = 2; $i < count($mobs); $i += 3) {
			if($mobsName[$i] == "guardian" || $mobsName[$i] == "skeleton" || $mobsName[$i] == "zombie"){
				$mobsName[$i] = "<td><img src=\"media/" . $mobsName[$i] . ".gif\" title=\"" . ucwords(str_replace("_", " ", $mobsName[$i])) . "\"> x " . $mobs[$i] . "</td></tr>";
			}else{
				$mobsName[$i] = "<td><img src=\"media/" . $mobsName[$i] . ".png\" title=\"" . ucwords(str_replace("_", " ", $mobsName[$i])) . "\"> x " . $mobs[$i] . "</td></tr>";
			}
		}
		echo "<div class=\"block\" id=\"" . $name . "\">
				<span class=\"info\">
				<span class=\"name\">" . $name . "</span><br>";
				if($name == "spg_SCOTT"){echo "<span class=\"image\"><img src=\"http://signaturecraft.us/avatars/15/body/char.png\"></span>";}else{echo "<span class=\"image\"><img src=\"http://signaturecraft.us/avatars/15/body/" . $name . ".png\"></span>";}
				echo "</span>
				<div class=\"mobs\">
				<table class=\"mobTable\"";
		
		foreach($mobsName as $val){
			echo $val;
		}
		echo "<tr><td><span class=\"total\">Total: </span><span class=\"totalNum\"> $total </td><td></td><td></td></tr></table>
				<div class=\"noMobs\">";
		foreach($noMobs as $val){
			if($val == "guardian" || $val == "skeleton" || $val == "zombie"){
				echo "<img src=\"media/" . $val . ".gif\" title=\"" . ucwords(str_replace("_", " ", $val)) . "\">";
			}else{
				echo "<img src=\"media/" . $val . ".png\" title=\"" . ucwords(str_replace("_", " ", $val)) . "\">";
			}
		}
		echo "</div>
				</div>
				</div><hr/>";
	}
	
}

?>
<br>
<br>
</body>
</html>