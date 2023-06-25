<?php include('../header.php');?>
<?php include('../sidebar.php');?>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
	
	<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/editor_ckeditor_default.js"></script>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="manageGallery" class="breadcrumb-item">Manage Gallery</a>
							<span class="breadcrumb-item active">Add Gallery</span>
						</div>
					</div>

				
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Form inputs -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h4 class="card-title font-weight-bold">Add Gallery</h4>
						<h6> Grid : <?=$gridno; ?>

						</h6>
					</div>

					<div class="card-body">
						
							<form action="<?=base_url('Admin/save_gallery_photos')?>" method="POST" enctype='multipart/form-data'>
							<input type="hidden" name="grid" value="<?=$gridno; ?>">
							<div class="row">
								<div class="col-md-9">
									<fieldset class="mb-3">
										<div class="form-group row">
											<label class="col-form-label">1. Title<span>*</span></label>
											<div class="col-lg-12">
											<input type="text" class="form-control" name="title[]" required="">
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-md-3">
									<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Image<span>*</span></label>
										<div class="col-lg-12">
											<input type="file" name="file[]" class="form-control" required >
										</div>
									</div>
								</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<fieldset class="mb-3">
										<div class="form-group row">
											<label class="col-form-label">2. Title<span>*</span></label>
											<div class="col-lg-12">
											<input type="text" class="form-control" name="title[]" required="">
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-md-3">
									<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Image<span>*</span></label>
										<div class="col-lg-12">
											<input type="file" name="file[]" class="form-control" required>
										</div>
									</div>
								</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<fieldset class="mb-3">
										<div class="form-group row">
											<label class="col-form-label">3. Title<span>*</span></label>
											<div class="col-lg-12">
											<input type="text" class="form-control" name="title[]" required="">
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-md-3">
									<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Image<span>*</span></label>
										<div class="col-lg-12">
											<input type="file" name="file[]" class="form-control" required>
										</div>
									</div>
								</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<fieldset class="mb-3">
										<div class="form-group row">
											<label class="col-form-label">4.Title<span>*</span></label>
											<div class="col-lg-12">
											<input type="text" class="form-control" name="title[]" required="">
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-md-3">
									<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Image<span>*</span></label>
										<div class="col-lg-12">
											<input type="file" name="file[]" class="form-control" required>
										</div>
									</div>
								</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<fieldset class="mb-3">
										<div class="form-group row">
											<label class="col-form-label">5. Title<span>*</span></label>
											<div class="col-lg-12">
											<input type="text" class="form-control" name="title[]" required="">
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-md-3">
									<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Image<span>*</span></label>
										<div class="col-lg-12">
											<input type="file" name="file[]" class="form-control" required>
										</div>
									</div>
								</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9">
									<fieldset class="mb-3">
										<div class="form-group row">
											<label class="col-form-label">6. Title<span>*</span></label>
											<div class="col-lg-12">
											<input type="text" class="form-control" name="title[]" required ="">
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-md-3">
									<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Image<span>*</span></label>
										<div class="col-lg-12">
											<input type="file" name="file[]" class="form-control" required>
										</div>
									</div>
								</fieldset>
								</div>
							</div>
			 
							<div class="row">
								<div class="col-md-12">
								<div class="text-right">
									<button type="submit" class="btn btn-primary rounded-round">Submit <i class="icon-paperplane ml-2"></i></button>
								</div>
								</div>
						
								</div>
							
						</form>
					</div>
				</div>
				<!-- /form inputs -->

			</div>
			<!-- /content area -->
<?php include '../footer.php';?>