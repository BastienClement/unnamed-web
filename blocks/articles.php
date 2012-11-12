<?php

if(!defined('BLOCK_ARTICLES_FULL')) {
	echo '<h2>Derniers articles</h2>';
}

if(defined('BLOCK_ARTICLES_FULL')) {
	$nb_articles = $db->query('SELECT COUNT(*) AS total FROM topics WHERE forum_id = 16');
	$total_articles = $db->fetch_assoc($nb_articles)['total'];
	
	$page = isset($_ARGS[0]) ? $_ARGS[0] : 1;
	if(!is_numeric($page) || $page < 1)
		return_404();
	
	$limit = ($page > 1) ? (($page-1) * 10).',10' : '10';
} else{
	$limit = 5;
}

$articles = $db->query("SELECT t.id, t.poster, t.subject, t.posted, t.num_views, t.num_replies, t.num_likes, p.message FROM topics AS t INNER JOIN posts AS p ON p.id = t.first_post_id WHERE t.forum_id = 16 ORDER BY t.id DESC LIMIT $limit");

$xbbc_parser = xbbc_ucode_parser();
$xbbc_parser->SetFlag(\XBBC\PARSE_LEAD);

while($article = $db->fetch_assoc($articles)):
	$message = $xbbc_parser->Parse($article['message']);
	$meta = $xbbc_parser->LastMeta();
	$art_url = "/article/{$article['id']}/".sluggify($article['subject']);
?>

<div class="content-block">
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
			&ndash; <?php echo $article['num_views']; ?> <i class="icon-eye-open"></i>
			/ <a href="<?php echo $art_url; ?>#showcomments"><?php echo $article['num_replies']; ?> <i class="icon-comment"><i class="icon-comment"></i></i></a>
			/ <?php echo $article['num_likes']; ?> <i class="icon-heart"></i>
		</div>
		<?php
			echo ($meta['desc'] && !defined("BLOCK_ARTICLES_FULL")) ? $xbbc_parser->Parse($meta['desc']) : $message;
		?>
	</div>
</div>

<?php
endwhile;

if(defined('BLOCK_ARTICLES_FULL')) {
	$nb_pages = ceil($total_articles / 10);
	
	echo '<div class="button-wrapper pagination">';

	for($i = 1; $i <= $nb_pages; $i++) {
		if($i == $page) {
			echo '<a href="/articles/'.$i.'" class="button active">'.$i.'</a>'; 
		} else{
			echo '<a href="/articles/'.$i.'" class="button">'.$i.'</a>';
		}
	}
		
	echo '</div>';
} else {
	echo '<div class="button-wrapper"><a href="/articles" class="button">Tous les articles</a></div>';
}

?>
