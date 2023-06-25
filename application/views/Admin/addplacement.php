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
							<a href="#" class="breadcrumb-item">Manage Placement</a>
							<span class="breadcrumb-item active">Add Placement</span>
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
						<h5 class="card-title font-weight-bold">Add Placement</h5>
						
					</div>

					<div class="card-body">
						
							<form action="<?php echo base_url(); ?>Admin/add" method="POST">
							<div class="row">
									<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Placement Name<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="name" value="<?php if($message[0]->name){ echo $message[0]->name; } ?>" required="">
									</div>
								</div>

								<input type="hidden" name="option" value="Placement">
								<input type="hidden" name="id" value="<?php if($message[0]->id){ echo $message[0]->id; } ?>">
								<div class="form-group row">
									<label class="col-form-label">Placement Description</label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" class="form-control" name="description" required=""><?php if($message[0]->description){ echo $message[0]->description; } ?></textarea>
									</div>
								</div>
								
							</fieldset>
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