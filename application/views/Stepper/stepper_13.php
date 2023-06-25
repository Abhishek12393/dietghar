<?php
include('header.php');
$gender = $message[0]['gender'];
if($gender==1){
$v = 'NO';
}else{
$v='YES';
}
?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_14')?>">
<section id="main-sectoin">
<div class="container " id="id13">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>13) </span> Are you married? * </h4>
<ul class="listing-section-field-12">
<li><input id="i13" onclick="married('<?=$v?>',event)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cuple.png" name="gender">  <span class="title-images-1"> Yes </span></li>
<li><input  onclick="married('NO',event)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/single.png" name="gender">  <span class="title-images-1"> No </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_12')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
function married(val, event)
{
event.preventDefault();
if(val=="YES")
{
val=1;
  updateDatas('user_id','customer_lifestyle','married',val,'stepper_14');
}
else
{
val=0;
document.getElementById("form_id").action="<?=base_url('Stepper/stepper_19/14')?>";
  updateDatas('user_id','customer_lifestyle','married',val,'stepper_19/14');
  updateDatas('user_id','customer_lifestyle','pregnant',val,'stepper_19/14');
  updateDatas('user_id','customer_lifestyle','have_kids',val,'stepper_19/14');
  updateDatas('user_id','customer_lifestyle','no_kids',val,'stepper_19/14');
  updateDatas('user_id','customer_lifestyle','kids_below_12_month',val,'stepper_19/14');
  updateDatas('user_id','customer_lifestyle','looking_to_conceive',val,'stepper_19/14');
}
}
</script>