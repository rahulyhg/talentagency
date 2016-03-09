<?php
 
if (isset($_POST['save'])){
/*	
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
*/
 
	$talent_list_title	=  $_POST['talent_list_title'] ;
	$talent_list_details	=  $_POST['talent_list_details'] ;
	$created_by = $_SESSION['user_id'];
	$created_on = getDateTime(NULL ,"mySQL");
	$last_modified_by = $_SESSION['user_id'];
	$last_modified_on = getDateTime(NULL ,"mySQL");
	
	// TODO: write a function to check language name already exists

	if($talent_list_title <> ""  ){
	DB::insert('tams_talent_lists', array(
				'talent_list_title' 		=> $talent_list_title,	
				'talent_list_details' 		=> $talent_list_details,			
				'created_by' 		=> $created_by,
				'created_on'	 	=> $created_on,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
				
			)
			);
	echo '<script>alert("Added Talent List Successfully");</script>';
	echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/talent_lists/saved_talent_lists");</script>';		
		}
	else
	{	
		echo '<script>alert("Failed!! Unable to Add Talent List Please Go Back and Try again");</script>';
		
		}
}
 
?>

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          Manage Talent Lists
            <small>Create New Talent List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Add Talent List</li>
          </ol>
        </section>

        <!-- Main content -->
		  <!-- Main content -->
        <section class="content">
<form id="add_talent_list" name="add_talent_list" class="form-horizontal" method="post" action="process_talent_lists.php?talent_list_id=<?php echo $talent_list_id; ?>" >
 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Talent List</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
			
		
                  <div class="box-body" >
                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Talent List Title:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Add Talent List Title Here" 
							 value="" name="talent_list_title" id="talent_list_title">							
						  </div>
					</div>

                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Talent List Details:</label>
						  <div class="col-md-9 col-sm-9">
							 <textarea class="form-control" required placeholder="Add Talent List Details Here" 
							 value="" name="talent_list_details" id="talent_list_details">	
							</textarea>
			<script>
                // Replace the <textarea id="talent_list_details"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'talent_list_details' );
            </script>
						  </div>
					</div>
				</div><!-- /.box-body -->
			<!-- Hidden Fields -->
			<input type="hidden" name="form_name" id="form_name" value="add_talent_list" />
					 
			<!-- /Hidden Fields --> 
			<div class="box-footer">
			 <div class="form-group"  >
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent_lists/saved_talent_lists"?>">Cancel &nbsp; <i class="fa fa-chevron-circle-right"></i></a>					
						<button style="margin-right:10px;" type="submit" class='btn btn-success btn-lg pull-right' name="save" value="save">Save &nbsp; <i class="fa fa-chevron-circle-right"></i></button>
					</div>	<!-- /.col -->
				 </div>		<!-- /form-group -->
            </div><!-- /.box-footer-->
		 </div> <!--/.box-->
</form>
</section>