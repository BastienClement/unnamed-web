<?php

include('libs/unnamed/common.php');
require_routing();

if(!isset($_ARGS[0]))
	return_404();

$art_id = (int) $_ARGS[0];
$articles = $db->query("SELECT t.id, t.poster, p.poster_id, t.subject, t.posted, t.num_views, t.num_replies, t.num_likes, t.forum_id, p.message, u.email_setting, u.biography FROM {$db->profile}topics AS t INNER JOIN {$db->profile}posts AS p ON p.topic_id = t.id INNER JOIN {$db->profile}users AS u ON u.id = p.poster_id  WHERE t.id = $art_id AND (t.forum_id = 16 OR t.forum_id = 17) LIMIT 1");

if(!$art = $db->fetch_assoc($articles))
	return_404();

if(sluggify($art['subject']) != $_ARGS[1]) {
	header('HTTP/1.1 301 Moved Permanently'); 
	header('Location: /article/'.$art_id.'/'.sluggify($art['subject']));
	exit;
}

$res = $db->query("UPDATE {$db->prefix}topics SET num_views = num_views+1 WHERE id = $art_id LIMIT 1");

define('ACTIVE_PAGE', 'articles');
define('PAGE_TITLE',  'Articles');
define('DOCUMENT_TITLE',  $art['subject']);

include('layout/header.php');
?>
<div class="section">
<div class="section-light">
<div class="section-content twocols-layout">
	
<div class="col col1">

<h2><?php echo htmlspecialchars($art['subject']); ?></h2>

<div class="last-news-infos">
	<span class="article-comments">
		<?php echo $art['num_views']+1; ?> <i class="icon-eye-open"></i>
		/ <a href="#showcomments"><?php echo $art['num_replies']; ?> <i class="icon-comment"></i></a>
		/ <?php echo $art['num_likes']; ?> <i class="icon-heart"></i>
	</span>
	Publié par
	<strong><a href="/profile/<?php echo $art['poster_id']; ?>/<?php echo sluggify($art['poster']); ?>"><?php echo htmlspecialchars($art['poster']); ?></a></strong>,
	<abbr class="timeago" title="<?php echo date('c', $art['posted']); ?>"><?php echo date('d/m/Y H:i', $art['posted']); ?></abbr>
</div>

<div class="article-body">
<?php
	$xbbc = xbbc_ucode_parser();
	$art_html = $xbbc->Parse($art['message']);
	echo $art_html;
?>
</div>

<div class="hr" id="showcomments"></div>

<h2>Commentaires</h2>

<div class="comment-block">
<div class="author-avatar"><a href=""><img src="/layout/img/noavatar.jpg"/></a></div>
<div class="comment"><div class="comment-top"><span class="comment-actions"><a href=""><i class=" icon-retweet"><i class=" icon-retweet"></i></i> Citer</a></span><a href="">Aarak</a> <span class="comment-date"><i class=" icon-calendar"></i> 17/09/2010 <i class=" icon-time"></i> 15h09</span></div>
<div class="comment-body"><p>Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum bland</p></div></div>
</div>

<div class="comment-block">
<div class="author-avatar"><a href=""><img src="http://www.unnamed.eu/avatars/2"/></a></div>
<div class="comment"><div class="comment-top"><span class="comment-actions"><a href=""><i class=" icon-retweet"><i class=" icon-retweet"></i></i> Citer</a></span><a href="">Noumah</a> <span class="comment-date"><i class=" icon-calendar"></i> 17/09/2010 <i class=" icon-time"></i> 15h09</span></div>
<div class="comment-body"><p>Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.Curabitur purus dolor.</p><p>Vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue.</p><p> Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.</p></div></div>
</div>

<div class="comment-block">
<div class="author-avatar"><a href=""><img src="http://www.unnamed.eu/avatars/215"/></a></div>
<div class="comment"><div class="comment-top"><span class="comment-actions"><a href=""><i class=" icon-retweet"><i class=" icon-retweet"></i></i> Citer</a></span><a href="">Blash</a> <span class="comment-date"><i class=" icon-calendar"></i> 17/09/2010 <i class=" icon-time"></i> 15h09</span></div>
<div class="comment-body"><p>Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla.</p><p>Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.</p></div></div>
</div>

<div class="hr" id="leavecomment"></div>

<h2>écrire un commentaire</h2>

<div class="alert">Vous devez être <a href="/forums/login.php">identifié(e)</a> afin de pouvour écrire un commentaire !</div>
<form>
	<textarea></textarea>
	<div class="button-wrapper">
		<input type="button" class="button" value="Valider" />
	</div>
</form>

</div>

<div class="col col2">

	<?php require UNNAMED_BLOCKS.'/article/share.php'; ?>
	<div class="hr"></div>

<?php if($art['biography']): ?>
	<?php require UNNAMED_BLOCKS.'/article/author.php'; ?>
	<div class="hr"></div>
<?php endif; ?>

<?php
	preg_match_all('/<h([3-6]) id="([a-z0-9\-]+)">(.*)<\/h\1>/U', $art_html, $titles, PREG_SET_ORDER);
	if(count($titles) >= 4):
?>
		<?php require UNNAMED_BLOCKS.'/article/toc.php'; ?>
		<div class="hr"></div>
<?php
	endif;
?>

	<?php require UNNAMED_BLOCKS.'/article/sameauthor.php'; ?>
	<div class="hr"></div>
	
	<?php require UNNAMED_BLOCKS.'/article/lastarticles.php'; ?>
</div>
<div class="clearfix"></div>

</div>
</div>
</div>
<?php include('layout/footer.php'); ?>

