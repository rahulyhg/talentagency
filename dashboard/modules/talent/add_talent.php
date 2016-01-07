<?php
	if(isset($_POST['save_talent'])){
		print_r($_POST);
	}	
?>
<!--style>
	div.xAxis div.tickLabel 
{    
    transform: rotate(-45deg);
    -ms-transform:rotate(-45deg); /* IE 9 */
    -moz-transform:rotate(-45deg); /* Firefox */
    -webkit-transform:rotate(-45deg); /* Safari and Chrome */
    -o-transform:rotate(-45deg); /* Opera */
    /*rotation-point:25% 25%;*/ /* CSS3 */
    /*rotation:270deg;*/ /* CSS3 */
}
	
</style -->
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Talent Agency Management System

            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Talent</li>
          </ol>
        </section>

        <!-- Main content -->
<section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Add New Talent</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
						<!-- Main form start-->
						<div class="col-md-12">

 				<form name="frmsubmission" id="frmsubmission" method="POST" class="submission-validate" enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-12">
							
						</div>
					 </div>

 				 	
					<h2 class="normal">Talent Contact Information</h2>
					<hr></hr>
					<div class="row">
				 		<div class="col-sm-6">
							<div class="form-group">
									<input id="first_name" name="first_name" class="form-control" value="" placeholder="Enter first name" required="" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input id="last_name" name="last_name" class="form-control" value="" placeholder="Enter last name" required="" type="text">
							</div>
						</div>
					</div>

					<div class="row">
				 		<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" id="rcity" name="rcity" placeholder="Enter city" value="" required="" type="text">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input class="form-control" id="state" name="state" placeholder="State" value="" required="" type="text">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<input class="form-control" id="zip" name="zip" placeholder="Postal code" value="" type="text">
							</div>
						</div>
					</div>

					<div class="row">
				 		<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" id="phone_no" name="phone_no" placeholder="Enter home phone number" value="" required="" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="checkbox-wrap"><input id="no_to_call1" name="no_to_call" value="phone_no" checked="checked" type="radio">Main contact number</label>
							</div>
						</div>
					</div>

					<div class="row">
				 		<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" id="cell_no" name="cell_no" placeholder="Enter cell phone number" value="" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="checkbox-wrap"><input id="no_to_call2" name="no_to_call" value="phone_no" type="radio">Main contact number</label>
							</div>
						</div>
					</div>

					<div class="row">
				 		<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" id="email" name="email" placeholder="Enter email address" value="" required="" type="text">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" id="fax_no" name="fax_no" placeholder="Enter fax number" value="" type="text">
							</div>
						</div>
					</div>

					<hr>

					<div class="row">

						
				 		<div class="col-md-12">
							<div class="form-group">
								Talent Category - <span class="small">(Check all that apply)</span>
							</div>
							<div class="form-group">
								<label class="checkbox-wrap"><input id="acc" name="ac[]" value="Actor - Commercial" type="checkbox">Actor - Commercial</label>
								<label class="checkbox-wrap"><input id="act" name="ac[]" value="Actor - Theatrical" type="checkbox">Actor - Theatrical</label>
								<label class="checkbox-wrap"><input id="ach" name="ac[]" value="Actor - Hosting" type="checkbox">Actor - Hosting</label>
							    <label class="checkbox-wrap"><input id="acp" name="ac[]" value="Print Model" type="checkbox">Print Model</label>
							    <label class="checkbox-wrap"><input id="acpm" name="ac[]" value="Promotional Model" type="checkbox">Promotional Model</label>
							    <label class="checkbox-wrap"><input id="acd" name="ac[]" value="Dancer" type="checkbox">Dancer</label>
								<label class="checkbox-wrap"><input id="aco" name="ac[]" value="32" type="checkbox">Other - please specify</label>
								<label class="checkbox-wrap">
									<input id="acother" name="acother" value="" placeholder="Other - please specify" type="text">
								</label>
							</div>
						</div>

						<!--
				 		<div class="col-sm-6">
							<div class="form-group">
								Union Membership(s) - <span class="small">(Check all that apply)</span>
							</div>
							<div class="form-group">
								<label class="checkbox-wrap"><input id="unionida" name="unionid[]" value="AFTRA" type="checkbox">AFTRA</label>
							    <label class="checkbox-wrap"><input id="unionidae" name="unionid[]" value="AFTRA eligible" type="checkbox">AFTRA eligible</label>
							    <label class="checkbox-wrap"><input id="unionidamj" name="unionid[]" value="AFTRA must join" type="checkbox">AFTRA must join</label>
							    <label class="checkbox-wrap"><input id="unionidfc" name="unionid[]" value="6" type="checkbox">Financial Core</label>
							    <label class="checkbox-wrap"><input id="unionidnu" name="unionid[]" value="Non Union" type="checkbox">Non Union</label>
							    <label class="checkbox-wrap"><input id="unionidsag" name="unionid[]" value="SAG" type="checkbox">SAG</label>
							    <label class="checkbox-wrap"><input id="unionidsage" name="unionid[]" value="SAG eligible" type="checkbox">SAG eligible</label>
							    <label class="checkbox-wrap"><input id="unionidsagm" name="unionid[]" value="SAG must join" type="checkbox">SAG must join</label>
							</div>
						</div> -->
					</div>

					<h2 class="normal">Talent Vital Information</h2>
					<hr></hr>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label class="checkbox-label required" style="width: 100%;">Is Qatari? - <span class="small">(Is belongs to Qatar)</span></label>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="row">
						 		<div class="col-xs-3">
									<div class="form-group">
										<label class="checkbox-wrap" style="width:100%"><input id="is_qatar_yes" class="required" name="is_qatari" value="1" checked="checked" required="" type="radio">YES</label>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="form-group">
										<label class="checkbox-wrap" style="width:100%"><input id="is_qatar_no" class="required" name="is_qatari" value="0" required="" type="radio">No</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					
					<div class="row">
				 		<div class="col-sm-6">
							<div class="form-group">
								<div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="dob" id="dob" class="datepicker form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text">
                    </div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" id="weight" name="weight" placeholder="Enter Enter weight (pounds)" value="" required="" type="text">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="checkbox-label required" style="width: 100%;">Over 18?</label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="row">
								 		<div class="col-xs-6">
											<div class="form-group">
												<label class="checkbox-wrap" style="width: 100%;"><input id="o18yes" name="over18" value="1" required="" type="radio">Yes</label>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label class="checkbox-wrap" style="width: 100%;"><input id="o18no" name="over18" checked="checked" value="0" required="" type="radio">No</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="checkbox-label">Height:</label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="row">
								 		<div class="col-xs-6">
											<div class="form-group">
												<select id="ht_feet" class="form-control" name="ht_feet" required="">
												    <option value="">Feet</option>
												    <option value="1">1</option>
												    <option value="2">2</option>
												    <option value="3">3</option>
												    <option value="4">4</option>
												    <option value="5">5</option>
												    <option value="6">6</option>
												    <option value="7">7</option>
											    </select>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
											    <select id="ht_inches" class="form-control" name="ht_inches" required="">
													<option value="">Inches</option>
												    <option value="0">0</option>
												    <option value="1">1</option>
												    <option value="2">2</option>
												    <option value="3">3</option>
												    <option value="4">4</option>
												    <option value="5">5</option>
												    <option value="6">6</option>
												    <option value="7">7</option>
												    <option value="8">8</option>
												    <option value="9">9</option>
												    <option value="10">10</option>
												    <option value="11">11</option>
											    </select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="checkbox-label required">Gender:</label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="row">
								 		<div class="col-xs-6">
											<div class="form-group">
												<label class="checkbox-wrap" style="width: 100%;"><input id="sexm" name="sex" value="0" checked="checked" required="" type="radio">Male</label>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label class="checkbox-wrap" style="width: 100%;"><input id="sexfm" name="sex" value="1" required="" type="radio">Female</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<select class="form-control" id="hair_color_sel" name="hair_color_sel" required="">
								    <option selected="selected" value="">Select hair color</option>
								    <option value="Auburn">Auburn</option>
								    <option value="Black">Black</option>
								    <option value="Blonde">Blonde</option>
								    <option value="Brown">Brown</option>
								    <option value="DarkBrown">Dark Brown</option>
								    <option value="DarkBlonde">Dark Blonde</option>
								    <option value="Gray">Gray</option>
								    <option value="LightBlonde">Light Blonde</option>
								    <option value="LightBrown">Light Brown</option>
								    <option value="None">None</option>
								    <option value="Red">Red</option>
								    <option value="SaltandPepper">Salt and Pepper</option>
								    <option value="Silver">Silver</option>
								    <option value="StrawberryBlonde">Strawberry Blonde</option>
								    <option value="White">White</option>
							    </select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<select class="form-control" id="eye_color_sel" name="eye_color_sel" required="">
								    <option selected="selected" value="">Select eye color</option>
								    <option value="Amber">Amber</option>
								    <option value="Black">Black</option>
								    <option value="Blue">Blue</option>
								    <option value="Brown">Brown</option>
								    <option value="Dark Brown">Dark Brown</option>
								    <option value="Green">Green</option>
								    <option value="Grey">Grey</option>
								    <option value="Hazel">Hazel</option>
								    <option value="Violet">Violet</option>
							    </select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<select class="form-control" id="ethnicity_sel" name="ethnicity_sel" onchange="show(this.value);" required="">
								    <option selected="selected" value="">Select ethnicity</option>
								    <option value="African American">African American</option>
								    <option value="American Indian">American Indian</option>
								    <option value="Asian">Asian</option>
								    <option value="Caucasian">Caucasian</option>
								    <option value="East Indian">East Indian</option>
								    <option value="Eastern European">Eastern European</option>
								    <option value="Latin/Hispanic">Latin/Hispanic</option>
								    <option value="Mediterranean">Mediterranean</option>
								    <option value="Middle Eastern">Middle Eastern</option>
								    <option value="Multi Ethnic">Multi Ethnic</option>
								    <option value="West Indies/Caribbean">West Indies/Caribbean</option>
								    <option value="other">Other</option>
							    </select>
							</div>
							<div id="other_ethen" style="display:none">
								<div class="form-group">
									<input id="ethnicity" value="" name="ethnicity" class="form-control" placeholder="Specify ethnicity" type="text">
								</div>
							</div>
						</div>
					</div>

					<h2 class="normal">Age Range and Sizes</h2>
					<hr></hr>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Age Range:</label>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="form-group">
										<input id="age_range_from" name="age_range_from" class="form-control" value="" type="text">
									</div>
								</div>
								<div class="col-xs-2">
									<div class="form-group">
										<label class="checkbox-label">to</label>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="form-group">
										<input class="form-control" name="age_range_to" size="2" value="" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Neck size:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input id="neck_size" name="neck_size" class="form-control" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">inches (M)</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Waist size:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input id="waist_size" name="waist_size" class="form-control" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">inches (M &amp; F)</label>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Inseam size:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input class="form-control" id="inseam_size" name="inseam_size" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">inches (M)</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Bust size:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input id="bust_size" name="bust_size" class="form-control" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">e.g. 32C (F)</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Hip size:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input class="form-control" id="hip_size" name="hip_size" size="3" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">inches (F)</label>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Shoe size:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input class="form-control" id="shoe_size" name="shoe_size" size="3" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">US (M &amp; F)</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Ring size:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input id="ring_size" name="ring_size" class="form-control" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">(M &amp; F)</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Glove size:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input id="glove_size" name="glove_size" class="form-control" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">(M &amp; F)</label>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Sleeve length:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input class="form-control" id="sleeve_size" name="sleeve_size" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">inches (M)</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Suit size:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input class="form-control" id="suit_size" name="suit_size" size="3" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">e.g. 42 (M)</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
							<div class="row">
								<div class="col-xs-4 pad-right-0">
									<div class="form-group">
										<label class="checkbox-label">Dress size:</label>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<input class="form-control" id="dress_size" name="dress_size" size="3" value="" type="text">
									</div>
								</div>
								<div class="col-xs-4 pad-left-0">
									<div class="form-group">
										<label class="checkbox-label small">e.g. 4 (F)</label>
									</div>
								</div>
							</div>
						</div>

						

					</div>

					<hr>

					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label class="checkbox-label" style="width: 100%;">Have any tattoos? </label>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="row">
						 		<div class="col-xs-6">
									<div class="form-group">
										<label class="checkbox-wrap" style="width: 100%;"><input id="tatooyes" name="tattoo" value="yes" onclick="show_hide(this.value);" type="radio">Yes</label>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label class="checkbox-wrap" style="width: 100%;"><input id="tatoono" name="tattoo" value="no" onclick="show_hide(this.value);" type="radio">No</label>
									</div>
								</div>
							</div>
							<div class="row" id="text_box1" style="display:none">
								<div class="col-md-12">
									<input id="tattos" value="" name="tattos" class="form-control" placeholder="Where are tatoos located?" type="text">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label class="checkbox-label" style="width: 100%;">Have any piercings? </label>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="row">
						 		<div class="col-xs-6">
									<div class="form-group">
										<label class="checkbox-wrap" style="width: 100%;"><input id="pieryes" name="piercing" value="yes" onclick="show_hide1(this.value);" type="radio">Yes</label>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label class="checkbox-wrap" style="width: 100%;"><input id="pierno" name="piercing" value="no" onclick="show_hide1(this.value);" type="radio">No </label>
									</div>
								</div>
							</div>
							<div class="row" id="text_box2" style="display:none">
								<div class="col-md-12">
									<input id="piercing" value="" name="piercing" class="form-control" placeholder="Where are piercings located?" type="text">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input id="language" name="language" class="form-control" value="" placeholder="Which languages can speak?" type="text">
							</div>
						</div>
					</div>

					<h2 class="normal">Additional Information</h2>
					<hr></hr>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<textarea id="add_info" name="add_info" rows="8" class="form-control" placeholder="Briefly explanation..."></textarea>
							</div>
						</div>
					</div>

					<h2 class="normal">Photographs</h2>
					<hr></hr>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<p>Use the browse button to locate headshot photo image file on your computer.</p>
								<p>Image files ONLY (.jpg, .gif, .png) that are no larger than 5MB in size.</p>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label class="checkbox-label">Headshot image:</label>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<input class="form-control" name="head_shot" id="head_shot" size="50" required="" type="file">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label class="checkbox-label">Attach resume:</label>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<input name="txtcv" id="txtcv" class="form-control" type="file">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label class="checkbox-label">Full body shot image:</label>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<input id="body_shot" name="body_shot" class="form-control" type="file">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label class="checkbox-label">Snapshot image:</label>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<input id="snap_shot" name="snap_shot" class="form-control" type="file">
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-md-12 text-center">
							<div class="form-group">
								<input id="save_talent" class="btn btn-primary" name="save_talent" value="Save Talent" type="submit" />
								
							</div>
						</div>
					</div>

			 </form></div>
						<!-- //Main form end -->	
						
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">

                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
                      </div><!-- /.row -->
 <!-- Default box 2-->
<div class="row">
   
          </div><!-- /.row -->

</section><!-- /.content --> 