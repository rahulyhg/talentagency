<?php
require_once('functions.php');

if(isset($_GET['action'])) {

switch($_GET['action']){
		case "delete_talent":
		$id = $_GET['id'];	
		DB::delete('tams_talent', "talent_id=%s", $id);
		//TO Do Delete Images & documents from directory/folder 
		header('Location: index.php?route=modules/talent/view_talents');		
		break;
}
} else {
	header('Location: index.php');
}

	echo "<pre>";
	print_r($_GET);
	echo "</pre>";
?>