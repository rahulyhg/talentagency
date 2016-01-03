<?php
//Declerations of variables may be NULL

function get_period_salary($period_id, $department_id){
	
	$salary = DB::queryFirstField("SELECT
   SUM(`gross_salary`)
FROM
    `payslips`
WHERE (`period_id` =$period_id
    AND `department_id` =$department_id)
GROUP BY `period_id`, `department_id`;");
	if ($salary) {
	
	return $salary;	
	} else {
	return 0;
	}
	
}
$period_id = '';

if(isset($_SESSION['company_id']))
{
	$company_id = $_SESSION['company_id'];
}
$users_count = DB::queryFirstField("SELECT COUNT(*) FROM users where company_id=$company_id; ");
$department_count = DB::queryFirstField("SELECT COUNT(*) FROM departments where company_id=$company_id; ");
$locations_count = DB::queryFirstField("SELECT COUNT(*) FROM locations where company_id=$company_id; ");
$employee_count = DB::queryFirstField("SELECT COUNT(*) FROM employees where company_id=$company_id; ");

$sql_department = "SELECT
    `employees`.`department_id`
    , `departments`.`department_name`
    , SUM(`employees`.`salary`) AS `salary`
FROM
    `employees`
    INNER JOIN `departments` 
        ON (`employees`.`department_id` = `departments`.`department_id`)
WHERE (`employees`.`company_id` =$company_id)
GROUP BY `employees`.`department_id`;";
$departments = DB::query($sql_department);					        
$salary_total = DB::queryFirstField("SELECT
    SUM(`salary`) AS `salary_total`
    , `company_id`
FROM
    `employees`
WHERE (`company_id` =$company_id);");

$sql = "SELECT * FROM locations WHERE company_id = $company_id ";
$locations = DB::query($sql);					
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
          <?php echo	get_company_name($company_id); ?> 

            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">My Company</a></li>
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
		                  <span class="info-box-text">Users</span>
		                  <span class="info-box-number"><?php echo $users_count; ?></span>
		           </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
</div>
<div class="col-md-3 col-sm-6 col-xs-12" >        
		 <div class="info-box">
		 
		     <span class="info-box-icon bg-red"><i class="fa fa-sitemap"></i></span>		     
		           <div class="info-box-content">
		                  <span class="info-box-text">Departments</span>
		                  <span class="info-box-number"><?php echo $department_count; ?></span>
		           </div><!-- /.info-box-content -->
		       	           
		</div><!-- /.info-box -->
</div>	 
<div class="col-md-3 col-sm-6 col-xs-12" >        
		 <div class="info-box">
		     <span class="info-box-icon bg-green"><i class="fa  fa-building-o"></i></span>
		           <div class="info-box-content">
		                  <span class="info-box-text">Locations</span>
		                  <span class="info-box-number"><?php echo $locations_count; ?></span>
		           </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
</div>
<div class="col-md-3 col-sm-6 col-xs-12" >        
		 <div class="info-box">
		     <span class="info-box-icon bg-orange"><i class="fa fa-flag-o"></i></span>
		           <div class="info-box-content">
		                  <span class="info-box-text">Employees</span>
		                  <span class="info-box-number"><?php echo $employee_count; ?></span>
		           </div><!-- /.info-box-content -->
		</div><!-- /.info-box -->
</div>
</div>

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Monthly Salary Trends</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <p class="text-center">
                        <strong>Gross Salary Trend by Departments: </strong>
                      </p>
                      <div style="height: 380px;width: 100%;" id="stackedChart" class="chart-responsive">
                        
                      </div><!-- /.chart-responsive -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                      <p class="text-center">
                        <strong>Current Month Department Salaries</strong>
                      </p>
                      
                      <?php 
                      if($departments){
					 
                      $i = 0; 
                      foreach ($departments as $dept){ 
                     if($i < 5 ){
					 	$i++;	
					 }  else {
					 	$i = 1;
					 }
                       
                      ?> 
                      
                      <div class="progress-group">
                        <span class="progress-text"><?php echo $dept['department_name']; ?></span>
                        <span class="progress-number"><?php echo "HTG ".round2dp($dept['salary']); ?></span>
                        <div class="progress sm">
                           <div class="progress-bar progress-bar-<?php if ($i == 1){ echo 'aqua';} elseif ($i == 2){ echo 'red';} elseif ($i == 3) { echo 'green';} elseif ($i == 4) { echo 'yellow';} ?>" style="width: <?php echo (($dept['salary']/$salary_total) * 100).'%'; ?>;" ></div>
                        </div>
                      </div><!-- /.progress-group -->
                      
                       <?php }  ?>	
                       
                      <?php }  ?>	
                     
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">

                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
                      </div><!-- /.row -->
 <!-- Default box 2-->
<div class="row">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Locations Map</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box"><i class="fa fa-minus"></i></button><button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
			<div id="map" style="width: 100%; height: 500px;"></div>
	
            </div><!-- /.box2-body -->
            <div class="box-footer">
             <small></small>
            </div><!-- /.box2-footer-->
          </div><!-- /.box2 -->            
          </div><!-- /.row -->

</section><!-- /.content -->
<script type="text/javascript">
(function($) {
    var series = [
<?php 
$sql = "SELECT t.period_id , t.period_name  FROM (SELECT
	  `period_id`		
	, `period_name`
	, `start_date`
FROM
    `payroll_calendar`
ORDER BY `start_date` DESC LIMIT 12) t ORDER BY t.start_date ASC";
$periods = DB::query($sql); 
 
$sql = "SELECT * FROM departments WHERE company_id=$company_id AND status = 1"; 
$depts = DB::query($sql);
if($depts){
	

foreach($depts as $department) {
	$department_name = $department['department_name'];
?>	
	 {
	
        data: [  
<?php  if($periods){ 
	$i = 0;
	$len = count($periods);
 foreach($periods as $period){  
	
	$data =  "[ ".$i.",".get_period_salary($period['period_id'],$department['department_id'])." ]";
	
	if ($i <> ($len - 1)) {
      $data .= " , ";  // last
    } else  {
	  $data .= " ";
	}
    echo $data;
    $i++;
 	}  } ?> ],
        label: "<?php echo $department_name; ?>" 
        },
<?php } } ?>];

    var options = {
        xaxis: {
<?php  if($periods){ 
	$i = 0;
	$len = count($periods);
	?>
        ticks: [
<?php 	foreach($periods as $period){
	$tick =  "[ ".$i.",'".$period['period_name']."' ]";
	
	if ($i <> ($len - 1)) {
      $tick .= " , ";  // last
     } else  {
	  $tick .= " ";
	}
    echo $tick;
    $i++;
    } ?>
      ],
<?php	} ?>
            tickLength:0
        },
        series: {
            bars: {
                show: true,
                barWidth: .5,
                align: "center", 
                fill: 1
            },
            stack: true
        },
    yaxis: {
    	tickLength:0,
    	  tickFormatter:function suffixFormatter(val, axis) {
		    if (val > 1000000)
		      return (val / 1000000).toFixed(axis.tickDecimals) + " Million";
		    else if (val > 1000)
		      return (val / 1000).toFixed(axis.tickDecimals) + " k";
		    else
		      return val.toFixed(axis.tickDecimals) + "";
		  } 
    	
    	
    	} 
   
    };


    $.plot("#stackedChart", series, options);
 })(jQuery);
</script>
 <script type="text/javascript">
    var locations = [
<?php foreach($locations as $location) {  
$lat = $location['lat'];
$long = $location['long'];
$location_id = $location['location_id'];
 
if (($lat <> 0) AND ($long <> 0)){
	echo "['".$location['location_name']."' , ".$lat.",".$long.",".$location_id."], ";
}
}
?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      scrollwheel: false,
      center: new google.maps.LatLng(19.22, -72.60),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>