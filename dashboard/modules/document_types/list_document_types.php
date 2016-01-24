<?php

$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Users'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell("<a class='pull btn btn-success btn-md' href ='".$_SERVER['PHP_SELF']."?route=modules/document_types/add_document_type'>Add New Document Type&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a>");
$tbl->addRow();
$tbl->addCell('Type ID', '', 'header');
$tbl->addCell('Type Name', '', 'header');
$tbl->addCell('Description', '', 'header');
$tbl->addCell('Extension','','header');
$tbl->addCell('History', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');

 
$sql = 'SELECT * FROM tams_document_types WHERE document_type_status = "active"';
$get_document_types = DB::query($sql);
foreach($get_document_types as $type) { 
$tbl->addRow();
$tbl->addCell($type['document_type_id']);
$tbl->addCell($type['document_type_name']);
$tbl->addCell($type['document_type_desc']);
$tbl->addCell($type['document_type_extension']);
 $tbl->addCell("<p>Created on: <strong> ".getDateTime($type['created_on'],'dtLong')." </strong> by <strong>".get_user_name($type['created_by'])."</strong></p> <p>Last Modified: <strong>".getDateTime($type['last_modified_on'],"dtLong")." </strong> by <strong>".get_user_name($type['last_modified_by'])."</strong></p>  ");
$tbl->addCell("<a class='pull btn btn-danger btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/document_types/edit_document_type&document_type_id=".$type['document_type_id']."'>Edit Document Type&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a>
			   ");
}
			  

?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	System Settings
            <small>list of Document Types. </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">List Document Types</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Document Types</h3>
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