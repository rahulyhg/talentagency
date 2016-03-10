<?php
require_once('functions.php');

if(isset($_GET['action'])) {

switch($_GET['action']){
	
/*********************************************************
* 
***************  DELETE TALENT LIST  **********************
* 
***********************************************************/
	
		case "delete_talent_list":
		$id = $_GET['id'];	
		DB::delete('tams_talent_lists', "talent_list_id=%s", $id);
		
/*********************************************************
* 
***************   DELETE TALENT LIST ITEMS  ************** 
* 
***********************************************************/
		DB::delete('tams_talent_list_items', "talent_list_id=%s", $id);
		
		header('Location: index.php?route=modules/talent_lists/saved_talent_lists');		
		break;
		
	 
}
} else {
	header('Location: index.php');
}

	echo "<pre>";
	print_r($_GET);
	echo "</pre>";
?>