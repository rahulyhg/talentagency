<?php
$talent_id = -1;
// List of Talent Lists
$sql    = "SELECT `talent_list_id`,`talent_list_title`, `talent_list_details` FROM `tams_talent_lists` WHERE ( tams_talent_lists.`talent_list_id` NOT IN (SELECT talent_list_id FROM tams_talent_list_items WHERE talent_id=".$talent_id." )) ORDER BY talent_list_title";
$talent_lists = DB::query($sql);




if(isset($_GET['talent_id']))
{
	$talent_id = $_GET['talent_id'];


$talent_list_sql    = "SELECT
*
FROM
tams_talent_list_items
WHERE talent_id = $talent_id";

$talent_items = DB::query($talent_list_sql);
}
?>

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          Manage Talent Lists
            <small>Add Talent to List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Add Talent to List</li>
          </ol>
        </section>

        <!-- Main content -->
		  <!-- Main content -->
        <section class="content">
<form id="add_talent_to_list" name="add_talent_to_list" class="form-horizontal" method="post" action="process_talent_lists.php?talent_id=<?php echo $talent_id; ?>" >
	<!-- Talent List Item box -->
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">
				Add Talent to List
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

		<div class="box-body bg-info">
		
		<div class="row" >
	
        
		<?php
		if($talent_items )
			
		{
		?>
		<p class="one">
		<?php 
		foreach($talent_items as $item){
		?>			
		<?php
		} // for each $talent_items									
		?>
			
		</p> 

		 <?php

		}  // End if $talent_items

		?>

		<?php
		if($talent_lists )
		{
			?>

					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Talent Lists :
						</label>
					<div class="col-md-9 col-sm-9">
						<div class="input-group">
						<select name="talent_list_id" id="talent_list_id" class=" input-group form-control  select2"  style="padding:5px;"  >
					
							<option value="">
								Select a talent list
							</option>
	
							<?php 
							foreach($talent_lists as $list){
								?>	
							<option value="<?php echo $list['talent_list_id'];?>">
								<?php echo $list['talent_list_title'];?>
							</option>
							<?php
							} // for each talent list									
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

                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Comments:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Add Comments Here " 
							 value="" name="comments" id="comments">							
						  </div>
					</div>
		 <?php

		}  // End if $talent_lists

		?>


			</div> <!--/.row-->
			<div class="box-footer">
				<div class="form-group">
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent_lists/saved_talent_lists"?>">
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
	</div><!--Talent List Item Box-->
	<!-- Hidden Fields -->
	<input type="hidden" name="form_name" id="add_talent_to_list" value="add_talent_to_list" />
	<input type="hidden" name="talent_id" id="talent_list_id" value="<?php echo $talent_id; ?>" />
	<!-- /Hidden Fields -->
</form>
</section>
</html>