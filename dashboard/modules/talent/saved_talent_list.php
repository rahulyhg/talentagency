<?php

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
				<h3>Search  Talent </h3> 
	    		<p>You  may search either by first or last name</p> 
				<form  method="post" action=""  id="searchform"> 
				  <input  type="text" name="name"> 
				  <input  type="submit" name="submit" value="Search"> 
				</form>
                <div class="box-footer">
                  <div class="row">
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
						//-create  while loop and loop through result set 
							  while($row=mysqli_fetch_array($result)){ 
									  $first_name  =$row['first_name']; 
									  $last_name=$row['last_name']; 
									  $talent_id=$row['talent_id']; 
							  //-display the result of the array 
							    echo "<ul>\n"; 
							  echo "<li>" . "<a  href =".$_SERVER['PHP_SELF']."?route=modules/talent/view_talent_profile&talent_id=".$talent['talent_id'].">" .$first_name . " " . $last_name . "</a></li>\n"; 
							
$tbl = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Users'));
$tbl->addTSection('thead');
$tbl->addRow();
$tbl->addCell('Photo', '', 'header');
$tbl->addCell('Full Name', '', 'header');
$tbl->addCell('Gender', '', 'header');
$tbl->addCell('Age', '', 'header');
$tbl->addCell('PhoneNo', '', 'header');
$tbl->addCell('Email', '', 'header');
$tbl->addCell('Nationality', '', 'header');
$tbl->addCell('Brief', '', 'header');
$tbl->addCell('Actions', '', 'header');
$tbl->addTSection('tbody');


$sql = 'SELECT * FROM tams_talent WHERE talent_id = "$row[talent_id]"';
$get_talents = DB::query($sql);
foreach($get_talents as $talent) { 
$tbl->addRow();
$tbl->addCell($talent['photo1_url']);
$tbl->addCell($talent['first_name']." ".$talent['last_name']);
$tbl->addCell($talent['sex']);
$tbl->addCell(getAge($talent['dob']));
$tbl->addCell($talent['mobile_no']);
$tbl->addCell($talent['email_id']);
$tbl->addCell($talent['nationality']);
$tbl->addCell($talent['brief']);
 
$tbl->addCell("<a class='pull btn btn-info btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/view_talent_profile&talent_id=".$talent['talent_id']."'>View Profile&nbsp;&nbsp;<span class='glyphicon glyphicon-user'></span></a>");
}
							  echo "</ul>"; 
								}
						}
							  else{ 
							  echo  "<p>Please enter a search query</p>"; 
							  }
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