<?php 

 ini_set('max_execution_time', 90); //300 seconds = 5 minute
require_once('functions.php');
 
if(isset($_POST['form_name'])) {
	
	switch($_POST['form_name']){
		
		// Add New Talent Form
		case "add_talent_form_step_1":
				$talent_id = - 1;
				$first_name = $_POST['first_name'];
				$last_name  = $_POST['last_name'];
				$dob        = $_POST['dob'];
				$sex        = $_POST['sex'];
				$address    = $_POST['address'];
				$mobile_no   = $_POST['mobile_no'];
				$email_id   = $_POST['email_id'];
				$nationality= $_POST['nationality'];
				$passport_no= $_POST['passport_no'];
				$qatari_id  = $_POST['qatari_id'];
				$created_by = $_SESSION['user_id'];
				$created_on = getDateTime(NULL ,"mySQL");
				$last_modified_by =	$_SESSION['user_id'];
				$last_modified_on = getDateTime(NULL ,"mySQL");
			
			DB::insert('tams_talent', array(
						'first_name' 		=> $first_name,						
						'last_name' 		=> $last_name,
						'dob' 				=> $dob,						
						'sex' 				=> $sex,						
						'address'	 		=> $address,						
						'mobile_no' 		=> $mobile_no,						
						'email_id' 			=> $email_id,
						'nationality'		=> $nationality,
						'talent_status'		=> "draft",
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
			);

		// get the new $talent_id
		
			$talent_id = DB::insertId();
		if ($talent_id > 0) {
			
				if(!file_exists($_FILES['talent_photo1']['tmp_name']) || !is_uploaded_file($_FILES['talent_photo1']['tmp_name'])) {
		// Do nothing
	}  else {
	//if logo file is uploaded process the file with upload class
	
	$handle = new upload($_FILES['talent_photo1']);
		if ($handle->uploaded) {
			  $handle->file_new_name_body   = $talent_id.'_photo1';
			  $handle->image_resize         = true;
			  $handle->image_x              = 250;
			  $handle->image_ratio_y        = true;
			  $handle->allowed = array('image/*');
			  $handle->image_convert = 'jpg';
			  $handle->file_overwrite = true;
			  $handle->process('../uploads/talent_profiles/');
		if ($handle->processed) {
				
	// save uploaded file name and path in database table field logo_url
	
			$last_modified_by = $_SESSION['user_id'];
			$last_modified_on = getDateTime(NULL,"mySQL");
			
	/* if client id is not empty update the database */
	
		if($talent_id <> ""){
				$update = DB::update('tams_talent', array(

				'photo1_url'=> '/talent/uploads/talent_profiles/'.$talent_id.'_photo1.jpg',
				'photo1_caption' =>	$_POST['photo1_caption'],
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
		
		}
			echo 'Logo file uploaded and path select saved in database';
				$handle->clean();
			} else {
				echo 'error : ' . $handle->error;
				
			} // close handle processed
			
		} // close handle uploaded
		
		} // close file exist
			
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id);	
	
			
		} else {
			
			
		header('Location: index.php?route=modules/talent/add_talent&error=1&msg=bad-data');		
		}
			
			
			
		break;

		
		// Edit Talent Experience Info 		
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
		DB::update('tams_talent', array(
 						'talent_id'			=> $talent_id,
 						'email_id'=> $email_id,
						'Address' => $address,
						'mobile_no' => $mobile_no,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						),
			"talent_id=%s", $talent_id						
			);
		}			
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#contact');	
			
		break;
		
		case "edit_talent_employability_info":
		$talent_id = $_POST['talent_id'];
		$nationality = $_POST['nationality'];
		$passport_no = $_POST['passport_no'];
		$qatari_id   = $_POST['qatari_id'];
		$is_qatari   = $_POST['is_qatari'];
		$passport_copy_attached  = $_POST['passport_copy_attached'];
		$noc_required     = $_POST['noc_required'];
		$noc_copy_attached   = $_POST['noc_copy_attached'];
		$sponsors_id_copy_attached = $_POST['sponsors_id_copy_attached'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		if(($talent_id > 0) AND ($talent_id <> "")){
			
		
			// process Talent Employability Information edit form
		DB::update('tams_talent', array(
 						'talent_id'			=> $talent_id,
						'nationality' => $nationality,
						'passport_no' => $passport_no,
						'qatari_id' => $qatari_id,
						'is_qatari' => $is_qatari,
						'passport_copy_attached' => $passport_copy_attached,
						'noc_required' => $noc_required,
						'noc_copy_attached'=> $noc_copy_attached,
						'sponsors_id_copy_attached' => $sponsors_id_copy_attached,
						'events'=> $events,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						),
			"talent_id=%s", $talent_id						
			);
		}			
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#employability');	
			
		break;
		
		case "edit_talent_vitals_info":
		$talent_id = $_POST['talent_id'];
		$height_cm = $_POST['height_cm'];
		$weight_kg = $_POST['weight_kg'];
		$hair_color=$_POST['hair_color'];
		$eye_color=$_POST['eye_color'];
		$dress_size=$_POST['dress_size'];
		$shoe_size=$_POST['shoe_size'];
		$waist_cm=$_POST['waist_cm'];
		$collar_cm=$_POST['collar_cm'];
		$chest_cm=$_POST['chest_cm'];
		$created_by = $_SESSION['user_id'];
		$created_on = getDateTime(NULL ,"mySQL");
		$last_modified_by =	$_SESSION['user_id'];
		$last_modified_on = getDateTime(NULL ,"mySQL");
		
		if(($talent_id > 0) AND ($talent_id <> "")){
			
		
			// process Talent Vitals Information edit form
		DB::update('tams_talent', array(
 						'talent_id'			=> $talent_id,
						'height_cm' => $height_cm,
						'weight_kg' => $weight_kg,
						'hair_color'=>$hair_color,
						'eye_color'=>$eye_color,
						'dress_size'=>$dress_size,
						'shoe_size'=>$shoe_size,
						'waist_cm'=>$waist_cm,
						'collar_cm'=>$collar_cm,
						'chest_cm'=>$chest_cm,
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						),
			"talent_id=%s", $talent_id						
			);
		}			
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#vitals');	
			
		break;
	
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
		$talent_id = $_GET['talent_id'];

		$photo1_caption=$_POST['photo1_caption'];
		
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
		DB::update('tams_talent', array(
 						'talent_id'			=> $talent_id,
						'photo1_caption'=> $photo1_caption,
						'photo2_caption'=> $photo2_caption,
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
						,
			"talent_id=%s", $talent_id	
			);
			//check if the file is uploaded and process the file if file is uploaded	
	
	if(!file_exists($_FILES['talent_photo1']['tmp_name']) || !is_uploaded_file($_FILES['talent_photo1']['tmp_name'])) {
			// Do nothing
	}  else {
		
	//if logo file is uploaded process the file with upload class
	
	$handle1 = new upload($_FILES['talent_photo1']);
		if ($handle1->uploaded) {
			$handle1->file_new_name_body   = $talent_id.'_photo1';
			$handle1->image_resize         = true;
			$handle1->image_x              = 100;
			$handle1->image_ratio_y        = true;
			$handle1->allowed = array('image/*');
			$handle1->image_convert = 'jpg';
			$handle1->file_overwrite = true;
			$handle1->process('../uploads/talent_profiles/');
		if ($handle1->processed) {
			
	// save uploaded file name and path in database table field logo_url
	
	
			$last_modified_by = $_SESSION['user_id'];
			$last_modified_on = getDateTime(NULL,"mySQL");
			
	/* if talent id is not empty update the database */
	
		if($talent_id <> ""){
				$update = DB::update('tams_talent', array(

				'photo1_url'=> '/talent/uploads/talent_profiles/'.$talent_id.'_photo1.jpg',
				'photo1_caption'=> $_POST['photo1_caption'],
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
		
		}
		echo 'Photo is uploaded and path select saved in database';	
			$handle1->clean();
		} else {
			echo 'error : ' . $handle1->error;
		} // close handle processed
		} // close handle uploaded
		} // close file exist
		
		//check if the file is uploaded and process the file if file is uploaded
			if(!file_exists($_FILES['talent_photo2']['tmp_name']) || !is_uploaded_file($_FILES['talent_photo2']['tmp_name'])) {
		// Do nothing
	}  else {
	//if logo file is uploaded process the file with upload class
	
	$handle2 = new upload($_FILES['talent_photo2']);
		if ($handle2->uploaded) {
			  $handle2->file_new_name_body   = $talent_id.'_photo2';
			  $handle2->image_resize         = true;
			  $handle2->image_x              = 250;
			  $handle2->image_ratio_y        = true;
			  $handle2->allowed = array('image/*');
			  $handle2->image_convert = 'jpg';
			  $handle2->file_overwrite = true;
			  $handle2->process('../uploads/talent_profiles/');
		if ($handle2->processed) {
				
	// save uploaded file name and path in database table field logo_url
	
			$last_modified_by = $_SESSION['user_id'];
			$last_modified_on = getDateTime(NULL,"mySQL");
			
	/* if talent id is not empty update the database */
	
		if($talent_id <> ""){
				$update = DB::update('tams_talent', array(

				'photo2_url'=> '/talent/uploads/talent_profiles/'.$talent_id.'_photo2.jpg',
				'photo2_caption' =>	$_POST['photo2_caption'],
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
		
		}
			echo 'Logo file uploaded and path select saved in database';
				$handle2->clean();
			} else {
				echo 'error : ' . $handle2->error;
				
			} // close handle processed
			
		} // close handle uploaded
		
		} // close file exist
			
		header('Location: index.php?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'#basic');	
	
			
		} else {
			
			
		header('Location: index.php?route=modules/talent/add_talent&error=1&msg=bad-data');		
		}
				
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