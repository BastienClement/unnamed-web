<h2>À propos de l'auteur</h2>

<div id="about-author">
	<div id="about-author-avatar">
		<?php user_avatar($art['poster_id']); ?>
	</div>
	<div id="about-author-desc">
		<?php echo htmlspecialchars($art['biography']); ?>
	</div>
	<div class="clearfix"></div>
	<div id="about-author-contact">
		<a href="/profile/<?php echo $art['poster_id']; ?>"><i class="icon-user"><i class="icon-user icon-white"></i></i> Profil</a>
		<a href=""><i class="icon-envelope"><i class="icon-envelope icon-white"></i></i> MP</a>
		<a href=""><i class="icon-envelope"><i class="icon-envelope icon-white"></i></i> E-mail</a>
	</div>
</div>