<?php 
include('header.php');
echo "<style type='text/css'>.wrapper .sidebar ul li:nth-child(3) {border-right: 5px solid #667acd !important;border-radius: 5px;} .show-trigger {display:block !important;}.container {overflow:hidden;} .filterDiv {display:none;}</style>";
?>
<?php include('sidebar.php')?>
<link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/videos.css" />
<script src="<?php echo base_url(); ?>user/new_assets/js/filter.js"></script>
<div class="container p-viewport-devices" id="video_container">
<div class="row">
<div class="col-lg-12 d-inline" id="myBtnContainer">
<button class="btn btn-sm topBtn shadow-sm active" id="btnOne" onclick="filterSelection('latest')">Latest Videos</button>
<button class="btn btn-sm topBtn-2 shadow-sm" id="btnTwo" onclick="filterSelection('trending')">Trending Videos</button>
</div>
<div class="col-lg-12 d-flex justify-content-between py-3 align-items-baseline">
<div class="d-flex d-inline">
<p class="sort-heading">Sort by: </p>&nbsp;<a class="sort-link" href="#"> Top rated
<svg xmlns="http://www.w3.org/2000/svg" width="9.635" height="7.553" viewBox="0 0 13.635 7.553">
<g id="Group_33" data-name="Group 33" transform="translate(-414.682 -224.224)">
<line id="Line_4" data-name="Line 4" x2="5.406" y2="4.731" transform="translate(416.094 225.635)" fill="none" stroke="#707070" stroke-linecap="round" stroke-width="2"/>
<line id="Line_5" data-name="Line 5" x1="5.406" y2="4.731" transform="translate(421.5 225.635)" fill="none" stroke="#707070" stroke-linecap="round" stroke-width="2"/>
</g>
</svg> 
</a>
</div>
<!--  <div class="d-flex d-inline">
<img class="grid_changer m-1" src="<?php echo base_url(); ?>user/new_assets/img/videos/grid-1.png" width="20px" height="20px">
<img class="grid_changer-2 m-1" src="<?php echo base_url(); ?>user/new_assets/img/videos/grid-2.png" width="20px" height="20px">
</div> 
-->
</div>
</div>
<div class="row">
<div class="filterDiv col-lg-4 col-md-6 col-sm-6 py-3 video_container show-trigger latest">
<a href="<?=base_url('User/recipe_details')?>" class="thumb">
<img src="<?php echo base_url(); ?>user/new_assets/img/videos/thumbnails/thumbnail-1.png" class="img-fluid" alt=""> Introduce Cheat meals in your daily life
</a>
</div>
<div class="filterDiv col-lg-4 col-md-6 col-sm-6 py-3 video_container show-trigger latest">
<a href="<?=base_url('User/recipe_details')?>" class="thumb">
<img src="<?php echo base_url(); ?>user/new_assets/img/videos/thumbnails/thumbnail-2.png" class="img-fluid" alt=""> Weekly Food Plan
</a>
</div>
<div class="filterDiv col-lg-4 col-md-6 col-sm-6 py-3 video_container show-trigger latest">
<a href="<?=base_url('User/recipe_details')?>" class="thumb">
<img src="<?php echo base_url(); ?>user/new_assets/img/videos/thumbnails/thumbnail-3.png" class="img-fluid" alt=""> Top 10 Tastlest Pizza
</a>
</div>
<div class="filterDiv col-lg-4 col-md-6 col-sm-6 py-3 video_container show-trigger  latest">
<a href="<?=base_url('User/recipe_details')?>" class="thumb">
<img src="<?php echo base_url(); ?>user/new_assets/img/videos/thumbnails/thumbnail-4.png" class="img-fluid" alt=""> Best pancake Recipe
</a>
</div>
<div class="filterDiv col-lg-4 col-md-6 col-sm-6 py-3 video_container show-trigger latest">
<a href="<?=base_url('User/recipe_details')?>" class="thumb">
<img src="<?php echo base_url(); ?>user/new_assets/img/videos/thumbnails/thumbnail-5.png" class="img-fluid" alt=""> Healthy Smoothies
</a>
</div>
<div class="filterDiv col-lg-4 col-md-6 col-sm-6 py-3 video_container show-trigger latest">
<a href="<?=base_url('User/recipe_details')?>" class="thumb">
<img src="<?php echo base_url(); ?>user/new_assets/img/videos/thumbnails/thumbnail-6.png" class="img-fluid" alt=""> Easy and Fun Vegan Recipes
</a>
</div>
<div class="filterDiv col-lg-4 col-md-6 col-sm-6 py-3 video_container trending">
<a href="<?=base_url('User/recipe_details')?>" class="thumb">
<img src="<?php echo base_url(); ?>user/new_assets/img/videos/thumbnails/thumbnail-4.png" class="img-fluid" alt=""> Best pancake Recipe
</a>
</div>
<div class="filterDiv col-lg-4 col-md-6 col-sm-6 py-3 video_container trending">
<a href="<?=base_url('User/recipe_details')?>" class="thumb">
<img src="<?php echo base_url(); ?>user/new_assets/img/videos/thumbnails/thumbnail-5.png" class="img-fluid" alt=""> Healthy Smoothies
</a>
</div>
<div class="filterDiv col-lg-4 col-md-6 col-sm-6 py-3 video_container trending">
<a href="<?=base_url('User/recipe_details')?>" class="thumb">
<img src="<?php echo base_url(); ?>user/new_assets/img/videos/thumbnails/thumbnail-6.png" class="img-fluid" alt=""> Easy and Fun Vegan Recipes
</a>
</div>
</div>
</div> 
<?php include('footer.php')?>