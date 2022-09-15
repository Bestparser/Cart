<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>

<?php
	if ($_GET['action'] == 'saveFiltrShow'){ // Первый таб - список атрибутов, которые должны показываться в xls
		$stringId = getToArray($_GET['stringId'], $arr2);		
		
		
		$res = mysql_query("select * FROM `new_attr_showme` WHERE `user_id` = '".$user_id."' ");
		while ($row = mysql_fetch_assoc($res)){
			$OBJECT = '';
			$object_hierarchy = getToArray($row['hierarchy_id'], $arr);
			$i = 0;
			while ($i < count($object_hierarchy)){
				$i++;
				if (code_to_id($_GET['category_id']) == getToArray2($object_hierarchy[$i])){
					$OBJECT = $OBJECT . getToArray2($object_hierarchy[$i]) . '-0~';
				} else {
					$OBJECT = $OBJECT . getToArray2($object_hierarchy[$i]) . '-'.getToArray3($object_hierarchy[$i]).'~';
				}
			}
			mysql_query("UPDATE `new_attr_showme` SET `hierarchy_id` = '".$OBJECT."' WHERE `id` = '".$row['id']."' ");		
		}
		
		$WHERE = '';
		$i = 0;
		while ($i < count($stringId)){
			$i++;
			//$_SESSION['desctop_colum-' . $i] = $stringId[$i];			
			if ($i == count($stringId)){
				$WHERE = $WHERE . "(`attr_id` = '".$stringId[$i]."' and `user_id` = '".$user_id."')";	
			} else {
				$WHERE = $WHERE . "(`attr_id` = '".$stringId[$i]."' and `user_id` = '".$user_id."') or ";
			}
		}
		$res = mysql_query("select * FROM `new_attr_showme` WHERE ".$WHERE." ");
		while ($row = mysql_fetch_assoc($res)){
			$OBJECT = '';
			$object_hierarchy = getToArray($row['hierarchy_id'], $arr);
			$i = 0;
			while ($i < count($object_hierarchy)){
				$i++;
				if (code_to_id($_GET['category_id']) == getToArray2($object_hierarchy[$i])){
					$OBJECT = $OBJECT . getToArray2($object_hierarchy[$i]) . '-1~';
				} else {
					$OBJECT = $OBJECT . getToArray2($object_hierarchy[$i]) . '-'.getToArray3($object_hierarchy[$i]).'~';
				}
			}
			mysql_query("UPDATE `new_attr_showme` SET `hierarchy_id` = '".$OBJECT."' WHERE `id` = '".$row['id']."' ");		
		}				
	}
	
	
	
	
	
	if ($_GET['action'] == 'saveFiltrSort'){ // Второй таб - сортировка атрибутов для отображения в xls
		$stringId = getToArray($_GET['stringId'], $arr2);			
		/*
		$res = mysql_query("select * FROM `new_attr_showme` WHERE `user_id` = '".$user_id."' ");	
		while ($row = mysql_fetch_assoc($res)){
			$OBJECT = '';
			$object_hierarchy = getToArray($row['hierarchy_id_sort'], $arr);
			$i = 0;
			while ($i < count($object_hierarchy)){
				$i++;
				if (code_to_id($_GET['category_id']) == getToArray2($object_hierarchy[$i])){
					$OBJECT = $OBJECT . getToArray2($object_hierarchy[$i]) . '-1~';
				} else {
					$OBJECT = $OBJECT . getToArray2($object_hierarchy[$i]) . '-'.getToArray3($object_hierarchy[$i]).'~';
				}
			}
			mysql_query("UPDATE `new_attr_showme` SET `hierarchy_id_sort` = '".$OBJECT."' WHERE `id` = '".$row['id']."' ");		
		}
		*/
		
		$STRING = '';		
		$i = 0;
		while ($i < count($stringId)){
			$i++;			
			//mysql_query("UPDATE `new_attr_showme` SET `sort` = '".$i."' WHERE `attr_id` = '".$stringId[$i]."' and `user_id` = '".$user_id."' ");				
				
			$res = mysql_query("select * FROM `new_attr_showme` WHERE `attr_id` = '".$stringId[$i]."' and `user_id` = '".$user_id."' ");
			while ($row = mysql_fetch_assoc($res)){
				$OBJECT = '';
				$object_hierarchy = getToArray($row['hierarchy_id_sort'], $arr);
				$j = 0;
				while ($j < count($object_hierarchy)){
					$j++;
					if (code_to_id($_GET['category_id']) == getToArray2($object_hierarchy[$j])){
						$OBJECT = $OBJECT . getToArray2($object_hierarchy[$j]) . '-'.$i.'~';
					} else {
						$OBJECT = $OBJECT . getToArray2($object_hierarchy[$j]) . '-'.getToArray3($object_hierarchy[$j]).'~';
					}
				}
				mysql_query("UPDATE `new_attr_showme` SET `hierarchy_id_sort` = '".$OBJECT."' WHERE `id` = '".$row['id']."' ");		
			}
			
		}		
	}
?>
<div class="filtr_processor"></div>