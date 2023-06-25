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
							<a href="#" class="breadcrumb-item">Manage Review</a>
							<span class="breadcrumb-item active">Update Review</span>
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
						<h5 class="card-title font-weight-bold">Update Review</h5>
						
					</div>

					<div class="card-body">
						<form action="<?php echo base_url('Admin/update_review');?>" method="POST">
							<div class="row">
							<div class="col-md-12">
										<fieldset class="mb-3">
								<div class="form-group row">
									
									<div class="col-lg-6">
										<label class="col-form-label">S.No<span>*</span></label>
									<input type="text" class="form-control" readonly="" value="<?php echo $review[0]->id ?>" name="id" required="">
									<input type="hidden" value="<?php echo $review[0]->id ?>" name="id"  class="form-control">
									</div>
									<div class="col-lg-6">
									<label class="col-form-label">Facebook ID<span>*</span></label>
									
									<input type="text" class="form-control" readonly="" value="<?php echo $review[0]->fb_id ?>" name="fb_id" required="">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-6">
										<label class="col-form-label">Review On<span>*</span></label>
									<input type="text" class="form-control"  value="<?php echo $review[0]->name ?>" name="name" required="">
									</div>
									<div class="col-lg-6">
										<label class="col-form-label">Rating<span>*</span></label>
									<input type="text" class="form-control"  value="<?php echo $review[0]->rating ?>" name="rating" required="">
									
									</div>
									
								</div>
								</fieldset>
								<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Review<span>*</span></label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" class="form-control" name="review" required=""><?php echo $review[0]->review ?></textarea>
									</div>
								</div>
							</fieldset>
							<fieldset class="mb-3">
								<div class="form-group row">
									<div class="col-lg-6">
										<label class="col-form-label">Review On<span>*</span></label>
									<input type="text" class="form-control" readonly="" value="<?php echo $review[0]->review_on ?>" name="reviewon" required="">
									</div>
									
									<div class="col-lg-6">
										<label class="col-form-label">Status<span>*</span></label>
										<select class="form-control" name="status">
												<option value="1" <?php if ($review[0]->status == '1' ) echo 'selected' ; ?> > Active</option>
										<option value="0" <?php if ($review[0]->status == '0' ) echo 'selected' ; ?> > InActive</option>
											
										</select>
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
<?php include 'footer.php';?>