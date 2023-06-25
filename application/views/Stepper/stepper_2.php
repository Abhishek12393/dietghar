<?php include('header.php'); 
 
?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_3')?>">
<section id="main-sectoin">
<div class="container " id="id13">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>2) </span> Select Your Gender? * </h4>
<ul class="listing-section-field-12">
<li> <input id="i13" onclick="gender('YES',event)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/gender-female.png" name="gender"><span class="title-images-1"></span></li>
<li> <input  onclick="gender('NO',event)" type="image" src="<?php echo base_url(); ?>dgassets/stepper/gender-male.png" name="gender"><span class="title-images-1"></span></li>
</ul>
</div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/index')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
function gender(val, event){
  event.preventDefault();
  if(val=="YES")  {
    val=2;
    updateDatas('id','customers_info','gender',val,'stepper_3');
  }else{
    val=1;
    document.getElementById("form_id").action="<?=base_url('Stepper/stepper_3')?>";
    updateDatas('id','customers_info','gender',val,'stepper_3');
  }
}
</script>