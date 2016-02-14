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
 
 
?>

<form enctype="multipart/form-data" id="edit_talent_portfolio_info" name="edit_talent_portfolio_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id=<?php echo $talent_id; ?>" >
<!-- Portfolio Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Portfolio Links
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
		$portfolio_item_name = DB::queryFirstField("SELECT portfolio_item_name from tams_portfolio_items  WHERE portfolio_item_id = ".$portfolio['portfolio_item_id']);	
		?>
 
 		<div class="form-group">
	 		<div class="col-md-3 col-sm-3">
	 		<strong><?php echo $portfolio_item_name; ?> : </strong>
	 		</div>
	 		<div class="col-md-3 col-sm-3">
	 		<?php echo $portfolio['portfolio_item_description']; ?>
	 		</div>
	 		<div class="col-md-6 col-sm-6">
	 		 <a target="_blank" href="<?php echo $portfolio['portfolio_item_url']; ?>" ><i class="fa fa-open"></i> &nbsp;<?php echo $portfolio['portfolio_item_url']; ?></a>
	 		</div> 		 
 
		</div>	
		<?php
		} // for each $talent_portfolio									
		?>

		 <?php

		}  // End if $talent_portfolio

 ?>

			<div class="form-group">
			<hr>
			</div>
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
									Portfolio URL:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">

										<input   class=" input-group form-control"     type="url" required value="" placeholder="Enter URL of Portfolio Item" name="portfolio_item_url" id="portfolio_item_url">
										<div class="input-group-addon">
											<i class="fa fa-globe">
											</i>
										</div>
									</div>
								</div>
							</div>
						
<script type="text/javascript">
	$(".select2").select2();
	
</script>


		
				
				
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