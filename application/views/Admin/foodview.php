<?php include('header.php');?>
<?php include('sidebar.php');

?>
<style type="text/css">
	.paddtp1{
		padding-top: 1%;
	}
</style>
<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Food Master</a>
							<span class="breadcrumb-item active">View Food</span>
						</div>

					</div>

				
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">View Food</h5>
					</div>
					<div class="card-body">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label col-lg-2"><b>Food Item Name :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->food_name;  ?>
									</div>
									<label class="col-form-label col-lg-2"><b>Food Category :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->food_category_name;  ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-2"><b>Food Category Type :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->food_type_name;  ?>
									</div>
									<label class="col-form-label col-lg-2"><b>Food Unit :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->unit;  ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-2"><b>Recipes Ingredients :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->recipe;  ?>
									</div>
									<label class="col-form-label col-lg-2"><b>Method Of Preparation :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->ingredients;  ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-2"><b>Calories :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->calories;  ?>
									</div>
									<label class="col-form-label col-lg-2"><b>Protein :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->protein;  ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-2"><b>Carbohydrates :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->carbohydrates;  ?>
									</div>
									<label class="col-form-label col-lg-2"><b>Fats :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->fat;  ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-2"><b>Sodium :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->sodium;  ?>
									</div>
									<label class="col-form-label col-lg-2"><b>Iron :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->iron;  ?>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label col-lg-2"><b>D-FIBRE :</b></label>
									<div class="col-lg-4 paddtp1">
										<?php echo $message[0]->d_fibre;  ?>
									</div>
								</div>
							</fieldset>
						</div>
				</div>
				<!-- /basic responsive configuration -->
			</div>
			<!-- /content area -->
<?php include 'footer.php';?>