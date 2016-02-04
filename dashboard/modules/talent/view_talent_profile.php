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
$qatari_id_copy_attached = $talent['qatari_id_copy_attached'];
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
$mysql ='SELECT * FROM tams_talent_experience WHERE talent_id ="$talent_id"'; 
$experience = DB::queryFirstRow($mysql);
$talent_experience_id = $experience['talent_experience_id'];
$experience_item_id = $experience['experience_item_id'];
$experience_status = $experience['experience_status'];
$created_on = $experience['created_on'];
$created_by = $experience['created_by'];
$last_modified_by = $experience['last_modified_by'];
$last_modified_on = $experience['last_modified_on'];

$mysql2 ='SELECT * FROM tams_experience_items WHERE experience_item_status ="active"';
$item = DB::queryFirstRow($mysql2);
$experience_item_id = $item['experience_item_id'];
$experience_item_name = $item['experience_item_name'];
$experience_item_status = $item['experience_item_status'];
$created_on = $item['created_on'];
$created_by = $item['created_by'];
$last_modified_by = $item['last_modified_by'];
$last_modified_on = $item['last_modified_on'];

/*
 $sql = "SELECT
    `tams_talent`.*
    , `tams_talent_experience`.`experience_item_id`
    , `tams_talent_portfolio`.`portfolio_item_id`
    , `tams_talent_documents`.`document_type_id`
    , `tams_talent_language`.`language_id`
    , `tams_talent_photos`.`talent_photo_id`
    , `tams_talent_comments`.`comment`
FROM
    `tams_talent`
    LEFT JOIN `tams_talent_experience` 
        ON (`tams_talent`.`experience_item_id` = `tams_talent_experience`.`experience_item_id`)
    LEFT JOIN `tams_talent_portfolio` 
        ON (`tams_talent_portfolio`.`portfolio_item_id` = `tams_talent`.`portfolio_item_id`)
    LEFT JOIN `tams_talent_documents` 
        ON (`tams_talent`.`document_type_id` = `tams_talent_documents`.`document_type_id`)
    LEFT JOIN `tams_talent_language` 
        ON (`tams_talent_language`.`language_id` = `tams_talent`.`language_id`)
    LEFT JOIN `tams_talent_photos` 
        ON (`tams_talent`.`talent_photo_id` = `tams_talent_photos`.`talent_photo_id`)
    LEFT JOIN `tams_talent_comments` 
        ON (`tams_talent_comments`.`comment` = `tams_talent`.`comment`) 
			";
	*/		
$talent = DB::queryFirstRow($sql);
////print_r($talent);
//Basic Information

$talent_full_name = $talent['first_name'].' '.$talent['last_name'];
$sex = get_talent_gender($talent_id);
if (is_null($sex) OR $sex == "" ) {
	$sex = " - not set - ";
} 
$dob = $talent['dob'];
if (is_null($dob) OR $dob == "" ) {
	$dob = " - not set - ";
} else {
	$age = getAge($talent['dob']);
}

$nationality = $talent['nationality'];
if (is_null($nationality) OR $nationality == "" ) {
	$nationality = " - not set - ";
}
$brief = $talent['brief'];
if (is_null($brief) OR $brief == "" ) {
	$brief = " - not set - ";
}

// Contact Information

$mobile_no = $talent['mobile_no'];
if (is_null($mobile_no) OR $mobile_no == "" ) {
	$mobile_no = " - not set - ";
}
$email_id = $talent['email_id'];  
if (is_null($email_id) OR $email_id == "" ) {
	$email_id = " - not set - ";
}

// Vital Information
$height_cm = $talent['height_cm'];
if (is_null($height_cm) OR $height_cm == "" ) {
	$height_cm = " - not set - ";
}
$weight_kg = $talent['weight_kg'];
if (is_null($weight_kg) OR $weight_kg == "" ) {
	$weight_kg = " - not set - ";
}
$hair_color = $talent['hair_color'];
if (is_null($hair_color) OR $hair_color == "" ) {
	$hair_color = " - not set - ";
}
$eye_color = $talent['eye_color'];
if (is_null($eye_color) OR $eye_color == "" ) {
	$eye_color = " - not set - ";
}
$dress_size = $talent['dress_size'];
if (is_null($dress_size) OR $dress_size == "" ) {
	$dress_size = " - not set - ";
}
$shoe_size = $talent['shoe_size'];
if (is_null($shoe_size) OR $shoe_size == "" ) {
	$shoe_size = " - not set - ";
}
$waist_cm = $talent['waist_cm'];
if (is_null($waist_cm) OR $waist_cm == "" ) {
	$waist_cm = " - not set - ";
}
$collar_cm = $talent['collar_cm'];
if (is_null($collar_cm) OR $collar_cm == "" ) {
	$collar_cm = " - not set - ";
}
$chest_cm = $talent['chest_cm'];
if (is_null($chest_cm) OR $chest_cm == "" ) {
	$chest_cm = " - not set - ";
}

//Employability Informaiton

$is_qatari = $talent['is_qatari'];

if (is_null($is_qatari) OR $is_qatari == "" ) {
	$is_qatari = " - not set - ";
}elseif($is_qatari == 1 ){
		$is_qatari = "Yes";
	}
	else {
		$is_qatari = "No"; 
	}
$qatari_id = $talent['qatari_id'];
if (is_null($qatari_id) OR $qatari_id == "" ) {
	$qatari_id = " - not set - ";
} 

$passport_no = $talent['passport_no'];
if (is_null($passport_no) OR $passport_no == "" ) {
	$passport_no = " - not set - ";
} 
$qatari_id_copy_attached = $talent['qatari_id_copy_attached'];
if (is_null($qatari_id_copy_attached) OR $qatari_id_copy_attached == "" ) {
	$qatari_id_copy_attached = " - not set - ";
}
	elseif($qatari_id_copy_attached == 1 ){
		$qatari_id_copy_attached = "Attached";
	}
		else {
			$qatari_id_copy_attached ="Not-Attached"; 
	}  
$passport_copy_attached = $talent['passport_copy_attached'];
if (is_null($passport_copy_attached) OR $passport_copy_attached == "" ) {
	$passport_copy_attached = " - not set - ";
}elseif($passport_copy_attached == 1 ){
		$passport_copy_attached = "Attached";
	}
	else {
		$passport_copy_attached ="Not-Attached"; 
	} 
$noc_required = $talent['noc_required'];
if (is_null($noc_required) OR $noc_required == "" ) {
	$noc_required = " - not set - ";
}
elseif($noc_required == 1 ){
		$noc_required = "Yes";
	}
	else {
		$noc_required ="No"; 
	}  
$noc_copy_attached = $talent['noc_copy_attached'];
if (is_null($noc_copy_attached) OR $noc_copy_attached == "" ) {
	$noc_copy_attached = " - not set - ";
}
elseif($noc_copy_attached == 1 ){
		$noc_copy_attached = "Attached";
	}
	else {
		$noc_copy_attached ="Not-Attached"; 
	}  
$sponsors_id_copy_attached = $talent['sponsors_id_copy_attached'];
if (is_null($sponsors_id_copy_attached) OR $sponsors_id_copy_attached == "" ) {
	$sponsors_id_copy_attached = " - not set - ";
}
elseif($sponsors_id_copy_attached == 1 ){
		$sponsors_id_copy_attached = "Attached";
	}
	else {
		$sponsors_id_copy_attached ="Not-Attached"; 
	} 
$events = $talent['events'];
if (is_null($events) OR $events == "" ) {
	$events = " - not set - ";
} 
/*
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
	            		<p class="text-right"><strong>Brief :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6"> 
	            		<p class="text-left"><?php echo $brief;  ?></p>
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
	            		<p class="text-left"><?php echo $address; ?>&nbsp;</p>
	            	</div>
              	
              </div>
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent_id.'#contact'; ?>" title="">Edit Contact Information</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Contact Information-->

   <!-- Experience box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Experience
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-info ">
				  <div class="row">
				  <div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>List of Experiences : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $item['experience_item_name']; ?></p>
						
	            </div>
				  </div>
				  </div>	   
            <div class="box-footer">
			 <div class="text-right"><a  href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent_id.'#experience'; ?>" title="">Edit Experience</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Address-->          
    
   <!-- Portfolio Items Information box -->       			
       		<div class="box ">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Portfolio Items
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                 <div class="box-body bg-gray">
                 <div class="row">
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>List of Portfolio items : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $talent['talent_id']."".$talent['portfolio_item_id']; ?></p>
	            </div>
				
				</div>
				
				</div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent_id.'#portfolio'; ?>" title="">Edit Portfolio Items</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Emergency Contact Information-->     
                     			
       		</div><!-- /.Row 1 Column 1 Ends-->
<!-- Row 1 Column 2 Starts -->
			<div class="col-md-6 col-sm-6">
			
 <!-- Vital Information box -->   			
			<div class="box ">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Vital Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                <div class="box-body bg-gray">
				<div class="row">
				
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Height <small>cm</small>:</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $height_cm; ?></p>
	            </div>
	              
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Weight <small>kg</small>: </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $weight_kg;  ?></p>
	            </div>
	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Hair Color : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $hair_color; ?></p>
	            </div>
	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Eye Color :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $eye_color; ?></p>
	            </div>
	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Dress Size:</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $dress_size; ?></p>
	            </div>
	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Shoe Size :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $shoe_size; ?></p>
	            </div>
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Waist <small>cm</small> :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $waist_cm; ?></p>
	            </div>
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Collar <small>cm</small> :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $collar_cm; ?></p>
	            </div>
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Chest <small>cm</small> :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $chest_cm; ?></p>
	            </div>
		            	                        
              	
              </div>
				  </div>
				  	   
            <div class="box-footer">
			 <div class="text-right"><a  href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent_id.'#vitals'; ?>" title="">Edit Vitals Information</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Work Information box  -->     
       
            			
  <!-- Employability Information box -->   			
			<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Employability Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-info">
				  <div class="row">
				  
				<div class="col-md-6 col-sm-6 ">
	            		<p class="text-right"><strong>Nationality :</strong></p>
	            	</div>
	            	<div class="col-md-6 col-sm-6"> 
	            		<p class="text-left"><?php echo $nationality;  ?></p>
	            </div>	
				  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Is Qatari? :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $is_qatari; ?></p>
	            </div>
	
				  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Qatari ID :</strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $qatari_id; ?></p>
	            </div>
  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Qatari ID Copy? : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $qatari_id_copy_attached; ?></p>
	            </div>
				  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Passport No : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $passport_no; ?></p>
	            </div>
				  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Passport ID Copy? : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $passport_copy_attached; ?></p>
	            </div>
				  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>NOC Required? : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $noc_required; ?></p>
	            </div>
								  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>NOC Copy? : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $noc_copy_attached; ?></p>
	            </div>
								  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Sponsors ID Copy? : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $sponsors_id_copy_attached; ?></p>
	            </div>
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Available for Events ? : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $events; ?></p>
	            </div>
	
              </div>
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent_id.'#employability'; ?>" title="">Edit Employability Information</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Contract Information box  --> 
          
   <!-- Spoken Languages  -->       			
       		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Spoken Languages
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-gray">
                  <div class="row">
                  					  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Spoken Languages : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $talent['talent_id']."".$talent['language_id']; ?></p>
	            </div>
                  					  	            
                  	
                  </div>
				  
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent_id.'#languages'; ?>" title="">Edit Spoken Languages</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Languages -->      
         			
</div> 	<!-- /.Row 1 Colum 2 Ends-->

</div> <!-- /.Row 1 Ends-->
 <!-- Row 2 Starts -->        
<div class="row">
 <!-- Row 2 Column 1 Starts -->
       		<div class="col-md-6">
              
   <!-- Talent Photos box -->       			
       		<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Talent Photos
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-info">
				  <div class="row">
                  					  	            
				<div class="col-md-6 col-sm-6  ">
	            		<p class="text-right"><strong>Talent Photos : </strong></p>
	            </div>
	            <div class="col-md-6 col-sm-6 "> 
	            		<p class="text-left"><?php echo $talent['talent_id']."".$talent['talent_photo_id']; ?></p>
	            </div>
                  					  	            
                  	
                  </div>
				  
				  </div>
				  	   
            <div class="box-footer">
			<div class="text-right"><a  href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent_id.'#photos'; ?>" title="">Edit Talent Photos</a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Talent Photos  -->  
  			
       		</div><!-- /.Row 2 Column 1 Ends-->

<!-- Row 2 Column 2 Starts -->
			<div class="col-md-6">
			
 <!-- Talent Notes box -->   			
			<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Notes
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body bg-gray">
				    <div class="row"> 	            
				<div class="col-md-10 col-sm-10 ">
					
	            <p class="text-right"><?php echo $talent['talent_id']."".$talent['$comment'];?></p>
	            
	            </div>
	            
				  </div>
				 </div> 	   
            <div class="box-footer">
			<div class="text-right"><a  href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent_id.'#notes'; ?>" title="">Add Notes </a></div>
            </div><!-- /.box-footer-->
          </div><!-- /.box Deductions  -->       			
  
</div> 	<!-- /.Colum 2 Ends-->
</div> <!-- /.Row 2 Ends-->

 
				  </div>
			
            <div class="box-footer">
             <small></small>
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
     	 </section><!-- /.content -->
