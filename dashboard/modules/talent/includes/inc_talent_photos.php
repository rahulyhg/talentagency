<?php

?>
<form id="edit_talent_photos_info" name="edit_talent_photos_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >
<!-- Talent Photos Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Photos Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body bg-info">
            <div class="row">
  					
					
				</div> <!--/.row-->
			 				<div class="box-footer">
 								<div class="form-group">
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/view_talents"?>">
							Cancel &nbsp;
							<i class="fa fa-chevron-circle-right">
							</i>
						</a>
					</div>	<!-- /.col -->
				</div>		<!-- /form-group -->
				<small>
				</small>
			</div><!-- /.box-footer-->	
				</div><!--/.box-body-->
				</div><!--Photos Information Box-->
		<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_talent_photos_info" />
<!-- /Hidden Fields -->
</form>		