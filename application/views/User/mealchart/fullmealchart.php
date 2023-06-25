<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Login</title>
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
<!-- <link rel="stylesheet" href="css/style.css"> -->
<meta name="robots" content="noindex, follow">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- <script src="scripts/jquery.table.transpose.min.js"></script> -->
 <script src="/diet/assets/jquery.table.transpose.min.js"></script>
  <link href="https://dietghar.com/diet/dgassets/user/css/style.css" rel="stylesheet">
  <style>
    .form-titlex {margin-bottom: 3px;padding: 25px 18px;}
    .meal-content {padding: 5px 0;}
    table {font-family: arial, sans-serif;border-collapse: collapse;width: 100%;}
    td, th {border: 1px solid #2F983A;text-align: center;padding: 8px;color:#000; }
    th{background-color:#2F983A;color:white;}
    th:first-child, td:first-child{position:sticky;left:0px; border: 1px solid #2F983A;}
    td:first-child{background-color:#2F983A; color:#fff;border: 0px solid #2F983A;}
    /* @media (min-width: 576px) {
    th {width:20%;}
    th:first-child, td:first-child{position:sticky;left:0px;} 
    }
    @media (min-width: 768px) {
    th {width:30%;}
    th:first-child, td:first-child{position:sticky;left:0px;border: 1px solid #2F983A;} 
    }
    @media (min-width: 992px) {
    th:first-child, td:first-child{position:sticky;left:0px;width:30%;border: 1px solid #2F983A;} 
    }
    @media (min-width: 1200px) {
    th:first-child, td:first-child{position:sticky;left:0px;width:30%;border: 1px solid #2F983A;} 
    } */
    .front-page {color: rgb(56, 56, 56);
      position: relative;
      page-break-after: always;
    }
    #banner {
      /* position: absolute; */
      width: 90%;
    }
    #user_details{
      position: absolute;
      left: 7%;
      top: 550px;
    }
    #user_name{
      /* 
      top: 462px; 
      position: absolute;
      left: 12%;*/
      font-size: 2.4rem;
      font-family: 'Dancing Script', cursive;
    }
    #user_height {
      /* position: absolute;
      left: 13%;
      top: 510px;*/
      font-size: 1.8rem;
      font-family: 'Dancing Script', cursive; 
    }
    #user_weight {
      /* position: absolute;
      top: 540px; */
      left: 1%;
      font-size: 1.8rem;
      font-family: 'Dancing Script', cursive;
    }

    .meal-content{
      width: 408vh;
    }
    /* for pdf page break */
    .page {
      overflow: hidden;
      page-break-after: always;
    }

    .page:last-of-type {
        page-break-after: auto
    }
  </style>
</head>
<body>
<!-- <div class="front-page">
  <?php #pr($userlifestyle); ?>
</div> -->
<div class="front-page">
  <!-- Image used for background -->
  <img id="banner" src="<?=base_url('assets/images/user/')?>user_mealplan_banner.png" alt="" >
    <!-- user fullname  -->
    <span id="user_details">
    <h3 id="user_name">Name :<?=$userdata['first_name'].' '.$userdata['last_name'] ; ?> </h3>
    <h4 id="user_height">Height : <?=$userdata['height'] ; ?></h4>
    <h4 id="user_weight">Weight : <?=$userdata['weight'] ; ?> kg</h4> 
    </span>
  </img>
</div>
<div class="main">
<section class="signup">
<!-- <div class="container"> -->



<!-- <center><br><img src="<?=base_url('assets/images/')?>logo.png" width="110px"></center> -->
<!-- <center><h2 class="form-titlex"><u>Meal Plan</u></h2> 
  <p><b>Name:</b> <?=$userdata['first_name'].' '.$userdata['last_name'] ; ?> <br> 
  <!-- <b>Age:</b> 26 Yr. <br>   
  <b>Height:</b><?=$userdata['height'] ; ?>  | <b>Weight:</b> <?=$userdata['weight'] ; ?></p> 
</center>-->
<div class="meal-content">

<div class='page'>
  <!-- <div class="table-responsive"> -->
    <table id="table1" class="table header-border table-responsive-smx page">
      <tbody>
        <tr>
          <td style="width:10%;" style="font-color:#fff !important;">Timing</td>
          <td style="width:13%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-early-morningx.png"><br />Early Morning<br /><mark><?=date('h:i A',strtotime($userlifestyle['wakeup_time'])); ?></mark></center></th>
          <td style="width:13%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-breakfast.png"><br />Breakfast<br /><mark><mark><?=date('h:i A',strtotime($userlifestyle['breakfast_time'])); ?></mark></center></td>
          <td style="width:13%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-mid-meal.png"><br />Mid Meal<br /><mark><?=date('h:i A',strtotime($userlifestyle['midmeal_time'])); ?></mark></center></td>

          <td style="width:13%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-lunch.png"><br />Lunch<br /><mark><?=date('h:i A',strtotime($userlifestyle['lunch_time'])); ?></mark></center></td>
          <td style="width:13%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-tea.png"><br />Evening Tea<br /><mark><?=date('h:i A',strtotime($userlifestyle['evening_time'])); ?></mark></center></td>

          <td style="width:13%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-dinner.png"><br />Dinner<br /><mark><?=date('h:i A',strtotime($userlifestyle['dinner_time'])); ?></mark></center></td>
          <td style="width:13%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-before-bed.png"><br />Before Bed<br /><mark><?=date('h:i A',strtotime($userlifestyle['sleep_time'])); ?></mark></center></td>
        </tr>
        <?php 
          $count = count($chart);
          foreach($chart as $i=>$chartdata){
            $day = $chartdata['day'];
              ?><tr>
              <td>Day  <?=$day?></td>
              <td><?=$chartdata['morning']?></td>
              <td><?=$chartdata['breakfast']?></td>
              <td><?=$chartdata['midmeal']?></td>
              <td><?=$chartdata['lunch']?></td>
              <td><?=$chartdata['evening']?></td>
              <td><?=$chartdata['dinnner']?></td>
              <td><?=$chartdata['bedtime']?></td>
        
              </tr><?php
            if ($day % 3  == 0 && ( ($count == 15 && $day!= 15) || ($count == 30 && $day!=30)) ) {
              
              ?>  </tbody>
                  </table> 
                <!-- </div>  -->
              </div> 
              <div class='page'>
                <!-- <div class="table-responsive"> -->
                  <table id="table1" class="table header-border table-responsive-smx page">
                    <tbody>
                    <tr>
                      <td style="width:20%;" style="font-color:#fff !important;">Timing</th>
                      <td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-early-morningx.png"><br />Early Morning<br /><mark><?=date('h:i A',strtotime($userlifestyle['wakeup_time'])); ?></mark></center></th>
                      <td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-breakfast.png"><br />Breakfast<br /><mark><?=date('h:i A',strtotime($userlifestyle['breakfast_time'])); ?></mark></center></th>
                      <td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-mid-meal.png"><br />Mid Meal<br /><mark><?=date('h:i A',strtotime($userlifestyle['midmeal_time'])); ?></mark></center></th>
                      <td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-lunch.png"><br />Lunch<br /><mark><?=date('h:i A',strtotime($userlifestyle['lunch_time'])); ?></mark></center></th>
                      <td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-tea.png"><br />Evening Tea<br /><mark><?=date('h:i A',strtotime($userlifestyle['evening_time'])); ?></mark></center></th>
                      <td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-dinner.png"><br />Dinner<br /><mark><?=date('h:i A',strtotime($userlifestyle['dinner_time'])); ?></mark></center></th>
                      <td style="width:20%;"><center><img src="https://dietghar.com/diet/dgassets/user/icons/icon-before-bed.png"><br />Before Bed<br /><mark><?=date('h:i A',strtotime($userlifestyle['sleep_time'])); ?></mark></center></th>
                    </tr>
                  <?php
                  
              }
          }

        ?>
 
      </tbody>
    </table>    
  <!-- </div>   -->
</div>

 <!-- </div> -->
</section>
</div>


 <script type="text/javascript">
 //$(function () {
    //initialize
  //   if (!$("#table1").is(":blk-transpose"))
  //       $("#table1").transpose({ mode: 0 });
  //       $("#table1").transpose("transpose");
  //       $("#btnTpVertical").html("Reset");
 
  // });
    </script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	</body>
</html>