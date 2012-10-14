<?php

if(!isset($_ARGS[0]))
	return_404();

include('layout/common.php');

$art_id = (int) $_ARGS[0];
$res = $db->query("SELECT t.id, t.poster, p.poster_id, t.subject, t.posted, t.num_views, t.num_replies, t.forum_id, p.message FROM {$db->profile}topics AS t INNER JOIN {$db->profile}posts AS p ON p.topic_id = t.id WHERE t.id = $art_id AND (t.forum_id = 16 OR t.forum_id = 17) LIMIT 1");

if(!$row = $db->fetch_assoc($res))
	return_404();

define('ACTIVE_PAGE', 'articles');
define('PAGE_TITLE',  'Articles');
define('DOCUMENT_TITLE',  $row['subject']);

include('layout/header.php');
?>
<div class="section">
	<div class="section-light">
	<div class="section-content">
	<div class="twocols-layout">
<div class="col col1">

<h2><?php echo htmlspecialchars($row['subject']); ?></h2>

<div class="last-news-infos">
	<span class="article-comments">
		<?php echo $row['num_views']; ?> <i class=" icon-eye-open"></i>
		/ <a href="#showcomments"><?php echo $row['num_replies']; ?> <i class=" icon-comment"></i></a>
	</span>
	Publié par <a href="/profile/<?php echo $row['poster_id']; ?>/<?php echo sluggify($row['poster']); ?>"><?php echo htmlspecialchars($row['poster']); ?></a>
	<abbr class="timeago" title="<?php echo date('c', $row['posted']); ?>"><?php echo date('d/m/Y H:i', $row['posted']); ?></abbr>
</div>

<div class="article-body">
<?php
	$xbbc = xbbc_ucode_parser();
	echo $xbbc->Parse($row['message']);
?>
</div>

<div class="hr" id="showcomments"></div>

<h2>Commentaires</h2>

<div class="comment-block">
<div class="author-avatar"><a href=""><img src="/layout/img/noavatar.jpg"/></a></div>
<div class="comment"><div class="comment-top"><span class="comment-actions"><a href=""><i class=" icon-retweet"></i> Citer</a></span><a href="">Aarak</a> <span class="comment-date"><i class=" icon-calendar"></i> 17/09/2010 <i class=" icon-time"></i> 15h09</span></div>
<div class="comment-body"><p>Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum bland</p></div></div>
</div>

<div class="comment-block">
<div class="author-avatar"><a href=""><img src="http://www.unnamed.eu/avatars/2"/></a></div>
<div class="comment"><div class="comment-top"><span class="comment-actions"><a href=""><i class=" icon-retweet"></i> Citer</a></span><a href="">Noumah</a> <span class="comment-date"><i class=" icon-calendar"></i> 17/09/2010 <i class=" icon-time"></i> 15h09</span></div>
<div class="comment-body"><p>Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.Curabitur purus dolor.</p><p>Vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue.</p><p> Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.</p></div></div>
</div>

<div class="comment-block">
<div class="author-avatar"><a href=""><img src="http://www.unnamed.eu/avatars/215"/></a></div>
<div class="comment"><div class="comment-top"><span class="comment-actions"><a href=""><i class=" icon-retweet"></i> Citer</a></span><a href="">Blash</a> <span class="comment-date"><i class=" icon-calendar"></i> 17/09/2010 <i class=" icon-time"></i> 15h09</span></div>
<div class="comment-body"><p>Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla.</p><p>Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.</p></div></div>
</div>

	<div class="hr" id="leavecomment"></div>

<h2>écrire un commentaire</h2>
<div class="alert">Vous devez être <a href="/forums/login.php">identifié(e)</a> afin de pouvour écrire un commentaire !</div>
<form>
<textarea></textarea>

<div class="button-wrapper"><input type="button" class="button" value="Valider" /></div>
</form>


</div>

<div class="col col2">

<h2>Partager cet article</h2>

<div id="share">
<a href=""><img src="/layout/img/social-icons/facebook.png" alt="Facebook" title="Facebook"/></a>
<a href=""><img src="/layout/img/social-icons/twitter.png" alt="Twitter" title="Twitter"/></a>
<a href=""><img src="/layout/img/social-icons/google.png" alt="Google+" title="Google+"/></a>
<a href=""><img src="/layout/img/social-icons/mail.png" alt="Email" title="Email"/></a>
<a href=""><img src="/layout/img/social-icons/addthis.png" alt="AddThis" title="AddThis"/></a>
</div>

<div class="clearfix"></div>

<div class="hr"></div>

<h2>à propos de l'auteur</h2>

<div id="about-author">
<div id="about-author-avatar"><img src="/layout/img/noavatar.jpg"/></div>
<div id="about-author-desc">
Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla.</div>
<div class="clearfix"></div>
<div id="about-author-contact"><a href=""><i class=" icon-user icon-white"></i> Profil</a><a href=""><i class=" icon-envelope icon-white"></i> MP</a><a href=""><i class=" icon-envelope icon-white"></i> E-mail</a></div>
</div>

<div class="hr"></div>

<h2>Table des matières</h2>
<div id="sommaire-article">
<ol>
	<li><a href="">Définition du Tanking</a>
		<ol>
			<li><a href="">Les priorités d'un Tank </a>
				<ol>
			<li><a href="">Sous Sous Titre 1</a></li>
			<li><a href="">Sous Sous Titre 2</a></li>
			<li><a href="">Sous Sous Titre 3</a>
				<ol>
			<li><a href="">Sous Sous Sous Titre 1</a></li>
			<li><a href="">Sous Sous Sous Titre 2</a></li>
			<li><a href="">Sous Sous Sous Titre 3</a></li>
			<li><a href="">Sous Sous Sous Titre 4</a></li>
		</ol>
			</li>
			<li><a href="">Sous Sous Titre 4</a></li>
		</ol>
			</li>
			<li><a href="">Niveau 56 : Sang bouillonnant - Parasite de peste - Chancre impie</a></li>
			<li><a href="">Sous Titre 3</a></li>
			<li><a href="">Sous Titre 4</a></li>
		</ol>
	
	</li>
	<li><a href="">Les nouveautés du DK à Mists of Pandaria</a></li>
	<li><a href="">Talents</a></li>
	<li><a href="">Glyphes</a></li>
	<li><a href="">Optimisation théorique</a></li>
	<li><a href="">Optimisation pratique</a></li>
	<li><a href="">Tanker en raid</a></li>
</ol>
</div>

<div class="hr"></div>

<h2>Du même auteur</h2>

<div class="last-article"><a href="">
<div class="last-article-title">La cinématique de Mists of Pandaria</div></a>
<div class="last-article-date"><i class=" icon-calendar"></i> 23/09/2012</div>
<div class="last-article-author">Coconutsdown</div>
</div>

<div class="last-article"><a href="">
<div class="last-article-title">La cinématique de Mists of Pandaria</div></a>
<div class="last-article-date"><i class=" icon-calendar"></i> 23/09/2012</div>
<div class="last-article-author">Coconutsdown</div>
</div>

<div class="last-article"><a href="">
<div class="last-article-title">La cinématique de Mists of Pandaria</div></a>
<div class="last-article-date"><i class=" icon-calendar"></i> 23/09/2012</div>
<div class="last-article-author">Coconutsdown</div>
</div>

<div class="last-article"><a href="">
<div class="last-article-title">La cinématique de Mists of Pandaria</div></a>
<div class="last-article-date"><i class=" icon-calendar"></i> 23/09/2012</div>
<div class="last-article-author">Coconutsdown</div>
</div>
<div class="last-article"><a href="">
<div class="last-article-title">La cinématique de Mists of Pandaria</div></a>
<div class="last-article-date"><i class=" icon-calendar"></i> 23/09/2012</div>
<div class="last-article-author">Coconutsdown</div>
</div>

<div class="hr"></div>

<h2>Derniers articles</h2>

<div class="last-article"><a href="">
<div class="last-article-title">La cinématique de Mists of Pandaria</div></a>
<div class="last-article-date"><i class=" icon-calendar"></i> 23/09/2012</div>
<div class="last-article-author">Coconutsdown</div>
</div>

<div class="last-article"><a href="">
<div class="last-article-title">La cinématique de Mists of Pandaria</div></a>
<div class="last-article-date"><i class=" icon-calendar"></i> 23/09/2012</div>
<div class="last-article-author">Coconutsdown</div>
</div>

<div class="last-article"><a href="">
<div class="last-article-title">La cinématique de Mists of Pandaria</div></a>
<div class="last-article-date"><i class=" icon-calendar"></i> 23/09/2012</div>
<div class="last-article-author">Coconutsdown</div>
</div>

<div class="last-article"><a href="">
<div class="last-article-title">La cinématique de Mists of Pandaria</div></a>
<div class="last-article-date"><i class=" icon-calendar"></i> 23/09/2012</div>
<div class="last-article-author">Coconutsdown</div>
</div>
<div class="last-article"><a href="">
<div class="last-article-title">La cinématique de Mists of Pandaria</div></a>
<div class="last-article-date"><i class=" icon-calendar"></i> 23/09/2012</div>
<div class="last-article-author">Coconutsdown</div>
</div>

</div>

<div class="clearfix"></div>

</div>

	</div>
</div>
<?php include('layout/footer.php'); ?>
