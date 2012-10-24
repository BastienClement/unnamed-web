<h2>Du même auteur</h2>

<?php

$same_author = array();

$same_author_res = $db->query("SELECT t.id, t.subject, t.posted FROM {$db->profile}topics AS t WHERE t.poster = '".$db->escape($art['poster'])."' AND (t.forum_id = 16 OR t.forum_id = 17) ORDER BY t.id DESC LIMIT 5");
while($cur_topic = $db->fetch_assoc($same_author_res)) {
	$date = '<abbr class="timeago-uc" title="'.date('c', $cur_topic['posted']).'">'.date('d/m/Y H:i', $cur_topic['posted']).'</abbr>';
	
	$same_author[] = array(
		"/article/{$cur_topic['id']}/".sluggify($cur_topic['subject']),
		$cur_topic['subject'],
		$date,
		(((time() - $cur_topic['posted']) < 86400) ? 'time' : 'calendar')
	);
}

links_list($same_author);
