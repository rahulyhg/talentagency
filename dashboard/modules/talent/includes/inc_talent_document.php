<?php
// List of Documents
$sql    = "SELECT `document_type_id`,`document_type_name`, `document_type_desc`, `document_type_extension` FROM `tams_document_types` WHERE (`document_type_status` = 'active') AND ( tams_document_types.`document_type_id` NOT IN (SELECT document_type_id FROM tams_talent_documents WHERE talent_id=".$talent_id."))";
$document_types = DB::query($sql);




if(isset($_GET['talent_id']))
{
	$talent_id = $_GET['talent_id'];
}

$document_sql    = "SELECT
*
FROM
tams_talent_documents
WHERE talent_id = $talent_id";

$talent_document = DB::query($document_sql);
?>
<form id="edit_talent_document_info" name="edit_talent_document_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >
<!-- Documents Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Documents Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body bg-info">
            <div class="row">
			
			<?php
		if($talent_document )
		{
		?>
		<p>
		<?php 
		foreach($talent_document as $document){
		?>				
		<span class="label label-info">
			<?php echo get_document_type_name($document['document_type_id']); ?>
		</span>	
			

		<?php
		} // for each $talent_document									
		?>
			
		</p> 

		 <?php

		}  // End if $talent_document

		?>

		<?php
		if($document_types )
		{
			?>
			
  					<div class="form-group">
					<label class="col-md-3 col-sm-3 control-label">
							Documents :
					</label>
						<div class="col-md-9 col-sm-9">
						<div class="input-group">
						<select name="document_type_id" id="document_type_id" class=" input-group form-control  select2"  style="padding:5px;"  >
					
							<option value="">
								Select a Document type
							</option>
	
							<?php 
							foreach($document_types as $type){
								?>	
							<option value="<?php echo $type['document_type_id'];?>">
								<?php echo $type['document_type_name'];?>
							</option>
							<?php
							} // for each document type									
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

		}  // End if $document_type

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
				</div><!--Portfolio Information Box-->
	<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_talent_document_info" />
<input type="hidden" name="talent_id" id="document_talent_id" value="<?php echo $talent_id; ?>" />
<!-- /Hidden Fields -->
</form>		