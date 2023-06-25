<?php $this->load->view('Stepper/steps/header') ; ?>
<style>
    .inputs input {
        width: 270px;
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
.align-items-center{-webkit-box-align:center!important;-webkit-align-items:center!important;-ms-flex-align:center!important;align-items:center!important}
.cardpad {width: 30rem;}
@media screen and (max-width: 600px) {
.cardpad {width: 25rem;}
}
</style>

  <center>
    <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_7')?>">
      <div class="card align-items cardpad" >
          <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
              <h4 class="mb-0">First Name</h4>
              <br />
              <div class="row gy-3 align-items-center justify-content-center">
                  <div class="inputs d-flex flex-row justify-content-center mt-2">
                      <input type="text" class="form-control text-capitalize" id="i6" onkeyup="firstname(event);" onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode==13)"  autocomplete="off" required/>
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
  var el=document.getElementById("i6");
  el.focus();
  var next= document.getElementById("next");
  var fname;
  function firstname(event){
    if(/^[a-zA-Z]*$/g.test(el.value) || event.keyCode==32){
      if(el.value.length>0){
        fname=el.value;
        el.value=fname.charAt(0).toUpperCase() + fname.slice(1);
        fname=el.value;
        el.value=fname.replace(/\s/g,'');
        next.style.display="block";
        // if(event.keyCode==13){
        //   var val = el.value;        
        //   updateData('id','customers_info','first_name',val,'stepper_7');
        // }
      }else{
        next.style.display="none";
      }
    }else{
      el.value = el.value.substring(0, el.value.length - 1);
    }
  }

  var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");
  $("#next").bind(clickHandler, function(e) {
      // alert("clicked or tapped. This button used: " + clickHandler);
      var val = el.value;        
    updateData('id','customers_info','first_name',val,'stepper_7');
  });

  document.addEventListener("DOMContentLoaded", function(event) {
    // alert('content loaded');
  });
 

  </script>
</html>