
<?php
$language               = ""; 
if(isset($_GET['query'])) {

if (trim($_GET{'query'}) <> "" ){
$query = trim(strtolower($_GET{'query'}));

$sql = 'SELECT * FROM tams_languages WHERE ';
$sql .= "( LOWER(language_name) LIKE '%".$query."%' ) ";
$get_talents = DB::query($sql);


}
}

?>

<!--   Content Header (Page header) -->


<section class="content-header">
	<h1>
		Talents Search By Language

		<small>
			Search for talents and add to Lists
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
			Search Talent By Language
		</li>
	</ol>
</section>
<!-- Main content -->
<section   class="content">
	<div class="row">
		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<div class="col-md-12 ">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Please Enter Language to Search</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
				 <p>
				<form  method="GET" action=""  id="searchform"> 
				<input type="hidden" value="modules/talent_lists/search_by_language" name="route" />
				

					  

			    <select id="language" name="query" class="field"   >
										<option value="" selected="selected" > -- Select Language -- </option>
											<option value="	English (United States)" <?php if($language== "	English (United States)"){ echo 'selected = "selected" ';}?> >
													English (United States)
											</option>
											<option value="Arabic" <?php if($language== "	Arabic"){ echo 'selected = "selected" ';}?> >
														Arabic
											</option>
											<option value="	Urdu" <?php if($language== "	Urdu"){ echo 'selected = "selected" ';}?> >
												 	Urdu
											</option>
											<option value="		Sinhala" <?php if($language== "		Sinhala"){ echo 'selected = "selected" ';}?> >
													Sinhala
											</option>
											<option value="Russian" <?php if($language== "	Russian"){ echo 'selected = "selected" ';}?> >
												   Russian
											</option>
											<option value="	Hindi" <?php if($language== "	Hindi"){ echo 'selected = "selected" ';}?> >
													Hindi
											</option>
											<option value="		Malayalam" <?php if($language== "		Malayalam"){ echo 'selected = "selected" ';}?> >
													Malayalam
											</option>
											<option value="	Tamil" <?php if($language== "		Tamil"){ echo 'selected = "selected" ';}?> >
												    Tamil
											</option>
											<option value="		Farsi" <?php if($language== "		Farsi"){ echo 'selected = "selected" ';}?> >
													Farsi
											</option>
											<option value="	German" <?php if($language== "		German"){ echo 'selected = "selected" ';}?> >
												  	German
											</option>
											<option value="	French" <?php if($language== "		French"){ echo 'selected = "selected" ';}?> >
													French
											</option>
											<option value="		Bengali" <?php if($language== "		Bengali"){ echo 'selected = "selected" ';}?> >
													Bengali
											</option>
											<option value="		Spanish" <?php if($language== "		Spanish"){ echo 'selected = "selected" ';}?> >
													Spanish
											</option>
											<option value="		Portuguese" <?php if($language== "	Portuguese"){ echo 'selected = "selected" ';}?> >
													Portuguese
											</option>
											<option value="		Swahili)" <?php if($language== "		Swahili"){ echo 'selected = "selected" ';}?> >
													Swahili
											</option>
											<option value="		Thai" <?php if($language== "		Thai"){ echo 'selected = "selected" ';}?> >
													Thai
											</option>
											<option value="	Tagalog" <?php if($language== "		Tagalog"){ echo 'selected = "selected" ';}?> >
													Tagalog
											</option>
											<option value="	Finnish)" <?php if($language== "		Finnish"){ echo 'selected = "selected" ';}?> >
													Finnish
											</option>
											<option value="	Afrikaans" <?php if($language== "		Afrikaans"){ echo 'selected = "selected" ';}?> >
													Afrikaans
											</option>
											<option value="		Bahasa" <?php if($language== "		Bahasa"){ echo 'selected = "selected" ';}?> >
													Bahasa
											</option>
											<option value="		Italian" <?php if($language== "		Italian") {echo 'selected = "selected" ';}?> >
													Italian
											</option>
											<option value="		Polish" <?php if($language== "		Polish"){ echo 'selected = "selected" ';}?> >
													Polish
											</option>
											<option value="		Chinese" <?php if($language== "		Chinese"){ echo 'selected = "selected" ';}?> >
													Chinese
											</option>
											<option value="	Hungarian" <?php if($language== "		Hungarian"){ echo 'selected = "selected" ';}?> >
													Hungarian
											</option>
											<option value="	Dutch" <?php if($language== "		Dutch"){ echo 'selected = "selected" ';}?> >
														Dutch
											</option>
											<option value="		Twi" <?php if($language== "	Twi"){ echo 'selected = "selected" ';}?> >
													Twi
											</option>
											<option value="		Polish" <?php if($language== "		Polish"){ echo 'selected = "selected" ';}?> >
													Polish
											</option>
											<option value="		Turkish" <?php if($language== "		Turkish"){ echo 'selected = "selected" ';}?> >
													Turkish
											</option>
											
										</select>
				  					 <input  type="submit" class="searchbutn" name="submit" value="Search" />

				 
			</form>
  	</p>
                      </div><!-- /.box-header -->      
              
			<div class="box-body">
				

      <h2 >Search Results</h2>
<?php 
if(isset($get_talents)) {
	

foreach($get_talents as $talent) {  
			  
?>	
        <div class="col-md-4 col-sm-6" >
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $talent['first_name']." ".$talent['last_name']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $talent['sex'].",&nbsp;". getAge($talent['dob']);  ?> Years</h5>
            </div>
            <div class="widget-user-image">
            <img class="img-circle card" src="<?php echo $talent['photo1_url']; ?>"  alt="talent_photo"  />
            </div>
            <div class="box-footer">
            <div class="row">
            <?php
			$events = $talent['events'];
				if (is_null($events) OR $events == "" ) {
					$events = " - not set - ";
				} 
				elseif($events == 1 ){
					$events = "Yes";
				}
				else {
					$events ="No"; 
				} 

			
			?>
                  
              <ul class=" nav nav_stacked">
			   <li ><strong>From</strong></br> <?php echo $talent['nationality'];?></li></br>
                <li><strong>Skilled :</strong>&nbsp;<?php echo list_talent_experience($talent['talent_id']);?></li></br>
                <li><strong>Speaks :</strong>&nbsp;<?php echo list_talent_language($talent['talent_id']);?></li></br>
				<li><strong>Availble for Event ?</strong>&nbsp;<?php echo $events;?></li>
              </ul>
            </div>
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">

                    <span class="description-text">
					<a class='btn btn-warning btn-circle btn-lg disabled' title="Delete" href =""  >&nbsp;&nbsp;<span class='glyphicon glyphicon-trash'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <span class="description-text">
					<a class='btn btn-info btn-circle btn-lg' target="_blank" title="View Profile" href ="index.php?route=modules/talent/view_talent_profile&talent_id=<?php echo $talent['talent_id']; ?>">&nbsp;&nbsp;<span class='glyphicon glyphicon-user'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                 
                    <span class="description-text">
					<a class='btn btn-danger btn-circle btn-lg' target="_blank" title="Add to favourite" href ="index.php?route=modules/talent_lists/add_talent_to_list&talent_id=<?php echo $talent['talent_id']; ?>">&nbsp;&nbsp;<span class='glyphicon glyphicon-heart'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
<?php 
}		  

}
?>	        
        
        
        
        
      </div>
      <!-- /.row -->				
				
				
				
				
				
				
            </div><!-- /.box-body -->
             <div class="box-footer">
                </div><!-- /.box-footer -->
           
              </div><!-- /.box -->
            </div><!-- /.col -->
			</div>
			
		</div><!-- /.box -->

	</div><!-- /.row -->

</section><!--  /.content -->