<?php
	$user_role_id = 0;
	$user_role_name = "";
	$user_role_description = "";
	$created_by = "";
	$created_on = "";
	$last_modified_by = "";
	$last_modified_on = "";

if(isset($_GET['role_id'])){
	$role_id = $_GET['role_id'];
	$role = DB::queryFirstRow("SELECT * from tams_user_roles WHERE role_id = $role_id;");	
	
	if($role){
		
	$user_role_id = $role['role_id'];
	$user_role_name = $role['role_name'];
	$user_role_description = $role['role_description'];
	$created_by = $role['created_by'];
	$created_on = $role['created_on'];
	$last_modified_by = $role['last_modified_by'];
	$last_modified_on = $role['last_modified_on'];			
	}
	
}

 
 
if (isset($_POST['save'])){
	
	$user_role_id	=  $_POST['user_role_id'] ;
	$user_role_name	=  $_POST['user_role_name'] ;
	$user_role_description	=  $_POST['user_role_description'] ;
	$last_modified_by = $_SESSION['user_id'];
	$last_modified_on = getDateTime(NULL,"mySQL");
	

	DB::update('tams_user_roles', array(
				'role_name' 		=> $user_role_name,	
				'role_description'  => $user_role_description,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
				
			),
			"role_id=%s", $user_role_id
			);
	echo '<script>alert("User Role Modified Successfully");</script>';
	echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/user_roles/view_user_roles");</script>';		
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
            <li class="active">Edit User Role</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<form role="form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']."?route=modules/user_roles/edit_user_role"; ?>" >
 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Editing User Role</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
 
            
                  <div class="box-body" >
                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Role ID:</label>
						  <div class="col-md-9 col-sm-9">
						  <?php echo $user_role_id; ?>
						  </div>
					</div>
                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> User Role Name:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required 
							 value="<?php echo $user_role_name; ?>" name="user_role_name" id="user_role_name">							
						  </div>
					</div>

                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Role Description:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required 
							 value="<?php echo $user_role_description; ?>" name="user_role_description" id="user_role_description">							
						  </div>
					</div>
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> History:</label>
						  <div class="col-md-9 col-sm-9">
						  <p>This entry was created on<strong><?php echo getDateTime($created_on,"dtLong"); ?></strong>  by <strong> <?php echo get_user_name($created_by); ?></strong>.</p> <p> It was last modified on <strong><?php echo getDateTime($last_modified_on,"dtLong"); ?> </strong> by <strong> <?php echo get_user_name($last_modified_by); ?></strong>.</p>							
						  </div>
					</div>
<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_user_role_form" />
<input type="hidden" name="user_role_id" id="user_role_id" value="<?php echo $user_role_id; ?>" />
<!-- /Hidden Fields -->					 					 
				 
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