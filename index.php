<?php
define('ACTIVE_PAGE', 'index');
include('layout/header.php');
?>
<div class="section">
	<div class="section-light">
		<div class="section-content">
			<div id="slider-blogs">
				<div id="slide-blogs">
					<a href=""><div class="col-slide col">
						<img src="http://turbo.themezilla.com/duplex/files/2010/08/shrimp-430x320.jpg"/>
						<div class="slide-title-wrapper"><div class="slide-title">et Guide du Patch Day</div><div class="slide-comments">832 <i class=" icon-comment"></i> / 240 <i class=" icon-heart"></i></div><div class="slide-author">Par Blashounet</div></div>
					</div></a>
			
					<a href=""><div class="col-slide col">
						<img src="http://turbo.themezilla.com/duplex/files/2010/08/shrimp-430x320.jpg"/>
						<div class="slide-title-wrapper"><div class="slide-title">impressions et Guide du Patch Day</div><div class="slide-comments">832 <i class=" icon-comment"></i> / 240 <i class=" icon-heart"></i></div><div class="slide-author">Par Blashounet</div></div>
					</div></a>
					
					<a href=""><div class="col-slide col">
						<img src="http://turbo.themezilla.com/duplex/files/2010/08/shrimp-430x320.jpg"/>
						<div class="slide-title-wrapper"><div class="slide-title">5.0.4 - Premières impressions et Guide du Patch Day</div><div class="slide-comments">832 <i class=" icon-comment"></i> / 240 <i class=" icon-heart"></i></div><div class="slide-author">Par Blashounet</div></div>
					</div></a>
					
					<a href=""><div class="col-slide col">
						<img src="http://turbo.themezilla.com/duplex/files/2010/08/shrimp-430x320.jpg"/>
						<div class="slide-title-wrapper"><div class="slide-title">Guide du Patch Day</div><div class="slide-comments">832 <i class=" icon-comment"></i> / 240 <i class=" icon-heart"></i></div><div class="slide-author">Par Blashounet</div></div>
					</div></a>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="section-light">
		<div class="section-content">
			<div class="threecols-layout">
				<div class="col col1">
				
					<?php require UNNAMED_BLOCKS.'/facebook.php'; ?>
					<div class="hr"></div>
					<?php require UNNAMED_BLOCKS.'/comments.php'; ?>
					<div class="hr"></div>
					<?php require UNNAMED_BLOCKS.'/threads.php'; ?>
				</div>
				
				<div class="col col2">
					<?php require UNNAMED_BLOCKS.'/articles.php'; ?>
					<div class="hr"></div>
					<?php require UNNAMED_BLOCKS.'/video.php'; ?>
				</div>
				
				<div class="col col3">
					<?php require UNNAMED_BLOCKS.'/ranking.php'; ?>
					<div class="hr"></div>
					<?php require UNNAMED_BLOCKS.'/activity.php'; ?>
					<!-- <div class="hr"></div>
					<?php require UNNAMED_BLOCKS.'/sponsors.php'; ?> -->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<?php include('layout/footer.php'); ?>
