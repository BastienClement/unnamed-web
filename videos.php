<?php
define('ACTIVE_PAGE', 'videos');
define('PAGE_TITLE',  'Vidéos');
include('layout/header.php');

$data = load_external('youtube');
$array = unserialize($data);

usort($array, function($b, $a) {
	return $a["upload_date"]-$b["upload_date"];
});

?>
	
	<div class="section">
	<div class="section-light">
		<div class="section-content">
	

<div class="video-row">
<?php
foreach($array as $i => $value):
	if($i % 4 == 0 && $i != 0):
?>
	<div class="clearfix"></div>
</div>
<div class="video-row">
<?php
	endif;
?>
	<a href="<?php echo $value['url']; ?>"><div class="col-slide col">
		<img src="<?php echo $value['thumb']; ?>" />
		<div class="slide-title-wrapper"><div class="slide-title"><?php echo $value['title']; ?></div><div class="slide-comments"><?php echo $value['views']; ?> <i class=" icon-eye-open"></i></div><div class="slide-author">Par <?php echo $value['uploader']; ?></div></div>
	</div>
	</a>
<?php
endforeach;
?>
<div class="clearfix"></div>

</div>
</div>
</div>

	
<?php include('layout/footer.php'); ?>