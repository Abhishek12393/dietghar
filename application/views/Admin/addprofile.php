<?php include('header.php');?>
<?php include('sidebar.php');?>
<style type="text/css">
	.img50{
		height: 150px;
		width: 150px;
	}
</style>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Manage Profile</a>
							<span class="breadcrumb-item active">Add Profile</span>
						</div>

					</div>

				
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Form inputs -->
				<div class="card">
					

					<div class="card-body">
						
							<form action="#" method="POST">
							<div class="row">
							<div class="col-md-4">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">User Name<span>*</span></label>
									<div class="col-lg-12">
									<input type="text" class="form-control" name="username" required="">
									</div>
								</div>
								</fieldset>
							</div>
							<div class="col-md-4">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Email<span>*</span></label>
									<div class="col-lg-12">
									<input type="email" name="email" class="form-control" required="">
									</div>
								</div>
								</fieldset>
							</div>
							<div class="col-md-4">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Password<span>*</span></label>
									<div class="col-lg-12">
									<input type="Password" name="Password" class="form-control" required="">
									<span><a href="#">Show Password</a></span>
									</div>
								</div>
								</fieldset>
							</div>
							<div class="col-md-4">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">First Name<span>*</span></label>
									<div class="col-lg-12">
									<input type="text" class="form-control" name="firstname" required="">
									</div>
								</div>
								</fieldset>
							</div>
							<div class="col-md-4">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Last Name<span>*</span></label>
									<div class="col-lg-12">
									<input type="text" name="lastname" class="form-control" required="">
									</div>
								</div>
								</fieldset>
							</div>
							<div class="col-md-4">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">User Type<span>*</span></label>
									<div class="col-lg-12">
									<input type="text" name="usertype" class="form-control" required="">
									
									</div>
								</div>
								</fieldset>
							</div>
							
							<div class="col-md-12">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Image<span>*</span></label>
									<div class="col-lg-12">
										<input type="file" name="file" class="form-control" required="">
									</div>
								</div>
							</fieldset>
							</div>	
							<div class="text-right">
								<button type="submit" class="btn btn-primary rounded-round">Submit <i class="icon-paperplane ml-2"></i></button>
							</div>
							</div>
						</form>
					</div>
				</div>
				<!-- /form inputs -->

			</div>
			<!-- /content area -->
<?php include 'footer.php';?>