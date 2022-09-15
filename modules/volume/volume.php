<?php require_once('../01DEFAULT/header.php'); ?>
<?php require_once('../../library/functions.php'); ?>
<?php session_start(); ?>
<?php $user_id = $_SESSION['user_id']; ?>


		<form enctype="multipart/form-data" method="post" id="form-volume">
			<?php if (PZC(userType($user_id), 1) != 3){ ?>
				<div class="block100 instrumental">
					<ul>						
						<li><span class="spanPoint" onclick="addVolume();">Добавить</span></li>					
						<li><span class="spanPoint" onclick="editVolume();">Редактировать</span></li>					
						<li><span class="spanPoint" onclick="deleteVolume();">Удалить</span></li>
					</ul>
				</div>	
			<?php } ?>
			<div class="miniform" id="addVolumeManagerForm"></div>
			<div class="volume_scroll_class">
				<div class="volumeManager" id="superTable1">									
					<table class="table_sort4">
						<thead>
							<tr>
								<td class="down"><span>Единица измерения</span></td>							
							</tr>
						</thead>
						<tbody>
							<?php
								$res = mysql_query("select * FROM `new_attr_type` order by `id` desc ");
								while ($row = mysql_fetch_assoc($res)){
									?>
										<tr>
											<td>
												<i style="display: none;"><?php echo $row['attr_type_name']; ?></i>
												<?php if (PZC(userType($user_id), 1) != 3){ ?><input class="check-volume" data-id="<?php echo $row['id']; ?>" id="ID-check-volume-<?php echo $row['id']; ?>" name="NAME-check-volume-<?php echo $row['id']; ?>" type="checkbox" /><?php } ?>
												<span onclick="checkSpan('ID-check-volume-', <?php echo $row['id']; ?>);" id="ID-span-volume-<?php echo $row['id']; ?>"><?php echo $row['attr_type_name']; ?></span>
											</td>
										</tr>
									<?php
								}
							?>
						</tbody>
					</table>				
				</div>
			</div>	
		</form>
		
<?php require_once('../01DEFAULT/footer.php'); ?>
<div class="volume_volume"></div>