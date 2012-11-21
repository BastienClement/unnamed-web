<?php

$id = (int) $_ARGS[0];
$res = $db->query("SELECT * FROM users WHERE id = $id LIMIT 1");

if(!($user = $db->fetch_assoc($res)))
	return_404();

function class_gradient($color) {
?>
	background: rgba(<?php echo $color; ?>,0.20);
	background: -webkit-radial-gradient(right top, ellipse cover, rgba(<?php echo $color; ?>,0.25) 0%, rgba(<?php echo $color; ?>,0) 90%);
	background:    -moz-radial-gradient(right top, ellipse cover, rgba(<?php echo $color; ?>,0.25) 0%, rgba(<?php echo $color; ?>,0) 90%);
	background: -webkit-radial-gradient(right top, ellipse cover, rgba(<?php echo $color; ?>,0.25) 0%, rgba(<?php echo $color; ?>,0) 90%);
	background:      -o-radial-gradient(right top, ellipse cover, rgba(<?php echo $color; ?>,0.25) 0%, rgba(<?php echo $color; ?>,0) 90%);
	background:     -ms-radial-gradient(right top, ellipse cover, rgba(<?php echo $color; ?>,0.25) 0%, rgba(<?php echo $color; ?>,0) 90%);
	background:     radial-gradient(ellipse at right top, rgba(<?php echo $color; ?>,0.25) 0%, rgba(<?php echo $color; ?>,0) 90%);
<?php
}

$light_colors = array(
	"198, 155, 109",  // Warrior
	"244, 140, 186",  // Paladin
	"170, 211, 114",  // Hunter
	"255, 244, 104",  // Rogue
	"255, 255, 255",  // Priest
	"196, 30,  59",   // DK
	"35,  89,  255",  // Shaman
	"104, 204, 239",  // Mage
	"147, 130, 201",  // Warlock
	"0,   132, 103",  // Wushu
	"255, 124, 10"    // Druid
);

require 'layout/header.php';
?>

<div class="section">
	<div class="section-light">
		<div class="section-content">
			<div class="twocols-alt-layout">
				<div class="col col1">
					<h2>
						<img src="/layout/img/fav.png" alt="" style="height: 29px; vertical-align: -8px;float: right" title="Membre Unnamed" />
						<?php echo $user['username']; ?>
						<span style="color: #545454; font-size: 20px; font-weight: normal; display:block;"><?php echo $user['title']; ?></span>
					</h2>
					<img src="http://www.unnamed.eu/avatars/<?php echo $id; ?>" alt="" style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); background: rgba(0, 0, 0, 0.3); width: 200px;" />
					
					<div class="hr"></div>
					
					<p>Message: 20000000</p>
					<p>Skill: Rooxor</p>
				</div>
				
				<div class="col col2">
					<h2>Personnages</h2>
					<style>
						/* PAS TOUCHE À CA POUR LE MOMENT STP :) */
						
						.char-wrapper {
							display: block;
							width: 360px;
							background: red;
							margin-left: 20px;
							margin-bottom: 20px;
							float: left;
							box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
							background: rgba(0, 0, 0, 0.3);
							
							position: relative;
						}
						
						.char-wrapper:nth-child(2n-1) {
							margin-left: 0;
						}
						
						.char-light {
							position: absolute;
							top: 0px;
							left: 0px;
							bottom: 0px;
							right: 0px;
							content: "";
							opacity: 0.75;
							-webkit-transition: opacity .3s ease;
							transition: opacity .3s ease;
							background: -webkit-radial-gradient(right top, ellipse cover, rgba(244,140,186,0.25) 0%,rgba(244,140,186,0) 90%);
						}
						
						<?php foreach($light_colors as $cid => $color): ?>
						.char-light.c<?php echo $cid+1; ?> {
							<?php class_gradient($color); ?>
						}
						<?php endforeach; ?>
						
						.char {
							position: relative;
							min-height: 84px;
							padding: 10px;
							padding-left: 104px;
							color: #eee;
						}
						
						.char-wrapper:hover .char-light {
							opacity: 1;
						}
						
						.char > img {
							width: 84px;
							position: absolute;
							top: 10px;
							left: 10px;
							box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
						}
						
						.char .main {
							float: right;
							margin-right: 2px;
						}
						
						.char .infos {
							margin-bottom: 15px;
						}
						
						h3 {
							font-size: 20px;
							font-weight: bold;
							text-transform: none;
						}
					</style>
					
					<div>
						<?php
							$chars = $db->query("SELECT r.name, c.main, r.class, r.race, r.gender, r.level, r.achievements, r.rank FROM guild_chars AS c INNER JOIN guild_roster AS r ON r.name = c.char WHERE c.owner = $id");
							while($char = $db->fetch_assoc($chars)):
						?>
							<a href="#" class="char-wrapper">
								<div class="char-light c<?php echo $char['class']; ?>"></div>
								<div class="char">
									<?php if($char['main'] == 1): ?>
										<i class="icon-white icon-star main"></i>
									<?php endif; ?>
									<img src="http://eu.battle.net/static-render/eu/marecage-de-zangar/178/34586034-avatar.jpg" />
									<h3 class=""><?php echo htmlspecialchars($char['name']); ?></h3>
									<div class="infos c<?php echo $char['class']; ?>">
										<?php echo $CLASS[$char['class']][$char['gender']]; ?>
										<?php echo $RACE[$char['race']][$char['gender']]; ?>
										<?php echo $char['level']; ?>
									</div>
								</div>
							</a>
						<?php endwhile; ?>
						<div class="clearfix"></div>
					</div>
					
					<?php
						echo '<pre><code>';
						unset($user['password']);
						print_r($user);
						echo '</code></pre>';
					?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<?php

require 'layout/footer.php';
