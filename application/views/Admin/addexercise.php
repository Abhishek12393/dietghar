<?php include('header.php');?>
<?php include('sidebar.php');?>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Manage Exercise</a>
							<span class="breadcrumb-item active">Add Exercise</span>
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
						<h5 class="card-title font-weight-bold">Add Exercise</h5>
						
					</div>

					<div class="card-body">
						
							<form action="#" method="POST">
							<div class="row">
							<div class="col-md-6">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Exercise Name<span>*</span></label>
									<div class="col-lg-12">
									<input type="text" class="form-control" name="name" required="">
									</div>
								</div>
								</fieldset>
							</div>
							<div class="col-md-6">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Category<span>*</span></label>
									<div class="col-lg-12">
									<select class="form-control">
										<option>Select Category</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
									</div>
								</div>
								</fieldset>
							</div>
							<div class="col-md-12">
										<fieldset class="mb-3">
											<label class="col-form-label">Primary Muscle Group<span>*</span></label>
								<div class="form-group row">
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Abs
										</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Abs 2
										</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Biceps 3
										</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Biceps 3
										</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Biceps 3
										</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Biceps 3
										</label>
										</div>
									</div>
								</div>
							</fieldset>
							</div>	
							<div class="col-md-12">
										<fieldset class="mb-3">
											<label class="col-form-label">Secondary Muscle Group<span>*</span></label>
								<div class="form-group row">
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Abs
										</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Abs 2
										</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Biceps 3
										</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Biceps 3
										</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Biceps 3
										</label>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="primary[]" data-fouc>
												Biceps 3
										</label>
										</div>
									</div>
								</div>
							</fieldset>
							</div>
							<div class="col-md-12">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Exercise Description</label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" class="form-control" name="description" required=""></textarea>
									</div>
								</div>
							</fieldset>
							</div>	
							<div class="col-md-6">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Male Image</label>
									<div class="col-lg-12">
										<input type="file" name="file" class="form-control">
									</div>
								</div>
							</fieldset>
							</div>	
							<div class="col-md-6">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Female Image</label>
									<div class="col-lg-12">
										<input type="file" name="file" class="form-control">
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