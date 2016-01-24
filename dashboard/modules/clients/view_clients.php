<?php
$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Users'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell("<a class='pull btn btn-success btn-md' href ='".$_SERVER['PHP_SELF']."?route=modules/clients/add_client'>Add New Client&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a>");
$tbl->addRow();
$tbl->addCell(' Client ID', '', 'header');
$tbl->addCell(' Client Name', '', 'header');
$tbl->addCell('Address', '', 'header');
$tbl->addCell('Country', '', 'header');
$tbl->addCell('Phone No', '', 'header');
$tbl->addCell('Email', '', 'header');
$tbl->addCell('History', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');

 
$sql = 'SELECT * FROM tams_clients WHERE client_status = "active"';
$get_client= DB::query($sql);
foreach($get_client as $client) { 
$tbl->addRow();
$tbl->addCell($client['client_id']);
$tbl->addCell($client['client_name']);
$tbl->addCell($client['client_address']);
$tbl->addCell($client['client_country']);
$tbl->addCell($client['client_phone_1']);
$tbl->addCell($client['client_email']);
$tbl->addCell("<p>Created on: <strong> ".getDateTime($type['created_on'],'dtLong')." </strong> by <strong>".get_user_name($type['created_by'])."</strong></p> <p>Last Modified: <strong>".getDateTime($type['last_modified_on'],"dtLong")." </strong> by <strong>".get_user_name($type['last_modified_by'])."</strong></p>  ");
$tbl->addCell("<a class='pull btn btn-danger btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/clients/edit_client&client_id=".$client['client_id']."'>Edit Client&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a>
			   ");
}
		
?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	System Settings
            <small>list of Clients. </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">List Clients</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Clients</h3>
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