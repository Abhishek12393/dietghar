<?php 
//pr($graph);die;
include('header.php');?>
<?php include('sidebar.php');

// date('M-Y', strtotime('2020-11-01'));
?>
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/dashboard.css"> -->
<style>
  .btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
    padding: 10px;
    border-radius: 5px;
}
.wrapper .sidebar ul li:nth-child(1) {
    border-right: 5px solid #667acd !important;
    border-radius: 5px;
}
</style>
<div class="container p-viewport-devices">
      
        <h6 class="custom_yourprojects mt-lg-4 mt-md-4 mt-xl-4 mt-sm-4">Your History</h6>
        <div class="row mt-lg-1 ml-lg-3 mt-md-1 mt-sm-0 " id="chart_card">

<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 p-3 mt-lg-0 padding_Activity ">
<div class="container-fluid p-0">
<div class="card card-height-lg shadow p-3" style="border-radius: 15px; height: 282px;">
<h6 class="text_activity">Login Activity</h6>
<div class="row p-2">
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">login date time device & Ip</span>
</div>
<?php foreach($login_history as $val){ ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span"><?=$val['date']?></span>
</div>
<?php } ?>


<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 p-3 mt-lg-0 padding_Activity ">
<div class="container-fluid p-0">
<div class="card card-height-lg shadow p-3" style="border-radius: 15px; height: 282px;">
<h6 class="text_activity">Order History</h6>
<div class="row p-2">

<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">Order Date time, Plan Name</span>
</div>

<?php foreach($order_history as $order){
if($order['plan_name']==1){
    $p_name = "15 Days Plan" ;
}else{
    $p_name = "30 Days Plan" ;
    
}

 ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span"><?=date('d-m-Y H:i:s', $order['purchase_date'])?>, <?=$p_name?></span>
</div>
<?php } ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 p-3 mt-lg-0 padding_Activity ">
<div class="container-fluid p-0">
<div class="card card-height-lg shadow p-3" style="border-radius: 15px; height: 282px;">
<h6 class="text_activity">Transaction History</h6>
<div class="row p-2">



<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">Amount, OrderID,Transaction Id, date time, </span>
</div>
<?php foreach($transaction_history as $value){
$js = json_decode($value['txn_details']);
// pr($js);die;
 ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span"><?=$js->TXNAMOUNT?>,<?=$js->ORDERID?>, <?=$js->TXNID?>, <?=$value['txn_date']?> </span>
</div>
<?php } ?>



<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 padding_Activity ">
<span class="progress_span">................................................................................................</span>
</div>
</div>
</div>
</div>
</div>
</div>
   
</div>
   
<?php include 'footer.php';?>