<?php
if(isset($_GET['talent_list_id']))
{
	$talent_list_id = $_GET['talent_list_id'];
// List of Clients
$sql    = "SELECT * FROM tams_clients WHERE client_status='active' ORDER BY company_name";
$client_list = DB::query($sql);

}

if(isset($_GET['talent_list_id']))
{
	$talent_list_id = $_GET['talent_list_id'];


$client_list_sql    = "SELECT
*
FROM
tams_clients
WHERE client_status = 'active'";

$clients = DB::query($client_list_sql);
}
$ext_error = "";
$data = "";
$attachment1 = array();
if (isset($_FILES) && (bool) $_FILES) {

// Define allowed extensions
$allowedExtentsoins = array('image/png', 'image/jpeg', 'image/gif', 'application/pdf','application/msword','application/vnd.ms-powerpoint', 'application/vnd.ms-excel','text/plain');;
$file_name = $_FILES['attachment1']['name'];
$temp_name = $_FILES['attachment1']['tmp_name'];
$path_part = pathinfo($file_name);
$ext = $path_part['extension'];

// Checking for extension of attached files
if ($ext != $allowedExtentsoins) {
echo "<script>alert('Sorry!!! ." . $ext . " file is not allowed!!! Try Again.')</script>";
$ext_error = TRUE;
} else {
$ext_error = FALSE;
}
if ($ext_error == FALSE) {
echo "<script>alert('File successfully uploaded!!! Continue...')</script>";

// Store attached files in uploads folder
$file_path = dirname(__FILE__) . "/uploads/" . $path_part['basename'];
move_uploaded_file($temp_name, $file_path);
}
}
?>

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          Contact Client
            <small>Send Email to Client</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Send Email to Client</li>
          </ol>
        </section>

        <!-- Main content -->
		  <!-- Main content -->
        <section class="content">
<form enctype="multipart/form-data" id="contact_form" name="contact_form" class="form-horizontal" method="post" action="phpMailer.php" >
	<!-- Talent List Item box -->
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">
				Send Email to Client
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
			<div class="box-body bg-info">
		
		<div class="row" >

        
		<?php
		if($clients )
			
		{
		?>
		<p class="one">
		<?php 
		foreach($clients as $client){
		?>			
		<?php
		} // for each $client									
		?>
			
		</p> 

		 <?php

		}  // End if $client

		?>

		<?php
		if($client_list )
		{
			?>

					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Clients List :
						</label>
					<div class="col-md-9 col-sm-9">
						<div class="input-group">
						<select name="client_id" id="client_id" class=" input-group form-control  select2"  style="padding:5px;"  >
					
							<option value="">
								Select a Client
							</option>
	
							<?php 
							foreach($client_list as $list){
								?>	
							<option value="<?php echo $list['client_id'];?>">
								<?php echo $list['company_name'];?>
							</option>
							<?php
							} // for each client									
							?>

						</select>
						</div>
					</div>
<script type="text/javascript">
	$(".select2").select2();
	
</script>
	
			</div> <!--/.form-group-->
	<?php
	$client_email = DB::queryFirstField("SELECT client_email from tams_clients WHERE client_id = ".$list['client_id']);
	?>        
            
				<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> To:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="email" required placeholder="Add Email Address Here " 
							 value="" name="client_email" id="client_email">							
						  </div>
				</div>
				<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> CC:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="email" placeholder="Add Email Address Here " 
							 value="" name="cc_email" id="cc_email">							
						  </div>
				</div>
				<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> BCC:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="email" placeholder="Add Email Address Here " 
							 value="" name="bcc_email" id="bcc_email">							
						  </div>
				</div>
				<input type="hidden" name="uploaded_file_path" value="<?php echo $file_path; ?>" />
				<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Subject:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Add Subject Here " 
							 value="" name="subject" id="subject"/>							
						  </div>
				</div>
				<div class="form-group"  >
				<label class="col-md-3 col-sm-3 control-label"> Message:</label>
						  <div class="col-md-9 col-sm-9">
							 <textarea class="form-control" required value="" name="message" id="message" rows="10" cols="40">							
								</textarea>
						  </div>
				</div>
			  <div class="form-group"  >
				<label class="col-md-3 col-sm-3 control-label"><i class="fa fa-paperclip"></i> Attachment:</label>
						  <div class="col-md-9 col-sm-9">
								<!-- input-group image-preview [FROM HERE]-->
            <div class="input-group file-preview">
                <span class="input-group-btn">
                    <!-- image-preview-input -->
                    <div class="btn btn-default file-preview-input">
                        <input type="file" class="file"  accept="image/png, image/jpeg, image/gif,application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf" data-preview-file-type="text" name="attachment1" id="attachment1"/> <!-- Form Upload Field -->
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]-->						
								
				</div>
				</div>
				  <div class="form-group"  >
				<label class="col-md-3 col-sm-3 control-label"><i class="fa fa-paperclip"></i> Attachment:</label>
						  <div class="col-md-9 col-sm-9">
								<!-- input-group image-preview [FROM HERE]-->
            <div class="input-group file-preview">
                <span class="input-group-btn">
                    <!-- image-preview-input -->
                    <div class="btn btn-default file-preview-input">
                        <input type="file" class="file"  accept="image/png, image/jpeg, image/gif,application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf" data-preview-file-type="text" name="attachment2" id="attachment2"/> <!-- Form Upload Field -->
                    </div>
                </span>
            </div><!-- /input-group image-preview [TO HERE]-->						
								
				</div>
				</div>
				<div class="form-group"  >
						<div class="col-md-3 col-sm-3"></div>
						  <div class="col-md-9 col-sm-9">
					<button style="margin-right:10px;" type="submit" class='btn btn-success btn-lg' name="submit" value="submit">
							Submit &nbsp;
					</button>
						  </div>
				</div>
				
		 <?php

		}  // End if $client

		?>

		</div>
			</div>
		</div>
	</div>
</form>
	</section>
	