<?php require_once('../../library/functions.php'); ?>

<?php if ($_GET['id'] == '1'){ ?>
	<div id="edit-cart-media"><iframe id="edit-cart-media-iframe1" src="modules/edit-cart-product/miniform2.php?product_id=<?php echo $_GET['product_id']; ?>&iframe_id=546&squ=<?php echo searchNameSQU($_GET['product_id']); ?>&category_id=<?php echo $_GET['category_id']; ?>"></iframe></div>
	<div style="display: none;" id="edit-cart-media-iframe2"></div>
<?php } ?>
<?php if ($_GET['id'] == '2'){ ?>
	<div id="edit2-cart-media"><iframe id="edit2-cart-media-iframe1" src="modules/edit-cart-product/miniform2.php?product_id=<?php echo $_GET['product_id']; ?>&iframe_id=550&squ=<?php echo searchNameSQU($_GET['product_id']); ?>&category_id=<?php echo $_GET['category_id']; ?>"></iframe></div>
	<div style="display: none;" id="edit2-cart-media-iframe2"></div>
<?php } ?>
<?php if ($_GET['id'] == '3'){ ?>
	<div id="edit3-cart-media"><iframe id="edit3-cart-media-iframe1" src="modules/edit-cart-product/miniform2.php?product_id=<?php echo $_GET['product_id']; ?>&iframe_id=573&squ=<?php echo searchNameSQU($_GET['product_id']); ?>&category_id=<?php echo $_GET['category_id']; ?>"></iframe></div>
	<div style="display: none;" id="edit3-cart-media-iframe2"></div>
<?php } ?>
<div class="reloadIframe"></div>
