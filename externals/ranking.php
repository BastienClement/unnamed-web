<?php

$URL = "http://www.wowprogress.com/guild/eu/mar%C3%A9cage-de-zangar/The+Unnamed";

$REGEX_WORLD    = "/world:.*?(\d+)/msi";
$REGEX_EU       = "/eu:.*?(\d+)/msi";
$REGEX_FR       = "/fr:.*?(\d+)/msi";
$REGEX_REALM    = "/realm:.*?(\d+)/msi";
$REGEX_PROGRESS = "/progress:.*?>(.*?)<\/span>/msi";
$REGEX_LADDER   = "/<span class=\"selected\">tier(.*?)<\/span>/msi";

$source = file_get_contents($URL);

if(preg_match($REGEX_WORLD, $source, $preg_world) &&
   preg_match($REGEX_EU, $source, $preg_eu) &&
   preg_match($REGEX_FR, $source, $preg_fr) &&
   preg_match($REGEX_REALM, $source, $preg_realm) &&
   preg_match($REGEX_PROGRESS, $source, $preg_progress) &&
   preg_match($REGEX_LADDER, $source, $preg_ladder))
{
	preg_match_all('/(\d)\/(\d)( \(H\))?/', strip_tags($preg_progress[1]), $preg_progress, PREG_SET_ORDER);
	
	$kill_n = 0;
	$kill_h = 0;
	$total = 0;
	
	foreach($preg_progress as $raid) {
		$total += $raid[2];
		if(isset($raid[3])) {
			$kill_h += $raid[1];
		} else {
			$kill_n += $raid[1];
		}
	}
	
	$progress = ($kill_h) ? "$kill_h/$total (H)" : "$kill_n/$total";
	
	$ranking = array(
		"world"    => $preg_world[1],
		"eu"       => $preg_eu[1],
		"fr"       => $preg_fr[1],
		"realm"    => $preg_realm[1],
		"progress" => $progress,
		"ladder"   => $preg_ladder[1],
		"source"   => $URL
	);

	file_put_contents(dirname(__FILE__) . "/data/ranking.txt", serialize($ranking));
}
