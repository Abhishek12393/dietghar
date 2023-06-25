<?php 

$routes = $this->router->fetch_method();
 ?>
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
     <nav class="sidebar sidebar-offcanvas" id="sidebar">

          <ul class="nav">
            <li class="nav-item">
              <div class="border-bottom main-title-nav1">
                <h6 class="font-weight-normal mb-3">Dashboard</h6>
              </div>
            </li>
            <li class="nav-item <?php if($routes=='index' ){ echo 'active';}?>">
              <a class="nav-link" href="<?=base_url('User/index')?>">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title"> OverView </span>                
              </a>
            </li>

            <li class="nav-item <?php if($routes=='meal_plan' ){ echo 'active';}?>">
              <a class="nav-link" href="<?=base_url('User/meal_plan')?>">
                <i class="mdi mdi-calendar-blank menu-icon"></i>
                <span class="menu-title"> Meal Plan </span>                
              </a>
            </li>

            <li class="nav-item <?php if($routes=='male_measurement' || $routes=='female_measurement'){ echo 'active';}?>">
              <?php
              if($user_details[0]['gender']==1){
                 $url = base_url('User/male_measurement');
              }else if($user_details[0]['gender']==2){
                $url = base_url('User/female_measurement');
              }
             
               ?>
              <a class="nav-link" href="<?=$url?>">
                <i class="mdi mdi-camera-timer  menu-icon"></i>
                <span class="menu-title"> Measurements </span>                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-cart  menu-icon"></i>
                <span class="menu-title"> Support </span>                
              </a>
            </li>

            <li class="nav-item <?php if($routes=='profile' ){ echo 'active';}?>">
              <a class="nav-link" href="<?=base_url('User/profile')?>">
                <i class="mdi mdi-face-profile menu-icon"></i>
                <span class="menu-title"> Profile </span>                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-file-video menu-icon"></i>
                <span class="menu-title"> Videos </span>                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-trophy menu-icon"></i>
                <span class="menu-title"> Achievements </span>                
              </a>
            </li>

          </ul>

          <ul class="nav">
            <li class="nav-item main-title-nav1">
              <div class="border-bottom main-title-nav1">
                <h6 class="font-weight-normal mb-3"> EXTRAS </h6>
              </div>
            </li>
            <li class="nav-item <?php if($routes=='recipe' ){ echo 'active';}?>">
              <a class="nav-link" href="<?=base_url('User/recipe')?>">
                <i class="mdi mdi-coffee menu-icon"></i>
                <span class="menu-title"> Recipes </span>                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-flower menu-icon"></i>
                <span class="menu-title"> Fitness </span>                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-vector-difference menu-icon"></i>
                <span class="menu-title"> Resources </span>                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-comment-question-outline menu-icon"></i>
                <span class="menu-title"> About </span>                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-plus-circle-outline menu-icon"></i>
                <span class="menu-title"> Support </span>                
              </a>
            </li>

          </ul>

          <ul class="nav">
            <li class="nav-item main-title-nav1">
              <div class="border-bottom main-title-nav1">
                <h6 class="font-weight-normal mb-3"> ACCOUNT </h6>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title"> Account Settings </span>                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-pause-circle-outline menu-icon"></i>
                <span class="menu-title"> Pause </span>                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-clock-fast menu-icon"></i>
                <span class="menu-title"> Reset Week </span>                
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url('Stepper/logout')?>">
                <i class="mdi mdi-login menu-icon"></i>
                <span class="menu-title"> Logout </span>                
              </a>
            </li>

          </ul>  

        </nav>