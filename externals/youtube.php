<?php

function toArray($xml) {
    $array = json_decode(json_encode($xml), TRUE);
    
    foreach ( array_slice($array, 0) as $key => $value ) {
        if ( empty($value) ) $array[$key] = NULL;
        elseif ( is_array($value) ) $array[$key] = toArray($value);
    }

    return $array;
}

$max_results = 28;
$url = "http://gdata.youtube.com/feeds/api/users/WoWUnnamed/favorites?v=2&max-results=$max_results"; 
$xml = simplexml_load_file($url);

foreach ($xml->entry as $entry) {

	$media = $entry->children('http://search.yahoo.com/mrss/');
	$data['title'] = $media->group->title;
	$data['url'] = $media->group->player->attributes();
	$data['description'] = $media->group->description;
	$data['thumb'] = $media->group->thumbnail[1]->attributes();
	$data['uploader'] = $media->group->credit->attributes('yt', TRUE)->display;

	$yt = $media->children('http://gdata.youtube.com/schemas/2007');
	$data['upload_date'] = $yt->uploaded;

	$yt = $entry->children('http://gdata.youtube.com/schemas/2007');
	$data['views'] = $yt->statistics->attributes()->viewCount; 

	$return[] = array(
		'title' => $data['title'],
		'url' => $data['url'],
		'description' => $data['description'],
		'thumb' => $data['thumb'],
		'upload_date' => $data['upload_date'],
		'uploader' => $data['uploader'],
		'views' => $data['views']
	);

}

$return = toArray($return);
	
foreach ($return as $row){
	$array[] = array(
		'title' => $row['title'][0],
		'url' => $row['url']['@attributes']['url'],
		'description' => $row['description'][0],
		'thumb' => $row['thumb']['@attributes']['url'],
		'upload_date' => strtotime($row['upload_date'][0]),
		'uploader' => $row['uploader'][0],
		'views' => $row['views'][0]
	);
}

$array = serialize($array);

file_put_contents(dirname(__FILE__) . "/data/youtube.txt", $array);
