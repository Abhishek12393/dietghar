<!-- Basic responsive configuration -->
<div class="col-lg-6">
<div class="card">
<div class="card-header header-elements-inline">
<h5 class="card-title">7 Days Call Schedule</h5>
<!-- <span><a href="<?php echo base_url(); ?>Admin/region" class="btn btn-primary rounded-round">Add Region</a></span> -->
</div>
<table class="table datatable-responsive">
<thead>
<tr><th>S.No</th><th>Client Name</th><th>Mobile No</th><th>Plan Type</th><th>Day</th><th class="text-center">Action</th></tr>
</thead>
<tbody>
<?php $i=1; foreach($message as $val){ ?>
<tr>
<td><?=$i?></td>
<td><?=$val['first_name']." ".$val['last_name']?></td>
<td><?=$val['mobile_no']?></td>
<td><?php if($val['plan_name']==1){ ?>15 Days <?php }elseif($val['plan_name']==2){ ?>30 Days<?php } ?></td>
<td>7</td>
<td class="text-center">
<a href="#" class="btn btn-success rounded-round" title="Profile"><i class="fa fa-eye"></i></a>
<a data-toggle="modal" data-target="#modal_theme_success1_<?=$val['call_id']?>" class="btn btn-primary rounded-round" title="Comment"><i class="fa fa-pencil"></i></a>
<a data-toggle="modal" data-target="#modal_theme_success_<?=$val['call_id']?>" class="btn btn-info rounded-round" title="Weight Update"><i class="fa fa-pencil-square-o"></i></a>
<a href="#" class="btn btn-danger rounded-round" title="Call Status"><i class="fa fa-phone"></i></a>
</td>
</tr>
<?php $i++; } ?>
</tbody>
</table>
</div>
</div>
</div>
<!-- /content area -->
<script type="text/javascript">
function isNumber(evt) {
var iKeyCode = (evt.which) ? evt.which : evt.keyCode
if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
return false;
return true;
}
</script>
<?php include 'footer.php';?>
<?php  foreach($message as $val){ 
$weight = $this->Custommodel->Select_common_where('measurement_history','cust_id',$val['user_id']);
// pr($weight);
?>
<div id="modal_theme_success_<?=$val['call_id']?>" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h6 class="modal-title">Weight History</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Date</th>
									<th>Weight (In Kgs)</th>
									
								</tr>
							</thead>
							
							<tbody>
							<?php foreach($weight as $w){ ?>
								<tr>
									<td><?=$w['c_date']?></td>
									<td><?=$w['weight']?></td>
									
								</tr>
								<?php } ?>
							</tbody>
							
						</table>
					</div><br>
						<div class="row">
							<form method="post" action ="<?=base_url('Admin/update_weight')?>">
								<div class="col-md-6">
									<label>Enter Weight(In Kgs)</label>
									<input type="text" onkeypress="javascript:return isNumber(event)" name="Weight" maxlength="3" class="form-control" required="">
									<input type="hidden" name="user_id" value="<?=$val['user_id']?>">
								</div>
								<div class="col-md-3" style="padding-top: 27px;">
									
									<input type="submit" name="" value="Update" class="btn btn-primary">
								</div>
							</form>
						</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php $i=1; foreach($message as $val){ ?>
				<div id="modal_theme_success1_<?=$val['call_id']?>" class="modal fade" tabindex="-1">
				<form method="post" action="<?=base_url('Admin/update_comment')?>">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-success">
								<h6 class="modal-title">Comment</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								
						<div class="row">
							<div class="col-md-12">
								<label>Enter Comment</label>
								<input type="hidden" name="call_id" value="<?=$val['call_id']?>">
								<textarea class="form-control" rows="3" name="comment" placeholder="Enter Comment"></textarea>
							</div>
							<div class="col-md-3" style="padding-top: 27px;">
								
								<input type="submit" name="" value="Update" class="btn btn-primary">
							</div>
						</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								
							</div>
						</div>
					</div>
				</div>
				</form>
				<?php } ?>