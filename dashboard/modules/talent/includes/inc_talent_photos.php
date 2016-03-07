<?php
//reset all the form fields
$photo_path="";
$photo_caption="";

if(isset($_GET['talent_id']))
{
	$talent_id = $_GET['talent_id'];
}

$photo_sql    = "SELECT
*
FROM
tams_talent_photos
WHERE talent_id = $talent_id";

$talent_photos = DB::query($photo_sql);

// getting values from $_post variable & saving into normal variables

/*
if(isset($_POST['save'])) {
 
$talent_id = $_POST['talent_id'];
$last_modified_by = $_SESSION['user_id'];
$last_modified_on = getDateTime(NULL,"mySQL");

// if talent id is not empty update the database
 
	if($talent_id <> ""){
		$update = DB::update('tams_talent_photos', array(
			
			'talent_id' => $talent_id,
			'last_modified_by'	=> $last_modified_by,
			'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
		
	//check if the file is uploaded and process the file if file is uploaded	
	
	if(!file_exists($_FILES['talent_photo']['tmp_name']) || !is_uploaded_file($_FILES['talent_photo']['tmp_name'])) {
		echo '<h2> No Logo ploaded</h2>';
	}  else {
		echo '<h2> Logo was uploaded</h2>';
	}
	//if logo file is uploaded process the file with upload class
	
	$handle = new upload($_FILES['talent_photo']);
		if ($handle->uploaded) {
			$handle->file_new_name_body   = $talent_id.'_photo';
			$handle->image_resize         = true;
			$handle->image_x              = 100;
			$handle->image_ratio_y        = true;
			$handle->allowed = array('image/*');
			$handle->image_convert = 'jpg';
			//$handle->file_overwrite = true;
			$handle->process('../uploads/talent_photos/');
		if ($handle->processed) {
			
	// save uploaded file name and path in database table field logo_url
	
	
			$last_modified_by = $_SESSION['user_id'];
			$last_modified_on = getDateTime(NULL,"mySQL");
*/			
	/* if client id is not empty update the database */
/*	
		if($talent_id <> ""){
				$update = DB::update('tams_talent_photos', array(

				'photo_path'=> '/talent/uploads/talent_photos/'.$talent_id.'_photo',
				'photo_caption'=> $_POST['photo_caption'],
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
		
		}
		echo 'Photo is uploaded and path select saved in database';	
			$handle->clean();
		} else {
			echo 'error : ' . $handle->error;
		} // close handle processed
		} // close handle uploaded
		} // close file exist	
}
*/
?>
<form enctype="multipart/form-data" id="edit_talent_photos_info" name="edit_talent_photos_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id=<?php echo $talent_id; ?>" >
<!-- Talent Photos Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Photos
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
                       
            <div class="box-body bg-info">
            <div class="row">
            	<div class="form-group">
				 <?php  foreach($talent_photos as $photo) {?>
				  	<div class="col-md-3 col-sm-3 file-preview-frame" style="background-color:whitesmoke;">
					<a class="pull-right btn btn-default btn-xs" href="process_talent_deletes.php?action=delete_talent_photo&id=<?php echo $photo['talent_photo_id']; ?>&talent_id=<?php echo $talent_id; ?>" 
    onclick="return confirm('Are you sure you wish to delete this Record?');" > X </a>
				<img  class="img-responsive center-block img-rounded" src="<?php echo $photo['photo_path']; ?>" alt="<?php echo $photo['photo_caption']; ?>"  />	<span class="caption"><?php echo $photo['photo_caption']; ?></span>
			
				  	</div>
				<?php }  ?>
				  
            	</div>	
            </div>
                        
            <div class="row">
  					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
						Add a Photo :
						</label>
						<div class="col-md-9 col-sm-9">
		<!-- input-group image-preview [FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button  type="submit" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" required  accept="image/png, image/jpeg, image/gif" name="talent_photo" id="talent_photo"/> <!-- Form Upload Field -->
                    </div>
                    <button   name="save" type="submit" class="btn btn-labeled btn-default"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
                </span>
            </div><!-- /input-group image-preview [TO HERE]-->
						</div>
					</div>
						<!--Hidden Caption Field-->
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="hidden" placeholder="Enter Photo Caption Or Description" 
							 value="" name="photo_caption" id="photo_caption">							
						  </div>
					<!--Hidden Caption Field-->
				</div> <!--/.row-->
			 				<div class="box-footer">
 								<div class="form-group">
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/view_talents"?>">
							Cancel &nbsp;
							<i class="fa fa-chevron-circle-right">
							</i>
						</a>
						<button style="margin-right:10px;" type="submit" class='btn btn-success btn-lg pull-right' name="save" value="save">
							Save &nbsp;
							<i class="fa fa-chevron-circle-right">
							</i>
					</button>
					</div>	<!-- /.col -->
				</div>		<!-- /form-group -->
				<small>
				</small>
			</div><!-- /.box-footer-->	
				</div><!--/.box-body-->
				</div><!--Photos Information Box-->
		<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="add_talent_photo" />
<input type="hidden" name="talent_id" id="photos_talent_id" value="<?php echo $talent_id; ?>" />
<!-- /Hidden Fields -->
</form>		