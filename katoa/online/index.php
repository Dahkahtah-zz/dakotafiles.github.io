<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || Online</title>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
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
    
    <li class="current"><a>Katoa</a>
    	<ul>
        	<li id="currentL"><a href="../../">Forums</a></li>
            <li id="currentL"><a href="../active/">Active List</a></li>
            <li id="currentL2"><a href="">Online Users</a></li>
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


<div id="title">Players Online:
<?php
// require('connect.php');
require('../../../Secret/connect.php');
$sql = "SELECT * FROM `users_online`";

$result = mysqli_query($con,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

$online = array();
$i = 0;
while(($row = mysqli_fetch_array($result))) {
	$i++;
	$online[] = $row['name'];
}
echo $i;



echo '</div><br><br><div id="faces">';
foreach($online as $row) {
	$val = "<div class=\"wrapper\" id=\"" . $row . "\"><img src=\"http://minecraft-skin-viewer.com/face.php?s=80&u=" . $row . "\" title=\""  . $row . " is online!\"></div>";
	//$val = "<div class=\"wrapper\" id=\"" . $row . "\"><img src=\"http://minecraft-skin-viewer.com/face.php?s=80&u=" . $row . "\" title=\"" . $row . " is online!\"></div>";
	echo $val;
} 

mysqli_close($con);

?>
</div>
</body>
</html>