<?php

// Parser is sometimes included before the Unnamed common file
if(!defined("IS_PUN")) define("IS_PUN", 1);
require_once dirname(__FILE__).'/../../libs/unnamed/common.php';

//
// Make sure all BBCodes are lower case and do a little cleanup
//
function preparse_bbcode($text, &$errors, $is_signature = false)
{
	return $text;
}


//
// Strip empty bbcode tags from some text
//
function strip_empty_bbcode($text)
{
	throw new Exception("Deprecated function");
}


//
// Check the structure of bbcode tags and fix simple mistakes where possible
//
function preparse_tags($text, &$errors, $is_signature = false)
{
	return $text;
}


//
// Preparse the contents of [list] bbcode
//
function preparse_list_tag($content, $type = '*')
{
	throw new Exception("Deprecated function");
}


//
// Truncate URL if longer than 55 characters (add http:// or ftp:// if missing)
//
function handle_url_tag($url, $link = '', $bbcode = false)
{
	throw new Exception("Deprecated function");
}


//
// Turns an URL from the [img] tag into an <img> tag or a <a href...> tag
//
function handle_img_tag($url, $is_signature = false, $alt = null)
{
	throw new Exception("Deprecated function");
}


//
// Parse the contents of [list] bbcode
//
function handle_list_tag($content, $type = '*')
{
	throw new Exception("Deprecated function");
}


//
// Convert BBCodes to their HTML equivalent
//
function do_bbcode($text, $is_signature = false)
{
	throw new Exception("Deprecated function");
}


//
// Make hyperlinks clickable
//
function do_clickable($text)
{
	throw new Exception("Deprecated function");
}


//
// Convert a series of smilies to images
//
function do_smilies($text)
{
	throw new Exception("Deprecated function");
}

//
// Parse message text
//
function parse_message($text, $hide_smilies = '0')
{
	global $pun_config, $pun_user;
	
	static $xbbc; 
	if(!$xbbc) $xbbc = xbbc_ucode_parser();
	
	$flags = 0;
	
	if($pun_config['p_sig_bbcode'] != '1' || strpos($text, '[') === false || strpos($text, ']') === false)
		$flags |= NO_CODE;
	
	if($pun_config['o_smilies_sig'] != '1' || $pun_user['show_smilies'] != '1' || $hide_smilies != '0')
		$flags |= NO_SMILIES;
	
	return $xbbc->Flags($flags)->Parse($text);
}


//
// Clean up paragraphs and line breaks
//
function clean_paragraphs($text)
{
	throw new Exception("Deprecated function");
}


//
// Parse signature text
//
function parse_signature($text)
{
	return parse_message($text);
}
