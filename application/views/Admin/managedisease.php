<?php include('header.php');?>
<?php include('sidebar.php');?>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Manage Disease</a>
							<span class="breadcrumb-item active">All Manage Disease</span>
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
						<h5 class="card-title">All Disease</h5>
						<span><a href="<?php echo base_url(); ?>Admin/adddisease" class="btn btn-primary rounded-round">Add Disease</a></span>
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Disease Name</th>
								<th>Disease Description</th>
								<th class="text-center">Edit</th>
								<!-- <th class="text-center">Delete</th> -->
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
									<a href="<?=base_url('Admin/Edit/'.$value->id.'/Disease')?>">
								<button type="button" class="btn btn-success rounded-round"><i class="fa fa-pencil"></i></button></a>
								</td>
								<!-- <td class="text-center"> -->
									<!-- <a href="<?=base_url('Admin/delete/'.$value->id.'/Disease')?>"> 
									 <button type="button" class="btn btn-danger rounded-round"><i class="fa fa-trash"></i></button></a> -->
								<!-- </td> -->
								
							</tr>
						 <?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->


				

				

			</div>
			<!-- /content area -->
<?php include 'footer.php';?>