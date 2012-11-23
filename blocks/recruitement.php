<?php
	$recruiting = unserialize(load_external('recruitement'));
?>

<h2>Recrutement</h2>

<div class="ucode">
<table class="compact">
<?php 
	foreach($recruiting as $class => $specs):
		if(!array_some($specs, function($v) { return $v; })) continue;
?>
	<tr>
		<td>
			<span class="wow-class c<?php echo $class; ?>"><?php echo ($class == CLASS_DK) ? "DK" : $CLASS[$class][0]; ?></span>
		</td>
		<?php if(count($specs) < 4): ?>
			<td style="width:18px;"></td>
		<?php endif; ?>
		<?php foreach($specs as $s_id => $open): ?>
			<td style="width:18px;">
				<img class="class-icon<?php if(!$open) echo ' recruitement-close'; ?>" src="http://wow.zamimg.com/images/wow/icons/small/<?php echo $SPEC_ICONS[$s_id]; ?>.jpg" title="<?php echo $SPEC[$s_id]; ?>"/>
			</td>
		<?php endforeach; ?>
	</tr>
<?php endforeach; ?>
</table>

</div>
