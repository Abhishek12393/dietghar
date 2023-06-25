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
					<a href="#" class="breadcrumb-item">Manage FAQ-USER</a>
					<span class="breadcrumb-item active">Update FAQ-USER</span>
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
				<h5 class="card-title font-weight-bold">Update FAQ-USER</h5>

			</div>

			<div class="card-body">
				<form action="<?php echo base_url('Admin/update_faqUser'); ?>" method="POST">
					<div class="row">
 
						<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Question<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" class="form-control" value="<?php echo $faqUser[0]->question ?>" name="question" required="">
										<input type="hidden" value="<?php echo $faqUser[0]->id ?>" name="id" class="form-control">
									</div>
								</div>
							</fieldset>
						</div>
 
						<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Question- Hindi<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" class="form-control" value="<?php echo $faqUser[0]->question_hindi ?>" name="question_hindi" required="">
	 
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-12">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Answer Eng<span>*</span></label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" id="editor-full" class="form-control" name="answer_eng" required=""><?php echo $faqUser[0]->answer_eng ?></textarea>
									</div>
								</div>
							</fieldset>
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Answer Hindi<span>*</span></label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" id="editor-full2" class="form-control" name="answer_hindi" required=""><?php echo $faqUser[0]->answer_hindi ?></textarea>
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