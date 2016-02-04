<?php 

 ini_set('max_execution_time', 90); //300 seconds = 5 minute
require_once('functions.php');
 
if(isset($_POST['form_name'])) {
	
	switch($_POST['form_name']){
		case "edit_talent_experience_info":
		$talent_id = $_POST['talent_id'];
		$experience_item_id = $_POST['experience_item_id'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		if(($experience_item_id > 0) AND ($experience_item_id <> "")){
			
		
			// process Talent Experience Information edit form
		DB::insert('tams_talent_experience', array(
 						'talent_id'			=> $talent_id,
 						'experience_item_id'=> $experience_item_id,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
			);
		}	
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#experience');	
			
		break;
		// process Talent Language Information edit form
		
	case "edit_talent_languages_info":
		$talent_id = $_POST['talent_id'];
		$language_id = $_POST['language_id'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		if(($language_id > 0) AND ($language_id <> "")){
			
		
			// process Talent Language Information edit form
		DB::insert('tams_talent_language', array(
 						'talent_id'			=> $talent_id,
 						'language_id'=> $language_id,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
			);
		}			
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#languages');	
			
		break;	

		case "edit_talent_document_info":
		$talent_id = $_POST['talent_id'];
		$document_type_id = $_POST['document_type_id'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		if(($document_type_id > 0) AND ($document_type_id <> "")){
			
		
			// process Talent Document Information edit form
		DB::insert('tams_talent_documents', array(
 						'talent_id'			=> $talent_id,
 						'document_type_id'=> $document_type_id,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
			);
		}			
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#documents');	
			
		break;
		/*
		case "edit_talent_contact_info":
		$talent_id = $_POST['talent_id'];
		$email_id =$_POST['email_id'];
		$address =$_POST['address'];
		$mobile_no =$_POST['mobile_no'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		if(($talent_id > 0) AND ($talent_id <> "")){
			
		
			// process Talent Contact Information edit form
		DB::insert('tams_talent', array(
 						'talent_id'			=> $talent_id,
 						'email_id'=> $email_id,
						'Address' => $address,
						'mobile_no' => $mobile_no,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
			);
		}			
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#contact');	
			
		break;
		*/
		case "edit_talent_portfolio_info":
		$talent_id = $_POST['talent_id'];
		$portfolio_item_id = $_POST['portfolio_item_id'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		if(($portfolio_item_id > 0) AND ($portfolio_item_id <> "")){
			
		
			// process Talent Portfolio Information edit form
		DB::insert('tams_talent_portfolio', array(
 						'talent_id'			=> $talent_id,
 						'portfolio_item_id'=> $portfolio_item_id,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
			);
		}			
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#portfolio');	
			
		break;
	
		case "edit_talent_basic_info":
		$talent_id = $_POST['talent_id'];
		$photo1_url=$_POST['photo1_url'];
		$photo1_caption=$_POST['photo1_caption'];
		$photo2_url=$_POST['photo2_url'];
		$photo2_caption=$_POST['photo2_caption'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$dob = $_POST['dob'];
		$sex = $_POST['sex'];
		$brief = $_POST['brief'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		if(($talent_id > 0) AND ($talent_id <> "")){
			
		
			// process Talent Basic Information edit form
		DB::insert('tams_talent', array(
 						'talent_id'			=> $talent_id,
						'photo1_url'=>$photo1_url,
						'photo1_caption'=>$photo1_caption,
						'photo2_url'=>$photo2_url,
						'photo2_caption'=>$photo2_caption,
						'first_name'=> $first_name,
						'last_name'=> $last_name, 
						'dob' => $dob,
						'sex' => $sex,
						'brief' => $brief,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
			);
		}			
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#basic');	
			
		break;		
		
		default:
		 echo "Unable to identify the form";
		
		
	} 
		
 
	
	
	
	echo "<pre>";
	print_r($_POST);
	print_r($_SESSION);
	print_r($_FILES);
	echo "</pre>";
	
	
	
} else {
	header('Location: index.php');
}
 
 
 
 ?>