<?php 
//pr($message);die;
include('header.php');?>
<?php include('sidebar.php');
?>
<style type="text/css">
	.width50{
		width: 50px !important;
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
							<span class="breadcrumb-item active">Edit Food Combination</span>
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
						<h5 class="card-title">Edit Food Combination</h5>
						<a style="float: right;color: #fff;" href="<?=base_url('Admin/foodCombinationList')?>" class="btn btn-primary">Manage Food Combination</a>
					</div>

				</div>
				<!-- /basic responsive configuration -->
				<div class="card-body">
						
						<form action="<?=base_url('Admin/updateFoodCombination')?>" method="POST">
							<div class="row">
									<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Placement Name</label>
									<div class="col-lg-12">
										<input type="text" name="placement_name" value="<?=$message[0]->placements;?>" class="form-control" readonly="true">
									</div>
								</div>
								
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Food Category Type</label>
									<div class="col-lg-12">
										<input type="text" name="food_category_type" value="<?=$message[0]->foodCategory;?>" class="form-control" readonly="true">
									</div>
								</div>
							</fieldset>
						</div>
						
						
						</div>
							<div class="row">
								<div class="col-md-12">
                                                       

						<table class="table" style="width: 100%;">
							
							<thead>
								<tr>
									<th>Name</th>
									<th>Quantity</th>
									<th>Unit</th>
									<th>Calories</th>
									<th>Protein</th>
									<th>Carbohydrates</th>
									<th>Fats</th>
									<th>Sodium</th>
									<th>Iron</th>
									<th>D.Fibre</th>
								</tr>
							</thead>
							<tbody>
						<?php foreach ($message as  $value1) {
						?>		
							<tr>
								<td><?=$value1->foodName?></td>
								<input type="hidden" name="id[]" value="<?=$value1->id?>">
								<input type="hidden" name="food_no" value="<?=$value1->no_of_chart?>">
								<input type="hidden" name="foodcombination" value="<?=$value1->food_combination_no?>">

								<input type="hidden" name="foodId[]" value="<?=$value1->foodId?>">
								<td><input type="number" class="width50" name="quantity[]" id="quantity_<?=$value1->id?>" onchange="Calculate('<?=$value1->id?>','<?=$value1->inicalories?>','<?=$value1->iniprotein?>','<?=$value1->inicarbo?>','<?=$value1->inifat?>','<?=$value1->inisodim?>','<?=$value1->iniiron?>','<?=$value1->inifibre?>')" value="<?=$value1->quantity?>" min="1"></td>
								<td><?=$value1->unitname;?></td>
								<td><input type="text" class="width50" readonly="true" id="calories_<?=$value1->id?>" name="calories[]" value="<?=$value1->calories?>"></td>
								<td><input type="text" class="width50" readonly="true"  id="portion_<?=$value1->id?>" name="portion[]" value="<?=$value1->portion?>"></td>
								<td><input type="text" class="width50" readonly="true"  id="carbohydrates_<?=$value1->id?>" name="carbohydrates[]" value="<?=$value1->carbohydrates?>"></td>
								<td><input type="text" class="width50" readonly="true"  id="fat_<?=$value1->id?>" name="fat[]" value="<?=$value1->fat?>"></td>
								<td><input type="text" class="width50" readonly="true" id="sodium_<?=$value1->id?>" name="sodium[]" value="<?=$value1->sodium?>"></td>
								<td><input type="text" class="width50" readonly="true" id="iron_<?=$value1->id?>" name="iron[]" value="<?=$value1->iron?>"></td>
								<td><input type="text" class="width50" readonly="true" id="d_fibre_<?=$value1->id?>" name="d_fibre[]" value="<?=$value1->d_fibre?>"></td>
							</tr>
						<?php } ?>
						</tbody>
						</table>
					
                                                        </div>
							</div>
							<div class="row" style="padding-top: 4%;">

								<div class="col-md-12">
									<label><b>Combination Food</b></label>
									<?php foreach ($message as  $value) {
									?>
									<p><span id="foodquanti_<?=$value->id?>"><?=$value->quantity?> </span><span><?=$value->foodName?></span></p>
									<?php } ?>
								</div>
							</div>
							<div class="row" style="padding-top: 4%;">
								<div class="col-md-6">
									<div class="nutritionlist">
							<div class="card nutritionlist-reapeat">
								 <div id="nutritionlist-sp">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Nutrition Details</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<!-- <a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a> -->
		                		
		                	</div>
	                	</div>
					</div>

					

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>S.no</th>
									<th>Nutrition Name</th>
									<th class="text-center">Nutrition Value</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1.</td>
									<td>Calories</td>
									<td class="text-center" id="colories1"><?=$message[0]->totalcalories?></td>
								</tr>
								<tr>
									<td>2.</td>
									<td>Protein</td>
									<td class="text-center" id="portions1"><?=$message[0]->totalprotein?></td>
								</tr>
								<tr>
									<td>3.</td>
									<td>Carbohydrates</td>
									<td class="text-center" id="carbohydratess1"><?=$message[0]->totalcarbohydrates?></td>
								</tr>
								<tr>
									<td>4.</td>
									<td>Fats</td>
									<td class="text-center" id="fats1"><?=$message[0]->totalfat?></td>
								</tr>
								<tr>
									<td>5.</td>
									<td>Sodium</td>
									<td class="text-center" id="sodiums1"><?=$message[0]->totalsodium?></td>
								</tr>
								<tr>
									<td>6.</td>
									<td>Iron</td>
									<td class="text-center" id="irons1"><?=$message[0]->totaliron?></td>
								</tr>
								<tr>
									<td>7.</td>
									<td>D. FIBRE</td>
									<td class="text-center" id="d_fibres1"><?=$message[0]->totald_fibre?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
				</div>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
					</div>
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
    function Calculate(id,iniCalories,iniprotein,inicarbo,inifat,inisodim,iniiron,inifibre){

    	var quantity = parseInt($("#quantity_"+id).val());

    	var initialcalories = iniCalories;
    	var initialprotein = iniprotein;
    	
    	var initialcalories = iniCalories;
    	var initialcarbohydrates = inicarbo;
    	var initialfat = inifat;
    	var initialsodium = inisodim;
    	var initialiron = iniiron;
    	var initialfibre = inifibre;


    	var calories = quantity*initialcalories;
    	var carbohydrates = quantity*initialcarbohydrates;
    	var fat = quantity*initialfat;
    	var sodium = quantity*initialsodium;
    	var iron = quantity*initialiron;
    	var fibre = quantity*initialfibre;
    	var Protein = quantity*initialprotein;
    	$("#calories_"+id).val(calories);
    	$("#portion_"+id).val(Protein);
    	$("#carbohydrates_"+id).val(carbohydrates);
    	$("#fat_"+id).val(fat);
    	$("#sodium_"+id).val(sodium);
    	$("#iron_"+id).val(iron);
    	$("#d_fibre_"+id).val(fibre);
    	$("#foodquanti_"+id).html(quantity+" ");


    	var items0= $('[id^="calories_"]');
    	//console.log(items)
    	var calo =0;
			$.each(items0,function(){
			var item=$(this); 
			 calo += parseInt(item.val());
			// console.log(calo)
			
			});
		$("#colories1").html(calo);

		var items0= $('[id^="portion_"]');
    	//console.log(items)
    	var por =0;
			$.each(items0,function(){
			var item=$(this); 
			 por += parseInt(item.val());
			// console.log(calo)
			
			});
		$("#portions1").html(por);
		
		var items0= $('[id^="carbohydrates_"]');
    	//console.log(items)
    	var carbo =0;
			$.each(items0,function(){
			var item=$(this); 
			 carbo += parseInt(item.val());
			// console.log(calo)
			
			});
		$("#carbohydratess1").html(carbo);

		var items0= $('[id^="fat_"]');
    	//console.log(items)
    	var fat =0;
			$.each(items0,function(){
			var item=$(this); 
			 fat += parseInt(item.val());
			// console.log(calo)
			
			});
		$("#fats1").html(fat);

		var items0= $('[id^="sodium_"]');
    	//console.log(items)
    	var sodi =0;
			$.each(items0,function(){
			var item=$(this); 
			 sodi += parseInt(item.val());
			// console.log(calo)
			
			});
		$("#sodiums1").html(sodi);
		var items0= $('[id^="iron_"]');
    	//console.log(items)
    	var irons =0;
			$.each(items0,function(){
			var item=$(this); 
			 irons += parseInt(item.val());
			// console.log(calo)
			
			});
		$("#irons1").html(irons);

		var items0= $('[id^="d_fibre_"]');
    	//console.log(items)
    	var fibres =0;
			$.each(items0,function(){
			var item=$(this); 
			 fibres += parseInt(item.val());
			// console.log(calo)
			
			});
		$("#d_fibres1").html(fibres);




    }
</script>