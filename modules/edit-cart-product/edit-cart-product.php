<?php require_once('../01DEFAULT/header.php'); ?>
<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>

		<form enctype="multipart/form-data" method="post" id="form-edit-cart-product-<?php echo $_GET['product_id']; ?>">			
			<table>				
				<tr>
					<?php if ($_GET['product_id'] != 0){ ?>
						<!-- media -->
							<td style="width: 300px;">
								<div class="cart_product_img">
									<div class="cart_product_imgBasicaly" id="ID-cart_product_imgBasicaly">
										<div id="edit-cart-media"><iframe id="edit-cart-media-iframe1" src="modules/edit-cart-product/miniform2.php?product_id=<?php echo $_GET['product_id']; ?>&iframe_id=546&squ=<?php echo searchNameSQU($_GET['product_id']); ?>&category_id=<?php echo $_GET['category_id']; ?>"></iframe></div>
										<div style="display: none;" id="edit-cart-media-iframe2"></div>
									</div>
									
									<div class="cart_product_imgAdd" id="ID-cart_product_imgAdd">
										<div id="edit2-cart-media"><iframe id="edit2-cart-media-iframe1" src="modules/edit-cart-product/miniform2.php?product_id=<?php echo $_GET['product_id']; ?>&iframe_id=550&squ=<?php echo searchNameSQU($_GET['product_id']); ?>&category_id=<?php echo $_GET['category_id']; ?>"></iframe></div>
										<div style="display: none;" id="edit2-cart-media-iframe2"></div>
									</div>	

									<div class="cart_product_imgAdd2" id="ID-cart_product_imgAdd2">
										<div id="edit3-cart-media"><iframe id="edit3-cart-media-iframe1" src="modules/edit-cart-product/miniform2.php?product_id=<?php echo $_GET['product_id']; ?>&iframe_id=573&squ=<?php echo searchNameSQU($_GET['product_id']); ?>&category_id=<?php echo $_GET['category_id']; ?>"></iframe></div>
										<div style="display: none;" id="edit3-cart-media-iframe2"></div>
									</div>
								</div>
							</td>
						<!-- end media -->
					<?php } ?>
					<td>
						<div class="cart_product_attr">
							<?php if ($_GET['product_id'] != 0){ ?>
								<div class="cart_product_head">				
									<span class="cart_product_headNameProduct"><?php echo searchNameProduct($_GET['product_id']); ?></span>
									<span class="cart_product_headSqu"><?php echo searchNameSQU($_GET['product_id']); ?></span>
									<div id="resultEditCartProductSave-<?php echo $_GET['product_id']; ?>"></div>
								</div>
							<?php } ?>	
							<div class="<?php if ($_GET['product_id'] == 0){ ?>massCart<?php } else { ?>noMassCart<?php } ?>">
								<?php if ($_GET['product_id'] != 0){ ?>
									<ul class="cart-tab">
										<li class="active" onclick="showCartAttr('sap', 1, '<?php echo $_GET['product_id'] ?>', '<?php echo $_GET['category_id']; ?>', 0);"><span data-id="1" id="spanPoint-cartAttr-1" class="spanPoint">Основные (SAP)</span></li>
										<li onclick="showCartAttr('dynamic', 2, '<?php echo $_GET['product_id'] ?>', '<?php echo $_GET['category_id']; ?>', 0);"><span data-id="2" id="spanPoint-cartAttr-2" class="spanPoint">Динамические</span></li>							
									</ul>
								<?php } ?>	

								<div <?php if ($_GET['product_id'] == 0){ ?>style="display: none;"<?php } ?> id="ID-form-edit-cart-product-block1" class="form-edit-cart-product-block"><?php require_once('miniform0.php'); ?></div>
								<div <?php if ($_GET['product_id'] != 0){ ?>style="display: none;"<?php } ?> id="ID-form-edit-cart-product-block2" class="form-edit-cart-product-block"><?php require_once('miniform1.php'); ?></div>
							
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<?php if (count($arr_special) > 0){ ?>
						<?php if (PZC(userType($user_id), 3) != 3){ ?><input id="ID-editCartProductSave" data-id="0" type="button" value="Сохранить" onclick="editCartProductSave('0', '<?php echo $_GET['category_id']; ?>');" /><?php } ?>
					<?php } else { ?>
						<?php if (PZC(userType($user_id), 3) != 3){ ?><input id="ID-editCartProductSave" data-id="<?php echo $_GET['product_id']; ?>" type="button" value="Сохранить" onclick="editCartProductSave('<?php echo $_GET['product_id']; ?>', '<?php echo $_GET['category_id']; ?>');" /><?php } ?>	
					<?php } ?>
				</tr>
			</table>	
		</form>
<?php require_once('../01DEFAULT/footer.php'); ?>
<div class="edit_cart_product"></div>