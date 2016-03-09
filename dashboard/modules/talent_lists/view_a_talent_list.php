<?php
$sql = 'SELECT * FROM tams_talent WHERE talent_list_id = "talent_list" ';
$sql .= 'LIMIT 20';
$get_talents = DB::query($sql);
?>
 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          View Talent List
            <small>view All Talent List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Add Talent List</li>
          </ol>
        </section>

        <!-- Main content -->
  <!-- Main content -->
        <section class="content">
<form id="add_talent_list" name="add_talent_list" class="form-horizontal" method="post" action="process_talent_lists.php?talent_list_id=<?php echo $talent_list_id; ?>" >
<!-- Default box -->
           <div class="box">
            <div class="box-header with-border">
             <h3 class="box-title">Add Talent List</h3>
            <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div><!-- /box hearder close --> 
			</div><!-- /close box --> 
			</form>
			
			</section><!-- /close section --> 
			
			<!-- Hidden Fields -->
			<input type="hidden" name="form_name" id="form_name" value="add_talent_list" />
					 
			<!-- /Hidden Fields --> 
			