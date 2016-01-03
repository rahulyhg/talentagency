<?php

$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Users'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell('User ID', '', 'header');
$tbl->addCell('Username', '', 'header');
$tbl->addCell('First Name', '', 'header');
$tbl->addCell('Last Name', '', 'header');
$tbl->addCell('email', '', 'header');
$tbl->addCell('User Type', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');
?>

<?php
$company_id = $_SESSION['company_id'];

$sql = 'SELECT * FROM '.DB_PREFIX.'users WHERE company_id = '.$company_id.' AND status = 1 AND user_group_id > 2';
$get_users = DB::query($sql);
foreach($get_users as $user) { 
$tbl->addRow();
$tbl->addCell($user['user_id']);
$tbl->addCell($user['username']);
$tbl->addCell($user['firstname']);
$tbl->addCell($user['lastname']);
$tbl->addCell($user['email']);
$tbl->addCell(get_user_group_name($user['user_id']));
 
$tbl->addCell("<a class='pull btn btn-danger btn-xs' href ='".$_SERVER['PHP_SELF']."?route=users/edit_user&user_id=".$user['user_id']."'>Edit User&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a>
			   ");
}
			  

?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          		My Human Resource Portal
            <small>list of Users. </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Clients Portal</a></li>
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
             <small> Please do not make changes to these unless you are really sure what you are doing. making changes here have system wide impact</small>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
     	 </section><!-- /.content -->