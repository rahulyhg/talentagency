<?php 

 ini_set('max_execution_time', 60); //300 seconds = 5 minute
require_once('../../functions.php');
 
if(isset($_POST['form_name'])) {
	
	
	echo "<pre>";
	echo $_POST;
	echo $_SESSION;
	echo "</pre>";
	
	
	
} else {
	header("")
}
 
 
 
 ?>