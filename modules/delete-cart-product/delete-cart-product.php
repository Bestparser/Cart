<?php require_once('../../library/functions.php'); ?>

<?php	
	$arr_id = getToArray($_GET['product_id'], $arr2);
	$DELETE = "`id` = '".$arr_id[1]."'";
	$DELETE2 = "`product_id` = '".$arr_id[1]."'";
	$i = 1;
	while ($i < count($arr_id)){
		$i++;
		$DELETE = $DELETE . " or `id` = '".$arr_id[$i]."'";
		$DELETE2 = $DELETE2 . " or `product_id` = '".$arr_id[$i]."'";
	}

	$i = 0;
	while ($i < count($arr_id)){
		$i++;
		$res = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$arr_id[$i]."' ");
		while ($row = mysql_fetch_assoc($res)){
			$road_brand = builderImgDirectory_brand($arr_id[$i]);
			$road_squ = builderImgDirectory_squ($arr_id[$i]);
			unlink('../../images/' . $road_brand . $road_squ . $row['attr_value']);			
		}		
	}
	
	mysql_query("DELETE FROM `new_product` WHERE ".$DELETE." ");
	mysql_query("DELETE FROM `new_product_attr` WHERE ".$DELETE2." ");
	

?>

<div class="delete-cart_product"></div>