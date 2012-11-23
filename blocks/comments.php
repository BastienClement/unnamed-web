<h2>Derniers commentaires</h2>
	
<?php

$comments = array();

$WHERE = '';
if(defined('BLOCK_COMMENTS_FORUM'))
	$WHERE .= ' AND t.forum_id = '.BLOCK_COMMENTS_FORUM;
	if(defined('BLOCK_COMMENTS_AUTHOR'))
	$WHERE .= ' AND pu.id = '.BLOCK_COMMENTS_AUTHOR;

$result = $db->query("SELECT t.id, t.subject, t.forum_id, p.id AS post_id, p.poster_id, p.poster, p.message, p.posted, pu.slug FROM posts AS p INNER JOIN topics AS t ON t.id = p.topic_id INNER JOIN users AS u ON u.id = p.poster_id INNER JOIN users AS pu ON pu.username = t.poster WHERE t.forum_id = 16 OR (t.forum_id = 18 AND pu.slug != '') AND p.id != t.first_post_id $WHERE ORDER BY p.posted DESC LIMIT 5");

$xbbc = xbbc_ucode_parser();
$xbbc->SetFlag(\XBBC\NO_HTMLESC);
$xbbc->SetFlag(\XBBC\PLAIN_TEXT);

$xbbc->CustomReducer(function($tag, $ctx) {
	if($tag instanceof \UCode\URoot) {
		$txt = $tag->ReducePlaintext();
		return empty($txt) ? '[...]' : $txt;
	}
	
	if($tag->Display() != \XBBC\DISPLAY_INLINE) { return false; }
	if($tag instanceof \UCode\ImageTag) { return false; }
	
	return $tag->ReducePlaintext();
});

while($cur_topic = $db->fetch_assoc($result)) {
	$date = '<abbr class="timeago-uc" title="'.date('c', $cur_topic['posted']).'">'.date('d/m/Y H:i', $cur_topic['posted']).'</abbr>';
	$author = 'par <a href="/profile/'.$cur_topic['poster_id'].'/'.sluggify($cur_topic['poster']).'">'.htmlspecialchars($cur_topic['poster']).'</a>';
	
	$url = "/article/{$cur_topic['id']}/".sluggify($cur_topic['subject'])."#comment-{$cur_topic['post_id']}";
	
	if($cur_topic['forum_id'] == 17) {
		$url = blog_url($cur_topic['slug'], $url);
	}
	
	$comments[] = array(
		$url,
		truncate($xbbc->Parse($cur_topic['message']), 65, '...', true),
		"$date $author",
		(((time() - $cur_topic['last_post']) < 86400) ? 'time' : 'calendar')
	);
}

links_list($comments);

?>