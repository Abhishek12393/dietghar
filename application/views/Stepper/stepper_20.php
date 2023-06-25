<?php
include('header.php');
$sno = $this->uri->segment(3);
$burl = base_url();
?>
<style>#id21 {display:none;}</style>
<?php $ab = "15"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/15'>"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/20'>"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_20/20'>"; ?>
<section id="main-sectoin">
<div class="container" id="id20">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<img src="<?php echo base_url(); ?>stepper/thyroid.png" class="title-images" alt="set">
<h4 class="title-label"><span>
<?php $ab = "15"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
</span> Are You Suffering from Thyroid? * </h4>
<ul class="listing-section-field-12">
<li> <input  onclick="thyroid('YES',event)"  type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender">  <span class="title-images-1">Yes </span></li>
<li> <input onclick="thyroid('NO',event)"  type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="gender">  <span class="title-images-1"> No </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow">
<?php $ab = "15"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_19/14'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_19/19'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_19/17'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
</div>
<?php include('footer.php'); ?>
<?php $ab = "15"; $bc = $sno; if ($ab == $bc) include ('include/20-15.php'); ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) include ('include/20-20.php'); ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) include ('include/20-18.php'); ?>
