<?php
 
 

 
$sql = 'SELECT * FROM tams_talent WHERE talent_status = "draft" ';
$sql .= 'LIMIT 20';
$get_talents = DB::query($sql);

?>


<!--   Content Header (Page header) -->


<section class="content-header">
	<h1>
		Talents Search Engine

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
			Talent Search
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
                  <h3 class="box-title">Please Enter Search Parameters</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
				 <p>
				<form  method="post" action=""  id="searchform"> 
				
				   <input type="text" class="serchform" name="x" placeholder="Search term...">
				  	
				 <select name="field" class="field"><option selected>Filter by</option>
						<option value="first_name">First Name</option>
						<option value="last_name">Last Name</option>
						<option value="nationality">Nationality</option>
						<option value="sex">Gender</option>
						<option value="dob">Age</option>
						<option value="eye_color">Eye color</option>
						<option value="height_cm">Height</option>
						<option value="weight">Weight</option>
						<option value="language">Language</option>
						<option value="experience">Skill</option>
				</select>
					 <span class="dropdown">
                
				 <select name="field" class="butn"><option selected>Operator</option>
						  <option>Contains</option>
						  <option>It's equal</option>
						  <option>Greather than > </option>
						  <option>Less than < </option>
						  <option>Between</option>
						  <option>Like %</option>
				</select>
					  

					 
				 <input  type="submit" class="searchbutn" name="submit" value="Search">
				 
			</form>
  	</p>
                      </div><!-- /.box-header -->      
              
			<div class="box-body">
				

      <h2 >Search Results</h2>
<?php 
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
            <img class="img-circle" src="<?php echo $talent['photo1_url']; ?>"  alt="talent_photo"  />
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
			   <li><h4>Nationality</h4></li>
			   <li ><?php echo $talent['nationality'];?></li>
                <li><h4>Professional Skills</h4></li>
                <li><?php echo list_talent_experience($talent['talent_id']);?></li>
                <li><h4>spoken Languages</h4></li>
                <li><?php echo list_talent_language($talent['talent_id']);?></li>
				<li><h4>Available for Events?</h4></li>
				<li><?php echo $events;?></li>
              </ul>
            </div>
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">

                    <span class="description-text">
					<a class='btn btn-warning btn-circle btn-lg' title="Delete" href ="process_delete_talent.php?action=delete_talent&id=<?php echo $talent['talent_id']; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');"  >&nbsp;&nbsp;<span class='glyphicon glyphicon-trash'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <span class="description-text">
					<a class='btn btn-info btn-circle btn-lg' title="View Profile" href ="index.php?route=modules/talent/view_talent_profile&talent_id=<?php echo $talent['talent_id']; ?>">&nbsp;&nbsp;<span class='glyphicon glyphicon-user'></span></a>
					</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                 
                    <span class="description-text">
					<a class='btn btn-danger btn-circle btn-lg' title="Add to favourite" href ="index.php?route=modules/talent_lists/add_talent_to_list&talent_id=<?php echo $talent['talent_id']; ?>">&nbsp;&nbsp;<span class='glyphicon glyphicon-heart'></span></a>
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