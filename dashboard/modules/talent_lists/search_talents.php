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
				  <input  type="text" name="find">
                  	
				 <Select NAME="field"><option selected>Filter by</option>
						<Option VALUE="first_name">First Name</option>
						<Option VALUE="last_name">Last Name</option>
					
						<Option VALUE="nationality">Nationality</option>
						<Option VALUE="dob">Age</option>
						<Option VALUE="sex">Gender</option>
						<Option VALUE="eye_color">eye color</option>
						<Option VALUE="height_cm">height</option>
						</select>
					 
				  <input  type="submit" name="submit" value="Search"> 
			</form>
  	</p>
                      </div><!-- /.box-header -->      
              
			<div class="box-body">
				

      <h2 >Search Results</h2>
<?php 
foreach($get_talents as $talent) {  
			  
?>	
        <div class="col-md-4 col-sm-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $talent['first_name']." ".$talent['last_name']; ?></h3>
              <h5 class="widget-user-desc">Founder &amp; CEO</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
            <div class="row">
            
                  
              <ul class="nav nav-stacked">
                <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
              </ul>
            </div>
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">3,200</h5>
                    <span class="description-text">SALES</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">13,000</h5>
                    <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">35</h5>
                    <span class="description-text">PRODUCTS</span>
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