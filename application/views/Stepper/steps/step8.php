<?php $this->load->view('Stepper/steps/header') ; ?>
 
<style>
    .inputs input {
        width: 170px;
        height: 40px;
    }input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }.form-control:focus {
        box-shadow: none;
        border: 2px solid green;
    }td {
        color: whitesmoke;
    }button {
        color: whitesmoke;
    }.validate {
        border-radius: 20px;
        height: 40px;
        background-color: green;
        border: 1px solid green;
        width: 140px;
    }
.align-items-center{-webkit-box-align:center!important;-webkit-align-items:center!important;-ms-flex-align:center!important;align-items:center!important}
.cardpad {width: 30rem;}
@media screen and (max-width: 600px) {
.cardpad {width: 25rem;}
}
</style>

      <center>
        <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_9')?>">
            <div class="card align-items cardpad" >
                <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
                    <h4 class="mb-0">Area PinCode</h4>
                    <br />
                    <div class="row gy-3 align-items-center justify-content-center">
                        <div class="inputs d-flex flex-row justify-content-center mt-2">
                            <input type="tel" class="form-control" id="i8" onkeyup="pincode(event)"  maxlength="6" autocomplete="off" />
                        </div>
                    </div>
                    <div class="mt-4">
                    <span id="uploadpincode">
                      <img src="<?=base_url()?>diet/loader.gif" style="display: none;" id="loader">
                      </span>  
                      <button class="btn btn-danger px-4 validate dnone" id="next">Next</button>

                    </div>
                </div>
            </div>
        </form>
      </center>
    </div>
  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <script>
  // defines
  var next= document.getElementById("next");
  var ele= document.getElementById("i8");
  ele.focus();
  function pincode(event){
    if(isNumeric(ele.value) == true ){
      if(ele.value.length==6){
        $('input').blur();
        var val = ele.value;
        updateDatas('id','customer_address','pincode',val,'stepper_9');
      }
    }else{
      ele.value="";
      next.style.display="none";
    }
  }

  $(document).ready(function() {
    $('#i8').keypress(function(event){
    if (event.keyCode == 10 || event.keyCode == 13) 
    event.preventDefault();
    });
  });

  document.addEventListener("DOMContentLoaded", function(event) {
    // alert('content loaded');
   
  });
 
  </script>
</html>