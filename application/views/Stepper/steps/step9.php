<?php $this->load->view('Stepper/steps/header') ; ?>
<!DOCTYPE html>
<style>
    .inputs input {
        width: 250px;
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
        <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_10')?>">
          <div class="card align-items cardpad" >
              <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
                  <h4 class="mb-0">Your House No.</h4>
                  <br />
                  <div class="row gy-3 align-items-center justify-content-center">
                      <div class="inputs d-flex flex-row justify-content-center mt-2">
                          <input type="text" class="form-control text-capitalize" autocomplete="off"  id="i9" onkeyup="house(event)" />
                      </div>
                  </div>
                  <div class="mt-4 dnone" id="next">
                      <button class="btn btn-danger px-4 validate">Next</button>
                  </div>
              </div>
          </div>
        </form>
      </center>
    </div>

  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <script>
  // defines
  var houseno;
    var ele= document.getElementById("i9");
    ele.focus();
    var next= document.getElementById("next");
    function house(event){
      houseno=ele.value;
      if(event.keyCode==32){
        houseno = houseno.toLowerCase().split(' ').map((s) => s.charAt(0).toUpperCase() + s.substring(1)).join(' ');
      }
      ele.value=houseno;
      if(ele.value.length>0){
        next.style.display="block";
        if(event.keyCode==13){
          var val = ele.value;        
          updateDatas('customer_id','customer_address','house_no',val,'stepper_10');
        }
      }else{
      next.style.display="none";
      }
    }

    var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");

    $("#next").bind(clickHandler, function(e) {
        // alert("clicked or tapped. This button used: " + clickHandler);
        var val = ele.value;        
        updateDatas('customer_id','customer_address','house_no',val,'stepper_10');  
    });

  document.addEventListener("DOMContentLoaded", function(event) {
    // alert('content loaded');
   
  });
 

  </script>
</html>