<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard </title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/chat.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/recipe-one.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/owl.theme.default.css">
</head>


<body>
    <!--[if lt IE 7]>
      <p class="browsehappy">
        You are using an <strong>outdated</strong> browser. Please
        <a href="#">upgrade your browser</a> to improve your experience.
      </p>
    <![endif]-->
    <!-- Left Sidebar Starts -->
    <!-- Left Sidebar Starts -->
    <nav class="navbar d-flex p-0 flex-row justify-content-between">
        <!-- <a class="navbar-brand pr-5 mr-0 link-size" href="#"></a> -->
        <a class="navbar-brand mobile_margin ml-100" href="dashboard.html">Dashboard</a>
        <ul class="navbar-nav px-2 ml-auto flex-row">
            <li class="nav-item p-1 mr-custom-mobile mr-2" style="align-self: center;">
                <input class="searchInput" type="text" name="" placeholder="&nbsp; Search" id="searchInput" />
                <button class="searchButton" href="#" id="searchButton">
              <img
                src="<?php echo base_url(); ?>user/new_assets/img/dashboard/Group 7.png"
                alt=""
                width="10px"
                height="10px"
              /> 
             </button>
            </li>
            <li class="nav-item p-2  align-self-center dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/ring_header.png" alt="" width="15px" height="18px" />
                </a>
                <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Notification 1</a>
                    <a class="dropdown-item" href="#">Notification 2</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="#">Notification 3</a>
                </div>
            </li>
            <li class="nav-item p-2  align-self-center dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/mans_avatar.png" alt="" width="40px" height="40px" />
                </a>
                <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">My Account</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item font-weight-bold" href="#">Logout</a>
                </div>
            </li>
        </ul>
    </nav>