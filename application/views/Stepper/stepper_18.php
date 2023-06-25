<?php
include('header.php');
$sno = $this->uri->segment(3);
$burl = base_url();
?>
<?php $ab = "16"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_19/17'>"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_19/19'>"; ?>
<section id="main-sectoin">
<div class="container" id="id18">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>
<?php $ab = "16"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
</span> Are you looking to conceive in near future? * </h4>
<ul class="listing-section-field-12">
<li> <input id="i18" onclick="conceive(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender">  <span class="title-images-1">Yes </span></li>
<li> <input onclick="conceive(event,0)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" id="female" name="gender">  <span class="title-images-1"> No </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow">
<?php $ab = "16"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_15'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_17'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
</div>
<?php include('footer.php'); ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) include ('include/18-18.php'); ?>
<?php $ab = "16"; $bc = $sno; if ($ab == $bc) include ('include/18-16.php'); ?>