<?php $this->load->view('Stepper/steps/header') ; ?>
<?php
 
  $sno = $this->uri->segment(3);
  $burl = base_url();
?>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0"> Type of thyroid? * </h4>
            <br />
        </div>
        <?php $ab = "16"; $bc = $sno;if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_22/17'>"; ?>
        <?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_22/22'>"; ?>
        <?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_22/20'>"; ?>
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <select  onchange="thtype(event)" id="thyroid" class="main-input form-control" >
                  <option > Select Thyroid </option>
                  <option value="1"> Hyperthyroidism </option>
                  <option value="2"> Hypothyroidism </option>
                  </select>
                  </div>
              </div>
 
          </div>
        </form>
    </div>
  </center>

</div>

  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <?php $ab = "16"; $bc = $sno; if ($ab == $bc) include ('include/21-16.php'); ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) include ('include/21-21.php'); ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) include ('include/21-19.php'); ?>
 
</html>