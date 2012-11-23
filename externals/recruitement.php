<?php

include dirname(__FILE__).'/../libs/simple_html_dom.php';
include dirname(__FILE__).'/../libs/unnamed/wow.php';

$recruiting = array();

foreach($CLASS_SPECS as $c => $specs) {
	global $recruiting;
	
	$recruiting[$c] = array();
	foreach($specs as $spec_id) {
		$recruiting[$c][$spec_id] = false;
	}
}

function open_recruitement($c, $s = false) {
	global $recruiting;
	
	if($s) {
		$recruiting[$c][$s] = true;
	} else {
		foreach($recruiting[$c] as &$open) {
			$open = true;
		}
	}
}

function parse_class($class) {
	switch($class) {
		case 'warrior': return CLASS_WARRIOR;
		case 'paladin': return CLASS_PALADIN;
		case 'hunter': return CLASS_HUNTER;
		case 'rogue': return CLASS_ROGUE;
		case 'priest': return CLASS_PRIEST;
		case 'deathknight': return CLASS_DK;
		case 'shaman': return CLASS_SHAMAN;
		case 'mage': return CLASS_MAGE;
		case 'warlock': return CLASS_WARLOCK;
		case 'druid': return CLASS_DRUID;
		case 'monk': return CLASS_MONK;
		default: return 0;
	}
}

function parse_class_spec($str) {
	if(preg_match('/([a-z]+)(?:\s+\((.*)\))?/', $str, $parts)) {
		$class = parse_class($parts[1]);
		
		if(!isset($parts[2])) {
			open_recruitement($class);
			return;
		}
		
		switch($class) {
			case CLASS_WARRIOR:
				switch($parts[2]) {
					case 'dd':
						open_recruitement(CLASS_WARRIOR, SPEC_WARRIOR_ARMS);
						open_recruitement(CLASS_WARRIOR, SPEC_WARRIOR_FURRY);
						break;
						
					case 'protection':
						open_recruitement(CLASS_WARRIOR, SPEC_WARRIOR_PROTECTION);
						break;
				}
				break;
				
			case CLASS_PALADIN:
				switch($parts[2]) {
					case 'holy':
						open_recruitement(CLASS_PALADIN, SPEC_PALADIN_HOLY);
						break;
						
					case 'protection':
						open_recruitement(CLASS_PALADIN, SPEC_PALADIN_PROTECTION);
						break;
						
					case 'retribution':
						open_recruitement(CLASS_PALADIN, SPEC_PALADIN_RETRIBUTION);
						break;
				}
				break;
				
			case CLASS_HUNTER:
				// you should not be here
				break;
				
			case CLASS_ROGUE:
				// you should not be here
				break;
				
			case CLASS_PRIEST:
				switch($parts[2]) {
					case 'dd':
						open_recruitement(CLASS_PRIEST, SPEC_PRIEST_SHADOW);
						break;
						
					case 'healer':
						open_recruitement(CLASS_PRIEST, SPEC_PRIEST_HOLY);
						open_recruitement(CLASS_PRIEST, SPEC_PRIEST_DISCIPLINE);
						break;
				}
				break;
				
			case CLASS_DK:
				switch($parts[2]) {
					case 'dd':
						open_recruitement(CLASS_DK, SPEC_DK_FROST);
						open_recruitement(CLASS_DK, SPEC_DK_UNHOLY);
						break;
						
					case 'tank':
						open_recruitement(CLASS_DK, SPEC_DK_BLOOD);
						break;
				}
				break;
				
			case CLASS_SHAMAN:
				switch($parts[2]) {
					case 'elemental':
						open_recruitement(CLASS_SHAMAN, SPEC_SHAMAN_ELEMENTAL);
						break;
						
					case 'enhancement':
						open_recruitement(CLASS_SHAMAN, SPEC_SHAMAN_ENHANCEMENT);
						break;
						
					case 'restoration':
						open_recruitement(CLASS_SHAMAN, SPEC_SHAMAN_RESTORATION);
						break;
				}
				break;
				
			case CLASS_MAGE:
				// you should not be here
				break;
				
			case CLASS_WARLOCK:
				// you should not be here
				break;
				
			case CLASS_DRUID:
				switch($parts[2]) {
					case 'balance':
						open_recruitement(CLASS_DRUID, SPEC_DRUID_BALANCE);
						break;
						
					case 'restoration':
						open_recruitement(CLASS_DRUID, SPEC_DRUID_RESTORATION);
						break;
						
					case 'feral-dd':
						open_recruitement(CLASS_DRUID, SPEC_DRUID_FERAL);
						break;
						
					case 'feral-tank':
						open_recruitement(CLASS_DRUID, SPEC_DRUID_GUARDIAN);
						break;
				}
				break;
				
			case CLASS_MONK:
				switch($parts[2]) {
					case 'dd':
						open_recruitement(CLASS_MONK, SPEC_MONK_WINDWALKER);
						break;
						
					case 'healer':
						open_recruitement(CLASS_MONK, SPEC_MONK_MISTWEAVER);
						break;
						
					case 'tank':
						open_recruitement(CLASS_MONK, SPEC_MONK_BREWMASTER);
						break;
				}
				break;
		}
	}
}

$url  = "http://www.wowprogress.com/guild/eu/mar%C3%A9cage-de-zangar/The+Unnamed";
$html = file_get_html($url);

$table = $html->find("table.recr", 0);

foreach($table->find('tr') as $line) {
	parse_class_spec($line->children(0)->plaintext);
}

file_put_contents(dirname(__FILE__) . "/data/recruitement.txt", serialize($recruiting));
