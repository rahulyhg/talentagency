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
      <a href="<?php echo SITE_ROOT.'mycompany/index.php'; ?>" class="navbar-brand"><img style="margin-top: -11px; padding-top: 0px;" height="45px" src="../assets/images/logo_blue.png" /></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <i class="fa fa-bars"></i>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Payroll <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?route=payroll/start_new_payroll">Start New Payroll</a></li>


            <li class="divider"></li>
			<li><a href="index.php?route=payroll/view_payslips">Print Bulletin de salaire </a></li>            
            <li class="divider"></li>
			<li><a href="index.php?route=payroll/view_payroll_yearly">Archived Payrolls </a></li>   			
          </ul>
        </li>      
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Reports <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?route=reports/tax_report">Rapport De Taxes</a></li>
            <li class="divider"></li>
			<li><a href="index.php?route=reports/salary_report">H.R summary</a></li>
            
          </ul>
        </li>
      
              <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Employees <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?route=employees/list_employees"> List Employees</a></li>
            <li class="divider"></li>
			<li><a href="index.php?route=employees/add_new_employee"> Add New Employee</a></li>
			<li class="divider"></li>
			<li><a href="index.php?route=employees/upload_employee_data">Upload Employee Data</a></li>
 			<li class="divider"></li>
			<li><a href="download_employee_data.php">Download Employee Data</a></li>
          </ul>
        </li>
<li class="divider"></li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Deduction & Benefits <span   class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
        
			<li><a href="index.php?route=deduction_types\view_deduction_types"> Deduction Types </a></li>
			<li class="divider"></li>
            <li><a href="index.php?route=benefit_types\view_benefit_types"> Benefit Types </a></li> 
          
          </ul>
        </li>
 <li class="divider"></li>
			    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Tax Rates <span  class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
        
			<li><a href="index.php?route=taxes\view_flat_taxes"> Flat Taxes </a></li>
			<li class="divider"></li>
            <li><a href="index.php?route=taxes\view_iri_slabs"> IRI Setup </a></li> 
          
          </ul>
        </li>

               <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Company Setup <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
        
			<li><a href="index.php?route=periods\view_periods"> Payment Periods </a></li>
			<li class="divider"></li>
			<li><a href="index.php?route=forex\view_rates"> Exchange Rates </a></li>
        <li class="divider"></li>
            <li><a href="index.php?route=locations\view_locations"> Locations </a></li>
            <li class="divider"></li>
			<li><a href="index.php?route=bases\view_bases"> Bases </a></li>
            <li class="divider"></li>
			<li><a href="index.php?route=departments\view_departments">Departments</a></li>
			<li class="divider"></li>
			<li><a href="index.php?route=jobs\view_jobs"> Job Titles </a></li>
            <li class="divider"></li>
			<li><a href="index.php?route=contracts\view_contract_types"> Contract Types </a></li>
 			 <li class="divider"></li>
			<li><a href="index.php?route=status_types\view_status_types"> Employment Types </a></li>


          </ul>
        </li>
        
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