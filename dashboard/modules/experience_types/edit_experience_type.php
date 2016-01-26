<?php

$experience_item_id = 0;
$experience_item_name = "";
$experience_item_desc= "";
$experience_item_status= ""; 
$created_on = "";
$created_by = "";
$last_modified_by = "";
$last_modified_on = "";

if(isset($_GET['experience_item_id'])){
	$experience_item_id = $_GET['experience_item_id'];

		$sql = "SELECT
				*
				FROM
				tams_experience_items
				WHERE experience_item_id = $experience_item_id ;";

$experience= DB::queryFirstRow($sql);
$experience_item_id = $experience['experience_item_id'];
$experience_item_name = $experience['experience_item_name'];
$experience_item_desc = $experience['experience_item_desc'];
$experience_item_status = $experience['experience_item_status']; 
$created_on = $experience['created_on'];
$created_by = $experience['created_by'];
$last_modified_by = $experience['last_modified_by'];
$last_modified_on = $experience['last_modified_on'];

}

if(isset($_POST['save']))
{
 
$experience_item_id = $_POST['experience_item_id'];
$experience_item_name = $_POST['experience_item_name'];
$experience_item_desc = $_POST['experience_item_desc'];
$experience_item_status = $_POST['experience_item_status'];
$last_modified_by = $_SESSION['experience_id'];
$last_modified_on = getDateTime(NULL,"mySQL");
 
	if($experience_item_id <> ""){
		$update = DB::update('tams_experience_items', array(
				'experience_item_name'=>$experience_item_name,
				'experience_item_desc'=> $experience_item_desc,
				'experience_item_status'=> $experience_item_status,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"experience_item_id=%s", $experience_item_id
		);
		
		if($update)
		{
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/experience_types/list_experience_types");</script>';
		}
	}
	 
echo "<pre>";
print_r($_POST);
echo "</pre>";
 
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		System Settings
		<small>
			Edit Experience Type
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
			Edit Experience Type
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- Profile box -->
		<form role="form"class="form-horizontal" method="post"
		     action="<?php echo $_SERVER['PHP_SELF']."?route=modules/experience_types/edit_experience_type"; ?>">
			<div class="box col-md-6 col-sm-6 col-sx-12">
				<div class="box-header with-border">
					<h3 class="box-title">
						Editing <?php echo $experience['experience_item_name']; ?>
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
							Experience Type ID:
						</label>
						<div class="col-md-9 col-sm-9">
							<?php echo $experience_item_id; ?>
						</div>
					</div>
 
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							Experience Type Name:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required 
							 value="<?php echo $experience_item_name; ?>" name="experience_item_name" id="experience_item_name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
									Experience Type Description:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required 
							 value="<?php echo $experience_item_desc; ?>" name="experience_item_desc" id="experience_item_desc">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Experience Type Status:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="document_type_status" name="document_type_status" class="form-control">

								<option value="active" <?php if($experience_item_status == "active"){ echo 'selected = "selected" ';} ?> >
									Active
								</option>
								<option value="disabled"   <?php if($experience_item_status != "active"){ echo 'selected = "selected" ';} ?>>
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
					<input type="hidden" name="form_name" id="form_name" value="edit_experience_type_form" />
					<input type="hidden" name="experience_item_id" id="experience_item_id" value="<?php echo $experience_item_id; ?>" />
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
							<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/experience_types/list_experience_types"?>">
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