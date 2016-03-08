<?php
 
 

 
$sql = 'SELECT * FROM tams_talent WHERE talent_status = "draft" ';
$sql .= 'LIMIT 20';
$get_talents = DB::query($sql);

?>

<style>
body{padding-top:30px;}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 40px;
  height: 40px;
  padding: 8px 8px;
  font-size: 20px;
  line-height: 1.33;
  border-radius: 26px;
}

footer{
  text-decoration: none;
}


</style>
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
        <div class="col-md-4 col-sm-6" style="height:550px;">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"><?php echo $talent['first_name']." ".$talent['last_name']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $talent['sex'];?>,&nbsp;<?php echo getAge($talent['dob']);  ?> Years</h5>
            </div>
            <div class="widget-user-image">
            <img class="img-circle" src="<?php echo $talent['photo1_url']; ?>"  alt="talent_photo"  />
            </div>
            <div class="box-footer">
            <div class="row">
            
                  
              <ul class=" nav nav_stacked">
			   <li><a href="#"><h4 style="color:black;">Nationality</h4></a></li>
			   <li><a href="#"><?php echo $talent['nationality'];?></a></li>
                <li><a href="#"><h4 style="color:black;">Professional Skills</h4></a></li>
                <li><a href="#"><?php echo list_talent_experience($talent['talent_id']);?></a></li>
                <li><a href="#" ><h4 style="color:black;">spoken Languages</h4></a></li>
                <li><a href="#"><?php echo list_talent_language($talent['talent_id']);?></a></li>
              </ul>
            </div>
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
       
                    <span class="description-text"><button type="button" class="btn btn-warning btn-circle btn-lg"><i href="delete.html" class="glyphicon glyphicon-trash"></i></button></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <span class="description-text"><button type="button" class="btn btn-info btn-circle btn-lg"><i class="glyphicon glyphicon-user"></i></button></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                 
                    <span class="description-text"><button type="button" class="btn btn-danger btn-circle btn-lg"><i class="glyphicon glyphicon-heart"></i></button></span>
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