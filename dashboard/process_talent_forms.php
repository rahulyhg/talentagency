<?php 

 ini_set('max_execution_time', 60); //300 seconds = 5 minute
require_once('functions.php');
 
if(isset($_POST['form_name'])) {
	
	
	echo "<pre>";
	print_r($_POST);
	print_r($_SESSION);
	echo "</pre>";
	
	
	
} else {
	header('Location: index.php');
}
 
 
 
 ?>