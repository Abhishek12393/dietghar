<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_9')?>">
<section id="main-sectoin">
<div class="container" id="id8">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>8) </span> What is your Pincode? * </h4>
<input type="tel" maxlength="6" id="i8" onkeyup="pincode(event)" onkeypress="javascript:return isNumeric(this.value)" placeholder="Please Enter Your Pincode" class="main-input" autocomplete="off" required>
</div>
<span id="uploadpincode">
<img src="<?=base_url()?>diet/loader.gif" style="display: none;" id="loader">
</span>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_7')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
  var next= document.getElementById("next");
  var ele= document.getElementById("i8");
  ele.focus();
  function pincode(event){
    if(isNumeric(ele.value) == true ){
      if(ele.value.length==6){
        $('input').blur();
        var val = ele.value;
        updateDatas('id','customer_address','pincode',val,'stepper_9');
      }
    }else{
      ele.value="";
      next.style.display="none";
    }
  }

  $(document).ready(function() {
    $('#i8').keypress(function(event){
    if (event.keyCode == 10 || event.keyCode == 13) 
    event.preventDefault();
    });
  });
</script>