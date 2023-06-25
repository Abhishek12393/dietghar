<?php
include('header.php');
  $sno = $this->uri->segment(3);
  $burl = base_url();
?>
<?php $ab = "16"; $bc = $sno;if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_22/17'>"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_22/22'>"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_22/20'>"; ?>
<section id="main-sectoin">
<div class="container" id="id21">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>
<?php $ab = "16"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
</span> Type of thyroid? * </h4>
<select  onchange="thtype(event)" id="thyroid" class="main-input" >
<option > Select Thyroid </option>
<option value="1"> Hyperthyroidism </option>
<option value="2"> Hypothyroidism </option>
</select>
</div>
<div class="main-button1 btnclass" id="btnid21"><button onkeypress="onenter(event)" onclick="nextElement()" type="button" class="main-okay-btn"> Ok </button></div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow">
<?php $ab = "16"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_20/15'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_20/20'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_20/18'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
</div>
<?php include('footer.php'); ?>
<?php $ab = "16"; $bc = $sno; if ($ab == $bc) include ('include/21-16.php'); ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) include ('include/21-21.php'); ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) include ('include/21-19.php'); ?>