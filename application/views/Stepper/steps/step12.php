<?php $this->load->view('Stepper/steps/header') ; ?>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0">What’s Your Lifestyle?</h4>
            <br />
        </div>
        <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_13')?>">
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i12" onclick="lifestyle(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/sleep.png" alt="select-field"  name="gender">
                      <!-- <img src="https://dietghar.com/diet/dgassets/stepper/gender-female.png" alt="..." /> -->
                      <br />I Barely More
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input onclick="lifestyle(event,2)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/yoga.png" alt="select-field"  name="gender">  <br> Not That active  
 
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input onclick="lifestyle(event,3)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/brisk-walk.png" alt="select-field"  name="gender"> <br>  Moderately Active  
 
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input onclick="lifestyle(event,4)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/marathon.png" alt="select-field"  name="gender"><br> Very Active  
 
                  </div>
              </div>
          </div>
        </form>
    </div>
  </center>

</div>

  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <script>
function lifestyle(event,val)
{
event.preventDefault();
updateDatas('user_id','customer_lifestyle','lifestyle',val,'stepper_13');
}
</script>
</html>