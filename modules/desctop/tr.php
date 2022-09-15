<?php
	$date1 = date_create(date("Y-m-d"));
	$date2 = date_create($MATRIX_PRODUCT[$datchik]['date']);	
	$diff = date_diff($date1, $date2);
	$differentDate = $diff->format('%a');
	if ($differentDate < 10) $tr_class = 'tr_green';
?>


<tr id="product-<?php echo $MATRIX_PRODUCT[$y]['product_id']; ?>" class="<?php echo $tr_class; ?>">
	<td style="width: 50px;">
		<input class="checkProduct" data-id="<?php echo $MATRIX_PRODUCT[$y]['product_id']; ?>" type="checkbox" name="checkProduct-<?php echo $MATRIX_PRODUCT[$y]['product_id']; ?>">
	</td>

	<?php
		$i = 0;
		while ($i < count($attr_id_arr2)){
			$i++;
			
					// Вывод статических атрибутов
						if ($attr_id_arr2[$i] == '-2'){ // Имя продукта
							?>
								<td style="width: 300px;" class="productName" id="productName-<?php echo $MATRIX_PRODUCT[$y]['product_id']; ?>">																															
									<span data-id="<?php echo $MATRIX_PRODUCT[$y]['product_id']; ?>" id="product-<?php echo $MATRIX_PRODUCT[$y]['product_id']; ?>" onclick="openPopup('cartProduct', '<?php echo $MATRIX_PRODUCT[$y]['product_id']; ?>', '<?php echo $_GET['category_id']; ?>');"><?php echo $MATRIX_PRODUCT[$y]['product_name']; ?></span>									
								</td> 															
							<?php
						} elseif ($attr_id_arr2[$i] == '-1') { // Артикул
							?>
								<td id="product-squ-<?php echo $MATRIX_PRODUCT[$y]['product_id']; ?>">																														
									<span><?php echo $MATRIX_PRODUCT[$y]['squ']; ?></span>
								</td> 
							<?php
						} else {
						
								// Вывод динамических атрибутов
										?>
											<td <?php if (($attr_id_arr2[$i] == 551) and (strlen(strip_tags($value[$attr_id_arr2[$i]])) > 200)){ ?>class="annotation"<?php } ?>><?php													
													if ($attr_id_arr2[$i] == 546){ // Основная картинка
														
														$brand = $MATRIX_PRODUCT[$y]['63'];
														if ($brand == '') $brand = '_';
														$brand = str_replace(' ', '_', $brand);		
														$road_brand = $brand . '/';

														$road_squ = $MATRIX_PRODUCT[$y]['squ'] . '/';
													
														if ($value[$attr_id_arr2[$i]] != ''){
															?><img style="width: 100px;" src="<?php echo $domain; ?>/images/<?php echo $road_brand; ?><?php echo $road_squ; ?><?php echo $value[$attr_id_arr2[$i]]; ?>"><span style="display: none;"></span><?php
														}
													} elseif ($attr_id_arr2[$i] == 550){ // Дополнительные картинки																											
													
														$brand = $MATRIX_PRODUCT[$y]['63'];
														if ($brand == '') $brand = '_';
														$brand = str_replace(' ', '_', $brand);		
														$road_brand = $brand . '/';
														$road_squ = $MATRIX_PRODUCT[$y]['squ'] . '/';
														
														$img_d = 0;
														while ($img_d < 100){
															$img_d++;	
															if ($MATRIX_PRODUCT[$y]['550_'.$img_d.''] != ''){
																?>
																	<img style="width: 50px;" src="<?php echo $domain; ?>/images/<?php echo $road_brand; ?><?php echo $road_squ; ?><?php echo $MATRIX_PRODUCT[$y]['550_'.$img_d.'']; ?>"><div style="display: none;"></div>																													
																<?php
															}
														}
													} elseif ($attr_id_arr2[$i] == 573) { // Картинки в упаковке														
														$brand = $MATRIX_PRODUCT[$y]['63'];
														if ($brand == '') $brand = '_';
														$brand = str_replace(' ', '_', $brand);		
														$road_brand = $brand . '/';
														$road_squ = $MATRIX_PRODUCT[$y]['squ'] . '/';
														
														$img_d = 0;
														while ($img_d < 100){
															$img_d++;	
															if ($MATRIX_PRODUCT[$y]['573_'.$img_d.''] != ''){
																?>
																	<img style="width: 50px;" src="<?php echo $domain; ?>/images/<?php echo $road_brand; ?><?php echo $road_squ; ?><?php echo $MATRIX_PRODUCT[$y]['573_'.$img_d.'']; ?>"><div style="display: none;"></div>
																<?php
															}
														}												
													
													} else {
														?>
															<span>
																<?php if ($attr_id_arr2[$i] != 551){ ?>
																	<?php echo $value[$attr_id_arr2[$i]]; ?><?php if ($value[$attr_id_arr2[$i]] != ''){ ?><i style="display: none;">.</i><?php } ?>																
																	<?php if ($value[$attr_id_arr2[$i]] != ''){ echo searchVolum($attr_id_arr2[$i]); } ?>
																<?php } else { ?>																	
																	<?php
																		$string = str_replace('<', ' <', $value[$attr_id_arr2[$i]]);
																		echo strip_tags($string);
																	?>
																<?php } ?>
															</span>
														<?php
													}
												?>
											</td>
										<?php		
						}																		
		}	
	?>
</tr>