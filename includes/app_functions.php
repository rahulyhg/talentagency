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


 function get_user_company_name($user_id) {
	$company_name = "";
	$sql = "SELECT
   `companies`.`company_name`
FROM
    `companies`
    INNER JOIN `users` 
        ON (`companies`.`company_id` = `users`.`company_id`)
 WHERE `users`.user_id = $user_id;";
 
 $company_name = DB::queryFirstField($sql);
 
 return $company_name;
 
}

function get_user_client_name($user_id) {
	$client_name = "";
	$sql = "SELECT
   `clients`.`client_name`
FROM
    `clients`
    INNER JOIN `users` 
        ON (`clients`.`client_id` = `users`.`client_id`)
 WHERE `users`.user_id = $user_id;";
 
 $client_name = DB::queryFirstField($sql);
 
 return $client_name;
 
}
function get_user_group_name($user_id) {
	$group_name = "";
	$sql = "SELECT
   `user_groups`.`user_group_name`
FROM
    `user_groups`
    INNER JOIN `users` 
        ON (`user_groups`.`user_group_id` = `users`.`user_group_id`)
 WHERE `users`.user_id = $user_id;";
 
 $group_name = DB::queryFirstField($sql);
 
 return $group_name;
 	
}

function list_client_companies($client_id) {
	$list = "";
	 
	
	$query = "SELECT company_id, company_name from companies WHERE client_id = $client_id";
	
	$companies = DB::query($query);
	
	if ($companies) {
	
		foreach ($companies as $company) {
		 
			$list .= '<a href="'.SITE_ROOT.'app-admin/index.php?route=clients/view_company_profile&company_id='.$company['company_id'].'" >'.$company['company_name'].'</a><br>';
			
		}
	
	
	}
		 
 
	return $list;
}

function list_client_users($client_id,$user_id = NULL) {
	$list = "";
	
	$query = "SELECT user_id, username from users WHERE client_id = $client_id";
	
	$users = DB::query($query);
	
	if ($users) {
	
		foreach ($users as $user) {
			if($user['user_id'] != $user_id){
			
			$list .= '<a href="'.SITE_ROOT.'app-admin/index.php?route=view_user_profile&user_id='.$user['user_id'].'" >'.$user['username'].'</a><br>';
			} 		
		}
	
	
	}	
	return $list;
} 

function get_client_name($client_id){
	$client_name = "";
	$client_name = DB::queryFirstField('SELECT client_name FROM clients WHERE client_id = '.$client_id);
 return $client_name;
}
function get_company_name($company_id){
	$company_name = "";
	$sql = "SELECT company_name FROM companies WHERE company_id = $company_id";
	$company_name = DB::queryFirstField($sql);
	
	
	return $company_name;
}
function get_country_name($country_id){
	 if (is_numeric($country_id)){
	 	$country_name = DB::queryFirstField("SELECT countryName FROM countries WHERE country_id=$country_id");
	 	return $country_name;
	 }
	 else{
	 	return FALSE;
	 }
}
?>