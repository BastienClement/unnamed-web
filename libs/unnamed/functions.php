<?php

function xbbc_ucode_parser() {
	require_once UNNAMED_LIBS.'/xbbc/xbbc.php';
	require_once UNNAMED_LIBS.'/ucode/ucode.php';
	
	$parser = new \XBBC\Parser(\XBBC\SMILIES_OPTIMIZER);
	\UCode\Lib::load($parser);
	
	return $parser;
}

function sluggify($str) {
	return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($str, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
}

function require_routing() {
	if(!defined('UNNAMED_ROUTED')) {
		header("Location: /");
		exit;
	}
}

function user_avatar($id) {
	echo "<img src=\"http://www.unnamed.eu/avatars/$id\" />";
}

function url($url = '/') {
	return UNNAMED_PROD ? 'http://'.UNNAMED_DOMAIN.".unnamed.eu$url" : $url;
}

function truncate($string, $max_length = 50, $replacement = '...', $trunc_at_space = false) {
	$max_length -= strlen($replacement);
	$string_length = strlen($string);
	
	if($string_length <= $max_length)
		return $string;
	
	if( $trunc_at_space && ($space_position = strrpos($string, ' ', $max_length-$string_length)) )
		$max_length = $space_position;
	
	return substr_replace($string, $replacement, $max_length);
}


function links_list($articles) {
	foreach($articles as $article):
		@list($link, $title, $sub, $icon) = $article;
?>
		<div class="links-list-item">
			<a href="<?php echo htmlspecialchars($link); ?>">
				<div class="links-list-title"><?php echo htmlspecialchars($title); ?></div>
			</a>
			<div class="links-list-sub">
				<?php if($icon): ?>
					<i class="icon-<?php echo $icon; ?>"></i>
				<?php endif; ?>
				<?php echo $sub; ?>
			</div>
		</div>
<?php
	endforeach;
}

function paginate_blashier($link_pattern, $cur, $max) {
	echo '<div class="button-wrapper pagination">';
	
	// Don't ask me how the following works. It just does, OK? :-)
	
	if($cur > 1)
		echo '<a href="'.paginate_fmt($link_pattern, $cur-1).'" class="button prev">Précédent</a>';
	
	if($cur != 1) {
		paginate_link($link_pattern, 1, $cur);
	}
	
	if($cur > 4) {
		$fast_prev = floor(($cur-2 + 1) / 2);
		paginate_link($link_pattern, $fast_prev, $cur);
	}
	
	for($i = max($cur-2, 2); $i < $cur && $i > 1; $i++) {
		paginate_link($link_pattern, $i, $cur);
	}
	
	paginate_link($link_pattern, $cur, $cur);
	
	for($i = $cur+1; $i < $cur+3 && $i < $max; $i++) {
		paginate_link($link_pattern, $i, $cur);
	}
	
	if($cur < $max-3) {
		$fast_next = ceil(($cur+2 + $max) / 2);
		paginate_link($link_pattern, $fast_next, $cur);
	}
	
	if($cur != $max) {
		paginate_link($link_pattern, $max, $cur);
	}
	
	if($cur < $max) {
		echo '<a href="'.paginate_fmt($link_pattern, $cur+1).'" class="button next">Suivant</a>';
	}
	
	echo '</div>';
}

function paginate_link($link_pattern, $i, $cur) {
	echo '<a href="'.paginate_fmt($link_pattern, $i).'" class="button'.(($i == $cur) ? ' active' : '').'">'.$i.'</a>';
}

function paginate_fmt($link_pattern, $i) {
	if($i == 1)
		$i = '';
	
	$link = str_replace('%', $i, $link_pattern);
	return rtrim($link, '/');
}
