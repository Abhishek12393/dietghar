<?php #include('header.php');?>
<?php #include('sidebar.php');?>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Expired</a>
							<span class="breadcrumb-item active">Expired Users</span>
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
						<h5 class="card-title">Expired Users</h5>
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.no</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>Plan Start Date</th>
								<th>Plan Expired ON</th>
 
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php if($message):
								$sno = 1;
									foreach($message as $data):  ?>
							<tr>
								<td><?=$sno++; ?></td>
								<td><?=$data->first_name.''.$data->last_name; ?></td>
								<td><a href="#"><?=$data->mobile_no; ?></a></td>
								<td>	<?=$data->meal_start_date; ?></td>
								<td><?=$data->meal_end_date; ?></td>
							 
								<td class="text-center">
									<div class="list-icons">
										<a href="<?= base_url('Admin/restore_previous_plan/'.$data->user_id); ?>" class="dropdown-item"><i class="fa fa-pencil"></i> Restore Previous plan</a>
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
												<a href="#" class="dropdown-item"><i class="fa fa-trash-o"></i> Delete</a>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<?php endforeach;
							endif; ?>
						</tbody>
					</table>
 
				</div>
				<!-- /basic responsive configuration -->
			</div>
			<!-- /content area -->
<?php include 'footer.php';?>