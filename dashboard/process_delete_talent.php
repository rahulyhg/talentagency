<?php
require_once('functions.php');

if(isset($_GET['action'])) {

switch($_GET['action']){
	
/*********************************************************
* 
***************  DELETE TALENT FROM TAMS_TALENT  **********************
* 
***********************************************************/
	
		case "delete_talent":
		$id = $_GET['id'];	
		DB::delete('tams_talent', "talent_id=%s", $id);
/*********************************************************
* 
***************   DELETE TALENT EXPERIENCE   ************** 
* 
***********************************************************/
		DB::delete('tams_talent_experience', "talent_id=%s", $id);
		
/*********************************************************
* 
***************   DELETE TALENT LANGUAGE   ************** 
* 
***********************************************************/
		DB::delete('tams_talent_language', "talent_id=%s", $id);
		
/*********************************************************
* 
***************   DELETE TALENT NOTES   ************** 
* 
***********************************************************/	
		DB::delete('tams_talent_comments', "talent_id=%s", $id);
		
/*********************************************************
* 
***************   DELETE PORTFOLIO ITEM   ************** 
* 
***********************************************************/
		DB::delete('tams_talent_portfolio', "talent_id=%s", $id);
/*********************************************************
* 
***************   DELETE TALENT PHOTO   ************** 
* 
***********************************************************/
		DB::delete('tams_talent_photos', "talent_id=%s", $id);
		
/*********************************************************
* 
***************   DELETE DOCUMENT   ************** 
* 
***********************************************************/
		DB::delete('tams_talent_documents', "talent_id=%s", $id);

/*********************************************************
* 
*************** //TO Do Delete Images & documents from folder ************** 
* 
***********************************************************/		
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