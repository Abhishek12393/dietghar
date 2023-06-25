<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_18/18')?>">
<section id="main-sectoin">
<div class="container" id="id17">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>17) </span> Any child Below 12 Months of age? * </h4>
<ul class="listing-section-field-12">
<li> <input id="i17" onclick="below(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="gender">  <span class="title-images-1">Yes </span></li>
<li> <input onclick="below(event,0)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="gender">  <span class="title-images-1"> No </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_16')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>

<?php include('footer.php'); ?>
<script>
var ele= document.getElementById("no_kids");
function below(event,val)
{
event.preventDefault();
updateDatas('user_id','customer_lifestyle','kids_below_12_month',val,'stepper_18/18');
}
 </script>