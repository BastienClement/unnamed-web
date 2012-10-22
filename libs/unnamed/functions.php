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
