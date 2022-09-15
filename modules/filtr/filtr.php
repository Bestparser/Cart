<?php require_once('../01DEFAULT/header.php'); ?>
<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>

		<form enctype="multipart/form-data" method="post" id="form-filter">
			<div class="block100 instrumental">
				<ul>
					<li><span style="color: red;" id="spanTab-1" class="spanPoint spanTab" onclick="tab(1);">Отображение атрибутов</span></li>
					<li><span id="spanTab-2" class="spanPoint spanTab" onclick="tab(2); loadTab('block-2-child', 'form-filter');">Сортировка</span></li>										
				</ul>
				<div id="k1"></div>
			</div>	
				
			<div class="tabs" id="filtr_scroll_id">	
			
				<div class="tab" id="block-1">					
					<table>
						<tbody>
							<?php
								$attr_id_arr = getToArray(CP_attr(code_to_id($_GET['category_id']), $user_id), $arr);								
								$i = 0;
								while ($i < count($attr_id_arr)){
									$i++;									
									if (searchNameAttr($attr_id_arr[$i]) != ''){	
										?>
											<tr>
												<td><input <?php if (showme_attr($attr_id_arr[$i], $user_id, code_to_id($_GET['category_id'])) > 0){ ?>checked="checked"<?php } ?> type="checkbox" id="ID-showAttrXLS-<?php echo $attr_id_arr[$i]; ?>" class="CLASS-showAttrXLS"  name="NAME-showAttrXLS-<?php echo $attr_id_arr[$i]; ?>" value="<?php echo $attr_id_arr[$i]; ?>" /></td>
												<td><span onclick="checkSpan('ID-showAttrXLS-', <?php echo $attr_id_arr[$i]; ?>);"><?php echo searchNameAttr($attr_id_arr[$i]); ?><?php if (importantAttr($attr_id_arr[$i]) > 0){ ?> * <?php } ?></span></td>
											</tr>
										<?php
									}
								}
							?>
						</tbody>
						<tfoot>
							<tr>
								<td></td>
								<td><input style="position: reltive; top: 10px;" value="Сохранить" onclick="saveFiltrShow();" type="button" /></td>
							</tr>
						</tfoot>
					</table>
				</div>
				
				<div class="tab" id="block-2" style="display: none;">									
					<div id="k2"></div>
					
					<div id="block-2-child"></div>
					
					<input value="Сохранить" onclick="saveFiltrSort();" type="button" />
					</br></br></br>
				</div>
			</div>
				
		</form>
		
<?php require_once('../01DEFAULT/footer.php'); ?>
<div class="filtr_filtr"></div>