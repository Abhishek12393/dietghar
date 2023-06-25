<?php $this->load->view('Stepper/steps/header') ; ?>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0"> Do You have kids? *</h4>
            <br />
        </div>
       <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_16')?>">
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i15"  type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="male">
                      <br />Yes 
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i16" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="female">
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
function chldrn(val,event){
  event.preventDefault();
  if(val=="YES"){
    val='1';
    updateDatas('user_id','customer_lifestyle','have_kids',val,'stepper_16');
  }else{
    val='0';
    document.getElementById("form_id").action="<?=base_url('Stepper/stepper_18/16')?>";
    updateDatas('user_id','customer_lifestyle','have_kids',val,'stepper_18/16');
  }
}


var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");

$("#i15").bind(clickHandler, function(e) {
    // alert("clicked or tapped. This button used: " + clickHandler);
    chldrn('YES',e);
});

$("#i16").bind(clickHandler, function(e) {
    // alert("clicked or tapped. This button used: " + clickHandler);
    chldrn('NO',e);
});
</script>
</html>