<?php $this->load->view('Stepper/steps/header') ; 
$sno = $this->uri->segment(3);
$burl = base_url();
?>
<style>#id21 {display:none;}</style> 

  <center>
    <div class="card align-items cardpad" >
        <div class="card-body d-flex flex-column gap-2 align-items-center justify-content-center">
            <h4 class="mb-0"> Any Previous Diet Followed?</h4>
            <br />
        </div>
        <?php $ab = "15"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/15'>"; ?>
        <?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/20'>"; ?>
        <?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/20'>"; ?>
          <div class="container height-100 d-flex justify-content-center align-items-center">
              <div class="position-relative">
                  <div class="card p-2 text-center">
                  <input  onclick="thyroid('YES',event)"  type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender">
                      <br />Yes 
                  </div>
              </div>
              <div class="position-relative">
                  <div class="card p-2 text-center">    
                    <input onclick="thyroid('NO',event)"  type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="gender">  <span class="title-images-1">
                    <br />No
                  </div>
              </div>
          </div>
        </form>
    </div>
  </center>

</div>
<?php $this->load->view('Stepper/steps/footer')  ; ?>
<?php $ab = "15"; $bc = $sno; if ($ab == $bc) include ('include/20-15.php'); ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) include ('include/20-20.php'); ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) include ('include/20-18.php'); ?>
</html>