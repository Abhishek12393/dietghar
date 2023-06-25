<?php
include('header.php');
$sno = $this->uri->segment(3);
$burl = base_url();
?>
<!-- original -->
<!-- <form name="myform" id="form_id" method="post" action="<?=''#base_url('Stepper/stepper_final')?>"> -->
<!-- //onsubmit="event.preventDefault(); " -->
<form name="myform" id="form_id" method="post" action="<?=base_url('User/male_measurement')?>" >

<section id="main-sectoin">
<div class="container" id="id26">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "27"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "25"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "24"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
<?php $ab = "26"; $bc = $sno; if ($ab == $bc) echo "$bc)"; ?>
</span> Any Other Additional Information would you like to tell about yourself? * </h4>
<textarea  id="i26"  onkeyup="yourself(event)" placeholder="" class="main-input" autocomplete="off" autofocus=""> </textarea>
</div>
<div class="main-button1" id="next">
<button type="button" onclick="nextele(event)"  class="main-okay-btn"> Submit </button></div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow">
<?php $ab = "20"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_27/19'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "21"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_27/20'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "22"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_27/21'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "27"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_27/26'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "25"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_27/24'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "24"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_27/23'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "23"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_27/22'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
<?php $ab = "26"; $bc = $sno; if ($ab == $bc) echo "<a href='".$burl."Stepper/stepper_27/25'> <img src='".$burl."dgassets/stepper/back-arrow.png'></a>"; ?>
</div>
<?php include('footer.php'); ?>
<script>
var your;
var ele= document.getElementById("i26");
var next= document.getElementById("next");
function yourself(event)
{
if(ele.value.length>0){
  next.style.display="block"
  if(event.keyCode==13){      
    nextele();
  }
}
else
{
next.style.display="none"
}
}
function nextele()
{
  var val = $("#i26").val();
  var resp = updateDatas('user_id','customer_lifestyle','additional_info',val,'stepper_final');
  // console.log(resp);
}
</script>