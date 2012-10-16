<?php

$URL = "http://www.wowprogress.com/guild/eu/mar%C3%A9cage-de-zangar/The+Unnamed";

$REGEX_WORLD    = "/world:.*?(\d+)/msi";
$REGEX_EU       = "/eu:.*?(\d+)/msi";
$REGEX_FR       = "/fr:.*?(\d+)/msi";
$REGEX_REALM    = "/realm:.*?(\d+)/msi";
$REGEX_PROGRESS = "/progress:.*?>\s*(\d+\s*\/[^<]+)/msi";
$REGEX_LADDER   = "/<span class=\"selected\">tier(.*?)<\/span>/msi";

$source = file_get_contents($URL);

if(preg_match($REGEX_WORLD, $source, $preg_world) &&
   preg_match($REGEX_EU, $source, $preg_eu) &&
   preg_match($REGEX_FR, $source, $preg_fr) &&
   preg_match($REGEX_REALM, $source, $preg_realm) &&
   preg_match($REGEX_PROGRESS, $source, $preg_progress) &&
   preg_match($REGEX_LADDER, $source, $preg_ladder))
{
	$ranking = array(
		"world"    => $preg_world[1],
		"eu"       => $preg_eu[1],
		"fr"       => $preg_fr[1],
		"realm"    => $preg_realm[1],
		"progress" => $preg_progress[1],
		"ladder"   => $preg_ladder[1],
		"source"   => $URL
	);

	file_put_contents(dirname(__FILE__) . "/data/ranking.txt", serialize($ranking));
}
