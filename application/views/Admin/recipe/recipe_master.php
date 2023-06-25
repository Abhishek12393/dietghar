<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
						<a href="<?=base_url();?>Admin/Dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">View Recipe</span>
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
						<h5 class="card-title">All Recipes</h5>
						<span><a href="<?php echo base_url(); ?>Admin_recipe/addrecipe" class="btn btn-primary rounded-round">Add New recipe</a></span>
					</div>
					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th style="display: none;"></th>
								<th>S.No</th>
								<th>Name</th>
								<th>Featured</th>								
								<th class="text-center">Action</th>
								<th class="text-center">View /Edit </th>
								<th>Delete</th>
								<th>Likes</th>
							</tr>
						</thead>
						<tbody>
							 <?php 
							 $i=1; 
							 foreach ($resp as  $value) {
								$id = $value->id;
              ?>
							<tr>
								<td></td>
								<td><?=$i++;?></td>
								<td><h5>
											<?=$value->short_name;?>
										</h5>
								</td>
								<td><?php $param1 = "'$id','success',this"; $param2 = "'$id','NA',this";
								echo $value->featured == 1 ?'<button type="button" class="btn btn-outline-success btn-icon rounded-pill" onclick="makefeatured('.$param1.')"><i class="icon-check"></i></button>':'<button type="button" class="btn btn-outline-danger btn-icon rounded-pill"  onclick="makefeatured('.$param2.')"><i class="icon-x"></i></button>';?></td>
								
								<td class="text-center">
									<a href="<?=base_url('Admin_recipe/recipeInstructionView/'.$value->id.'/'.$value->short_name)?>"> 
										<button type="button" class="btn btn-outline-primary border-2">View Instructions</button>
									</a>
									<a href="<?=base_url('Admin_recipe/recipeIngredientView/'.$value->id.'/'.$value->short_name)?>"> 
										<button type="button" class="btn btn-outline-primary border-2">View Ingredients</button>
									</a>
									<a href="<?=base_url('Admin_recipe/recipeTagsView/'.$value->id.'/'.$value->short_name)?>"> 
										<button type="button" class="btn btn-outline-primary border-2">View Tags</button>
									</a>
								</td>

								<td class="text-center">
									<a href="<?=base_url('Admin_recipe/addrecipe/'.$value->id)?>"> <button type="button" class="btn btn-primary rounded-round"><i class="fa fa-pencil"></i></button></a>
								</td>
								<td class="text-center">
									<a href="<?=base_url('Admin_recipe/deleterecipe/'.$value->id)?>"> <button type="button" class="btn btn-danger rounded-round"><i class="fa fa-trash"></i></button></a>
								</td>
								<td>
									<button type="button" class="btn btn-outline-primary btn-icon"><?=$value->likes;?></button>
								</td>
 
							</tr>
						 <?php }  ?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->
			</div>
			<!-- /content area -->
