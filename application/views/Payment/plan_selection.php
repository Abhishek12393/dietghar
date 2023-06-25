<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="" />
<meta name="description" content="DietGhar " />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title> Pricing Page </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dgassets/stepper/style.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dgassets/stepper/style.css" />
<style type="text/css">
#preloader {position: absolute;top: 50%;left: 50%;width: 50px;height: 50px;margin: -30px 0 0 -30px;}
#status {position: fixed;z-index: 999999;top: 0;right: 0;bottom: 0;left: 0;display: block;background:#fff;background-image:url(<?php echo base_url(); ?>dgassets/stepper/pre-loader.gif);background-repeat: no-repeat;background-position: center;}
.main-section-pricing-420 {width: 100%;display: block;background: url("<?php echo base_url(); ?>dgassets/stepper/background.jpg");background-attachment: fixed;background-repeat: no-repeat;background-size: cover;padding: 0px 0;}
</style>
</head>
<body>
<div class="page">
<div id="preloader"><div id="status">&nbsp;</div></div>
<section class="main-section-pricing-420">
<header class="header">
<div class="ttm-stickable-header-w clearfix">
<div class="site-header-menu">
<div class="site-header-menu-inner">
<div class="container">
<div class="site-branding">
<center><a class="home-link" href="https://dietghar.com" title="Dietghar" rel="home">
<img id="logo-img" class="img-center" src="http://dietghar.com/diet/diet/assets/images/logo-diet.png" alt="logo-img">
</a></center>
</div>
</div>
</div>
</div>
</div>
</header>
<div class="container">
<div class="row mt-50 mb-4">
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
<h2 class="will-you-get-title"> Customized Nutritional Plans</h2>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4 pt-5">
<div class="section-title text-left clearfix">
<div class="title-header"><h2 class="title">Choose Your Perfect Plan</h2></div>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4 set1562">
<form method="Post" action="<?=base_url()?>payment_mode">
<input type="hidden" name="amount" value="600">
<input type="hidden" name="plan" value="Diet Composite">
<div class="pricing-list-frist-1 frist-l">                                
<div class="set-6547979798798798">
<!-- <h4 class="name-price">Diet Essential Plan </h4> -->
<h4 class="name-price">Diet Composite</h4>
<h1 class="price-price-title"> <i class="fa fa-rupee"></i> 600 </h1>
<h6 class="date-price"> Per 15 Days </h6>
<ul class="list-detials-main-section">
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; 8 Hours Online Support</li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Basic Customised Meal Planner</li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; No Detoxes </li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Basic Workout</li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Client Follow-Up Once a Week</li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Weight Loss Target 3 - 4 Kg a Month </li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Basic Weight Loss Tips</li>
<a type="menu" class="content-less-set-main"> <i> - </i>  Less More </a>
</ul>
</div>
<a type="menu" class="content-view-set-main"> <i class="fa fa-plus"></i>+View More </a>
<div class="btn-main-set-price">
<button type="submit" class="main-btn-set1"> Purchase </button>
</div>
</div>
</form>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-xl-4 set156297987987">
<form method="Post" action="<?=base_url()?>payment_mode">
<input type="hidden" name="amount" value="1200">
<input type="hidden" name="plan" value="Diet Advanced">
<div class="pricing-list-frist-1 frist-r">                                
<div class="set-6547979798798798">
<h4 class="name-price"> Diet Advanced </h4>
<h1 class="price-price-title1"> <i class="fa fa-rupee"></i> 1200 </h1>
<h6 class="date-price"> Per 30 Days </h6>
<ul class="list-detials-main-section">
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; 8 Hours Online + Call Support </li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Customised Meal Planner </li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; 4 Detoxes </li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Basic + Workout Help</li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Recipe on Demand</li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Video Call Support </li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Client Follow Up Once a Week</li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Health & Skin Care Tips</li>
<li><i class="fa fa-check" aria-hidden="true"></i> &nbsp; Weight Loss Target 7 - 9 Kg in 60 Days</li>
<a type="menu" class="content-less-set-main2"> <i> - </i> Less More </a>
</ul>
</div>
<a type="menu" class="content-view-set-main2"> <i class="fa fa-plus"></i>+View More </a>
<div class="btn-main-set-price">
<button type="submit" class="main-btn-set1"> Purchase </button>
</div>
</div>
</form>
</div>
</div>
</div>
</section>
</div>
<script type="text/javascript">
	console.log(<?php print_r(json_encode($_SESSION)); ?>);
</script>
<script src="<?php echo base_url(); ?>dgassets/stepper/js.jquery.min.js"></script>
<script src="<?php echo base_url(); ?>dgassets/stepper/js.bootstrap.min.js"></script>  
<script src="<?php echo base_url(); ?>dgassets/stepper/js.view.js"></script>
<script src="<?php echo base_url(); ?>dgassets/stepper/js.main.js"></script>
<script>
$(document).ready(function(){
$(".content-view-set-main").click(function(){
$(".frist-l").addClass("intro1");
});
});
$(document).ready(function(){
$(".content-less-set-main").click(function(){
$(".frist-l").removeClass("intro1");
});
});
$(document).ready(function(){
$(".content-view-set-main2").click(function(){
$(".frist-r").addClass("intro2");
});
});
$(document).ready(function(){
$(".content-less-set-main2").click(function(){
$(".frist-r").removeClass("intro2");
});
});
</script>
</body>
</html>