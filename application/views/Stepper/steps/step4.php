<?php $this->load->view('Stepper/steps/header') ; ?>
<style>
  .inputs input {
      width: 50px;
      height: 40px;
  }

  input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      margin: 0;
  }
  .form-control:focus {
      box-shadow: none;
      border: 2px solid green;
  }
  td {
      color: whitesmoke;
  }
  button {
      color: whitesmoke;
  }
  .validate {
      border-radius: 20px;
      height: 40px;
      background-color: green;
      border: 1px solid green;
      width: 140px;
  }
  p {
      text-align: center;
      font-size: xx-large;
      margin-top: 10px;
  }
  input {
      border-top: 0;
  }
  .align-items-center{-webkit-box-align:center!important;-webkit-align-items:center!important;-ms-flex-align:center!important;align-items:center!important}
  .cardpad {width: 30rem;}
  @media screen and (max-width: 600px) {
  .cardpad {width: 25rem;}
  }
</style>

  <center>
  <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_5')?>" enctype="multipart/form-data"> 
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0">Height</h4>
            <br />
            <div class="row gy-3 align-items-center justify-content-center">
                <div class="inputs d-flex flex-row justify-content-center mt-2">
                    <input class="m-3 text-center form-control rounded" type="tel" id="feet" maxlength="1 " placeholder="ft " autocomplete="off" onkeyup="feetfun(event)" required />
                    <p>Feet</p>
                    <input class="m-3 text-center form-control rounded" type="tel" id="inch" maxlength="2" placeholder="in" autocomplete="off"  onkeyup="inchfun(event)" required />
                    <p>Inches</p>
                </div>
            </div>
            <div class="mt-4 dnone" id="next" >
                <button type="button" class="btn btn-danger px-4 validate">Next</button>
            </div>
        </div>
    </div>
  </form>
  </center>

</div>
  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <script>
  // defines
  var f= document.getElementById("feet");
  var inc= document.getElementById("inch");
  f.focus();

  document.addEventListener("DOMContentLoaded", function(event) {
    // alert('content loaded');
   
  });
  
  function feetfun(event){
    if (isNumeric(f.value) ==true ){
        var a= parseInt(f.value);
     
        if(a>=4 && a<=6)
        {
            inc.focus();    
        }else{
            f.value="";
        }
    }else{
        f.value="";
    }
  }
  function inchfun(event){   
      //alert(event.keyCode);
      if(isNumeric(inc.value) == true)    {
          var a= parseInt(inc.value);
          if(a>=0 &&a<=11)
          {
              document.getElementById("next").style.display="block"; 
              if(event.keyCode==13){
                  var val = f.value+"'"+inc.value+"''";
                  updateData('id','customers_info','height',val,'stepper_5');
              }
          }else{
              document.getElementById("next").style.display="none"; 
              inc.value="";
          }
      }else{
          inc.value="";

      }
  }
  var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");
  $("#next").bind(clickHandler, function(e) {
      updatedatacheck();
  });
  function updatedatacheck(){
    var val = f.value+"'"+inc.value+"''";
    updateData('id','customers_info','height',val,'stepper_5');
    // document.getElementById("altB").submit();
  }

  </script>
</html>