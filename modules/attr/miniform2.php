<?php require_once('../../conf.php'); ?>
<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>



<?php if (isset($_GET['action'])){ ?>
<?php } else { ?>


	<div class="block100 instrumental">
		<ul>			
			<li><span class="spanPoint" onclick="addAttrType2();">Добавить</span></li>
			<li><span class="spanPoint" onclick="editAttrType2()">Редактировать</span></li>
			<li><span class="spanPoint" onclick="deleteAttrType2();">Удалить</span></li>
		</ul>
	</div>
	
	<div class="miniform miniform3" id="addAttrManagerForm3"></div>

	<div id="superTable1">
		<table id="listingAttr2" class="noBorder noHover">
			<tbody>		
				<?php
					if (isset($_GET['id'])){
						$datchik = 0;
						$res2 = mysql_query("select * FROM `new_attr` WHERE `id` = '".$_GET['id']."' and `attr_type2_id` = '".$_GET['type2']."' ");
						while ($row2 = mysql_fetch_assoc($res2)){
							$datchik++;
						}
						
						if ($datchik > 0){
							$i = 0;
							$res = mysql_query("select * FROM `new_attr_type_list` WHERE `attr_id` = '".$_GET['id']."' order by `list` ");
							while ($row = mysql_fetch_assoc($res)){
								$i++;
								?>
									<tr id='checkAttr2-TR-<?php echo $i; ?>'>
										<td>
											<input data-id='<?php echo $i; ?>' type='checkbox' id='checkAttr2-<?php echo $i; ?>'>
										</td>
										<td>
											<span onclick="checkSpan('checkAttr2-', <?php echo $i; ?>);" id='checkAttr2-SPAN-<?php echo $i; ?>'><?php echo $row['list']; ?></span>
										</td>
									</tr>
								<?php
							}
						} else {
							
						}
					}
				?>
			</tbody>
		</table>
	</div>
<?php } ?>



<?php if ((isset($_GET['action'])) and (($_GET['action'] == 'add') or ($_GET['action'] == 'edit'))){ ?>
	<table>
		<tr>
			<td class="alignRight"><label for="NAME-attrType2">Значение</label></td>
			<td>
				<input type="text" id="ID-attrType2" name="NAME-attrType2" />				
				<input id="addEditAttr2" onclick="addAttrType2_f();" type="button" value="+" />
			</td>
		</tr>
	</table>
<?php } ?>


<div class="attr_miniform2"></div>