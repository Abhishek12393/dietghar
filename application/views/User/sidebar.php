<!--********************************** Sidebar start ***********************************-->
<div class="deznav">
<div class="deznav-scroll">
<ul class="metismenu" id="menu">
<li><a class="has-arrow ai-icon" href="<?=base_url('User/index')?>" aria-expanded="false"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-dashboard.png"> <span class="nav-text">Dashboard</span></a></li>
<?php $message = $this->Dietmodel->Userdatadetails($_SESSION['id']); ?>
<li><?php if($message->gender==1){ ?>
  <a class="has-arrow ai-icon" href="<?=base_url('User/male_measurement')?>" aria-expanded="false">
  <?php }else{ ?>
  <a class="has-arrow ai-icon"href="<?=base_url('User/female_measurement')?>" aria-expanded="false">
  <?php } ?><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-recipe.png"> <span class="nav-text">Measurements</span></a>
</li>
<?php ?>
<li><a class="has-arrow ai-icon" href="<?=base_url('tips/index.html')?>" aria-expanded="false"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-meal-plan.png"> <span class="nav-text">Tips !</span></a></li>
<li><a class="has-arrow ai-icon" href="<?=base_url('User/meal_plan')?>" aria-expanded="false"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-meal-plan.png"> <span class="nav-text">Meal Plan</span></a></li>
<li><a class="has-arrow ai-icon" href="<?=base_url('User/video')?>" aria-expanded="false"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-video.png"> <span class="nav-text">Videos</span></a></li>
<li><a class="has-arrow ai-icon" href="<?=base_url('User/recipe')?>" aria-expanded="false"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-recipe.png"> <span class="nav-text">Recipes</span></a></li>
<li><a class="has-arrow ai-icon"href="<?=base_url('User/profile')?>" aria-expanded="false"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-profile.png"> <span class="nav-text">Profile</span></a></li>
<li><a class="has-arrow ai-icon" href="<?=base_url('User/fitness')?>" aria-expanded="false"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-fitness.png"> <span class="nav-text">Fitness</span></a></li>
<li><a class="has-arrow ai-icon"href="<?=base_url('User/history')?>" aria-expanded="false"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-history.png"> <span class="nav-text">History</span></a></li>
<li><a class="has-arrow ai-icon"href="<?=base_url('User/about')?>" aria-expanded="false"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-about.png"> <span class="nav-text">About</span></a></li>
<li><a class="has-arrow ai-icon"href="<?=base_url('User/notifications')?>" aria-expanded="false"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-notifications.png"> <span class="nav-text">Notifications</span></a></li>
</ul>
<a class="bell-link" href="javascript:void(0)"><div class="add-menu-sidebar"><p class="font-w500 mb-0"><img alt="image" width="24" height="24" src="<?=base_url();?>dgassets/user/icons/icon-chat.png"> Support</p></div></a>
<!--<div class="copyright">
<p><strong>Dietghar © <?php $year = date("Y"); echo $year; ?> All Rights Reserved</strong></p>
<p>Made &#10084;&#65039; by <a href="https://webpromosindia.com">Web Promos India</a></p>
</div>-->
</div>
</div>
<!--**********************************Sidebar end***********************************-->