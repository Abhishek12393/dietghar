<?php
// pr($message);die;
//prd($user_data);
include('header.php');?>
<?php include('sidebar.php');?>
<!-- Main content -->
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <div class="page-header border-bottom-0">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Plans to be sent today</h4>
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
        <div class="card">
            <table class="table datatable-responsive">
                <thead><tr><th>S.No</th><th>Client Start Date</th><th>Name</th><th>Mobile No</th><th>Plan Name</th><th>Mark as Done</th><th class="text-center">Action</th></tr>
                </thead>
                <tbody>
                    <?php $i=0;?>
                    <?php foreach($user_data as $each_user){ ?>
                        <tr>
                            <td><?=$i+=1;?></td>
                            <td><?=$each_user->purchase_date; ?></td>
                            <td><?=$each_user->fn." ".$each_user->ln; ?></td>
                            <td><a href="<?=base_url('Admin/userprofile/')?><?=$each_user->user_id?>"><?=$each_user->mb;?></a></td>
                            <td><?=$each_user->plan_name; ?></td>
                            <td class="text-center"><span class="badge badge-success">disable</span></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="<?=base_url('Admin/userprofile/')?><?=$each_user->user_id?>" class="dropdown-item"><i class="fa fa-pencil"></i> View Profile</a>
                                            <a href="<?=base_url('Admin/notes/')?><?=$each_user->user_id;?>" target='blank' class="dropdown-item"><i class="fa fa-pencil"></i> Notes</a>
                                            <a href="<?=base_url('Admin/chartPreparation/')?><?=$each_user->user_id;?>" class="dropdown-item"><i class="fa fa-pencil"></i> Chart Preparation</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php $i++; ?>
                </tbody>
            </table>
        </div>
        <!-- /basic responsive configuration -->
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