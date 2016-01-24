<?php
if (isset($_POST['save'])){
	
	$user_id = $_POST['user_id'];
	$user_name	= $_POST['user_name'];
	$user_title = $_POST['user_title'];
	$first_name = $_POST['first_name'];
	$last_name  = $_POST['last_name'];
	$user_email = $_POST['user_email'];
	$user_role  = $_POST['user_role'];
	$user_avatar_url = $_POST['user_avatar_url'];
	$password = $_POST['password'];
	$auth_code = $_POST['auth_code']; 
	$user_status = $_POST['user_status']; 
	$created_by = $_SESSION['user_id'];
	$created_on = getDateTime(NULL ,"mySQL");
	$last_modified_by = $_SESSION['user_id'];
	$last_modified_on = getDateTime(NULL ,"mySQL");
	

	if (user_name_exist($user_name)){
		$user_name_exists  = -1;
		
	}
	if(($user_name <> -1) AND ($user_name <> "" ) ){
	DB::insert('tams_users', array(
				'user_name' 		=> $user_name,	
				'user_role' 		=> $user_role,	
				'created_by' 		=> $created_by,
				'created_on'	 	=> $created_on,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
				
			)
			);
	echo '<script>alert("Added User Successfully");</script>';
	echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/users/view_user_profile");</script>';		
		}
	else
	{	
		echo '<script>alert("Failed!! User Might Already Exist");</script>';
		
		}
}
?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          System Settings
            <small>Add User Setup</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Add User </li>
          </ol>
        </section>
		
<!-- Main content -->
        <section class="content">
			<div class="row">
<form role="form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']."?route=modules/users/add_user"; ?>" >
 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add a User</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
 
            
                  <div class="box-body" >
                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> User Login Name:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required 
							 value="" name="user_role_name" id="user_role_name">							
						  </div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							User Title:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="user_title" name="user_title" class="form-control">
								<option value="">
									-Select Title-
								</option>
								<option value="Mr."  >
									Mr.
								</option>
								<option value="Mrs."    >
									Mrs.
								</option>
								<option value="Miss" >
									Miss
								</option>
								<option value="Ms."  >
									Ms.
								</option>
								<option value="Dr."  >
									Dr.
								</option>
							</select>
						</div>
					</div>
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							First Name:
						</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" type="text" required  value="" name="first_name" id="first_name">
						</div>
					</div>

					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							Last Name:
						</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" type="text" required  value="" name="last_name" id="last_name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Email :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">

								<input   class="input-group email form-control"     type="email" required value="" name="user_email" id="user_email"  >
								<div class="input-group-addon">
									<i class="fa fa-envelope">
									</i>
								</div>
							</div>
						</div>
					</div>					
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							User Role:
						</label>
						<div class="col-md-9 col-sm-9">
							<select required id="role_id" name="role_id" class="form-control">
																
								<option value="">
									-Select User Role-
								</option>
<?php 
$sql = "SELECT * FROM tams_user_roles";
$roles = DB::query($sql);
if ($roles) {
	foreach ($roles as $role) {
		echo '<option value ="'.$role['role_id'].'"  ';
		echo ' > '.$role['role_name'].' </option>';
	}	
		
}
?>							
							</select>
						</div>
					</div>
					 
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Avatar URL :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">
								<input   class="input-group email form-control"   placeholder="Enter  Avatar URL"   type="url"  value="" name="user_avatar_url" id="user_avatar_url"  >
								<div class="input-group-addon">
									<i class="fa fa-user">
									</i>
								</div>
							</div>
						</div>
					</div>							
					

					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							User Status:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="user_status" name="user_status" class="form-control">

								<option value="active" selected="selected"
									Active
								</option>
								<option value="disabled"   >
									Disabled
								</option>
							</select>
						</div>
					</div>
 
					<!-- Hidden Fields -->
					<input type="hidden" name="form_name" id="form_name" value="add_user_form" />

					<!-- /Hidden Fields -->


				</div><!-- /.box-body -->
				<div class="box-footer">
					<div class="form-group"  >
						<div class="col-sm-12">
							<button style="margin-right:10px;"  type="submit" class='btn btn-success btn-lg pull-right' name="save" value="save">
								Save &nbsp;
								<i class="fa fa-chevron-circle-right">
								</i>
							</button>
							<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/users/list_users"?>">
								Cancel &nbsp;
								<i class="fa fa-chevron-circle-right">
								</i>
							</a>
						</div>	<!-- /.col -->
					</div>		<!-- /form-group -->
				</div><!-- /.box-footer-->
			</div><!-- /.box -->
		</form>
	</div><!-- /.row -->

</section><!-- /.content -->	

                 