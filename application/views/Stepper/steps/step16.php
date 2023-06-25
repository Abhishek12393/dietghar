<?php $this->load->view('Stepper/steps/header') ; ?>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0"> How Many Kids/Children Do You Have? * </h4>
            <br />
        </div>
        <form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_17')?>">
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <select onchange="childnum(event)" class="main-input form-control" required id="no_kids">                        
                  <option> Select No. of Kids </option>
                  <option id="i16" value="1"> 1 </option>
                  <option value="2"> 2 </option>
                  <option value="3"> 3 </option>
                  <option value="4"> 4 </option>
                  <option value="5"> 5 </option>
                  </select>
                  </div>
              </div>
 
          </div>
        </form>
    </div>
  </center>

</div>

  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <script>
 
  var ele= document.getElementById("no_kids");
  function childnum(event)  {
      var val = ele.value;
      event.preventDefault();
      updateDatas('user_id','customer_lifestyle','no_kids',val,'stepper_17');
    }
  </script>
 
</html>