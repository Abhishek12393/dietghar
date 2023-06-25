 
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
						<a href="<?=base_url();?>Admin/Dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
						<a href="<?= base_url(); ?>Admin_recipe/view" class="breadcrumb-item">View Recipe</a>
							<span class="breadcrumb-item active">Tags</span>
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
						<h5 class="card-title">All Tags -NUU-</h5>
						<span>
						<button type="button" class="btn btn-light  btn-primary " data-toggle="modal" data-target="#addtagmodal">Add New recipe <i class="icon-play3 ml-2"></i></button>
 
					</span>
					</div>
				 
					<table class="table datatable-responsive">
						<thead>
							<tr>

								<th>S.No</th>
								<th>Tag Name</th>
								<th class="text-center">Delete</th>
							</tr>
						</thead>
						<tbody>
							 <?php 
							 $i=1; 
							 foreach ($resp as  $value) {
              ?>
							<tr>
								<td><?=$i++;?></td>
								<td><?=$value->tag_name;?></td>
 
								<td class="text-center">
									<a href="<?=base_url('Admin_recipe/deletetag/'.$value->id)?>">
								<button type="button" class="btn btn-danger rounded-round"><i class="fa fa-eye"></i></button></a>
								</td>
							</tr>
						 <?php }  ?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->
			</div>
			<!-- /content area -->
			<div id="addtagmodal" class="modal fade show" tabindex="-1"  	 aria-modal="true" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Add Tags </h5>
									<button type="button" class="close" data-dismiss="modal">×</button>
								</div>

							<form action="<?=base_url(); ?>Admin_recipe/addtagname" method="POST">
								<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<fieldset class="mb-3">
													<div class="form-group row">
														<label class="col-form-label"> Name<span>*</span></label>
														<div class="col-lg-12">
															<input type="text" class="form-control" name="tag_name" required="">
														</div>
													</div>
												</fieldset>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button type="submit" value="add" class="btn btn-primary">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
 