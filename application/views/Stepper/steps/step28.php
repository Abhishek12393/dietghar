<?php $this->load->view('Stepper/steps/header') ; ?>
<style>

    .inputs input {

        width: 80px;

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
    <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_6')?>">
      <div class="card align-items cardpad" >
          <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
              <h4 class="mb-0">Highest Weight Ever Recorded*</h4>
              <br />
              <div class="row gy-3 align-items-center justify-content-center">
                  <div class="inputs d-flex flex-row justify-content-center mt-2">
                      <input id="i5" class="m-3 text-center form-control rounded" type="tel" id="feet" maxlength="3" placeholder="W" autocomplete="off" onkeyup="weight(event)" required />
                      <p>Kgs</p>
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
    var w= document.getElementById("i5");
    w.focus();

    document.addEventListener("DOMContentLoaded", function(event) {
      // alert('content loaded');
    
    });

 
    function weight(event){
      var val = w.value;   
      // var keyCode = val.charCodeAt(0);
        console.log(isNumeric(val));
        console.log(w.value.length);
        if(isNumeric(val) == true){
        
          if(w.value.length>=2 && val>=40 && val<=300){
          document.getElementById("next").style.display="block";
            if(event.keyCode==13){
              console.log('enter entered'); 
              updateData('id','customers_info','weight',val,'stepper_6');
            }
          }else{
            document.getElementById("next").style.display="none";
          }
        }else{
          console.log('not a number');
          w.value="";
        }
        
    
    }

    var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");

    $("#next").bind(clickHandler, function(e) {
        // alert("clicked or tapped. This button used: " + clickHandler);
        var val = w.value;        
        updateData('id','customers_info','weight',val,'stepper_6');
    });

  </script>
</html>