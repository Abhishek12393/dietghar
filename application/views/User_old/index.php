<?php 
include('header.php');
echo "<style type='text/css'>.wrapper .sidebar ul li:nth-child(1) {border-right: 5px solid #667acd !important;border-radius: 5px;}</style>";
?>
<?php include('sidebar.php'); ?>
<div class="container p-viewport-devices">
<div class="row" id="main_card">
<?php 
$message = $this->Dietmodel->Userdatadetails($_SESSION['id']);
$renew = $this->Dietmodel->reminder_payment();

if($message->measurment_done=='N'){
?>
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-sm-2 col-12">
<div class="container-fluid card-1">
<?php
if($message->gender==1 ){ ?>
<div class="card shadow p-3"><a href="<?=base_url('User/male_measurement')?>">
<?php }else{ ?>
<div class="card shadow p-3"><a href="<?=base_url('User/female_measurement')?>">
<?php } ?>
<div class="row">
<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 align-self-center text-right">
<img class="w-h" src="<?php echo base_url(); ?>user/new_assets/img/dashboard/dashboar_new/caution.png">
</div>
<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-8 align-self-baseline">
<h6 class="pt-2">Update Measurements</h6>
<p class="text-secondary">Last Updates 20 March, 2020</p>
</div>
<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 align-self-center">
<img class="w-h2" src="<?php echo base_url(); ?>user/new_assets/img/dashboard/dashboar_new/left-arrow.png">
</div>
</div>
</a>
</div>
</div>
</div>
<?php } ?>
<?php
if($renew){
?>
<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-md-2 mt-sm-2 col-12">
<div class="container-fluid card-2">
<div class="card shadow p-3">
<div class="row">
<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 align-self-center text-right">
<img class="w-h" src="<?php echo base_url(); ?>user/new_assets/img/dashboard/dashboar_new/reminder.png">
</div>
<div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7 align-self-baseline">
<h6 class="pt-2">Payment Reminder</h6>
<p class="text-secondary">Plan Expires on <?=date('M-d,Y', strtotime($renew->reminder_date. ' + 3 days'));?></p>
</div>
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 align-self-center">
<form method="post" action="<?=base_url('User/paytm')?>">
<input type="hidden" name="amount" value = "599">
<input type="submit" class="btn btn-danger" value="Renew Now">
</form>
<!-- <a href="#" class="btn btn-danger">Renew Now</a> -->
</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<h6 class="custom_yourprojects mt-lg-4 mt-md-4 mt-xl-4 mt-sm-4">Your Progress</h6>
<div class="row mt-lg-1 ml-lg-3 mt-md-1 mt-sm-0 " id="chart_card">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 p-1 col-12">
<div class="content">
<p>Weight Loss</p>
<div class="wrapper shadow_custom">
<canvas id="myChart-1"></canvas>
</div>
</div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 p-1 col-12">
<div class="content">
<div class="wrapper shadow_custom">
<p>Inch Loss</p>
<canvas id="myChart-2"></canvas>
</div>
</div>
</div>
</div>
<div class="container" id="carousal_cards">
<div class="row mt-2">
<div class="col-lg-8 col-md-12 col-sm-12 pr-0 p-0 col-12">
<h6 class="custom_yourprojects mt-md-4 ml-sm-0">Your Diet</h6>
<div class="container-fluid">
<div class="row owl-carousel owl-theme">
<div class="col-lg-6 col-md-6">
<div class="card rounded-0" style="width:220px; height: 260px;">
<img class="card-img-top p-2" src="<?php echo base_url(); ?>user/new_assets/img/dashboard/dashboar_new/owl-1.png" style="width:100%">
<div class="card-body ml-1 mr-1">
<h4 class="card-title">Soup with Veggies</h4><p class="card-text">Breakfast<br> 09:00 - 10:00 AM</p>
</div>
<img class="card-img-top p-2" src="<?php echo base_url(); ?>user/new_assets/img/dashboard/dashboar_new/owl-1.png" style="width:100%">
<div class="card-body ml-1 mr-1">
<h4 class="card-title">Soup with Veggies</h4>
<p class="card-text">Breakfast<br> 09:00 - 10:00 AM</p>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="card rounded-0" style="width:220px; height: 260px;">
<img class="card-img-top p-2" src="<?php echo base_url(); ?>user/new_assets/img/dashboard/dashboar_new/owl-2.png" style="width:100%">
<div class="card-body">
<h4 class="card-title">Indian Thali</h4><p class="card-text">Lunch<br> 12:00 - 01:00 PM</p>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="card rounded-0" style="width:220px; height: 260px;">
<img class="card-img-top p-2" src="<?php echo base_url(); ?>user/new_assets/img/dashboard/dashboar_new/owl-3.png" style="width:100%">
<div class="card-body">
<h4 class="card-title">Noodles with Egg</h4><p class="card-text">Snacks<br> 05:00 - 06:00 PM</p>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="card rounded-0" style="width:220px; height: 260px;">
<img class="card-img-top p-2" src="<?php echo base_url(); ?>user/new_assets/img/dashboard/dashboar_new/owl-4.png" style="width:100%">
<div class="card-body">
<h4 class="card-title">Soup with Veggies</h4><p class="card-text">Breakfast<br> 09:00 - 10:00 AM</p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-12 col-12 p-0">
<h6 class="custom_yourprojects ml-0 mt-md-5 mt-sm-3">Your Exercise</h6>
<div class="containet-fluid pt-2 bg-white shadow" id="exercises_container">
<div class="row"><p class="ml-4">* Your exercises will be updated daily</p></div>
<div class="row p-2">
<div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
<img src="<?php echo base_url(); ?>user/new_assets//img/dashboard/dashboar_new/yoga_sm.png">
<h6>Yoga</h6><p>30-40 Mins</p>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
<img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/dashboar_new/leg_sm.png">
<h6>Yoga</h6><p>20 - 30 Reps</p>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
<img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/dashboar_new/squat_sm.png">
<h6>Yoga</h6><p>30 - 40 Reps</p>
</div>
</div>
</div>
</div>
</div>
</div>
 </div>   
<?php include 'footer.php';?>
<script type="text/javascript">
let myChart_1 = document.getElementById('myChart-1').getContext('2d');
let myChart_2 = document.getElementById('myChart-2').getContext('2d');
// Global Options
Chart.defaults.global.defaultFontSize = 11;
Chart.defaults.global.defaultFontColor = '#666';
Chart.defaults.global.defaultFontWeight = '100';
Chart.defaults.showLines = false;
Chart.defaults.global.defaultFontStyle = 'bolder';
Chart.scaleService.updateScaleDefaults('linear', {ticks: {min:0}}); 
<?php foreach($graph as $val){ 
$lab [] = date('d-M-Y', strtotime($val['c_date']));
$weight [] = $val['weight'];
?>
<?php }
?>
let massPopChart_1 = new Chart(myChart_1, {
type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
data:{
labels:[<?php foreach($lab as $v ){ ?>'<?=$v?>',<?php } ?>],
datasets:[{
label:'KG.',
data:[<?php foreach($weight as $v ){ ?>'<?=$v?>',<?php } ?>],
borderWidth:1,
borderColor:'#faf7f5',
hoverBorderWidth:1,
backgroundColor: '#FF1493',
hoverBackgroundColor: '#69B0EE',
hoverBorderColor:'#274A7A',
//Now for lane:
lineTension: 0,showLines: false,fill: false}]
},
options:{
title:{display:false, text:'weight Loss -1',fontSize:5},
scales: {
xAxes: [{gridLines: {display:false,}}],
yAxes: [{gridLines: {display:false}}]
},
legend:{display:false,
labels:{fontColor:'#ff0000',fontSize: 5,borderWidth:0,}
},
layout:{
padding:{
// left:50,right:0,bottom:0,top:0
}
},
tooltips:{enabled:true,backgroundColor:'#274A7A',titleFontSize:0,titleFontStyle:'bold',bodyFontSize:12}
}
});
<?php foreach($graph as $val){ 
$labc [] = date('d-M-Y', strtotime($val['c_date']));
$incs[]  = $val['totinch'];
?>
<?php }
?>
let massPopChart_2 = new Chart(myChart_2, {
type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
data:{
labels:[<?php foreach($labc as $v ){ ?>'<?=$v?>',<?php } ?>],
datasets:[{label:'In.',
data:[<?php echo $incs[0] - $incs[0] ?>, <?php echo $incs[0] - $incs[1] ?>, <?php echo $incs[1] - $incs[2] ?>, <?php echo $incs[2] - $incs[3] ?>, <?php echo $incs[3] - $incs[4] ?>, <?php echo $incs[4] - $incs[5] ?>],
borderWidth:1,
borderColor:'#faf7f5',
hoverBorderWidth:1,
backgroundColor: '#69B0EE',
hoverBackgroundColor: '#FF1493',
hoverBorderColor:'#274A7A',
//Now for lane:
lineTension: 0,showLines: false,fill: false}]
},
options:{
title:{display:false,text:'weight Loss -1',fontSize:5},
scales: {
xAxes: [{gridLines: {display:false,}}],
yAxes: [{gridLines: {display:false}}]
},
legend:{
display:false,
labels:{fontColor:'#555',fontSize: 10,borderWidth:0,}
},
layout:{
padding:{
// left:50,right:0,bottom:0,top:0
}
},
tooltips:{enabled:true,backgroundColor: '#274A7A',titleFontSize: 0,titleFontStyle: 'bold',bodyFontSize:12}
}
});
</script>