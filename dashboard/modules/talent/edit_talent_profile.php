<?php

?>

<!--   Content Header (Page header) -->
<section class="content-header">
	<h1>
		Edit Talent Profile

		<small>
			Editing Talent Profile
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
			Edit Talent Profile
		</li>
	</ol>
</section>

<!-- Main content -->
<section   class="content">
	<div class="row">

		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">
					Editing XXXXX's Profile
				</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Open/Close This Box">
						<i class="fa fa-minus">
						</i>
					</button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times">
						</i>
					</button>
				</div>
			</div>
 				<div class="box-body">
					<div class="row">
<div class="col-xs-3"> <!-- required for floating -->
					  <!-- Nav tabs -->
					  <ul class="nav nav-tabs tabs-left">
					    <li class="active"><a href="#basic" data-toggle="tab">Basic Information</a></li>
					    <li><a href="#work" data-toggle="tab">Work Information</a></li>
					    <li><a href="#contact" data-toggle="tab">Contact Information</a></li>
					    <li><a href="#contract" data-toggle="tab">Contract Information</a></li>
					    <li><a href="#address" data-toggle="tab">Address</a></li>
					    <li><a href="#salary" data-toggle="tab">Salary</a></li>
					    <li><a href="#emergency" data-toggle="tab">Emergency Contact Information</a></li>
					    <li><a href="#leave" data-toggle="tab">Leave Entitlements </a></li>
					    <li><a href="#payment" data-toggle="tab">Payment Methods  </a></li>
					    <li><a href="#deductions" data-toggle="tab">Deductions </a></li>
					    <li><a href="#benefits" data-toggle="tab">Benefits </a></li>
					    <li><a href="#tax" data-toggle="tab">Tax Information</a></li>
					  </ul>
</div>					
<div class="col-xs-9">
  <!-- Tab panes -->
  <div class="tab-content">
					  <!-- Basic Information Form Start -->
					    <div class="tab-pane active" id="basic">
							    <h3 class="box-title">Basic Information</h3>
					    </div><!-- Basic Information Form End -->
					    <!-- Work information Form Start -->
					    <div class="tab-pane" id="work">
							    <h3 class="box-title">Work Information</h3>
					    </div><!-- Work information Form End -->
	</div>
			<?php echo $message; ?>
</div>					    
					 
					</div> <!-- /.row -->
				</div><!-- /.box-body -->
			 
			<div class="box-footer">
				<small>
				</small>
			</div><!-- /.box-footer-->
		</div><!-- /.box -->

	</div><!-- /.row -->

</section><!--  /.content -->					