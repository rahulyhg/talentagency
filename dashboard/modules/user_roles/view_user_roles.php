<?php

$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'User Roles'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell("<a class='pull btn btn-success btn-md' href ='".$_SERVER['PHP_SELF']."?route=modules/user_roles/add_user_role'>Add New Role&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a>");
$tbl->addRow();
$tbl->addCell('RoleID', '', 'header');
$tbl->addCell('Role Name', '', 'header');
$tbl->addCell('Description', '', 'header');
$tbl->addCell('Hostory', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');
?>

<?php
$sql = "SELECT * FROM tams_user_roles";
$roles = DB::query($sql);
foreach($roles as $role) { 
$tbl->addRow();
$tbl->addCell($role['role_id']);
$tbl->addCell($role['role_name']);
$tbl->addCell($role['role_description']);
$tbl->addCell("<p>Created on: <strong> ".getDateTime($role['created_on'],'dtLong')." </strong> by <strong>".get_user_name($role['created_by'])."</strong></p> <p>Last Modified: <strong>".getDateTime($role['last_modified_on'],"dtLong")." </strong> by <strong>".get_user_name($role['last_modified_by'])."</strong></p>  ");
 
$tbl->addCell("<a class='pull btn btn-danger btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/user_roles/edit_user_role&role_id=".$role['role_id']."'>Edit Role&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a>
			   ");
}
			  

?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> System Settings
            <small>User Roles Setup</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">List of User Roles</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of User Roles</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
				<?php  echo $tbl->display(); ?>
            </div><!-- /.box-body -->
            <div class="box-footer">
             <small></small>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
     	 </section><!-- /.content -->