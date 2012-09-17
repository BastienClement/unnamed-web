<?php

define('UNNAMED', 1);
define('UNNAMED_ROOT', dirname(dirname(__FILE__)));

define('UNNAMED_PROD', isset($_SERVER['UNNAMED_PROD']));
define('UNNAMED_DEV', !UNNAMED_PROD);

require UNNAMED_ROOT.'/externals/loader.php';

if(!defined("IS_PUN")){
define('PUN_ROOT', './forums/');
define('PUN_TURN_OFF_MAINT', 1);
require PUN_ROOT.'include/common.php';
}

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
