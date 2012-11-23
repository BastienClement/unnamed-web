<?php

// Handles a blog request
function handle_blog_request($blog, $args) {
	if(!preg_match('/^[a-z]+$/', $blog))
		return;
	
	foreach($GLOBALS as $var_name => &$var_value) {
		$$var_name =& $var_value;
	}
	
	$res = $db->query('SELECT * FROM users WHERE slug = "'.$blog.'" LIMIT 1');
	$blog_author = $db->fetch_assoc($res);
	
	if(!$blog_author)
		return_void();
	
	$blog_controller = isset($args[0]) ? $args[0] : 'index';
	
	if(!preg_match('/^[a-z]+$/', $blog_controller))
		return_404();
	
	$ctrl_path = "blog/$blog_controller.php";
	if(file_exists($ctrl_path)):
		require $ctrl_path;
		exit;
	endif;
	
	return_404();
}

function blog_url($author, $url = '/') {
	return UNNAMED_PROD ? "http://$author.unnamed.eu$url" : "/$author$url";
}
