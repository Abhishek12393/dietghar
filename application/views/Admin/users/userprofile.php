<?php 
//include('header.php');
$this->load->view('Admin/header.php');
$this->load->view('Admin/sidebar.php');
// pr($message);die;
?>
 
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/ui/fullcalendar/core/main.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/ui/fullcalendar/daygrid/main.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/ui/fullcalendar/timegrid/main.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/ui/fullcalendar/interaction/main.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/visualization/echarts/echarts.min.js"></script>
	
	<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/timelines.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_charts/echarts/light/bars/tornado_negative_stack.js"></script>

	<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_charts/pages/timelines/light/daily_statistics.js"></script>
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
<!-- <script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/forms/styling/switchery.min.js"></script> -->
<style type="text/css">
	.sidebar-light .nav-sidebar .nav-link {
    color: #fff;
}
.sidebar-light {
    
    color: #fff;
    
}
</style>
<script type="text/javascript">
	
    $(document).ready(function() {
        $("#txtdob").keyup(function(event){
            if ($(this).val().length == 2 || $(this).val().length == 5){
                $(this).val($(this).val() + "/");
            }
        });
    });
</script>
 <script type="text/javascript">
 	 function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
 </script>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="user_pages_profile_tabbed.html" class="breadcrumb-item">User pages</a>
							<span class="breadcrumb-item active">Tabbed profile</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Inner container -->
				<div class="d-md-flex align-items-md-start">

					<!-- Left sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">

							<!-- Navigation -->
							<div class="card">
								<div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url(<?php echo base_url(); ?>admin/global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
									<div class="card-img-actions d-inline-block ">
										<img class="img-fluid rounded-circle" src="<?php echo $pimage;?>" width="170" height="170" alt="">
										<div class="card-img-actions-overlay rounded-circle">
											<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
												<i class="icon-plus3"></i>
											</a>
											<a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
												<i class="icon-link"></i>
											</a>
										</div>
									</div>

						    		<h6 class="font-weight-semibold mb-0"><?=$message->first_name." ".$message->last_name ?></h6>
						    		<?php if($role !=1) { ?><span class="d-block opacity-75"><?=$message->mobile_no?></span><?php } ?>

					    			<div class="list-icons list-icons-extended mt-3">
				                    	<h6><?="$plan_name"; ?></h6>
			                    	</div>
						    	</div>

								<div class="card-body p-0">
									<ul class="nav nav-sidebar  ">
										
										<li class="nav-item">
											<!-- <a href="#profile" class="nav-link active" data-toggle="tab">
												<i class="icon-user"></i>
												 My profile
											</a> -->
										</li>
										<li class="nav-item">
											<!-- <a href="#schedule" class="nav-link" data-toggle="tab">
												<i class="icon-calendar3"></i>
												Schedule
												<span class="font-size-sm font-weight-normal opacity-75 ml-auto">02:56pm</span>
											</a> -->
										</li>
										
										<li class="nav-item">
											<!-- <a href="#orders" class="nav-link" data-toggle="tab">
												<i class="fa fa-comment"></i>
												Chat
												
											</a> -->
										</li>
										
										<li class="nav-item">
											<!-- <a href="login_advanced.html" class="nav-link" data-toggle="tab">
												<i class="icon-switch2"></i>
												Tools
											</a> -->
										</li>
									</ul>
								</div>
							</div>
							<!-- /navigation -->

							<!-- Latest updates -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="card-title font-weight-semibold" style="color: #fff;">Latest updates</span>
									
								</div>

								<div class="card-body">
									<ul class="media-list">
										<li class="media">
											<div class="media-body">
												<p><b>Start Weight(in kgs) : </b><span style="float: right;" id="initialkg"> 0</span></p>
											</div>
										</li>

										<li class="media">
											<div class="media-body">
												<p><b>Current Weight(in kgs) : </b> <span style="float: right;"id="currentkg"> 0</span></p>
											</div>
										</li>

										<li class="media">
											<div class="media-body">
												<p><b>Lost Weight(in kgs) : </b> <span style="float: right;"id="totalkgloss"> 0</span></p>
											</div>
										</li>

										<li class="media">
											<div class="media-body">
												<p><b>Total Inch Loss (in Inches) : </b> <span style="float: right;"id="totalinchloss"> 0</span></p>
											</div>
										</li>

										<li class="media">
											<div class="media-body">
												<p><b>Current Day : </b> <span style="float: right;" id="currentDay"> 0</span></p>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- /latest updates -->
							
							
							<!-- Messages -->
						<div class="timeline-row">
							<div class="timeline-icon">
								<div class="bg-info-400">
									<i class="icon-comment-discussion"></i>
								</div>
							</div>

							<div class="card">
								<div class="card-header header-elements-inline">
									<h6 class="card-title">Notes</h6>
									
								</div>

								<div class="card-body">
									<ul class="media-list media-chat media-chat-scrollable mb-3" id="notesList">
										<!-- <li class="media content-divider justify-content-center text-muted mx-0">Today</li> -->
										<!-- <li class="media media-chat-item-reverse">
											<div class="media-body">
												<div class="media-chat-item">Note 3</div>
												<div class="font-size-sm text-muted mt-2">2 hours ago <a href="#"><i class="icon-pin-alt ml-2 text-muted"></i></a></div>
											</div>
										</li> --> 
									</ul>
									<textarea name="enter-message" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..." id="saveNotesText"></textarea>

			                    	<div class="d-flex align-items-center">
			                    		<div class="list-icons list-icons-extended">
			                                <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="Send photo"><i class="icon-file-picture"></i></a>
			                            	<a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="Send video"><i class="icon-file-video"></i></a>
			                                <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body" title="Send file"><i class="icon-file-plus"></i></a>
			                    		</div>

			                    		<button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-auto" onclick="saveNote()"><b><i class="icon-paperplane"></i></b> Send</button>
			                    	</div>
								</div>
							</div>
						</div>
						<!-- /messages -->
 
						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /left sidebar component -->

<?php 
$birth_date     = new DateTime($message->dob);
$current_date   = new DateTime();
$diff           = $birth_date->diff($current_date);
$age = $diff->y;

/*  Calculation for bmi and bmr  */

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

/*  Calculation for bmi and bmr ends */
?>
					<!-- Right content -->
					<div class="tab-content w-100">
						<form method="post" action="<?=base_url('Admin/test_edit')?>">
						<div class="tab-pane fade active show" id="profile">
							<!-- <input type="text" name="search" class="form-control allow_edit">
							<input type="button" name="Search" class="btn btn-success"> -->
							<!-- Profile info -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Profile information</h5>
									<div class="header-elements">
										<?php if($role != 1) { ?>
										<span><button type="button" onclick="allow_edit()" class="btn btn-success">Edit</button></span>
										<?php } ?>
									</div>
								</div>
								<!-- <button onclick="allow_edit()">Edit</button> -->
								
								<div class="card-body">
								
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Name</label>
													<input type="text" readonly name="name" value="<?=$message->first_name ?>" class="form-control allow_edit" autocomplete="off">
												</div>
												<?php if($role !=1) { ?>
												<div class="col-md-6">
													<label>Mobile</label>
													<input type="text" readonly onkeypress="javascript:return isNumber(event)" maxlength="10" value="<?=$message->mobile_no?>" name="umobile" autocomplete="off" class="form-control allow_edit">
												</div>
												<?php } ?>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Full name</label>
													<input type="text" readonly name="fullname" value="<?=$message->first_name." ".$message->last_name?>" autocomplete="off" class="form-control allow_edit">
												</div>
												<div class="col-md-6">
													<label>Gender</label>
													<select class="form-control allow_edit" name="gender">
														<option value="1" <?php if($message->gender==1){echo 'Selected';}?>>Male</option>
														<option value="2" <?php if($message->gender==2){echo 'Selected';}?>>Female</option>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Date Of Birth</label>
													<input type="text" readonly onkeypress="javascript:return isNumber(event)" maxlength="10" id="txtdob" name="dob" autocomplete="off"  value="<?=$message->dob?>" class="form-control allow_edit">
													<span><label></label><?= dobToDate($message->dob , 'admin');?></span>
												</div>
												<div class="col-md-6">
													<label>Blood Group</label>
													<select class="form-control allow_edit" name="bloodgroup">
														<option value="A+">A+</option>
														<option value="A+">A-</option>
														<option value="B+">B+</option>
														<option value="B-">B-</option>
														<option value="AB+">AB+</option>
														<option value="AB-">AB-</option>
														<option value="O+">O+</option>
														<option value="O-">O-</option>
													</select>
												</div>
											</div>
										</div>
										<?php if($role !=1) { ?>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Address</label>
													<input type="text" readonly name="address"  value="<?=$message->house_no.", ".$message->address?>" autocomplete="off" class="form-control allow_edit">
												</div>
												<div class="col-md-6">
													<label>City</label>
													<input type="text" readonly name="city" value="<?=$message->city?>" autocomplete="off" class="form-control allow_edit">
												</div>
												
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>State</label>
													<input type="text" readonly value="<?=$message->state?>" name="state" autocomplete="off" class="form-control allow_edit">
												</div>
												<div class="col-md-6">
													<label>Pin code</label>
													<input type="text" readonly value="<?=$message->pincode?>" name="pincode" autocomplete="off" class="form-control allow_edit">
												</div>
											</div>
										</div>
										<?php } ; ?>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<fieldset class="mb-3">
														<div class="form-group row">
														<label class="col-form-label">Occupation<span>*</span></label>
															<div class="col-lg-12">
																<select class="form-control" name="occupation" id="selectNEWBox">
																	<option value="1" <?php if($message->occupation==1){echo 'Selected';}?>>Housewife</option>
																	<option value="2" <?php if($message->occupation==2){echo 'Selected';}?>>Working Women</option>
																	<option value="3" <?php if($message->occupation==3){echo 'Selected';}?>>Late Night Shift</option>
																	<option value="4" <?php if($message->occupation==4){echo 'Selected';}?>>Others</option>
																</select>
															</div>
														</div>
													</fieldset>
												</div>
							
											<div class="col-md-6" style="display: none;" id="occ">
												<fieldset class="mb-3">
													<div class="form-group row">
													<label class="col-form-label">Add Occupation<span>*</span></label>
														<div class="col-lg-12">
															<!-- <input type="text" name="occupation" class="form-control allow_edit" required="" autocomplete="off"> -->
														</div>
													</div>
											</fieldset>
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
									
								</div>
							</div>
							<!-- /profile info -->

							<!-- Account settings -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Body Related</h5>
									
								</div>

								<div class="card-body">
									
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Age</label>
													<input type="text" readonly name="age" value="<?=$diff->y?>" class="form-control allow_edit" autocomplete="off">
												</div>

												<div class="col-md-4">
													<label>Height </label>
													<input type="text" readonly name="height" id="height" value="<?=$message->height?>" class="form-control allow_edit" autocomplete="off">
												</div>
												<div class="col-md-2">
													<label >Ft.In & cms &nbsp;&nbsp;&nbsp;</label>
														<input type="checkbox" id="toggle-two">
													</div>
												</div>
											</div>
										<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Cms',
      off: 'Ft. In'
    });
  })
</script>

										<div class="form-group">
											<div class="row">
												<div class="col-md-4">
													<label>Weight</label>
													<input type="text" readonly name="weight" id="weight" value="<?=$message->weight?>" class="form-control allow_edit" autocomplete="off">
												</div>
												<div class="col-md-2">
													<label >Lbs/Kgs &nbsp;&nbsp;&nbsp;&nbsp;</label>
													<input type="checkbox"  id="toggle-two1">
												</div>
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
												<div class="col-md-6">
													<label>BMI</label>
													<input type="text" readonly name="bmi" value="<?=$Bmi?>" class="form-control allow_edit" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>BMR</label>
													<input type="text" readonly name="bmr" value="<?=$BMR?>" class="form-control allow_edit" autocomplete="off">
												</div>

												<div class="col-md-6">
													<label>WHR</label>
													<input type="text" readonly autocomplete="off" name="whr" value="<?=$message->whr?>" class="form-control allow_edit">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Highest weight ever recorded</label>
													<input type="text" readonly name="highest_weight" value="<?=$message->heighest_weight_ever ?>" class="form-control allow_edit" autocomplete="off">
												</div>

											</div>
										</div>
				                       
			                        
								</div>
							</div>
							<!-- /account settings -->
							<!-- Account settings -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Measurements</h5>
									<div class="header-elements">
										<span><button type="button" class="btn bg-success" data-toggle="modal" data-target="#modal_theme_success">History </button></span>

									
				                	</div>
								</div>

								<div class="card-body">
								
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Chest/Bust </label>
													<input type="text" readonly name="chest" class="form-control allow_edit" value="<?=$message->chest?>" autocomplete="off">
												</div>

												<div class="col-md-6">
													<label>Waist </label>
													<input type="text" readonly name="waist" class="form-control allow_edit" value="<?=$message->Waist?>" autocomplete="off">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Hips</label>
													<input type="text" readonly name="hips" class="form-control allow_edit" value="<?=$message->hip?>" autocomplete="off">
												</div>

												<div class="col-md-6">
													<label>Thighs</label>
													<input type="text" readonly name="thighs" class="form-control allow_edit" value="<?=$message->thigh?>" autocomplete="off">
												</div>
											</div>
										</div>
										<input type="hidden" name="cust_id" value="<?php echo $message->id?>">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Calves</label>
													<input type="text" readonly name="calves" value="<?=$message->calves?>" class="form-control allow_edit" autocomplete="off">
												</div>

												<div class="col-md-6">
													<label>Biceps</label>
													<input type="text" readonly name="biceps" value="<?=$message->biceps?>" class="form-control allow_edit" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Wrist</label>
													<input type="text" readonly name="wrist" value="<?=$message->wrist?>" class="form-control allow_edit" autocomplete="off">
												</div>

											</div>
										</div>

				                        
			                       
								</div>
							</div>
							<!-- /account settings -->
							<!-- Account settings -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title"><!-- Lifestyle --> Information</h5>
									
								</div>

								<div class="card-body">
									
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Lifestyle </label>
													<select class="form-control allow_edit">
														<option>Select Lifestyle</option>
														<option value="I Barely Move" <?php if($message->lifestyle=='I Barely Move'){echo "Selected";} ?>>I Barely Move</option>
														<option value="Not That Active" <?php if($message->lifestyle=='Not That Active'){echo "Selected";} ?> >Not That Active</option>
														<option value="Moderately Active" <?php if($message->lifestyle=='Moderately Active'){echo "Selected";} ?>>Moderately Active</option>
														<option value="Very Active" <?php if($message->lifestyle=='Very Active'){echo "Selected";} ?>>Very Active</option>
													</select>
												</div>

												<div class="col-md-6">
													<label>WakeUp Time </label>
													<input type="text" readonly name="wakeup" value="<?=date('h:i A',strtotime($message->wakeup_time))?>" class="form-control allow_edit" autocomplete="off">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Breakfast Time</label>
													<input type="text" readonly name="breakfast" value="<?=date('h:i A',strtotime($message->breakfast_time))?>" class="form-control allow_edit" autocomplete="off">
												</div>

												<div class="col-md-6">
													<label>Lunch Time</label>
													<input type="text" readonly name="lunch" value="<?=date('h:i A',strtotime($message->lunch_time))?>" class="form-control allow_edit" autocomplete="off">
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Dinner Time</label>
													<input type="text" readonly name="dinner" value="<?=date('h:i A',strtotime($message->dinner_time))?>" class="form-control allow_edit" autocomplete="off">
												</div>
												<div class="col-md-6">
													<label>Sleep Time</label>
													<input type="text" readonly name="sleep" value="<?=date('h:i A',strtotime($message->sleep_time))?>" class="form-control allow_edit" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Married</label>
													<select class="form-control allow_edit">
														<option value="1" <?php if($message->married==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->married==0){echo "Selected";} ?>>No</option>
														
													</select>
												</div>
												<div class="col-md-6">
													<label>Pregnant </label>
													<select class="form-control allow_edit">
														<option value="1" <?php if($message->pregnant==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->pregnant==0){echo "Selected";} ?>>No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Kids</label>
													<select class="form-control allow_edit" id="kids">
														<option value="1" <?php if($message->have_kids==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->have_kids==0){echo "Selected";} ?>>No</option>
													</select>
													<div style="display: none;" id="kid">
													<label>How Many Kids you have? </label>
													<input type="text" readonly onkeypress="javascript:return isNumber(event)" maxlength="1" name="kids" value="<?=$message->no_kids?>"  class="form-control allow_edit" autocomplete="off">
												</div>
												</div>
												<script>
										    $("#kids").change(function (){
										        var value = this.value;
										        if(value=='Yes'){
										            $('#kid').show();
										        }
										        else {
										            $('#kid').hide();
										        }
										    });
									</script>
												<div class="col-md-6">
													<label>Child below 12 Months of Age</label>
													<select class="form-control allow_edit">
														<option value="1" <?php if($message->kids_below_12_month==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->kids_below_12_month==0){echo "Selected";} ?>>No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												
												<div class="col-md-6">
													<label>Looking to conceive in Near Future  </label>
													<select class="form-control allow_edit" name="near_future">
														<option value="1" <?php if($message->looking_to_conceive==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->looking_to_conceive==0){echo "Selected";} ?>>No</option>
													</select>
												</div>
												<div class="col-md-6">
							
								<label>Food Likings Any<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" readonly class="form-control allow_edit tokenfield" name="food_allergies" value="<?=$message->food_liking?>" placeholder="Add Likings" value="" autocomplete="off" data-fouc>
									</div>
									
								
						</div>
											</div>
										</div>
				                       <div class="form-group">
				                       	<div class="row">
									<div class="col-md-12">
										<label>Whats your Daily diet like in terms of meals and Quantity u take in them? (Usual Day’s Diet)<span>*</span></label>
										<div class="col-lg-12">
											<textarea class="form-control" value="<?=$message->usuall_diet?>" name="daydiet" rows="2"><?=$message->usuall_diet?></textarea>
										</div>
									</div>
								</div>
							</div>
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
							<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Any Previous Diet followed?</label>
													<select class="form-control allow_edit" id="selectNEWBox1" name="previous_diet">
														<option value="1" <?php if($message->any_prevous_diet_followed==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->any_prevous_diet_followed==0){echo "Selected";} ?>>No</option>
													</select>
												</div>
												<script type="text/javascript">
										$("#selectNEWBox1").change(function (){
 						       var value = this.value;
 						       if(value=='Yes'){
           							$('#previous').show();
 						       }
 						       else {
 						           $('#previous').hide();
 						       }
   							 });
									</script>
												<div class="col-md-6" style="display: none;" id="previous">
													<label>Previous Diet<span>*</span></label>
														<textarea value="<?=$message->previous_diet?>" class="form-control" name="previous_diet_yes allow_edit" rows="2"></textarea>
												</div>
							</div>
						</div>
						 <div class="form-group">
											<div class="row">
								<label>Food Allergy Any<span>*</span></label>
									<div class="col-lg-12">
										<input type="text" value="<?=$message->food_allergy?>" readonly class="form-control allow_edit tokenfield" name="food_allergies" placeholder="Add Allergy" value="" autocomplete="off" data-fouc>
									</div>
								</div>
							</div>
							<?php if($role !=1) { ?>
									<div class="form-group">
											<div class="row"> 
												<div class="col-md-6">
													<label>Start Date</label>
													<input type="text" value="<?=$message->meal_start_date?>" class="form-control allow_edit pickadate-accessibility" name="startdate">
												</div>
												<div class="col-md-6">
													<label>End Date</label>
													<input type="text" value="<?=$message->meal_end_date?>" class="form-control allow_edit pickadate-accessibility" name="enddate">
												</div>
											</div>
									</div>	
							<?php } ?>
								<div class="form-group">
											<div class="row">
										<div class="col-md-6">
											<label>No. of Meals</label>
											<input type="text" readonly value="<?=$message->num_of_meal_suggested?>" class="form-control allow_edit" name="noofmeals">
										</div>
										<div class="col-md-6">
											<label>Eat out in a week</label>
											<input type="text" value="<?=$message->how_many_times_eat_in_week?>" readonly class="form-control allow_edit" name="eatout">
										</div>
										
						</div>
							</div>
			                       
								</div>
							</div>
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Workout</h5>
								</div>

								<div class="card-body">
									
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Workout Selection</label>
													<select class="form-control allow_edit" name="selection">
														<option value="I am Super Lazy" <?php if($message->workout_follow=='I am Super Lazy'){echo "Selected";} ?>>I am Super Lazy</option>
														<option value="At home" <?php if($message->workout_follow=='At home'){echo "Selected";} ?>>At home</option>
														<option value="At Gym" <?php if($message->workout_follow=='At Gym'){echo "Selected";} ?>>At Gym</option>
														
													</select>
												</div>
												<div class="col-md-6">
													<label>Workout Routine</label>
													<select class="form-control allow_edit" name="routine" id="selectNEWBox">
														<option>Select Workout Routine</option>
														<option value="Morning">Morning</option>
														<option value="Evening">Evening</option>
														<option value="No Workout">No Workout</option>
														<option value="Home Workout">Home Workout</option>
														<option value="Jogging">Jogging</option>
														<option value="Brisk Walking">Brisk Walking</option>
														<option value="Walk">Walk</option>
														<option value="Other">Other</option>
													</select>
												</div>
										</div>
									</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Pain Management</label>
													<input type="text" value="<?=$message->body_pain?>" readonly name="pain" class="form-control allow_edit tokenfield" autocomplete="off" data-fouc>
												</div>
												<div class="col-md-6" style="display: none;" id="routine">
													<label>Add Workout Routine<span>*</span></label>
									
										<!-- <input type="text" readonly name="workout_routine" class="form-control allow_edit" required="" autocomplete="off">
									 --></div>
									<script>
										    $("#selectNEWBox").change(function (){
										        var value = this.value;
										        if(value=='Other'){
										            $('#routine').show();
										        }
										        else {
										            $('#routine').hide();
										        }
										    });
									</script>
												</div>
											</div>
										
										
			                      
								</div>
							</div>
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Medical Information</h5>
									
								</div>

								<div class="card-body">
									
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Thyroid</label>
													<select class="form-control allow_edit" name="thyroid" id="thyroid">
														<option value="1" <?php if($message->is_thyroid==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->is_thyroid==0){echo "Selected";} ?>>No</option>
													</select>
													<div id="sel_thyroid" style="display: none;">
													<label>Select Thyroid</label>
													<select class="form-control allow_edit" >
															<option value="Hyperthyroidism" <?php if($message->thyroid=='Hyperthyroidism'){echo "Selected";} ?>>Hyperthyroidism</option>
														<option value="Hypothyroidism" <?php if($message->thyroid=='Hypothyroidism'){echo "Selected";} ?>>Hypothyroidism</option>
													
													</select>
												</div>
													<script>
										    $("#thyroid").change(function (){
										        var value = this.value;
										        if(value=='1'){
										            $('#sel_thyroid').show();
										        }
										        else {
										            $('#sel_thyroid').hide();
										        }
										    });
									</script>
												</div>

												<div class="col-md-6">
													<label>Diabetes</label>
													<select class="form-control allow_edit" name="diabetes" id="diabetes">
														<option value="1" <?php if($message->is_diabetes==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->is_diabetes==0){echo "Selected";} ?>>No</option>
													</select>
													<div id="sel_diabetes" style="display: none;">
													<label>Select Diabetes</label>
													<select class="form-control allow_edit" >
														<option value="Dieabetes Type 1" <?php if($message->diabetes=='Dieabetes Type 1'){echo "Selected";} ?>>Dieabetes Type 1</option>
														<option value="Dieabetes Type 2" <?php if($message->diabetes=='Dieabetes Type 2'){echo "Selected";} ?>>Dieabetes Type 2</option>
														<option value="Insulin Dependent" <?php if($message->diabetes=='Insulin Dependent'){echo "Selected";} ?>>Insulin Dependent</option>
														<option value="Pre-Diabetic" <?php if($message->diabetes=='Pre-Diabetic'){echo "Selected";} ?>>Pre-Diabetic</option>
													
													</select>
												</div>
													<script>
										    $("#diabetes").change(function (){
										        var value = this.value;
										        if(value=='1'){
										            $('#sel_diabetes').show();
										        }
										        else {
										            $('#sel_diabetes').hide();
										        }
										    });
									</script>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Heart Ailment</label>
													<select class="form-control allow_edit" name="heart">
														<option value="1" <?php if($message->heart_ailment==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->heart_ailment==0){echo "Selected";} ?>>No</option>
													</select>
												</div>

												<div class="col-md-6">
													<label>Blood Pressure</label>
													<select class="form-control allow_edit" name="bp">
														<option value="1" <?php if($message->bp==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->bp==0){echo "Selected";} ?>>No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>PCOS/PCOD</label>
													<select class="form-control allow_edit" name="pcos">
														<option value="1" <?php if($message->pcos==1){echo "Selected";} ?>>Yes</option>
														<option value="0" <?php if($message->pcos==0){echo "Selected";} ?>>No</option>
													</select>
												</div>
												<div class="col-md-6">
													<label>Any other Information</label>
													<input type="text" value="<?=$message->additional_info?>" readonly class="form-control allow_edit" name="other_information" autocomplete="off">
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label>Medication (if Any)</label>
													<textarea readonly class="form-control allow_edit" name="medication"><?=$message->medication_any?></textarea>
												</div>

												
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label>Medical reports </label><br>
													<button class="btn btn-primary">View</button>&nbsp;&nbsp;&nbsp;
													<a class="btn btn-primary" onclick="medical();">Upload</a>
												</div>
												<script type="text/javascript">
													 function medical() {
      													$('#medicalreport').show();
          											}
												</script>
											</div><br>
											<div class="row">
												<div  style="display: none;" id="medicalreport">
													<label>Upload Medical Report</label>
													<input type="file" name="medi_report" class="form-control">
												</div>
											</div>
										</div>
				                        <div class="text-right">
				                        	<button type="submit" id="sub" style="display: none" class="btn btn-primary">Save changes</button>
				                        </div>
			                       
								</div>
							</div>
							
							<!-- /account settings -->
							<!-- Messages -->
							
								</form>
					    </div>

 


 
					</div>
					<!-- /right content -->

				</div>
				<!-- /inner container -->

			</div>
			<!-- Success modal -->
				<div id="modal_theme_success" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h6 class="modal-title">Measurements History</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Date</th>
									<th>Chest/Bust</th>
									<th>Waist</th>
									<th>Hips</th>
									<th>Thighs</th>
									<th>Weight</th>
									<th>Neck</th>
									<th>Arm</th>
								</tr>
							</thead>
							<tbody>
								<?php rsort($measurement_history);
								foreach ($measurement_history as $key => $measure) {
									
								 ?>
								<tr>
									<td><?=$measure['c_date']?></td>
									<td><?=$measure['chest']?></td>
									<td><?=$measure['waist']?></td>
									<td><?=$measure['hips']?></td>
									<td><?=$measure['thighs']?></td>
									<td><?=$measure['weight']?></td>
									<td><?=$measure['neck']?></td>
									<td><?=$measure['arm']?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					
				</div>
			</div>
		</div>
	</div>
	<!-- /success modal -->
			<!-- /content area -->
<?php  $this->load->view('Admin/footer.php');?>
<script type="text/javascript">
function allow_edit(){

		$('.allow_edit').attr("readonly", false); 
		$("#sub").show()
	}
</script>
<script>
	// let token = <?=$_SESSION['Token'];?>;
	let ul  = document.getElementById('notesList');
	var li = document.createElement("li");
	
	document.addEventListener('DOMContentLoaded', function() {
		console.clear();
		readNote();
		getLatestupdate();

	}, false);
	function getLatestupdate(){
		let initialkg = document.getElementById('initialkg');
		document.getElementById('currentkg');
		document.getElementById('totalkgloss');
		document.getElementById('totalinchloss');
		document.getElementById('currentDay');
		let param = {'user':'<?=$user;?>'};

		resp = callajax(param,base_url+'Admin/getLatestUpdate');
		console.log(resp);
		console.log(JSON.parse(resp));
		data = JSON.parse(resp);
	 
		document.getElementById('initialkg').innerHTML = data.st_weight;
		document.getElementById('currentkg').innerHTML = data.ct_weight;
		document.getElementById('totalkgloss').innerHTML = data.totkgloss;
		document.getElementById('totalinchloss').innerHTML = data.tot_inches;
		document.getElementById('currentDay').innerHTML = data.currentday;
	}

	function readNote(){
		
		let param = {'user':'<?=$user;?>'};
		resp = callajax(param,base_url+'Admin/notes_read');
		var notes = JSON.parse(resp);
		console.log(notes);
		for (let i = 0; i < notes.length; i++) {
				console.log(notes[i].message);
				document.querySelector("#notesList").innerHTML += 
				`<li class="media media-chat-item-reverse">
				<div class="media-body">
				<div class="media-chat-item">`+notes[i].message+`</div>
				<div class="font-size-sm text-muted mt-2">`+notes[i].time+`
					<a href="#"> <i class="icon-pin-alt ml-2 text-muted"></i></a>
				</div>
				</div>
				</li>` 
			}
	}
	function saveNote(){
		console.clear();
		let ta  = document.getElementById('saveNotesText');
		let param = {'user':'<?=$user;?>','message':ta.value};
		resp = callajax(param,base_url+'Admin/notes_update');
		if(resp==1){
			document.querySelector("#notesList").innerHTML += 
				`<li class="media media-chat-item-reverse">
				<div class="media-body">
				<div class="media-chat-item">`+ta.value+`</div>
				<div class="font-size-sm text-muted mt-2">now
					<a href="#"> <i class="icon-pin-alt ml-2 text-muted"></i></a>
				</div>
				</div>
				</li>`
				ta.value= '';
		}
	}

</script>