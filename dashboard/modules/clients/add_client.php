<?php
echo "Add New Client";
if (isset($_POST['save'])){
	
	 
	$client_name	= $_POST['client_name'];
	$client_address = $_POST['client_address'];
	$client_city = $_POST['client_city'];
	$client_country = $_POST['client_country'];
	$client_phone_1 = $_POST['client_phone_1'];
	$client_phone_2= $_POST['client_phone_2'];
	$client_fax = $_POST['client_fax'];
	$client_email = $_POST['client_email'];
	$client_account_manager = $_POST['client_account_manager']; 
	$client_status = $_POST['client_status']; 
	$created_by = $_SESSION['user_id'];
	$created_on = getDateTime(NULL ,"mySQL");
	$last_modified_by = $_SESSION['user_id'];
	$last_modified_on = getDateTime(NULL ,"mySQL");
	
	$client_name_exists = 0;
	if (client_name_exist($client_name)){
		$client_name_exists  = -1;
		
	}
	if(($client_name_exists <> -1) AND ($client_name <> "" )  ){
	DB::insert('tams_clients', array(
				'client_name' 		=> $client_name,	
				'client_address'=> $client_address,
				'client_city' => $client_city,
				'client_country' => $client_country,
				'client_phone_1'=> $client_phone_1,
				'client_phone_2'=> $client_phone_2,
				'client_fax'=> $client_fax,
				'client_email'=> $client_email,	
				'client_account_manager'=> $client_account_manager,	
				'client_status'=> $client_status,
				'created_by' 		=> $created_by,
				'created_on'	 	=> $created_on,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
				
			)
			);
	echo '<script>alert("Added Client Successfully");</script>';
	echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/clients/view_clients");</script>';		
		}
	else
	{	
		echo '<script>alert("Failed!! Client Might Already Exist");</script>';
		
		}
}
?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          System Settings
            <small>Add Client Setup</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Add Client </li>
          </ol>
        </section>
		
<!-- Main content -->
        <section class="content">
			<div class="row">
<form role="form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']."?route=modules/clients/add_client"; ?>" >
 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add a Client</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
 
            
                  <div class="box-body" >
                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Client Name:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Enter Client Name"
							 value="" name="client_name" id="client_name">							
						  </div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
						Password:
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">
								<input   class="input-group  form-control"     type="password"  value="" placeholder="Enter Password Here" name="password" id="password"  >
								<div class="input-group-addon">
									<i class="fa fa-lock">
									</i>
								</div>
							</div>
						  
						</div>
					</div>

					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Address:
								</label>
								<div class="col-md-9 col-sm-9">
									<textarea class="form-control" required value="" name="client_address" id="client_address" placeholder="Enter Address"><?php echo $address; ?>
									</textarea>
								</div>
					</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Phone No 1
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<input class="form-control" type="tel" required placeholder="Enter Phone No" value="<?php echo $phone_no; ?>" name="client_phone_1" id="client_phone_1">
										<div class="input-group-addon">
											<i class="fa fa-phone">
											</i>
										</div>
									</div>
								</div>
							</div>
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							Last Name:
						</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" type="text" required  value="" name="last_name" id="last_name" placeholder="Enter Last Name">
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
								<input   class="input-group form-control"   placeholder="Enter  Avatar URL"   type="url"  value="" name="user_avatar_url" id="user_avatar_url"  >
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

								<option value="active" selected="selected">
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
					<input type="hidden" name="auth_code" id="auth_code" value="7445211" />
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