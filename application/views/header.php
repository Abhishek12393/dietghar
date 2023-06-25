<?php 
$router = $this->router->fetch_method();
// pr($_SESSION);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="DietGhar" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>DietGhar</title>

    <!-- favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>diet/assets/images/favicon.png" />

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/css/bootstrap.min.css" />
    <!-- animate -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/css/animate.css" />
    <!-- owl-carousel -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/css/owl.carousel.css">
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/css/font-awesome.css" />
    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/css/themify-icons.css" />
    <!-- flaticon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/css/flaticon.css" />


    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/revolution/css/settings.css">

    <!-- prettyphoto -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/css/prettyPhoto.css">

    <!-- shortcodes -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/css/shortcodes.css" />
    <!-- main -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/css/main.css" />
    <!-- responsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>diet/assets/css/responsive.css" />
 <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
 <script src="https://www.gstatic.com/firebasejs/4.10.1/firebase.js"></script>  
<script type="text/javascript" src="<?=base_url('firebase')?>/reference.js" ></script> 
<script type="text/javascript" src="<?=base_url('firebase')?>/config.js" ></script> 
<script type="text/javascript">
         $(document).ready(function () {
        firebase.initializeApp(config);
 

    });
</script>
    <style >
        .mgtp{
            margin-top: 38px !important;
            padding: 8px 16px 8px 16px !important;
        }
        .fixed-header  .mgtp {
    margin-top: 18px !important;
    padding: 8px 16px 8px 16px !important;
}
@media only screen and (max-width: 480px) {
  .fixed-header .mgtp{
            margin-top: 38px !important;
            padding: 8px 16px 8px 16px !important;
        }
}
    </style>
    <style >
        .modal-backdrop.show {
    opacity: 0;
    display: none;
}
.open-button1 {
    background-color: red;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 2px;
    /* width: 280px; */
    z-index: 9999;
}
    </style>
</head>

<body>

    <!--page start-->
    <div class="page">

        <!-- preloader start -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- preloader end -->

        <!--header start-->
        <header id="masthead" class="header ttm-header-style-classic">
            <!-- ttm-topbar-wrapper -->
            <div class="ttm-topbar-wrapper ttm-bgcolor-black ttm-textcolor-white clearfix">
                <div class="container">
                    <div class="ttm-topbar-content">
                        <ul class="list-inline top-contact  topbar-left text-left">
                           
                            <li> <i class="fa fa-clock-o"></i> Mon-Sat: 10am to 6pm</li>
                        </ul>
                        <div class="topbar-right text-right">
                            <ul class="list-inline top-contact">
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:support@dietghar.com">support@dietghar.com</a></li>
                            </ul>
                            <!-- <div class="ttm-social-links-wrapper list-inline">
                                <ul class="social-icons list-inline">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-flickr"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="ttm-topbar-btn ttm-textcolor-white">
                                <!-- <a class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor" href="#">
                                    <i class="fa fa-headphones"></i> <span class="numberMl-5">(0120) 4567890</span></a> -->
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- ttm-topbar-wrapper end -->
            <!-- ttm-header-wrap -->
            <div class="ttm-header-wrap">
                <!-- ttm-stickable-header-w -->
                <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                    <div id="site-header-menu" class="site-header-menu">
                        <div class="site-header-menu-inner ttm-stickable-header">
                            <div class="container">
                                <!-- site-branding -->
                                <div class="site-branding">
                                    <a class="home-link" href="<?=base_url('Diet/index')?>" title="Nutricare" rel="home">
                                        <img id="logo-img" class="img-center" src="<?php echo base_url(); ?>diet/assets/images/logo-diet.png" alt="logo-img">
                                    </a>
                                </div>
                                <!-- site-branding end -->
                                <!--site-navigation -->
                                <div id="site-navigation" class="site-navigation">
                                     <div class="ttm-header-icons ">
                                       <div class="ttm-topbar-btn ttm-textcolor-white"><a class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-skincolor mgtp" href="<?=base_url('Stepper/index')?>">Login / Registration</a></div>
                                       
                                    </div>
                                     <div class="ttm-menu-toggle">
                                        <input type="checkbox" id="menu-toggle-form" />
                                        <label for="menu-toggle-form" class="ttm-menu-toggle-block">
                                            <span class="toggle-block toggle-blocks-1"></span>
                                            <span class="toggle-block toggle-blocks-2"></span>
                                            <span class="toggle-block toggle-blocks-3"></span>
                                        </label>
                                    </div>
                                    <nav id="menu" class="menu">
                                        <ul class="dropdown">
                                            <li class="<?php if($router=='index'){ echo 'active';} ?>"><a href="<?=base_url('Diet/index')?>">Home</a></li>
                                            <li class="<?php if($router=='about'){ echo 'active';} ?>"><a href="<?=base_url('Diet/about')?>">About Us</a>
                                             </li>
                                            
                                             <li class="<?php if($router=='success_story'){ echo 'active';} ?>"><a href="<?=base_url('Diet/success_story')?>">Success Stories</a></li>
                                           <!--  <li><a href="<?=base_url('Diet/success_story')?>">Success Stories</a>
                                                <ul>
                                                    <li><a href="#">Lorem Ipsum</a></li>
                                                    <li><a href="#">Lorem Ipsum</a></li>
                                                    <li><a href="#">Lorem Ipsum</a></li>
                                                    <li><a href="#">Lorem Ipsum</a></li>
                                                    <li><a href="#">Lorem Ipsum</a></li>
                                                    <li><a href="#">Lorem Ipsum</a></li>
                                                    <li><a href="#">Lorem Ipsum</a></li>
                                                    <li><a href="#">Lorem Ipsum</a></li>
                                                </ul>
                                            </li> -->
                                            <li class="<?php if($router=='blog'){ echo 'active';} ?>"><a href="<?=base_url('Diet/blog')?>">Blog</a>
                                                
                                            </li>
                                              <li class="<?php if($router=='faq'){ echo 'active';} ?>"><a href="<?=base_url('Diet/faq')?>">FAQs</a></li>
                                            <li class="<?php if($router=='contact'){ echo 'active';} ?>"><a href="<?=base_url('Diet/contact')?>">Contact us</a></li>
                                           
                                        </ul>
                                    </nav>
                                </div>
                                <!-- site-navigation end-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ttm-stickable-header-w end-->
            </div>
            <button class="open-button1 submit ttm-btn ttm-btn-size-md ttm-btn-shape-round  ttm-btn-style-fill ttm-btn-bgcolor-skincolor mb-5" id="chatclosed" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm" style=" border: 3px solid #f1f1f1 !important;">
  <form action="#" class="form-container">
    <h1 style="font-size: 24px;font-weight: 700;margin: 0px;">Chat</h1>
    <span id="mobile">
    <label for="msg"><b>Enter Mobile No</b></label>
    <input type="text" name="mobile" onkeyup="sumbitEnter()" onkeypress="return isNumberKey(event)" class="form-container" placeholder="Mobile No" id="mobiles" maxlength="10" required=""><br><br>
	</span>
    <span style="display: none;" id="msg">
    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>
	</span>
  <a href="javascript:void(0)" id="verify" onclick="verify();"> <button type="button"  style="display: none"  class="btn">Verify</button></a> 
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>
<div class="chat-popup" id="messagechat" style="display: none">
  <div class="fabs">
  <div class="chat">
    <div class="chat_header">
      <div class="chat_option">
      <div class="header_img">
        <img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg"/>
        </div>
        <span id="chat_head">Jane Doe</span> <br> <span class="agent">Agent</span> <span class="online">(Online)</span>
        <span id="chat_fullscreen_loader" class="chat_fullscreen_loader"><i class="fullscreen zmdi zmdi-window-maximize"></i></span>
       

      </div>

    </div>
  
    <div id="chat_body chat_login chat_converse" class="chat_conversion chat_converse">
        <span id="chat_from_fb">  
     
        </span>
    </div>
    
   
     
    <div class="fab_field">

      <a id="fab_camera" class="fab"><div class="image-upload">
    <label for="file-input">
        <i class="zmdi zmdi-camera"></i>
    </label>

    <input id="file-input" type="file" onchange="sendfiles()" accept="image/x-png,image/gif,image/jpeg"/>
</div></a>
      <a id="fab_send" class="fab"><i class="zmdi zmdi-mail-send" onclick="sendMessage()"></i></a>
      <textarea id="chatSend" name="chat_message" placeholder="Send a message" onkeyup="sendMessageonenter(event)" class="chat_field chat_message"></textarea>
   <input type="hidden" id="uid" value="">
    </div>
  </div>
    <a id="prime" class="fab"><i class="prime zmdi zmdi-comment-outline"></i></a>
</div>
</div>
 </header>
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic);
@import url(https://zavoloklom.github.io/material-design-iconic-font/css/docs.md-iconic-font.min.css);

ul li{
  list-style: none;
}
.fabs {
  bottom: 0;
  position: fixed;
  margin: 1em;
  right: 0;
  z-index: 998;
  
}

.fab {
  display: block;
  width: 56px;
  height: 56px;
  border-radius: 50%;
  text-align: center;
  color: #f0f0f0;
  margin: 25px auto 0;
  box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
  cursor: pointer;
  -webkit-transition: all .1s ease-out;
  transition: all .1s ease-out;
  position: relative;
  z-index: 998;
  overflow: hidden;
  background: #42a5f5;
}

.fab > i {
  font-size: 2em;
  line-height: 55px;
  -webkit-transition: all .2s ease-out;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.fab:not(:last-child) {
  width: 0;
  height: 0;
  margin: 20px auto 0;
  opacity: 0;
  visibility: hidden;
  line-height: 40px;
}

.fab:not(:last-child) > i {
  font-size: 1.4em;
  line-height: 40px;
}

.fab:not(:last-child).is-visible {
  width: 40px;
  height: 40px;
  margin: 15px auto 10;
  opacity: 1;
  visibility: visible;
}

.fab:nth-last-child(1) {
  -webkit-transition-delay: 25ms;
  transition-delay: 25ms;
}

.fab:not(:last-child):nth-last-child(2) {
  -webkit-transition-delay: 20ms;
  transition-delay: 20ms;
}

.fab:not(:last-child):nth-last-child(3) {
  -webkit-transition-delay: 40ms;
  transition-delay: 40ms;
}

.fab:not(:last-child):nth-last-child(4) {
  -webkit-transition-delay: 60ms;
  transition-delay: 60ms;
}

.fab:not(:last-child):nth-last-child(5) {
  -webkit-transition-delay: 80ms;
  transition-delay: 80ms;
}

.fab(:last-child):active,
.fab(:last-child):focus,
.fab(:last-child):hover {
  box-shadow: 0 0 6px rgba(0, 0, 0, .16), 0 6px 12px rgba(0, 0, 0, .32);
}
/*Chatbox*/

.chat {
  position: fixed;
  right: 85px;
  bottom: 20px;
  width: 400px;
  font-size: 12px;
  line-height: 22px;
  font-family: 'Roboto';
  font-weight: 500;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  opacity: 0;
  box-shadow: 1px 1px 100px 2px rgba(0, 0, 0, 0.22);
  border-radius: 10px;
  -webkit-transition: all .2s ease-out;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.chat_fullscreen {
    position: fixed;
    right: 0px;
    bottom: 0px;
    top: 0px;
  }
.chat_header {
      /* margin: 10px; */
    font-size: 13px;
    font-family: 'Roboto';
    font-weight: 500;
    color: #f3f3f3;
    height: 55px;
    background: #42a5f5;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    padding-top: 8px;
}
.chat_header2 {
      /* margin: 10px; */
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}
.chat_header .span {
  float:right;
}

.chat_fullscreen_loader {
  /*display: none;*/
    float: right;
    cursor: pointer;
    /* margin: 10px; */
    font-size: 20px;
    opacity: 0.5;
    /* padding: 20px; */
    margin: -10px 10px;
}

.chat.is-visible {
  opacity: 1;
  -webkit-animation: zoomIn .2s cubic-bezier(.42, 0, .58, 1);
  animation: zoomIn .2s cubic-bezier(.42, 0, .58, 1);
}
.is-hide{
  opacity: 0
}

.chat_option {
  float: left;
  font-size: 15px;
  list-style: none;
  position: relative;
  height: 100%;
  width: 100%;
  text-align: relative;
  margin-right: 10px;
      letter-spacing: 0.5px;
      font-weight: 400
}


.chat_option img {
    border-radius: 50%;
    width: 55px;
    float: left;
    margin: -30px 20px 10px 20px;
    border: 4px solid rgba(0, 0, 0, 0.21);
}

.change_img img{
    width: 35px;
    margin: 0px 20px 0px 20px;
}
.chat_option .agent {
  font-size: 12px;
    font-weight: 300;
}
.chat_option .online{
      opacity: 0.4;
    font-size: 11px;
    font-weight: 300;
}
.chat_color {
  display: block;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  margin: 10px;
  float: left;
}


.chat_body {
  background: #fff;
  width: 100%;

  display: inline-block;
  text-align: center;
    overflow-y: auto;

}
#chat_body{
    height: 450px;
}
.chat_login p,.chat_body li, p, a{
    -webkit-animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
  animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
}
.chat_body p {
  padding: 20px;
  color: #888
}
.chat_body a {
  width: 10%;
  text-align: center;
  border: none;
  box-shadow: none;
  line-height: 40px;
  font-size: 15px;
}



.chat_field {
  position: relative;
  margin: 5px 0 5px 0;
  width: 50%;
  font-family: 'Roboto';
  font-size: 12px;
  line-height: 30px;
  font-weight: 500;
  color: #4b4b4b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  border: none;
  outline: none;
  display: inline-block;
}

.chat_field.chat_message {
 /* height: 30px;*/
  resize: none;
      font-size: 13px;
    font-weight: 400;
    line-height: 20px;
}
.chat_category{
  text-align: left;
}

.chat_category{
  margin: 20px;
  background: rgba(0, 0, 0, 0.03);
  padding: 10px;
}

.chat_category ul li{
    width: 80%;
    height: 30px;
    background: #fff;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 10px;
    border-radius: 3px;
    border: 1px solid #e0e0e0;
    font-size: 13px;
    cursor: pointer;
    line-height: 30px;
    color: #888;
    text-align: center;
}

.chat_category li:hover{
    background: #83c76d;
    color: #fff;
}
.chat_category li.active{
    background: #83c76d;
    color: #fff;
}

.tags{
 margin: 20px;
    bottom: 0px;
    display: block;
    width: 120%
}
.tags li{
    padding: 5px 10px;
    border-radius: 40px;
    border: 1px solid rgb(3, 117, 208);
    margin: 5px;
    display: inline-block;
    color: rgb(3, 117, 208);
    cursor: pointer;

}
.fab_field {
  width: 100%;
  display: inline-block;
  text-align: center;
  background: #fff;
  border-top: 1px solid #eee;
  border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;

}
.fab_field2 {
    bottom: 0px;
    position: absolute;
    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;
        z-index: 999;
  }

.fab_field a {
  display: inline-block;
  text-align: center;
}

#fab_camera {
  float: left;
  background: rgba(0, 0, 0, 0);
}

#fab_send {
  float: right;
  background: rgba(0, 0, 0, 0);
}

.fab_field .fab {
  width: 35px;
  height: 35px;
  box-shadow: none;
  margin: 5px;
}

.fab_field .fab>i {
  font-size: 1.6em;
  line-height: 35px;
  color: #bbb;
}
.fab_field .fab>i:hover {
  color: #42a5f5;
}
.chat_conversion {

}

.chat_converse {
  position: relative;
    background: #fff;
    margin: 0px 0 0px 0;
    height: 300px;
    min-height: 0;
    font-size: 12px;
    line-height: 18px;
    overflow-y: auto;
    width: 100%;
    float: right;
    padding-bottom: 0px;
}
.chat_converse2{
      height: 100%;
    max-height: 800px
}
.chat_list {
  opacity: 0;
  visibility: hidden;
  height: 0;
}

.chat_list .chat_list_item {
  opacity: 0;
  visibility: hidden;
}

.chat .chat_converse .chat_msg_item {
  position: relative;
  margin: 8px 0 15px 0;
  padding: 8px 10px;
  max-width: 60%;
  display: block;
  word-wrap: break-word;
  border-radius: 3px;
  -webkit-animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
  animation: zoomIn .5s cubic-bezier(.42, 0, .58, 1);
  clear: both;
  z-index: 999;
}
.status {
    margin: 45px -50px 0 0;
    float: right;
    font-size: 11px;
    opacity: 0.3;
}
.status2 {
    margin: -10px 20px 0 0;
    float: right;
    display: block;
    font-size: 11px;
    opacity: 0.3;
}
.chat .chat_converse .chat_msg_item .chat_avatar {
  position: absolute;
  top: 0;
}

.chat .chat_converse .chat_msg_item.chat_msg_item_admin .chat_avatar {
  left: -52px;
  background: rgba(0, 0, 0, 0.03);
}

.chat .chat_converse .chat_msg_item.chat_msg_item_user .chat_avatar {
  right: -52px;
  background: rgba(0, 0, 0, 0.6);
}

.chat .chat_converse .chat_msg_item .chat_avatar, .chat_avatar img{
  width: 40px;
  height: 40px;
  text-align: center;
  border-radius: 50%;
}

.chat .chat_converse .chat_msg_item.chat_msg_item_admin {
  margin-left: 60px;
  float: left;
  background: rgba(0, 0, 0, 0.03);
  color: #666;
}

.chat .chat_converse .chat_msg_item.chat_msg_item_user {
  margin-right: 20px;
  float: right;
  background: #42a5f5;
  color: #eceff1;
}

.chat .chat_converse .chat_msg_item.chat_msg_item_admin:before {
  content: '';
  position: absolute;
  top: 15px;
  left: -12px;
  z-index: 998;
  border: 6px solid transparent;
  border-right-color: rgba(255, 255, 255, .4);
}

.chat_form .get-notified label{
    color: #077ad6;
    font-weight: 600;
    font-size: 11px;
}

input {
  position: relative;
  width: 90%;
  font-family: 'Roboto';
  font-size: 12px;
  line-height: 20px;
  font-weight: 500;
  color: #4b4b4b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  outline: none;
  background: #fff;
  display: inline-block;
  resize: none;
  padding: 5px;
  border-radius: 3px;
}
.chat_form .get-notified input {
  margin: 2px 0 0 0;
  border: 1px solid #83c76d;
}
.chat_form .get-notified i {
    background: #83c76d;
    width: 30px;
    height: 32px;
    font-size: 18px;
    color: #fff;
    line-height: 30px;
    font-weight: 600;
    text-align: center;
    margin: 2px 0 0 -30px;
    position: absolute;
    border-radius: 3px;
}
.chat_form .message_form {
  margin: 10px 0 0 0;
}
.chat_form .message_form input{
  margin: 5px 0 5px 0;
  border: 1px solid #e0e0e0;
}
.chat_form .message_form textarea{
  margin: 5px 0 5px 0;
  border: 1px solid #e0e0e0;
  position: relative;
  width: 90%;
  font-family: 'Roboto';
  font-size: 12px;
  line-height: 20px;
  font-weight: 500;
  color: #4b4b4b;
  -webkit-font-smoothing: antialiased;
  font-smoothing: antialiased;
  outline: none;
  background: #fff;
  display: inline-block;
  resize: none;
  padding: 5px;
  border-radius: 3px;
}
.chat_form .message_form button{
    margin: 5px 0 5px 0;
    border: 1px solid #e0e0e0;
    position: relative;
    width: 95%;
    font-family: 'Roboto';
    font-size: 12px;
    line-height: 20px;
    font-weight: 500;
    color: #fff;
    -webkit-font-smoothing: antialiased;
    font-smoothing: antialiased;
    outline: none;
    background: #fff;
    display: inline-block;
    resize: none;
    padding: 5px;
    border-radius: 3px;
    background: #83c76d;
    cursor: pointer;
}
strong.chat_time {
  padding: 0 1px 1px 0;
  font-weight: 500;
  font-size: 8px;
  display: block;
}

/*Chatbox scrollbar*/

::-webkit-scrollbar {
  width: 6px;
}

::-webkit-scrollbar-track {
  border-radius: 0;
}

::-webkit-scrollbar-thumb {
  margin: 2px;
  border-radius: 10px;
  background: rgba(0, 0, 0, 0.2);
}
/*Element state*/

.is-active {
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
  -webkit-transition: all 1s ease-in-out;
  transition: all 1s ease-in-out;
}

.is-float {
  box-shadow: 0 0 6px rgba(0, 0, 0, .16), 0 6px 12px rgba(0, 0, 0, .32);
}

.is-loading {
  display: block;
  -webkit-animation: load 1s cubic-bezier(0, .99, 1, 0.6) infinite;
  animation: load 1s cubic-bezier(0, .99, 1, 0.6) infinite;
}
/*Animation*/

@-webkit-keyframes zoomIn {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
    opacity: 0.0;
  }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
}

@keyframes zoomIn {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
    opacity: 0.0;
  }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 1;
  }
}

@-webkit-keyframes load {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
    opacity: 0.0;
  }
  50% {
    -webkit-transform: scale(1.5);
    transform: scale(1.5);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 0;
  }
}

@keyframes load {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
    opacity: 0.0;
  }
  50% {
    -webkit-transform: scale(1.5);
    transform: scale(1.5);
    opacity: 1;
  }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 0;
  }
}
/* SMARTPHONES PORTRAIT */

@media only screen and (min-width: 300px) {
  .chat {
    width: 250px;
  }
}
/* SMARTPHONES LANDSCAPE */

@media only screen and (min-width: 480px) {
  .chat {
    width: 300px;
  }
  .chat_field {
    width: 65%;
  }
}
/* TABLETS PORTRAIT */

@media only screen and (min-width: 768px) {
  .chat {
    width: 300px;
  }
  .chat_field {
    width: 65%;
  }
}
/* TABLET LANDSCAPE / DESKTOP */

@media only screen and (min-width: 1024px) {
  .chat {
    width: 300px;
  }
  .chat_field {
    width: 65%;
  }
}
/*Color Options*/



.blue .fab {
  background: #42a5f5;
  color: #fff;
}



.blue .chat {
  background: #42a5f5;
  color: #999;
}


/* Ripple */

.ink {
  display: block;
  position: absolute;
  background: rgba(38, 50, 56, 0.4);
  border-radius: 100%;
  -moz-transform: scale(0);
  -ms-transform: scale(0);
  webkit-transform: scale(0);
  -webkit-transform: scale(0);
          transform: scale(0);
}
/*animation effect*/

.ink.animate {
  -webkit-animation: ripple 0.5s ease-in-out;
          animation: ripple 0.5s ease-in-out;
}

@-webkit-keyframes ripple {
  /*scale the element to 250% to safely cover the entire link and fade it out*/
  
  100% {
    opacity: 0;
    -moz-transform: scale(5);
    -ms-transform: scale(5);
    webkit-transform: scale(5);
    -webkit-transform: scale(5);
            transform: scale(5);
  }
}

@keyframes ripple {
  /*scale the element to 250% to safely cover the entire link and fade it out*/
  
  100% {
    opacity: 0;
    -moz-transform: scale(5);
    -ms-transform: scale(5);
    webkit-transform: scale(5);
    -webkit-transform: scale(5);
            transform: scale(5);
  }
}
::-webkit-input-placeholder { /* Chrome */
  color: #bbb;
}
:-ms-input-placeholder { /* IE 10+ */
  color: #bbb;
}
::-moz-placeholder { /* Firefox 19+ */
  color: #bbb;
}
:-moz-placeholder { /* Firefox 4 - 18 */
  color: #bbb;
}
</style>
  <script type="text/javascript">
    hideChat(0);

$('#prime').click(function() {
  toggleFab();
});


//Toggle chat and links
function toggleFab() {
  $('.prime').toggleClass('zmdi-comment-outline');
  $('.prime').toggleClass('zmdi-close');
  $('.prime').toggleClass('is-active');
  $('.prime').toggleClass('is-visible');
  $('#prime').toggleClass('is-float');
  $('.chat').toggleClass('is-visible');
  $('.fab').toggleClass('is-visible');
  
}

  $('#chat_first_screen').click(function(e) {
        hideChat(1);
  });

  $('#chat_second_screen').click(function(e) {
        hideChat(2);
  });

  $('#chat_third_screen').click(function(e) {
        hideChat(3);
  });

  $('#chat_fourth_screen').click(function(e) {
        hideChat(4);
  });

  $('#chat_fullscreen_loader').click(function(e) {
      $('.fullscreen').toggleClass('zmdi-window-maximize');
      $('.fullscreen').toggleClass('zmdi-window-restore');
      $('.chat').toggleClass('chat_fullscreen');
      $('.fab').toggleClass('is-hide');
      $('.header_img').toggleClass('change_img');
      $('.img_container').toggleClass('change_img');
      $('.chat_header').toggleClass('chat_header2');
      $('.fab_field').toggleClass('fab_field2');
      $('.chat_converse').toggleClass('chat_converse2');
      //$('#chat_converse').css('display', 'none');
     // $('#chat_body').css('display', 'none');
     // $('#chat_form').css('display', 'none');
     // $('.chat_login').css('display', 'none');
     // $('#chat_fullscreen').css('display', 'block');
  });

function hideChat(hide) {
    switch (hide) {
      case 0:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'block');
            $('.chat_fullscreen_loader').css('display', 'block');
             $('#chat_fullscreen').css('display', 'none');
            break;
      case 1:
            $('#chat_converse').css('display', 'block');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
      case 2:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'block');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
      case 3:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'block');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
      case 4:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            $('#chat_fullscreen').css('display', 'block');
            break;
    }
}


  </script>     
<style >
	.open-button {
  background-color: #609930;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  /*width: 280px;*/
   z-index: 9999;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: none;
  z-index: 9999;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
<style type="text/css">
   html {
  scroll-behavior: smooth;
}
</style>
<script >
	 function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       
</script>

<input type="hidden" id="message_count" value="0">
<script>
   var base_url = '<?=base_url()?>';

    function verify(){

    
   var mobile = $("#mobiles").val();
   $.ajax({
    url: base_url+"Diet/checkmobileForChat",
    cache: false,
    data: {mobile : mobile},
     type: "POST",
    success: function(res){
      var response = JSON.parse(res);
      if(response.status==1){ // New user
          addUser(response.id,mobile);
      }else{ //Old user
        getMessages(response.id);
      } 

    getmessagecounter(response.id);
    updateonlineStatus(response.id);
    $("#uid").val(response.id);
    }
  });

    $("#myForm").hide() ;
    $('#chatclosed').hide();
    $("#messagechat").show() ;
    $(".chat").addClass("is-visible");
    $(".fab").addClass("is-float is-visible");
    $(".prime").removeClass("zmdi-comment-outline");
    $(".prime").addClass("zmdi-close is-active is-visible");
}

function updateonlineStatus(id){
	 var child ={};
   	 child.onlineStatus = '1';
   	 var strTime = (new Date()).getTime()+"";
   	 child.lastSeen = strTime;
     (ref(firebase)).getchatroomInfoRef(id).update(child);
}
function getmessagecounter(id){

var userId = id;
  (ref(firebase)).getchatroomInfoRef(userId).on('value', snap => {


                  childSnapshot = snap;
                   var childKey = childSnapshot.key;
                     var childData1 = childSnapshot.val();
                 console.log(childData1);
                     var message_counter = childData1.message_counter;
                     if(message_counter!='undefined'){
                     
                        $("#message_count").val(message_counter);

                     
                     }
                });
}
function addUser(id,mobile){

 var userInfo = {};
 var chatRoom ={};
userInfo.uniqueId =id;
userInfo.name = mobile;
userInfo.lastActivity = "Welcome to Dietghar, How may I Help you ?";
userInfo.profilePic =base_url+'chat/chat-assets/4.png';
chatRoom.message_counter = 0;
chatRoom.uniqueId =id;
(userRepo(firebase)).addUser(userInfo);
(chatroomRepo(firebase)).addUser(chatRoom);
sendMessageFirst(id)

}
function updatemessagecounter(id){
  var child ={};
   var message_counter = $("#message_count").val();
                     child.message_counter = parseInt(message_counter)+1;
                     (ref(firebase)).getchatroomInfoRef(id).update(child);
              
}
  function sendMessageFirst(id){
  var messageInfo = {};
  var msg = "Welcome to Dietghar, How may I Help you ?";
  var batchId = id;
  messageInfo.msg = msg;                                   
  messageInfo.msgStatus = 0;
  messageInfo.sentFromAdmin = true;
  (messageRepo(firebase)).sendMessgae(batchId,messageInfo);
  userlastActivity(id,msg);
  getMessages(id);
 
  }
   function sendMessage(type=0){
  var id = $("#uid").val();
  var messageInfo = {};
  var msg = $("#chatSend").val();
  var batchId = id;
  messageInfo.msg = msg;                                   
  messageInfo.msgStatus = 0;
  messageInfo.sentFromAdmin = false;
  messageInfo.Messagetype = type;
  (messageRepo(firebase)).sendMessgae(batchId,messageInfo);
  userlastActivity(id,msg);
  $("#chatSend").val('');
  // getMessages(id);
 
  }
  function userlastActivity(id,message){
  var child ={};
  child.lastActivity = message;
  child.is_typing = false;
  child.is_online = true;
    var strTime = (new Date()).getTime()+"";
                child.timespam= strTime;
    (ref(firebase)).getUserInfoRef(id).update(child);
    updatemessagecounter(id);
}
$('.card-body').scrollTop(1000000);
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

 function fncConvertDateTime(argTimeStamp) {
                                strDateNew = "";
                                var strDate = new Date((argTimeStamp / 1000));

                                date = new Date(strDate * 1000),
                                        datevalues = [
                                            date.getFullYear(),
                                            date.getMonth() + 1,
                                            date.getDate(),
                                            date.getHours(),
                                            date.getMinutes(),
                                            date.getSeconds(),
                                        ];
//                    alert(childData.timeStamp);
                                var am_pm = date.getHours() >= 12 ? "PM" : "AM";
                                var stMonth = date.getMonth() + 1;
                                var strDateNew = date.getFullYear() + "-" + stMonth + "-" + date.getDate() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds() + " " + am_pm;
//                                var strSendDateNewTime = date.getHours() + ":" + date.getMinutes() + " " + am_pm;
                                return strDateNew;
                            }
 function getMessages(id) {

        var batchId = id;
        var htm = '';
        // $("#chat_from_fb").html(htm);         
      (ref(firebase)).getMessageRefById(batchId).orderByChild("timeStamp")
                .on('child_added', snap => {

                  childSnapshot = snap;
                    var childKey = childSnapshot.key;
                    var childData = childSnapshot.val();
                  console.log(childData);
                   /* User Chat start */

                    htm ='';
           
             var time = fncConvertDateTime(childData.timeStamp);
            if(childData.sentFromAdmin==true){
              /* Message From Admin Side */
             if(childData.Messagetype==2){
             	htm+='<span class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg"/></div><img src="'+childData.msg+'" style="height:150px;width:150px;"></span>';
           
        	}else{
        		 htm+='<span class="chat_msg_item chat_msg_item_admin"><div class="chat_avatar"><img src="http://res.cloudinary.com/dqvwa7vpe/image/upload/v1496415051/avatar_ma6vug.jpg"/></div>'+childData.msg+'</span>';
        	}
            }else{
              /* Message From User Side */
              if(childData.Messagetype==2){
                 /*htm+='<span class="chat_msg_item chat_msg_item_user">'+childData.msg+'</span>';
               htm+='<span class="status">'+time+'</span>';*/
              	 htm+='<span class="chat_msg_item chat_msg_item_user"><img src="'+childData.msg+'" style="height:150px;width:150px;"></span>';
             	 htm+='<span class="status">'+time+'</span>';
              }else{
              	 htm+='<span class="chat_msg_item chat_msg_item_user">'+childData.msg+'</span>';
             	 htm+='<span class="status">'+time+'</span>';
              }
            
           }
            
            

        

              /* open Chat box */

              $(".chat").addClass("is-visible");
              $(".fab").addClass("is-float is-visible");
              $(".prime").removeClass("zmdi-comment-outline");
              $(".prime").addClass("zmdi-close is-active is-visible");

              /* Display Message */
              $("#chat_from_fb").append(htm); 
                
                

                

                });
            
  }
  function sendMessageonenter(e){
  var key = e.which;
 
    if(key == 13) {
      sendMessage();
     }
}


/* Send Files */

function sendfiles(){

var data = new FormData(); 
 
var file = $("#file-input")[0].files[0];
data.append('file', file, file.name);
var xhr = new XMLHttpRequest();     
 xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	var response = JSON.parse(this.responseText);
      if(response.status==1){ // Success
      	$("#file-input").val('');
      	$("#chatSend").val(response.path);
      	sendMessage(2);
      }else{ //Old user
        alert(response.message);
      } 
    }
  };
var url = base_url+"Diet/uploadFiles";
xhr.open('POST', url, true);  
xhr.send(data);

 }


/* Retrive chat from Session */

$(document).ready(function(){
 	var id = '<?php echo $_SESSION['user_id']?>';
 	if(id!=''){
		getMessages(id);
		updateonlineStatus(id);
		$("#uid").val(id);
		$("#myForm").hide() ;
		$('#chatclosed').hide();
		$("#messagechat").show() ;
		$(".chat").addClass("is-visible");
		$(".fab").addClass("is-float is-visible");
		$(".prime").removeClass("zmdi-comment-outline");
		$(".prime").addClass("zmdi-close is-active is-visible");
 	}
});

/* Close browser Event*/
function ConfirmLeave() {
    confirm("sure ?")
}
var prevKey="";
$(document).keydown(function (e) { 
	// alert(e.key)
    if (e.key=="F5") {
        window.close = ConfirmLeave;
    }
    else if (e.key.toUpperCase() == "W" && prevKey == "CONTROL") {                
        window.close = ConfirmLeave;   
    }
    else if (e.key.toUpperCase() == "R" && prevKey == "CONTROL") {
        window.close = ConfirmLeave;
    }
    else if (e.key.toUpperCase() == "F4" && (prevKey == "ALT" || prevKey == "CONTROL")) {
    	//alert("here")
        //window.close = ConfirmLeave;
        ConfirmLeave()
    }
    prevKey = e.key.toUpperCase();
});
$(document).keypress(function (e) { 
	// alert(e.key)
    
    prevKey = e.key.toUpperCase();
});

function sumbitEnter(){

  var mob = $("#mobiles").val();
 if(mob.length==10){
  $("#verify").click();
 }
}

</script>
<style type="text/css">
  .image-upload > input
{
    display: none;
}

.image-upload img
{
    cursor: pointer;
}
</style>