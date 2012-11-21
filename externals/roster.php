<?php

define('PUN_ROOT', dirname(__FILE__).'/../forums/');
define('PUN_TURN_OFF_MAINT', 1);
define('PUN_QUIET_VISIT', 1);
require PUN_ROOT.'include/common.php';

//header("Content-Type: text/plain");
$data = json_decode(file_get_contents("http://eu.battle.net/api/wow/guild/marecage-de-zangar/The%20Unnamed?fields=members"), true);

if(!$data || !isset($data['members']))
	return;

$updated = time();

foreach($data['members'] as $member) {
	$char = $member['character'];
	
	$name = '"'.$db->escape($char['name']).'"';
	
	$values = array(
		'`class`' => $char['class'],
		'`race`' => $char['race'],
		'`gender`' => $char['gender'],
		'`level`' => $char['level'],
		'`achievements`' => $char['achievementPoints'],
		'`rank`' => $member['rank'],
		'`updated`' => $updated
	);
	
	$data = '(`name`, '.implode(', ', array_keys($values)).') VALUES ('.$name.', '.implode(', ', array_values($values)).')';
	$update = implode(', ', array_map(function($k, $v) { return "$k = $v"; }, array_keys($values), array_values($values)));
	$sql = "INSERT INTO guild_roster $data ON DUPLICATE KEY UPDATE $update";
	
	$db->query($sql) or die(print_r($db->error(), true));
}

$db->query('DELETE FROM guild_roster WHERE updated < '.$updated);
$db->end_transaction();
