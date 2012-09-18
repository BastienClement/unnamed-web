<h2 class="bluetracker">Blue Tracker</h2>
<ul>
<?php
	$data = load_external('bluetracker');
	$bluetracker = unserialize($data);
	
	foreach($bluetracker as $key => $value){
		if($key >= 5)
		break;
		echo "<li><a href=\"".$value['url']."\">".$value['title']."</a></li><span class=\"footrss\">Publié le ".$value['date']."</span>";
	}
?>
</ul>
