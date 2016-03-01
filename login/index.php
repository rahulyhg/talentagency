<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login | Talent Agency Management System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
  <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		
    <![endif]-->
 <style>
 
 	.login-page, .register-page {
    background: #00B5CA none repeat scroll 0% 0%;
} 
body, h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
	font-family:  'Muli', sans-serif;
}
 </style>   </head>

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
	  
    <a href="http://thetalentfactory.me/"><img width="300px" src="../assets/images/logo.jpg" /></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input id="user" name="user" type="text" class="form-control" placeholder="Username" required="required" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input id="pass" name="pass" type="password" class="form-control" placeholder="Password" required="required" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label>
                  <input id="remember" name="remember" type="checkbox"> Remember Me
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" id="login" value="login" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class=" text-center"></div>
           <?php session_start();
                                if (isset($_SESSION['errors'])) {
                                     $errors = $_SESSION['errors'];
                                        foreach ($errors as $error) {
                                            echo "<div class='error bg-red text-center'>". $error ."</div>";
                                        }
                                  
                                }
                  
                            ?>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<footer><center>  <h3>TAMS <em>a Cloud Powered </em></h3> <h5>Talent Agency Management Solution</h5>
        <p><em>For more infomration & support , please contact 
        <i class="fa fa-email fa-fw"></i> info@sutlej.net</em></p>
</center>        
</footer>
    <!-- jQuery 2.1.3 -->
    <script src="../assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
