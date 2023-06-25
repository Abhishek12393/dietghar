<?php
$this->load->view('Admin/header.php'); ?>
<?php $this->load->view('Admin/sidebar.php'); ?>
<!-- Main content -->
<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">
		<div class="page-header border-bottom-0">
			<div class="page-header-content header-elements-md-inline">
				<div class="page-title d-flex">
					<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Task - Data Correction</h4>
					<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
				</div>
				<div class="header-elements d-none mb-3 mb-md-0">
					<div class="d-flex justify-content-center">
						<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator"></i> <span>Button</span></a>
					</div>
				</div>
			</div>
		</div>
		<?php if(1==2) : ?>
		<!-- Basic responsive configuration -->
		<div class="card">
			<table class="table datatable-responsive">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Plan Purchase Date</th>
						<th>Name</th>
						<th>Mobile No</th>
						<th class="text-center">Current Day of Plan</th>
						<th>Plan Name</th>
						<th class="text-center">Mark as done </th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;  ?>
					<?php foreach ($message as $val) { ?>
						<tr>
							<td><?= $i ?></td>
							<td><?= $val['call_date']; ?></td>
							<td><?= $val['first_name'] . ' ' . $val['last_name']; ?></td>
							<td><?= $val['mobile_no']; ?></td>
							<td class="text-center"><?= $val['currentday']; ?> </td>
							<td><?= $val['plan_name']; ?></td>
							<td class="text-center">
								<?php echo $val['callstatus']; ?>
								<?php if ($val['callstatus'] == 1) { ?>
									<a href="<?= base_url('/Admin/updateCall7status'); ?> " target="_top"><span class="badge badge-danger" id="markasdone">Pending</span></a>
									<a href="javascript:void(0);" NAME="Error Handling" title="ZeroDivisionError handling" onClick=window.open("<?= base_url('/Admin/updateCall7status?call_id='); ?><?= $val['call_id'] ?>","Ratting","width=550,height=170,left=150,top=200,toolbar=0,status=0,");> Click here to open the child window</a>
								<?php } else { ?>
									<span class="badge badge-success">Completed</span>
								<?php } ?>
							</td>
							<td class="text-center">
								<div class="list-icons">
									<div class="dropdown">
										<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> View Profile</a>
											<a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> Weight History</a>
											<a href="#" class="dropdown-item"><i class="fa fa-pencil"></i>Inch History</a>
											<a href="#" class="dropdown-item"><i class="fa fa-pencil"></i>Notes</a>
										</div>
									</div>
								</div>
							</td>
						</tr>
					<?php }
					$i++;  ?>
				</tbody>
			</table>
		</div>
		<?php endif ; ?>
		<!-- /basic responsive configuration -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h3 class="card-title font-weight-bold">Client : <?=$user_data->first_name; ?>  </h3>
				<a href="#" class="btn btn-link btn-float text-default"> <h3> <?=$user_data->mobile_no; ?></h3></a>
			</div>
 
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group row">
							<label class="col-form-label">Usertype</label>
							<div class="col-lg-3">
								<input type="text" class="form-control"   name="usertype" value="<?=$user_data->user_type; ?>" readonly="true">
								* 1 => paid , 2 => Non-Paid
							</div>
							<label class="col-form-label">Is Payment Done</label>
							<div class="col-lg-3">
								<input type="text" class="form-control"   name="usertype" value="<?=$user_data->is_payment_done; ?>" readonly="true">
								** 0 => No ,  1 => Yes
							</div>
							<label class="col-form-label">Is Plan Expired</label>
							<div class="col-lg-3">
								<input type="text" class="form-control"   name="usertype" value="<?=$user_data->is_plan_expired; ?>" readonly="true">
								*** 0 => Not Active , 1 => plan Expired , 2=> Plan Active
							</div>
						</div>
						<div class="form-group row">
							
							<br>
							<br>
							 
						</div>
					</div>
					<!-- //plan info -->
					<div class="col-lg-6">
						<hr>
						<h4><label class="col-form-label">Current Plan Info</label></h4>
						<div class="form-group row">
							<label class="col-form-label">Plan Name</label>
							<div class="col-lg-12">
								<input type="text" class="form-control"   name="planname" value="<?=$user_data->plan_name." | ".$user_data->plan_amount ; ?>" readonly="true">
							</div>
							<label class="col-form-label">Purchase Date</label>
							<div class="col-lg-12">
								<input type="text" class="form-control"   name="planamount" value="<?=$user_data->p_date." | ".$user_data->purchase_date; ?>" readonly="true">
							</div>
							<label class="col-form-label">OrderId</label>
							<div class="col-lg-12">
								<input type="text" class="form-control"   name="orderid" value="<?=$user_data->order_id; ?>" readonly="true">
							</div>
						</div>
						<hr>
						<hr>
						<h4><label class="col-form-label">All Purchased Plan Info</label></h4>
						<table class="table">
							<thead>
								<tr>
									<th>P.id</th>
									<th>Plan name</th>
									<th>Purchase date</th>
									<th>Plan Status</th>
									<th>OrderId</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($user_plans as $userplan) { ?>
								<tr>
									<td><?=$userplan->id ; ?></td>
									<td><?=$userplan->plan_name." | ".$userplan->plan_amount ; ?></td>
									<td><?=$userplan->p_date ; ?></td>
									<td><?=$userplan->plan_status ; ?></td>
									<td><?=$userplan->order_id ; ?></td>
 
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<hr>
						<!-- <div class="form-group row">
							<label class="col-form-label"> Extra field</label>
							<div class="col-lg-12">
								<input type="text" class="form-control" id="bmr" name="bmr" value="1367.616" readonly="true">
							</div>
						</div> -->
					</div>

					<div class="col-lg-6">
						<hr>
					<h4><label class="col-form-label">Main Chart Info</label></h4>
						<div class="form-group row">
							<label class="col-form-label">Chart Start date </label>
							<div class="col-lg-12">
								<input type="text" class="form-control" name="bmr" value="<?=$user_data->meal_start_date ; ?>" readonly="true">
							</div>
							<label class="col-form-label">Chart End Date </label>
							<div class="col-lg-12">
								<input type="text" class="form-control" name="usuall_diet" value="<?=$user_data->meal_end_date ; ?>" readonly="true">
							</div>
							<label class="col-form-label">Chart Id  </label>
							<div class="col-lg-12">
								<input type="text" class="form-control" name="additional_info" value="<?=$user_data->meal_chart_id ; ?>" readonly="true">
							</div>
							<label class="col-form-label">Plan Id  </label>
							<div class="col-lg-12">
								<input type="text" class="form-control" name="planid" value="<?=$user_data->plan_id ; ?>" readonly="true">
							</div>
						</div>
						<hr><hr>
						<h4><label class="col-form-label">Renew Chart Info</label></h4>
						<?php if($user_data->renew_plan_id > 0 ){ ?>
							<form action="<?=base_url('Admin_task/renewshift_data_correction')?>" method="POST">
								<div class="form-group row">
									<label class="col-form-label">Renew Plan Id </label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="rplanid" value="<?=$user_data->renew_plan_id ; ?>" readonly="true">
									</div>
									<label class="col-form-label">Renew Start Date</label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="rstartdate" value="<?=$user_data->renew_start_date ; ?>" readonly="true">
									</div>
									<label class="col-form-label">Renew End Date</label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="renddate" value="<?=$user_data->renew_end_date ; ?>" readonly="true">
									</div>
									<label class="col-form-label">Renew Meal Chart Id</label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="rchartid" value="<?=$user_data->renew_meal_chart_id ; ?>" readonly="true">
									</div>
									<input type="hidden" name="cid" value="<?=$user_data->id ; ?>">
									<hr> <br>
									<div class="col-lg-12">
										<input type="Submit" class="form-control" name="renewshiftmanually"  value="Shift Renew Manually">
									</div>
								</div>
							</form>
						<?php }else{  ?>
							<div class="form-group row">
								<label class="col-form-label">No renew Plan Found Id : 0 </label>
							</div>
							<?php } ?>
					</div>
				</div>
				<br><br><br>

		 
			</div>
		</div>
	</div>
	<!-- /content area -->
	<script type="text/javascript">
		function isNumber(evt) {
			var iKeyCode = (evt.which) ? evt.which : evt.keyCode
			if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
				return false;

			return true;
		}
	</script>
	<?php $this->load->view('Admin/footer.php'); ?>
	<?php foreach ($message as $val) {
		$weight = $this->Custommodel->Select_common_where('measurement_history', 'cust_id', $val['user_id']);
		// pr($weight);
	?>
		<div id="modal_theme_success_<?= $val['call_id'] ?>" class="modal fade" tabindex="-1">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-success">
						<h6 class="modal-title">Weight History</h6>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<div class="modal-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Date</th>
										<th>Weight (In Kgs)</th>

									</tr>
								</thead>

								<tbody>
									<?php foreach ($weight as $w) { ?>
										<tr>
											<td><?= $w['c_date'] ?></td>
											<td><?= $w['weight'] ?></td>

										</tr>
									<?php } ?>
								</tbody>

							</table>
						</div><br>
						<div class="row">
							<div class="col-md-6">
								<label>Enter Weight(In Kgs)</label>
								<input type="text" onkeypress="javascript:return isNumber(event)" name="Weight" maxlength="3" class="form-control" required="">
							</div>
							<div class="col-md-3" style="padding-top: 27px;">

								<input type="submit" name="" value="Update" class="btn btn-primary">
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php $i = 1;
	foreach ($message as $val) { ?>
		<div id="modal_theme_success1_<?= $val['call_id'] ?>" class="modal fade" tabindex="-1">
			<form method="post" action="<?= base_url('Admin/update_comment') ?>">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header bg-success">
							<h6 class="modal-title">Comment</h6>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<div class="modal-body">

							<div class="row">
								<div class="col-md-12">
									<label>Enter Comment</label>
									<input type="hidden" name="call_id" value="<?= $val['call_id'] ?>">
									<textarea class="form-control" rows="3" name="comment" placeholder="Enter Comment"></textarea>
								</div>
								<div class="col-md-3" style="padding-top: 27px;">

									<input type="submit" name="" value="Update" class="btn btn-primary">
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

						</div>
					</div>
				</div>
		</div>
		</form>
	<?php } ?>