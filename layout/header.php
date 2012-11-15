<?php

if(!defined('UNNAMED'))
	require dirname(dirname(__FILE__)).'/libs/unnamed/common.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<?php if(defined("IS_PUN")): ?>
		<pun_head>
	<?php else: ?>
		<title><?php if(defined('DOCUMENT_TITLE')) echo DOCUMENT_TITLE.' - ';?>Unnamed.eu - <?php if(defined('PAGE_TITLE')): echo PAGE_TITLE; else: ?>Portail de la guilde The Unnamed sur le serveur Marécage de Zangar (EU)<?php endif; ?></title>
	<?php endif; ?>
	
	<meta name="description" content="">
	<meta name="viewport" content="width=1100">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<style type="text/css">
		@import url("http://fonts.googleapis.com/css?family=PT+Sans+Narrow");
		@import url("http://fonts.googleapis.com/css?family=Droid+Sans+Mono");
		<?php if(preg_match("/Chrome/", $_SERVER["HTTP_USER_AGENT"]) && preg_match("/Windows/", $_SERVER["HTTP_USER_AGENT"])): ?>
		@import url("http://fonts.googleapis.com/css?family=Open+Sans:400italic,400");
		<?php else: ?>
		@import url("http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700");
		<?php endif; ?>
		
		html, body { background-color: #1a1a1a; }
	</style>
	
	<link rel="stylesheet" type="text/css" href="/layout/style.css">
	<link rel="stylesheet" type="text/css" href="/layout/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/layout/shadowbox-3.0.3/shadowbox.css">
	
	<link rel="alternate" type="application/rss+xml" title="RSS" href="/rss" />


	<link rel="icon" type="image/png" href="/layout/img/fav.png" />
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="/layout/bootstrap/js/bootstrap.min.js"></script>
	<script src="/layout/scripts/unnamed.js"></script>
	<script src="/layout/scripts/timeago.js"></script>
	<script src="http://static.wowhead.com/widgets/power.js"></script>
	<script type="text/javascript" src="/layout/shadowbox-3.0.3/shadowbox.js"></script>
	<script type="text/javascript">
		Shadowbox.init();
	</script>
	<!--[if lt IE 10]><script src="/layout/scripts/ie_transitions.js"></script><![endif]-->
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
					<li>
						<a href="/"><div id="home-link"></div></a>
					</li>
					<li>
						<a href="/articles"<?php if(ACTIVE_PAGE == 'articles') echo ' class="active"'; ?>>Articles</a>
					</li>
					<li class="sub">
						<a href="/blogs"<?php if(ACTIVE_PAGE == 'blogs') echo ' class="active"'; ?>>Blogs</a>
						<ul>
							<?php
							$posters = $db->query("SELECT DISTINCT(t.poster), u.slug FROM topics AS t INNER JOIN users AS u ON u.username = t.poster WHERE t.forum_id = 17 AND u.slug != '' ORDER BY t.poster");
							while($poster = $db->fetch_assoc($posters)):
							?>
							<li>
								<a href="<?php echo blog_url($poster['slug']); ?>">
									<?php echo htmlspecialchars(ucfirst($poster['poster'])); ?>
								</a>
							</li>
							<?php endwhile; ?>
						</ul>
					<li class="sub">
						<a href="/forums/"<?php if(defined('IS_PUN')) echo ' class="active"'; ?>>Forums</a>
						<?php require UNNAMED_LAYOUT.'/flux_nav.php'; ?>
					</li>
					</li>
					<li>
						<a href="/videos"<?php if(ACTIVE_PAGE == 'videos') echo ' class="active"'; ?>>Vidéos</a>
					</li>
					<!--<li class="sub">
						<a href="/streams"<?php if(ACTIVE_PAGE == 'streams') echo ' class="active"'; ?>>Streams</a>
						<ul>
							<li><a href="">Stream de random</a></li>
							<li><a href="">Stream de random</a></li>
							<li><a href="">Stream de random</a></li>
							<li><a href="">Stream de random</a></li>
							<li><a href="">Stream de random</a></li>
						</ul>
					</li>-->
					<li>
						<a href="/progression"<?php if(ACTIVE_PAGE == 'progress') echo ' class="active"'; ?>>Progression</a>
					</li>
					<li>
						<a href="/roster"<?php if(ACTIVE_PAGE == 'roster') echo ' class="active"'; ?>>Roster</a>
					</li>
					<li>
						<a href="/recrutement"<?php if(ACTIVE_PAGE == 'apply') echo ' class="active"'; ?>>Recrutement</a>
					</li>
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
				<img src="/layout/img/social-icons/facebook.png" alt="Facebook" title="Facebook"/>
			</a>
			<a href="http://www.youtube.com/user/WoWUnnamed/">
				<img src="/layout/img/social-icons/youtube.png" alt="Youtube" title="Youtube"/>
			</a>
			<a href="https://twitter.com/GuildeUnnamed">
				<img src="/layout/img/social-icons/twitter.png"  alt="Twitter" title="Twitter"/>
			</a>
			<a href="/rss">
				<img src="/layout/img/social-icons/rss.png"/  alt="Flux RSS" title="Flux RSS">
			</a>
		</div>
	</div>
</div>

<div id="content">
	