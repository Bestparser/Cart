<?php require_once('../../conf.php'); ?>
<?php require_once('../../library/functions.php'); ?>
<?php error_reporting(0); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>


<div class="closePopup">
	<span onclick="closeMiniForm();"> X </span>
</div>



<div>
	<input type="button" class="CLASS-connectCategorySave" id="button-save-connect-cat" onclick="connectCategorySave('attrCategory');" value="Сохранить">
	<table class="noBorder noHover hierarchy-selector">

			<tr><td></br></td></tr>
			<tr><td></br></td></tr>
			<tr><td></br></td></tr>
			<tr><td></br></td></tr>

			<tr>
				<td>
						<?php
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
								
								
								
								$id_attr = getToArray($_GET['id_attr'], $arr);
								$WHERE_ID = '';
								$special_i = 0;
								while ($special_i < count($id_attr)){
									$special_i++;
									$WHERE_ID = $WHERE_ID . "`id` = '".$id_attr[$special_i]."' or ";
								}
								$WHERE_ID = $WHERE_ID . "`id` = '-100'";
								
								
								
								$special_i2 = 0;
								$res = mysql_query("select * FROM `new_attr` WHERE ".$WHERE_ID." ");
								while ($row = mysql_fetch_assoc($res)){
									$special_i2++;
									
									$res2 = mysql_query("select * FROM `new_attr_hierarchy` WHERE `attr_id` = '".$row['id']."' ");
									while ($row2 = mysql_fetch_assoc($res2)){
										$attr_hierarchy[$special_i2] = $attr_hierarchy[$special_i2] . id_to_code($row2['hierarchy_id']) . '~';
									}										
								}
							
						?>	
							
						<div class="CLASS-check-all"><input type="checkbox" id="check-all-cat" name="" onclick="checkAllCat();" />	<label onclick="checkSpan('check-all-cat', '');">Выделить все</label></div></br>
						<?php
							echo "<ul id='ID-connect-cat' class='ulLevelOne connect-cat'>";	
							?>
							<?php
							$j = -1;
							while ($j < count($RESULT_hierarchy1)){
								$j++;
								if ($RESULT_hierarchy1[$j] > 0){
									// Первая категория
										//echo "<li>";
										
										// Ставим check автоматом тем атрибутам, у которых стоит
											/*
											$flajok_d = 0;
											$flajok = 0;
											while ($flajok < count($attr_hierarchy)){
												$flajok++;
												if ($attr_hierarchy[$flajok] == $RESULT_hierarchy1[$j]) $flajok_d++;
											}
											*/
										// end Ставим check
										/*<input onchange="checkHierarchyChild('<?php echo $RESULT_hierarchy1[$j]; ?>');" <?php if ($flajok_d > 0){ ?>checked="checked"<?php } ?> data-id="<?php echo $RESULT_hierarchy1[$j]; ?>" type="checkbox" class="hierarchy-check" id="ID-check-hierarchy-<?php echo $RESULT_hierarchy1[$j]; ?>" name="NAME-check-hierarchy-<?php echo $RESULT_hierarchy1[$j]; ?>">*/
										?>
											
										<?php
										//echo "<span onclick='checkSpan(\"ID-check-hierarchy-\", \"".$RESULT_hierarchy1[$j]."\");' id='span-".$RESULT_hierarchy1[$j]."' 'ulLevelTwo', 'span-".$RESULT_hierarchy1[$j]."');\">" . findNameCode($RESULT_hierarchy1[$j], $MATRIX_xml_hierarchy_first_code, $MATRIX_xml_hierarchy_first) . "</span>"; 
									
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
																
																
																// Ставим check автоматом тем атрибутам, у которых стоит
																	$flajok_d = 0;
																	$flajok = 0;
																	$flajok2_d = 0;
																	while ($flajok < $special_i2){
																		$flajok++;
																		$attr_hierarchy2 = getToArray($attr_hierarchy[$flajok], $arr2);
																		$flajok2 = 0;
																		while ($flajok2 < count($attr_hierarchy2)){
																			$flajok2++;
																			if ($attr_hierarchy2[$flajok2] == $arr[$i]) $flajok2_d++;
																		}
																	}
																	if ($flajok2_d == $special_i2) $flajok_d++;
																// end Ставим check
																	echo "<span onclick='checkSpan(\"ID-check-hierarchy-\", \"".$arr[$i]."\");' id='span-".$arr[$i]."'>" . findNameCode($arr[$i], $MATRIX_xml_hierarchy_second_code, $MATRIX_xml_hierarchy_second) . "</span>"; 
																?>
																	<?php if ($special_i2 > 1){ ?>
																	<?php if (($flajok2_d > 0) and ($flajok_d == 0)){ ?>
																		<div onclick="closeInputClassShaddow('<?php echo $arr[$i]; ?>');" id="inputClassShaddow-<?php echo $arr[$i]; ?>" class="inputClassShaddow"></div>
																	<?php } else { ?>																
																		<div onclick="closeInputClassShaddow('<?php echo $arr[$i]; ?>');" id="inputClassShaddow-<?php echo $arr[$i]; ?>" class="inputClassShaddow" style="display: none;"></div>
																	<?php } ?>
																	<?php } ?>
																	<input onchange="checkHierarchyChild('<?php echo $arr[$i]; ?>');" data-parent="<?php echo $RESULT_hierarchy1[$j]; ?>" <?php if ($flajok_d > 0){ ?>checked="checked"<?php } ?> data-id="<?php echo $arr[$i]; ?>" type="checkbox" class="hierarchy-check" id="ID-check-hierarchy-<?php echo $arr[$i]; ?>" name="NAME-check-hierarchy-<?php echo $arr[$i]; ?>">
																<?php										
																
																	
																		// Третья категория
																			echo "<ul id='ulId-".$arr[$i]."' class='ulLevelThree'>";
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
																						
																						// Ставим check автоматом тем атрибутам, у которых стоит
																							$flajok_d = 0; // простой
																							$flajok = 0;
																							$flajok2_d = 0; // синий
																							while ($flajok < $special_i2){
																								$flajok++;
																								$attr_hierarchy2 = getToArray($attr_hierarchy[$flajok], $arr2);																								
																								$flajok2 = 0;																								
																								while ($flajok2 < count($attr_hierarchy2)){
																									$flajok2++;
																									if ($attr_hierarchy2[$flajok2] == $arr3[$i3]) $flajok2_d++;
																								}
																							}																							
																							if ($flajok2_d == $special_i2) $flajok_d++;
																						// end Ставим check
																							echo "<span onclick='checkSpan(\"ID-check-hierarchy-\", \"".$arr3[$i3]."\");' data-id='".$arr3[$i3]."' id='span-".$arr3[$i3]."'>" . findNameCode($arr3[$i3], $MATRIX_xml_hierarchy_third_code, $MATRIX_xml_hierarchy_third) . "</span>"; 															
																						?>
																							<?php if ($special_i2 > 1){ ?>
																							<?php if (($flajok2_d > 0) and ($flajok_d == 0)){ ?>
																								<div data-parent="<?php echo $arr[$i]; ?>" onclick="closeInputClassShaddow('<?php echo $arr3[$i3]; ?>');" id="inputClassShaddow-<?php echo $arr3[$i3]; ?>" class="inputClassShaddow"></div>
																							<?php } else { ?>
																								<div data-parent="<?php echo $arr[$i]; ?>" onclick="closeInputClassShaddow('<?php echo $arr3[$i3]; ?>');" id="inputClassShaddow-<?php echo $arr3[$i3]; ?>" class="inputClassShaddow" style="display: none;"></div>
																							<?php } ?>
																							<?php } ?>
																							<input data-parent="<?php echo $arr[$i]; ?>" item-id="<?php echo $RESULT_hierarchy1[$j]; ?>" <?php if ($flajok_d > 0){ ?>checked="checked"<?php } ?> data-id="<?php echo $arr3[$i3]; ?>" type="checkbox" class="hierarchy-check" id="ID-check-hierarchy-<?php echo $arr3[$i3]; ?>" name="NAME-check-hierarchy-<?php echo $arr3[$i3]; ?>">
																						<?php																										
																						
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
				
				</td>
			</tr>

	</table>
</div>
<div class="attr_hierarchy_selector"></div>


