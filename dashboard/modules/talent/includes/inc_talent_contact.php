<?php
// Add form to edit contact information for this talent.
// code for retrieval and display should go here. 
?>
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
              </div>
 		
             </div> 
          </div><!-- /.box Contact Information-->