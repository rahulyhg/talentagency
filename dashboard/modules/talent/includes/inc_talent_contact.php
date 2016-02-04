<?php
// Add form to edit contact information for this talent.
// code for retrieval and display should go here. 
?>
<form id="edit_talent_contact_info" name="edit_talent_contact_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >
 <!-- Contact Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Contact Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
      
            <div class="box-body bg-info">
            <div class="row">
  					<!-- Form to Edit and display contact information goes here -->
					<h3 class="normal">Contact Information</h3>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Address:
								</label>
								<div class="col-md-9 col-sm-9">
									<textarea class="form-control" required value="" name="address" id="address" placeholder="Enter Address"><?php echo $address; ?>
									</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Mobile No
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<input class="form-control" type="tel" required placeholder="Enter Phone No" value="<?php echo $mobile_no; ?>" name="mobile_no" id="mobile_no">
										<div class="input-group-addon">
											<i class="fa fa-phone">
											</i>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Email :
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">

										<input   class="input-group email form-control"     type="email" required value="<?php echo $email_id; ?>" name="email_id" id="email_id"  placeholder="Enter email address">
										<div class="input-group-addon">
											<i class="fa fa-envelope">
											</i>
										</div>
									</div>
								</div>
							</div>
              </div> <!--.row-->
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
 		
             </div> <!--/.box-body-->
          </div><!-- /.box Contact Information-->
		<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_talent_contact_info" />
<input type="hidden" name="talent_id" id="contact_talent_id" value="<?php echo $talent_id; ?>" />
<!-- /Hidden Fields -->
</form>		