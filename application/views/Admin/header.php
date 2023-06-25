<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>DietGhar | Admin</title>
	<script type="text/javascript">
		// test script 
		console.log(<?php print_r(json_encode($_SESSION)) ?>);
	</script>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>admin/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>admin/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>admin/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>admin/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>admin/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url(); ?>admin/global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/assets/js/app.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/datatables_responsive.js"></script>
	<!-- /theme JS files -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/forms/styling/uniform.min.js"></script>		
	<!-- form select2 js using in only chart preparation -->
	<!-- <script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/form_select2.js"></script> -->
	<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/form_inputs.js"></script>	
	<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/notifications/noty.min.js"></script>	
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script src="<?php echo base_url(); ?>admin/global_assets/js/plugins/notifications/noty.min.js"></script>
	<!-- <script src="<?php #echo base_url(); ?>admin/assets/js/app.js"></script> -->
	<script src="<?php echo base_url(); ?>admin/global_assets/js/demo_pages/extra_jgrowl_noty.js"></script>

 
	<!-- /theme JS files -->

	<style type="text/css">
  .row {
  display: flex;
}

/* Left column (menu) */
.left {
  flex: 35%;
  padding: 15px 0;
}

.left h2 {
  padding-left: 8px;
}

/* Right column (page content) */
.right {
  flex: 65%;
  padding: 15px;
}

/* Style the search box */
#mySearch {
  width: 100%;
  font-size: 18px;
  padding: 11px;
  border: 1px solid #ddd;
}

/* Style the navigation menu inside the left column */
#myMenu {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myMenu li a {
  padding: 12px;
  text-decoration: none;
  color: black;
  display: block
}

#myMenu li a:hover {
  background-color: #eee;
}
select{
 		background-color: #2a3242 !important;
 	}
 	.dataTable thead .sorting_desc:after {
    content: "" !important;
    opacity: 1;
}
</style>
</head>

<body>
	<input type="hidden" id="baseurl" value="<?=base_url();?>">
	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="index.html" class="d-inline-block">
				<img src="<?php echo base_url(); ?>admin/global_assets/images/logo_light.png" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
				
				
			</ul>
			<input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="User Information" class="form-control" style="margin-right: 10px;border: 2px solid #fff">
			 <ul id="myMenu" style="position: absolute;display:none;z-index: 999;background: #fff;margin-left: 5%;width: 50%;    margin-top: 27%;
    height: 300px;
    overflow-x: auto;">
      <li ><a href="#"><span><b>Name:</b>&nbsp;Akarshitttt</span>&nbsp;&nbsp;&nbsp;<span><b>Mobile:</b>&nbsp;9876543210</span></a></li>
      <li ><a href="#"><span><b>Name:</b>&nbsp;sanjeev</span>&nbsp;&nbsp;&nbsp;<span><b>Mobile:</b>&nbsp;9876543210</span></a></li>
      <li ><a href="#"><span><b>Name:</b>&nbsp;sudhir</span>&nbsp;&nbsp;&nbsp;<span><b>Mobile:</b>&nbsp;9876543210</span></a></li>
  </ul>
			  
			
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					
					
					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-300">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Users online</span>
							<a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list">
								
							</ul>
						</div>

						<div class="dropdown-content-footer bg-light">
							<a href="#" class="text-grey mr-auto">All users</a>
							<a href="#" class="text-grey"><i class="icon-gear"></i></a>
						</div>
					</div>
				</li>

				

				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url(); ?>admin/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
						<span><?=$_SESSION['username']?></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo base_url(); ?>Admin/myprofile" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<a href="<?php echo base_url(); ?>Admin/logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">
		<script>
function myFunction() {
   var ins = $("#mySearch").val();
  
   if(ins != ''){
$('#myMenu').show();
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}else{
  $('#myMenu').hide();
}
}
</script>