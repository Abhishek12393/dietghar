<?php include('header.php'); include('sidebar.php');?>
<link rel="stylesheet" href="https://dietghar.com/diet/user/new_assets/css/device-desktop.css?v=53">
<link rel="stylesheet" href="https://dietghar.com/diet/user/new_assets/css/device-ipad.css?v=53">
<link rel="stylesheet" href="https://dietghar.com/diet/user/new_assets/css/device-mobile.cssx?v=53">

<style type="text/css">
body {background-color: #ffadd1 !important;}
button.footer_btn {font-weight: 600;color: #58508d;padding: 7px;font-size: 12px;border-radius:4px;background-color: #fff;}
.mt-5, .my-5 {margin-top: -2rem !important;}
.wrapper .sidebar ul li:nth-child(4) {border-right: 5px solid #667acd !important;border-radius: 5px;}
.media {display: block;}
.media-measurements .media-body {padding: 3px 0 0 !important;}
.input-number-nexk-size {width: 100% !important;padding: 9px;background: #f1f1f1;border: 1px solid #cecece;border-radius: 5px;text-align: center;}
.imgset{float: left;margin: 5px;}
.measure-top{margin-top:120px !important;}
</style>
<link rel="stylesheet" href="https://dietghar.com/diet/user/assets/css/res-style.css">

<div class="content-body">
<div class="container-fluid">
<div class="row">

<section style="background: #ffadd1;background-size: 100% 100%;">
<div class="container p-viewport-devices">
<div class="row">
<main role="main" class="col-xl-12">
<div class="row ">
<div class="col-md-3"></div>
<div class="col-md-6">
<h1 style="text-align: center; margin-top:0px;"> Measurements </h1>
<p style="text-align: center;color:#000 !important;"> <span> Note: </span> please provide accurate information for best results </p>
</div>
<div class="col-md-3"></div>
</div> 
</main>
<section class="container p-xl-5 p-md-5 p-sm-5">
<div class="row second_con mt-5">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-6 h-set" style="align-self: flex-end">
<form method="post" action="https://dietghar.com/diet/User/submitMeasurement">
  <div id="Paris" class="tabcontent-gender" style="display:block;">
  <!-- <input type="hidden" name="datem" value="2021-09-07"> -->
  <input type="hidden" name="url" value="female_measurement">
  <div class="row" style="text-align: center;">
  <div class="col-md-3">
  <!-- <div class="side-section-1-measurements">
  <h4 class="media-heading-measurements">Body Weight </h4> 
  <div class="media media-measurements">                        
  <div class="media-left">
  <img src="https://dietghar.com/diet/user/assets/images/MEN/neck_size.png" alt="neck_size" class="media-object-measurements">
  </div>
  <div class="media-body">                                                   
  <input id="bodyweight" type="number" name="weight" onkeypress="javascript:return isNumber(event)" class="input-number-nexk-size" min="30" max="160" step="00" pattern="^\d+(?:\.\d{2,1})?$" onblur="
  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{2,1})?$/.test(this.value)?'inherit':'red'" autocomplete="off" placeholder="00 kg" required="" tabindex="1" value="<?=$user_details[0]['heighest_weight_ever']; ?>">
  </div>
  </div>
  <a href="#" data-toggle="modal" data-target="#view-full-images" class="tag-view-full-images-mes measure-top"> How to Measure </a>
  </div> -->
  <div class="side-section-1-measurements">
  <h4 class="media-heading-measurements"> Neck Size </h4> 
  <div class="media media-measurements">                        
  <div class="media-left">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/neck_size.png" alt="neck_size" class="media-object-measurements">
  </div>
  <div class="media-body">                                                   
  <input type="number" name="neck" onkeypress="javascript:return isNumber(event)" class="input-number-nexk-size" min="12" max="60" step="00.1" pattern="^\d+(?:\.\d{2,1})?$" onblur="
  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{2,1})?$/.test(this.value)?'inherit':'red'" autocomplete="off" placeholder="00.0 inches" required="" tabindex="3" value="<?=$user_details[0]['neck']; ?>">
  </div>
  </div>
  <a href="#" data-toggle="modal" data-target="#view-full-images" class="tag-view-full-images-mes measure-top"> How to Measure </a>
  </div>
  <div class="side-section-1-measurements">
  <h4 class="media-heading-measurements"> Chest Size </h4> 
  <div class="media media-measurements">                        
  <div class="media-left">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/chest_size.png" alt="neck_size" class="media-object-measurements">
  </div>
  <div class="media-body">                                                   
  <input type="number" name="chest" onkeypress="javascript:return isNumber(event)" class="input-number-nexk-size" min="30" max="60" step="00.1" pattern="^\d+(?:\.\d{2,1})?$" onblur="
  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{2,1})?$/.test(this.value)?'inherit':'red'" autocomplete="off" placeholder="00.0 inches" required="" tabindex="5" value="<?=$user_details[0]['chest']; ?>">
  </div>
  </div>
  <a href="#" data-toggle="modal" data-target="#view-full-images1" class="tag-view-full-images-mes measure-top"> How to Measure </a>
  </div>
  <div class="side-section-1-measurements">
  <h4 class="media-heading-measurements"> Waist Size </h4> 
  <div class="media media-measurements">                        
  <div class="media-left">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/waist_size.png" alt="neck_size" class="media-object-measurements">
  </div>
  <div class="media-body">                                                   
  <input type="number" name="Waist" onkeypress="javascript:return isNumber(event)" class="input-number-nexk-size" min="28" max="65" step="00.1" pattern="^\d+(?:\.\d{2,1})?$" onblur="
  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{2,1})?$/.test(this.value)?'inherit':'red'" autocomplete="off" placeholder="00.0 inches" required="" tabindex="7" value="<?=$user_details[0]['Waist']; ?>">
  </div>
  </div>
  <a href="#" data-toggle="modal" data-target="#view-full-images2" class="tag-view-full-images-mes measure-top"> How to Measure </a>
  </div>
  </div>
  <div class="col-md-6">
  <div class="measurements-0list-main-images-list-set-23">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/circle.png" class="circle-woman-img-measuements-235235">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/woman_image.png" class="woman-img-measuements-235235">
  </div>
  </div>
  <div class="col-md-3">
  <div class="side-section-1-measurements">
  <h4 class="media-heading-measurements"> Hip Size </h4> 
  <div class="media media-measurements">                        
  <div class="media-left">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/hip_size.png" alt="neck_size" class="media-object-measurements">
  </div>
  <div class="media-body">                                                   
  <input type="number" name="hip" onkeypress="javascript:return isNumber(event)" class="input-number-nexk-size" min="30" max="85" step="00.1" pattern="^\d+(?:\.\d{2,1})?$" onblur="
  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{2,1})?$/.test(this.value)?'inherit':'red'" autocomplete="off" placeholder="00.0 inches" required="" tabindex="2" value="<?=$user_details[0]['hip']; ?>">
  </div>
  </div>
  <a href="#" data-toggle="modal" data-target="#view-full-images3" class="tag-view-full-images-mes measure-top"> How to Measure </a>
  </div>
  <div class="side-section-1-measurements">
  <h4 class="media-heading-measurements"> Arm Size </h4> 
  <div class="media media-measurements">                        
  <div class="media-left">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/arm_size.png" alt="neck_size" class="media-object-measurements">
  </div>
  <div class="media-body">                                                   
  <input type="number" name="arm" onkeypress="javascript:return isNumber(event)" class="input-number-nexk-size" min="12" max="30" step="00.1" pattern="^\d+(?:\.\d{2,1})?$" onblur="
  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{2,1})?$/.test(this.value)?'inherit':'red'" autocomplete="off" placeholder="00.0 inches" required="" tabindex="4" value="<?=$user_details[0]['arm']; ?>">
  </div>
  </div>
  <a href="#" data-toggle="modal" data-target="#view-full-images4" class="tag-view-full-images-mes measure-top"> How to Measure </a>
  </div>
  <div class="side-section-1-measurements">
  <h4 class="media-heading-measurements"> Thigh Size </h4> 
  <div class="media media-measurements">                        
  <div class="media-left">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/thing_size.png" alt="neck_size" class="media-object-measurements">
  </div>
  <div class="media-body">                                                   
  <input type="number" name="thigh" onkeypress="javascript:return isNumber(event)" class="input-number-nexk-size" min="18" max="45" step="00.1" pattern="^\d+(?:\.\d{2,1})?$" onblur="
  this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{2,1})?$/.test(this.value)?'inherit':'red'" autocomplete="off" placeholder="00.0 inches" required="" tabindex="6" value="<?=$user_details[0]['thigh']; ?>">
  </div>
  </div>
  <a href="#" data-toggle="modal" data-target="#view-full-images5" class="tag-view-full-images-mes measure-top"> How to Measure </a>
  </div>
  <div style="margin-top:10px;">
  <button type="submit" class="skip-btn-measuments measuments-submit-btn" style="margin-top:20px;" tabindex="8">SUBMIT</button>
  
  <input type="button" onclick="location.href='/diet/User/index';" class="skip-btn-measuments" value="Skip" style="margin-top:10px;" tabindex="9">
  </div>
  <div class="col-md-3">
  </div>
  </div>
  <div class="row">
  <div class="col-md-6"></div>
  </div>
  </div>
  </div>
  </form>  
  </div>
  </div></section>
  </div>
  </div>
  </section>
  <div id="view-full-images" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">×</button>
  <h4 class="modal-title-measurements-set"> View Full Images </h4>
  </div>
  <div class="modal-body">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/Woman_Neck.png" style="width: 100%;">
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>
  <div id="view-full-images1" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title-measurements-set"> View Full Images </h4>
  <button type="button" class="close" data-dismiss="modal">×</button>
  </div>
  <div class="modal-body">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/Woman_Chest.png" style="width: 100%;">
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>
  <div id="view-full-images2" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title-measurements-set"> View Full Images </h4>
  <button type="button" class="close" data-dismiss="modal">×</button>
  </div>
  <div class="modal-body">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/Woman_Waist.png" style="width: 100%;">
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>
  <div id="view-full-images3" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title-measurements-set"> View Full Images </h4>
  <button type="button" class="close" data-dismiss="modal">×</button>
  </div>
  <div class="modal-body"><img src="https://dietghar.com/diet/user/assets/images/WOMAN/Woman_Hip.png" style="width: 100%;"></div>
  <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
  </div>
  </div>
  </div>
  <div id="view-full-images4" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title-measurements-set"> View Full Images </h4>
  <button type="button" class="close" data-dismiss="modal">×</button>
  </div>
  <div class="modal-body">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/Woman_Arm.png" style="width: 100%;">
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>
  <div id="view-full-images5" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title-measurements-set"> View Full Images </h4>
  <button type="button" class="close" data-dismiss="modal">×</button>
  </div>
  <div class="modal-body">
  <img src="https://dietghar.com/diet/user/assets/images/WOMAN/Woman_Thigh.png" style="width: 100%;">
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
  </div>
  </div>
  </div>
  <script type="text/javascript">
  function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
    return false;
    return true;
  }
  </script>
  <script src="https://dietghar.com/diet/user/assets/images/WOMAN/jquery-3.js"></script>
  <script src="https://dietghar.com/diet/user/assets/images/WOMAN/bootstrap.js"></script>
  
  </div>
  </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="replyModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h5 class="modal-title">Post Reply</h5>
  <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
  </div>
  <div class="modal-body"><form><textarea class="form-control" rows="4">Message</textarea></form></div>
  <div class="modal-footer">
  <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Reply</button>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <?php include('footer.php'); ?>