<table>	
	<tbody>
		<tr>
			<td class="alignRight">
				<span>Категория: </span>
			</td>
			<td>
				<select disabled class="select" id="ID-edit-cart-product-hierarchy" name="NAME-edit-cart-product-hierarchy">
					<?php
						$main_category = '';
						$res2 = mysql_query("select * FROM `new_hierarchy` WHERE `id` = '".code_to_id($_GET['category_id'])."' ");
						while ($row2 = mysql_fetch_assoc($res2)){
							$main_category = $row2['hierarchy_name'];
						}
					?>
					<option><?php echo $main_category; ?></option>
				</select>
			</td>
		</tr>	

		<?php											
			$datchik = 0;
			$res = mysql_query("select * FROM `new_product` WHERE `id` = '".$_GET['product_id']."' ");
			while ($row = mysql_fetch_assoc($res)){
					$datchik++;
					$IMPORTANT_VALIDATOR = 0;
								$attr_id_arr = getToArray(CP_attr(code_to_id($_GET['category_id']), $user_id), $arr);
								$i = 0;
								while ($i < count($attr_id_arr)){
									$i++;
									
									// Вывод статических атрибутов
										if ($attr_id_arr[$i] == '-2'){ // Имя продукта
											?>
												<tr>
													<td class="alignRight"><span><?php echo searchNameAttr($attr_id_arr[$i]); ?>: </span></td>
													<td><input readonly id="ID-edit-cart-product-name" type="text" name="NAME-edit-cart-product-name" placeholder="<?php echo $row['product_name']; ?>" value="<?php echo $row['product_name']; ?>"></td>
												</tr>																
											<?php
										} elseif ($attr_id_arr[$i] == '-1') { // Артикул
											?>
												<tr>
													<td class="alignRight"><span><?php echo searchNameAttr($attr_id_arr[$i]); ?>: </span></td>
													<td><input readonly id="ID-edit-cart-product-squ" type="text" name="NAME-edit-cart-product-squ" placeholder="<?php echo $row['squ']; ?>" value="<?php echo $row['squ']; ?>"></td>
												</tr>											
											<?php
										} else {
												// Вывод динамических атрибутов
													if (attrSAP($attr_id_arr[$i]) > 0){
														?>
															<tr class="CLASS-product-attr-edit" id="product-attr-edit-<?php echo $attr_id_arr[$i]; ?>">
																	<td class="alignRight"><span><?php echo searchNameAttr($attr_id_arr[$i]); ?>: </span></td>
																	<td>		
																		<?php
																			$value = '';
																			$res2 = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '".$attr_id_arr[$i]."' and `attr_id` != '-1' and `attr_id` != '-2' ");
																			while ($row2 = mysql_fetch_assoc($res2)){
																				$value = $row2['attr_value'];													
																			}																		
																		
																			$res2 = mysql_query("select * FROM `new_attr` WHERE `id` = '".$attr_id_arr[$i]."' ");
																			while ($row2 = mysql_fetch_assoc($res2)){
																				?>
																				<?php if ($row2['attr_type2_id'] == 1) special_text('ID-specialText-'.$row2['id'].'', 'NAME-edit-cart-product-attr-value-'.$row2['id'].'', $row2['id'], $value, 0); ?>
																			
																				<?php if ($row2['attr_type2_id'] == 2) special_select('form-edit-cart-product', 'ID-specialSelect-list-'.$row2['id'].'', 'attr_type_list', 'list', $row2['id'], 'ID-specialSelect-attr-'.$row2['id'].'', 'NAME-edit-cart-product-attr-value-'.$row2['id'].'', ''.$value.'', 0); ?>
																				
																				<?php if ($row2['attr_type2_id'] == 3) special_check('ID-specialCheck-'.$row2['id'].'', 'NAME-edit-cart-product-attr-value-'.$row2['id'].'', 'list', 'attr_type_list', 'attr_id', $row2['id'], $value, 0); ?>
																				
																				<?php if ($row2['attr_type2_id'] == 4){?>																										
																					<?php special_text('ID-specialText-'.$row2['id'].'', 'NAME-edit-cart-product-attr-value-'.$row2['id'].'', $row2['id'], $value, 0); ?>
																				<?php } ?>																								
																				<?php if ($row2['attr_type2_id'] == 0){ ?>
																					<input readonly id="ID-edit-cart-product-attr-value-<?php echo $row2['id']; ?>" type="text" name="NAME-edit-cart-product-attr-value-<?php echo $row2['id']; ?>" value="<?php echo $value; ?>">
																	
																					<!-- Показываем е.и. -->
																						<select disabled style="width: 100px;" id="ID-edit-cart-product-attr-type-<?php echo $row2['id']; ?>" name="NAME-edit-cart-product-attr-type-<?php echo $row2['id']; ?>">
																							<?php
																								$datchik2 = 0;
																								$res3 = mysql_query("select * FROM `new_attr_type` ");
																								while ($row3 = mysql_fetch_assoc($res3)){																													
																									?>
																										<option <?php if ($row2['attr_type_id'] == $row3['id']) { ?>selected="selected"<?php } ?> value="<?php echo $row3['id']; ?>"><?php echo $row3['attr_type_name']; ?></option>
																									<?php
																								}																													
																								if (($row2['attr_type_id'] == '') or ($row2['attr_type_id'] == 0)){
																									?>
																										<option selected="selected" value="0">Вы не поставили е.и. !</option>
																									<?php
																								}																													
																							?>
																						</select>
																						<?php if (($row2['attr_type_id'] == '') or ($row2['attr_type_id'] == 0)){ ?>
																							<style>
																								#product-attr-edit-<?php echo $row2['id']; ?>{
																									background: #ffc5f8 !important;
																								}																										
																							</style>
																						<?php } ?>																		
																					<!-- end Показываем е.и. -->
																								
																				<?php } ?>
																				
																				<?php red($value, $row2['important'], "product-attr-edit-".$attr_id_arr[$i].""); ?>		
																				
																		<?php } ?>
																	</td>
																	
															</tr>		
														<?php	
													}			
												// end Вывод динамических атрибутов											
										}
								}	
							?>
						</tr>																
					<?php
			}
		?>	


	</tbody>
</table>
<div class="edit_cart_product_miniform0"></div>