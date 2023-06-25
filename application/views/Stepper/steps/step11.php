<?php $this->load->view('Stepper/steps/header') ; ?>
<style>
  .inputs input {width: 250px;height: 40px;}
  input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {-webkit-appearance: none;-moz-appearance: none;appearance: none;margin: 0;}
  .form-control:focus {box-shadow: none;border: 2px solid green;}
  td {color: whitesmoke;}
  button {color: whitesmoke;}
  .validate {border-radius: 20px;height: 40px;background-color: green;border: 1px solid green;width: 140px;}
  .image-name {display: block;text-align: center;margin: 10px 0 0;font-family: Arial, Helvetica, sans-serif;font-size: large;}   
  .arrangement {width: 100%;list-style: none;text-align: center;display: flex;justify-content: center;padding: 15px;}
</style>

    <style>
    * {box-sizing: border-box;}
    .column {float: left;width: 50%;padding: 10px;}
    .row:after {content: "";display: table;clear: both;}
    @media screen and (max-width: 600px) {
    .column {width: 50%;}
    }
    .align-items-center{-webkit-box-align:center!important;-webkit-align-items:center!important;-ms-flex-align:center!important;align-items:center!important}
    .cardpad {width: 30rem;}
    @media screen and (max-width: 600px) {
    .cardpad {width: 20rem;}
    }
    </style>
    <center>
      <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_12')?>">
        <div class="card align-items cardpad" >
          <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
          <h4 class="mb-0">Select Your Objective?</h4>
          <br />
          <div class="arrangement">
          <div class="row">
          <div class="column">
          <!-- <img src="https://dietghar.com/diet/dgassets/stepper/loose.png" alt="..." /> -->
          <input id="i11" onclick="objective(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/loose.png" alt="select-field"  name="gender">
          <span class="image-name">Lose Weight</span>
          </div>
          <div class="column">
          <!-- <img src="https://dietghar.com/diet/dgassets/stepper/loose.png" alt="..." /> -->
          <input onclick="objective(event,2)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/gain.png" alt="select-field"  name="gender"> 
          <span class="image-name">Gain Weight</span>
          </div>
          <div class="column">
          <!-- <img src="https://dietghar.com/diet/dgassets/stepper/loose.png" alt="..." /> -->
          <input onclick="objective(event,3)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/strong.png" alt="select-field"  name="gender">
          <span class="image-name">Muscle Gain</span>
          </div>
          <div class="column">
          <!-- <img src="https://dietghar.com/diet/dgassets/stepper/loose.png" alt="..." /> -->
          <input onclick="objective(event,4)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/heartbeat.png" alt="select-field"  name="gender"> 
          <span class="image-name"> Be Healthy </span>
          </div>
          </div>
          </div>
          <div class="mt-4 dnone">
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
  function objective(event,val)
  {
    event.preventDefault();
    updateDatas('user_id','customer_lifestyle','objective',val,'stepper_12');
  }

  document.addEventListener("DOMContentLoaded", function(event) {
    // alert('content loaded');
   
  });
 

  </script>
</html>