<?php
$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Users'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell("<a class='pull btn btn-success btn-md' href ='".$_SERVER['PHP_SELF']."?route=modules/clients/add_client'>Add New Client&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a>");
$tbl->addRow();
$tbl->addCell(' Client ID', '', 'header');
$tbl->addCell(' Company Logo','','header');
$tbl->addCell(' Company Name','','header');
$tbl->addCell(' Contact Person Name', '', 'header');
$tbl->addCell('Title/Position','','header');
$tbl->addCell('Country', '', 'header');
$tbl->addCell('Phone No', '', 'header');
$tbl->addCell('Email', '', 'header');
$tbl->addCell('Notes','','header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');

$mysql ='SELECT * FROM tams_client_comments WHERE client_id ="$client_id"'; 
$client_comment = DB::queryFirstRow($mysql);
$client_comment_id = $client_comment['client_comment_id'];
$client_id = $client_comment ['client_id'];
$comment = $client_comment['comment'];
$created_on = $client_comment['created_on'];
$created_by = $client_comment['created_by'];
$last_modified_by = $client_comment['last_modified_by'];
$last_modified_on = $client_comment['last_modified_on'];

$sql = 'SELECT * FROM tams_clients WHERE client_status = "active"';
$get_client_name= DB::query($sql);
foreach($get_client_name as $client) { 
$tbl->addRow();
$tbl->addCell($client['client_id'].'&nbsp&nbsp'."<a class='pull btn btn-info btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/clients/view_client_profile&client_id=".$client['client_id']."'>View Profile&nbsp;&nbsp;<span class='glyphicon glyphicon-user'></span></a>
			   ");
$tbl->addCell('<img src="'.$client['logo_url'].'" alt="Logo" width="100px" height="100px"; />');
$tbl->addCell($client['company_name']);
$tbl->addCell($client['client_name']);
$tbl->addCell($client['client_title']);
$tbl->addCell($client['client_country']);
$tbl->addCell($client['client_phone_1']);
$tbl->addCell($client['client_email']);



$comment_sql = "SELECT 
			comment
			FROM 
			tams_client_comments
			WHERE client_id = '".$client['client_id']."' ORDER BY created_on DESC";

$client_comment =  left(DB::queryFirstField($comment_sql), 50);

if($client_comment){

$tbl->addCell($client_comment."...<a  href ='".$_SERVER['PHP_SELF']."?route=modules/clients/view_client_profile&client_id=".$client['client_id']."'>View More</a>");	
} else {
	$tbl->addCell("<a  href ='".$_SERVER['PHP_SELF']."?route=modules/clients/view_client_profile&client_id=".$client['client_id']."'>Add Note</a>");	
}


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