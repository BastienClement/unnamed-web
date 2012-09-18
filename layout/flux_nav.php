<ul>
	<?php if($pun_user['g_read_board'] == '1' && $pun_user['g_view_users'] == '1'): ?>
	<li id="navuserlist">
		<a href="userlist.php"<?php if(PUN_ACTIVE_PAGE == 'userlist') echo 'class="active"'; ?>>Liste des membres</a>
	</li>
	<?php endif; ?>
	
	<?php if($pun_user['g_read_board'] == '1' && $pun_user['g_search'] == '1'): ?>
	<li id="navsearch">
		<a href="search.php"<?php if(PUN_ACTIVE_PAGE == 'search') echo ' class="active"'; ?>>Recherche</a>
	</li>
	<?php endif; ?>
	
	<?php if(!$pun_user['is_guest']): ?>
	<li id="navprofile">
		<a href="profile.php?id=<?php echo $pun_user['id']; ?>"<?php if(PUN_ACTIVE_PAGE == 'profile') echo ' class="active"'; ?>>Profil</a>
	</li>
	<?php endif; ?>
	
	<?php if($pun_user['is_admmod']): ?>
	<li id="navadmin">
		<a href="admin_index.php"<?php if(PUN_ACTIVE_PAGE == 'admin') echo ' class="active"'; ?>>Administration</a>
	</li>
	<?php endif; ?>
</ul>
