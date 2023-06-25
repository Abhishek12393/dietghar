<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_17')?>">
<section id="main-sectoin">
<div class="container" id="id16">
<div class="row justify-content-md-center">
<div class="col col-lg-8">
<div class="section-area">
<h4 class="title-label"><span>16) </span> How Many Kids/Children Do You Have? * </h4>
<select onchange="childnum(event)" class="main-input form-control" required id="no_kids">                        
<option> Select No. of Kids </option>
<option id="i16" value="1"> 1 </option>
<option value="2"> 2 </option>
<option value="3"> 3 </option>
<option value="4"> 4 </option>
<option value="5"> 5 </option>
</select>
</div>
<div class="main-button1 btnclass" id="btnid16"> <button onkeypress="onenter(event)" onclick="nextElement()" type="button" class="main-okay-btn"> Ok </button></div>
</div>
</div>
</div>
</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_15')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
var ele= document.getElementById("no_kids");
function childnum(event)
{
var val = ele.value;
event.preventDefault();
updateDatas('user_id','customer_lifestyle','no_kids',val,'stepper_17');
}
</script>