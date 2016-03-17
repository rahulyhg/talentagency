<?php
if(isset($_GET['talent_list_id']))
{
$talent_list_id = $_GET['talent_list_id'];

$sql = "SELECT * FROM tams_talent WHERE talent_id IN (
SELECT talent_id 
FROM tams_talent_list_items
WHERE talent_list_id= $talent_list_id)";
$sql .= 'LIMIT 20';
$get_talents = DB::query($sql);
}
if(isset($_GET['talent_list_id'])){
	$talent_list_id = $_GET['talent_list_id'];

		$sql = "SELECT
				*
				FROM
				tams_talent_lists
				WHERE talent_list_id = $talent_list_id ;";
$talent= DB::queryFirstRow($sql);
$talent_list_id = $talent['talent_list_id'];
$talent_list_title = $talent['talent_list_title'];
$talent_list_details = $talent['talent_list_details'];
$created_on = $talent['created_on'];
$created_by = $talent['created_by'];
$last_modified_by = $talent['last_modified_by'];
$last_modified_on = $talent['last_modified_on'];
}

?>

  <!-- Main content -->
        <section class="content">
<form enctype="multipart/form-data" id="view_talent_list" name="view_talent_list" class="form-horizontal" method="post" action="process_talent_lists.php?talent_list_id=<?php echo $talent_list_id; ?>" >
<!-- Default box -->	
			<div class="box-footer">
	
			<div class="box">
			<div class="box-header with-border text-center">
              <h2 class="box-title "><strong><?php echo $talent_list_title; ?></strong></h2>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
		<div class="box-body" >
		<div class="row">
		<?php 
		foreach($get_talents as $talent) {  
					  
		?>			
	        <div class="col-md-12 col-sm-12" >
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user text-center">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $talent['first_name']." ".$talent['last_name']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $talent['sex'].",&nbsp;". getAge($talent['dob']);  ?> Years</h5>
            </div>
            
            <div class="box-footer">
            <div class="row">
			<img class="img-circle" src="<?php echo $talent['photo1_url']; ?>"  alt="talent_photo"  />&nbsp;
			<img class="img-circle" src="<?php echo $talent['photo2_url']; ?>"  alt="talent_photo"  />
            </div>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>	<!--.col-->			
			
<?php 
}		  

?>			
			</div> <!--.row-->
			</div> <!--.box-body-->
			</div> <!--.box-->
			</form>
			
			</section><!-- /close section --> 
			
<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="view_talent_list" />
<input type="hidden" name="talent_list_id" id="talent_list_id" value="<?php echo $_GET['talent_list_id']; ?>" />					 
<!-- /Hidden Fields --> 
			