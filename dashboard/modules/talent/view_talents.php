<?php

$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Users'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell("<a class='pull btn btn-success btn-md' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/add_talent'>Add New Talent&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a>");
$tbl->addRow();
$tbl->addCell('Photo', '', 'header');
$tbl->addCell('Full Name', '', 'header');
$tbl->addCell('Gender', '', 'header');
$tbl->addCell('Age', '', 'header');
$tbl->addCell('PhoneNo', '', 'header');
$tbl->addCell('Email', '', 'header');
$tbl->addCell('Nationality', '', 'header');
$tbl->addCell('Brief', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');


 
$sql = 'SELECT * FROM tams_talent';
$get_talents = DB::query($sql);
foreach($get_talents as $talent) { 
$tbl->addRow();
$tbl->addCell("<a href='".$_SERVER['PHP_SELF']."?route=modules/talent/view_talent_profile&talent_id=".$talent['talent_id']."'><img src='".$talent['photo1_url']."' alt='Photo1'  height='100px'; /></a>");
$tbl->addCell($talent['first_name']." ".$talent['last_name']);
$tbl->addCell($talent['sex']);
$tbl->addCell(getAge($talent['dob']));
$tbl->addCell($talent['mobile_no']);
$tbl->addCell("<a href='mailto:".$talent['email_id']."' >".$talent['email_id']."</a>");
$tbl->addCell($talent['nationality']);
$tbl->addCell($talent['brief']);
$btnStr = ' onclick="'; 
$btnStr .= " return confirm('Are you sure you wish to delete this Record?'); ";
$btnStr .= ' " ';
$tbl->addCell("<a class=' btn btn-success btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent['talent_id']."'>Edit &nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a> &nbsp;&nbsp;
			   <a class='btn btn-info btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/view_talent_profile&talent_id=".$talent['talent_id']."'>View &nbsp;&nbsp;<span class='glyphicon glyphicon-user'></span></a>
			   <a class='pull btn btn-warning btn-xs' href ='process_delete_talent.php?action=delete_talent&id=".$talent['talent_id']."' ".$btnStr."  >Delete &nbsp;&nbsp;<span class='glyphicon glyphicon-trash'></span></a><br/>
			   <a class='pull btn btn-danger btn-xs' target='_blank' href ='".$_SERVER['PHP_SELF']."?route=modules/talent_lists/add_talent_to_list&talent_id=".$talent['talent_id']."' >Save &nbsp;&nbsp;<span class='glyphicon glyphicon-heart'></span></a><br/>");
}
// Draft Talents list
/*
$tbl2 = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Draft Talents'));
$tbl2->addTSection('thead');
$tbl2->addRow();
$tbl2->addCell('Photo', '', 'header');
$tbl2->addCell('Full Name', '', 'header');
$tbl2->addCell('Gender', '', 'header');
$tbl2->addCell('Age', '', 'header');
$tbl2->addCell('PhoneNo', '', 'header');
$tbl2->addCell('Email', '', 'header');
$tbl2->addCell('Nationality', '', 'header');
$tbl2->addCell('Brief', '', 'header');
$tbl2->addCell('Actions', '', 'header');
$tbl2->addTSection('tbody');


 
$sql = 'SELECT * FROM tams_talent WHERE talent_status = "draft"';
$get_talents = DB::query($sql);
foreach($get_talents as $talent) { 
$tbl2->addRow();
$tbl2->addCell("<a href='".$_SERVER['PHP_SELF']."?route=modules/talent/view_talent_profile&talent_id=".$talent['talent_id']."'><img src='".$talent['photo1_url']."' alt='Photo1'   height='100px'; /></a>");
$tbl2->addCell($talent['first_name']." ".$talent['last_name']);
$tbl2->addCell($talent['sex']);
$tbl2->addCell(getAge($talent['dob']));
$tbl2->addCell($talent['mobile_no']);
$tbl2->addCell($talent['email_id']);
$tbl2->addCell($talent['nationality']);
$tbl2->addCell($talent['brief']);
$tbl2->addCell("<a class='pull btn btn-danger btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent['talent_id']."'>Edit Talent&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a>
			   <a class='pull btn btn-info btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/view_talent_profile&talent_id=".$talent['talent_id']."'>View Profile&nbsp;&nbsp;<span class='glyphicon glyphicon-user'></span></a>");
  
}			  
 */
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
     
     	 </section><!-- /.content -->