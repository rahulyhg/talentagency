<?php
if(isset($_SESSION['user_id'])){
$user_id	=	$_SESSION['user_id'];
}
$created_by="";
$created_on="";
$last_modified_by="";
$last_modified_on="";

if(isset($_GET['talent_id'])){
	$talent_id = $_GET['talent_id'];

		$sql = "SELECT
				*
				FROM
				tams_talent
				WHERE talent_id = $talent_id ;";
$talent= DB::queryFirstRow($sql);
$created_on = $talent['created_on'];
$created_by = $talent['created_by'];
$last_modified_by = $talent['last_modified_by'];
$last_modified_on = $talent['last_modified_on'];
}

if(isset($_POST['save']))
{
$last_modified_by = $_SESSION['user_id'];
$last_modified_on = getDateTime(NULL,"mySQL");
 
	if($talent_id <> ""){
		$update = DB::update('tams_talent', array(
		
			'last_modified_by'	=> $last_modified_by,
			'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
	}
}
	?>
<form id="edit_talent_history_info" name="edit_talent_history_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >
<!-- History Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	History Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body bg-info">
            <div class="row">
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
				</div><!--History Information Box-->
	<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_talent_history_info" />
<input type="hidden" name="talent_id" id="history_talent_id" value="<?php echo $talent_id; ?>" />
<!-- /Hidden Fields -->
</form>		