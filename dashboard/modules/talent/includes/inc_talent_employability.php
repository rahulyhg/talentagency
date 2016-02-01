<?php

?>	
<form id="edit_talent_employability_info" name="edit_talent_employability_info" class="form-horizontal" method="post" action="process_talent_forms.php?talent_id="<?php echo $talent_id; ?>" >	
<!-- Employability Information box -->       			
       		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> 
              	Employability Information
              	 </h3>
              <div class="box-tools pull-right">
              		<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button>
              		<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <div class="box-body bg-info">
            <div class="row">
  					
							<div class="tab-pane active" id="employability">
							    <h3 class="normal"> Nationality
								</h3>
				
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Nationality:
								</label>
								<div class="col-md-9 col-sm-9">
									<div class="input-group">
										<select id="nationality" name="nationality" class="form-control" >
											<option value="">
											</option>
											<option value="Qatar" <?php if($nationality == "Qatar"){ echo 'selected = "selected" ';}?> >
												Qatar
											</option>
											<option value="Afghanistan" <?php if($nationality == "Afghanistan"){ echo 'selected = "selected" ';} ?>>
												Afghanistan
											</option>
											<option value="Albania" <?php if($nationality == "Albania"){ echo 'selected = "selected" ';} ?>>
												Albania
											</option>
											<option value="Algeria" <?php if($nationality == "Algeria"){ echo 'selected = "selected" ';} ?>>
												Algeria
											</option>
											<option value="American Samoa" <?php if($nationality == "American Samoa"){ echo 'selected = "selected" ';} ?>>
												American Samoa
											</option>
											<option value="Andorra" <?php if($nationality == "Andorra"){ echo 'selected = "selected" ';} ?>>
												Andorra
											</option>
											<option value="Angola" <?php if($nationality == "Angola"){ echo 'selected = "selected" ';} ?>>
												Angola
											</option>
											<option value="Anguilla" <?php if($nationality == "Anguilla"){ echo 'selected = "selected" ';} ?>>
												Anguilla
											</option>
											<option value="Antarctica" <?php if($nationality == "Antarctica"){ echo 'selected = "selected" ';} ?>>
												Antarctica
											</option>
											<option value="Antigua and Barbuda" <?php if($nationality == "Antigua and Barbuda"){ echo 'selected = "selected" ';} ?>>
												Antigua and Barbuda
											</option>
											<option value="Argentina" <?php if($nationality == "Argentina"){ echo 'selected = "selected" ';} ?>>
												Argentina
											</option>
											<option value="Armenia" <?php if($nationality == "Armenia"){ echo 'selected = "selected" ';} ?>>
												Armenia
											</option>
											<option value="Aruba" <?php if($nationality == "Aruba"){ echo 'selected = "selected" ';} ?>>
												Aruba
											</option>
											<option value="Australia" <?php if($nationality == "Australia"){ echo 'selected = "selected" ';} ?>>
												Australia
											</option>
											<option value="Austria" <?php if($nationality == "Austria"){ echo 'selected = "selected" ';} ?>>
												Austria
											</option>
											<option value="Azerbaijan" <?php if($nationality == "Azerbaijan"){ echo 'selected = "selected" ';} ?>>
												Azerbaijan
											</option>
											<option value="Bahamas" <?php if($nationality == "Bahamas"){ echo 'selected = "selected" ';} ?>>
												Bahamas
											</option>
											<option value="Bahrain" <?php if($nationality == "Bahrain"){ echo 'selected = "selected" ';} ?>>
												Bahrain
											</option>
											<option value="Bangladesh" <?php if($nationality == "Bangladesh"){ echo 'selected = "selected" ';} ?>>
												Bangladesh
											</option>
											<option value="Barbados" <?php if($nationality == "Barbados"){ echo 'selected = "selected" ';} ?>>
												Barbados
											</option>
											<option value="Belarus" <?php if($nationality == "Belarus"){ echo 'selected = "selected" ';} ?>>
												Belarus
											</option>
											<option value="Belgium" <?php if($nationality == "Belgium"){ echo 'selected = "selected" ';} ?>>
												Belgium
											</option>
											<option value="Belize" <?php if($nationality == "Belize"){ echo 'selected = "selected" ';} ?>>
												Belize
											</option>
											<option value="Benin" <?php if($nationality == "Benin"){ echo 'selected = "selected" ';} ?>>
												Benin
											</option>
											<option value="Bermuda" <?php if($nationality == "Bermuda"){ echo 'selected = "selected" ';} ?>>
												Bermuda
											</option>
											<option value="Bhutan" <?php if($nationality == "Bhutan"){ echo 'selected = "selected" ';} ?>>
												Bhutan
											</option>
											<option value="Bolivia" <?php if($nationality == "Bolivia"){ echo 'selected = "selected" ';} ?>>
												Bolivia
											</option>
											<option value="Bosnia and Herzegovina" <?php if($nationality == "Bosnia and Herzegovina"){ echo 'selected = "selected" ';} ?>>
												Bosnia and Herzegovina
											</option>
											<option value="Botswana" <?php if($nationality == "Botswana"){ echo 'selected = "selected" ';} ?>>
												Botswana
											</option>
											<option value="Bouvet Island" <?php if($nationality == "Bouvet Island"){ echo 'selected = "selected" ';} ?>>
												Bouvet Island
											</option>
											<option value="Brazil" <?php if($nationality == "Brazil"){ echo 'selected = "selected" ';} ?>>
												Brazil
											</option>
											<option value="British Indian Ocean Territory" <?php if($nationality == "British Indian Ocean Territory"){ echo 'selected = "selected" ';} ?>>
												British Indian Ocean Territory
											</option>
											<option value="Brunei Darussalam" <?php if($nationality == "Brunei Darussalam"){ echo 'selected = "selected" ';} ?>>
												Brunei Darussalam
											</option>
											<option value="Bulgaria" <?php if($nationality == "Bulgaria"){ echo 'selected = "selected" ';} ?>>
												Bulgaria
											</option>
											<option value="Burkina Faso" <?php if($nationality == "Burkina Faso"){ echo 'selected = "selected" ';} ?>>
												Burkina Faso
											</option>
											<option value="Burundi" <?php if($nationality == "Burundi"){ echo 'selected = "selected" ';} ?>>
												Burundi
											</option>
											<option value="Cambodia" <?php if($nationality == "Cambodia"){ echo 'selected = "selected" ';} ?>>
												Cambodia
											</option>
											<option value="Cameroon" <?php if($nationality == "Cameroon"){ echo 'selected = "selected" ';} ?>>
												Cameroon
											</option>
											<option value="Canada" <?php if($nationality == "Canada"){ echo 'selected = "selected" ';} ?>>
												Canada
											</option>
											<option value="Cape Verde" <?php if($nationality == "Cape Verde"){ echo 'selected = "selected" ';} ?>>
												Cape Verde
											</option>
											<option value="Cayman Islands" <?php if($nationality == "Cayman Islands"){ echo 'selected = "selected" ';} ?>>
												Cayman Islands
											</option>
											<option value="Central African Republic" <?php if($nationality == "Central African Republic"){ echo 'selected = "selected" ';} ?>>
												Central African Republic
											</option>
											<option value="Chad" <?php if($nationality == "Chad"){ echo 'selected = "selected" ';} ?>>
												Chad
											</option>
											<option value="Chile" <?php if($nationality == "Chile"){ echo 'selected = "selected" ';} ?>>
												Chile
											</option>
											<option value="China" <?php if($nationality == "China"){ echo 'selected = "selected" ';} ?>>
												China
											</option>
											<option value="Christmas Island" <?php if($nationality == "Christmas Island"){ echo 'selected = "selected" ';} ?>>
												Christmas Island
											</option>
											<option value="Cocos (Keeling) Islands" <?php if($nationality == "Cocos (Keeling) Islands"){ echo 'selected = "selected" ';} ?>>
												Cocos (Keeling) Islands
											</option>
											<option value="Colombia" <?php if($nationality == "Colombia"){ echo 'selected = "selected" ';} ?>>
												Colombia
											</option>
											<option value="Comoros" <?php if($nationality == "Comoros"){ echo 'selected = "selected" ';} ?>>
												Comoros
											</option>
											<option value="Congo" <?php if($nationality == "Congo"){ echo 'selected = "selected" ';} ?>>
												Congo
											</option>
											<option value="Congo, The Democratic Republic of The" <?php if($nationality == "Congo, The Democratic Republic of The"){ echo 'selected = "selected" ';} ?>>
												Congo, The Democratic Republic of The
											</option>
											<option value="Cook Islands" <?php if($nationality == "Cook Islands"){ echo 'selected = "selected" ';} ?>>
												Cook Islands
											</option>
											<option value="Costa Rica" <?php if($nationality == "Costa Rica"){ echo 'selected = "selected" ';} ?>>
												Costa Rica
											</option>
											<option value="Cote D'ivoire" <?php if($nationality == "Cote D'ivoire"){ echo 'selected = "selected" ';} ?>>
												Cote D'ivoire
											</option>
											<option value="Croatia" <?php if($nationality == "Croatia"){ echo 'selected = "selected" ';} ?>>
												Croatia
											</option>
											<option value="Cuba" <?php if($nationality == "Cuba"){ echo 'selected = "selected" ';} ?>>
												Cuba
											</option>
											<option value="Cyprus" <?php if($nationality == "Cyprus"){ echo 'selected = "selected" ';} ?>>
												Cyprus
											</option>
											<option value="Czech Republic" <?php if($nationality == "Czech Republic"){ echo 'selected = "selected" ';} ?>>
												Czech Republic
											</option>
											<option value="Denmark" <?php if($nationality == "Denmark"){ echo 'selected = "selected" ';} ?>>
												Denmark
											</option>
											<option value="Djibouti" <?php if($nationality == "Djibouti"){ echo 'selected = "selected" ';} ?>>
												Djibouti
											</option>
											<option value="Dominica" <?php if($nationality == "Dominica"){ echo 'selected = "selected" ';} ?>>
												Dominica
											</option>
											<option value="Dominican Republic" <?php if($nationality == "Dominican Republic"){ echo 'selected = "selected" ';} ?>>
												Dominican Republic
											</option>
											<option value="Ecuador" <?php if($nationality == "Ecuador"){ echo 'selected = "selected" ';} ?>>
												Ecuador
											</option>
											<option value="Egypt" <?php if($nationality == "Egypt"){ echo 'selected = "selected" ';} ?>>
												Egypt
											</option>
											<option value="El Salvador" <?php if($nationality == "El Salvador"){ echo 'selected = "selected" ';} ?>>
												El Salvador
											</option>
											<option value="Equatorial Guinea" <?php if($nationality == "Equatorial Guinea"){ echo 'selected = "selected" ';} ?>>
												Equatorial Guinea
											</option>
											<option value="Eritrea" <?php if($nationality == "Eritrea"){ echo 'selected = "selected" ';} ?>>
												Eritrea
											</option>
											<option value="Estonia" <?php if($nationality == "Estonia"){ echo 'selected = "selected" ';} ?>>
												Estonia
											</option>
											<option value="Ethiopia" <?php if($nationality == "Ethiopia"){ echo 'selected = "selected" ';} ?>>
												Ethiopia
											</option>
											<option value="Falkland Islands (Malvinas)" <?php if($nationality == "Falkland Islands (Malvinas)"){ echo 'selected = "selected" ';} ?>>
												Falkland Islands (Malvinas)
											</option>
											<option value="Faroe Islands" <?php if($nationality == "Faroe Islands"){ echo 'selected = "selected" ';} ?>>
												Faroe Islands
											</option>
											<option value="Fiji" <?php if($nationality == "Fiji"){ echo 'selected = "selected" ';} ?>>
												Fiji
											</option>
											<option value="Finland" <?php if($nationality == "Finland"){ echo 'selected = "selected" ';} ?>>
												Finland
											</option>
											<option value="France" <?php if($nationality == "France"){ echo 'selected = "selected" ';} ?>>
												France
											</option>
											<option value="French Guiana" <?php if($nationality == "French Guiana"){ echo 'selected = "selected" ';} ?>>
												French Guiana
											</option>
											<option value="French Polynesia" <?php if($nationality == "French Polynesia"){ echo 'selected = "selected" ';} ?>>
												French Polynesia
											</option>
											<option value="French Southern Territories" <?php if($nationality == "French Southern Territories"){ echo 'selected = "selected" ';} ?>>
												French Southern Territories
											</option>
											<option value="Gabon" <?php if($nationality == "Gabon"){ echo 'selected = "selected" ';} ?>>
												Gabon
											</option>
											<option value="Gambia" <?php if($nationality == "Gambia"){ echo 'selected = "selected" ';} ?>>
												Gambia
											</option>
											<option value="Georgia" <?php if($nationality == "Georgia"){ echo 'selected = "selected" ';} ?>>
												Georgia
											</option>
											<option value="Germany" <?php if($nationality == "Germany"){ echo 'selected = "selected" ';} ?>>
												Germany
											</option>
											<option value="Ghana" <?php if($nationality == "Ghana"){ echo 'selected = "selected" ';} ?>>
												Ghana
											</option>
											<option value="Gibraltar" <?php if($nationality == "Gibraltar"){ echo 'selected = "selected" ';} ?>>
												Gibraltar
											</option>
											<option value="Greece" <?php if($nationality == "Greece"){ echo 'selected = "selected" ';} ?>>
												Greece
											</option>
											<option value="Greenland" <?php if($nationality == "Greenland"){ echo 'selected = "selected" ';} ?>>
												Greenland
											</option>
											<option value="Grenada" <?php if($nationality == "Grenada"){ echo 'selected = "selected" ';} ?>>
												Grenada
											</option>
											<option value="Guadeloupe" <?php if($nationality == "Guadeloupe"){ echo 'selected = "selected" ';} ?>>
												Guadeloupe
											</option>
											<option value="Guam" <?php if($nationality == "Guam"){ echo 'selected = "selected" ';} ?>>
												Guam
											</option>
											<option value="Guatemala"<?php if($nationality == "Guatemala"){ echo 'selected = "selected" ';} ?>>
												Guatemala
											</option>
											<option value="Guinea" <?php if($nationality == "Guinea"){ echo 'selected = "selected" ';} ?>>
												Guinea
											</option>
											<option value="Guinea-bissau" <?php if($nationality == "Guinea-bissau"){ echo 'selected = "selected" ';} ?>>
												Guinea-bissau
											</option>
											<option value="Guyana" <?php if($nationality == "Guyana"){ echo 'selected = "selected" ';} ?>>
												Guyana
											</option>
											<option value="Haiti" <?php if($nationality == "Haiti"){ echo 'selected = "selected" ';} ?>>
												Haiti
											</option>
											<option value="Heard Island and Mcdonald Islands" <?php if($nationality == "Heard Island and Mcdonald Islands"){ echo 'selected = "selected" ';} ?>>
												Heard Island and Mcdonald Islands
											</option>
											<option value="Holy See (Vatican City State)" <?php if($nationality == "Holy See (Vatican City State)"){ echo 'selected = "selected" ';} ?>>
												Holy See (Vatican City State)
											</option>
											<option value="Honduras" <?php if($nationality == "Honduras"){ echo 'selected = "selected" ';} ?>>
												Honduras
											</option>
											<option value="Hong Kong" <?php if($nationality == "Hong Kong"){ echo 'selected = "selected" ';} ?>>
												Hong Kong
											</option>
											<option value="Hungary" <?php if($nationality == "Hungary"){ echo 'selected = "selected" ';} ?>>
												Hungary
											</option>
											<option value="Iceland" <?php if($nationality == "Iceland"){ echo 'selected = "selected" ';} ?>>
												Iceland
											</option>
											<option value="India" <?php if($nationality == "India"){ echo 'selected = "selected" ';} ?>>
												India
											</option>
											<option value="Indonesia" <?php if($nationality == "Indonesia"){ echo 'selected = "selected" ';} ?>>
												Indonesia
											</option>
											<option value="Iran, Islamic Republic of" <?php if($nationality == "Iran, Islamic Republic of"){ echo 'selected = "selected" ';} ?>>
												Iran, Islamic Republic of
											</option>
											<option value="Iraq" <?php if($nationality == "Iraq"){ echo 'selected = "selected" ';} ?>>
												Iraq
											</option>
											<option value="Ireland" <?php if($nationality == "Ireland"){ echo 'selected = "selected" ';} ?>>
												Ireland
											</option>
											<option value="Israel" <?php if($nationality == "Israel"){ echo 'selected = "selected" ';} ?>>
												Israel
											</option>
											<option value="Italy" <?php if($nationality == "Italy"){ echo 'selected = "selected" ';} ?>>
												Italy
											</option>
											<option value="Jamaica" <?php if($nationality == "Jamaica"){ echo 'selected = "selected" ';} ?>>
												Jamaica
											</option>
											<option value="Japan" <?php if($nationality == "Japan"){ echo 'selected = "selected" ';} ?>>
												Japan
											</option>
											<option value="Jordan" <?php if($nationality == "Jordan"){ echo 'selected = "selected" ';} ?>>
												Jordan
											</option>
											<option value="Kazakhstan" <?php if($nationality == "Kazakhstan"){ echo 'selected = "selected" ';} ?>>
												Kazakhstan
											</option>
											<option value="Kenya" <?php if($nationality == "Kenya"){ echo 'selected = "selected" ';} ?>>
												Kenya
											</option>
											<option value="Kiribati" <?php if($nationality == "Kiribati"){ echo 'selected = "selected" ';} ?>>
												Kiribati
											</option>
											<option value="Korea, Democratic People's Republic of" <?php if($nationality == "Korea, Democratic People's Republic of"){ echo 'selected = "selected" ';} ?>>
												Korea, Democratic People's Republic of
											</option>
											<option value="Korea, Republic of" <?php if($nationality == "Korea, Republic of"){ echo 'selected = "selected" ';} ?>>
												Korea, Republic of
											</option>
											<option value="Kuwait" <?php if($nationality == "Kuwait"){ echo 'selected = "selected" ';} ?>>
												Kuwait
											</option>
											<option value="Kyrgyzstan" <?php if($nationality == "Kyrgyzstan"){ echo 'selected = "selected" ';} ?>>
												Kyrgyzstan
											</option>
											<option value="Lao People's Democratic Republic" <?php if($nationality == "Lao People's Democratic Republic"){ echo 'selected = "selected" ';} ?>>
												Lao People's Democratic Republic
											</option>
											<option value="Latvia" <?php if($nationality == "Latvia"){ echo 'selected = "selected" ';} ?>>
												Latvia
											</option>
											<option value="Lebanon" <?php if($nationality == "Lebanon"){ echo 'selected = "selected" ';} ?>>
												Lebanon
											</option>
											<option value="Lesotho" <?php if($nationality == "Lesotho"){ echo 'selected = "selected" ';} ?>>
												Lesotho
											</option>
											<option value="Liberia" <?php if($nationality == "Liberia"){ echo 'selected = "selected" ';} ?>>
												Liberia
											</option>
											<option value="Libyan Arab Jamahiriya" <?php if($nationality == "Libyan Arab Jamahiriya"){ echo 'selected = "selected" ';} ?>>
												Libyan Arab Jamahiriya
											</option>
											<option value="Liechtenstein" <?php if($nationality == "Liechtenstein"){ echo 'selected = "selected" ';} ?>>
												Liechtenstein
											</option>
											<option value="Lithuania" <?php if($nationality == "Lithuania"){ echo 'selected = "selected" ';} ?>>
												Lithuania
											</option>
											<option value="Luxembourg" <?php if($nationality == "Luxembourg"){ echo 'selected = "selected" ';} ?>>
												Luxembourg
											</option>
											<option value="Macao" <?php if($nationality == "Macao"){ echo 'selected = "selected" ';} ?>>
												Macao
											</option>
											<option value="Macedonia, The Former Yugoslav Republic of" <?php if($nationality == "Macedonia, The Former Yugoslav Republic of"){ echo 'selected = "selected" ';} ?>>
												Macedonia, The Former Yugoslav Republic of
											</option>
											<option value="Madagascar" <?php if($nationality == "Madagascar"){ echo 'selected = "selected" ';} ?>>
												Madagascar
											</option>
											<option value="Malawi" <?php if($nationality == "Malawi"){ echo 'selected = "selected" ';} ?>>
												Malawi
											</option>
											<option value="Malaysia" <?php if($nationality == "Malaysia"){ echo 'selected = "selected" ';} ?>>
												Malaysia
											</option>
											<option value="Maldives" <?php if($nationality == "Maldives"){ echo 'selected = "selected" ';} ?>>
												Maldives
											</option>
											<option value="Mali" <?php if($nationality == "Mali"){ echo 'selected = "selected" ';} ?>>
												Mali
											</option>
											<option value="Malta" <?php if($nationality == "Malta"){ echo 'selected = "selected" ';} ?>>
												Malta
											</option>
											<option value="Marshall Islands" <?php if($nationality == "Marshall Islands"){ echo 'selected = "selected" ';} ?>>
												Marshall Islands
											</option>
											<option value="Martinique" <?php if($nationality == "Martinique"){ echo 'selected = "selected" ';} ?>>
												Martinique
											</option>
											<option value="Mauritania" <?php if($nationality == "Mauritania"){ echo 'selected = "selected" ';} ?>>
												Mauritania
											</option>
											<option value="Mauritius" <?php if($nationality == "Mauritius"){ echo 'selected = "selected" ';} ?>>
												Mauritius
											</option>
											<option value="Mayotte" <?php if($nationality == "Mayotte"){ echo 'selected = "selected" ';} ?>>
												Mayotte
											</option>
											<option value="Mexico" <?php if($nationality == "Mexico"){ echo 'selected = "selected" ';} ?>>
												Mexico
											</option>
											<option value="Micronesia, Federated States of" <?php if($nationality == "Micronesia, Federated States of"){ echo 'selected = "selected" ';} ?>>
												Micronesia, Federated States of
											</option>
											<option value="Moldova, Republic of" <?php if($nationality == "Moldova, Republic of"){ echo 'selected = "selected" ';} ?>>
												Moldova, Republic of
											</option>
											<option value="Monaco" <?php if($nationality == "Monaco"){ echo 'selected = "selected" ';} ?>>
												Monaco
											</option>
											<option value="Mongolia" <?php if($nationality == "Mongolia"){ echo 'selected = "selected" ';} ?>>
												Mongolia
											</option>
											<option value="Montenegro" <?php if($nationality == "Montenegro"){ echo 'selected = "selected" ';} ?>>
												Montenegro
											</option>
											<option value="Montserrat" <?php if($nationality == "Montserrat"){ echo 'selected = "selected" ';} ?>>
												Montserrat
											</option>
											<option value="Morocco" <?php if($nationality == "Morocco"){ echo 'selected = "selected" ';} ?>>
												Morocco
											</option>
											<option value="Mozambique" <?php if($nationality == "Mozambique"){ echo 'selected = "selected" ';} ?>>
												Mozambique
											</option>
											<option value="Myanmar" <?php if($nationality == "Myanmar"){ echo 'selected = "selected" ';} ?>>
												Myanmar
											</option>
											<option value="Namibia" <?php if($nationality == "Namibia"){ echo 'selected = "selected" ';} ?>>
												Namibia
											</option>
											<option value="Nauru" <?php if($nationality == "Nauru"){ echo 'selected = "selected" ';} ?>>
												Nauru
											</option>
											<option value="Nepal" <?php if($nationality == "Nepal"){ echo 'selected = "selected" ';} ?>>
												Nepal
											</option>
											<option value="Netherlands" <?php if($nationality == "Netherlands"){ echo 'selected = "selected" ';} ?>>
												Netherlands
											</option>
											<option value="Netherlands Antilles" <?php if($nationality == "Netherlands Antilles"){ echo 'selected = "selected" ';} ?>>
												Netherlands Antilles
											</option>
											<option value="New Caledonia" <?php if($nationality == "New Caledonia"){ echo 'selected = "selected" ';} ?>>
												New Caledonia
											</option>
											<option value="New Zealand" <?php if($nationality == "New Zealand"){ echo 'selected = "selected" ';} ?>>
												New Zealand
											</option>
											<option value="Nicaragua" <?php if($nationality == "Nicaragua"){ echo 'selected = "selected" ';} ?>>
												Nicaragua
											</option>
											<option value="Niger" <?php if($nationality == "Niger"){ echo 'selected = "selected" ';} ?>>
												Niger
											</option>
											<option value="Nigeria" <?php if($nationality == "Nigeria"){ echo 'selected = "selected" ';} ?>>
												Nigeria
											</option>
											<option value="Niue" <?php if($nationality == "Niue"){ echo 'selected = "selected" ';} ?>>
												Niue
											</option>
											<option value="Norfolk Island" <?php if($nationality == "Norfolk Island"){ echo 'selected = "selected" ';} ?>>
												Norfolk Island
											</option>
											<option value="Northern Mariana Islands" <?php if($nationality == "Northern Mariana Islands"){ echo 'selected = "selected" ';} ?>>
												Northern Mariana Islands
											</option>
											<option value="Norway" <?php if($nationality == "Norway"){ echo 'selected = "selected" ';} ?>>
												Norway
											</option>
											<option value="Oman" <?php if($nationality == "Oman"){ echo 'selected = "selected" ';} ?>>
												Oman
											</option>
											<option value="Pakistan" <?php if($nationality == "Pakistan"){ echo 'selected = "selected" ';} ?>>
												Pakistan
											</option>
											<option value="Palau" <?php if($nationality == "Palau"){ echo 'selected = "selected" ';} ?>>
												Palau
											</option>
											<option value="Palestinian Territory, Occupied" <?php if($nationality == "Palestinian Territory, Occupied"){ echo 'selected = "selected" ';} ?>>
												Palestinian Territory, Occupied
											</option>
											<option value="Panama" <?php if($nationality == "Panama"){ echo 'selected = "selected" ';} ?>>
												Panama
											</option>
											<option value="Papua New Guinea" <?php if($nationality == "Papua New Guinea"){ echo 'selected = "selected" ';} ?>>
												Papua New Guinea
											</option>
											<option value="Paraguay" <?php if($nationality == "Paraguay"){ echo 'selected = "selected" ';} ?>>
												Paraguay
											</option>
											<option value="Peru" <?php if($nationality == "Peru"){ echo 'selected = "selected" ';} ?>>
												Peru
											</option>
											<option value="Philippines" <?php if($nationality == "Philippines"){ echo 'selected = "selected" ';} ?>>
												Philippines
											</option>
											<option value="Pitcairn" <?php if($nationality == "Pitcairn"){ echo 'selected = "selected" ';} ?>>
												Pitcairn
											</option>
											<option value="Poland" <?php if($nationality == "Poland"){ echo 'selected = "selected" ';} ?>>
												Poland
											</option>
											<option value="Portugal" <?php if($nationality == "Portugal"){ echo 'selected = "selected" ';} ?>>
												Portugal
											</option>
											<option value="Puerto Rico" <?php if($nationality == "Puerto Rico"){ echo 'selected = "selected" ';} ?>>
												Puerto Rico
											</option>
											<option value="Qatar" <?php if($nationality == "Qatar"){ echo 'selected = "selected" ';} ?>>
												Qatar
											</option>
											<option value="Reunion" <?php if($nationality == "Reunion"){ echo 'selected = "selected" ';} ?>>
												Reunion
											</option>
											<option value="Romania" <?php if($nationality == "Romania"){ echo 'selected = "selected" ';} ?>>
												Romania
											</option>
											<option value="Russian Federation" <?php if($nationality == "Russian Federation"){ echo 'selected = "selected" ';} ?>>
												Russian Federation
											</option>
											<option value="Rwanda" <?php if($nationality == "Rwanda"){ echo 'selected = "selected" ';} ?>>
												Rwanda
											</option>
											<option value="Saint Helena" <?php if($nationality == "Saint Helena"){ echo 'selected = "selected" ';} ?>>
												Saint Helena
											</option>
											<option value="Saint Kitts and Nevis" <?php if($nationality == "Saint Kitts and Nevis"){ echo 'selected = "selected" ';} ?>>
												Saint Kitts and Nevis
											</option>
											<option value="Saint Lucia" <?php if($nationality == "Saint Lucia"){ echo 'selected = "selected" ';} ?>>
												Saint Lucia
											</option>
											<option value="Saint Pierre and Miquelon" <?php if($nationality == "Saint Pierre and Miquelon"){ echo 'selected = "selected" ';} ?>>
												Saint Pierre and Miquelon
											</option>
											<option value="Saint Vincent and The Grenadines" <?php if($nationality == "Saint Vincent and The Grenadines"){ echo 'selected = "selected" ';} ?>>
												Saint Vincent and The Grenadines
											</option>
											<option value="Samoa" <?php if($nationality == "Samoa"){ echo 'selected = "selected" ';} ?>>
												Samoa
											</option>
											<option value="San Marino" <?php if($nationality == "San Marino"){ echo 'selected = "selected" ';} ?>>
												San Marino
											</option>
											<option value="Sao Tome and Principe" <?php if($nationality == "Sao Tome and Principe"){ echo 'selected = "selected" ';} ?>>
												Sao Tome and Principe
											</option>
											<option value="Saudi Arabia" <?php if($nationality == "Saudi Arabia"){ echo 'selected = "selected" ';} ?>>
												Saudi Arabia
											</option>
											<option value="Senegal" <?php if($nationality == "Senegal"){ echo 'selected = "selected" ';} ?>>
												Senegal
											</option>
											<option value="Serbia" <?php if($nationality == "Serbia"){ echo 'selected = "selected" ';} ?>>
												Serbia
											</option>
											<option value="Seychelles" <?php if($nationality == "Seychelles"){ echo 'selected = "selected" ';} ?>>
												Seychelles
											</option>
											<option value="Sierra Leone" <?php if($nationality == "Sierra Leone"){ echo 'selected = "selected" ';} ?>>
												Sierra Leone
											</option>
											<option value="Singapore" <?php if($nationality == "Singapore"){ echo 'selected = "selected" ';} ?>>
												Singapore
											</option>
											<option value="Slovakia" <?php if($nationality == "Slovakia"){ echo 'selected = "selected" ';} ?>>
												Slovakia
											</option>
											<option value="Slovenia" <?php if($nationality == "Slovenia"){ echo 'selected = "selected" ';} ?>>
												Slovenia
											</option>
											<option value="Solomon Islands" <?php if($nationality == "Solomon Islands"){ echo 'selected = "selected" ';} ?>>
												Solomon Islands
											</option>
											<option value="Somalia" <?php if($nationality == "Somalia"){ echo 'selected = "selected" ';} ?>>
												Somalia
											</option>
											<option value="South Africa" <?php if($nationality == "South Africa"){ echo 'selected = "selected" ';} ?>>
												South Africa
											</option>
											<option value="South Georgia and The South Sandwich Islands" <?php if($nationality == "South Georgia and The South Sandwich Islands"){ echo 'selected = "selected" ';} ?>>
												South Georgia and The South Sandwich Islands
											</option>
											<option value="South Sudan" <?php if($nationality == "South Sudan"){ echo 'selected = "selected" ';} ?>>
												South Sudan
											</option>
											<option value="Spain" <?php if($nationality == "Spain"){ echo 'selected = "selected" ';} ?>>
												Spain
											</option>
											<option value="Sri Lanka" <?php if($nationality == "Sri Lanka"){ echo 'selected = "selected" ';} ?>>
												Sri Lanka
											</option>
											<option value="Sudan" <?php if($nationality == "Sudan"){ echo 'selected = "selected" ';} ?>>
												Sudan
											</option>
											<option value="Suriname" <?php if($nationality == "Suriname"){ echo 'selected = "selected" ';} ?>>
												Suriname
											</option>
											<option value="Svalbard and Jan Mayen" <?php if($nationality == "Svalbard and Jan Mayen"){ echo 'selected = "selected" ';} ?>>
												Svalbard and Jan Mayen
											</option>
											<option value="Swaziland" <?php if($nationality == "Swaziland"){ echo 'selected = "selected" ';} ?>>
												Swaziland
											</option>
											<option value="Sweden" <?php if($nationality == "Sweden"){ echo 'selected = "selected" ';} ?>>
												Sweden
											</option>
											<option value="Switzerland" <?php if($nationality == "Switzerland"){ echo 'selected = "selected" ';} ?>>
												Switzerland
											</option>
											<option value="Syrian Arab Republic" <?php if($nationality == "Syrian Arab Republic"){ echo 'selected = "selected" ';} ?>>
												Syrian Arab Republic
											</option>
											<option value="Taiwan, Republic of China" <?php if($nationality == "Taiwan, Republic of China"){ echo 'selected = "selected" ';} ?>>
												Taiwan, Republic of China
											</option>
											<option value="Tajikistan" <?php if($nationality == "Tajikistan"){ echo 'selected = "selected" ';} ?>>
												Tajikistan
											</option>
											<option value="Tanzania, United Republic of" <?php if($nationality == "Tanzania, United Republic of"){ echo 'selected = "selected" ';} ?>>
												Tanzania, United Republic of
											</option>
											<option value="Thailand" <?php if($nationality == "Thailand"){ echo 'selected = "selected" ';} ?>>
												Thailand
											</option>
											<option value="Timor-leste" <?php if($nationality == "Timor-leste"){ echo 'selected = "selected" ';} ?>>
												Timor-leste
											</option>
											<option value="Togo" <?php if($nationality == "Togo"){ echo 'selected = "selected" ';} ?>>
												Togo
											</option>
											<option value="Tokelau" <?php if($nationality == "Tokelau"){ echo 'selected = "selected" ';} ?>>
												Tokelau
											</option>
											<option value="Tonga" <?php if($nationality == "Tonga"){ echo 'selected = "selected" ';} ?>>
												Tonga
											</option>
											<option value="Trinidad and Tobago" <?php if($nationality == "Trinidad and Tobago"){ echo 'selected = "selected" ';} ?>>
												Trinidad and Tobago
											</option>
											<option value="Tunisia" <?php if($nationality == "Tunisia"){ echo 'selected = "selected" ';} ?>>
												Tunisia
											</option>
											<option value="Turkey" <?php if($nationality == "Turkey"){ echo 'selected = "selected" ';} ?>>
												Turkey
											</option>
											<option value="Turkmenistan" <?php if($nationality == "Turkmenistan"){ echo 'selected = "selected" ';} ?>>
												Turkmenistan
											</option>
											<option value="Turks and Caicos Islands" <?php if($nationality == "Turks and Caicos Islands"){ echo 'selected = "selected" ';} ?>>
												Turks and Caicos Islands
											</option>
											<option value="Tuvalu" <?php if($nationality == "Tuvalu"){ echo 'selected = "selected" ';} ?>>
												Tuvalu
											</option>
											<option value="Uganda"<?php if($nationality == "Uganda"){ echo 'selected = "selected" ';} ?>>
												Uganda
											</option>
											<option value="Ukraine" <?php if($nationality == "Ukraine"){ echo 'selected = "selected" ';} ?>>
												Ukraine
											</option>
											<option value="United Arab Emirates" <?php if($nationality == "United Arab Emirates"){ echo 'selected = "selected" ';} ?>>
												United Arab Emirates
											</option>
											<option value="United Kingdom" <?php if($nationality == "United Kingdom"){ echo 'selected = "selected" ';} ?>>
												United Kingdom
											</option>
											<option value="United States" <?php if($nationality == "United States"){ echo 'selected = "selected" ';} ?>>
												United States
											</option>
											<option value="United States Minor Outlying Islands" <?php if($nationality == "United States Minor Outlying Islands"){ echo 'selected = "selected" ';} ?>>
												United States Minor Outlying Islands
											</option>
											<option value="Uruguay" <?php if($nationality == "Uruguay"){ echo 'selected = "selected" ';} ?>>
												Uruguay
											</option>
											<option value="Uzbekistan" <?php if($nationality == "Uzbekistan"){ echo 'selected = "selected" ';} ?>>
												Uzbekistan
											</option>
											<option value="Vanuatu" <?php if($nationality == "Vanuatu"){ echo 'selected = "selected" ';} ?>>
												Vanuatu
											</option>
											<option value="Venezuela" <?php if($nationality == "Venezuela"){ echo 'selected = "selected" ';} ?>>
												Venezuela
											</option>
											<option value="Viet Nam" <?php if($nationality == "Viet Nam"){ echo 'selected = "selected" ';} ?>>
												Viet Nam
											</option>
											<option value="Virgin Islands, British" <?php if($nationality == "Virgin Islands, British"){ echo 'selected = "selected" ';} ?>>
												Virgin Islands, British
											</option>
											<option value="Virgin Islands, U.S." <?php if($nationality == "Virgin Islands, U.S."){ echo 'selected = "selected" ';} ?>>
												Virgin Islands, U.S.
											</option>
											<option value="Wallis and Futuna" <?php if($nationality == "Wallis and Futuna"){ echo 'selected = "selected" ';} ?>>
												Wallis and Futuna
											</option>
											<option value="Western Sahara" <?php if($nationality == "Western Sahara"){ echo 'selected = "selected" ';} ?>>
												Western Sahara
											</option>
											<option value="Yemen" <?php if($nationality == "Yemen"){ echo 'selected = "selected" ';} ?>>
												Yemen
											</option>
											<option value="Zambia" <?php if($nationality == "Zambia"){ echo 'selected = "selected" ';} ?>>
												Zambia
											</option>
											<option value="Zimbabwe" <?php if($nationality == "Zimbabwe"){ echo 'selected = "selected" ';} ?>>
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
							</div><!--/.tab-pane-->
							<div class="tab-pane active" id="employbility">
							    <h3 class="normal"> Employability
								</h3>
							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Is Qatari?
								</label>
								<div class="col-md-9 col-sm-9">
									<input type="checkbox" class="form-control switch" id="is_qatari" name="is_qatari" data-on-text="Qatari" data-off-text="Non-Qatari" data-on-color="success" data-off-color="danger" checked='checked' />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Qatari ID Copy ?
								</label>
								<div class="col-md-9 col-sm-9">
									<input type="checkbox" class="form-control switch" id="qatari_id_copy_attached" name="qatari_id_copy_attached" data-on-text="Attached" data-off-text="Not-Attached" data-on-color="success" data-off-color="danger" checked='checked' />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Passport Copy ?
								</label>
								<div class="col-md-9 col-sm-9">
									<input type="checkbox" class="form-control switch" id="passport_copy_attached" name="passport_copy_attached" data-on-text="Attached" data-off-text="Not-Attached" data-on-color="success" data-off-color="danger" checked='checked' />
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									NOC Required?
								</label>
								<div class="col-md-9 col-sm-9">
									<input type="checkbox" class="form-control switch" id="noc_required" name="noc_required" data-on-text="Required" data-off-text="NotRequired" data-on-color="success" data-off-color="danger" checked='checked' />
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									NOC Copy ?
								</label>
								<div class="col-md-9 col-sm-9">
									<input type="checkbox" class="form-control switch" id="noc_copy_attached" name="noc_copy_attached" data-on-text="Attached" data-off-text="Not-Attached" data-on-color="success" data-off-color="danger" checked='checked' />
								</div>
							</div>


							<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Sponsors ID Copy ?
								</label>
								<div class="col-md-9 col-sm-9">
									<input type="checkbox" class="form-control switch" id="sponsors_id_copy_attached" name="sponsors_id_copy_attached" data-on-text="Attached" data-off-text="Not-Attached" data-on-color="success" data-off-color="danger" checked='checked' />
								</div>
							</div>

						<div class="form-group">
								<label class="col-md-3 col-sm-3 control-label">
									Available for Events ?
								</label>
								<div class="col-md-9 col-sm-9">
									<input type="checkbox" class="form-control switch" id="events" name="events" data-on-text="Yes" data-off-text="No" data-on-color="success" data-off-color="danger" checked='checked' />
								</div>
							</div>


						</div><!-- /.tab-pane -->
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
				 
              </div> <!--/.body-box-->
 	
          </div><!-- /.box Employability Information-->
				<!-- Hidden Fields -->
<input type="hidden" name="form_name" id="form_name" value="edit_talent_employability_info" />
<!-- /Hidden Fields -->
</form>	