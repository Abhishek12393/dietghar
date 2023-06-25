<?php include('header.php');?>
<?php include('sidebar.php');?>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Manage Placement</a>
							<span class="breadcrumb-item active">All Manage Placement</span>
						</div>

					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">All Manage Placement</h5>
						<span><a href="<?php echo base_url(); ?>Admin/addplacement" class="btn btn-primary rounded-round">Add Placement</a></span>
					</div>

					

					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Placement Name</th>
								<th>Placement Description</th>
								
								<th class="text-center">Edit</th>
								<th class="text-center">Delete</th>
								
							</tr>
						</thead>
						<tbody>
							 <?php $i=1; foreach ($message as  $value) {
                			?>
							<tr>
								<td><?=$i++;?></td>
								<td><?=$value->name;?></td>
								<td><?=$value->description;?></td>
								<td class="text-center">
									<a href="<?=base_url('Admin/Edit/'.$value->id.'/Placement')?>">
								<button type="button" class="btn btn-success rounded-round"><i class="fa fa-pencil"></i></button></a>
								</td>
								<td class="text-center">
									<a href="<?=base_url('Admin/delete/'.$value->id.'/Placement')?>">
									<button type="button" class="btn btn-danger rounded-round"><i class="fa fa-trash"></i></button></a>
								</td>
								
							</tr>
						 <?php } ?>
						
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->

			</div>
			<!-- /content area -->
<?php include 'footer.php';?>