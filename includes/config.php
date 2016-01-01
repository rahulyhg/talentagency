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
	
define('FOLDER_NAME','payapp2');
define('ROOT_PATH', realpath(dirname(__FILE__)."/../").'/');
define('ADMIN_PATH', ROOT_PATH.'app-admin');
define('ADMIN_PARTS_PATH', ROOT_PATH.'app-admin/includes/page-parts');
define('CLIENTS_PATH', ROOT_PATH.'clients-portal');
define('CLIENTS_PARTS_PATH', ROOT_PATH.'clients-portal/includes/page-parts');
define('COMPANY_PATH', ROOT_PATH.'mycompany');
define('COMPANY_PARTS_PATH', ROOT_PATH.'mycompany/includes/page-parts');
define('UPLOADS_PATH', ROOT_PATH.'uploads/');

define('SITE_ROOT', 'http://'.$_SERVER['HTTP_HOST'].'/'.FOLDER_NAME.'/');
define('DB_PREFIX', '');

	

	?>
