<?php
	require_once('conf.php');			
	session_start();
	if (isset($_GET['logout'])) $_SESSION['login'] = 0;
	if ($_SESSION['login'] > 0){		
	$user_id = $_SESSION['user_id'];
	
	function userType($user_id){
		$access_id = '';
		$res = mysql_query("select * FROM `new_user` WHERE `id` = '".$user_id."' ");
		while ($row = mysql_fetch_assoc($res)){			
			$access_id = $row['access_id'];
		}
		return $access_id;
	}
	
	function PZC($user_type_id, $operation_id){
		$right_id = '';
		$res = mysql_query("select * FROM `new_operation_access` WHERE `user_type_id` = '".$user_type_id."' and `operation_id` = '".$operation_id."' ");
		while ($row = mysql_fetch_assoc($res)){			
			$right_id = $row['right_id'];
		}
		return $right_id;		
	}
	
?>






<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Cards</title>		
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src=""></script>  
	<link href="" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>	
	<script type="text/javascript" src="js/jquery.nicescroll.js"></script>	
	
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="stylesheet" href="css/style.css" />
	
	<script type="text/javascript" src="js/photor.js"></script>
	<link rel="stylesheet" href="css/photor.min.css">	
</head>

<body>	
	

	<div class="parent">
		
		<div class="header"> 
			<div class="headerParent">
				<div class="blockLeft blockLoadNewXML"> 
					<?php if ($user_id == 18){ ?>
						<img class="matasovaCat" src="img/cat.jpg"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php } ?>					
					<span>						
						<?php
							$name_user = '';
							$access_id = '';
							$res = mysql_query("select * FROM `new_user` WHERE `id` = '".$_SESSION['user_id']."' ");
							while ($row = mysql_fetch_assoc($res)){
								$name_user = $row['user_name'];
								$access_id = $row['access_id'];
							}
						?>
						<?php echo $name_user; ?>&nbsp;&nbsp;&nbsp;
					</span>					
					<span>						
						<?php
							$access_id_name = '';
							$res = mysql_query("select * FROM `new_user_type` WHERE `id` = '".$access_id."' ");
							while ($row = mysql_fetch_assoc($res)){
								$access_id_name = $row['user_type'];
							}
						?>
						<?php echo $access_id_name; ?>&nbsp;&nbsp;&nbsp;						
					</span>
				</div>
				
				<div class="blockCenter"> 				
					
				</div>
				<div class="blockRight">
					<a class="checkout" href="<?php echo $domain; ?>?logout=yes">Выход</a>	
				</div>					
			</div>		
		</div>
		
		
		<div class="body">
		
			<!-- left colum (здесь иерархия) -->
			<div id="sidebar_id" class="sidebar"><?php require_once('library/hierarchy/hierarchy.php'); ?></div>
		
		
		
		
			<!-- central colum (для товаров) -->
			<div class="desctop">
				
				
				<!-- export excel -->
				<form action="xlsexport/xls.php" method="POST">
					<div style="display: none;" id="xls_data_block"></div>
					<input type="hidden" name="data" id="xls_data" value="">
					<input type="hidden" name="report_name" value="Проект">

					<select id="thooseTypeXLS">
						<option value="url">url</option>
						<option value="img">img</option>
					</select>
					
					<input class="buttonXLS" type="button" value="Excel" onclick="xls();">
					<input type="submit" style="display: none;" value="Excel" class="r_report_button--excel">
				</form>
				<!-- end export excel -->
				
				
				<form enctype="multipart/form-data" method="post" id="ajaxForm"></form>
				<div class="block100 instrumental">					
					<ul>
						<?php if (PZC(userType($user_id), 2) != 2){ ?><li><span class="spanPoint" onclick="openPopup('attr', 0, 0);">Управление атрибутами</span></li><?php } ?>
						<?php if (PZC(userType($user_id), 1) != 2){ ?><li><span class="spanPoint" onclick="openPopup('volume', 0, 0);">Единицы измерения</span></li><?php } ?>
						<li><span class="spanPoint" onclick="openPopup('filtr', 0, 0);">Настройка таблицы</span></li>
						<li><span class="spanPoint" onclick="openPopup('cartProduct', '0', '0');">Массовое редактирование</span></li>
						<?php if (PZC(userType($user_id), 3) != 2){ ?><li><span class="spanPoint" onclick="deleteProduct();">Удалить товар</span></li><?php } ?>
					</ul>					
				</div>	
				<div style="display: none;" id="channel"></div>
				<div id="block_filtr_teg" class="block_filtr_teg"></div>
				<div class="superTableParent">
					<div id="superTable1"></div> <!-- Вот именно здесь идут сами товары -->
				</div>	
			</div>
			<!-- end central colum (для товаров) -->
		


		
		</div>
		
		
		
		
	</div>
	<div id="blockPopup"></div> <!-- Все всплывашки идут через этот блок -->
	<div id="blockPopup2"></div> <!-- img popup -->
	
	
	<div id="index" class="loader" style="display: none;"><img src="img/loader.gif" /></div>
	
	
</body>
</html>






<?php } else { ?>			
	<?php $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
	<script type="text/javascript">							
		window.location = "<?php echo $domain; ?>/login/login.php?url=<?php echo $url; ?>";
	</script>	
<?php } ?>
