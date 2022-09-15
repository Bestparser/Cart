<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>

<?php
	if ($_GET['action'] == 'add'){
			if ($_POST['NAME-add-attr'] != ''){				
				mysql_query("INSERT INTO `new_attr` (`id`, `attr_name`, `attr_type_id`, `important`, `attr_type2_id`, `description`, `sap`) VALUES (NULL, '".htmlspecialchars(str_replace('~', ' ', $_POST['NAME-add-attr']), ENT_QUOTES)."', '".$_POST['NAME-mainSelectAttrType']."', '".$_POST['NAME-add-important-attr']."', '".$_POST['NAME-mainSelectAttrType2']."', '".$_POST['NAME-description-attr']."', '');");

				$maxId = 0;
				$i = 0;
				$res = mysql_query("select * FROM `new_attr` order by `id` DESC ");
				while ($row = mysql_fetch_assoc($res)){
					$i++;
					if ($i == 1) $maxId = $row['id'];
				}
				
				if ($_POST['NAME-special-secret-input'] != ''){
					$attr2 = getToArray($_POST['NAME-special-secret-input'], $arr);
					$i = 0;
					while ($i < count($attr2)){
						$i++;					
						mysql_query("INSERT INTO `new_attr_type_list` (`id`, `list`, `attr_id`) VALUES (NULL, '".htmlspecialchars(str_replace('~', ' ', $attr2[$i]), ENT_QUOTES)."', '".$maxId."');");
					}				
				}
				
				$res2 = mysql_query("select * FROM `new_user` ");
				while ($row2 = mysql_fetch_assoc($res2)){
					mysql_query("INSERT INTO `new_attr_showme` (`id`, `user_id`, `attr_id`, `hierarchy_id`, `hierarchy_id_sort`) VALUES (NULL, '".$row2['id']."', '".$maxId."', '~', '~');");
				}
				
			} 			
	}
	
	if ($_GET['action'] == 'delete'){
			$arr_id = getToArray($_GET['id_string'], $arr2);
			$DELETE = "`id` = '".$arr_id[1]."'";
			$DELETE2 = "`attr_id` = '".$arr_id[1]."'";
			$i = 1;
			while ($i < count($arr_id)){
				$i++;
				$DELETE = $DELETE . " or `id` = '".$arr_id[$i]."'";
				$DELETE2 = $DELETE2 . " or `attr_id` = '".$arr_id[$i]."'";
			}			
			mysql_query("DELETE FROM `new_attr` WHERE ".$DELETE." ");			
			mysql_query("DELETE FROM `new_attr_type_list` WHERE ".$DELETE2." ");
			mysql_query("DELETE FROM `new_attr_hierarchy` WHERE ".$DELETE2." ");
			mysql_query("DELETE FROM `new_attr_showme` WHERE ".$DELETE2." ");
	}
	
	if ($_GET['action'] == 'edit'){
			mysql_query("DELETE FROM `new_attr_type_list` WHERE `attr_id` = '".$_GET['id']."' ");
			if ($_POST['NAME-edit-attr'] != ''){				
				mysql_query("UPDATE `new_attr` SET `attr_name` = '".htmlspecialchars(str_replace('~', ' ', $_POST['NAME-edit-attr']), ENT_QUOTES)."', `attr_type_id` = '".$_POST['NAME-mainSelectAttrType']."', `important` = '".$_POST['NAME-important-attr']."', `attr_type2_id` = '".$_POST['NAME-mainSelectAttrType2']."', `description` = '".$_POST['NAME-description-attr']."' WHERE `id` = '".$_GET['id']."' ");
				
				$attr2 = getToArray($_POST['NAME-special-secret-input'], $arr);
				$i = 0;
				while ($i < count($attr2)){
					$i++;
					mysql_query("INSERT INTO `new_attr_type_list` (`id`, `list`, `attr_id`) VALUES (NULL, '".htmlspecialchars(str_replace('~', ' ', $attr2[$i]), ENT_QUOTES)."', '".$_GET['id']."');");
				}					
			}		
	}
	
	if ($_GET['action'] == 'attr-category'){		
		$WHERE_ID = '';
		$id_string_attr = getToArray($_GET['id_string_attr'], $arr);
		$i = 0;
		while ($i < count($id_string_attr)){
			$i++;			
			$WHERE_ID = $WHERE_ID . "`attr_id` = '".$id_string_attr[$i]."' or ";
		}
		$WHERE_ID = $WHERE_ID . "`attr_id` = '-100' ";
		mysql_query("DELETE FROM `new_attr_hierarchy` WHERE ".$WHERE_ID." ");			



		
		$id_string_hierarchy = getToArray($_GET['id_string_hierarchy'], $arr);
		$j = 0;
		while ($j < count($id_string_attr)){
			$j++;
			
			
			$i = 0; // attr_id
			while ($i < count($id_string_hierarchy)){
				$i++;

				// Не правильно: надо заменить в выводе категорий - поставить id	
				$id = '';
				$res = mysql_query("select * FROM `new_hierarchy` WHERE `code` = '".$id_string_hierarchy[$i]."' ");
				while ($row = mysql_fetch_assoc($res)){
					$id = $row['id'];
				}
				
				if ($id != ''){
					$d = 0;
					$res = mysql_query("select * FROM `new_attr_hierarchy` WHERE `attr_id` = '".$id_string_attr[$j]."' and `hierarchy_id` = '".$id."' ");
					while ($row = mysql_fetch_assoc($res)){
						$d++;
					}
					if ($d == 0) mysql_query("INSERT INTO `new_attr_hierarchy` (`id`, `attr_id`, `hierarchy_id`) VALUES (NULL, '".$id_string_attr[$j]."', '".$id."');");
				}
			}
			
		}
		
		
		$res2 = mysql_query("select * FROM `new_attr_showme` WHERE `user_id` = '".$user_id."' ");
		while ($row2 = mysql_fetch_assoc($res2)){	
			$OBJECT = '';
			$OBJECT_sort = '';
			$object_hierarchy = getToArray($row2['hierarchy_id'], $arr);				
			$object_hierarchy_sort = getToArray($row2['hierarchy_id_sort'], $arr);				
			$res3 = mysql_query("select * FROM `new_attr_hierarchy` WHERE `attr_id` = '".$row2['attr_id']."' ");
			while ($row3 = mysql_fetch_assoc($res3)){	
				$object2 = '0';	
				$object2_sort = '0';	
				$i = 0;
				while ($i < count($object_hierarchy)){
					$i++;
					if (getToArray2($object_hierarchy[$i]) == $row3['hierarchy_id']) $object2 = getToArray3($object_hierarchy[$i]);
					if (getToArray2($object_hierarchy[$i]) == $row3['hierarchy_id']) $object2_sort = getToArray3($object_hierarchy_sort[$i]);
				}
			
				$OBJECT = $OBJECT . $row3['hierarchy_id'] . '-'.$object2.'~';
				$OBJECT_sort = $OBJECT_sort . $row3['hierarchy_id_sort'] . '-'.$object2.'~';
			}
			
			mysql_query("UPDATE `new_attr_showme` SET `hierarchy_id` = '".$OBJECT."' WHERE `attr_id` = '".$row2['attr_id']."' ");
			mysql_query("UPDATE `new_attr_showme` SET `hierarchy_id_sort` = '".$OBJECT_sort."' WHERE `attr_id` = '".$row2['attr_id']."' ");
		}		
	}	
		
			

?>
<div class="attr_processor"></div>