<?php
$client_id = '0';

if(isset($_GET['client_id']))
{
	$client_id = $_GET['client_id'];
}

 $sql = "SELECT
				*
				FROM
				tams_clients
				WHERE client_id = $client_id ;";
			
$client = DB::queryFirstRow($sql);
////print_r($employee);
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

	$mysql="SELECT 
			* 
			FROM 
			tams_client_comments
			WHERE client_id = $client_id;";

$client_comment = DB::queryFirstRow($mysql);
$client_comment_id = $client_comment['client_comment_id'];
$client_id = $client_comment ['client_id'];
$comment = $client_comment['comment'];
$created_on = $client_comment['created_on'];
$created_by = $client_comment['created_by'];
$last_modified_by = $client_comment['last_modified_by'];
$last_modified_on = $client_comment['last_modified_on'];
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
			<div class="row">
					<textarea id="comment" class="form-control" required placeholder="Enter Comment to post" value="" name="comment" id="comment" ></textarea>
									<a class='note pull pull-right btn btn-info btn-xs'>Add Note&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a> 
				</div>
<script type="text/javascript">
$("#comment").hide(); // or you can have hidden w/ CSS
$(".note").click(function(){
      $("#comment").show("slow");
});
</script>
				  <h4> Latest Comments</h4>
                  <div class="box-body bg-info ">
					
				 <?php echo $comment;  ?><br>
				  <span></span>
				
				  </div>
				  
          </div><!-- /.box Address-->          
    
</div> <!--/.col-md-12 col-sm-12-->
			  
</div> <!--/.row-->
</div> <!--/.box-body-->
 </div><!-- /.box -->
 </section> <!--/ section-content-->