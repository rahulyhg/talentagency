<?php

if(isset($_GET['talent_id'])){
	$talent_id = $_GET['talent_id'];
}

$experience_sql = "SELECT 
			* 
			FROM 
			tams_talent_experience
			WHERE talent_id = $talent_id";

$talent_experience = DB::query($experience_sql);


?>
<form id="edit_talent_experience_info" name="edit_talent_experience_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >
<!-- Experience Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Experience Information
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
				</div><!--Experience Information Box-->
		<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="experience_info_hidden_field" value="edit_talent_experience_info" />
<input type="hidden" name="talent_id" id="experience_talent_id" value="edit_talent_experience_info" />
<!-- /Hidden Fields -->
</form>		