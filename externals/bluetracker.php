<?php

$flux = file_get_contents("http://blue.mmo-champion.com/rss/?language=fr");

    try{
        if(!@$fluxrss=simplexml_load_string($flux)){
            throw new Exception('Flux introuvable');
        }
        if(empty($fluxrss->channel->title) || empty($fluxrss->channel->description) || empty($fluxrss->channel->item->title))
            throw new Exception('Flux invalide');
		
		foreach($fluxrss->channel->item as $item){
			$array[] = array(
				'title' => (string)$item->title,
				'url' => (string)$item->link,
				'date' => (string)date('d/m/Y',strtotime($item->pubDate)),
			);
		}
		
		$array = serialize($array);
		
		file_put_contents(dirname(__FILE__) . "/data/bluetracker.txt", $array);

    }
    catch(Exception $e){
        echo $e->getMessage();
    }

	
?>