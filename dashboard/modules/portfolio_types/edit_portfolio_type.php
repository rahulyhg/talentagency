<?php
$portfolio_item_id = 0;
$portfolio_item_name = "";
$portfolio_item_description= "";
$portfolio_item_status= ""; 
$created_on = "";
$created_by = "";
$last_modified_by = "";
$last_modified_on = "";

if(isset($_GET['portfolio_item_id'])){
	$portfolio_item_id = $_GET['portfolio_item_id'];

		$sql = "SELECT
				*
				FROM
				tams_portfolio_items
				WHERE portfolio_item_id = $portfolio_item_id ;";

$portfolio= DB::queryFirstRow($sql);
$portfolio_item_id = $portfolio['portfolio_item_id'];
$portfolio_item_name = $portfolio['portfolio_item_name'];
$portfolio_item_description = $portfolio['portfolio_item_desc'];
$portfolio_item_status = $portfolio['portfolio_item_status']; 
$created_on = $portfolio['created_on'];
$created_by = $portfolio['created_by'];
$last_modified_by = $portfolio['last_modified_by'];
$last_modified_on = $portfolio['last_modified_on'];

}

if(isset($_POST['save']))
{
 
$portfolio_item_id = $_POST['portfolio_item_id'];
$portfolio_item_name = $_POST['portfolio_item_name'];
$portfolio_item_description = $_POST['portfolio_item_description'];
$portfolio_item_status = $_POST['portfolio_item_status'];
$last_modified_by = $_SESSION['user_id'];
$last_modified_on = getDateTime(NULL,"mySQL");
 
	if($portfolio_item_id <> ""){
		$update = DB::update('tams_portfolio_items', array(
				'portfolio_item_name'=>$portfolio_item_name,
				'portfolio_item_desc'=> $portfolio_item_description,
				'portfolio_item_status'=> $portfolio_item_status,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"portfolio_item_id=%s", $portfolio_item_id
		);
		
		if($update)
		{
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/portfolio_types/list_portfolio_types");</script>';
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
			Edit portfolio Type
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
			Edit portfolio Type
		</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- Profile box -->
		<form role="form"class="form-horizontal" method="post"
		     action="<?php echo $_SERVER['PHP_SELF']."?route=modules/portfolio_types/edit_portfolio_type"; ?>">
			<div class="box col-md-6 col-sm-6 col-sx-12">
				<div class="box-header with-border">
					<h3 class="box-title">
						Editing <?php echo $portfolio['portfolio_item_name']; ?>
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
							portfolio Type ID:
						</label>
						<div class="col-md-9 col-sm-9">
							<?php echo $portfolio_item_id; ?>
						</div>
					</div>
 
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							portfolio Type Name:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required 
							 value="<?php echo $portfolio_item_name; ?>" name="portfolio_item_name" id="portfolio_item_name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							portfolio Type Description:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required 
							 value="<?php echo $portfolio_item_description; ?>" name="portfolio_item_description" id="portfolio_item_description">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							portfolio Type Status:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="portfolio_type_status" name="portfolio_type_status" class="form-control">

								<option value="active" <?php if($portfolio_item_status == "active"){ echo 'selected = "selected" ';} ?> >
									Active
								</option>
								<option value="disabled"   <?php if($portfolio_item_status != "active"){ echo 'selected = "selected" ';} ?>>
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
					<input type="hidden" name="form_name" id="form_name" value="edit_portfolio_type_form" />
					<input type="hidden" name="portfolio_item_id" id="portfolio_item_id" value="<?php echo $portfolio_item_id; ?>" />
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
							<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/portfolio_types/list_portfolio_types"?>">
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