<?php $this->load->view('Stepper/steps/header') ; ?>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0">Select Your Gender</h4>
            <br />
        </div>
        <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_3')?>">
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i13" onclick="gender('YES',event)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/gender-female.png" name="gender">
                      <!-- <img src="https://dietghar.com/diet/dgassets/stepper/gender-female.png" alt="..." /> -->
                      <br />Female
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input  onclick="gender('NO',event)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/gender-male.png" name="gender"><span class="title-images-1">
                      <!-- <img src="https://dietghar.com/diet/dgassets/stepper/gender-male.png" alt="..." /> -->
                      <br />Male
                  </div>
              </div>
          </div>
        </form>
    </div>
  </center>

</div>

  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <script>
  // defines
 

  document.addEventListener("DOMContentLoaded", function(event) {
    // alert('content loaded');
   
  });
  function gender(val, event){
    event.preventDefault();
    if(val=="YES")  {
      val=2;
      updateDatas('id','customers_info','gender',val,'stepper_3');
    }else{
      val=1;
      document.getElementById("form_id").action="<?=base_url('Stepper/stepper_3')?>";
      updateDatas('id','customers_info','gender',val,'stepper_3');
    }
  }

  </script>
</html>