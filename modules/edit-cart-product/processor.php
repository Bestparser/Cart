<?php require_once('../../library/functions.php'); ?>
<?php error_reporting(0); ?>
<?php $road_brand = builderImgDirectory_brand($_GET['product_id']); ?>
<?php $road_squ = builderImgDirectory_squ($_GET['product_id']); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>


<?php
	if (isset($_GET['delete'])){
				$dir = 'files-546-'.$_GET['product_id'].'/';
				if (is_dir($dir)) {
					$arr_scan = scandir($dir);
					$i = 1;							
					while ($i < count($arr_scan)-1){
						$i++;
						unlink($dir . $arr_scan[$i]);
					}
					rmdir($dir);								
				}
		
				$dir = 'files-550-'.$_GET['product_id'].'/';
				if (is_dir($dir)) {
					$arr_scan = scandir($dir);
					$i = 1;							
					while ($i < count($arr_scan)-1){
						$i++;
						unlink($dir . $arr_scan[$i]);
					}
					rmdir($dir);								
				}
				$dir = 'files-573-'.$_GET['product_id'].'/';
				if (is_dir($dir)) {
					$arr_scan = scandir($dir);
					$i = 1;							
					while ($i < count($arr_scan)-1){
						$i++;
						unlink($dir . $arr_scan[$i]);
					}
					rmdir($dir);								
				}
	} else {	
			// attr без сапа	
			if ($_GET['product_id'] != 0){		
				$res = mysql_query("select * FROM `new_attr` WHERE `sap` != '1' and `id` != '550' and `id` != '573' and `id` != '546' ");
				while ($row = mysql_fetch_assoc($res)){
					if (isset($_POST['NAME-edit-cart-product-attr-value-'.$row['id'].''])){
						$datchik = 0;
						$res2 = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '".$row['id']."' ");
						while ($row2 = mysql_fetch_assoc($res2)){
							$datchik++;
						}
						if ($datchik > 0){
							if ($row['id'] != 551){
								$annotation = htmlspecialchars(str_replace('~', ' ', $_POST['NAME-edit-cart-product-attr-value-'.$row['id'].'']), ENT_QUOTES);
								mysql_query("UPDATE `new_product_attr` SET `attr_value` = '".$annotation."' WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '".$row['id']."' ");	
							}
							if ($row['id'] == 551){ // Аннотация
								$annotation = str_replace('~', ' ', $_POST['NAME-edit-cart-product-attr-value-'.$row['id'].'']);
								mysql_query("UPDATE `new_product_attr` SET `attr_value` = '".$annotation."' WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '".$row['id']."' ");	
							}
						} else {
							if ($row['id'] != 551){
								$annotation = htmlspecialchars(str_replace('~', ' ', $_POST['NAME-edit-cart-product-attr-value-'.$row['id'].'']), ENT_QUOTES);
								mysql_query("INSERT INTO `new_product_attr` (`id`, `product_id`, `attr_id`, `attr_value`) VALUES (NULL, '".$_GET['product_id']."', '".$row['id']."', '".$annotation."');");
							}
							if ($row['id'] == 551){ // Аннотация
								$annotation = str_replace('~', ' ', $_POST['NAME-edit-cart-product-attr-value-'.$row['id'].'']);
								mysql_query("INSERT INTO `new_product_attr` (`id`, `product_id`, `attr_id`, `attr_value`) VALUES (NULL, '".$_GET['product_id']."', '".$row['id']."', '".$annotation."');");
							}
						}
					}
				}
			} else {				
					
				$arr_special = getToArray($_GET['product_id2'], $arr);
				$arr_special_d = 0;
				while ($arr_special_d < count($arr_special)){
					$arr_special_d++;
					
					
								$res = mysql_query("select * FROM `new_attr` WHERE `sap` != '1' and `id` != '550' and `id` != '573' and `id` != '546' ");
								while ($row = mysql_fetch_assoc($res)){
									if ((isset($_POST['NAME-edit-cart-product-attr-value-'.$row['id'].''])) and ($_POST['NAME-edit-cart-product-attr-value-'.$row['id'].''] != '')){
										$datchik = 0;
										$res2 = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$arr_special[$arr_special_d]."' and `attr_id` = '".$row['id']."' ");
										while ($row2 = mysql_fetch_assoc($res2)){
											$datchik++;
										}
										if ($datchik > 0){
											if ($row['id'] != 551){
												$annotation = htmlspecialchars(str_replace('~', ' ', $_POST['NAME-edit-cart-product-attr-value-'.$row['id'].'']), ENT_QUOTES);
												mysql_query("UPDATE `new_product_attr` SET `attr_value` = '".$annotation."' WHERE `product_id` = '".$arr_special[$arr_special_d]."' and `attr_id` = '".$row['id']."' ");	
											}
											if ($row['id'] == 551){ // Аннотация
												$annotation = str_replace('~', ' ', $_POST['NAME-edit-cart-product-attr-value-'.$row['id'].'']);												
												if ($annotation != '<p><br data-mce-bogus="1"></p>') mysql_query("UPDATE `new_product_attr` SET `attr_value` = '".$annotation."' WHERE `product_id` = '".$arr_special[$arr_special_d]."' and `attr_id` = '".$row['id']."' ");	
											}
										} else {
											if ($row['id'] != 551){
												$annotation = htmlspecialchars(str_replace('~', ' ', $_POST['NAME-edit-cart-product-attr-value-'.$row['id'].'']), ENT_QUOTES);
												mysql_query("INSERT INTO `new_product_attr` (`id`, `product_id`, `attr_id`, `attr_value`) VALUES (NULL, '".$arr_special[$arr_special_d]."', '".$row['id']."', '".$annotation."');");
											}
											if ($row['id'] == 551){ // Аннотация
												$annotation = str_replace('~', ' ', $_POST['NAME-edit-cart-product-attr-value-'.$row['id'].'']);
												mysql_query("INSERT INTO `new_product_attr` (`id`, `product_id`, `attr_id`, `attr_value`) VALUES (NULL, '".$arr_special[$arr_special_d]."', '".$row['id']."', '".$annotation."');");
											}
										}
									}
								}
					
				}				
			}
				
				

			// Работаем по картинкам
			if ($_GET['product_id'] != 0){
				// Основная картинка
					$dir = 'files-546-'.$_GET['product_id'].'/';
					$string_img = getToArray($_GET['string_img'], $arr);		
					if (is_dir($dir)){
						$i = 0;
						while ($i < count($string_img)){
							$i++;									
							copy($dir . $string_img[$i], '../../images/' . $road_brand . $road_squ . $string_img[$i]);
						}
					}
					$i = 0;
					while ($i < count($string_img)){
						$i++;
						$datchik = 0;
						$res2 = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '546' ");
						while ($row2 = mysql_fetch_assoc($res2)){
							$datchik++;
						}
						if ($datchik > 0){
							mysql_query("UPDATE `new_product_attr` SET `attr_value` = '".$string_img[$i]."' WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '546' ");	
						} else {
							mysql_query("INSERT INTO `new_product_attr` (`id`, `product_id`, `attr_id`, `attr_value`) VALUES (NULL, '".$_GET['product_id']."', '546', '".$string_img[$i]."');");
						}
					}
					
					
				// Дополнительные картинки
					$string_img2 = getToArray($_GET['string_img2'], $arr);		
					$dir = 'files-550-'.$_GET['product_id'].'/';
					if (is_dir($dir)){
						$i = 0;
						while ($i < count($string_img2)){
							$i++;						
							copy($dir . $string_img2[$i], '../../images/' . $road_brand . $road_squ . $string_img2[$i]);						
						}					
					}					
					mysql_query("DELETE FROM `new_product_attr` WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '550' ");
					$i = 0;
					while ($i < count($string_img2)){
						$i++;
						mysql_query("INSERT INTO `new_product_attr` (`id`, `product_id`, `attr_id`, `attr_value`) VALUES (NULL, '".$_GET['product_id']."', '550', '".$string_img2[$i]."');");
					}					
					
				// Картинки в упаковке
					$string_img3 = getToArray($_GET['string_img3'], $arr);		
					$dir = 'files-573-'.$_GET['product_id'].'/';
					if (is_dir($dir)){
						$i = 0;
						while ($i < count($string_img3)){
							$i++;						
							copy($dir . $string_img3[$i], '../../images/' . $road_brand . $road_squ . $string_img3[$i]);						
						}					
					}					
					mysql_query("DELETE FROM `new_product_attr` WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '573' ");
					$i = 0;
					while ($i < count($string_img3)){
						$i++;
						mysql_query("INSERT INTO `new_product_attr` (`id`, `product_id`, `attr_id`, `attr_value`) VALUES (NULL, '".$_GET['product_id']."', '573', '".$string_img3[$i]."');");
					}					
					
					
				// Грохнуть ОЗУ папку с картинками этого товара
					$dir = 'files-546-'.$_GET['product_id'].'';
					if (is_dir($dir)) {
						$arr_scan = scandir($dir);
						$i = 1;							
						while ($i < count($arr_scan)-1){
							$i++;
							unlink($dir.'/' . $arr_scan[$i]);
						}
						rmdir($dir);								
					}

					$dir = 'files-550-'.$_GET['product_id'].'';
					if (is_dir($dir)) {
						$arr_scan = scandir('files-550-'.$_GET['product_id'].'');
						$i = 1;							
						while ($i < count($arr_scan)-1){
							$i++;
							unlink($dir.'/' . $arr_scan[$i]);
						}
						rmdir($dir);			
					}				
				
					$dir = 'files-573-'.$_GET['product_id'].'';
					if (is_dir($dir)) {
						$arr_scan = scandir('files-573-'.$_GET['product_id'].'');
						$i = 1;							
						while ($i < count($arr_scan)-1){
							$i++;
							unlink($dir.'/' . $arr_scan[$i]);
						}
						rmdir($dir);			
					}				
			}	
			// end Работаем по картинкам		

			
	}
?>
<div class="edit_cart_product_processor"></div>