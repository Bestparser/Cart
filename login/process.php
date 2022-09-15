<?php require_once('../conf.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
	session_start();
	if (($_POST['login'] != '') and ($_POST['password'] != '')){	
		$i = 0;
		$user_id = '';
		$res = mysql_query("select * FROM `new_user` WHERE `login` = '".$_POST['login']."' and `password` = '".md5($_POST['password'])."' ");
		while ($row = mysql_fetch_assoc($res)){
			$i++;
			$user_id = $row['id'];
		}
		
		if ($i > 0){
			$_SESSION['login'] = 1;
			$_SESSION['user_id'] = $user_id;
			?>				
				<script type="text/javascript">										
					window.location = "<?php echo $domain; ?>";
				</script>
			<?php
		} else {			
			?>	
				<script type="text/javascript">					
					window.location = "<?php echo $domain; ?>/login/login.php?wrong=yes&url=<?php echo $_GET['url']; ?>";
				</script>
			<?php			
		}		
	} else {			
		?>		
			<script type="text/javascript">
				window.location = "<?php echo $domain; ?>/login/login.php?wrong=yes&url=<?php echo $_GET['url']; ?>";
			</script>
		<?php
	}
?>