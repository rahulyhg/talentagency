<?php

// List of Languages
$sql    = "SELECT `language_id`,`language_name` FROM `tams_languages` WHERE (`language_status` = 'active') AND ( tams_languages.`language_id` NOT IN (SELECT language_id FROM tams_talent_language WHERE talent_id=".$talent_id.")) ORDER BY language_name";
$languages = DB::query($sql);




if(isset($_GET['talent_id']))
{
	$talent_id = $_GET['talent_id'];
}

$language_sql    = "SELECT
*
FROM
tams_talent_language
WHERE talent_id = $talent_id";

$talent_languages = DB::query($language_sql);


?>
<style>
.two{
   border:0px;
	margin: -3px -9px 6px 10px;
   font-size:12px;

	width:20px;
	height:20px;
	color:black;
	background-color: #00C0EF;
}
.one {
margin-left:20px;
font-size:19px;

}  
</style>
<form id="edit_talent_languages_info" name="edit_talent_languages_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >
<!-- Spoken Languages Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Spoken Languages Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body bg-info">
            <div class="row">
							
		<?php
		if($talent_languages )
		{
		?>
		<p class="one">
		<?php 
		foreach($talent_languages as $language){
		?>				
		<span class="label label-info" style="display:inline-block;padding: 5px 12px 0px 10px;">
		<button style="float:right" class="two"><a href="#"></a><i class="fa fa-times"></i></button>
			<?php echo get_language_name($language['language_id']); ?>
		</span>	
			

		<?php
		} // for each $talent_languages									
		?>
			
		</p> 

		 <?php

		}  // End if $talent_languages

		?>

		<?php
		if($languages )
		{
			?>

					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Languages Spoken :
						</label>
						<div class="col-md-9 col-sm-9">
						<div class="input-group">
						<select name="language_id" id="language_id" class=" input-group form-control  select2"  style="padding:5px;"  >
					
							<option value="">
								Select a Language
							</option>
	
							<?php 
							foreach($languages as $language){
								?>	
							<option value="<?php echo $language['language_id'];?>">
								<?php echo $language['language_name'];?>
							</option>
							<?php
							} // for each language									
							?>

						</select>
						<div class="input-group-addon"> <button type="submit" class='btn btn-xs pull-right' name="save" value="save">
							Add &nbsp;
							<i class="fa fa-plus">
							</i>
					</button>
					</div>
						</div>
				
				 
					
					

					</div>
					<script type="text/javascript">
	$(".select2").select2();
	
</script>


		</div> <!--/.form-group-->

		 <?php

		}  // End if $experience_items

		?>   

							
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
				</div><!--Languages Information Box-->
		<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_talent_languages_info" />
<input type="hidden" name="talent_id" id="language_talent_id" value="<?php echo $talent_id; ?>" />
<!-- /Hidden Fields -->
</form>		