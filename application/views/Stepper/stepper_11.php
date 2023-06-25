<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_12')?>">
<section id="main-sectoin">
<div class="container" id="id11">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>11) </span> What’s Your Objective? * </h4>
<ul class="listing-section-field-12">
<li><input id="i11" onclick="objective(event,1)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/loose.png" alt="select-field"  name="gender"> <span class="title-images-1"> Loose Weight </span></li>

<li><input onclick="objective(event,2)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/gain.png" alt="select-field"  name="gender">  <span class="title-images-1"> Gain Weight </span> </li>
<li><input onclick="objective(event,3)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/strong.png" alt="select-field"  name="gender">  <span class="title-images-1"> Muscle Gain </span> </li>
<li> <input onclick="objective(event,4)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/heartbeat.png" alt="select-field"  name="gender">  <span class="title-images-1"> Be Healthy </span> </li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_10')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
  function objective(event,val)
  {
    event.preventDefault();
    updateDatas('user_id','customer_lifestyle','objective',val,'stepper_12');
  }
</script>