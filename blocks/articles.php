<?php

$PER_PAGE = defined('BLOCK_ARTICLES_PER_PAGE') ?  BLOCK_ARTICLES_PER_PAGE : 16;
$FORUM_ID = defined('BLOCK_ARTICLES_FORUM_ID') ?  BLOCK_ARTICLES_FORUM_ID : 16;
$LINK_TPL = defined('BLOCK_ARTICLES_LINK_TPL') ?  BLOCK_ARTICLES_LINK_TPL : "/articles/%";
$AUTHOR = defined('BLOCK_ARTICLES_AUTHOR') ? 'AND p.poster_id = '.BLOCK_ARTICLES_AUTHOR : '';

if(defined('BLOCK_ARTICLES_FULL')) {
	$nb_articles = $db->query("SELECT COUNT(*) AS total FROM topics WHERE forum_id = $FORUM_ID");
	
	$total_articles = $db->fetch_assoc($nb_articles)['total'];
	$nb_pages = ceil($total_articles / $PER_PAGE);
	
	$page = isset($_ARGS[0]) ? $_ARGS[0] : 1;
	if(!is_numeric($page) || $page < 1 || $page > $nb_pages)
		return_404();
	else
		$page = (int) $page;
	
	$limit = ($page > 1) ? (($page-1) * $PER_PAGE).','.$PER_PAGE : $PER_PAGE;
} else {
	echo '<h2>Derniers articles</h2>';
	$limit = 5;
}

$articles = $db->query("SELECT t.id, t.poster, t.subject, t.posted, t.num_views, t.num_replies, t.num_likes, p.message, p.poster_id FROM topics AS t INNER JOIN posts AS p ON p.id = t.first_post_id WHERE t.forum_id = $FORUM_ID $AUTHOR ORDER BY t.id DESC LIMIT $limit");

$xbbc_parser = xbbc_ucode_parser();
$xbbc_parser->SetFlag(\XBBC\PARSE_LEAD);

while($article = $db->fetch_assoc($articles)):
	$message = $xbbc_parser->Parse($article['message']);
	$meta = $xbbc_parser->LastMeta();
	$art_url = "/article/{$article['id']}/".sluggify($article['subject']);
?>

<div class="content-block<?php if(defined('BLOCK_ARTICLES_FULL')) echo ' box'; ?>">
	<div class="last-news">
		<a href="<?php echo $art_url; ?>">
			<div class="last-news-title">
				<h3><?php echo htmlspecialchars($article['subject']); ?></h3>
				<div class="last-news-img">
					<img src="<?php echo $meta['thumb']; ?>"/>
					<div class="last-news-img-bar"></div>
				</div>
			</div>
		</a>
		<div class="last-news-infos">
			<abbr class="timeago-uc" title="<?php echo date('c', $article['posted']); ?>"><?php echo date('d/m/Y H:i', $article['posted']); ?></abbr>
			<?php if(defined('BLOCK_ARTICLES_FULL')): ?>
				par <strong><a href="/profile/<?php echo $article['poster_id']; ?>"><?php echo htmlspecialchars($article['poster']); ?></a></strong>
			<?php endif; ?>
			&ndash; <?php echo $article['num_views']; ?> <i class="icon-eye-open"></i>
			/ <a href="<?php echo $art_url; ?>#showcomments"><?php echo $article['num_replies']; ?> <i class="icon-comment"><i class="icon-comment icon-white"></i></i></a>
			/ <?php echo $article['num_likes']; ?> <i class="icon-heart"></i>
		</div>
		<?php
			echo ($meta['desc'] && !defined("BLOCK_ARTICLES_FULL")) ? $xbbc_parser->Parse($meta['desc']) : $message;
		?>
		<?php if($xbbc_parser->LastHasLead() && defined('BLOCK_ARTICLES_FULL')): ?>
		<div class="readmore">
			<a href="<?php echo $art_url; ?>" class="button">Lire la suite</a>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php
endwhile;

if(defined('BLOCK_ARTICLES_FULL')) {
	echo '<div class="hr"></div>';
	paginate_blashier($LINK_TPL, $page, $nb_pages);
} else {
	echo '<div class="button-wrapper"><a href="/articles" class="button">Tous les articles</a></div>';
}

?>
