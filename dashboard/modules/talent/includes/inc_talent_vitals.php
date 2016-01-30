<?php

?>

<!-- Employability Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Vitals Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body bg-info">
            <div class="row">
  					
							<div class="tab-pane active" id="vitals">
							    <h3 class="box-title"> Vitals
								</h3>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Height <small>cm</small>:
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text" required placeholder="Enter Height cm" value="<?php echo $height_cm; ?>" name="height_cm" id="height_cm">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Weight <small>kg</small> :
								</label>
								<div class="col-md-9 col-sm-9">
								
										<input class="form-control" type="text" required placeholder="Enter Weight kg" value="<?php echo $weight_kg; ?>" name="weight_kg" id="weight_kg">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Hair Color :
								</label>
								<div class="col-md-9 col-sm-9">
									
										<input   class="form-control"  type="text" required value="<?php echo $hair_color; ?>" name="hair_color" id="hair_color"  placeholder="Enter Hair Color">
							
								</div>
							</div>
						<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Eye Color :
								</label>
								<div class="col-md-9 col-sm-9">
									
										<input   class=" form-control"     type="text" required value="<?php echo $eye_color; ?>" name="eye_color" id="eye_color"  placeholder="Enter Eye Color">
							
								</div>
							</div>
				<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Dress Size:
								</label>
								<div class="col-md-9 col-sm-9">
								
										<input   class="form-control"   type="text" required value="<?php echo $dress_size; ?>" name="dress_size" id="dress_size"  placeholder="Enter Dress Size">
						
								</div>
							</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Shoe Size :
								</label>
								<div class="col-md-9 col-sm-9">
										<input   class="form-control"  type="text" required value="<?php echo $shoe_size; ?>" name="shoe_size" id="shoe_size"  placeholder="Enter Shoe Size">
							
								</div>
							</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Waist <small>cm</small>:
								</label>
								<div class="col-md-9 col-sm-9">
									
										<input   class="form-control"   type="text" required value="<?php echo $waist_cm; ?>" name="waist_cm" id="waist_cm"  placeholder="Enter Waist cm">
								
								</div>
							</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Collar <small>cm</small>:
								</label>
								<div class="col-md-9 col-sm-9">
									
										<input   class="form-control"    type="text" required value="<?php echo $collar_cm; ?>" name="collar_cm" id="collar_cm"  placeholder="Enter Collar cm">
									
								</div>
							</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Chest <small>cm</small>:
								</label>
								<div class="col-md-9 col-sm-9">
									
										<input   class="form-control"   type="text" required value="<?php echo $chest_cm; ?>" name="chest_cm" id="chest_cm"  placeholder="Enter Chest cm">
									
								</div>
							</div>
					
				</div><!--/.tab-pane-->
				</div> <!--/.row-->
				</div><!--/.box-body-->
				</div><!--Vitals Information Box-->