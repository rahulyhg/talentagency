

<?php
$height_cm               = ""; 
if(isset($_GET['query'])) {
	
if (trim($_GET{'query'}) <> "" ){
	
$query = trim(strtolower($_GET{'query'}));


$sql = 'SELECT * FROM tams_talent WHERE  ';
$sql .= "( LOWER(height_cm) LIKE '%".$query."%' ) ";	
$get_talents = DB::query($sql);

	
}
}

?>

<!--   Content Header (Page header) -->


<section class="content-header">
	<h1>
		Talents Search By Height

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
			Search Talent By Height
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
                  <h3 class="box-title">Please Enter Height to Search</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
				 <p>
				<form  method="GET" action=""  id="searchform"> 
				<input type="hidden" value="modules/talent_lists/search_by_height" name="route" />
				 
			    <div class="input-group">
                <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                 <span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#contains">Between</a></li>
					  <li class="divider"></li>
                      <li><a href="#its_equal">It's equal</a></li>
					  <li class="divider"></li>
                      <li><a href="#greather_than">Greather than ></a></li>
					  <li class="divider"></li>
                      <li><a href="#less_than">Less than < </a></li>
					  <li class="divider"></li>
                     
                    </ul>
                </div>
                <input type="text" class="serchform" name="query" placeholder="Enter Talent height.." />
                <input  type="submit" class="searchbutn" name="submit" value="Search" />
            </div>
				
				 
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
<script>
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});
</script>