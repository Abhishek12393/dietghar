 <?php $this->view('Admin/header.php');?>
<?php $this->view('Admin/sidebar.php');
$role = $_SESSION['role'];
?>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Users</a>
							<span class="breadcrumb-item active">Paid Users</span>
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
						<h5 class="card-title">Paid Users:</h5>
						<span style="color: red" class="text-center"><?=$this->session->flashdata('success')?></span>
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th ></th>
								<th>Purchase Date</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Plan Name</th>
								<th>Plan Status</th>
								<th>Start - End date</th>
								<th>Payments</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							 <?php foreach ($message as  $value) {
                			?>
							<tr>
								<td>
									<a href="<?='https://wa.me/+91'?><?=$value->mobile_no?>"><i class="icon-paperplane mr-3 icon-2x"></i></a>
									<a href="<?='../Admin/task_data_correction/';?><?=$value->user_id?>"><i class="icon-pencil7 mr-3 icon-2x"></i></a>
							</td>
								<td><?=date('d-m-Y',$value->purchase_date);?></td> 
								<td><?=$value->first_name." ".$value->last_name;?></td>
								<td><a href="<?=base_url('Admin/userprofile/')?><?=$value->user_id?>"><?=$value->mobile_no;?></a> 
									</td>
								<th><?=$value->plan_amount.' '.$value->plan_name;?></th>
								<th><?php if($value->plan_status==1){echo "Active"; }else{echo "Inactive"; }?></th>
								<td>
								<?php if($value->renew_plan_id !=0 && $value->renew_plan_id ==$value->id){ 

									echo $value->renew_start_date.' - '.$value->renew_end_date;
								}else{
									echo $value->meal_start_date.' - '.$value->meal_end_date;

								} ?>
							</td>
								<td>
									<!-- <a href="#" data-toggle="modal" data-target="#modal_theme_success">View</a>  -->
									<a href="<?=base_url('Admin/payment_history/'.$value->id); ?>" target="_blank">View</a> 
								
								</td>
								<td class="text-center">
								<?php if($value->first_call_done==0){ ?>
												<a href="<?=base_url('Admin/first_call/')?><?=$value->user_id?>" class="dropdown-item"><i class="fa fa-pencil"></i> First Call</a>
												<?php }else{ ?>
													<?php if($value->renew_plan_id !=0 && $value->renew_plan_id ==$value->id){ 
															echo "Renewal plan";

															?><a href="javascript:void(0)" onclick="update_start_date_btn_renew('<?=$value->user_id?>','<?=$value->plan_type?>','<?=$value->renew_meal_chart_id?>')"class="form-control" ><i class="fa fa-pencil"></i> Update Renew Start Date</a> 
															
															<?php if($value->renew_meal_chart_id==0){ ?>
																<a href="<?=base_url('Admin/chartPreparation/'.$value->user_id."/renew")?>" class="dropdown-item"><i class="fa fa-pencil"></i> New Chart Preparation -R</a>

															<?php }else{ ?>
																	<a href="<?=base_url('Admin/user_foodchart_view_renew/')?><?=$value->user_id?>" class="dropdown-item"><i class="fa fa-pencil"></i> View Final Chart Prepared - R</a>
																	
																	<!-- <a href="javascript:void(0)" onclick="finalchart_reset('<?=$value->user_id?>')" class="dropdown-item"><i class="fa fa-pencil"></i>Final Chart Reset - R</a>  -->
														
															<?php }

														}else{ 
														?>

													<a href="javascript:void(0)" onclick="update_start_date_btn('<?=$value->user_id?>','<?=$value->plan_type?>','<?=$value->meal_chart_id?>')"class="form-control" ><i class="fa fa-pencil"></i> Update Start Date</a> 
													<br>
													<a href="javascript:void(0)" onclick="update_callschedule('<?=$value->user_id?>','<?=$value->meal_start_date?>','<?=$value->meal_end_date?>')"class="form-control" ><i class="fa fa-pencil"></i> Reset Call Schedule</a> 

														<?php if($value->meal_chart_id==0){ ?>
															<a href="<?=base_url('Admin/chartPreparation/')?><?=$value->user_id?>" class="dropdown-item"><i class="fa fa-pencil"></i> New Chart Preparation</a>
														<?php }else{ ?>
															<a href="<?=base_url('Admin/user_foodchart_view/')?><?=$value->user_id?>" class="dropdown-item"><i class="fa fa-pencil"></i> View Final Chart Prepared</a>
															
															<a href="javascript:void(0)" onclick="finachart_reset('<?=$value->user_id?>')" class="dropdown-item"><i class="fa fa-pencil"></i>Final Chart Reset</a>

															<!-- <?=base_url('Admin/user_foodchart_reset/')?><?=$value->user_id?>" -->
															
														<?php } 
													} 
												}?>
												<?php if($role!=1){ ?>
												<a href="#" class="dropdown-item"><i class="fa fa-trash-o"></i> Delete</a>
												<?php } ?>
											
								</td>
							</tr>
						 <?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->
				<!-- Success modal -->
				<div id="modal_theme_success" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h6 class="modal-title">Payment History</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>Plan Name</th>
												<th>Amount</th>
												<th>Payment Mode</th>
												<th>Txn ID</th>
												<th>Invoice</th>
												<th>Plan Expiry</th>
												<th>Payment Date</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php rsort($transaction_history);
											foreach ($transaction_history as $key => $measure) {
												
											?>
											<tr>
												<td><?=$measure['c_date']?></td>
												<td><?=$measure['chest']?></td>
												<td><?=$measure['waist']?></td>
												<td><?=$measure['hips']?></td>
												<td><?=$measure['thighs']?></td>
												<td><?=$measure['weight']?></td>
												<td><?=$measure['neck']?></td>
												<td><?=$measure['arm']?></td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
					</div>

							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								
							</div>
						</div>
					</div>
				</div>
				<!-- /success modal -->

				<!-- //modal for update meal start date and end date -->
				<!-- Success modal -->
				<div id="modal_update_startdate" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h6 class="modal-title">Update Meal Start Date</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<div class="form-group">
									<div class="row">
										<div class="col-md-12">
											<label>Start date</label>
											<!-- <input type="text" readonly name="name" value="<?=$message->first_name ?>" class="form-control allow_edit" autocomplete="off"> -->
											<input type="hidden" value="0" id="userid">
											<input type="hidden" value="0" id="plantype">
											<input type="hidden" value="0" id="chartid">
											<input type="date"  class="form-control" id="startdate" >
										</div>
										
									</div>
								</div>
							</div>

							<div class="modal-footer">
								<!-- <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
							 -->
								<button id="updt_start_date" onclick="updt_start_date()" class=" btn btn-link">Update Start Date</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /success modal -->
								<!-- Success modal -->
				<div id="modal_update_startdate_renew" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h6 class="modal-title">Update Renew Start Date</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<div class="form-group">
									<div class="row">
										<div class="col-md-12">
											<label>Start date</label>
											<input type="hidden" value="0" id="ruserid">
											<input type="hidden" value="0" id="rplantype">
											<input type="hidden" value="0" id="rchartid">
											<input type="date"  class="form-control" id="rstartdate" >
										</div>
										
									</div>
								</div>
							</div>

							<div class="modal-footer">
								<!-- <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
							 -->
								<button id="updt_start_date" onclick="updt_start_date_renew()" class=" btn btn-link">Update Renew Start Date</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /success modal -->
				</div>
			<!-- /content area -->
<?php $this->view('Admin/footer.php');?>

<script>
	function update_start_date_btn(id,plantype,chartid){
		$("#userid").val(id);
		$("#plantype").val(plantype);
		$("#chartid").val(chartid);
		$('#modal_update_startdate').modal('toggle');
	}

	function updt_start_date(){
		var startdate = $("#startdate").val();
		var id = $("#userid").val();
		var plantype = $("#plantype").val();
		var chartid = $("#chartid").val();
 
		alert('Do you want to update date : '+startdate);
		var param = '{"user_id":'+id+',"start_date":"'+startdate+'" ,"plantype":'+plantype+',"chartid":'+chartid+'}';
		var url = base_url+'Api/update_staartandend_date';
		var resp = callajax(param,url);
		console.log(resp);
		if(resp == 1){
			alert('Date Updated');
		}else{
			alert('date not updated'); 	
		}
		$("#userid").val('0');
		$("#plantype").val('0');
		$('#modal_update_startdate').modal('toggle');
	}
	function update_start_date_btn_renew(rid,rplantype,rchartid){
 
		$("#ruserid").val(rid);
		$("#rplantype").val(rplantype);
		$("#rchartid").val(rchartid);
		$('#modal_update_startdate_renew').modal('toggle');
	}

	function updt_start_date_renew(){
		var startdate = $("#rstartdate").val();
		var id = $("#ruserid").val();
		var plantype = $("#rplantype").val();
		var chartid = $("#rchartid").val();

		// alert(startdate+chartid+'-'+id+'-'+plantype);
		let x= confirm('Do you want to update Rewnew start date : '+startdate);
		if(x== true){
			var param = '{"user_id":'+id+',"start_date":"'+startdate+'" ,"plantype":'+plantype+',"chartid":'+chartid+'}';
			var url = base_url+'Api/update_staartandend_date_renew';
			var resp = callajax(param,url);
			console.log(resp);
				if(resp == 1){
					alert('Renew Dates Updated');
				}else{
					alert('Renew Dates not updated'); 	
				}
			$("#userid").val('0');
			$("#plantype").val('0');
		}
		$('#modal_update_startdate_renew').modal('toggle');

	}
	
	function update_callschedule(userid,startdate,enddate){
		confirm('Are you sure want to update call schedule ?');
		var param = '{"user_id":'+userid+',"start_date":"'+startdate+'" ,"enddate":"'+enddate+'"}';
		console.log(param);
		var url = base_url+'Api/update_callschedule';
		var resp = callajax(param,url);
		console.log(resp);
		if(resp > 0 ){
			alert('Call Schedule Updated');
		}else{
			alert('Call Schedule not updated'); 	
		}
	}

	function finachart_reset(id){
		alert('Do you want to reset the final Chart Submitted ');
		var param = '{"user_id":'+id+'}';
		var url = base_url+'Api/finalchartreset';
		var resp = callajax(param,url);
 
		if(resp == 1){
			alert('Chart Reset');
		}
	}
</script>