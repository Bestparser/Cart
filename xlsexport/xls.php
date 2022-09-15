<?php
	header('Content-Type: application/vnd.ms-excel; charset=utf-8;');  
	header('Content-disposition: attachment; filename='.$_POST["report_name"].'_'.date("d-m-Y").'.xls');  
	header("Content-Transfer-Encoding: binary ");
	
	
	echo '  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	   <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	 <head>
	 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	 <meta name="author" content="Sidorchenko" />
	 <title></title>
	 </head>
	 <body style="border: 0.1pt solid #ccc">';
	
	
	echo $_POST["data"];  	
	
	echo '</body></html>';
?>
<div class="xlsexport_xls"></div>