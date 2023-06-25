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
							<a href="Admin/paid_users" class="breadcrumb-item">Users</a>
							<span class="breadcrumb-item active">Payment history</span>
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
						<h5 class="card-title">Payment history</h5>
						<span style="color: red" class="text-center"><?=$this->session->flashdata('success')?></span>
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th style="display: none;"></th>
								<th>Purchase Date</th>
								<th>Plan Name</th>
								<th>Status</th>
								<th>Amount</th>
								<th>Order Id</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							 <?php foreach ($message as  $value) {
                			?>
							<tr>
								<td style="display: none;"></td>
								<td><?=date('d-m-Y',$value->purchase_date);?></td> 
								<td><?=$value->plan_name?></td>
								<th><?=$value->plan_amount;?></th>
								<th><?php if($value->plan_status==1){echo "Active"; }else{echo "Inactive"; }?></th>
								<th><?=$value->order_id;?></th>
								<th></th>
 
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
				</div>
			<!-- /content area -->
<?php $this->view('Admin/footer.php');?>