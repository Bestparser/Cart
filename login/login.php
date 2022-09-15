<!DOCTYPE>
<html>
<head>
	<?php require_once('../conf.php'); ?>	
	<title>Вход</title>		
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<?php if (isset($_GET['url'])){ ?>
		<?php if (stripos($_GET['url'], 'logout') > 0){ ?>
					<script type="text/javascript">			
						window.location = "<?php echo $domain; ?>";
					</script>			
		<?php } ?>
	<?php } ?>


	<script type="text/javascript">
		$(document).ready(function() {
			$(function() {
			  $('input[type="text"]').focus();
			});			
		});
	</script>


	<style>
		.maskBlockLogin{		
			<?php
				//$img = rand(1, 13);		
			?>
			background: no-repeat url(img/13.jpg);
		}
	</style>
</head>
<body>
	
<?php session_start(); ?>	
		
<?php if ($_SESSION['login'] > 0){ ?>		
		<script type="text/javascript">
			window.location = "<?php echo $_GET['url']; ?>";
		</script>
<?php } else { ?>	
	<?php?>
		<div class="blockLogin">			
			<form enctype="multipart/form-data" method="post" action="process.php?url=<?php echo $_GET['url']; ?>">	
				<div class="logo">
					<span>Cards</span>					
				</div>
				
				<div>
					<label for="login">Ваш логин:</label>
					<input <?php if (isset($_GET['wrong'])){ ?>style="border: 1px solid red;"<?php } ?> type="text" name="login" autocomplete="off" placeholder="" />
				</div>
				<div>
					<label for="password">Пароль:</label>
					<input <?php if (isset($_GET['wrong'])){ ?>style="border: 1px solid red;"<?php } ?> type="password" name="password" autocomplete="off" placeholder="" />
				</div>
				<div>
					<input type="submit" value="OK" />
				</div>
			</form>
		</div>
		<div class="maskBlockLogin"></div>
<?php } ?>



</body>
</html>