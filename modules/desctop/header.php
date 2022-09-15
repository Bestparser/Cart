<?php // ГЕНЕРАЦИЯ ШАПКИ DESCTOP ПО АТРИБУТАМ, КОТОРЫЕ РАЗРЕШЕНЫ ПОКАЗУ В ФИЛЬТРЕ
	$WHERE_ATTR_ID2 = '';
	$attr_id_arr = getToArray(CP_attr($_GET['code_to_id'], $user_id), $arr); // привязанные атрибуты к текущей иерархии + отсортированные по user_id
	$i = 0;
	$j = 0;
	$l = 0;
	while ($i < count($attr_id_arr)){
		$i++;
		if (showMe($attr_id_arr[$i], $user_id, code_to_id($_GET['category_id'])) > 0){
			$j++;
			$attr_id_arr2[$j] = $attr_id_arr[$i]; // атрибуты: showme с галочкой (используется ниже)
			$WHERE_ATTR_ID2 = $WHERE_ATTR_ID2 . "`attr_id`='".$attr_id_arr[$i]."' or ";
			?>
				<td class="down" <?php if ($attr_id_arr[$i] == '-2'){ ?>style="width: 300px;"<?php } ?>>												
					<span><?php echo searchNameAttr($attr_id_arr[$i]); ?><?php if (importantAttr($attr_id_arr[$i]) > 0){ ?> * <?php } ?></span>
					<?php if (($attr_id_arr[$i] != '550') and ($attr_id_arr[$i] != '546') and ($attr_id_arr[$i] != '573')){ ?>
						<input style="display: none;" value="" data-id="<?php echo $attr_id_arr[$i]; ?>" class="desctop-filtr" type="text" id="desctop-filtr-<?php echo $attr_id_arr[$i]; ?>" />
						<i id="lupa-desctop-filtr-<?php echo $attr_id_arr[$i]; ?>" onclick="desctopFiltr(<?php echo $attr_id_arr[$i]; ?>); openDesctopFiltr(<?php echo $attr_id_arr[$i]; ?>);"><img class="search" src="img/search.png"/></i>
						<i style="display: none;" class="close-desctop-filtr" id="close-desctop-filtr-<?php echo $attr_id_arr[$i]; ?>" onclick="closeDesctopFiltr(<?php echo $attr_id_arr[$i]; ?>);"> X </i>
					<?php } ?>	
				</td>
			<?php
		}
		// Вытаскиваем только обязательные атрибуты
		$d = 0;
		$res2 = mysql_query("select * FROM `new_attr` WHERE `important` = '1' and `id` != '-1' and `id` != '-2' and `id` != '550' and `id` != '573' and `id` != '546' and `id` = '".$attr_id_arr[$i]."' ");
		while ($row2 = mysql_fetch_assoc($res2)){
			$d++;
		}
		if ($d > 0){
			$l++;
			$attr_id_arr3[$l] = $attr_id_arr[$i];
		}
	}
	$WHERE_ATTR_ID2 = $WHERE_ATTR_ID2 . "`attr_id`='63'";
?>
