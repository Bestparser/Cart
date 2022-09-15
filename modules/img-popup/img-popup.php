<?php require_once('../01DEFAULT/header.php'); ?>
<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>
<?php $road_brand = builderImgDirectory_brand($_GET['product_id']); ?>
<?php $road_squ = builderImgDirectory_squ($_GET['product_id']); ?>

<div id="img-popup">
	<div class="photor">
		<div class="photor__viewport">
			<div class="photor__viewportLayer">			
				<?php
					$res = mysql_query("select * FROM `new_product_attr` WHERE `product_id` = '".$_GET['product_id']."' and (`attr_id` = '546' or `attr_id` = '550' or `attr_id` = '573') ");
					while ($row = mysql_fetch_assoc($res)){
						if ($row['attr_value'] != ''){
							?>
								<img src="images/<?php echo $road_brand . $road_squ . $row['attr_value']; ?>" data-thumb="images/<?php echo $road_brand . $road_squ . $row['attr_value']; ?>">
							<?php
						}
					}
				?>
			</div>
			<div class="photor__viewportControl">
				<div class="photor__viewportControlPrev"></div>
				<div class="photor__viewportControlNext"></div>
			</div>
		</div>
		<div class="photor__thumbs">
			<div class="photor__thumbsWrap"></div>
		</div>
	</div>
</div>
<?php require_once('../01DEFAULT/footer.php'); ?>
<div class="img-popup"></div>