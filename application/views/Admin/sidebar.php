<!-- Main sidebar -->
<?php 
	$routes = $this->router->fetch_method();
	$role = $_SESSION['role'];
?>
 <style type="text/css">
 	.newactive{
 		color: #fff !important;
    background-color: #4caf50 !important;
 	}
 </style>
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						<!-- Main -->
						<?php if($role !=1){ ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>Admin/Dashboard" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<?php } ?>
						<li class="nav-item nav-item-submenu <?php if($routes=='paid_users' || $routes=='unpaid_users' || $routes=='formnotfilled' || $routes=='allusers' || $routes=='expired_users'|| $routes=='renew_users' || $routes=='contactform'){ echo 'nav-item-open';}?>">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Users</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="<?php if($routes=='paid_users' || $routes=='unpaid_users' || $routes=='formnotfilled' || $routes=='allusers' || $routes=='expired_users' || $routes=='renew_users'|| $routes=='contactform'){ echo 'display: block;';}else{echo 'display: none;';}?>">

								<?php if($role !=1){ ?>
									<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/allusers" class="nav-link <?php if($routes=='allusers' ){echo 'newactive';} ?>">All Users</a></li>
									<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/paid_users" class="nav-link <?php if($routes=='paid_users' ){echo 'newactive';} ?>">Paid Users</a></li>
									<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/unpaid_users" class="nav-link <?php if($routes=='unpaid_users' ){echo 'newactive';} ?>">Un-Paid Users</a></li>
									<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/expired_users" class="nav-link <?php if($routes=='expired_users' ){echo 'newactive';} ?>">Expired Users</a></li>
									<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/renew_users" class="nav-link <?php if($routes=='renew_users' ){echo 'newactive';} ?>">Renew Users</a></li>
									<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/formnotfilled" class="nav-link <?php if($routes=='formnotfilled' ){echo 'newactive';} ?>">Form Not Filled</a></li>
									<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/contactForm" class="nav-link <?php if($routes=='contactform' ){echo 'newactive';} ?>">User ContactForm</a></li>
								<?php }elseif($role == 1){ ?>
									<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/paid_users_diet" class="nav-link <?php if($routes=='paid_users_diet' ){echo 'newactive';} ?>">Users List</a></li>
								<?php } ?>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu <?php if($routes=='addfood' || $routes=='foodlist' ){ echo 'nav-item-open';}?>">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Food Master</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="<?php if($routes=='addfood' || $routes=='foodlist'){ echo 'display: block;';}else{echo 'display: none;';}?>">
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/addfood" class="nav-link <?php if($routes=='addfood' ){echo 'newactive';} ?>">Add Food</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/foodlist" class="nav-link <?php if($routes=='foodlist' ){echo 'newactive';} ?>">Food list</a></li>
							</ul>
						</li>
						<?php if($role !=1){ ?>
						<li class="nav-item nav-item-submenu <?php if($routes=='food_category' || $routes=='foodcategorytype' || $routes=='managedisease' || $routes=='managenutrition' || $routes=='manageunit' || $routes=='manageplacement' || $routes=='foodcombination' || $routes=='foodCombinationList' ){ echo 'nav-item-open';}?>">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Food Data</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="<?php if($routes=='food_category' || $routes=='foodcategorytype' || $routes=='managedisease' || $routes=='managenutrition' || $routes=='manageunit' || $routes=='manageplacement' || $routes=='foodcombination' || $routes=='foodCombinationList'){ echo 'display: block;';}else{echo 'display: none;';}?>">
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/food_category" class="nav-link <?php if($routes=='food_category' ){echo 'newactive';} ?>">Manage Food Category</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/foodcategorytype" class="nav-link <?php if($routes=='foodcategorytype' ){echo 'newactive';} ?>">Manage Food Category Type</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/managedisease" class="nav-link <?php if($routes=='managedisease' ){echo 'newactive';} ?>">Manage Disease</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/managenutrition" class="nav-link <?php if($routes=='managenutrition' ){echo 'newactive';} ?>">Manage Nutrition</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/manageunit" class="nav-link <?php if($routes=='manageunit' ){echo 'newactive';} ?>">Manage Unit</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/manageplacement" class="nav-link <?php if($routes=='manageplacement' ){echo 'newactive';} ?>">Manage Placement</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/foodcombination" class="nav-link <?php if($routes=='foodcombination' ){echo 'newactive';} ?>">Manage Food Combination</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/test3" class="nav-link <?php if($routes=='test3' ){echo 'newactive';} ?>">Food Combination List</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/foodchart_dataEntry" class="nav-link <?php if($routes=='foodchart_dataEntry' ){echo 'newactive';} ?>">Food Chart - Dataentry List</a></li>

								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/checkFoodchart" class="nav-link <?php if($routes=='checkFoodchart' ){echo 'newactive';} ?>">Food Chart - Check</a></li>
								<li class="nav-item"><a href="<?php echo base_url();  ?>Admin/foodcombinationManage" target="_blank" class="nav-link <?php if($routes=='foodcombinationManage' ){echo 'newactive';} ?>">Food Combination Manage</a></li>
							</ul>
						</li>
						<?php } ; ?>
						<?php if($role !=1){ ?>
						<li class="nav-item nav-item-submenu <?php if($routes=='manageexercise' || $routes=='chartexercise'){ echo 'nav-item-open';}?>">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Exercise</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="<?php if($routes=='manageexercise' || $routes=='chartexercise'){ echo 'display: block;';}else{echo 'display: none;';}?>" >
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/manageexercise" class="nav-link <?php if($routes=='manageexercise' ){echo 'newactive';} ?>">Manage Exercise</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/chartexercise" class="nav-link <?php if($routes=='chartexercise'){echo 'newactive';} ?>">Chart Exercise</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Recipe Master</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin_recipe/view" class="nav-link">Manage Recipe</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin_recipe/addrecipe" class="nav-link">Add Recipe</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin_recipe/manage_tags" class="nav-link">Manage Tags</a></li>
							</ul>
						</li>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Profile</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/managerole" class="nav-link">Manage Role</a></li>
							</ul>
						</li>

						<li class="nav-item nav-item-submenu <?php if($routes=='managefaq' || $routes=='addfaq' || $routes=='manageblog' || $routes=='manageGallery'|| $routes=='managereview' || $routes=='contact' || $routes=='appointment' || $routes=='Fb_review' || $routes=='managefaqUser'){ echo 'nav-item-open';}?>">
							<a href="#" class="nav-link"><i class="icon-stack"></i> <span>FrontEnd</span></a>
							
							<ul class="nav nav-group-sub" data-submenu-title="Starter kit"  style="<?php if($routes=='managefaq'|| $routes=='addfaq' || $routes=='manageblog'|| $routes=='manageGallery' || $routes=='managereview' || $routes=='contact' || $routes=='appointment' || $routes=='Fb_review' || $routes=='managefaqUser' || $routes=='manage_videos' ){ echo 'display: block;';}else{echo 'display: none;';}?>">
							<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/manage_videos" class="nav-link <?php if($routes=='manage_videos' ){echo 'newactive';} ?>">Manage Videos</a></li>

							<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/manageglossary" class="nav-link <?php if($routes=='manageglossary' ){echo 'newactive';} ?>">Manage Glossary</a></li>
								<li class="nav-item nav-item-submenu <?php if($routes=='managefaq' || $routes=='managefaqUser' || $routes=='addfaq'){ echo 'nav-item-open';}?>">
									<a href="#" class="nav-link">FAQ</a>
									<ul class="nav nav-group-sub" style="<?php if($routes=='managefaq' || $routes=='managefaqUser' || $routes=='addfaq'){ echo 'display: block;';}else{echo 'display: none;';}?>">
										<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/managefaq" class="nav-link <?php if($routes=='managefaq' ){echo 'newactive';} ?>">Manage FAQ</a></li>
										<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/managefaqUser" class="nav-link <?php if($routes=='managefaqUser' ){echo 'newactive';} ?>">Manage User FAQ</a></li>
									</ul>
								</li>
							
								<li class="nav-item nav-item-submenu  <?php if($routes=='manageblog'){ echo 'nav-item-open';}?>">
									<a href="#" class="nav-link">Blog</a>
									<ul class="nav nav-group-sub" style="<?php if($routes=='manageblog'){ echo 'display: block;';}else{echo 'display: none;';}?>">
										<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/manageblog" class="nav-link <?php if($routes=='manageblog' ){echo 'newactive';} ?>">Manage Blog</a></li>
									</ul>
								</li>
								<li class="nav-item nav-item-submenu  <?php if($routes=='manageGallery'){ echo 'nav-item-open';}?>">
									<a href="#" class="nav-link">Gallery</a>
									<ul class="nav nav-group-sub" style="<?php if($routes=='manageGallery'){ echo 'display: block;';}else{echo 'display: none;';}?>">
										<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/manageGallery" class="nav-link <?php if($routes=='manageGallery' ){echo 'newactive';} ?>">Manage Gallery</a></li>
									</ul>
								</li>
								<li class="nav-item nav-item-submenu  <?php if($routes=='contact' || $routes=='appointment'){ echo 'nav-item-open';}?>">
									<a href="#" class="nav-link">Contact</a>
									<ul class="nav nav-group-sub" style="<?php if($routes=='contact' || $routes=='appointment'){ echo 'display: block;';}else{echo 'display: none;';}?>">
										<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/contact" class="nav-link <?php if($routes=='contact' ){echo 'newactive';} ?>">Manage Contact</a></li>
										<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/appointment" class="nav-link <?php if($routes=='appointment' ){echo 'newactive';} ?>">Manage Appointment</a></li>
									</ul>
								</li>
								<li class="nav-item nav-item-submenu  <?php if($routes=='Fb_review' || $routes=='managereview'){ echo 'nav-item-open';}?>">
									<a href="#" class="nav-link">Review</a>
									<ul class="nav nav-group-sub" style="<?php if($routes=='Fb_review' || $routes=='managereview'){ echo 'display: block;';}else{echo 'display: none;';}?>">
										<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/Fb_review" class="nav-link <?php if($routes=='Fb_review' ){echo 'newactive';} ?>">Fb Reviews Sync</a></li>
										<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/managereview" class="nav-link <?php if($routes=='managereview' ){echo 'newactive';} ?>">Manage Review</a></li>
									</ul>
								</li>
							<!-- 	<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link">Review</a>
									<ul class="nav nav-group-sub">
										<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/Fb_review" class="nav-link">Fb Reviews Sync</a></li>
										<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/managereview" class="nav-link">Manage Review</a></li>
									</ul>
								</li> -->
								
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Database Manager</span></a>
							
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/CronManager/ViewVerifiedtabledata" target="_blank" class="nav-link">Verified table Data</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/CronManager/ViewBreakdowndata" target="_blank" class="nav-link">BreakdownData table Data</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/CronManager/ViewJson" target="_blank" class="nav-link">ViewJson</a></li>
							</ul>
					
						</li>
						<!-- <li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Blog</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/manageblog" class="nav-link">Manage Blog</a></li>
							</ul>
						</li> -->
						<!-- <li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Contact</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/contact" class="nav-link">Manage Contact</a></li>
							</ul>
						</li> -->
						
						<li class="nav-item" style="position: fixed;bottom: 0px;">
							<a href="<?php echo base_url(); ?>../chat/chatfinal" target="_blank" class="nav-link">
								
								<span style="font-size: 24px;">
									Chat
								</span>
							</a>
						</li>
						<?php }?>
						<!-- <li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Fb Reviews Sync</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/Fb_review" class="nav-link">Fb Reviews Sync</a></li>
								<li class="nav-item"><a href="<?php echo base_url(); ?>Admin/managereview" class="nav-link">Manage Review</a></li>
							</ul>
						</li> -->
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->