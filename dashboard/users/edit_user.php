<?php
if(isset($_SESSION['user_id'])){
$user_id	=	$_SESSION['user_id'];
}

if(isset($_POST['save'])){
	

unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['user_email']);
unset($_SESSION['user_avatar_url']);

$first_name	=	$_POST['first_name'];
$last_name	=	$_POST['last_name'];
$user_email		=	$_POST['user_email'];
$user_avatar_url = $_POST['user_avatar_url'];
	if($user_id<>"")
	   {
		$update=	DB::update('tams_users', array(	
						'first_name'  => $first_name,
						'last_name' 	 => $last_name,
						'user_email' 	 => $user_email,
						'user_avatar_url' => $user_avatar_url,
					),
					"user_id=%s", $user_id
					);
		if($update){
			
			$_SESSION['first_name'] 	=	$first_name;
			$_SESSION['last_name'] 	=	$last_name;
			$_SESSION['user_email'] 		=	$user_email;
			$_SESSION['user_avatar_url'] = $user_avatar_url;
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=users/my_profile");</script>';	
		}
	}
}


?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	 My Account
            <small>Edit My Profile</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">My Account</a></li>
            <li class="active">Edit My Profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <div class="col-md-3 col-sm-3">
 <!-- Image box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Avatar</h3>
              <div class="box-tools pull-right">		
				
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              <div class="form-group">
				<div class="input-group-addon">
					<i class="fa fa-user">
					</i>
					</div>		
							
			<input  class="input-group email form-control"     type="url"  value="<?php echo $_SESSION['user_avatar_url']; ?>" name="user_avatar_url" id="user_avatar_url"  >
				
						
			
						
					</div>		
			  </div>
            </div>
            <div class="box-body">
				<img src="<?php echo $_SESSION['user_avatar_url']; ?>" alt="avatar" />
						
            </div><!-- /.box-body -->
            <div class="box-footer">
             <small></small>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          </div> <!--/.col-md-3 .col-sm-3 -->
           <div class="col-md-9 col-sm-9">
          <!-- Profile box -->
		  <form role="form"class="form-horizontal" method="post" 
		     action="<?php echo $_SERVER['PHP_SELF']."?route=users/edit_user"; ?>">
          <div class="box col-md-6 col-sm-6 col-sx-12">
            <div class="box-header with-border">
              <h3 class="box-title">Edit My Profile</h3>
              <div class="box-tools pull-right">
			  
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
				<table class="table table-responsive table-bordered table-striped" >
					<thead>
					<tr>
						<th width="25%"></th>	
						<th width="75%"></th>	
					</tr>	
					</thead>
					<tbody>
					<!-- UserName -->
					<tr>
						<td>
						<strong>User Name</strong>	
						</td>	
						<td>
						<input class="form-control" type="text" required 
						 value="<?php echo $_SESSION['user_name']; ?>" name="user_name" id="user_name">	
						</td>	
					</tr>
					<!-- /UserName -->
					<!-- First Name -->
					<tr>
						<td>
						<strong>First Name</strong>	
						</td>	
						<td>
						<input class="form-control" type="text" required 
						 value="<?php echo $_SESSION['first_name']; ?>" name="first_name" id="first_name">	
						</td>	
					</tr>
					<!-- /First Name -->
					<!-- Last Name -->
					<tr>
						<td>
						<strong>Last Name</strong>	
						</td>	
						<td>
						<input class="form-control" type="text" required 
						 value="<?php echo $_SESSION['last_name']; ?>" name="last_name" id="last_name">	
						</td>	
					</tr>
					<!-- /Last Name -->
					<!-- E-Mail -->
					<tr>
						<td>
						<strong>E-Mail</strong>	
						</td>	
						<td>
						<input class="form-control" type="text" required 
						 value="<?php echo $_SESSION['user_email']; ?>" name="user_email" id="user_email">	
						</td>	
					</tr>
					<!-- /E-Mail -->
					<!-- Default Company -->
					<tr>
						<td>
						<strong>Default Company</strong>	
						</td>	
						<td>
						<span><?php echo get_user_company_name($user_id); ?></span>	
						</td>	
					</tr>
					<!-- /Default Company -->
					<!-- Default Client -->
					<tr>
						<td>
						<strong>Default Client</strong>	
						</td>	
						<td>
						<span><?php echo get_user_client_name($user_id); ?></span>	
						</td>	
					</tr>
					<!-- /Default Client -->
					
					
						
					</tbody>
				</table>
						
            </div><!-- /.box-body -->
			<div class="box-footer">
					<div class="form-group"  >
						<div class="col-sm-12">
							<button style="margin-right:10px;"  type="submit" class='btn btn-success btn-lg pull-right' name="save" value="save">
								Save &nbsp;
								<i class="fa fa-chevron-circle-right">
								</i>
							</button>
							<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=users/list_users"?>">
								Cancel &nbsp;
								<i class="fa fa-chevron-circle-right">
								</i>
							</a>
						</div>	<!-- /.col -->
					</div>		<!-- /form-group -->
				</div><!-- /.box-footer-->
          </div><!-- /.box -->
		  </form>
     	 </div> <!--/.col-md-9 .col-sm-9 -->
     	 </section><!-- /.content -->