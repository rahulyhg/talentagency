<?php
		
		//check if the file is uploaded and process the file if file is uploaded	
	
	if(!file_exists($_FILES['talent_photo1']['tmp_name']) || !is_uploaded_file($_FILES['talent_photo1']['tmp_name'])) {
		echo '<h2> No Logo ploaded</h2>';
	}  else {
		echo '<h2> Logo was uploaded</h2>';
	}
$handle = new upload($_FILES['talent_photo1']);
if ($handle->uploaded) {
  $handle->file_new_name_body   = $talent_id.'_profile';
  $handle->image_resize         = true;
  $handle->image_x              = 100;
  $handle->image_ratio_y        = true;
  $handle->process('..uploads/talent/talent_profiles/');
  if ($handle->processed) {
    echo 'image resized';
    $handle->clean();
  } else {
    echo 'error : ' . $handle->error;
  }
}
echo '<h2> $_FILES variable</h2>';
echo "<pre>";
print_r($_FILES);
echo "</pre>";	
	
?>
<form enctype="multipart/form-data" id="edit_talent_basic_info" name="edit_talent_basic_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >
 <!-- Basic Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Basic Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body bg-info">
            <div class="row">
  
  
  		    <h3 class="normal">Basic Information</h3>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Photo 1 :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">
								<input   class="input-group form-control" type="file" value="" name="talent_photo1" id="talent_photo1"  >
								<img src="<?php echo $photo1_url; ?>" alt="no logo uploaded" />
							</div>
						</div>
					</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Photo Caption:
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text" required
									value="<?php echo $photo1_caption; ?>" name="photo1_caption" id="photo1_caption" placeholder="Enter Photo Caption">
								</div>
							</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Photo 2 :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">
								<input   class="input-group form-control" type="file" value="" name="talent_photo2" id="talent_photo2"  >
								<img src="<?php echo $photo2_url; ?>" alt="no photo uploaded" />
							</div>
						</div>
					</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Photo Caption:
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text" required
									value="<?php echo $photo2_caption; ?>" name="photo2_caption" id="photo2_caption" placeholder="Enter Photo Caption">
								</div>
							</div>
						<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									First Name:
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text" required
									value="<?php echo $first_name; ?>" name="first_name" id="first_name" placeholder="Enter First Name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Last Name
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text" required placeholder="Enter Last Name"
									value="<?php echo $last_name; ?>" name="last_name" id="last_name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Date of Birth:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">

										<input   class="date input-group form-control"     type="date" required value="<?php echo $dob; ?>" name="dob" id="dob">
										<div class="input-group-addon">
											<i class="fa fa-calendar">
											</i>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Sex:
								</label>
								<div class="col-md-9 col-sm-9">
									<select id="sex" name="sex" class="form-control">
										<option value="" >
											-Select gendar-
										</option>
										<option value="Male" <?php if($sex == "Male"){ echo 'selected = "selected" ';}?>>
											Male
										</option>
										<option value="Female" <?php if($sex == "Female"){ echo 'selected = "selected" ';}?>>
											Female
										</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Brief:
								</label>
								<div class="col-md-9 col-sm-9">
									<textarea class="form-control" required value="" name="brief" id="brief" placeholder="Enter Brief"><?php echo $brief; ?>
									</textarea>
								</div>
							</div>
  
              </div> <!--/.body-box-->
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
             </div> <!--/.row-->
   	 

	 
          </div><!-- /.box Basic Information-->
			<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_talent_basic_info" />
<!-- /Hidden Fields -->
</form>		