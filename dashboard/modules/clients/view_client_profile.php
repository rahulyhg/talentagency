<?php
$client_id = '0';
if(isset($_POST['form_name'])){
	
	$client_id = $_POST['client_id'];
	$comment = $_POST['comment'];
	$created_by = $_SESSION['user_id'];
	$created_on = getDateTime(NULL ,"mySQL");
	$last_modified_by = $_SESSION['user_id'];
	$last_modified_on = getDateTime(NULL ,"mySQL");
	if( $comment <> ""   ){
	DB::insert('tams_client_comments', array(
				'client_id' 		=> $client_id,	
				'comment'			=> $comment,
				'created_by' 		=> $created_by,
				'created_on'	 	=> $created_on,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
				
			)
			); 
	} 
	 
	 
}

if(isset($_GET['client_id'])){
	$client_id = $_GET['client_id'];
}

 $sql = "SELECT
				*
				FROM
				tams_clients
				WHERE client_id = $client_id ;";
			
$client = DB::queryFirstRow($sql);
////print_r($client);
//Basic Information
$company_name = $client['company_name'];
$logo_url = $client['logo_url'];
$client_name = $client['client_name'];
$client_title = $client['client_title'];
$client_address = $client['client_address'];
$client_city = $client['client_city'];
$client_country = $client['client_country'];
$client_phone_1 = $client['client_phone_1'];
$client_phone_2 = $client['client_phone_2'];
$client_fax = $client['client_fax'];
$client_email = $client['client_email'];
$client_account_manager = $client['client_account_manager']; 
$client_status = $client['client_status']; 
$created_on = $client['created_on'];
$created_by = $client['created_by'];
$last_modified_by = $client['last_modified_by'];
$last_modified_on = $client['last_modified_on'];

$comment_sql = "SELECT 
			* 
			FROM 
			tams_client_comments
			WHERE client_id = $client_id";

$client_comments = DB::query($comment_sql);


?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	<?php echo $client['company_name']; ?> 
            <small>Client Profile</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Client Profile</li>
          </ol>
        </section>
		
<!-- Main content -->
        <section class="content">
<!-- Default box -->
          <div class="box box-primary with-border box-solid">
            <div class="box-header ">
              <h3 class="box-title"><?php echo $company_name; ?> </h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
		<div class="box-body">        
 <!-- Row 1 Starts -->        
<div class="row">
			 <div class="col-md-4 col-sm-4">
 <!-- Image box -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $company_name; ?></h3>
              <div class="box-tools pull-right">		
				
               <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
         
			  </div>
            </div>
            <div class="box-body">
				<img src="modules/clients/comp-placeholder.png" alt="company logo" width="130px" height="99px"/>
			   <!-- <?php echo $logo_url; ?>-->			
            </div><!-- /.box-body -->
            <div class="box-footer">
             <small></small>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          </div> <!--/.col-md-4 .col-sm-4 -->
 
 <!-- Row 1 Column 1 Starts -->
       		<div class="col-md-7 col-sm-7">
 <!-- Basic Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Basic Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body bg-info">
            <div class="row">
            	<div class="col-md-9 col-sm-9  ">
	            	<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Company Name :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $company_name; ?></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 ">
	            		<p class="text-right"><strong>Client Name:</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $client_name;  ?></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6">
	            		<p class="text-right"><strong>Title/Position :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $client_title  ?> </p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 ">
	            		<p class="text-right"><strong>Client Account Manager</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $client_account_manager ?></p>
	            	</div>	            	 
              </div>
 		
             </div> 
             </form>
			 </div> 
          </div><!-- /.box Basic Information-->
		  </div> <!--/.col-md-7 col-sm-7-->
		  	  <!-- Address box --> 
			 <div class="col-md-4 col-sm-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Address</h3>
              <div class="box-tools pull-right">		
				
               <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
			  </div>
			  </div>
			   <div class="box-body bg-info">
				<div class="row">
				<div class="col-md-9 col-sm-9  ">
				  <div class="col-md-6 col-sm-6">
				  <p class="text-right"><strong>Address : </strong></p>
	            	</div>
					<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"> <?php echo $client_address; ?> </p>
	            	</div>
				 <div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>City : </strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"> <?php echo $client_city; ?> </p>
	            	</div>
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Country : </strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"> <?php echo $client_country; ?> </p>
	            </div>
				 	</div>
					</div>
					
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->
          </div> <!--/.col-md-4 .col-sm-4 -->
		  	<div class="col-md-7 col-sm-7">
		  <!-- Contact Information box -->       			
       		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Contact Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-gray">
				  <div class="row">
	            	<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Phone Number : </strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $client_phone_1; ?></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Mobile Number :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $client_phone_2; ?>&nbsp;</p>
	            	</div>
					<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Fax :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $client_fax; ?>&nbsp;</p>
	            	</div>
	            	<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Email : </strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"> <?php echo $client_email; ?> </p>
	            	</div>		            						  
              	
              </div>
				  </div>
          </div><!-- /.box Contact Information-->
		  </div> <!--/.col-md-7 col-sm-7-->
		  <div class="col-md-12 col-sm-12">
		     <!-- Comment box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Client Notes
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

				  
                  <div class="box-body bg-info ">
<form role="form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']."?route=modules/clients/view_client_profile&client_id=".$client_id; ?>" >
<div class="form-group" style="margin:10px;">
			<textarea  name="comment" id="comment" class="form-control" required placeholder="Enter a New Note" ></textarea>
</div>
		<!-- Hidden Fields -->
					<input type="hidden" name="form_name" id="form_name" value="add_client_comments" />
					<input type="hidden" name="client_id" id="client_id" value="<?php echo $client_id; ?>" />
					 
					<!-- /Hidden Fields --> 

<div class="form-group" style="margin:10px;" >
					<button type="submit" name="save" id="save_note_btn" value="save" class="note  pull-right btn btn-default btn-lg">Add Note&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></button> 
			 </div>
			 </form>  
			 <hr>
			 <p>
				 <?php
				 if ($client_comments) {
				 	foreach($client_comments as $comment) {
						print_r($comment);
					}
				 } else {
				 
				  echo "No Client Comments Added";  
				  	
				 }
				 
				  
				  
				  
				  ?>
			</p>
			
			
				</div>	
				
			 
				  
          </div><!-- /.box Comments-->          
    
</div> <!--/.col-md-12 col-sm-12-->
			  
</div> <!--/.row-->
</div> <!--/.box-body-->
 </div><!-- /.box -->
 </section> <!--/ section-content-->