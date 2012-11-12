<?php

define('UNNAMED_ROUTED', 1);
ob_start();

require_once "libs/unnamed/common.php";
require_once "libs/unnamed/blogs.php";

// Print 404 and exit
function return_404() {
	while(@ob_end_clean()); // Closes all open buffers
	header("Status: 404 Not Found");
	require '404.php';
	exit;
}

// Print void page and exit
function return_void() {
	while(@ob_end_clean()); // Closes all open buffers
	require 'void.php';
	exit;
}

// Parse request url
$req = parse_url($_SERVER['REQUEST_URI']);

// Extract parameters
$_ARGS = explode('/', trim($req['path'], '/'));

// Handle blog domain
if(isset($_SERVER['UNNAMED_PROD'])) {
	$blacklist = array("www", "stable");
	$domain = explode(".", $_SERVER['HTTP_HOST'])[0];
	
	if(!in_array($domain, $blacklist)) {
		handle_blog_request($domain, $_ARGS) or return_404();
	}
}

// First parameter is the controller name
$controller = array_shift($_ARGS);
if(preg_match('/[^a-z0-9]/i', $controller))
	return_404();

// Debug
if(isset($_GET['rtdebug'])):
	echo '<pre>';
	var_dump($req, $controller, $_ARGS);
	echo '</pre>';
endif;

$site_root = dirname(__FILE__);

switch($controller):
	default:
		// Simple controller
		$ctrl_path = "$site_root/$controller.php";
		if(file_exists($ctrl_path)):
			require $ctrl_path;
			exit;
		endif;
		
		// Blog request
		handle_blog_request($controller, $_ARGS);
endswitch;

return_404();
