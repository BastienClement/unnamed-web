<h2>Activité récente</h2>

<?php
$data = load_external('activity');
$activities = unserialize($data);

foreach($activities as $key => $feed) {
	if($key >= 8)
		break;
	
	$full       = trim($feed["full"]);
	$icon       = str_replace('"', "'", trim($feed["icon"]));
	$name       = $feed["name"];
	$name_url   = $feed["name_url"];
	$time       = $feed["time"];

	$feed_name  = $feed["feed_name"];
	$feed_class = $feed["feed_class"];
	$feed_url   = $feed["feed_url"];

	if(strpos($name_url, "guild") !== false) {
		if(strpos($name_url, "achievement") !== false) {
			if(preg_match("/(\d+)$/", $name_url, $matched)) {
					$id = $matched[1];
					$full = str_replace($name, "<a href=\"http://fr.wowhead.com/achievement=$id\">$name</a>", $full);
			}
		}
	}
	elseif(strpos($name_url, "character") !== false) {
		$full = str_replace($name, "<a href=\"http://eu.battle.net{$name_url}advanced\">$name</a>", $full);

		if(strpos($feed_url, "item") !== false) {
			if(preg_match("/(\d+)$/", $feed_url, $matched)) {
				$quality = substr($feed_class, 6);
				$id = $matched[1];
				$full = str_replace($feed_name, "<a href=\"http://fr.wowhead.com/item=$id\" class=\"$quality\">$feed_name</a>", $full);
			}
		}
		elseif(strpos($feed_url, "achievement") !== false) {
			if(preg_match("/(\d+)$/", $feed_url, $matched)) {
				$quality = substr($feed_class, 6);
				$id = $matched[1];
				$full = str_replace($feed_name, "<a href=\"http://fr.wowhead.com/achievement=$id\">$feed_name</a>", $full);
			}
		}
	}

	if(preg_match("/minute/", $time) || preg_match("/dans/", $time)) {
		$time = str_replace($time, "Il y a moins d'une heure", $time);
	}

	$full = rtrim($full, ".");
	$time = ucfirst(str_replace(" ", "&nbsp;", $time));

	echo "<div class=\"newsfeed clearfix\"><span class=\"icon\" style=\"$icon\"></span> $full.<br /><span class=\"time\">$time</span></div>";
}
?>

<div class="button-wrapper"><a href="" class="button">Afficher plus</a></div>
