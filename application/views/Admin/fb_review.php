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
							<a href="#" class="breadcrumb-item">Fb Review</a>
							<span class="breadcrumb-item active">Add Fb Review</span>
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
						<h5 class="card-title font-weight-bold">Add Fb Review</h5>
						
					</div>

					<div class="card-body">
						
							<form action="<?=base_url('Admin/addreview')?>" method="POST" enctype='multipart/form-data'>
							<div class="row">
							<div class="col-md-12">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Url<span>*</span></label>
									<div class="col-lg-12">
									<input type="text" class="form-control" required="true" name="token" required="">
									</div>
								</div>
								</fieldset>
							</div>
							<!-- https://graph.facebook.com/v3.2/DietGhar/ratings?access_token=EAASSyTGUnmcBACN0G0GWVr8Gd3DrWAYItRS8XDZCySdMKWwzxQJ9hHWAVsKe1zK4NuIanTXw2fDkfd6cFIoIWOeK3BEIkJGtYc3Ro5bDUaFDWPA76AFszlt5PodFy6eWxwWEGxCZBISJTwXLPHeijoakM16wL8oqCJnUzZBjLz2UVnOylX8ZC66yHVDaCUI9C3UHXRjc7AZDZD&limit=41000 -->
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
<?php include 'footer.php';?>