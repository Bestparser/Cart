<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>


<div class="specialBlockShare" style="display: none;">
	<span id="category_id"><?php echo $_GET['category_id']; ?></span>
	<span id="domain"><?php echo $domain; ?></span>
</div>





<table class="table_sort1">
	<thead>	
		<tr>
			<td style="width: 50px;"><input type="checkbox" id="check-all" onclick="checkAllProduct();" /></td>
			<?php include('header.php'); ?>	
		</tr>
	</thead>
	<tbody>
		<?php // Join собрать матрицу из sql (product_id + его атрибуты)
			$datchik = 0;
			$datchik2 = 0;
			$datchik3 = 0;
			$k2 = 0;
			$PRODUCT_ID_arr = '';			
			$res = mysql_query("SELECT `new_product`.`date`, `new_product`.`id`, `new_product`.`squ`, `new_product`.`product_name`, `new_product_attr`.`product_id` AS `id`, `new_product_attr`.`attr_id`, `new_product_attr`.`attr_value` FROM `new_product` JOIN `new_product_attr` ON `new_product`.`id` = `new_product_attr`.`product_id` WHERE `new_product`.`product_hierarchy_id` = '".$_GET['code_to_id']."' ORDER BY `new_product`.`id` desc");
			while ($row = mysql_fetch_assoc($res)){
				$datchik2++;
				$arr_datchik2[$datchik2] = $row['id'];
				if ($datchik2 > 1){
					if ($arr_datchik2[$datchik2] == $arr_datchik2[$datchik2-1]){
						if (($row['attr_id'] == 550) or ($row['attr_id'] == 573)){
							$datchik3++;
							$MATRIX_PRODUCT[$datchik][$row['attr_id'] . '_' . $datchik3] = $row['attr_value'];
						} else {
							$datchik3 = 0;
							$MATRIX_PRODUCT[$datchik][$row['attr_id']] = $row['attr_value'];	
						}
					} else {
						$datchik++;
						$MATRIX_PRODUCT[$datchik]['product_id'] = $row['id'];
						$MATRIX_PRODUCT[$datchik]['product_name'] = $row['product_name'];
						$MATRIX_PRODUCT[$datchik]['squ'] = $row['squ'];
						$MATRIX_PRODUCT[$datchik]['date'] = $row['date'];
						$PRODUCT_ID_arr = $PRODUCT_ID_arr . $row['id'] . '~';
					}
				} else {
						if (($row['attr_id'] == 550) or ($row['attr_id'] == 573)){
							$datchik3++;
							$MATRIX_PRODUCT[$datchik][$row['attr_id'] . '_' . $datchik3] = $row['attr_value'];														
						} else {
							$datchik++;
							$MATRIX_PRODUCT[$datchik]['product_id'] = $row['id'];
							$MATRIX_PRODUCT[$datchik]['product_name'] = $row['product_name'];
							$MATRIX_PRODUCT[$datchik]['squ'] = $row['squ'];
							$MATRIX_PRODUCT[$datchik]['date'] = $row['date'];
							$MATRIX_PRODUCT[$datchik][$row['attr_id']] = $row['attr_value'];
							$PRODUCT_ID_arr = $PRODUCT_ID_arr . $row['id'] . '~';							
							$datchik3 = 0;													
						}
				}
			}
			// end Join собрать матрицу из sql (product_id + его атрибуты)
			
			
		?>	
	
	
		<?php // Распарсить матрицу в продукты
			$y = 0;
			while ($y < count($MATRIX_PRODUCT)){
				$y++;											
				$value = [];
				$tr_class = 0;
				$x = 0;
				$MATRIX_keys = array_keys($MATRIX_PRODUCT[$y]);
				if (arr_in_arr($MATRIX_keys, $attr_id_arr3) == 0) $tr_class++; // Красные
				while ($x < count($MATRIX_keys)-1){
					$x++;												
					$value[$MATRIX_keys[$x]] = $MATRIX_PRODUCT[$y][$MATRIX_keys[$x]];
					
					// Красные
						if (array_search($MATRIX_keys[$x], $attr_id_arr3)){
							$k2++;
							$arr_product_id[$k2] = $MATRIX_PRODUCT[$y]['product_id'];
							$arr_attr_id[$k2] = $MATRIX_keys[$x];
							if ($value[$MATRIX_keys[$x]] == '') $tr_class++;
						}
					// end Красные
				}	
				if ($tr_class > 0) $tr_class = 'tr_red';
				if ($_SESSION['s_d2'] > 0){
					$FILTR_TRUE = filtr($MATRIX_PRODUCT[$y]['product_name'], $MATRIX_PRODUCT[$y]['squ'], $value, $attr_id_arr2);
					if ($FILTR_TRUE > 0) include('tr.php');
				} else {
					include('tr.php');
				}
			}
			// end Распарсить матрицу в продукты
		?>
	</tbody>
</table>

<?php if ($datchik == 0){ ?>
	<span>Товары не найдены.</span>
<?php } ?>

<div class="desctop_desctop"></div>
