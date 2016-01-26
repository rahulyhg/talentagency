<?php

$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Users'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell("<a class='pull btn btn-success btn-md' href ='".$_SERVER['PHP_SELF']."?route=modules/users/add_user'>Add New User&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a>");
$tbl->addRow();
$tbl->addCell('Login Name', '', 'header');
$tbl->addCell('Avatar', '', 'header');
$tbl->addCell('Full Name', '', 'header');
$tbl->addCell('Email', '', 'header');
$tbl->addCell('User Role', '', 'header');
$tbl->addCell('Status', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');

function get_user_role_name($role_id) {
	$user_role_name = DB::queryFirstField("SELECT role_name from tams_user_roles WHERE role_id = $role_id");
	return $user_role_name;
}
 
 
$sql = 'SELECT * FROM tams_users WHERE user_status = "active"';
$get_users = DB::query($sql);
foreach($get_users as $user) { 
$tbl->addRow();
$tbl->addCell($user['user_name']." (".$user['user_id'].") ");
$tbl->addCell('<img src="'.$user['user_avatar_url'].'" alt="avatar" />');
$tbl->addCell($user['user_title']." ".$user['first_name']." ".$user['last_name']);
$tbl->addCell($user['user_email']);
$tbl->addCell(get_user_role_name($user['role_id']));
 $tbl->addCell($user['user_status']);
$tbl->addCell("<a class='pull btn btn-danger btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/users/edit_user&user_id=".$user['user_id']."'>Edit User&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a>
			   ");
}
			  

?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	System Settings
            <small>list of Users. </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">List Users</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Active Users</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
				<?php  echo $tbl->display(); ?>
            </div><!-- /.box-body -->
            <div class="box-footer">
 
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
     	 </section><!-- /.content -->