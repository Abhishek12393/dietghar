<?php 
include('header.php');
echo "<style type='text/css'>.wrapper .sidebar ul li:nth-child(2) {border-right: 5px solid #667acd !important;border-radius: 5px;}</style>";
?>
<?php include('sidebar.php');?> 
<div class="container">
<div class="meel-planner-data-1">
<h2 class="text-center" style="padding: 5px;"><b>Sanjeev Meal Plan</b></h2>
<div class="row">
<div class="col-lg-3 col-md-4 col-6">
<div class="meel-planner-data-2">
<ul>
<li><h3>Meal Timing</h3></li><li><h4>Early Morning</h4><h5>07:00 am</h5>
<p><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_2.jpg"></p>
</li>
<li>
<h4>Breakfast</h4><h5>07:00 am</h5>
<p><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_2.jpg"></p>
</li>
<li>
<h4>Mid Meal</h4><h5>07:00 am</h5>
<p><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_2.jpg"></p>
</li>
<li>
<h4>Lunch</h4><h5>07:00 am</h5>
<p><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_2.jpg"></p>
</li>
<li>
<h4>Evening Tea</h4>
<h5>07:00 am</h5>
<p><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_2.jpg"></p>
</li>
<li>
<h4>Dinner</h4><h5>07:00 am</h5>
<p><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_1.jpg"><img src="<?php echo base_url(); ?>user/new_assets/img/icon_2.jpg"></p>
</li>
<li><h4>Tip</h4></li>
</ul>
</div>
</div>
<div class="col-lg-9 col-md-8  col-6">
<div class="meel-planner-data-3">
<div class="owl-carousel owl-theme">
<?php foreach($message as $key => $val){ ?>
<div class="item">
<ul>
<li><h3>Day <?=$key+1?></h3></li>
<li><p><a data-toggle="modal" href="#myModal_<?=$val['fake_chart_id']?>_morning"><?=$val['morning']?></a></p></li>
<li><p><a data-toggle="modal" href="#myModal_<?=$val['fake_chart_id']?>_breakfast"><?=$val['breakfast']?></a></p></li>
<li><p><a data-toggle="modal" href="#myModal_<?=$val['fake_chart_id']?>_midmeal"><?=$val['midmeal']?></a></p></li>
<li><p><a data-toggle="modal" href="#myModal_<?=$val['fake_chart_id']?>_lunch"><?=$val['lunch']?></a></p></li>
<li><p><a data-toggle="modal" href="#myModal_<?=$val['fake_chart_id']?>_evening"><?=$val['evening']?></a></p></li>
<li><p><a data-toggle="modal" href="#myModal_<?=$val['fake_chart_id']?>_dinnner"><?=$val['dinnner']?></a></p></li>
<li><h6>Sleep by 10 positively</h6></li>
</ul>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
<?php 
$arra = array('morning','breakfast','midmeal','lunch','evening','dinnner');
foreach($arra as $arr){
foreach($message as $key => $val){ ?>
<div class="modal fade" id="myModal_<?=$val['fake_chart_id']?>_<?=$arr?>" role="dialog">
<div class="modal-dialog ">
<div class="modal-content">
<div class="modal-header" style="background-color: #34692c;"><h4 class="modal-title" style="color:#fff;">Receipe Details</h4>
<button type="button" style="color:#fff;" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-4 col-sm-12"><img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/logo-dietghar.png" class="wh200"></div>
</div>
<?php
$a = $arr."_data";
foreach($val[$a] as $v){
//pr($v);die;
?>
<div class="row">
<div class="col-md-12">
<label><b>Receipe Name :</b> </label><p style="margin-left: 5px;"> <?=$v['food_name']?></p></div>
<div class="col-md-12"><label><b>Receipe :</b> </label><p style="margin-left: 5px;"> <?=$v['recipe']?></p></div>
<div class="col-md-12"><label><b>Ingridient :</b> </label><p style="margin-left: 5px;"> <?=$v['ingredients']?></p></div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
<?php } } ?>
<button id="chat_button" type="button" class="btn open-button"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/questions.png"></i></button>
<!-- <img class="open-button" src="assets/img/chat/chat_btn.PNG" onclick="openForm()" alt="" style="z-index: 9999;"> -->
<div class="card zoom-mobile alert alert-dismissible fade show p-0 border-0 shadow-sm position_chat myForm" style="width: 25rem; z-index: 9999;" role="alert" id="chat_widget">
<div class="card-header">
<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45">
<g id="Group_2697" data-name="Group 2697" transform="translate(-647 -170)">
<g id="question" transform="translate(647 170)">
<path id="Path_88" data-name="Path 88" d="M225.458,211.313a14.188,14.188,0,0,0-7.781-12.633,19.293,19.293,0,0,1-19,19,14.149,14.149,0,0,0,19.83,5.814l6.886,1.9-1.9-6.886a14.094,14.094,0,0,0,1.966-7.2Zm0,0" transform="translate(-180.458 -180.458)" fill="#fff"/>
<path id="Path_89" data-name="Path 89" d="M33.417,16.708A16.708,16.708,0,1,0,2.317,25.2L.061,33.355,8.216,31.1a16.712,16.712,0,0,0,25.2-14.391ZM14.144,12.82H11.58A5.128,5.128,0,1,1,20.169,16.6L17.99,18.6v2H15.426V17.468l3.011-2.756a2.538,2.538,0,0,0,.835-1.893,2.564,2.564,0,1,0-5.128,0Zm1.282,10.341H17.99v2.564H15.426Zm0,0" fill="#fff"/>
</g>
</g>
</svg>
<span>Support Chart</span>
<button type="button" class="close"><span aria-hidden="true" onclick="closeForm()">&times;</span></button>
</span>
</div>
<div class="overflow_container">
<ul class="list-group list-group-flush">
<li class="list-group-item">You are chatting with<strong>Suport Team</strong></li>
<li class="list-group-item">
<div class="row">
<div class="col-2"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/support_img.PNG" alt="" width="50px" height="50px"></div>
<div class="col-10"><strong class="danger_team">Support Team</strong><p>Did You do the exercise?</p></div>
</div>
</li>
<li class="list-group-item">
<div class="row">
<div class="col-2"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/man-2.PNG" alt="" width="50px" height="50px"></div>
<div class="col-10"><strong>You</strong><p>Yes but I have some issues regarding the time</p></div>
</div>
</li>
<li class="list-group-item">
<div class="row">
<div class="col-2"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/support_img.PNG" alt="" width="50px" height="50px"></div>
<div class="col-10"><strong class="danger_team">Support Team</strong><p>Yes we would be more than happy to help</p></div>
</div>
</li>
<li class="list-group-item">
<div class="row">
<div class="col-2"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/man-2.PNG" alt="" width="50px" height="50px"></div>
<div class="col-10"><strong>You</strong><p>Till what time should I do the exercise and how many reps should I do?</p></div>
</div>
</li>
<li class="list-group-item">
<div class="row">
<div class="col-2"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/support_img.PNG" alt="" width="50px" height="50px"></div>
<div class="col-10"><strong class="danger_team">Support Team</strong><p>Yes we would be more than happy to help</p></div>
</div>
</li>
<li class="list-group-item">
<div class="row">
<div class="col-2"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/man-2.PNG" alt="" width="50px" height="50px"></div>
<div class="col-10"><strong>You</strong><p>Till what time should I do the exercise and how many reps should I do?</p></div>
</div>
</li>
<li class="list-group-item">
<div class="row">
<div class="col-2"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/support_img.PNG" alt="" width="50px" height="50px"></div>
<div class="col-10"><strong class="danger_team">Support Team</strong><p>Yes we would be more than happy to help</p></div>
</div>
</li>
<li class="list-group-item">
<div class="row">
<div class="col-2"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/man-2.PNG" alt="" width="50px" height="50px"></div>
<div class="col-10"><strong>You</strong><p>Till what time should I do the exercise and how many reps should I do?</p></div>
</div>
</li>
<li class="list-group-item">
<div class="row">
<div class="col-2"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/support_img.PNG" alt="" width="50px" height="50px"></div>
<div class="col-10">
<strong class="danger_team">Support Team</strong><p>Yes we would be more than happy to help</p>
</div>
</div>
</li>
<li class="list-group-item">
<div class="row">
<div class="col-2"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/man-2.PNG" alt="" width="50px" height="50px"></div>
<div class="col-10"><strong>You</strong><p>Till what time should I do the exercise and how many reps should I do?</p></div>
</div>
</li>
</ul>
</div>
<div class="card-footer text-muted">
<div class="row mb-2">
<div class="col-1" style="align-self: center;">
<img src="<?php echo base_url(); ?>user/new_assets/img/chat/happy_emo.png" width="20px" height="20px" alt="">
</div>
<div class="col-1" style="align-self: center;">
<img src="<?php echo base_url(); ?>user/new_assets/img/chat/upload.png" width="20px" height="20px" alt="">
</div>
<div class="col-9">
<form>
<input type="text" class="form__field" placeholder="Type a message" />
<button type="button" class="btn btn--primary btn--inside uppercase" style="border-radius: 200px !important;"><img src="<?php echo base_url(); ?>user/new_assets/img/chat/Send.png" width="30px" height="30px" alt=""></button>
</form>
</div>
</div>
</div>
</div>
<script src="<?php echo base_url(); ?>user/new_assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="<?php echo base_url(); ?>new_assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>user/new_assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>user/new_assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>user/new_assets/js/searchComponent.js"></script>
<script src="owl.carousel.js"></script>
<script src="<?php echo base_url(); ?>user/new_assets/js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>user/new_assets/js/messanger.js"></script>
<script src="<?php echo base_url(); ?>user/assets/js/owl-carousel-js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>  
<script>
$('.owl-carousel').owlCarousel({
loop:true,
responsiveClass:true,
responsive:{
0:{items:1,nav:true},
600:{items:4,nav:false},
1000:{items:4,nav:false,loop:false}
}
})
</script>
</body>
</html>

