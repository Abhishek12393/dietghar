<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>DietGhar || Registration</title>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Cabin'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  body {
  font-family: 'Cabin', sans-serif;
}
input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 2px solid black;
    width: 100%;
}
#wizard {
  top: 120px;
  position: relative;
 
  padding: 20px;
}

#wzd-content {
  font-size: 20px;
}

.btn-wzd {
  font-size: 2em;
  color: #000;
}
.imglogo {
    height: 110px;
    /*background-color: #333;*/
    border-radius: 50%;
    padding: 10px;
    text-align: center;
   
}
.mbtel{
      width: 100%;
    margin: 0px 0px 15px;
    height: 40px;
    padding: 5px 10px;
  
    color: #333;
}
.paddtp25 {
    padding-top: 26px;
}
.sideright input[name="otp"] {
    border: none;
    border-bottom: 1px solid black;
    border-radius: 0px;
    width: 14%;
    float: left;
    margin-right: 2%;
    text-align: center;
}
.show_inside_form {
    display: none;
}
.sideright p {
    text-align: center;
    color: #333;
    font-size: 18px;
    margin-top: 10px;
}
.resendbtn {
    color: #669544;
     text-align: center;
     font-size: 14px;
    margin-top: 10px;
    padding-left: 40%;
}
.sideright .icons-block label > input {
    visibility: hidden;
    position: absolute;
}
.hgt150{
  height: 150px;
}
.hgt100{
  height: 100px;
}
.btn-primary{
  background-color: rgb(67, 47, 203) !important;
}
 input:focus { 
            background-color: transparent; 
        }
</style>
<style>
    .fishes
    {
        position: relative;
        top: 0;
        left: 0;
        height: 90px;
    }
    .fish
    {
        position: absolute;
        top: -15px;
        left: -13px;
        height: 120px;
    }
    .cap {
     text-transform: capitalize !important;
    }
    </style>
    <style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}
</style>
<script type="text/javascript">
   $(document).ready(function() {
        $("#txtDate").keyup(function(){
            if ($(this).val().length == 2 || $(this).val().length == 5){
                $(this).val($(this).val() + "/");
            }
        });
    });
</script>
<script type="text/javascript">
    var baseURL= '<?=base_url()?>';

</script>
</head>
<body >
<!-- partial:index.partial.html -->
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 col-sm-12">
     
      <div id="wizard">
        <!-- Tab panes -->
        <div class="tab-content sideright">
          <!-- STEP 1 -->

          <div role="tabpanel" class="tab-pane active" id="step1">
            <!-- Progress at step -->
            <div class="row">
            <div class="col-md-4 col-sm-4"></div>
            <div class="col-md-4 col-sm-4" style="padding-left: 8%;">
              <img src="https://dietghar.com/assets/dlogo.svg" class="imglogo">
            </div>
             <div class="col-md-4 col-sm-4"></div>
           </div>
            <!-- Step Title -->
           
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
              <div class="col-md-12 paddtp25">
               
                    <input name="mobile" id="uintTextBox" onkeyup="mobiles();" autofocus="" type="tel" class="input-box required error mbtel" maxlength="10" placeholder="Mobile Number"  value="" required="" >
                  
              </div>
                <div class="form-body show_inside_form w3-animate-bottom sideright" id="show_otp">
                                    <div class="formtitle ">
                                        <p>Please enter the OTP:</p>
                                    </div>
                                    <div class="input otp_field">
                                       <input id="quantity"  name="otp" type="tel" class="" maxlength="1"  required="" autofocus=""  onkeyup="forward(event,'','quantity','quantity1');"><span id="errmsg" style="display: none;"></span>
                                       <input id="quantity1" name="otp" type="tel" class="input-box required error" maxlength="1" required="" autofocus="" onkeyup="forward(event,'quantity','quantity1','quantity2');" ><span id="errmsg" style="display: none;"></span>
                                       <input id="quantity2" name="otp" type="tel" class="input-box required error" maxlength="1"  required="" autofocus="" onkeyup="forward(event,'quantity1','quantity2','quantity3');" ><span id="errmsg" style="display: none;"></span>
                                       <input id="quantity3" name="otp" type="tel" class="input-box required error" maxlength="1"  required="" autofocus=""onkeyup="forward(event,'quantity2','quantity3','quantity4');"><span id="errmsg" style="display: none;"></span>
                                       <input id="quantity4" name="otp" type="tel" class="iinput-box required error" maxlength="1"  required="" autofocus="" onkeyup="forward(event,'quantity3','quantity4','quantity5');"><span id="errmsg" style="display: none;"></span>
                                       <input id="quantity5" name="otp" type="tel" class="input-box required error" maxlength="1" required="" autofocus="" onkeyup="nextSteps('quantity5','abcd',1)" onkeydown ="forward(event,'quantity4','quantity5');"><span id="errmsg" style="display: none;"></span>
                                     
                                    </div>

                                     <a href="#" class="resendbtn">Resend the OTP</a>
                                         <span style="display: none ;color: #d23f3f"  id="incorrectotp">Incorrect OTP</span>
            </div>
            </div>
            <!-- Step navigation controls -->
         <div id="wzd-nav" class="row" style="display: none;">
              <div id="nav-controls" class="col-md-offset-6 col-md-6">
                <a class="btn btn-primary" id="abcd" href="#step2" aria-controls="step2" role="tab" data-toggle="tab">OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                 <p class="btn btn-wzd">press ENTER</p>
              </div>
            </div>
          </div>
          <!-- END STEP 1 -->
          <div role="tabpanel" class="tab-pane" id="step2">
            
            <!-- Step title -->
            <h1 class="text-center">Select Your Gender?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10 select__gender onchangenextbtn w3-animate-zoom">
              <div class="col-md-offset-1 col-md-6 icons-block">
                <a class="btn btn-wzd nav-next" onclick="updateData('id','customers_info','gender','2','newnewstep3')" aria-controls="step3" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input class="gender rad" name="gender" value="2" type="radio">
                    <img src="http://junky.tech/Diet/images/female.svg">
                     <div class="formtitle ">
                                        <p>Female</p>
                                    </div>
                  </label>
                </div>
              </a>
              <span style="display: none;">
              <a href="#step3" id="newnewstep3" aria-controls="step5" role="tab" data-toggle="tab" >Click</a>
            </span>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next disabled" href="#step3" aria-controls="step3" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input class="custom-select-box pra rad" name="gender" value="male" type="radio" disabled="">
                   
                  <img src="http://junky.tech/Diet/images/male.svg" style="height: 56px;width: 56px;">
                   <div class="formtitle ">
                                        <p>Male</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
            
            </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step1" aria-controls="step1" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="step3">
            <div class="row">
              <div class="col-md-4 col-sm-4"></div>
              <div class="col-md-4 col-sm-4">
                  <img src="http://junky.tech/Diet/images/dob.svg" class="hgt150">
              </div>
              <div class="col-md-4 col-sm-4"></div>
            </div>
             
            <!-- Step title -->
            <h1 class="text-center">Enter Date Of Birth?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                <div class="row">
                 
                   <div class="col-md-offset-4 col-md-5"><br>
                     <input type="text"  id="txtDate" maxlength="10" value="" onkeypress="javascript:return isNumber(event)" name="date_of_birth" placeholder="DD/MM/YYYY"  style="width: 82%;" onkeyup="nextSteps('txtDate','newstep4',10)" >
                   </div>
                   
                </div>
            </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step2" aria-controls="step2" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a style="display: none;" class="btn btn-wzd nav-next" id="newstep4" href="#step4" aria-controls="step4" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="step4">
           
            <div class="row">
              <div class="col-md-4 col-sm-4"></div>
              <div class="col-md-4 col-sm-4">
                  <img src="http://junky.tech/Diet/images/height.svg" class="hgt150">
              </div>
              <div class="col-md-4 col-sm-4"></div>
            </div>
             
            <!-- Step title -->
            <h1 class="text-center">Enter Your Height</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                <div class="row">
                 
                <div class="col-md-offset-3 col-md-1" style="padding: 0px;"><br>
                     <input type="number" id="feet" min="4" max="6" onkeyup="minMaxNumValidationfeet(4,6,'feet')" name="feet" value="" >
                </div>
                 <div class="col-md-2"><br>
                     <label>Feet</label>
                </div>
                <div class="col-md-1" style="padding: 0px;"><br>
                     <input type="number" id="inch" min="0" max="11"   onkeyup="minMaxNumValidation(event,0,11,'inch','newstep5','newnewstep5')" name="feet" value="">
                </div>
                <div class="col-md-2"><br>
                      <label>Inch</label>
                </div>
                  
                </div>
            </div>
           
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-4 col-md-8"><br>
                <a class="btn btn-wzd nav-previous" href="#step3" aria-controls="step3" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               <!--  <a class="btn btn-wzd nav-next" href="#step5" aria-controls="step5" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-right"></i></a> -->
               <span style="display: none;" id="newstep5">
                 <a class="btn btn-primary"   onclick="submitFunction('newnewstep5')" >OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                  <a class="btn btn-primary" style="display: none;" id="newnewstep5" href="#step5"  aria-controls="step5" role="tab" data-toggle="tab">OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                 <p class="btn btn-wzd">press ENTER</p>
               </span>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="step5">
           
            <div class="row">
              <div class="col-md-4 col-sm-4"></div>
              <div class="col-md-4 col-sm-4">
                  <img src="http://junky.tech/Diet/images/weight.svg" class="hgt150">
              </div>
              <div class="col-md-4 col-sm-4"></div>
            </div>
             
            <!-- Step title -->
            <h1 class="text-center">Enter Your Weight(In Kgs)</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                <div class="row">
                    <div class="col-md-offset-5 col-md-1" style="padding: 0px;"><br>
                     <input type="text"  id="weight" name="weight" onkeypress="javascript:return isNumber(event)" onkeyup="minMaxNumValidation(event,1,299,'weight','newstep6','newnewstep6')" value="" >
                </div>
                 <div class="col-md-2"><br>
                     <label>Kgs</label>
                </div>
                    
                </div>
            </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-4 col-md-8"><br>
                <a class="btn btn-wzd nav-previous" href="#step4" aria-controls="step4" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               <!--  <a class="btn btn-wzd nav-next" href="#step6" aria-controls="step6" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-right"></i></a> -->
                <span style="display: none;" id="newstep6">
                  <a class="btn btn-primary"   onclick="submitFunction('newnewstep6')" >OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                 <a class="btn btn-primary" id="newnewstep6" href="#step6" style="display: none;" aria-controls="step6" role="tab" data-toggle="tab">OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                 <p class="btn btn-wzd">press ENTER</p>
               </span>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="step6">
            
            <!-- Step title -->
            <h1 class="text-center">What is your First Name?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                <div class="row">
                    <div class="col-md-12">
                         <br>
                         <input type="text"  name="name" id="fname" onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"  placeholder="Firstname" onkeyup="showEnterButton(event,'fname','newstep7',2,'newnewstep7')"/>
                      
                </div>
            </div>
          </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
             <div id="nav-controls" class="col-md-offset-4 col-md-8"><br>
                <a class="btn btn-wzd nav-previous" href="#step5" aria-controls="step5" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               <!--  <a class="btn btn-wzd nav-next" href="#step7" aria-controls="step7" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-right"></i></a> -->
               <span style="display: none;" id="newstep7">
                  <a class="btn btn-primary"   onclick="submitFunction('newnewstep7')" >OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>

                 <a class="btn btn-primary" id="newnewstep7" href="#step7" style="display: none" aria-controls="step7" role="tab" data-toggle="tab">OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                 <p class="btn btn-wzd">press ENTER</p>
               </span>
              </div>
            </div>
          </div>
           <div role="tabpanel" class="tab-pane" id="step7">
            
            <!-- Step title -->
            <h1 class="text-center">What is your Last Name?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                <div class="row">
                    <div class="col-md-12"><br>
                          <input type="text" class="cap" name="lastname" id="lname" onkeypress="return (event.charCode > 64 && 
                                 event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"  placeholder="Lastname" onkeyup="showEnterButton(event,'lname','newstep8',2,'newnewstep8')"/>
                    </div>
            </div>
          </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
             <div id="nav-controls" class="col-md-offset-4 col-md-8"><br>
                <a class="btn btn-wzd nav-previous" href="#step6" aria-controls="step6" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
              <span style="display: none;" id="newstep8">
                  <a class="btn btn-primary"   onclick="submitFunction('newnewstep8')" >OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>

                 <a class="btn btn-primary" id="newnewstep8" href="#step8" style="display: none" aria-controls="step8" role="tab" data-toggle="tab">OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                 <p class="btn btn-wzd">press ENTER</p>
               </span>
              </div>
            </div>
          </div>
           <div role="tabpanel" class="tab-pane" id="step8">
            
            <!-- Step title -->
            <h1 class="text-center">What is your Pincode?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                <div class="row"><br>
                    <div class="col-md-offset-4 col-md-4">
                          <input type="text" name="pincode" id="pincode" onkeypress="javascript:return isNumber(event)" onkeyup="nextSteps('pincode','newstep9',6)"  placeholder="Pincode" maxlength="6" style="width: 65%;" />
                    </div>
            </div>
          </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
             <div id="nav-controls" class="col-md-offset-4 col-md-8"><br>
                <a class="btn btn-wzd nav-previous" href="#step7" aria-controls="step7" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
                 <span style="display: none;">

                  <a class="btn btn-wzd nav-next" id="newstep9" href="#step9" aria-controls="step9" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-right"></i></a>
               
               </span>
              </div>
            </div>
          </div>
           <div role="tabpanel" class="tab-pane" id="step9">
            
            <!-- Step title -->
            <h1 class="text-center">What is your House No?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                <div class="row">
                    <div class="col-md-12"><br>
                           <input type="text" name="houseno"  placeholder="House No" id="houses" onkeyup="showEnterButton(event,'houses','newstep10',2,'newnewstep10')"/>
                    </div>
            </div>
          </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-4 col-md-8"><br>
                <a class="btn btn-wzd nav-previous" href="#step8" aria-controls="step8" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <span style="display: none;" id="newstep10">
                  <a class="btn btn-primary"   onclick="submitFunction('newnewstep10')" >OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>

                 <a class="btn btn-primary" id="newnewstep10" style="display: none;" href="#step10" aria-controls="step10" role="tab" data-toggle="tab">OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                 <p class="btn btn-wzd">press ENTER</p>
               </span>
              </div>
            </div>

          </div>
          <div role="tabpanel" class="tab-pane" id="step10">
            
            <!-- Step title -->
            <h1 class="text-center">What is your Address</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                <div class="row">
                    <div class="col-md-12"><br>
                            <input type="text" name="address" placeholder="Address" class="cap" id="address" onkeyup="showEnterButton(event,'address','newstep11',2,'newnewstep11')"/>
                    </div>
            </div>
          </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-4 col-md-8"><br>
                <a class="btn btn-wzd nav-previous" href="#step9" aria-controls="step9" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               <span style="display: none;" id="newstep11">
                  <a class="btn btn-primary"   onclick="submitFunction('newnewstep11')" >OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>

                 <a class="btn btn-primary" id="newnewstep11" style="display: none;" href="#step11" aria-controls="step11" role="tab" data-toggle="tab">OK &nbsp;&nbsp;<i class="fa fa-check" aria-hidden="true"></i></a>
                 <p class="btn btn-wzd">press ENTER</p>
               </span>
              </div>
            </div>
          </div>
           <div role="tabpanel" class="tab-pane" id="step11">
            
            <!-- Step title -->
            <h1 class="text-center">What’s Your Objective?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-offset-1 col-md-6 icons-block">
                <a class="btn btn-wzd nav-next" href="#step12" aria-controls="step12" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="objective" value="Loose weight" type="radio">
                    <img src="http://junky.tech/Diet/images/loseweight.svg" class="hgt100">
                     <div class="formtitle ">
                                        <p>Loose weight</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step12" aria-controls="step12" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="objective" value="Gain weight" type="radio">
                   
                  <img src="http://junky.tech/Diet/images/gainweight.svg" class="hgt100">
                   <div class="formtitle ">
                                        <p>Gain weight</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
             <div class="col-md-offset-1 col-md-6 icons-block">
                <a class="btn btn-wzd nav-next" href="#step12" aria-controls="step12" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="objective" value="Muscle Gain" type="radio">
                    <img src="http://junky.tech/Diet/images/musclegain.svg" class="hgt100">
                     <div class="formtitle ">
                                        <p>Muscle Gain</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step12" aria-controls="step12" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="objective" value="Be healthy" type="radio" >
                   
                  <img src="http://junky.tech/Diet/images/behealthy.svg" class="hgt100">
                   <div class="formtitle ">
                                        <p>Be healthy</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
            </div>
           
               <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step10" aria-controls="step10" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               
              </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="step12">
            
            <!-- Step title -->
            <h1 class="text-center">LIFESTYLE</h1>
            <h3 class="text-center">What’s Your Lifestyle?</h3>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-offset-2 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step13" aria-controls="step13" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="lifestyle" value="I barely move" type="radio">
                    <img src="http://junky.tech/Diet/images/1.svg" class="hgt100">
                     <div class="formtitle ">
                                        <p>I barely move</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step13" aria-controls="step13" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="lifestyle" value="Not that active" type="radio">
                   
                  <img src="http://junky.tech/Diet/images/2.svg" class="hgt100">
                   <div class="formtitle ">
                                        <p>Not that active</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
             <div class="col-md-offset-2 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step13" aria-controls="step13" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="lifestyle" value="Moderately active" type="radio">
                    <img src="http://junky.tech/Diet/images/3.svg" class="hgt100">
                     <div class="formtitle ">
                                        <p>Moderately active</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step13" aria-controls="step13" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="lifestyle" value="Very active" type="radio" >
                   
                  <img src="http://junky.tech/Diet/images/4.svg" class="hgt100">
                   <div class="formtitle ">
                                        <p>Very active</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
            </div>
           
               <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step11" aria-controls="step11" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
              
              </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="step13">
            
            <!-- Step title -->
            <h1 class="text-center">Are you married?</h1>
          
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-offset-2 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step14" aria-controls="step14" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="married" value="Yes" type="radio">
                    <img src="http://junky.tech/Diet/images/married.svg" class="hgt100">
                     <div class="formtitle ">
                                        <p>Yes</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step19" aria-controls="step19" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="married" value="No" type="radio">
                   
                  <img src="http://junky.tech/Diet/images/unmarried.svg" class="hgt100">
                   <div class="formtitle ">
                                        <p>No</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
             
            </div>
           
               <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step12" aria-controls="step12" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               
              </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="step14">
            
            <!-- Step title -->
            <h1 class="text-center">Are you Pregnant?</h1>
          
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-offset-2 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step15" aria-controls="step15" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input name="Pregnant" value="Yes" type="radio">
                    <img src="http://junky.tech/Diet/images/pregnant.svg" class="hgt100">
                     <div class="formtitle ">
                                        <p>Yes</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step17" aria-controls="step17" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="Pregnant" value="No" type="radio">
                   <div style="position: relative; left: 0; top: 0;">
                                            <img src="http://junky.tech/Diet/images/pregnant.svg" class="fishes ">
                                            <img src="http://junky.tech/Diet/images/Notpregnant.svg" class="fish ">
                                        </div>
             
                   <div class="formtitle" style="padding-top: 12px;">
                                        <p>No</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
             
            </div>
           
               <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step13" aria-controls="step13" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
                
              </div>
            </div>
            </div>
             <div role="tabpanel" class="tab-pane" id="step15">
            
            <!-- Step title -->
            <h1 class="text-center">Do you have kids?</h1>
          
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-offset-2 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step16" aria-controls="step16" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="kids" value="Yes" type="radio">
                    <img src="http://junky.tech/Diet/images/kidsyes.svg" class="hgt100">
                     <div class="formtitle ">
                                        <p>Yes</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step17" aria-controls="step17" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="kids" value="No" type="radio">
                   
                  <img src="http://junky.tech/Diet/images/kidsno.svg" class="hgt100">
                   <div class="formtitle ">
                                        <p>No</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
             
            </div>
           
               <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step14" aria-controls="step14" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               
              </div>
            </div>
            </div>
             <div role="tabpanel" class="tab-pane" id="step16">
            
            <!-- Step title -->
            <h1 class="text-center">How Many Kids/Children Do You Have?</h1>
          
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-offset-4 col-md-7">
                  <select id="children" class="form-control" onchange="nextSteps('children','newstep17',1)">
                                                <option>Select no. of children</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">3+</option>
                  </select>
              </div>
             
             
            </div>
           
               <div id="wzd-nav" class="row" >
              <div id="nav-controls" class="col-md-offset-8 col-md-4" >
                <a class="btn btn-wzd nav-previous" href="#step15" aria-controls="step15" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <span style="display: none;">
                <a class="btn btn-wzd nav-next" id="newstep17" href="#step17" aria-controls="step17" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-right"></i></a>
              </span>
              </div>
            </div>
            </div>
            <!-- Step navigation controls -->
           <div role="tabpanel" class="tab-pane" id="step17">
            
            <!-- Step title -->
            <h1 class="text-center">Any child Below 12 Months of age?</h1>
          
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-offset-2 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step18" aria-controls="step18" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="age" value="Yes" type="radio">
                    <img src="http://junky.tech/Diet/images/yes.svg" class="hgt100">
                    
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step18" aria-controls="step18" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="age" value="No" type="radio">
                   
                  <img src="http://junky.tech/Diet/images/no.svg" class="hgt100">
                   
                  </label>
                </div>
              </a>
              </div>
             
            </div>
           
               <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step16" aria-controls="step16" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               
              </div>
            </div>
            </div>

             <div role="tabpanel" class="tab-pane" id="step18">
            
            <!-- Step title -->
            <h1 class="text-center">Are you looking to conceive in nearfuture?</h1>
          
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-offset-2 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step19" aria-controls="step19" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="nearfuture" value="Yes" type="radio">
                    <img src="http://junky.tech/Diet/images/yes.svg" class="hgt100">
                    
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step19" aria-controls="step19" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="nearfuture" value="No" type="radio">
                   
                  <img src="http://junky.tech/Diet/images/no.svg" class="hgt100">
                   
                  </label>
                </div>
              </a>
              </div>
             
            </div>
           
               <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step17" aria-controls="step17" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
              
              </div>
            </div>
            </div>

             <div role="tabpanel" class="tab-pane" id="step19">
            
            <!-- Step title -->
            <h1 class="text-center">what kind of workout you follow?</h1>
          
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-4 icons-block">
                <a class="btn btn-wzd nav-next" href="#step20" aria-controls="step20" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="follow" value="At Gym" type="radio">
                    <img src="http://junky.tech/Diet/images/gym1.svg" class="hgt100">
                    <div class="formtitle ">
                                        <p>At Gym</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-4 icons-block">
                <a class="btn btn-wzd nav-next" href="#step20" aria-controls="step20" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="follow" value="At home" type="radio">
                    <img src="http://junky.tech/Diet/images/home.svg" class="hgt100">
                    <div class="formtitle ">
                                        <p>At home</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-4 icons-block">
                <a class="btn btn-wzd nav-next" href="#step20" aria-controls="step20" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="follow" value="I am super Lazy" type="radio">
                    <img src="http://junky.tech/Diet/images/1.svg" class="hgt100">
                    <div class="formtitle ">
                                        <p>I am super Lazy</p>
                                    </div>
                  </label>
                </div>
              </a>
              </div>
             
            </div>
           
               <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step18" aria-controls="step18" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
              
              </div>
            </div>
            </div>
             <div role="tabpanel" class="tab-pane" id="step20">
           
            <div class="row">
              <div class="col-md-4 col-sm-4"></div>
              <div class="col-md-4 col-sm-4">
                  <img src="http://junky.tech/Diet/images/thyroid3.svg" class="hgt100">
              </div>
              <div class="col-md-4 col-sm-4"></div>
            </div>
             
            <!-- Step title -->
            <h1 class="text-center">Are You Suffering from Thyroid?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                  <div class="col-md-offset-1 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step21" aria-controls="step21" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="Thyroid" value="Yes" type="radio">
                    <img src="http://junky.tech/Diet/images/yes.svg" class="hgt100">
                    
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step22" aria-controls="step22" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="Thyroid" value="No" type="radio">
                   
                  <img src="http://junky.tech/Diet/images/no.svg" class="hgt100">
                   
                  </label>
                </div>
              </a>
              </div>
            </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step19" aria-controls="step19" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               
              </div>
            </div>
          </div>

           <div role="tabpanel" class="tab-pane" id="step21">
            
            <!-- Step title -->
            
          
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-offset-4 col-md-7">
                  <select class="form-control" id="Thyroid" onchange="nextSteps('Thyroid','newstep22',1)">
                                                 <option value="1">Select type of Thyroid</option>
                                                 <option value="2">Hypothyroid</option>
                                                 <option value="3">Hyperthyroid</option>
                                             </select>
              </div>
             
             
            </div>
           
               <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step20" aria-controls="step20" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <span style="display: none;">
                <a class="btn btn-wzd nav-next" id="newstep22" href="#step22" aria-controls="step22" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-right"></i></a>
              </span>
              </div>
            </div>
            </div>

             <div role="tabpanel" class="tab-pane" id="step22">
           
            <div class="row">
              <div class="col-md-4 col-sm-4"></div>
              <div class="col-md-4 col-sm-4">
                  <img src="http://junky.tech/Diet/images/diabetes.svg" class="hgt100">
              </div>
              <div class="col-md-4 col-sm-4"></div>
            </div>
             
            <!-- Step title -->
            <h1 class="text-center">Are You Suffering from Diabetes?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                  <div class="col-md-offset-1 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step23" aria-controls="step23" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="Diabetes" value="Yes" type="radio">
                    <img src="http://junky.tech/Diet/images/yes.svg" class="hgt100">
                    
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step24" aria-controls="step24" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="Diabetes" value="No" type="radio">
                   
                  <img src="http://junky.tech/Diet/images/no.svg" class="hgt100">
                   
                  </label>
                </div>
              </a>
              </div>
            </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step21" aria-controls="step21" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
              
              </div>
            </div>
          </div>

             <div role="tabpanel" class="tab-pane" id="step23">
            
            <!-- Step title -->
            
          
            <!-- Step content -->
            <div id="wzd-content" class="col-md-10">
              <div class="col-md-offset-4 col-md-7">
                  <select class="form-control" id="Diabetes" onchange="nextSteps('Diabetes','newstep24',1)">
                                             <option>Select type of Diabetes</option>
                                                 <option value="2">Hyperglycemia (Low)</option>
                                                 <option value="3">Hyperglycemia (High)</option>
                                                 <option value="4">Insulin Dependent</option>
                                             </select>
              </div>
             
             
            </div>
           
               <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step22" aria-controls="step22" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <span style="display: none;">
                <a class="btn btn-wzd nav-next" id="newstep24" href="#step24" aria-controls="step24" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-right"></i></a>
              </span>
              </div>
            </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="step24">
           
            <div class="row">
              <div class="col-md-4 col-sm-4"></div>
              <div class="col-md-4 col-sm-4">
                  <img src="http://junky.tech/Diet/images/heart.svg" class="hgt100">
              </div>
              <div class="col-md-4 col-sm-4"></div>
            </div>
             
            <!-- Step title -->
            <h1 class="text-center">Are you Suffering from any Heart Ailment?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                  <div class="col-md-offset-2 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step25" aria-controls="step25" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="Ailment" value="Yes" type="radio">
                    <img src="http://junky.tech/Diet/images/yes.svg" class="hgt100">
                    
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step25" aria-controls="step25" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="Ailment" value="No" type="radio">
                   
                  <img src="http://junky.tech/Diet/images/no.svg" class="hgt100">
                   
                  </label>
                </div>
              </a>
              </div>
            </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step23" aria-controls="step23" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               
              </div>
            </div>
          </div>

           <div role="tabpanel" class="tab-pane" id="step25">
           
            <!-- Step title -->
            <h1 class="text-center">Are you Facing any issues related to Blood Pressure?</h1>
            <!-- Step content -->
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
                  <div class="col-md-offset-2 col-md-5 icons-block">
                <a class="btn btn-wzd nav-next" href="#step26" aria-controls="step26" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                    <input  name="Pressure" value="Yes" type="radio">
                    <img src="http://junky.tech/Diet/images/yes.svg" class="hgt100">
                    
                  </label>
                </div>
              </a>
              </div>
              <div class="col-md-5 icons-block">
                 <a class="btn btn-wzd nav-next" href="#step26" aria-controls="step26" role="tab" data-toggle="tab">
                <div class="radio">
                  <label>
                   <input  name="Pressure" value="No" type="radio">
                   
                  <img src="http://junky.tech/Diet/images/no.svg" class="hgt100">
                   
                  </label>
                </div>
              </a>
              </div>
            </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-8 col-md-4">
                <a class="btn btn-wzd nav-previous" href="#step24" aria-controls="step24" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               
              </div>
            </div>
          </div>
           <div role="tabpanel" class="tab-pane" id="step26">
           
            
            <!-- Step title -->
           
            <div id="wzd-content" class="col-md-offset-1 col-md-10">
              <textarea class="form-control" rows="5" placeholder="Any Other additional Information you like to tell about yourself?"></textarea>    
              
            </div>
            <!-- Step navigation controls -->
            <div id="wzd-nav" class="row">
              <div id="nav-controls" class="col-md-offset-4 col-md-8">
                <a class="btn btn-wzd nav-previous" href="#step25" aria-controls="step25" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-chevron-left"></i></a>
               <input type="submit" name="submit" class="btn btn-success" value="Submit" style="width: 50%;">
              </div>
            </div>
          </div>


          </div>
        </div>
      </div>
   
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
<!-- partial -->
<!-- Modal -->
 <!--  <div class="modal fade" id="myModal" role="dialog" style="display: block;">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
         
        </div>
        <div class="modal-body">
           <p>Your Diet May not be Processed incase we don’t find it suitable, we will refund your Amount else will continue with plan.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
      
    </div>
  </div> -->

<script type="text/javascript">

    $(document).ready(function() {
        var count = 0; // To Count Blank Fields

        /*------------ Validation Function-----------------*/
        $(".submit_btn").click(function(event) {
            var radio_check = $('.rad'); // Fetching Radio Button By Class Name

               
            // Validating Radio Button
            if (radio_check[0].checked == false && radio_check[1].checked == false) {
                var y = 0;
            } else {
                var y = 1;
            }


            // Notifying Validation
            if (count != 0 || y == 0) {
            alert("*All Fields are mandatory*");
            event.preventDefault();
            } else {
            return true;
            }
        });

    /*---------------------------------------------------------*/
    
    jQuery('.stepwizard ul li').each(function (){
        $(this).find("a").click(function(){
            var id = $(this).attr("href");
            $('.regform fieldset').each(function (){
                $(id).show().siblings().hide();
            });
        });
    });

    $("#show_otp, #show_preg_btn").click(function (){
        $(this).parents("fieldset").find(".show_inside_form").slideDown();
        $(this).parents("fieldset").find(".show_btn").css("display","inline-block");
    });

    setInterval(function (){
        if(jQuery(".regform #first").css("display") == "block"){
            jQuery('.back_btn').hide();
        }
        else{
            jQuery('.back_btn').show();
        }

        if ( $('#sidebar-right').css("display")== "block") {
             var getid =jQuery(".regform fieldset").siblings(":visible").attr("id");
             //console.log(getid);
             var $curr = $( "#"+getid );
             $(".back_btn").click(function(){
                $curr = $curr.prev();
                $( "fieldset" ).css( "display", "none" );
                $curr.css({'display': 'block'}  );
             });
        }

    }, 300);



    $('.regform .onchangenextbtn').each(function (){
        $(this).find('input[type=radio]').on('change', function() {
            if ($(this).hasClass("kids_yes") || $(this).hasClass("thyroid-yes") || $(this).hasClass("diabetes_yes") ||  $(this).hasClass("heat_yes") || $(this).hasClass("bp_yes") || $(this).hasClass("heat_no") || $(this).hasClass("bp_no") || $(this).hasClass("marriedyes") || $(this).hasClass("child12yes") | $(this).hasClass("child12no")) 
            {
                $(this).parents(".form-body").next().slideDown();

                $('.select-block select').on("change", function(){
                    $(this).parents('.onchangenextbtn').find('.next_btn, .pre_btn').css("visibility", "visible");   
                });

                if ($('.additional_info').parents(".form-body").css("display") == "block") {
                    $(this).parents('.onchangenextbtn').find('.pre_btn, .submit_btn').css("visibility", "visible");
                }
                
            }
            else if ($(this).hasClass("marriedno")) {
                $('fieldset.timings-section').css("display", "block");
                $('fieldset.timings-section').siblings().css("display", "none");
                $(this).parents('.onchangenextbtn').find('.next_btn, .pre_btn').css("visibility", "visible");   
                $('.pre_btn').click(function(){
                    $('.sec_marital_status').css("display", "block");
                    $('fieldset.sec_marital_status').siblings().css("display", "none");
                });

            }

            
            else if ($(this).hasClass("pregnant_yes")) {
                $("#preg_warning").modal("show");
                $(this).parents(".form-body").next().slideDown();
                

            }

            else{
                $(this).parents('.onchangenextbtn').find('.next_btn').trigger("click");
                $(this).parents('.onchangenextbtn').find('.next_btn, .pre_btn').css("visibility", "visible");   
            }
        });
    });

    //ADD MIDDLENAME
    
    $('.add_middlename a').click(function (e){
     e.preventDefault();
        $('.sideright .input.full-names.fields-inline .input-box').css("max-width","32.33%");
        $('input[name="middlename"]').css("display","inline-block");
        $('.add_middlename').hide();
        $('.remove_middlename').show();
    });
    $('.remove_middlename a').click(function(ee){
        ee.preventDefault();
        $('input[name="middlename"]').hide();
        $('.sideright .input.full-names.fields-inline .input-box').css("max-width","49%");
        $('.remove_middlename').hide();
        $('.add_middlename').show();
    });


    // show hide height and weight

    $('.askheight select').on("change", function (){
        var thiscls = jQuery(this).find("option:selected").attr("class");
        if(thiscls == "cm"){
            $(".askheight .ht-cms").show();
            $(".askheight .ht-ft-inch").hide();
        }
        else{
            $(".askheight .ht-cms").hide();
            $(".askheight .ht-ft-inch").show();
        }

    });
    $('.askweight select').on("change", function (){
        var thiscls2 = jQuery(this).find("option:selected").attr("class");
        if(thiscls2 == "lbs"){
            $(".askweight .wt-lbs").show();
            $(".askweight .wt-kgs").hide();
        }
        else{
            $(".askweight .wt-lbs").hide();
            $(".askweight .wt-kgs").show();
        }

    });

    jQuery('.otp_field input[name="otp"]').on("keyup", function(){
        jQuery(this).next().focus();
    });

    // Function Runs On NEXT Button Click
        $(".next_btn").click(function(ee) { 
            
            $(this).parent().next().fadeIn('slow');
                $(this).parent().css({'display': 'none'});
                $('.active').next().addClass('active');
                return true;
        });
    // Function Runs On PREVIOUS Button Click
        $(".pre_btn").click(function() {
            $(this).parent().prev().fadeIn('slow');
            $(this).parent().css({'display': 'none'});
            
            $('.active:last').removeClass('active');
            
        });

    // Validating All Input And Textarea Fields
        $(".submit_btn").click(function(e) {
            $('#stepTwo .after-select-cntry .input').each(function(){
                if ($(this).find('input').val() == "") {
                    $(this).addClass("errored");
                    
                }
                else {
                    return true;
                }
            });
           
        });
    });


</script>



<script type="text/javascript">
$(function () {
                $('#datetimepicker1, #datetimepicker2, #datetimepicker3, #datetimepicker4').datetimepicker({
                    format: 'LT'
                });
            });
$(document).ready(function() {
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      
       initialCountry: "in",
     
      utilsScript: "build/js/utils.js",
    });


    var date_input=$('input[name="date"]'); //our date input has the name "date"
            var container=$('.sideright form').length>0 ? $('.sideright form').parent() : "body";
            date_input.datepicker({
                format: 'mm/dd/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true
            })


});
</script>

 <script type="text/javascript">
                                       // Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}


// Install input filters.
setInputFilter(document.getElementById("uintTextBox"), function(value) {
  return /^\d*$/.test(value); });
setInputFilter(document.getElementById("uintTextBox1"), function(value) {
  return /^\d*$/.test(value); });
setInputFilter(document.getElementById("uintTextBox2"), function(value) {
  return /^\d*$/.test(value); });
setInputFilter(document.getElementById("uintTextBox3"), function(value) {
  return /^\d*$/.test(value); });
setInputFilter(document.getElementById("uintTextBox4"), function(value) {
  return /^\d*$/.test(value); });
setInputFilter(document.getElementById("uintTextBox5"), function(value) {
  return /^\d*$/.test(value); });
setInputFilter(document.getElementById("uintTextBox6"), function(value) {
  return /^\d*$/.test(value); });
setInputFilter(document.getElementById("uintTextBox7"), function(value) {
  return /^\d*$/.test(value); });
setInputFilter(document.getElementById("uintTextBox8"), function(value) {
  return /^\d*$/.test(value); });
  </script>
  <script type="text/javascript">
      function insertTextAtCursor(el, text) {
    var val = el.value, endIndex, range;
    if (typeof el.selectionStart != "undefined" && typeof el.selectionEnd != "undefined") {
        endIndex = el.selectionEnd;
        el.value = val.slice(0, endIndex) + text + val.slice(endIndex);
        el.selectionStart = el.selectionEnd = endIndex + text.length;
    } else if (typeof document.selection != "undefined" && typeof document.selection.createRange != "undefined") {
        el.focus();
        range = document.selection.createRange();
        range.collapse(false);
        range.text = text;
        range.select();
    }
}

document.getElementById("test1").onkeypress = function(evt) {
    evt = evt || window.event;
    var charCode = typeof evt.which == "number" ? evt.which : evt.keyCode;
    if (String.fromCharCode(charCode) == ",") {
        insertTextAtCursor(this, ", ");
        return false;
    }
};


function mobiles(){
  
  var str = $("#uintTextBox").val();
  /*$("#pincodes").html(str);*/
  var length = str.length;
  if(length>=10){
     $.ajax({
           url:  baseURL + 'Diet/checkmobile',
           type: 'POST',
           data: {mobile: str},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
           
            $("#show_otp").show();
            document.getElementById("quantity").focus();

           }
        });
   
  }else{
    $("#show_otp").hide();
  }
}
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#quantity").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#quantity1").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});


function forward(e,prevId,first,second){

var str = $("#"+first).val();

  var length = str.length;
  console.log(length)
  if(length>=1){
   
            document.getElementById(second).focus();

  }else{

     var keyCode = e.keyCode || e.which;
  if (keyCode === 8) { 
     document.getElementById(prevId).focus();
     $("#"+prevId).val('');
  }
  }
}

    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }


    function nextSteps(currentId,nextButtonId,noCount){
     
      var str = $("#"+currentId).val();
      var length = str.length;
      
      if(length==noCount){

      if(currentId == 'quantity5'){

            var mobile = $("#uintTextBox").val();
            var otp = $("#quantity").val();
            var otp1 = $("#quantity1").val();
            var otp2 = $("#quantity2").val();
            var otp3 = $("#quantity3").val();
            var otp4 = $("#quantity4").val();
            var otp5 = $("#quantity5").val();

        $.ajax({
           url:  baseURL + 'Diet/checkotp',
           type: 'POST',
           data: {mobile: mobile,otp:otp,otp1:otp1,otp2:otp2,otp3:otp3,otp4:otp4,otp5:otp5},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
           if(data == ''){
              $("#incorrectotp").hide();
                 $("#"+nextButtonId).click();

           }else if(data=='Error'){
            $("#incorrectotp").show();
           }else{
            $("#"+data).click();
           //$("#"+nextButtonId).click();
           }
       
           }
        });
        
       
        }else if(currentId =='txtDate'){
          var date = str;
          var newdate = date.split("/").reverse().join("-");
            updateData('id','customers_info','dob',newdate,nextButtonId);
        }else if(currentId =='pincode'){
          var val = $("#pincode").val();
            updateDatas('id','customer_address','pincode',val,nextButtonId);
        }

        else{
         $("#"+nextButtonId).click();
        }
      }

    }
    
    function minMaxNumValidation(e,min,max,id,spanId,okButtonId){

      var value =  $("#"+id).val();
      
      if(value>=min && value<=max){
        $("#"+id).val(value)
       
       
          $("#"+spanId).show();
        var keyCode = e.keyCode || e.which;
    
        if (keyCode === 13) { 
          //kch krna  h
            if(id=='inch' || id=='weight'){
                submitFunction(okButtonId);
          
            }else{
               $("#"+okButtonId).click();         
            }
        }

      }else{
         $("#"+id).val('');
         
          $("#"+okButtonId).hide();
       
        return false;
      }
    }
    function submitFunction(okButtonId){

      if(okButtonId=='newnewstep5'){
         var value = $("#inch").val();
         var feet =$("#feet").val();
         var val = feet+"'"+value+"''";
         updateData('id','customers_info','height',val,okButtonId);
      }else if(okButtonId=='newnewstep6'){
         var val = $("#weight").val();        
         updateData('id','customers_info','weight',val,okButtonId);
      }else if(okButtonId=='newnewstep7'){
         var val = $("#fname").val();        
         updateData('id','customers_info','first_name',val,okButtonId);
      }else if(okButtonId=='newnewstep8'){
         var val = $("#lname").val();        
         updateData('id','customers_info','last_name',val,okButtonId);
      }else if(okButtonId=='newnewstep10'){
         var val = $("#houses").val();        
         updateDatas('customer_id','customer_address','house_no',val,okButtonId);
      }else if(okButtonId=='newnewstep11'){
         var val = $("#address").val();        
         updateDatas('customer_id','customer_address','address',val,okButtonId);
      }
      

    }
    function minMaxNumValidationfeet(min,max,id){

      var value =  $("#"+id).val();
      
      if(value>=min && value<=max){
        $("#"+id).val(value);        
          forward(event,'','feet','inch');   

      }else{
         $("#"+id).val('');
        
        return false;
      }
    }

  function showEnterButton(e,currentId,spanId,noCount,buttonId){

    var str = $("#"+currentId).val();
      var length = str.length;
     
      if(length>=noCount){
        var keyCode = e.keyCode || e.which;
    
        if (keyCode === 13) { 
            if(currentId=='fname' || currentId =='lname' || currentId =='houses' || currentId =='address'){
                submitFunction(buttonId);
            }else{
               $("#"+buttonId).click();         
            }
        }
         $("#"+spanId).show();
      }else{
         $("#"+spanId).hide();
      }

  }

function disableenter(e){

  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
}
function updateData(where,tab,column,third,nextId){
 console.log(nextId);
   $.ajax({
           url:  baseURL + 'Diet/Update',
           type: 'POST',
           data: {table: tab,column:column,value:third,where:where,button:nextId},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
          
             $("#"+nextId).click();
             if(nextId=='newnewstep3'){
              $("#txtDate").focus();
             }
             if(nextId=='newstep4'){
              $("#feet").focus();
             }
             if(nextId=='newnewstep5'){
              $("#weight").focus();
             }
             if(nextId=='newnewstep6'){
              $("#fname").focus();
             }
              if(nextId=='newnewstep7'){
              $("#lname").focus();
             }
             if(nextId=='newnewstep8'){
              $("#pincode").focus();
             }
           }
        });
}
function updateDatas(where,tab,column,third,nextId){
 console.log(nextId);
  
   $.ajax({
           url:  baseURL + 'Diet/Updates',
           type: 'POST',
           data: {table: tab,column:column,value:third,where:where,button:nextId},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
           
             $("#"+nextId).click();
             if(nextId=='newstep9'){
              $("#houses").focus();
             }
             if(nextId=='newnewstep10'){
              $("#address").focus();
             }
           }
        });
}
</script>
 <script type="text/javascript">
   $(document).ready(function() {    
    $('input').on('keypress', function(event) {
        var $this = $(this),
        val = $this.val();
        val = val.charAt(0).toUpperCase() + val.substr(1);
        $this.val(val);
   });
}); 
</script>
</body>
</html>