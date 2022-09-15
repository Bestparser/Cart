<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>

<?php
	if (isset($_GET['string'])){		
		$res = mysql_query("select * FROM `new_attr_type_list` WHERE `attr_id` = '".$_GET['id']."' and `".$_GET['text']."` LIKE '".$_GET['string']."%' order by `".$_GET['text']."` ");
		while ($row = mysql_fetch_assoc($res)){
			?>
				<div onclick="specialSelectClick('<?php echo $_GET['formName']; ?>', '<?php echo $_GET['blockId']; ?>', '<?php echo $_GET['sqlTable']; ?>', '<?php echo $_GET['text']; ?>', '<?php echo $_GET['id']; ?>', '<?php echo $_GET['selectBlock']; ?>', <?php echo $row['id']; ?>, '<?php echo $_GET['selectName']; ?>');" class="specialSelect-li" id="ID-specialSelect-li-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span><?php echo $row[$_GET['text']]; ?></span></div>
			<?php
		}		
	} else {
		$res = mysql_query("select * FROM `new_attr_type_list` WHERE `attr_id` = '".$_GET['id']."' order by `".$_GET['text']."` ");
		while ($row = mysql_fetch_assoc($res)){
			?>
				<div onclick="specialSelectClick('<?php echo $_GET['formName']; ?>', '<?php echo $_GET['blockId']; ?>', '<?php echo $_GET['sqlTable']; ?>', '<?php echo $_GET['text']; ?>', '<?php echo $_GET['id']; ?>', '<?php echo $_GET['selectBlock']; ?>', <?php echo $row['id']; ?>, '<?php echo $_GET['selectName']; ?>');" class="specialSelect-li" id="ID-specialSelect-li-<?php echo $row['id']; ?>" data-id="<?php echo $row['id']; ?>"><span><?php echo $row[$_GET['text']]; ?></span></div>
			<?php
		}
	}
?>																

<style>
	#ID-specialSelect-attr-<?php echo $_GET['id']; ?> .specialSelect-list{
		border: 1px solid #c3c3c3;
	}
</style>
<div class="special_select"></div>