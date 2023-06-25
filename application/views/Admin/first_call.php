<?php
// pr($message);
include('header.php');?>
<?php include('sidebar.php');?>
<!-- Global stylesheets -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Theme JS files -->
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/forms/wizards/steps.min.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/form_wizard.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/forms/validation/validate.min.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/form_tags_input.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/forms/tags/tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/forms/tags/tokenfield.min.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/ui/prism.min.js"></script>
<!-- Theme JS files -->
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/pickers/anytime.min.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/picker_date.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>

<script type="text/javascript">
	function isNumber(evt) {
		var iKeyCode = (evt.which) ? evt.which : evt.keyCode
		if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
			return false;

		return true;
	}
</script>
<style type="text/css">
.col-form-label {
	width: 100%;
	padding-left: 3%;
}

</style>
<!-- Main content -->
<div class="content-wrapper">
	<div class="page-header page-header-light">
		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<a href="#" class="breadcrumb-item">Manage First Call</a>
					<span class="breadcrumb-item active">Add First Call</span>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title font-weight-bold">Add First Call</h5>
			</div>
			<div class="card-body">
				<form class="wizard-form steps-validation" id="onsubmit" action="<?=base_url('Admin/submission_first')?>" method="post" enctype= "multipart/form-data" data-fouc>
					<h6>Basic Details</h6>
					<fieldset>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Client Name<span>*</span></label>
										<div class="col-lg-12">
											<input type="text" readonly class="form-control required" value="<?=$message->first_name." ".$message->last_name?>" name="cname" required="" style="text-transform: capitalize;" autocomplete="off">
										</div>
									</div>
								</fieldset>
							</div>
							<input type="hidden" name="cust_id" value="<?=$message->id;?>">
							<div class="col-lg-6">
								<label class="col-form-label">Mobile No<span>*</span></label>
								<div class="col-lg-12">
									<input type="text" readonly class="form-control required" value="<?=$message->mobile_no?>" onkeypress="javascript:return isNumber(event)" maxlength="10" name="mobile" required="" autocomplete="off">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Plan Name<span>*</span></label>
					 
										<div class="col-lg-12">
											<select class="form-control required">
												<option value="">Select Plan Name</option>
												<option value="1" <?php if($message->plan_type==1){echo 'Selected';}?>>Diet Essential Plan</option>
												<option value="2" <?php if($message->plan_type==2){echo 'Selected';}?>>Diet Pro Plan</option>
											</select>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-6">
								<label class="col-form-label">Age<span>*</span></label>
								<div class="col-lg-12">
									<input type="text" readonly value="<?=$message->dob?>" class="form-control required" onkeypress="javascript:return isNumber(event)" name="dob" required="" autocomplete="off">
									<span><label></label><?= dobToDate($message->dob, 'admin');?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Height<span>*</span></label>
										<div class="col-lg-12">
											<input type="text"  id="height" value="<?=$message->height?>" class="form-control required" name="height" required="" autocomplete="off">
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-1"> 
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Ft.In & cms<span>*</span></label>
										<input type="checkbox" id="toggle-two">
									</div>
								</fieldset>
								<script>
									$(function() {
										$('#toggle-two').bootstrapToggle({
											on: 'Cms',
											off: 'Ft. In'
										});
									})
								</script>
							</div>
							<div class="col-lg-5">
								<label class="col-form-label">Weight<span>*</span></label>
								<div class="col-lg-12">
									<input type="number" step="0.01" id="weight"  value="<?=$message->weight?>" class="form-control required" name="weight" required="" autocomplete="off">
								</div>
							</div>
							<div class="col-md-1">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Lbs/Kgs<span>*</span></label>
										<input type="checkbox" id="toggle-two1">
									</div>
								</fieldset>
								<script>
									$(function() {
										$('#toggle-two1').bootstrapToggle({
											on: 'Lbs',
											off: 'Kgs'
										});
									})
									$("#toggle-two").change(function(){
										var height = $("#height").val();
										if($(this).prop("checked") == true){
											var endpoint =  'Calculator/feetinchestocms';
										}else{
											var endpoint =  'Calculator/cmtoftinch';
										}
										$.ajax({
											url:  '<?php echo base_url() ?>' + endpoint,
											type: 'POST',
											data: {val:height},
											error: function() {
												alert('Something is wrong');
											},
											success: function(data) {
												$("#height").val(data);
											}
										});
									});
									$("#toggle-two1").change(function(){
										var weight = $("#weight").val();
										if($(this).prop("checked") == true){
											var endpoint =  'Calculator/kgtolbs';     
										}else{
											var endpoint =  'Calculator/lbstokg';       
										}
										$.ajax({
											url:  '<?php echo base_url() ?>' + endpoint,
											type: 'POST',
											data: {val:weight},
											error: function() {
												alert('Something is wrong');
											},
											success: function(data) {
												$("#weight").val(data);
											}
										});
									});
								</script>
							</div>
						</div>
					</fieldset>
					<h6>Lifestyle</h6>
					<fieldset>
						<div class="row">
							<div class="col-md-3">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Highest Weight Ever Recorded<span>*</span></label>
										<div class="col-lg-12">
											<input type="text" maxlength="3" onkeypress="javascript:return isNumber(event)" id="highest_weight"  class="form-control required" name="highest_weight" autocomplete="off" value="<?=$message->heighest_weight_ever; ?>">
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-1">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Lbs/Kgs<span>*</span></label>
										<input type="checkbox" id="toggle-two2">
									</div>
								</fieldset>
								<script>
									$(function() {
										$('#toggle-two2').bootstrapToggle({
											on: 'Lbs',
											off: 'Kgs'
										});
									})
									$("#toggle-two2").change(function(){
										var weight = $("#highest_weight").val();
										if($(this).prop("checked") == true){
											var endpoint =  'Calculator/kgtolbs';     
										}else{
											var endpoint =  'Calculator/lbstokg';       
										}
										$.ajax({
											url:  '<?php echo base_url() ?>' + endpoint,
											type: 'POST',
											data: {val:weight},
											error: function() {
												alert('Something is wrong');
											},
											success: function(data) {
												$("#highest_weight").val(data);
											}
										});
									});
								</script>
							</div>
							<div class="col-md-4">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Lifestyle<span>*</span></label>
										<div class="col-lg-12">
											<select class="form-control required" name="lifestyle">
												<option value="">Select Lifestyle</option>
												<option value="1" <?php if($message->c_lifestyle=='1'){echo 'Selected';}?>>I Barely More</option>
												<option value="2" <?php if($message->c_lifestyle=='2'){echo 'Selected';}?>>Not That active</option>
												<option value="3" <?php if($message->c_lifestyle=='3'){echo 'Selected';}?>>Moderately Active</option>
												<option value="4" <?php if($message->c_lifestyle=='4'){echo 'Selected';}?>>Very Active</option>
											</select>
										</div>
									</div>
								</fieldset>
							</div>

							<div class="col-md-4">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Occupation<span>*</span></label>
										<div class="col-lg-12">
											<select class="form-control required" name="occupation" id="selectNEWBox">
												<option value="">Select Occupation</option>
												<?php if($message->gender == 1){ ?>
													<option value="5" <?php if($message->occupation==5){echo 'Selected';}?>>LATE NIGHT SHIFTS</option>
													<option value="6" <?php if($message->occupation==6){echo 'Selected';}?> >BUSINESS(SELF)</option>
													<option value="7" <?php if($message->occupation==7){echo 'Selected';}?> >JOB(NORMAL SHIFTS)</option>
													<option value="8" <?php if($message->occupation==8){echo 'Selected';}?> >UNEMPLOYED</option>
												<?php }else{ ?>
													<option value="1" <?php if($message->occupation==1){echo 'Selected';}?> >Housewife</option>
													<option value="2" <?php if($message->occupation==2){echo 'Selected';}?> >Working Women</option>
													<option value="3" <?php if($message->occupation==3){echo 'Selected';}?> >Late Night Shift</option>
													<option value="4" <?php if($message->occupation==4){echo 'Selected';}?> >Others</option>
												<?php }?>
											</select>
											<div style="display: none;" id="occ">
												<label class="col-form-label" style="padding-left: 0px;">Add Occupation<span>*</span></label>
												<input type="text" name="occupations" class="form-control required" required="" autocomplete="off">
											</div>
											<script>
												$("#selectNEWBox").change(function (){
													var value = this.value;
													if(value=='Others'){
														$('#occ').show();
													}
													else {
														$('#occ').hide();
													}
												});
											</script>
										</div>
									</div>
								</fieldset>
							</div>
						</div>

						<div class="row">
							<div class="col-md-2">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Wake Up time<span>*</span></label>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<input type="time" id="wakeuptime" class="form-control required" name="wakeuptime"  autocomplete="off" value="<?=$message->wakeup_time; ?>">
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-2">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Breakfast time<span>*</span></label>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<input type="time" id="breakfasttime" class="form-control required" name="breakfasttime" autocomplete="off" onfocusout="check_brkfasttime()" value="<?=$message->breakfast_time; ?>">
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-2">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Midmeal time<span>*</span></label>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<input type="time" id="midmealtime" class="form-control required" name="midmealtime" autocomplete="off" onfocusout="check_midmealtime()" value="<?=$message->midmeal_time; ?>">
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
 
							<div class="col-md-2">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Lunch time<span>*</span></label>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<input type="time" id="lunchtime" class="form-control required" name="lunchtime" autocomplete="off" onfocusout="check_lunchtime()" value="<?=$message->lunch_time; ?>">
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-2">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Evening time<span>*</span></label>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<input type="time" id="eveningtime" class="form-control required" name="eveningtime" autocomplete="off" onfocusout="check_eveningtime()" value="<?=$message->evening_time; ?>">
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-2">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Dinner time<span>*</span></label>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<input type="time" id="dinnertime" class="form-control required" name="dinnertime" autocomplete="off" onfocusout="check_dinnertime()" value="<?=$message->dinner_time; ?>">
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-3">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Sleep time<span>*</span></label>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-lg-12">
													<input type="time" id="sleeptime" class="form-control required" name="sleeptime" autocomplete="off" onfocusout="check_sleeptime()" value="<?=$message->sleep_time; ?>">
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Whats your Daily diet like in terms of meals and Quantity u take in them? (Usual Day’s Diet)<span>*</span></label>
										<div class="col-lg-12">
											<textarea class="form-control required" name="daydiet" rows="2"><?=$message->usuall_diet; ?></textarea>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Food Allergy Any<span>*</span></label>
										<div class="col-lg-12">
											<input type="text" class="form-control tokenfield" name="food_allergies" placeholder="Add Allergies" autocomplete="off" value="<?=$message->food_allergy; ?>">
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Your Favourite food you crave for?<span>*</span></label>
										<div class="col-lg-12">
											<input type="text" class="form-control tokenfield" name="food_liking" placeholder="Add Likings" autocomplete="off" value="<?=$message->food_liking; ?>">
										</div>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Any Previous Diet followed?<span>*</span></label>
										<div class="col-lg-12">
											<select class="form-control required" id="selectNEWBox1" name="previous_diet">
												<option value="">Select Previous Diet</option>
												<option value="yes">Yes</option>
												<option value="No">No</option>
											</select>
										</div>
										<script type="text/javascript">
											$("#selectNEWBox1").change(function (){
												var value = this.value;
												if(value=='yes'){
													$('#previous').show();
												}
												else {
													$('#previous').hide();
												}
											});
										</script>
									</div>
								</fieldset>
							</div>
							<div class="col-md-6" style="display: none;" id="previous">  
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Previous Diet<span>*</span></label>
										<div class="col-lg-12">
											<textarea class="form-control required" name="previous_diet_yes" rows="2"></textarea>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Food Preference<span>*</span></label>
										<div class="col-lg-12">
											<select class="form-control required" name="food_preffrence">
												<option value="">Select Food Preference </option>
												<option value="1" <?php if($message->food_prefrence==1){echo 'Selected';}?> >Veg</option>
												<option value="2"<?php if($message->food_prefrence==2){echo 'Selected';}?> >Non Veg</option>
												<option value="3"<?php if($message->food_prefrence==3){echo 'Selected';}?> >Egg</option>
											</select>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">How many times you eat out in a week<span>*</span></label>
										<div class="col-lg-12">
											<input type="text" maxlength="1" onkeypress="javascript:return isNumber(event)" class="form-control required" name="many_time_week" value="" autocomplete="off" value="<?=$message->how_many_times_eat_in_week; ?>">
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</fieldset>
					<h6>Health Issues and Medical History</h6>
					<fieldset>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Thyroid<span>*</span></label>
										<div class="col-lg-12">
											<select class="form-control required" id="selectNEWBox2" name="is_thyroid">
												<option value="">Select Thyroid</option>
												<option value="1" <?php if($message->is_thyroid==1){echo 'selected';}?>>Yes</option>
												<option value="0" <?php if($message->is_thyroid==0){echo 'selected';}?>>No</option>
											</select>
											<div  stylex="display: none;" id="thyroid">  
												<fieldset class="mb-3">
													<div class="form-group row">
														<label class="col-form-label">Select Thyroid Type<span>*</span></label>
														<div class="col-lg-12">
															<select class="form-control required" name="thyroid">
																<option value="">Select Thyroid Type</option>
																<option value="2" <?php if($message->c_thyroid=='2'){echo 'Selected';}?>>Hyperthyroidism</option>
																<option value="1" <?php if($message->c_thyroid=='1'){echo 'Selected';}?>>Hypothyroidism</option>
															</select>
														</div>
														<script type="text/javascript">
															$("#selectNEWBox2").change(function (){
																var value = this.value;
																if(value==1){
																	$('#thyroid').show();
																}
																else {
																	$('#thyroid').hide();
																}
															});
														</script>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Diabetes<span>*</span></label>
										<div class="col-lg-12">
											<select class="form-control required" id="selectNEWBox3" name="is_diabetes">
												<option value="">Select Diabetes</option>
												<option value="1" <?php if($message->is_diabetes==1){echo 'selected';}?>>Yes</option>
												<option value="0" <?php if($message->is_diabetes==0){echo 'selected';}?>>No</option>
											</select>
											<div  stylex="display: none;" id="diabetes">  
												<fieldset class="mb-3">
													<div class="form-group row">
														<label class="col-form-label">Select Diabetes Type<span>*</span></label>
														<div class="col-lg-12">
															<select class="form-control required" name="diabetes">
																<option value="0">Select</option>
																<option value="1" <?php if($message->c_diabetes=='1'){echo 'Selected';}?>>Dieabetes Type 1</option>
																<option value="2" <?php if($message->c_diabetes=='2'){echo 'Selected';}?>>Dieabetes Type 2</option>
																<option value="3" <?php if($message->c_diabetes=='3'){echo 'Selected';}?>>Insulin Dependent</option>
																<option value="4" <?php if($message->c_diabetes=='4'){echo 'Selected';}?>>Pre-Diabetic</option>
															</select>
														</div>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
								</fieldset>
								<script>
									$("#selectNEWBox3").change(function (){
										var value = this.value;
										if(value==1){
											$('#diabetes').show();
										}
										else {
											$('#diabetes').hide();
										}
									});
								</script>				
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">PCOS<span>*</span></label>
										<div class="col-lg-12">
											<select class="form-control required" name="pcos">
												<option value="">Select PCOS</option>
												<option value="1" <?php if($message->pcos==1){echo 'Selected';}?>>Yes</option>
												<option value="0" <?php if($message->pcos==0){echo 'Selected';}?>>No</option>
											</select>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Hypertension<span>*</span></label>
										<div class="col-lg-12">
											<select class="form-control required" name="hypertension">
												<option value="">Select Hypertension</option>
												<option value="1" <?php if($message->hypertension==1){echo 'Selected';}?>>Yes</option>
												<option value="0" <?php if($message->hypertension==0){echo 'Selected';}?>>No</option>
											</select>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Blood Pressure<span>*</span></label>
										<div class="col-lg-12">
											<select class="form-control required" name="BloodPressure">
												<option value="">Select Blood Pressure</option>
												<option value="1" <?php if($message->bp==1){echo 'Selected';}?>>Yes</option>
												<option value="0" <?php if($message->bp==0){echo 'Selected';}?>>No</option>
											</select>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Heart Alignment<span>*</span></label>
										<div class="col-lg-12">
											<select class="form-control required" name="heart_alignment">
												<option value="">Select Heart Alignment</option>
												<option value="1" <?php if($message->heart_ailment==1){echo 'Selected';}?>>Yes</option>
												<option value="0" <?php if($message->heart_ailment==0){echo 'Selected';}?>>No</option>
											</select>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Body Pains Any<span>*</span></label>
										<div class="col-lg-12">
											<input type="text" class="form-control tokenfield required" value="<?=$message->body_pain?>" name="body_pain" placeholder="Add Pains"  autocomplete="off">
								 
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="mb-3">
									<div class="form-group row">
										<label class="col-form-label">Add Medication Any<span>*</span></label>
										<div class="col-lg-12">
											<input type="text" class="form-control required" name="medication_any" value="<?=$message->medication_any?>" placeholder="Add Medication"  autocomplete="off">
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</fieldset>
					<h6>Explain</h6>
					<fieldset>
						<div class="row">
							<div class="col-md-4" style="padding: 10px;">
								<div class="form-check">
									<label class="form-check-label">
										<input type="checkbox" class="form-input-styled" name="measurement" value="9" data-fouc>Explain measurement Tab</label>
									</div>
							</div>
							<div class="col-md-4" style="padding: 10px;">
									<div class="form-check">
										<label class="form-check-label">
											<input type="checkbox" class="form-input-styled" name="about_diet" value="9" data-fouc>Discussion about diet type!</label>
										</div>
							</div>
							<div class="col-md-4" style="padding: 10px;">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-input-styled" name="pause_diet" value="9" data-fouc>Explain about Pause Diet and Profile Picture</label>
											</div>
							</div>
						</div>
						<br>
					</fieldset>
								<h6>Final</h6>
								<fieldset>
									<div class="row">
										<div class="col-md-4">
											<fieldset class="mb-3">
												<div class="form-group row">
													<label class="col-form-label">Number of meals to be suggested<span>*</span></label>
													<div class="col-lg-12">
														<input class="form-control required" type="text" maxlength="1" onkeypress="javascript:return isNumber(event)" name="no_of_meals" autocomplete="off">
													</div>
												</div>
											</fieldset>
										</div>
										<div class="col-md-4" >
											<fieldset class="mb-3">
												<div class="form-group row">
													<label class="col-form-label">Start Date<span>*</span></label>
													<div class="col-lg-12">
														<div class="input-group">
															<input type="text" id="meal_startdate" onchange="test()" class="form-control  pickadate required" value="<?=$message->meal_start_date?>" name="meal_startdate">
														</div>
														<!-- pickadate-accessibility -->
													</div>
												</div>
											</fieldset>
										</div>
										<div class="col-md-4">
											<fieldset class="mb-3">
												<div class="form-group row">
													<label class="col-form-label">End Date<span>*</span></label>
													<div class="col-lg-12">
														<div class="input-group">
															<input type="text" class="form-control pickadate-accessibility  pickadate-events required" value="<?=$message->meal_end_date?>" id="meal_enddate" name="meal_enddate">
														</div>
													</div>
												</div>
											</fieldset>
										</div>
										<input type="hidden" id="plan_days" value="<?=$message->plan_type?>">
									</div>	
									<div class="row">
										<div class="col-md-6">
											<fieldset class="mb-3">
												<div class="form-group row">
													<label class="col-form-label">Found us via</label>
													<div class="col-lg-12">
														<select class="form-control required" name="found_us">
															<option value="">Found us via</option>
															<option value="Facebook">Facebook</option>
															<option value="Instagram">Instagram</option>
															<option value="Reference">Reference</option>
															<option value="Google">Google</option>
															<option value="Yahoo">Yahoo</option>
															<option value="Search">Search</option>
															<option value="Ad">Ad</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<fieldset class="mb-3">
													<div class="form-group row">
														<label class="col-form-label">Upload of medical reports if any</label>
														<div class="col-lg-12">
															<input type="file" name="medical_report" class="form-control" multiple="" >
														</div>
													</div>
												</fieldset>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			function test(){
				var dates = new Date($("#meal_startdate").val());
				var date = convert(dates);
				date      = new Date(date);
				console.log(date);
 
				var plan = $("#plan_days").val();
				var days;
				if(plan==1){
					days = 15;
				}else if(plan ==2){
					days = 30;
				}
				var next_date = new Date(date.setDate(date.getDate() + days));
				var formatted = next_date.getUTCFullYear() + '-' + padNumber(next_date.getUTCMonth() + 1) + '-' + padNumber(next_date.getUTCDate())
				var days = 14;
				$("#meal_enddate").val(formatted);
			}

			// function test(){
			// 	console.log('new plan');
			// 	var plan = $("#plan_days").val();
			// 	console.log(plan);
			// 	// var days = 7;
			// 	if(plan==1){
			// 		var days = 15;
			// 	}else if(plan ==2){
			// 		var days = 30;
			// 	}

			// 	Date.prototype.addDays = function (days) {
			// 		let date = new Date(this.valueOf());
			// 		console.log(date);
			// 		date.setDate(date.getDate() + days);
			// 		return date;
			// 	}
			// 	let date = new Date();
			// 	console.log(date.addDays(days));

			// }
			function addhours(time,addhour){
				time = time.split(':');
				if(time[0]<= '21'){
					var hours = parseInt(time[0]) + addhour;
				}else{
					var hours = parseInt(time[0]);
				}
				if(hours<10){
					hours = 0+hours.toString();
				}
				var minutes = time[1];

				return hours+':'+minutes;

			}

			function padNumber(number) {
				var string  = '' + number;
				string      = string.length < 2 ? '0' + string : string;
				return string;
			}
			function convert(str) {
				var date = new Date(str),
				mnth = ("0" + (date.getMonth() + 1)).slice(-2),
				day = ("0" + date.getDate()).slice(-2);
				return [date.getFullYear(), mnth, day].join("-");
			}

			function check_brkfasttime(){
				  console.log($("#wakeuptime").val());
					console.log('brkfasttime'+ $("#breakfasttime").val());

				  if($("#breakfasttime").val() < $("#wakeuptime").val()){
						var text = 'Error..!';
						var message = 'Your Breakfast time should be Greater then your Wake Up time!';
						new Noty({
			                text: message,
			                type: 'warning',
			                timeout: 3000
			            }).show();
						$("#breakfasttime").val('');
					}else{
						var time =  $("#breakfasttime").val() ;
						time = addhours(time,2);
						$("#midmealtime").val(time);
					}
					
					
			}
 			function check_lunchtime(){
 				if($("#lunchtime").val() < $("#breakfasttime").val()){
					var text = 'Error..!';
						var message = 'Your Lunch time should be Greater then your Breakfast time!';
						new Noty({
			                text: message,
			                type: 'warning',
			                timeout: 3000
			            }).show();
					$("#lunchtime").val('');
				}else{
					var time =  $("#lunchtime").val() ;
						time = addhours(time,3);
						$("#eveningtime").val(time);
				}
 			}

 			function check_dinnertime(){
 			 // lunchtime   dinnertime  sleeptime 
 			 if($("#dinnertime").val() < $("#lunchtime").val()){
					var text = 'Error..!';
						var message = 'Your Dinner time should be Greater then your Lunch time!';
						new Noty({
			                text: message,
			                type: 'warning',
			                timeout: 3000
			            }).show();
					$("#lunch_time").val('');
				}  
 			}

 			function check_sleeptime(){
 				if($("#sleeptime").val() < $("#dinnertime").val()){
					var text = 'Error..!';
						var message = 'Your Sleeping time should be Greater then your Dinner time!';
						new Noty({
			                text: message,
			                type: 'warning',
			                timeout: 3000
			            }).show();
					$("#lunch_time").val('');
				}
 			
 			}
			function check(){
				alert('check success');
			}
		</script>
		<?php include 'footer.php';?>