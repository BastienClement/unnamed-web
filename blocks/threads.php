<h2>Sujets actifs</h2>

<?php

$threads = array();

$result = $db->query("SELECT t.id, t.poster, t.subject, t.posted, t.last_post, t.last_poster, p.poster_id FROM {$db->prefix}topics AS t INNER JOIN {$db->prefix}posts AS p ON p.id=t.last_post_id INNER JOIN {$db->prefix}users AS u ON u.id=p.poster_id LEFT JOIN {$db->prefix}forum_perms AS fp ON (fp.forum_id=t.forum_id AND fp.group_id={$pun_user['g_id']}) WHERE (fp.read_forum IS NULL OR fp.read_forum=1) AND t.moved_to IS NULL AND t.forum_id NOT IN(16, 17) ORDER BY t.last_post DESC LIMIT 5") or error('Unable to fetch topic info', __FILE__, __LINE__, $db->error());
while($cur_topic = $db->fetch_assoc($result)) {
	$date = '<abbr class="timeago-uc" title="'.date('c', $cur_topic['last_post']).'">'.date('d/m/Y H:i', $art['posted']).'</abbr>';
	$author = 'par <a href="/profile/'.$cur_topic['poster_id'].'">'.htmlspecialchars($cur_topic['last_poster']).'</a>';
	
	$threads[] = array(
		"/viewtopic.php?id={$cur_topic['id']}&action=new",
		$cur_topic['subject'],
		"$date $author",
		(((time() - $cur_topic['last_post']) < 86400) ? 'time' : 'calendar')
	);
}

links_list($threads);

?>

<div class="button-wrapper"><a href="/articles" class="button">Accéder au forum</a></div>