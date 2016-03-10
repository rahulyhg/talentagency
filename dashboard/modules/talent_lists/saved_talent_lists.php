<?php

$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'Saved Talent Lists'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell("<a class='pull btn btn-success btn-md' href ='".$_SERVER['PHP_SELF']."?route=modules/talent_lists/create_talent_list'>Create New Talent List&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></a>");
$tbl->addRow();
$tbl->addCell('Title', '', 'header');
$tbl->addCell('Count', '', 'header');
$tbl->addCell('Talents Included', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');

$dbh='SELECT talent_list_id,COUNT(*)  
FROM tams_talent_list_items 
GROUP BY talent_list_id';
$get_count = DB::query($dbh);
foreach($get_count as $row);

 
$sql = 'SELECT * FROM tams_talent_lists';
$get_saved_lists = DB::query($sql);
foreach($get_saved_lists as $list) { 
$tbl->addRow();
$tbl->addCell($list['talent_list_title']);
$tbl->addCell("<span class='center-block'>".$row['COUNT(*)']."</span>");
$tbl->addCell(list_talents_name($list['talent_list_id']));
$btnStr = ' onclick="'; 
$btnStr .= " return confirm('Are you sure you wish to delete this Record?'); ";
$btnStr .= ' " ';
$tbl->addCell("<a class=' btn btn-info btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/talent_lists/view_a_talent_list&talent_list_id=".$list['talent_list_id']."'>View List &nbsp;&nbsp;<span class='glyphicon glyphicon-list'></span></a> &nbsp;&nbsp;
			   <a class='btn btn-danger btn-xs' href ='process_delete_talent_list.php?action=delete_talent_list&id=".$list['talent_list_id']."' ".$btnStr."  >Delete &nbsp;&nbsp;<span class='glyphicon glyphicon-trash'></span></a><br/>");
}
 
?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          	Manage Talent Lists
            <small>list of Saved Talent Lists </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Manage Talent Lists</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Active Talent Lists</h3>
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