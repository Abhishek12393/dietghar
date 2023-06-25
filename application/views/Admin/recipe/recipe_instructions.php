<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="<?= base_url(); ?>Admin/Dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<a href="<?= base_url(); ?>Admin_recipe/view" class="breadcrumb-item">View Recipe</a>
					<span class="breadcrumb-item active"> Add / view Instruction(s) </span>
				</div>

			</div>


		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content">

		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title font-weight-bold"> Instruction for <?php echo $recName ; ?></h5>
			</div>

			<div class="card-body">
 
				<?php foreach($data as $val){ ?>
					
				<div class="row">
					<div class="col-md-6">
						*	<?=$val['quantity']; ?>&nbsp;<?=$val['instruction']; ?>
					</div>
					<div class="col-md-2">
						<a href="<?=base_url();?>Admin_recipe/deleteInstruc/<?=$val['id']; ?>">
							<button type="button" class="btn btn-danger rounded-round"><i class="fa fa-trash"></i></button>
						</a>
					</div>
					
				</div><br>
				<?php } ?>

			</div>
		</div>
 
		<!-- Form inputs -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title font-weight-bold"> Add New Instruction</h5>

			</div>

			<div class="card-body">
				<form enctype='multipart/form-data' action="<?=base_url();?>Admin_recipe/addnewins" method="POST">
				<input type="hidden" name="recipe_id" value="<?=$recipeId; ?>">
					<div class="row">
						<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Enter Text<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="itext" required="" >
									</div>
								</div>
							</fieldset>
						</div>
 
					</div>
					<div class="row">
						<div class="text-right">
							<button type="submit" class="btn btn-primary rounded-round">Submit <i class="icon-paperplane ml-2"></i></button>
						</div>
					</div>
					<!-- row ends -->
				</form>
			</div>
		</div>
		<!-- /form inputs -->

	</div>
	<!-- /content area -->
	<?php include 'footer.php'; ?>