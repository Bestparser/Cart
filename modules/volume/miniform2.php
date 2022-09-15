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
				<label for='NAME-edit-volume'>Единица измерения</label>
			</td>
			<td>
				<?php			
					$value = '';
					$res = mysql_query("select * FROM `new_attr_type` WHERE `id`='".$_GET['id']."' ");
					while ($row = mysql_fetch_assoc($res)){
						$value = $row['attr_type_name'];						
					}
				?>
				<input value="<?php echo $value; ?>" id='ID-edit-volume' name='NAME-edit-volume' type='text' />
				<input onclick='editVolume2(<?php echo $_GET['id']; ?>);' type='button' value='Сохранить' />
			</td>	
		</tr>
	</table>
</div>
<div class="volume_miniform2"></div>