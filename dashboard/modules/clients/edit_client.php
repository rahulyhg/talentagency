<?php

$client_id = 0;
$company_name="";
$logo_url="";
$client_name = "";
$client_title = "";
$client_address = "";
$client_city = "";
$client_country = "";
$client_phone_1 = "";
$client_phone_2 = "";
$client_fax = "";
$client_email = "";
$client_account_manager = "";
$client_status = "";  
$created_on = "";
$created_by = "";
$last_modified_by = "";
$last_modified_on = "";

if(isset($_GET['client_id'])){
	$client_id = $_GET['client_id'];

		$sql = "SELECT
				*
				FROM
				tams_clients
				WHERE client_id = $client_id ;";
$client= DB::queryFirstRow($sql);
$client_id = $client['client_id'];
$company_name = $client['company_name'];
$logo_url = $client['logo_url'];
$client_name = $client['client_name'];
$client_title = $client['client_title'];
$client_address = $client['client_address'];
$client_city = $client['client_city'];
$client_country = $client['client_country'];
$client_phone_1 = $client['client_phone_1'];
$client_phone_2 = $client['client_phone_2'];
$client_fax = $client['client_fax'];
$client_email = $client['client_email'];
$client_account_manager = $client['client_account_manager']; 
$client_status = $client['client_status']; 
$created_on = $client['created_on'];
$created_by = $client['created_by'];
$last_modified_by = $client['last_modified_by'];
$last_modified_on = $client['last_modified_on'];

}
 

if(isset($_POST['save'])){

 // getting values from $_post variable & saving into normal variables
$client_id = $_POST['client_id'];
$company_name =$_POST['company_name'];
$logo_url =$_POST['logo_url'];
$client_name = $_POST['client_name'];
$client_title = $_POST['client_title'];
$client_address = $_POST['client_address'];
$client_city = $_POST['client_city'];
$client_country = $_POST['client_country'];
$client_phone_1 = $_POST['client_phone_1'];
$client_phone_2 = $_POST['client_phone_2'];
$client_fax = $_POST['client_fax'];
$client_email = $_POST['client_email'];
$client_account_manager = $_POST['client_account_manager']; 
$client_status = $_POST['client_status']; 
$last_modified_by = $_SESSION['user_id'];
$last_modified_on = getDateTime(NULL,"mySQL");
/* if client id is not empty update the database
	if($client_id <> ""){
		$update = DB::update('tams_clients', array(
				'company_name'=> $company_name,
				'logo_url'=> $logo_url,
				'client_name'=>$client_name,
				'client_title' => $client_title,
				'client_address'=> $client_address,
				'client_city' => $client_city,
				'client_country' => $client_country,
				'client_phone_1' => $client_phone_1,
				'client_phone_2' => $client_phone_2,
				'client_fax' => $client_fax,
				'client_email'=> $client_email,
				'client_account_manager' => $client_account_manager,
				'client_status'=> $client_status,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"client_id=%s", $client_id
		);
		//if update is successful redirect the page to view client list
		if($update)
		{
			echo '<script>alert("Edited Details Successfully");</script>';
			echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/clients/view_clients");</script>';
		}
	}
	*/ 
	if(!file_exists($_FILES['uploadlogo']['tmp_name']) || !is_uploaded_file($_FILES['uploadlogo']['tmp_name'])) {
		echo '<h2> No Logo ploaded</h2>';
	}  else {
		echo '<h2> Logo was uploaded</h2>';
	}
	
echo '<h2> $_FILES variable</h2>';
echo "<pre>";
print_r($_FILES);
echo "</pre>";	
	// print all the values of array in $_POST variable
/*echo '<h2> $_post variable</h2>';
	echo "<pre>";
print_r($_POST);
echo "</pre>";
echo '<h2> $GLOBALS variable</h2>';
 echo "<pre>";
print_r($GLOBALS);
echo "</pre>";
echo '<h2> $_SERVER variable</h2>';
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
echo '<h2> $_REQUEST variable</h2>';
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
echo '<h2> $_SESSION variable</h2>';
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo '<h2> $_GET variable</h2>';
echo "<pre>";
print_r($_GET);
echo "</pre>";
echo '<h2> $_COOKIE variable</h2>';
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";
echo '<h2> $_ENV variable</h2>';
 echo "<pre>";
print_r($_ENV);
echo "</pre>";
*/
}

?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		System Settings
		<small>
			Edit Client
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
			Edit Client
		</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- Profile box -->
		<form role="form"class="form-horizontal" method="post" enctype="multipart/form-data"
		     action="<?php echo $_SERVER['PHP_SELF']."?route=modules/clients/edit_client&client_id=".$client_id; ?>">
			<div class="box col-md-6 col-sm-6 col-sx-12">
				<div class="box-header with-border">
					<h3 class="box-title">
						Editing <?php echo $client['client_name']; ?> Profile
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
							Client ID:
						</label>
						<div class="col-md-9 col-sm-9">
							<?php echo $client_id; ?>
						</div>
					</div>
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							Company Name:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required  value="<?php echo $company_name; ?>" name="company_name" id="company_name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Company Logo URL :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">
								<input   class="input-group form-control" type="url" required value="<?php echo $logo_url; ?>" name="logo_url" id="logo_url"  >
								<div class="input-group-addon">
									<i class="fa fa-user">
									</i>
								</div>
							</div>
						</div>
					</div>							
				  <div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Upload Logo :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">
								<input   class="input-group form-control" type="file" value="" name="uploadlogo" id="uploadlogo"  >
								
							</div>
						</div>
					</div>							
 
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							Contact Person Name:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required  value="<?php echo $client_name; ?>" name="client_name" id="client_name">
						</div>
					</div>
					
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							Title/Position:
						</label>
						<div class="col-md-9 col-sm-9">
						<input class="form-control" type="text" required  value="<?php echo $client_title; ?>" name="client_title" id="client_title">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
									Address:
						</label>
						<div class="col-md-9 col-sm-9">
								<textarea id="client_address" name="client_address"  class="form-control"><?php echo $client_address; ?>
								</textarea>
						</div>
					</div>
										
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							City:
						</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" type="text" required  value="<?php echo $client_city; ?>" name="client_city" id="client_city">
						</div>
					</div>
					
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Country:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<select id="client_country" name="client_country" class="form-control" >
											<option value="">
											</option>
											<option value="Qatar" <?php if($client_country == "Qatar"){ echo 'selected = "selected" ';}?> >
												Qatar
											</option>
											<option value="Afghanistan" <?php if($client_country == "Afghanistan"){ echo 'selected = "selected" ';} ?>>
												Afghanistan
											</option>
											<option value="Albania" <?php if($client_country == "Albania"){ echo 'selected = "selected" ';} ?>>
												Albania
											</option>
											<option value="Algeria" <?php if($client_country == "Algeria"){ echo 'selected = "selected" ';} ?>>
												Algeria
											</option>
											<option value="American Samoa" <?php if($client_country == "American Samoa"){ echo 'selected = "selected" ';} ?>>
												American Samoa
											</option>
											<option value="Andorra" <?php if($client_country == "Andorra"){ echo 'selected = "selected" ';} ?>>
												Andorra
											</option>
											<option value="Angola" <?php if($client_country == "Angola"){ echo 'selected = "selected" ';} ?>>
												Angola
											</option>
											<option value="Anguilla" <?php if($client_country == "Anguilla"){ echo 'selected = "selected" ';} ?>>
												Anguilla
											</option>
											<option value="Antarctica" <?php if($client_country == "Antarctica"){ echo 'selected = "selected" ';} ?>>
												Antarctica
											</option>
											<option value="Antigua and Barbuda" <?php if($client_country == "Antigua and Barbuda"){ echo 'selected = "selected" ';} ?>>
												Antigua and Barbuda
											</option>
											<option value="Argentina" <?php if($client_country == "Argentina"){ echo 'selected = "selected" ';} ?>>
												Argentina
											</option>
											<option value="Armenia" <?php if($client_country == "Armenia"){ echo 'selected = "selected" ';} ?>>
												Armenia
											</option>
											<option value="Aruba" <?php if($client_country == "Aruba"){ echo 'selected = "selected" ';} ?>>
												Aruba
											</option>
											<option value="Australia" <?php if($client_country == "Australia"){ echo 'selected = "selected" ';} ?>>
												Australia
											</option>
											<option value="Austria" <?php if($client_country == "Austria"){ echo 'selected = "selected" ';} ?>>
												Austria
											</option>
											<option value="Azerbaijan" <?php if($client_country == "Azerbaijan"){ echo 'selected = "selected" ';} ?>>
												Azerbaijan
											</option>
											<option value="Bahamas" <?php if($client_country == "Bahamas"){ echo 'selected = "selected" ';} ?>>
												Bahamas
											</option>
											<option value="Bahrain" <?php if($client_country == "Bahrain"){ echo 'selected = "selected" ';} ?>>
												Bahrain
											</option>
											<option value="Bangladesh" <?php if($client_country == "Bangladesh"){ echo 'selected = "selected" ';} ?>>
												Bangladesh
											</option>
											<option value="Barbados" <?php if($client_country == "Barbados"){ echo 'selected = "selected" ';} ?>>
												Barbados
											</option>
											<option value="Belarus" <?php if($client_country == "Belarus"){ echo 'selected = "selected" ';} ?>>
												Belarus
											</option>
											<option value="Belgium" <?php if($client_country == "Belgium"){ echo 'selected = "selected" ';} ?>>
												Belgium
											</option>
											<option value="Belize" <?php if($client_country == "Belize"){ echo 'selected = "selected" ';} ?>>
												Belize
											</option>
											<option value="Benin" <?php if($client_country == "Benin"){ echo 'selected = "selected" ';} ?>>
												Benin
											</option>
											<option value="Bermuda" <?php if($client_country == "Bermuda"){ echo 'selected = "selected" ';} ?>>
												Bermuda
											</option>
											<option value="Bhutan" <?php if($client_country == "Bhutan"){ echo 'selected = "selected" ';} ?>>
												Bhutan
											</option>
											<option value="Bolivia" <?php if($client_country == "Bolivia"){ echo 'selected = "selected" ';} ?>>
												Bolivia
											</option>
											<option value="Bosnia and Herzegovina" <?php if($client_country == "Bosnia and Herzegovina"){ echo 'selected = "selected" ';} ?>>
												Bosnia and Herzegovina
											</option>
											<option value="Botswana" <?php if($client_country == "Botswana"){ echo 'selected = "selected" ';} ?>>
												Botswana
											</option>
											<option value="Bouvet Island" <?php if($client_country == "Bouvet Island"){ echo 'selected = "selected" ';} ?>>
												Bouvet Island
											</option>
											<option value="Brazil" <?php if($client_country == "Brazil"){ echo 'selected = "selected" ';} ?>>
												Brazil
											</option>
											<option value="British Indian Ocean Territory" <?php if($client_country == "British Indian Ocean Territory"){ echo 'selected = "selected" ';} ?>>
												British Indian Ocean Territory
											</option>
											<option value="Brunei Darussalam" <?php if($client_country == "Brunei Darussalam"){ echo 'selected = "selected" ';} ?>>
												Brunei Darussalam
											</option>
											<option value="Bulgaria" <?php if($client_country == "Bulgaria"){ echo 'selected = "selected" ';} ?>>
												Bulgaria
											</option>
											<option value="Burkina Faso" <?php if($client_country == "Burkina Faso"){ echo 'selected = "selected" ';} ?>>
												Burkina Faso
											</option>
											<option value="Burundi" <?php if($client_country == "Burundi"){ echo 'selected = "selected" ';} ?>>
												Burundi
											</option>
											<option value="Cambodia" <?php if($client_country == "Cambodia"){ echo 'selected = "selected" ';} ?>>
												Cambodia
											</option>
											<option value="Cameroon" <?php if($client_country == "Cameroon"){ echo 'selected = "selected" ';} ?>>
												Cameroon
											</option>
											<option value="Canada" <?php if($client_country == "Canada"){ echo 'selected = "selected" ';} ?>>
												Canada
											</option>
											<option value="Cape Verde" <?php if($client_country == "Cape Verde"){ echo 'selected = "selected" ';} ?>>
												Cape Verde
											</option>
											<option value="Cayman Islands" <?php if($client_country == "Cayman Islands"){ echo 'selected = "selected" ';} ?>>
												Cayman Islands
											</option>
											<option value="Central African Republic" <?php if($client_country == "Central African Republic"){ echo 'selected = "selected" ';} ?>>
												Central African Republic
											</option>
											<option value="Chad" <?php if($client_country == "Chad"){ echo 'selected = "selected" ';} ?>>
												Chad
											</option>
											<option value="Chile" <?php if($client_country == "Chile"){ echo 'selected = "selected" ';} ?>>
												Chile
											</option>
											<option value="China" <?php if($client_country == "China"){ echo 'selected = "selected" ';} ?>>
												China
											</option>
											<option value="Christmas Island" <?php if($client_country == "Christmas Island"){ echo 'selected = "selected" ';} ?>>
												Christmas Island
											</option>
											<option value="Cocos (Keeling) Islands" <?php if($client_country == "Cocos (Keeling) Islands"){ echo 'selected = "selected" ';} ?>>
												Cocos (Keeling) Islands
											</option>
											<option value="Colombia" <?php if($client_country == "Colombia"){ echo 'selected = "selected" ';} ?>>
												Colombia
											</option>
											<option value="Comoros" <?php if($client_country == "Comoros"){ echo 'selected = "selected" ';} ?>>
												Comoros
											</option>
											<option value="Congo" <?php if($client_country == "Congo"){ echo 'selected = "selected" ';} ?>>
												Congo
											</option>
											<option value="Congo, The Democratic Republic of The" <?php if($client_country == "Congo, The Democratic Republic of The"){ echo 'selected = "selected" ';} ?>>
												Congo, The Democratic Republic of The
											</option>
											<option value="Cook Islands" <?php if($client_country == "Cook Islands"){ echo 'selected = "selected" ';} ?>>
												Cook Islands
											</option>
											<option value="Costa Rica" <?php if($client_country == "Costa Rica"){ echo 'selected = "selected" ';} ?>>
												Costa Rica
											</option>
											<option value="Cote D'ivoire" <?php if($client_country == "Cote D'ivoire"){ echo 'selected = "selected" ';} ?>>
												Cote D'ivoire
											</option>
											<option value="Croatia" <?php if($client_country == "Croatia"){ echo 'selected = "selected" ';} ?>>
												Croatia
											</option>
											<option value="Cuba" <?php if($client_country == "Cuba"){ echo 'selected = "selected" ';} ?>>
												Cuba
											</option>
											<option value="Cyprus" <?php if($client_country == "Cyprus"){ echo 'selected = "selected" ';} ?>>
												Cyprus
											</option>
											<option value="Czech Republic" <?php if($client_country == "Czech Republic"){ echo 'selected = "selected" ';} ?>>
												Czech Republic
											</option>
											<option value="Denmark" <?php if($client_country == "Denmark"){ echo 'selected = "selected" ';} ?>>
												Denmark
											</option>
											<option value="Djibouti" <?php if($client_country == "Djibouti"){ echo 'selected = "selected" ';} ?>>
												Djibouti
											</option>
											<option value="Dominica" <?php if($client_country == "Dominica"){ echo 'selected = "selected" ';} ?>>
												Dominica
											</option>
											<option value="Dominican Republic" <?php if($client_country == "Dominican Republic"){ echo 'selected = "selected" ';} ?>>
												Dominican Republic
											</option>
											<option value="Ecuador" <?php if($client_country == "Ecuador"){ echo 'selected = "selected" ';} ?>>
												Ecuador
											</option>
											<option value="Egypt" <?php if($client_country == "Egypt"){ echo 'selected = "selected" ';} ?>>
												Egypt
											</option>
											<option value="El Salvador" <?php if($client_country == "El Salvador"){ echo 'selected = "selected" ';} ?>>
												El Salvador
											</option>
											<option value="Equatorial Guinea" <?php if($client_country == "Equatorial Guinea"){ echo 'selected = "selected" ';} ?>>
												Equatorial Guinea
											</option>
											<option value="Eritrea" <?php if($client_country == "Eritrea"){ echo 'selected = "selected" ';} ?>>
												Eritrea
											</option>
											<option value="Estonia" <?php if($client_country == "Estonia"){ echo 'selected = "selected" ';} ?>>
												Estonia
											</option>
											<option value="Ethiopia" <?php if($client_country == "Ethiopia"){ echo 'selected = "selected" ';} ?>>
												Ethiopia
											</option>
											<option value="Falkland Islands (Malvinas)" <?php if($client_country == "Falkland Islands (Malvinas)"){ echo 'selected = "selected" ';} ?>>
												Falkland Islands (Malvinas)
											</option>
											<option value="Faroe Islands" <?php if($client_country == "Faroe Islands"){ echo 'selected = "selected" ';} ?>>
												Faroe Islands
											</option>
											<option value="Fiji" <?php if($client_country == "Fiji"){ echo 'selected = "selected" ';} ?>>
												Fiji
											</option>
											<option value="Finland" <?php if($client_country == "Finland"){ echo 'selected = "selected" ';} ?>>
												Finland
											</option>
											<option value="France" <?php if($client_country == "France"){ echo 'selected = "selected" ';} ?>>
												France
											</option>
											<option value="French Guiana" <?php if($client_country == "French Guiana"){ echo 'selected = "selected" ';} ?>>
												French Guiana
											</option>
											<option value="French Polynesia" <?php if($client_country == "French Polynesia"){ echo 'selected = "selected" ';} ?>>
												French Polynesia
											</option>
											<option value="French Southern Territories" <?php if($client_country == "French Southern Territories"){ echo 'selected = "selected" ';} ?>>
												French Southern Territories
											</option>
											<option value="Gabon" <?php if($client_country == "Gabon"){ echo 'selected = "selected" ';} ?>>
												Gabon
											</option>
											<option value="Gambia" <?php if($client_country == "Gambia"){ echo 'selected = "selected" ';} ?>>
												Gambia
											</option>
											<option value="Georgia" <?php if($client_country == "Georgia"){ echo 'selected = "selected" ';} ?>>
												Georgia
											</option>
											<option value="Germany" <?php if($client_country == "Germany"){ echo 'selected = "selected" ';} ?>>
												Germany
											</option>
											<option value="Ghana" <?php if($client_country == "Ghana"){ echo 'selected = "selected" ';} ?>>
												Ghana
											</option>
											<option value="Gibraltar" <?php if($client_country == "Gibraltar"){ echo 'selected = "selected" ';} ?>>
												Gibraltar
											</option>
											<option value="Greece" <?php if($client_country == "Greece"){ echo 'selected = "selected" ';} ?>>
												Greece
											</option>
											<option value="Greenland" <?php if($client_country == "Greenland"){ echo 'selected = "selected" ';} ?>>
												Greenland
											</option>
											<option value="Grenada" <?php if($client_country == "Grenada"){ echo 'selected = "selected" ';} ?>>
												Grenada
											</option>
											<option value="Guadeloupe" <?php if($client_country == "Guadeloupe"){ echo 'selected = "selected" ';} ?>>
												Guadeloupe
											</option>
											<option value="Guam" <?php if($client_country == "Guam"){ echo 'selected = "selected" ';} ?>>
												Guam
											</option>
											<option value="Guatemala"<?php if($client_country == "Guatemala"){ echo 'selected = "selected" ';} ?>>
												Guatemala
											</option>
											<option value="Guinea" <?php if($client_country == "Guinea"){ echo 'selected = "selected" ';} ?>>
												Guinea
											</option>
											<option value="Guinea-bissau" <?php if($client_country == "Guinea-bissau"){ echo 'selected = "selected" ';} ?>>
												Guinea-bissau
											</option>
											<option value="Guyana" <?php if($client_country == "Guyana"){ echo 'selected = "selected" ';} ?>>
												Guyana
											</option>
											<option value="Haiti" <?php if($client_country == "Haiti"){ echo 'selected = "selected" ';} ?>>
												Haiti
											</option>
											<option value="Heard Island and Mcdonald Islands" <?php if($client_country == "Heard Island and Mcdonald Islands"){ echo 'selected = "selected" ';} ?>>
												Heard Island and Mcdonald Islands
											</option>
											<option value="Holy See (Vatican City State)" <?php if($client_country == "Holy See (Vatican City State)"){ echo 'selected = "selected" ';} ?>>
												Holy See (Vatican City State)
											</option>
											<option value="Honduras" <?php if($client_country == "Honduras"){ echo 'selected = "selected" ';} ?>>
												Honduras
											</option>
											<option value="Hong Kong" <?php if($client_country == "Hong Kong"){ echo 'selected = "selected" ';} ?>>
												Hong Kong
											</option>
											<option value="Hungary" <?php if($client_country == "Hungary"){ echo 'selected = "selected" ';} ?>>
												Hungary
											</option>
											<option value="Iceland" <?php if($client_country == "Iceland"){ echo 'selected = "selected" ';} ?>>
												Iceland
											</option>
											<option value="India" <?php if($client_country == "India"){ echo 'selected = "selected" ';} ?>>
												India
											</option>
											<option value="Indonesia" <?php if($client_country == "Indonesia"){ echo 'selected = "selected" ';} ?>>
												Indonesia
											</option>
											<option value="Iran, Islamic Republic of" <?php if($client_country == "Iran, Islamic Republic of"){ echo 'selected = "selected" ';} ?>>
												Iran, Islamic Republic of
											</option>
											<option value="Iraq" <?php if($client_country == "Iraq"){ echo 'selected = "selected" ';} ?>>
												Iraq
											</option>
											<option value="Ireland" <?php if($client_country == "Ireland"){ echo 'selected = "selected" ';} ?>>
												Ireland
											</option>
											<option value="Israel" <?php if($client_country == "Israel"){ echo 'selected = "selected" ';} ?>>
												Israel
											</option>
											<option value="Italy" <?php if($client_country == "Italy"){ echo 'selected = "selected" ';} ?>>
												Italy
											</option>
											<option value="Jamaica" <?php if($client_country == "Jamaica"){ echo 'selected = "selected" ';} ?>>
												Jamaica
											</option>
											<option value="Japan" <?php if($client_country == "Japan"){ echo 'selected = "selected" ';} ?>>
												Japan
											</option>
											<option value="Jordan" <?php if($client_country == "Jordan"){ echo 'selected = "selected" ';} ?>>
												Jordan
											</option>
											<option value="Kazakhstan" <?php if($client_country == "Kazakhstan"){ echo 'selected = "selected" ';} ?>>
												Kazakhstan
											</option>
											<option value="Kenya" <?php if($client_country == "Kenya"){ echo 'selected = "selected" ';} ?>>
												Kenya
											</option>
											<option value="Kiribati" <?php if($client_country == "Kiribati"){ echo 'selected = "selected" ';} ?>>
												Kiribati
											</option>
											<option value="Korea, Democratic People's Republic of" <?php if($client_country == "Korea, Democratic People's Republic of"){ echo 'selected = "selected" ';} ?>>
												Korea, Democratic People's Republic of
											</option>
											<option value="Korea, Republic of" <?php if($client_country == "Korea, Republic of"){ echo 'selected = "selected" ';} ?>>
												Korea, Republic of
											</option>
											<option value="Kuwait" <?php if($client_country == "Kuwait"){ echo 'selected = "selected" ';} ?>>
												Kuwait
											</option>
											<option value="Kyrgyzstan" <?php if($client_country == "Kyrgyzstan"){ echo 'selected = "selected" ';} ?>>
												Kyrgyzstan
											</option>
											<option value="Lao People's Democratic Republic" <?php if($client_country == "Lao People's Democratic Republic"){ echo 'selected = "selected" ';} ?>>
												Lao People's Democratic Republic
											</option>
											<option value="Latvia" <?php if($client_country == "Latvia"){ echo 'selected = "selected" ';} ?>>
												Latvia
											</option>
											<option value="Lebanon" <?php if($client_country == "Lebanon"){ echo 'selected = "selected" ';} ?>>
												Lebanon
											</option>
											<option value="Lesotho" <?php if($client_country == "Lesotho"){ echo 'selected = "selected" ';} ?>>
												Lesotho
											</option>
											<option value="Liberia" <?php if($client_country == "Liberia"){ echo 'selected = "selected" ';} ?>>
												Liberia
											</option>
											<option value="Libyan Arab Jamahiriya" <?php if($client_country == "Libyan Arab Jamahiriya"){ echo 'selected = "selected" ';} ?>>
												Libyan Arab Jamahiriya
											</option>
											<option value="Liechtenstein" <?php if($client_country == "Liechtenstein"){ echo 'selected = "selected" ';} ?>>
												Liechtenstein
											</option>
											<option value="Lithuania" <?php if($client_country == "Lithuania"){ echo 'selected = "selected" ';} ?>>
												Lithuania
											</option>
											<option value="Luxembourg" <?php if($client_country == "Luxembourg"){ echo 'selected = "selected" ';} ?>>
												Luxembourg
											</option>
											<option value="Macao" <?php if($client_country == "Macao"){ echo 'selected = "selected" ';} ?>>
												Macao
											</option>
											<option value="Macedonia, The Former Yugoslav Republic of" <?php if($client_country == "Macedonia, The Former Yugoslav Republic of"){ echo 'selected = "selected" ';} ?>>
												Macedonia, The Former Yugoslav Republic of
											</option>
											<option value="Madagascar" <?php if($client_country == "Madagascar"){ echo 'selected = "selected" ';} ?>>
												Madagascar
											</option>
											<option value="Malawi" <?php if($client_country == "Malawi"){ echo 'selected = "selected" ';} ?>>
												Malawi
											</option>
											<option value="Malaysia" <?php if($client_country == "Malaysia"){ echo 'selected = "selected" ';} ?>>
												Malaysia
											</option>
											<option value="Maldives" <?php if($client_country == "Maldives"){ echo 'selected = "selected" ';} ?>>
												Maldives
											</option>
											<option value="Mali" <?php if($client_country == "Mali"){ echo 'selected = "selected" ';} ?>>
												Mali
											</option>
											<option value="Malta" <?php if($client_country == "Malta"){ echo 'selected = "selected" ';} ?>>
												Malta
											</option>
											<option value="Marshall Islands" <?php if($client_country == "Marshall Islands"){ echo 'selected = "selected" ';} ?>>
												Marshall Islands
											</option>
											<option value="Martinique" <?php if($client_country == "Martinique"){ echo 'selected = "selected" ';} ?>>
												Martinique
											</option>
											<option value="Mauritania" <?php if($client_country == "Mauritania"){ echo 'selected = "selected" ';} ?>>
												Mauritania
											</option>
											<option value="Mauritius" <?php if($client_country == "Mauritius"){ echo 'selected = "selected" ';} ?>>
												Mauritius
											</option>
											<option value="Mayotte" <?php if($client_country == "Mayotte"){ echo 'selected = "selected" ';} ?>>
												Mayotte
											</option>
											<option value="Mexico" <?php if($client_country == "Mexico"){ echo 'selected = "selected" ';} ?>>
												Mexico
											</option>
											<option value="Micronesia, Federated States of" <?php if($client_country == "Micronesia, Federated States of"){ echo 'selected = "selected" ';} ?>>
												Micronesia, Federated States of
											</option>
											<option value="Moldova, Republic of" <?php if($client_country == "Moldova, Republic of"){ echo 'selected = "selected" ';} ?>>
												Moldova, Republic of
											</option>
											<option value="Monaco" <?php if($client_country == "Monaco"){ echo 'selected = "selected" ';} ?>>
												Monaco
											</option>
											<option value="Mongolia" <?php if($client_country == "Mongolia"){ echo 'selected = "selected" ';} ?>>
												Mongolia
											</option>
											<option value="Montenegro" <?php if($client_country == "Montenegro"){ echo 'selected = "selected" ';} ?>>
												Montenegro
											</option>
											<option value="Montserrat" <?php if($client_country == "Montserrat"){ echo 'selected = "selected" ';} ?>>
												Montserrat
											</option>
											<option value="Morocco" <?php if($client_country == "Morocco"){ echo 'selected = "selected" ';} ?>>
												Morocco
											</option>
											<option value="Mozambique" <?php if($client_country == "Mozambique"){ echo 'selected = "selected" ';} ?>>
												Mozambique
											</option>
											<option value="Myanmar" <?php if($client_country == "Myanmar"){ echo 'selected = "selected" ';} ?>>
												Myanmar
											</option>
											<option value="Namibia" <?php if($client_country == "Namibia"){ echo 'selected = "selected" ';} ?>>
												Namibia
											</option>
											<option value="Nauru" <?php if($client_country == "Nauru"){ echo 'selected = "selected" ';} ?>>
												Nauru
											</option>
											<option value="Nepal" <?php if($client_country == "Nepal"){ echo 'selected = "selected" ';} ?>>
												Nepal
											</option>
											<option value="Netherlands" <?php if($client_country == "Netherlands"){ echo 'selected = "selected" ';} ?>>
												Netherlands
											</option>
											<option value="Netherlands Antilles" <?php if($client_country == "Netherlands Antilles"){ echo 'selected = "selected" ';} ?>>
												Netherlands Antilles
											</option>
											<option value="New Caledonia" <?php if($client_country == "New Caledonia"){ echo 'selected = "selected" ';} ?>>
												New Caledonia
											</option>
											<option value="New Zealand" <?php if($client_country == "New Zealand"){ echo 'selected = "selected" ';} ?>>
												New Zealand
											</option>
											<option value="Nicaragua" <?php if($client_country == "Nicaragua"){ echo 'selected = "selected" ';} ?>>
												Nicaragua
											</option>
											<option value="Niger" <?php if($client_country == "Niger"){ echo 'selected = "selected" ';} ?>>
												Niger
											</option>
											<option value="Nigeria" <?php if($client_country == "Nigeria"){ echo 'selected = "selected" ';} ?>>
												Nigeria
											</option>
											<option value="Niue" <?php if($client_country == "Niue"){ echo 'selected = "selected" ';} ?>>
												Niue
											</option>
											<option value="Norfolk Island" <?php if($client_country == "Norfolk Island"){ echo 'selected = "selected" ';} ?>>
												Norfolk Island
											</option>
											<option value="Northern Mariana Islands" <?php if($client_country == "Northern Mariana Islands"){ echo 'selected = "selected" ';} ?>>
												Northern Mariana Islands
											</option>
											<option value="Norway" <?php if($client_country == "Norway"){ echo 'selected = "selected" ';} ?>>
												Norway
											</option>
											<option value="Oman" <?php if($client_country == "Oman"){ echo 'selected = "selected" ';} ?>>
												Oman
											</option>
											<option value="Pakistan" <?php if($client_country == "Pakistan"){ echo 'selected = "selected" ';} ?>>
												Pakistan
											</option>
											<option value="Palau" <?php if($client_country == "Palau"){ echo 'selected = "selected" ';} ?>>
												Palau
											</option>
											<option value="Palestinian Territory, Occupied" <?php if($client_country == "Palestinian Territory, Occupied"){ echo 'selected = "selected" ';} ?>>
												Palestinian Territory, Occupied
											</option>
											<option value="Panama" <?php if($client_country == "Panama"){ echo 'selected = "selected" ';} ?>>
												Panama
											</option>
											<option value="Papua New Guinea" <?php if($client_country == "Papua New Guinea"){ echo 'selected = "selected" ';} ?>>
												Papua New Guinea
											</option>
											<option value="Paraguay" <?php if($client_country == "Paraguay"){ echo 'selected = "selected" ';} ?>>
												Paraguay
											</option>
											<option value="Peru" <?php if($client_country == "Peru"){ echo 'selected = "selected" ';} ?>>
												Peru
											</option>
											<option value="Philippines" <?php if($client_country == "Philippines"){ echo 'selected = "selected" ';} ?>>
												Philippines
											</option>
											<option value="Pitcairn" <?php if($client_country == "Pitcairn"){ echo 'selected = "selected" ';} ?>>
												Pitcairn
											</option>
											<option value="Poland" <?php if($client_country == "Poland"){ echo 'selected = "selected" ';} ?>>
												Poland
											</option>
											<option value="Portugal" <?php if($client_country == "Portugal"){ echo 'selected = "selected" ';} ?>>
												Portugal
											</option>
											<option value="Puerto Rico" <?php if($client_country == "Puerto Rico"){ echo 'selected = "selected" ';} ?>>
												Puerto Rico
											</option>
											<option value="Qatar" <?php if($client_country == "Qatar"){ echo 'selected = "selected" ';} ?>>
												Qatar
											</option>
											<option value="Reunion" <?php if($client_country == "Reunion"){ echo 'selected = "selected" ';} ?>>
												Reunion
											</option>
											<option value="Romania" <?php if($client_country == "Romania"){ echo 'selected = "selected" ';} ?>>
												Romania
											</option>
											<option value="Russian Federation" <?php if($client_country == "Russian Federation"){ echo 'selected = "selected" ';} ?>>
												Russian Federation
											</option>
											<option value="Rwanda" <?php if($client_country == "Rwanda"){ echo 'selected = "selected" ';} ?>>
												Rwanda
											</option>
											<option value="Saint Helena" <?php if($client_country == "Saint Helena"){ echo 'selected = "selected" ';} ?>>
												Saint Helena
											</option>
											<option value="Saint Kitts and Nevis" <?php if($client_country == "Saint Kitts and Nevis"){ echo 'selected = "selected" ';} ?>>
												Saint Kitts and Nevis
											</option>
											<option value="Saint Lucia" <?php if($client_country == "Saint Lucia"){ echo 'selected = "selected" ';} ?>>
												Saint Lucia
											</option>
											<option value="Saint Pierre and Miquelon" <?php if($client_country == "Saint Pierre and Miquelon"){ echo 'selected = "selected" ';} ?>>
												Saint Pierre and Miquelon
											</option>
											<option value="Saint Vincent and The Grenadines" <?php if($client_country == "Saint Vincent and The Grenadines"){ echo 'selected = "selected" ';} ?>>
												Saint Vincent and The Grenadines
											</option>
											<option value="Samoa" <?php if($client_country == "Samoa"){ echo 'selected = "selected" ';} ?>>
												Samoa
											</option>
											<option value="San Marino" <?php if($client_country == "San Marino"){ echo 'selected = "selected" ';} ?>>
												San Marino
											</option>
											<option value="Sao Tome and Principe" <?php if($client_country == "Sao Tome and Principe"){ echo 'selected = "selected" ';} ?>>
												Sao Tome and Principe
											</option>
											<option value="Saudi Arabia" <?php if($client_country == "Saudi Arabia"){ echo 'selected = "selected" ';} ?>>
												Saudi Arabia
											</option>
											<option value="Senegal" <?php if($client_country == "Senegal"){ echo 'selected = "selected" ';} ?>>
												Senegal
											</option>
											<option value="Serbia" <?php if($client_country == "Serbia"){ echo 'selected = "selected" ';} ?>>
												Serbia
											</option>
											<option value="Seychelles" <?php if($client_country == "Seychelles"){ echo 'selected = "selected" ';} ?>>
												Seychelles
											</option>
											<option value="Sierra Leone" <?php if($client_country == "Sierra Leone"){ echo 'selected = "selected" ';} ?>>
												Sierra Leone
											</option>
											<option value="Singapore" <?php if($client_country == "Singapore"){ echo 'selected = "selected" ';} ?>>
												Singapore
											</option>
											<option value="Slovakia" <?php if($client_country == "Slovakia"){ echo 'selected = "selected" ';} ?>>
												Slovakia
											</option>
											<option value="Slovenia" <?php if($client_country == "Slovenia"){ echo 'selected = "selected" ';} ?>>
												Slovenia
											</option>
											<option value="Solomon Islands" <?php if($client_country == "Solomon Islands"){ echo 'selected = "selected" ';} ?>>
												Solomon Islands
											</option>
											<option value="Somalia" <?php if($client_country == "Somalia"){ echo 'selected = "selected" ';} ?>>
												Somalia
											</option>
											<option value="South Africa" <?php if($client_country == "South Africa"){ echo 'selected = "selected" ';} ?>>
												South Africa
											</option>
											<option value="South Georgia and The South Sandwich Islands" <?php if($client_country == "South Georgia and The South Sandwich Islands"){ echo 'selected = "selected" ';} ?>>
												South Georgia and The South Sandwich Islands
											</option>
											<option value="South Sudan" <?php if($client_country == "South Sudan"){ echo 'selected = "selected" ';} ?>>
												South Sudan
											</option>
											<option value="Spain" <?php if($client_country == "Spain"){ echo 'selected = "selected" ';} ?>>
												Spain
											</option>
											<option value="Sri Lanka" <?php if($client_country == "Sri Lanka"){ echo 'selected = "selected" ';} ?>>
												Sri Lanka
											</option>
											<option value="Sudan" <?php if($client_country == "Sudan"){ echo 'selected = "selected" ';} ?>>
												Sudan
											</option>
											<option value="Suriname" <?php if($client_country == "Suriname"){ echo 'selected = "selected" ';} ?>>
												Suriname
											</option>
											<option value="Svalbard and Jan Mayen" <?php if($client_country == "Svalbard and Jan Mayen"){ echo 'selected = "selected" ';} ?>>
												Svalbard and Jan Mayen
											</option>
											<option value="Swaziland" <?php if($client_country == "Swaziland"){ echo 'selected = "selected" ';} ?>>
												Swaziland
											</option>
											<option value="Sweden" <?php if($client_country == "Sweden"){ echo 'selected = "selected" ';} ?>>
												Sweden
											</option>
											<option value="Switzerland" <?php if($client_country == "Switzerland"){ echo 'selected = "selected" ';} ?>>
												Switzerland
											</option>
											<option value="Syrian Arab Republic" <?php if($client_country == "Syrian Arab Republic"){ echo 'selected = "selected" ';} ?>>
												Syrian Arab Republic
											</option>
											<option value="Taiwan, Republic of China" <?php if($client_country == "Taiwan, Republic of China"){ echo 'selected = "selected" ';} ?>>
												Taiwan, Republic of China
											</option>
											<option value="Tajikistan" <?php if($client_country == "Tajikistan"){ echo 'selected = "selected" ';} ?>>
												Tajikistan
											</option>
											<option value="Tanzania, United Republic of" <?php if($client_country == "Tanzania, United Republic of"){ echo 'selected = "selected" ';} ?>>
												Tanzania, United Republic of
											</option>
											<option value="Thailand" <?php if($client_country == "Thailand"){ echo 'selected = "selected" ';} ?>>
												Thailand
											</option>
											<option value="Timor-leste" <?php if($client_country == "Timor-leste"){ echo 'selected = "selected" ';} ?>>
												Timor-leste
											</option>
											<option value="Togo" <?php if($client_country == "Togo"){ echo 'selected = "selected" ';} ?>>
												Togo
											</option>
											<option value="Tokelau" <?php if($client_country == "Tokelau"){ echo 'selected = "selected" ';} ?>>
												Tokelau
											</option>
											<option value="Tonga" <?php if($client_country == "Tonga"){ echo 'selected = "selected" ';} ?>>
												Tonga
											</option>
											<option value="Trinidad and Tobago" <?php if($client_country == "Trinidad and Tobago"){ echo 'selected = "selected" ';} ?>>
												Trinidad and Tobago
											</option>
											<option value="Tunisia" <?php if($client_country == "Tunisia"){ echo 'selected = "selected" ';} ?>>
												Tunisia
											</option>
											<option value="Turkey" <?php if($client_country == "Turkey"){ echo 'selected = "selected" ';} ?>>
												Turkey
											</option>
											<option value="Turkmenistan" <?php if($client_country == "Turkmenistan"){ echo 'selected = "selected" ';} ?>>
												Turkmenistan
											</option>
											<option value="Turks and Caicos Islands" <?php if($client_country == "Turks and Caicos Islands"){ echo 'selected = "selected" ';} ?>>
												Turks and Caicos Islands
											</option>
											<option value="Tuvalu" <?php if($client_country == "Tuvalu"){ echo 'selected = "selected" ';} ?>>
												Tuvalu
											</option>
											<option value="Uganda"<?php if($client_country == "Uganda"){ echo 'selected = "selected" ';} ?>>
												Uganda
											</option>
											<option value="Ukraine" <?php if($client_country == "Ukraine"){ echo 'selected = "selected" ';} ?>>
												Ukraine
											</option>
											<option value="United Arab Emirates" <?php if($client_country == "United Arab Emirates"){ echo 'selected = "selected" ';} ?>>
												United Arab Emirates
											</option>
											<option value="United Kingdom" <?php if($client_country == "United Kingdom"){ echo 'selected = "selected" ';} ?>>
												United Kingdom
											</option>
											<option value="United States" <?php if($client_country == "United States"){ echo 'selected = "selected" ';} ?>>
												United States
											</option>
											<option value="United States Minor Outlying Islands" <?php if($client_country == "United States Minor Outlying Islands"){ echo 'selected = "selected" ';} ?>>
												United States Minor Outlying Islands
											</option>
											<option value="Uruguay" <?php if($client_country == "Uruguay"){ echo 'selected = "selected" ';} ?>>
												Uruguay
											</option>
											<option value="Uzbekistan" <?php if($client_country == "Uzbekistan"){ echo 'selected = "selected" ';} ?>>
												Uzbekistan
											</option>
											<option value="Vanuatu" <?php if($client_country == "Vanuatu"){ echo 'selected = "selected" ';} ?>>
												Vanuatu
											</option>
											<option value="Venezuela" <?php if($client_country == "Venezuela"){ echo 'selected = "selected" ';} ?>>
												Venezuela
											</option>
											<option value="Viet Nam" <?php if($client_country == "Viet Nam"){ echo 'selected = "selected" ';} ?>>
												Viet Nam
											</option>
											<option value="Virgin Islands, British" <?php if($client_country == "Virgin Islands, British"){ echo 'selected = "selected" ';} ?>>
												Virgin Islands, British
											</option>
											<option value="Virgin Islands, U.S." <?php if($client_country == "Virgin Islands, U.S."){ echo 'selected = "selected" ';} ?>>
												Virgin Islands, U.S.
											</option>
											<option value="Wallis and Futuna" <?php if($client_country == "Wallis and Futuna"){ echo 'selected = "selected" ';} ?>>
												Wallis and Futuna
											</option>
											<option value="Western Sahara" <?php if($client_country == "Western Sahara"){ echo 'selected = "selected" ';} ?>>
												Western Sahara
											</option>
											<option value="Yemen" <?php if($client_country == "Yemen"){ echo 'selected = "selected" ';} ?>>
												Yemen
											</option>
											<option value="Zambia" <?php if($client_country == "Zambia"){ echo 'selected = "selected" ';} ?>>
												Zambia
											</option>
											<option value="Zimbabwe" <?php if($client_country == "Zimbabwe"){ echo 'selected = "selected" ';} ?>>
												Zimbabwe
											</option>
										</select>
										<div class="input-group-addon">
											<i class="fa fa-globe">
											</i>
										</div>
									</div>
								</div>
							</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Phone No 1:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<input class="form-control" type="tel" required value="<?php echo $client_phone_1; ?>" name="client_phone_1" id="client_phone_1">
										<div class="input-group-addon">
											<i class="fa fa-phone">
											</i>
										</div>
									</div>
								</div>
							</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Phone No 2:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<input class="form-control" type="tel" required value="<?php echo $client_phone_2; ?>" name="client_phone_2" id="client_phone_2">
										<div class="input-group-addon">
											<i class="fa fa-phone">
											</i>
										</div>
									</div>
								</div>

						</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Fax:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<input class="form-control" type="tel" required value="<?php echo $client_fax; ?>" name="client_fax" id="client_fax">
										<div class="input-group-addon">
											<i class="fa fa-fax">
											</i>
										</div>
									</div>
								</div>
					</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Email :
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">

										<input   class="input-group email form-control"     type="email" required value="<?php echo $client_email; ?>" name="client_email" id="client_email" >
										<div class="input-group-addon">
											<i class="fa fa-envelope">
											</i>
										</div>
									</div>
								</div>
						</div>
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> 
						Account Manager:
						</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required
							 value="<?php echo $client_account_manager; ?>" name="client_account_manager" id="client_account_manager">							
						  </div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Client Status:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="client_status" name="client_status" class="form-control">

								<option value="active" <?php if($client_status == "active"){ echo 'selected = "selected" ';} ?> >
									Active
								</option>
								<option value="disabled"   <?php if($client_status != "active"){ echo 'selected = "selected" ';} ?>>
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
					<input type="hidden" name="form_name" id="form_name" value="edit_client_form" />
					<input type="hidden" name="client_id" id="client_id" value="<?php echo $client_id; ?>" />
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
							<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/clients/view_clients"?>">
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