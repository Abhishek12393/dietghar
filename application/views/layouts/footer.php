<footer id="footer-area">
    <div class="container">
        <div class="footer-area-inner">
            <div class="row">
            <div class="col-md-8">
                <div class="logo-area">
                    <a href="#"><img src="<?=base_url()?>/assets/images/footer-logo.png" alt=""></a>
                </div>
                <ul class="links">
                    <li><a href="#">success stories</a></li>
                    <li><a href="#">plans and pricing</a></li>
                    <li><a href="#">terms and conditions</a></li>
                    <li><a href="#">privacy policy</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <form>
                    <div class="form-group">
                        <img src="<?=base_url()?>/assets/images/message-icon.png" class="message" alt="">
                        <input type="text" class="form-control" placeholder="Join Our Newsletter Here">
                        <button type="submit">Join</button>
                    </div>
                </form>
                <div class="contact-details">
                    <div class="row">
                        <div class="col-sm-6">
                            <a class="mail" href="#">support@dietghar.com</a>
                        </div>
                        <div class="col-sm-6">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="copy-right-area">
        <div class="container">
            <p>Copyright 2018 Dietghar</p>
        </div>
    </div>
</footer>
<!-- footer area -->



<!-- Right Modal -->

<!-- Right Modal -->
<div class="modal fade" id="preg_warning" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <p>Your Diet May not be Processed incase we don’t find it suitable, we will refund your Amount else will continue with plan.</p>
            <div class="form-group">
                <button type="button" class="btn submit-btn close"  data-dismiss="modal"><span aria-hidden="true">OK</span></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade sideright" id="sidebar-right" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#stepTwo" class="back_btn" onclick="return false;"><i class="fa fa-arrow-left"></i></a>
                <button type="button" class="close" onclick="refresh();" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
                <div class="stepwizard">
                    <ul>
                        <li><a href="#first">1</a></li>
                        <li><a href="#stepTwo">2</a></li>
                        <li><a href="#stepThree">3</a></li>
                        <li><a href="#stepFour">4</a></li>
                        <li><a href="#stepFive">5</a></li>
                        <li><a href="#stepSix">6</a></li>
                        <li><a href="#stepSeven">7</a></li>
                        <li><a href="#stepEight">8</a></li>
                        <li><a href="#stepNine">9</a></li>
                        <li><a href="#stepTen">10</a></li>
                        <li><a href="#stepEleven">11</a></li>
                    </ul>
                </div>

                <div class="content text-center">
                    <!-- Multistep Form -->
                    <div class="main">
                        <form action="" class="regform" method="get">
                            <!-- Progress Bar -->

                            <!-- Fieldsets -->
                            <fieldset id="first" class="w3-animate-top">
                                <div class="form-body">
                                   
                                    <img src="https://dietghar.com/assets/dlogo.svg" class="imglogo">
                                  	<div class="input mobile hs-mobile paddtp25">
                                  		<span class="abc">
                                       <input name="mobile" id="uintTextBox" type="tel" class="input-box required error" maxlength="10" placeholder="Mobile Number"  value="" required="" onkeyup="mobiles();" autofocus="">
                                       <span>
                                    </div>
                                  <!--   <span style="display: none;" >
                                    <input type="button" class="" name="show_otp"  value="Submit">
                               		</span> -->
                                </div>

                                <div class="form-body show_inside_form w3-animate-bottom" id="show_otp">
                                    <div class="formtitle">
                                        <p>Please enter the OTP:</p>
                                    </div>
                                    <div class="input otp_field">
                                       <input id="quantity"  name="otp" type="tel" class="input-box required error" maxlength="1"  required="" autofocus=""  onkeyup="forward('quantity','quantity1');"><span id="errmsg" style="display: none;"></span>
                                       <input id="quantity1" name="otp" type="tel" class="input-box required error" maxlength="1" required="" autofocus="" onkeyup="forward('quantity1','quantity2');" ><span id="errmsg" style="display: none;"></span>
                                       <input id="quantity2" name="otp" type="tel" class="input-box required error" maxlength="1"  required="" autofocus="" onkeyup="forward('quantity2','quantity3');" ><span id="errmsg" style="display: none;"></span>
                                       <input id="quantity3" name="otp" type="tel" class="input-box required error" maxlength="1"  required="" autofocus=""onkeyup="forward('quantity3','quantity4');"><span id="errmsg" style="display: none;"></span>
                                       <input id="quantity4" name="otp" type="tel" class="iinput-box required error" maxlength="1"  required="" autofocus="" onkeyup="forward('quantity4','quantity5');"><span id="errmsg" style="display: none;"></span>
                                       <input id="quantity5" name="otp" type="tel" class="input-box required error" maxlength="1" required="" autofocus="" onkeyup="forward('quantity5','stepTwo');"><span id="errmsg" style="display: none;"></span>
                                    </div>

                                     <a href="#">Resend the OTP</a>
                                       <span style="display: none ;color: #d23f3f"  id="incorrectotp">Incorrect OTP</span>
                                </div>
                              
                                <input class="next_btn show_btn" name="next" type="button" id="tosteptwo" value="Verify" > 
                               
                                <div class="currnumber"><span>1</span>/2</div>
                            </fieldset>


                            <fieldset id="stepTwo" class="select__gender onchangenextbtn w3-animate-zoom">

                                <div class="form-body gender-page">
                                  <p>Select Your Gender</p>
                                  <div class="icons-block">
                                     <label>
                                        <input class="gender rad" name="gender" value="2" type="radio">
                                        <span><img src="<?=base_url()?>/assets/images/female.svg" class="maleimg" onclick="stepwiseshow('stepTwo','stepFour','2');"></span>
                                        <p>Female</p>
                                     </label>
                                     <label>
                                        <input class="custom-select-box pra rad" name="gender" value="1" type="radio" disabled="">
                                        <span><img src="<?=base_url()?>/assets/images/male.svg" class="maleimg"></span>
                                        <p>Male</p>
                                     </label>
                                    
                                  </div>
                                  <input value="" id="gender_data" type="hidden">
                               </div>

                               <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                               <!--  <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepfour" value="Next">  -->

                             <div class="currnumber"><span>3</span>/10</div>
                            </fieldset>
                            
                            <fieldset id="stepFour" class="w3-animate-left">
                                <div class="form-body personal-info">
                                    <img src="<?=base_url()?>/assets/images/dob.svg" class="hgt150">
                                     <div class="formtitle">
                                        <p>Enter Date Of Birth</p>
                                     </div>
                                     <div class="after-select-cntry" style="">
                                        

                                        <div class="input askheight fields-inline"> 
                                            
                                         
                                            <div class="connected ">

                                                
                                                
                                                <select name="dd" id="dd" class="input-box"  aria-label="Height Type" tabindex="-1" style="width: 32%;" onchange="showMM1();">
                                                 <option>DD</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                                                </select> 
                                                <select name="mm" class="input-box"  aria-label="Height Type" tabindex="-1" style="width: 32%;display: none;" id="showMM" onchange="showYYYY1();">
                                                    <option>MM</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                                                </select> 
                                                <select name="yy" class="input-box" aria-label="Height Type" tabindex="-1" style="width: 32%;display: none;" id="showYYYY" onchange="stepwiseshow('stepFour','stepFive');">
                                                   <option>YYYY</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                                                </select> 
                                            </div>
                                            
                                            
                                        </div>

                                    

                                        
                                        <input name="gender" id="h_gender" type="hidden"> 
                                        <input name="user_register_status" value="0" type="hidden"> 
                                        <input name="user_register_step" value="step1" type="hidden"> 
                                        <input name="form_step" value="3" type="hidden">
                                        <input type="hidden" id="heightincm">
                                        
                                     </div>
                                  </div>

                                  <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>csxcv</a>
                                      <!--   <input class="pre_btn" type="button" value="Previous">
                                        
                                        <input class="next_btn" name="next" type="button" id="tostepfive" value="Next"> -->

                               <div class="currnumber"><span>4</span>/10</div>
                            </fieldset>

                            <fieldset id="stepFive" class="w3-animate-right">

                                <div class="form-body fill_address">
                                     <img src="<?=base_url()?>/assets/images/height.svg" class="hgt150">
                                    <div class="formtitle">
                                        <p>Enter Your Height</p>
                                    </div>
                                  
                                  <div class="address-block">
                                     
                                     <select name="feet" class="input-box" id="feet" aria-label="Height Type" tabindex="-1" onchange="showinches();">
                                                 <option>Feet</option>
                                                 <option value="4">4</option>
                                                 <option value="5">5</option>
                                                 <option value="6">6</option>
                                    </select>
                                    <select name="inches" class="input-box" aria-label="Height Type" tabindex="-1" onchange="stepwiseshow('stepFive','stepSix');" id="showinch" style="display: none;">
                                                    <option>Inches</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                                                </select> 
                                     
                                     
                                  </div>                                  
                               </div>

                               <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                             <!--    <input class="pre_btn" type="button" value="Previous">
                                 <input class="next_btn" name="next" type="button" id="tostepsix" value="Next"> -->
                                <!-- <input class="submit_btn" id="btnSubmit"  type="submit" value="Submit" style=""> -->
                                <div class="currnumber"><span>5</span>/10</div>
                            </fieldset>

                            <fieldset id="stepSix" class="w3-animate-top">
                                <div class="form-body fill_address">
                                     <img src="<?=base_url()?>/assets/images/weight.svg" class="hgt150">
                                    <div class="formtitle">
                                        <p>Enter Your Weight(In Kgs)</p>
                                    </div>
                                  
                                  <div class="address-block">
                                   <!-- <input type="text" name="weight" maxlength="3" id="uintTextBox7" placeholder="Weight(In Kgs)" /> -->
                                    <select name="weight" class="input-box" id="weight" aria-label="Height Type" tabindex="-1" onchange="stepwiseshow('stepSix','stepSeven');">
                                                    <option>Kgs</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                                                </select> 
                                  </div>                                  
                               </div>            
 
                                <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                              <!--   <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepseven" value="Next"> 
 -->
                                <div class="currnumber"><span>6</span>/10</div>

                            </fieldset>

                            <fieldset id="stepSeven" class="w3-animate-zoom">
                            	<span class="cap" id="firstnames"></span>
                            	<span class="cap" id="lastnames"></span>
                            	<span class="cap" id="pincodes"></span>
                            	<span class="cap" id="housenos"></span>
                            	<span class="cap" id="addresss"></span>
                                <div class="form-body">
                                    <p>Personal Details</p>
                               
                                         <br>
                                 <span id="fnamearrow">         
                                            <input type="text" class="cap"  name="name" id="fname" onkeyup="fnames();" onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"  placeholder="Firstname" />
    <span style="display: none;" id="fnameshowarraow">
	<a  class="btn-arrow" href="javascript:void(0)" onclick="showlname()">
    		<i class="fa fa-arrow-circle-right fa-2x"></i></a>
    </span>
    </span>

    <span id="lnamearrow" style="display: none;">
                                                     <input type="text" class="cap" name="lastname" id="lname" onkeyup="lnames();" onkeypress="return (event.charCode > 64 && 
    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"  placeholder="Lastname" />
     <span  style="display: none;" id="lnameshowarraow"><a class="btn-arrow" href="javascript:void(0)" onclick="showpin()"><i class="fa fa-arrow-circle-right fa-2x"></i></a></span>
	</span>
	<span id="pincode" style="display: none;">
                                                     <input type="text" name="pincode" id="uintTextBox8" placeholder="Pincode" maxlength="6" onkeyup="pin();"/>
                                                    
                                                   <!--   <label>city</label>
                                                     <input type="text" name="City" />
                                                      <label>State</label>
                                                     <input type="text" name="State" />
                                                      <label>Country</label>
                                                     <input type="text" name="Country" /> -->
 <span style="display: none;" id="pinshowarraow"><a class="btn-arrow" href="javascript:void(0)" onclick="showhouse()"><i class="fa fa-arrow-circle-right fa-2x"></i></a></span>
</span>

<span id="hnamearrow" style="display: none;">
     <input type="text" name="houseno"  placeholder="House No" class="cap" id="houses" onkeyup="house();" />
          <span style="display: none;" id="houseshowarraow"><a class="btn-arrow" href="javascript:void(0)" onclick="showaddress()"><i class="fa fa-arrow-circle-right fa-2x"></i></a></span>
</span>
<span style="display: none;" id="addressarrow">
      <input type="text" name="address"  id="test1" class="cap" placeholder="Address" onkeyup="addr();" />
         <span style="display: none;" id="addressshowarraow"><a class="btn-arrow" href="javascript:void(0)" onclick="stepwiseshow('stepSeven','stepEight');"><i class="fa fa-arrow-circle-right fa-2x"></i></a></span>
</span>                            
                                  <input value="" id="lifestyle_data" type="hidden">
                               </div>

                                <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                         <!--        <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepeight" value="Next">  -->

                                <div class="currnumber"><span>7</span>/10</div>
                            </fieldset>

                            <fieldset id="stepEight" class="sec_marital_status onchangenextbtn">
                                <div class="form-body">
                               <!--  <h2>LIFESTYLE</h2> -->
                                  <p>What’s Your Objective?</p>
                                  <div class="icons-block ">
                                     <label class="small">
                                        <input class="custom-select-box " name="objective" value="loose_weight" type="radio">
                                       <img src="<?=base_url()?>/assets/images/loseweight.svg" class="hgt100" onclick="stepwiseshow('stepEight','stepThree','1');">
                                        <p>Loose weight</p>
                                     </label>
                                     <label class="small">
                                        <input class="custom-select-box" name="objective" value="gain_weight" type="radio">
                                        <img src="<?=base_url()?>/assets/images/gainweight.svg" class="hgt100" onclick="stepwiseshow('stepEight','stepThree','2');">
                                        <p>Gain weight</p>
                                     </label>
                                     <label class="small">
                                        <input class="custom-select-box" name="objective" value="muscle_gain" type="radio">
                                        <img src="<?=base_url()?>/assets/images/musclegain.svg" class="hgt100" onclick="stepwiseshow('stepEight','stepThree','3');">
                                        <p>Muscle Gain</p>
                                     </label>
                                     <label class="small">
                                        <input class="custom-select-box" name="objective" value="be_healthy" type="radio">
                                       <img src="<?=base_url()?>/assets/images/behealthy.svg" class="hgt100" onclick="stepwiseshow('stepEight','stepThree','4');">
                                        <p>Be healthy</p>
                                     </label>

                                  </div>
                                  <input value="" id="gender_data" type="hidden">
                               </div>
                                 <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                               <!--  <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn"  name="next" type="button" id="tostepnine" value="Next"> -->

                                <div class="currnumber"><span>8</span>/10</div>
                            </fieldset>

                             <fieldset id="stepThree" class="select__ onchangenextbtn ">
                                <div class="form-body">
                                <h2>LIFESTYLE</h2>
                                  <p>What’s Your Lifestyle?</p>
                                  <div class="icons-block">
                                     <label class="small">
                                        <input class="custom-select-box" name="objective" value="I_barely_move" type="radio">
                                        <!-- <span><i class="fa fa-battery-empty"></i></span> -->
                                         <img src="<?=base_url()?>/assets/images/1.svg" class="hgt100" onclick="stepwiseshow('stepThree','stepNine','1');">
                                        <p>I barely move</p>
                                     </label>
                                     <label class="small">
                                        <input class="custom-select-box" name="objective" value="not_that_active" type="radio">
                                       <img src="<?=base_url()?>/assets/images/2.svg" class="hgt100" onclick="stepwiseshow('stepThree','stepNine','2');">
                                        <p>Not that active</p>
                                     </label>
                                     <label class="small">
                                        <input class="custom-select-box" name="objective" value="moderate_active" type="radio">
                                        <img src="<?=base_url()?>/assets/images/3.svg" class="hgt100" onclick="stepwiseshow('stepThree','stepNine','3');">
                                        <p>Moderately active</p>
                                     </label>
                                     <label class="small">
                                        <input class="custom-select-box" name="objective" value="very_active" type="radio">
                                       <img src="<?=base_url()?>/assets/images/4.svg" class="hgt100" onclick="stepwiseshow('stepThree','stepNine','4');">
                                        <p>Very active</p>
                                     </label>

                                  </div>
                                  <input value="" id="lifestyle_data" type="hidden">
                               </div>

                                <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                               <!--  <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepeight" value="Next">  -->

                                <div class="currnumber"><span>7</span>/10</div>
                            </fieldset>
                           <fieldset id="stepNine" class="select__ onchangenextbtn w3-animate-bottom">
                                 <div class="form-body">
                               <p>Are you married?</p>
                               <div class="icons-block">
                                  <label>
                                     <input class="marriedyes" name="married" value="yes" type="radio">
                                     <img src="<?=base_url()?>/assets/images/married.svg" class="hgt100" onclick="stepwiseshow('stepNine','step11',1);">
                                     <p>Yes</p>
                                  </label>
                                  <label>
                                     <input class="marriedno" name="married" value="no" type="radio">
                                     <img src="<?=base_url()?>/assets/images/unmarried.svg" class="hgt100" onclick="stepwiseshow('stepNine','step11',0);" >
                                     <p>No</p>
                                  </label>
                               </div>
                             </div>
                           
                              

                           

                                <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                              <!--   <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepeight" value="Next">  -->

                                <div class="currnumber"><span>7</span>/10</div>
                            </fieldset>
                             <fieldset id="step11" class="select__ onchangenextbtn">
                                <div class="form-body">
                               <!--  <h2>LIFESTYLE</h2> -->
                                   <p>Are you Pregnant?</p>
                                   <div class="form-body ">
                                 
                                  <div class="icons-block">
                                    <!-- remaing -->
                                     <label>
                                        <input class="pregnant_yes" name="pregnant" value="yes" type="radio">
                                         <img src="<?=base_url()?>/assets/images/pregnant.svg" class="hgt100" onclick="stepwiseshow('step11','step12');">
                                        <p>Yes</p>
                                     </label>
                                     <label>
                                        <input class="pregnant_no" name="pregnant" value="No" type="radio">
                                        <!-- <img src="images/pregnant.svg" class="hgt100"> -->
                                        <div style="position: relative; left: 0; top: 0;">
                                            <img src="<?=base_url()?>/assets/images/pregnant.svg" class="fishes "/>
                                            <img src="<?=base_url()?>/assets/images/Notpregnant.svg" class="fish "/>
                                        </div>
                                        <p>No</p>
                                     </label>
                                  </div>
                               </div> 
                                  <input value="" id="lifestyle_data" type="hidden">
                               </div>

                                <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                               <!--  <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepeight" value="Next">  -->

                                <div class="currnumber"><span>7</span>/10</div>
                            </fieldset>
                              <fieldset id="step12" class="select__ onchangenextbtn ">
                                <div class="form-body  onchangenextbtn">
                                 <p>Do you have kids?</p>
                                 <div class="icons-block">
                                    <label>
                                       <input class="kids_yes" name="kids" value="yes" type="radio">
                                      <img src="<?=base_url()?>/assets/images/kidsyes.svg" class="hgt100">
                                       <p>Yes</p>
                                    </label>
                                    <label>
                                       <input class="kids_no" name="kids" value="No" type="radio">
                                       <img src="<?=base_url()?>/assets/images/kidsno.svg" class="hgt90">
                                       <p>No</p>
                                    </label>
                                 </div>
                                 <input value="" id="kids_data" type="hidden">
                               </div>

                              <div class="form-body sec_kids" style="display: none;">
                                   <div class="formtitle">
                                       <p>How many kids/children do you have?</p>
                                   </div>
                                 <div class="select-block"> 
                                    <div class="input">
                                        <div class="controls text-center">
                                            <select name="no_of_kids" id="no_of_kids"  onchange="stepwiseshow('step12','stepTen');">
                                                <option>Select no. of children</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="3+">3+</option>
                                            </select>
                                        </div>
                                    </div>  
                                 </div>  
                              </div> 

                                <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                               <!--  <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepeight" value="Next">  -->

                                <div class="currnumber"><span>7</span>/10</div>
                            </fieldset>
                            <fieldset id="stepTen" class="sec_kids onchangenextbtn w3-animate-zoom">
                                <div class="form-body">
                                  <p>Any child Below 12 Months of age?</p>
                                  <div class="icons-block tx_yesno">
                                     <label>
                                        <input class="child12yes" name="child_below_12" value="yes" type="radio">
                                       <!--  <span><div>YES</div></span> -->
                                       <img src="<?=base_url()?>/assets/images/yes.svg" class="hgt100" onclick="stepwiseshow('stepTen','step13',1);">
                                     </label>
                                     <label>
                                        <input class="child12no" name="child_below_12" value="no" type="radio">
                                        <img src="<?=base_url()?>/assets/images/no.svg" class="hgt90" onclick="stepwiseshow('stepTen','step13',0);">
                                     </label>
                                  </div>
                                </div>

                               <!--  <div class="form-body show_inside_form">
                                  <p>Are you looking to conceive in nearfuture?</p>
                                  <div class="icons-block tx_yesno">
                                     <label>
                                        <input class="conceiveyes" name="conceive" value="yes" type="radio">
                                      
                                        <img src="<?=base_url()?>/assets/images/yes.svg" class="hgt100">
                                     </label>
                                     <label>
                                        <input class="conceive_no" name="conceive" value="no" type="radio">
                                       <img src="<?=base_url()?>/assets/images/no.svg" class="hgt90">
                                     </label>
                                  </div>
                                </div> -->

                               <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepnine" value="Next"> 

                                <div class="currnumber"><span>8</span>/10</div>
                            </fieldset>

                             <fieldset id="step13" class="sec_kids onchangenextbtn w3-animate-zoom">
                                <div class="form-body">
                                 
                                <div class="form-body">
                                  <p>Are you looking to conceive in nearfuture?</p>
                                  <div class="icons-block tx_yesno">
                                     <label>
                                        <input class="conceiveyes" name="conceive" value="yes" type="radio">
                                        <!-- <span><div>YES</div></span> -->
                                        <img src="<?=base_url()?>/assets/images/yes.svg" class="hgt100" onclick="stepwiseshow('step13','stepTwelve',1);">
                                     </label>
                                     <label>
                                        <input class="conceive_no" name="conceive" value="no" type="radio">
                                       <img src="<?=base_url()?>/assets/images/no.svg" class="hgt90" onclick="stepwiseshow('step13','stepTwelve',0);">
                                     </label>
                                  </div>
                                </div>

                               <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                <!-- <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepnine" value="Next">  -->

                                <div class="currnumber"><span>8</span>/10</div>
                            </fieldset>

                         <!--    <fieldset id="stepEleven" class="timings-section w3-animate-zoom">

                                <div class="form-body fill_address">
                                    <div class="formtitle">
                                        <p>Tell us your timings</p>
                                    </div>
                                  
                                  <div class="timings-block">
                                    <div class="input">
                                      <div class='date input-group  time-field' id='datetimepicker1'>
                                          <input type='text' class="form-control input-box" placeholder="What’s Your Wake Up Time? *"/>
                                          <span class="input-group-addon time-icon">
                                              <span class="glyphicon glyphicon-time"></span>
                                          </span>
                                      </div>
                                    </div>

                                      <div class="input">
                                          <div class='date input-group time-field' id='datetimepicker2'>
                                              <input type='text' class="form-control input-box" placeholder="What’s Your Breakfast Time? **"/>
                                              <span class="time-icon input-group-addon">
                                                  <span class="glyphicon glyphicon-time"></span>
                                              </span>
                                          </div>  
                                      </div>
                                      <div class="input">
                                          <div class='date input-group time-field' id='datetimepicker3'>
                                              <input type='text' class="form-control input-box" placeholder="What’s Your Lunch Time? **"/>
                                              <span class="time-icon input-group-addon">
                                                  <span class="glyphicon glyphicon-time"></span>
                                              </span>
                                          </div>  
                                      </div>
                                      <div class="input">
                                          <div class='date input-group time-field' id='datetimepicker4'>
                                              <input type='text' class="form-control input-box" placeholder="*Whats’s Your Dinner Time? **"/>
                                              <span class="time-icon input-group-addon">
                                                  <span class="glyphicon glyphicon-time"></span>
                                              </span>
                                          </div>  
                                      </div>
                                                                        
                                  </div>                                  
                               </div>

                               <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                <input class="pre_btn" type="button" value="Previous">
                                 <input class="next_btn" name="next" type="button" id="tostepsix" value="Next">
                               
                                <div class="currnumber"><span>5</span>/10</div>
                            </fieldset> -->

                            <fieldset id="stepTwelve" class="timings-section select__ onchangenextbtn w3-animate-top">
                                <div class="form-body">
                                  <p>what kind of workout you follow?</p>
                                  <div class="icons-block">
                                     <label>
                                        <input class="custom-select-box pra rad" name="workout" value="at_gym" type="radio">
                                       <img src="<?=base_url()?>/assets/images/gym1.svg" class="hgt100">
                                        <p>At Gym</p>
                                     </label>
                                     <label class="small">
                                        <input class="gender rad" name="workout" value="at_home" type="radio">
                                        <!-- <span><i class="fa fa-home"></i></span> -->
                                        <img src="<?=base_url()?>/assets/images/home.svg" class="hgt100">
                                        <p>At home</p>
                                     </label>
                                     <label>
                                        <input class="gender rad" name="workout" value="i_am_super_lazy" type="radio">
                                        <img src="<?=base_url()?>/assets/images/1.svg" class="hgt100">
                                        <p>I am super Lazy</p>
                                     </label>
                                  </div>
                                  <input value="" id="kids_data" type="hidden">
                                </div>
                               <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepnine" value="Next"> 

                                <div class="currnumber"><span>8</span>/10</div>
                            </fieldset>

                            <fieldset id="stepThirteen" class="sec_thyroid onchangenextbtn w3-animate-right">
                                <div class="form-body">
                                    <div class="text-center"><img src="<?=base_url()?>/assets/images/thyroid3.svg" class="hgt100"></div>
                                  <p>Are You Suffering from Thyroid?</p>
                                  <div class="icons-block">
                                     <label>
                                        <input class="thyroid-yes" name="thyroid" value="yes" type="radio">
                                         <img src="<?=base_url()?>/assets/images/yes.svg" class="hgt100">
                                     </label>
                                     <label>
                                        <input class="thyroid_no" name="thyroid" value="no" type="radio">
                                         <img src="<?=base_url()?>/assets/images/no.svg" class="hgt90">
                                     </label>
                                     
                                  </div>
                                  <input value="" id="kids_data" type="hidden">
                                </div>
                                <div class="form-body select_thyroid" style="display: none;">
                                  <div class="select-block"> 
                                     <div class="input">
                                         <div class="controls">
                                             <select name="thyroid_type"  onchange="stepwiseshow('stepThirteen','stepFourteen');">
                                                 <option value="3">Select type of Thyroid</option>
                                                 <option value="1">Hypothyroid</option>
                                                 <option value="2">Hyperthyroid</option>
                                             </select>
                                         </div>
                                     </div>  
                                  </div>  
                                 </div>
                               <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                               <!--  <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepnine" value="Next">  -->

                                <div class="currnumber"><span>8</span>/10</div>
                            </fieldset>

                            <fieldset id="stepFourteen" class="sec_diabetes onchangenextbtn w3-animate-left">
                                <div class="form-body">
                                    <div class="text-center"><img src="<?=base_url()?>/assets/images/diabetes.svg" class="hgt100">
                                    </div>
                                  <p>Are You Suffering from Diabetes?</p>
                                  <div class="icons-block">
                                     <label>
                                        <input class="diabetes_yes" name="diabetes" value="yes" type="radio">
                                         <img src="<?=base_url()?>/assets/images/yes.svg" class="hgt100">
                                     </label>
                                     <label>
                                        <input class="diabetes_no" name="diabetes" value="no" type="radio">
                                         <img src="<?=base_url()?>/assets/images/no.svg" class="hgt90">
                                     </label>
                                  </div>
                                </div>
                                <div class="form-body select_thyroid" style="display: none;">
                                  <div class="select-block"> 
                                     <div class="input">
                                         <div class="controls">
                                             <select name="diabetes_type" onchange="stepwiseshow('stepFourteen','stepFifteen');">
                                                 <option value="0">Select type of Diabetes</option>
                                                 <option value="1">Hyperglycemia (Low)</option>
                                                 <option value="2">Hyperglycemia (High)</option>
                                                 <option value="3">Insulin Dependent</option>
                                             </select>
                                         </div>
                                     </div>  
                                  </div>  
                                </div>
                               <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                              <!--   <input class="pre_btn" type="button" value="Previous">
                                <input class="next_btn" name="next" type="button" id="tostepnine" value="Next">  -->

                                <div class="currnumber"><span>8</span>/10</div>
                            </fieldset>

                            <fieldset id="stepFifteen" class="sec_others onchangenextbtn w3-animate-zoom">
                                <div class="form-body" >
                                <div class="text-center"><img src="images/heart.svg" class="hgt100"></div>
                                  <p>Are you Suffering from any Heart Ailment?</p>
                                  <div class="icons-block">
                                     <label>
                                        <input class="heat_yes" name="heart_ailment" value="yes" type="radio">
                                        <img src="<?=base_url()?>/assets/images/yes.svg" class="hgt100">
                                     </label>
                                     <label>
                                        <input class="heat_no" name="heart_ailment" value="no" type="radio">
                                        <img src="<?=base_url()?>/assets/images/no.svg" class="hgt90">
                                     </label>
                                  </div>
                                </div>
                                <div class="form-body" style="display: none;">
                                  <p>Are you Facing any issues related to Blood Pressure?</p>
                                  <div class="icons-block ">
                                     <label>
                                        <input class="bp_yes" name="bloodpressure" value="yes" type="radio">
                                       <img src="<?=base_url()?>/assets/images/yes.svg" class="hgt100">
                                     </label>
                                     <label>
                                        <input class="bp_no" name="bloodpressure" value="no" type="radio">
                                        <img src="<?=base_url()?>/assets/images/no.svg" class="hgt90">
                                     </label>
                                  </div>
                                </div>
                                <div class="form-body" style="display: none;">
                                  <div class="icons-block">
                                        <textarea class="additional_info cap" placeholder="Any Other additional Information you like to tell about yourself?"></textarea>
                                  </div>
                                </div>


                               <a href="#" onclick="return false;" class="pre_btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                <input class="pre_btn" type="button" value="Previous">
                                <!--    <input class="next_btn" name="next" type="button" id="tostepnine" value="Next"> -->
                                    <input class="submit_btn" id="btnSubmit"  type="submit" value="Submit" style="">
                                <div class="currnumber"><span>8</span>/10</div>
                            </fieldset>


                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>


<!-- jquery -->
<script src="<?=base_url()?>/assets/custom.js"></script>
<script src="<?=base_url()?>/assets/js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url()?>/assets/js/bootstrap.min.js"></script>

<script src="<?=base_url()?>/assets/js/bootsnav.js"></script>

<script src="<?=base_url()?>/assets/js/aos.js"></script>

<script src="<?=base_url()?>/assets/owl-carousel/owl.carousel.min.js"></script>

<script src="<?=base_url()?>/assets/build/js/intlTelInput.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<!-- main js-->
<script src="<?=base_url()?>/assets/js/main.js"></script>

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


</script>
</body>
</html>

