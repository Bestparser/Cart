<?php require_once('../../conf.php'); ?>
<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>

<div class="closePopup">
	<span onclick="closeMiniForm();"> X </span>
</div>

<div id="superTable1">
	<table class="noBorder noHover">
		<tr>
			<td class="alignRight">
				<label for='NAME-add-volume'>Единица измерения</label>
			</td>
			<td>
				<input id='ID-add-volume' name='NAME-add-volume' type='text' />	
				<input onclick='addVolume2();' type='button' value='Добавить' />
			</td>	
		</tr>
	</table>
</div>
<div class="volume_miniform"></div>