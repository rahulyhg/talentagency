<?php
if (isset($_POST['save'])){
	
	 
	$experience_item_name = $_POST['experience_item_name'];
	$experience_item_desc = $_POST['experience_item_desc'];
	$experience_item_status = $_POST['experience_item_status']; 
	$created_by = $_SESSION['user_id'];
	$created_on = getDateTime(NULL ,"mySQL");
	$last_modified_by = $_SESSION['user_id'];
	$last_modified_on = getDateTime(NULL ,"mySQL");
	
	// TODO: write a function to check experience type already exists
	
	if(($experience_item_name <> "" )  ){
	DB::insert('tams_experience_items', array(
				'experience_item_name' 		=> $experience_item_name,	
				'experience_item_desc'=> $experience_item_desc,
				'experience_item_status'=> $experience_item_status,
				'created_by' 		=> $created_by,
				'created_on'	 	=> $created_on,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
				
			)
			);
	echo '<script>alert("Added Experience Type Successfully");</script>';
	echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/experience_types/list_experience_types");</script>';		
		}
	else
	{	
		echo '<script>alert("Failed!! Unable to Add Experience Type Please Go Back and Try again");</script>';
		
		}
		}

?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          System Settings
            <small>Experience List Setup</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Add Experience Type</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<form role="form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']."?route=modules/experience_types/add_experience_type"; ?>" >
 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Experience Type</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
 
            
                  <div class="box-body" >
                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Experience Type Name:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Add Experience Type Name Here" 
							 value="" name="experience_item_name" id="experience_item_name">							
						  </div>
					</div>
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Type Description:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Add Experience Type Description Here"
							 value="" name="experience_item_desc" id="experience_item_desc">							
						  </div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Type Status:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="experience_item_status" name="experience_item_status" class="form-control">

								<option value="active" selected="selected">
									Active
								</option>
								<option value="disabled"   >
									Disabled
								</option>
							</select>
						</div>
					</div>
					 					 
				 
				</div><!-- /.box-body -->
		<!-- Hidden Fields -->
					<input type="hidden" name="form_name" id="form_name" value="add_experience_type_form" />
					 
					<!-- /Hidden Fields -->   	   
            
            <div class="box-footer">
			 <div class="form-group"  >
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/experience_types/list_experience_types"?>">Cancel &nbsp; <i class="fa fa-chevron-circle-right"></i></a>					
						<button style="margin-right:10px;" type="submit" class='btn btn-success btn-lg pull-right' name="save" value="save">Save &nbsp; <i class="fa fa-chevron-circle-right"></i></button>
					</div>	<!-- /.col -->
				 </div>		<!-- /form-group -->
            </div><!-- /.box-footer-->
          </div><!-- /.box --></form>
     	 </section><!-- /.content -->