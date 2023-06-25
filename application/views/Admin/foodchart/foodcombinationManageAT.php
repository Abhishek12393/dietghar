<?php
 
	$this->view('Admin/header2.php');
?>
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
 
// important all calculation done from this chart ::
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
				<h5 class="card-title">Total verified : <?=$totalcount.''; ?></h5>
				<h5 style="float: right;">
					count :<?=$_SESSION['fcupdatecount']; ?>
				</h5>
				<h5 style="float: center;">
					ID :<?=$message['id']; ?>
				</h5>
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

					</span>
				</strong></strong>
				<form method="post" action="<?=base_url('Admin/update_foodcombination_new')?>">
	 				<?php 
					 #	pr($message);
					  ?>
					<table class="table table-hover table-bordered">
						<input type="hidden" name="fcid" value="<?=$message['id']?>">
						<thead>
							<tr>
								<th>Food Combination Name:</th>
								<th>Food Items and quantity<p class="badge badge-clr1">6 AM</p></p></th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
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
								$day = 1;
							?>
								<tr>
									<td style="width: 12%;font-size: 14px;"><?=$message['fcname'];?></td>
					 				
									<td style="width: 12%;font-size: 14px;"> Food Category : <br>
											<select name="fc_cat" id="fc_cat" >
												<option <?php if($message['fcCat']== 1){echo'selected';}?> value="1">Vegetarian</option>
												<option <?php if($message['fcCat']== 2){echo'selected';}?> value="2">Non-Vegetarian</option>
												<option  <?php if($message['fcCat']== 3){echo'selected';}?> value="3">Eggetarian</option>
											</select>
									</td>
										<td style="width: 12%" class="cursor-move">
											<div style="padding-top: 15%;">
												<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
													<strong class="passenger-list_morning_<?=$day?>">
														<strong class="">
															<span>
<?php
	// early morning column :: 
	$iItemCount = 0; // initial items added from db
		foreach ($message['fcitems'] as $key => $value1) {
			$name = 'morning' ;
			++$iItemCount;
			?> 
			<span id="span_<?=$iItemCount?>">
			<!-- New buttons -->
			<input type="float" readonly  name="<?=$day?>_<?=$name?>_data_quantity[]" value="<?=$value1['quantity']; ?>" id="<?=$name?>_food_quan_<?=$value1['foodId']?>_<?=$day?>">

			<input type="hidden" id="<?=$day?>_<?=$name?>_<?=$value1['foodId']?>_data_food2" name="<?=$day?>_<?=$name?>_data_food2[]" value="<?=$value1['foodId']; ?>">

			<input type="text"  class="" id="<?=$name?>_food_data_<?=$value1['foodId']?>_<?=$day?>" name="<?=$day?>_<?=$name?>_data_food[]"  value='<?= $value1['food_name']; ?>' data-id="<?=$value1['foodId']; ?>" data-quant="<?=$name?>_food_quan_<?=$value1['foodId']?>_<?=$day?>" data-hid="<?=$day?>_<?=$name?>_<?=$value1['foodId']?>_data_food2" data-day="<?=$day?>" data-shift="<?=$name?>" data-iItemCount="<?=$iItemCount?>"  data-addmore="1">

			<button type="button" id="<?=$name?>_food_data_<?=$value1['foodId']?>_<?=$day?>" class="btn btn-outline btn-danger rounded-round btn-icon" onclick="deletItem0('span_<?=$iItemCount?>','<?=$name?>','<?=$day?>')" > <i class="icon-minus2"></i></button>
			
			<span id="<?=$name?>_calspan_<?=$day?>_i<?=$iItemCount?>"class="<?=$name?>_<?=$day?>_cal span_i<?=$iItemCount?>"style="display:none;"><?php echo  $value1["calories"]*$value1["quantity"] ?> </span>
			<span id="<?=$name?>_prospan_<?=$day?>_i<?=$iItemCount?>"class="<?=$name?>_<?=$day?>_pro span_i<?=$iItemCount?>" style="display:none;"><?php echo  $value1["protein"]*$value1["quantity"] ?></span>
			<span id="<?=$name?>_carbohydratesspan_<?=$day?>_i<?=$iItemCount?>" class="<?=$name?>_<?=$day?>_carbohydrates span_i<?=$iItemCount?>" style="display:none;"><?php echo  $value1["carbohydrates"]*$value1["quantity"] ?></span>
			<span id="<?=$name?>_fatspan_<?=$day?>_i<?=$iItemCount?>" class="<?=$name?>_<?=$day?>_fat span_i<?=$iItemCount?>" style="display:none;"><?php echo  $value1["fat"]*$value1["quantity"] ?></span>
			<span id="<?=$name?>_sodiumspan_<?=$day?>_i<?=$iItemCount?>" class="<?=$name?>_<?=$day?>_sodium span_i<?=$iItemCount?>" style="display:none;"><?php echo  $value1["sodium"]*$value1["quantity"] ?></span>
			<span id="<?=$name?>_ironspan_<?=$day?>_i<?=$iItemCount?>" class="<?=$name?>_<?=$day?>_iron span_i<?=$iItemCount?>" style="display:none;"><?php echo  $value1["iron"]*$value1["quantity"] ?></span>
			<span id="<?=$name?>_d_fibrespan_<?=$day?>_i<?=$iItemCount?>" class="<?=$name?>_<?=$day?>_d_fibre span_i<?=$iItemCount?>" style="display:none;"><?php echo  $value1["d_fibre"]*$value1["quantity"] ?></span>
			<br>
			</span>
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
	<a href="javascript:void(0);" class="btn btn-primary addmorebtn" data-addmore='1' data-shift='morning' data-day='<?=$day?>' type="<?=$day?>">Add More</a>
</td>
	<td style="width: 12%">
 
		Total Calories : <input  id="total_calorie<?=$day?>" class="total_calorie<?=$day?>" type="text" name="total_calorie" readonly="" value="<?=$total_box_calo?>"><br>
		Total Protein <input  id="total_protein<?=$day?>" type="text" name="total_protein" readonly="" value="<?=$total_box_pro?>"><br>
		Total Carbs<input  id="total_cabs<?=$day?>" type="text" name="total_cabs" readonly="" value="<?=$total_box_fat?>"><br>
		Total Fat<input  id="total_fat<?=$day?>" type="text" name="total_fat" readonly="" value="<?=$total_box_cabs?>"><br>
		Total Sodium<input  id="total_sodium<?=$day?>" type="text" name="total_sodium" readonly="" value="<?=$total_box_sodium?>"><br>
		Total Iron<input  id="total_iron<?=$day?>" type="text" name="total_iron" readonly="" value="<?=$total_box_iron?>"><br>
		Total Fibre<input  id="total_fibre<?=$day?>" type="text" name="total_fibre" readonly="" value="<?=$total_box_fibre?>"><br>
	</td>
</tr>
</tbody>
</table>
<div class="text-center">
	<input type="submit" class="btn btn-success" name="submit">
	<input type="submit" class="btn btn-success" name="delete" value="delete">
</div><br>
</form>
</div>
</div>
<!-- /hover rows -->
</div>
<!-- /content area -->

<!-- Modal -->
<div id="edit_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title">Search Item</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3"> 
						<span>Quantity</span>
						<select name="fod_quan_dd" id="food_quan_dd" class="food select2"  style="width: 100% !important;" onchange="selectv()">
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
							foreach ($all_food as $key => $value2) { ?>
								<option value="<?=$value2['id']?>" ><?=$value2['food_name']?></option> 
							<?php } ?>
						</select>
					</div>

				</div>
 
			</div>

		</div>
	</div>
</div>
<!-- New Custom Script :: -->
<script type="text/javascript">

	var MyElem = {}; // Globally scoped object
	
	function deletItem0(id,shift,day){
		// alert('delete thi item ?');
		// var span_elem = "#"+shift+"_"+day+"_"+count;
		// ('#'+id).val('0');
		$('#'+id).remove();
		updateNutrients(shift,day);
	}

	function deletItem1(){
		console.log('%c DELETE FOOD ITEM',"color:red;")
		console.log(MyElem.tb); // last focussed text boxed // dom element properties
		console.log(MyElem.tb_quan);
		var count =MyElem.addmore_count;
		var shift =MyElem.addmore_shift;
		var day =MyElem.addmore_day;

		if (MyElem.tb == undefined) {
			alert('NO Element is selected');

			}else if(MyElem.tb == 'addmore' && MyElem.tb_quan == 'addmore'){

			}else{
				MyElem.tb.remove();
				MyElem.tb_quan.remove();

				$('.span_i'+iItemCount).remove();
			}
	}
	function deletItem(shift,day,count){
		var quan_elem = "#food_quan_"+shift+"_"+day+"_"+count;
		var fi_elem = "#food_"+shift+"_"+day+"_"+count;
		var span_elem = "#"+shift+"_"+day+"_"+count

		// $(fi_elem).remove();
		// $(quan_elem).remove();
		$(span_elem).remove();
		updateNutrients(shift,day);
	}



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
				console.log(count+shift+day);
				$('#food_quan_'+shift+'_'+day+'_'+count).val(foodquan);				
				$('#food_'+shift+day+count).val(foodname);				
				$('#data_food2_'+shift+day+count).val(fooditem_id);				
			
				// call change function 
				changes(fooditem_id,shift,day,count,0,fooditem_id,foodquan);
				
			}else{
				console.log('When elem(Food Item )is from DB');
				var tb_elem = MyElem.tb; // input tb element
				var iItemCount = MyElem.food_iItemCount;
				var fooditemid = myselect.options[myselect.selectedIndex].value; // dd value has id int
				tb_elem.setAttribute("data-id", fooditemid ); // set new food item id into input tb
				tb_elem.value = myselect.options[myselect.selectedIndex].text; // set input tb value from dd

				// set id -- 

				//--- set quantity 
				var tb_quan_elem = MyElem.tb_quan;
				tb_quan_elem.value  = myselect_quan.options[myselect_quan.selectedIndex].value;
				//-- set hidden id 
				var hiddenid_elem = MyElem.hiddenid_elem;
				hiddenid_elem.value  = fooditemid;


				// call change function 
				changes(MyElem.fooditem_id,MyElem.food_shift,MyElem.sel_day,0,iItemCount,tb_elem,MyElem.tb_quan);
			}
			//myselect.selectedIndex = 0;  
		}
		function checkfocus(){
			var focused = document.hasFocus();
			element = document.activeElement;
			element.style.backgroundColor = "red";
			return element;
		}


		$('input, textarea , label').focus(function() {
			console.clear();
			// to change the fooditem in textbox ::
		  // inFocus = true;
		  console.log('focus-trigger-Step 1');
		  var elem = checkfocus();
		  //food item
		  MyElem.tb = elem;
		  console.log(MyElem.tb);
		  // quantity
		  quan_id = elem.getAttribute("data-quant"); // quantity box id
		  var quan_elem = document.getElementById(quan_id); // get elem from id
		  console.log(quan_elem);
		  document.getElementById('food_quan_dd').value = quan_elem.value; 
		  MyElem.tb_quan = quan_elem;
			// for hid 
			h_id = elem.getAttribute("data-hid");
			var hiddenid_elem = document.getElementById(h_id);
			console.log(hiddenid_elem);
			MyElem.hiddenid_elem = hiddenid_elem;

		  // day
		  var sel_day = elem.getAttribute("data-day");
		  MyElem.sel_day = sel_day;
		 
		  // food item id
		  fooditem_id = elem.getAttribute("data-id");
		  document.getElementById('food_items_dd').value = fooditem_id;
		  MyElem.fooditem_id = fooditem_id;
		  // shift
		  elem_shift = elem.getAttribute("data-shift");
		  MyElem.food_shift = elem_shift;

		  // iItemCount:: intial elem count
		  iItemCount = elem.getAttribute("data-iItemCount");
		  MyElem.food_iItemCount = iItemCount;

		  console.log('%c DAY-->'+sel_day+' FoofitemId -->'+fooditem_id+' Shift-->'+elem_shift +'iItemCount-->'+iItemCount,'background:black;color:white');
		  elem.blur();
 			// $('#food_quan_dd').select2(); // uncomment
 			// $('#food_items_dd').select2(); // uncomment
		  $('#edit_modal').modal(); // this will open modal
		  console.log('STEP 1 Ends--------------------------');
		});
</script>
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
	// add more
 	function addmore(shift,day,count){
 		console.log(shift+ day + count);

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
	});

function changes(id,name,day,addmore,iItemCount,tb_elem='',tb_quan=''){
	console.info('\n # Calculation Start From changes func ###');
	if(addmore >0 ){
  		console.log('addmore changes name food');
  		var food = tb_elem;
  		var quan = tb_quan;
	}else{
  		console.log('ID =>'+id);
  		console.log('NAME =>'+name);
  		console.log('DAY =>'+day);
  		console.log("txt box for quan id => #"+name+"_food_quan_"+id+"_"+day);
		  // var quan = $("#"+name+"_food_quan_"+id+"_"+day).val(); 
		  var quan = tb_quan.value;
		  console.log('Check Quantity --> '+quan);
		  var food = $("#"+name+"_food_data_"+id+"_"+day).val();

		  if($.isNumeric(food) == false){
		  	//food = $("#"+name+"_food_data_"+id+"_"+day).attr('data-id');
		  	food = tb_elem.getAttribute("data-id");
		  }
	}

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
  if(addmore == 0){
  	console.log('--DB ELEM Update--');
  	$("#"+name+"_calspan_"+day+'_i'+iItemCount).html(netcal);
	  $("#"+name+"_prospan_"+day+'_i'+iItemCount).html(netpro);
	  $("#"+name+"_carbohydratesspan_"+day+'_i'+iItemCount).html(netcarbohydrates);
	  $("#"+name+"_fatspan_"+day+'_i'+iItemCount).html(netfat);
	  $("#"+name+"_sodiumspan_"+day+'_i'+iItemCount).html(netsodium);
	  $("#"+name+"_ironspan_"+day+'_i'+iItemCount).html(netiron);
	  $("#"+name+"_d_fibrespan_"+day+'_i'+iItemCount).html(netd_fibre);
  }else{
  	console.log('--ADDMORE ELEM Update--');
  	$("#"+name+"_calspan_"+day+'-'+addmore).html(netcal);
	  $("#"+name+"_prospan_"+day+'-'+addmore).html(netpro);
	  $("#"+name+"_carbohydratesspan_"+day+'-'+addmore).html(netcarbohydrates);
	  $("#"+name+"_fatspan_"+day+'-'+addmore).html(netfat);
	  $("#"+name+"_sodiumspan_"+day+'-'+addmore).html(netsodium);
	  $("#"+name+"_ironspan_"+day+'-'+addmore).html(netiron);
	  $("#"+name+"_d_fibrespan_"+day+'-'+addmore).html(netd_fibre);
  }
 
  updateNutrients(name,day);
}

function updateNutrients(name,day){
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
  $("."+name+"_total_cal_"+day).html(total);
  $("#total_calorie"+day).val(total);
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

<?php #include 'footer2.php';
 $this->view('Admin/footer2.php');
?>