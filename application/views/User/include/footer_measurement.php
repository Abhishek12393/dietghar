<script>
	console.log('Measurement page loaded');
</script>
<?php if($page == 'male_measurement'):?>
	<script>
		console.log('male');
	</script>
<?php elseif($page== 'female_measurement'): ?>
	<script>
		console.log('female');

	</script>
<?php endif ; ?>