<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Stepper/index';
$route['index'] = 'Stepper/index';
$route['registration'] = 'Stepper/index';
$route['logout'] = 'Diet/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// 
$route['Admin/task_first_call'] = 'Admin_task/task_first_call';
$route['Admin/task_plans_today'] = 'Admin_task/task_plans_today';

// $route['Admin/task_data_correction'] = 'Admin_task/task_data_correction';
$route['Admin/task_data_correction/(:num)'] = 'Admin_task/task_data_correction/$1';


$route['Admin/chartPreparation/(:any)'] = 'Admin_foodchart/chartPreparation/$1';
$route['Admin/chartPreparation/(:any)/(:any)'] = 'Admin_foodchart/chartPreparation/$1/$2';

// $route['Admin/renewchartPreparation/(:any)'] = 'Admin_foodchart/renewchartPreparation/$1';

$route['Admin/reallotchartPreparation/(:any)'] = 'Admin_foodchart/reallotchartPreparation/$1';
$route['Admin/reallotchartPreparation/(:num)/(:any)'] = 'Admin_foodchart/reallotchartPreparation/$1/$2';

$route['Admin/foodchart_view_reallot'] = 'Admin_foodchart/foodchart_view_reallot';

$route['Admin/clientfoodchart_new'] = 'Admin_foodchart/foodchart_new';

$route['Admin/clientfoodchart_new_test'] = 'Test/foodchart_new_test';
 

// $route['Admin/clientfoodchart_new'] = 'Admin_foodchart/foodchart2';

$route['Admin/submit_food_chart_temp'] = 'Admin_foodchart/submit_food_chart_temp';
$route['Admin/checkt'] = 'Admin_foodchart/checkt';

$route['Admin/clientfoodchart_final_submit'] = 'Admin_foodchart/submit_food_chart_final';
$route['Admin/Submit_client_chart'] = 'Admin_foodchart/Submit_client_chart';
$route['Admin/foodchart_dataEntry'] = 'Admin_foodchart/foodchart_dataEntry';
$route['Admin/Submit_single_chart_entry'] = 'Admin_foodchart/Submit_single_chart_entry';
$route['Admin/checkFoodchart'] = 'Admin_foodchart/foodchartCheck'; 
$route['Admin/foodcombinationManage'] = 'Admin_foodchart/foodcombination_manage';
$route['Admin/update_foodcombination_new'] = 'Admin_foodchart/update_foodcombination_new';

$route['Admin/user_foodchart_view/(:any)'] = 'Admin_foodchart/user_foodchart_view/$1';
$route['Admin/user_foodchart_view_renew/(:any)'] = 'Admin_foodchart/user_foodchart_view/$1/renew';

$route['Admin/user_foodchart_reset/(:any)'] = 'Admin_foodchart/user_foodchart_reset/$1';

$route['Admin/user_finalfoodchart_edit/(:any)'] = 'Admin_foodchart/user_finalfoodchart_edit/$1';
$route['Admin/update_singleday_infinalchart'] = 'Admin_foodchart/update_singleday_infinalchart';
$route['Admin/update_singleday_infinalchart/(:any)'] = 'Admin_foodchart/update_singleday_infinalchart/$1';

$route['Admin/manage_videos'] = 'Admin_frontened_ctrl/manage_videos';
$route['Admin/addvideoslink'] = 'Admin_frontened_ctrl/add_videos';
$route['Admin/save_Videos'] = 'Admin_frontened_ctrl/save_Videos';
$route['Admin/delete_videos/(:any)'] = 'Admin_frontened_ctrl/delete_videos/$1';

$route['Admin/manageblog'] = 'Admin_frontened_ctrl/manageblog';
$route['Admin/addblog'] = 'Admin_frontened_ctrl/addblog';
$route['Admin/save_blog'] = 'Admin_frontened_ctrl/save_blog';
$route['Admin/editblog/(:any)'] = 'Admin_frontened_ctrl/editblog/$1';

$route['Admin/update_blog'] = 'Admin_frontened_ctrl/update_blog';

$route['Admin/updateblogJson'] = 'Admin_frontened_ctrl/updateblogJson';

$route['Admin/loginhistory'] = 'Admin_frontened_ctrl/loginhistory';

$route['Admin/manageGallery'] = 'Admin_frontened_ctrl/manageGallery';
$route['Admin/addGallery'] = 'Admin_frontened_ctrl/addGallery';
$route['Admin/save_gallery_photos'] = 'Admin_frontened_ctrl/save_gallery_photos';
$route['Admin/ajax_get_gallery_items'] = 'Admin_frontened_ctrl/ajax_get_gallery_items';

$route['Admin/CronManager/ViewVerifiedtabledata'] = 'Admin_CronManager/ViewVerifiedtabledata';
$route['Admin/CronManager/ViewBreakdowndata'] = 'Admin_CronManager/ViewBreakdowndata';
$route['Admin/CronManager/ViewJson'] = 'Admin_CronManager/allCronView';

$route['Admin/CronManager/ViewTabledata'] = 'Admin_CronManager/viewAlltabledata';

// $route['Api/checkat'] = 'Api/checkat';
// $route['NewApi'] = 'NewApi/checkat';
// payment routes 
// $route['restore_previous_plan'] = 'PaymentCtrl/previous_plan_restore';
$route['Admin/restore_previous_plan/(:any)'] = 'Admin/previous_plan_restore/$1';

$route['plan_selection'] = 'PaymentCtrl/plan_selection';

$route['payment_mode'] = 'PaymentCtrl/payment_mode';

$route['payment_callback_paytm'] = 'PaymentCtrl/callback_paytm';

$route['payment_callback_razorpay'] = 'PaymentCtrl/callback_razorpay';

$route[' '] = 'PaymentCtrl/callback_razorpay_common';
// finalchartdownload :: 
$route['final_chart_download/(:num)'] = 'User/final_chart_download/$1';
$route['UserApi/mealchartdownload/(:any)/(:num)'] = 'UserApi/mealchartdownload/$1/$2';
