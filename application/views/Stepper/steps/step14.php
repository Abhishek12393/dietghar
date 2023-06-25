<?php $this->load->view('Stepper/steps/header') ; ?>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0">Are you Pregnent? *</h4>
            <br />
        </div>
        <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_15')?>">
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i14" onclick="pragnent(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/pregnant.png" name="gender">
                      <br />Yes 
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                 <input onclick="pragnent(event,0)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/no-pregnant.png" name="gender">   
                      <br />No
                  </div>
              </div>
          </div>
        </form>
    </div>
  </center>

</div>

  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <script>
function pragnent(event,val)
{
event.preventDefault();
updateDatas('user_id','customer_lifestyle','pregnant',val,'stepper_15');
}
</script>
</html>