<?php

function reset_password($user_id , $password){
	$password = sha1($password);
	$update = DB::UPDATE('users', array(	
            'password' 	=> $password	
		),
		"user_id=%s", $user_id
		);
	return $update;
}


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
function get_user_name($user_id){
	$user_name = DB::queryFirstField("SELECT user_name from tams_users WHERE user_id = $user_id");
	return $user_name;
}

function get_user_avatar_url ($user_id, $imageWidth = '150'){

$user_avatar_url = DB::queryFirstField("SELECT user_avatar_url FROM tams_users");

if($user_avatar_url == "") {
	
	
$user_email = DB::queryFirstField("SELECT user_email FROM tams_users");
	
$userMail = $user_email;

 

$user_avatar_url = 'http://www.gravatar.com/avatar/'.md5($userMail).'fs='.$imageWidth;
} 


return $user_avatar_url;

}

function get_user_full_name($user_id) {
	
	return DB::queryFirstField('SELECT CONCAT(`user_title`, " ",`first_name`," " ,`last_name`) AS fullname FROM tams_users');
	
	
}


function get_client_name($client_id){
	$client_name = DB::queryFirstField("SELECT client_name from tams_clients WHERE client_id = $client_id");
	return $client_name;
}

function get_experience_item_name($experience_item_id){
	$experience_item_name = DB:: queryFirstField ("SELECT experience_item_name from tams_experience_items WHERE experience_item_id = $experience_item_id");
	return $experience_item_name;
	}
	
function get_experience_item_desc ($experience_item_id){
	$experience_item_desc = DB::queryFirstField ("SELECT experience_item_desc from tams_experience_items WHERE experience_item_id = $experience_item_id");
	return $experience_item_desc;
	
}

function get_language_name($language_id){
	$language_name = DB:: queryFirstField ("SELECT language_name from tams_languages WHERE language_id = $language_id");
	return $language_name;
	}
	
function get_portfolio_item_name($portfolio_item_id){
	$portfolio_item_name = DB:: queryFirstField ("SELECT portfolio_item_name from tams_portfolio_items WHERE portfolio_item_id = $portfolio_item_id");
	return $portfolio_item_name;
	}
	
function get_portfolio_item_desc($portfolio_item_id){
	$portfolio_item_desc = DB:: queryFirstField ("SELECT portfolio_item_desc from tams_portfolio_items WHERE portfolio_item_id = $portfolio_item_id");
	return $portfolio_item_desc;
	}
	
function get_document_type_name($document_type_id){
	$document_type_name = DB:: queryFirstField ("SELECT document_type_name from tams_document_types WHERE document_type_id = $document_type_id");
	return $document_type_name;
	}
	
function get_document_type_desc($document_type_id){
	$document_type_desc = DB:: queryFirstField ("SELECT document_type_desc from tams_document_types WHERE document_type_id = $document_type_id");
	return $document_type_desc;
	}
 ?>