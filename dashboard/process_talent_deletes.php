<?php
require_once('functions.php');

if(isset($_GET['talent_id'])) {
	
	switch($_GET['talent_id']){

	
	
	
	}
	echo "<pre>";
	print_r($_GET);
	echo "</pre>";
	
} else {
	header('Location: index.php');
}
?>