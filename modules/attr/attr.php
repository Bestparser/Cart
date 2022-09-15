<?php require_once('../01DEFAULT/header.php'); ?>
<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>

	

		<form enctype="multipart/form-data" method="post" id="form-attr">
			
			<input style="display: none;" name="NAME-special-secret-input" id="ID-special-secret-input" type="text" />
			
			<?php if (PZC(userType($user_id), 2) != 3){ ?>
				<div class="block100 instrumental">
					<ul>					
						<li><span class="spanPoint" onclick="addAttr();">Добавить</span></li>					
						<li><span class="spanPoint" onclick="editAttr()">Редактировать</span></li>					
						<li><span class="spanPoint" onclick="attrCategory();">Привязать к категории</span></li>
						<li><span class="spanPoint" onclick="deleteAttr();">Удалить</span></li>
					</ul>
				</div>	
			<?php } ?>
			
			
			<div class="miniform" id="addAttrManagerForm"></div>
			<div class="miniform miniform2" id="addAttrManagerForm2"></div>
			
			<div id="attr_scroll_id" class="attr_scroll_class">
				<div class="attrManager" id="superTable1">

						<table class="table_sort3">
							<thead>
								<tr>
									<td class="down"><span>Название атрибута</span></td>
									<td class="down"><span>Значение атрибута</span></td>
								</tr>
							</thead>
							<tbody>
								<?php
									$res = mysql_query("select * FROM `new_attr` WHERE `id` > '0' and `id` != '546' and `id` != '550' and `id` != '573' and `sap` = '' order by `id` DESC ");
									while ($row = mysql_fetch_assoc($res)){
										
										?>
											<tr>
												<td>
													<i style="display: none;"><?php echo $row['attr_name']; ?></i>
													<?php if (PZC(userType($user_id), 2) != 3){ ?>
														<input class="check-attr" item-id="<?php echo $row['attr_type_id']; ?>" data-id="<?php echo $row['id']; ?>" id="ID-check-attr-<?php echo $row['id']; ?>" name="NAME-check-attr-<?php echo $row['id']; ?>" type="checkbox" />
													<?php } ?>
													<span onclick="checkSpan('ID-check-attr-', <?php echo $row['id']; ?>);" id="ID-span-attr-<?php echo $row['id']; ?>"><?php echo $row['attr_name']; ?></span> 
													<i id="ID-i-attr-<?php echo $row['id']; ?>"><?php if ($row['important'] == 1){ ?> * <?php } ?></i>
												</td>
												<td>
													<?php if ($row['attr_type2_id'] == 0){ // С единицей измерения ?>										
														<?php
															$attr_type_name = '';
															$res2 = mysql_query("select * FROM `new_attr_type` WHERE `id` = '".$row['attr_type_id']."' ");
															while ($row2 = mysql_fetch_assoc($res2)){
																$attr_type_name = $row2['attr_type_name'];
															}
														?>
														<span>
															<?php 														
																if ($attr_type_name != ''){
																	echo $attr_type_name;
																} else {
																	echo '<span style="color: red;">Вы не поставили е.и. !</span>';
																}
															?>
														</span>
													<?php } else { ?>
														<?php
															// Строка
															if ($row['attr_type2_id'] == 1){ ?><span>Строка</span><?php }
																
															// Нестандартный селектор
															if ($row['attr_type2_id'] == 2) special_select('form-attr', 'ID-specialSelect-list-'.$row['id'].'', 'new_attr_type_list', 'list', $row['id'], 'ID-specialSelect-attr-'.$row['id'].'', 'selectName-'.$row['id'].'', '', 1);
															
															// Логический (Да / Нет)
															if ($row['attr_type2_id'] == 3) special_check('ID-specialCheck-'.$row['id'].'', 'NAME-specialCheck-'.$row['id'].'', 'list', 'new_attr_type_list', 'attr_id', $row['id'], '', 1);
															
															// Текст
															if ($row['attr_type2_id'] == 4){?><span>Текст</span><?php }
														?>
													<?php } ?>
												</td>
											</tr>
										<?php
										
									}
								?>
							</tbody>
						</table>
					
				</div>
			</div>	
			
		</form>
<?php require_once('../01DEFAULT/footer.php'); ?>
<div class="attr_attr"></div>