</body>
  <!-- JS Files-->
  <script src="<?=base_url('stepper_assets/')?>js/jquery.min.js "></script>
  <script src="<?=base_url('stepper_assets/')?>plugins/simplebar/js/simplebar.min.js "></script>
  <script src="<?=base_url('stepper_assets/')?>plugins/metismenu/js/metisMenu.min.js "></script>
  <script src="<?=base_url('stepper_assets/')?>js/bootstrap.bundle.min.js "></script>
  <!-- <script type="module " src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js "></script> -->
  <!--plugins-->
  <script src="<?=base_url('stepper_assets/')?>plugins/perfect-scrollbar/js/perfect-scrollbar.js "></script>
  <script src="<?=base_url('stepper_assets/')?>plugins/datetimepicker/js/legacy.js "></script>
  <script src="<?=base_url('stepper_assets/')?>plugins/datetimepicker/js/picker.js "></script>
  <script src="<?=base_url('stepper_assets/')?>plugins/datetimepicker/js/picker.time.js "></script>
  <script src="<?=base_url('stepper_assets/')?>plugins/datetimepicker/js/picker.date.js "></script>
  <script src="<?=base_url('stepper_assets/')?>plugins/bootstrap-material-datetimepicker/js/moment.min.js "></script>
  <script src="<?=base_url('stepper_assets/')?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js "></script>
  <!-- <script src="<?=base_url('stepper_assets/')?>js/form-date-time-pickes.js "></script> -->
	  <!-- Main JS-->
  <!-- <script src="<?=base_url('stepper_assets/')?>js/main.js "></script>   -->

<script type="text/javascript">
function updateData(where,tab,column,third,nextId){
	console.log(nextId);
	$.ajax({
		url:  baseURL + 'Diet/Update',
		type: 'POST',
		data: {table: tab,column:column,value:third,where:where,button:nextId},
		error:  function(xhr, ajaxOptions, thrownError){ 
			// alert('Something is wrong');
			// alert(xhr.status);
		},
		success: function(data) {
			$("#form_id").submit();
		}
	});
}
function updateDatas(where,tab,column,third,nextId){
	// console.log(nextId);
	$.ajax({
		url:  baseURL + 'Diet/Updates',
		type: 'POST',
		data: {table: tab,column:column,value:third,where:where,button:nextId},
		error: function(data) {
			// if(column == 'have_kids'){}else{ }
			alert('Something is wrong');
 
		},
		success: function(data) {	 
			// $("#form_id").submit();
		},
		complete: function () {
			$("#form_id").submit();
		}
	});
}
function isNumeric(char) {
	// console.log('called'+char);
  if (typeof char !== 'string') {
    return false;
  }

  if (char.trim() === '') {
    return false;
  }

  return !isNaN(char);
}
</script>

<script type="text/javascript">
	// console.log(<?php print_r(json_encode($_SESSION)); ?>);
</script>
<script type="text/javascript"> var sc_project=8424245;  var sc_invisible=1;  var sc_security="e92effa0";  </script><script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script><noscript><div class="statcounter"><a title="Web Analytics" href="https://statcounter.com/" target="_blank"><img class="statcounter" src="https://c.statcounter.com/8424245/0/e92effa0/1/" alt="Web Analytics" referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>