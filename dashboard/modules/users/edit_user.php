<?php
$user_id = 0;
$user_name = "";
$user_title = "";
$first_name = "";
$last_name = "";
$user_email = "";
$role_id = 0;
$user_avatar_url = "";
$auth_code = "";
$user_status = "";  
$created_on = "";
$created_by = "";
$last_modified_by = "";
$last_modified_on = "";

if(isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];

		$sql = "SELECT
				*
				FROM
				tams_users
				WHERE user_id = $user_id ;";
$user= DB::queryFirstRow($sql);
$user_id = $user['user_id'];
$user_name = $user['user_name'];
$user_title = $user['user_title'];
$first_name = $user['first_name'];
$last_name = $user['last_name'];
$user_email = $user['user_email'];
$role_id = $user['role_id'];
$user_avatar_url = $user['user_avatar_url'];
if ($user_avatar_url == "") {
	$userMail = $user_email;

$imageWidth = '150'; //The image size

$user_avatar_url = 'http://www.gravatar.com/avatar/'.md5($userMail).'fs='.$imageWidth;
}
$auth_code = $user['auth_code']; 
$user_status = $user['user_status']; 
$created_on = $user['created_on'];
$created_by = $user['created_by'];
$last_modified_by = $user['last_modified_by'];
$last_modified_on = $user['last_modified_on'];

}
 


if(isset($_POST['save']))
{
 
	$user_id = $_POST['user_id'];
	$user_title = $_POST['user_title'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$user_email = $_POST['user_email'];
	$role_id = $_POST['role_id'];
	$user_avatar_url = $_POST['user_avatar_url'];
	$password = $_POST['password'];
	$auth_code = $_POST['auth_code']; 
	$user_status = $_POST['user_status']; 
	$last_modified_by = $_SESSION['user_id'];
	$last_modified_on = getDateTime(NULL,"mySQL");
 
	if($user_id <> ""){
		$update = DB::update('tams_users', array(
				'user_title'=> $user_title,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'user_email'=> $user_email,
				'user_avatar_url'=> $user_avatar_url,
				'role_id'=> $role_id,
				'user_status'=> $user_status,
				'auth_code'=> $auth_code,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"user_id=%s", $user_id
		);
		if(($password <> "") OR ($password <> "unchanged")){
		$update_password = DB::update('tams_users', array(
				'password'=> md5($password),
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"user_id=%s", $user_id
		);	
		}
		if($update)
		{
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/users/list_users");</script>';
		}
	}
	 
echo "<pre>";
print_r($_POST);
echo "</pre>";
 
}


?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		System Settings
		<small>
			Edit a User
		</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo SITE_ROOT; ?>">
				<i class="fa fa-dashboard">
				</i>Home
			</a>
		</li>
		<li>
			<a href="#">
				Dashboard
			</a>
		</li>
		<li class="active">
			Edit a User
		</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- Profile box -->
		<form role="form"class="form-horizontal" method="post"
		     action="<?php echo $_SERVER['PHP_SELF']."?route=modules/users/edit_user"; ?>">
			<div class="box col-md-6 col-sm-6 col-sx-12">
				<div class="box-header with-border">
					<h3 class="box-title">
						Editing <?php echo $user['user_title']." ".$user['first_name']." ".$user['last_name']; ?> Profile
					</h3>
					<div class="box-tools pull-right">

						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box">
							<i class="fa fa-minus">
							</i>
						</button>
						<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times">
							</i>
						</button>
					</div>
				</div>
				<div class="box-body">

					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							UserID:
						</label>
						<div class="col-md-9 col-sm-9">
							<?php echo $user_id; ?>
						</div>
					</div>
 
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							User Login Name:
						</label>
						<div class="col-md-9 col-sm-9">
							<?php echo $user_name; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Change Password:
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">
								<input   class="input-group email form-control"     type="password"  value="unchanged" name="password" id="password"  >
								<div class="input-group-addon">
									<i class="fa fa-lock">
									</i>
								</div>
							</div>
						 Only Change this if you want to reset user password
						</div>
					</div>	
					
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Title:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="user_title" name="user_title" class="form-control">
								<option value="">
									-Select Title-
								</option>
								<option value="Mr."   <?php if($user_title == "Mr."){ echo 'selected = "selected" ';} ?> >
									Mr.
								</option>
								<option value="Mrs."    <?php if($user_title == "Mrs."){ echo 'selected = "selected" ';} ?>>
									Mrs.
								</option>
								<option value="Miss"   <?php if($user_title == "Miss"){ echo 'selected = "selected" ';} ?>>
									Miss
								</option>
								<option value="Ms."   <?php if($user_title == "Ms."){ echo 'selected = "selected" ';} ?>>
									Ms.
								</option>
								<option value="Dr."   <?php if($user_title == "Dr."){ echo 'selected = "selected" ';} ?>>
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
							<input class="form-control" type="text" required  value="<?php echo $first_name; ?>" name="first_name" id="first_name">
						</div>
					</div>

					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							Last Name:
						</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" type="text" required  value="<?php echo $last_name; ?>" name="last_name" id="last_name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Email :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">

								<input   class="input-group email form-control"     type="email" required value="<?php echo $user_email; ?>" name="user_email" id="user_email"  >
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
							<select id="role_id" name="role_id" class="form-control">
																
								<option value="">
									-Select User Role-
								</option>
<?php 
$sql = "SELECT * FROM tams_user_roles";
$roles = DB::query($sql);
if ($roles) {
	foreach ($roles as $role) {
		echo '<option value ="'.$role['role_id'].'"  ';
		if ($role_id == $role['role_id']){
			echo ' selected="selected" ';
		}
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
								<input   class="input-group email form-control"     type="url"  value="<?php echo $user_avatar_url; ?>" name="user_avatar_url" id="user_avatar_url"  >
								<div class="input-group-addon">
									<i class="fa fa-user">
									</i>
								</div>
							</div>
							<img src="<?php echo $user_avatar_url; ?>" alt="avatar" />
						</div>
					</div>							
					

					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							User Status:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="user_status" name="user_status" class="form-control">

								<option value="active" <?php if($user_status == "active"){ echo 'selected = "selected" ';} ?> >
									Active
								</option>
								<option value="disabled"   <?php if($user_status != "active"){ echo 'selected = "selected" ';} ?>>
									Disabled
								</option>
							</select>
						</div>
					</div>
					
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							Password Reset Code:
						</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" type="text"    value="<?php echo $auth_code; ?>" name="auth_code" id="auth_code">
						</div>
					</div>					

					
										
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							History:
						</label>
						<div class="col-md-9 col-sm-9">
							<p>
								This entry was created on
								<strong>
									<?php echo getDateTime($created_on,"dtLong"); ?>
								</strong>by
								<strong>
									<?php echo get_user_name($created_by); ?>
								</strong>.
							</p>
							<p>
								It was last modified on
								<strong>
									<?php echo getDateTime($last_modified_on,"dtLong"); ?>
								</strong>by
								<strong>
									<?php echo get_user_name($last_modified_by); ?>
								</strong>.
							</p>
						</div>
					</div>
					<!-- Hidden Fields -->
					<input type="hidden" name="form_name" id="form_name" value="edit_user_form" />
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
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