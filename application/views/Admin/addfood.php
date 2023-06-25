<?php include('header.php');?>
<?php include('sidebar.php');

?>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Food</a>
							<span class="breadcrumb-item active">Add Food</span>
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
						<h5 class="card-title font-weight-bold">Add Food Master</h5>
						
					</div>

					<div class="card-body">
						
						<form action="<?php echo base_url(); ?>Admin/addfoodmaster" method="POST">
							<div class="row">
									<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Food Item Name<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="food_name" value="<?php if($message[0]->food_name){ echo $message[0]->food_name; } ?>" required="">

									</div>
								</div>
								<input type="hidden" name="id" value="<?php if($message[0]->id){ echo $message[0]->id; } ?>">
								<div class="form-group row">
									<label class="col-form-label">Food Category</label>
									<div class="col-lg-12">
										<select multiple="multiple" class="form-control" name="food_category" required="">
			                                 <?php foreach ($Foodcategory as  $value) {
                							?>
			                                <option value="<?=$value->id;?>" <?php if($message[0]->food_category ==$value->id ){ echo 'Selected'; } ?> ><?=$value->name;?></option>
			                                <?php } ?>
			                            </select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label">Food Category Type</label>
									<div class="col-lg-12">
										<select class="form-control" name="food_type" required="">
			                                <option value="opt1">Select Category Type</option>
			                                 <?php foreach ($Foodtype as  $value2) {
                							?>
			                                <option value="<?=$value2->id;?>" <?php if($message[0]->food_type ==$value2->id ){ echo 'Selected'; } ?>><?=$value2->name;?></option>
			                                <?php } ?>
			                            </select>
									</div>
								</div>
								<h5 class="card-title font-weight-bold">Add Recipes</h5>
								<div class="form-group row">
									<label class="col-form-label">Recipes Ingredients</label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" class="form-control" name="recipes" required=""><?php if($message[0]->recipe){ echo $message[0]->recipe; } ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label">Method Of Preparation</label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" class="form-control" name="method" required=""><?php if($message[0]->ingredients){ echo $message[0]->ingredients; } ?></textarea>
									</div>
								</div>
								
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="mb-3">
								<h5 class="card-title font-weight-bold">Nutrition</h5>
								<div class="form-group row">
									<label class="col-form-label col-lg-3">1. <span>Calories</span></label>
									
									<div class="col-lg-9">
										<input  onkeypress="javascript:return isNumber(event)" type="text" class="form-control" name="calories" value="<?php if($message[0]->calories){ echo $message[0]->calories; } ?>" required="">
									</div>
								</div>

								<div class="form-group row">
									<label class="col-form-label col-lg-3">2. <span>Protein</span></label>
									<div class="col-lg-9">
										<input  onkeypress="javascript:return isNumber(event)" type="text" class="form-control" name="protein" value="<?php if($message[0]->protein){ echo $message[0]->protein; } ?>" required="">
									</div>
								</div>

																<div class="form-group row">
									<label class="col-form-label col-lg-3">3. <span>Carbohydrates</span></label>
									<div class="col-lg-9">
										<input  onkeypress="javascript:return isNumber(event)" type="text" class="form-control" name="carbohydrates" value="<?php if($message[0]->carbohydrates){ echo $message[0]->carbohydrates; } ?>" required="">
									</div>
								</div>
																<div class="form-group row">
									<label class="col-form-label col-lg-3">4. <span>Fats</span></label>
									<div class="col-lg-9">
										<input  onkeypress="javascript:return isNumber(event)" type="text" class="form-control" name="fat" value="<?php if($message[0]->fat){ echo $message[0]->fat; } ?>" required="">
									</div>
								</div>
																<div class="form-group row">
									<label class="col-form-label col-lg-3">5. <span>Sodium</span></label>
									<div class="col-lg-9">
										<input  onkeypress="javascript:return isNumber(event)" type="text" class="form-control" name="sodium" value="<?php if($message[0]->sodium){ echo $message[0]->sodium; } ?>" required="">
									</div>
								</div>
																<div class="form-group row">
									<label class="col-form-label col-lg-3">6. <span>Iron</span></label>
									<div class="col-lg-9">
										<input  onkeypress="javascript:return isNumber(event)" type="text" class="form-control" name="iron" value="<?php if($message[0]->iron){ echo $message[0]->iron; } ?>" required="">
									</div>
								</div>
																<div class="form-group row">
									<label class="col-form-label col-lg-3">7. <span>D-FIBRE</span></label>
									<div class="col-lg-9">
										<input  onkeypress="javascript:return isNumber(event)" type="text" class="form-control" name="fibre" value="<?php if($message[0]->d_fibre){ echo $message[0]->d_fibre; } ?>" required="">
									</div>
								</div>
														<div class="form-group row">
									<label class="col-form-label col-lg-3">Food Unit</label>
									<div class="col-lg-9">
										<select class="form-control" name="foodunit" required="">
			                                <option value="opt1">Select Food Unit</option>
			                                <?php foreach ($Units as  $value1) {
                							?>
			                                <option value="<?=$value1->id;?>" <?php if($message[0]->unit ==$value1->id ){ echo 'Selected'; } ?>><?=$value1->name;?></option>
			                                <?php } ?>
			                                
			                            </select>
									</div>
								</div>
								<!-- <div class="form-group row">
									<label class="col-form-label col-lg-3">Image</label>
									<div class="col-lg-9">
										<input type="file" class="form-control h-auto" name="image">
									</div>
								</div> -->
							</fieldset>
						</div>
							</div>
							

							<div class="text-right">
								<button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
					</div>
				</div>
				<!-- /form inputs -->

			</div>
			<!-- /content area -->
<?php include 'footer.php';?>
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
</script>