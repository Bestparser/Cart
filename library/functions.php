<?php require_once('../../conf.php'); ?>

<?php
function getToArray($get, $arr){ // Преобразование строку с разделителем (;) в массив
		$d = 0;			
		$string = $get;
		$i = -1;
		$id_product = '';
		while ($i < strlen($string)){						
			$i++;							
			if ($string[$i] != '~'){
				$id_product = $id_product . $string[$i];
			} else {					
				$d++;
				$arr[$d] = $id_product;
				
				$id_product = '';	
			}
		}
		if ($d == 0) $arr[] = 0;			
		return $arr;
}

function getToArray_probel($get, $arr){ // Преобразование строку с разделителем (" ") в массив
		$d = 0;			
		$string = $get;
		$i = -1;
		$id_product = '';
		while ($i < strlen($string)){						
			$i++;							
			if ($string[$i] != ' '){
				$id_product = $id_product . $string[$i];
			} else {					
				$d++;
				$arr[$d] = $id_product;
				
				$id_product = '';	
			}
		}
		if ($d == 0) $arr[] = 0;			
		return $arr;
}

function getToArray2($str){ // Нахождение в массиве с разделителем (;) порядковый номер атрибута
	$result = 0;
	$tire = stripos($str, '-');
	$result = intval(substr($str, 0, $tire));
	return $result;
}

function getToArray3($str){ // Избавиться от порядковых номеров в массиве с разделителем (;)
	$str2 = str_replace(getToArray2($str) . '-', "", $str);
	return $str2;
}

function showCP($product_hierarchy, $arr_hierarchy){ // Показывать в этой категории?
	$true = 0;		
	$true_d = 0;
	while ($true_d < count($arr_hierarchy)){
		$true_d++;
		if ($arr_hierarchy[$true_d] == $product_hierarchy) $true++;
	}
	return $true;
}

function red($value, $important, $block_id){
	if (($value == '') and ($important == 1)){
		?>				
			<style>
				#<?php echo $block_id; ?>{
					background: #ff9191;
				}
			</style>
		<?php
	} else {
		?>				
			<style>
				#<?php echo $block_id; ?>{
					background: transparent;
				}
			</style>
		<?php			
	}
}

function red2($value, $important, $block_id){
	if (($value == '') and ($important == 1)){
		?>
			<style>
				#<?php echo $block_id; ?>{
					background: #f3bcbc;
				}
			</style>
		<?php
	} else {
		?>
			<style>
				#<?php echo $block_id; ?>{
					background: transparent;
				}
			</style>
		<?php			
	}
}


function special_select($formName, $blockId, $sqlTable, $text, $id, $selectBlock, $selectName, $value, $readonly){		
	?>
		<div class="specialSelect" id="<?php echo $selectBlock; ?>">
			<div class="specialSelect-header">
				<div class="specialSelect-header-left">
					<div class="specialSelect-header-value">
						<span data-id="" <?php if ($readonly == 1){ ?>onclick="specialSelectOpen('<?php echo $formName; ?>', '<?php echo $blockId; ?>', '<?php echo $sqlTable; ?>', '<?php echo $text; ?>', <?php echo $id; ?>, '<?php echo $selectBlock; ?>', '<?php echo $selectName; ?>');"<?php } ?>> <?php if ($value != ''){ echo $value; } else { ?>-<?php } ?> </span>
					</div>
					<div class="specialSelect-header-input" style="display: none;">
						<input onkeypress="specialSelectpress('<?php echo $formName; ?>', '<?php echo $blockId; ?>', '<?php echo $sqlTable; ?>', '<?php echo $text; ?>', <?php echo $id; ?>, '<?php echo $selectBlock; ?>');" type="text" value="<?php echo $value; ?>" name="<?php echo $selectName; ?>" />
					</div>																		
				</div>
				<div class="specialSelect-header-right" <?php if ($readonly == 1){ ?>onclick="specialSelectOpen('<?php echo $formName; ?>', '<?php echo $blockId; ?>', '<?php echo $sqlTable; ?>', '<?php echo $text; ?>', <?php echo $id; ?>, '<?php echo $selectBlock; ?>', '<?php echo $selectName; ?>');"<?php } ?>></div>
			</div>
			<div class="specialSelect-list" id="<?php echo $blockId; ?>"></div>
		</div>		
	<?php
}

function special_check($checkBlockId, $checkName, $nameColumSqlText, $nameTableSql, $nameColumSqlID, $id, $value, $readonly){
	$span = '';
	$res2 = mysql_query("select * FROM `".$nameTableSql."` WHERE `".$nameColumSqlID."` = '".$id."' ");
	while ($row2 = mysql_fetch_assoc($res2)){
		$span = $row2[$nameColumSqlText];
	}
	?>
		<div class="specialCheck" id="<?php echo $checkBlockId; ?>">
			<label for="<?php echo $checkName; ?>"><?php echo $span; ?></label>				
			<?php if ($value == 'Да'){ ?>
				<span>Да</span> <input <?php if ($readonly == 0){ ?><?php } ?> type="radio" checked="checked" value="Да" name="<?php echo $checkName; ?>" />
				<span>Нет</span> <input <?php if ($readonly == 0){ ?><?php } ?> type="radio" value="Нет" name="<?php echo $checkName; ?>" />				
			<?php } else { ?>
				<span>Да</span> <input <?php if ($readonly == 0){ ?><?php } ?> type="radio" value="Да" name="<?php echo $checkName; ?>" />
				<span>Нет</span> <input <?php if ($readonly == 0){ ?><?php } ?> type="radio" checked="checked" value="Нет" name="<?php echo $checkName; ?>" />				
			<?php } ?>
		</div>		
	<?php
}

function special_text($id_input, $name_input, $id, $value, $readonly){
	?>
		<input <?php if ($readonly == 0){ ?>readonly<?php } ?> value="<?php echo $value; ?>" id="<?php echo $id_input; ?>" name="<?php echo $name_input; ?>" type="text" />
	<?php
}
















function searchNameAttr($attr_id){
	$result = '';
	$res2 = mysql_query("select * FROM `new_attr` WHERE `id` = '".$attr_id."' ");
	while ($row2 = mysql_fetch_assoc($res2)){
		$result = $row2['attr_name'];
	}
	return $result;
}

function searchNameProduct($id){
	$result = '';
	$res2 = mysql_query("select * FROM `new_product` WHERE `id` = '".$id."' ");
	while ($row2 = mysql_fetch_assoc($res2)){
		$result = $row2['product_name'];
	}
	return $result;
}

function searchNameSQU($id){
	$result = '';
	$res2 = mysql_query("select * FROM `new_product` WHERE `id` = '".$id."' ");
	while ($row2 = mysql_fetch_assoc($res2)){
		$result = $row2['squ'];
	}
	return $result;
}

function searchVolum($attr_id){
	$attr_type_id = '';
	$res2 = mysql_query("select * FROM `new_attr` WHERE `id` = '".$attr_id."' ");
	while ($row2 = mysql_fetch_assoc($res2)){
		$attr_type_id = $row2['attr_type_id'];
	}	
	$result = '';
	$res2 = mysql_query("select * FROM `new_attr_type` WHERE `id` = '".$attr_type_id."' ");
	while ($row2 = mysql_fetch_assoc($res2)){
		$result = $row2['attr_type_name'];
	}	
	return $result;
}

function importantAttr($attr_id){
	$datchik = 0;
	$res2 = mysql_query("select * FROM `new_attr` WHERE `id` = '".$attr_id."' and `important` = '1' ");
	while ($row2 = mysql_fetch_assoc($res2)){
		$datchik++;
	}
	return $datchik;
}

function code_to_id($code){
	$result = '';
	$res = mysql_query("select * FROM `new_hierarchy` WHERE `code` = '".$code."' ");
	while ($row = mysql_fetch_assoc($res)){					
		$result = $row['id'];
	}
	return $result;
}

function id_to_code($id){
	$result = '';
	$res = mysql_query("select * FROM `new_hierarchy` WHERE `id` = '".$id."' ");
	while ($row = mysql_fetch_assoc($res)){					
		$result = $row['code'];
	}
	return $result;
}

function CP_attr($category_id, $user_id){
	// Получаем attr_id, у которых есть привязка к текущей категории
	$WHERE = '';		
	$i = 0;		
	$res = mysql_query("select * FROM `new_attr_hierarchy` WHERE `hierarchy_id` = '".$category_id."' ");
	while ($row = mysql_fetch_assoc($res)){						
		$WHERE = $WHERE . "`attr_id` = '".$row['attr_id']."' or ";			
	}
	$WHERE = $WHERE . "`attr_id` = '~' ";

	// Получаем сортированный вид	
	$attr_id = '';	
	$j = 0;
	$j2 = 0;
	$res = mysql_query("select * FROM `new_attr_showme` WHERE (".$WHERE.") and `user_id` = '".$user_id."' ");
	while ($row = mysql_fetch_assoc($res)){
		$j++;
		//$attr_id = $attr_id . $row['attr_id'] . '~';
		$a1[$j] = $row['attr_id'];
				$OBJECT = '';
				$object_hierarchy = getToArray($row['hierarchy_id_sort'], $arr);
				$i = 0;
				while ($i < count($object_hierarchy)){
					$i++;
					if ($category_id == getToArray2($object_hierarchy[$i])){						
						$j2++;
						$a2[$j2] = getToArray3($object_hierarchy[$i]);
					}
				}		
	}
	array_multisort($a2, $a1);
	$i = -1;
	while ($i < count($a1)){
		$i++;
		$attr_id = $attr_id . $a1[$i] . '~';
	}
	return $attr_id;
}

function showme_attr($attr_id, $user_id, $category_id){
	$result = '';
	$res = mysql_query("select * FROM `new_attr_showme` WHERE `attr_id` = '".$attr_id."' and `user_id` = '".$user_id."' ");
	while ($row = mysql_fetch_assoc($res)){
		//$result = $row['showme'];
		
			$OBJECT = '';
			$object_hierarchy = getToArray($row['hierarchy_id'], $arr);
			$i = 0;
			while ($i < count($object_hierarchy)){
				$i++;
				if ($category_id == getToArray2($object_hierarchy[$i])){
					$result = getToArray3($object_hierarchy[$i]);
				}
			}
		
	}
	return $result;
}

function attrSAP($attr_id){
	$result = 0;
	$res = mysql_query("select * FROM `new_attr` WHERE `sap` = '1' and `id` = '".$attr_id."' ");
	while ($row = mysql_fetch_assoc($res)){
		$result++;
	}
	return $result;
}

function showMe($attr_id, $user_id, $category_id){
	$result = 0;
	$res = mysql_query("select * FROM `new_attr_showme` WHERE `attr_id` = '".$attr_id."' and `user_id` = '".$user_id."' ");
	while ($row = mysql_fetch_assoc($res)){
		
			$OBJECT = '';
			$object_hierarchy = getToArray($row['hierarchy_id'], $arr);
			$i = 0;
			while ($i < count($object_hierarchy)){
				$i++;
				if ($category_id == getToArray2($object_hierarchy[$i])){
					$result = getToArray3($object_hierarchy[$i]);
				}
			}

	}
	return $result;
}

function builderImgDirectory_brand($product_id){
	$road = '';		
	$brand = '';
	
	$res = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$product_id."' and `attr_id` = '63' ");
	while ($row = mysql_fetch_assoc($res)){
		$brand = $row['attr_value'];
	}
	if ($brand == '') $brand = '_';
	$brand = str_replace(' ', '_', $brand);		
	$road = $brand . '/';
	return $road;
}

function builderImgDirectory_squ($product_id){
	$road = '';
	$squ = '';
	$brand = '';
	
	$res = mysql_query("select * FROM `new_product` WHERE `id` = '".$product_id."' ");
	while ($row = mysql_fetch_assoc($res)){
		$squ = $row['squ'];
	}
	$res = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$product_id."' and `attr_id` = '63' ");
	while ($row = mysql_fetch_assoc($res)){
		$brand = $row['attr_value'];
	}
	if ($brand == '') $brand = '_';
	$brand = str_replace(' ', '_', $brand);		
	$road = $squ . '/';
	return $road;
}

function userType($user_id){
	$access_id = '';
	$res = mysql_query("select * FROM `new_user` WHERE `id` = '".$user_id."' ");
	while ($row = mysql_fetch_assoc($res)){			
		$access_id = $row['access_id'];
	}
	return $access_id;
}

function PZC($user_type_id, $operation_id){
	$right_id = '';
	$res = mysql_query("select * FROM `new_operation_access` WHERE `user_type_id` = '".$user_type_id."' and `operation_id` = '".$operation_id."' ");
	while ($row = mysql_fetch_assoc($res)){			
		$right_id = $row['right_id'];
	}
	return $right_id;		
}

function filtr($name, $squ, $value, $attr_id_arr2){
	
											// Имя		
												$FILTR_TRUE1 = 0;														
												$FILTR_TRUE1_2 = 0;														
												if ($_SESSION['filtr-word--2-1'] != ''){																
													$object_ARR_FILTR_TEG = getToArray_probel($_SESSION['filtr-word--2-1'] . ' ', $arr2);		
													$a = str_replace('ё', 'е', mb_strtolower($name));
													$i = 0;
													while ($i < count($object_ARR_FILTR_TEG)){
														$i++;
														$b = str_replace('ё', 'е', mb_strtolower($object_ARR_FILTR_TEG[$i]));
														if ($b != '') if (strpos(' ' . $a, $b) > 0) $FILTR_TRUE1_2++;
													}
													if (count($object_ARR_FILTR_TEG) == $FILTR_TRUE1_2) $FILTR_TRUE1++;
												}

												
											// Артикул						
												$FILTR_TRUE2 = 0;	
												$FILTR_TRUE2_2 = 0;	
												if ($_SESSION['filtr-word--1-1'] != ''){																
													$object_ARR_FILTR_TEG = getToArray_probel($_SESSION['filtr-word--1-1'] . ' ', $arr2);		
													$a = str_replace('ё', 'е', mb_strtolower($squ));
													$i = 0;
													while ($i < count($object_ARR_FILTR_TEG)){	
														$i++;															
														$b = str_replace('ё', 'е', mb_strtolower($object_ARR_FILTR_TEG[$i]));
														if ($b != '') if (strpos(' ' . $a, $b) > 0) $FILTR_TRUE2_2++;
													}
													if (count($object_ARR_FILTR_TEG) == $FILTR_TRUE2_2) $FILTR_TRUE2++;
												}

											// Динамические атрибуты
												$i = 0;
												$ARR_FILTR_TRUE4_d = 0; // сколько тегов
												while ($i < count($attr_id_arr2)){
													$i++;
													if ($_SESSION['filtr-word-' . $attr_id_arr2[$i] . '-1'] != ''){	
														$ARR_FILTR_TRUE4_d++;																
														$a = ' ' . $value[$attr_id_arr2[$i]];
														$b = $_SESSION['filtr-word-' . $attr_id_arr2[$i] . '-1'];
														
														$ARR_FILTR_TRUE4_a[$ARR_FILTR_TRUE4_d] = $a;
														$ARR_FILTR_TRUE4_b[$ARR_FILTR_TRUE4_d] = $b;																															
													}													
												}
												
												$FILTR_TRUE4 = 0;
												$FILTR_TRUE4_2 = 0;
												$i = 0;													
												while ($i < $ARR_FILTR_TRUE4_d){
													$i++;				
													$object_ARR_FILTR_TEG = getToArray_probel($ARR_FILTR_TRUE4_b[$i] . ' ', $arr2);		
													$j = 0;
													while ($j < count($object_ARR_FILTR_TEG)){	
														$j++;	
														$a = str_replace('ё', 'е', mb_strtolower($ARR_FILTR_TRUE4_a[$i]));															
														$b = str_replace('ё', 'е', mb_strtolower($object_ARR_FILTR_TEG[$j]));
														if($b != '') if (strpos($a, mb_strtolower($b)) > 0) $FILTR_TRUE4_2++;
													}
													if (count($object_ARR_FILTR_TEG) == $FILTR_TRUE4_2) $FILTR_TRUE4++;
												}





												$FILTR_TRUE = 0;													
																									
												//100
												if (($_SESSION['filtr_teg1'] > 0) and ($_SESSION['filtr_teg2'] == 0) and ($_SESSION['filtr_teg4'] == 0)){
													if ($FILTR_TRUE1 > 0)$FILTR_TRUE++;
												}
												//010
												if (($_SESSION['filtr_teg1'] == 0) and ($_SESSION['filtr_teg2'] > 0) and ($_SESSION['filtr_teg4'] == 0)){
													if ($FILTR_TRUE2 > 0)$FILTR_TRUE++;
												}
												//001
												if (($_SESSION['filtr_teg1'] == 0) and ($_SESSION['filtr_teg2'] == 0) and ($_SESSION['filtr_teg4'] > 0)){
													if ($FILTR_TRUE4 > 0)$FILTR_TRUE++;
												}
												//110
												if (($_SESSION['filtr_teg1'] > 0) and ($_SESSION['filtr_teg2'] > 0) and ($_SESSION['filtr_teg4'] == 0)){
													if (($FILTR_TRUE1 > 0) and ($FILTR_TRUE2 > 0))$FILTR_TRUE++;
												}
												//101
												if (($_SESSION['filtr_teg1'] > 0) and ($_SESSION['filtr_teg2'] == 0) and ($_SESSION['filtr_teg4'] > 0)){
													if (($FILTR_TRUE1 > 0) and ($FILTR_TRUE4 > 0))$FILTR_TRUE++;
												}
												//011
												if (($_SESSION['filtr_teg1'] == 0) and ($_SESSION['filtr_teg2'] > 0) and ($_SESSION['filtr_teg4'] > 0)){
													if (($FILTR_TRUE2 > 0) and ($FILTR_TRUE4 > 0))$FILTR_TRUE++;
												}
												//111
												if (($_SESSION['filtr_teg1'] > 0) and ($_SESSION['filtr_teg2'] > 0) and ($_SESSION['filtr_teg4'] > 0)){
													if (($FILTR_TRUE1 > 0) and ($FILTR_TRUE2 > 0) and ($FILTR_TRUE4 > 0))$FILTR_TRUE++;
												}
									return $FILTR_TRUE;
}

function arr_in_arr($arr1, $arr2){
	$d = 0;
	$d2 = 0;
	$i = 0;
	while ($i < count($arr1)){
		$i++;
		if (array_search($arr1[$i], $arr2)) $d++;
	}
	if ($d == count($arr2)) $d2++;
	return $d2;
}

	
?>	