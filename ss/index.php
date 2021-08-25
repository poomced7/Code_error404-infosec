<?php 

if( !session_id() )
{
    session_start();
}

if(@$_SESSION['logged_in'] == true){
    header("Location: home.php");
}
?>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="./main.js"></script>
<script type="text/javascript" src="./llqrcode.js"></script>
<script type="text/javascript" src="grid.js"></script>
<script type="text/javascript" src="version.js"></script>
<script type="text/javascript" src="detector.js"></script>
<script type="text/javascript" src="formatinf.js"></script>
<script type="text/javascript" src="errorlevel.js"></script>
<script type="text/javascript" src="bitmat.js"></script>
<script type="text/javascript" src="datablock.js"></script>
<script type="text/javascript" src="bmparser.js"></script>
<script type="text/javascript" src="datamask.js"></script>
<script type="text/javascript" src="rsdecoder.js"></script>
<script type="text/javascript" src="gf256poly.js"></script>
<script type="text/javascript" src="gf256.js"></script>
<script type="text/javascript" src="decoder.js"></script>
<script type="text/javascript" src="qrcode.js"></script>
<script type="text/javascript" src="findpat.js"></script>
<script type="text/javascript" src="alignpat.js"></script>
<script type="text/javascript" src="databr.js"></script>

<div style="display:none" id="result"></div>
	<div class="selector" id="webcamimg" onclick="setwebcam()" align="left" ></div>
		<div class="selector" id="qrimg" onclick="setimg()" align="right" ></div>
			<center id="mainbody"><div id="outdiv"></div></center>
				<canvas id="qr-canvas" width="50" height="50"></canvas>

<script type="text/javascript">load();</script>
<script src="./jquery-1.11.2.min.js"></script>