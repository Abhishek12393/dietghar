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
            <h4 class="mb-0">Are You Suffering from Diabetes? * </h4>
            <br />
        </div>
        <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_24')?>">
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i22" onclick="diabetes('YES',event)"  type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender" > 
                  <br> YES
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input onclick="diabetes('NO',event)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="gender" >
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
  function diabetes(val,event)  {
    event.preventDefault();
    if(val=="YES")
    {
    var val=1;
    updateDatas('user_id','customer_lifestyle','is_diabetes',val,'stepper_23/<?php echo "$newsno";?>');
    document.getElementById("form_id").action="<?=base_url('Stepper/stepper_23/'.$newsno)?>";
    }
    else
    {
    document.getElementById("form_id").action="<?=base_url('Stepper/stepper_24/'.$newsno)?>";
    var val=0;
    updateDatas('user_id','customer_lifestyle','is_diabetes',val,'stepper_24/<?php echo "$newsno";?>');
    }
  }
  function dbtype(event)
  {
    event.preventDefault();
    document.getElementById("form_id").submit();
  }
</script>
 
</html>