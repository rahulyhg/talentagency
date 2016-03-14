<?php
//reset all the form fields
$talent_list_title        = "";
$talent_list_details      = "";

// getting values from $_post variable & saving into normal variables

if(isset($_POST['save'])) {
 
$talent_list_id = $_POST['talent_list_id'];
$talent_list_title =$_POST['talent_list_title'];
$talent_list_details = $_POST['talent_list_details'];
$last_modified_by = $_SESSION['user_id'];
$last_modified_on = getDateTime(NULL,"mySQL");

// if talent list id is not empty update the database
 
	if($talent_list_id <> ""){
		$update = DB::update('tams_talent_lists', array(
			
			'talent_list_title'=> $talent_list_title,
			'talent_list_details'=> $talent_list_details,
			'last_modified_by'	=> $last_modified_by,
			'last_modified_on'	=> $last_modified_on
			),
			"talent_list_id=%s", $talent_list_id
		);
	}
	//if update is successful redirect the page to view talent list
				
		if($update)
		{
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/talent_lists/saved_talent_lists");</script>';
		}
}
if(isset($_GET['talent_list_id'])){
	$talent_list_id = $_GET['talent_list_id'];

		$sql = "SELECT
				*
				FROM
				tams_talent_lists
				WHERE talent_list_id = $talent_list_id";
$talent= DB::queryFirstRow($sql);
$talent_list_id = $talent['talent_list_id'];
$talent_list_title = $talent['talent_list_title'];
$talent_list_details = $talent['talent_list_details'];
$created_on = $talent['created_on'];
$created_by = $talent['created_by'];
$last_modified_by = $talent['last_modified_by'];
$last_modified_on = $talent['last_modified_on'];
}
if(isset($_GET['talent_list_id']))
{
$talent_list_id = $_GET['talent_list_id'];

$sql = "SELECT * FROM tams_talent WHERE talent_id IN (
SELECT talent_id 
FROM tams_talent_list_items
WHERE talent_list_id= $talent_list_id);";
$get_talents = DB::query($sql);
}

?>


 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          Manage Talent Lists
            <small>Edit Talent List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Edit Talent List</li>
          </ol>
        </section>

        <!-- Main content -->
		  <!-- Main content -->
        <section class="content">
<form enctype="multipart/form-data" id="edit_talent_list" name="edit_talent_list" class="form-horizontal" method="post" action="process_talent_lists.php?talent_list_id=<?php echo $talent_list_id; ?>" >
 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Talent List</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
			
		
                  <div class="box-body" >
                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Talent List Title:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Add Talent List Title Here" 
							 value="<?php echo $talent_list_title;?>" name="talent_list_title" id="talent_list_title">							
						  </div>
					</div>

                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Talent List Details:</label>
						  <div class="col-md-9 col-sm-9">
							 <textarea class="form-control" placeholder="Add Talent List Details Here" 
							  name="talent_list_details" id="talent_list_details">	
							<?php echo $talent_list_details;?>
							</textarea>
			<script>
                // Replace the <textarea id="talent_list_details"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'talent_list_details' );
            </script>
						  </div>
					</div>
				</div><!-- /.box-body -->
		
			</div> <!--.box-->
			<div class="box">
			 <div class="box-body" >
			<div class="box-header with-border">
              <h3 class="box-title">Talents In This List</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                 
		<div class="row">
		<?php 
		foreach($get_talents as $talent) {  
					  
		?>			
	        <div class="col-md-4 col-sm-6" >
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $talent['first_name']." ".$talent['last_name']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $talent['sex'].",&nbsp;". getAge($talent['dob']);  ?> Years</h5>
            </div>
            <div class="widget-user-image">
            <img class="img-circle" src="<?php echo $talent['photo1_url']; ?>"  alt="talent_photo"  />
            </div>
            <div class="box-footer">
            <div class="row">
            <?php
			$events = $talent['events'];
				if (is_null($events) OR $events == "" ) {
					$events = " - not set - ";
				} 
				elseif($events == 1 ){
					$events = "Yes";
				}
				else {
					$events ="No"; 
				} 

			
			?>
                  
              <ul class=" nav nav_stacked">
			 <li ><strong>From</strong></br><?php echo $talent['nationality'];?></li></br>
                <li><strong>Having Skill :</strong>&nbsp;<?php echo list_talent_experience($talent['talent_id']);?></li></br>
                <li><strong>Languages known :</strong>&nbsp;<?php echo list_talent_language($talent['talent_id']);?></li></br>
				<li><strong>Available for Event ?</strong>&nbsp;<?php echo $events;?></li>
              </ul>
            </div>
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <span class="description-text">
					<a class='btn btn-warning btn-circle btn-lg' title="Remove From List" href ="process_talent_deletes.php?action=delete_talent_from_list&id=<?php echo get_talent_list_item_id($talent['talent_id']); ?>&talent_id=<?php echo $talent['talent_id']; ?>" onclick="return confirm('Are you sure you wish to remove this Record?');"  >&nbsp;&nbsp;<span class='glyphicon glyphicon-trash'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
            
				</div>
				
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <span class="description-text">
					<a class='btn btn-info btn-circle btn-lg' target="_blank" title="View Profile" href ="index.php?route=modules/talent/view_talent_profile&talent_id=<?php echo $talent['talent_id']; ?>">&nbsp;&nbsp;<span class='glyphicon glyphicon-user'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                 
                    <span class="description-text">
					<a class='btn btn-danger btn-circle btn-lg' target="_blank" title="Add to favourite" href ="index.php?route=modules/talent_lists/add_talent_to_list&talent_id=<?php echo $talent['talent_id']; ?>">&nbsp;&nbsp;<span class='glyphicon glyphicon-heart'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>				
			
<?php 
}		  

?>	
			</div> <!--.row-->
				</div><!-- /.box-body -->
				
				<div class="box-footer">
			 <div class="form-group"  >
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent_lists/saved_talent_lists"?>">Cancel &nbsp; <i class="fa fa-chevron-circle-right"></i></a>					
						<button style="margin-right:10px;" type="submit" class='btn btn-success btn-lg pull-right' name="save" value="save">Save &nbsp; <i class="fa fa-chevron-circle-right"></i></button>
					</div>	<!-- /.col -->
				 </div>		<!-- /form-group -->
            </div><!-- /.box-footer-->
		 </div><!-- /.box -->
	
<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_talent_list" />
<input type="hidden" name="talent_list_id" id="talent_list_id" value="<?php echo $talent_list_id; ?>" />					 
<!-- /Hidden Fields -->
</form>
</section>
