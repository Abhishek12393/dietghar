<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class DBManager extends CI_Controller {
 
  /**
   * load list modal, library and helpers
   */
  
  function __Construct(){

    parent::__Construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('Custommodel','csm');
    $this->load->model('Common_model','cmm');
    $this->load->model('Dietmodel');
    date_default_timezone_set("Asia/Kolkata");

    // $this->load->library('asynclibrary');
    $this->cpath = 'cron_ci/log/';
    $this->time_start = microtime(true);
    $this->time =  Date('Y-m-d h:i:s');
 

      #echo "<style>body{color: white; background: black;font-family: Lato; font-style: normal; font-variant: normal;line-height: 15px; }</style>";
  }
  public function index(){
    // code check
      pr(range(0, 12),'check success');
  }
  function updatefinalchart_noofchart($limit=10){
    $cpath = $this->cpath ;
    $jresp = $this->getjson('DBM_updatefinalchart_noofchart');
    $jdata =  $jresp;
    if(!isset($jresp['nextoffset']) || $jresp['nextoffset'] == 0){
      $offset = 0;
    }else{
      $offset = $jresp['nextoffset'];
    }

    #===============================================
    $shiftarr = [ 'morning',  'breakfast' , 'midmeal' , 'lunch', 'evening','bedtime','dinnner'];
    $chartarr=['morning_no_of_chart','breakfast_no_of_chart','midmeal_no_of_chart','lunch_no_of_chart','evening_no_of_chart','bedtime_no_of_chart','dinnner_no_of_chart'];
    #===============================================
    $table = 'customers_chart_final';
    #===============================================
    $sql1 = "SELECT * FROM `$table` where 1=1 LIMIT $offset ,$limit ";
    $resp1 = $this->cmm->custquery($sql1);
    // pr($getfc);
    $i=1;
    foreach($resp1 as $data){
      // pr($data , 'row :'.$i);
      $finalid = $data['id'];
      $fchart_id = $data['chart_id'];

      $updateval = [];
      foreach($shiftarr as $shift){
        $shiftitem =  $data[$shift];
        $noofchart = $data[$shift.'_no_of_chart'];
        // pr($shiftitem , $noofchart.' - '.$shift);
        $sql2 = "SELECT * FROM `foodCombination_new` where fc_name = '$shiftitem'";
        $resp2 = $this->cmm->custquery($sql2)[0];
        if($resp2){
          if($resp2['no_of_chart'] == $noofchart){
            // pr('matched');
            $message =  "Matched ".$resp2['no_of_chart'];
          }else{
            // update 
            $updateval [$shift.'_no_of_chart']= $resp2['no_of_chart'] ;
            pr( 'Not matched ,  noofchart '.$resp2['no_of_chart']);
            $message = "NotMatched  noofchart $noofchart =>".$resp2['no_of_chart'];
          }
          
        }else{
          #pr(" Item not found in food combination");
          $message =  'Item NotFound in FCTB';
        }

        $jdata[$finalid][$shift] = $message;
        echo "<br>================shift ends=========================<br>";
      }

      pr($updateval);
      $updtresp = $this->csm->update_common($updateval,$table,'id',$finalid);
      pr($updtresp, 'final update');
      $jdata[$finalid]['final update'] = $updtresp;
      $jdata[$finalid]['chartid'] = $fchart_id;
      // $midmeal =  $data['midmeal'];
      $i++;
      echo "<br>=========================================<br>";
    }
    $jdata['time'] =  date("d-m-Y H:i:s");
    $jdata['nextoffset'] =  $offset +10;
    echo $this->putjson('DBM_updatefinalchart_noofchart',$jdata) == 1 ? 'json updated' : 'json updation failed';
  }

  // data correction page for calories final tb::
  public function get_cal_ftb(){
    #===============================================
    $shiftarr = [ 'morning',  'breakfast' , 'midmeal' , 'lunch', 'evening','bedtime','dinnner'];
    $chartarr=['morning_no_of_chart','breakfast_no_of_chart','midmeal_no_of_chart','lunch_no_of_chart','evening_no_of_chart','bedtime_no_of_chart','dinnner_no_of_chart'];
    #===============================================
    $this->pageheader('Table Correction');
    // get the data ::
    $query1 = "SELECT *  FROM `final_chart_1400_1500_test` where id= '204'   ";
    $resp1 = $this->cmm->custquery($query1);
 
    foreach($resp1 as $data ){
      // pr($data,'array - day');
      $this->showdaydata($data);
      foreach($shiftarr as $shift){
        $shiftnchart = $shift.'_no_of_chart';
        $noofchart = $data[$shiftnchart];
        //::
        $query2 = "SELECT *  FROM `foodCombination_new` where no_of_chart = $noofchart   ";
        $resp2 = $this->cmm->custquery($query2)[0];

        $fc_name =  $resp2['fc_name'];
        ?><fieldset>
          <legend> <span style="text-transform:uppercase;"><?=$shift; ?></span></legend>
          <!-- Cal table:<?=$data[$shift]?>
          <div id="fcdata"><b>FC table </b>:<?=$fc_name; ?><div> -->
            <table id="innertable">
              <tr>
                <td class="fixcol">Calorie table data</td>
                <td><?=$data[$shift]?></td>
                <td class="fixcol"><?php
                        $break = explode("+",$data[$shift]);
                        foreach($break as $itemname){
                          
                          if (!preg_match('~[0-9]+~', $itemname)) {
                            if(!empty($itemname)){
                              // pr($itemname,'Missing quantity items in '.$shift);
                              ?><br>* Missing Quanity In calorie table data  => <a class="button2" href="/updatetextofcaltb">Update name</a></td><?php
                            }
                          } 
                        }
                        ?>
              </tr>
              <tr>
                <td>FoodCombination table data</td>
                <td><?=$fc_name; ?></td>
                <td></td>
              </tr>
              <tr >
                <td class="bigrow">*=></td>
                <td><a class="button3" href="/updatetextofcaltb">Update No of chart </a></td>
                <td></td>
              </tr>
            </table>
          </fieldset><br><?php
      }
      ?><br>* Update Day As Corrected => <a class="button1" href="/updatetextofcaltb">Update Day <?=$data['id'];?></a><hr><?php
    }

  }
  public function pageheader($title){
    ?><!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>DBMANAGER - <?=$title ?> </title>
      <style>
        body {
          background: #060c09;
          color: white;
          font-size: 17px;
          padding-left: 1rem;;
        }
        pre{
          font-size: 14px;
        }
        fieldset {
          background: #00456624;
        }
        
        #innertable th, #innertable td {
          border-left: 1px solid #8080804d;
          border-top: 1px solid #8080804d;
        }
        th, td {
          border-left: 2px solid grey;
          border-top: 2px solid grey;
        }
        table{
          width: 100%;
          border-right: 1px solid grey;
          border-bottom: 5px solid grey;
        }
        #innertable{
          width: 100%;
          border-right: 1px solid #8080804d;
          border-bottom: 1px solid #8080804d;
        }
        thead , legend {
          color: green;
          text-align: left;
        }
        tbody {color: whitesmoke;}
        .bigrow{
          padding-top: 8px;
          padding-bottom: 8px;
        }
        .fixcol{
          width: 24%;
        }
        .button1{
          color: #FFFFFF;
          background-color: #04AA6D!important;
        }
        .button2{
          /* blue */
          color: White;
          background-color: #008CBA!important;
        }
        .button3{
          /* blue */
          color: White;
          background-color: #555555!important;
        }
        .button1, .button2,.button3{
          
          border-radius: 5px;
          font-size: 17px;
          font-family: 'Source Sans Pro', sans-serif;
          padding: 6px 18px;
        }
      </style>
    </head>
    <body>
   <?php
  }
  public function showdaydata($data){
    ?>
      Day ID- <?=$data['id'];?>
      <table>
        <thead>
          <tr>
            <th>Morning</th>
            <th>Breakfast</th>
            <th>Midmeal</th>
            <th>Lunch</th>
            <th>Evening</th>
            <th>Dinner</th>
            <th>Bedtime</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?=$data['morning'];?></td>
            <td><?=$data['breakfast'];?></td>
            <td><?=$data['midmeal'];?></td>
            <td><?=$data['lunch'];?></td>
            <td><?=$data['evening'];?></td>
            <td><?=$data['dinnner'];?></td>
            <td><?=$data['bedtime'];?></td>
           
          </tr>
          <tr>
            <td>Status:<?=$data['status'];?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      
      </table>
    <?php
  }
  public function updatecustcharthistory(){

    $query = "SELECT * FROM customers_chart_history ";

    $resp = $this->cmm->custquery($query);

    foreach($resp as $data){
      $chartid = $data['meal_chart_id'];
      $cid = $data['id'];
        echo 'chart id'.$chartid ;
        

        $query2 = "SELECT count(*) as count FROM customers_chart_final where chart_id = $chartid ";
        $resp2 = $this->cmm->custquery($query2)[0]['count'];
      
        if($resp2 == 15){$limit = 8; }else{$limit=16;}

        $query3 = "SELECT AVG(totalcalories) as tc FROM (SELECT * FROM `customers_chart_final` WHERE chart_id = $chartid limit $limit) as total; ";
        $resp3 = $this->cmm->custquery($query3)[0];
        $average = round($resp3['tc']);
        pr($average , 'response - '.$resp2);

        $sql = "UPDATE  customers_chart_history SET calories = $average ,  days =  $resp2 WHERE id = $cid";
        $update = $this->cmm->custqueryiud($sql);
        pr($update , 'update');
    }

    // SELECT AVG(totalcalories) as calories FROM `customers_chart_final` where chart_id = 1655382792;
    //SELECT AVG(totalcalories) FROM (SELECT * FROM `customers_chart_final` WHERE chart_id = 1655382792 limit 15) as total;


  }
  public function updatefoodcat()  {
      if($_GET['cal'] && $_GET['cal'] != '')
      {  
      $cal = $_GET['cal'];
      // $_SESSION = $cal;
      $intotable = get_table_name($cal);
      echo $intotable;
      $sql = "UPDATE   $intotable SET food_cate =2 
      WHERE `lunch` LIKE '%Prawn %' || morning LIKE '%Prawn %' || breakfast LIKE '%Prawn %' || midmeal LIKE '%Prawn %' || evening LIKE '%Prawn %' || dinnner LIKE '%Prawn %' || bedtime LIKE '%Prawn %' || 
        `lunch` LIKE '%Machli%' || morning LIKE '%Machli%' || breakfast LIKE '%Machli%' || midmeal LIKE '%Machli%' || evening LIKE '%Machli%' || dinnner LIKE '%Machli%' || bedtime LIKE '%Machli%' || 
        `lunch` LIKE '%Fish%' || morning LIKE '%Fish%' || breakfast LIKE '%Fish%' || midmeal LIKE '%Fish%' || evening LIKE '%Fish%' || dinnner LIKE '%Fish%' || bedtime LIKE '%Fish%' || 
        `lunch` LIKE '%Mutton%' || morning LIKE '%Mutton%' || breakfast LIKE '%Mutton%' || midmeal LIKE '%Mutton%' || evening LIKE '%Mutton%' || dinnner LIKE '%Mutton%' || bedtime LIKE '%Mutton%' || 
        `lunch` LIKE '%Bacon%' || morning LIKE '%Bacon%' || breakfast LIKE '%Bacon%' || midmeal LIKE '%Bacon%' || evening LIKE '%Bacon%' || dinnner LIKE '%Bacon%' || bedtime LIKE '%Bacon%' || 
        `lunch` LIKE '%Mexican soup%' || morning LIKE '%Mexican soup%' || breakfast LIKE '%Mexican soup%' || midmeal LIKE '%Mexican soup%' || evening LIKE '%Mexican soup%' || dinnner LIKE '%Mexican soup%' || bedtime LIKE '%Mexican soup%' || 
      `lunch` LIKE '%chicken%' || morning LIKE '%chicken%' || breakfast LIKE '%chicken%' || midmeal LIKE '%chicken%' || evening LIKE '%chicken%' || dinnner LIKE '%chicken%' || bedtime LIKE '%chicken%'  
      ";
      $resp = $this->cmm->custqueryiud($sql);


      pr($resp , 'response');


      }



  }
  
  // to correct the data in the db

  public function updatefc_idquan(){
    $limit = 3000;
    if(!isset($_SESSION['c'])){
      $_SESSION['c'] = 0;
    } 
    $_SESSION['c'] = 0;
    

    $offset = $_SESSION['c'];

    $query =  "SELECT  * FROM foodCombination_new_temp LIMIT $limit OFFSET $offset ";
    $resp = $this->cmm->custquery($query);
      #pr($resp,'resp select');
  
    foreach($resp as $key => $data){
      $foodId_quantity = $data['foodId_quantity'];
      $fcid = $data['id'];
      $foodId_quantity  = unserialize($foodId_quantity);
      $fcidquan= "";
      foreach($foodId_quantity as $id=>$quan){
          $fcidquan .= "($quan+$id)";
      }
    
      // pr($foodId_quantity);
      pr($fcidquan, $fcid);
      # now update into the same 
      $query2 =  "UPDATE foodCombination_new_temp SET fcidquan = '$fcidquan' WHERE id= $fcid";
      $respu = $this->cmm->custquery($query2);
      if($respu == 1){
        echo "updated";
        
      }else{
        echo "Not updated";
      }
    }
    
    $_SESSION['c'] = $offset+ $limit;



  }
  public function  updateuniqidinfinaltb($tbindex = 601,$limit = 100){
    if($_GET['tbi']){
      $tbindex = $_GET['tbi'];
    }
    if(!isset($_SESSION['c'])){
      $_SESSION['c'] = 0;
    } 
    // $_SESSION['c'] = 0; #
    $offset = $_SESSION['c'];
    // =========================================================
    $table= get_table_name($tbindex);
    // $table= 'final_chart_100_199_test';
    pr($table);
    $query1 =  "SELECT  * FROM $table LIMIT $limit OFFSET $offset ";
    $resp1 = $this->cmm->custquery($query1);
  
    if(!empty($resp1)){
      foreach($resp1 as $key=>$day){
        $fcid = $day['id'];
        $uniqid = $day['morning_no_of_chart'].'-'.$day['breakfast_no_of_chart'].'-'.$day['midmeal_no_of_chart'].'-'.$day['lunch_no_of_chart'].'-'.$day['evening_no_of_chart'].'-'.$day['dinnner_no_of_chart'].'-'.$day['bedtime_no_of_chart'];
        

          $query2 =  "UPDATE $table SET uniq_id = '$uniqid' WHERE id= $fcid";
          $respu = $this->cmm->custquery($query2);
          if($respu == 1){
            pr($uniqid.' | updated','unique id- '.$day['id']);

          }else{
            echo "Not updated - ".$day['id'];
          }

      }

      $_SESSION['c'] = $offset+ $limit;
    }else{
      $offset = 0;
      $_SESSION['c'] = $offset;
      echo "offset = $offset";
    }


  }

  // helper function 

  /*====*/
    /*General*/ 
  /*====*/
  public function truncate($table = ''){
    $table = '`final_chart_1_breakdown`';
    $query = ' TRUNCATE TABLE ;';
    $resp = $this->cmm->custquery($query);
  }       
  public function dayShift_frombreakdown(){ 
  
    $totalcal= $this->input->post('totalcal');
    echo $fromtable= $this->input->post('fromtable');
    echo  $fromid = $this->input->post('fromid');
    echo  $fromUniqId = $this->input->post('fromUniqId');
  
      # check if the combination exist in the to table
        // using in cron and in cron management : break down table
        $intotable = get_table_name($totalcal);
        $where= "uniq_id = '$fromUniqId'";
        #$intotable = 'final_chart_100_199_test'; // for test
        $check_resp = $this->csm->count_common($intotable,$where);
        if($check_resp == 0){
        
          // pr($intotable,'intotable');
          $query = "INSERT INTO $intotable ( `uniq_id`, `morning`, `breakfast`, `midmeal`, `lunch`, `evening`, `dinnner`, `bedtime`, `totalcalories`, `totalprotein`, `totalcarbohydrates`, `totalfat`, `totalsodium`, `totaliron`, `totald_fibre`, `morning_no_of_chart`, `evening_no_of_chart`, `breakfast_no_of_chart`, `midmeal_no_of_chart`, `lunch_no_of_chart`, `bedtime_no_of_chart`, `dinnner_no_of_chart`, `d_time`, `food_cate`, `status`, `admin_verify`,`disease`) 
          SELECT  `uniq_id`, `morning`, `breakfast`, `midmeal`, `lunch`, `evening`, `dinnner`, `bedtime`, `totalcalories`, `totalprotein`, `totalcarbohydrates`, `totalfat`, `totalsodium`, `totaliron`, `totald_fibre`, `morning_no_of_chart`, `evening_no_of_chart`, `breakfast_no_of_chart`, `midmeal_no_of_chart`, `lunch_no_of_chart`, `bedtime_no_of_chart`, `dinnner_no_of_chart`, `d_time`, `food_cate`, `status`,`admin_verify`, `disease`FROM $fromtable 
          WHERE id = $fromid;";

          $resp = $this->cmm->custqueryiud($query);
        

          if($resp){
            # delete the row
              $respdel = $this->csm->delete_common_r('id',$fromid,$fromtable);
            //  pr($respdel,'delresp');
              if($respdel):
              $message = 'Move success full';
              else:
              $message = 'Data copied in the '.$intotable." and deletion failed in $fromtable |";
              endif;
          }else{
            $message = 'Move data failed |';
          }
        }else{
              # delete the row
              $respdel = $this->csm->delete_common_r('id',$fromid,$fromtable);
              if($respdel):
              $message = 'Already in the '.$intotable." and deleted in $fromtable |";
              else:
              $message = 'Already in the '.$intotable." and  deletion failed in $fromtable |";
              endif;
  
        }
  
        
        if($fromtable == 'final_chart_1_verified'){
          redirect("Admin/CronManager/ViewVerifiedtabledata?m=$message");
        }else{
          redirect("Admin/CronManager/ViewBreakdowndata?m=$message");
        }

          
  
  }
  public function deletedayfromtb(){ 
    $fromid= $this->input->post('fromid');
    $fromtable= $this->input->post('fromtable');
    $pageid= $this->input->post('pageid');


    $respdel = $this->csm->delete_common_r('id',$fromid,$fromtable);
    if($respdel):
      $message = 'Deleted';
      else:
      $message = 'Deletion Failed';
      endif;
      if(isset($pageid)){
        echo $pageid;
        redirect("Admin/CronManager/ViewTabledata?m=$message");
      }else{
        redirect("Admin/CronManager/ViewBreakdowndata?m=$message");
      }
      
  }
  public function fetchCountDaychartintb(){
    # fetch count of one day  chart type according to category 
    # response using in ajax on checkfoodchart :: admin_foodchart
    $postdata = postdata();	
    $tbid = $postdata->table;
      if($tbid == 'vertb'){
        $table = 'final_chart_1_verified';
      }else{
        $table = get_table_name($tbid);
      }

      $where = "id >= 0 ";
      $counttotal = $this->csm->count_common($table,$where);

      $where = "morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0  ";
      $countallmeal = $this->csm->count_common($table,$where);

      $where = "morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart = 0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0  ";
      $countOutMM = $this->csm->count_common($table,$where);

      $where = "morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart =0  ";
      $countOutBedtime = $this->csm->count_common($table,$where);

      $where = "morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart =0 AND lunch_no_of_chart !=0 AND evening_no_of_chart =0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0  ";
      $countOutEveAndMM = $this->csm->count_common($table,$where);

      $where = "morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart =0 AND lunch_no_of_chart !=0 AND evening_no_of_chart =0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart =0  ";
      $countOutMMEveandBed = $this->csm->count_common($table,$where);

      $where = "morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart =0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0  ";
      $countOutEve = $this->csm->count_common($table,$where);

      $where = "morning_no_of_chart !=0 AND breakfast_no_of_chart =0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0  ";
      $countOutBf = $this->csm->count_common($table,$where);

      $where = "morning_no_of_chart !=0 AND breakfast_no_of_chart =0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart =0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0  ";
      $countOutBfEve = $this->csm->count_common($table,$where);

      $where = "morning_no_of_chart =0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart =0 AND lunch_no_of_chart !=0 AND evening_no_of_chart =0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart =0  ";
      $countOutmorMMEveBT = $this->csm->count_common($table,$where); // legit

      $where = "morning_no_of_chart != 0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart = 0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart =0  ";
      $countOutmorMMBT = $this->csm->count_common($table,$where); // legit




    $resp = [
      'counttotal' => $counttotal , 
      'countallmeal' => $countallmeal , 
      'countOutMM' => $countOutMM , 
      'countOutBedtime' => $countOutBedtime , 
      'countOutEveAndMM' => $countOutEveAndMM , 
      'countOutMMEveandBed' => $countOutMMEveandBed , 
      'countOutEve' => $countOutEve , 
      'countOutBf' => $countOutBf , 
      'countOutBfEve' => $countOutBfEve , 
      'countOutmorMMEveBT' => $countOutmorMMEveBT , 
      'countOutmorMMBT' => $countOutmorMMBT , 
      'message' => $table
    ];
    echo json_encode($resp);
  }
  
  public function updatetables(){
    # manual update of days tables  
    # add ?c=601 to reset 600 ; 

    if(!isset($_SESSION['c'])){
      $_SESSION['c'] = 501;
    }else{ 
      $cal = $_SESSION['c'];
      if($cal >=3600 ){
        unset($_SESSION);
        exit();
          die('died cause c > 3600 which is not feasible');
      }
    }
    if(isset($_GET['c'])){ $_SESSION['c'] =  $cal = $_GET['c'];} // if isset c in url then it will do that and reset session
    


    $tb = get_table_name($cal);
    $resp = $this->getjson('config');
    pr($tb,$cal);

    // $query =  "UPDATE $tb SET morning = REPLACE(morning, \"'\", \"\") , breakfast = REPLACE(breakfast, \"'\", \"\") , midmeal = REPLACE(midmeal, \"'\", \"\") ,lunch = REPLACE(lunch, \"'\", \"\") ,evening = REPLACE(evening, \"'\", \"\") ,dinnner = REPLACE(dinnner, \"'\", \"\") ,bedtime = REPLACE(bedtime, \"'\", \"\");";


    $resp = $this->cmm->custquery($query);

    if($resp == 1){
      echo "updated";
      $_SESSION['c'] = $_SESSION['c'] + 100;
    }else{
      echo "Not updated";
    }

  }
  public function updatefctables($tbindex = 601){

    $tbname = get_table_name($tbindex);
 

    $query = "ALTER TABLE `$tbname` 
    CHANGE `morning_no_of_chart` `morning_no_of_chart` INT(11) NOT NULL AFTER `bedtime` ,
      CHANGE `breakfast_no_of_chart` `breakfast_no_of_chart` INT(11) NOT NULL AFTER `morning_no_of_chart`, 
      CHANGE `midmeal_no_of_chart` `midmeal_no_of_chart` INT(11) NOT NULL AFTER `breakfast_no_of_chart`, 
      CHANGE `evening_no_of_chart` `evening_no_of_chart` INT(11) NOT NULL AFTER `midmeal_no_of_chart`, 
      CHANGE `lunch_no_of_chart` `lunch_no_of_chart` INT(11) NOT NULL AFTER `evening_no_of_chart`, 
      CHANGE `dinnner_no_of_chart` `dinnner_no_of_chart` INT(11) NOT NULL AFTER `lunch_no_of_chart`, 
      CHANGE `bedtime_no_of_chart` `bedtime_no_of_chart` INT(11) NOT NULL AFTER `dinnner_no_of_chart`";
    

    $resp = $this->cmm->custquery($query);

    if($resp == 1){
      echo "updated <br>";
      $tbindex = $tbindex + 100;
      echo "<a href = 'https://dietghar.com/diet/DBManager/updatefctables/$tbindex' > Next day shift table </a>";
    }else{
      echo "Not updated";
    
    }



  }
  
  private function getdays($arrname=''){ 
    $shiftarr = [ 'morning',  'breakfast' , 'midmeal' , 'lunch', 'evening','bedtime','dinnner'];
    $chartarr=['morning_no_of_chart','breakfast_no_of_chart','midmeal_no_of_chart','lunch_no_of_chart','evening_no_of_chart','bedtime_no_of_chart','dinnner_no_of_chart'];
    if($arrname == 'chart'){
      return $chartarr;
    }else{
      return $shiftarr;
    }
  }

  public function getjson($name = ''){
    $jsonString = file_get_contents($this->cpath.$name.'.json');
    $data = json_decode($jsonString, true);
    return $data;
  }
  // to put json into file data 
  public function putjson($name , $data){
    $newJsonString = json_encode($data);
    if(file_put_contents($this->cpath.$name.'.json' , $newJsonString)){
      return 1;
    }
  }
  // views::
  public function dbmRunAndView(){
    $data= [];
    $this->load->view('extrapage/dbmanagerview',$data);
  }
  public function viewjsonForAjax1(){
    $get = $_GET;
    $name = $get['jsonpath'];
    $check = $get['check_live'];
    if($check == 1){

      $jsonString = file_get_contents($this->cpath.$name.'.json');
      $data = json_decode($jsonString, true);
      // echo $data;
      $resp['offset'] = $data['offset'];
      $resp['tbindex'] = $data['tbindex'];
      echo json_encode($resp);
      $jsonString = null;
      $data = null;
    }else{
      echo "Request Parameter Null or wrong";
    }

  }

}