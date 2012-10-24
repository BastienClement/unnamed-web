<h2>Derniers articles</h2>

<?php

$last_articles = array();

$last_articles_res = $db->query("SELECT t.id, t.subject, t.posted, p.poster_id, p.poster FROM {$db->profile}topics AS t INNER JOIN {$db->profile}posts AS p ON p.id = t.first_post_id WHERE p.poster_id != {$art['poster_id']} AND (t.forum_id = 16 OR t.forum_id = 17) ORDER BY t.id DESC LIMIT 5");
while($cur_topic = $db->fetch_assoc($last_articles_res)) {
	$date = '<abbr class="timeago-uc" title="'.date('c', $cur_topic['posted']).'">'.date('d/m/Y H:i', $cur_topic['posted']).'</abbr>';
	$author = 'par <a href="/profile/'.$cur_topic['poster_id'].'/'.sluggify($cur_topic['poster']).'">'.htmlspecialchars($cur_topic['poster']).'</a>';
	
	$last_articles[] = array(
		"/article/{$cur_topic['id']}/".sluggify($cur_topic['subject']),
		$cur_topic['subject'],
		"$date $author",
		(((time() - $cur_topic['posted']) < 86400) ? 'time' : 'calendar')
	);
}

links_list($last_articles);

