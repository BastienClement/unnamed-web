<h2>Dernière vidéo</h2>

<?php

$data = load_external('youtube');
$array = unserialize($data);

usort($array, function($b, $a) {
	return $a["upload_date"]-$b["upload_date"];
});

$array = array_shift($array);

parse_str( parse_url( $array['url'], PHP_URL_QUERY ), $video_id );

?>

<iframe width="380" height="250" src="http://www.youtube.com/embed/<?php echo $video_id['v']; ?>" frameborder="0" allowfullscreen></iframe>

<div class="button-wrapper"><a href="/videos" class="button">Voir toutes les vidéos</a></div>
