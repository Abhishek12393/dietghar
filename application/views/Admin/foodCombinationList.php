<?php
//pr($message);die;
 include('header.php');?>
<?php include('sidebar.php');

?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
</style>
<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<a href="#" class="breadcrumb-item">Food Combination</a>
							<span class="breadcrumb-item active">Food Combination List</span>
						</div>

					</div>

				
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Basic responsive configuration -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Food Combination List</h5>
					
					</div>

					

					<table class="table datatable-responsive">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Food Combination</th>
								<th>Placement Name</th>
								<th>Food Type</th>
								<th>Food Disease</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
						<?php $i=1; foreach ($message as  $value) {
						?>
							<tr>
								<td><?=$i;?></td>
								<td><?=$value->foodcombination_name;?></td>
						 		<td><?=$value->placements;?></td> 
						 		<td><?=$value->foodCategory;?></td> 
								<td><a data-toggle="modal" data-target="#myModalDisease_<?=$value->id?>" class="btn btn-primary" style="color: #fff;">Disease</a></td>
								
								<td style="display: inline;">
									<a href="<?=base_url()?>Admin/edit_foodcombination/<?=$value->no_of_chart;?>/<?=$value->food_combination_no;?>">
									<button type="button" class="btn btn-success rounded-round"><i class="fa fa-pencil"></i></button></a>
								</td>
								<td>
									<a href="<?=base_url()?>Admin/deleteFoodcombination/<?=$value->no_of_chart;?>/<?=$value->food_combination_no;?>">
									<button type="button" class="btn btn-danger rounded-round"><i class="fa fa-trash"></i></button></a>
								</td>
							</tr>

						<?php $i++; } ?>
						</tbody>
					</table>
				</div>
				<!-- /basic responsive configuration -->

			</div>
			<!-- Modal -->
				<?php foreach ($message as  $value) {
						?>
  <div class="modal fade" id="myModalDisease_<?=$value->id?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">In Which Not to be Given</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <table style="width: 100%">
          	<thead>
          		<tr>
          			<th>Disease Name</th>
          			<th>Frequency</th>
          		</tr>
          	</thead>
          	<tbody>
          		<?php foreach ($value->fileterdisease as $key => $val) {
          			?>
          		<tr>
          			<td><?=$val->diseaseName;?></td>
          			<td><?=$val->frequency;?></td>
          		</tr>
          	<?php } ?>
          	</tbody>
          </table>
        </div>
       
      </div>
      
    </div>
  </div>
<?php } ?>
			<!-- /content area -->
<?php include 'footer.php';?>