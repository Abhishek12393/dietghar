<?php
// pr($message);die;
// prd($user_id);
include('header.php');?>
<?php include('sidebar.php');?>
<!-- Main content -->
<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="page-header border-bottom-0">
<div class="page-header-content header-elements-md-inline">
<div class="page-title d-flex">
<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Notes of </h4>
<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
</div>
<div class="header-elements d-none mb-3 mb-md-0">
					<div class="d-flex justify-content-center">
						<a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator"></i> <span>Invoices</span></a>
					</div>
				</div>
			</div>
		</div>
		<!-- Basic responsive configuration -->
		
		
<!-- Blog post -->
<div class="timeline-row">
	<div class="row">
	<?php foreach ($message as $key => $value) {?>		
		<div class="col-lg-6">
		<div class="card">
		<div class="card-header header-elements-sm-inline">
		<h6 class="card-title"></h6>
		<div class="header-elements">
		<span><i class="icon-checkmark-circle mr-2 text-success"></i><?php  echo time_elapsed_string($value->added_datetime,true); ?></span>
		</div>
		</div>
		<div class="card-body">
		<p class="mb-2 font-size-base">
			<?=$value->note ?>
			 
		</p>
		</div>
		</div>
		</div>
	<?php }?>
 

	<!-- <div class="col-lg-6">
	<div class="card">
	<div class="card-header header-elements-sm-inline">
	<h6 class="card-title"></h6>
	<div class="header-elements">
	<span><i class="icon-checkmark-circle mr-2 text-success"></i> 3 hours ago</span>
	</div>
	</div>
	<div class="card-body">
	<p class="mb-2 font-size-base">Pernicious drooled tryingly over crud peaceful gosh yet much following brightly mallard hey gregariously far gosh until earthworm python some impala belched darn a sighed unicorn much changed and astride cat and burned grizzly when jeez wonderful the outside tedious.</p>
	</div>
	</div>
	</div> -->

</div>
</div>
<!-- /blog post -->
<!-- Messages -->
<div class="timeline-row">
<div class="timeline-icon">
<div class="bg-info-400">
<i class="icon-comment-discussion"></i>
</div>
</div>
<div class="card">
<div class="card-body">
	<form action="<?php echo base_url(); ?>Admin/add_notes" method="POST">
		<input type="hidden" name="user_id" value="<?=$user_id ?>">
		<textarea name="enter_message" class="form-control mb-3" rows="3" cols="1" placeholder="Enter your message..."></textarea>
		<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-auto"><b><i class="icon-paperplane"></i></b> Send</button>
		<!-- <button type="button" class="btn btn-danger" id="noty_error">Launch <i class="icon-play3 ml-2"></i></button> -->
	</form>
</div>
</div>
<!-- /messages -->
<?php include 'footer.php';?>

