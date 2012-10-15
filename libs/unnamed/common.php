<?php

define('UNNAMED', 1);

define('UNNAMED_ROOT', dirname(dirname(dirname(__FILE__))));
define('UNNAMED_BLOCKS', UNNAMED_ROOT.'/blocks');
define('UNNAMED_LAYOUT', UNNAMED_ROOT.'/layout');
define('UNNAMED_LIBS',   UNNAMED_ROOT.'/libs');

define('UNNAMED_PROD', isset($_SERVER['UNNAMED_PROD']));
define('UNNAMED_DEV', !UNNAMED_PROD);

require UNNAMED_ROOT.'/externals/loader.php';

if(!defined("IS_PUN")):
	define('PUN_ROOT', UNNAMED_ROOT.'/forums/');
	define('PUN_TURN_OFF_MAINT', 1);
	define('PUN_QUIET_VISIT', 1);
	define("PUN_SHOW_QUERIES", 1);
	require PUN_ROOT.'include/common.php';
	
	// WTF if this fucking default transaction committed in footer.php ?!?
	register_shutdown_function(function() {
		global $db;
		$db->end_transaction();
	});
endif;

require UNNAMED_LIBS.'/unnamed/functions.php';

// Load timer

if(defined('IS_PUN')):
	ob_end_clean();
endif;

$PAGE_TIME_START = microtime(true);

ob_start(function($html) {
	global $PAGE_TIME_START;
	$PAGE_TIME_END = microtime(true);
	$PAGE_TIME = round(($PAGE_TIME_END - $PAGE_TIME_START)*1000)/1000;
	
	return str_replace("<unnamed_time>", $PAGE_TIME, $html);
});

if(defined('IS_PUN')):
	ob_start();
endif;
