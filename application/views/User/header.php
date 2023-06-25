<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>DietGhar</title>
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>dgassets/user/images/favicon.png">
<link href="<?php echo base_url(); ?>dgassets/user/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>dgassets/user/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>dgassets/user/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>dgassets/user/css/style.css?v=9" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

<?php $this->load->view('googleAnalytics') ; ?>

</head>
<body>
<!--******************* Preloader start ********************-->
<div id="preloader">
<div class="sk-three-bounce">
<div class="sk-child sk-bounce1"></div>
<div class="sk-child sk-bounce2"></div>
<div class="sk-child sk-bounce3"></div>
</div>
</div>
<!--*******************Preloader end********************-->
<!--********************************** Main wrapper start ***********************************-->
<div id="main-wrapper">
<!--********************************** Nav header start ***********************************-->
<div class="nav-header">
<a href="<?=base_URL().'User/index'; ?>" class="brand-logo">
<img class="logo-abbr" src="<?php echo base_url(); ?>dgassets/user/icons/52x52_Logo_1.png" alt="">
<img class="logo-compact" src="<?php echo base_url(); ?>dgassets/user/icons/52x52_Logo_1.png" alt="">
<img class="brand-title" style="max-width: 180px;" src="<?php echo base_url(); ?>dgassets/user/icons/Diet_1.png" alt="">
</a>
<div class="nav-control">
<?php if($pagename != 'Meal Plan'): ?>
<div class="hamburger">
<span class="line"></span><span class="line"></span><span class="line"></span>
</div>
<?php endif ; ?>
</div>
</div>
<!--********************************** Nav header end ***********************************-->
<!--********************************** Chat box star  ***********************************-->
<div class="chatbox">
<div class="chatbox-close"></div>
<div class="custom-tab-1">
<div class="tab-content">
<div class="tab-pane fade active show" id="chat" role="tabpanel">
<div class="card chat dz-chat-history-box d-nonex">
<div class="card-header chat-list-header text-center">
<a href="#" class="dz-chat-history-backx">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
</a>
<div>
	<h6 class="mb-1">Chat with Admin</h6>
	<p class="mb-0 text-success" id="adminStat">--</p>
	<p class='mb-0' id="lastseen">-</p>
</div>                            
<div class="dropdown">
<a href="#" data-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
</div>
</div>

<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3"></div>
<div class="card-footer type_msg"><div class="input-group" >
<textarea class="form-control" id="text1" placeholder="Type your message..." ></textarea><div style="height:20px;"></div><div class="input-group-append"><button type="button" class="btn btn-primary" id="sendMessagebtn"><i class="fa fa-location-arrow"></i></button></div></div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--**********************************Chat box End***********************************-->
<!--**********************************Header start***********************************-->
<div class="header">
<div class="header-content">
<nav class="navbar navbar-expand">
<div class="collapse navbar-collapse justify-content-between">
<div class="header-left">
<div class="dashboard_bar"><?=$pagename; ?></div>
</div>
<ul class="navbar-nav header-right">
<li class="nav-item">
<div class="input-group search-area d-xl-inline-flex d-none">
<div class="input-group-append">
<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
</div>
<input type="text" class="form-control" placeholder="Search Recipes here...">
</div>
</li>
<li class="nav-item dropdown notification_dropdown">
<a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-toggle="dropdown">
<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22.75 15.8385V13.0463C22.7471 10.8855 21.9385 8.80353 20.4821 7.20735C19.0258 5.61116 17.0264 4.61555 14.875 4.41516V2.625C14.875 2.39294 14.7828 2.17038 14.6187 2.00628C14.4546 1.84219 14.2321 1.75 14 1.75C13.7679 1.75 13.5454 1.84219 13.3813 2.00628C13.2172 2.17038 13.125 2.39294 13.125 2.625V4.41534C10.9736 4.61572 8.97429 5.61131 7.51794 7.20746C6.06159 8.80361 5.25291 10.8855 5.25 13.0463V15.8383C4.26257 16.0412 3.37529 16.5784 2.73774 17.3593C2.10019 18.1401 1.75134 19.1169 1.75 20.125C1.75076 20.821 2.02757 21.4882 2.51969 21.9803C3.01181 22.4724 3.67904 22.7492 4.375 22.75H9.71346C9.91521 23.738 10.452 24.6259 11.2331 25.2636C12.0142 25.9013 12.9916 26.2497 14 26.2497C15.0084 26.2497 15.9858 25.9013 16.7669 25.2636C17.548 24.6259 18.0848 23.738 18.2865 22.75H23.625C24.321 22.7492 24.9882 22.4724 25.4803 21.9803C25.9724 21.4882 26.2492 20.821 26.25 20.125C26.2486 19.117 25.8998 18.1402 25.2622 17.3594C24.6247 16.5786 23.7374 16.0414 22.75 15.8385ZM7 13.0463C7.00232 11.2113 7.73226 9.45223 9.02974 8.15474C10.3272 6.85726 12.0863 6.12732 13.9212 6.125H14.0788C15.9137 6.12732 17.6728 6.85726 18.9703 8.15474C20.2677 9.45223 20.9977 11.2113 21 13.0463V15.75H7V13.0463ZM14 24.5C13.4589 24.4983 12.9316 24.3292 12.4905 24.0159C12.0493 23.7026 11.716 23.2604 11.5363 22.75H16.4637C16.284 23.2604 15.9507 23.7026 15.5095 24.0159C15.0684 24.3292 14.5411 24.4983 14 24.5ZM23.625 21H4.375C4.14298 20.9999 3.9205 20.9076 3.75644 20.7436C3.59237 20.5795 3.50014 20.357 3.5 20.125C3.50076 19.429 3.77757 18.7618 4.26969 18.2697C4.76181 17.7776 5.42904 17.5008 6.125 17.5H21.875C22.571 17.5008 23.2382 17.7776 23.7303 18.2697C24.2224 18.7618 24.4992 19.429 24.5 20.125C24.4999 20.357 24.4076 20.5795 24.2436 20.7436C24.0795 20.9076 23.857 20.9999 23.625 21Z" fill="#0B2A97"/>
</svg>
<div class="pulse-css"></div>
</a>
<div class="dropdown-menu rounded dropdown-menu-right">
<div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
<ul class="timeline">
<li>
<div class="timeline-panel">
	<!-- <div class="media mr-2"><img alt="image" width="50" src="<?php echo base_url(); ?>dgassets/user/images/avatar/1.jpg"></div>
	<div class="media-body">
	<h6 class="mb-1">Dr sultads Send you Photo</h6>
	<small class="d-block">29 July 2020 - 02:26 PM</small>
	</div> -->
</div>
</li>
</ul>
</div>
<a class="all-notification" href="<?=base_url()."User/notifications"; ?>">See all notifications <i class="ti-arrow-right"></i></a>
</div>
</li>
<li class="nav-item dropdown notification_dropdown">
<a class="nav-link bell bell-link" href="javascript:void(0)">
<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22.4605 3.84888H5.31688C4.64748 3.84961 4.00571 4.11586 3.53237 4.58919C3.05903 5.06253 2.79279 5.7043 2.79205 6.3737V18.1562C2.79279 18.8256 3.05903 19.4674 3.53237 19.9407C4.00571 20.4141 4.64748 20.6803 5.31688 20.6811C5.54005 20.6812 5.75404 20.7699 5.91184 20.9277C6.06964 21.0855 6.15836 21.2995 6.15849 21.5227V23.3168C6.15849 23.6215 6.24118 23.9204 6.39774 24.1818C6.5543 24.4431 6.77886 24.6571 7.04747 24.8009C7.31608 24.9446 7.61867 25.0128 7.92298 24.9981C8.22729 24.9834 8.52189 24.8863 8.77539 24.7173L14.6173 20.8224C14.7554 20.7299 14.918 20.6807 15.0842 20.6811H19.187C19.7383 20.68 20.2743 20.4994 20.7137 20.1664C21.1531 19.8335 21.4721 19.3664 21.6222 18.8359L24.8966 7.05011C24.9999 6.67481 25.0152 6.28074 24.9414 5.89856C24.8675 5.51637 24.7064 5.15639 24.4707 4.84663C24.235 4.53687 23.931 4.28568 23.5823 4.11263C23.2336 3.93957 22.8497 3.84931 22.4605 3.84888ZM23.2733 6.60304L20.0006 18.3847C19.95 18.5614 19.8432 18.7168 19.6964 18.8275C19.5496 18.9381 19.3708 18.9979 19.187 18.9978H15.0842C14.5856 18.9972 14.0981 19.1448 13.6837 19.4219L7.84171 23.3168V21.5227C7.84097 20.8533 7.57473 20.2115 7.10139 19.7382C6.62805 19.2648 5.98628 18.9986 5.31688 18.9978C5.09371 18.9977 4.87972 18.909 4.72192 18.7512C4.56412 18.5934 4.4754 18.3794 4.47527 18.1562V6.3737C4.4754 6.15054 4.56412 5.93655 4.72192 5.77874C4.87972 5.62094 5.09371 5.53223 5.31688 5.5321H22.4605C22.5905 5.53243 22.7188 5.56277 22.8353 5.62076C22.9517 5.67875 23.0532 5.76283 23.1318 5.86646C23.2105 5.97008 23.2642 6.09045 23.2887 6.21821C23.3132 6.34597 23.308 6.47766 23.2733 6.60304Z" fill="#0B2A97"/>
<path d="M7.84173 11.4233H12.0498C12.273 11.4233 12.4871 11.3347 12.6449 11.1768C12.8027 11.019 12.8914 10.8049 12.8914 10.5817C12.8914 10.3585 12.8027 10.1444 12.6449 9.98661C12.4871 9.82878 12.273 9.74011 12.0498 9.74011H7.84173C7.61852 9.74011 7.40446 9.82878 7.24662 9.98661C7.08879 10.1444 7.00012 10.3585 7.00012 10.5817C7.00012 10.8049 7.08879 11.019 7.24662 11.1768C7.40446 11.3347 7.61852 11.4233 7.84173 11.4233Z" fill="#0B2A97"/>
<path d="M15.4162 13.1066H7.84173C7.61852 13.1066 7.40446 13.1952 7.24662 13.3531C7.08879 13.5109 7.00012 13.725 7.00012 13.9482C7.00012 14.1714 7.08879 14.3855 7.24662 14.5433C7.40446 14.7011 7.61852 14.7898 7.84173 14.7898H15.4162C15.6394 14.7898 15.8535 14.7011 16.0113 14.5433C16.1692 14.3855 16.2578 14.1714 16.2578 13.9482C16.2578 13.725 16.1692 13.5109 16.0113 13.3531C15.8535 13.1952 15.6394 13.1066 15.4162 13.1066Z" fill="#0B2A97"/>
</svg>
<div class="pulse-css"></div>
</a>
</li>

<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<!-- <img src="<?php echo base_url(); ?>dgassets/user/images/profile/woman_1.png" width="20" alt=""/> -->
<?php if($pimage){
	echo '<img alt="image" class="img-fluid rounded-circle"  src="https://dietghar.com/diet/'.$pimage.'">';
}else{ ?>
<?= $gender == 1 ? '<img alt="image" class="img-fluid rounded-circle"  src="https://dietghar.com/diet/dgassets/user/images/profile/man_1.png">' : '<img alt="image" class="img-fluid rounded-circle" src="https://dietghar.com/diet/dgassets/user/images/profile/woman_1.png">';
} ?>

<div class="header-info">
<!-- <span class="text-black"><strong><?//= $message['userdetails']->first_name . ' ' . $message['userdetails']->last_name; ?></strong></span> -->
<p class="fs-12 mb-0"><strong><?=$first_name.' '.$last_name ; ?> </strong></p>
</div>
</a>
<div class="dropdown-menu dropdown-menu-right">
<a href="<?=base_url('User/profile'); ?>" class="dropdown-item ai-icon">
<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
<span class="ml-2">Profile </span>
</a>
<a href="logout" class="dropdown-item ai-icon">
<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
<span class="ml-2">Logout </span>
</a>
</div>
</li>
</ul>
</div>
</nav>
</div>
</div>
<!--********************************** Header end ti-comment-alt ***********************************-->