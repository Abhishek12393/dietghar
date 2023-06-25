<?php
include('header.php');
$sno = $this->uri->segment(3);
$newsno = $sno+1;
$burl = base_url();
?>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/18'>"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/19'>"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/21'>"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/22'>"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/23'>"; ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_24/24'>"; ?>
<section id="main-sectoin">
<div class="container" id="id23">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
</span> Type of Diabetes? * </h4>
<select  onchange="dbtype(event)" id="diabetes" class="main-input">
  <option> Select Diabetes</option>
  <option value="1"> Dieabetes Type 1</option>
  <option value="2"> Dieabetes Type 2</option>
  <option value="3"> Insulin Dependent</option>
  <option value="4"> Pre-Diabetic </option>
</select>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow">
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/16'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/17'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/22'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/20'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/21'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/19'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
</div>
<?php include('footer.php'); ?>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) include ('include/23-17.php'); ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) include ('include/23-18.php'); ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) include ('include/23-20.php'); ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) include ('include/23-21.php'); ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) include ('include/23-22.php'); ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) include ('include/23-23.php'); ?>