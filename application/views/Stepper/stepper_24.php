<?php
include('header.php');
$sno = $this->uri->segment(3);
$newsno = $sno+1;
$burl = base_url();
?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_25/'.$newsno)?>">
<section id="main-sectoin">
<div class="container" id="id24">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<img src="<?php echo base_url(); ?>stepper/heart.png" class="title-images" alt="Heart Ailment">
<h4 class="title-label"><span>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "24"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
</span> Are you Suffering from any Heart Ailment? * </h4>
<ul class="listing-section-field-12">
<li> <input id="i24" onclick="heart(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender">  <span class="title-images-1">Yes </span></li>
<li> <input onclick="heart(event,0)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="gender">  <span class="title-images-1"> No </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow">
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/16'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "18"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/17'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_23/18'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/22'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "24"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_23/23'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/20'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_23/21'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_22/19'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
</div>
<?php include('footer.php'); ?>
<script>
function heart(event,val)
{
event.preventDefault();
updateDatas('user_id','customer_lifestyle','heart_ailment',val,'stepper_25/<?php echo "$newsno";?>');
}
</script>