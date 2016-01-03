<?php

// Write code here to make sure that user is logged in and has permissions to accesss   Portal
if (!isset($_SESSION['role_id'])){ // this sends the user back to login page if role_id is not set.

	header('Location: ../login/index.php');
	exit;
}

?>