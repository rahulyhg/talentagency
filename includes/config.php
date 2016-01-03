<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
if(session_id() == '') {
    session_start();
 
}
  
// Define System CONSTANTS
define('SYSTEM_ENCODING', 'utf8' );
define('BR','</br>');

include_once('db_config.php');
	
define('FOLDER_NAME','talent');
define('ROOT_PATH', realpath(dirname(__FILE__)."/../").'/');
define('DASHBOARD_PATH', ROOT_PATH.'dashboard');
define('DASHBOARD_PARTS_PATH', ROOT_PATH.'dashboard/includes/page-parts');
define('UPLOADS_PATH', ROOT_PATH.'uploads/');

define('SITE_ROOT', 'http://'.$_SERVER['HTTP_HOST'].'/'.FOLDER_NAME.'/');
define('DB_PREFIX', '');

	

	?>
