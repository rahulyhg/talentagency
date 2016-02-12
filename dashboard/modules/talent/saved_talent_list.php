<?php
$tbl2 = new HTML_Table('', 'data-table table table-striped table-bordered', array('data-title'=>'List of Draft Talents'));
$tbl2->addTSection('thead');
$tbl2->addRow();
$tbl2->addCell('Photo', '', 'header');
$tbl2->addCell('Full Name', '', 'header');
$tbl2->addCell('Gender', '', 'header');
$tbl2->addCell('Age', '', 'header');
$tbl2->addCell('Height', '', 'header');
$tbl2->addCell('weight', '', 'header');
$tbl2->addCell('Nationality', '', 'header');
$tbl2->addCell('Experience', '', 'header');
$tbl2->addCell('Actions', '', 'header');
$tbl2->addTSection('tbody');

$mysql ='SELECT * FROM tams_talent_experience WHERE talent_id ="$talent_id"'; 
$experience = DB::queryFirstRow($mysql);
$experience_item_id = $experience['experience_item_id'];
$talent_experience_item_id = $experience ['talent_experience_item_id'];
$created_on = $experience['created_on'];
$created_by = $experience['created_by'];
$last_modified_by = $experience['last_modified_by'];
$last_modified_on = $experience['last_modified_on'];

 
$sql = 'SELECT * FROM tams_talent WHERE talent_status = "draft"';
$get_talents = DB::query($sql);
foreach($get_talents as $talent) { 
$tbl2->addRow();
$tbl2->addCell("<a href='".$_SERVER['PHP_SELF']."?route=modules/talent/view_talent_profile&talent_id=".$talent['talent_id']."'><img src='".$talent['photo1_url']."' alt='Photo1' width='100px' height='100px'; /></a>");
$tbl2->addCell($talent['first_name']." ".$talent['last_name']);
$tbl2->addCell($talent['sex']);
$tbl2->addCell(getAge($talent['dob']));
$tbl2->addCell($talent['height_cm']);
$tbl2->addCell($talent['weight_kg']);
$tbl2->addCell($talent['nationality']);
$tbl2->addCell(list_talent_experiences($experience['talent_id']));
$tbl2->addCell("<a class='pull btn btn-warning btn-circle btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/edit_talent_profile&talent_id=".$talent['talent_id']."'>Edit Talent&nbsp;&nbsp;<span class='glyphicon glyphicon-edit'></span></a><br/>
				<a class='pull btn btn-danger btn-circle btn-xs' href ='#'>Save Talent&nbsp;&nbsp;<span class='glyphicon glyphicon-heart'></span></a><br/><a class='btn btn-info btn-circle btn-xs' href ='".$_SERVER['PHP_SELF']."?route=modules/talent/view_talent_profile&talent_id=".$talent['talent_id']."'>View Profile&nbsp;&nbsp;<span class='glyphicon glyphicon-user'></span></a>");
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
				<h3>Search  Talent </h3> 
	    		<p>You  may search either by first or last name</p> 
				<form  method="post" action=""  id="searchform"> 
				  <input  type="text" name="find">
                  	
				 <Select NAME="field"><option selected>Filter by</option>
						<Option VALUE="first_name">First Name</option>
						<Option VALUE="last_name">Last Name</option>
						<Option VALUE="nationality">Nationality</option>
						<Option VALUE="height_cm">height</option>
						<Option VALUE="dob">Age</option>
						<Option VALUE="eye_color">eye_color</option>
					  <Option VALUE="sex">gender</option>
					   <Option VALUE="experience_item_name">experience_item_name</option>
				  </select>
				  <input  type="submit" name="submit" value="Search"> 
				</form>
			
                <div class="box-footer">
                  <div class="row">
				  <?php
				  
						if(isset($_POST['submit'])){ 
							  //do  something here in code 
							  if(preg_match("/^[A-Za-z]+/", $_POST['find'])){ 
							   $find=$_POST['find'];
						//connect  to the database 
							  $db=mysqli_connect ("localhost",  "root", "", "teamsutlej_talent") or die ('I cannot connect  to the database because: ' . mysql_error());	   
							  
							  //-select  the database to use 
							/*  $mydb=mysql_select_db("teamsutlej_talent"); */
							  //-query  the database table 
							  $sql="SELECT talent_id, first_name, last_name , nationality , height_cm , dob , eye_color , sex FROM tams_talent WHERE  first_name LIKE '%" . $find . "%' OR last_name LIKE '%" . $find  ."%' OR nationality LIKE '%" . $find ."%' OR height_cm LIKE '%" . $find . "%'  OR dob LIKE '%" . $find . "%' OR eye_color LIKE '%" . $find ."%' OR sex LIKE '%" . $find . "%'"; 
								//-run  the query against the mysql query function 
							$talent= DB::queryFirstRow($sql);
							$result=mysqli_query($db,$sql);
						//-create  while loop and loop through result set
							$html="";
							  while($row=mysqli_fetch_array($result)){ 
							  
								echo"<div>".$row['first_name']."</div>"; 
								echo "<div>".$row['last_name']."</div>"; 
								echo "<div>".$row['nationality']."</div>"; 
								echo "<div>".$row['height_cm']."</div>"; 
								echo "<div>".getAge($row['dob'])."</div>";
								echo "<div>".$row['eye_color']."</div>";
								echo "<div>".get_talent_gender($row['talent_id'])."</div>";
								echo "<br/>";
								
							    //-display the result of the array 
							//  echo "<p><span><h4>" .$row['first_name']."".$row['last_name']."</h4></span>"
					//	."<span><h4>".$row['dob']."</h4></span>".
					//	"<span><h4>".$row['nationality']."</h4></span>".
                      // 	"<span><h4>".$row['height_cm']."</h4></span>"."</p>";
							 
							  //  echo "<ul>\n"; 
							 // echo "<li>" . "<a  href =".$_SERVER['PHP_SELF']."?route=modules/talent/view_talent_profile&talent_id=".$talent['talent_id'].">" . $first_name . " " . $last_name ." ". $nationality . " " .$height_cm . " " . $dob . " " . $eye_color . " " . $sex . "</a></li>\n"; 
							

						//	  echo "</ul>"; 
								}
								
						}
						
							  else{ 
							  echo  "<p>Please enter a search query.</p>"; 
							  }
						}	  		
		?>
			<div class="box-body">
				<?php  echo $tbl2->display(); ?>
            </div><!-- /.box-body -->
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			</div>
			
		</div><!-- /.box -->

	</div><!-- /.row -->

</section><!--  /.content -->