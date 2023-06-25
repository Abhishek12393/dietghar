<?php $this->load->view('Stepper/steps/header') ; ?>
<?php
 
  $sno = $this->uri->segment(3);
  $newsno = $sno+1;
  $burl = base_url();
?>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0"> Type of Diabetes? * </h4>
            <br />
        </div>
        <?php $ab = "17"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/18'>"; ?>
        <?php $ab = "18"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/19'>"; ?>
        <?php $ab = "20"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/21'>"; ?>
        <?php $ab = "21"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/22'>"; ?>
        <?php $ab = "22"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/23'>"; ?>
        <?php $ab = "23"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/24'>"; ?>
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                    <select  onchange="dbtype(event)" id="diabetes" class="main-input form-control">
                      <option> Select Diabetes</option>
                      <option value="1"> Dieabetes Type 1</option>
                      <option value="2"> Dieabetes Type 2</option>
                      <option value="3"> Insulin Dependent</option>
                      <option value="4"> Pre-Diabetic </option>
                    </select>
                  </div>
              </div>
 
          </div>
        </form>
    </div>
  </center>

</div>

  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <?php $ab = "17"; $bc = $sno; if ($ab == $bc) include ('include/23-17.php'); ?>
  <?php $ab = "18"; $bc = $sno; if ($ab == $bc) include ('include/23-18.php'); ?>
  <?php $ab = "20"; $bc = $sno; if ($ab == $bc) include ('include/23-20.php'); ?>
  <?php $ab = "21"; $bc = $sno; if ($ab == $bc) include ('include/23-21.php'); ?>
  <?php $ab = "22"; $bc = $sno; if ($ab == $bc) include ('include/23-22.php'); ?>
  <?php $ab = "23"; $bc = $sno; if ($ab == $bc) include ('include/23-23.php'); ?>
 
</html>