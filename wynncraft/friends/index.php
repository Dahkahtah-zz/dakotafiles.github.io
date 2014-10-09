<?php
if(!isset($_GET['u']) || empty($_GET['u'])){
	header( 'Location: index.php?u=Salted' ) ;
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || Friends</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
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
    
        <li class="current"><a>WynnCraft</a>
    	<ul>
        	<li id="currentL"><a href="../items/">Item Guide</a></li>
            <li id="currentL"><a href="">Online Faces</a></li>
        	<li id="currentL"><a href="../active/">Staff Activity</a></li>
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
<br><br><br><br>

<?php
if(isset($_GET['u']) && !empty($_GET['u'])){
	$name = $_GET['u'];
	echo "<div id=\"title\">Friends of " . $name . "</div>";
	$userJson = @file_get_contents("http://wynncraft.com/api/public_api.php?action=playerStats&command=" . $name);
	if (!$userJson){
		echo "User has never been on the WynnCraft Network";
	}else{
		$userJsonDecode = json_decode($userJson,true);
		echo "<div id=\"faces\">";
		foreach($userJsonDecode["friends"] as $val){
			$value = "<div class=\"wrapper\" id=\"" . $val . "\"><a href=\"index.php?u=" . $val . "\"><img src=\"http://wynncraft.com/api/avatar/" . $val . "/40.png\" class=\"hover\" title=\""  . $val . "\"></a></div>";
			echo $value;
		}
	}
}

?>
</div>
</body>
</html>