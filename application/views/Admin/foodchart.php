<?php
/*if(in_array('Mid Meal',$_POST['Placement']))
{
}*/
//pr($_post['Placement']);die();
// pr($all_food);die;
// $cust_id = $this->uri=>segment(3);
 include('header2.php');?>
<!-- Main content -->
<style type="text/css">
.table td, .table th{padding: 4px !important;}
.badge{padding: 4px;}
.badge-clr1 {color: #fff;background-color: #009688;float: right;}
.badge-clr2 {color: #fff;background-color: #abab3e;
/* float: right;*/padding: 8px;font-size: 12px;
}
.badge-clr21 {color: #fff;background-color: #abab3e;padding: 8px;font-size: 12px;}
.badge-clr22 {color: #fff;background-color: #abab3e;}
.badge-clr3 {color: #fff;background-color: red;}
.badge-clr4 {color: #fff;background-color: #62a52f;}
.badge-clr5 {color: #fff;background-color: #0037ff;}
.badge-clr6 {color: #fff;background-color: #2196f3;}
.badge-clr7 {color: #fff;background-color: #5c6bc0;}
.badge-clr8 {color: #fff;background-color: #ff7043;}
.fa-2x {font-size: 21px !important;}
.hidden{display: none;}
.btn-primary {color: #fff;background-color: #2196f3;padding: 5px;}
.type{display: none;}
</style>
<?php 
//$ty = 4;
if($ty==4){
	$type_class_bedtime = 'type';
	/*$type_class_midmeal = 'type';*/
}
if($ty==3){
	$type_class_breafast = 'type';
	$type_class_eveningtea = 'type';
}
if($ty==2){
	$type_class_eveningtea = 'type';
}
if($ty==5){
	$type_class_midmeal = 'type';
	$type_class_eveningtea = 'type';
}
if($ty==6){
	$type_class_dinner = 'type';
}
if($ty==7){
	$type_class_lunch = 'type';
}
if($ty==8){
	$type_class_midmeal = 'type';
	$type_class_eveningtea = 'type';
	$type_class_bedtime = 'type';
}
?>
<?php
  	foreach ($all_food as $key => $value) { ?>
        <input type="hidden" id="calo_<?=$value['id']?>" value="<?=$value['calories']?>">
        <input type="hidden" id="protein_<?=$value['id']?>" value="<?=$value['protein']?>">
        <input type="hidden" id="carbohydrates_<?=$value['id']?>" value="<?=$value['carbohydrates']?>">
        <input type="hidden" id="fat_<?=$value['id']?>" value="<?=$value['fat']?>">
        <input type="hidden" id="sodium_<?=$value['id']?>" value="<?=$value['sodium']?>">
        <input type="hidden" id="iron_<?=$value['id']?>" value="<?=$value['iron']?>">
        <input type="hidden" id="d_fibre_<?=$value['id']?>" value="<?=$value['d_fibre']?>">
         <?php } ?>
		<div class="content-wrapper">
			<!-- Content area -->
			<div class="content">
				<!-- Hover rows -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Chart Details</h5>
						<h5 style="float: right;">
							<span class="badge badge-clr22">Calories</span>
							<span class="badge badge-clr3">Protein</span>
							<span class="badge badge-clr4">Carbohydrates</span>
							<span class="badge badge-clr5">Fats</span>
							<span class="badge badge-clr6">Sodium</span>
							<span class="badge badge-clr7">Iron</span>
							<span class="badge badge-clr8">D.Fibre</span>
						</h5>
					</div>

					<div class="table-responsive">
						<strong class="hidden"> <strong class="">
        		  			<span id="passenger-sp">
								<select class="quantity">
							        <option value="0">0</option>
							        <option value="1" <?php if($value1['quantity']=='1'){ echo "Selected"; } ?> >1</option>
							        <option value="1.5" <?php if($value1['quantity']=='1.5'){ echo "Selected"; } ?>>1.5</option>
							        <option value="2" <?php if($value1['quantity']=='2'){ echo "Selected"; } ?>>2</option>
							        <option value="2.5" <?php if($value1['quantity']=='2.5'){ echo "Selected"; } ?>>2.5</option>
							        <option value="3" <?php if($value1['quantity']=='3'){ echo "Selected"; } ?>>3</option>
							        <option value="4" <?php if($value1['quantity']=='4'){ echo "Selected"; } ?>>4</option>
							      </select>
       
							      <select class="food select2" style="width: 100% !important;">
							    	<?php
							        foreach ($all_food as $key => $value2) { ?>
							          <option value="<?=$value2['id']?>" <?php if($value2['id']==$value1['foodId']){ echo "Selected"; } ?> ><?=$value2['food_name']?></option> 
							        <?php }
							       ?>
							      </select>
      
     						</span>
 						</strong></strong>
<form method="post" action="<?=base_url('Admin/Submit_client_chart')?>">
	<table class="table table-hover table-bordered">
	<input type="hidden" name="cust_id" value="<?=$cust_id?>">
	<thead>
	<tr>
	<th></th>
	<?php if(in_array('Early Morning',$_POST['Placement']))
	{ ?><th>Early Morning<p class="badge badge-clr1">6 AM</p></p></th><?php	} ?>
	<?php if(in_array('Breakfast',$_POST['Placement']))
	{ ?><th class="<?php echo $type_class_breafast;?>">Breakfast<p class="badge badge-clr1">9 AM</p></th><?php } ?>
	<?php if(in_array('Mid Meal',$_POST['Placement']))
	{ ?><th class="<?php echo $type_class_midmeal;?>">Mid Meal<p class="badge badge-clr1">11 AM</p></th><?php } ?>
	<?php if(in_array('Lunch',$_POST['Placement']))
	{ ?><th class="<?php echo $type_class_lunch;?>">Lunch<p class="badge badge-clr1">1 PM</p></th><?php } ?>
	<?php if(in_array('Evening Snack',$_POST['Placement']))
	{ ?><th class="<?php echo $type_class_eveningtea;?>">Evening Snack<p class="badge badge-clr1">4 PM</p></th><?php } ?>
	<?php if(in_array('Dinner',$_POST['Placement']))
	{ ?><th class="<?php echo $type_class_dinner;?>">Dinner<p class="badge badge-clr1">8 PM</p></th><?php } ?>
	<?php if(in_array('Bed Time',$_POST['Placement']))
	{ ?><th class="<?php echo $type_class_bedtime;?>">Bed Time<p class="badge badge-clr1">10 PM</p></th><?php } ?>
	<th>Total</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($message as $key => $value) {
	$box_calo =0;
	$box_pro =0;
	$box_fat =0;
	$box_cabs =0;
	$box_sodium =0;
	$box_iron =0;
	$box_fibre =0;
	$total_box_calo =0;
	$total_box_pro =0;
	$total_box_fat =0;
	$total_box_cabs =0;
	$total_box_sodium =0;
	$total_box_iron =0;
	$total_box_fibre =0;
	$day = $key+1;
	?>
	<tr>
	<td style="width: 3%">Day <?=$key+1;?></td>
	<?php if(in_array('Early Morning',$_POST['Placement']))
	{ ?>
	<td style="width: 12%" class="cursor-move">
	<div style="padding-top: 15%;">
	<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
	<strong class="passenger-list_morning_<?=$day?>">
	<strong class="">
	<span>
	<?php
	// eaerly morning column :: 
	$name = "morning";

	foreach ($value['morning_data'] as $key => $value1) { ?>  
 	 <?php # prd($value1); ?>   
	<input type="text" class="" id="tb_<?=$name?>_fod_data_<?=$value1['foodId']?>" name="tb_<?=$day?>_<?=$name?>_data_food[]"  value='<?= $value1['food_name']; ?>' data-id='' >

	<select name="<?=$day?>_<?=$name?>_data_quantity[]" id="<?=$name?>_fod_quan_<?=$value1['foodId']?>_<?=$day?>" onchange="changes('<?=$value1['foodId']?>','<?=$name?>','<?=$day?>')">
		<option value="0">0</option>
		<option value="1" <?php if($value1['quantity']=='1'){ echo "Selected"; } ?> >1</option>
		<option value="1.5" <?php if($value1['quantity']=='1.5'){ echo "Selected"; } ?>>1.5</option>
		<option value="2" <?php if($value1['quantity']=='2'){ echo "Selected"; } ?>>2</option>
		<option value="2.5" <?php if($value1['quantity']=='2.5'){ echo "Selected"; } ?>>2.5</option>
		<option value="3" <?php if($value1['quantity']=='3'){ echo "Selected"; } ?>>3</option>
		<option value="4" <?php if($value1['quantity']=='4'){ echo "Selected"; } ?>>4</option>
	</select>
	<!-- <select name="<?=$day?>_<?=$name?>_data_food[]" id="<?=$name?>_fod_data_<?=$value1['foodId']?>" style="width: 100% !important;">
	<?php
		foreach ($all_food as $key => $value2) { ?>
		<option value="<?=$value2['id']?>" <?php if($value2['id']==$value1['foodId']){ echo "Selected"; } ?> ><?=$value2['food_name']?></option> 
		<?php } ?>
	</select> -->

	<span id="<?=$name?>_calspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_cal" style="display:none;"><?php echo  $value1["calories"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_prospan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_pro" style="display:none;"><?php echo  $value1["protein"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_carbohydratesspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_carbohydrates" style="display:none;"><?php echo  $value1["carbohydrates"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_fatspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_fat" style="display:none;"><?php echo  $value1["fat"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_sodiumspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_sodium" style="display:none;"><?php echo  $value1["sodium"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_ironspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_iron" style="display:none;"><?php echo  $value1["iron"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_d_fibrespan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_d_fibre" style="display:none;"><?php echo  $value1["d_fibre"]*$value1["quantity"] ?></span>
	<?php 
		$box_calo += ($value1['quantity']*$value1['calories']);
		$box_pro += ($value1['quantity']*$value1['protein']);
		$box_fat += ($value1['quantity']*$value1['fat']);
		$box_cabs += ($value1['quantity']*$value1['carbohydrates']);
		$box_sodium += ($value1['quantity']*$value1['sodium']);
		$box_iron += ($value1['quantity']*$value1['iron']);
		$box_fibre += ($value1['quantity']*$value1['d_fibre']);
	}
	?>

	</span>
	</strong>
	</strong>									
	</p>
	</div>
	<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" ><?=$box_calo?></span>
	<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" ><?=$box_pro?></span>
	<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>"><?=$box_cabs?></span>
	<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>"><?=$box_fat?></span>
	<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>"><?=$box_sodium?></span>
	<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>"><?=$box_iron?></span>
	<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>"><?=$box_fibre?></span>
	<?php 
	$total_box_calo += $box_calo;
	$total_box_pro +=$box_pro;
	$total_box_fat +=$box_fat;
	$total_box_cabs +=$box_cabs;
	$total_box_sodium +=$box_sodium;
	$total_box_iron +=$box_iron;
	$total_box_fibre +=$box_fibre;
	$box_calo =0;
	$box_pro =0;
	$box_fat =0;
	$box_cabs =0;
	$box_sodium =0;
	$box_iron =0;
	$box_fibre =0;
	?>
	<!--<div class="list-icons" style="float: right;">
	<a href="#" class="list-icons-item" data-toggle="modal" data-target="#edit_modal">
	<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
	</a>
	</div>-->
	<a href="javascript:void(0);" class="btn btn-primary passenger_morning"  type="<?=$day?>">Add More</a>
	<!--<button >Add More</button>-->
	</td>
	<?php } ?>
	<?php if(in_array('Breakfast',$_POST['Placement']))
	{ ?>
	<td style="width: 12%" class="cursor-move <?php echo $type_class_breafast;?>">
	<!-- <p class="badge badge-clr2">137</p> -->
	<div style="padding-top: 15%;">
	<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
	<strong class="passenger-list_breakfast_<?=$day?>">
	<strong class="">
	<span>
	<?php
	$name = "breakfast";
	foreach ($value['breakfast_data'] as $key => $value1) { ?>
	<select name="<?=$day?>_<?=$name?>_data_quantity[]" id="<?=$name?>_fod_quan_<?=$value1['foodId']?>_<?=$day?>" onchange="changes('<?=$value1['foodId']?>','<?=$name?>','<?=$day?>')">
	<option value="0">0</option>
	<option value="1" <?php if($value1['quantity']=='1'){ echo "Selected"; } ?> >1</option>
	<option value="1.5" <?php if($value1['quantity']=='1.5'){ echo "Selected"; } ?>>1.5</option>
	<option value="2" <?php if($value1['quantity']=='2'){ echo "Selected"; } ?>>2</option>
	<option value="2.5" <?php if($value1['quantity']=='2.5'){ echo "Selected"; } ?>>2.5</option>
	<option value="3" <?php if($value1['quantity']=='3'){ echo "Selected"; } ?>>3</option>
	<option value="4" <?php if($value1['quantity']=='4'){ echo "Selected"; } ?>>4</option>
	</select>
	<select class="select2" name="<?=$day?>_<?=$name?>_data_food[]" id="<?=$name?>_fod_data_<?=$value1['foodId']?>" style="width: 100% !important;">
	<?php
	foreach ($all_food as $key => $value2) { ?>
	<option value="<?=$value2['id']?>" <?php if($value2['id']==$value1['foodId']){ echo "Selected"; } ?> ><?=$value2['food_name']?></option> 
	<?php } ?>
	</select>
	<span id="<?=$name?>_calspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_cal" style="display:none;"><?php echo  $value1["calories"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_prospan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_pro" style="display:none;"><?php echo  $value1["protein"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_carbohydratesspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_carbohydrates" style="display:none;"><?php echo  $value1["carbohydrates"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_fatspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_fat" style="display:none;"><?php echo  $value1["fat"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_sodiumspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_sodium" style="display:none;"><?php echo  $value1["sodium"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_ironspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_iron" style="display:none;"><?php echo  $value1["iron"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_d_fibrespan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_d_fibre" style="display:none;"><?php echo  $value1["d_fibre"]*$value1["quantity"] ?></span>
	<?php 
	$box_calo += ($value1['quantity']*$value1['calories']);
	$box_pro += ($value1['quantity']*$value1['protein']);
	$box_fat += ($value1['quantity']*$value1['fat']);
	$box_cabs += ($value1['quantity']*$value1['carbohydrates']);
	$box_sodium += ($value1['quantity']*$value1['sodium']);
	$box_iron += ($value1['quantity']*$value1['iron']);
	$box_fibre += ($value1['quantity']*$value1['d_fibre']);
	}
	?>
	</span>
	</strong>
	</strong>
	</p>
	</div>
	<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" ><?=$box_calo?></span>
	<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>"><?=$box_pro?></span>
	<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>"><?=$box_cabs?></span>
	<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>"><?=$box_fat?></span>
	<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>"><?=$box_sodium?></span>
	<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>"><?=$box_iron?></span>
	<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>"><?=$box_fibre?></span>
	<?php
	$total_box_calo += $box_calo;
	$total_box_pro +=$box_pro;
	$total_box_fat +=$box_fat;
	$total_box_cabs +=$box_cabs;
	$total_box_sodium +=$box_sodium;
	$total_box_iron +=$box_iron;
	$total_box_fibre +=$box_fibre;
	$box_calo =0;
	$box_pro =0;
	$box_fat =0;
	$box_cabs =0;
	$box_sodium =0;
	$box_iron =0;
	$box_fibre =0;
	?>
	<!--<div class="list-icons" style="float: right;">
	<a href="#" class="list-icons-item" data-toggle="modal" data-target="#edit_modal">
	<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
	</a>
	</div>-->
	<a href="javascript:void(0);" class="btn btn-primary passenger_breakfast"  type="<?=$day?>">Add More</a>
	<!-- <button class="passenger_breakfast"  type="<?=$day?>">Add More</button> -->
	</td>
	<?php } ?>
	<?php if(in_array('Mid Meal',$_POST['Placement']))
	{ ?>
	<td style="width: 12%" class="cursor-move <?php echo $type_class_midmeal;?>">
	<!-- <p class="badge badge-clr2">137</p> -->
	<div style="padding-top: 15%;">
	<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
	<strong class="passenger-list_midmeal_<?=$day?>">
	<strong class="">
	<span >
	<?php
	$name = "midmeal";
	foreach ($value['midmeal_data'] as $key => $value1) { ?>
	<select name="<?=$day?>_<?=$name?>_data_quantity[]" id="<?=$name?>_fod_quan_<?=$value1['foodId']?>_<?=$day?>" onchange="changes('<?=$value1['foodId']?>','<?=$name?>','<?=$day?>')">
	<option value="0">0</option>
	<option value="1" <?php if($value1['quantity']=='1'){ echo "Selected"; } ?> >1</option>
	<option value="1.5" <?php if($value1['quantity']=='1.5'){ echo "Selected"; } ?>>1.5</option>
	<option value="2" <?php if($value1['quantity']=='2'){ echo "Selected"; } ?>>2</option>
	<option value="2.5" <?php if($value1['quantity']=='2.5'){ echo "Selected"; } ?>>2.5</option>
	<option value="3" <?php if($value1['quantity']=='3'){ echo "Selected"; } ?>>3</option>
	<option value="4" <?php if($value1['quantity']=='4'){ echo "Selected"; } ?>>4</option>
	</select>
	<select class="select2" name="<?=$day?>_<?=$name?>_data_food[]" id="<?=$name?>_fod_data_<?=$value1['foodId']?>" style="width: 100% !important;">
	<?php
	foreach ($all_food as $key => $value2) { ?>
	<option value="<?=$value2['id']?>" <?php if($value2['id']==$value1['foodId']){ echo "Selected"; } ?> ><?=$value2['food_name']?></option> 
	<?php }
	?>
	</select>
	<span id="<?=$name?>_calspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_cal" style="display:none;"><?php echo  $value1["calories"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_prospan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_pro" style="display:none;"><?php echo  $value1["protein"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_carbohydratesspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_carbohydrates" style="display:none;"><?php echo  $value1["carbohydrates"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_fatspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_fat" style="display:none;"><?php echo  $value1["fat"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_sodiumspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_sodium" style="display:none;"><?php echo  $value1["sodium"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_ironspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_iron" style="display:none;"><?php echo  $value1["iron"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_d_fibrespan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_d_fibre" style="display:none;"><?php echo  $value1["d_fibre"]*$value1["quantity"] ?></span>
	<?php
	$box_calo += ($value1['quantity']*$value1['calories']);
	$box_pro += ($value1['quantity']*$value1['protein']);
	$box_fat += ($value1['quantity']*$value1['fat']);
	$box_cabs += ($value1['quantity']*$value1['carbohydrates']);
	$box_sodium += ($value1['quantity']*$value1['sodium']);
	$box_iron += ($value1['quantity']*$value1['iron']);
	$box_fibre += ($value1['quantity']*$value1['d_fibre']);
	 }
	?>
	</span>
	</strong>
	</strong>
	</p>
	</div>
	<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" ><?=$box_calo?></span>
	<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" ><?=$box_pro?></span>
	<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>"><?=$box_cabs?></span>
	<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>"><?=$box_fat?></span>
	<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>"><?=$box_sodium?></span>
	<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>"><?=$box_iron?></span>
	<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>"><?=$box_fibre?></span> 
	<?php
	$total_box_calo += $box_calo;
	$total_box_pro +=$box_pro;
	$total_box_fat +=$box_fat;
	$total_box_cabs +=$box_cabs;
	$total_box_sodium +=$box_sodium;
	$total_box_iron +=$box_iron;
	$total_box_fibre +=$box_fibre;
	$box_calo =0;
	$box_pro =0;
	$box_fat =0;
	$box_cabs =0;
	$box_sodium =0;
	$box_iron =0;
	$box_fibre =0;
	?>
	<div class="list-icons" style="float: right;">
	<a href="#" class="list-icons-item" data-toggle="modal" data-target="#edit_modal">
	<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
	</a>
	</div>
	<a href="javascript:void(0);" class="btn btn-primary passenger_midmeal"  type="<?=$day?>">Add More</a>
	<!--  <button class="passenger_midmeal"  type="<?=$day?>">Add More</button> -->
	</td>
	<?php } ?>
	<?php if(in_array('Lunch',$_POST['Placement'])) { ?>
	<td style="width: 12%" class="cursor-move <?php echo $type_class_lunch;?>">
	<!-- <p class="badge badge-clr2">137</p> -->
	<div style="padding-top: 15%;">
	<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
	<strong class="passenger-list_<?=$day?>">
	<strong class="passenger-reapeat">
	<span>  
	<?php
	$name = "lunch";
	foreach ($value['lunch_data'] as $key => $value1) { ?>
	<select name="<?=$day?>_<?=$name?>_data_quantity[]" id="<?=$name?>_fod_quan_<?=$value1['foodId']?>_<?=$day?>" onchange="changes('<?=$value1['foodId']?>','<?=$name?>','<?=$day?>')">
	<option value="0">0</option>
	<option value="1" <?php if($value1['quantity']=='1'){ echo "Selected"; } ?> >1</option>
	<option value="1.5" <?php if($value1['quantity']=='1.5'){ echo "Selected"; } ?>>1.5</option>
	<option value="2" <?php if($value1['quantity']=='2'){ echo "Selected"; } ?>>2</option>
	<option value="2.5" <?php if($value1['quantity']=='2.5'){ echo "Selected"; } ?>>2.5</option>
	<option value="3" <?php if($value1['quantity']=='3'){ echo "Selected"; } ?>>3</option>
	<option value="4" <?php if($value1['quantity']=='4'){ echo "Selected"; } ?>>4</option>
	</select>
	<select class="select2"  name="<?=$day?>_<?=$name?>_data_food[]" id="<?=$name?>_fod_data_<?=$value1['foodId']?>" style="width: 100% !important;">
	<?php
	foreach ($all_food as $key => $value2) { ?>
	<option value="<?=$value2['id']?>" <?php if($value2['id']==$value1['foodId']){ echo "Selected"; } ?> ><?=$value2['food_name']?></option> 
	<?php } ?>
	</select>
	<span id="<?=$name?>_calspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_cal" style="display:none;"><?php echo  $value1["calories"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_prospan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_pro" style="display:none;"><?php echo  $value1["protein"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_carbohydratesspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_carbohydrates" style="display:none;"><?php echo  $value1["carbohydrates"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_fatspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_fat" style="display:none;"><?php echo  $value1["fat"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_sodiumspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_sodium" style="display:none;"><?php echo  $value1["sodium"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_ironspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_iron" style="display:none;"><?php echo  $value1["iron"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_d_fibrespan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_d_fibre" style="display:none;"><?php echo  $value1["d_fibre"]*$value1["quantity"] ?></span>
	<?php
	$box_calo += ($value1['quantity']*$value1['calories']);
	$box_pro += ($value1['quantity']*$value1['protein']);
	$box_fat += ($value1['quantity']*$value1['fat']);
	$box_cabs += ($value1['quantity']*$value1['carbohydrates']);
	$box_sodium += ($value1['quantity']*$value1['sodium']);
	$box_iron += ($value1['quantity']*$value1['iron']);
	$box_fibre += ($value1['quantity']*$value1['d_fibre']);
	}
	?>
	</span>
	</strong>
	</strong>
	</p>
	</div>
	<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" ><?=$box_calo?></span>
	<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" ><?=$box_pro?></span>
	<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>"><?=$box_cabs?></span>
	<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>"><?=$box_fat?></span>
	<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>"><?=$box_sodium?></span>
	<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>"><?=$box_iron?></span>
	<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>"><?=$box_fibre?></span>
	<?php
	$total_box_calo += $box_calo;
	$total_box_pro +=$box_pro;
	$total_box_fat +=$box_fat;
	$total_box_cabs +=$box_cabs;
	$total_box_sodium +=$box_sodium;
	$total_box_iron +=$box_iron;
	$total_box_fibre +=$box_fibre;
	$box_calo =0;
	$box_pro =0;
	$box_fat =0;
	$box_cabs =0;
	$box_sodium =0;
	$box_iron =0;
	$box_fibre =0;
	?>
	<!--<div class="list-icons" style="float: right;">
	<a href="#" class="list-icons-item" data-toggle="modal" data-target="#edit_modal">
	<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
	</a>
	</div>-->
	<a href="javascript:void(0);" class="btn btn-primary passenger"  type="<?=$day?>">Add More</a>
	<!-- <button class="passenger"  type="<?=$day?>">Add More</button> -->
	<!-- <button type="<?=$day?>" name="remove" class="passengeremove">Remove</button> -->
	</td>
	<?php } ?>
	<?php if(in_array('Evening Snack',$_POST['Placement'])) { ?>
	<td style="width: 12%" class="<?php echo $type_class_eveningtea;?>">
	<!-- <p class="badge badge-clr2">137</p> -->
	<div style="padding-top: 15%;">
	<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
	<strong class="passenger-list_evening_<?=$day?>">
	<strong class="">
	<span >
	<?php
	$name = "evening";
	foreach ($value['evening_data'] as $key => $value1) { ?>
	<select name="<?=$day?>_<?=$name?>_data_quantity[]" id="<?=$name?>_fod_quan_<?=$value1['foodId']?>_<?=$day?>" onchange="changes('<?=$value1['foodId']?>','<?=$name?>','<?=$day?>')">
	<option value="0">0</option>
	<option value="1" <?php if($value1['quantity']=='1'){ echo "Selected"; } ?> >1</option>
	<option value="1.5" <?php if($value1['quantity']=='1.5'){ echo "Selected"; } ?>>1.5</option>
	<option value="2" <?php if($value1['quantity']=='2'){ echo "Selected"; } ?>>2</option>
	<option value="2.5" <?php if($value1['quantity']=='2.5'){ echo "Selected"; } ?>>2.5</option>
	<option value="3" <?php if($value1['quantity']=='3'){ echo "Selected"; } ?>>3</option>
	<option value="4" <?php if($value1['quantity']=='4'){ echo "Selected"; } ?>>4</option>
	</select>
	<select class="select2"  name="<?=$day?>_<?=$name?>_data_food[]" id="<?=$name?>_fod_data_<?=$value1['foodId']?>" style="width: 100% !important;">
	<?php
	foreach ($all_food as $key => $value2) { ?>
	<option value="<?=$value2['id']?>" <?php if($value2['id']==$value1['foodId']){ echo "Selected"; } ?> ><?=$value2['food_name']?></option> 
	<?php } ?>
	</select>
	<span id="<?=$name?>_calspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_cal" style="display:none;"><?php echo  $value1["calories"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_prospan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_pro" style="display:none;"><?php echo  $value1["protein"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_carbohydratesspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_carbohydrates" style="display:none;"><?php echo  $value1["carbohydrates"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_fatspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_fat" style="display:none;"><?php echo  $value1["fat"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_sodiumspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_sodium" style="display:none;"><?php echo  $value1["sodium"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_ironspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_iron" style="display:none;"><?php echo  $value1["iron"]*$value1["quantity"] ?></span>
	<span id="<?=$name?>_d_fibrespan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_d_fibre" style="display:none;"><?php echo  $value1["d_fibre"]*$value1["quantity"] ?></span>
	<?php
	$box_calo += ($value1['quantity']*$value1['calories']);
	$box_pro += ($value1['quantity']*$value1['protein']);
	$box_fat += ($value1['quantity']*$value1['fat']);
	$box_cabs += ($value1['quantity']*$value1['carbohydrates']);
	$box_sodium += ($value1['quantity']*$value1['sodium']);
	$box_iron += ($value1['quantity']*$value1['iron']);
	$box_fibre += ($value1['quantity']*$value1['d_fibre']);
	}
	?>
	</span>
	</strong>
	</strong>
	</p>
	</div>
	<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" ><?=$box_calo?></span>
	<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" ><?=$box_pro?></span>
	<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>"><?=$box_cabs?></span>
	<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>"><?=$box_fat?></span>
	<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>"><?=$box_sodium?></span>
	<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>"><?=$box_iron?></span>
	<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>"><?=$box_fibre?></span>
	<?php
	$total_box_calo += $box_calo;
	$total_box_pro +=$box_pro;
	$total_box_fat +=$box_fat;
	$total_box_cabs +=$box_cabs;
	$total_box_sodium +=$box_sodium;
	$total_box_iron +=$box_iron;
	$total_box_fibre +=$box_fibre;
	$box_calo =0;
	$box_pro =0;
	$box_fat =0;
	$box_cabs =0;
	$box_sodium =0;
	$box_iron =0;
	$box_fibre =0;
	?>
	<!--<div class="list-icons" style="float: right;">
	<a href="#" class="list-icons-item" data-toggle="modal" data-target="#edit_modal">
	<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
	</a>
	</div>-->
	<a href="javascript:void(0);" class="btn btn-primary passenger_evening"  type="<?=$day?>">Add More</a>
	<!--  <button class="passenger_evening"  type="<?=$day?>">Add More</button> -->
	</td>
	<?php } ?>
	<?php if(in_array('Dinner',$_POST['Placement'])) { ?>
	<td style="width: 12%" class="<?php echo $type_class_dinner;?>">
	<!-- <p class="badge badge-clr2">137</p> -->
	<div style="padding-top: 15%;">
	<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
	<!-- <?=$value['dinnner']?> -->
	<strong class="passenger-list_dinner_<?=$day?>">
	<strong class="">
	<span >
	<?php
	$name = "dinner";
	foreach ($value['dinnner_data'] as $key => $value1) { ?>
	<select name="<?=$day?>_<?=$name?>_data_quantity[]" id="<?=$name?>_fod_quan_<?=$value1['foodId']?>_<?=$day?>" onchange="changes('<?=$value1['foodId']?>','<?=$name?>','<?=$day?>')">
        <option value="0">0</option>
        <option value="1" <?php if($value1['quantity']=='1'){ echo "Selected"; } ?> >1</option>
        <option value="1.5" <?php if($value1['quantity']=='1.5'){ echo "Selected"; } ?>>1.5</option>
        <option value="2" <?php if($value1['quantity']=='2'){ echo "Selected"; } ?>>2</option>
        <option value="2.5" <?php if($value1['quantity']=='2.5'){ echo "Selected"; } ?>>2.5</option>
        <option value="3" <?php if($value1['quantity']=='3'){ echo "Selected"; } ?>>3</option>
        <option value="4" <?php if($value1['quantity']=='4'){ echo "Selected"; } ?>>4</option>
      </select>
       
      <select class="select2"  name="<?=$day?>_<?=$name?>_data_food[]" id="<?=$name?>_fod_data_<?=$value1['foodId']?>" style="width: 100% !important;">
    <?php
        foreach ($all_food as $key => $value2) { ?>
          <option value="<?=$value2['id']?>" <?php if($value2['id']==$value1['foodId']){ echo "Selected"; } ?> ><?=$value2['food_name']?></option> 
        <?php }
       ?>
      </select>
       <span id="<?=$name?>_calspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_cal" style="display:none;"><?php echo  $value1["calories"]*$value1["quantity"] ?></span>
       <span id="<?=$name?>_prospan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_pro" style="display:none;"><?php echo  $value1["protein"]*$value1["quantity"] ?></span>
        <span id="<?=$name?>_carbohydratesspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_carbohydrates" style="display:none;"><?php echo  $value1["carbohydrates"]*$value1["quantity"] ?></span>
        <span id="<?=$name?>_fatspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_fat" style="display:none;"><?php echo  $value1["fat"]*$value1["quantity"] ?></span>
        <span id="<?=$name?>_sodiumspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_sodium" style="display:none;"><?php echo  $value1["sodium"]*$value1["quantity"] ?></span>
        <span id="<?=$name?>_ironspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_iron" style="display:none;"><?php echo  $value1["iron"]*$value1["quantity"] ?></span>
        <span id="<?=$name?>_d_fibrespan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_d_fibre" style="display:none;"><?php echo  $value1["d_fibre"]*$value1["quantity"] ?></span>
       <?php
       	$box_calo += ($value1['quantity']*$value1['calories']);
		$box_pro += ($value1['quantity']*$value1['protein']);
		$box_fat += ($value1['quantity']*$value1['fat']);
		$box_cabs += ($value1['quantity']*$value1['carbohydrates']);
		$box_sodium += ($value1['quantity']*$value1['sodium']);
		$box_iron += ($value1['quantity']*$value1['iron']);
		$box_fibre += ($value1['quantity']*$value1['d_fibre']);

		        }
		       ?>
		   </span>
		</strong>
		</strong>
													</p>
										</div>
										<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" ><?=$box_calo?></span>
										<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" ><?=$box_pro?></span>
										<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>"><?=$box_cabs?></span>
										<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>"><?=$box_fat?></span>
										<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>"><?=$box_sodium?></span>
										<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>"><?=$box_iron?></span>
										<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>"><?=$box_fibre?></span>
		<?php
		$total_box_calo += $box_calo;
		$total_box_pro +=$box_pro;
		$total_box_fat +=$box_fat;
		$total_box_cabs +=$box_cabs;
		$total_box_sodium +=$box_sodium;
		$total_box_iron +=$box_iron;
		$total_box_fibre +=$box_fibre;
		$box_calo =0;
		$box_pro =0;
		$box_fat =0;
		$box_cabs =0;
		$box_sodium =0;
		$box_iron =0;
		$box_fibre =0;
		?>
										
	<!--<div class="list-icons" style="float: right;">
	<a href="#" class="list-icons-item" data-toggle="modal" data-target="#edit_modal">
	<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
	</a>
	</div>-->
				                			<a href="javascript:void(0);" class="btn btn-primary passenger_dinner"  type="<?=$day?>">Add More</a>
										 <!-- <button class="passenger_dinner"  type="<?=$day?>">Add More</button> -->
									</td>
								<?php } ?>
								<?php if(in_array('Bed Time',$_POST['Placement']))
									{ ?>
									<td style="width: 12%" class="<?php echo $type_class_bedtime;?>">
										<!-- <p class="badge badge-clr2">137</p> -->
										<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_bedtime_<?=$day?>">
        	<strong class="">
        		  <span >
											<?php
											$name = "bedtime";
        foreach ($value['bedtime_data'] as $key => $value1) { ?>
											 <select name="<?=$day?>_<?=$name?>_data_quantity[]" id="<?=$name?>_fod_quan_<?=$value1['foodId']?>_<?=$day?>" onchange="changes('<?=$value1['foodId']?>','<?=$name?>','<?=$day?>')">
        <option value="0">0</option>
        <option value="1" <?php if($value1['quantity']=='1'){ echo "Selected"; } ?> >1</option>
        <option value="1.5" <?php if($value1['quantity']=='1.5'){ echo "Selected"; } ?>>1.5</option>
        <option value="2" <?php if($value1['quantity']=='2'){ echo "Selected"; } ?>>2</option>
        <option value="2.5" <?php if($value1['quantity']=='2.5'){ echo "Selected"; } ?>>2.5</option>
        <option value="3" <?php if($value1['quantity']=='3'){ echo "Selected"; } ?>>3</option>
        <option value="4" <?php if($value1['quantity']=='4'){ echo "Selected"; } ?>>4</option>
      </select>
       
      <select class="select2"  name="<?=$day?>_<?=$name?>_data_food[]" id="<?=$name?>_fod_data_<?=$value1['foodId']?>" style="width: 100% !important;">
    <?php
        foreach ($all_food as $key => $value2) { ?>
          <option value="<?=$value2['id']?>" <?php if($value2['id']==$value1['foodId']){ echo "Selected"; } ?> ><?=$value2['food_name']?></option> 
        <?php }
       ?>
      </select>
       <span id="<?=$name?>_calspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_cal" style="display:none;"><?php echo  $value1["calories"]*$value1["quantity"] ?></span>
       <span id="<?=$name?>_prospan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_pro" style="display:none;"><?php echo  $value1["protein"]*$value1["quantity"] ?></span>
        <span id="<?=$name?>_carbohydratesspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_carbohydrates" style="display:none;"><?php echo  $value1["carbohydrates"]*$value1["quantity"] ?></span>
        <span id="<?=$name?>_fatspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_fat" style="display:none;"><?php echo  $value1["fat"]*$value1["quantity"] ?></span>
        <span id="<?=$name?>_sodiumspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_sodium" style="display:none;"><?php echo  $value1["sodium"]*$value1["quantity"] ?></span>
        <span id="<?=$name?>_ironspan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_iron" style="display:none;"><?php echo  $value1["iron"]*$value1["quantity"] ?></span>
        <span id="<?=$name?>_d_fibrespan_<?=$value1['foodId']?>_<?=$day?>" class="<?=$name?>_<?=$day?>_d_fibre" style="display:none;"><?php echo  $value1["d_fibre"]*$value1["quantity"] ?></span>
       <?php 
       	$box_calo += ($value1['quantity']*$value1['calories']);
		$box_pro += ($value1['quantity']*$value1['protein']);
		$box_fat += ($value1['quantity']*$value1['fat']);
		$box_cabs += ($value1['quantity']*$value1['carbohydrates']);
		$box_sodium += ($value1['quantity']*$value1['sodium']);
		$box_iron += ($value1['quantity']*$value1['iron']);
		$box_fibre += ($value1['quantity']*$value1['d_fibre']);
   
   		}
       ?>
   	</span>
	</strong>
	</strong>
												
											</p>
										</div>
										<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" ><?=$box_calo?></span>
										<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" ><?=$box_pro?></span>
										<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>"><?=$box_cabs?></span>
										<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>"><?=$box_fat?></span>
										<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>"><?=$box_sodium?></span>
										<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>"><?=$box_iron?></span>
										<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>"><?=$box_fibre?></span>
		<?php
		$total_box_calo += $box_calo;
		$total_box_pro +=$box_pro;
		$total_box_fat +=$box_fat;
		$total_box_cabs +=$box_cabs;
		$total_box_sodium +=$box_sodium;
		$total_box_iron +=$box_iron;
		$total_box_fibre +=$box_fibre;
		$box_calo =0;
		$box_pro =0;
		$box_fat =0;
		$box_cabs =0;
		$box_sodium =0;
		$box_iron =0;
		$box_fibre =0;
		?>
											
		<!--<div class="list-icons" style="float: right;">
		<a href="#" class="list-icons-item" data-toggle="modal" data-target="#edit_modal">
		<i class="fa fa-info-circle fa-2x" aria-hidden="true"></i>
		</a>
		</div>-->
						                			<a href="javascript:void(0);" class="btn btn-primary passenger_bedtime"  type="<?=$day?>">Add More</a>
										 <!-- <button class="passenger_bedtime"  type="<?=$day?>">Add More</button> -->
									</td>
								<?php } ?>
									<td style="width: 12%">
										<p class="badge badge-clr2  total_calorie_box_<?=$day?>"><?=$total_box_calo;?></p>
										<div style="padding-top: 37%;">
										<span class="badge badge-clr3 total_protein_box_<?=$day?>"><?=$total_box_pro;?></span>
										<span class="badge badge-clr4 total_cabs_box_<?=$day?>"><?=$total_box_cabs;?></span>
										<span class="badge badge-clr5 total_fat_box_<?=$day?>"><?=$total_box_fat;?></span>
										<span class="badge badge-clr6 total_sodium_box_<?=$day?>"><?=$total_box_sodium;?></span>
										<span class="badge badge-clr7 total_iron_box_<?=$day?>"><?=$total_box_iron;?></span>
										<span class="badge badge-clr8 total_fibre_box_<?=$day?>"><?=$total_box_fibre;?></span>
										<div>
									</td>

								</tr>
							<?php }?>
								

							</tbody>
						</table>
						<div class="text-center">
						<input type="submit" class="btn btn-success" name="submit">
					</div><br>
</form>
</div>
</div>
<!-- /hover rows -->
</div>
<!-- /content area -->

<!-- Edit modal -->
<div id="edit_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title">Search Item</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<select class="food select2" style="width: 100% !important;" onchange="selectv()" id="food_items_dd">
			    	<?php
			        	foreach ($all_food as $key => $value2) { ?>
			          		<option value="<?=$value2['id']?>" <?php if($value2['id']==$value1['foodId']){ echo "Selected"; } ?> ><?=$value2['food_name']?></option> 
			        <?php } ?>
			      	</select>
				</div>
				<div class="row">
					<!-- <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." class="form-control"> -->
				</div>
			</div>
			<ul id="myMenu" style="display:none;list-style-type: none;">
				<li><a href="#">abc</a></li>
				<li><a href="#">xyz</a></li>
				<li><a href="#">pqr</a></li>
				<li><a href="#">sanj</a></li>
				<li><a href="#">sanjeev</a></li>	
			</ul>
		</div>
	</div>
</div>

<!-- New Custom Script :: -->
<script type="text/javascript">
	var MyElem = {}; // Globally scoped object
	function selectv(){ // onchange of modal // 
		var myselect = document.getElementById("food_items_dd");
			// myelem = checkfocus();
			//myelem.value = myselect.options[myselect.selectedIndex].value;
			// console.log(elem);
			console.log(MyElem.tb); // last focussed text boxed // dom element properties
			if (MyElem.tb == undefined) {
				alert('no element is selected');
			}else{
				var tb_elem = MyElem.tb;
				// tb_elem.value = myselect.options[myselect.selectedIndex].value;
				tb_elem.setAttribute("data-id",  myselect.options[myselect.selectedIndex].value);
				tb_elem.value = myselect.options[myselect.selectedIndex].text;

			}
			myselect.selectedIndex = 0;  
	}
	function checkfocus(){
		var focused = document.hasFocus();
		console.log(focused);
		element = document.activeElement;
		element.style.backgroundColor = "red";
		return element;
	}
	$('input, textarea').focus(function() {
	  // inFocus = true;
	  var elem = checkfocus();
	  console.log(elem);
	  MyElem.tb = elem;
	  $('#edit_modal').modal(); // this will open modal 
	});
</script>
<!-- ------------------ -->


<script>
function myFunction() {
var ins = $("#mySearch").val();
if(ins != ''){
$('#myMenu').show();
var input, filter, ul, li, a, i;
input = document.getElementById("mySearch");
filter = input.value.toUpperCase();
ul = document.getElementById("myMenu");
li = ul.getElementsByTagName("li");
for (i = 0; i < li.length; i++) {
a = li[i].getElementsByTagName("a")[0];
if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
li[i].style.display = "";
} else {
li[i].style.display = "none";
}
}
}else{
$('#myMenu').hide();
}
}
</script>
<script>
$('.select2').select2();
</script>			<!-- /edit modal -->

<script>

 $(document).ready(function() {
        $(".passenger").click(function() {

            var e1 = $("#passenger-sp").html();
            var type = $(this).attr('type');
            console.log("strong.passenger-list_"+type);
            $("strong.passenger-list_"+type).append("<strong class='passenger-reapeat'>" + e1 + "</strong>");
             $('.select2').select2();
             $(".quantity").attr("name",type+"_lunch_data_quantity[]");
             $(".quantity").attr("id",type+"_lunch_data_quantity");
             var v=type+"_lunch_data_quantity";
             $("strong.passenger-list_"+type).find("#"+v).removeClass('quantity');
             $(".food").attr("name",type+"_lunch_data_food[]");
             $(".food").attr("id",type+"_lunch_data_food");
              var s=type+"_lunch_data_food";
             $("strong.passenger-list_"+type).find("#"+s).removeClass('food');
        });

        // for add more button 
        $(".passenger_morning").click(function() {

            var e1 = $("#passenger-sp").html();
            var type = $(this).attr('type');
            console.log("strong.passenger-list_"+type);
            $("strong.passenger-list_morning_"+type).append("<strong class='passenger-reapeat'>" + e1 + "</strong>");
             $('.select2').select2();
             $(".quantity").attr("name",type+"_morning_data_quantity[]");
             $(".quantity").attr("id",type+"_morning_data_quantity");
             var v=type+"_morning_data_quantity";
             $("strong.passenger-list_morning_"+type).find("#"+v).removeClass('quantity');
             $(".food").attr("name",type+"_morning_data_food[]");
             $(".food").attr("id",type+"_morning_data_food");
              var s=type+"_morning_data_food";
             $("strong.passenger-list_morning_"+type).find("#"+s).removeClass('food');
        });
        $(".passenger_breakfast").click(function() {

            var e1 = $("#passenger-sp").html();
            var type = $(this).attr('type');
           
            $("strong.passenger-list_breakfast_"+type).append("<strong class='passenger-reapeat'>" + e1 + "</strong>");
             $('.select2').select2();
             $(".quantity").attr("name",type+"_breakfast_data_quantity[]");
             $(".quantity").attr("id",type+"_breakfast_data_quantity");
             var v=type+"_breakfast_data_quantity";
             $("strong.passenger-list_breakfast_"+type).find("#"+v).removeClass('quantity');
             $(".food").attr("name",type+"_breakfast_data_food[]");
             $(".food").attr("id",type+"_breakfast_data_food");
              var s=type+"_breakfast_data_food";
             $("strong.passenger-list_breakfast_"+type).find("#"+s).removeClass('food');
        });
         $(".passenger_midmeal").click(function() {

            var e1 = $("#passenger-sp").html();
            var type = $(this).attr('type');
           
            $("strong.passenger-list_midmeal_"+type).append("<strong class='passenger-reapeat'>" + e1 + "</strong>");
             $('.select2').select2();
             $(".quantity").attr("name",type+"_midmeal_data_quantity[]");
             $(".quantity").attr("id",type+"_midmeal_data_quantity");
             var v=type+"_midmeal_data_quantity";
             $("strong.passenger-list_midmeal_"+type).find("#"+v).removeClass('quantity');
             $(".food").attr("name",type+"_midmeal_data_food[]");
             $(".food").attr("id",type+"_midmeal_data_food");
              var s=type+"_midmeal_data_food";
             $("strong.passenger-list_midmeal_"+type).find("#"+s).removeClass('food');
        });
         $(".passenger_evening").click(function() {

            var e1 = $("#passenger-sp").html();
            var type = $(this).attr('type');
           
            $("strong.passenger-list_evening_"+type).append("<strong class='passenger-reapeat'>" + e1 + "</strong>");
             $('.select2').select2();
             $(".quantity").attr("name",type+"_evening_data_quantity[]");
             $(".quantity").attr("id",type+"_evening_data_quantity");
             var v=type+"_evening_data_quantity";
             $("strong.passenger-list_evening_"+type).find("#"+v).removeClass('quantity');
             $(".food").attr("name",type+"_evening_data_food[]");
             $(".food").attr("id",type+"_evening_data_food");
              var s=type+"_evening_data_food";
             $("strong.passenger-list_evening_"+type).find("#"+s).removeClass('food');
        });
         $(".passenger_dinner").click(function() {

            var e1 = $("#passenger-sp").html();
            var type = $(this).attr('type');
           
            $("strong.passenger-list_dinner_"+type).append("<strong class='passenger-reapeat'>" + e1 + "</strong>");
             $('.select2').select2();
             $(".quantity").attr("name",type+"_dinner_data_quantity[]");
             $(".quantity").attr("id",type+"_dinner_data_quantity");
             var v=type+"_dinner_data_quantity";
             $("strong.passenger-list_dinner_"+type).find("#"+v).removeClass('quantity');
             $(".food").attr("name",type+"_dinner_data_food[]");
             $(".food").attr("id",type+"_dinner_data_food");
              var s=type+"_dinner_data_food";
             $("strong.passenger-list_dinner_"+type).find("#"+s).removeClass('food');
        });
           $(".passenger_bedtime").click(function() {

            var e1 = $("#passenger-sp").html();
            var type = $(this).attr('type');
           
            $("strong.passenger-list_bedtime_"+type).append("<strong class='passenger-reapeat'>" + e1 + "</strong>");
             $('.select2').select2();
             $(".quantity").attr("name",type+"_bedtime_data_quantity[]");
             $(".quantity").attr("id",type+"_bedtime_data_quantity");
             var v=type+"_bedtime_data_quantity";
             $("strong.passenger-list_bedtime_"+type).find("#"+v).removeClass('quantity');
             $(".food").attr("name",type+"_bedtime_data_food[]");
             $(".food").attr("id",type+"_bedtime_data_food");
              var s=type+"_bedtime_data_food";
             $("strong.passenger-list_bedtime_"+type).find("#"+s).removeClass('food');
        });
        $(".passengeremove").click(function() {
			var type = $(this).attr('type');
			console.log("jeet",type)
           console.log('strong.passenger-list_'+type+':last')
              $('strong.passenger-list_'+type+':last').remove();
                   /*$('strong.passenger-list_1 strong.passenger-repeat:last').remove();*/
          });
    });


    	 function changes(id,name,day){

    
    // console.log(val)

	var quan = $("#"+name+"_fod_quan_"+id+"_"+day).val();
    	var food = $("#"+name+"_fod_data_"+id).val();
    	
    	var calories = $("#calo_"+food).val();
    	var protein = $("#protein_"+food).val();
    	var carbohydrates = $("#carbohydrates_"+food).val();
    	var fat = $("#fat_"+food).val();
    	var sodium = $("#sodium_"+food).val();
    	var iron = $("#iron_"+food).val();
    	var d_fibre = $("#d_fibre_"+food).val();
    	console.log(quan+"=========="+food+"======="+sodium)

    	var netcal = parseInt(quan*calories);
    	var netpro = parseInt(quan*protein);
    	var netcarbohydrates = parseInt(quan*carbohydrates);
    	var netfat = parseInt(quan*fat);
    	var netsodium = parseInt(quan*sodium);
    	var netiron = parseInt(quan*iron);
    	var netd_fibre = parseInt(quan*d_fibre);
    	$("#"+name+"_calspan_"+id+"_"+day).html(netcal);
    	$("#"+name+"_prospan_"+id+"_"+day).html(netpro);
    	$("#"+name+"_carbohydratesspan_"+id+"_"+day).html(netcarbohydrates);
    	$("#"+name+"_fatspan_"+id+"_"+day).html(netfat);
    	$("#"+name+"_sodiumspan_"+id+"_"+day).html(netsodium);
    	$("#"+name+"_ironspan_"+id+"_"+day).html(netiron);
    	$("#"+name+"_d_fibrespan_"+id+"_"+day).html(netd_fibre);
    	

    	/*if($("#prev_"+name+"_quan").val() == quan && id==food){
    		$("#"+name+"_change").val('1')
    	}else{
    		$("#"+name+"_change").val('2')

    	}	*/
    	$("#"+name+"_change").val('2');

      var inputs = $('.'+name+"_"+day+"_cal");
      var total = 0;
    for(var i = 0; i < inputs.length; i++){
     total+= parseInt($(inputs[i]).html())
		}
    $("."+name+"_total_cal_"+day).html(total)

console.log("calorie=====",total);
// protein
      var inputs = $('.'+name+"_"+day+"_pro");


      console.log(inputs)
      var total = 0;
    for(var i = 0; i < inputs.length; i++){
     total+= parseInt($(inputs[i]).html())
		}

    $("."+name+"_total_pro_"+day).html(total)


     var inputs = $('.'+name+"_"+day+"_carbohydrates");
	 console.log(inputs)
      var total = 0;
    for(var i = 0; i < inputs.length; i++){
     total+= parseInt($(inputs[i]).html())
		}
	$("."+name+"_total_carbohydrates_"+day).html(total)

    
    var inputs = $('.'+name+"_"+day+"_fat");
	console.log(inputs)
      var total = 0;
    for(var i = 0; i < inputs.length; i++){
     total+= parseInt($(inputs[i]).html())
		}

    $("."+name+"_total_fat_"+day).html(total)


    var inputs = $('.'+name+"_"+day+"_sodium");
	console.log(inputs)
      var total = 0;
    for(var i = 0; i < inputs.length; i++){
     total+= parseInt($(inputs[i]).html())
		}

    $("."+name+"_total_sodium_"+day).html(total)

    var inputs = $('.'+name+"_"+day+"_iron");
	console.log(inputs)
      var total = 0;
    for(var i = 0; i < inputs.length; i++){
     total+= parseInt($(inputs[i]).html())
		}

    $("."+name+"_total_iron_"+day).html(total)


    var inputs = $('.'+name+"_"+day+"_d_fibre");
	console.log(inputs)
      var total = 0;
    for(var i = 0; i < inputs.length; i++){
     total+= parseInt($(inputs[i]).html())
		}

    $("."+name+"_total_d_fibre_"+day).html(total)


    /* show total sum data */
     var morning_total_cal = parseInt($(".morning_total_cal_"+day).html());
     var breakfast_total_cal = parseInt($(".breakfast_total_cal_"+day).html());
     var midmeal_total_cal = parseInt($(".midmeal_total_cal_"+day).html());
     var lunch_total_cal = parseInt($(".lunch_total_cal_"+day).html());
     var evening_total_cal = parseInt($(".evening_total_cal_"+day).html());
     var dinner_total_cal = parseInt($(".dinner_total_cal_"+day).html());
     var bedtime_total_cal = parseInt($(".bedtime_total_cal_"+day).html());

    

     var total_calories = morning_total_cal + breakfast_total_cal + midmeal_total_cal + lunch_total_cal + evening_total_cal + dinner_total_cal + bedtime_total_cal;
    
    $(".total_calorie_box_"+day).html(total_calories);

     var morning_total_pro = parseInt($(".morning_total_pro_"+day).html());
     var breakfast_total_pro = parseInt($(".breakfast_total_pro_"+day).html());
     var midmeal_total_pro = parseInt($(".midmeal_total_pro_"+day).html());
     var lunch_total_pro = parseInt($(".lunch_total_pro_"+day).html());
     var evening_total_pro = parseInt($(".evening_total_pro_"+day).html());
     var dinner_total_pro = parseInt($(".dinner_total_pro_"+day).html());
     var bedtime_total_pro = parseInt($(".bedtime_total_pro_"+day).html());
     var total_protein = morning_total_pro + breakfast_total_pro + midmeal_total_pro + lunch_total_pro + evening_total_pro + dinner_total_pro + bedtime_total_pro;
    
    $(".total_protein_box_"+day).html(total_protein);

     var morning_total_cabs = parseInt($(".morning_total_carbohydrates_"+day).html());
     var breakfast_total_cabs = parseInt($(".breakfast_total_carbohydrates_"+day).html());
     var midmeal_total_cabs = parseInt($(".midmeal_total_carbohydrates_"+day).html());
     var lunch_total_cabs = parseInt($(".lunch_total_carbohydrates_"+day).html());
     var evening_total_cabs = parseInt($(".evening_total_carbohydrates_"+day).html());
     var dinner_total_cabs = parseInt($(".dinner_total_carbohydrates_"+day).html());
     var bedtime_total_cabs = parseInt($(".bedtime_total_carbohydrates_"+day).html());
     var total_cabs = morning_total_cabs + breakfast_total_cabs + midmeal_total_cabs + lunch_total_cabs + evening_total_cabs + dinner_total_cabs + bedtime_total_cabs;
    
    $(".total_cabs_box_"+day).html(total_cabs);

     var morning_total_fat = parseInt($(".morning_total_fat_"+day).html());
     var breakfast_total_fat = parseInt($(".breakfast_total_fat_"+day).html());
     var midmeal_total_fat = parseInt($(".midmeal_total_fat_"+day).html());
     var lunch_total_fat = parseInt($(".lunch_total_fat_"+day).html());
     var evening_total_fat = parseInt($(".evening_total_fat_"+day).html());
     var dinner_total_fat = parseInt($(".dinner_total_fat_"+day).html());
     var bedtime_total_fat = parseInt($(".bedtime_total_fat_"+day).html());
     var total_fat = morning_total_fat + breakfast_total_fat + midmeal_total_fat + lunch_total_fat + evening_total_fat + dinner_total_fat + bedtime_total_fat;
    
    $(".total_fat_box_"+day).html(total_fat);

     var morning_total_sodium = parseInt($(".morning_total_sodium_"+day).html());
     var breakfast_total_sodium = parseInt($(".breakfast_total_sodium_"+day).html());
     var midmeal_total_sodium = parseInt($(".midmeal_total_sodium_"+day).html());
     var lunch_total_sodium = parseInt($(".lunch_total_sodium_"+day).html());
     var evening_total_sodium = parseInt($(".evening_total_sodium_"+day).html());
     var dinner_total_sodium = parseInt($(".dinner_total_sodium_"+day).html());
     var bedtime_total_sodium = parseInt($(".bedtime_total_sodium_"+day).html());
     var total_sodium = morning_total_sodium + breakfast_total_sodium + midmeal_total_sodium + lunch_total_sodium + evening_total_sodium + dinner_total_sodium + bedtime_total_sodium;
    
    $(".total_sodium_box_"+day).html(total_sodium);

     var morning_total_iron= parseInt($(".morning_total_iron_"+day).html());
     var breakfast_total_iron = parseInt($(".breakfast_total_iron_"+day).html());
     var midmeal_total_iron = parseInt($(".midmeal_total_iron_"+day).html());
     var lunch_total_iron = parseInt($(".lunch_total_iron_"+day).html());
     var evening_total_iron = parseInt($(".evening_total_iron_"+day).html());
     var dinner_total_iron = parseInt($(".dinner_total_iron_"+day).html());
     var bedtime_total_iron = parseInt($(".bedtime_total_iron_"+day).html());
     var total_iron = morning_total_iron + breakfast_total_iron + midmeal_total_iron + lunch_total_iron + evening_total_iron + dinner_total_iron + bedtime_total_iron;
    
    $(".total_iron_box_"+day).html(total_iron);
    
     var morning_total_d_fibre= parseInt($(".morning_total_d_fibre_"+day).html());
     var breakfast_total_d_fibre = parseInt($(".breakfast_total_d_fibre_"+day).html());
     var midmeal_total_d_fibre = parseInt($(".midmeal_total_d_fibre_"+day).html());
     var lunch_total_d_fibre = parseInt($(".lunch_total_d_fibre_"+day).html());
     var evening_total_d_fibre = parseInt($(".evening_total_d_fibre_"+day).html());
     var dinner_total_d_fibre = parseInt($(".dinner_total_d_fibre_"+day).html());
     var bedtime_total_d_fibre = parseInt($(".bedtime_total_d_fibre_"+day).html());
     var total_d_fibre = morning_total_d_fibre + breakfast_total_d_fibre + midmeal_total_d_fibre + lunch_total_d_fibre + evening_total_d_fibre + dinner_total_d_fibre + bedtime_total_d_fibre;
    
    $(".total_fibre_box_"+day).html(total_d_fibre);




}
</script>
<?php include 'footer2.php';?>