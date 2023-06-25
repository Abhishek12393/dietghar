<?php $this->load->view('Stepper/steps/header') ; ?>
<?php
 
 $sno = $this->uri->segment(3);
 $newsno = $sno+1;
 $gender = $message[0]['gender'];
 if($gender==1){ $ur = 'Stepper/stepper_26/'.$newsno; }
 else
 { $ur = 'Stepper/stepper_27/'.$newsno; }
 $burl = base_url();
?>
<style>#id23{display:none;}</style>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0">Are you Facing any issues related to Blood Pressure? * </h4>
            <br />
        </div>
        <?php $ab = "18"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/19'>"; ?>
        <?php $ab = "19"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/20'>"; ?>
        <?php $ab = "20"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/21'>"; ?>
        <?php $ab = "21"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/22'>"; ?>
        <?php $ab = "22"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/23'>"; ?>
        <?php $ab = "23"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/24'>"; ?>
        <?php $ab = "24"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/25'>"; ?>
        <?php $ab = "25"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/26'>"; ?>
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i25" onclick="blood(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender">
                  <br> YES
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input onclick="blood(event,0)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="gender">
                  <br> NO
                  </div>
              </div>
 
          </div>
        </form>
    </div>
  </center>

</div>

  <?php $this->load->view('Stepper/steps/footer') ; ?>

  <?php $ab = "18"; $bc = $sno; if ($ab == $bc) include ('include/25-18.php'); ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) include ('include/25-19.php'); ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) include ('include/25-20.php'); ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) include ('include/25-21.php'); ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) include ('include/25-22.php'); ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) include ('include/25-23.php'); ?>
<?php $ab = "24"; $bc = $sno; if ($ab == $bc) include ('include/25-24.php'); ?>
<?php $ab = "25"; $bc = $sno; if ($ab == $bc) include ('include/25-25.php'); ?>
 
</html>