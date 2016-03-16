
<?php
$experience_item_name    = ""; 
if(isset($_GET['query'])) {
	
if (trim($_GET{'query'}) <> "" ){
$query = trim(strtolower($_GET{'query'}));
$sql = 'SELECT talent.* ,exp_item.experience_item_name, exp_item.experience_item_id,talent_exp.experience_item_id
FROM tams_talent AS talent ,tams_experience_items AS exp_item
INNER JOIN tams_talent_experience AS talent_exp 
ON exp_item.experience_item_id= talent_exp.experience_item_id WHERE ';
$sql .= "( LOWER(experience_item_name) LIKE '%".$query."%' ) ";	
$get_talents = DB::query($sql);

	
}
}

?>

<!--   Content Header (Page header) -->


<section class="content-header">
	<h1>
		Talents Search By Skill

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
			Search Talent By Skill
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
                  <h3 class="box-title">Please Select Skill to Search</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
				 <p>
				<form  method="GET" action=""  id="searchform"> 
				<input type="hidden" value="modules/talent_lists/search_by_skill" name="route" />
				
										<select id="experience_item_name" name="query" class="field"   >
										<option value="" selected="selected" > -- Select Skill -- </option>
											<option value="Actor" <?php if($experience_item_name == "Actor"){ echo 'selected = "selected" ';}?> >
												Actor
											</option>
											<option value="Comedian" <?php if($experience_item_name == "Comedian"){ echo 'selected = "selected" ';} ?>>
												Comedian
											</option>
											<option value="Dancer" <?php if($experience_item_name == "Dancer"){ echo 'selected = "selected" ';} ?>>
												Dancer
											</option>
											<option value="DJ" <?php if($experience_item_name == "DJ"){ echo 'selected = "selected" ';} ?>>
												DJ
											</option>
											<option value="Extra" <?php if($experience_item_name == "Extra"){ echo 'selected = "selected" ';} ?>>
												Extra
											</option>
											<option value="Host/Hostess" <?php if($experience_item_name == "Host/Hostess"){ echo 'selected = "selected" ';} ?>>
												Host/Hostess
											</option>
											<option value="Make-Up Artist/Hair Stylist" <?php if($experience_item_name == "Make-Up Artist/Hair Stylist"){ echo 'selected = "selected" ';} ?>>
												Make-Up Artist/Hair Stylist
											</option>
											<option value="Model" <?php if($experience_item_name == "Model"){ echo 'selected = "selected" ';} ?>>
												Model
											</option>
											<option value="Photographer" <?php if($experience_item_name == "Photographer"){ echo 'selected = "selected" ';} ?>>
												Photographer
											</option>
											<option value="Presenter" <?php if($experience_item_name == "Presenter"){ echo 'selected = "selected" ';} ?>>
												Presenter
											</option>
											<option value="Presenter/MC" <?php if($experience_item_name == "Presenter/MC"){ echo 'selected = "selected" ';} ?>>
												Presenter/MC
											</option>
											<option value="Production Crew" <?php if($experience_item_name == "Production Crew"){ echo 'selected = "selected" ';} ?>>
												Production Crew
											</option>
											<option value="Professional Sportsman" <?php if($experience_item_name == "Professional Sportsman"){ echo 'selected = "selected" ';} ?>>
												Professional Sportsman
											</option>
											<option value="Project Manager" <?php if($experience_item_name == "Project Manager"){ echo 'selected = "selected" ';} ?>>
												Project Manager
											</option>
											<option value="Promoter" <?php if($experience_item_name == "Promoter"){ echo 'selected = "selected" ';} ?>>
												Promoter
											</option>
											<option value="Registration Staff" <?php if($experience_item_name == "Registration Staff"){ echo 'selected = "selected" ';} ?>>
												Registration Staff
											</option>
											<option value="Show Caller" <?php if($experience_item_name == "Show Caller"){ echo 'selected = "selected" ';} ?>>
												Show Caller
											</option>
											<option value="Singer" <?php if($experience_item_name == "Singer"){ echo 'selected = "selected" ';} ?>>
												Singer
											</option>
											<option value="Supervisor" <?php if($experience_item_name == "Supervisor"){ echo 'selected = "selected" ';} ?>>
												Supervisor
											</option>
											<option value="Translator" <?php if($experience_item_name == "Translator"){ echo 'selected = "selected" ';} ?>>
												Translator
											</option>
											<option value="Usher" <?php if($experience_item_name == "Usher"){ echo 'selected = "selected" ';} ?>>
												Usher
											</option>
											<option value="Videographer" <?php if($experience_item_name == "Videographer"){ echo 'selected = "selected" ';} ?>>
												Videographer
											</option>
											<option value="VIP Hostesses" <?php if($experience_item_name == "VIP Hostesses"){ echo 'selected = "selected" ';} ?>>
												VIP Hostesses
											</option>
											<option value="VO" <?php if($experience_item_name == "VO"){ echo 'selected = "selected" ';} ?>>
												VO
											</option>
											<option value="Wardrobe Assistant" <?php if($experience_item_name == "Wardrobe Assistant"){ echo 'selected = "selected" ';} ?>>
												Wardrobe Assistant
											</option>
								
										</select>
				  					 <input  type="submit" class="searchbutn" name="submit" value="Search" />

			</form>
  	</p>
                      </div><!-- /.box-header -->      
              
			<div class="box-body">
				

      <h2 >Search Results</h2>
<?php 
//$my_sql="SELECT * FROM tams_talent WHERE ";
//$get_talents = DB::query($my_sql);
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