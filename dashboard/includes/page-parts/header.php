<?php 
$role_id =0;

if(isset($_SESSION['role_id']))
{
	$role_id = $_SESSION['role_id'];
}
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> TAMS | <?php echo $_SESSION['full_name']; ?> Dashboard </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

<?php  
include_once('header-scripts.php'); ?>
 <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
     <style>
 	
 	.login-page, .register-page {
    background: #080808 none repeat scroll 0% 0%;
}
 </style> 
  </head>
<body class="skin-black layout-top-nav layout-boxed  ">
    <!-- Site wrapper -->
    <div class="wrapper">  