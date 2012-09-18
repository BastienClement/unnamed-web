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
		<?php if (isset($page_title)):?>
		<title>Unnamed.eu - <?php echo $page_title; ?></title>
		<?php else: ?>
		<title>Unnamed.eu - Portail de la guilde The Unnamed sur le serveur Marécage de Zangar (EU)</title>
		<?php endif;?>
	<?php endif; ?>
	
	<meta name="description" content="">
	<meta name="viewport" content="width=1100">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" type="text/css" href="/layout/style.css">
	<link rel="icon" type="image/png" href="/layout/img/fav.png" />
	
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
	<div id="logo"><a href="/"><img src="/layout/img/logo_shadowed.png"/></a></div>
	<div id="sponsor"></div>
	
	<div id="top-wrapper">
		<div id="top">
			<div id="menu">
				<ul>
					<li><a href="/"><div id="home-link"></div></a></li>
					<li><a href="/articles">Articles</a></li>
					<li class="sub">
						<a href="/blogs">Blogs</a>
						<ul>
							<li><a href="">Blog de random</a></li>
							<li><a href="">Blog de random</a></li>
							<li><a href="">Blog de random</a></li>
							<li><a href="">Blog de random</a></li>
							<li><a href="">Blog de random</a></li>
						</ul>
					</li>
					<li><a href="/videos">Vidéos</a></li>
					<li class="sub">
						<a href="/streams">Streams</a>
						<ul>
							<li><a href="">Stream de random</a></li>
							<li><a href="">Stream de random</a></li>
							<li><a href="">Stream de random</a></li>
							<li><a href="">Stream de random</a></li>
							<li><a href="">Stream de random</a></li>
						</ul>
					</li>
					<li><a href="/progression">Progression</a></li>
					<li><a class="active" href="/roster">Roster</a></li>
					<li><a href="/recrutement">Recrutement</a></li>
					<li><a href="/forums/">Forums</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div id="slider-news">
				<?php if($pun_user['is_guest']): ?>
				<div id="login-bar">
					<div id="logon"><a href="/forums/login.php"><i class="icon-check icon-white"></i> Se connecter</a><a href="/forums/register.php"><i class="icon-edit icon-white"></i> S'inscrire</a></div>
					Vous n'êtes pas identifié(e).
				</div>
				<?php else: ?>
				<div id="login-bar">
					<div id="logon"><?php echo'<a href="/forums/login.php?action=out&id='.$pun_user['id'].'&csrf_token='.pun_hash($pun_user['id'].pun_hash(get_remote_address())).'"><i class="icon-share icon-white"></i> Se déconnecter</a>'?></div>
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
			<a href="/rss">
				<img src="/layout/img/social-icons/rss.png"/>
			</a>
		</div>
	</div>
</div>

<div id="content">
	