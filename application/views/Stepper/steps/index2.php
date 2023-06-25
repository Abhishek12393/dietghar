<?php $this->load->view('Stepper/steps/header') ; ?>

      
        <!-- <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/otp')?>"> -->
         <center>   <div class="card align-items" style="width: 22rem;">
              <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
                  <h4 class="mb-0">Enter your Mobile Number <?php if(isset($_SESSION['id'])){echo "!";} ?> * </h4>
                  <hr />
                  <div class="row gy-3 align-items-center justify-content-center">
                      <div class="col-md-12 align-items-center justify-content-center">
                          <span id="checki"></span>
                          <input type="tel" class="form-control"  pattern="[6789][0-9]{9}" maxlength="10" autocomplete="off" required  id="i1"  />
                      </div>
                    </div>
                    <br />
                    <div class="mt-4">
                      <div class="main-button1" id="validate"> 
                        <button class="btn btn-danger px-4 validate"  type="submit" onclick="sendotp(event)">Validate</button>
                      </div>
                    </div>
                </div>
              </div>
        <!-- </form>     -->
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
  function sendotp(){
    //span.innerHTML += event.keyCode;
    console.log(num.value);
 
    if( num.value.length==10 ){
      // span.innerHTML= span.innerHTML +' 10th';
      
      $.ajax({
        url:  baseURL + 'Diet/checkmobile2',
        type: 'POST',
        data: {mobile: num.value},
        error: function() {
          alert('Something is wrong');
        },
        success: function(data) {
          console.log(data);
          if(data == 1){
            // document.getElementById("f1").focus();
            location.href = baseURL+'Stepper/fillotp/'+num.value;
          } 
          if(data == 2 ){
            location.href = baseURL+'User/index';
          }
           
          if(data == 3 ){
            location.href = baseURL+'User/meal_plan';
          }
        }
      });
    } 
  
  }
 

  </script>
</html>