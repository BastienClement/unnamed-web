</div>

<div id="footer">
	<div class="section">
		<div class="section-light">
			<div class="section-content">
				<div class="col col-footer">
					<h2 class="mmochampion">MMO-Champion</h2>
					<ul>
					<?php
					
						$data = load_external('mmochampion');
						$mmochampion = unserialize($data);
						
						foreach($mmochampion as $key => $value){
							if($key >= 5)
							break;
							echo "<li><a href=\"".$value['url']."\">".$value['title']."</a></li><span class=\"footrss\">Publié le ".$value['date']."</span>";
						}
					
					?>
					</ul>
				</div>
				
				<div class="col col-footer">
					<h2 class="bluetracker">Blue Tracker</h2>
					<ul>
					<?php
						
						$data = load_external('bluetracker');
						$mmochampion = unserialize($data);
						
						foreach($mmochampion as $key => $value){
							if($key >= 5)
							break;
							echo "<li><a href=\"".$value['url']."\">".$value['title']."</a></li><span class=\"footrss\">Publié le ".$value['date']."</span>";
						}
					
					?>
					</ul>
				</div>
				
				<div class="col col-footer">
					<h2 class="links">Liens</h2>
					<ul>
			<li><a href="http://eu.battle.net/wow/fr/guild/marecage-de-zangar/The Unnamed/news">Actualités de la guilde</a></li>
           <li><a href="http://eu.battle.net/wow/fr/guild/marecage-de-zangar/The Unnamed/">Armurerie</a></li>
		   <li><a href="http://eu.battle.net/wow/fr/forum/940395/">Forum Marécage de Zangar</a></li>
           <li><a href="http://www.wowprogress.com/guild/eu/mar%C3%A9cage-de-zangar/The+Unnamed">WoWProgress</a></li>
		   <li><a href="http://www.worldoflogs.com/guilds/120466/">World of Logs</a></li>
		   <li><a href="http://www.wowtrack.org/guild/EU/Mar%C3%A9cage%20de%20Zangar/The%20Unnamed">Wowtrack</a></li>
           <li><a href="http://www.guildox.com/go/g.asp?n=The+Unnamed&r=Marécage+de+Zangar-EU">Guildox</a></li>
           
			
		</ul>
				</div>
				
				<div class="col col-footer">
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
	echo '<li>'.sprintf($lang_index['Users online'], implode(', ', $users)).'</li>'."\n";
?>
	</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="section-content" id="copyright">
			<div class="right">
				Conception PHP5 / HTML5 / CSS3 / JS : <a href="/forums/profile.php?id=2">Noumah</a>, <a href="/forums/profile.php?id=215">Blash</a>
			</div>
			© Unnamed.eu – Généré par <a href="http://www.fluxbb.org/">FluxBB</a>, <a href="http://jquery.com">jQuery</a> en <unnamed_time>s
		</div>
	</div>
</div>

</div> <!-- page -->
</div> <!-- top-background -->

</body>
</html>