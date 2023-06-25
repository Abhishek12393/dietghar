<?php $this->load->view('Stepper/steps/header') ; 
$gender = $message[0]['gender'];
  if($gender==1){
    $v = 'NO';
  }else{
    $v='YES';
  }
?>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0"> Are you married? * </h4>
            <br />
        </div>
        <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_14')?>">
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i13" onclick="married('<?='YES'?>',event)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cuple.png" name="gender"> 
                      <br />Yes 
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                 <input  onclick="married('NO',event)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/single.png" name="gender">   
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
  // defines
  function married(val, event)
  {
    var gender = <?=$gender?>;
    event.preventDefault();
    if(val=="YES" && gender == 2 ){
      var married = 1;
      updateDatas('user_id','customer_lifestyle','married',married,'stepper_14');
    }else{
      if(gender ==  1 && val=="YES"){
        var married = 1;
        val = 0;
      }else{
        // on rest cases this will be response
        var married = 0;
        val = 0;
      }
 

        document.getElementById("form_id").action="<?=base_url('Stepper/stepper_19/14')?>";
        updateDatas('user_id','customer_lifestyle','married',married,'stepper_19/14');
        updateDatas('user_id','customer_lifestyle','pregnant',val,'stepper_19/14');
        updateDatas('user_id','customer_lifestyle','have_kids',val,'stepper_19/14');
        updateDatas('user_id','customer_lifestyle','no_kids',val,'stepper_19/14');
        updateDatas('user_id','customer_lifestyle','kids_below_12_month',val,'stepper_19/14');
        updateDatas('user_id','customer_lifestyle','looking_to_conceive',val,'stepper_19/14');
      }
  }

  document.addEventListener("DOMContentLoaded", function(event) {
    // alert('content loaded');
  });
 

  </script>
</html>