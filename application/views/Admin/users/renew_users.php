<?php $this->load->view('Admin/header.php');?>
<?php $this->load->view('Admin/sidebar.php');?>
		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Users</a>
							<span class="breadcrumb-item active">Renew  Users List</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Renew Users List</h5>
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.no</th>
								<th>Mobile</th>
								<th>Name</th>
								<th class="text-center">Expired Status</th>
								<th>Plan start - end date</th>
			 					<th>Offline Payment</th>
							</tr>
						</thead>
						<tbody>
					 
							 <?php $sno =1; foreach ($message as  $value) {
                			?>
								<tr>
								<td><?=$sno++; ?></td>
								<td><a href="<?=base_url('Admin/userprofile/')?><?=$value->user_id?>"><?=$value->mobile_no;?></a></td>
								<td><?=$value->first_name.' '.$value->last_name;?></td>
								<td class="text-center">
									<span class="badge badge-success"><?=$value->is_plan_expired;?></span> 
									<?php echo $value->is_plan_expired==2 ? 'Active': 'Expired' ; ?>
								</td>
								<td><?=date("d-m-Y", strtotime($value->meal_start_date)).'  - '.date("d-m-Y", strtotime($value->meal_end_date));?></td>
								<td>
									<?php if($value->renew_plan_id == 0 ){ ?>
									<a href="javascript:void(0)" onclick="setuserid(<?=$value->id;?>,<?=$value->is_plan_expired;?>)">Set Payment</a>
								<!-- <a href="#" data-toggle="modal" data-target="#modal_theme_success">Create entry</a> </td> -->
								<?php }else{
									echo "Renewal Plan Found";
								} ?>
							</tr>
						 <?php } ?>
						
						</tbody>

					</table>
				</div>
				<!-- /basic responsive configuration -->
				</div>
			<!-- /content area -->
			<!-- Success modal -->
				<div id="modal_theme_success" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h6 class="modal-title">Enter offline Payment</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
									<form action="add_offline_payment" method="POST" >
										<input type="hidden" value="1" name="huserid" id="huserid">
										<input type="hidden" value="1" name="renew" id="renewinput">
										<input type="hidden" value="" name="isexpired" id="isexpired">
						 
										<div class="form-group row">
											<label class="col-form-label col-lg-2">Enter Plan Name</label>
											<div class="col-lg-10">
												<!-- <input type="text" class="form-control" placeholder="Enter Plan name" name="planname"> -->
												<select class="form-control form-control-lg" name="planname">
														<option value="Diet Composite">Diet Composite - 600</option>
														<option value=">Diet Advance">Diet Advance - 1200</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
										<label class="col-form-label col-lg-2">Plan Price</label>
										<div class="col-lg-10">
												<select class="form-control form-control-lg" name="planprice">
														<option value="opt1">Select plan Price</option>
														<option value="600">600</option>
														<option value="1200">1200</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
										<label class="col-form-label col-lg-2">Pay Mode</label>
										<div class="col-lg-10">
												<select class="form-control form-control-lg" name="paymode">
														<option >Select Mode</option>
														<option value="NFT">NFT</option>
														<option value="PayTm">PayTm</option>
														<option value="UPI">UPI</option>
												</select>
											</div>
										</div>
										<button type="submit" class=" btn btn-success"> Enter Payment</button>
									</form>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								
							</div>
						</div>
					</div>
				</div>
				<!-- /success modal -->
<?php $this->load->view('Admin/footer.php');?>
<script>
	function setuserid(id,isexpired){
		// alert(id);
		document.getElementById("huserid").value = id;
		document.getElementById("isexpired").value = isexpired;
		$("#modal_theme_success").modal();
	}
</script>