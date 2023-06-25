<?php include('header.php');?>
<?php include('sidebar.php');?>
<!-- Main content -->
<style type="text/css">
	.img50{
		width: 50px;
		height: 50px;
	}
</style>
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Manage Review</a>
							<span class="breadcrumb-item active">All Manage Review</span>
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
						<h5 class="card-title">All Manage Review</h5>
						<span><a href="<?php echo base_url(); ?>Admin/addfaq" class="btn btn-primary rounded-round">Update Review</a></span>
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Review On</th>
								<th>Name</th>
								<th>Facebook ID</th>
								<th>Rating</th>
								<th>Image</th>
								<th>Status</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
								<?php $i=1; foreach ($message as  $value) {
							?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?=$value['review_on']?></td>
								<td><?=$value['name']?></td>
								<td><?=$value['fb_id']?></td>
								<td><?=$value['rating']?></td>
								<td><img src="<?=$value['image']?>" class="img50"></td>
								<td>
									<?php 	if ($value['status'] == '1' ){ ?>
									<span class="badge badge-success">Active</span>
							<?php	}
									else{ ?>
									 <span class="badge badge-danger">InActive</span> 
								
									<?php }?>
									 
								</td>
																<td class="text-center">
									<a href="<?php echo site_url('Admin/editreview/'.$value['id']);?>"><button type="button" class="btn btn-success rounded-round"><i class="fa fa-pencil"></i></button></a>
									
								</td>
							</tr>
								<?php }?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->

			</div>
			<!-- /content area -->
<?php include 'footer.php';?>