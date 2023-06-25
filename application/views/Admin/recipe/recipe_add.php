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
					<span class="breadcrumb-item active"><?= isset($data)? "Update Recipes":'Add Recipe(s)'; ?></span>
				</div>

			</div>


		</div>
	</div>
	<!-- /page header -->


	<!-- Content area -->
	<div class="content">
	<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title font-weight-bold"> Search Recipe Name</h5>
			</div>

			<div class="card-body">
				<div class="mb-4">
					<h6 class="font-weight-semibold">Loading Food Items</h6>
 
						<select class="food select2" style="width: 100% !important;"  onchange="selectv(this)" id="food_items_dd">
							<option value="">--SELECT--</option>
							<!-- <option value="<?#=$food->id?>" ><?#=$food->food_name?></option> -->
							<?php
				 
							foreach ($all_food as $key => $food) { 
							$sel = 	$addfoodid == $food['id'] ? 'selected' : '' ;
								?>
								
								<option value="<?=$food['id']?>" <?=$sel;?>><?=$food['food_name']?></option>
							<?php } ?>
 
						</select>
 
				</div>
			</div>
	</div>
 
	<!-- Form inputs -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title font-weight-bold"> <?= isset($data)? "Update Recipes":'Add Recipe(s)'; ?></h5>
			</div>

			<div class="card-body">
				<form id="form1" enctype='multipart/form-data' action="<?=base_url();?><?= isset($data)? 'Admin_recipe/updatenewrecipe':'Admin_recipe/addnewrecipe'; ?>" method="POST">
					<div class="row">
						<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label"> Name<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" class="form-control" id="food_name" name="short_name" required="" <?= isset($data)? "value='".$data['short_name']."'":'';?>>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label"> Cuisine Type<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" class="form-control" name="cuisine_type" required="" <?= isset($data)? "value='".$data['cuisine_type']."'":''; ?> >
									</div>
								</div>
							</fieldset>
						</div>

						<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Difficulty Type<span>*</span></label>
									<div class="col-lg-12">
										<select class="form-control" name="difficulty">
											<option>Select Difficulty</option>
											<option value="1" <?= isset($data)? ($data['difficulty_type']==1? 'selected':''):''  ; ?>>Easy</option>
											<option value="2"<?= isset($data)? ($data['difficulty_type']==2? 'selected':''):''  ; ?>>Medium</option>
											<option value="3"<?= isset($data)?( $data['difficulty_type']==3? 'selected':''):''  ; ?>>Hard</option>
											<option value="4"<?= isset($data)? ($data['difficulty_type']==4? 'selected':''):''  ; ?>>Professional</option>
											<option value="5"<?= isset($data)? ($data['difficulty_type']==5? 'selected':'' ):''  ; ?>>Ultimate</option>
										</select>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Preparation Time(min)<span>*</span></label>
									<div class="col-lg-12">
										<input type="number" class="form-control" name="prep_time" required="" <?= isset($data)? "value='".$data['prep_time']."'":''; ?>>
									</div>
								</div>
							</fieldset>
						</div>
						
						<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Serving (no of people)<span>*</span></label>
									<div class="col-lg-12">
										<input type="number" class="form-control" name="serving" required="" <?= isset($data)? "value='".$data['serving']."'":''; ?> >
									</div>
								</div>
							</fieldset>
						</div>
						
						<div class="col-md-12">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Recipe Description</label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" class="form-control" name="description" required=""><?= isset($data)? $data['description']:''; ?></textarea>
									</div>
								</div>
							</fieldset>
						</div>

						<div class="col-md-12">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Recipe Note(s)</label>
									<div class="col-lg-12">
										<textarea rows="3" cols="3" class="form-control" name="notes" required=""> <?= isset($data)? $data['notes']:''; ?></textarea>
									</div>
								</div>
							</fieldset>
						</div>
						
						<?php if(isset($data)): ?> <div class="col-md-12"> <?php else: ?><div class="col-md-6"> <?php endif; ?>
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Featured Recipe<span>*</span></label>
									<div class="col-lg-12">
										<select class="form-control" name="featured">
											<option>Select-</option>
											<option value="1" <?= isset($data)? ($data['featured']==1? 'selected':'' ):''  ; ?> >Yes</option>
											<option value="0" <?= isset($data)? ($data['featured']==0? 'selected':'' ):''  ; ?> >No</option>
										</select>
									</div>
								</div>
							</fieldset>
						</div>
						<?php if(isset($data)): ?>
							<div class="col-md-3">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Curent Image</label>
									<div class="col-lg-12">
										<img src="<?=base_url().$data['image_link']; ?>" alt="" style="max-height:375px;">
										<input type="hidden" name="cimagelink" value="<?=$data['image_link']; ?>">
										<input type="hidden" name="id" value="<?=$data['id']; ?>">
									</div>
								</div>
							</fieldset>
						</div>
						<?php endif; ?>
						<div class="col-md-9">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Recipe Image</label>
									<div class="col-lg-12">
										<input type="file" name="recipeimage" class="form-control">
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
 <script>
	 		window.onload = function() {
					console.log('window - onload'); // 4th
					$('.select2').select2();
			 };
			 
		

			 function selectv(elem){
				var recipeElem =  document.getElementById("food_name");
				
				var foodmasterId = elem.value;
 
				var formitem ='<input type="hidden" name="food_master_id" value="'+foodmasterId+'">';
				$('#form1').prepend(formitem);
 
				recipeElem.value = elem.options[elem.selectedIndex].text;


			 }

			 function refresh(){
				 // delete hidden food id elem
			 }
 </script>

<?php  
	if($addfoodid):
?>
<script>
		intialupdate();
	 function intialupdate(){
		var food_items_elem =  document.getElementById("food_items_dd");
		var recipeElem =  document.getElementById("food_name");
		recipeElem.value = food_items_elem.options[food_items_elem.selectedIndex].text;

		var foodmasterId = food_items_elem.options[food_items_elem.selectedIndex].value;
		var formitem ='<input type="hidden" name="food_master_id" value="'+foodmasterId+'">';
		$('#form1').prepend(formitem);

	 }
</script>
<?php endif;
?>
 