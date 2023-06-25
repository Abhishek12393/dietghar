<?php $this->load->view('Stepper/steps/header') ; ?>
    <div>
        <br /><br />
        <div class="mb-4 d-flex flex-column gap-3 align-items-center justify-content-center">
            <div class="user-change-photo shadow">
                <!-- <img src="https://scontent.fdel3-5.fna.fbcdn.net/v/t1.6435-9/144652277_1191521077912539_5377575342016850392_n.png?_nc_cat=111&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=ZSsbdm9OnD0AX-R6EDF&_nc_ht=scontent.fdel3-5.fna&oh=00_AT8EeCXcEOhpLfJHiG2Ytl5zr89YGHzojpzm8POyAx_IAA&oe=62DC02F1"  alt="..." /> -->
                <img src="https://dietghar.com/assets/dietgharLogo.png" alt="">
            </div>
        </div>
      <center>
        <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_2')?>">
          <div class="card align-items" style="width: 30rem;">
              <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
                  <h4 class="mb-0">Enter your Mobile Number! *</h4>
                  <hr />
                  <div class="row gy-3 align-items-center justify-content-center">
                      <div class="col-md-12 align-items-center justify-content-center">
                          <span id="checki"></span>
                          <input type="tel" class="form-control"  pattern="[6789][0-9]{9}" maxlength="10" autocomplete="off" required onkeyup="sendotp(event)" id="i1"  />
                      </div>
                    </div>
                    <br />
                    <!-- style="display:none" -->
                    <div id="otp-section" > 
                      <h6 class="mb-0 text-uppercase">OTP</h6>
                      <div class="container height-100 d-flex justify-content-center align-items-center">
                        <div class="position-relative">
                          <div class="card p-2 text-center">
                              <span id="incorrectotp" style="color: red;display: none;">Incorrect OTP</span>
                                <div id="otp " class="inputs d-flex flex-row justify-content-center mt-2">
                                    <input class="m-2 text-center form-control rounded inputs" type="tel" id="f1" maxlength="1" autocomplete="off" onkeyup="checkn(this,event)" />
                                    <input class="m-2 text-center form-control rounded inputs" type="tel" id="f2" maxlength="1" autocomplete="off" onkeyup="checkn(this,event)" />
                                    <input class="m-2 text-center form-control rounded inputs" type="tel" id="f3" maxlength="1" autocomplete="off" onkeyup="checkn(this,event)" />
                                    <input class="m-2 text-center form-control rounded inputs" type="tel" id="f4" maxlength="1" autocomplete="off" onkeyup="checkn(this,event)" />
                                    <input class="m-2 text-center form-control rounded inputs" type="tel" id="f5" maxlength="1" autocomplete="off" onkeyup="checkn(this,event)" />
                                    <input class="m-2 text-center form-control rounded inputs" type="tel" id="last" maxlength="1" autocomplete="off" min="0" max="9" onkeyup="stepper_2(event);" />
                                </div>
                                <div class="mt-4">
                                <div class="main-button1" id="next"> <button class="btn btn-danger px-4 validate"  type="submit" >Confirm</button></div>
                                    <!-- <div class="main-button1" id="next"><button type="submit" class="main-okay-btn">Ok</button></div> -->
                                </div>
                            </div>
                            <div class="card-2">
                                <div class="content d-flex justify-content-center align-items-center">
                                    <a href="javascript:void(0)"><span id="clear" onclick="ClearFields();">Clear</span></a>
                                    <a href="# " class="text-decoration-none ms-3" onclick="sendotp()">Resend</a>
                                </div>
                            </div>
                          
                        </div>
                      </div>
                    </div>
                </div>
              </div>
        </form>    
      </center>
      
      <center><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7470979104823712" crossorigin="anonymous" type="94dd71558661f28383984951-text/javascript"></script>

<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-7470979104823712" data-ad-slot="3554932163" data-ad-format="auto" data-full-width-responsive="true"></ins>
<script type="94dd71558661f28383984951-text/javascript">
     (adsbygoogle = window.adsbygoogle || []).push({});
</script></center>

    </div>
  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <script>
  // defines
  var num = document.getElementById("i1");
  var span= document.getElementById("checki");
  var otpfields=document.getElementsByClassName("inputs");
  var otp=document.getElementById("otp-section");
  var next= document.getElementById("next");
  var clear= document.getElementById("clear");
  var resend= document.getElementById("resendbtn");

  document.addEventListener("DOMContentLoaded", function(event) {
    // alert('content loaded');
    console.log('check');
    num.focus();
  });

  // step1 : check prevent alphabet
  num.addEventListener('textInput', function(e) {
    var char = e.data; // In our example = "a"
    console.log(e);
    // If you want the keyCode..
    var keyCode = char.charCodeAt(0); // a = 97
    var html = "key: " + char +", code: " + keyCode + " , " + num.value.length;
    // console.log(html);
    // span.innerHTML= html;
    if (keyCode != 46 && keyCode > 31 && (keyCode < 48 || keyCode > 57)){
      e.preventDefault(); return false;}
     return true;
  });
  //step2
  function sendotp(event){
    //span.innerHTML += event.keyCode;
    console.log(num.value);
 
    if( num.value.length==10 ){
      // span.innerHTML= span.innerHTML +' 10th';
      
      $.ajax({
        url:  baseURL + 'Diet/checkmobile',
        type: 'POST',
        data: {mobile: num.value},
        error: function() {
          alert('Something is wrong');
        },
        success: function(data) {
          console.log(data);
          if(data == 1){
            otp.style.display="block";
            document.getElementById("f1").focus();
          }else{
            location.href = baseURL+'User/index';
          }
        }
      });
    } 
  
  }
 
  // step 3 : check number for otp boxes // move next
  function checkn(elem,event){
 
    var isno = isNumeric(elem.value);
    // span.innerHTML =  event.which; // for keycode check
    if (elem.value.length == elem.maxLength && isno == true) {
        var $next = $(elem).next('.inputs');
        if ($next.length){
          $(elem).next('.inputs').focus();
        }else{
          $(elem).blur();
          $("#last").focus();
        }
    }else{
      elem.value = "";
    }
    if ((event.which == 8 || event.which == 46) && $(elem).val() =='') {
      $(elem).prev('input').focus();
    }
  }
  // final
  function stepper_2(event){
    if(event.keyCode!=13){
      var mobile = num.value;
      var otp = $("#f1").val();
      var otp1 = $("#f2").val();
      var otp2 = $("#f3").val();
      var otp3 = $("#f4").val();
      var otp4 = $("#f5").val();
      var otp5 = $("#last").val();
      $.ajax({
        url:  baseURL + 'Diet/checkotp',
        type: 'POST',
        data: {mobile: mobile,otp:otp,otp1:otp1,otp2:otp2,otp3:otp3,otp4:otp4,otp5:otp5},
        error: function() {
          alert('Something is wrong');
        },
        success: function(data) {
          console.log(data);
          if(data == ''){
          $("#form_id").submit();
          }else if(data=='Error'){
            $("#incorrectotp").show();
          }else if(data=='Paid'){
            location.href = baseURL+'User/index';
          }else if(data=='Paid1'){
            location.href = baseURL+'User/male_measurement';
          }else if(data=='Paid2'){
            location.href = baseURL+'User/female_measurement';
          }else if(data =='offline'){
            location.href = baseURL+'User/upload_receipt';
          }else if(data == 'nonpaid'){
            //change by at
            location.href = baseURL+'User/male_measurement';
          }else{
            location.href = baseURL+'Stepper/'+data;
          }
        }
      });
    }
  }

  // clear button
  function ClearFields() {

    document.getElementById("f1").value = "";
    document.getElementById("f2").value = "";
    document.getElementById("f3").value = "";
    document.getElementById("f4").value = "";
    document.getElementById("f5").value = "";
    document.getElementById("last").value = "";
 }

  </script>
</html>