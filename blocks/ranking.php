<?php
	$ranking = unserialize(load_external('ranking'));
	$ranking_type = preg_match("/H/", $ranking['progress']) ? "HM" : "NM";
	$ranking['progress'] = preg_replace("/\(.*\)/", "", $ranking['progress']);
?>

<h2>Classement palier T<?php echo $ranking['ladder']; ?></h2>
<div id="rankingWrapper">
	<div id="rankingServer">
		<span><?php echo $ranking['realm']; ?></span>
		<div id="rankingServerLabel" style="">Serveur</div>
	</div>
	<table style="width: 100%;">
		<tr>
			<td style="width: 50%;">
				<div id="rankingProgress"><span><?php echo $ranking['progress']; ?></span> <?php echo $ranking_type; ?></div>
			</td>
			<td style="width: 50%;">
				<div id="rankingFr"><span><?php echo $ranking['fr']; ?></span> FR</div>
			</td>
		</tr>
		<tr>
			<td style="width: 50%;">
				<div id="rankingRegion"><span><?php echo $ranking['world']; ?></span> World</div>
			</td>
			<td style="width: 50%;">
				<div id="rankingLink"><a href="<?php echo $ranking['source']; ?>">WowProgress</a></div>
			</td>
		</tr>
	</table>
</div>
