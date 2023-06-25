<?php include('header.php');?>
<?php include('sidebar.php');

?>
<style type="text/css">
	.width50{
		width: 50px !important;
	}
</style>
<!-- Main content -->
		<div class="content-wrapper">


			<!-- Content area -->
			<div class="content">

				<!-- Form inputs -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title font-weight-bold">Add Food Combination</h5>
						
					</div>

					<div class="card-body">
						
						<form action="<?php echo base_url('Admin/addFoodCombination')?>" method="post">
							<div class="row">
									<div class="col-md-6">
							<fieldset class="mb-3">
								<!-- <div class="form-group row">
									<label class="col-form-label">Placement Name</label>
									<div class="col-lg-12">
										<select class="form-control" name="upperplacement">
			                                <option value="">Select Placement Name</option>
			                                <?php foreach ($placementList as  $value2) {
                							?>
			                                <option value="<?=$value2->name;?>"><?=$value2->name;?></option>
			                                <?php } ?>
			                            </select>
									</div>
								</div> -->
							
								<div class="form-group row">
								
									<div class="col-lg-12">
										
										 <ol class="passenger-list list-unstyled">
                                              <li class="passenger-reapeat">
                                                  <span id="passenger-sp">
                                                      <div class="row mt-3">
                                                        <div class="col-md-12">
                                                          <ul class="flex-container" style="list-style-type: none;">
                                                                <li class="flex-item">
                                                                  <div class="form-group">
                                                                  	  <label>Search Food Item</label>
                                                                  	  <select class="form-control select-search" onchange="getFood()" id="searchfood">
																			<option value="">Select Food Item</option>
																			<?php foreach ($foodList as  $value1) {
                																?>
			                                									<option value="<?=$value1->id;?>"><?=$value1->food_name;?></option>
			                                								<?php } ?>
																	  </select>
																	 </div>
                                                                </li>
															 </ul>
                                                        </div>
                                                    </div>
                                                </span>
                                            </li>
                                        </ol>
									</div>
									
								</div>
								
							</fieldset>
						</div>
						<!-- <div class="col-md-6">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Search Food Category</label>
									<div class="col-lg-12">
										<select class="form-control" name="foodCategory">
			                                <option value="">Search Food Category</option>
			                                <?php foreach ($foodCategoryList as  $value) {
                							?>
			                                <option value="<?=$value->name;?>"><?=$value->name;?></option>
			                                <?php } ?>
			                            </select>
									</div>
								</div>
							</fieldset>
						</div> -->
					</div>
						<div class="row" >
							<div class="table-responsive">
								<button type="button" id="del_button" style="display: none;" class="delete-row btn btn-danger">Delete Row</button>
							   <ol class="Cruise-list list-unstyled">
                                              <li class="Cruise-reapeat">
                                                  <div id="Cruise-sp">
                                                      <div class="row mt-3">
                                                        <div class="col-md-12">
                                                          <ul class="flex-container" style="list-style-type: none;">
                                                               <li class="flex-item">

						<table class="table" id="mytable" >
							
							<thead>
								<tr>
									<th>Name</th>
									<th>Delete</th>
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
								<tr>
									
								</tr>
							</tbody>
						</table>
						</li><hr style="margin-top: 1.25rem;margin-bottom: 1.25rem;border: 0;border-top: 3px solid #202b30;">
															</ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
						
						
					</div>
					  <button type="button" name="remove" id="Cruise" class="btn btn-primary" style="padding: 10px;">ADD</button>&nbsp;&nbsp;
                      <button type="button" name="remove" id="Cruiseremove"  class="btn btn-danger"  style="padding: 10px;">Remove</button>
						</div>
					
						<div class="row">
							<div class="col-md-12">
								<h5 class="card-title"><b>Manage Placement</b></h5>
								<div class="row">
									      <?php foreach ($placementList as  $value2) {
                							?>
									<div class="col-md-2" style="padding: 10px;">
								<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="Placement[]" value="<?=$value2->id;?>" data-fouc>
												<?=$value2->name;?>
										</label>
								</div>
							</div>
							 <?php } ?>
							</div>
							
							</div>
						</div>
						<div class="row" style="padding-top: 2%;">
							<div class="col-md-12">
								<h5 class="card-title"><b>Manage Food Category</b></h5>
								<div class="row">
									<?php foreach ($foodCategoryList as  $value) {
                							?>
			                               
									<div class="col-md-2">
								<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled" name="foodCategory[]" value="<?=$value->id;?>" data-fouc>
												<?=$value->name;?>
										</label>
								</div>
								</div>
								 <?php } ?>
							</div>
						</div>
					</div>
						<div class="row" style="padding-top: 2%;">
							<div class="col-md-12">
								<h5 class="card-title"><b>Filter Disease (Need to mark in which the food item not to be given)</b></h5>
								<div class="row">
									<?php foreach ($Disease as  $valuedisease) {
									?>
								<div class="col-md-2" style="padding: 10px;">
									<div class="form-check" data-toggle="modal" data-target="#modal_default<?=$valuedisease->id?>">
											<label class="form-check-label">
												<input type="checkbox" name="filterdisease[]" value="<?=$valuedisease->id;?>" class="form-check-input-styled"  data-fouc>
													<?=$valuedisease->name;?>
											</label>
									</div>
								</div>
									<?php } ?>
								<!-- <div class="col-md-2">
									<div class="form-check" data-toggle="modal" data-target="#modal_default2">
											<label class="form-check-label">
												<input type="checkbox" name="filterdisease[]" value="2" class="form-check-input-styled"  data-fouc>
												Acne
											</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-check" data-toggle="modal" data-target="#modal_default3">
											<label class="form-check-label">
												<input type="checkbox" name="filterdisease[]" value="3" class="form-check-input-styled"  data-fouc>
												Anemia
											</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-check" data-toggle="modal" data-target="#modal_default4">
											<label class="form-check-label">
												<input type="checkbox" name="filterdisease[]" value="4" class="form-check-input-styled"  data-fouc>
												Constipation
											</label>
									</div>
								</div>
								<div class="col-md-2" >
									<div class="form-check"  data-toggle="modal" data-target="#modal_default5">
											<label class="form-check-label">
												<input type="checkbox" name="filterdisease[]" value="5" class="form-check-input-styled"  data-fouc>
												Diabetes
											</label>
									</div>
								</div>
								<div class="col-md-2" >
									<div class="form-check" data-toggle="modal" data-target="#modal_default6">
											<label class="form-check-label">
												<input type="checkbox" name="filterdisease[]" value="6" class="form-check-input-styled"  data-fouc>
												Diabetes Type-1
											</label>
									</div>
								</div>
								
							</div>
							<div class="row" style="padding-top: 2%;">
								<div class="col-md-2" data-toggle="modal" data-target="#modal_default7">
								<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" name="filterdisease[]" value="7" class="form-check-input-styled"  data-fouc>
											Diabetes Type-2
										</label>
								</div>
								</div>
								<div class="col-md-2">
								<div class="form-check" data-toggle="modal" data-target="#modal_default8">
										<label class="form-check-label">
											<input type="checkbox" name="filterdisease[]" value="8" class="form-check-input-styled"  data-fouc>
											Gas Problem
										</label>
								</div>
								</div>
								<div class="col-md-2">
								<div class="form-check" data-toggle="modal" data-target="#modal_default9">
										<label class="form-check-label">
											<input type="checkbox" name="filterdisease[]" value="9" class="form-check-input-styled"  data-fouc>
											Hypercholesterol
										</label>
								</div>
								</div>
								<div class="col-md-2">
								<div class="form-check" data-toggle="modal" data-target="#modal_default10">
										<label class="form-check-label">
											<input type="checkbox" name="filterdisease[]" value="10" class="form-check-input-styled"  data-fouc>
											Hypertension
										</label>
								</div>
								</div>
								<div class="col-md-2">
								<div class="form-check" data-toggle="modal" data-target="#modal_default11">
										<label class="form-check-label">
											<input type="checkbox" name="filterdisease[]" value="11" class="form-check-input-styled"  data-fouc>
											Hyperthroidism
										</label>
								</div>
								</div>
								<div class="col-md-2">
								<div class="form-check" data-toggle="modal" data-target="#modal_default12">
										<label class="form-check-label">
											<input type="checkbox" name="filterdisease[]" value="12" class="form-check-input-styled"  data-fouc>
											Hypothyroidism
										</label>
								</div>
								</div>
							</div>
							<div class="row" style="padding-top: 2%;">
								<div class="col-md-2">
								<div class="form-check" data-toggle="modal" data-target="#modal_default13">
										<label class="form-check-label">
											<input type="checkbox" name="filterdisease[]" value="13" class="form-check-input-styled"  data-fouc>
											Kidney Stones
										</label>
								</div>
								</div>
							</div> -->
							</div>
						</div>
					</div>
						<!-- <div class="row" style="padding-top: 2%;">
							<div class="col-md-12" style="padding: 10px;">
							<input type="Submit" name="Calculate Value" value="Calculate Value" class="btn btn-success">
						</div>
						</div> -->
						<div class="row" style="padding-top: 2%;">
							<div  style="width: 100%; display: none" id="Nutrition">
							<div class="nutritionlist row">
							<div class="card nutritionlist-reapeat col-md-6">
								 <div id="nutritionlist-sp" >
					<div class="" >
						
								 	
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Nutrition Details </h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		
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
									<td class="text-center" id="colories1"></td>
								</tr>
								<tr>
									<td>2.</td>
									<td>Protein</td>
									<td class="text-center" id="portions1"></td>
								</tr>
								<tr>
									<td>3.</td>
									<td>Carbohydrates</td>
									<td class="text-center" id="carbohydratess1"></td>
								</tr>
								<tr>
									<td>4.</td>
									<td>Fats</td>
									<td class="text-center" id="fats1"></td>
								</tr>
								<tr>
									<td>5.</td>
									<td>Sodium</td>
									<td class="text-center" id="sodiums1"></td>
								</tr>
								<tr>
									<td>6.</td>
									<td>Iron</td>
									<td class="text-center" id="irons1"></td>
								</tr>
								<tr>
									<td>7.</td>
									<td>D. FIBRE</td>
									<td class="text-center" id="d_fibres1"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			</div>
				
			</div></div>
			<input type="hidden" name="no_of_food" id="no_of_food" value="0">
		
						</div>
							
						 <?php
						 
						  	foreach ($Disease as $key => $value) {
						 
						   ?>

				<div id="modal_default<?=$value->id?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Select Option</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<h6 class="font-weight-semibold">Note : How Often to be given.</h6>
								<div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="awesomeness<?=$value->id?>" id="awesomeness-0<?=$value->id?>" value="Never" checked="">Never</label></div>
								<div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="awesomeness<?=$value->id?>" id="awesomeness-0<?=$value->id?>" value="Once a week">Once a week</label></div>
								<div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="awesomeness<?=$value->id?>" id="awesomeness-0<?=$value->id?>" value="Twice a week" >Twice a week</label></div>
								<div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input"  name="awesomeness<?=$value->id?>" id="awesomeness-0<?=$value->id?>" value="Thrice a week" >Thrice a week</label></div>
								<div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input"  name="awesomeness<?=$value->id?>" id="awesomeness-0<?=$value->id?>" value="Four-Five times a week">Four-Five times a week</label></div>
								<div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input"  name="awesomeness<?=$value->id?>" id="awesomeness-0<?=$value->id?>" value="Daily">Daily</label></div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								<button type="button" class="btn bg-primary" data-dismiss="modal">Save</button>
							</div>
						</div>
					</div>
				</div>
						<?php } ?>	
						<div class="">
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Cancel &nbsp;&nbsp;<i class="fa fa-close"></i></button>
								<button type="submit" class="btn btn-success">Submit <i class="icon-paperplane ml-2"></i></button>
							</div>
						</div>
			</form>
					</div>
				</div>
				<!-- /form inputs -->

			</div>
			<input type="hidden" id="counter" value="1">
			<!-- /content area -->
<?php include 'footer.php';?>
<style>
 {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
 
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 10px;
  text-decoration: none;
  font-size: 12px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
<script>
function myFunction() {
	$('#myUL').hide();
   var ins = $("#mySearch").val();
  
   if(ins != ''){
$('#myUL').show();
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
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
  $('#myUL').hide();
}
}
</script>
<script type="text/javascript">
	 $("#insert-more").click(function () {
     $("#mytable").each(function () {
         var tds = '<tr>';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
         } else {
             $(this).append(tds);
         }
     });
});

</script>
<script type="text/javascript">
	    $(function() {
        $('#add').on('click', function( e ) {
            e.preventDefault();
            $('<div/>').addClass( 'new-text-div' )
            .html( $('<div form-group row><div class="col-lg-10"><input class="form-control" type="textbox"/></div><div class="col-lg-2"><button id="add" class="btn btn-success"><i class="fa fa-plus"></i></button></div></div>').addClass( 'someclass' ) )
            .append( $('<button/>').addClass( 'remove' ).text( 'Remove' ) )
            .insertBefore( this );
        });
        $(document).on('click', 'button.remove', function( e ) {
            e.preventDefault();
            $(this).closest( 'div.new-text-div' ).remove();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#passenger").click(function() {

            var e1 = $("#passenger-sp").html();

            $("ol.passenger-list").append("<li class='passenger-reapeat'>" + e1 + "</li>");
             $('.clockpicker').clockpicker();
            $('.datepicker').datepicker({
              format: 'yyyy-mm-dd',
            });
        });
        $("#passengeremove").click(function() {

            if ($('ol.passenger-list li.passenger-reapeat').length > 1) {
                $("li.passenger-reapeat:last").remove();
            }

            
        });
    });

    function getFood(){
    	var urls = $("#baseurl").val();
    	 var foodid = $("#searchfood").val();
    	$.ajax({

  type: "POST",

  url: urls+"Admin/foodData",

  data: {id:foodid},

  cache: false,

  success: function(result){

  		foodCombination(result,foodid);
 		var foodNo = parseInt($("#no_of_food").val());
 		$("#no_of_food").val(foodNo+1);
	  }

 });
    	

    }

    function foodCombination(result,ids){
    	
    	var response = JSON.parse(result);

		console.log(response);
    	 $("#mytable").each(function () {
    	
    	
         var tds = '<tr id="food_'+ids+'" >';
         
         
         tds += '<td>' + response.data[0].food_name + '</td>';
         tds += '<td>' + '<input type="checkbox" class="btn btn-danger" name="record">' + '</td>';
         tds += '<td>' + '<input type="text" class="width50" name="quantity[]" id="quantity1_'+ids+'" value="1" onchange="updatevalues(this,'+ids+','+response.data[0].calories+','+response.data[0].protein+','+response.data[0].carbohydrates+','+response.data[0].fat+','+response.data[0].sodium+','+response.data[0].iron+','+response.data[0].d_fibre+')" class="form-control" onkeypress="return isNumberKey(event)">' + '</td>';

         tds += '<td>' + response.data[0].unitname + '</td>';
         tds += '<td ><input type="text" class="width50" id="calories1_'+ids+'" readonly="true" name=calories[] value="'+response.data[0].calories+'"></td>';
         tds += '<td ><input type="text" class="width50" id="portion1_'+ids+'" readonly="true" name=portion[] value="'+response.data[0].protein+'"></td>';
         tds += '<td ><input type="text" class="width50" id="carbohydrates1_'+ids+'" readonly="true" name=carbohydrates[] value="'+response.data[0].carbohydrates+'"></td>';
		 tds += '<td ><input type="text" class="width50" id="fat1_'+ids+'" readonly="true" name=fat[] value="'+response.data[0].fat+'"></td>';
         tds += '<td ><input type="text" class="width50" id="sodium1_'+ids+'" readonly="true" name=sodium[] value="'+response.data[0].sodium+'"></td>';
         tds += '<td ><input type="text" class="width50" id="iron1_'+ids+'" readonly="true" name=iron[] value="'+response.data[0].iron+'"></td>';
         tds += '<td ><input type="text" class="width50" id="d_fibre1_'+ids+'" readonly="true" name=d_fibre[] value="'+response.data[0].d_fibre+'"></td>';
      

         tds += '</tr>';
         tds += '<input type="hidden"  name=foodId[] value="'+ids+'">';


       if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds); 

            $("#Nutrition").show();
            $("#del_button").show();
            
         } else { 
            $("#Nutrition").hide();         	
         	$("#del_button").hide();
             $(this).append(tds);
         }
     });
     $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();


                }
            });
        });
    }
</script>
<span id="test"> </span>
<span id="testnutri"> </span>
<script>
    $(document).ready(function() {
    	
        $("#Cruise").click(function() {
 
            var e1 = $("#Cruise-sp").html();
			$("#test").html(e1);
			var counter = parseInt($("#counter").val())+1;
			$("#counter").val(counter);
			 var items= $('span [id^="quantity1_"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");

			var newId= currentid.substring(9,currentid.length);
			var abc="quantity"+counter+newId;

			item.attr("id",abc).html(e1);  

			});     


			var e3 = $("#test").html();
			var items= $('span [id^="calories1_"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");

			var newId= currentid.substring(9,currentid.length);
			var abc="calories"+counter+newId;
			item.attr("id",abc).html();        
			

			});
			var e3 = $("#test").html();
			var items= $('span [id^="portion1_"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");

			var newId= currentid.substring(8,currentid.length);
			var abc="portion"+counter+newId;
			item.attr("id",abc).html();        
			});
			var e3 = $("#test").html();
			var items= $('span [id^="carbohydrates1_"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");

			var newId= currentid.substring(14,currentid.length);
			var abc="carbohydrates"+counter+newId;
			item.attr("id",abc).html();        
			});
			var e3 = $("#test").html();
			var items= $('span [id^="fat1_"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");

			var newId= currentid.substring(4,currentid.length);
			var abc="fat"+counter+newId;
			item.attr("id",abc).html();        
			});
			var e3 = $("#test").html();
			var items= $('span [id^="sodium1_"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");

			var newId= currentid.substring(7,currentid.length);
			var abc="sodium"+counter+newId;
			item.attr("id",abc).html();        
			});
			var e3 = $("#test").html();
			var items= $('span [id^="iron1_"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");

			var newId= currentid.substring(5,currentid.length);
			var abc="iron"+counter+newId;
			item.attr("id",abc).html();        
			});
			var e3 = $("#test").html();
			var items= $('span [id^="d_fibre1_"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");

			var newId= currentid.substring(8,currentid.length);
			var abc="d_fibre"+counter+newId;
			item.attr("id",abc).html();        
			});
			var e3 = $("#test").html();
			var items= $('span [id^="unit1_"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");

			var newId= currentid.substring(5,currentid.length);
			var abc="unit"+counter+newId;

			item.attr("id",abc).html();        
			});
			var e1 = $("#test").html();
        
            $("ol.Cruise-list").append("<li class='Cruise-reapeat'>" + e1 + "</li>");



             
             var e2 = $("#nutritionlist-sp").html();
             $("#testnutri").html(e2);
              var items= $('span [id^="colories1"]');
            
			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");
			var abc="colories"+counter;

			item.attr("id",abc).html();        
			});  
			 var e2 = $("#testnutri").html();
			  var e2 = $("#nutritionlist-sp").html();
             $("#testnutri").html(e2);
              var items= $('span [id^="portions1"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");
			var abc="portions"+counter;
			item.attr("id",abc).html();        
			});  
			 var e2 = $("#testnutri").html();

			 var items= $('span [id^="carbohydratess1"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");
			var abc="carbohydratess"+counter;
			item.attr("id",abc).html();        
			});  
			 var e2 = $("#testnutri").html();
			  var items= $('span [id^="fats1"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");
			var abc="fats"+counter;
			item.attr("id",abc).html();        
			});  
			 var e2 = $("#testnutri").html();
			  var items= $('span [id^="sodiums1"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");
			var abc="sodiums"+counter;
			item.attr("id",abc).html();        
			});  
			 var e2 = $("#testnutri").html();
			 var items= $('span [id^="irons1"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");
			var abc="irons"+counter;
			item.attr("id",abc).html();        
			});  
			 var e2 = $("#testnutri").html(); 
			 var items= $('span [id^="d_fibres1"]');

			$.each(items,function(){
			var item=$(this); 
			var currentid=item.attr("id");
			var abc="d_fibres"+counter;
			item.attr("id",abc).html();        
			});  
			 var e2 = $("#testnutri").html(); 
            $("div.nutritionlist").append("<div class='card nutritionlist-reapeat col-md-6'>" + e2 + "</div>");


           $("#test").html('');
           $("#testnutri").html('');

        });
        $("#Cruiseremove").click(function() {

            if ($('ol.Cruise-list li.Cruise-reapeat').length > 1) {
                $("li.Cruise-reapeat:last").remove();
                $("div.nutritionlist-reapeat:last").remove();
            }
          
           
        });
    });
    function updatevalues(ins,id,calories,portion,carbohydrates,fat,sodium,iron,fibre){
    //.	alert($(ins).attr('id'));
    	var currentid = $(ins).attr('id');
    	var newId= currentid.substring(8,currentid.length);
    	var nutriId = newId.slice(0,1);
    	//console.log('calories'+newId);
    	//var quantity = parseInt($("#quantity"+newId).val());
    	var quantity = $("#quantity"+newId).val();
    	//alert(quantity);
    	$("#quantity"+newId).val(quantity);

    	$("#calories"+newId).val(quantity*calories);
    	$("#portion"+newId).val(quantity*portion);
    	$("#carbohydrates"+newId).val(quantity*carbohydrates);
    	$("#fat"+newId).val(quantity*fat);
    	$("#sodium"+newId).val((quantity*sodium).toFixed(1));
    	$("#iron"+newId).val((quantity*iron).toFixed(1));
    	$("#d_fibre"+newId).val(quantity*fibre);


    	var items0= $('[id^="calories'+nutriId+'"]');
    	//console.log(items)
    	var calo =0;
			$.each(items0,function(){
			var item=$(this); 
			 calo += parseInt(item.val());
			// console.log(calo)
			
			});
		$("#colories"+nutriId).html(calo);
		//console.log('portion'+nutriId)
		var items1= $('[id^="portion'+nutriId+'"]');
		
    	var pro =0;
			$.each(items1,function(){
			var item=$(this); 
			 pro += parseInt(item.val());

			
			});
	
		$("#portions"+nutriId).html(pro);
		var items2= $('[id^="carbohydrates'+nutriId+'"]');
		
    	var car =0;
			$.each(items2,function(){
			var item=$(this); 
			 car += parseInt(item.val());

			
			});
		$("#carbohydratess"+nutriId).html(car);
		var items3= $('[id^="fat'+nutriId+'"]');
		
    	var ft =0;
			$.each(items3,function(){
			var item=$(this); 
			 ft += parseInt(item.val());
		});
		$("#fats"+nutriId).html(ft);
		var items4= $('[id^="sodium'+nutriId+'"]');
		
    	var sod =0;
			$.each(items4,function(){
			var item=$(this); 
			 sod += parseInt(item.val());
		});
		$("#sodiums"+nutriId).html(sod);
		var items5= $('[id^="iron'+nutriId+'"]');
		
    	var ir =0;
			$.each(items5,function(){
			var item=$(this); 
			 ir += parseInt(item.val());
		});
		$("#irons"+nutriId).html(ir);
		var items6= $('[id^="d_fibre'+nutriId+'"]');
		
    	var ir =0;
			$.each(items6,function(){
			var item=$(this); 
			 ir += parseInt(item.val());
		});
		$("#d_fibres"+nutriId).html(ir);
    }
</script>
 <SCRIPT language=Javascript>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </SCRIPT>
 <!-- Basic modal -->

				<!-- /basic modal -->


<!--  <span id="test"> </span>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
 var e1 = '<div id="rep_target1">Hello</div><div id="rep_target2">Hello    </div>';
 $("#test").html(e1);

    var items= $('[id^="rep_"]');
    console.log(items);
    $.each(items,function(){
       var item=$(this); 
       var currentid=item.attr("id");
      
       var newId= currentid.substring(4,currentid.length);
      var abc=newId+"_2";
        item.attr("id",abc).html("This does not work");        
        alert("newid : "+abc);
    });      
    
});
</script> -->