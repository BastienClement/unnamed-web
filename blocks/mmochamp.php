<h2 class="mmochampion">MMO-Champion</h2>
<ul>
<?php
	$data = load_external('mmochampion');
	$mmochampion = unserialize($data);
	
	foreach($mmochampion as $key => $value){
		if($key >= 4)
		break;
		echo "<li><a href=\"".$value['url']."\">".$value['title']."</a></li><span class=\"footrss\">Publié le ".$value['date']."</span>";
	}
?>
</ul>
