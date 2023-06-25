<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_15')?>">
<section id="main-sectoin"> 
<div class="container " id="id14">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>14) </span> Are you Pregnent? *</h4>
<ul class="listing-section-field-12">
<li> <input id="i14" onclick="pragnent(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/pregnant.png" name="gender"><span class="title-images-1">Yes </span></li>
<li> <input onclick="pragnent(event,0)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/no-pregnant.png" name="gender"><span class="title-images-1"> No </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_13')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
function pragnent(event,val)
{
event.preventDefault();
updateDatas('user_id','customer_lifestyle','pregnant',val,'stepper_15');
}
</script>