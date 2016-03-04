<?php
ob_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'teamsutlej_talent');
$connection = mysql_connect(localhost, talent,"") or die(mysql_error());
$database = mysql_select_db('teamsutlej_talent') or die(mysql_error());
?>