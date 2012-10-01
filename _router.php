<?php

define('UNNAMED_ROUTED', 1);
ob_start();

// Print 404 and exit
function return_404() {
	while(@ob_end_clean()); // Closes all open buffers
	require '404.php';
	exit;
}

// Parse request url
$req   = parse_url($_SERVER['REQUEST_URI']);

// Extract parameters
$_ARGS = explode('/', trim($req['path'], '/'));

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
		$ctrl_path = "$site_root/$controller.php";
		if(file_exists($ctrl_path)):
			require $ctrl_path;
			exit;
		endif;
endswitch;

return_404();
