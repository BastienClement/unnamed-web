<?php

if(!defined('UNNAMED'))
	require dirname(__FILE__).'/common.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<?php if(defined("IS_PUN")): ?>
		<pun_head>
	<?php else: ?>
		<title></title>
	<?php endif; ?>
	
	<meta name="description" content="">
	<meta name="viewport" content="width=1100">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" type="text/css" href="/layout/style.css">
	
	<style type="text/css">
		@import url("http://fonts.googleapis.com/css?family=PT+Sans+Narrow");
		
		<?php if(preg_match("/Chrome/", $_SERVER["HTTP_USER_AGENT"]) && preg_match("/Windows/", $_SERVER["HTTP_USER_AGENT"])): ?>
		@import url("http://fonts.googleapis.com/css?family=Open+Sans:400italic,400");
		<?php else: ?>
		@import url("http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700");
		<?php endif; ?>
	</style>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="/layout/bootstrap/js/bootstrap.min.js"></script>
	<script src="http://static.wowhead.com/widgets/power.js"></script>
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=229695590414675";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="top-background">
<div id="page">

<!--[if lt IE 9]>
<div id="ie-warning">
	<div id="outdated">Vous utilisez un navigateur dépassé !</div>
	<p>Prenez le temps de mettre à jour votre navigateur :</p>
	<ul>
		<li><a href="http://windows.microsoft.com/fr-FR/internet-explorer/downloads/ie">Internet Explorer 9</a></li>
		<li><a href="http://www.google.fr/chrome">Google Chrome</a></li>
		<li><a href="http://getfirefox.com">Mozilla Firefox</a></li>
	</ul>
	<img src="/layout/img/yunoupdate.jpg">
</div>
<![endif]-->

<div id="header">
	<div id="logo"><a href=""><img src="/layout/img/logo_shadowed.png"/></a></div>
	<div id="sponsor"></div>
	
	<div id="top-wrapper">
		<div id="top">
			<div id="menu">
				<ul>
					<li><a href="/index.php">Accueil</a></li>
					<li><a href="/articles.php">Articles</a></li>
					<li><a href="/blogs.php">Blogs</a></li>
					<li><a href="/videos.php">Vidéos</a></li>
					<li><a href="/streams.php">Streams</a></li>
					<li><a href="/progression.php">Progression</a></li>
					<li><a class="/active" href="">Roster</a></li>
					<li><a href="/recrutement.php">Recrutement</a></li>
					<li><a href="/forums/">Forums</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div id="slider-news">
				<?php if($pun_user['is_guest']): ?>
				<div id="login-bar">
					<div id="logon"><a href="/forums/login.php"><i class="icon-lock icon-white"></i> Se connecter</a><a href="/forums/register.php"><i class="icon-user icon-white"></i> S'inscrire</a></div>
					Vous n'êtes pas identifié(e).
				</div>
				<?php else: ?>
				<div id="login-bar">
					<div id="logon"><?php echo'<a href="/forums/login.php?action=out&id='.$pun_user['id'].'&csrf_token='.pun_hash($pun_user['id'].pun_hash(get_remote_address())).'"><i class="icon-ban-circle icon-white"></i> Se déconnecter</a>'?></div>
					Bienvenue <a href="/forums/profile.php?id=<?php echo $pun_user['id'] ?>"><?php echo $pun_user['username'] ?></a>.
				</div>
				<?php endif; ?>
				<div id="slide-news"></div>
			</div>
		</div>

		<div id="social">
			<a href="https://www.facebook.com/Guilde.Unnamed">
				<img src="/layout/img/social-icons/facebook.png"/>
			</a>
			<a href="http://www.youtube.com/user/WoWUnnamed/">
				<img src="/layout/img/social-icons/youtube.png"/>
			</a>
			<a href="https://twitter.com/GuildeUnnamed">
				<img src="/layout/img/social-icons/twitter.png"/>
			</a>
			<a href="">
				<img src="/layout/img/social-icons/rss.png"/>
			</a>
		</div>
	</div>
</div>

<div id="content">
	