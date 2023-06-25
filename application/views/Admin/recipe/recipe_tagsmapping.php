<script src="<?= base_url(); ?>admin/global_assets/js/plugins/forms/inputs/duallistbox/duallistbox.min.js"></script>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-light">
		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="<?= base_url(); ?>Admin/Dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<a href="<?= base_url(); ?>Admin_recipe/view" class="breadcrumb-item">View Recipe</a>
					<span class="breadcrumb-item active"> Add / view Tag(s) </span>
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
				<h5 class="card-title font-weight-bold"> Add / Update Tag for Recipe:  <?php echo $recName ; ?> </h5>

			</div>
			<?php #pr($data) ; ?>
			<?php # pr($taglist) ; ?>
			<div class="card-body">
				<form enctype='multipart/form-data' action="<?=base_url();?>Admin_recipe/addtagforRecipe" method="POST">
				<input type="hidden" name="recipe_id" value="<?=$recipeId; ?>">
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label></label>
												<!-- Multiple selection --> 
										<select multiple="multiple" class="form-control listbox-no-selection" data-fouc name="tags[]" id="tags" >
											<?php
									 
													foreach ($taglist as $value) { 	
														$sel = '';
														foreach ($data as $value2){
															if($value->id == $value2->tag_id){
																$sel = 'selected';
															}
														}
																?>
																<option value="<?php echo $value->id ;  ?>" <?=$sel;?> > <?php echo $value->tag_name ; ?> </option> 
															<?php
															
												}
												 
											?>
										</select>
							</div>
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
 
	var dualistbox = 	$('.listbox-no-selection').bootstrapDualListbox({
						selectorMinimalHeight: 300,
 
    });
		 $(document).ready(function () { 
			
				dualistbox.change(function() {
					// alert( "Handler for .change() called." );
					console.log(dualistbox.val());
				});
		  });
	</script>