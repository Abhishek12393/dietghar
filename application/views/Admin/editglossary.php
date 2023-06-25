<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
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
					<a href="manageglossary" class="breadcrumb-item">Manage Glossary</a>
					<span class="breadcrumb-item active">Update Glossary</span>
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
				<h5 class="card-title font-weight-bold">Update Glossary</h5>

			</div>

			<div class="card-body">
				<form action="<?php echo base_url('Admin/update_glossary'); ?>" method="POST">
					<div class="row">
 
						<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Question<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" class="form-control" value="<?php echo $keywords[0]->title ?>" name="title" required="">
										<input type="hidden" value="<?php echo $keywords[0]->id ?>" name="id" class="form-control">
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-12">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">desc English<span>*</span></label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" id="editor-full" class="form-control" name="desc_eng" required=""><?php echo $keywords[0]->desc_eng ?></textarea>
									</div>
								</div>
							</fieldset>
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">desc Hindi<span>*</span></label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" id="editor-full2" class="form-control" name="desc_hindi" required=""><?php echo $keywords[0]->desc_hindi ?></textarea>
									</div>
								</div>
							</fieldset>
							<div class="text-right">
								<button type="submit" class="btn btn-primary rounded-round">Update <i class="icon-paperplane ml-2"></i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- /form inputs -->

	</div>
	<!-- /content area -->
	<?php include 'footer.php'; ?>