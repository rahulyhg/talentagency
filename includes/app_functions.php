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
 ?>