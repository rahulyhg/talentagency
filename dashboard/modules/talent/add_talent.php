<?php

// Process Form Submission, this code may go into a separate file that process all forms and is included in index loads

//reset all the form fields
$first_name                = "";
$last_name                 = "";
$dob                       = "";
$sex                       = "";
$address                   = "";
$mobile_no                  = "";
$email_id                  = "";
$nationality               = "";
$passport_no               = "";
$qatari_id                 = "";
$is_qatari                 = 0;
$passport_copy_attached    = 0;
$noc_required              = 0;
$noc_copy_attached         = 0;
$sponsors_id_copy_attached = 0;
$photo1_url					="";
$photo1_caption				="";
$photo2_url					="";
$photo2_caption				="";



if(isset($_POST['save'])){
echo "<pre>";	
	print_r($_POST);
	print_r($_SESSION);

echo "</pre>";
 
	$talent_id = "";
// add talent data
	$talent_id  = create_new_talent_record($_POST, $_SESSION['user_id']);

if( (is_int($talent_id)) AND ($talent_id > 0)){
 

	// redirect to step 2 of adding talent
	echo '<script>alert("Added Talent Successfully");</script>';
	echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/talent/edit_talent_profile&talent_id='.$talent_id.'");</script>';		
 
}
else
{
	// return the error message in a variable and display It
	echo '<script>alert("Failed!! Unable to Add Talent, Please Check Data");</script>';
	// convert post variables to variables and present them to client for review and re - submissin

	$first_name = $_POST['first_name'];
	$last_name  = $_POST['last_name'];
	$photo1_url	= $_POST['photo1_url'];
	$photo1_caption=$_POST['photo1_caption'];
	$photo2_url =$_POST['photo2_url'];
	$photo2_caption=$_POST['photo2_caption'];
	$dob        = $_POST['dob'];
	$sex        = $_POST['sex'];
	$address    = $_POST['address'];
	$mobile_no   = $_POST['mobile_no'];
	$email_id   = $_POST['email_id'];
	$nationality= $_POST['nationality'];
	$passport_no= $_POST['passport_no'];
	$qatari_id  = $_POST['qatari_id'];
	if(isset($_POST['is_qatari'])){
		$is_qatari = 1;
	} else {
		$is_qatari = 0;
	}
	if(isset($_POST['qatari_id_copy_attached'])){
		$qatari_id_copy_attached = 1;
	} else {
		$qatari_id_copy_attached = 0;
	}
	if(isset($_POST['passport_copy_attached'])){
		$passport_copy_attached = 1;
	} else {
		$passport_copy_attached = 0;
	}
	if(isset($_POST['noc_required'])){
		$noc_required = 1;
	} else {
		$noc_required = 0;
	}

	if(isset($_POST['noc_copy_attached'])){
		$noc_copy_attached = 1;
	} else {
		$noc_copy_attached = 0;
	}

	if(isset($_POST['sponsors_id_copy_attached'])){
		$sponsors_id_copy_attached = 1;
	} else {
		$sponsors_id_copy_attached = 0;
	}

}
}; // End if form submitted

	$talent_id = DB::insertId();
		//check if the file is uploaded and process the file if file is uploaded	
	
	if(!file_exists($_FILES['talent_photo1']['tmp_name']) || !is_uploaded_file($_FILES['talent_photo1']['tmp_name'])) {
		echo '<h2> No Photo uloaded</h2>';
	}  else {
		echo '<h2> Photo was uploaded</h2>';
	
	//if logo file is uploaded process the file with upload class
	
	$handle = new upload($_FILES['talent_photo1']);
		if ($handle->uploaded) {
			  $handle->file_new_name_body   = $talent_id.'_photo1';
			  $handle->image_resize         = true;
			  $handle->image_x              = 250;
			  $handle->image_ratio_y        = true;
			  $handle->allowed = array('image/*');
			  $handle->image_convert = 'jpg';
			  $handle->file_overwrite = true;
			  $handle->process('../uploads/talent_profiles/');
		if ($handle->processed) {
				
	// save uploaded file name and path in database table field logo_url
	
			$last_modified_by = $_SESSION['user_id'];
			$last_modified_on = getDateTime(NULL,"mySQL");
			
	/* if client id is not empty update the database */
	
		if($talent_id <> ""){
				$update = DB::update('tams_talent', array(

				'photo1_url'=> '/talent/uploads/talent_profiles/'.$talent_id.'_photo1.jpg',
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
			),
			"talent_id=%s", $talent_id
		);
		
		}
			echo 'Logo file uploaded and path select saved in database';
				$handle->clean();
			} else {
				echo 'error : ' . $handle->error;
				
			} // close handle processed
			
		} // close handle uploaded
		
		} // close file exist
function create_new_talent_record($data,$user_id)
{
	$talent_id = - 1;
	if($data){

		// Check submitted data and save them in variables
		
	$first_name = $data['first_name'];
	$last_name  = $data['last_name'];
	$photo1_url = $data['photo1_url'];
	$photo1_caption =$data['photo1_caption'];
	$photo2_url  =$data['photo2_url'];
	$photo2_caption=$data['photo2_caption'];
	$dob        = $data['dob'];
	$sex        = $data['sex'];
	$address    = $data['address'];
	$mobile_no   = $data['mobile_no'];
	$email_id   = $data['email_id'];
	$nationality= $data['nationality'];
	$passport_no= $data['passport_no'];
	$qatari_id  = $data['qatari_id'];
	$created_by = $user_id;
	$created_on = getDateTime(NULL ,"mySQL");
	$last_modified_by = $user_id;
	$last_modified_on = getDateTime(NULL ,"mySQL");
	
		// set on checkboxes to 1

		// set missing checkboxes to off or 0
	if(isset($data['is_qatari'])){
		$is_qatari = 1;
	} else {
		$is_qatari = 0;
	}
	if(isset($data['qatari_id_copy_attached'])){
		$qatari_id_copy_attached = 1;
	} else {
		$qatari_id_copy_attached = 0;
	}
	if(isset($data['passport_copy_attached'])){
		$passport_copy_attached = 1;
	} else {
		$passport_copy_attached = 0;
	}
	if(isset($data['noc_required'])){
		$noc_required = 1;
	} else {
		$noc_required = 0;
	}

	if(isset($data['noc_copy_attached'])){
		$noc_copy_attached = 1;
	} else {
		$noc_copy_attached = 0;
	}

	if(isset($data['sponsors_id_copy_attached'])){
		$sponsors_id_copy_attached = 1;
	} else {
		$sponsors_id_copy_attached = 0;
	}
		// Add data to database and get the new talentID
		//set profile status to draft
		DB::insert('tams_talent', array(
						'first_name' 		=> $first_name,						
						'last_name' 		=> $last_name,
						'photo1_url'		=> $photo1_url,
						'photo1_caption'	=> $photo1_caption,
						'photo2_url'		=> $photo2_url,
						'photo2_caption'	=> $photo2_caption,
						'dob' 				=> $dob,						
						'sex' 				=> $sex,						
						'address'	 		=> $address,						
						'mobile_no' 		=> $mobile_no,						
						'email_id' 			=> $email_id,
						'nationality'		=> $nationality,
						'is_qatari'			=> $is_qatari,
						'qatari_id'			=> $qatari_id,
						'qatari_id_copy_attached'=> $qatari_id_copy_attached,
						'noc_required'		=> $noc_required,
						'noc_copy_attached'	=> $noc_copy_attached,
						'passport_no'		=> $passport_no,
						'passport_copy_attached'=> $passport_copy_attached,
						'sponsors_id_copy_attached'=> $sponsors_id_copy_attached,
						'talent_status'		=> "draft",
						'created_by' 		=> $created_by,
						'created_on'	 	=> $created_on,
						'last_modified_by'	=> $last_modified_by,
						'last_modified_on'	=> $last_modified_on
						)	
			);

		// get the new $talent_id
		
		$talent_id = DB::insertId();
	
	}
	return $talent_id;


}







?>

<!--   Content Header (Page header) -->
<section class="content-header">
	<h1>
		Add New Talent

		<small>
			Creates a new Talent Profile
		</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="#">
				<i class="fa fa-dashboard">
				</i>Home
			</a>
		</li>
		<li class="active">
			Add New Talent
		</li>
	</ol>
</section>

<!-- Main content -->
<section                    class="content">
	<div class="row">

		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">
					Step 1 of 2 : Add Basic Talent Details
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
			<form id="add_talent_form" name="add_talent_form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/add_talent"; ?>" >
                <div class="container">
				<div class="box-body">
                    <div class="row">
						<div class="col-md-6">
							<h2  class="normal">
                              Add Photo Upload Fields
							  </h2>
							  <div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
							  photo 1:
							  </label>
							  <div class="col-md-9 col-sm-9">
							  <div class="input-group">
								<input   class="input-group form-control" type="file" value="" name="talent_photo1" id="talent_photo1"  >
								<img src="<?php echo $photo1_url; ?>" alt="no logo uploaded" />
							</div>
						</div>
					</div>
					
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Photo Caption:
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text" required
									 name="photo1_caption" id="photo1_caption" placeholder="Enter Photo Caption">
								</div>
							</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Photo 2 :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">
								<input   class="input-group form-control" type="file" value="" name="talent_photo2" id="talent_photo2"  >
								<img src="<?php echo $photo2_url; ?>" alt="no photo uploaded" />
							</div>
						</div>
					</div>
					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Photo Caption:
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text" required
									 name="photo2_caption" id="photo2_caption" placeholder="Enter Photo Caption">
								</div>
							</div>
						</div>
						
					<div class="row">
						<div class="col-md-6">
							<h2  class="normal">
								Basic Information
							</h2>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									First Name:
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text" required
									value="<?php echo $first_name; ?>" name="first_name" id="first_name" placeholder="Enter First Name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Last Name
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text" required placeholder="Enter Last Name"
									value="<?php echo $last_name; ?>" name="last_name" id="last_name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Date of Birth:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">

										<input   class="date input-group form-control"     type="date" required value="<?php echo $dob; ?>" name="dob" id="dob">
										<div class="input-group-addon">
											<i class="fa fa-calendar">
											</i>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Sex:
								</label>
								<div class="col-md-9 col-sm-9">
									<select id="sex" name="sex" class="form-control">
										<option value="">
											-Select gendar-
										</option>
										<option value="Male">
											Male
										</option>
										<option value="Female">
											Female
										</option>
									</select>
								</div>
							</div>
						</div><!-- /.col-md-6 -->
						
			      </div> <!-- /.row -->
					
					<div class="row">
						<div class="col-md-6">
							<h2  class="normal">
								Contact Information
							</h2>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Addresss:
								</label>
							<div class="col-md-9 col-sm-9">
									<textarea class="form-control" required value="" name="address" id="address" placeholder="Enter Address"><?php echo $address; ?>
									</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Mobile No
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<input class="form-control" type="tel" required placeholder="Enter Phone No" value="<?php echo $mobile_no; ?>" name="mobile_no" id="mobile_no">
										<div class="input-group-addon">
											<i class="fa fa-phone">
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

										<input   class="input-group email form-control"     type="email" required value="<?php echo $email_id; ?>" name="email_id" id="email_id"  placeholder="Enter email address">
										<div class="input-group-addon">
											<i class="fa fa-envelope">
											</i>
										</div>
									</div>
								</div>
							</div>


						</div><!-- /.col-md-6 -->

						<div class="col-md-6">
							<h2  class="normal">
							   Nationality
							</h2>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Nationality:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<select id="nationality" name="nationality" data-placeholder="Choose a Country..." class="form-control"   >
											<option value="">
											</option>
											<option value="Qatar">
												Qatar
											</option>
											<option value="Afghanistan">
												Afghanistan
											</option>
											<option value="Albania">
												Albania
											</option>
											<option value="Algeria">
												Algeria
											</option>
											<option value="American Samoa">
												American Samoa
											</option>
											<option value="Andorra">
												Andorra
											</option>
											<option value="Angola">
												Angola
											</option>
											<option value="Anguilla">
												Anguilla
											</option>
											<option value="Antarctica">
												Antarctica
											</option>
											<option value="Antigua and Barbuda">
												Antigua and Barbuda
											</option>
											<option value="Argentina">
												Argentina
											</option>
											<option value="Armenia">
												Armenia
											</option>
											<option value="Aruba">
												Aruba
											</option>
											<option value="Australia">
												Australia
											</option>
											<option value="Austria">
												Austria
											</option>
											<option value="Azerbaijan">
												Azerbaijan
											</option>
											<option value="Bahamas">
												Bahamas
											</option>
											<option value="Bahrain">
												Bahrain
											</option>
											<option value="Bangladesh">
												Bangladesh
											</option>
											<option value="Barbados">
												Barbados
											</option>
											<option value="Belarus">
												Belarus
											</option>
											<option value="Belgium">
												Belgium
											</option>
											<option value="Belize">
												Belize
											</option>
											<option value="Benin">
												Benin
											</option>
											<option value="Bermuda">
												Bermuda
											</option>
											<option value="Bhutan">
												Bhutan
											</option>
											<option value="Bolivia">
												Bolivia
											</option>
											<option value="Bosnia and Herzegovina">
												Bosnia and Herzegovina
											</option>
											<option value="Botswana">
												Botswana
											</option>
											<option value="Bouvet Island">
												Bouvet Island
											</option>
											<option value="Brazil">
												Brazil
											</option>
											<option value="British Indian Ocean Territory">
												British Indian Ocean Territory
											</option>
											<option value="Brunei Darussalam">
												Brunei Darussalam
											</option>
											<option value="Bulgaria">
												Bulgaria
											</option>
											<option value="Burkina Faso">
												Burkina Faso
											</option>
											<option value="Burundi">
												Burundi
											</option>
											<option value="Cambodia">
												Cambodia
											</option>
											<option value="Cameroon">
												Cameroon
											</option>
											<option value="Canada">
												Canada
											</option>
											<option value="Cape Verde">
												Cape Verde
											</option>
											<option value="Cayman Islands">
												Cayman Islands
											</option>
											<option value="Central African Republic">
												Central African Republic
											</option>
											<option value="Chad">
												Chad
											</option>
											<option value="Chile">
												Chile
											</option>
											<option value="China">
												China
											</option>
											<option value="Christmas Island">
												Christmas Island
											</option>
											<option value="Cocos (Keeling) Islands">
												Cocos (Keeling) Islands
											</option>
											<option value="Colombia">
												Colombia
											</option>
											<option value="Comoros">
												Comoros
											</option>
											<option value="Congo">
												Congo
											</option>
											<option value="Congo, The Democratic Republic of The">
												Congo, The Democratic Republic of The
											</option>
											<option value="Cook Islands">
												Cook Islands
											</option>
											<option value="Costa Rica">
												Costa Rica
											</option>
											<option value="Cote D'ivoire">
												Cote D'ivoire
											</option>
											<option value="Croatia">
												Croatia
											</option>
											<option value="Cuba">
												Cuba
											</option>
											<option value="Cyprus">
												Cyprus
											</option>
											<option value="Czech Republic">
												Czech Republic
											</option>
											<option value="Denmark">
												Denmark
											</option>
											<option value="Djibouti">
												Djibouti
											</option>
											<option value="Dominica">
												Dominica
											</option>
											<option value="Dominican Republic">
												Dominican Republic
											</option>
											<option value="Ecuador">
												Ecuador
											</option>
											<option value="Egypt">
												Egypt
											</option>
											<option value="El Salvador">
												El Salvador
											</option>
											<option value="Equatorial Guinea">
												Equatorial Guinea
											</option>
											<option value="Eritrea">
												Eritrea
											</option>
											<option value="Estonia">
												Estonia
											</option>
											<option value="Ethiopia">
												Ethiopia
											</option>
											<option value="Falkland Islands (Malvinas)">
												Falkland Islands (Malvinas)
											</option>
											<option value="Faroe Islands">
												Faroe Islands
											</option>
											<option value="Fiji">
												Fiji
											</option>
											<option value="Finland">
												Finland
											</option>
											<option value="France">
												France
											</option>
											<option value="French Guiana">
												French Guiana
											</option>
											<option value="French Polynesia">
												French Polynesia
											</option>
											<option value="French Southern Territories">
												French Southern Territories
											</option>
											<option value="Gabon">
												Gabon
											</option>
											<option value="Gambia">
												Gambia
											</option>
											<option value="Georgia">
												Georgia
											</option>
											<option value="Germany">
												Germany
											</option>
											<option value="Ghana">
												Ghana
											</option>
											<option value="Gibraltar">
												Gibraltar
											</option>
											<option value="Greece">
												Greece
											</option>
											<option value="Greenland">
												Greenland
											</option>
											<option value="Grenada">
												Grenada
											</option>
											<option value="Guadeloupe">
												Guadeloupe
											</option>
											<option value="Guam">
												Guam
											</option>
											<option value="Guatemala">
												Guatemala
											</option>
											<option value="Guinea">
												Guinea
											</option>
											<option value="Guinea-bissau">
												Guinea-bissau
											</option>
											<option value="Guyana">
												Guyana
											</option>
											<option value="Haiti">
												Haiti
											</option>
											<option value="Heard Island and Mcdonald Islands">
												Heard Island and Mcdonald Islands
											</option>
											<option value="Holy See (Vatican City State)">
												Holy See (Vatican City State)
											</option>
											<option value="Honduras">
												Honduras
											</option>
											<option value="Hong Kong">
												Hong Kong
											</option>
											<option value="Hungary">
												Hungary
											</option>
											<option value="Iceland">
												Iceland
											</option>
											<option value="India">
												India
											</option>
											<option value="Indonesia">
												Indonesia
											</option>
											<option value="Iran, Islamic Republic of">
												Iran, Islamic Republic of
											</option>
											<option value="Iraq">
												Iraq
											</option>
											<option value="Ireland">
												Ireland
											</option>
											<option value="Israel">
												Israel
											</option>
											<option value="Italy">
												Italy
											</option>
											<option value="Jamaica">
												Jamaica
											</option>
											<option value="Japan">
												Japan
											</option>
											<option value="Jordan">
												Jordan
											</option>
											<option value="Kazakhstan">
												Kazakhstan
											</option>
											<option value="Kenya">
												Kenya
											</option>
											<option value="Kiribati">
												Kiribati
											</option>
											<option value="Korea, Democratic People's Republic of">
												Korea, Democratic People's Republic of
											</option>
											<option value="Korea, Republic of">
												Korea, Republic of
											</option>
											<option value="Kuwait">
												Kuwait
											</option>
											<option value="Kyrgyzstan">
												Kyrgyzstan
											</option>
											<option value="Lao People's Democratic Republic">
												Lao People's Democratic Republic
											</option>
											<option value="Latvia">
												Latvia
											</option>
											<option value="Lebanon">
												Lebanon
											</option>
											<option value="Lesotho">
												Lesotho
											</option>
											<option value="Liberia">
												Liberia
											</option>
											<option value="Libyan Arab Jamahiriya">
												Libyan Arab Jamahiriya
											</option>
											<option value="Liechtenstein">
												Liechtenstein
											</option>
											<option value="Lithuania">
												Lithuania
											</option>
											<option value="Luxembourg">
												Luxembourg
											</option>
											<option value="Macao">
												Macao
											</option>
											<option value="Macedonia, The Former Yugoslav Republic of">
												Macedonia, The Former Yugoslav Republic of
											</option>
											<option value="Madagascar">
												Madagascar
											</option>
											<option value="Malawi">
												Malawi
											</option>
											<option value="Malaysia">
												Malaysia
											</option>
											<option value="Maldives">
												Maldives
											</option>
											<option value="Mali">
												Mali
											</option>
											<option value="Malta">
												Malta
											</option>
											<option value="Marshall Islands">
												Marshall Islands
											</option>
											<option value="Martinique">
												Martinique
											</option>
											<option value="Mauritania">
												Mauritania
											</option>
											<option value="Mauritius">
												Mauritius
											</option>
											<option value="Mayotte">
												Mayotte
											</option>
											<option value="Mexico">
												Mexico
											</option>
											<option value="Micronesia, Federated States of">
												Micronesia, Federated States of
											</option>
											<option value="Moldova, Republic of">
												Moldova, Republic of
											</option>
											<option value="Monaco">
												Monaco
											</option>
											<option value="Mongolia">
												Mongolia
											</option>
											<option value="Montenegro">
												Montenegro
											</option>
											<option value="Montserrat">
												Montserrat
											</option>
											<option value="Morocco">
												Morocco
											</option>
											<option value="Mozambique">
												Mozambique
											</option>
											<option value="Myanmar">
												Myanmar
											</option>
											<option value="Namibia">
												Namibia
											</option>
											<option value="Nauru">
												Nauru
											</option>
											<option value="Nepal">
												Nepal
											</option>
											<option value="Netherlands">
												Netherlands
											</option>
											<option value="Netherlands Antilles">
												Netherlands Antilles
											</option>
											<option value="New Caledonia">
												New Caledonia
											</option>
											<option value="New Zealand">
												New Zealand
											</option>
											<option value="Nicaragua">
												Nicaragua
											</option>
											<option value="Niger">
												Niger
											</option>
											<option value="Nigeria">
												Nigeria
											</option>
											<option value="Niue">
												Niue
											</option>
											<option value="Norfolk Island">
												Norfolk Island
											</option>
											<option value="Northern Mariana Islands">
												Northern Mariana Islands
											</option>
											<option value="Norway">
												Norway
											</option>
											<option value="Oman">
												Oman
											</option>
											<option value="Pakistan">
												Pakistan
											</option>
											<option value="Palau">
												Palau
											</option>
											<option value="Palestinian Territory, Occupied">
												Palestinian Territory, Occupied
											</option>
											<option value="Panama">
												Panama
											</option>
											<option value="Papua New Guinea">
												Papua New Guinea
											</option>
											<option value="Paraguay">
												Paraguay
											</option>
											<option value="Peru">
												Peru
											</option>
											<option value="Philippines">
												Philippines
											</option>
											<option value="Pitcairn">
												Pitcairn
											</option>
											<option value="Poland">
												Poland
											</option>
											<option value="Portugal">
												Portugal
											</option>
											<option value="Puerto Rico">
												Puerto Rico
											</option>
											<option value="Qatar">
												Qatar
											</option>
											<option value="Reunion">
												Reunion
											</option>
											<option value="Romania">
												Romania
											</option>
											<option value="Russian Federation">
												Russian Federation
											</option>
											<option value="Rwanda">
												Rwanda
											</option>
											<option value="Saint Helena">
												Saint Helena
											</option>
											<option value="Saint Kitts and Nevis">
												Saint Kitts and Nevis
											</option>
											<option value="Saint Lucia">
												Saint Lucia
											</option>
											<option value="Saint Pierre and Miquelon">
												Saint Pierre and Miquelon
											</option>
											<option value="Saint Vincent and The Grenadines">
												Saint Vincent and The Grenadines
											</option>
											<option value="Samoa">
												Samoa
											</option>
											<option value="San Marino">
												San Marino
											</option>
											<option value="Sao Tome and Principe">
												Sao Tome and Principe
											</option>
											<option value="Saudi Arabia">
												Saudi Arabia
											</option>
											<option value="Senegal">
												Senegal
											</option>
											<option value="Serbia">
												Serbia
											</option>
											<option value="Seychelles">
												Seychelles
											</option>
											<option value="Sierra Leone">
												Sierra Leone
											</option>
											<option value="Singapore">
												Singapore
											</option>
											<option value="Slovakia">
												Slovakia
											</option>
											<option value="Slovenia">
												Slovenia
											</option>
											<option value="Solomon Islands">
												Solomon Islands
											</option>
											<option value="Somalia">
												Somalia
											</option>
											<option value="South Africa">
												South Africa
											</option>
											<option value="South Georgia and The South Sandwich Islands">
												South Georgia and The South Sandwich Islands
											</option>
											<option value="South Sudan">
												South Sudan
											</option>
											<option value="Spain">
												Spain
											</option>
											<option value="Sri Lanka">
												Sri Lanka
											</option>
											<option value="Sudan">
												Sudan
											</option>
											<option value="Suriname">
												Suriname
											</option>
											<option value="Svalbard and Jan Mayen">
												Svalbard and Jan Mayen
											</option>
											<option value="Swaziland">
												Swaziland
											</option>
											<option value="Sweden">
												Sweden
											</option>
											<option value="Switzerland">
												Switzerland
											</option>
											<option value="Syrian Arab Republic">
												Syrian Arab Republic
											</option>
											<option value="Taiwan, Republic of China">
												Taiwan, Republic of China
											</option>
											<option value="Tajikistan">
												Tajikistan
											</option>
											<option value="Tanzania, United Republic of">
												Tanzania, United Republic of
											</option>
											<option value="Thailand">
												Thailand
											</option>
											<option value="Timor-leste">
												Timor-leste
											</option>
											<option value="Togo">
												Togo
											</option>
											<option value="Tokelau">
												Tokelau
											</option>
											<option value="Tonga">
												Tonga
											</option>
											<option value="Trinidad and Tobago">
												Trinidad and Tobago
											</option>
											<option value="Tunisia">
												Tunisia
											</option>
											<option value="Turkey">
												Turkey
											</option>
											<option value="Turkmenistan">
												Turkmenistan
											</option>
											<option value="Turks and Caicos Islands">
												Turks and Caicos Islands
											</option>
											<option value="Tuvalu">
												Tuvalu
											</option>
											<option value="Uganda">
												Uganda
											</option>
											<option value="Ukraine">
												Ukraine
											</option>
											<option value="United Arab Emirates">
												United Arab Emirates
											</option>
											<option value="United Kingdom">
												United Kingdom
											</option>
											<option value="United States">
												United States
											</option>
											<option value="United States Minor Outlying Islands">
												United States Minor Outlying Islands
											</option>
											<option value="Uruguay">
												Uruguay
											</option>
											<option value="Uzbekistan">
												Uzbekistan
											</option>
											<option value="Vanuatu">
												Vanuatu
											</option>
											<option value="Venezuela">
												Venezuela
											</option>
											<option value="Viet Nam">
												Viet Nam
											</option>
											<option value="Virgin Islands, British">
												Virgin Islands, British
											</option>
											<option value="Virgin Islands, U.S.">
												Virgin Islands, U.S.
											</option>
											<option value="Wallis and Futuna">
												Wallis and Futuna
											</option>
											<option value="Western Sahara">
												Western Sahara
											</option>
											<option value="Yemen">
												Yemen
											</option>
											<option value="Zambia">
												Zambia
											</option>
											<option value="Zimbabwe">
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
									Passport No:
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text"
									value="<?php echo $passport_no; ?>" name="passport_no" id="passport_no" placeholder="Enter Passport No">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Qatari ID:
								</label>
								<div class="col-md-9 col-sm-9">
									<input class="form-control" type="text"  placeholder="Enter Qatari ID"
									value="<?php echo $qatari_id; ?>" name="qatari_id" id="qatari_id">
								</div>
							</div>


						</div><!-- /.col-md-6 -->

						</div>
						
<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="talent_form_step_1" />
<!-- /Hidden Fields -->

					</div> <!-- /.row -->
				</div><!-- /.box-body -->
				<div class="form-group">
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/talent/view_talents"?>">
							Cancel &nbsp;
							<i class="fa fa-chevron-circle-right">
							</i>
						</a>
						<button style="margin-right:10px;" type="submit" class='btn btn-success btn-lg pull-right' name="save" value="save">
							Save & Continue &nbsp;
							<i class="fa fa-chevron-circle-right">
							</i>
						</button>
					</div>	<!-- /.col -->
				</div>		<!-- /form-group -->
			</form>
			<div class="box-footer">
				<small>
				</small>
			</div><!-- /.box-footer-->
		</div><!-- /.box -->



	</div><!-- /.row -->

</section><!--  /.content -->