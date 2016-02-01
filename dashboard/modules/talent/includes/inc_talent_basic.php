<?php

?>
<form id="edit_talent_basic_info" name="edit_talent_basic_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >
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
							Photo1 URL :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group image-preview ">
								<input   class="input-group form-control image-preview-filename"   placeholder="Enter Photo1 URL"   type="url"  value="" name="photo1_url" id="photo1_url"  >
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="input-group-addon btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                    </div>
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
							Photo2 URL :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group image-preview ">
								<input   class="input-group form-control image-preview-filename"   placeholder="Enter Photo1 URL"   type="url"  value="" name="photo2_url" id="photo2_url"  >
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="input-group-addon btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                    </div>
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