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

$talent_portfolio = DB::query($portfolio_sql);


?>
<form id="edit_talent_portfolio_info" name="edit_talent_portfolio_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >
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
		if($talent_portfolio )
		{
		?>
		<p>
		<?php 
		foreach($talent_portfolio as $portfolio){
		?>				
		<span class="label label-info">
			<?php echo get_portfolio_item_name($portfolio['portfolio_item_id']); ?>
		</span>	
			

		<?php
		} // for each $talent_portfolio									
		?>
			
		</p> 

		 <?php

		}  // End if $talent_portfolio

		?>

		<?php
		if($portfolio_items )
		{
			?>
			
  					<div class="form-group">
						<div class="col-md-9 col-sm-9">
						<div class="input-group" style="display:inline;">
						<span><select name="portfolio_item_id" id="portfolio_item_id" class=" input-group form-control  select2"  style="padding:5px;"  >
					
							<option value="">
								Select a portfolio item
							</option>
	
							<?php 
							foreach($portfolio_items as $item){
								?>	
							<option value="<?php echo $item['portfolio_item_id'];?>">
								<?php echo $item['portfolio_item_name'];?>
							</option>
							<?php
							} // for each portfolio item									
							?>

						</select></span>
						<span> <input class="form-control" type="text" required placeholder="Add Description Here"
							 value="" name="portfolio_item_desc" id="portfolio_item_desc"></span>
						<span><input class="form-control" type="url" required placeholder="Add URL Here"
							 value="" name="talent_portfolio_item_url" id="talent_portfolio_item_url"></span>
						<span><div class="input-group-addon"> <button type="submit" class='btn btn-xs pull-right' name="save" value="save">
							Add &nbsp;
							<i class="fa fa-plus">
							</i>
					</button>
					</div></span>
						</div>
				
				 
					
					

					</div>
					<script type="text/javascript">
	$(".select2").select2();
	
</script>


			</div> <!--/.form-group-->
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