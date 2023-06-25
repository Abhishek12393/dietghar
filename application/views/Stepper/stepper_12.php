<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_13')?>">
<section id="main-sectoin">
<div class="container" id="id12">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>12) </span> What’s Your Lifestyle? * </h4>
<ul class="listing-section-field-12">
<li><input id="i12" onclick="lifestyle(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/sleep.png" alt="select-field"  name="gender">  <span class="title-images-1"> I Barely More </span></li>
<li><input onclick="lifestyle(event,2)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/yoga.png" alt="select-field"  name="gender">  <span class="title-images-1"> Not That active </span> </li>
<li><input onclick="lifestyle(event,3)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/brisk-walk.png" alt="select-field"  name="gender">  <span class="title-images-1"> Moderately Active </span> </li>
<li> <input onclick="lifestyle(event,4)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/marathon.png" alt="select-field"  name="gender">  <span class="title-images-1"> Very Active </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_11')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
function lifestyle(event,val)
{
event.preventDefault();
updateDatas('user_id','customer_lifestyle','lifestyle',val,'stepper_13');
}
</script>
