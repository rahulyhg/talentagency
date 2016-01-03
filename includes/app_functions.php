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


 
 
 ?>