<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>User Dashboard </title>
<?php $tt=date("s"); ?>
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/bootstrap.css?v=<?php echo $tt; ?>" />
<link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/style-dashboard.css?v=<?php echo $tt; ?>" />
<link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/device-desktop.css?v=<?php echo $tt; ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/device-ipad.css?v=<?php echo $tt; ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/device-mobile.css?v=<?php echo $tt; ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/style-caroursel.css?v=<?php echo $tt; ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<nav class="navbar d-flex p-0 flex-row justify-content-between">
<a class="navbar-brand pr-5 mr-0 link-size" href="#"></a>
<a class="navbar-brand mobile_margin logo-position" href="<?=base_url('User/index')?>"><img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/logo-dietghar.png"></a>
<ul class="navbar-nav px-2 ml-auto flex-row">
<li class="nav-item p-2  align-self-center dropdown">
<a class="nav-link hidden-xs" href="<?php echo base_url(); ?>logout">
<img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/icon-logout3.png" alt="" width="100px" height="20px" />
</a>
<a class="nav-link hidden-lg" href="<?php echo base_url(); ?>logout">
<img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/icon-logout3.png" alt="" width="70px" height="20px" />
</a>
</li>
</ul>
</nav>