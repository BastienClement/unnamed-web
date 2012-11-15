<?php

$articles = $db->query("SELECT t.id, t.poster, t.subject, t.posted, p.message, p.poster_id FROM topics AS t INNER JOIN posts AS p ON p.id = t.first_post_id WHERE t.forum_id IN ('16','17') ORDER BY t.id DESC LIMIT 20");

$xbbc_parser = xbbc_ucode_parser();
$xbbc_parser->SetFlag(\XBBC\PARSE_LEAD);

header('Content-Type: application/rss+xml; charset=UTF-8');

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<rss version="2.0">';
echo '<channel>';
echo '<title>Unnamed.eu - Flux RSS</title>';
echo '<link>http://www.unnamed.eu</link>';
echo '<description>Portail de la guilde The Unnamed sur le serveur Marécage de Zangar (EU)</description>';

while($article = $db->fetch_assoc($articles)):
	echo '<item>';
	echo '<title><![CDATA['.$article['subject'].']]></title>';
	echo '<link>'.url("/article/").$article['id'].'/'.sluggify($article['subject']).'</link>';
	echo '<description><![CDATA['.strip_tags($xbbc_parser->Parse($article['message'])).']]></description>';
	echo '<pubDate>'.date("r",$article['posted']).'</pubDate>';
	echo '<guid isPermaLink="false">'.$article['id'].'</guid>';
	echo '</item>';
endwhile;

echo '</channel>';
echo '</rss>'; 

?>