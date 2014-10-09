<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || Swarm Tracker</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../../favicon.ico">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
</head>

<body background="../../media/bg.png">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45368737-2', 'auto');
  ga('send', 'pageview');

</script>


<!-- Navbar -->


<div id="imagebig">
<img src="../../media/swarm.png" class="stretch" alt="" />
<div id="bodytitle">
Swarm Tracker
</div>
<div id="body">
!!- Not yet ready for public consumption -!!
</div>
<br />
<br />
<?php
//require_once('../../../Secret/connect.php');
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
echo $_GET["town"];
echo $_GET["server"];
echo $_GET["time"];
echo $_GET["name"];

?>
<br />
<br />
<br />
<form method="get" action="index.php">
		<select id="town" name="town" onChange="call()">
        	<option value="(city)">City</option>
			<option value="Detlas">Detlas</option>
            <option value="Ragni">Ragni</option>
            <option value="Almuj">Almuj</option>
            <option value="Nemract">Nemract</option>
		</select>
		<select id="server" name="server" onChange="call()">
        	<option value="(server)">Server</option>
			<option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
		</select>
        <select id="time" name="time" onChange="call()">
        	<option value="(time)">Time</option>
			<option value="2">2</option>
            <option value="4">4</option>
            <option value="6">6</option>
            <option value="8">8</option>
            <option value="10">10</option>
            <option value="12">12</option>
            <option value="14">14</option>
            <option value="16">16</option>
            <option value="18">18</option>
            <option value="20">20</option>
		</select>
        <input type="text" name="name" id="first" placeholder="Minecraft Username">
     <br />
     <br />
     <div id="input">A swarm is headed for <span id="townD">(town)</span> on server <span id="serverD">(server)</span> in <span id="timeD">(time)</span> minutes!</div>
     <br />
	<input type="submit" value="submit" id="submit"/>
</form>
</div>

     <script type="text/javascript">
		function call(){
		var e = document.getElementById("town");
		var town = e.options[e.selectedIndex].value;
		
		var e2 = document.getElementById("server");
		var server = e2.options[e2.selectedIndex].value;
		
		var e3 = document.getElementById("time");
		var time = e3.options[e3.selectedIndex].value;
		
		
		var townDiv = document.getElementById('townD');
		townDiv.innerHTML = town;
		
		var serverDiv = document.getElementById('serverD');
		serverDiv.innerHTML = server;
		
		var timeDiv = document.getElementById('timeD');
		timeDiv.innerHTML = time;
		}
	</script>

</body>
</html>