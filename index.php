<?php
// Fake rewrite to _router for index
if(!defined('UNNAMED_ROUTED')):
	$_SERVER['REQUEST_URI'] = '/index';
	require '_router.php';
else:

define('ACTIVE_PAGE', 'index');
include('layout/header.php');
?>
<div class="section">
	<div class="section-light">
		<div class="section-content">
			<div id="slider-blogs">
				<div id="slide-blogs">
					<?php
	
					$res = $db->query("SELECT t.id, t.poster, t.subject, t.posted, t.num_views, t.num_replies, t.num_likes, p.message, u.slug FROM topics AS t INNER JOIN posts AS p ON p.id = t.first_post_id INNER JOIN users AS u ON u.id = p.poster_id WHERE t.forum_id = 17 AND u.slug != '' ORDER BY t.id DESC LIMIT 4");
					
					$xbbc_meta = xbbc_ucode_parser();
					$xbbc_meta->SetFlag(\XBBC\PARSE_META);
					
					while($row = $db->fetch_assoc($res)):
						$meta = $xbbc_meta->Parse($row['message']);
					?>
					
					<a href="<?php echo blog_url($row['slug'], "/article/{$row['id']}/".sluggify($row['subject'])); ?>">
						<div class="col-slide col">
							<img src="<?php echo htmlspecialchars($meta['thumb']); ?>"/>
							<div class="slide-title-wrapper">
								<div class="slide-title"><?php echo htmlspecialchars($row['subject']); ?></div>
								<div class="slide-comments">
									<?php echo $row['num_views']; ?> <i class="icon-eye-open"></i>
									/ <?php echo $row['num_replies']; ?> <i class="icon-comment"></i>
									/ <?php echo $row['num_likes']; ?> <i class="icon-heart"></i>
								</div>
								<div class="slide-author">Par <?php echo htmlspecialchars($row['poster']); ?></div>
							</div>
						</div>
					</a>
					
					<?php
					endwhile;
					?>
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
					<?php require UNNAMED_BLOCKS.'/threads.php'; ?>
					<div class="hr"></div>
					<?php require UNNAMED_BLOCKS.'/comments.php'; ?>
					<div class="hr"></div>
					<?php require UNNAMED_BLOCKS.'/facebook.php'; ?>
				</div>
				
				<div class="col col2">
					<?php require UNNAMED_BLOCKS.'/articles.php'; ?>
					<div class="hr"></div>
					<?php require UNNAMED_BLOCKS.'/video.php'; ?>
				</div>
				
				<div class="col col3">
					<?php require UNNAMED_BLOCKS.'/ranking.php'; ?>
					<div class="hr"></div>
					<?php require UNNAMED_BLOCKS.'/recruitement.php'; ?>
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

<?php
include('layout/footer.php'); 
endif;

