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
							<span class="breadcrumb-item active">Login Hitory</span>
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
						<h5 class="card-title">Tracking History</h5>
						<!-- <span><a href="<?php echo base_url(); ?>Admin/updateblogJson" class="btn btn-secondary rounded-round">Update Videos</a></span> -->
		 
					</div>
 
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Time d/m/Y</th>
								<th>Url</th>
								<th>From Url</th>
					 			<th>Ip v4</th>
					 			<th>Ip v6</th>
					 			<th>Device type</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach ($login_history as  $value) {
							?>
							<tr>
								<td><?= $i++; ?></td>
								<td><?=$value['time']?></td>
								<td><?=$value['url']?></td>
								<td><?=$value['fromUrl']?></td>
								<td><?=$value['ipv4']?></td>
								<td><?=$value['ipv6']?></td>
								<td><?=$value['device']?></td>
 
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->

			</div>
			<!-- /content area -->
<?php include '../footer.php';?>