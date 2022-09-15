<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>

<?php
	if ($_GET['action'] == 'add'){
			if ($_POST['NAME-add-volume'] != ''){
				mysql_query("INSERT INTO `new_attr_type` (`id`, `attr_type_name`) VALUES (NULL, '".htmlspecialchars(str_replace('~', ' ', $_POST['NAME-add-volume']), ENT_QUOTES)."');");
			} 
	}
	
	if ($_GET['action'] == 'delete'){
			$arr_id = getToArray($_GET['id_string'], $arr2);
			$DELETE = "`id` = '".$arr_id[1]."'";			
			$WHERE = "`attr_type_id` = '".$arr_id[1]."'";
			$i = 1;
			while ($i < count($arr_id)){
				$i++;
				$DELETE = $DELETE . " or `id` = '".$arr_id[$i]."'";
				$WHERE = $WHERE . " or `id` = '".$arr_id[$i]."'";
			}			
			mysql_query("DELETE FROM `new_attr_type` WHERE ".$DELETE." ");						
			mysql_query("UPDATE `new_attr` SET `attr_type_id` = '' WHERE ".$WHERE." ");						
	}
	
	if ($_GET['action'] == 'edit'){
			if ($_POST['NAME-edit-volume'] != ''){				
				mysql_query("UPDATE `new_attr_type` SET `attr_type_name` = '".htmlspecialchars(str_replace('~', ' ', $_POST['NAME-edit-volume']), ENT_QUOTES)."' WHERE `id` = '".$_GET['id']."' ");												
			}		
	}
	
?>
<div class="volume_processor"></div>