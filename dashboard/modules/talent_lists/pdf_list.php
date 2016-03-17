<?php
 ini_set('max_execution_time', 60); //300 seconds = 5 minute
include_once('functions.php');
  
$user_id =0;

if(isset($_SESSION['user_id']))
{
	$user_id = $_SESSION['user_id'];
}else {
	$user_id = 1;
}

?><?php

if(isset($_GET['talent_list_id']))
{
		$talent_list_id = $_GET['talent_list_id'];
}else{
		$talent_list_id = '1';
}
$sql = "SELECT * FROM tams_talent_lists WHERE (talent_list_id='$talent_list_id')";
$talent_list = DB::queryFirstRow($sql);
?>
<!--- Talent List--->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Talent Agency |</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo SITE_ROOT;  ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     
   <!-- Theme style -->

    <link href="<?php echo SITE_ROOT;  ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<style>
body {
	font-family: Arial, san-serifs;
	font-size:11px;
	line-height:1.5;
	
}
td, th {
	padding:2px,3px;
}
</style>
     
  </head>
<body class="">
    <!-- Site wrapper -->
    <div class="wrapper"> 
    
          <section class="invoice">
          <!-- info row -->
          <h3 class="text-center"> <?php echo $talent_list['talent_list_title']; ?></h3>
          <h4 class="text-center"> <?php echo $talent_list['talent_list_details']; ?></h4>
		  <div class="row invoice-info">
            
            <div style="width:400px;" class="col-sm-9 col-md-9 col-xs-9 invoice-col">
              <address>
<?php  
$my_sql = "SELECT * FROM tams_clients WHERE client_id = $client_id;";
$client = DB::query($my_sql);
?>
                <strong><?php echo $client['company_name'];?></strong><br>
                <?php echo $client['client_address']; ?><br>
                <?php echo $client['client_city'].''.$client['client_country']; ?><br>
               <i> Phone:</i> <?php echo $client['client_phone_1']; ?><br/>
			   <i> Phone:</i> <?php echo $client['client_phone_2']; ?><br/>
               <i> FAX:</i> <?php echo $client['client_fax']; ?><br/>
               <i> Email:</i> <?php echo $client['client_email']; ?>
              </address>
            </div><!-- /.col-sm-9 col-md-9 -->
            <div class=" col-sm-2 col-md-2 col-xs-2 invoice-col">
              <img style="align:right;" class="text-right image-responsive" src="<?php echo SITE_ROOT.'uploads/clients/_logo';?>" height="100px"/>
            </div><!-- /.col-sm-3 col-md-3-->
          </div><!-- /.row -->
		  
		  <div class="row ">
            
            <div class="col-xs-5 col-sm-5 col-md-5 table-responsive">
       
            </div><!-- /.col-xs-6 col-sm-6 col-md-6 -->
         <div class="col-xs-5 col-sm-5 col-md-5 table-responsive">
              
            </div><!-- /.col-xs-6 col-sm-6 col-md-6 -->
          </div>
		  </section>   
    </div><!-- ./wrapper -->
<div class="row" style="position: absolute; bottom:0; padding-bottom: 10px;">
			 <table class="table">
			  
                <thead>
                  <tr>
                    <td align="center"> <strong><?php echo $client['company_name'];?></strong>  <?php echo $client['client_address'].' '.$client['client_city'].' '.$client['client_country'];  ?></td>
                  </tr>
                </thead>
              </table>
</div>    
   <!-- Entering footer scripts file -->
 
  <!-- Exited footer scripts file -->

  </body>
</html>

