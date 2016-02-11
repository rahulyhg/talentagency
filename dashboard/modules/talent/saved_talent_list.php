<?php
if(isset($_post['search']))
 {
	$valuetosearch=$_post['valuetosearch'];
	$query="SELECT * FROM `user` WHERE CONCAT(`first_name`,`last_name`,`nationality`,`height_cm`,`dob`) LIKE '%".$valuetosearch.");
	$search_result=filterTable($query);
	
	
}
else{
	
	$query ="SELECT * FROM `user`'';
	$search_result=filterTable($query);
	
}
function filterTable($query)
{
	$connect=mysqli_connect ("localhost",  "root", "", "teamsutlej_talent");
	$filter_Result=mysqli_query($connect,$query);
	return filter_Result;
	
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
				<form action="" method="post"> 
				  <input  type="text" name="valuetosearch" placeholder="value to search"><br><br>
				  
				  <input  type="submit" name="search" value="Filter"> <br><br>
				 <table>
				 <tr>
				 <th>first_name</th>
				 <th>last_name</th>
				<th>nationality</th>
				<th>height_cm</th>
				<th>dob</th>
				</tr>
				<?php while($row =mysqli_fetch_array($search_result)):?>
				<tr>
				<td><?php $row['first_name'];?></td>
				<td><?php $row['last_name'];?></td>
				<td><?php $row['nationality'];?></td>
				<td><?php $row['height_cm'];?></td>
				<td><?php $row['dob'];?></td>
				</tr>
				<?php endwhile;?>
				</table>
				</form>
                <div class="box-footer">
                  <div class="row">
				
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
			</div>
			
		</div><!-- /.box -->

	</div><!-- /.row -->

</section><!--  /.content -->
