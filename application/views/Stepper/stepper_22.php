<?php
include('header.php');
$sno = $this->uri->segment(3);
$newsno = $sno+1;
$burl = base_url();
?>
<style>#id23{display:none;}</style>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_24')?>">
<section id="main-sectoin">
<div class="container" id="id22">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<img src="<?php echo base_url(); ?>stepper/blood.png" class="title-images" alt="disbetes">
<h4 class="title-label"><span>
<?php $ab = "16"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
</span> Are You Suffering from Diabetes? * </h4> 
<ul class="listing-section-field-12">
<li> <input id="i22" onclick="diabetes('YES',event)"  type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender" >  <span class="title-images-1">Yes </span></li>
<li> <input onclick="diabetes('NO',event)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="gender" >  <span class="title-images-1"> No </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow">
<?php $ab = "16"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_20/15'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "17"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_21/16'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_20/20'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_21/21'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_21/19'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "19"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_20/18'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
</div>
<?php include('footer.php'); ?>
<script>
function diabetes(val,event)
{
event.preventDefault();
if(val=="YES")
{
var val=1;
updateDatas('user_id','customer_lifestyle','is_diabetes',val,'stepper_23/<?php echo "$newsno";?>');
document.getElementById("form_id").action="<?=base_url('Stepper/stepper_23/'.$newsno)?>";
}
else
{
document.getElementById("form_id").action="<?=base_url('Stepper/stepper_24/'.$newsno)?>";
var val=0;
updateDatas('user_id','customer_lifestyle','is_diabetes',val,'stepper_24/<?php echo "$newsno";?>');
}
}
function dbtype(event)
{
event.preventDefault();
document.getElementById("form_id").submit();
}
</script>