<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || Active List</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../../wynncraft/items/sorttable.js"></script>
<link rel="shortcut icon" href="../../favicon.ico">
</head>
<body background="../../media/bg.png">
<div id="navbar">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('require', 'displayfeatures');
  ga('create', 'UA-45368737-2', 'auto');
  ga('send', 'pageview');

</script>
<ul>

	<li id="im"><a href="../../"><img src="../../media/minimal.png" width="150" height="42"  alt=""/></a></li>
    
    <li id="first"><a href="../old/">Home</a></li>
    
    <li class="current"><a>Katoa</a>
    	<ul>
        	<li id="currentL"><a href="../../">Forums</a></li>
            <li id="currentL2"><a href="">Active List</a></li>
            <li id="currentL"><a href="../online/">Online Users</a></li>
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
// require('connect.php');
require('../../../Secret/connect.php');

$sql = "SELECT * FROM `lb-players` ORDER BY onlinetime DESC";

$result = mysqli_query($con,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

echo "<table id=\"item\" class=\"sortable\">";
echo "<thead id=\"title\"><td>Place</td><td>Name</td><td>First Login</td><td>Last Login</td><td>Online Time</td></thead><tbody>";

$i = 1;
while(($row = mysqli_fetch_array($result)) && $i <= 100) {
	if($row['onlinetime'] <> 0){
		$name = $row['playername'];
		$firstOld = $row['firstlogin'];
		$firstNew = date("F dS, Y - h:i a", strtotime($firstOld));
		$lastOld = $row['lastlogin'];
		$lastNew = date("F dS, Y - h:i a", strtotime($lastOld));
		$hours = round($row['onlinetime'] / 3600);
		$minutes = round(($row['onlinetime'] % 3600) / 60);
		$seconds = ($row['onlinetime'] % 3600) % 60;
		echo "<tr><td>".$i."</td><td><img src=\"http://wynncraft.com/api/avatar/".$name."/24.png\"/>&nbsp;&nbsp;&nbsp;&nbsp;".$name."</td><td>".$firstNew."</td><td>".$lastNew."</td><td>".$hours." Hours, ".$minutes." Minutes, ".$seconds." Seconds</td></tr>";
		$i++;
	}
} 

echo "</tbody></table>";
mysqli_close($con);

?>
</body>
</html>