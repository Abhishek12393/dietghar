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
							<span class="breadcrumb-item active">Un-Paid Users</span>
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
						<h5 class="card-title">Un-Paid Users</h5>
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.no</th>
								<th></th>
								<th>Created Date</th>
								<th>Mobile</th>
								<th>Name</th>
								<th>Progress</th>
								<th>Status</th>
			 					<th>Offline Payment</th>
							</tr>
						</thead>
						<tbody>
					 
							 <?php $sno =1; foreach ($message as  $value) {
                			?>
							<tr>
								<td><?=$sno++; ?></td>
							<td><a href="<?='https://wa.me/+91'?><?=$value->mobile_no?>" target="_blank"><i class="icon-paperplane mr-3 icon-2x"></i></a></td>
								<td><?=date('d-m-Y' , strtotime($value->creation_date));?></td> 
								
								<td><a href="<?=base_url('Admin/userprofile/')?><?=$value->user_id?>"><?=$value->mobile_no;?></a></td>
								<td><?=$value->first_name;?></td>
								<td>
									<?php 
									$text='';
									if( $value->lastButtonId == NULL ): $pct = '1%';$text='1'; ;
									elseif( $value->lastButtonId == 'stepper_26' ): $pct = '96%';$text='26'; ;
									elseif( $value->lastButtonId == 'stepper_27' ): $pct = '92%'; $text='27';;
									elseif( $value->lastButtonId == 'stepper_final' ): $pct = '100%'; $text='Completed';;
									else:  
									$text = explode('_', $value->lastButtonId , 2)[1];
									$pct = $text / 28 *100 ;
									$pct= $pct.'%';
								endif; 
									?>
									<center><?=$text; ?></center>
									<div class="progress">
										<div class="progress-bar bg-teal" style="width: <?="$pct"; ?>">
										<!-- <span><?="$pct"; ?> Complete</span>  -->
										</div>
									</div>	<center><?=round($pct,0).'%'; ?></center>
								</td>
								<td><span class="badge badge-success"><?=$value->status;?></span> </td>
								<td><a href="javascript:void(0)" onclick="setuserid(<?=$value->id;?>)">Enter data</a>
								<!-- <a href="#" data-toggle="modal" data-target="#modal_theme_success">Create entry</a> </td> -->
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
										<input type="hidden" value="0" name="renew" id="renewinput">
										<div class="form-group row">
											<label class="col-form-label col-lg-2">Enter Plan Name</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" placeholder="Enter Plan name" name="planname">
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
	function setuserid(id){
		// alert(id);
		document.getElementById("huserid").value = id;
		$("#modal_theme_success").modal();
	}
</script>