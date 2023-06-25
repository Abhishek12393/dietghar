   	<?php
 $this->load->view('Admin/header.php');?>
<?php $this->load->view('Admin/sidebar.php');?>
<!-- Main content -->
<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="page-header border-bottom-0">
<div class="page-header-content header-elements-md-inline">
<div class="page-title d-flex">
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>7 Days Call Schedule</h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
<div class="header-elements d-none mb-3 mb-md-0">
<div class="d-flex justify-content-center">
<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator"></i> <span>Invoices</span></a>
</div>
</div>
</div>
</div>
<!-- Basic responsive configuration -->
<div class="card">
<table class="table datatable-responsive">
<thead><tr>
	<th>S.No</th
	><th>Call Date</th>
	<th>Name</th>
	<th>Mobile No</th>
	<th class="text-center">Current Day of Plan</th>
	<th>Plan Name</th>
	<th class="text-center">Mark as done </th>
	<th class="text-center">Action</th></tr>
</thead>
<tbody>
	<?php $i=1;  ?>
	<?php  foreach($message as $val){ ?>
	<tr>
		<td><?=$i?></td>
		<td><?=$val['call_date']; ?></td>
		<td><?=$val['first_name'].' '.$val['last_name']; ?></td>
		<td><?=$val['mobile_no']; ?></td>
		<td class="text-center"><?=$val['currentday']; ?>				</td>
		<td><?=$val['plan_name']; ?></td>
		<td class="text-center">
			<?php echo $val['callstatus'] ; ?>
			 <?php if($val['callstatus'] == 1 ){?>
				<a href="<?=base_url('/Admin/updateCall7status'); ?> " target="_top"><span class="badge badge-danger" id="markasdone">Pending</span></a>
				<a href="javascript:void(0);" NAME="Error Handling" title="ZeroDivisionError handling" 	onClick=window.open("<?=base_url('/Admin/updateCall7status?call_id=');?><?=$val['call_id']?>","Ratting","width=550,height=170,left=150,top=200,toolbar=0,status=0,");> Click here to open the child window</a>
			<?php }else{ ?>
			<span class="badge badge-success">Completed</span>
			<?php }?> 
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
<?php } $i++;  ?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->

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
<?php $this->load->view('Admin/footer.php');?>
		<?php  foreach($message as $val){ 
		$weight = $this->Custommodel->Select_common_where('measurement_history','cust_id',$val['user_id']);
		// pr($weight);
		?>
						<div id="modal_theme_success_<?=$val['call_id']?>" class="modal fade" tabindex="-1">
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
									<?php foreach($weight as $w){ ?>
										<tr>
											<td><?=$w['c_date']?></td>
											<td><?=$w['weight']?></td>
											
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
				<?php $i=1; foreach($message as $val){ ?>
				<div id="modal_theme_success1_<?=$val['call_id']?>" class="modal fade" tabindex="-1">
					<form method="post" action="<?=base_url('Admin/update_comment')?>">
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
										<input type="hidden" name="call_id" value="<?=$val['call_id']?>">
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