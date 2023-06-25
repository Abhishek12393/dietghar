<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<a href="managefaqUser" class="breadcrumb-item">Manage FAQ-USER</a>
					<span class="breadcrumb-item active">Add FAQ-USER</span>
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
				<h5 class="card-title font-weight-bold">Add FaqUser</h5>

			</div>

			<div class="card-body">

				<form action="<?php echo base_url('Admin/save_faqUser'); ?>" method="POST">
					<div class="row">
						<div class="col-md-7">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Question<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="question" required="">
									</div>
								</div>
							</fieldset>
						</div>
 
						<div class="col-md-7">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Question Hindi<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="question_hindi" required="">
									</div>
								</div>
							</fieldset>
						</div>
					</div>

					<fieldset class="mb-3">
						<div class="form-group row">
							<label class="col-form-label">Answer<span>(English)*</span></label>
							<div class="col-lg-12">
								<textarea name="answer_eng" id="editor-full" class="editor-full" rows="2" cols="2"></textarea>

							</div>
						</div>
					</fieldset>

					<fieldset class="mb-3">
						<div class="form-group row">
							<label class="col-form-label">Answer<span>(Hindi)*</span></label>
							<div class="col-lg-12">
								<textarea name="answer_hindi" id="editor-full2" class="editor-full" rows="2" cols="2"></textarea>

							</div>
						</div>
					</fieldset>

					
					<div class="text-right">
						<button type="submit" class="btn btn-primary rounded-round">Submit <i class="icon-paperplane ml-2"></i></button>
					</div>



				</form>
			</div>
		</div>
		<!-- /form inputs -->

	</div>
	<!-- /content area -->
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
 
	<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/editor_ckeditor_default.js"></script>  
	<?php include 'footer.php'; ?>