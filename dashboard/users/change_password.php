<?php 
if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
}

if ( (isset($_POST['password1'])) AND (isset($user_id))) {
	$update = reset_password($user_id , $_POST['password1']);
	if ($update) {
		echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'");</script>';
	}

}


?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          <?php echo $_SESSION['fullname']; ?>
            <small>My Account</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">My Account</a></li>
            <li class="active">Change Password</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
 
                  <div class="box-body" style="height:250px;">
<div class="container">

<div class="row">
<div class="col-sm-6 col-sm-offset-3">


 <form role="form" id="passwordForm" onsubmit="return passmatch();" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']."?route=users/change_password"; ?>" >
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off" required="required" minlength=5 pattern=".{5,}">
<div class="row">
<div class="col-sm-6">
<span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
<span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
</div>
<div class="col-sm-6">
<span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
<span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
</div>
</div>
<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off" required="required">
<div class="row">
<div class="col-sm-12">
<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
</div>
</div>
<input type="submit" class="col-xs-12 btn btn-success btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password" minlength=5 pattern=".{5,}">
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
</div><!-- /.box-body -->
              
        
            <div class="box-footer">
             <p class="text-center">Use the form above to change your password. Your password cannot be the same as your username.</p>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
     	 </section><!-- /.content -->
<script type="text/javascript">
	$("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
	var lcase = new RegExp("[a-z]+");
	var num = new RegExp("[0-9]+");
	
	if($("#password1").val().length >= 8){
		$("#8char").removeClass("glyphicon-remove");
		$("#8char").addClass("glyphicon-ok");
		$("#8char").css("color","#00A41E");
	}else{
		$("#8char").removeClass("glyphicon-ok");
		$("#8char").addClass("glyphicon-remove");
		$("#8char").css("color","#FF0004");
	}
	
	if(ucase.test($("#password1").val())){
		$("#ucase").removeClass("glyphicon-remove");
		$("#ucase").addClass("glyphicon-ok");
		$("#ucase").css("color","#00A41E");
	}else{
		$("#ucase").removeClass("glyphicon-ok");
		$("#ucase").addClass("glyphicon-remove");
		$("#ucase").css("color","#FF0004");
	}
	
	if(lcase.test($("#password1").val())){
		$("#lcase").removeClass("glyphicon-remove");
		$("#lcase").addClass("glyphicon-ok");
		$("#lcase").css("color","#00A41E");
	}else{
		$("#lcase").removeClass("glyphicon-ok");
		$("#lcase").addClass("glyphicon-remove");
		$("#lcase").css("color","#FF0004");
	}
	
	if(num.test($("#password1").val())){
		$("#num").removeClass("glyphicon-remove");
		$("#num").addClass("glyphicon-ok");
		$("#num").css("color","#00A41E");
	}else{
		$("#num").removeClass("glyphicon-ok");
		$("#num").addClass("glyphicon-remove");
		$("#num").css("color","#FF0004");
	}
	
	if($("#password1").val() == $("#password2").val()){
		$("#pwmatch").removeClass("glyphicon-remove");
		$("#pwmatch").addClass("glyphicon-ok");
		$("#pwmatch").css("color","#00A41E");
	}else{
		$("#pwmatch").removeClass("glyphicon-ok");
		$("#pwmatch").addClass("glyphicon-remove");
		$("#pwmatch").css("color","#FF0004");
	}
});
function passmatch(){
	if($("#password1").val() == $("#password2").val()){
		return true;
		} else {
		return false;
			
		}

}
</script>