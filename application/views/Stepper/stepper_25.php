<?php
include('header.php');
$sno = $this->uri->segment(3);
$newsno = $sno+1;
$gender = $message[0]['gender'];
if($gender==1){ $ur = 'Stepper/stepper_26/'.$newsno; }
else
{ $ur = 'Stepper/stepper_27/'.$newsno; }
$burl = base_url();
?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/19'>"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/20'>"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/21'>"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/22'>"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/23'>"; ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/24'>"; ?>
<?php $ab = "24"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/25'>"; ?>
<?php $ab = "25"; $bc = $sno; if ($ab == $bc)  echo "<form name='myform' id='form_id' method='post' action='".$burl."Stepper/stepper_27/26'>"; ?>
<section id="main-sectoin">
<div class="container" id="id25">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "25"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "24"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
</span> Are you Facing any issues related to Blood Pressure? * </h4>
<ul class="listing-section-field-12">
<li> <input id="i25" onclick="blood(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender"><span class="title-images-1">Yes </span></li>
<li> <input onclick="blood(event,0)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="gender"><span class="title-images-1"> No </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow">
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_24/17'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_24/18'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_24/19'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "25"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_24/24'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_24/22'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_24/21'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_24/20'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "24"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_24/23'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
</div>
<?php include('footer.php'); ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) include ('include/25-18.php'); ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) include ('include/25-19.php'); ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) include ('include/25-20.php'); ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) include ('include/25-21.php'); ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) include ('include/25-22.php'); ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) include ('include/25-23.php'); ?>
<?php $ab = "24"; $bc = $sno; if ($ab == $bc) include ('include/25-24.php'); ?>
<?php $ab = "25"; $bc = $sno; if ($ab == $bc) include ('include/25-25.php'); ?>
