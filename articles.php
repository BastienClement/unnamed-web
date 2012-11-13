<?php
if(!defined('PAGE_TITLE')) {
	define('ACTIVE_PAGE', 'articles');
	define('PAGE_TITLE',  'Articles');
}

define('BLOCK_ARTICLES_FULL', 1);

include('layout/header.php');
?>

<div class="section">
<div class="section-light">
<div class="section-content">
	<div class="twocols-split-layout" id="split-articles-layout" style="display: none;">
		<div class="col col1" id="articles-col-1"></div>
		<div class="col col2" id="articles-col-2"></div>
		<div class="clearfix"></div>
	</div>
	<div id="raw-articles-blocks">
		<?php require UNNAMED_BLOCKS.'/articles.php'; ?>
	</div>
</div>
</div>
</div>

<script>
	$("#split-articles-layout").show();
	
	var col1 = $("#articles-col-1");
	var col2 = $("#articles-col-2");
	
	var articles_blocks = $("#raw-articles-blocks").children(".box");
	articles_blocks.each(function(i) {
		var article = $(this).detach();
		if(col1.height() > col2.height()) {
			if(i == articles_blocks.length-1 && (col1.height() - col2.height()) < 50) {
				col1.append(article);
			} else {
				col2.append(article);
			}
		} else {
			col1.append(article);
		}
	});
</script>

<?php include('layout/footer.php'); ?>
