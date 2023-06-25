<?php
 $this->load->view('Admin/header2');
#include('../header2.php');?>
<script src="https://dietghar.com/diet/admin/assets/functions/type.js"></script> <!-- <==Not confirmed whats this - at-->
<script src="https://dietghar.com/diet/admin/assets/functions/typesub.js"></script>
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
</style>


<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">
	<?php if($_GET['m']): ?>
	<div class="alert alert-primary border-0 alert-dismissible">
		<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
		<span class="font-weight-semibold">Message :</span> <?=$_GET['m']; ?>
	</div>
	<?php endif; ?>
		<a href="<?=base_url();?>/cron_ci/log/sevenmealBreakdownCron.json"> Cron View:</a>
		<!-- Hover rows -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Table view => <?=$table; ?> : Rows : <?=$count; ?></h5>
				<h5 class="card-title">Chart Details</h5>
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

					<!-- form table for entry -->
					<table class="table table-hover table-bordered">

						<thead>
							<tr>
								<th>CombNo:</th>
								<th>Early Morning<p class="badge badge-clr1">6 AM</p></p></th>
								<th class="<?php echo $type_class_breafast;?>">Breakfast<p class="badge badge-clr1">9 AM</p></th> 
								<th class="<?php echo $type_class_midmeal;?>">Mid Meal<p class="badge badge-clr1">11 AM</p></th>
								<th class="<?php echo $type_class_lunch;?>">Lunch<p class="badge badge-clr1">1 PM</p></th>
								<th class="<?php echo $type_class_eveningtea;?>">Evening Snack<p class="badge badge-clr1">4 PM</p></th>
								<th class="<?php echo $type_class_dinner;?>">Dinner<p class="badge badge-clr1">8 PM</p></th>
								<th class="<?php echo $type_class_bedtime;?>">Bed Time<p class="badge badge-clr1">10 PM</p></th>
								<th>Total</th>
								<th class="<?php echo $type_class_bedtime;?>">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								
								if(!empty($data)):
									foreach($data as $i=>$row):
							 
							?>
							<tr>
								<td style="width: 2%" ><?=$row['id']; ?></td>
								<!-- morning cell -->
								<?php $name = "morning";
						 	 ?>
								<td style="width: 11%" class="cursor-move">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_morning_<?=$day?>">
											<?=$row['morning']; ?>
 
											</strong>
										</p>
									</div>
								</td>
								<!-- breakfast cell  -->
								<?php $name = "breakfast"; ?>
								<td style="width: 11%">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_breakfast_<?=$day?>">
												<strong class="">
													<span>
													<?=$row['breakfast']; ?>
													</span>
												</strong>
											</strong>
										</p>
									</div>
								</td>
								<!-- midmeal cell -->
								<?php $name = "midmeal"; ?>
								<td style="width: 11%">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_midmeal_<?=$day?>">
												<strong class="">
													<span>
													<?=$row['midmeal']; ?>
													</span>
												</strong>
											</strong>
										</p>
									</div>
		 
								</td>
								<!-- lunch cell -->
								<?php $name = "lunch"; ?>
								<td style="width: 11%">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_lunch_<?=$day?>">
												<strong class="">
													<span>
													<?=$row['lunch']; ?>
													</span>
												</strong>
											</strong>
										</p>
									</div>
	 
								</td>
								<!--evening cell  -->
								<?php $name = "evening"; ?>
								<td style="width: 11%">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_evening_<?=$day?>">
												<strong class="">
													<span>
													<?=$row['evening']; ?>
													</span>
												</strong>
											</strong>
										</p>
									</div>
	 
								</td>
								<!-- dinner cell -->
								<?php $name = "dinner" ; ?>
								<td style="width: 11%">
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_dinner_<?=$day?>">
												<strong class="">
													<span>
													<?=$row['dinnner']; ?>
													</span>
												</strong>
											</strong>
										</p>
									</div>
 								</td>
								<!-- bedtime cell -->
								<?php $name= "bedtime" ; ?>
								<td style="width: 11%" >
									<div style="padding-top: 15%;">
										<p style="font-size: 14px; word-wrap: break-word;text-align: justify;">
											<strong class="passenger-list_bedtime_<?=$day?>">
												<strong class="">
													<span>
													<?=$row['bedtime']; ?>
													</span>
												</strong>
											</strong>
										</p>
									</div>
								</td>
								<?php 
									$box_calo =0;
									$box_pro =0;
									$box_fat =0;
									$box_cabs =0;
									$box_sodium =0;
									$box_iron =0;
									$box_fibre =0;
									$total_box_calo =0;
									$total_box_pro =0;
									$total_box_fat =0;
									$total_box_cabs =0;
									$total_box_sodium =0;
									$total_box_iron =0;
									$total_box_fibre =0;
									//$day = $key+1;
								?>
								<td style="width: 9%">
	 
									<p class="badge badge-clr2  total_calorie_box_<?=$day?>"><?=$row['totalcalories'];?></p>
								 
									<div style="padding-top: 30%;">
										<span class="badge badge-clr3 total_protein_box_<?=$day?>"><?=$row['totalprotein'];?></span>
										<span class="badge badge-clr4 total_cabs_box_<?=$day?>"><?=$row['totalcarbohydrates'];?></span>
										<span class="badge badge-clr5 total_fat_box_<?=$day?>"><?=$row['totalfat'];?></span>
										<span class="badge badge-clr6 total_sodium_box_<?=$day?>"><?=$row['totalsodium'];?></span>
										<span class="badge badge-clr7 total_iron_box_<?=$day?>"><?=$row['totaliron'];?></span>
										<span class="badge badge-clr8 total_fibre_box_<?=$day?>"><?=$row['totald_fibre'];?></span>
 
									<div>
								</td>
								<td style="width:5%;">
 
									<form action="<?=base_url();?>DBManager/deletedayfromtb"  method="POST" target="_parent">
									<input type="hidden" name="fromtable" value="<?=$table;?>">
									<input type="hidden" name="fromid" value="<?=$row['id']?>">
									<input type="hidden" name="pageid" value="<?='tableview'?>">
										<input type="submit" value="Reject">
									</form>
										<br>
				 
									</td>
							</tr>
							</tr>
							<?php endforeach ; 
								endif;
							?>
						</tbody>
					</table>
 
 
			</div>
		</div>
	</div> 	<!--  content  -->
</div><!--  content wrapper -->

 
<?php #$this->load->view('Admin/footer2');?>