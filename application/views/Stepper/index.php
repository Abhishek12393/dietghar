<?php include('header.php'); ?>
<style>
.ccl a{text-decoration:none;}
.ccl a:hover{text-decoration:none;}
</style>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_2')?>">
  <section id="main-sectoin">
    <div class="container" id="id1">
      <div class="row justify-content-md-center" >
        <div class="col col-lg-8" style="margin-top:-30px;">
          <div class="section-area">
            <h4 class="title-label"><span>1) </span> What is your Mobile Number? * </h4>
            <span id="checki"></span>
            <!-- <input type="tel" id="i1" maxlength="10"  onkeyup="fun(event)"  onkeypress="javascript:return isNumber(event)" placeholder="Please Enter Your Mobile Number" class="main-input" autocomplete="off" required> -->
            <!-- <span id="checki"></span> -->
            <input type="tel" id="i1" maxlength="10" placeholder="Please Enter Your Mobile Number" class="main-input" autocomplete="off" required onkeyup="sendotp(event)">
           <!-- <input type="number" name="ii1" id="ii1" >
             <input type="text"> -->
          </div>
          <div class="main-otp-section" id="otp" style="margin-top:-20px;">
            <span id="incorrectotp" style="color: red;display: none;">Incorrect OTP</span>
            <h4 class="title-label">Enter OTP </h4>
            <input id="f1"  class="inputs" type="tel" maxlength="1" min="0" max="9" required autocomplete="off" onkeyup="checkn(this,event)"  >
            <input id="f2"  class="inputs" type="tel" maxlength="1" required autocomplete="off" onkeyup="checkn(this,event)">
            <input id="f3"  class="inputs" type="tel" maxlength="1" required autocomplete="off" onkeyup="checkn(this,event)">
            <input id="f4" class="inputs" type="tel" maxlength="1" required autocomplete="off"onkeyup="checkn(this,event)">
            <input id="f5"  class="inputs" type="tel" maxlength="1" required autocomplete="off"onkeyup="checkn(this,event)">
            <input id="last" class="inputs"  type="tel" maxlength="1" required autocomplete="off" onkeyup="stepper_2(event);">
            <!-- onkeypress="javascript:return isNumber(event)"  -->
           <p> <br /><a href="javascript:void(0)" id="clear" onclick="ClearFields();" class="ccl"> Clear </a>
            <a href="#" id="resendbtn" onclick="sendotp()" style="margin-left:10px;"  class="ccl">Resend</a></p>
          </div>
          <div class="main-button1" id="next"><button type="submit" class="main-okay-btn">Ok</button></div>
        </div>
      </div>	
    </div>
  </section>
</form>
<?php include('footer.php'); ?>
<script>
  var num= document.getElementById("i1");
  var span= document.getElementById("checki");
  // num.focus();
  
  var otpfields=document.getElementsByClassName("inputs");
  var otp=document.getElementById("otp");
  var next= document.getElementById("next");
  var clear= document.getElementById("clear");
  var resend= document.getElementById("resendbtn");
  
  // new method : detect keycode on android phones too
  num.addEventListener('textInput', function(e) {
   var wrapper = $(this).closest('.wrapper');
   var htmlTarget = wrapper.find('.code');
    // e.data will be the 1:1 input you done
    var char = e.data; // In our example = "a"
    console.log(e);
    // If you want the keyCode..
    var keyCode = char.charCodeAt(0); // a = 97
    var html = "key: " + char +", code: " + keyCode + " , " + num.value.length;
    // console.log(html);
    span.innerHTML= html;
    // $(htmlTarget).html(html);
    // Stop processing if "a" is pressed
    // if (keyCode == 97) {
    //     e.preventDefault();
    //     return false;
    // }
    if (keyCode != 46 && keyCode > 31 && (keyCode < 48 || keyCode > 57)){
      e.preventDefault(); return false;}
     return true;
  });

  function sendotp(event){
    //span.innerHTML += event.keyCode;
    console.log(num.value);
    if( num.value.length==10 ){
      span.innerHTML= span.innerHTML +' 10th';
      
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

  function fun(event){
    if((event.keyCode>=48 && event.keyCode<=57)|| (event.keyCode>=96 && event.keyCode<=105) )
    {
      if( num.value.length==10 )
      {
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
    }    else    {
      num.value="";
    }
  }
  function isNumber(evt) {

    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    console.log(iKeyCode);
    span.innerHTML = iKeyCode;
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
      return false;
    return true;
  }
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

    // this will bind all boxes of otp 
  // document.querySelectorAll('.inputs').forEach(item => {
  //   item.addEventListener('textInput', function(e) {

  //   })
  // })
 
function checkn(elem,event){
    // console.log(elem.value.length );
    // console.log(elem.maxLength);
    // console.log(event.which);
    span.innerHTML =  event.which;
    if (elem.value.length == elem.maxLength) {
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
 
$(".inputs1").keyup(function (e) {
  if (this.value.length == this.maxLength) {
      var $next = $(this).next('.inputs');
      if ($next.length){
        $(this).next('.inputs').focus();
      }else{
        $(this).blur();
        $("#last").focus();
      }
  }
  if ((e.which == 8 || e.which == 46) && $(this).val() =='') {
    $(this).prev('input').focus();
  }
  
});

function ClearFields() {

  document.getElementById("f1").value = "";
  document.getElementById("f2").value = "";
  document.getElementById("f3").value = "";
  document.getElementById("f4").value = "";
  document.getElementById("f5").value = "";
  document.getElementById("last").value = "";
}

function resendotp(){
  var mobile = num.value;
  $.ajax({
        url:  baseURL + 'Diet/checkmobile',
        type: 'POST',
        data: {mobile: mobile},
        error: function() {
          alert('Something is wrong');
        },
        success: function(data) {
          if(data==1){
            alert('OTP send succesfully');
          }else{
            alert('OTP sending failed!');
          }
          
        }
  })
}
</script>