<h2>Classement 10 joueurs</h2>

<?php //A MODIFIER AVEC LE FICHIER SERVEUR
	include("../www/ranking_cache.php");
	$RANKING_TYPE = preg_match("/H/", $RANKING_PROGRESS) ? "HM" : "NM";
	$RANKING_PROGRESS = preg_replace("/\(.*\)/", "", $RANKING_PROGRESS);
?>
<div id="rankingWrapper">
	<div id="rankingServer">
		<span><? echo $RANKING_REALM;?></span>
		<div id="rankingServerLabel" style="">Serveur</div>
	</div>
	<table style="width: 100%;">
		<tr>
			<td style="width: 50%;">
				<div id="rankingProgress"><span><? echo $RANKING_PROGRESS;?></span> <?php echo $RANKING_TYPE; ?></div>
			</td>
			<td style="width: 50%;">
				<div id="rankingFr"><span><? echo $RANKING_FR;?></span> FR</div>
			</td>
		</tr>
		<tr>
			<td style="width: 50%;">
				<div id="rankingRegion"><span><? echo $RANKING_WORLD;?></span> World</div>
			</td>
			<td style="width: 50%;">
				<div id="rankingLink"><a href="http://www.wowprogress.com/guild/eu/mar%C3%A9cage-de-zangar/The+Unnamed/rating.tier13_10">WowProgress</a></div>
			</td>
		</tr>
	</table>
</div>
