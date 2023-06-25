<div class="wrapper">
<div class="top_navbar">
<div class="hamburger p-3 mb-5" id="hamburger_color_push">
<img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/hamburger.svg" id="hamburger_push" style="vertical-align: bottom;">
</div>
</div>
<div class="sidebar" id="mobile_sidenav">
<ul>
<li>
<a class="sideactive" href="<?=base_url('User/index')?>">
<span class="icon"><img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/home.svg" width="20px" alt=""></span>
<span class="title">Home</span></a>
</li>
<li>
<a href="<?=base_url('User/meal_plan')?>">
<span class="icon"><img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/meal.svg" width="20px" alt=""></span>
<span class="title">Meal Plan</span>
</a>
</li>
<li>
<a href="<?=base_url('User/video')?>">
<span class="icon"><img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/play-button.svg" width="20px" alt=""></span>
<span class="title">Videos</span>
</a>
</li>
<?php 
$message = $this->Dietmodel->Userdatadetails($_SESSION['id']);
// pr($_SESSION['id']);die;
if($message->measurment_done=='N'){
?>
<li>
<?php if($message->gender==1){ ?>
<a href="<?=base_url('User/male_measurement')?>">
<?php }else{ ?>
<a href="<?=base_url('User/female_measurement')?>">
<?php } ?>
<span class="icon"><img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/speed.svg" width="20px" alt=""></span>
<span class="title">Measurements</span>
</a>
</li>
<?php } ?>
<li>
<a href="<?=base_url('recipesearch/fetch')?>">
<span class="icon"><img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/meal.svg" width="20px" alt=""></span>
<span class="title">Recipes</span>
</a>
</li>
<li>
<a href="<?=base_url('User/profile')?>">
<span class="icon"><img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/user.svg" width="20px" alt=""></span>
<span class="title">Profile</span>
</a>
</li>
<li>
<a href="#">
<span class="icon"><img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/sport.svg" width="20px" alt=""></span>
<span class="title">Fitness</span>
</a>
</li>
<li>
<a href="<?=base_url('User/about')?>">
<span class="icon"><img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/info.svg" width="20px" alt=""></span>
<span class="title">About</span>
</a>
</li>
<li>
<a href="<?=base_url('User/history')?>">
<span class="icon"><img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/info.svg" width="20px" alt=""></span>
<span class="title">History</span>
</a>
</li>
<li>
<a onclick="openForm()">
<span class="icon"><img src="<?php echo base_url(); ?>user/new_assets/img/sidenav_sm/question.svg" width="20px" alt=""></span>
<span class="title">Support</span>
</a>
</li>
</ul>
</div>
</div>