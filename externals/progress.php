<?php

include "../libs/simple_html_dom.php";

$html = new simple_html_dom();
$html->load_file('http://www.wowprogress.com/guild/eu/mar%C3%A9cage-de-zangar/The+Unnamed');

$html->find('.primary', 0)->children(12)->first_child()->outertext ="";
$html->load($html->save());

$table = $html->find('.primary', 0)->children(12);

foreach ($table->find('tr') as $rows){
	$return[] = array(
		'encounter' => $rows->find('td', 0)->plaintext,
		'date' => $rows->find('td', 1)->plaintext,
		'worldRank' => $rows->find('td', 2)->plaintext,
		'euRank' => $rows->find('td', 3)->plaintext,
		'realmRank' => $rows->find('td', 4)->plaintext,
		'points' => $rows->find('td', 5)->plaintext,
	);
}

$return = serialize($return);

file_put_contents(dirname(__FILE__) . "/data/progress.txt", $return);
