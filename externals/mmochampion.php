<?php

$flux = file_get_contents("http://www.mmo-champion.com/external.php?do=rss&type=newcontent&sectionid=1&days=120&count=10");

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
		
		file_put_contents(dirname(__FILE__) . "/data/mmochampion.txt", $array);

    }
    catch(Exception $e){
        echo $e->getMessage();
    }

	
?>