<?php $this->load->view('Stepper/steps/header') ; 
$sno = $this->uri->segment(3);
$burl = base_url();
?>

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0"> Are you looking to conceive in near future? *</h4>
            <br />
        </div>
        <?php $ab = "16"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_19/17'>"; ?>
        <?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_19/19'>"; ?>
        <?php $ab = "16"; $bc = $sno; if ($ab == $bc) //echo "$bc)"; ?>
        <?php $ab = "18"; $bc = $sno; if ($ab == $bc) //echo "$bc)"; ?>
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input id="i18" onclick="conceive(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender"> 
                      <br />Yes 
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input onclick="conceive(event,0)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" id="female" name="gender">
                      <br />No
                  </div>
              </div>
          </div>
        </form>
    </div>
  </center>

</div>
<?php $this->load->view('Stepper/steps/footer')  ; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) include ('include/18-18.php'); ?>
<?php $ab = "16"; $bc = $sno; if ($ab == $bc) include ('include/18-16.php'); ?>
</html>