<?php
require 'layout/header.php';

$id = (int) $_ARGS[0];
$res = $db->query("SELECT * FROM {$db->prefix}users WHERE id = $id LIMIT 1");

if(!($user = $db->fetch_assoc($res)))
	return_404();

?>

<div class="section">
	<div class="section-light">
		<div class="section-content">
			<div class="twocols-alt-layout">
				<div class="col col1">
					<img src="http://www.unnamed.eu/avatars/<?php echo $id; ?>" alt="" style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); background: rgba(0, 0, 0, 0.3); width: 200px;" />
					<h2 style="margin-bottom: 0;"><?php echo $user['username']; ?></h2>
					<h2 style="margin-top: 0; color: #545454; font-weight: normal;"><?php echo $user['realname']; ?></h2>
				</div>
				<div class="col col2">
					<?php
						echo '<pre><code>';
						unset($user['password']);
						print_r($user);
						echo '</code></pre>';
					?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<?php

require 'layout/footer.php';
