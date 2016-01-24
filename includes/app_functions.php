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
 ?>