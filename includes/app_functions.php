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

function get_user_name($user_id){
	$user_name = DB::queryFirstField("SELECT user_name from tams_users WHERE user_id = $user_id");
	return $user_name;
}

function get_client_name($client_id){
	$client_name = DB::queryFirstField("SELECT client_name from tams_clients WHERE client_id = $client_id");
	return $client_name;
}
 ?>