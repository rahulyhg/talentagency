<?php
$language_id = 0;
$language_name = "";
$language_description= "";
$language_status= ""; 
$created_on = "";
$created_by = "";
$last_modified_by = "";
$last_modified_on = "";

if(isset($_GET['language_id'])){
	$language_id = $_GET['language_id'];

		$sql = "SELECT
				*
				FROM
				tams_languages
				WHERE language_id = $language_id ;";

$language= DB::queryFirstRow($sql);
$language_id = $language['language_id'];
$language_name = $language['language_name'];
$language_description = $language['language_description'];
$language_status = $language['language_status']; 
$created_on = $language['created_on'];
$created_by = $language['created_by'];
$last_modified_by = $language['last_modified_by'];
$last_modified_on = $language['last_modified_on'];

}

if(isset($_POST['save']))
{
 
$language_id = $_POST['language_id'];
$language_name = $_POST['language_name'];
$language_description = $_POST['language_description'];
$language_status = $_POST['language_status'];
$last_modified_by = $_SESSION['user_id'];
$last_modified_on = getDateTime(NULL,"mySQL");
 
	if($language_id <> ""){
		$update = DB::update('tams_languages', array(
				'language_name'=>$language_name,
				'language_desc'=> $language_description,
				'language_status'=> $language_status,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"language_id=%s", $language_id
		);
		
		if($update)
		{
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/languages/list_languages");</script>';
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
			Edit Language
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
			Edit Language
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- Profile box -->
		<form role="form"class="form-horizontal" method="post"
		     action="<?php echo $_SERVER['PHP_SELF']."?route=modules/languages/edit_language"; ?>">
			<div class="box col-md-6 col-sm-6 col-sx-12">
				<div class="box-header with-border">
					<h3 class="box-title">
						Editing <?php echo $language['language_name']; ?>
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
							Language ID:
						</label>
						<div class="col-md-9 col-sm-9">
							<?php echo $language_id; ?>
						</div>
					</div>
 
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							Language Name:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required 
							 value="<?php echo $language_name; ?>" name="language_name" id="language_name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
									Language Description:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required 
							 value="<?php echo $language_description; ?>" name="language_description" id="language_description">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Language Status:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="language_status" name="language_status" class="form-control">

								<option value="active" <?php if($language_status == "active"){ echo 'selected = "selected" ';} ?> >
									Active
								</option>
								<option value="disabled"   <?php if($language_status != "active"){ echo 'selected = "selected" ';} ?>>
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
					<input type="hidden" name="form_name" id="form_name" value="edit_language_form" />
					<input type="hidden" name="language_id" id="language_id" value="<?php echo $language_id; ?>" />
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
							<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/languages/list_languages"?>">
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