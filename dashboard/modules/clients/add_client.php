<?php
if (isset($_POST['save'])){
	
	$company_name = $_POST['company_name'];
	$logo_url =$_POST['logo_url'];
	$client_name	= $_POST['client_name'];
	$client_title =$_POST['client_title'];
	$client_address = $_POST['client_address'];
	$client_city = $_POST['client_city'];
	$client_country = $_POST['client_country'];
	$client_phone_1 = $_POST['client_phone_1'];
	$client_phone_2= $_POST['client_phone_2'];
	$client_fax = $_POST['client_fax'];
	$client_email = $_POST['client_email'];
	$client_account_manager = $_POST['client_account_manager']; 
	$client_status = $_POST['client_status']; 
	$created_by = $_SESSION['user_id'];
	$created_on = getDateTime(NULL ,"mySQL");
	$last_modified_by = $_SESSION['user_id'];
	$last_modified_on = getDateTime(NULL ,"mySQL");
	
	$client_name_exists = 0;
	if (client_name_exist($client_name)){
		$client_name_exists  = -1;
		
	}
	if(($client_name_exists <> -1) AND ($client_name <> "" )  ){
	DB::insert('tams_clients', array(
				'company_name'	=> $company_name,
				'logo_url' => $logo_url,
				'client_name' 		=> $client_name,
				'client_title' => $client_title,
				'client_address'=> $client_address,
				'client_city' => $client_city,
				'client_country' => $client_country,
				'client_phone_1'=> $client_phone_1,
				'client_phone_2'=> $client_phone_2,
				'client_fax'=> $client_fax,
				'client_email'=> $client_email,	
				'client_account_manager'=> $client_account_manager,	
				'client_status'=> $client_status,
				'created_by' 		=> $created_by,
				'created_on'	 	=> $created_on,
				'last_modified_by'	=> $last_modified_by,
				'last_modified_on'	=> $last_modified_on
				
			)
			);
	echo '<script>alert("Added Client Successfully");</script>';
	echo '<script>window.location.replace("'.$_SERVER['PHP_SELF'].'?route=modules/clients/view_clients");</script>';		
		}
	else
	{	
		echo '<script>alert("Failed!! Client Might Already Exist");</script>';
		
		}
}
?>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
          System Settings
            <small>Add Client Setup</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="index.php">Dashboard</a></li>
            <li class="active">Add Client </li>
          </ol>
        </section>
		
<!-- Main content -->
        <section class="content">
			<div class="row">
<form role="form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']."?route=modules/clients/add_client"; ?>" >
 <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add a Client</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
 
            
                  <div class="box-body" >
				    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Company Name:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Enter Company Name"
							 value="" name="company_name" id="company_name">							
						  </div>
					</div>
					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Company Logo URL :
						</label>
						<div class="col-md-9 col-sm-9">
							<div class="input-group">
								<input   class="input-group form-control"   placeholder="Enter Company Logo URL"   type="url"  value="" name="logo_url" id="logo_url"  >
								<div class="input-group-addon">
									<i class="fa fa-user">
									</i>
								</div>
							</div>
						</div>
					</div>							
				  
                    <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Contact Person Name:</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Enter Contact Person Name"
							 value="" name="client_name" id="client_name">							
						  </div>
					</div>
					
					 <div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label"> Title / Position :</label>
						  <div class="col-md-9 col-sm-9">
							 <input class="form-control" type="text" required placeholder="Enter title/position of client"
							 value="" name="client_title" id="client_title">							
						  </div>
					</div>

					<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Address:
								</label>
								<div class="col-md-9 col-sm-9">
									<textarea class="form-control" required placeholder="Enter Address" value="" name="client_address" id="client_address" >
									</textarea>
								</div>
					</div>
					
					<div class="form-group"  >
						<label class="col-md-3 col-sm-3 control-label">
							City:
						</label>
						<div class="col-md-9 col-sm-9">
							<input class="form-control" type="text" required  value="" name="client_city" id="client_city" placeholder="Enter City Name">
						</div>
					</div>
					
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Country:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<select id="client_country" name="client_country" data-placeholder="Choose a Country..." class="form-control"   >
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
									Phone No 1:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<input class="form-control" type="tel" required placeholder="Enter Phone No" value="" name="client_phone_1" id="client_phone_1">
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
										<input class="form-control" type="tel" required placeholder="Enter Phone No" value="" name="client_phone_2" id="client_phone_2">
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
										<input class="form-control" type="tel" required placeholder="Enter Fax No" value="" name="client_fax" id="client_fax">
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

										<input   class="input-group email form-control"     type="email" required value="" name="client_email" id="client_email"  placeholder="Enter email address">
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
							 <input class="form-control" type="text" required placeholder="Enter Account Manager Name"
							 value="" name="client_account_manager" id="client_account_manager">							
						  </div>
					</div>

					<div class="form-group">
						<label class="col-md-3 col-sm-3 control-label">
							Client Status:
						</label>
						<div class="col-md-9 col-sm-9">
							<select id="client_status" name="client_status" class="form-control">

								<option value="active" selected="selected">
									Active
								</option>
								<option value="disabled"   >
									Disabled
								</option>
							</select>
						</div>
					</div>
 
					<!-- Hidden Fields -->
					<input type="hidden" name="form_name" id="form_name" value="add_client_form" />
					<input type="hidden" name="auth_code" id="auth_code" value="7445211" />
					<!-- /Hidden Fields -->


				</div><!-- /.box-body -->
				<div class="form-group">
					<div class="col-sm-12">
						<a style="margin-right:10px;" class='btn btn-danger btn-lg pull-right' href="<?php echo $_SERVER['PHP_SELF']."?route=modules/clients/view_clients"?>">
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
			</form>
			<div class="box-footer">
				<small>
				</small>
			</div><!-- /.box-footer-->
		</div><!-- /.box -->
	</div><!-- /.row -->

</section><!-- /.content -->	