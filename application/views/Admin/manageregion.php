<?php include('header.php');?>
<?php include('sidebar.php');?>
<!-- Main content -->
		<div class="content-wrapper">
		<!-- Content area -->
			<div class="content">

				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">All Region</h5>
						<span><a href="<?php echo base_url(); ?>Admin/region" class="btn btn-primary rounded-round">Add Region</a></span>
					</div>
						<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Region</th>
								<th>City</th>
								<th>State</th>
								<th class="text-center">Edit</th>
								<th class="text-center">Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Ghaziabad</td>
								<td>Ghaziabad</td>
								<td>UTTAR PRADESH</td>
								<td class="text-center">
								<button type="button" class="btn btn-success rounded-round"><i class="fa fa-pencil"></i></button>
								</td>
								<td class="text-center">
									<button type="button" class="btn btn-danger rounded-round"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->

			</div>
			<!-- /content area -->

<?php include 'footer.php';?>