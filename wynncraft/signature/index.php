<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katoa || Signatures</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" media="screen" type="text/css" href="css/colorpicker.css" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/colorpicker.js"></script>
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
            <li id="currentL"><a href="../online/">Online Faces</a></li>
        	<li id="currentL"><a href="../active/">Staff Activity</a></li>
            <li id="currentL"><a href="../active/youtube/">YT Activity</a></li>
            <li id="currentL"><a href="../mob/">GM Mobs</a></li>
            <li id="currentL2"><a href="">Signature</a></li>
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
<!--<div id="containerCheck">
<span id="minecraft">✗ Not a valid Minecraft Username</span><br>
<span id="wynncraft">✗ Never Visited the WynnCraft Network</span><br>
</div>-->
<div id="container">
<form id="stats" method="post">
<input id="user" type="text" name="user" placeholder="Username" maxlength="16"><br><br>
<input type="text" maxlength="6" size="6" id="colourB" placeholder="Background Colour - Leave Blank for Green"/><br>
<div id="box">&nbsp;</div><br>
<input type="text" maxlength="6" size="6" id="colourT" placeholder="Text Colour - Leave Blank for Rank Colour"/><br>
<div id="box2">&nbsp;</div><br>
<div id="checkboxes">
<input type="checkbox" name="wbss" value="wbss1" id="wbssCheck1" class="check"><span class="wbssText">Include WBSS1</span>
<input type="checkbox" name="wbss" value="wbss" id="wbssCheck" class="check"><span class="wbssText">Include WBSS2</span>
</div>
<div id="submitHold"><input type="submit" value="Submit" id="submit"></div>
</form>
</div><br><br>
<div id="image"></div><br>
<div id="bb"></div>
<div id="bbexplain">Copy and paste this into your signature to add the image!</div>
<!-- ✓ -->
<script>

//jQuery('#user').on('input propertychange paste', function() {
//	var user = document.getElementById("user").value;
//	var urlW = "http://wynncraft.com/api/public_api.php?action=playerStats&command=" + user;
//	var urlM = "https://minecraft.net/haspaid.jsp?user=" + user;
//	$.getJSON( urlW, function( json ) {
//		if(json.length == 0){
//			alert('Nope');
//		}
//	});
//});
$('#colourB').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
		$("#box").css({"background-color": "#" + hex});
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
$('#colourT').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		$(el).val(hex);
		$(el).ColorPickerHide();
		$("#box2").css({"background-color": "#" + hex});
	},
	onBeforeShow: function () {
		$(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);
});


$("input:checkbox").click(function() {
    if ($(this).is(":checked")) {
        var group = "input:checkbox[name='" + $(this).attr("name") + "']";
        $(group).prop("checked", false);
        $(this).prop("checked", true);
    } else {
        $(this).prop("checked", false);
    }
});

$('#submit').click(function() {
	var user = $("#user").val();
	var hexB = $("#colourB").val();
	var hexT = $("#colourT").val();
	
	
	
	if(user.length > 0){var user = "?u=" + user;}else{var user = "";}
	if(hexB.length > 0){var hexB = "&c=" + hexB;}else{var hexB = "";}
	if(hexT.length > 0){var hexT = "&t=" + hexT;}else{var hexT = "";}
	
	//window.location = "sig.php?u=" + user + "&c=" + hex;
	var checked = "";
	if($('#wbssCheck').is(':checked')){
		var checked = "&w=2"
	}else if($('#wbssCheck1').is(':checked')){
		var checked = "&w=1"
	}
	$("#bb").css({"visibility": "visible"});
	$("#bbexplain").css({"visibility": "visible"});
	$("#image").html("<img src=\"sig.php" + user + hexB + hexT + checked + "\">");
	$("#bb").html("<input type=\"text\" onfocus=\"this.select();\" onmouseup=\"return false;\" name=\"bbco\" id=\"bbco\" value=\"[IMG]http://katoa.org/wynncraft/signature/sig.php" + user + hexB + hexT + checked + "[/IMG]\" readonly>");
	return false;
});
</script>
</body>
</html>