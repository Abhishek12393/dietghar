<?php include('header.php');?>
<?php include('sidebar.php');?>
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
							<a href="#" class="breadcrumb-item">Manage FAQ</a>
							<span class="breadcrumb-item active">Add FAQ</span>
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
						<h5 class="card-title font-weight-bold">Add FAQ</h5>
						
					</div>

					<div class="card-body">
						
							<form action="<?php echo base_url('Admin/save_faq');?>" method="POST">
							<div class="row">
							<div class="col-md-6">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Select Category<span>*</span></label>
								<div class="col-lg-12">
									<select class="form-control" name="cat">
										<option value="1">Diet Related</option>
										<option value="2">General</option>
										<option value="3">Payment Related </option>
									</select>
									</div>
								</div>
								</fieldset>
								</div>
								<div class="col-md-6">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Question<span>*</span></label>
									<div class="col-lg-12">
									<input type="text" class="form-control" name="question" required="">
									</div>
								</div>
								</fieldset>
							</div>
							
					
							</div>
							
								<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Answer<span>*</span></label>
									<div class="col-lg-12">.
										<textarea name="answer" id="editor-full" rows="2" cols="2"></textarea>
										
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
<?php include 'footer.php';?>