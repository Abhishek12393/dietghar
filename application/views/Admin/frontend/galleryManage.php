<?php include('../header.php');?>
<?php include('../sidebar.php');?>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Manage Gallery</a>
							<span class="breadcrumb-item active">All Photos</span>
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
						<h5 class="card-title">All Photos</h5>
						 
						<span><a href="<?php echo base_url(); ?>Admin/addGallery" class="btn btn-primary rounded-round">Add Items</a></span>
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Title</th>
								<th>Grid</th>
								<th>Image</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($message as  $value) {
							?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?=$value['title']?></td>
								<td><?=$value['grid']?></td>
								<td><img src="<?=$value['image']?>" alt="image" style="width:100px"></td>
								<td class="text-center">
									<a href="<?php echo base_url().'Admin/editblog2/'.$value['id'] ?>"><button type="button" class="btn btn-success rounded-round"><i class="fa fa-pencil"></i></button></a>
									<a onclick="return confirm(' you want to delete?');" href="<?php echo site_url('Admin/deleteblog2/'.$value['id']);?>"><button type="button" class="btn btn-danger rounded-round"><i class="fa fa-trash"></i></button></a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->

			</div>
			<!-- /content area -->
<?php include '../footer.php';?>