<h2>Derniers commentaires</h2>
	
<?php

$comments = array();

$result = $db->query("SELECT t.id, t.subject, t.last_post, t.last_poster, p.poster_id, p.poster, u.slug FROM topics AS t INNER JOIN posts AS p ON p.id=t.last_post_id INNER JOIN users AS u ON u.id=p.poster_id LEFT JOIN forum_perms AS fp ON (fp.forum_id=t.forum_id AND fp.group_id={$pun_user['g_id']}) WHERE (fp.read_forum IS NULL OR fp.read_forum=1) AND t.moved_to IS NULL AND (t.forum_id = 16 OR (t.forum_id = 17 AND u.slug != '')) AND t.last_post_id != t.first_post_id ORDER BY t.last_post DESC LIMIT 5") or error('Unable to fetch topic info', __FILE__, __LINE__, $db->error());
while($cur_topic = $db->fetch_assoc($result)) {
	$date = '<abbr class="timeago-uc" title="'.date('c', $cur_topic['last_post']).'">'.date('d/m/Y H:i', $cur_topic['last_post']).'</abbr>';
	$author = 'par <a href="/profile/'.$cur_topic['poster_id'].'/'.sluggify($cur_topic['poster']).'">'.htmlspecialchars($cur_topic['last_poster']).'</a>';
	
	if($cur_topic['slug']) {
		$url = blog_url($cur_topic['slug'], "/article/{$cur_topic['id']}/".sluggify($cur_topic['subject']))."#showcomments";
	} else {
		$url = "/forums/viewtopic.php?id={$cur_topic['id']}&action=new";
	}
	
	$comments[] = array(
		$url,
		$cur_topic['subject'],
		"$date $author",
		(((time() - $cur_topic['last_post']) < 86400) ? 'time' : 'calendar')
	);
}

links_list($comments);

?>