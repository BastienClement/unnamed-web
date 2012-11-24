<?php

if(!isset($_ARGS[0]))
	return_404();

$art_id = (int) $_ARGS[0];

// TODO : only if really unnamed !
$UNNAMED_DRAFT = 'OR t.forum_id = 19';

$articles = $db->query("SELECT t.id, t.poster, p.poster_id, t.subject, t.posted, t.num_views, t.num_replies, t.num_likes, t.forum_id, p.message, u.email_setting, u.biography, t.first_post_id FROM topics AS t INNER JOIN posts AS p ON p.id = t.first_post_id INNER JOIN users AS u ON u.id = p.poster_id  WHERE t.id = $art_id AND (t.forum_id = 16 OR t.forum_id = 17 $UNNAMED_DRAFT) LIMIT 1");

if(!$art = $db->fetch_assoc($articles))
	return_404();

if(sluggify($art['subject']) != $_ARGS[1]) {
	header('HTTP/1.1 301 Moved Permanently'); 
	header('Location: /article/'.$art_id.'/'.sluggify($art['subject']));
	exit;
}

$res = $db->query("UPDATE topics SET num_views = num_views+1 WHERE id = $art_id LIMIT 1");

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
		/ <a href="#showcomments"><?php echo $art['num_replies']; ?> <i class="icon-comment"><i class=
"icon-comment icon-white"></i></i></a>
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
	
	preg_match_all('/<h([3-6]) id="([a-z0-9\-]+)">(.*)<\/h\1>/U', $art_html, $titles, PREG_SET_ORDER);
	$display_toc = (count($titles) >= 4);
	
	if($display_toc) {
		$art_html = preg_replace('/(<h[3-6] id="[a-z0-9\-]+")>/U', '$1 class="toc">', $art_html);
	}
	
	echo $art_html;
?>
</div>

<div class="hr" id="showcomments"></div>

<h2>Commentaires</h2>

<?php

$comments = $db->query("SELECT id, poster, poster_id, message, edited, edited_by, posted FROM posts WHERE topic_id = $art_id AND id != {$art['first_post_id']}");

if($db->num_rows($comments) > 0) {

	while($comment = $db->fetch_assoc($comments)) {
	
		$date = "<abbr class=\"timeago-uc\" title=\"".date("c" , $comment['posted'])."\">".date("d/m/y H:i:s" , $comment['posted'])."</abbr>";
		
		if((time() - $comment['posted']) < 86400){
			$date_icon = "<i class=\"icon-time\"></i>";
		} else {
			$date_icon = "<i class=\"icon-calendar\"></i>";
		};
		
?>

<div class="comment-block" id="comment-<?php echo $comment['id']; ?>">
	<div class="author-avatar">
		<a href="/profile/<?php echo $comment['poster_id']; ?>">
			<?php user_avatar($comment[poster_id]); ?>
		</a>
	</div>
	<div class="comment" data-quote-text="<?php echo htmlspecialchars(json_encode($comment['message'])); ?>" data-quote-author="<?php echo htmlspecialchars($comment['poster']); ?>">
		<div class="comment-top">
			<div class="comment-actions">
				<a href="#leavecomment" class="quote-action" data-quote-target="comment-message">
					<i class="icon-retweet"><i class="icon-retweet icon-white"></i></i> Citer
				</a>
			</div>
			<a href="/profile/<?php echo $comment['poster_id']; ?>">
				<?php echo htmlspecialchars($comment['poster']); ?>
			</a>
			<span class="comment-date">
				<?php echo $date_icon." ".$date; ?>
			</span>
		</div>
		<div class="comment-body">
			<?php echo $xbbc->Parse($comment['message']); ?>
		</div>
		<?php
		if(isset($comment['edited'])) {
			echo "<div class=\"last_mod\">Dernière modification par ".$comment['edited_by']." <abbr class=\"timeago\" title=\"".date("c", $comment['edited'])."\">".date("d/m/Y à H:i:s", $comment['edited'])."</abbr></div>";
		}
		?>
		<div class="clearfix"></div>
	</div>
</div>

<?php

	}

} else {

	echo '<div class="alert">Il n\'y a pas encore de commentaires pour cet article.</div>';

}

?>

<div class="hr" id="leavecomment"></div>

<h2>écrire un commentaire</h2>

<?php if($pun_user['is_guest']): ?>

<div class="alert">Vous devez être <a href="/forums/login.php">identifié(e)</a> afin de pouvour écrire un commentaire !</div>

<?php 

else :

?>

<form id="quickpostform" method="post" action="/forums/post.php?tid=<?php echo $art_id; ?>">
	<input type="hidden" name="form_sent" value="1" />
	<textarea name="req_message" id="comment-message"></textarea>
	<div class="button-wrapper">
		<input type="submit" name="submit" class="button" value="Valider" />
	</div>
</form>

<?php

endif;

?>

</div>

<div class="col col2">

	<?php 
	require UNNAMED_BLOCKS.'/article/share.php'; ?>
	<div class="hr"></div>

<?php if($art['biography']): ?>
	<?php require UNNAMED_BLOCKS.'/article/author.php'; ?>
	<div class="hr"></div>
<?php endif; ?>

<?php
	if($display_toc):
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