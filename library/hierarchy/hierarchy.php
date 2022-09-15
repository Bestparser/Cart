<?php
	error_reporting(0);	
	// Считываем в массив из sql иерархию
		$i = 0;
		
		$j = 0;
		$z = 0;
		$k = 0;
		
		$res = mysql_query("select * FROM `new_hierarchy` ");
		while ($row = mysql_fetch_assoc($res)){
			$i++;
			if ($row['number_level'] == 1){
				$j++;
				$MATRIX_xml_hierarchy_first[$j] = $row['hierarchy_name']; // первый уровень
				$MATRIX_xml_hierarchy_first_code[$j] = $row['code']; // первый уровень кода							
			}
			if ($row['number_level'] == 2){
				$z++;
				$MATRIX_xml_hierarchy_second[$z] = $row['hierarchy_name']; // второй уровень
				$MATRIX_xml_hierarchy_second_code[$z] = $row['code']; // второй уровень кода							
			}
			if ($row['number_level'] == 3){
				$k++;	
				$MATRIX_xml_hierarchy_third[$k] = $row['hierarchy_name']; // третий уровень
				$MATRIX_xml_hierarchy_third_code[$k] = $row['code']; // третий уровень кода							
			}
		}
		
		
		function code_to_id($code){
			$result = '';
			$res = mysql_query("select * FROM `new_hierarchy` WHERE `code` = '".$code."' ");
			while ($row = mysql_fetch_assoc($res)){					
				$result = $row['id'];
			}
			return $result;
		}		
		
		function deleteCopy($MATRIX_xml_hierarchy_first_code){
			$RESULT_hierarchy_double = array_unique($MATRIX_xml_hierarchy_first_code);
			$i = -1;
			$j = -1;
			while ($i < count($MATRIX_xml_hierarchy_first_code)){
				$i++;
				if ($RESULT_hierarchy_double[$i] > 0){
					$j++;
					$RESULT_hierarchy[$j] = $RESULT_hierarchy_double[$i];
				}
			}
			return $RESULT_hierarchy;
		}		
		$RESULT_hierarchy1 = deleteCopy($MATRIX_xml_hierarchy_first_code);

		function findNameCode($code, $arr1, $arr2){
			$i = -1;
			$datchik = -1;
			while ($i < count($arr1)){
				$i++;
				if ($arr1[$i] == $code){
					$datchik = $i;
				}
			}
			if ($datchik > -1){
				return $arr2[$datchik]; // русское название
			} else {
				return '0';	
			}
		}
?>	
	
<?php

	echo "<ul id='sortHierarchy' class='ulLevelOne'>";	
	$j = -1;
	while ($j < count($RESULT_hierarchy1)){
		$j++;
		if ($RESULT_hierarchy1[$j] > 0){
			
			// Первая категория
				echo "<li>";
				//echo "<span item-id='".code_to_id($RESULT_hierarchy1[$j])."' data-id='".$RESULT_hierarchy1[$j]."' id='span-".$RESULT_hierarchy1[$j]."' onclick=\"openSubMenu('ulId-".$RESULT_hierarchy1[$j]."', 'ulLevelTwo', 'span-".$RESULT_hierarchy1[$j]."');\">" . findNameCode($RESULT_hierarchy1[$j], $MATRIX_xml_hierarchy_first_code, $MATRIX_xml_hierarchy_first) . "</span>"; 
			
						// Вторая категория
						//echo "<ul id='ulId-".$RESULT_hierarchy1[$j]."' class='ulLevelTwo'>";							
							$i = -1;
							$k = -1;
							while ($i < count($MATRIX_xml_hierarchy_second_code)){
								$i++;
								if (substr($MATRIX_xml_hierarchy_second_code[$i], 0, 5) == $RESULT_hierarchy1[$j]){			
									$k++;
									$MATRIX_xml_hierarchy_second_code2[$k] = $MATRIX_xml_hierarchy_second_code[$i];
								}				
							}
							unset($arr);
							$arr = deleteCopy($MATRIX_xml_hierarchy_second_code2);
							unset($MATRIX_xml_hierarchy_second_code2);
							$i = -1;
							while ($i < count($arr)){
								$i++;
								if ($arr[$i] > 0){
										echo "<li>";											
										echo "<span item-id='".code_to_id($arr[$i])."' data-id='".$arr[$i]."' id='span-".$arr[$i]."' onclick=\"openSubMenu('ulId-".$arr[$i]."', 'ulLevelTwoThree', 'span-".$arr[$i]."'); openProduct('span-".$arr[$i]."', '".$arr[$i]."');\">" . findNameCode($arr[$i], $MATRIX_xml_hierarchy_second_code, $MATRIX_xml_hierarchy_second) . "</span>"; 
												?>
												
<?php
	$res10_d = 0;
	$res10 = mysql_query("select * FROM `new_product` WHERE `product_hierarchy_id` = '".code_to_id($arr[$i])."' ");
	while ($row10 = mysql_fetch_assoc($res10)){
		$res10_d++;
	}	
?>	
<?php if ($res10_d > 0){ ?> <i>( <?php echo $res10_d; ?>) </i><?php } ?>
												
<script type="text/javascript">
	$("#ulId-<?php echo $arr[$i] ?>").append($("#ulId-<?php echo $arr[$i] ?> > li").remove().sort(function(a, b) {
		var at = $(a).text(), bt = $(b).text();
		return (at > bt)?1:((at < bt)?-1:0);
	}));
</script>												
												
												
												
												<?php
												// Третья категория
													echo "<ul id='ulId-".$arr[$i]."' style='display: none;' class='ulLevelThree'>";
														$i3 = -1;
														$k3 = -1;
														while ($i3 < count($MATRIX_xml_hierarchy_third_code)){
															$i3++;
															if (substr($MATRIX_xml_hierarchy_third_code[$i3], 0, 10) == $arr[$i]){			
																$k3++;
																$MATRIX_xml_hierarchy_third_code2[$k3] = $MATRIX_xml_hierarchy_third_code[$i3];
															}				
														}
														unset($arr3);
														$arr3 = deleteCopy($MATRIX_xml_hierarchy_third_code2);
														unset($MATRIX_xml_hierarchy_third_code2);
														$i3 = -1;
														while ($i3 < count($arr3)){
															$i3++;
															if ($arr3[$i3] > 0){
																echo "<li>";
																echo "<span item-id='".code_to_id($arr3[$i3])."' data-id='".$arr3[$i3]."' id='span-".$arr3[$i3]."' onclick=\"openProduct('span-".$arr3[$i3]."', '".$arr3[$i3]."');\">" . findNameCode($arr3[$i3], $MATRIX_xml_hierarchy_third_code, $MATRIX_xml_hierarchy_third) . "</span>"; 															
																
$res10_d = 0;
$res10 = mysql_query("select * FROM `new_product` WHERE `product_hierarchy_id` = '".code_to_id($arr3[$i3])."' ");
while ($row10 = mysql_fetch_assoc($res10)){
	$res10_d++;
}
if ($res10_d > 0){ ?> <i>( <?php echo $res10_d; ?> )</i><?php }
																echo "</li>";
															}
														}
													echo "</ul>";
												// end третья категория
												
										echo "</li>";
								}		
								
							}
						//echo "</ul>";
						// end вторая категория
						
				//echo "</li>";
		}	
	}
	echo "</ul>";
	

?>