<?php
define('ACTIVE_PAGE', 'blogs');
define('PAGE_TITLE',  'Blog');
include('layout/header.php');
?>
<div class="section">
<div class="section-light">
<div class="section-content">

<div class="twocols-layout">
	<div class="col col1">zzz</div>
	<div class="col col2">
		<?php
			define('SHARE_WHAT', 'ce blog');
			require UNNAMED_BLOCKS.'/article/share.php'; ?>
		
		<div class="hr"></div>
		
		<?php 
			if($blog_author['biography']): 
				$art = array(
					'poster_id' => $blog_author['id'],
					'biography' => $blog_author['biography'],
					'email_setting' => $blog_author['email_setting']
				);
				require UNNAMED_BLOCKS.'/article/author.php'; ?>
				<div class="hr"></div>
		<?php endif; ?>
		
		<?php
			define('BLOCK_COMMENTS_FORUM', 17);
			define('BLOCK_COMMENTS_AUTHOR', $blog_author['id']);
			require UNNAMED_BLOCKS.'/comments.php'; ?>
	</div>
	<div class="clearfix"></div>
</div>

</div>
</div>
</div>
<?php include('layout/footer.php'); ?>
