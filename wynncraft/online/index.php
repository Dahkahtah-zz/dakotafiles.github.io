<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || Online</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
    
        <li class="current"><a>WynnCraft</a>
    	<ul>
        	<li id="currentL"><a href="../items/">Item Guide</a></li>
            <li id="currentL2"><a href="">Online Faces</a></li>
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
<div id="title">Players Online: 
<?php
$sum = file_get_contents("http://wynncraft.com/api/public_api.php?action=onlinePlayersSum");
$sumDecode = json_decode($sum,true);
echo $sumDecode["players_online"];
?>
</div>
<br>
<div id="search">
<input id="find" type="text" name="search" placeholder="Search Usernames">
</div>
<br>
<div id="faces">
<?php
$online = file_get_contents("http://wynncraft.com/api/public_api.php?action=onlinePlayers");
$onlineDecode = json_decode($online,true);
$result = array();
foreach($onlineDecode as $sub => $key) {
	$server = $sub;
	if($server != "request"){
		foreach($key as $val){
			$value = "<div class=\"wrapper\" id=\"" . $val . "\"><a href=\"http://wynncraft.com/player/" . $val . "\"><img src=\"http://wynncraft.com/api/avatar/" . $val . "/40.png\" class=\"hover\" title=\""  . $val . " is playing on " . $server . "\"></a></div>";
			echo $value;
		}
	}
}
?>
</div>
<script type="text/javascript">
$('#find').bind('keyup', function(e){
	$('.wrapper').hide();
	var r = new RegExp($("#find").val(), 'i');
	$('div').filter(function() {
		return r.test($(this).attr('id'));
	}).show();
});
</script>
<br/><br/>
<div id="donate">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="WY4MDYY3GJ2T4">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
</body>
</html>