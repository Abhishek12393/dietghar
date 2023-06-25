<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_16')?>">
<section id="main-sectoin">
<div class="container " id="id15">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>15) </span> Do You have kids? * </h4>
<ul class="listing-section-field-12">
<li> <input id="i15"  type="image" src="<?php echo base_url(); ?>dgassets/stepper/indecisive.png" name="male"><span class="title-images-1">Yes </span></li>
<!-- chldrn('YES',event) -->
<li> <input id="i16" type="image" src="<?php echo base_url(); ?>dgassets/stepper/cancel.png" name="female"><span class="title-images-1"> No </span> </li>
<!-- onclick="chldrn('NO',event)" -->
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_14')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
function chldrn(val,event){
  event.preventDefault();
  if(val=="YES"){
    val='1';
    updateDatas('user_id','customer_lifestyle','have_kids',val,'stepper_16');
  }else{
    val='0';
    document.getElementById("form_id").action="<?=base_url('Stepper/stepper_18/16')?>";
    updateDatas('user_id','customer_lifestyle','have_kids',val,'stepper_18/16');
  }
}


var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");

$("#i15").bind(clickHandler, function(e) {
    // alert("clicked or tapped. This button used: " + clickHandler);
    chldrn('YES',e);
});

$("#i16").bind(clickHandler, function(e) {
    // alert("clicked or tapped. This button used: " + clickHandler);
    chldrn('NO',e);
});
</script>