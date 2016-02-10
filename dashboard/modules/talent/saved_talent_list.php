<?php

if(isset($_POST['submit'])){ 
	  //do  something here in code 
	  if(preg_match("/^[A-Za-z]+/", $_POST['name'])){ 
	   $name=$_POST['name'];
//connect  to the database 
	  $db=mysqli_connect ("localhost",  "root", "", "teamsutlej_talent") or die ('I cannot connect  to the database because: ' . mysql_error());	   
	  
	  //-select  the database to use 
	/*  $mydb=mysql_select_db("teamsutlej_talent"); */
	  //-query  the database table 
	  $sql="SELECT talent_id, first_name, last_name FROM tams_talent WHERE  first_name LIKE '%" . $name . "%' OR last_name LIKE '%" . $name  ."%'"; 
		//-run  the query against the mysql query function 
	$talent= DB::queryFirstRow($sql);
	$result=mysqli_query($db,$sql);

	
	  }
	  else{ 
	  echo  "<p>Please enter a search query</p>"; 
	  }
}	  
?>
<!--   Content Header (Page header) -->
<section class="content-header">
	<h1>
		Saved Talent

		<small>
			Talent List
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
			List Talent
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
                  <h3 class="box-title">Search for Talent</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
				<h3>Search  Talent Details</h3> 
	    		<p>You  may search either by first or last name</p> 
				<form  method="post" action=""  id="searchform"> 
				  <input  type="text" name="name"> 
				  <input  type="submit" name="submit" value="Search"> 
				</form>
                <div class="box-footer">
                  <div class="row">
				  <?php
//-create  while loop and loop through result set 
	  while($row=mysqli_fetch_array($result)){ 
	          $first_name  =$row['first_name']; 
	          $last_name=$row['last_name']; 
	          $talent_id=$row['talent_id']; 
	  //-display the result of the array 
	  echo "<ul>\n"; 
	  echo "<li>" . "<a  href =".$_SERVER['PHP_SELF']."?route=modules/talent/view_talent_profile&talent_id=".$talent['talent_id'].">" .$first_name . " " . $last_name . "</a></li>\n"; 
	  echo "</ul>"; 
		} 
		?>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			</div>
			
		</div><!-- /.box -->

	</div><!-- /.row -->

</section><!--  /.content -->