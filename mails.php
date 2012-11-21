<?php
define('ACTIVE_PAGE', 'inbox');
define('PAGE_TITLE',  'Messagerie');
include('layout/header.php');

$quota = 80;

if($quota == 100){
	$indicator_color = "red";
} elseif ($quota >= 80 && $quota < 100){
	$indicator_color = "orange";
} else {
	$indicator_color = "#6DDC00";
}
?>
	
<div class="section">
<div class="section-light">
<div class="section-content">
<div class="twocols-alt-layout">
<div class="col col1">

<div id="menu-inbox">
<a href="/mails/compose" class="new-message">Nouveau message</a>
<div class="hr"></div>
<a href="/mails/"><span style="margin-top:-1px;display:block;background:#6DDC00;padding:2px 8px;font-size:13px;float:right;color:#545454;border-radius:100px;text-shadow:none;font-weight:bold;">8</span>Boite de réception</a>
<a href="/mails/all">Tous les messages<div class="progress-bar"><div class="progress-indicator" style="width:<?php echo $quota;?>%;background:<?php echo $indicator_color;?>;"></div></div></a>
<a href="/mails/trash">Corbeille</a>

<div class="hr"></div>

<a href="">Inbox perso 1</a>
<a href="">Inbox perso 2</a>
<a href="">Inbox perso 3</a>

</div>

</div>

<div class="col col2">
	
<div class="alert">Votre boîte de réception ne contient aucun message.</div>


<div class="ucode">
<table cellspacing="0" cellpadding="0">
<tr>
<td style="width:14px;"><i class="icon-envelope icon-white" style="margin-top:2px;"></i></td>
<td style="width:14px;"><a href=""><i class="icon-star"><i class="icon-star icon-white"></i></i></a></td>
</td><td>Blash</td><td>Le site roxxe</td>
<td><span style="color:#545454;">On est trop bons, tellements bon que...</span></td>
<td>17 nov.</td>
<td style="width:14px;"><a href=""><i class="icon-folder-close"><i class="icon-folder-close icon-white"></i></i></a></td>
<td style="width:14px;"><a href=""><i class="icon-trash"><i class="icon-trash icon-green"></i></i></a></td>
</tr>
</table>
<div class="hr"></div>

</div>

</div>

<div class="clearfix"></div>

</div>
	</div>
</div>


<?php include('layout/footer.php'); ?>
