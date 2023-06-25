<?php
	/*if(in_array('Mid Meal',$_POST['Placement'])) {}*/
	//pr($_post['Placement']);die();
	// pr($all_food);die;
	// $cust_id = $this->uri=>segment(3);
include('header2.php');?>
<script src="https://dietghar.in/diet/admin/assets/functions/type.js"></script>
<script src="https://dietghar.in/diet/admin/assets/functions/typesub.js"></script>
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
	// NUTRIENTS AND THERE VALUE :: 
	foreach ($all_food as $key => $value) { ?>
	<input type="hidden" id="calo_<?=$value['id']?>" value="<?=$value['calories']?>">
	<input type="hidden" id="protein_<?=$value['id']?>" value="<?=$value['protein']?>">
	<input type="hidden" id="carbohydrates_<?=$value['id']?>" value="<?=$value['carbohydrates']?>">
	<input type="hidden" id="fat_<?=$value['id']?>" value="<?=$value['fat']?>">
	<input type="hidden" id="sodium_<?=$value['id']?>" value="<?=$value['sodium']?>">
	<input type="hidden" id="iron_<?=$value['id']?>" value="<?=$value['iron']?>">
	<input type="hidden" id="d_fibre_<?=$value['id']?>" value="<?=$value['d_fibre']?>">
<?php } 

?>

<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">
	<?php if($_GET['m']): ?>
	<div class="alert alert-primary border-0 alert-dismissible">
		<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
		<span class="font-weight-semibold">Message :</span> <?=$_GET['m']; ?>
	</div>
	<?php endif; ?>
	<!-- <div class="card card-body border-top-primary">
		<div class="text-center">
			<h6 class="m-0 font-weight-semibold">Light with default text</h6>
			<p class="text-muted mb-3">Default button text color</p>

								<button type="button" class="btn btn-primary-100">Default text</button>
							</div>
	</div> -->
		<!-- Hover rows -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Food Chart : Single Day Maker</h5>
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
				<strong class="hidden">
					<strong class="">
						<span id="passenger-sp">

	
						</span>
					</strong>
				</strong>
				<form method="post" action="<?=base_url('Admin/Submit_single_chart_entry')?>">
					<input type="hidden" name='limit'  value="<?=$limit?>" >
					<!-- form table for entry -->
					<table class="table table-hover table-bordered">
						<input type="hidden" name="chartcombination" value="<?=$cust_id?>">
						<thead>
							<tr>
								<th></th>
								<th>Early Morning<p class="badge badge-clr1">6 AM</p></p></th>
								<th class="<?php echo $type_class_breafast;?>">Breakfast<p class="badge badge-clr1">9 AM</p></th> 
								<th class="<?php echo $type_class_midmeal;?>">Mid Meal<p class="badge badge-clr1">11 AM</p></th>
								<th class="<?php echo $type_class_lunch;?>">Lunch<p class="badge badge-clr1">1 PM</p></th>
								<th class="<?php echo $type_class_eveningtea;?>">Evening Snack<p class="badge badge-clr1">4 PM</p></th>
								<th class="<?php echo $type_class_dinner;?>">Dinner<p class="badge badge-clr1">8 PM</p></th>
								<th class="<?php echo $type_class_bedtime;?>">Bed Time<p class="badge badge-clr1">10 PM</p></th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php $day = 1; ?>
							<tr>
								<td>SNO</td>
								<!-- morning cell -->
								<?php $name = "morning";
											$iItemCount = 0; // initial items added from db?>
								<td style="width: 12%" class="cursor-move">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_morning_<?=$day?>">
												<!-- <strong class="">
													<span>
														
													</span>
												</strong> -->
											</strong>
										</p>
									</div>
									<!-- shift wise calories -->
									<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" >0</span>
									<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" >0</span>
									<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>">0</span>
									<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>">0</span>
									<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>">0</span>
									<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>">0</span>
									<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>">0</span>
									<a href="javascript:void(0);" class="btn btn-primary addmorebtn" data-addmore='1' data-shift='morning' data-day='<?=$day?>' type="<?=$day?>">Add More</a>
									<!--  -->
								</td>
								<!-- breakfast cell  -->
								<?php $name = "breakfast"; ?>
								<td style="width: 12%">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_breakfast_<?=$day?>">
												<strong class="">
													<span>
														
													</span>
												</strong>
											</strong>
										</p>
									</div>
									<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" >0</span>
									<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" >0</span>
									<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>">0</span>
									<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>">0</span>
									<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>">0</span>
									<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>">0</span>
									<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>">0</span>
									<a href="javascript:void(0);" class="btn btn-primary addmorebtn" data-addmore='1' data-shift='breakfast' data-day='<?=$day?>' type="<?=$day?>">Add More</a>
								</td>
								<!-- midmeal cell -->
								<?php $name = "midmeal"; ?>
								<td style="width: 12%">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_midmeal_<?=$day?>">
												<strong class="">
													<span>
														
													</span>
												</strong>
											</strong>
										</p>
									</div>
									<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" >0</span>
									<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" >0</span>
									<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>">0</span>
									<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>">0</span>
									<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>">0</span>
									<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>">0</span>
									<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>">0</span>
									<a href="javascript:void(0);" class="btn btn-primary addmorebtn" data-addmore='1' data-shift='midmeal' data-day='<?=$day?>' type="<?=$day?>">Add More</a>

								</td>
								<!-- lunch cell -->
								<?php $name = "lunch"; ?>
								<td style="width: 12%">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_lunch_<?=$day?>">
												<strong class="">
													<span>
														
													</span>
												</strong>
											</strong>
										</p>
									</div>
									<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" >0</span>
									<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" >0</span>
									<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>">0</span>
									<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>">0</span>
									<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>">0</span>
									<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>">0</span>
									<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>">0</span>
									<a href="javascript:void(0);" class="btn btn-primary addmorebtn" data-addmore='1' data-shift='lunch' data-day='<?=$day?>' type="<?=$day?>">Add More</a>

								</td>
								<!--evening cell  -->
								<?php $name = "evening"; ?>
								<td style="width: 12%">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_evening_<?=$day?>">
												<strong class="">
													<span>
														
													</span>
												</strong>
											</strong>
										</p>
									</div>
									<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" >0</span>
									<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" >0</span>
									<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>">0</span>
									<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>">0</span>
									<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>">0</span>
									<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>">0</span>
									<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>">0</span>
									<a href="javascript:void(0);" class="btn btn-primary addmorebtn" data-addmore='1' data-shift='evening' data-day='<?=$day?>' type="<?=$day?>">Add More</a>

								</td>
								<!-- dinner cell -->
								<?php $name = "dinner" ; ?>
								<td style="width: 12%">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_dinner_<?=$day?>">
												<strong class="">
													<span>
														
													</span>
												</strong>
											</strong>
										</p>
									</div>
									<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" >0</span>
									<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" >0</span>
									<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>">0</span>
									<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>">0</span>
									<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>">0</span>
									<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>">0</span>
									<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>">0</span>
									<a href="javascript:void(0);" class="btn btn-primary addmorebtn" data-addmore='1' data-shift='dinner' data-day='<?=$day?>' type="<?=$day?>">Add More</a>
								</td>
								<!-- bedtime cell -->
								<?php $name= "bedtime" ; ?>
								<td style="width: 12%" >
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_bedtime_<?=$day?>">
												<strong class="">
													<span>
														
													</span>
												</strong>
											</strong>
										</p>
									</div>
									<span class="badge badge-clr2 <?=$name?>_total_cal_<?=$day?>" >0</span>
									<span class="badge badge-clr3 <?=$name?>_total_pro_<?=$day?>" >0</span>
									<span class="badge badge-clr4 <?=$name?>_total_carbohydrates_<?=$day?>">0</span>
									<span class="badge badge-clr5 <?=$name?>_total_fat_<?=$day?>">0</span>
									<span class="badge badge-clr6 <?=$name?>_total_sodium_<?=$day?>">0</span>
									<span class="badge badge-clr7 <?=$name?>_total_iron_<?=$day?>">0</span>
									<span class="badge badge-clr8 <?=$name?>_total_d_fibre_<?=$day?>">0</span>
									<a href="javascript:void(0);" class="btn btn-primary addmorebtn" data-addmore='1' data-shift='bedtime' data-day='<?=$day?>' type="<?=$day?>">Add More</a>
								</td>
								<?php 
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
									//$day = $key+1;
								?>
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
						</tbody>
					<table>
						<hr>
						<br>
					<div class="text-center">
						<input type="hidden" name="totalfooditemcount" id="totalfooditemcount" value="0">
						<input type="submit" class="btn btn-success" name="submit">
					</div><br>
				</form>
			</div>
		</div>
	</div> 	<!--  content  -->
</div><!--  content wrapper -->

<!-- Modal -->
<div id="edit_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title">Search Item</h5>
				<button type="button" class="close closemodal" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3"> 
						<span>Quantity</span>
						<select name="food_quan_dd" id="food_quan_dd" class="food "  style="width: 100% !important;" onchange="selectv()" required>
							<option value="0">0</option>
							<option value="0.25">0.25</option>
							<option value="1">1</option>
							<option value="1.5">1.5</option>
							<option value="2">2</option>
							<option value="2.5">2.5</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>
					<div class="col-md-7"> 
						<span>Food Items</span>
						<select class="food select2" style="width: 100% !important;"  onchange="selectv()" id="food_items_dd">
							<?php
							foreach ($all_food as $key => $value) { ?>
								<option value="<?=$value['id']?>" ><?=$value['food_name']?></option> 
							<?php } ?>
						</select>
					</div>

						<!-- // maybe this will need -->
						<!-- <div class="col-md-2">
						<span>Delete this Items</span> 
							<button type='button' id='del_' onclick="deletItem()" style="width: 100% !important;" class='food btn btn-outline bg-danger rounded-round btn-icon'><i class='icon-minus2'></i></button>
						</div> -->
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
							
<script>
	var MyElem = {}; // Globally scoped object
		window.onload = function() {
			console.log('window - onload'); // 4th
			$('.select2').select2();

			// do something when modal close button cliked
			$('.closemodal').click(function () {
        // $('#edit_modal').modal('show');
				// alert('check the data');
				// var count =MyElem.addmore_count;
				// var shift =MyElem.addmore_shift;
				// var day =MyElem.addmore_day;
				// var span_elem = "#"+shift+"_"+day+"_"+count
				// $(span_elem).remove();
    	});
		};

		//on ad moreclick add  items
		$(".addmorebtn").click(function() {
 
			MyElem.addmore_count = $(this).attr('data-addmore');
			MyElem.addmore_shift = $(this).attr('data-shift');
			MyElem.addmore_day = $(this).attr('data-day');
		
			// add_more(shift,day,addmore);
			MyElem.tb = 'addmore';
			MyElem.tb_quan = 'addmore';
			MyElem.btn_addmore = this;

			var res = addmore(MyElem.addmore_shift,MyElem.addmore_day,MyElem.addmore_count);
			// set the counter
			count  = parseInt(MyElem.addmore_count) + 1;
			console.log(count);
			MyElem.btn_addmore.setAttribute("data-addmore",count);
			if (res == 1 ) { console.log('addmore ok'); $('#edit_modal').modal(); }else{console.log('%caddmore func error','color:red'); }
			//{backdrop: 'static', keyboard: false}
			updatetotalfooditemcount();
		});

	function addmore(shift,day,count){
 		console.log('Addmore ::'+shift);
 		console.log('Addmore ::'+ day );
 		console.log('Addmore ::'+count);

 		var e1 = " <input readonly type='float' id='food_quan_"+shift+"_"+day+"_"+count+"' name='"+day+"_"+shift+"_data_quantity[]' value=''>";

 		e2 = "<input readonly type='' name='"+day+"_"+shift+"_data_food[]' value='' id='food_"+shift+day+count+"' data-id='' data-day='' data-shift='"+shift+"' data-addmore='"+count+"' >";

 		e22 = "<input type='hidden' name='"+day+"_"+shift+"_data_food2[]'  id='data_food2_"+shift+day+count+"' value='NAi'>";

 		e3 = '<button type="button" id="del_'+shift+'_'+day+'_'+count+'" class="btn btn-outline bg-danger rounded-round btn-icon" onclick="deletItem('+"'"+shift+"'"+','+day+','+count+')" > <i class="icon-minus2"></i></button>';

 		e4 = '<span id="'+shift+'_calspan_'+day+'-'+count+'" class="'+shift+'_'+day+'_cal" style="display:none;">0</span>'+
 			'<span id="'+shift+'_prospan_'+day+'-'+count+'" class="'+shift+'_'+day+'_pro" style="display:none;">0</span>'+
 			'<span id="'+shift+'_carbohydratesspan_'+day+'-'+count+'" class="'+shift+'_'+day+'_carbohydrates" style="display:none;">0</span>'+
 			'<span id="'+shift+'_fatspan_555_'+day+'-'+count+'" class="'+shift+'_'+day+'_fat" style="display:none;">0</span>'+
 			'<span id="'+shift+'_sodiumspan_'+day+'-'+count+'" class="'+shift+'_'+day+'_sodium" style="display:none;">0</span>'+
 			'<span id="'+shift+'_ironspan_'+day+'-'+count+'" class="'+shift+'_'+day+'_iron" style="display:none;">0</span>'+
 			'<span id="'+shift+'_d_fibrespan_'+day+'-'+count+'" class="'+shift+'_'+day+'_d_fibre" style="display:none;">0</span>';
 		$("strong.passenger-list_"+shift+"_"+day).append("<strong class='passenger-reapeat' id='"+shift+"_"+day+"_"+count+"'>" + e1+e2+e22+e3+e4+"</strong>");
		if($(".passenger-reapeat").length > 0){
			return 1
		}else{
			return 0;
		}
 	}
	// select food item or quantity::
	function selectv(){ // onchange of modal // 
		console.log('# STEP 2 ###');
		var myselect = document.getElementById("food_items_dd");
		var myselect_quan = document.getElementById("food_quan_dd"); 
			console.log(MyElem.tb); // last focussed text boxed // dom element properties
			console.log(MyElem.tb_quan); // last focussed text boxed // dom element properties
			
			if (MyElem.tb == undefined) {
				alert('NO Element is selected');

			}else if(MyElem.tb == 'addmore' && MyElem.tb_quan == 'addmore'){
				console.log('Food Item or Quantity Selection for AddMore Elem');
				var count =MyElem.addmore_count;
				var shift =MyElem.addmore_shift;
				var day =MyElem.addmore_day;
				var fooditem_id= myselect.value;
				var foodname = myselect.options[myselect.selectedIndex].text;
				var foodquan= myselect_quan.value;
				console.log('Step2 =>'+count+shift+day);
				$('#food_quan_'+shift+'_'+day+'_'+count).val(foodquan);				
				$('#food_'+shift+day+count).val(foodname);				
				$('#data_food2_'+shift+day+count).val(fooditem_id);				
				
				
				console.log('Step2 =>'+fooditem_id+fooditem_id+foodquan);
				// call change function 
				changes(fooditem_id,shift,day,count,0,fooditem_id,foodquan);
				
			}else{
				console.log('When elem(Food Item )is from DB');
			}
			//myselect.selectedIndex = 0;  
	}

	// extra::
	function checkfocus(){
		var focused = document.hasFocus();
		element = document.activeElement;
		element.style.backgroundColor = "red";
		return element;
	}


	// delete function for food item ::
	function deletItem(shift,day,count){
		var quan_elem = "#food_quan_"+shift+"_"+day+"_"+count;
		var fi_elem = "#food_"+shift+"_"+day+"_"+count;
		var span_elem = "#"+shift+"_"+day+"_"+count
		console.log(span_elem);
		// $(fi_elem).remove();
		// $(quan_elem).remove();
		$(span_elem).remove();
		updateNutrients(shift,day);
		updatetotalfooditemcount('remove');
	}
	
	// calculative function 
	function changes(id,name,day,addmore,iItemCount,tb_elem='',tb_quan=''){
			console.info('\n # Calculation Start From changes func ###');

				console.log('addmore changes name food');
				var food = tb_elem;
				var quan = tb_quan;
		
		//calculation from the template ::
		var calories = $("#calo_"+food).val();
		var protein = $("#protein_"+food).val();
		var carbohydrates = $("#carbohydrates_"+food).val();
		var fat = $("#fat_"+food).val();
		var sodium = $("#sodium_"+food).val();
		var iron = $("#iron_"+food).val();
		var d_fibre = $("#d_fibre_"+food).val();

		var netcal = parseInt(quan*calories);
		var netpro = parseInt(quan*protein);
		var netcarbohydrates = parseInt(quan*carbohydrates);
		var netfat = parseInt(quan*fat);
		var netsodium = parseInt(quan*sodium);
		var netiron = parseInt(quan*iron);
		var netd_fibre = parseInt(quan*d_fibre);

		console.log('Netcalorie for this food item -->'+netcal)
		// setting up the value 

			console.log('--ADDMORE ELEM Update--');
			$("#"+name+"_calspan_"+day+'-'+addmore).html(netcal);
			$("#"+name+"_prospan_"+day+'-'+addmore).html(netpro);
			$("#"+name+"_carbohydratesspan_"+day+'-'+addmore).html(netcarbohydrates);
			$("#"+name+"_fatspan_"+day+'-'+addmore).html(netfat);
			$("#"+name+"_sodiumspan_"+day+'-'+addmore).html(netsodium);
			$("#"+name+"_ironspan_"+day+'-'+addmore).html(netiron);
			$("#"+name+"_d_fibrespan_"+day+'-'+addmore).html(netd_fibre);
		
			updateNutrients(name,day);
	}

	function updatetotalfooditemcount(remove=""){
		var countfi = parseInt($("#totalfooditemcount").val());
		if(remove == ""){ var totalfi  = countfi + 1; }else{ var totalfi  = countfi - 1 ;}
		$("#totalfooditemcount").val(totalfi);
	}

		function updateNutrients(name,day){
			var inputs = $('.'+name+"_"+day+"_cal");
			var total = 0;
			for(var i = 0; i < inputs.length; i++){
				total+= parseInt($(inputs[i]).html())
			}
			$("."+name+"_total_cal_"+day).html(total);
			console.log("calorie=====>>",total);

			// protein
			var inputs = $('.'+name+"_"+day+"_pro");
			console.log(inputs);

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
			$("."+name+"_total_carbohydrates_"+day).html(total);


			var inputs = $('.'+name+"_"+day+"_fat");
			console.log(inputs)
			var total = 0;
			for(var i = 0; i < inputs.length; i++){
				total+= parseInt($(inputs[i]).html())
			}

			$("."+name+"_total_fat_"+day).html(total);

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

			$("."+name+"_total_d_fibre_"+day).html(total);


			/* show total sum data */
			var morning_total_cal = parseInt($(".morning_total_cal_"+day).html());
			var breakfast_total_cal = parseInt($(".breakfast_total_cal_"+day).html());
			var midmeal_total_cal = parseInt($(".midmeal_total_cal_"+day).html());
			var lunch_total_cal = parseInt($(".lunch_total_cal_"+day).html());
			var evening_total_cal = parseInt($(".evening_total_cal_"+day).html());
			var dinner_total_cal = parseInt($(".dinner_total_cal_"+day).html());
			var bedtime_total_cal = parseInt($(".bedtime_total_cal_"+day).html());

			console.log(' check un=>'+ morning_total_cal + breakfast_total_cal + midmeal_total_cal + lunch_total_cal + evening_total_cal + dinner_total_cal + bedtime_total_cal);


			var total_calories = morning_total_cal + breakfast_total_cal + midmeal_total_cal + lunch_total_cal + evening_total_cal + dinner_total_cal + bedtime_total_cal;

			console.log('total_calories'+total_calories);

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