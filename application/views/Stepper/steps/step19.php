<?php $this->load->view('Stepper/steps/header') ; 
$sno = $this->uri->segment(3);
$burl = base_url();
?>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0"> What kind of workout you follow? *</h4>
            <br />
        </div>
        <?php $ab = "14"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/15'>"; ?>
        <?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/20'>"; ?>
        <?php $ab = "17"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/18'>"; ?>
 
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                   <input id="i19" onclick="workout(event,3)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/worker.png" name="gender">
                      <br />I am Super Lazy 
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input onclick="workout(event,2)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/stress.png" name="gender">
                      <br />At Home
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input onclick="workout(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/muscle.png" name="gender">
                      <br />At Gym
                  </div>
              </div>
          </div>
        </form>
    </div>
  </center>

</div>
<?php $this->load->view('Stepper/steps/footer')  ; ?>
<?php $ab = "14"; $bc = $sno; if ($ab == $bc) include ('include/19-14.php'); ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) include ('include/19-19.php'); ?>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) include ('include/19-17.php'); ?>
</html>