<?php
if(isset($_SESSION['user_id'])){
$user_id	=	$_SESSION['user_id'];
}

if(isset($_POST['save'])){
	

unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['email']);

$firstname	=	$_POST['firstname'];
$lastname	=	$_POST['lastname'];
$email		=	$_POST['email'];
	if($user_id<>"")
	   {
		$update=	DB::update('users', array(	
						'firstname'  => $firstname,
						'lastname' 	 => $lastname,
						'email' 	 => $email,	
					),
					"user_id=%s", $user_id
					);
		if($update){
			
			$_SESSION['firstname'] 	=	$firstname;
			$_SESSION['lastname'] 	=	$lastname;
			$_SESSION['email'] 		=	$email;
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
              </div>
            </div>
            <div class="box-body">
				
						
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
						<span><?php echo $_SESSION['username']; ?></span>	
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
						 value="<?php echo $_SESSION['firstname']; ?>" name="firstname" id="firstname">	
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
						 value="<?php echo $_SESSION['lastname']; ?>" name="lastname" id="lastname">	
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
						 value="<?php echo $_SESSION['email']; ?>" name="email" id="email">	
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
					<tfoot>
					<tr>
						<td></td>	
						<td>
						<button style="margin-right:10px;" type="submit" class='btn btn-success btn-sm' name="save" value="save">Save &nbsp; <i class="fa fa-chevron-circle-right"></i></button>
						<a style="margin-right:10px;" class='btn btn-danger btn-sm ' href="<?php echo $_SERVER['PHP_SELF']."?route=users/my_profile"?>">Cancel &nbsp; <i class="fa fa-chevron-circle-right"></i></a>					
						</td>	
					</tr>	
					</tfoot>
				</table>
						
            </div><!-- /.box-body -->
            <div class="box-footer">
             <small></small>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
		  </form>
     	 </div> <!--/.col-md-9 .col-sm-9 -->
     	 </section><!-- /.content -->