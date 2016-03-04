<?php
// List of Documents
$sql    = "SELECT `document_type_id`,`document_type_name`,`document_type_desc`, `document_type_status` FROM `tams_document_types` WHERE (`document_type_status` = 'active') AND ( tams_document_types.`document_type_id` NOT IN (SELECT document_type_id FROM tams_talent_documents WHERE talent_id=".$talent_id.")) ORDER BY document_type_name";
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
<form  enctype="multipart/form-data" id="edit_talent_document_info" name="edit_talent_document_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id=<?php echo $talent_id; ?>" >
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
			
		<div class="form-group">	
		<?php
		if($talent_document )
			
		{
		?>
		<?php 
		foreach($talent_document as $document){
		
		$doc_type = DB::queryFirstField("SELECT document_type_name from tams_document_types WHERE document_type_id = ".$document['document_type_id']);	
			
		?>	
 		<div class="col-md-3 col-sm-3 file-preview-frame"  style="background-color: whitesmoke;">
 		<?php echo $doc_type; ?>
        <embed src="<?php echo $document['document_path']; ?>" class="img-responsive center-block img-rounded"/>&nbsp;<?php echo $document['document_description']; ?>
		</div>	
 
			


		<?php
		} // for each $talent_document									
		?>

		 <?php

		}  // End if $talent_document

		?>
		</div>
		<?php
		if($document_types )
		{
			?>
				<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Document Type:</label>
						  <div class="col-md-9 col-sm-9">
						<div class="input-group">
						<select name="document_type_id" id="document_type_id" class=" input-group form-control  select2"  style="padding:5px;"  >
					
							<option value="">
								Select an document type
							</option>
	
							<?php 
							foreach($document_types as $type){
								?>	
							<option value="<?php echo $type['document_type_id'];?>">
								<?php echo $type['document_type_name'];?>
							</option>
							<?php
							} // for each document 								
							?> 

						</select>
	 
						</div>
	
					</div>
					</div>

                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Document Description:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Add Document Description " 
							 value="" name="document_description" id="document_description">							
						  </div>
					</div>
					 
				<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Upload Document :
						</label>
						<div class="col-md-9 col-sm-9">
					
		<!-- input-group image-preview [FROM HERE]-->
            <div class="input-group file-preview">
            <!--    <input type="text" class="form-control file-preview-filename" disabled="disabled"> --><!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                 <!-- <button  type="submit" class="btn btn-default file-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>-->
                    <!-- image-preview-input -->
                    <div class="btn btn-default file-preview-input">
                   <!--     <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="file-preview-input-title">Browse</span>-->
                        <input type="file" class="file"  accept="image/png, image/jpeg, image/gif,application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf" data-preview-file-type="text" name="talent_doc" id="talent_doc"/> <!-- Form Upload Field -->
                    </div>
                 <!--   <button type="button" name="save"  class="btn btn-labeled btn-default"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>-->
                </span>
            </div><!-- /input-group image-preview [TO HERE]-->
						</div>
					</div>		
					
  					
<script type="text/javascript">
	$(".select2").select2();
	
</script>
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
				</div><!--Portfolio Information Box-->
	<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_talent_document_info" />
<input type="hidden" name="talent_id" id="document_talent_id" value="<?php echo $talent_id; ?>" />
<!-- /Hidden Fields -->
</form>		