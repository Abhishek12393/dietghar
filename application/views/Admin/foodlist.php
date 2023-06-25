<?php include('header.php');?>
<?php include('sidebar.php');

?>

<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Food Master</a>
							<span class="breadcrumb-item active">All Food Master</span>
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
						<h5 class="card-title">All Food Master</h5>
					
					</div>

					

					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Food Name</th>
								<th>Category</th>
								<th>Unit</th>
								<th class="text-center">View</th>
								<th class="text-center">Edit</th>
								<th class="text-center">Delete</th>
								<th>Recipe status</th>
							</tr>
						</thead>
						<tbody>
							 <?php $i=1; foreach ($message as  $value) {
                			?>
							<tr>
								<td><?=$i++;?></td>
								<td><?=$value->food_name;?></td>
								<td><?=$value->food_category_name;?></td>
								<td><?=$value->unitname;?></td>
								<td class="text-center">
									<a href="<?=base_url('Admin/foodView/'.$value->id);?>">
									<button type="button" class="btn btn-primary rounded-round"><i class="fa fa-eye"></i></button></a>
								</td>
								<td class="text-center">
									<a href="<?=base_url('Admin/foodEdit/'.$value->id);?>">
								<button type="button" class="btn btn-success rounded-round"><i class="fa fa-pencil"></i></button></a>
								<a href="<?=base_url('Admin/addfoodimageview?id='.$value->id);?>" target="_blank" >
								<button type="button" class="btn btn-success rounded-round"><i class="fa fa-arrow-circle-up "></i></button></a>
								</td>
								<td class="text-center">
									<a href="<?=base_url('Admin/delete/'.$value->id.'/FoodMaster')?>">
									<button type="button" class="btn btn-danger rounded-round"><i class="fa fa-trash"></i></button></a>
								</td>
								<td>
									<?php 
										if($value->recipe_id == 0 ){
											?><a href="<?=base_url('Admin_recipe/addrecipe?fdid='.$value->id.'')?>">
												<button type="button" class="btn btn-danger rounded-round"><i class="fa  fa-plus-square fa-1x"></i></button>
											</a><?php
										}else{
											$rs = $value->recipe_status;
												if($rs == 0 ){ ?>
													<button type="button" class="btn btn-info rounded-round" data-popup="tooltip" data-placement="left" id="left" data-original-title="Incompleted"><i class="fa fa-check"></i></i></button>
												<?php
												}elseif($rs == 1){ ?>
													<button type="button" class="btn bg-teal rounded-round" data-popup="tooltip" data-placement="left" id="left" data-original-title="Completed"><i class="fa fa-check"></i></button>
												 <?php }else{ ?>
													<button type="button" class="btn btn-info  rounded-round" data-popup="tooltip" data-placement="left" id="left" data-original-title="<?php echo implode(',' , unserialize($rs)) ?>"><i class="fa fa-check"></i></button>
												
												<?php }
 
										}
									?>
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