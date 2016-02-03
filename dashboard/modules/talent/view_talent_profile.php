<?php

$talent_id = '0';
if(isset($_GET['talent_id'])){
	$talent_id = $_GET['talent_id'];

		$sql = "SELECT
				*
				FROM
				tams_talent
				WHERE talent_id = $talent_id ;";
$talent= DB::queryFirstRow($sql);
$talent_id = $talent['talent_id'];
$first_name = $talent['first_name'];
$last_name = $talent['last_name'];
$dob = $talent['dob'];
$sex = $talent['sex'];
$brief = $talent['brief'];
$address = $talent['Address'];
$mobile_no = $talent['mobile_no'];
$email_id = $talent['email_id'];
$nationality = $talent['nationality'];
$passport_no = $talent['passport_no'];
$qatari_id   = $talent['qatari_id'];
$is_qatari   = $talent['is_qatari'];
$passport_copy_attached  = $talent['passport_copy_attached'];
$noc_required     = $talent['noc_required'];
$noc_copy_attached   = $talent['noc_copy_attached'];
$sponsors_id_copy_attached = $talent['sponsors_id_copy_attached'];
$events=$talent['events'];
$height_cm = $talent['height_cm'];
$weight_kg = $talent['weight_kg'];
$hair_color=$talent['hair_color'];
$eye_color=$talent['eye_color'];
$dress_size=$talent['dress_size'];
$shoe_size=$talent['shoe_size'];
$waist_cm=$talent['waist_cm'];
$collar_cm=$talent['collar_cm'];
$chest_cm=$talent['chest_cm'];
$photo1_url=$talent['photo1_url'];
$photo1_caption=$talent['photo1_caption'];
$photo2_url=$talent['photo2_url'];
$photo2_caption=$talent['photo2_caption'];
$registration_date=$talent['registration_date'];
$talent_status = $talent['talent_status']; 
$created_on = $talent['created_on'];
$created_by = $talent['created_by'];
$last_modified_by = $talent['last_modified_by'];
$last_modified_on = $talent['last_modified_on'];

}
$talent_full_name = $talent['first_name'].' '.$talent['last_name'];
/*
 $sql = "SELECT
    `tams_talent`.*
    , `jobs`.`job_title`
    , `departments`.`department_name`
    , `contract_types`.`contract_type`
    , `employment_types`.`status_type_name`
    , `base`.`base_name`
    , `locations`.`location_name`
FROM
    `employees`
    LEFT JOIN `base` 
        ON (`employees`.`base_id` = `base`.`base_id`)
    LEFT JOIN `departments` 
        ON (`departments`.`department_id` = `employees`.`department_id`)
    LEFT JOIN `contract_types` 
        ON (`employees`.`contract_type_id` = `contract_types`.`contract_type_id`)
    LEFT JOIN `jobs` 
        ON (`jobs`.`job_id` = `employees`.`job_id`)
    LEFT JOIN `locations` 
        ON (`employees`.`location_id` = `locations`.`location_id`) AND (`locations`.`base_id` = `base`.`base_id`)
    LEFT JOIN `employment_types` 
        ON (`employment_types`.`status_type_id` = `employees`.`status_type_id`) 
			WHERE ((`employees`.employee_id=$employee_id )AND (`employees`.company_id=$company_id ));";
			
$employee = DB::queryFirstRow($sql);
////print_r($employee);
//Basic Information

$employee_full_name = $employee['firstname'].' '.$employee['lastname'];
$gender = get_emp_gender($employee_id);
if (is_null($gender) OR $gender == "" ) {
	$gender = " - not set - ";
} 
$dob = $employee['birthday'];
if (is_null($dob) OR $dob == "" ) {
	$dob = " - not set - ";
	$age = " - not set - ";
} else {
	$dob = getDateTime($dob,"dLong");
	$age = getAge($employee['birthday']);
}
$marital_status = $employee['marital_status'];
if (is_null($marital_status) OR $marital_status == "" ) {
	$marital_status = " - not set - ";
}
$nationality = $employee['nationality'];
if (is_null($nationality) OR $nationality == "" ) {
	$nationality = " - not set - ";
}

// Contact Information
$phone = $employee['phone'];
if (is_null($phone) OR $phone == "" ) {
	$phone = " - not set - ";
} 
$mobile = $employee['mobile'];
if (is_null($mobile) OR $mobile == "" ) {
	$mobile = " - not set - ";
}
$email = $employee['email'];  
if (is_null($email) OR $email == "" ) {
	$email = " - not set - ";
}
// Emergency Contact Information
$next_of_kin = " - not set - ";
$kin_contact = " - not set - ";


// Work Information
$employee_code = $employee['employee_code'];
if (is_null($employee_code) OR $employee_code == "" ) {
	$employee_code = " - not set - ";
}
$ssn = $employee['ssn'];
if (is_null($ssn) OR $ssn == "" ) {
	$ssn = " - not set - ";
}
$job_title = $employee['job_title'];
if (is_null($job_title) OR $job_title == "" ) {
	$job_title = " - not set - ";
}
$department_name = $employee['department_name'];
if (is_null($department_name) OR $department_name == "" ) {
	$department_name = " - not set - ";
}
$base_name = $employee['base_name'];
if (is_null($base_name) OR $base_name == "" ) {
	$base_name = " - not set - ";
}
$location_name = $employee['location_name'];
if (is_null($location_name) OR $location_name == "" ) {
	$location_name = " - not set - ";
}
$status = $employee['status'];
if (is_null($status) OR $status == "" ) {
	$status = " - not set - ";
}


//Contract Informaiton

$hire_date = $employee['hire_date'];

if (is_null($hire_date) OR $hire_date == "" ) {
	$hire_date = " - not set - ";
} else {
	$hire_date = getDateTime($hire_date, "dLong");
}

$contract_type = $employee['contract_type'];
if (is_null($contract_type) OR $contract_type == "" ) {
	$contract_type = " - not set - ";
} 

$status_type_name = $employee['status_type_name'];
if (is_null($status_type_name) OR $status_type_name == "" ) {
	$status_type_name = " - not set - ";
} 

// Salary Infromation
$currency_code = $employee['currency_code'];
if (is_null($currency_code) OR $currency_code == "" ) {
	$currency_code = " - not set - ";
} 
$monthly_salary = $employee['salary'];
if (is_null($monthly_salary) OR $monthly_salary == "" ) {
	$monthly_salary = " - not set - ";
	$annual_salary = $monthly_salary;
	$daily_wage = $monthly_salary;
	$hourly_rate = $monthly_salary;
} else {
	$annual_salary = round2dp($monthly_salary * 12);
	$daily_wage = round2dp($monthly_salary / $employee['n_work_day']);
	$hourly_rate = round2dp(($monthly_salary / $employee['n_work_day']) / 8);
	$monthly_salary = round2dp($monthly_salary);
	
} 
if ($employee['n_work_day'] < 23 ) {
$over_time_allowed = "No";	
}else {
$over_time_allowed = "Yes";	
}
?>
<?php 
$sql_deduction = "SELECT * FROM employee_deductions WHERE  (employee_id=$employee_id)";
$emp_deductions = DB::query($sql_deduction);

$tbl = new HTML_Table('', 'data-table table', array('data-title'=>'List of Deductions'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell('', '', 'header');
$tbl->addCell('Deductions', '', 'header');
$tbl->addCell('E.C', '', 'header');
$tbl->addTSection('tbody');
?>
<?php
 foreach($emp_deductions as $deduction) {
 	$deduction_type_id = $deduction['deduction_type_id'];
	$sql_deduction_type = "SELECT deduction_type FROM deduction_types WHERE deduction_type_id=$deduction_type_id";
	$deduction_type = DB::queryFirstField($sql_deduction_type);
if($deduction_type == "" OR is_null($deduction_type)){
	$deduction_type = "-not set-";
}
$tbl->addRow();
$tbl->addCell($deduction_type);
$tbl->addCell(round2dp($deduction['employee_amount']).' '.$deduction['currency_code']);
$tbl->addCell(round2dp($deduction['employer_cont']).' '.$deduction['currency_code']);

}

$sql_benefits = "SELECT * FROM employee_benefits WHERE  (employee_id=$employee_id)";
$emp_benefits = DB::query($sql_benefits);

*/
?>
<style>
@media (max-width: 769px) {
    .text-left {
        text-align: right;
    }
    .text-right {
        text-align: right;
    }
}
	
</style>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	<?php echo $talent['first_name']." ".$talent['last_name']; ?>
            <small>Talent Profile</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/view_talent"; ?>">List of Talents</a></li>
            <li class="active">Talent Profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<!-- Default box -->
          <div class="box box-primary with-border box-solid">
            <div class="box-header ">
              <h3 class="box-title"><?php echo $talent_full_name; ?> </h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body">        
 <!-- Row 1 Starts -->        
<div class="row">
 <!-- Row 1 Column 1 Starts -->
       		<div class="col-md-6 col-sm-6">
 <!-- Basic Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Basic Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body bg-info">
            <div class="row">
			<!--	<div class="col-md-3 col-sm-3  image pull-left">
              		<?php /*echo get_talent_photo($talent_id,100);*/ ?>
            	</div>-->
            	<div class="col-md-9 col-sm-9  ">
	            	<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Full Name :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $talent_full_name; ?></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 ">
	            		<p class="text-right"><strong>Gender :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $sex;  ?></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6">
	            		<p class="text-right"><strong>Age :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo getAge($talent['dob']);  ?> years</p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 ">
	            		<p class="text-right"><strong>Date of Birth :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $dob; ?></p>
	            	</div>      	    	
	            	<div class="col-md-6 col-sm-6 ">
	            		<p class="text-right"><strong>Nationality :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6"> 
	            		<p class="text-left"><?php echo $nationality;  ?></p>
	            	</div>		            	 
              </div>
 		
             </div> 
             </form>
			 </div> 
            <div  class="box-footer">
			 <div class="text-right"><a  href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent_id.'#basic'; ?>" title="Edit Basic Information">Edit Basic Information</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Basic Information-->
  
   <!-- Contact Information box -->       			
       		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Contact Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-gray">
				  <div class="row">
	            	<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Mobile Number :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $mobile_no; ?>&nbsp;</p>
	            	</div>
	            	<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Email : </strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"> <?php echo $email_id; ?> </p>
	            	</div>	
						<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Address :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $Address; ?>&nbsp;</p>
	            	</div>
              	
              </div>
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent_id.'#contact'; ?>" title="">Edit Contact Information</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Contact Information-->

   <!-- Address box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Address
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-info ">
				  <address>
				 <?php echo $employee['address_1'];  ?><br>
				 <?php echo $employee['address_2'];  ?><br>
				 <?php echo $employee['city']; ?>  <?php echo $employee['zip_postal_code']; ?><br>
				 <?php echo $employee['country']; ?> 	
				  </address>
				  </div>
				  	   
            <div class="box-footer">
			 <div class="text-right"><a  href="index.php?route=employees/edit_employee_profile&employee_id=<?php echo $employee_id; ?>#address" title="">Edit Address</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Address-->          
    
   <!-- Emergency Contact Information box -->       			
       		<div class="box ">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Emergency Contact Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                 <div class="box-body bg-gray">
                 <div class="row">
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Next of Kin : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $next_of_kin; ?></p>
	            </div>
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Contact No : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $kin_contact; ?></p>
	            </div>
				
				</div>
				
				</div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a href="index.php?route=employees/edit_employee_profile&employee_id=<?php echo $employee_id; ?>#emergency" title="">Edit Emergency Contact</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Emergency Contact Information-->     
                     			
       		</div><!-- /.Row 1 Column 1 Ends-->
<!-- Row 1 Column 2 Starts -->
			<div class="col-md-6 col-sm-6">
			
 <!-- Work Information box -->   			
			<div class="box ">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Work Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                <div class="box-body bg-gray">
				<div class="row">
				
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Employee ID :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $employee_code; ?></p>
	            </div>
	              
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>SSN : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $ssn;  ?></p>
	            </div>
	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Job Title : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $job_title; ?></p>
	            </div>
	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Department :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $department_name; ?></p>
	            </div>
	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Base :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $base_name; ?></p>
	            </div>
	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Location :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $location_name; ?></p>
	            </div>
		            	                        
              	
              </div>
				  </div>
				  	   
            <div class="box-footer">
			 <div class="text-right"><a  href="index.php?route=employees/edit_employee_profile&employee_id=<?php echo $employee_id; ?>#work" title="">Edit Work Information</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Work Information box  -->     
       
            			
  <!-- Contract Information box -->   			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Contract Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-info">
				  <div class="row">
				  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Hiring Date :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $hire_date; ?></p>
	            </div>
	
				  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Employment Status :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $status_type_name; ?></p>
	            </div>

				  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Contract Type : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $contract_type; ?></p>
	            </div>
 

                         	
               
              	
              </div>
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="index.php?route=employees/edit_employee_profile&employee_id=<?php echo $employee_id; ?>#contract" title="">Edit Contract Information</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Contract Information box  --> 
          
   <!-- Salary  -->       			
       		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Salary
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-gray">
                  <div class="row">
                  					  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Currency : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $currency_code; ?></p>
	            </div>
                  					  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Annual Salary : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $annual_salary; ?></p>
	            </div>
 
                  					  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Monthly Salary : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $monthly_salary; ?></p>
	            </div>
                   	
                  					  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Daily Wage : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $daily_wage; ?></p>
	            </div>
                   	
                  					  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Hourly Rate : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $hourly_rate; ?></p>
	            </div>
                   	
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>OverTime Allowed : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $over_time_allowed; ?></p>
	            </div>                  	
                  	
                  	
                  	
                  </div>
				 
				  
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="index.php?route=employees/edit_employee_profile&employee_id=<?php echo $employee_id; ?>#salary" title="">Edit Salary</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Salary -->      

   <!-- Leave Entitlements  -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Leave Entitlements
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-info">
				  <p><strong>Working Days per Month : </strong> <?php echo $employee['n_work_day']; ?></p>
				  <p><strong>Off Days Yearly : </strong> <?php echo $employee['n_day_off']; ?></p>
				  
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="index.php?route=employees/edit_employee_profile&employee_id=<?php echo $employee_id; ?>#leave" title="">Edit Leaves</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Salary -->     
       			
</div> 	<!-- /.Row 1 Colum 2 Ends-->

</div> <!-- /.Row 1 Ends-->

 <!-- Row 2 Starts -->        
<div class="row">
 <!-- Row 2 Column 1 Starts -->
       		<div class="col-md-6">
              
   <!-- Payment Methods box -->       			
       		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Payment Methods
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body">
				  
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="index.php?route=employees/edit_employee_profile&employee_id=<?php echo $employee_id; ?>#payment" title="">Edit Payment Methods</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Payment Methods  -->  
  
   <!-- Benefits box -->       			
       		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Benefits
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-info">
                   <div class="row">
                   <div class="col-md-10 col-sm-10 ">
                   <div class="col-md-6 col-sm-6  ">
                   <?php foreach($emp_benefits as $benefits) {
					$benefit_type_id = $benefits['benefit_type_id'];
					$sql_benefit_type = "SELECT benefit_type FROM benefit_types WHERE benefit_type_id=$benefit_type_id";
					$benefit_type = DB::queryFirstField($sql_benefit_type);
					
					?>
	            		<p class="text-right"><strong><?php echo $benefit_type; ?>:</strong>&nbsp;</p>
	            		<?php } ?>
	            </div>
	            <div class="col-md-6 col-sm-6 ">
	            		<?php foreach($emp_benefits as $benefits) {
					
					$benefit_amount = $benefits['amount'];
					if(($benefit_amount == '0.00') OR (is_null($benefit_amount)) OR ($benefit_amount == "")){
						$benefit_amount = "-not set-";
						}else{
							$benefit_amount = $benefits['amount'];
						}
					
					?>
	            <p class="text-left"><?php echo round2dp($benefit_amount)." ".$benefits['currency_code']; ?><br/></p>
	            <?php } ?>	 
	            </div>
                   
				  
	            </div>
	            </div>
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="index.php?route=employees/edit_employee_profile&employee_id=<?php echo $employee_id; ?>#benefits" title="">Edit Benefits</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Benefits-->

               			
       		</div><!-- /.Row 2 Column 1 Ends-->
<!-- Row 2 Column 2 Starts -->
			<div class="col-md-6">
			
 <!-- Deductions box -->   			
			<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Deductions
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-gray">
				    <div class="row"> 	            
				<div class="col-md-10 col-sm-10 ">
					
	            <p class="text-right"><?php echo $tbl->display();?></p>
	            
	            </div>
	            
				  </div>
				 </div> 	   
            <div class="box-footer">
			<div class="text-right"><a  href="index.php?route=employees/edit_employee_profile&employee_id=<?php echo $employee_id; ?>#deductions" title="">Edit Deductions</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Deductions  -->       			
  
   <!-- Tax Information -->       			
       		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Tax Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body">
				  
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="index.php?route=employees/edit_employee_profile&employee_id=<?php echo $employee_id; ?>#tax" title="">Edit Tax Information</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Tax Information-->    
  
     			
</div> 	<!-- /.Colum 2 Ends-->
   <!-- Payroll Information -->  
   <div class="col-md-12">   			
       		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Payroll History
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <?php 
            $payslip_sql ="SELECT 
							`payslips`.`payslip_id`
							, `payslips`.`job_title`
							,`payslips`.`period_name`
							, `payslips`.`gross_salary`
							, `payslips`.`net_salary`
							, `payslips`.`benefits_total`
							, `payslips`.`employee_tax_total`
							, `payslips`.`employee_deductions_total` FROM payslips 
							WHERE `payslips`.`employee_id`=$employee_id ORDER BY `payslips`.`period_id` DESC;";
							            
///            $payslip_sql = "SELECT ps.`payslip_id`, ps.`job_title`,ps.`period_name`, ps.`gross_salary`, ps.`net_salary`, ps.`benefits_total`, ps.`employee_deductions_total` FROM payslips ps WHERE ps.`employee_id`=$employee_id ORDER BY ps.`payslip_id` DESC";
            $payslips =  DB::query($payslip_sql);
            $i=1;
            ?>
            <div class="box-body">
	            <table id="emp_payslips" class="table table-bordered">
	                    <tbody><tr>
	                      <th style="width: 10px">#</th>
	                      <th>Period</th>
	                      <th>Job Title</th>
	                      <th>Gross Salary</th>
	                      <th>Benefits</th>
	                      <th>Deductions</th>
	                      <th>Employee Tax Total</th>
	                      <th>Net Salary</th>
	                      <th>View Slip</th>
	                    </tr>
					<?php foreach($payslips as $payslip){ ?>
						<tr>
							<td class="text-right"><?php echo $i++ ?></td>
							<td><?php echo $payslip['period_name']; ?></td>
							<td><?php echo $payslip['job_title']; ?></td>
							<td class="text-right"><?php echo round2dp($payslip['gross_salary']); ?></td>
							<td class="text-right"><?php echo round2dp($payslip['benefits_total']); ?></td>
							<td class="text-right"><?php echo round2dp($payslip['employee_deductions_total']); ?></td>
							<td class="text-right"><?php echo round2dp($payslip['employee_tax_total']); ?> </td>
							<td class="text-right"><?php echo round2dp($payslip['net_salary']); ?></td>
							<td><a href="?route=payroll/view_payslip&payslip_id=<?php echo $payslip['payslip_id']; ?>">View Slip</a></td>
						</tr>
					<?php } ?>
					<tr>
	<?php $total_net_salary = DB::queryFirstField("SELECT
												    SUM(`net_salary`)
												FROM
												    `payslips`
												WHERE (`employee_id` =$employee_id);"); ?>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="text-right" ><strong><?php echo round2dp($total_net_salary); ?></strong></td>
							<td></td>
						</tr>
					</table>
				  
			</div>

          </div><!-- /.box Payroll Information-->   
   </div> 
</div> <!-- /.Row 2 Ends-->

<?php 
//Basic Information

//Other information

//Contact Infromation

//Emergency Contact INFO_ALL

//Address

//Bank Information

//Team & Management 

//Holiday and Leaves

//Wages & Benefits

// Taxes & Deductions

?>
 
				  </div>
			
            <div class="box-footer">
             <small></small>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
     	 </section><!-- /.content --><?php

?>
<script>
$(document).ready(function(){
		$('#emp_payslips').dataTable( {
  "pageLength": 5
} );
	
});

</script>
