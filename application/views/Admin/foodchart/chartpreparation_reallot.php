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
<!-- bmi calc -->
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

 

?>
<div class="content-wrapper">

	<!-- Page header -->
	<div class="page-header page-header-light">

		<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
			<div class="d-flex">
				<div class="breadcrumb">
					<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
					<!-- <a href="#" class="breadcrumb-item">Food</a> -->
					<span class="breadcrumb-item active">Reallot Previous Chart</span>
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
					<div class="form-group row">
						<label class="col-form-label">Recommended BMR</label>
						<div class="col-lg-12">
							<input type="text" class="form-control" id="bmr" name="bmr" value="<?=$BMR?>" readonly="true">
						</div> 
					</div>
					<div class="form-group row">
						<label class="col-form-label">Food Allergy </label>
						<div class="col-lg-12">
							<input type="text" class="form-control" name="bmr" value="<?=$message->food_allergy?>" readonly="true">
						</div>
						<label class="col-form-label">Usual Diet </label>
						<div class="col-lg-12">
							<input type="text" class="form-control"  name="usuall_diet" value="<?=$message->usuall_diet?>" readonly="true">
						</div>
						<label class="col-form-label">Additional info </label>
						<div class="col-lg-12">
							<input type="text" class="form-control"  name="additional_info" value="<?=$message->additional_info?>" readonly="true">
						</div>
						<label class="col-form-label">Plan Name</label>
						<div class="col-lg-12">
							<input type="text" class="form-control"  name="additional_info" value="<?=$message->plan_name.' '.$message->plan_amount?>" readonly="true">
						</div>
					</div>
			 
					<br><br><br>
								<!-- here i need to check two customer if one for i have to create and one from which i am copying -->
						<form action="<?=base_url('Admin/foodchart_view_reallot')?>" method="POST"  >
								<!-- <input type="hidden" name="chartid" value="1655381812"> -->
								<input type="hidden" name="cust_id" value="<?=$cust_id?>">
								<input type="hidden" name="from_cust_id" id="from_cust_id" value="">

								<?php  if(isset($renewchart) && $renewchart == 1) {?>
									<label class="col-form-label">Renew Chart :</label>
									<input type="hidden" name="renewchart" value="1" >
								<?php } ?>
								
								<div class="form-group row">

									<label class="col-form-label">Customer</label>
									<div class="col-lg-5">
										<select name="cust_id2" id="customerlist" class="form-control" onchange="getchartids(this)" >
											<option value="" >--SELECT--</option>
											<?php foreach($resclist as $d) {  ?>
												<option value="<?= $d->cid ?>"> <?=  $d->first_name.' '.$d->last_name;?></option>
											<?php } ?>
										</select>
									</div>
									<label class="col-form-label">All Customer</label>
									<div class="col-lg-5">
										<select name="cust_id3" id="allcustomerlist" class="form-control" onchange="getchartids(this)" >
											<option value="" >--SELECT--</option>
											<?php foreach($respUserlist as $all_user) {  ?>
												<option value="<?= $all_user->user_id ?>"> <?=  $all_user->fn.' '.$all_user->ln;?></option>
											<?php } ?>
										</select>
									</div>
												
								

								</div>
								<div class="form-group row">
								
									<label class="col-form-label">Chart id</label>
									<div class="col-lg-3">
										<select name="chartid" id="chartidlist"  class="form-control" required>

										</select>
									</div>
								</div>


								<br><br><br><br><br>
								<div class="form-group row">

									<label class="col-form-label">Additional info</label>
									<div class="col-lg-12">
										<input type="text" id="addtionalinfo" class="form-control" readonly>
									</div>
									<label class="col-form-label">Usual Diet</label>
									<div class="col-lg-12">
								 
										<textarea name="" id="usualdiet" cols="30" rows="5"  class="form-control" readonly></textarea>
									</div>
									<br><br>
									<label class="col-form-label">Food Alergy</label>
									<div class="col-lg-12">
										<input type="text" id="foodallergy" class="form-control" readonly>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-5">									</div>
									<div class="col-lg-4">									</div>
									<div class="col-lg-3">
										<input type="submit" name="submit" value="Show Chart" class="btn btn-primary">
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
			<?php $this->view('Admin/footer.php'); ; ?>
			<!-- /footer -->
		</div>
		<!-- /main content -->
	</div>
	<!-- /page content -->
</body>
</html>
 
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
  
		let addtionalinfo =  document.getElementById("addtionalinfo");
		let usualdiet =  document.getElementById("usualdiet");
		let foodallergy =  document.getElementById("foodallergy");
		let from_cust_id =  document.getElementById("from_cust_id");

		function getchartids(elem){
			let cid = elem.value;
			
			let chartidlist =  document.getElementById("chartidlist");
			if(cid != ""){
				console.log(cid);
				from_cust_id.value = cid;
				let url =  base_url+'Api/UserChartid_by_userid';
				let param = { cid: cid , field2 : "hello2"} ;
				let getresp = callajax(param, url);
				getresp = JSON.parse(getresp);
				console.log(getresp);

				let chistory =  getresp.charthistory;
				for (let i = 0; i < chistory.length; i++) {
					console.log(chistory[i] );
					// select.options.add(new Option('Text 1', chistory[i].meal_chart_id));
					chartidlist.innerHTML = '';
					var tdays =  chistory[i].days; 
					var tcalories =  chistory[i].calories; 
					chartidlist.options[chartidlist.options.length] = new Option(chistory[i].meal_chart_id+' ('+tdays+') Cal:'+tcalories ,  chistory[i].meal_chart_id );
					// chartidlist.append($("<option></option>").val("1").html("--Select--"));
				}

				let userdata =  getresp.userdata[0];
				usualdiet.innerHTML  = userdata.usuall_diet;
				foodallergy.value  = userdata.food_allergy;
				addtionalinfo.value  = userdata.additional_info;
				console.log(userdata);
			}else{
				chartidlist.innerHTML = '';
			}
		}
</script>