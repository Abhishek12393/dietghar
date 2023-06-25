<?php include('header.php'); ?>
<form name="myform" id="form_id" method="post" action="<?=base_url('Stepper/stepper_4')?>">
	<section id="main-sectoin">
		<div class="container" id="id3">
			<div class="row justify-content-md-center">
				<div class="col col-lg-8">
					<div class="section-area" id="dob1">
						<!--<img src="<?php echo base_url(); ?>stepper/calendar.png" class="title-images" alt="set">-->
						<h4 class="title-label"><span>3) </span> Enter Date Of Birth? * </h4>
						<input  type="tel" id="i3" maxlength="10" onkeyup="show(event)" placeholder="DD/MM/YYYY" class="main-input date-format" onkeypress="javascript:return isNumber(event)"  autocomplete="off"  required>
						<span class="error" id="sp" style="display: none">age should be in between 18 to 65 years</span>
					</div>
					<div class="section-area"><h4 class="title-label" id="sp1" ></h4></div>
				</div>
			</div>
		</div>
	</section>
</form>
<div class="next-and-back-arrow"><a href="<?=base_url('Stepper/stepper_2')?>"><img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a></div>
<?php include('footer.php'); ?>
<script>
	document.getElementById("i3").focus();
	var isShift = false;
	var seperator = "/";
	var input;
	var err=0;
	function show(event)
	{
		IsNumeric(this,event);
		ValidateDateFormat(this,event);  
	}
	function IsNumeric(input ,e) 
	{
		input= document.getElementById("i3");
		if (e.keyCode == 16) {
			isShift = true;
		}
		if (((e.keyCode >= 48 && e.keyCode <= 57) || e.keyCode == 8 || e.keyCode <= 37 || 
			e.keyCode <= 39 || (e.keyCode >= 96 && e.keyCode <= 105)) && isShift == false) {
			if ((input.value.length == 2 || input.value.length == 5) && e.keyCode != 8) {
				input.value += seperator;
			}
			else if (input.value.length == 10 ) {
				$('input').blur();
				var date = input.value;
				var newdate = date.split("/").reverse().join("-");
				console.log(newdate);

				$.ajax({
					url:  baseURL + 'Diet/checkdob',
					type: 'POST',
					data: {value:newdate},
					error: function() {
						alert('Something is wrong');
					},
					success: function(data) {
						console.log(data)
						$("#sp1").html(data);
						setTimeout(function(){
							$.ajax({
								url:  baseURL + 'Diet/Update',
								type: 'POST',
								data: {table: 'customers_info',column:'dob',value:newdate,where:'id',button:'stepper_4'},
								error: function() {
									alert('Something is wrong');
								},
								success: function(data) {
									$("#form_id").submit();
								}
							});
						}, 3000);
					}
				});
			}
		}
		else
		{
			input.value="";
		}
	}
	function ValidateDateFormat( input,e) {
		input= document.getElementById("i3");
		var dateString = input.value;
		if (e.keyCode == 16) {
			isShift = false;
		}
		var regex = /(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/;
		if (regex.test(dateString) || dateString.length == 0) {
			ShowHideError(input, "none");
			err=0;
		} else {
			ShowHideError(input, "block");
		}
		if(input.value.length==10 && err==0)
		{
			document.getElementById("sp1").style.display="block";
			document.getElementById("dob1").style.display="none";
		}         
	}
	function ShowHideError(textbox, display) {
var errorMsg = document.getElementById("sp"); //row.getElementsByTagName("span")[0];
if (errorMsg != null) {
	errorMsg.style.display = display;
	document.getElementById("next").style.display="none";
	err=1;
}
}
</script>
<script type="text/javascript">
	function isNumber(evt) {
		var iKeyCode = (evt.which) ? evt.which : evt.keyCode
		if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
			return false;
		return true;
	}
</script>