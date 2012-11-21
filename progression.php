<?php
define('ACTIVE_PAGE', 'progress');
define('PAGE_TITLE',  'Progression');
include('layout/header.php');
?>
<div class="section">
<div class="section-light">
<div class="section-content">
	
<div class="twocols-layout">
	<div class="col col1">
		<p>
			Les informations ci-dessous représentent notre progression au sein du
			contenu 10 joueurs en mode normal et héroique.
			
			Certaines rencontres sont volontairement absentes de ces tableaux
			en raison de leur intérêt limité.
		</p>
		<p>
			Notre avancée PVE est également consultable sur
			<a href="http://www.wowprogress.com/guild/eu/mar%C3%A9cage-de-zangar/The+Unnamed">WoWProgress</a>,
			<a href="http://www.wowtrack.org/guild/EU/Mar%C3%A9cage%20de%20Zangar/The%20Unnamed">Wowtrack</a> et
			<a href="http://www.guildox.com/go/g.asp?n=The+Unnamed&r=Mar%C3%A9cage+de+Zangar-EU">Guildox</a>.
		</p>
		
		<div class="hr"></div>
		
		<div class="button-wrapper pagination">
			<a href="#" onclick="return unnamed.progress_goto('mop');" class="button">Mists of Pandaria</a>
			<a href="#" onclick="return unnamed.progress_goto('cataclysm');" class="button">Cataclysm</a>
			<a href="#" onclick="return unnamed.progress_goto('wotlk');" class="button">Wrath of the Lich King</a>
		</div>
		
		<div class="hr" id="mop"></div>
	
		<div id="toes" class="progress-block">
			<h2>Terrasse Printanière</h2>
			<div class="inner">
				<table>
					<tr>
						<td  width="20px"><span class="green">N+</span></td><td  width="20px"><span class="red">H</span></td><td  width="300px">Protecteurs de l'Éternel</td>
						<td  width="20px"><span class="green">N</span></td><td width="20px"><span class="red">H</span></td><td width="300px">Tsulong</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="red">H</span></td><td>Lei Shi</td>
						<td><span class="green">N</span></td><td><span class="red">H</span></td><td>Sha de la peur</td>
					</tr>
				</table>
			</div>
		</div>
	
		<div id="hof" class="progress-block">
			<h2>Coeur de la Peur</h2>
			<div class="inner">
				<table>
					<tr>
						<td  width="20px"><span class="green">N</span></td><td  width="20px"><span class="red">H</span></td><td  width="300px">Vizir impérial Zor'lok</td>
						<td  width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Seigneur des lames Ta'yak</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="red">H</span></td><td>Garalon</td>
						<td><span class="green">N</span></td><td><span class="red">H</span></td><td>Seigneur du Vent Mel'jarak</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="red">H</span></td><td>Sculpte-ambre Un'sok</td>
						<td><span class="green">N</span></td><td><span class="red">H</span></td><td>Grande impératrice Shek'zeer</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div id="msv" class="progress-block">
			<h2>Caveaux Mogu'shan</h2>
			<div class="inner">
				<table>
					<tr>
						<td  width="20px"><span class="green">N</span></td><td  width="20px"><span class="green">H</span></td><td  width="300px">Garde de pierre</td>
						<td  width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Feng le Maudit</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Gara'jal le Lieur d'esprit</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Les esprits-rois</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Elegon</td>
						<td><span class="green">N</span></td><td><span class="red">H</span></td><td>Volonté de l'empereur</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="hr" id="cataclysm"></div>
		
		<div id="dragonsoul" class="progress-block">
			<h2>L'Âme des Dragons</h2>
			<div class="inner">
				<table>
					<tr>
						<td  width="20px"><span class="green">N</span></td><td  width="20px"><span class="green">H</span></td><td  width="300px">Morchok</td>
						<td  width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Zon'ozz</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Yor'sahj</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Hagara</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Ultraxion</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Corne-Noire</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Echine d’Aile-de-mort</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Folie d'Aile-de-Mort</td>
					</tr>
				</table>
				
			</div>
		</div>
		
		<div id="firelands" class="progress-block">
			<h2>Terres de Feu</h2>
			<div class="inner">
				<table>
					<tr>
						<td  width="20px"><span class="green">N</span></td><td  width="20px"><span class="green">H</span></td><td  width="300px">Beth'tilac</td>
						<td  width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Seigneur Rhyolith</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Alysrazor</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Shannox</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Baleroc</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Chambellan Forteramure</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Ragnaros</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div id="ailenoire" class="progress-block">
			<h2>Descente de l'Aile noire</H2>
			<div class="inner">
				<table>
					<tr>
						<td  width="20px"><span class="green">N</span></td><td  width="20px"><span class="green">H</span></td><td  width="300px">Magmagueule</td>
						<td  width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Système de défense Omnitron</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Maloriak</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Atramédès</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Chimaeron</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Néfarian</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div id="crepuscule" class="progress-block">
			<h2>Bastion du Crépuscule</H2>
			<div class="inner">
				<table>
					<tr>
						<td  width="20px"><span class="green">N</span></td><td  width="20px"><span class="green">H</span></td><td  width="300px">Halfus Brise-Wyrm</td>
						<td  width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Valiona et Theralion</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Conseil d'ascendants</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Cho'gall</td>
					</tr>
					<tr>
						<td><span class="white">&ndash;</span></td><td><span class="green">H</span></td><td>Sinestra</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div id="quatrevents" class="progress-block">
			<h2>Trône des quatre vents</H2>
			<div class="inner">
				<table>
					<tr>
						<td  width="20px"><span class="green">N</span></td><td  width="20px"><span class="green">H</span></td><td  width="300px">Conclave du Vent</td>
						<td  width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Al'Akir</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="hr" id="wotlk"></div>
		
		<div id="halion" class="progress-block">
			<h2>Sanctum Rubis</H2>
			<div class="inner">
				<table>
					<tr>
						<td  width="20px"><span class="green">N</span></td><td  width="20px"><span class="green">H</span></td><td  width="300px">Saviana Ragefeu</td>
						<td  width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Baltharius l'Enfant de la guerre</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>General Zarithrian</td>
						<td><span class="green">N</span></td><td><span class="red">H</span></td><td>Halion</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div id="icc" class="progress-block">
			<h2>Citadelle de la couronne de glace</H2>
			<div class="inner">
				<table>
					<tr>
						<td width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Seigneur Gargamoelle</td>
						<td  width="20px"><span class="green">N</span></td><td  width="20px"><span class="green">H</span></td><td width="300px">Dame Murmemort</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Bataille des canonnières</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Porte-Mort Saurcroc</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Pulentraille</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Trognepus</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Professeur Putricide</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Conseil de sang</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Reine de Sang Lana'thel</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Valithria Marcherêve</td>
					</tr>
					<tr>
						<td><span class="green">N</td><td><span class="green">H</span></td><td>Sindragosa</td>
						<td><span class="green">N</td><td><span class="green">H</span></td><td>Le Roi Liche</td>
					</tr>
				</table>
			</div>
		</div>
				
		<div id="edc" class="progress-block">
			<h2>Epreuve du croisé</H2>
			<div class="inner">
				<table>
					<tr>
						<td width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Bêtes du Norfendre</td>
						<td width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Seigneur Jaraxxus</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Faction Champions</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Jumelles Val'kyr</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Anub'arak</td>
					</tr>
				</table>
			</div>
		</div>
				
		<div id="uldu" class="progress-block">
			<h2>Ulduar</H2>
			<div class="inner">
				<table>
					<tr>
						<td width="20px"><span class="green">N</span></td><td width="20px"><span class="green">H</span></td><td width="300px">Léviathan des Flammes</td>
						<td width="20px"><span class="green">N</span></td><td width="20px"><span class="white">&ndash;</span></td><td width="300px">Ignis le maître de la fournaise</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="white">&ndash;</span></td><td>Tranchécaille</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Déconstructeur XT-002</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Assemblée de Fer</td>
						<td><span class="green">N</span></td><td><span class="white">&ndash;</span></td><td>Kologarn</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="white">&ndash;</span></td><td>Auriaya</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Mimiron</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Freya</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Thorim</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>Hodir</td>
						<td><span class="green">N</span></td><td><span class="green">H</span></td><td>General Vezax</td>
					</tr>
					<tr>
						<td><span class="green">N</span></td><td><span class="red">H</span></td><td>Yogg-Saron</td>
						<td><span class="white">&ndash;</span></td><td><span class="green">H</span></td><td>Algalon l'Observateur</td>
					</tr>
				</table>
			</div>
		</div>
				
		<h2>Légende</h2>
		<div class="ucode">
			<table>
				<tr>
					<td><span class="red">N</span></td><td>Mode normal en cours</td>
					<td><span class="red">H</span></td><td>Mode héroique en cours</td>
				</tr>
				<tr>
					<td><span class="green">N</span></td><td>Mode normal terminé</td>
					<td><span class="green">H</span></td><td>Mode héroique terminé</td>
				</tr>
				<tr>
					<td><span class="green">N+</span></td><td>Mode élite normal terminé</td>
					<td><span class="green">H+</span></td><td>Mode élite héroique terminé</td>
				</tr>
				<tr>
					<td><span class="yellow">P</span></td><td>PTR</td>
					<td><span class="black">&ndash;</span></td><td>Changement de mode non disponible</td>
				</tr>
			</table>
		</div>
		
	</div>
	<div class="col col2">
		
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue sem a dui iaculis a ultrices lacus facilisis. Nulla iaculis mauris eget magna placerat aliquet. Maecenas feugiat egestas eros sit amet adipiscing. In ac massa eget felis tincidunt pharetra ut sed metus. Curabitur at lectus neque, ut tempus justo. Vivamus mollis nisl et mi egestas porta. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer mattis, felis id faucibus tincidunt, tellus neque sollicitudin enim, id vestibulum dui magna a magna. Vivamus pretium porttitor interdum. Vivamus pharetra, dolor pulvinar vestibulum egestas, mauris lacus ultrices nulla, quis ullamcorper orci tellus quis nisi.
		Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc felis neque, interdum eget laoreet sit amet, semper ut eros. Vivamus auctor massa sit amet est aliquet vel mattis elit fringilla. Ut auctor, risus ut pretium eleifend, velit augue rhoncus nisl, laoreet accumsan enim diam non elit. Proin vel orci magna. Donec sit amet dui id lectus ornare lacinia vitae id nibh. Nunc nec est nibh, sit amet cursus quam. Ut ac lorem arcu, tincidunt tempus tortor.
		Vivamus dui nibh, eleifend at pharetra ut, elementum sit amet arcu. Morbi non imperdiet neque. Aliquam sodales ipsum ac nunc cursus ut mollis sem sollicitudin. Pellentesque a felis id justo lobortis bibendum. Aliquam quis fermentum erat. Phasellus ullamcorper, purus ut semper malesuada, enim diam blandit libero, a eleifend libero ligula sit amet dui. In quis nibh sapien. Integer tempus fringilla ullamcorper. Integer vel massa sed est aliquam scelerisque eget non lacus. Nam ullamcorper turpis vel neque dignissim malesuada. Nulla odio erat, tempus in euismod quis, porttitor sed eros.
		Vivamus egestas augue ut ligula fermentum quis malesuada mi tincidunt. Fusce suscipit purus faucibus velit lobortis at eleifend nibh rutrum. Cras eu metus elit. Suspendisse quam quam, luctus quis lobortis lobortis, luctus eu massa. Vestibulum ultricies pulvinar eros, nec aliquet velit sagittis at. Donec tempus sem consectetur lectus malesuada auctor. Nullam in libero sit amet risus convallis ultricies. In nibh nibh, vulputate ut congue in, euismod at eros. In orci lacus, luctus ac aliquam non, ornare id odio. Aenean iaculis aliquam leo, ac egestas nisl ullamcorper eget. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus venenatis quam vel tristique. Integer id nunc ipsum, vitae consectetur lectus. Vestibulum viverra dolor sit amet ligula vulputate convallis.
		Curabitur purus dolor, vehicula vestibulum pretium non, placerat eget nisl. Ut quis euismod augue. Donec mollis imperdiet mollis. Curabitur vel rutrum nulla. Vestibulum blandit risus at massa semper lacinia. In molestie sollicitudin faucibus. Curabitur semper ante massa, sed cursus augue.</div>

		<div class="clearfix">
	</div>

</div>
</div>
</div>

<?php include('layout/footer.php'); ?>
