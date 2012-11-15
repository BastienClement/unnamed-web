<?php

$id = (int) $_ARGS[0];
$res = $db->query("SELECT * FROM {$db->prefix}users WHERE id = $id LIMIT 1");

if(!($user = $db->fetch_assoc($res)))
	return_404();

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
							opacity: 0.6;
							-webkit-transition: opacity .3s ease;
							transition: opacity .3s ease;
							background: -webkit-radial-gradient(right top, ellipse cover, rgba(244,140,186,0.25) 0%,rgba(244,140,186,0) 90%);
						}
						
						.char-light.c7 {
							background: -webkit-radial-gradient(right top, ellipse cover, rgba(35, 89, 255,0.25) 0%,rgba(35, 89, 255,0) 90%);
						}
						
						.char-light.c9 {
							background: -webkit-radial-gradient(right top, ellipse cover, rgba(147, 130, 201,0.25) 0%,rgba(147, 130, 201,0) 90%);
						}
						
						.char {
							position: relative;
							min-height: 84px;
							padding: 10px;
							padding-left: 104px;
						}
						
						.char-wrapper:hover .char-light {
							opacity: 1;
						}
						
						.char img {
							width: 84px;
							position: absolute;
							top: 10px;
							left: 10px;
							box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
						}
						
						h3 {
							font-size: 20px;
							font-weight: bold;
							text-transform: none;
						}
					</style>
					<div>
						<a href="#" class="char-wrapper">
							<div class="char-light c2"></div>
							<div class="char">
								<img src="http://eu.battle.net/static-render/eu/marecage-de-zangar/178/34586034-avatar.jpg" />
								<h3 class="c2">Blashz</h3>
							</div>
						</a>
						<a href="#" class="char-wrapper">
							<div class="char-light c7"></div>
							<div class="char">
								<img src="http://eu.battle.net/static-render/eu/marecage-de-zangar/79/24715855-avatar.jpg" />
								<h3 class="c7">Dragahn</h3>
							</div>
						</a>
						<a href="#" class="char-wrapper">
							<div class="char-light c9"></div>
							<div class="char">
								<img src="http://eu.battle.net/static-render/eu/marecage-de-zangar/138/17850762-avatar.jpg" />
								<h3 class="c9">Blash</h3>
							</div>
						</a>
					</div>
					<div class="clearfix"></div>
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
