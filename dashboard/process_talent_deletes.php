<?php
require_once('functions.php');

if(isset($_GET['action'])) {
	
	switch($_GET['action']){

/*********************************************************
* 
***************   DELETE EXPERIENCE ITEM   ************** 
* 
***********************************************************/

	case "delete_experience_item":
		$talent_id = $_GET['talent_id'];
		$id = $_GET['id'];	
		DB::delete('tams_talent_experience', "talent_experience_item_id=%s AND talent_id=%s", $id, $talent_id);
		
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#experience');		
		break;
/*********************************************************
* 
***************   DELETE LANGUAGE   ************** 
* 
***********************************************************/	

	case "delete_language":
		$talent_id = $_GET['talent_id'];
		$id = $_GET['id'];	
		DB::delete('tams_talent_language', "talent_language_id=%s AND talent_id=%s", $id, $talent_id);
		
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#languages');		
		break;
		
/*********************************************************
* 
***************   DELETE NOTES   ************** 
* 
***********************************************************/	

	case "delete_note":
		$talent_id = $_GET['talent_id'];
		$id = $_GET['id'];	
		DB::delete('tams_talent_comments', "talent_comment_id=%s AND talent_id=%s", $id, $talent_id);
		
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#notes');		
		break;
	}
	
} else {
	header('Location: index.php');
}

	echo "<pre>";
	print_r($_GET);
	echo "</pre>";
?>