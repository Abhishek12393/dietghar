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
  <form name="myform" id="form_id" method="post" action="<?=base_url('User/male_measurement')?>" >
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0">Any Other Additional Information would you like to tell about yourself? *</h4>
            <br />
            <div class="row gy-3 align-items-center justify-content-center">
                <div class="inputs d-flex flex-row justify-content-center mt-2">
                    <!-- <input class="m-3 text-center form-control rounded" type="tel" id="feet" maxlength="1 " placeholder="ft " autocomplete="off" onkeyup="feetfun(event)" required /> -->
                    <textarea  id="i26"  onkeyup="yourself(event)" placeholder="" class="m-3 text-center form-control rounded" autocomplete="off" autofocus=""> </textarea>
                </div>
            </div>
            <div class="mt-4 dnone" id="next" >
                <button type="button" class="btn btn-danger px-4 validate" onclick="nextele(event)">Next</button>
            </div>
        </div>
    </div>
  </form>
  </center>

</div>
  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <script>
var your;
var ele= document.getElementById("i26");
var next= document.getElementById("next");
function yourself(event)
{
    if(ele.value.length>0){
    next.style.display="block"
    if(event.keyCode==13){      
        nextele();
    }
    }else{
    next.style.display="none"
    }
}
function nextele()
{
  var val = $("#i26").val();
  var resp = updateDatas('user_id','customer_lifestyle','additional_info',val,'stepper_final');
  // console.log(resp);
}
</script>
</html>