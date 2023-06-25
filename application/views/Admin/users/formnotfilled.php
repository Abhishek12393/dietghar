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
							<span class="breadcrumb-item active">All Users</span>
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
						<h5 class="card-title">All Users</h5>
						
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th class="text-center">S.No</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Stepper</th>
								<th class="text-center">Pay Status</th>
								<th class="text-center">Action</th>
								<!-- <th class="text-center">Actions</th> -->
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($message)):
								$sno = 1;
									foreach($message as $data){ 	?>
							<tr>
								<td class="text-center"><?=$sno++ ; ?></td>
								<td><?=$data->first_name.' '.$data->last_name ; ?></td>
								<td><a href="userprofile/<?=$data->id ; ?>"><?=$data->mobile_no ; ?></a></td>
								<td><?php if($data->stepper == '' || $data->stepper == NULL ):
									echo "Step 1 or 2 done";
								else:
									echo $data->stepper ;
								endif;
								 ?>
									 
								</td>
								<td class="text-center">
									<?php if($data->is_payment_done == 1 ): ?>
									<span class="badge badge-success">Paid</span>
									<?php else: ?>
										<span class="badge badge-danger">Non Paid</span>
										<?php endif ; ?>

								</td>
								<td class="text-center">
								<button type="button" class="btn btn-danger rounded-round">Send SMS</button>
								<button type="button" class="btn btn-success rounded-round">Send SMS</button>
								</td>
 
							</tr>
								<?php }
								endif; ?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->
			</div>
			<!-- /content area -->
<?php $this->load->view('Admin/footer.php');?>