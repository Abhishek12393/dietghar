<?php include('header.php'); 
include('sidebar.php');?>
<div class="content-body">
<div class="container-fluid">
<div class="alert alert-info solid alert-dismissible fade show">

      To download full chart go to History -> <a href="<?=base_url('User/history') ; ?>" class="badge badge-sm light badge-primary ml-1">Chart Purchase History</a>  
      <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">  <span><i class="mdi mdi-close"></i></span>  
      </button>
     <!--  Download Plan Button<a href="<?=base_url('final_chart_download') ; ?>" class="badge badge-sm light badge-primary ml-1">here</a> -->
  </div>
<!-- row -->
<div class="row">
<div class="col-lg-12">
<style>
  div.a {  margin-top:50px;}
  div.b {  margin-top:-50px;}
  div.c {  margin-bottom:-50px;}
  /* td:first-child{background-color:#2F983A; color:#fff;border: 1px solid #2F983A;}
  td:nth-child(2){background-color: #d9ffdb;} */
  table {font-family: arial, sans-serif;border-collapse: collapse;width: 100%;}
  td, th {border: 1px solid #2F983A;text-align: center;padding: 8px;color:#000; }
  th{background-color:#2F983A;color:white;}
  th:first-child, td:first-child{position:sticky;left:0px; border: 1px solid #2F983A;}
  td:first-child{background-color:#2F983A; color:#fff;border: 1px solid #2F983A;}
  td:nth-child(2){background-color: #d9ffdb;}
  
  @media (min-width: 576px) {
  th {width:20%;}
  th:first-child, td:first-child{position:sticky;left:0px;} 
  td:nth-child(2){background-color: #d9ffdb;} /* // change */
  }
  @media (min-width: 768px) {
  th {width:30%;}
  th:first-child, td:first-child{position:sticky;left:0px;border: 1px solid #2F983A;} 
  td:nth-child(2){background-color: #d9ffdb;} /* // change */
  }
  @media (min-width: 992px) {
  th:first-child, td:first-child{position:sticky;left:0px;width:30%;border: 1px solid #2F983A;} 
  td:nth-child(2){background-color: #d9ffdb;} /* // change */
  }
  @media (min-width: 1200px) {
  th:first-child, td:first-child{position:sticky;left:0px;width:30%;border: 1px solid #2F983A;} 
  td:nth-child(2){background-color: #d9ffdb;} /* // change */
  }
</style>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script><script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script><script src="/diet/assets/jquery.table.transpose.min.js"></script>
<div class="card">
<div class="card-header"><h4 class="card-title text-center">Meal Plan</h4> <span><img src="https://dietghar.com/diet/dgassets/user/icons/icon-gilas.png" width="24" class="text-right"> = 1 Glass Water</span><br><span><img src="https://dietghar.com/diet/dgassets/user/icons/icon-salad.png" width="24"> = 1 Salad Plate</span></div>
<div class="card-body">
 
<div class="table-responsive">
<div class="main">
<section class="signup">
<div class="container">
<div class="meal-content">
<?php if($plan_stat == 1): ?>
<center>
<div class="mt-4">
<h4 class="text-black fs-20">No active plan here</h4>
<img alt="image" class="img-fluid rounded-circle"  src="https://dietghar.com/diet/diet/store.png" width="200px">
<br />
<a href="<?=base_url('plan_selection'); ?>" target="_blank" class="btn btn-primary mb-1 mr-1">Buy Now</a>
</div>
</center>
<?php elseif($plan_stat == 0 ): ?>
<center>
<div class="mt-4">
<h4 class="text-black fs-20">Your plan is under progress.</h4>
<img alt="image" class="img-fluid rounded-circle"  src="https://dietghar.com/diet/diet/cooking.png" width="200px">
</div>
</center>
<?php else: ?>



<div class="table-responsive">
<table id="table1" class="table header-border table-responsive-smx">
<tbody>
<tr>
<td style="width:20%;" style="font-color:#fff !important;">Timing</td>
<td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-early-morningx.png"><br />Early Morning<br /><mark><?=$morningtime; ?> </mark></center></td>
<!-- <td> </td> -->
<td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-breakfast.png"><br />Breakfast<br /><mark><?=$breakfasttime; ?> </mark></center></td>

<td> <center>In-Between <!--<mark><?php //date('h:i A',strtotime($midmealtime)-900); ?></mark>--></center></td>

<td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-mid-meal.png"><br />Mid Meal<br /><mark><?=$midmealtime; ?> </mark></center></td>

<td><center>In-Between <!--<mark><?php //date('h:i A',strtotime($lunchtime)-1800); ?></mark>--></center> </td>

<td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-lunch.png"><br />Lunch<br /><mark><?=$lunchtime; ?> </mark></center></td>

<td><center>In-Between <!--<mark><?php //date('h:i A',strtotime($eveningtime)-1800); ?></mark>--></center> </td>

<td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-tea.png"><br />Evening Tea<br /><mark><?=$eveningtime; ?> </mark></center></td>

<td> <center>In-Between <!--<mark><?php //date('h:i A',strtotime($dinnertime)-1800); ?></mark>--></center></td>

<td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-dinner.png"><br />Dinner<br /><mark><?=$dinnertime; ?> </mark></center></td>

<td> <center>In-Between <!--<mark><?php //date('h:i A',strtotime($bedtime)-900); ?></mark>--></center></td>
<td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-before-bed.png"><br />Before Bed<br /><mark><?=$bedtime; ?></mark></center></td>
 
</tr>
<?php if(is_array($resp)){ 
  foreach($resp as $i=>$meal){
    $morningitem = $meal['morning'];
    $morningitem =  remove_fooditem($morningitem);
     $breakfastitem = $meal['breakfast'];
    $breakfastitem =  remove_fooditem($breakfastitem);
     $midmealitem = $meal['midmeal'];
    $midmealitem =  remove_fooditem($midmealitem);
     $lunchitem = $meal['lunch'];
    $lunchitem =  remove_fooditem($lunchitem);
 
     $eveningitem = $meal['evening'];
    $eveningitem =  remove_fooditem($eveningitem);
 
     $dinnneritem = $meal['dinnner'];
    $dinnneritem =  remove_fooditem($dinnneritem);
 
     $bedtimeitem = $meal['bedtime'];
    $bedtimeitem =  remove_fooditem($bedtimeitem);
  ?>
<tr>
  <td>Day <?=$meal['day']; ?></td>

  <td><?=$meal['morning']==NULL?'<center><img src="https://dietghar.com/diet/dgassets/user/icons/fasting.png" width="64"></center>':$morningitem; ?></td>

 <!-- <td> <center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-gilas.png" width="24"> </center></td>-->
  <td><?=$meal['breakfast']==NULL?'<center><img src="https://dietghar.com/diet/dgassets/user/icons/fasting.png" width="64"></center>':$breakfastitem; ?></td> 

  <td><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-gilas.png" width="24"><img src="https://dietghar.com/diet/dgassets/user/icons/icon-salad.png" width="24"></center></td>

  <td><?=$meal['midmeal']==NULL?'<center><img src="https://dietghar.com/diet/dgassets/user/icons/fasting.png" width="64"></center>':$midmealitem; ?></td>

  <td><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-gilas.png" width="24"><img src="https://dietghar.com/diet/dgassets/user/icons/icon-salad.png" width="24"></center></td>

  <td> <?=$meal['lunch']==NULL?'<center><img src="https://dietghar.com/diet/dgassets/user/icons/fasting.png" width="64"></center>':$lunchitem; ?></td>

  <td><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-gilas.png" width="24"> </center></td>

  <td><?=$meal['evening']==NULL?'<center><img src="https://dietghar.com/diet/dgassets/user/icons/fasting.png" width="64"></center>':$eveningitem; ?></td>

  <td><center> <img src="https://dietghar.com/diet/dgassets/user/icons/icon-salad.png" width="24"></center></td>

  <td> <?=$meal['dinnner']==NULL?'<center><img src="https://dietghar.com/diet/dgassets/user/icons/fasting.png" width="64"></center>':$dinnneritem; ?></td>

  <td><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-gilas.png" width="24"></center></td>

  <td><?=$meal['bedtime']==NULL?'<center><img src="https://dietghar.com/diet/dgassets/user/icons/fasting.png" width="64"></center>':$bedtimeitem; ?></td>
 
</tr>
<?php }
} ; ?>
<tr>
 
 
</tbody>
</table>
</div>

<?php endif ; ?>



</div>
</section>
</div>
</div>
</div>
<!-- <div class="footer">
<div class="copyright">
<p>Copyright © DietGhar.com <?php $year = date("Y"); echo $year; ?></p>
</div>
</div> -->
</div>
<script type="text/javascript">
  $(function () {
    if (!$("#table1").is(":blk-transpose"))
    $("#table1").transpose({ mode: 0 });
    $("#table1").transpose("transpose");
    $("#btnTpVertical").html("Reset");
  });
</script>
<?php $tt=date("s"); ?><script src="/diet/assets/global-meal-plan.js?v=<?php echo $tt; ?>"></script><script src="<?php echo base_url(); ?>dgassets/user/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script><script src="<?php echo base_url(); ?>dgassets/user/js/custom.min.js"></script><script src="<?php echo base_url(); ?>dgassets/user/js/deznav-init.js"></script>


<br>

<?php 

function remove_fooditem($foodstring){
  $foodstring = explode("+",$foodstring) ;
  $finalitems = '';
  foreach($foodstring as $key=>$items ){
    // pr($items);
    if (preg_match('~[0-9]+~', $items)) {
      // echo 'string with numbers :';
      $finalitems .= '+'.$items;
      $finalitems = ltrim ($finalitems,'+');
    }
    
  }
  // echo $finalitems."<br>";
    return $finalitems;
}

 ?>

<?php include('footer.php'); ?>
</body>
</html>	