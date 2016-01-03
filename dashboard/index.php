<?php


 ini_set('max_execution_time', 60); //300 seconds = 5 minute
require_once('functions.php');
$include_file = "";
$path ="";
if (isset($_GET['route'])) {
$path = $_GET['route'];
} else {
	if (isset($_POST['route'])) {
	$path = $_POST['route'];
	}
}
if($path <> "") { // Checks if file really exists before including it
	$path = str_replace("\\","/",$path);
	$include_file = DASHBOARD_PATH.'/'.$path.".php";
	if(!file_exists($include_file)) {
		$include_file = DASHBOARD_PARTS_PATH.'/content-404.php';
	}
		
}

?>
<?php include_once(DASHBOARD_PARTS_PATH.'/header.php'); ?>
<?php include_once(DASHBOARD_PARTS_PATH.'/top-nav.php'); ?>
<?php //include_once(DASHBOARD_PARTS_PATH.'/sidebar.php'); ?>
<?php include_once(DASHBOARD_PARTS_PATH.'/content-top.php'); ?>
<?php 
		if($include_file <> "") {
			include($include_file);
		}  else {			
		 include(DASHBOARD_PARTS_PATH.'/content-default.php');  
		}

 ?>

<?php include_once(DASHBOARD_PARTS_PATH.'/content-bottom.php'); ?>
<?php include_once(DASHBOARD_PARTS_PATH.'/footer.php'); ?>