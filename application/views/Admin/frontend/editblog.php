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
							<a href="manageblog" class="breadcrumb-item">Manage Blog</a>
							<span class="breadcrumb-item active">Edit-Blog</span>
						</div>

					</div>

				
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">


			<?php #pr($data) ; ?>
				<!-- Form inputs -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title font-weight-bold">Edit Blog</h5>
					</div>

					<div class="card-body">
					<form action="<?=base_url('Admin/update_blog')?>" method="POST" enctype='multipart/form-data'>
					<input type="hidden" name="id" value="<?=$data['id']; ?>">
					<input type="hidden" name="oldimg" value="<?=$data['image']; ?>">
						<div class="row">
							<div class="col-md-12">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Title<span>*</span></label>
									<div class="col-lg-12">
									<input type="text" class="form-control" name="title" required="" value="<?=$data['title']; ?>"> 
									</div>
								</div>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Current Image<span>*</span></label>
									<div class="col-lg-12">
									<!-- <input type="text" class="form-control" name="title" required="">
								 -->
								 <img src="<?=$data['image']; ?>" alt="blog image" style="width:100%;object-fit: cover;">
									</div>
								</div>
								</fieldset>
							</div>
							<div class="col-md-8">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Image<span>*</span></label>
										<div class="col-lg-12">
											<input type="file" name="file" class="form-control">
										</div>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Description<span>*</span></label>
									<div class="col-lg-12">
										<textarea name="editor-full" id="editor-full" rows="4" cols="4"><?=$data['description']; ?></textarea>
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