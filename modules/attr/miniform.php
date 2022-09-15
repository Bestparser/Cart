<?php require_once('../../conf.php'); ?>
<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>


<div class="closePopup">
	<span onclick="closeMiniForm();"> X </span>
</div>


<div id="superTable1">
	
	<div id="k1"></div>

	<table class="noBorder noHover">
		<tr>
			<td class="alignRight">
				<label for="">Тип значения атрибута</label>				
			</td>
			<td>				

				<?php
					$attr_type2_id = 0;
					$res = mysql_query("select * FROM `new_attr` WHERE `id`='".$_GET['id']."' ");
					while ($row = mysql_fetch_assoc($res)){
						$attr_type2_id = $row['attr_type2_id'];
					}				
				?>
			
			
				<?php 
					if (($attr_type2_id == 0) and ($_GET['action'] != 'edit')){
						?>
								<select onchange="selectAttrType2();" id="ID-mainSelectAttrType2" name="NAME-mainSelectAttrType2">
									<option value="1">Строка</option>
									<option value="0">С е.и.</option>									
									<option value="2">Выпадающий список</option>
									<option value="3">Да / Нет</option>
									<option value="4">Текст</option>
								</select>
						
						<?php
					} else {
						?>
								<select onchange="selectAttrType2();" id="ID-mainSelectAttrType2" name="NAME-mainSelectAttrType2">
									<option <?php if (($attr_type2_id != 1) and ($attr_type2_id != 2) and ($attr_type2_id != 3) and ($attr_type2_id != 4)){ ?>selected="selected"<?php } ?> value="0">С е.и.</option>
									<option <?php if ($attr_type2_id == 1){ ?>selected="selected"<?php } ?> value="1">Строка</option>
									<option <?php if ($attr_type2_id == 2){ ?>selected="selected"<?php } ?> value="2">Выпадающий список</option>
									<option <?php if ($attr_type2_id == 3){ ?>selected="selected"<?php } ?> value="3">Да / Нет</option>
									<option <?php if ($attr_type2_id == 4){ ?>selected="selected"<?php } ?> value="4">Текст</option>
								</select>
						<?php	
					}
				
				?>

			</td>
		</tr>
	
		<tr id="ID-mainSelectAttrType-TR" <?php if (($attr_type2_id > 0) or ($_GET['action'] == 'add')){ ?>style="display: none;"<?php } ?>>
			<td class="alignRight">
				<label for="NAME-mainSelectAttrType">Единица измерения</label>
			</td>
			<td>
				<select id="ID-mainSelectAttrType" name="NAME-mainSelectAttrType">
					<option value="0"> - </option>
					<?php
						$res = mysql_query("select * FROM `new_attr_type` ");
						while ($row = mysql_fetch_assoc($res)){
							?>
								<option <?php if ($_GET['volume_id'] == $row['id']){ ?>selected="selected"<?php } ?> value="<?php echo $row['id']; ?>"><?php echo $row['attr_type_name']; ?></option>
							<?php
						}	
					?>
				</select>		
			</td>	
		</tr>
	
		<tr>
			<td class="alignRight">
				<label for='NAME-edit-attr'>Название атрибута</label>
			</td>
			<td>
				<?php
					$value = '';
					$chek = '';
					$desc = '';
					$res = mysql_query("select * FROM `new_attr` WHERE `id` = '".$_GET['id']."' ");
					while ($row = mysql_fetch_assoc($res)){
						$value = $row['attr_name'];
						$chek = $row['important'];
						$desc = $row['description'];
					}
				?>
				
				<?php if ($_GET['action'] == 'add'){ ?>
					<input id='ID-add-attr' name='NAME-add-attr' type='text' />
				<?php } else { ?>
					<input value="<?php echo $value; ?>" id='ID-edit-attr' name='NAME-edit-attr' type='text' />
				<?php } ?>
			</td>	
		</tr>
		<tr style="display: none;">
			<td class="alignRight"><label for='NAME-description-attr'>Описание атрибута (xml)</label></td>			
			<td><input type="text" name="NAME-description-attr" id="ID-description-attr" value="<?php echo $desc; ?>" /></td>
		</tr>
		
		
		<tr>
			<td class="alignRight">
				<label for='NAME-important-attr'>Обязательно для заполнения</label>
			</td>
			<td>
				<input <?php if ($chek == 1){ ?>checked="checked"<?php } ?> type='checkbox' value='1' id='ID-important-attr' name='NAME-important-attr' />
				
				<?php if ($_GET['action'] == 'add'){ ?>
					<input class="CLASS-miniform-button" onclick='addAttr2(<?php echo $_GET['id']; ?>);' type='button' value='Сохранить' />
				<?php } else { ?>
					<input class="CLASS-miniform-button" onclick='editAttr2(<?php echo $_GET['id']; ?>);' type='button' value='Сохранить' />
				<?php } ?>				
			</td>	
		</tr>
	</table>
</div>
<div class="attr_miniform"></div>