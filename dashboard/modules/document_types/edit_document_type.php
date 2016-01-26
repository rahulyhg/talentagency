<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";
 

$document_type_id = 0;
$document_type_name = "";
$document_type_description= "";
$document_type_extension = "";
$document_type_status= ""; 
$created_on = "";
$created_by = "";
$last_modified_by = "";
$last_modified_on = "";

if(isset($_GET['document_type_id'])){
	$document_type_id = $_GET['document_type_id'];

		$sql = "SELECT
				*
				FROM
				tams_document_types
				WHERE document_type_id = $document_type_id ;";

$document= DB::queryFirstRow($sql);
$document_type_id = $document['document_type_id'];
$document_type_name = $document['document_type_name'];
$document_type_description = $document['document_type_desc'];
$document_type_extension = $document['document_type_extension'];
$document_type_status = $document['document_type_status']; 
$created_on = $document['created_on'];
$created_by = $document['created_by'];
$last_modified_by = $document['last_modified_by'];
$last_modified_on = $document['last_modified_on'];

}

if(isset($_POST['save']))
{
 
$document_type_id = $_POST['document_type_id'];
$document_type_name = $_POST['document_type_name'];
$document_type_description = $_POST['document_type_description'];
$document_type_extension = $_POST['document_type_extension'];
$document_type_status = $_POST['document_type_status'];
$last_modified_by = $_SESSION['user_id'];
$last_modified_on = getDateTime(NULL,"mySQL");
 /*
	if($document_type_id <> ""){
		$update = DB::update('tams_document_types', array(
				'document_type_name'=>$document_type_name,
				'document_type_desc'=> $document_type_desc,
				'document_type_extension' => $document_type_extension,
				'document_type_status'=> $document_type_status,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"document_type_id=%s", $document_type_id
		);
	
		if($update)
		{
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/document_types/list_document_types");</script>';
		}
	*/
	}



?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		System Settings
		<small>
			Edit Document Type
		</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo SITE_ROOT; ?>">
				<i class="fa fa-dashboard">
				</i>Home
			</a>
		</li>
		<li>
			<a href="#">
				Dashboard
			</a>
		</li>
		<li class="active">
			Edit Document Type
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- Profile box -->
		<form role="form"class="form-horizontal" method="post"
		     action="<?php echo $_SERVER['PHP_SELF']."?route=modules/document_types/edit_document_type"; ?>">
			<div class="box col-md-6 col-sm-6 col-sx-12">
				<div class="box-header with-border">
					<h3 class="box-title">
						Editing <?php echo $document['document_type_name']; ?>
					</h3>
					<div class="box-tools pull-right">

						<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box">
							<i class="fa fa-minus">
							</i>
						</button>
						<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times">
							</i>
						</button>
					</div>
				</div>
				<div class="box-body">

					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							Document Type ID:
						</label>
						<div class="col-md-9 col-sm-9">
							<?php echo $document_type_id; ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
									Document Type Name:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required 
							 value="<?php echo $document_type_name; ?>" name="document_type_name" id="document_type_name">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
									Document Type Description:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required 
							 value="<?php echo $document_type_description; ?>" name="document_type_description" id="document_type_description">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Document File Type:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="document_type_extension" name="document_type_extension" class="form-control">

								<option value="" selected="selected">
									- Select File Extention
								</option>
								<option value=".docx" >
									MS Word .docx
								</option>
								<option value=".doc" >
									MS Word 97 - 2003 .doc
								</option>
								<option value=".xlsx" >
									MS Excel .xlsx
								</option>
								<option value=".xlsx" >
									MS Excel 97 - 2003 .xls
								</option>
								<option value=".pptx" >
									MS Power Point .pptx
								</option>	
								<option value=".ppt" >
									MS Power Point 97 - 2003 .pptx
								</option>	
								<option value=".pdf" >
									PDF .pdf
								</option>
								<option value=".txt" >
									Text File .txt
								</option>
								<option value=".jpg" >
									JPG Image File .jpg
								</option>
								<option value=".png" >
									PNG Image File .png
								</option>
								<option value=".bmp" >
									Bitmap Image File .bmp
								</option>
							</select>
						</div>
					</div> 
					
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Document Type Status:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="document_type_status" name="document_type_status" class="form-control">

								<option value="active" <?php if($document_type_status == "active"){ echo 'selected = "selected" ';} ?> >
									Active
								</option>
								<option value="disabled"   <?php if($document_type_status != "active"){ echo 'selected = "selected" ';} ?>>
									Disabled
								</option>
							</select>
						</div>
					</div>
											
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							History:
						</label>
						<div class="col-md-9 col-sm-9">
							<p>
								This entry was created on
								<strong>
									<?php echo getDateTime($created_on,"dtLong"); ?>
								</strong>by
								<strong>
									<?php echo get_user_name($created_by); ?>
								</strong>.
							</p>
							<p>
								It was last modified on
								<strong>
									<?php echo getDateTime($last_modified_on,"dtLong"); ?>
								</strong>by
								<strong>
									<?php echo get_user_name($last_modified_by); ?>
								</strong>.
							</p>
						</div>
					</div>
					<!-- Hidden Fields -->
					<input type="hidden" name="form_name" id="form_name" value="edit_document_type_form" />
					<input type="hidden" name="document_type_id" id="document_type_id" value="<?php echo $document_type_id; ?>" />
					<!-- /Hidden Fields -->


				</div><!-- /.box-body -->
				<div class="box-footer">
					<div class="form-group"  >
						<div class="col-sm-12">
							<button style="margin-right:10px;"  type="submit" class='btn btn-success btn-lg pull-right' name="save" value="save">
								Save &nbsp;
								<i class="fa fa-chevron-circle-right">
								</i>
							</button>
							<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/document_types/list_document_types"?>">
								Cancel &nbsp;
								<i class="fa fa-chevron-circle-right">
								</i>
							</a>
						</div>	<!-- /.col -->
					</div>		<!-- /form-group -->
				</div><!-- /.box-footer-->
			</div><!-- /.box -->
		</form>
	</div><!-- /.row -->

</section><!-- /.content -->