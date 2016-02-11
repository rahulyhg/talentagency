<?php

$talent_id = '0';
if(isset($_POST['form_name'])){
	
	$talent_id = $_POST['talent_id'];
	$comment = $_POST['comment'];
	$created_by = $_SESSION['user_id'];
	$created_on = getDateTime(NULL ,"mySQL");
	$last_modified_by = $_SESSION['user_id'];
	$last_modified_on = getDateTime(NULL ,"mySQL");
	if( $comment <> ""   ){
	DB::insert('tams_talent_comments', array(
				'talent_id' 		=> $talent_id,
				'comment'	=> $comment,
				'created_by' 		=> $created_by,
				'created_on'	 	=> $created_on,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
				
			)
			); 
	} 
	 
	 
}
if(isset($_GET['talent_id'])){
	$talent_id = $_GET['talent_id'];
}

 $sql = "SELECT
				*
				FROM
				tams_talent
				WHERE talent_id = $talent_id ;";
$talent = DB::queryFirstRow($sql);
$talent_id = $talent['talent_id'];
$first_name = $talent['first_name'];
$last_name = $talent['last_name'];
$talent_status = $talent['talent_status']; 
$created_on = $talent['created_on'];
$created_by = $talent['created_by'];
$last_modified_by = $talent['last_modified_by'];
$last_modified_on = $talent['last_modified_on'];

$comment_sql = "SELECT 
			* 
			FROM 
			tams_talent_comments
			WHERE talent_id = $talent_id";

$talent_comments = DB::query($comment_sql);

echo "<pre>";
	print_r($_POST);
	print_r($_SESSION);
	print_r($_FILES);
	echo "</pre>";
?>

<!-- Notes Information box -->       			
				
		
			<div class="col-md-12 col-sm-12">
		     <!-- Comment box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Talent Notes
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

				  
                  <div class="box-body bg-info ">
				  <div class="row">
			 <p>
			 <div class="box-comments">
				 <?php
				 if ($talent_comments) {
				 	foreach($talent_comments as $comment) {
						?>
						<div class="box-comment">
					
							<img class="img-circle img-sm" alt="Talent Image" src="<?php echo get_talent_image($comment['created_by']); ?>" />
							<div class="comment-text">
							<span class="username">
								<?php echo get_talent_full_name($comment['created_by']); ?>
								<span class="text-muted pull-right">
									<?php echo getDateTime($comment['created_on'],"dtShort"); ?>
								</span>
							</span>
							<?php echo $comment['comment']; ?>
						</div>						
						</div>
						<?php
					}
				 } else {
				 
				  echo '<div class="box-comment"><div class="comment-text">No Talent Notes Added</div></div>';  
				  	
				 }
				 
				  
				  
				  
				  ?>
			
			</div>
			
			</p>
<form id="edit_talent_notes_info" name="edit_talent_notes_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id=<?php echo $talent_id; ?>" >
		<div class="form-group" style="margin:10px;">
			<textarea  name="comment" id="comment" class="form-control" required placeholder="Enter a New Note" ></textarea>
		</div>
<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_talent_notes_info" />
<input type="hidden" name="talent_id" id="notes_talent_id" value="<?php echo $talent_id; ?>" />
<!-- /Hidden Fields -->
	
			<div class="form-group" style="margin:10px;" >
					<button type="submit" name="save" id="save_note_btn" value="save" class="note  pull-right btn btn-default btn-lg">Add Note&nbsp;&nbsp;<span class='glyphicon glyphicon-plus'></span></button> 
			 </div>
</form>
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
          </div><!-- /.box Comments-->          
    
</div> <!--/.col-md-12 col-sm-12-->
<!--Notes Information Box-->

