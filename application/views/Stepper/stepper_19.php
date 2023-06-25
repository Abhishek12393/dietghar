<?php
include('header.php');
$sno = $this->uri->segment(3);
$burl = base_url();
?>
<?php $ab = "14"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/15'>"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/20'>"; ?>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/18'>"; ?>
<section id="main-sectoin">
<div class="container" id="id19">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label">
<span>
<?php $ab = "14"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
</span> What kind of workout you follow? * </h4>
<ul class="listing-section-field-12">
<li> <input id="i19" onclick="workout(event,3)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/worker.png" name="gender">  <span class="title-images-1"> I am super Lazy </span></li>
<li> <input onclick="workout(event,2)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/stress.png" name="gender">  <span class="title-images-1"> At home </span> </li>
<li> <input onclick="workout(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/muscle.png" name="gender">  <span class="title-images-1"> At Gym </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow">
<?php $ab = "14"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_13'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_18/18'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_18/16'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
</div>
<?php include('footer.php'); ?>
<?php $ab = "14"; $bc = $sno; if ($ab == $bc) include ('include/19-14.php'); ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) include ('include/19-19.php'); ?>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) include ('include/19-17.php'); ?>