<?php
// List of Portfolio
$sql    = "SELECT `portfolio_item_id`,`portfolio_item_name`, `portfolio_item_desc` FROM `tams_portfolio_items` WHERE (`portfolio_item_status` = 'active') AND ( tams_portfolio_items.`portfolio_item_id` NOT IN (SELECT portfolio_item_id FROM tams_talent_portfolio WHERE talent_id=".$talent_id."))";
$portfolio_items = DB::query($sql);




if(isset($_GET['talent_id']))
{
	$talent_id = $_GET['talent_id'];
}

$portfolio_sql    = "SELECT
*
FROM
tams_talent_portfolio
WHERE talent_id = $talent_id";

$talent_portfolio_item = DB::query($portfolio_sql);

if(isset($_POST['save'])) {
 
$talent_id = $_POST['talent_id'];
$portfolio_item_id = $_POST['portfolio_item_id'];
$portfolio_item_status = $_POST['portfolio_item_status']; 
$last_modified_by = $_SESSION['user_id'];
$last_modified_on = getDateTime(NULL,"mySQL");

 // if talent id is not empty update the database
 
	if($talent_id <> ""){
		$update = DB::update('tams_talent_portfolio', array(
			
			'talent_id' => $talent_id,
			'portfolio_item_id' => $portfolio_item_id,
			'portfolio_item_status' => $portfolio_item_status,
			'last_modified_by'	=> $last_modified_by,
			'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
	//check if the file is uploaded and process the file if file is uploaded	
	
	if(!file_exists($_FILES['talent_portfolio']['tmp_name']) || !is_uploaded_file($_FILES['talent_portfolio']['tmp_name'])) {
		echo '<h2> No file uploaded</h2>';
	}  else {
		echo '<h2> file was uploaded</h2>';
	}
	//if logo file is uploaded process the file with upload class
	
	$handle = new upload($_FILES['talent_portfolio']);
		if ($handle->uploaded) {
			$handle->file_new_name_body   = $talent_id.'_portfolio';
			$handle->allowed = array('application/pdf','application/msword','text/plain', 'text/rtf', 'image/*','application/zip', 'audio/mp3','audio/mpeg', 'audio/mpeg3', 'audio/x-mpeg-3', 'video/mpeg', 'video/mp4', 'video/quicktime', 'video/x-ms-wmv', 'application/x-rar-compressed');
			$handle->file_overwrite = true;
			$handle->process('../uploads/portfolio/');
		if ($handle->processed) {
			
	// save uploaded file name and path in database table field logo_url
	
	
			$last_modified_by = $_SESSION['user_id'];
			$last_modified_on = getDateTime(NULL,"mySQL");
			
	/* if talent id is not empty update the database */
	
		if($talent_id <> ""){
				$update = DB::update('tams_talent_portfolio', array(

				'portfolio_item_url'=> '/talent/uploads/portfolio/'.$talent_id.'_portfolio',
				'portfolio_item_description' =>$_POST['portfolio_item_description'],
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
		
		}
		echo 'File is uploaded and path select saved in database';	
			$handle->clean();
		} else {
			echo 'error : ' . $handle->error;
		} // close handle processed
		} // close handle uploaded
		} // close file exist
				
}
?>

<form enctype="multipart/form-data" id="edit_talent_portfolio_info" name="edit_talent_portfolio_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id=<?php echo $talent_id; ?>" >
<!-- Portfolio Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Portfolio Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body bg-info">
            <div class="row">
			
			<?php
		if($talent_portfolio_item )
		{
		?>
		<?php 
		foreach($talent_portfolio_item as $portfolio){
		?>				
		<?php
		} // for each $talent_portfolio									
		?>

		 <?php

		}  // End if $talent_portfolio

		?>

		<?php
		if($portfolio_items )
		{
			?>
			
  					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Portfolio Type:</label>
						  <div class="col-md-9 col-sm-9">
						<div class="input-group">
						<select name="portfolio_item_id" id="portfolio_item_id" class=" input-group form-control  select2"  style="padding:5px;"  >
					
							<option value="">
								Select a portfolio type
							</option>
	
							<?php 
							foreach($portfolio_items as $item){
								?>	
							<option value="<?php echo $item['portfolio_item_id'];?>">
								<?php echo $item['portfolio_item_name'];?>
							</option>
							<?php
							} // for each portfolio 								
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
					</div> <!--/.form-group-->
						 <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Portfolio Description:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Add Portfolio Description " 
							 value="" name="portfolio_item_description" id="portfolio_item_description">							
						  </div>
						  </div>
						  <div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Upload Portfolio :
						</label>
						<div class="col-md-9 col-sm-9">
					
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
                        <input type="file" accept="application/pdf,application/msword,text/plain, text/rtf, image/*,application/zip, audio/mp3,audio/mpeg,
						audio/mpeg3, audio/x-mpeg-3, video/mpeg, video/mp4, video/quicktime, video/x-ms-wmv, application/x-rar-compressed" name="talent_portfolio" id="talent_portfolio"/> <!-- Form Upload Field -->
                    </div>
                    <button type="button" name="save"  class="btn btn-labeled btn-default"> <span class="btn-label"><i class="glyphicon glyphicon-upload"></i> </span>Upload</button>
                </span>
            </div><!-- /input-group image-preview [TO HERE]-->
						</div>
					</div>	
						
<script type="text/javascript">
	$(".select2").select2();
	
</script>


		
 <?php

		}  // End if $portfolio_items

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
<input type="hidden" name="form_name" id="form_name" value="edit_talent_portfolio_info" />
<input type="hidden" name="talent_id" id="portfolio_talent_id" value="<?php echo $talent_id; ?>" />
<!-- /Hidden Fields -->
</form>		