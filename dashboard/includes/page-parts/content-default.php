<?php
// php search data in mysql database using PDO
// set data in input text

$talent_id = "";
$first_name = "";
$last_name = "";
$dob = "";
$height_cm = "";
$weight_kg ="";
$sex="";
$nationality="";

if(isset($_POST['Find']))
{
        // connect to mysql
    try {
        $pdoConnect = new PDO("mysql:host=localhost;dbname=teamsutlej_talent","root","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
    // id to search
  // $talent_id = $_POST['talent_id'];
    
     // mysql search query
    $pdoQuery = "SELECT * FROM tams_talent WHERE talent_id = :talent_id";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    //set your id to the query id
    $pdoExec = $pdoResult->execute(array(":talent_id"=>$talent_id));
    
    if($pdoExec)
    {
            // if id exist 
            // show data in inputs
        if($pdoResult->rowCount()>0)
        {
            foreach($pdoResult as $row)
            {
                $talent_id = $row['talent'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $dob = $row['dob'];
				$height_cm = $row['height_cm'];
				$weight_kg =$row['weight_kg'];
				$nationality=$row['nationality'];
            }
        }
            // if the id not exist
            // show a message and clear inputs
        else{
            echo 'No Data With This ID';
        }
    }else{
        echo 'ERROR Data Not Inserted';
    }
}

?>
	
<!--style>
	div.xAxis div.tickLabel 
{    
    transform: rotate(-45deg);
    -ms-transform:rotate(-45deg); /* IE 9 */
    -moz-transform:rotate(-45deg); /* Firefox */
    -webkit-transform:rotate(-45deg); /* Safari and Chrome */
    -o-transform:rotate(-45deg); /* Opera */
    /*rotation-point:25% 25%;*/ /* CSS3 */
    /*rotation:270deg;*/ /* CSS3 */
}
	
</style -->
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Talent Agency Management System

            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
<section class="content">
<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12" >        
		 <div class="info-box">
		     <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
		           <div class="info-box-content">
		                  <span class="info-box-text">Talent Pool</span>
		                  <span class="info-box-number"><?php echo 507; ?></span>
		           </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
</div>
<div class="col-md-3 col-sm-6 col-xs-12" >        
		 <div class="info-box">
		 
		     <span class="info-box-icon bg-red"><i class="fa fa-sitemap"></i></span>		     
		           <div class="info-box-content">
		                  <span class="info-box-text">Clients</span>
		                  <span class="info-box-number"><?php echo 25 ?></span>
		           </div><!-- /.info-box-content -->
		       	           
		</div><!-- /.info-box -->
</div>	 
<div class="col-md-3 col-sm-6 col-xs-12" >        
		 <div class="info-box">
		     <span class="info-box-icon bg-green"><i class="fa  fa-building-o"></i></span>
		           <div class="info-box-content">
		                  <span class="info-box-text">System Users</span>
		                  <span class="info-box-number"><?php echo 22 ?></span>
		           </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
</div>
<div class="col-md-3 col-sm-6 col-xs-12" >        
		 <div class="info-box">
		     <span class="info-box-icon bg-orange"><i class="fa fa-flag-o"></i></span>
		           <div class="info-box-content">
		                  <span class="info-box-text">Emails Sent</span>
		                  <span class="info-box-number"><?php echo 1235; ?></span>
		           </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
</div>
</div>

          <div class="row">
            <div class="col-md-12 ">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Search for Talent</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
             <div class="col-md-8 col-xs-offset-2">
            <div class="input-group" id="adv-search">
                <input type="search" class="form-control" placeholder="Search for Talent" />
                <div class="input-group-btn search-panel">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                             <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Filter by</span> <span class="caret"></span>
							</button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form" action="" method="post">
                                  <div class="form-group">
                                    <select class="form-control">
                                        <option value="0" selected>All Talent</option>
                                        <option value="1">First Name</option>
                                        <option value="2">Last Name</option>
                                        <option value="3">Age</option>
                                        <option value="4">Height</option>
										<option value="5">Weight</option>
										<option value="6">Nationality</option>
										<option value="7"></option>
                                    </select>
                                  </div>
                                </form>
                            </div>
                        </div>
                        <button type="submit" name="Find" value="Find Data" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div> 
                    </div><!-- /.col -->		
                    <div class="col-md-4">
                       
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">

                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
                      </div><!-- /.row -->
					  </div>
 <!-- Default box 2-->
<div class="row">
   
          </div><!-- /.row -->

</section><!-- /.content --> 