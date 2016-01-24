<?php

$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Users'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell("<a class='pull btn btn-success btn-md' href ='".$_SERVER['PHP_SELF']."?route=modules/portfolio_types/add_portfolio_type'>Add New Portfolio Type&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a>");
$tbl->addRow();
$tbl->addCell('Type ID', '', 'header');
$tbl->addCell('Type Name', '', 'header');
$tbl->addCell('Description', '', 'header');
$tbl->addCell('History', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');

 
$sql = 'SELECT * FROM tams_portfolio_items WHERE portfolio_item_status = "active"';
$get_portfolio_types = DB::query($sql);
foreach($get_portfolio_types as $type) { 
$tbl->addRow();
$tbl->addCell($type['portfolio_item_id']);
$tbl->addCell($type['portfolio_item_name']);
$tbl->addCell($type['portfolio_item_desc']);
 $tbl->addCell("<p>Created on: <strong> ".getDateTime($type['created_on'],'dtLong')." </strong> by <strong>".get_user_name($type['created_by'])."</strong></p> <p>Last Modified: <strong>".getDateTime($type['last_modified_on'],"dtLong")." </strong> by <strong>".get_user_name($type['last_modified_by'])."</strong></p>  ");
$tbl->addCell("<a class='pull btn btn-danger btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/portfolio_types/edit_portfolio_type&portfolio_item_id=".$type['portfolio_item_id']."'>Edit Portfolio Type&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a>
			   ");
}
			  

?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	System Settings
            <small>list of Portfolio Types. </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">List Portfolio Types</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Portfolio Types</h3>
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