<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>



	<?php // ФИЛЬТР
		$id_attr_filtr = getToArray($_GET['id_attr_filtr'], $arr);
		$value_filtr = getToArray($_GET['value_filtr'], $arr);
		
		$s_d2 = 0;
		$i = 0;
		$WHERE_ID = '';				
		$WHERE_ID2 = '';				
		
		$filtr_teg1 = 0;
		$filtr_teg2 = 0;		
		$filtr_teg4 = 0;
		
		$res = mysql_query("select * FROM `new_attr` ");
		while ($row = mysql_fetch_assoc($res)){

					// Работаем по фильтру
						if ($_GET['row'] != '') $_SESSION['filtr-word-' . $_GET['row'] . '-1'] = '';
						$j = 0;
						while ($j < count($id_attr_filtr)){
							$j++;
							if ($id_attr_filtr[$j] == $row['id']){
								$_SESSION['filtr-word-' . $row['id'] . '-1'] = $value_filtr[$j];													
							}
						}
					
					if ($row['id'] == '-2'){
								// Вытаскиваем фильтр-теги // Имя продукта
									$s_d = 0;
									if ($_SESSION['filtr-word-' . $row['id'] . '-1'] != ''){
										$s_d2++;
										$filtr_teg1++;
										$_SESSION['filtr-word-' . $row['id'] . '-1'];
										?>
											<div class="filtr_teg" id="filtr_teg-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">
												<span>Имя продукта: <?php echo $_SESSION['filtr-word-' . $row['id'] . '-1']; ?></span>
												<i onclick="closeFiltrTeg('<?php echo $row['id']; ?>', '1');"> x </i>
											</div>		
										<?php
									}


					} elseif($row['id'] == '-1'){						
							// Вытаскиваем фильтр-теги // Артикул
										if ($_SESSION['filtr-word-' . $row['id'] . '-1'] != ''){
											$s_d2++;
											$filtr_teg2++;
											$_SESSION['filtr-word-' . $row['id'] . '-1'];											
											?>
												<div class="filtr_teg" id="filtr_teg-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">
													<span>Артикул: <?php echo $_SESSION['filtr-word-' . $row['id'] . '-1']; ?></span>
													<i onclick="closeFiltrTeg('<?php echo $row['id']; ?>', '1');"> x </i>
												</div>		
											<?php
										}
					} else {								
						// Вытаскиваем фильтр-теги // Динамические
										if ($_SESSION['filtr-word-' . $row['id'] . '-1'] != ''){
											$s_d2++;	
											$filtr_teg4++;
											$_SESSION['filtr-word-' . $row['id'] . '-1'];																						
											?>
												<div class="filtr_teg" id="filtr_teg-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>">
													<span><?php echo $row['attr_name']; ?>: <?php echo $_SESSION['filtr-word-' . $row['id'] . '-1']; ?></span>
													<i onclick="closeFiltrTeg('<?php echo $row['id']; ?>', '1');"> x </i>
												</div>
											<?php
										}
					}
		}
		
		
		$_SESSION['s_d2'] = $s_d2;
		$_SESSION['filtr_teg1'] = $filtr_teg1;
		$_SESSION['filtr_teg2'] = $filtr_teg2;		
		$_SESSION['filtr_teg4'] = $filtr_teg4;

		
		

	?>
<div class="top_filtr"></div>