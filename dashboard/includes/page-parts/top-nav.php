<style>
.dropdown-submenu {
  position: relative;
}
.dropdown-submenu > .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -6px;
  margin-left: -1px;
}
.dropdown-submenu:hover > .dropdown-menu {
  display: block;
}
.dropdown-submenu:hover > a:after {
  border-left-color: #fff;
}
.dropdown-submenu.pull-left {
  float: none;
}
.dropdown-submenu.pull-left > .dropdown-menu {
  left: -100%;
  margin-left: 10px;
}
	
	
</style>
<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container-fluid">
    <div class="navbar-header">
      <a href="<?php echo SITE_ROOT.'dashboard/index.php'; ?>" class="navbar-brand"><img style="margin-top: -11px; padding-top: 0px;" height="45px" src="../assets/images/logo_blue.png" /></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Talent <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?route=modules/talent/add_talent">Add New Talent</a></li>

            <li class="divider"></li>
			<li><a href="index.php?route=modules/talent/view_talents">View Talent List</a></li>            
            <li class="divider"></li>
			<li><a href="index.php?route=modules/talent/saved_talent_list">Saved Talent Lists</a></li>   			
          </ul>
        </li>      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clients <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?route=modules/clients/view_clients">List All Clients</a></li>
            <li class="divider"></li>
			<li><a href="index.php?route=modules/clients/add_client">Add New Client</a></li>
            
          </ul>
        </li>
      
              <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Settings <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
           	<li><a href="index.php?route=modules/system/sys_config">System Settings</a></li>
            <li class="divider"></li>
            <li><a href="index.php?route=modules/user_roles/view_user_roles">List Roles</a></li>
            <li class="divider"></li>
			<li><a href="index.php?route=modules/users/list_users"> List Users</a></li>

 
          </ul>
        </li>
<li class="divider"></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  My Account <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                     <li>  
                      <a href="index.php?route=users/my_profile"><i class="fa fa-gears fa-fw"></i> My Profile</a>
                        </li> 
                      <li class="divider"></li>
                        <li><a href="index.php?route=users/change_password"><i class="fa fa-lock fa-fw"></i> Change Password</a>
                        </li>
                    
                        <li class="divider"></li>
                        <li><a href="index.php?route=users/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
      </li>
      </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>