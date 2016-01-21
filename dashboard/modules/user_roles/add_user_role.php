<?php
 
 
if (isset($_POST['save'])){
	
	$user_role_name	=  $_POST['user_role_name'] ;
	$created_by = $_SESSION['user_id'];
	$created_on = getDateTime(0 ,"mySQL");
	$last_modified_by = $_SESSION['user_id'];
	$last_modified_on = getDateTime(0 ,"mySQL");
	

	if (user_role_name_exist($user_role_name)){
		$user_role_exists  = -1;
		
	}
	if(($user_role_name <> -1) AND ($user_role_name <> "" ) ){
	DB::insert('tams_user_roles', array(
				'role_name' 		=> $user_role_name,	
				'created_by' 		=> $created_by,
				'created_on'	 	=> $created_on,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
				
			)
			);
	echo '<script>alert("Added User Role Successfully");</script>';
	echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/user_roles/view_user_roles");</script>';		
		}
	else
	{	
		echo '<script>alert("Failed!! User Role Might Already Exist");</script>';
		
		}
}
 
?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          System Settings
            <small>User Roles Setup</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Add User Role</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<form role="form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']."?route=modules/user_roles/add_user_role"; ?>" >
 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add a User Role</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
 
            
                  <div class="box-body" >
                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> User Role Name:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required 
							 value="" name="user_role_name" id="user_role_name">							
						  </div>
					</div>
					 
				 
				</div><!-- /.box-body -->
   	   
            
            <div class="box-footer">
			 <div class="form-group"  >
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/user_roles/view_user_roles"?>">Cancel &nbsp; <i class="fa fa-chevron-circle-right"></i></a>					
						<button style="margin-right:10px;" type="submit" class='btn btn-success btn-lg pull-right' name="save" value="save">Save &nbsp; <i class="fa fa-chevron-circle-right"></i></button>
					</div>	<!-- /.col -->
				 </div>		<!-- /form-group -->
            </div><!-- /.box-footer-->
          </div><!-- /.box --></form>
     	 </section><!-- /.content -->