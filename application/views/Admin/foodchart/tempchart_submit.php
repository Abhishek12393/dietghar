<?php
	// pr($message);die;
 
	$this->view('Admin/header.php');
	$this->view('Admin/sidebar.php');
 
 ?>

</style>
 
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-light">

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<!-- <a href="#" class="breadcrumb-item">Food</a> -->
					<span class="breadcrumb-item active">Final Chart Submission</span>
				</div>
			</div>
		</div>
	</div>
	<!-- /page header -->


			<!-- Content area -->
			<div class="content">
				<!-- Form inputs -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title font-weight-bold">Chart Id : <?=$meal_chart_id?></h5>
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<fieldset class="mb-3">
									<div class="form-group row">
											<label class="col-form-label">Response</label>
											<div class="col-lg-12">
												<?php 
													foreach($temptb_iresp as $day=>$resp){
														$day++;
														echo "Day $day submission is $resp <br>";
													}
									 
												?>
											</div>
									</div>
								</fieldset>
							</div>
						</div>
						<form action="<?=base_url('Admin/clientfoodchart_final_submit')?>" method="POST" target="_parent">

      				<input type="hidden" name="cust_id" value="<?=$cust_id?>" >
      				<input type="hidden" name="meal_chart_id" value="<?=$meal_chart_id?>" >
							<?php  if(isset($renewchart) && $renewchart == 1) {?>
								<input type="hidden" name="renewchart" value="1" >
							<?php } ?>
							<div class="row">
								<div class="col-md-12">
									<fieldset class="mb-3">
										<!-- <div class="form-group row">
											<label class="col-form-label">BMR</label>
											<div class="col-lg-12">
												<input type="text" class="form-control" id="bmr" name="bmr" value="" readonly="true">
												<input type="hidden" name="id"  value="">
											</div>
										</div> -->
									</fieldset>
								</div>
								<div class="col-lg-4">
                    <input type="submit" name="submit" value="Final Submit" class="btn btn-primary">
									</div>
							</div>

						</form>
					</div> <!-- /card body -->
				</div>
				<!-- /form inputs -->
 
			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<?php  $this->view('Admin/footer.php'); ?>
 
</body>
</html>
 
<script>
 
       
       
</script>