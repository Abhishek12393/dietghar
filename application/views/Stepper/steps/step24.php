<?php $this->load->view('Stepper/steps/header') ; ?>
<?php
 
  $sno = $this->uri->segment(3);
  $newsno = $sno+1;
  $burl = base_url();
?>
<style>#id23{display:none;}</style>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0">AAre you Suffering from any Heart Ailment? * </h4>
            <br />
        </div>
        <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_25/'.$newsno)?>">
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i24" onclick="heart(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender">
                  <br> YES
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input onclick="heart(event,0)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="gender">
                  <br> NO
                  </div>
              </div>
 
          </div>
        </form>
    </div>
  </center>

</div>

  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <script>
  function heart(event,val)
  {
    event.preventDefault();
    updateDatas('user_id','customer_lifestyle','heart_ailment',val,'stepper_25/<?php echo "$newsno";?>');
  }
  </script>
 
</html>