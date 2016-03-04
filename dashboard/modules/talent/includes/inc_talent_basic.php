<?php
//reset all the form fields
$first_name                = "";
$last_name                 = "";
$dob                       = "";
$sex                       = "";
$brief						="";
$address                   = "";
$mobile_no                  = "";
$email_id                  = "";
$nationality               = "";
$passport_no               = "";
$qatari_id                 = "";
$is_qatari                 = 0;
$passport_copy_attached    = 0;
$noc_required              = 0;
$noc_copy_attached         = 0;
$sponsors_id_copy_attached = 0;
$events="";
$height_cm = "";
$weight_kg ="";
$hair_color="";
$eye_color="";
$dress_size="";
$shoe_size="";
$waist_cm="";
$collar_cm="";
$chest_cm="";
$photo1_url="";
$photo1_caption="";
$photo2_url="";
$photo2_caption="";
$registration_date="";
$message="";

// getting values from $_post variable & saving into normal variables

if(isset($_POST['save'])) {
 
$talent_id = $_POST['talent_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];
$brief = $_POST['brief'];
$address = $_POST['address'];
$mobile_no = $_POST['mobile_no'];
$email_id = $_POST['email_id'];
$nationality = $_POST['nationality'];
$passport_no = $_POST['passport_no'];
$qatari_id   = $_POST['qatari_id'];
$is_qatari   = $_POST['is_qatari'];
$passport_copy_attached  = $_POST['passport_copy_attached'];
$noc_required     = $_POST['noc_required'];
$noc_copy_attached   = $_POST['noc_copy_attached'];
$sponsors_id_copy_attached = $_POST['sponsors_id_copy_attached'];
$events=$_POST['events'];
$height_cm = $_POST['height_cm'];
$weight_kg = $_POST['weight_kg'];
$hair_color=$_POST['hair_color'];
$eye_color=$_POST['eye_color'];
$dress_size=$_POST['dress_size'];
$shoe_size=$_POST['shoe_size'];
$waist_cm=$_POST['waist_cm'];
$collar_cm=$_POST['collar_cm'];
$chest_cm=$_POST['chest_cm'];
$photo1_caption=$_POST['photo1_caption'];
$photo2_caption=$_POST['photo2_caption'];
$registration_date=$_POST['registration_date'];
$talent_status = $_POST['talent_status']; 
$last_modified_by = $_SESSION['user_id'];
$last_modified_on = getDateTime(NULL,"mySQL");

 // if client id is not empty update the database
 
	if($talent_id <> ""){
		$update = DB::update('tams_talent', array(
			
			'first_name'=> $first_name,
			'last_name'=> $last_name, 
			'dob' => $dob,
			'sex' => $sex,
			'brief' => $brief,
			'address' => $address,
			'mobile_no' => $mobile_no,
			'email_id' => $email_id,
			'nationality' => $nationality,
			'passport_no' => $passport_no,
			'qatari_id' => $qatari_id,
			'is_qatari' => $is_qatari,
			'passport_copy_attached' => $passport_copy_attached,
			'noc_required' => $noc_required,
			'noc_copy_attached'=> $noc_copy_attached,
			'sponsors_id_copy_attached' => $sponsors_id_copy_attached,
			'events'=> $events,
			'height_cm' => $height_cm,
			'weight_kg' => $weight_kg,
			'hair_color'=>$hair_color,
			'eye_color'=>$eye_color,
			'dress_size'=>$dress_size,
			'shoe_size'=>$shoe_size,
			'waist_cm'=>$waist_cm,
			'collar_cm'=>$collar_cm,
			'chest_cm'=>$chest_cm,
			'photo1_url'=>$photo1_url,
			'photo1_caption'=>$photo1_caption,
			'photo2_url'=>$photo2_url,
			'photo2_caption'=>$photo2_caption,
			'registration_date'=>$registration_date,
			'talent_status' => $talent_status,
			'last_modified_by'	=> $last_modified_by,
			'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
			//check if the file is uploaded and process the file if file is uploaded	
	
	if(!file_exists($_FILES['talent_photo1']['tmp_name']) || !is_uploaded_file($_FILES['talent_photo1']['tmp_name'])) {
		echo '<h2> No Logo ploaded</h2>';
	}  else {
		echo '<h2> Logo was uploaded</h2>';
	}
	//if logo file is uploaded process the file with upload class
	
	$handle1 = new upload($_FILES['talent_photo1']);
		if ($handle1->uploaded) {
			$handle1->file_new_name_body   = $talent_id.'_photo1';
			$handle1->image_resize         = true;
			$handle1->image_x              = 100;
			$handle1->image_ratio_y        = true;
			$handle1->allowed = array('image/*');
			$handle1->image_convert = 'jpg';
			$handle1->file_overwrite = true;
			$handle1->process('..uploads/talent_profiles/');
		if ($handle1->processed) {
			
	// save uploaded file name and path in database table field logo_url
	
	
			$last_modified_by = $_SESSION['user_id'];
			$last_modified_on = getDateTime(NULL,"mySQL");
			
	/* if client id is not empty update the database */
	
		if($talent_id <> ""){
				$update = DB::update('tams_talent', array(

				'photo1_url'=> '/talent/uploads/talent_profiles/'.$talent_id.'_photo1.jpg',
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
		
		}
		echo 'Photo is uploaded and path select saved in database';	
			$handle1->clean();
		} else {
			echo 'error : ' . $handle1->error;
		} // close handle processed
		} // close handle uploaded
		} // close file exist
				
	//check if the file is uploaded and process the file if file is uploaded	
	
	if(!file_exists($_FILES['talent_photo2']['tmp_name']) || !is_uploaded_file($_FILES['talent_photo2']['tmp_name'])) {
		echo '<h2> No Logo ploaded</h2>';
	}  else {
		echo '<h2> Logo was uploaded</h2>';
	}
	//if logo file is uploaded process the file with upload class
	
	$handle2 = new upload($_FILES['talent_photo2']);
		if ($handle2->uploaded) {
			$handle2->file_new_name_body   = $talent_id.'_photo2';
			$handle2->image_resize         = true;
			$handle2->image_x              = 100;
			$handle2->image_ratio_y        = true;
			$handle2->allowed = array('image/*');
			$handle2->image_convert = 'jpg';
			$handle2->file_overwrite = true;
			$handle2->process('..uploads/talent/talent_profiles/');
		if ($handle2->processed) {
			
	// save uploaded file name and path in database table field logo_url
	
	
			$last_modified_by = $_SESSION['user_id'];
			$last_modified_on = getDateTime(NULL,"mySQL");
			
	/* if client id is not empty update the database */
	
		if($talent_id <> ""){
				$update = DB::update('tams_talent', array(

				'photo2_url'=> '/talent/uploads/talent/talent_profiles/'.$talent_id.'_photo1.jpg',
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
		
		}
		echo 'Photo is uploaded and path select saved in database';	
			$handle2->clean();
		} else {
			echo 'error : ' . $handle2->error;
		} // close handle processed
		} // close handle uploaded
	
				
	//if update is successful redirect the page to view client list
				
		if($update)
		{
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/talent/view_talents");</script>';
		}
}

if(isset($_GET['talent_id'])){
	$talent_id = $_GET['talent_id'];

		$sql = "SELECT
				*
				FROM
				tams_talent
				WHERE talent_id = $talent_id ;";
$talent= DB::queryFirstRow($sql);

$talent_id = $talent['talent_id'];
$first_name = $talent['first_name'];
$last_name = $talent['last_name'];
$dob = $talent['dob'];
$sex = $talent['sex'];
$brief = $talent['brief'];
$address = $talent['Address'];
$mobile_no = $talent['mobile_no'];
$email_id = $talent['email_id'];
$nationality = $talent['nationality'];
$passport_no = $talent['passport_no'];
$qatari_id   = $talent['qatari_id'];
$is_qatari   = $talent['is_qatari'];
$passport_copy_attached  = $talent['passport_copy_attached'];
$noc_required     = $talent['noc_required'];
$noc_copy_attached   = $talent['noc_copy_attached'];
$sponsors_id_copy_attached = $talent['sponsors_id_copy_attached'];
$events=$talent['events'];
$height_cm = $talent['height_cm'];
$weight_kg = $talent['weight_kg'];
$hair_color=$talent['hair_color'];
$eye_color=$talent['eye_color'];
$dress_size=$talent['dress_size'];
$shoe_size=$talent['shoe_size'];
$waist_cm=$talent['waist_cm'];
$collar_cm=$talent['collar_cm'];
$chest_cm=$talent['chest_cm'];
$photo1_url=$talent['photo1_url'];
$photo1_caption=$talent['photo1_caption'];
$photo2_url=$talent['photo2_url'];
$photo2_caption=$talent['photo2_caption'];
$registration_date=$talent['registration_date'];
$talent_status = $talent['talent_status']; 
$created_on = $talent['created_on'];
$created_by = $talent['created_by'];
$last_modified_by = $talent['last_modified_by'];
$last_modified_on = $talent['last_modified_on'];

}
	
	
?>

 <!-- Basic Information box -->  
  <form enctype="multipart/form-data" id="edit_talent_basic_info" name="edit_talent_basic_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id=<?php echo $talent_id; ?>" > 
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

					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Photo 1 :
						</label>
						<div class="col-md-9 col-sm-9">
						<img src="<?php echo $photo1_url; ?>" alt="no photo uploaded" style="max-width:500px;" />
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
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="talent_photo1" id="talent_photo1"/> <!-- Form Upload Field -->
                    </div>
                    <button type="button" name="save"  class="btn btn-labeled btn-default"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
                </span>
            </div><!-- /input-group image-preview [TO HERE]-->
						</div>
					</div>	
					<!-- Hidden Caption Field -->					
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="hidden"  
									value="<?php echo $photo1_caption; ?>" name="photo1_caption" id="photo1_caption" placeholder="Enter Photo Caption">
								</div>
						
					<!-- /Hidden Caption Field -->
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Photo 2 :
						</label>
						<div class="col-md-9 col-sm-9">
						<img src="<?php echo $photo2_url; ?>" alt="no photo uploaded" style="max-width:500px;" />
						<!-- input-group image-preview2 [FROM HERE]-->
            <div class="input-group image-preview2">
                <input type="text" class="form-control image-preview-filename2" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button  type="submit" class="btn btn-default image-preview-clear2" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input2">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title2">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="talent_photo2" id="talent_photo2"/> <!-- Form Upload Field -->
                    </div>
                    <button type="button" name="save"  class="btn btn-labeled btn-default"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
                </span>
            </div><!-- /input-group image-preview2 [TO HERE]-->
						</div>
					</div>	
	   <!-- Hidden Caption Field -->
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="hidden"  
									value="<?php echo $photo2_caption; ?>" name="photo2_caption" id="photo2_caption" placeholder="Enter Photo Caption">
								</div>
		 <!-- /Hidden Caption Field -->
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
											-Select gender-
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
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Available for Events ?
								</label>
								<div class="col-md-9 col-sm-9">
									<input type="checkbox" class="form-control switch" id="events" name="events" data-on-text="Yes" data-off-text="No" data-on-color="success" data-off-color="danger" <?php if( $events == 1 ) { echo "checked='checked'"; } ?> />
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