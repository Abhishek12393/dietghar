   <?php
 
	$this->view('Admin/header2.php');
?>
<script src="https://dietghar.in/diet/admin/assets/functions/type.js"></script>
<script src="https://dietghar.in/diet/admin/assets/functions/typesub.js"></script>
<!-- Main content -->
<style type="text/css">
.table td, .table th{padding: 4px !important;}
.badge{padding: 4px;}
.badge-clr1 {color: #fff;background-color: #009688;float: right;}
.badge-clr2 {color: #fff;background-color: #abab3e;
	/* float: right;*/padding: 8px;font-size: 12px;
}
.badge-clr21 {color: #fff;background-color: #abab3e;padding: 8px;font-size: 12px;}
.badge-clr22 {color: #fff;background-color: #abab3e;}
.badge-clr3 {color: #fff;background-color: red;}
.badge-clr4 {color: #fff;background-color: #62a52f;}
.badge-clr5 {color: #fff;background-color: #0037ff;}
.badge-clr6 {color: #fff;background-color: #2196f3;}
.badge-clr7 {color: #fff;background-color: #5c6bc0;}
.badge-clr8 {color: #fff;background-color: #ff7043;}
.fa-2x {font-size: 21px !important;}
.hidden{display: none;}
.btn-primary {color: #fff;background-color: #2196f3;padding: 5px;}
.type{display: none;}
.unit-input{display:inline; width:40%;background:#f1f9ef;}
.float-input{display:inline; width:15%;float:left;}
</style>
<?php 
//$ty = 4;
if($ty==4){
	$type_class_bedtime = 'type';
	/*$type_class_midmeal = 'type';*/
}

if($ty==3){
	$type_class_breafast = 'type';
	$type_class_eveningtea = 'type';
}
if($ty==2){
	$type_class_eveningtea = 'type';
}
if($ty==5){
	$type_class_midmeal = 'type';
	$type_class_eveningtea = 'type';
}
if($ty==6){
	$type_class_dinner = 'type';
}
if($ty==7){
	$type_class_lunch = 'type';
}
if($ty==8){
	$type_class_midmeal = 'type';
	$type_class_eveningtea = 'type';
	$type_class_bedtime = 'type';
}
?>

 
 
<!-- // important all calculation done from this chart :: -->
 
<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">
		<!-- Hover rows -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Chart ID : <?=$chartid; ?></h5>
				<h5 style="float: right;">
					<span class="badge badge-clr22">Calories</span>
					<span class="badge badge-clr3">Protein</span>
					<span class="badge badge-clr4">Carbohydrates</span>
					<span class="badge badge-clr5">Fats</span>
					<span class="badge badge-clr6">Sodium</span>
					<span class="badge badge-clr7">Iron</span>
					<span class="badge badge-clr8">D.Fibre</span>
				</h5>
			</div>

			<div class="table-responsive">
 
					<table class="table table-hover table-bordered">
						<input type="hidden" name="cust_id" value="<?=$cust_id?>">
						<thead>
							<tr>
				 			<th></th>
							<th>day</th>
							<th>meal_date</th>
							<th>morning</th>
							<th>breakfast</th>
							<th>midmeal</th>							
							<th>lunch</th>							
							<th>evening</th>							
							<th>dinnner</th>							
							<th>bedtime</th>							
							<th>totalcalories</th>							
							<th>food_cate</th>							
							</tr>
						</thead>
						<tbody>
							<?php foreach($final_userfoodchart as $val){ ?>
							<tr>
								<th><?='' ?></th>
								<th><?=$val['day']; ?></th>
								<th><?=$val['meal_date']; ?></th>
								<th><?=$val['morning']; ?></th>
								<th><?=$val['breakfast']; ?></th>
								<th><?=$val['midmeal']; ?></th>
								<th><?=$val['lunch']; ?></th>
								<th><?=$val['evening']; ?></th>
								<th><?=$val['dinnner']; ?></th>
								<th><?=$val['bedtime']; ?></th>
								<th><?=$val['totalcalories']; ?></th>
								<th><?=$val['food_cate']; ?> 
								<?php  if(isset($reallot) && $reallot == 1) {?>
									 
								<?php }else{ ?>
									<a class="btn btn-success" href="<?=base_url('Admin/user_finalfoodchart_edit/').$val['id'];?>" target="_blank">Edit</a>
								<?php } ; ?>
							</th>
							</tr>
							<?php } ?>
						</tbody>
</table>
<?php  if(isset($reallot) && $reallot == 1) {?>			
	<form action="<?=base_url('Admin/clientfoodchart_final_submit')?>" method="POST" >  
	<?php  
	if(isset($renewchart) && $renewchart == 1) {?>
		<input type="hidden" name="renewchart" value="1" >
	<?php } ?>
		<input type="hidden" name="cust_id" value="<?=$cust_id ; ?>">
		<input type="hidden" name="meal_chart_id" value="<?=$chartid ; ?>">
		<input type="hidden" name="reallot" value="<?=$reallot ; ?>">
		<input type="hidden" name="fromcust_id" value="<?=$fromcust_id ; ?>">
		<div class="text-center">
			<input type="submit" class="btn btn-success" name="submit">
		</div><br>
	</form>
<?php }?>
</div>
</div>
<!-- /hover rows -->
</div>
<!-- /content area -->

 
 
<?php #include 'footer2.php';
 $this->view('Admin/footer2.php');
?>