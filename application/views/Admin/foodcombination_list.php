<?php include('header.php');?>
<?php include('sidebar.php');?>
<!-- Main content -->
		<div class="content-wrapper">
			<!-- Content area -->
			<div class="content">

				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">List Food Combination</h5>
						<span><a href="<?php echo base_url(); ?>Admin/foodcombination" class="btn btn-primary rounded-round">Add Food Combination</a></span>
					</div>
					<table class="table datatable-responsive">
						<div class="row">
							<div class="col-md-2">
								<h6 style="padding-left: 15%;">Placement</h5>
							</div>
							<div class="col-md-3">
								<select class="form-control">
									<option>---Select Placement---</option>
									<option>Placement 1</option>
									<option>Placement 2</option>
								</select>
							</div>
						</div>
						<thead>
							<tr>
								<th>S.No</th>
								<th>Food Combination</th>
								<th class="text-center">Edit</th>
								<th class="text-center">Delete</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1.</td>
								<td>3.0 Iced Tea + 3.0 Chapaties + 3.0 Boiled Rice</td>
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