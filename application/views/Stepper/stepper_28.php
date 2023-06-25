<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_6')?>">
<section id="main-sectoin">
<div class="container" id="id5">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<!--<img src="<?php echo base_url(); ?>stepper/weight.png" class="title-images" alt="set">-->
<h4 class="title-label"><span>5) </span> Enter Your Weight(In Kgs)? * </h4>
<input type="tel" id="i5" style="text-align:center"  maxlength="3" class="main-input-feet" autocomplete="off" required onkeyup="weight(event)">Kgs
</div>
<div class="main-button1" id="next"><a style="color:#fff;" ><button type="button"  class="main-okay-btn"> Ok </button></a></div>
<!-- onclick="submit()" -->
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_4')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
var w= document.getElementById("i5");
w.focus();
 
function weight(event){
  var val = w.value;   
  // var keyCode = val.charCodeAt(0);
    console.log(isNumeric(val));
    console.log(w.value.length);
    if(isNumeric(val) == true){
     
      if(w.value.length>=2 && val>=40 && val<=300){
      document.getElementById("next").style.display="block";
        if(event.keyCode==13){
          console.log('enter entered'); 
          updateData('id','customers_info','weight',val,'stepper_6');
        }
      }else{
        document.getElementById("next").style.display="none";
      }
    }else{
      console.log('not a number');
      w.value="";
    }
    
 
}

var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");

$("#next").bind(clickHandler, function(e) {
    // alert("clicked or tapped. This button used: " + clickHandler);
    var val = w.value;        
    updateData('id','customers_info','weight',val,'stepper_6');
});


// function submit(){
//   var val = w.value;        
//   updateData('id','customers_info','weight',val,'stepper_6');
// }
$(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
  });
</script>