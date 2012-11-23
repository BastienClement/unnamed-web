<?php
include dirname(__FILE__).'/../libs/simple_html_dom.php';

$url  = "http://eu.battle.net/wow/fr/guild/marecage-de-zangar/The_Unnamed/news";
$html = file_get_html($url);

if(!$html->find('div[id=server-error] h2')):
	$results = array();
	foreach($html->find('ul.activity-feed li') as $li){
		$results[] = array(
			'full' => trim(strip_tags($li->find('dd',0)->innertext)),
			'icon' => trim($li->find('a span', 0)->style),
			'name' => trim($li->find('a', 1)->plaintext),
			'name_url' => trim($li->find('a', 1)->href),
			'feed_name' => trim($li->find('a', 2)->innertext),
			'feed_class' => trim($li->find('a', 2)->class),
			'feed_url' => trim($li->find('a', 2)->href),
			'time' => trim($li->find('dt', 0)->plaintext),
		);
	}
	
	if(count($results) < 1) {
		file_put_contents(dirname(__FILE__) . "/data/activity_error.txt", $html->save());
	} else {
		file_put_contents(dirname(__FILE__) . "/data/activity.txt", serialize($results));
	}
endif;
