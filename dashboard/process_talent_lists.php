<?php

require_once('functions.php');
if(isset($_POST['form_name'])) {
	
	switch($_POST['form_name']){
		
		// Add New Talent List
/*********************************************************
* 
***************   ADD TALENT LIST   **********************
* 
***********************************************************/
	case "add_talent_list":
		$talent_list_id = - 1;
		$talent_list_title = $_POST['talent_list_title'];
		$talent_list_details  = $_POST['talent_list_details'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		DB::insert('tams_talent_lists', array(
						
						'talent_list_title' 		=> $talent_list_title,						
						'talent_list_details' 		=> $talent_list_details,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
			);
	
			// get the new $talent_list_id
		
			$talent_list_id = DB::insertId();
			
			header('Location: index.php?route=modules/talent_lists/saved_talent_lists&talent_list_id='.$talent_list_id);
			break;
			
/*********************************************************
* 
***************   ADD TALENT TO LIST   **********************
* 
***********************************************************/
		
		case "add_talent_to_list":
		$talent_id		= $_POST['talent_id'];
		$talent_list_id = $_POST['talent_list_id'];
		$comments  		= $_POST['comments'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		if(($talent_list_id > 0) AND ($talent_list_id <> "")){
			
		DB::insert('tams_talent_list_items', array(
						
						'talent_list_id' 		=> $talent_list_id,						
						'talent_id' 		=> $talent_id,
						'comments'			=> $comments,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
			);
		}
			
			header('Location: index.php?route=modules/talent_lists/saved_talent_lists&talent_list_id='.$talent_list_id);
			break;
			
/*********************************************************
* 
***************  EDIT TALENT LIST   **********************
* 
***********************************************************/
		case "edit_talent_list":
		$talent_list_id = $_POST['talent_list_id'];
		$talent_list_title = $_POST['talent_list_title'];
		$talent_list_details  = $_POST['talent_list_details'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		if(($talent_list_id > 0) AND ($talent_list_id <> "")){
			
		DB::update('tams_talent_lists', array(
						
						'talent_list_title' 		=> $talent_list_title,						
						'talent_list_details' 		=> $talent_list_details,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
						,
			"talent_list_id=%s", $talent_list_id
			);
		}
			header('Location: index.php?route=modules/talent_lists/edit_talent_list&talent_list_id='.$talent_list_id);
			break;
			
			}


} else {
	header('Location: index.php');
}
	echo "<pre>";
	print_r($_POST);
	print_r($_SESSION);
	echo "</pre>";
?>