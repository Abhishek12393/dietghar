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
								<th>S.No</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Chat</th>
								<th>Login History</th>
								<th>Status</th>
								<!-- <th class="text-center">Actions</th> -->
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($message)):
								$sno = 1;
									foreach($message as $data){ 	?>
									<tr>
										<td><?=$sno++ ; ?></td>
										<td><?=$data->first_name.' '.$data->last_name ; ?></td>
										<td><a href="userprofile/<?=$data->id ; ?>"><?=$data->mobile_no ; ?></a></td>
										<th>
											<form action="/chat">
												<input type="hidden" value="<?=$data->mobile_no ; ?> ">
												<input class="btn btn-outline-primary btn-icon border-2 ml-2" type="submit" value="Send Message" name="submit" >
											</form>									
										</th>
										<th class="center"><a class="btn btn-outline-secondary btn-icon rounded-pill border-2 ml-2" href="<?=base_url();?>Admin/loginhistory?userid=<?=$data->id ; ?>"><i class="icon-pin-alt"></i> View</a></th>
										<td>
											<?php if($data->is_payment_done == 1 ): ?>
											<span class="badge badge-success">Paid</span>
											<?php else: ?>
												<span class="badge badge-danger">Non Paid</span>
												<?php endif ; ?>
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