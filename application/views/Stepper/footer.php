</div>
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
	console.log(<?php print_r(json_encode($_SESSION)); ?>);
</script>
</body>
</html>
