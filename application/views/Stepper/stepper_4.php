<?php include('header.php'); ?>
<style>
html, body {
    touch-action: auto;
}</style>
<div id="turn">Please rotate your device!</div>
<div id="containerz">
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_5')?>" enctype="multipart/form-data">
<section id="main-sectoin">
<div class="container" id="id4">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<!--<img src="<?php echo base_url(); ?>stepper/tall.png" class="title-images" alt="set">-->
<h4 class="title-label"><span>4) </span> Enter Your Height? * </h4>

<input id="feet" style="text-align: center;" type="tel" onkeyup="feetfun(event)"  class="main-input-feet" autocomplete="off" required><span>Feet</span>
<input id="inch" style="text-align: center;" type="tel" onkeyup="inchfun(event)" maxlength="2" class="main-input-feet" autocomplete="off" required><span>Inches</span>

</div>
<div class="main-button1" id="next" ><button  type="button" class="main-okay-btn"> Ok </button></div>
<!-- onclick="submit()" -->
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_3')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
</div>
<?php include('footer.php'); ?>
<script>
var f= document.getElementById("feet");
var inc= document.getElementById("inch");
f.focus();
 
function feetfun(event){
    if (isNumeric(f.value) ==true ){
        var a= parseInt(f.value);
     
        if(a>=4 && a<=6)
        {
            inc.focus();    
        }else{
            f.value="";
        }
    }else{
        f.value="";
    }
}
function inchfun(event){   
    //alert(event.keyCode);
    if(isNumeric(inc.value) == true)    {
        var a= parseInt(inc.value);
        if(a>=0 &&a<=11)
        {
            document.getElementById("next").style.display="block"; 
            if(event.keyCode==13){
                var val = f.value+"'"+inc.value+"''";
                updateData('id','customers_info','height',val,'stepper_5');
            }
        }else{
            document.getElementById("next").style.display="none"; 
            inc.value="";
        }
    }else{
        inc.value="";

    }
}



var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");

$("#next").bind(clickHandler, function(e) {
    // alert("clicked or tapped. This button used: " + clickHandler);
    updatedatacheck();
});


// $('#next').on('click touchstart', function() {
// // function submit(){
//     // var val = f.value+"'"+inc.value+"''";
//     // updateData('id','customers_info','height',val,'stepper_5');
//     updatedatacheck();
// });

// function submit(){
//     // updatedatacheck();
//     alert('click check');
// }

function updatedatacheck(){
  var val = f.value+"'"+inc.value+"''";
    updateData('id','customers_info','height',val,'stepper_5');
    // document.getElementById("altB").submit();
}
</script>
