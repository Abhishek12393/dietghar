<?php
//pr($message);die;
 include('header.php');?>
<?php include('sidebar.php');?>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/editors/ckeditor/ckeditor.js"></script>
	
	<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/editor_ckeditor_default.js"></script>
<style type="text/css">
	.img100{
		width: 300px;
		height: 300px;
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
							<a href="#" class="breadcrumb-item">Manage Exercise</a>
							<span class="breadcrumb-item active">Update Exercise</span>
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
						<h5 class="card-title font-weight-bold">Update Exercise</h5>
					</div>

					<div class="card-body">
						<form action="#" method="POST">
							<div class="row">
							<div class="col-md-6">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Exercise Name<span>*</span></label>
									<div class="col-lg-12">
									<input type="text" class="form-control" name="name" value="<?=$message[0]->title?>" readonly  required="">
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
										
										<option value="Male"><?=$message[0]->exercise_cat_name?></option>
										
									</select>
									</div>
								</div>
								</fieldset>
							</div>
							<?php 
							$primary =  (explode(",",$message[0]->primary_muscle));
							$secondary =  (explode(",",$message[0]->secondary_mucle));

							?>
							<div class="col-md-12">
										<fieldset class="mb-3">
											<label class="col-form-label">Primary Muscle Group<span>*</span></label>
								<div class="form-group row">
									<!-- <div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" <?php if (in_array("Abs", $primary)){ echo 'checked' ;}  ?> class="form-check-input-styled" name="primary[]" data-fouc>
												Abs
										</label>
										</div>
									</div> -->
									<!-- <div class="col-md-2">
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
									</div> -->
									<?php foreach ($primary as $key => $value) {
									 ?>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" checked class="form-check-input-styled" name="primary[]" data-fouc>
												<?=html_entity_decode($value)?>
										</label>
										</div>
									</div>
								<?php } ?>
								</div>
							</fieldset>
							</div>	
							<div class="col-md-12">
										<fieldset class="mb-3">
											<label class="col-form-label">Secondary Muscle Group<span>*</span></label>
								<div class="form-group row">
									<!-- <div class="col-md-2">
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
									</div> -->
									<?php foreach ($secondary as $key => $value1) {
									 ?>
									<div class="col-md-2">
										<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" checked class="form-check-input-styled" name="secondary[]" data-fouc>
												<?=html_entity_decode($value1)?>
										</label>
										</div>
									</div>
								<?php } ?>
								</div>
							</fieldset>
							</div>
							<div class="col-md-12">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Exercise Description</label>
									<div class="col-lg-12">
										<textarea rows="6" cols="6" id="editor-full" class="form-control" name="description" required=""><?php echo html_entity_decode($message[0]->summary)?></textarea>
									</div>
								</div>
							</fieldset>
							</div>	
							<!-- <div class="col-md-4">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Male Image</label>
									<div class="col-lg-12">
										<input type="file" name="file" class="form-control">
									</div>
								</div>
							</fieldset>
							</div>	 -->
							<?php
								 $path = explode(".", $message[0]->file_name);
								 $newpath =  explode("/",$path[0]);
								 $male = base_url().$newpath[0]."/".$newpath[1]."/images/".$newpath[2]."_Male.svg" ;
								 $female = base_url().$newpath[0]."/".$newpath[1]."/images/".$newpath[2]."_Female.svg" ;
							?>
							<div class="col-md-6">
								<label class="col-form-label">Male Image</label><br>
								<img src="<?=$male?>" class="img100">
							</div>
							<!-- <div class="col-md-4">
										<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Female Image</label>
									<div class="col-lg-12">
										<input type="file" name="file" class="form-control">
									</div>
								</div>
							</fieldset>
							</div> -->
							<div class="col-md-6">
								<label class="col-form-label">FeMale Image</label><br>
								<img src="<?=$female?>"  class="img100">
							</div>	
							<!-- <div class="text-right">
								<button type="submit" class="btn btn-primary rounded-round">Submit <i class="icon-paperplane ml-2"></i></button>
							</div> -->
						</div>
						</form>
					</div>
				</div>
				<!-- /form inputs -->
			</div>
			<!-- /content area -->
<?php include 'footer.php';?>