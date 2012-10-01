<h2 class="stats">Statistiques</h2>
<ul>
<?php
	require PUN_ROOT.'lang/'.$pun_config['o_default_lang'].'/index.php';

	// Collect some statistics from the database
	if (file_exists(FORUM_CACHE_DIR.'cache_users_info.php'))
		include FORUM_CACHE_DIR.'cache_users_info.php';

	if (!defined('PUN_USERS_INFO_LOADED'))
	{
		if (!defined('FORUM_CACHE_FUNCTIONS_LOADED'))
			require PUN_ROOT.'include/cache.php';

		generate_users_info_cache();
		require FORUM_CACHE_DIR.'cache_users_info.php';
	}

	$result = $db->query('SELECT SUM(num_topics), SUM(num_posts) FROM '.$db->prefix.'forums') or error('Unable to fetch topic/post count', __FILE__, __LINE__, $db->error());
	list($stats['total_topics'], $stats['total_posts']) = $db->fetch_row($result);

	// Send the Content-type header in case the web server is setup to send something else
	header('Content-type: text/html; charset=utf-8');
	header('Expires: '.gmdate('D, d M Y H:i:s').' GMT');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');

	echo '<li>'.sprintf($lang_index['No of users'], forum_number_format($stats['total_users'])).'</li>'."\n";
	echo '<li>'.sprintf($lang_index['Newest user'], (($pun_user['g_view_users'] == '1') ? '<a href="'.pun_htmlspecialchars(get_base_url(true)).'/profile.php?id='.$stats['last_user']['id'].'">'.pun_htmlspecialchars($stats['last_user']['username']).'</a>' : pun_htmlspecialchars($stats['last_user']['username']))).'</li>'."\n";
	echo '<li>'.sprintf($lang_index['No of topics'], forum_number_format($stats['total_topics'])).'</li>'."\n";
	echo '<li>'.sprintf($lang_index['No of posts'], forum_number_format($stats['total_posts'])).'</li>'."\n";
	
	require PUN_ROOT.'lang/'.$pun_config['o_default_lang'].'/index.php';

	// Fetch users online info and generate strings for output
	$num_guests = $num_users = 0;
	$users = array();

	$result = $db->query('SELECT user_id, ident FROM '.$db->prefix.'online WHERE idle=0 ORDER BY ident', true) or error('Unable to fetch online list', __FILE__, __LINE__, $db->error());

	while ($pun_user_online = $db->fetch_assoc($result))
	{
		if ($pun_user_online['user_id'] > 1)
		{
			$users[] = ($pun_user['g_view_users'] == '1') ? '<a href="'.pun_htmlspecialchars(get_base_url(true)).'/profile.php?id='.$pun_user_online['user_id'].'">'.pun_htmlspecialchars($pun_user_online['ident']).'</a>' : pun_htmlspecialchars($pun_user_online['ident']);
			++$num_users;
		}
		else
			++$num_guests;
	}
	
	echo '<li>'.sprintf($lang_index['Guests online'], forum_number_format($num_guests)).'</li>'."\n";
	
	if(!empty($users))
		echo '<li>'.sprintf($lang_index['Users online'], implode(', ', $users)).'</li>'."\n";
?>
</ul>
