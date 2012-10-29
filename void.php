<?php header("Status: 404 Not Found"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>The Unnamed</title>
	<meta name="robots" content="noindex, nofollow" />
	<style>
		* {
			margin: 0;
			padding: 0;
			color: #bbb;
		}
	
		body {
			background:url('/layout/img/background.png');
		}
		
		img {
			border:none;
		}
		
		#squares {
			background-image: url('/layout/img/background-top.png');
			height: 456px;
			position: absolute;
			top: 0px;
			left: 0px;
			right: 0px;
			z-index: -1;
		}
		
		#logo {
			width: 743px;
			height: 200px;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-left: -371px;
			margin-top: -100px;
		}
		
	</style>
</head>
<body>
	<div id="squares"></div>
	<div id="logo">
		<a href="/"><img src="/layout/img/logo.png" /></a>
	</div>
</body>
</html>
