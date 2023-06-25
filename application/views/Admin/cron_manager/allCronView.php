<?php
 $this->load->view('Admin/header2');
#include('../header2.php');?>
<script src="https://dietghar.com/diet/admin/assets/functions/type.js"></script> <!-- <==Not confirmed whats this - at-->
<script src="https://dietghar.com/diet/admin/assets/functions/typesub.js"></script>
<!-- Main content -->
 


<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">
	<?php if($_GET['m']): ?>
	<div class="alert alert-primary border-0 alert-dismissible">
		<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
		<span class="font-weight-semibold">Message :</span> <?=$_GET['m']; ?>
	</div>
	<?php endif; ?>
 
		<!-- Hover rows -->
		<div class="card bg-dark">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">All Cron View</h5>
			</div>
				<?php 
				
				$data2 =  file_get_contents("./cron_ci/log/updateFoodCatInFc.json"); 
				$data2 =  json_decode( $data2,true);

				$datafcunit =  file_get_contents("./cron_ci/log/updateUnitsInFCNames.json"); 
				$datafcunit =  json_decode( $datafcunit,true);

				$no_data =  file_get_contents("./cron_ci/log/updateNoOfChartIndaystb.json"); 
				$no_data =  json_decode( $no_data,true);

				$fcatdata =  file_get_contents("./cron_ci/log/updateFoodCatIndaystb.json"); 
				$fcatdata =  json_decode( $fcatdata,true);
				?>
				<div class="row">
					<div class="col-sm-6 col-md-6 col-xl-6">
						<a target="_blank" href="<?=base_url().'Cron/test'; ?>">Test Cron -Direct</a>
					</div>
				</div>
				<div class="row">
				<div class="col-sm-6 col-md-6 col-xl-6">
					
					
					<div class="card text-center">
						<div class="card-body">
							<h6 class="font-weight-semibold mb-0 mt-1">Update FoodCat In Fc Json</h6>
							<div class="text-muted mb-3"><a href="<?=base_url().'Cron/updateFoodCatInFc'; ?>">Execute</a></div>
							<div class="text-muted mb-3"><a target="_blank" href="<?=base_url().'cron_ci/log/updateFoodCatInFc.json'; ?>">View Cron</a></div>
							<div class="text-muted mb-3"><a target="_blank" href="<?=base_url().'Admin_CronManager/viewcron?name=updateFoodCatInFc'; ?>">Print Cron</a></div>
							<div class="svg-center position-relative mb-1" id="progress_percentage_two"></div>
						</div>

						<div class="card-body border-top-0 pt-0">
							<div class="row">
								<div class="col-4">
									<div class="text-uppercase font-size-xs text-muted">Index</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=$data2['index'];?></h5>
								</div>
								
								<div class="col-4">
									<div class="text-uppercase font-size-xs text-muted">Last Exected Time </div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=date("d-m-Y H:i:s",$data2['exetime'])?></h5>
								</div>
								
								<div class="col-4">
									<div class="text-uppercase font-size-xs text-muted">Active</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?php if(strtotime("now")-$data2['exetime'] > 600){ echo "NO";}else{ echo "YES";} ?></h5>
								</div>
							</div>
						</div>
					</div>
	 
					
				</div>
				<div class="col-sm-6 col-md-6 col-xl-6">
					
					
					<div class="card text-center">
						<div class="card-body">
							<h6 class="font-weight-semibold mb-0 mt-1">Update Unit In Fc Json</h6>
							<div class="text-muted mb-3"><a href="<?=base_url().'Cron/updateUnitsInFCNames'; ?>">Execute</a></div>
							<div class="text-muted mb-3"><a target="_blank" href="<?=base_url().'cron_ci/log/updateUnitsInFCNames.json'; ?>">View Cron</a></div>
							<div class="text-muted mb-3"><a target="_blank" href="<?=base_url().'Admin_CronManager/viewcron?name=updateUnitsInFCNames'; ?>">Print Cron</a></div>
							<div class="svg-center position-relative mb-1" id="progress_percentage_two"></div>
						</div>

						<div class="card-body border-top-0 pt-0">
							<div class="row">
								<div class="col-4">
									<div class="text-uppercase font-size-xs text-muted">Index</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=$datafcunit['index'];?></h5>
								</div>
								
								<div class="col-4">
									<div class="text-uppercase font-size-xs text-muted">Last Exected Time </div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=date("d-m-Y H:i:s",$datafcunit['exetime'])?></h5>
								</div>
								
								<div class="col-4">
									<div class="text-uppercase font-size-xs text-muted">Active</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?php if(strtotime("now")-$datafcunit['exetime'] > 600){ echo "NO";}else{ echo "YES";} ?></h5>
								</div>
							</div>
						</div>
					</div>
	 
					
				</div>
				<div class="col-sm-6 col-md-6 col-xl-6">
					<div class="card text-center">
						<div class="card-body">
							<h6 class="font-weight-semibold mb-0 mt-1">Update FoodCat In Days tables</h6>
							<div class="text-muted mb-3"><a target="_blank" href="<?=base_url().'Cron/updateFoodCatIndaystb'; ?>">Execute</a></div>
							<div class="text-muted mb-3"><a target="_blank" href="<?=base_url().'cron_ci/log/updateFoodCatIndaystb.json'; ?>">View Cron</a></div>
							<div class="text-muted mb-3"><a target="_blank" href="<?=base_url().'Admin_CronManager/viewcron?name=updateFoodCatIndaystb'; ?>">Print Cron</a></div>
							<div class="svg-center position-relative mb-1" id="progress_percentage_two"></div>
						</div>

						<div class="card-body border-top-0 pt-0">
							<div class="row">
								<div class="col-3">
									<div class="text-uppercase font-size-xs text-muted">table calorie</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=get_table_name($fcatdata['tbindex']);?></h5>
								</div>
								<div class="col-2">
									<div class="text-uppercase font-size-xs text-muted">Row</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=$fcatdata['rowindex'];?></h5>
								</div>
								<div class="col-2">
									<div class="text-uppercase font-size-xs text-muted">Shift</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=$fcatdata['shiftindex'];?></h5>
								</div>
								
								<div class="col-3">
									<div class="text-uppercase font-size-xs text-muted">Last Exected Time </div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=date("d-m-Y H:i:s",$fcatdata['exetime'])?></h5>
								</div>
								
								<div class="col-2">
									<div class="text-uppercase font-size-xs text-muted">Active</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?php if(strtotime("now")-$fcatdata['exetime'] > 600){ echo "NO";}else{ echo "YES";} ?></h5>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-xl-6">
					<div class="card text-center">
						<div class="card-body">
							<h6 class="font-weight-semibold mb-0 mt-1">Update No of Chart In Days tables</h6>
							<div class="text-muted mb-3"><a target="_blank" href="<?=base_url().'Cron/updateNoOfChartIndaystb'; ?>">Execute</a></div>
							<div class="text-muted mb-3"><a target="_blank" href="<?=base_url().'cron_ci/log/updateNoOfChartIndaystb.json'; ?>">View Cron</a></div>
							<div class="text-muted mb-3"><a target="_blank" href="<?=base_url().'Admin_CronManager/viewcron?name=updateNoOfChartIndaystb'; ?>">Print Cron</a></div>
							<div class="svg-center position-relative mb-1" id="progress_percentage_two"></div>
						</div>

						<div class="card-body border-top-0 pt-0">
							<div class="row">
								<div class="col-3">
									<div class="text-uppercase font-size-xs text-muted">table calorie</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=get_table_name($no_data['tbindex']);?></h5>
								</div>
								<div class="col-2">
									<div class="text-uppercase font-size-xs text-muted">Row</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=$no_data['rowindex'];?></h5>
								</div>
								<div class="col-2">
									<div class="text-uppercase font-size-xs text-muted">Shift</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=$no_data['shiftindex'];?></h5>
								</div>
								
								<div class="col-3">
									<div class="text-uppercase font-size-xs text-muted">Last Exected Time </div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?=date("d-m-Y H:i:s",$no_data['exetime'])?></h5>
								</div>
								
								<div class="col-2">
									<div class="text-uppercase font-size-xs text-muted">Active</div>
									<h5 class="font-weight-semibold line-height-1 mt-1 mb-0"><?php if(strtotime("now")-$no_data['exetime'] > 600){ echo "NO";}else{ echo "YES";} ?></h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- card 1-->
	</div> 	<!--  content  -->
</div><!--  content wrapper -->

 
<?php #$this->load->view('Admin/footer2');?>