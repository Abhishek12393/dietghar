ftoday<?php
// pr($message);die;
include('header.php');?>
<style>
    .custom-switch .custom-control-input:checked~.custom-control-label::before, .custom-switch .custom-control-input:disabled:checked~.custom-control-label::before {
    background-color: #268bd2;
    }
    .custom-control-input:checked~.custom-control-label::before {
        color: #fff;
        border-color: transparent;
 
    }
    .custom-switch .custom-control-label::before {
    
        background-color: rgba(255,255,255,.4);
    }
 f
 
    .custom-switch .custom-control-input:checked~.custom-control-label::after {
     background-color: #fff;
    }

</style>
<?php include('sidebar.php');?>
<!-- Main content -->
<div class="content-wrapper">

    <div class="page-header border-bottom-0">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="header-elements d-none mb-3 mb-md-0">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator"></i> <span>Invoices</span></a>
                </div>
            </div>


        </div>
    </div>
    <div class="content pt-0">
        <div class="mb-3"><h6 class="mb-0 font-weight-semibold">Controls</h6><span class="text-muted d-block"></span></div>
    
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
               

                    <div class="border p-3 rounded">
                        <p>Download full chart Free </p>
                        <div class="custom-control custom-switch mb-2">
                            <form action="<?=base_url(); ?>Admin/updateflag" method="POST">
                                <input type="hidden" type="text" name="updateflag" value="1">
                                <input type="checkbox" class="custom-control-input" id="sc_ls_c" name="pdfchart_freestat" <?=$flag_chartpdf_free == 0 ? '':'checked' ; ?> onChange="this.form.submit()" >
                                <label class="custom-control-label" for="sc_ls_c"><?=$flag_chartpdf_free == 0 ? 'Paid Download':'Free Download' ; ?> </label>
                            </form>
                        </div>
                    </div>


                </div>
            </div>

            
        </div>
     
        <div class="mb-3"><h6 class="mb-0 font-weight-semibold">Total Revenue & Transactions</h6><span class="text-muted d-block"></span></div>
        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body bg-danger-400 has-bg-image">
                    <div class="media">
                        <div class="mr-3 align-self-center"><i class="icon-coin-dollarz  icon-3x">₹</i></div>
                        <div class="media-body text-right"><h3 class="font-weight-semibold mb-0">₹ <?=$today_rev==''?'0':$today_rev; ?></h3><span class="text-uppercase font-size-sm text-mutedx">Revenue Today</span></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body bg-success-400 has-bg-image">
                    <div class="media">
                        <div class="mr-3 align-self-center"><i class="icon-cashz  icon-3x ">₹</i></div>
                        <div class="media-body text-right"><h3 class="font-weight-semibold mb-0">₹ <?="$week_rev"; ?></h3><span class="text-uppercase font-size-sm text-mutedx">Revenue This Week</span></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body bg-blue-400 has-bg-image">
                    <div class="media">
                        <div class="mr-3 align-self-center"><i class="icon-cashz icon-3x ">₹</i></div>
                        <div class="media-body text-right"><h3 class="font-weight-semibold mb-0">₹ <?="$month_rev"; ?></h3><span class="text-uppercase font-size-sm text-mutedx">Revenue This Month</span></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body bg-pink-400 has-bg-image">
                    <div class="media">
                        <div class="mr-3 align-self-center"><i class="icon-cashz icon-3x ">₹</i></div>
                        <div class="media-body text-right"><h3 class="font-weight-semibold mb-0">₹ <?="$total_rev"; ?></h3><span class="text-uppercase font-size-sm text-mutedx">Total Revenue</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body bg-blue-400 has-bg-image">
                    <div class="media">
                        <div class="media-body"><h3 class="mb-0">₹ 54,390</h3><span class="text-uppercase font-size-xs">Online Revenue</span></div>
                        <div class="ml-3 align-self-center">
                            <i class="icon-bubbles4 icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body bg-danger-400 has-bg-image">
                    <div class="media">
                        <div class="media-body"><h3 class="mb-0">₹ 389,438</h3><span class="text-uppercase font-size-xs">Offline Revenue</span></div>
                        <div class="ml-3 align-self-center">
                            <i class="icon-bag icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body bg-success-400 has-bg-image">
                    <div class="media">
                        <div class="mr-3 align-self-center"><i class="icon-pointer icon-3x opacity-75"></i></div>
                        <div class="media-body text-right"><h3 class="mb-0"><?="$f_transaction"; ?></h3><span class="text-uppercase font-size-xs">Failed Transactions</span></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /simple statistics -->





        <!-- Quick stats boxes -->
        <div class="mb-3"><h6 class="mb-0 font-weight-semibold">Total Members</h6><span class="text-muted d-block"></span></div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card bg-teal-400">
                    <div class="card-body">
                        <div>Members online</div>
                        <div class="d-flex">
                            <h2 class="font-weight-semibold mb-0">200</h2>
                            <div class="list-icons ml-auto"><a class="list-icons-item" data-action="reload"></a></div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->
            </div>
            <div class="col-lg-4">
                <!-- Current server load -->
                <div class="card bg-pink-400">
                    <div class="card-body">
                        <div>Paid Members</div>
                        <div class="d-flex"><h2 class="font-weight-semibold mb-0"><?="$paid_member"; ?></h2>
                            <div class="list-icons ml-auto">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="server-load"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-blue-400">
                    <div class="card-body">
                        <div>Free Members</div>
                        <div class="d-flex"><h2 class="font-weight-semibold mb-0">95</h2>
                            <div class="list-icons ml-auto"><a class="list-icons-item" data-action="reload"></a></div>
                        </div>					                	
                    </div>
                    <div id="today-revenue"></div>
                </div>
            </div>
        </div>

        <!-- Stats with progress -->
        <div class="mb-3 pt-2"><h6 class="mb-0 font-weight-semibold">Today's Tasks</h6><span class="text-muted d-block"></span></div>
        <div class="row">

            <div class="col-sm-6 col-xl-3">
                <a href="task_first_call">
                    <div class="card card-body text-center bg-teal-400 has-bg-image">
                        <div class="svg-center position-relative" id="progress_icon_three"></div>
                        <h2 class="progress-percentage mt-2 mb-1 font-weight-semibold"><?=$first_call ?></h2>First Call Remaining<div class="font-size-sm opacity-75">.........................</div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-xl-3">
                <a href="task_plans_today">
                    <div class="card card-body text-center bg-danger-400 has-bg-image">
                        <div class="svg-center position-relative" id="progress_icon_two"></div>
                        <h2 class="progress-percentage mt-2 mb-1 font-weight-semibold"><?=$plans_to_sent; ?></h2>Plans to be sent today<div class="font-size-sm text-muted">.........................</div>
                    </div></a>
            </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="task_call_schedule">
                        <div class="card card-body text-center bg-success-400 has-bg-image">
                            <div class="svg-center position-relative" id="progress_icon_one"></div>
                            <h2 class="progress-percentage mt-2 mb-1 font-weight-semibold"><?=$call7->call7; ?></h2>7 days call schedule<div class="font-size-sm text-muted">.........................</div>
                        </div></a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="task_support">
                        <div class="card card-body text-center bg-purple-400 has-bg-image">
                            <div class="svg-center position-relative" id="progress_icon_four"></div>
                            <h2 class="progress-percentage mt-2 mb-1 font-weight-semibold">3</h2>Support Questions<div class="font-size-sm opacity-75">.........................</div></div>
                        </div></a>
                </div>


                            <!-- Statistics with progress bar -->
                            <div class="mb-3 pt-2">
                                <h6 class="mb-0 font-weight-semibold">Recent Mesurement Updated</h6><span class="text-muted d-block"></span>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xl-3">
                                    <a href="task_support">
                                        <div class="card card-body bg-blue-400 has-bg-image">
                                            <div class="media mb-3">
                                                <div class="media-body"><h6 class="font-weight-semibold mb-0">Weight Update</h6><span class="opacity-75"></span></div>
                                                <div class="ml-3 align-self-center"><i class="icon-cog3 icon-2x"></i></div>
                                            </div>
                                            <div class="progress bg-blue mb-2" style="height: 0.125rem;">
                                                <div class="progress-bar bg-white" style="width: 100%"><span class="sr-only"></span></div>
                                            </div>
                                            <div><span class="float-right">400</span></div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <a href="task_support">
                                        <div class="card card-body bg-success-400 has-bg-image">
                                            <div class="media mb-3">
                                                <div class="media-body">
                                                    <h6 class="font-weight-semibold mb-0">Inch Update</h6><span class="opacity-75"></span>
                                                </div>
                                                <div class="ml-3 align-self-center"><i class="icon-cog3 icon-2x"></i></div>
                                            </div>
                                            <div class="progress bg-success mb-2" style="height: 0.125rem;">
                                                <div class="progress-bar bg-white" style="width: 100%">
                                                    <span class="sr-only"></span>
                                                </div>
                                            </div>
                                            <div>
                                                <span class="float-right">300</span>
                                            </div>
                                                
                                        </div>   
                                    </a>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <a href="task_support">
                                        <div class="card card-body bg-danger-400 has-bg-image">
                                            <div class="media mb-3">
                                                <div class="media-body"><h6 class="font-weight-semibold mb-0">Weight to be Updated</h6><span class="opacity-75"></span></div>
                                                <div class="ml-3 align-self-center"><i class="icon-pulse2 icon-2x"></i></div>
                                            </div>
                                            <div class="progress bg-danger-600 mb-2" style="height: 0.125rem;">
                                                <div class="progress-bar bg-white" style="width: 100%"><span class="sr-only"></span></div>
                                            </div>
                                            <div>
                                                <span class="float-right">200</span></div>
                                            </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-xl-3">
                                                <a href="task_support">
                                                    <div class="card card-body bg-indigo-400 has-bg-image">
                                                        <div class="media mb-3">
                                                            <div class="media-body"><h6 class="font-weight-semibold mb-0">Inches to be Updated</h6><span class="opacity-75"></span></div>
                                                            <div class="mr-3 align-self-center"><i class="icon-pulse2 icon-2x"></i></div>
                                                        </div>
                                                        <div class="progress bg-indigo mb-2" style="height: 0.125rem;">
                                                            <div class="progress-bar bg-white" style="width: 100%"><span class="sr-only"></span></div>
                                                        </div>
                                                        <div>
                                                            <span class="float-right">100</span></div>
                                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="mb-3 pt-2">
                                <h6 class="mb-0 font-weight-semibold">SMS counter</h6><span class="text-muted d-block"></span>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xl-4">
                                    <div class="card card-body bg-blue-400 has-bg-image">
                                        <div class="media">
                                            <div class="media-body">
                                                <h3 class="mb-0" id="bulksmsresp"><?=$rem_sms; ?></h3>
                                                <span class="text-uppercase font-size-xs">Bulk sms </span>
                                            </div>
                                            <div class="ml-3 align-self-center">
                                                <i class="icon-bubbles4 icon-3x opacity-75"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /statistics with progress bar -->
                    </div>
</div>
                    <!-- /content area -->
