<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_10')?>">
<section id="main-sectoin">
<div class="container" id="id9">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>9) </span> What is your House No? * </h4>
<input type="text" style=" text-transform:capitalize;" id="i9" onkeyup="house(event)" placeholder="Please Enter Your House No" class="main-input" autocomplete="off" required>
</div>
<div class="main-button1" id="next" ><button type="button" class="main-okay-btn"> Ok </button></div>
<!-- onclick="submit()" -->
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_8')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
    var houseno;
    var ele= document.getElementById("i9");
    ele.focus();
    var next= document.getElementById("next");
    function house(event)
    {
    houseno=ele.value;
    if(event.keyCode==32)
    {
    houseno = houseno.toLowerCase()
    .split(' ')
    .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
    .join(' ');
    }
    ele.value=houseno;
    if(ele.value.length>0)
    {
    next.style.display="block";
    if(event.keyCode==13){
    var val = ele.value;        
    updateDatas('customer_id','customer_address','house_no',val,'stepper_10');
    }
    }
    else
    {
    next.style.display="none";
    }
    }

    var clickHandler = ('ontouchstart' in document.documentElement ? "touchstart" : "click");

    $("#next").bind(clickHandler, function(e) {
        // alert("clicked or tapped. This button used: " + clickHandler);
        var val = ele.value;        
        updateDatas('customer_id','customer_address','house_no',val,'stepper_10');  
    });
    // function submit(){
    // var val = ele.value;        
    // updateDatas('customer_id','customer_address','house_no',val,'stepper_10');
    // }
</script>