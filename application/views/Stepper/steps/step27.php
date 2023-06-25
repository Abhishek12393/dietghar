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
            <h4 class="mb-0">PCOS? * </h4>
            <br />
        </div>
        <?php $ab = "19"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_26/20'>"; ?>
        <?php $ab = "20"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_26/21'>"; ?>
        <?php $ab = "21"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_26/22'>"; ?>
        <?php $ab = "22"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_26/23'>"; ?>
        <?php $ab = "23"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_26/24'>"; ?>
        <?php $ab = "24"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_26/25'>"; ?>
        <?php $ab = "25"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_26/26'>"; ?>
        <?php $ab = "26"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_26/27'>"; ?>
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i25" onclick="pcos(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender" > 
                  <br> YES
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input onclick="pcos(event,0)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="gender" >
                  <br> NO
                  </div>
              </div>
 
          </div>
        </form>
    </div>
  </center>

</div>

  <?php $this->load->view('Stepper/steps/footer') ; ?>
  <?php $ab = "19"; $bc = $sno; if ($ab == $bc) include ('include/27-19.php'); ?>
  <?php $ab = "20"; $bc = $sno; if ($ab == $bc) include ('include/27-20.php'); ?>
  <?php $ab = "21"; $bc = $sno; if ($ab == $bc) include ('include/27-21.php'); ?>
  <?php $ab = "22"; $bc = $sno; if ($ab == $bc) include ('include/27-22.php'); ?>
  <?php $ab = "23"; $bc = $sno; if ($ab == $bc) include ('include/27-23.php'); ?>
  <?php $ab = "24"; $bc = $sno; if ($ab == $bc) include ('include/27-24.php'); ?>
  <?php $ab = "25"; $bc = $sno; if ($ab == $bc) include ('include/27-25.php'); ?>
  <?php $ab = "26"; $bc = $sno; if ($ab == $bc) include ('include/27-26.php'); ?>
 
</html>