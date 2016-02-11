<?php

// Reset Password
function reset_password($user_id , $password){
	$password = sha1($password);
	$update = DB::UPDATE('users', array(	
            'password' 	=> $password	
		),
		"user_id=%s", $user_id
		);
	return $update;
}

// Check User Name Exist
function user_name_exist($user_name){
			
			$sql = 'SELECT count(*) FROM tams_users WHERE user_name = "'.$user_name.'";';
			//echo $sql;
			$user_name_exists = DB::queryFirstField($sql);
			
				if ($user_name_exists > 0){
					return true;
				} else {
					return false;
				}
	}
	
// Check Client Name Exist
function client_name_exist($client_name){
			
			$sql = 'SELECT count(*) FROM tams_clients WHERE client_name = "'.$client_name.'";';
			//echo $sql;
			$client_name_exists = DB::queryFirstField($sql);
			
				if ($client_name_exists > 0){
					return true;
				} else {
					return false;
				}
	}
 
 // Check User Role Name Exist
function user_role_name_exist($user_role_name){
			
			$sql = 'SELECT count(*) FROM tams_user_roles WHERE role_name = "'.$user_role_name.'";';
			//echo $sql;
			$user_role_exists = DB::queryFirstField($sql);
			
				if ($user_role_exists > 0){
					return true;
				} else {
					return false;
				}
	}
	
// Check if Language Name exist
function language_name_exist($language_name){
			
			$sql = 'SELECT count(*) FROM tams_languages WHERE language_name = "'.$language_name.'";';
			//echo $sql;
			$language_name_exists = DB::queryFirstField($sql);
			
				if ($language_name_exists > 0){
					return true;
				} else {
					return false;
				}
	}
	
// Get User Name	
function get_user_name($user_id){
	$user_name = DB::queryFirstField("SELECT user_name from tams_users WHERE user_id = $user_id");
	return $user_name;
}

// Get User Avatar URL
function get_user_avatar_url ($user_id, $imageWidth = '150'){

$user_avatar_url = DB::queryFirstField("SELECT user_avatar_url FROM tams_users");

if($user_avatar_url == "") {
	
	
$user_email = DB::queryFirstField("SELECT user_email FROM tams_users");
	
$userMail = $user_email;

 

$user_avatar_url = 'http://www.gravatar.com/avatar/'.md5($userMail).'fs='.$imageWidth;
} 


return $user_avatar_url;

}

// Get User Full Name
function get_user_full_name($user_id) {
	
	return DB::queryFirstField('SELECT CONCAT(`user_title`, " ",`first_name`," " ,`last_name`) AS fullname FROM tams_users');
	
	
}

// Get Client Name
function get_client_name($client_id){
	$client_name = DB::queryFirstField("SELECT client_name from tams_clients WHERE client_id = $client_id");
	return $client_name;
}

// Get Experience Item Name
function get_experience_item_name($experience_item_id){
	$experience_item_name = DB:: queryFirstField ("SELECT experience_item_name from tams_experience_items WHERE experience_item_id = $experience_item_id");
	return $experience_item_name;
	}
	
// Get Experience Item Description
function get_experience_item_desc ($experience_item_id){
	$experience_item_desc = DB::queryFirstField ("SELECT experience_item_desc from tams_experience_items WHERE experience_item_id = $experience_item_id");
	return $experience_item_desc;
	
}

// Get Language Name
function get_language_name($language_id){
	$language_name = DB:: queryFirstField ("SELECT language_name from tams_languages WHERE language_id = $language_id");
	return $language_name;
	}

// Get Portfolio Item Name	
function get_portfolio_item_name($portfolio_item_id){
	$portfolio_item_name = DB:: queryFirstField ("SELECT portfolio_item_name from tams_portfolio_items WHERE portfolio_item_id = $portfolio_item_id");
	return $portfolio_item_name;
	}

// Get Portfolio Item Description	
function get_portfolio_item_desc($portfolio_item_id){
	$portfolio_item_desc = DB:: queryFirstField ("SELECT portfolio_item_desc from tams_portfolio_items WHERE portfolio_item_id = $portfolio_item_id");
	return $portfolio_item_desc;
	}

// Get Document	Type Name
function get_document_type_name($document_type_id){
	$document_type_name = DB:: queryFirstField ("SELECT document_type_name from tams_document_types WHERE document_type_id = $document_type_id");
	return $document_type_name;
	}

	// Get Document Type Description
function get_document_type_desc($document_type_id){
	$document_type_desc = DB:: queryFirstField ("SELECT document_type_desc from tams_document_types WHERE document_type_id = $document_type_id");
	return $document_type_desc;
	}
	
// Get Talent Gender
function get_talent_gender($talent_id){
	$sex = DB::queryFirstField("SELECT sex from tams_talent WHERE talent_id = $talent_id");
	if ($sex == 'Male'){
		$sex = "Male";
	} else {
		$sex = "Female";
	}
	return $sex;
}

// Get Talent Photo 
function get_talent_image($talent_id) {
	// Get Gravitar
	if (file_exists(ROOT_PATH.'uploads/talent_profiles/'.$talent_id.'_photo1.jpg')){
		$image = '<img src="'.SITE_ROOT.'uploads/talent_profiles/'.$talent_id.'_photo1.jpg" class="img-responsive" alt="User Image" />';	
	}
	return $image;
}

// List of Talent Experiences
function list_talent_experiences($talent_id) {
	$list = "";
	 
	
	$query = "SELECT tams_experience_items.experience_item_name, tams_talent_experience.talent_id from tams_experience_items,tams_talent_experience WHERE tams_experience_items.experience_item_id = tams_talent_experience.experience_item_id";
	
	$experiences = DB::query($query);
	
	if ($experiences) {
	
		foreach ($experiences as $exp) {
		 
			$list .= ''.$exp['experience_item_name'].'<br>';
			
		}
	
	
	}
		 
 
	return $list;
}
// List of Talent Portfolio Items
function list_talent_portfolios($talent_id) {
	$list = "";
	 
	
	$query = "SELECT tams_portfolio_items.portfolio_item_name, tams_talent_portfolio.talent_id from tams_portfolio_items,tams_talent_portfolio WHERE tams_portfolio_items.portfolio_item_id = tams_talent_portfolio.portfolio_item_id";
	
	$portfolios = DB::query($query);
	
	if ($portfolios) {
	
		foreach ($portfolios as $port) {
		 
			$list .= ''.$port['portfolio_item_name'].'<br>';
			
		}
	
	
	}
		 
 
	return $list;
}
// List of Talent Spoken Languages
function list_talent_languages($talent_id) {
	$list = "";
	 
	
	$query = "SELECT tams_languages.language_name, tams_talent_language.talent_id from tams_languages,tams_talent_language WHERE tams_languages.language_id = tams_talent_language.language_id";
	
	$languages = DB::query($query);
	
	if ($languages) {
	
		foreach ($languages as $lang) {
		 
			$list .= ''.$lang['language_name'].'<br>';
			
		}
	
	
	}
		 
 
	return $list;
}

// List of Talent Notes
function list_talent_comments($talent_id) {
	$list = "";
	 
	
	$query = "SELECT tams_talent_comments.comment, tams_talent.talent_id from tams_talent_comments,tams_talent WHERE tams_talent_comments.talent_id = tams_talent.talent_id";
	
	$Comments = DB::query($query);
	
	if ($Comments) {
	
		foreach ($Comments as $com) {
		 
			$list .= ''.$com['comment'].'<br>';
			
		}
	
	
	}
		 
 
	return $list;
}

// List of Talent Photos
function list_talent_photos($talent_id) {
	$list = "";
	 
	
	$query = "SELECT tams_talent_photos.photo_path, tams_talent.talent_id from tams_talent_photos,tams_talent WHERE tams_talent_photos.talent_id = tams_talent.talent_id";
	
	$Photos = DB::query($query);
	
	if ($Photos) {
	
		foreach ($Photos as $img) {
			
			if (file_exists(ROOT_PATH.'uploads/talent_photos/'.$talent_id.'_photo')){
		$list = '<img src="'.SITE_ROOT.'uploads/talent_photos/'.$talent_id.'_photo" class="img-responsive" alt="Talent Photo" /><br>';	
		//$list = '<img src="'.$img['photo_path'].'" class="img-responsive" alt="Talent Photo" /><br>';	
	}
	return $list;
		 
			
		}

	}
}
// Get Talent Full Name	
function get_talent_full_name($talent_id) {
	
	return DB::queryFirstField('SELECT CONCAT(`first_name`," " ,`last_name`) AS fullname FROM tams_talent');
	
	
}
 ?>