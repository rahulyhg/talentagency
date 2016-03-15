<?php
if(isset($_GET['talent_list_id']))
{
$talent_list_id = $_GET['talent_list_id'];

$sql = "SELECT * FROM tams_talent WHERE talent_id IN (
SELECT talent_id 
FROM tams_talent_list_items
WHERE talent_list_id= $talent_list_id)";
$sql .= 'LIMIT 20';
$get_talents = DB::query($sql);
}
if(isset($_GET['talent_list_id'])){
	$talent_list_id = $_GET['talent_list_id'];

		$sql = "SELECT
				*
				FROM
				tams_talent_lists
				WHERE talent_list_id = $talent_list_id ;";
$talent= DB::queryFirstRow($sql);
$talent_list_id = $talent['talent_list_id'];
$talent_list_title = $talent['talent_list_title'];
$talent_list_details = $talent['talent_list_details'];
$created_on = $talent['created_on'];
$created_by = $talent['created_by'];
$last_modified_by = $talent['last_modified_by'];
$last_modified_on = $talent['last_modified_on'];
}

?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          <?php echo $talent_list_title; ?>
            <small>View All Talents in List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">View Talent List</li>
          </ol>
        </section>

        <!-- Main content -->
  <!-- Main content -->
        <section class="content">
<form enctype="multipart/form-data" id="view_talent_list" name="view_talent_list" class="form-horizontal" method="post" action="process_talent_lists.php?talent_list_id=<?php echo $talent_list_id; ?>" >
<!-- Default box -->
           <div class="box">
            <div class="box-header with-border">
             <h3 class="box-title"><?php echo $talent_list_title; ?></h3>
            <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div><!-- /box hearder close --> 
			
					<div class="box-body">
				<div class="row">
                  <div class="box-body" >
	            	<label class="col-md-3 col-sm-3 text-left"> Details:</label>
					
				</div>	  
	            	<div class="col-md-3 col-sm-3 "> 
	            		<p class="text-left"><?php echo $talent_list_details; ?> &nbsp;</p>
	            	</div>
				</div>	  
		</div> <!--.row-->
				
			<div class="box-footer">
			 <div class="form-group"  >
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent_lists/edit_talent_list&talent_list_id=$talent_list_id"?>">Edit List &nbsp; <i class="fa fa-edit"></i></a>			
					</div>	<!-- /.col -->
				 </div>		<!-- /form-group -->
            </div><!-- /.box-footer-->
		</div> <!--.box-->
			<div class="box">
			<div class="box-header with-border">
              <h3 class="box-title">Talents In This List</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
		<div class="box-body" >
		<div class="row">
		<?php 
		foreach($get_talents as $talent) {  
					  
		?>			
	        <div class="col-md-12 col-sm-12" >
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user text-center">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $talent['first_name']." ".$talent['last_name']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $talent['sex'].",&nbsp;". getAge($talent['dob']);  ?> Years</h5>
            </div>
            
            <div class="box-footer">
            <div class="row">
			<img class="img-circle" src="<?php echo $talent['photo1_url']; ?>"  alt="talent_photo"  />&nbsp;
			<img class="img-circle" src="<?php echo $talent['photo2_url']; ?>"  alt="talent_photo"  />
            </div>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>	<!--.col-->			
			
<?php 
}		  

?>			
			</div> <!--.row-->
			</div> <!--.box-body-->
			</div> <!--.box-->
			<div class="box">
			<div class="box-header with-border">
              <h3 class="box-title">View Talent List</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
		<div class="box-body" >
		<div class="row">
			<div class="form-group">
					<div class="col-sm-6">
						<a style="margin-right:10px;" class='btn btn-success btn-lg' href="#">
							HTML Preview&nbsp;
							<i class="fa fa-search">
							</i>
						</a>
					</div>	<!-- /.col -->
					<div class="col-sm-6">
						<a style="margin-right:10px;" class='btn btn-success btn-lg' href="#">
							Download PDF&nbsp;
							<i class="fa fa-download">
							</i>
						</a>
					</div>	<!-- /.col -->
					</div>		<!-- /form-group -->
			</div> <!--.row-->
			</div> <!--.box-body-->
			</div> <!--.box-->
		<div class="box">
			<div class="box-header with-border">
              <h3 class="box-title">Send List to Client</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

		<div class="box-body">
		
		<div class="row" >
<?php
			// List of Clients

$sql    = "SELECT
*
FROM
tams_clients
WHERE client_status = 'active'
ORDER BY company_name";

$clients_list = DB::query($sql);

?>
		<?php
		if($clients_list )
		{
			?>

					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Clients List :
						</label>
					<div class="col-md-9 col-sm-9">
						<div class="input-group">
						<select name="client_id" id="client_id" class=" input-group form-control  select"  style="padding:5px;"  >
					
							<option value="">
								Select a Client
							</option>
	
							<?php 
							foreach($clients_list as $list){
								?>	
							<option value="<?php echo $list['client_id'];?>">
								<?php echo $list['company_name'];?>
							</option>
							<?php
							} // for each $clients_list									
							?>

						</select>
						</div>
					</div>

	
			</div> <!--/.form-group-->      
		 <?php

		}  // End if $clients_list

		?>

		</div>
			</div>
			
		<div class="box-body" >
		<div class="row">
			<div class="form-group">
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent_lists/contact_client&talent_list_id='.$talent_list_id"?>">
							Contact Client &nbsp;
							<i class="fa fa-chevron-circle-right">
							</i>
						</a>
					</div>	<!-- /.col -->
			</div>		<!-- /form-group -->
			</div> <!--.row-->
			</div> <!--.box-body-->
			</div> <!--.box-->
			</form>
			
			</section><!-- /close section --> 
			
<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="view_talent_list" />
<input type="hidden" name="talent_list_id" id="talent_list_id" value="<?php echo $_GET['talent_list_id']; ?>" />					 
<!-- /Hidden Fields --> 
			