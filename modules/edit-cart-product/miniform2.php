<?php require_once('../../library/functions.php'); ?>
<?php $road_brand = builderImgDirectory_brand($_GET['product_id']); ?>
<?php $road_squ = builderImgDirectory_squ($_GET['product_id']); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>

<html>
<head>
<meta charset="UTF-8">
<style>
	td{
		position: relative;
	}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src=""></script>  
<link href="" rel="stylesheet">

<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery-ui.min.js"></script>	

<script type="text/javascript" src="../../js/script.js"></script>
<link rel="stylesheet" href="../../css/style.css" />

<?php if ($_GET['iframe_id'] == '546'){ ?>
	<script type="text/javascript">
		$(document).ready(function(){			
			$i = 0;
			$('input[type="checkbox"]').each(function( index ) {
				$i++;
				//if ($i > 0) $('.plusImg').css('display', 'none');
			});	
			if ($i == 0) $('#deleteImg-id').css('display', 'none');
		});
	</script>	
<?php } ?>
</head>
<body style="margin: 0;">

<form enctype="multipart/form-data" method="post" id='form-media'>		
	<?php if (PZC(userType($user_id), 4) != 3){ ?>    
		<div class="miniform miniform3" id="addAttrManagerForm3">
			<table class="imgInstrumantal<?php if ($_GET['iframe_id'] == '546'){ ?> i546<?php } ?>">
				<tr>
					<td>
						<input style="display: none;" type="file" id="ID-attrType2" name="fileimg" />						
						<input id="clickPlusImg" onclick="valid();" <?php if ($_GET['iframe_id'] == '546'){ ?>class="plusImg"<?php } ?> style="position: relative; top: 10px; display: none;" type="submit" value=" " />
						<input id="deleteImg-id" type="submit" name="delete" value=" " />
						<?php if ($_GET['iframe_id'] == '546'){ ?>
							<h3>Изображение основное</h3>
						<?php } ?>
						<?php if ($_GET['iframe_id'] == '550'){ ?>
							<h3>Изображения дополниетльные</h3>
						<?php } ?>
						<?php if ($_GET['iframe_id'] == '573'){ ?>
							<h3>Изображения в упаковке</h3>
						<?php } ?>
						
					</td>				
				</tr>
			</table>	
		</div>
	<?php } else { ?>
		<style>
			input[type="checkbox"]{
				display: none !important;
			}
		</style>
	<?php } ?>


<?php
	if (isset($_POST['delete'])){			
		$i = 0;
		while ($i < 100000){
			$i++;
			if (isset($_POST['checkAttr2-'.$i.''])){				
				unlink('files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $_POST['checkAttr2-'.$i.'']);
			}
			if (isset($_POST['checkAttr3-'.$i.''])){
				unlink('../../images/' . $road_brand . $road_squ . $_POST['checkAttr3-'.$i.'']);								
				?>
					<script type="text/javascript">
						$(document).ready(function(){														
							$('.check-img-pzu').each(function( index ) {
								if ($(this).val() == "<?php echo $_POST['checkAttr3-'.$i.'']; ?>") $('#checkAttr3-TR-' + $(this).attr('data-id')).remove();
							});	
							$('.check-img-pzu').each(function( index ) {
								if ($(this).val() == "<?php echo $_POST['checkAttr3-'.$i.'']; ?>") $('#checkAttr3-TR-' + $(this).attr('data-id')).remove();
							});	
							<?php if ($_GET['iframe_id'] == '546'){ ?>
								$i = 0;
								$('input[type="checkbox"]').each(function( index ) {
									$i++;									
									//if ($i > 0) $('.plusImg').css('display', 'none');
								});								
								//if ($i == 0) $('.plusImg').css('display', 'block');
							<?php } ?>								
						});
					</script>	
				<?php
			}
		}
	}



	if (isset($_FILES['fileimg']['name'])){		
		if ($_FILES['fileimg']['name'] != ''){
			if(is_dir('../../images/' . $road_brand)){
			} else {
				mkdir('../../images/' . $road_brand, 0777);
			}
			if(is_dir('../../images/' . $road_brand . $road_squ)){
			} else {
				mkdir('../../images/' . $road_brand . $road_squ, 0777);
			}
			
			
			$dir = 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'';
			if(is_dir($dir)){
				$uploaddir = 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/';
				$uploadfile = $uploaddir . basename($_FILES['fileimg']['name']);
				move_uploaded_file($_FILES['fileimg']['tmp_name'], $uploadfile);
				
				
				$squ = '';
				$res = mysql_query("select * FROM `new_product` WHERE `id` = '".$_GET['product_id']."' ");
				while ($row = mysql_fetch_assoc($res)){
					$squ = $row['squ'];					
				}
				$arr_scan_file = scandir('../../images/' . $road_brand . $road_squ);	
				$i = 0;
				$z = 0;
				$main_id = 1;
				$main_id3 = 1;
				while ($i < count($arr_scan_file)){
					$i++;
					
					
					if ($_GET['iframe_id'] != 573){
						$j = 0;
						while ($j < 100){
							$j++;
							if ($arr_scan_file[$i] == $squ . '_' . $j . '.png'){						
								$main_id = $j + 1;
							}						
						}
					} else {
						$j = 0;
						while ($j < 100){
							$j++;
							if ($arr_scan_file[$i] == $squ . '_pac_' . $j . '.png'){						
								$main_id3 = $j + 1;
							}						
						}					
					}
				}
				
				if ($_GET['iframe_id'] == 573){
					rename('files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $_FILES['fileimg']['name'], 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $squ . '_pac_' . $main_id3 . '.png');
				} else {
					rename('files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $_FILES['fileimg']['name'], 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $squ . '_' . $main_id . '.png');
				}				
			} else {
				mkdir($dir . '/', 0777);
				$uploaddir = 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/';
				$uploadfile = $uploaddir . basename($_FILES['fileimg']['name']);
				move_uploaded_file($_FILES['fileimg']['tmp_name'], $uploadfile);
				
				$squ = '';
				$res = mysql_query("select * FROM `new_product` WHERE `id` = '".$_GET['product_id']."' ");
				while ($row = mysql_fetch_assoc($res)){
					$squ = $row['squ'];					
				}
				$arr_scan_file = scandir('../../images/' . $road_brand . $road_squ);	
				$i = 0;
				$z = 0;
				$main_id = 1;
				$main_id3 = 1;
				while ($i < count($arr_scan_file)){
					$i++;
					
					if ($_GET['iframe_id'] != 573){
						$j = 0;	
						while ($j < 100){
							$j++;
							if ($arr_scan_file[$i] == $squ . '_' . $j . '.png'){						
								$main_id = $j + 1;
							}						
						}
					} else {
						$j = 0;	
						while ($j < 100){
							$j++;
							if ($arr_scan_file[$i] == $squ . '_pac_' . $j . '.png'){						
								$main_id3 = $j + 1;
							}						
						}					
					}					
				}				
				
				if ($_GET['iframe_id'] == 573){
					rename('files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $_FILES['fileimg']['name'], 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $squ . '_pac_' . $main_id3 . '.png');
				} elseif ($_GET['iframe_id'] == 546) {
					rename('files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $_FILES['fileimg']['name'], 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $squ . '_1.png');
				} else {
					rename('files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $_FILES['fileimg']['name'], 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'/' . $squ . '_' . $main_id . '.png');
				}
			}
		}	
	}
?>


		<?php if ($_GET['iframe_id'] == '546'){ ?>
						<?php
							$i = 1;
							$dir = 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'';
							if(is_dir($dir)) {
								$arr_scan = scandir($dir);															
								while ($i < count($arr_scan)-1){
									$i++;
									?>											
										<input id="ID-check-imgBasicaly-1" style="display: none;" class="check-img-ozu" value="<?php echo $arr_scan[$i]; ?>" data-id='<?php echo $i; ?>' type='checkbox' checked="checked" name="checkAttr2-<?php echo $i; ?>">
										<img data-id="<?php echo $_GET['product_id']; ?>" onclick="checkSpan('ID-check-imgBasicaly-', 1);" style="max-width: 180px; max-height: 170px;" src="files-<?php echo $_GET['iframe_id']; ?>-<?php echo $_GET['product_id']; ?>/<?php echo $arr_scan[$i]; ?>">
									<?php
								} 
								if ($i == 1){								
									?>												
										<img style="max-width: 180px; max-height: 170px; cursor: pointer;" onclick="addImg('<?php echo $_GET['product_id']; ?>', '<?php echo $_GET['category_id']; ?>');" src="../../img/noimg.png" />
									<?php
								}
							}
							$value = '';
							$res = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '546' ");
							while ($row = mysql_fetch_assoc($res)){
								$value = $row['attr_value'];
							}							
						?>
						<?php if ($value != ''){ ?>
							<?php if (file_exists('../../images/' . $road_brand . $road_squ . $value.'')){ ?>								
								<input id="ID-check-imgBasicaly-1" class="check-img-pzu" value="<?php echo $value; ?>" data-id='1' type='checkbox' checked="checked" style="display: none;" name="checkAttr3-1">
								<img data-id="<?php echo $_GET['product_id']; ?>" onclick="checkSpan('ID-check-imgBasicaly-', 1);" style="max-width: 180px; max-height: 170px;" src="../../images/<?php echo $road_brand; ?><?php echo $road_squ; ?><?php echo $value; ?>">
							<?php } else { ?>													
								<img style="max-width: 180px; max-height: 170px; cursor: pointer;" onclick="addImg('<?php echo $_GET['product_id']; ?>', '<?php echo $_GET['category_id']; ?>');" src="../../img/noimg.png" />
							<?php } ?>
						<?php } else { ?>
							<?php if ($i == 1){ ?>								
								<img style="max-width: 180px; max-height: 170px; cursor: pointer;" onclick="addImg('<?php echo $_GET['product_id']; ?>', '<?php echo $_GET['category_id']; ?>');" src="../../img/noimg.png" />
							<?php } ?>
						<?php } ?>
		<?php } ?>	
		
		
		
		
		<?php if ($_GET['iframe_id'] == '550'){ ?>
			<div id="superTable1" style="text-align:left;">
						<div class="div550" id='checkAttr3-TR'>												
								<img style="width: 100px; cursor: pointer;" onclick="addImg('<?php echo $_GET['product_id']; ?>', '<?php echo $_GET['category_id']; ?>');" src="../../img/noimg.png" />
						</div>			
						<?php
							$special_i = 0;
							$dir = 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'';
							if (is_dir($dir)) {
								$arr_scan = scandir('files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'');
								$i = 1;							
								while ($i < count($arr_scan)-1){
									$i++;
									$special_i++;
									?>
										<div class="div550" id='checkAttr3-TR-<?php echo $i; ?>'>													
												<input style="display: none;" id="ID-check-imgAdd-<?php echo $i; ?>" class="check-img-ozu" value="<?php echo $arr_scan[$i]; ?>" data-id='<?php echo $i; ?>' type='checkbox' name="checkAttr2-<?php echo $i; ?>">													
												<img data-id="<?php echo $_GET['product_id']; ?>" id="ID-check-imgAdd-2<?php echo $i; ?>" onclick="checkSpan2('ID-check-imgAdd-', <?php echo $i; ?>);" style="width: 100px; cursor: pointer;" src="files-<?php echo $_GET['iframe_id']; ?>-<?php echo $_GET['product_id']; ?>/<?php echo $arr_scan[$i]; ?>">																										
										</div>											
									<?php									
								}								
							}
						?>
						<?php
							$value = '';
							$i = 0;
							$res = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '".$_GET['iframe_id']."' ");
							while ($row = mysql_fetch_assoc($res)){
								$i++;
								$value = $row['attr_value'];
								if ($value != ''){
									$special_i++;
									?>
										<div class="div550" id='checkAttr3-TR-<?php echo $i; ?>'>
												<input style="display: none;" id="ID-check-imgAdd-<?php echo $i; ?>" class="check-img-pzu" value="<?php echo $value; ?>" data-id='<?php echo $i; ?>' type='checkbox' name="checkAttr3-<?php echo $i; ?>">
												<img data-id="<?php echo $_GET['product_id']; ?>" id="ID-check-imgAdd-2<?php echo $i; ?>" onclick="checkSpan2('ID-check-imgAdd-', <?php echo $i; ?>);" style="width: 100px; cursor: pointer;" src="../../images/<?php echo $road_brand; ?><?php echo $road_squ; ?><?php echo $value; ?>">
										</div>
									<?php
								}
							}
							if ($special_i == 0){
								?>
									<style>
										#deleteImg-id{
											display: none;
										}
									</style>
								<?php
							}
						?>
			</div>
		<?php } ?>	
		
		
		
		
		<?php if ($_GET['iframe_id'] == '573'){ ?>
			<div id="superTable1" style="text-align:left;">
						<div class="div550" id='checkAttr3-TR'>												
								<img style="width: 100px; cursor: pointer;" onclick="addImg('<?php echo $_GET['product_id']; ?>', '<?php echo $_GET['category_id']; ?>');" src="../../img/noimg.png" />
						</div>			
						<?php
							$special_i = 0;
							$dir = 'files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'';
							if (is_dir($dir)) {
								$arr_scan = scandir('files-'.$_GET['iframe_id'].'-'.$_GET['product_id'].'');
								$i = 1;							
								while ($i < count($arr_scan)-1){
									$i++;
									$special_i++;
									?>
										<div class="div550" id='checkAttr3-TR-<?php echo $i; ?>'>													
												<input style="display: none;" id="ID-check-imgAddPac-<?php echo $i; ?>" class="check-img-ozu" value="<?php echo $arr_scan[$i]; ?>" data-id='<?php echo $i; ?>' type='checkbox' name="checkAttr2-<?php echo $i; ?>">													
												<img data-id="<?php echo $_GET['product_id']; ?>" id="ID-check-imgAddPac-3<?php echo $i; ?>" onclick="checkSpan3('ID-check-imgAddPac-', <?php echo $i; ?>);" style="width: 100px; cursor: pointer;" src="files-<?php echo $_GET['iframe_id']; ?>-<?php echo $_GET['product_id']; ?>/<?php echo $arr_scan[$i]; ?>">																										
										</div>											
									<?php									
								}								
							}
						?>
						<?php
							$value = '';
							$i = 0;
							$res = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$_GET['product_id']."' and `attr_id` = '".$_GET['iframe_id']."' ");
							while ($row = mysql_fetch_assoc($res)){
								$i++;
								$value = $row['attr_value'];
								if ($value != ''){
									$special_i++;
									?>
										<div class="div550" id='checkAttr3-TR-<?php echo $i; ?>'>
												<input style="display: none;" id="ID-check-imgAddPac-<?php echo $i; ?>" class="check-img-pzu" value="<?php echo $value; ?>" data-id='<?php echo $i; ?>' type='checkbox' name="checkAttr3-<?php echo $i; ?>">
												<img data-id="<?php echo $_GET['product_id']; ?>" id="ID-check-imgAddPac-3<?php echo $i; ?>" onclick="checkSpan3('ID-check-imgAddPac-', <?php echo $i; ?>);" style="width: 100px; cursor: pointer;" src="../../images/<?php echo $road_brand; ?><?php echo $road_squ; ?><?php echo $value; ?>">
										</div>
									<?php
								}
							}
							if ($special_i == 0){
								?>
									<style>
										#deleteImg-id{
											display: none;
										}
									</style>
								<?php
							}
						?>
			</div>
		<?php } ?>	
		
		
</form>	
<div class="edit_cart_product_miniform2"></div>

</body>
</html>