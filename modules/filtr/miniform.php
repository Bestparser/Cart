<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>

<?php
	if ($_GET['action'] == 'showFilter'){
		?>
					<ul class="sortable-ul">
						<?php
								$attr_id_arr = getToArray(CP_attr(code_to_id($_GET['category_id']), $user_id), $arr);																
								$i = 0;
								while ($i < count($attr_id_arr)){
									$i++;									
									if (showMe($attr_id_arr[$i], $user_id, code_to_id($_GET['category_id'])) > 0){
										?>										
											<li>
												<span class="CLASS-sortAttrXLS" id="ID-sortAttrXLS" data-id="<?php echo $attr_id_arr[$i]; ?>"><?php echo searchNameAttr($attr_id_arr[$i]); ?><?php if (importantAttr($attr_id_arr[$i]) > 0){ ?> * <?php } ?></span>
											</li>
										<?php	
									}
								}
						?>
					</ul>	
		<?php
	}

?>
<div class="filtr_miniform"></div>