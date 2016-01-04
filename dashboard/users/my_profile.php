<?php
if ($_SESSION['user_id']){
$user_id 	=  $_SESSION['user_id'];	
}


?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	<?php echo $_SESSION['full_name']; ?> 
            <small>My Profile</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">My Account</a></li>
            <li class="active">My Profile</li>
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
          <div class="box col-md-6 col-sm-6 col-sx-12">
            <div class="box-header with-border">
              <h3 class="box-title">My Profile</h3>
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
						<strong>Username</strong>	
						</td>	
						<td>
						<span><?php echo $_SESSION['user_name']; ?></span>	
						</td>	
					</tr>
					<!-- /UserName -->
					<!-- Full Name -->
					<tr>
						<td>
						<strong>Full Name</strong>	
						</td>	
						<td>
						<span><?php echo $_SESSION['full_name']; ?></span>	
						</td>	
					</tr>
					<!-- /Full Name -->
					<!-- E-Mail -->
					<tr>
						<td>
						<strong>E-Mail</strong>	
						</td>	
						<td>
						<span><?php echo $_SESSION['user_email'] ?></span>	
						</td>	
					</tr>
					<!-- /E-Mail -->
					<!-- User Title -->
					<tr>
						<td>
						<strong>User Title</strong>	
						</td>	
						<td>
						<span><?php echo 'User Title and Departent here'; ?></span>	
						</td>	
					</tr>
					<!-- /User Title -->
					<!-- User_Role -->
					<tr>
						<td>
						<strong>User_role</strong>	
						</td>	
						<td>
						<span><?php echo "User Role here"; ?></span>	
						</td>	
					</tr>
					<!-- /User Role -->
					
					
						
					</tbody>
					<tfoot>
					<tr>
						<td></td>	
						<td> <a class='pull btn btn-danger btn-sm pull-right' href ="<?php echo $_SERVER['PHP_SELF']."?route=users/edit_user"; ?> ">Edit My Profile&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a></td>	
					</tr>	
					</tfoot>
				</table>
						
            </div><!-- /.box-body -->
            <div class="box-footer">
           
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
     	 </div> <!--/.col-md-9 .col-sm-9 -->
     	 </section><!-- /.content -->