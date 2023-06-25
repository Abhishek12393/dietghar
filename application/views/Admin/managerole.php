<?php include('header.php');?>
<?php include('sidebar.php');?>
<style type="text/css">
	.img50{
		height: 50px;
		width: 50px;
	}
</style>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Manage Role</a>
							<span class="breadcrumb-item active">All Manage Role</span>
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
						<h5 class="card-title">All Manage Role</h5>
						<span><a href="<?php echo base_url(); ?>Admin/addprofile" class="btn btn-primary rounded-round">Add New Role</a></span>
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.No</th>
								<th>UserName</th>
								<th>Email</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Image</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>ABC</td>
								<td>abc@gmail.com</td>
								<td>ABCD</td>
								<td>XYZ</td>
								<td><img src="" class="img50">
								<td class="text-center">
									<a href="<?php echo base_url(); ?>Admin/myprofile"><button type="button" class="btn btn-success rounded-round"><i class="fa fa-pencil"></i></button></a>
									<a href="#"><button type="button" class="btn btn-danger rounded-round"><i class="fa fa-trash"></i></button></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->

			</div>
			<!-- /content area -->
<?php include 'footer.php';?>