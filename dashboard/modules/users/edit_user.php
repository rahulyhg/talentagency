<?php
$user_id = 0;

if(isset($_GET['user_id']))
{
	$user_id = $_GET['user_id'];
}
$sql = "SELECT 
			  * 
			FROM
			  tams_users
			WHERE user_id = $user_id ;";
$user = DB::queryFirstRow($sql);		

echo "<pre>";
print_r($user);
echo "</pre>";



if(isset($_POST['save'])){
	

$first_name	=	$_POST['first_name'];
$last_name	=	$_POST['last_name'];
$user_email		=	$_POST['user_email'];

	if($user_id <> "")
	   {
		$update=	DB::update('users', array(	
						'first_name'  => $first_name,
						'last_name' 	 => $last_name,
						'user_email' 	 => $user_email,	
					),
					"user_id=%s", $user_id
					);
		if($update){
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/users/list_users");</script>';	
		}
	}
}


?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	System Settings
            <small>Edit a User</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Edit a User</li>
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
				User Avatar will be here
						
            </div><!-- /.box-body -->
            <div class="box-footer">
             <small></small>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
          </div> <!--/.col-md-3 .col-sm-3 -->
           <div class="col-md-9 col-sm-9">
          <!-- Profile box -->
		  <form role="form"class="form-horizontal" method="post" 
		     action="<?php echo $_SERVER['PHP_SELF']."?route=modules/users/edit_user"; ?>">
          <div class="box col-md-6 col-sm-6 col-sx-12">
            <div class="box-header with-border">
              <h3 class="box-title">Editing <?php echo $user['user_title']." ".$user['first_name']." ".$user['last_name']; ?> Profile </h3>
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
						<span><?php echo $user['user_name']; ?></span>	
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
						 value="<?php echo $user['first_name']; ?>" name="first_name" id="first_name">	
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
						 value="<?php echo $user['last_name']; ?>" name="last_name" id="last_name">	
						</td>	
					</tr>
					<!-- /Last Name -->
					<!-- E-Mail -->
					<tr>
						<td>
						<strong>E-Mail</strong>	
						</td>	
						<td>
						<input class="form-control" type="email" required 
						 value="<?php echo $user['user_email']; ?>" name="user_email" id="user_email">	
						</td>	
					</tr>
					<!-- /E-Mail -->
						
					</tbody>
					<tfoot>
					<tr>
						<td></td>	
						<td>
						<button style="margin-right:10px;" type="submit" class='btn btn-success btn-sm' name="save" value="save">Save &nbsp; <i class="fa fa-chevron-circle-right"></i></button>
						<a style="margin-right:10px;" class='btn btn-danger btn-sm ' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/users/list_users"?>">Cancel &nbsp; <i class="fa fa-chevron-circle-right"></i></a>					
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