<?php

function xbbc_ucode_parser() {
	require_once UNNAMED_LIBS.'/xbbc/xbbc.php';
	require_once UNNAMED_LIBS.'/unnamed/ucodelib.php';
	
	$parser = new \XBBC\Parser;
	\UCode\Lib::load($parser);
	
	$parser->RootTag(new \UCode\Root());
	
	return $parser;
}

function sluggify($str) {
	return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($str, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
}

function require_routing() {
	if(!defined('UNNAMED_ROUTED')) {
		header("Location: /");
		exit;
	}
}
