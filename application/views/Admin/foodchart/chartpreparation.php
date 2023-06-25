<?php
// pr($message);die;
 
 $this->view('Admin/header.php');
 $this->view('Admin/sidebar.php');
 
 ?>
 <style type="text/css">
 .brdright{
 	border-right: 1px solid rgb(33, 150, 243);
 	min-height: 70px;
 	padding-top: 1%;
 }
 .tpftr{
 	width: 100%;padding: 10px;
 }
 .row1{
 	line-height: 0px !important;
 }
</style>
<style>
table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
}
th, td {
	padding: 5px;
	text-align: left;
}
.clr{
	color: #fff;
}
.btmfix{
	position: fixed;bottom: 0;z-index: 999999;height: 100px;width: 85%;background-color: #324148;color: #fff;
}
.lblalign{
	float: right;
	font-weight: 700;
	font-size: 16px;
	padding-top: 3%;
}
</style>
<?php
$cust_id = $this->uri->segment(3); 
$birth_date     = new DateTime($message->dob);
$current_date   = new DateTime();
$diff           = $birth_date->diff($current_date);
$age = $diff->y;
$height_arr =  (explode("'",$message->height));
$ft = $height_arr[0];
$inches = $height_arr[1];
$height_inchesval = $ft*12 + $inches;
$height_cm = $height_inchesval*2.54;
$height_cm = round($height_cm,4);

$heightcm = $height_cm; //input
$heightm = $heightcm/100;
$weightkg = $message->weight; //input
$Bmi = $weightkg / ($heightm * $heightm);

if($message->gender == 1){
		$BMR = 66 + ( 13.7 * $weightkg ) + ( 5 * $heightcm ) - ( 6.8 * $age);
}elseif($message->gender == 2){
		$BMR = 655 + ( 9.6 * $weightkg ) + ( 1.8 * $heightcm ) - ( 4.7 * $age );
}

$waistinch = $message->Waist; //input
$waist =  round($waistinch/0.39370);

$hipinch = $message->hip;; //input
$hip =  round($hipinch/0.39370);

$WHR = round($waist/$hip,2);

?>
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-light">

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<!-- <a href="#" class="breadcrumb-item">Food</a> -->
					<?php   if(isset($renewchart) && $renewchart == 1) {?>
								<span class="breadcrumb-item active">Doctor Chart Preparation - Renew</span>
								<?php }else{ ?>
									<span class="breadcrumb-item active">Doctor Chart Preparation</span>
									<?php } ?>
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
						<h5 class="card-title font-weight-bold">Client : <?=$message->first_name." ".$message->last_name?></h5>
						<!-- <h5 style="float: right;"><?=$cust_id?></h5> -->
					</div>

					<div class="card-body">
						
						<form action="<?=base_url('Admin/clientfoodchart_new')?>" method="POST" target="_blank">
      				<input type="hidden" name="plan" value="<?=$message->plan_name?>" >
							<?php  if(isset($renewchart) && $renewchart == 1) {?>
								<input type="hidden" name="renewchart" value="1" >
							<?php } ?>
      				<input type="hidden" name="plan_type" value="<?=$message->plan_type?>" >
							<div class="row">
								<div class="col-md-12">
							<fieldset class="mb-3">
								<div class="form-group row">
									<label class="col-form-label">Recommended BMR</label>
									<div class="col-lg-12">
										<input type="text" class="form-control" id="bmr" name="bmr" value="<?=$BMR?>" readonly="true">
                    <input type="hidden" name="id"  value="<?=$cust_id?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-2">
										<input type="radio" name="Weight" value="1" onchange="cal()" checked> &nbsp;Weight Loss
									</div>
									<div class="col-md-2">
										<input type="radio" name="Weight" value="2"  onchange="cal()"> &nbsp;Weight Gain
									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label"> Percentage</label>
									<div class="col-lg-12">
										<input type="text"  onkeypress="javascript:return isNumber(event)" onkeyup="cal()" id="percentage" class="form-control" name="percentage" value="" required="">

									</div>
								</div>
								<div class="form-group row">
									<label class="col-form-label">Enter value to create chart</label>
									<div class="col-lg-12">
										<input type="text" class="form-control" id="final_bmr" name="final_bmr" value=""  >
									</div>
								</div>
								<!-- <div class="form-group row">
									<label class="col-form-label"> 5-5/7-7 same shift entry</label>
									<div class="col-lg-4">
										<!-- <input type="text" class="form-control" id="final_bmr" name="final_bmr" value=""  >  
										<input type="checkbox" class="form-control" name="entersameshift" id="entersameshift" checked>
									</div>
								</div> -->
								<div class="form-group row">
									<div class="col-md-2">
										<input type="radio" name="entersameshift" value="1"   checked> &nbsp;Normal Chart
									</div>
									<div class="col-md-2">
										<input type="radio" name="entersameshift" value="2"  > &nbsp;Blank Shift Entry
									</div>
									<div class="col-md-2">
										<input type="radio" name="entersameshift" value="3"  > &nbsp;Same Shift Entry
									</div>
									
								</div>
 
                  
								<input type="hidden" class="form-check-input-styled" name="Placement[]" value="Early Morning" data-fouc>
								<input type="hidden" class="form-check-input-styled" name="Placement[]" value="Breakfast" data-fouc>
								<input type="hidden" class="form-check-input-styled" name="Placement[]" value="Mid Meal" data-fouc>
									<input type="hidden" class="form-check-input-styled" name="Placement[]" value="Lunch" data-fouc>
								<input type="hidden" class="form-check-input-styled" name="Placement[]" value="Evening Snack" data-fouc>
									<input type="hidden" class="form-check-input-styled" name="Placement[]" value="Dinner" data-fouc>
								<input type="hidden" class="form-check-input-styled" name="Placement[]" value="Bed Time" data-fouc>
                <!-- <div class="form-group row">
                  <label class="col-form-label">Select No. of Meals</label>
                  <div class="col-lg-12">
                    <div class="row">
											<div class="col-md-3">
												<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input-styled" name="Placement[]" value="Early Morning" data-fouc>
															Early Morning
														</label>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input-styled" name="Placement[]" value="Breakfast" data-fouc>
															Breakfast
														</label>
												</div>
					
												</div>
												<div class="col-md-3">
												<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input-styled" name="Placement[]" value="Mid Meal" data-fouc>
															Mid Meal
														</label>
												</div>
									
												</div>
												<div class="col-md-3">
												<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input-styled" name="Placement[]" value="Lunch" data-fouc>
															Lunch
														</label>
												</div>
									
												</div>
												<div class="col-md-3">
												<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input-styled" name="Placement[]" value="Evening Snack" data-fouc>
															Evening Snack
														</label>
												</div>
							
												</div>
												<div class="col-md-3">
												<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input-styled" name="Placement[]" value="Dinner" data-fouc>
															Dinner
														</label>
												</div>
						
												</div>
												<div class="col-md-3">
												<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input-styled" name="Placement[]" value="Bed Time" data-fouc>
															Bed Time
														</label>
												</div>
				
												</div>
										</div>
                  </div>
                </div> -->
 
								<div class="form-group row">
									
									<div class="col-lg-4">
										<!-- <a class="btn btn-primary" href="#">Show Chart</a> -->
									</div>
									<div class="col-lg-4">
										<!-- <a class="btn btn-primary" href="#">PDF</a> -->
									</div>
									<div class="col-lg-4">
									<!-- 	<a class="btn btn-primary" href="<?=base_url('Admin/foodchart/'.$cust_id)?>">Customer Chart data</a> -->
									<input type="submit" name="submit" value="Show Chart" class="btn btn-primary">

									<?php  if(isset($renewchart) && $renewchart == 1) {?> 
									<a class="btn btn-primary" href="<?=base_url('Admin/reallotchartPreparation/'.$cust_id.'/renew')?>">Reallot Customer Chart</a>
									<?php }else{ ?>
										<a class="btn btn-primary" href="<?=base_url('Admin/reallotchartPreparation/'.$cust_id)?>">Reallot Customer Chart</a>

									<? } ?>

									</div>
								</div>
								
								
							</fieldset>
						</div>
					
							</div>
 
						</form>
					</div>
				</div>
				<!-- /form inputs -->
<br>
			</div>
			<!-- /content area -->

<!-- Footer -->

			<div class="navbar navbar-expand-lg navbar-light btmfix">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					
						<div class="row tpftr">
							<div class="col-md-2 brdright">
								<P>Name <span style="float: right;"><?=$message->first_name." ".$message->last_name?></span></P>
								<P>Age <span style="float: right;"><?=$age?> Years</span></P>
							</div>
							<div class="col-md-2 brdright">
								<P>Weight <span style="float: right;"><?=$weightkg?>(Kg)</span></P>
								<P>Height <span style="float: right;"><?=$ft?> Feet,<?=$inches?> Inch</span></P>
							</div>
							<div class="col-md-2 brdright">
								<P>BMI <span style="float: right;"><?=round($Bmi,4)?> kg/m2</span></P>
								<P>BMR <span style="float: right;"><?=$BMR?> Calories</span></P>
							</div>
							<div class="col-md-2 brdright">
								<P>WHR <span style="float: right;"><?=$WHR?></span></P>
								<P>BFC <span style="float: right;">31.22 Percentage</span></P>
							</div>
							<div class="col-md-2 brdright">
								<P>Objective<span style="float: right;"><?=$message->objective?> </span></P>
								<P>Gender <span style="float: right;"><?php if($message->gender==1){echo "Male";}elseif($message->gender==2){echo "Female";}?></span></P>
							</div>
							<div class="col-md-2">
								<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Measurement</a>
								<div style="padding-top: 2%;">
								<a href="#" data-toggle="modal" data-target="#myModal2" class="btn btn-primary">View Details</a>
							</div>
							</div>
						</div>
					

				
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

				<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-full">
    
      <!-- Modal content-->
      <div class="modal-content" style="height: 500px;overflow-y: auto;">
        <div class="modal-header bg-success">
         
          <h4 class="modal-title text-center"><?=$message->first_name." ".$message->last_name;?></h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       <div class="modal-body">
        
        	<h4>Body Mass Index</h4>
          	<hr>
          	<div class="row">
          		<div class="col-md-6">
          			<br><br>
          			<h5>Your Body Weight : <strong><?=$weightkg?> Kg</strong></h5>
          			<h5>Your Height : <strong><?=$heightm?> Meter</strong></h5>
          			<h5>Your BMI Calculation : <strong><?=$Bmi?> kg/m2</strong></h5>
          		</div>
          		<div class="col-md-6">
          			<h5><strong>Body Mass Index (BMI)</strong></h5>
          			<h5>BMI = x KG / (y M * y M) Where: x=bodyweight in KG y=height in m BMI Categories: Underweight = &lt;18.5 </h5>
          			<h5>Normal weight = 18.5-24.9 </h5>
          			<h5>Overweight = 25-29.9 </h5>
          			<h5>Obesity = BMI of 30 or greater </h5>
          		</div>
          	</div>
          	<h4>Basal Metabolic Rate</h4>
          	<hr>
          	<div class="row">
          		<div class="col-md-6">
          			<br><br>
          			<h5>Your BMR Calculation : <strong><?=$BMR?> Calories</strong></h5>
          			<h5>Your Body Weight : <strong><?=$weightkg?> Kg</strong></h5>
          			<h5>Your Height : <strong><?=$heightm?> Meter</strong></h5>
          			<h5>Your gender : <strong><?php if($message->gender==1){echo "Male";}elseif($message->gender==2){echo "Female";}?></strong></h5>
          			<h5>Your have Select : <strong><?=$message->workout_follow?></strong></h5>
          			<h5>So Requires : <strong>Hard exercise/sports 6-7 days a week</strong></h5>
          			<h5>After BMR Calculation : <strong>3,054.45 Calories</strong></h5>
          		</div>
          		<div class="col-md-6">
          			<h5><strong>(Basal Metabolic Rate)</strong></h5>
          			<h5>BMR Calculation</h5>
          			<h5>Men: BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )</h5>
          			<h5>Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years ) </h5>
          			<h5>Sedentary (little or no exercise)</h5>
          			<h5>Lightly active (light exercise/sports 1-3 days/week)</h5>
								<h5>Moderately active (moderate exercise/sports 3-5 days/week)</h5>
								<h5>Very active (hard exercise/sports 6-7 days a week)</h5>
								<h5>Extremely active (very hard exercise/sports &amp; physical job or 2x training)</h5>
          		</div>
          	</div>
          	<h4>Body Fat Calculation</h4>
          	<hr>
          	<div class="row">
          		<div class="col-md-3">
          			<br><br>
          			
          			<h5>Lean Body Mass : <strong>31.22 (%)</strong></h5>
          			<h5>Body Fat Weight : <strong>40.78 (%)</strong></h5>
          			<h5>Body Fat Percentage : <strong>56.63 (%)</strong></h5>
          		</div>
          		<div class="col-md-3">
          			<br><br>
          			<h5><strong>(Body Fat Calculation)</strong></h5>
          			<h5 style="text-align: justify;">BFC Calculation
								Factor1 = 172.324
								Factor2 = 141.1
								Lean Body Mass	Factor 1 - Factor 2 
								Body Fat Weight	Total bodyweight - Lean Body Mass
								Body Fat Percentage (Body Fat Weight x 100) / total bodyweight
								</h5>
          		</div>
          		<div class="col-md-6" style="padding-top: 6%;">
          			
          			<table style="width:100%;">
								<tbody><tr>
									<th>Classification Essential</th>
									<th>Women(% Fat)</th> 
									<th>Men(% Fat)</th>
								</tr>
								<tr>
									<td>Fat</td>
									<td>10-12 % </td>
									<td>2-4 %</td>
								</tr>
								<tr>
									<td>Athletes</td>
									<td>14-20 % </td>
									<td>6-13 %</td>
								</tr>
								<tr>
									<td>Fitness</td>
									<td>21-24 %</td>
									<td>14-17 %</td>
								</tr>
								<tr>
									<td>Acceptable</td>
									<td>25-31 %</td>
									<td>18-25 %</td>
								</tr>
								<tr>
									<td>Obese</td>
									<td>32 %</td>
									<td>25 %</td>
								</tr>
								</tbody>
								</table>
          		</div>
          	</div>
          	<h4>Waist to Hip Ratio</h4>
          	<hr>
          	<div class="row">
          		<div class="col-md-3">
          			<br><br>
          			<h5>General Waist Hip Ratio (WHR) </h5>
          			<h5>Standards : <strong>1.70</strong></h5>
          		</div>
          		<div class="col-md-3">
          			<br><br>
          			<h5><strong>(Waist to Hip Ratio)</strong></h5>
          			<h5 style="text-align: justify;">WHR Calculation Formula :- a/b
								General Waist Hip Ratio (WHR) Standards 
								Men: WHR of 0.95 or higher indicates health risk 
								Women: WHR of 0.80 or higher indicates health risk 
								Female 
								Male 
								Health Risk
								</h5>
          		</div>
          		<div class="col-md-6" style="padding-top: 6%;">
          			
          			<table style="width:100%;">
								<tbody><tr>
									<th>Male</th>
									<th>Female</th> 
									<th>Health Risk On WHR</th>
								</tr>
								<tr>
									<td>0.95 or below</td>
									<td>0.80 or below</td>
									<td>Low Risk</td>
								</tr>
								<tr>
									<td>0.96-1.0</td>
									<td>0.81-0.85</td>
									<td>Maderate Risk </td>
								</tr>
								<tr>
									<td>1.0+</td>
									<td>0.86</td>
									<td>High Rish</td>
								</tr>
							</tbody></table>
          		</div>
          	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-full">
    
      <!-- Modal content-->
      <div class="modal-content" style="height: 560px;overflow-y: auto;">
        <div class="modal-header bg-success">
         
          <h4 class="modal-title text-center"><?=$message->first_name." ".$message->last_name;?></h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       <div class="modal-body">
       		<div class="row">
       			<div class="col-md-12">
       				<h3>Personal Information</h3>
       				<hr style="margin-top: -0.75rem;">
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>First Name</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->first_name?></p>
    					</div>
    					<div class="col-md-2">
       						<p><label><b>Last Name</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->last_name?></p>
       					</div>
       				</div>
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Mobile</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->mobile_no?></p>
    					</div>
        <span style="display:none">
    					<div class="col-md-2" >
       						<p><label><b>Email</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->email?> </p>
       					</div>
       				</div>
          </span>
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Date Of Birth</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?php echo date('d-m-Y' , strtotime($message->dob))."(".$age." Years)"; ?></p>
    					</div>
    					<div class="col-md-2">
       						<p><label><b>Age</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$age?> years, <?=$diff->m?> months , <?=$diff->d?> days old</p>
       					</div>
       				</div>
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Height</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$ft?> Feet <?=$inches?> Inches</p>
    					</div>
    					<div class="col-md-2">
       						<p><label><b>Weight</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p><?=$message->weight?> Kg</p>
       					</div>
       				</div>
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Blood Group</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> O+</p>
    					</div>
    					<div class="col-md-2">
       						<p><label><b>Food Preference</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->food_prefrence?></p>
       					</div>
       				</div>
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Address</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p><?=$message->house_no?>,<?=$message->address?>,<?=$message->city?>,<?=$message->state?>-<?=$message->pincode?></p>
       					</div>
       					<div class="col-md-2">
       						<p><label><b>Country</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->country?> </p>
    					</div>
    				</div>
       			</div>
       			<div class="col-md-12">
       				<h3>Lifestyle Information</h3>
       				<hr style="margin-top: -0.75rem;">
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Lifestyle Selection</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->lifestyle?></p>
    					</div>
    					<div class="col-md-2">
       						<p><label><b>Wake-up Time</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->wakeup_time?></p>
       					</div>
       				</div>
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Breakfast Meal Time</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->breakfast_time?></p>
    					</div>
    					<div class="col-md-2">
       						<p><label><b>Lunch Meal Time</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->lunch_time?></p>
       					</div>
       				</div>
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Dinner Meal Time</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->dinner_time?></p>
    					</div>
    					<div class="col-md-2">
       						<p><label><b>Sleep Time</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?=$message->sleep_time?></p>
       					</div>
       				</div>
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Workout Selection</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p><?=$message->workout_follow?></p>
    					</div>
    					
       				</div>
       			</div>
       			<div class="col-md-12">
       				<h3>Medical Information</h3>
       				<hr style="margin-top: -0.75rem;">
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Thyroid</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?php if($message->is_thyroid=='0'){ echo "No"; }else{ echo "Yes"."( ".$message->thyroid." )";}?></p>
    					</div>
    					<div class="col-md-2">
       						<p><label><b>Heart Ailment</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?php if($message->heart_ailment==0){ echo "No";}else{ echo "Yes" ;}?></p>
       					</div>
       				</div>
       				<div class="row row1">
       					<div class="col-md-2">
       						<p><label><b>Diabetes</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?php if($message->is_diabetes==0){ echo "No";}else{ echo "Yes"."( ".$message->diabetes." )";}?></p>
    					</div>
    					<div class="col-md-2">
       						<p><label><b>Blood Presure</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> <?php if($message->bp==0){ echo "No";}else{ echo "Yes";}?></p>
       					</div>
       				</div>
       				<div class="row row1"> 
       					<div class="col-md-2">
       						<p><label><b>Outing / Week</b></label> <span style="float: right;"><b>:</b></span></p>
       					</div>
       					<div class="col-md-4">
       						<p> More than 2</p>
    					</div>
    					
       				</div>
       				
       			</div>
       		</div>
 
       			
       	 </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
    function cal(){
        var radioValue = parseInt($("input[name='Weight']:checked").val());
        var percentage = parseInt($("#percentage").val());
        var bmr = parseInt($("#bmr").val());
        var net_val;
        var cal_per_val = ((bmr * percentage)/100);
        if(radioValue == 1){
          net_val = bmr - cal_per_val;
        }else{
          net_val = bmr + cal_per_val;
        }
        
        $("#final_bmr").val(net_val);
    }
       
       
</script>