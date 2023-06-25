<?php $this->view('Admin/header2.php'); ?>
<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">
	<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">update food item image : <?=$dbtable; ?></h5>
			</div>
			<div class="card-body"> 
			  <img src="<?=base_url().$imgpath; ?>" alt="tabv">  
				<form action="<?=base_url()?>Admin/uploadfoodimage" method="post" enctype="multipart/form-data" >
					<input type="hidden" name="hid" value="<?=$id; ?>">
					<input type="file" name="foodimage">
					<input type="submit" value="submit">
				</form>
			</div>
		</div>

	<!-- </div>
</div> -->
<?php #include 'footer2.php';
 $this->view('Admin/footer2.php');
?>