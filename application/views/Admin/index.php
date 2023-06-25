<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Dietghar-Login</title>

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
	<script src="<?php echo base_url(); ?>admin/assets/js/app.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	


	<!-- Page content -->
	<div class="page-content" style="background-color: #333;">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<form class="login-form" action="<?=base_url('Admin/login')?>" method="post">
					<div class="card mb-0">
						<div class="card-body">
							<span style="color: red"><?php echo $this->session->flashdata('message'); ?></span>
								
							<div class="text-center mb-3">
								<i class="icon-readingx icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"><img class="img-center" src="<?=base_url('dgassets/admin/logo.png')?>" alt="logo-img" width="80" height="80px;"></i>
								<h5 class="mb-0">Login to your account</h5>
								<span class="d-block text-muted">Enter your credentials below</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							<div class="text-center">
								<a href="<?=base_url('Admin/forgot')?>">Forgot password?</a>
							</div>
						</div>
					</div>
				</form>
				<!-- /login form -->

			</div>
			<!-- /content area -->


			
		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

<script type="text/javascript">var sc_project=8042139; var sc_invisible=1; var sc_security="034832da";</script><script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script><noscript><div class="statcounter"><a title="website statistics" href="https://statcounter.com/" target="_blank"><img class="statcounter" src="https://c.statcounter.com/8042139/0/034832da/1/" alt="website statistics" referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>
</body>
</html>
