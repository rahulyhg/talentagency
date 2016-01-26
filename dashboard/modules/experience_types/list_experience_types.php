<?php

$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Users'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell("<a class='pull btn btn-success btn-md' href ='".$_SERVER['PHP_SELF']."?route=modules/experience_types/add_experience_type'>Add New Experience Type&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a>");
$tbl->addRow();
$tbl->addCell('Type ID', '', 'header');
$tbl->addCell('Type Name', '', 'header');
$tbl->addCell('Description', '', 'header');
$tbl->addCell('Status', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');

 
$sql = 'SELECT * FROM tams_experience_items WHERE experience_item_status = "active"';
$get_experience_types = DB::query($sql);
foreach($get_experience_types as $type) { 
$tbl->addRow();
$tbl->addCell($type['experience_item_id']);
$tbl->addCell($type['experience_item_name']);
$tbl->addCell($type['experience_item_desc']);
$tbl->addCell($type['experience_item_status']);
$tbl->addCell("<a class='pull btn btn-danger btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/experience_types/edit_experience_type&experience_item_id=".$type['experience_item_id']."'>Edit Experience Type&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a>
			   ");
}
			  

?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	System Settings
            <small>list of Experience Types. </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">List Experience Types</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Experience Types</h3>
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