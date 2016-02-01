<?php

$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Users'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell("<a class='pull btn btn-success btn-md' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/add_talent'>Add New Talent&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a>");
$tbl->addRow();
$tbl->addCell('TalentID', '', 'header');
$tbl->addCell('Photo', '', 'header');
$tbl->addCell('First Name', '', 'header');
$tbl->addCell('Last Name', '', 'header');
$tbl->addCell('Gender', '', 'header');
$tbl->addCell('Nationality', '', 'header');
$tbl->addCell('Age', '', 'header');
$tbl->addCell('PhoneNo', '', 'header');
$tbl->addCell('Email', '', 'header');
$tbl->addCell('Registration Date', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');


 
$sql = 'SELECT * FROM tams_talent WHERE talent_status = "active"';
$get_talents = DB::query($sql);
foreach($get_talents as $talent) { 
$tbl->addRow();
$tbl->addCell($talent['talent_id']);
$tbl->addCell(getAge($talent['dob']));
$tbl->addCell($talent['first_name']);
$tbl->addCell($talent['last_name']);
$tbl->addCell($talent['email_id']);
$tbl->addCell($talent['role_id']);
 
$tbl->addCell("<a class='pull btn btn-danger btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent['talent_id']."'>Edit Talent&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a>
			   ");
}
// Draft Talents list

$tbl2 = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Draft Talents'));
$tbl2->addTSection('thead');
$tbl2->addRow();
$tbl2->addCell('TalentID', '', 'header');
$tbl2->addCell('Photo', '', 'header');
$tbl2->addCell('First Name', '', 'header');
$tbl2->addCell('Last Name', '', 'header');
$tbl2->addCell('Gender', '', 'header');
$tbl2->addCell('Nationality', '', 'header');
$tbl2->addCell('Age', '', 'header');
$tbl2->addCell('PhoneNo', '', 'header');
$tbl2->addCell('Email', '', 'header');
$tbl2->addCell('Registration Date', '', 'header');
$tbl2->addCell('Actions', '', 'header');
$tbl2->addTSection('tbody');


 
$sql = 'SELECT * FROM tams_talent WHERE talent_status = "draft"';
$get_talents = DB::query($sql);
foreach($get_talents as $talent) { 
$tbl2->addRow();
$tbl2->addCell($talent['talent_id']);
$tbl2->addCell($talent['photo1_url']);
$tbl2->addCell($talent['first_name']);
$tbl2->addCell($talent['last_name']);
$tbl2->addCell($talent['sex']);
$tbl2->addCell($talent['nationality']);
$tbl2->addCell(getAge($talent['dob']));
$tbl2->addCell($talent['mobile_no']);
$tbl2->addCell($talent['email_id']);
$tbl2->addCell($talent['registration_date']);
$tbl2->addCell("<a class='pull btn btn-danger btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent['talent_id']."'>Edit Talent&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a>
			   ");
}			  

?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	Available Talents
            <small>list of active and Available Talents </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">List Talents</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Active Talents</h3>
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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Draft Talents</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
				<?php  echo $tbl2->display(); ?>
            </div><!-- /.box-body -->
            <div class="box-footer">
            </div><!-- /.box-footer-->
          </div><!-- /.box -->          
     	 </section><!-- /.content -->