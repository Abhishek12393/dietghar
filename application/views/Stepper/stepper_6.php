<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_7')?>">
<section id="main-sectoin">
<div class="container" id="id6">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>6) </span> What is your First Name? * </h4>
<input type="text" id="i6" onkeyup="firstname(event);" onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode==13)" placeholder="Please Enter Your First Name" class="main-input" autocomplete="off" required>
<div style="display:none;color:red" id="caps">Warning: Caps Lock is on!</div>
</div>
<div class="main-button1" id="next" ><button type="button"  class="main-okay-btn"> Ok </button></div>
<!-- onclick="submit()" -->
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_5')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
var el=document.getElementById("i6");
el.focus();
var next= document.getElementById("next");
var fname;
function firstname(event){
  if(/^[a-zA-Z]*$/g.test(el.value) || event.keyCode==32)
  {
  if(el.value.length>0)
  {
  fname=el.value;
  el.value=fname.charAt(0).toUpperCase() + fname.slice(1);
  fname=el.value;
  el.value=fname.replace(/\s/g,'');
  next.style.display="block";
  if(event.keyCode==13){
  var val = el.value;        
  updateData('id','customers_info','first_name',val,'stepper_7');
  }
  }
  else
  {
  next.style.display="none";
  }
  }
  else
  {
  el.value = el.value.substring(0, el.value.length - 1);
  }
}

var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");
$("#next").bind(clickHandler, function(e) {
    // alert("clicked or tapped. This button used: " + clickHandler);
    var val = el.value;        
  updateData('id','customers_info','first_name',val,'stepper_7');
});

// function submit(){
//   var val = el.value;        
//   updateData('id','customers_info','first_name',val,'stepper_7');
// }
</script>