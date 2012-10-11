<?php

function xbbc_ucode_parser() {
	require_once UNNAMED_LIBS.'/xbbc/xbbc.php';
	require_once UNNAMED_LIBS.'/unnamed/ucodelib.php';
	
	$parser = new \XBBC\Parser;
	\UCode\Lib::load($parser);
	
	return $parser;
}
