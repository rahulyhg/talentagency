<?php 
if(isset($_GET['user_id'])){
	$user_id = $_GET['user_id'];
}


if ( (isset($_POST['password'])) AND (isset($user_id))) {
	reset_password($user_id , $_POST['password']);
}

?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          		User Profiles
            <small>Reset User Password .</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Admin Panel</a></li>
            <li class="active">Reset Password</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Reset Password</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
<div class="container">

<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<p class="text-center">Use the form below to reset password for the user.</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']."?route=users/edit_user&user_id=".$user_id ?>" id="passwordForm">
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<input type="password" class="input-lg form-control" name="password1" id="password" placeholder="New Password" autocomplete="off">
</div>
</div>
</br>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Reset Password">
</div>
</div>
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
            </div><!-- /.box-body -->
            <div class="box-footer">
             <small>  </small>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
     	 </section><!-- /.content -->
  	 