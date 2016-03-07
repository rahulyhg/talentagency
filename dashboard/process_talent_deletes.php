<?php
require_once('functions.php');

if(isset($_GET['talent_experience_item_id'])) {
	
	switch($_GET['talent_experience_item_id']){

	case "delete_experience_item":
		$talent_id = $_GET['talent_id'];
		$id = $_GET['talent_experience_item_id'];
		$delete=mysql_query("DELETE FROM tams_talent_experience WHERE talent_experience_item_id='$id'");	
		
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#experience');		
		break;
	}
	
} else {
	header('Location: index.php');
}

	echo "<pre>";
	print_r($_GET);
	echo "</pre>";
?>