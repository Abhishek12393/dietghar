 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Cron extends CI_Controller {
 
  /**
  * load list modal, library and helpers
  */
  function __Construct(){
    parent::__Construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('Custommodel','csm');
    $this->load->model('Common_model','cmm');
    // $this->load->library('asynclibrary');

    date_default_timezone_set("Asia/Kolkata"); 
    $this->cpath = 'cron_ci/log/';
    $this->time_start = microtime(true);
    $this->time =  Date('Y-m-d h:i:s');

    // jus to remove strain from eyes
    echo "<style>body{color: white; background: black;font-family: Lato; font-style: normal; font-variant: normal;line-height: 15px; }</style>";
  }
 
  public function index(){
    // code check
      pr(range(0, 12));
  }
  // helper function 
  private function authenticateCron($userAuth, $cronAuth){
    if($userAuth != $cronAuth){
      die('Died');
    }
  }
  // to read json file data 
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
  public function test(){
    // running :: 
    for ($i=1; $i <=3 ; $i++) { 
      $cpath = $this->cpath ;
      $resp = $this->getjson('jsontracker');
      $index = $resp['index'];
      echo $index;
      echo "<br>";
      

      $index = $index +1;
      $jdata = ['index' => $index ];
      echo  $this->putjson('jsontracker',$jdata) == 1 ? 'json updated' : 'json updation failed';
      // sleep(5);
    }

  }

      public function crontest(){
        $cpath = $this->cpath ;
          $resp = $this->getjson('jsontracker');
          $jdata = $resp;
          $index = $resp['index'];
          echo $index;
          echo "<br>";
          $index = $index +1;
          // $jdata = ['index' => $index ];
          $jdata['history'][] = ['index' => $index ];
          echo  $this->putjson('jsontracker',$jdata) == 1 ? 'json updated' : 'json updation failed';
      }
      public function viewcrontest(){
        $cpath = $this->cpath ;
        $resp = $this->getjson('jsontracker_activeuser');
        // $index = $resp['index'];
        // echo $index;
        pr($resp);
      }

      #Cron function starts here ::
      public function update_expire_users(){
        // 5/8/2022
        $cron = $this->getjson('update_expire_usersCron');
        // get list of users that are just expired by plan end date // that chnage the status of those user
        $fromtable = "customers_info";
        $where = " meal_end_date < DATE(NOW()) AND is_plan_expired = 2 "; // where plan expired but status is still active
        $query = "SELECT id, mobile_no, meal_end_date, is_plan_expired ,plan_id, renew_plan_id , renew_start_date , renew_end_date ,renew_meal_chart_id, renew_wt_update FROM  $fromtable WHERE $where ORDER BY id ASC ";
        // echo $query ; 
        $resp = $this->cmm->custquery($query);
        // pr($resp);
        if($resp){
          foreach($resp as $data){
            // pr($data) ;
            $id = $data['id'];
            
            if($data['renew_plan_id'] ==0){
              // customer didnt paid before expiry
              // reset plan id usertype and ispayment done
              $plan_id = 0;
              $usertype = 2;
              $ispaymentdone =0;
              $is_plan_expired = 1;
              $renew_wt_update = 0;
              $set = ",`meal_chart_id` = 0 ";
            }else{
              // customer paid for renewal before plan expire plan // change plan id from renewwal id 
              $usertype = 1;
              $ispaymentdone =1;
              $plan_id = $data['renew_plan_id'];
              $is_plan_expired = 0;
              $renew_wt_update = $data['renew_wt_update'];
              $set = ",`meal_chart_id` = '".$data['renew_meal_chart_id']."' ,`meal_start_date` = '".$data['renew_start_date']."' , `meal_end_date`= '".$data['renew_end_date'] ."' , `renew_start_date`= '00:00:00' , `renew_end_date`= '00:00:00' , `renew_meal_chart_id`= 0 ";
              
            }

            $renewplanid= 0;
            
            $uquery = "UPDATE $fromtable SET `is_plan_expired` = $is_plan_expired , `plan_id` = '$plan_id' , `user_type` = $usertype ,  `is_payment_done`= $ispaymentdone ,`renew_plan_id`= $renewplanid , `renew_wt_update`= $renew_wt_update $set WHERE  id = $id ";
              $uresp = $this->cmm->custquery($uquery);
              // echo $uquery;
              $uresp = $uresp ==1 ? 'updated' : 'update failed';
              $uresps[$id][] = $id.':'.$uresp;

              // update old plan inactive when plan expires
              $uqueryPlan = "UPDATE Plan SET `plan_status` = 0  WHERE  id = ".$data['plan_id']."";
              $urespplan = $this->cmm->custquery($uqueryPlan);
              // echo $uquery;
              $uresps[$id][] = $data['plan_id'].'=>'.$urespplan;
          }
          $jdata['history'] = $uresps;
        }
        $jdata['time'] = date('Y-m-d');
        $cron[] = $jdata;
        echo $this->putjson('update_expire_usersCron',$cron) == 1 ? 'json updated' : 'json updation failed';
      }

      public function update_expire_users_terst($param){
        $this->authenticateCron($param,'dietgharcron');
        $cpath = $this->cpath ;
        $resp = $this->getjson('jsontracker_expireduser');
        $jdata = $resp;

        $fromtable = "customers_info";
        $where = " meal_end_date < DATE(NOW()) AND is_plan_expired = 2 "; // where plan expired but status is still active
        $query = "SELECT id, mobile_no, meal_end_date, is_plan_expired ,plan_id, renew_plan_id , renew_start_date , renew_end_date ,renew_meal_chart_id, renew_wt_update FROM  $fromtable WHERE $where ORDER BY id ASC ";
        // echo $query ; 
        // pr($query);
        $resp = $this->cmm->custquery($query);
        pr($resp);
        if($resp){
          foreach($resp as $data){
            $id = $data['id'];
            if($data['renew_plan_id'] ==0){
              // customer didnt paid before expiry
              // reset plan id usertype and ispayment done
              $plan_id = 0;
              $usertype = 2;
              $ispaymentdone =0;
              $is_plan_expired = 1;
              $renew_wt_update = 0;
              $set = ",`meal_chart_id` = 0 ";
            }else{
              // customer paid for renewal before plan expire plan // change plan id from renewwal id 
              $usertype = 1;
              $ispaymentdone =1;
              $plan_id = $data['renew_plan_id'];
              $is_plan_expired = 0;
              $renew_wt_update = $data['renew_wt_update'];
              $set = ",`meal_chart_id` = '".$data['renew_meal_chart_id']."' ,`meal_start_date` = '".$data['renew_start_date']."' , `meal_end_date`= '".$data['renew_end_date'] ."' , `renew_start_date`= '00:00:00' , `renew_end_date`= '00:00:00' , `renew_meal_chart_id`= 0 ";
              
            }

            $renewplanid= 0;
            
            $uquery = "UPDATE $fromtable SET `is_plan_expired` = $is_plan_expired , `plan_id` = '$plan_id' , `user_type` = $usertype ,  `is_payment_done`= $ispaymentdone ,`renew_plan_id`= $renewplanid , `renew_wt_update`= $renew_wt_update $set WHERE  id = $id ";
            pr($uquery);
          }
        }




        $jdata['count'] = $resp['count'] + 1; 
        $jdata['param'] = $param; 
        

        echo  $this->putjson('jsontracker_expireduser',$jdata) == 1 ? 'json updated' : 'json updation failed';
      }


      public function update_active_users(){
        
        $cpath = $this->cpath ;
        $resp = $this->getjson('jsontracker_activeuser');
        $jdata = $resp;
        $log = $resp['activeuserlog'];

        $fromtable = "customers_info";
        $where = " meal_start_date <= DATE(NOW()) AND meal_end_date > DATE(NOW()) AND is_plan_expired != 2 "; // where plan is active but status is still expired
        $query = "SELECT id, mobile_no, meal_end_date,is_plan_expired , renew_plan_id  FROM  $fromtable WHERE $where ORDER BY id ASC ";
        // echo $query ; 
        $resp = $this->cmm->custquery($query);

        foreach($resp as $data){
          // pr($data);
          $id = $data['id'];
          // (2:: plan is active)
          $uquery = "UPDATE $fromtable SET `is_plan_expired` = 2  WHERE  id = $id ";
          $uresp = $this->cmm->custquery($uquery);
          pr($uresp);
          $uresp[] = $uresp;
        }

        $jdata['activeuserlog'][] = ['resp' => $resp , 'update' => $uresp , 'querysel'=> $query];
        echo  $this->putjson('jsontracker_activeuser',$jdata) == 1 ? 'json updated' : 'json updation failed';
      }

      /*==1==*/


      # function :: break down meal  :: working and correct
      public function sevenmealBreakdownTb(){
        $limit = 1;
        
        $cpath = $this->cpath ;
        $resp = $this->getjson('sevenmealBreakdownCron');
        $id = $resp['id'];
        $resp_lastid = $resp['resp_lastid'];
        $jdata = $resp;
        if(!$id){    $id = 0;  }
        if(!$resp_lastid){$resp_lastid  =  0;}
        #=============================================================
        $fromtable = "final_chart_1_verified";
        $where = " morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0 And id > $id ";
        $query = "SELECT * FROM  $fromtable WHERE $where ORDER BY id ASC  LIMIT $limit ";
        $resp = $this->cmm->custquery($query);
        if($resp && !empty($resp)){
          $data = $resp[0];
          $fromId = $data['id'];
          $fromUniqId = $data['uniq_id'];
          unset($data['id']);
          $totalCal = $data['totalcalories'];
          #=================================================================
          #$totalcalories of the morning 

          // $morningC = $this->csm->Select_col_where('foodCombination_new','totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre','no_of_chart',$data['morning_no_of_chart']);
          // $morningCal = $morningC[0]['totalcalories'];
          #$breakfastC = $this->csm->Select_col_where('foodCombination_new','totalcalories','no_of_chart',$data['breakfast_no_of_chart']);
          #$breakfastCal = $breakfastC[0]['totalcalories'];
          $midmealC = $this->csm->Select_col_where('foodCombination_new','totalcalories,totalprotein,totalcarbohydrates,totalfat,totalsodium,totaliron,totald_fibre','no_of_chart',$data['midmeal_no_of_chart']);
          // pr($midmealC,'mid meal data');
          $midmealCal = $midmealC[0]['totalcalories'];
          $midmealPro = $midmealC[0]['totalprotein'];
          $midmealCarb = $midmealC[0]['totalcarbohydrates'];
          $midmealFat = $midmealC[0]['totalfat'];
          $midmealSod = $midmealC[0]['totalsodium'];
          $midmealIrn = $midmealC[0]['totaliron'];
          $midmealFib = $midmealC[0]['totald_fibre'];
          #$lunchC = $this->csm->Select_col_where('foodCombination_new','totalcalories','no_of_chart',$data['lunch_no_of_chart']);
          #$lunchCal = $lunchC[0]['totalcalories'];
          $eveningC = $this->csm->Select_col_where('foodCombination_new','totalcalories','no_of_chart',$data['evening_no_of_chart']);
          $eveningCal = $eveningC[0]['totalcalories'];
          #$dinnnerC = $this->csm->Select_col_where('foodCombination_new','totalcalories','no_of_chart',$data['dinnner_no_of_chart']);
          #$dinnnerCal = $dinnnerC[0]['totalcalories'];
          $bedtimeC = $this->csm->Select_col_where('foodCombination_new','totalcalories','no_of_chart',$data['bedtime_no_of_chart']);
          $bedtimeCal = $bedtimeC[0]['totalcalories'];

          #combination 1 without mid meal:
          $OutMM = $data;
          $OutMM['midmeal_no_of_chart'] = 0;
          $OutMM['midmeal'] = NULL;
          $OutMM['uniq_id'] =   $OutMM['morning_no_of_chart'].'-'.$OutMM['breakfast_no_of_chart'].'-'.$OutMM['midmeal_no_of_chart'].'-'.$OutMM['lunch_no_of_chart'].'-'.$OutMM['evening_no_of_chart'].'-'.$OutMM['dinnner_no_of_chart'].'-'.$OutMM['bedtime_no_of_chart'];

          $OutMM['totalcalories'] = $data['totalcalories']- $midmealCal;
          $OutMM['totalprotein'] = $data['totalprotein']- $midmealPro;
          $OutMM['totalcarbohydrates'] = $data['totalcarbohydrates']- $midmealCarb;
          $OutMM['totalfat'] = $data['totalfat']- $midmealFat;
          $OutMM['totalsodium'] = $data['totalsodium']- $midmealSod;
          $OutMM['totaliron'] = $data['totaliron']- $midmealIrn;
          $OutMM['totald_fibre'] = $data['totald_fibre']- $midmealFib;
          // pr($OutMM ,'OutMM');
          #insert this new combination
          $resp1 = $this->csm->insert_common('final_chart_1_breakdown',$OutMM);
          // pr($resp1,'response::');

          #combination 2 without evening snack:
          $OutES = $data;
          $OutES['evening_no_of_chart'] = 0;
          $OutES['evening'] = NULL;
          $OutES['uniq_id'] =   $OutES['morning_no_of_chart'].'-'.$OutES['breakfast_no_of_chart'].'-'.$OutES['midmeal_no_of_chart'].'-'.$OutES['lunch_no_of_chart'].'-'.$OutES['evening_no_of_chart'].'-'.$OutES['dinnner_no_of_chart'].'-'.$OutES['bedtime_no_of_chart'];

          $OutES['totalcalories'] = $data['totalcalories']- $eveningC[0]['totalcalories'];
          $OutES['totalprotein'] = $data['totalprotein']- $eveningC[0]['totalprotein'];
          $OutES['totalcarbohydrates'] = $data['totalcarbohydrates']- $eveningC[0]['totalcarbohydrates'];
          $OutES['totalfat'] = $data['totalfat']- $eveningC[0]['totalfat'];
          $OutES['totalsodium'] = $data['totalsodium']- $eveningC[0]['totalsodium'];
          $OutES['totaliron'] = $data['totaliron']- $eveningC[0]['totaliron'];
          $OutES['totald_fibre'] = $data['totald_fibre']- $eveningC[0]['totald_fibre'];
          // pr($OutES ,'OutES');
          $resp2 = $this->csm->insert_common('final_chart_1_breakdown',$OutES);
          // pr($resp2,'response::');

          #combination 3 without bedtime:
          $OutBT = $data;
          $OutBT['bedtime_no_of_chart'] = 0;
          $OutBT['bedtime'] = NULL;
          $OutBT['uniq_id'] =   $OutBT['morning_no_of_chart'].'-'.$OutBT['breakfast_no_of_chart'].'-'.$OutBT['midmeal_no_of_chart'].'-'.$OutBT['lunch_no_of_chart'].'-'.$OutBT['evening_no_of_chart'].'-'.$OutBT['dinnner_no_of_chart'].'-'.$OutBT['bedtime_no_of_chart'];

          $OutBT['totalcalories'] = $data['totalcalories']- $bedtimeC[0]['totalcalories'];
          $OutBT['totalprotein'] = $data['totalprotein']- $bedtimeC[0]['totalprotein'];
          $OutBT['totalcarbohydrates'] = $data['totalcarbohydrates']- $bedtimeC[0]['totalcarbohydrates'];
          $OutBT['totalfat'] = $data['totalfat']- $bedtimeC[0]['totalfat'];
          $OutBT['totalsodium'] = $data['totalsodium']- $bedtimeC[0]['totalsodium'];
          $OutBT['totaliron'] = $data['totaliron']- $bedtimeC[0]['totaliron'];
          $OutBT['totald_fibre'] = $data['totald_fibre']- $bedtimeC[0]['totald_fibre'];
          // pr($OutBT ,'OutBT');
          $resp3= $this->csm->insert_common('final_chart_1_breakdown',$OutBT);
          // pr($resp3,'response::');

          #combination 4 :  without mid meal and evening snack
          $OutMMES = $data;
          $OutMMES['midmeal_no_of_chart'] = 0;
          $OutMMES['midmeal'] = NULL;
          $OutMMES['evening_no_of_chart'] = 0;
          $OutMMES['evening'] = NULL;
          $OutMMES['uniq_id'] =   $OutMMES['morning_no_of_chart'].'-'.$OutMMES['breakfast_no_of_chart'].'-'.$OutMMES['midmeal_no_of_chart'].'-'.$OutMMES['lunch_no_of_chart'].'-'.$OutMMES['evening_no_of_chart'].'-'.$OutMMES['dinnner_no_of_chart'].'-'.$OutMMES['bedtime_no_of_chart'];

          $OutMMES['totalcalories'] = $data['totalcalories']- $eveningC[0]['totalcalories']- $midmealC[0]['totalcalories'];
          $OutMMES['totalprotein'] = $data['totalprotein']- $eveningC[0]['totalprotein']- $midmealC[0]['totalprotein'];
          $OutMMES['totalcarbohydrates'] = $data['totalcarbohydrates']- $eveningC[0]['totalcarbohydrates']- $midmealC[0]['totalcarbohydrates'];
          $OutMMES['totalfat'] = $data['totalfat']- $eveningC[0]['totalfat']- $midmealC[0]['totalfat'];
          $OutMMES['totalsodium'] = $data['totalsodium']- $eveningC[0]['totalsodium']- $midmealC[0]['totalsodium'];
          $OutMMES['totaliron'] = $data['totaliron']- $eveningC[0]['totaliron']- $midmealC[0]['totaliron'];
          $OutMMES['totald_fibre'] = $data['totald_fibre']- $eveningC[0]['totald_fibre']- $midmealC[0]['totald_fibre'];

          $resp4 = $this->csm->insert_common('final_chart_1_breakdown',$OutMMES);
          // pr($resp4,'response::');

          #combination 5 :  without mid meal and evening snack and bedtime 
          $OutMMESBT = $data;
          $OutMMESBT['midmeal_no_of_chart'] = 0;
          $OutMMESBT['midmeal'] = NULL;
          $OutMMESBT['evening_no_of_chart'] = 0;
          $OutMMESBT['evening'] = NULL;
          $OutMMESBT['bedtime_no_of_chart'] = 0;
          $OutMMESBT['bedtime'] = NULL;
          $OutMMESBT['uniq_id'] =   $OutMMESBT['morning_no_of_chart'].'-'.$OutMMESBT['breakfast_no_of_chart'].'-'.$OutMMESBT['midmeal_no_of_chart'].'-'.$OutMMESBT['lunch_no_of_chart'].'-'.$OutMMESBT['evening_no_of_chart'].'-'.$OutMMESBT['dinnner_no_of_chart'].'-'.$OutMMESBT['bedtime_no_of_chart'];

          $OutMMESBT['totalcalories'] = $data['totalcalories']- $eveningC[0]['totalcalories']- $midmealC[0]['totalcalories']- $bedtimeC[0]['totalcalories'];
          $OutMMESBT['totalprotein'] = $data['totalprotein']- $eveningC[0]['totalprotein']- $midmealC[0]['totalprotein']- $bedtimeC[0]['totalprotein'];
          $OutMMESBT['totalcarbohydrates'] = $data['totalcarbohydrates']- $eveningC[0]['totalcarbohydrates']- $midmealC[0]['totalcarbohydrates']- $bedtimeC[0]['totalcarbohydrates'];
          $OutMMESBT['totalfat'] = $data['totalfat']- $eveningC[0]['totalfat']- $midmealC[0]['totalfat']- $bedtimeC[0]['totalfat'];
          $OutMMESBT['totalsodium'] = $data['totalsodium']- $eveningC[0]['totalsodium']- $midmealC[0]['totalsodium']- $bedtimeC[0]['totalsodium'];
          $OutMMESBT['totaliron'] = $data['totaliron']- $eveningC[0]['totaliron']- $midmealC[0]['totaliron']- $bedtimeC[0]['totaliron'];
          $OutMMESBT['totald_fibre'] = $data['totald_fibre']- $eveningC[0]['totald_fibre']- $midmealC[0]['totald_fibre']- $bedtimeC[0]['totald_fibre'];
          // pr($OutMMESBT ,'OutMMESBT');

          $resp5 = $this->csm->insert_common('final_chart_1_breakdown',$OutMMESBT);
          #pr($resp5,'response::');

          # now we can move this day from verfied to cal group table
          if($resp5 > $resp4 AND  $resp4 >$resp3 AND  $resp3 >$resp2 AND  $resp2 >$resp1 AND  $resp1 > $resp_lastid){
           # echo "success -$resp5 - $resp4 - $resp3 -$resp2- $resp1 -<br>";
            // shift from verified table
            $response =  $this->dayShift($totalCal,$fromtable,$fromId,$fromUniqId);
            #pr($response , 'copy and deletion data resp');
          }else{
            $response = 'Breakdown failed';
          }
          $jdata['history'][]=['verTbId'=>$fromId , 'response'=>$response,'totalCal'=>$totalCal , 'Done' => time()];
          $resp_lastid = $resp5 ; 
          #=============================================================
          $id = $id +1;
          $jdata ['id'] = $id ; // counter
          $jdata['resp_lastid'] = $resp_lastid;
     
        }else{
          end($jdata['history']); 
          $key = key($jdata['history']); 
           if(array_key_exists('verTbId', $jdata['history'][$key])){
            $jdata['history'][]=['Done' => time()];
          }
        } 

          
        pr($jdata);
        echo $this->putjson('sevenmealBreakdownCron',$jdata) == 1 ? 'json updated' : 'json updation failed';
      }

      public function dayShift($totalcal,$fromtable,$fromid,$fromUniqId) {   
        pr($fromUniqId);

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
 
         return $message ;
      }

      # check food category in food combination with food master 's food category:
      public function updateFoodCatInFc(){
        $limit = 12;

        $cpath = $this->cpath ;
        $resp = $this->getjson('updateFoodCatInFc');
        $jdata = $resp;
        $index = $resp['index'];
        if(!$index){    $index = 0;  }
         pr($index,'index');

         #temp =>         $index = 2976;
        #================================
        $table = "foodCombination_new";
        $where = "  id > $index  ";
        $query = "SELECT * FROM  $table WHERE $where ORDER BY id ASC  LIMIT $limit ";
        $resp = $this->cmm->custquery($query);
       
        foreach($resp as $i=>$data){
          pr($data);

          $fcname = $data['foodcombination_name'];
          $fcId = $data['id'];
          $itemCount = $data['food_item_no'];
          $idquan = unserialize($data['foodId_quantity']);
          $idquanCount = count($idquan);
          #=====================================================
          #pr($idquan,'id and quantity');
          if($itemCount != $idquanCount){ echo "<>Need Update $fcname <br>";  }
          #update the serialize array $idquan
            
            $q2 = "SELECT DISTINCT (foodId) , quantity FROM `foodCombination` where foodcombination_name = '$fcname';";
            echo  $q2;
            $resp2 = $this->cmm->custquery($q2);
             pr($resp2,'response from old fc'.count($resp2)); // if no data found $resp2 is still array
            

             if(count($resp2) == 0){
              $idquan2  = $idquan; // cause it is not in old fc table
             }else{
              $idquan2 = array();
              foreach($resp2 as $i=>$d):
              $idquan2 [$d['foodId']]=$d['quantity'];
              endforeach;
             }
            

            pr($idquan2);
            pr($idquan);

          # now update food category in new fc_new table
          $fcCat = 1;
          foreach($idquan2 as $id=>$quan){
            #echo " <br>id=> $id : quantity=> $quan <br>";
            #get data from food master
            $q3 = "SELECT food_category , food_name FROM `food_master` WHERE `id` = $id";
            $resp = $this->cmm->custquery0($q3);
            $fcat = $resp['food_category'];
            #pr($fcat , 'food category of fitem');

            if($fcat == 1 && $fcCat == 1){ $fcCat = 1;}
            elseif($fcat == 3 && ($fcCat == 1 || $fcCat == 3)){$fcCat = 3;}
            elseif($fcat == 2 && ($fcCat == 1 || $fcCat == 3)){$fcCat = 2;}
          }
          
          $idquan2 = serialize($idquan2);
          // pr($idquan2 , 'idquan2');
          // update fcCat  and idquan in tb
          $fdata = [
            'foodCategory'=> $fcCat,
            'foodId_quantity'=> $idquan2 ,
            'verified'=> 1,
            'updated_dt'=> $this->time 
          ];
          pr($fdata);
          $respUpdate =  $this->csm->update_common($fdata,$table,'id',$fcId);
          if($respUpdate == false){
            $err = $this->db->error();
            echo $message = 'failed to update data =>'.$err['message'];
            $jdata['history'][] = ['message' =>$message, 'fcid'=>$fcId];
          }else{
            echo $message = 'update Successfull';
            $jdata['history'][] = ['message' => $message , 'fcid'=>$fcId];
          }
        }

       

        $index = $index + $limit;
        $jdata  ['index'] = $index;
        $jdata  ['exetime'] = time();
        // pr($jdata);
        echo "<br>";
        echo  $this->putjson('updateFoodCatInFc',$jdata) == 1 ? 'json updated' : 'json updation failed';
      }


      public function updateUnitsInFCNames(){
        $limit = 13;

        $cpath = $this->cpath ;
        $resp = $this->getjson('updateUnitsInFCNames');
        $jdata = $resp;
        $index = $resp['index'];
        if(!$index){    $index = 0;  } 
        //  pr($index,'index');

         #temp =>         $index = 2976;
         #$index = 0;
        #================================
        $table = "foodCombination_new";
        $where = "  id > $index  ";
        $query = "SELECT * FROM  $table WHERE $where ORDER BY id ASC  LIMIT $limit ";
        $resp = $this->cmm->custquery($query);
        foreach($resp as $i=>$data){
          // pr($data);

          $fcname = $data['foodcombination_name'];
          $fcId = $data['id'];
 
          $idquan = unserialize($data['foodId_quantity']);
 
          #=====================================================
          // pr($idquan);
          $substring = [];
          $final_fc_name = '';
          foreach ($idquan as $id=>$quan){
            // $ids[] = $id;
            // $ids = implode(',',$ids);
            // pr($ids);
            $q3 = "SELECT fm.food_category , fm.food_name , u.name as unit FROM `food_master` as fm JOIN Units as u On fm.unit = u.id  WHERE fm.id =$id";
            $resp3 = $this->cmm->custquery0($q3);
            #pr($resp3,'food master data');

            $substring[] = $quan." (".$resp3['unit'].") ".$resp3['food_name'];

          }
          $final_fc_name =  implode("+",$substring);
          pr($final_fc_name,'name');

          // now just update the query ::
          $fdata = [
            'fc_name'=> $final_fc_name,
            'updated_dt'=> $this->time 
          ];
       
          $respUpdate =  $this->csm->update_common($fdata,$table,'id',$fcId);
          if($respUpdate == false){
            $err = $this->db->error();
            pr($err,'error');
            $message = 'failed to update data =>'.$err['message'];
            $jdata['history'][] = ['message' =>$message, 'fcid'=>$fcId];
          }else{
            echo $message = 'update Successfull';
            $jdata['history'][] = ['message' => $message , 'fcid'=>$fcId];
          }




        }
        

        #================================
        $index = $index + $limit;
        $jdata  ['index'] = $index;
        $jdata  ['exetime'] = time();
        // pr($jdata);
        echo "<br>";
        echo  $this->putjson('updateUnitsInFCNames',$jdata) == 1 ? 'json updated' : 'json updation failed';
      }

      
      # in calories wise days table , update food category and no. of chart
      # for food cxat
      public function updateFoodCatIndaystb($limit = 1){
        $cpath = $this->cpath ;
        $jdata = $this->getjson('updateFoodCatIndaystb');
      
        $tbindex = $jdata['tbindex'];
        $rowindex = $jdata['rowindex'];
        $shiftindex = $jdata['shiftindex'];
        #table
        #check which table has to be updated
        
        if(!$tbindex || $tbindex < 601 ){    $tbindex = 601;  }
        if($tbindex > 4401){  goto label; }
        if(!$rowindex){    $rowindex = 1;  }
        if(!$shiftindex){     $shiftindex = 0;      }
      

        
 
        #===============================================
         $shiftarr = [ 'morning',  'breakfast' , 'midmeal' , 'lunch', 'evening','bedtime','dinnner'];
         $chartarr=['morning_no_of_chart','breakfast_no_of_chart','midmeal_no_of_chart','lunch_no_of_chart','evening_no_of_chart','bedtime_no_of_chart','dinnner_no_of_chart'];
        #===============================================


        $tbname = get_table_name($tbindex);
        //$tbname = 'final_chart_100_199_test'; ##test
        pr($tbname , 'tablename');
 
        # get count from the table if count is 0 increase tb index 
        // $query = "SELECT * FROM $tbname ORDER BY `id` ASC LIMIT $limit";
        // $resp = $this->cmm->custquery0($query);
        // pr($resp,'Ineed count of the table '); #
        $where = "1=1";
        // $rows = $this->csm->count_common($tbname,$where);
        $maxidQ= "SELECT max(id) as 'maxid' FROM $tbname";
        $maxidresp = $this->cmm->custquery0($maxidQ);
        $rows = $maxidresp['maxid'];
        #pr($rows,'Count of the selected table');
        // $rowindex = 285;
        if($rows > 0 && $rowindex <= $rows){
           

            # one by one we pick column
            $col = $shiftarr[$shiftindex];
            $col2 =  $shiftarr[$shiftindex].'_no_of_chart';
            $message = "|";
            #pr($shiftindex.' / '.$rowindex .' / '.$tbindex,'shift  / row / tb  index ');

            # get the row data ::

            $qget = "SELECT *  FROM $tbname WHERE `id` = $rowindex ";
            $rowdata = $this->cmm->custquery0($qget);
            #pr($rowdata,'row data');

            if(!empty($rowdata)){
              $tbid = $rowdata['id'];
              echo $tbid;

              // search meal in food combination // get food category of combination // and no of chart from there and update
              $in = "'".$rowdata['morning']."','".$rowdata['breakfast']."','".$rowdata['midmeal']."','".$rowdata['lunch']."','".$rowdata['evening']."','".$rowdata['bedtime']."','".$rowdata['dinnner']."'";

              $getfcQ = "SELECT *   FROM `foodCombination_new`  WHERE `foodcombination_name` IN ($in)  ";
              $getfc = $this->cmm->custquery($getfcQ);
              // pr($getfc);
              if(count($getfc) > 0 && count($getfc) <= 7)
              {
                $dayCat = 1;
                // now make array and update day table 
                foreach($getfc as $fcdata){
                  pr($fcdata,'food combination data for row'.$tbid);
                  $fcat = $fcdata['foodCategory'];
                  if($fcat == 1 && $dayCat == 1){ $dayCat = 1;}
                  elseif($fcat == 3 && ($dayCat == 1 || $dayCat == 3)){$fcCat = 3;}
                  elseif($fcat == 2 && ($dayCat == 1 || $dayCat == 3)){$fcCat = 2;}
                }

                $fdata = ['food_cate'=> $dayCat];
                echo $tbname;

                $respUpdate =  $this->csm->update_common($fdata,$tbname,'id',$tbid);
                if($respUpdate == false){
        
                  echo $message = 'failed to update data ';
                  
                }else{
                  echo $message = 'update Successfull ';

                }

              }else{
                $message = "data from FC table not fetched or wrong ";
              }



            }else{
              $message = "$tbname Row Data Not fetched id=> $rowindex";
            }

            $err = $this->db->error();
            $jdata['history'][] = ['message' =>$message.$err['message'], 'tb'=>$tbname,'row'=>$rowindex];
            $rowindex++;
        }else{
          echo " ** execute next table **";
          // row index is greater to row count // means all rows done
          //when row count is 0 
          // that means table hass no data shift to next table
          $shiftindex = 0;
          $rowindex = 1;
          $tbindex = $tbindex +100;  
        }



        #===============================================
        $jdata['tbindex'] = $tbindex ;
        $jdata['rowindex'] = $rowindex; 
        $jdata['shiftindex'] =$shiftindex;
        $jdata['exetime'] = time();
        // pr($jdata , 'updating Jdata');
        echo  $this->putjson('updateFoodCatIndaystb',$jdata) == 1 ? 'json updated' : 'json updation failed';

        label:
      }

      #=========== update no of chart in the in days table
      public function updateNoOfChartIndaystb($limit = 1){
        // with sleep and perform same function 3 time in a minute :: adding loop of three with sleep of 2 or 3 seconds
        // now in one executio nsame function works three times 
        for ($i=1; $i <=4 ; $i++) { 
          $cpath = $this->cpath ;
          $jdata = $this->getjson('updateNoOfChartIndaystb');
        
          $tbindex = $jdata['tbindex'];
          $rowindex = $jdata['rowindex'];
          $shiftindex = $jdata['shiftindex'];
          #table
          #check which table has to be updated
          
          if(!$tbindex || $tbindex < 601 ){    $tbindex = 601;  }
          if($tbindex > 3801){  goto label; }
          if(!$rowindex){    $rowindex = 1;  }
          if(!$shiftindex ){     $shiftindex = 0;      }
        

          
  
          #===============================================
          $shiftarr = [ 'morning',  'breakfast' , 'midmeal' , 'lunch', 'evening','bedtime','dinnner'];
          $chartarr=['morning_no_of_chart','breakfast_no_of_chart','midmeal_no_of_chart','lunch_no_of_chart','evening_no_of_chart','bedtime_no_of_chart','dinnner_no_of_chart'];
          #===============================================


          $tbname = get_table_name($tbindex);
          // $tbname = 'final_chart_100_199_test'; ##test
          pr($tbname , 'tablename');
          // $tbname= "final_chart_100_199_test"; #test
          # get count from the table if count is 0 increase tb index 

          $where = "1=1";
          // $rows = $this->csm->count_common($tbname,$where);
          $maxidQ= "SELECT max(id) as 'maxid' FROM $tbname";
          $maxidresp = $this->cmm->custquery0($maxidQ);
          $rows = $maxidresp['maxid'];
          pr($rows,'Count of the selected table');

        
          if($rows > 0 && $rowindex <= $rows){
            if($shiftindex <=6){ # 0 to 6

              # one by one we pick column
              $col = $shiftarr[$shiftindex];
              $col2 =  $shiftarr[$shiftindex].'_no_of_chart';
              $message = "|";
              pr($shiftindex.' / '.$rowindex .' / '.$tbindex,'shift  / row / tb  index ');

              # get the row data ::

              $qget = "SELECT $col , id ,$col2  FROM $tbname WHERE `id` = $rowindex ";
              $getcol = $this->cmm->custquery0($qget);
              pr($getcol,'row data');

              if(!empty($getcol[$col])){
                $tbid = $getcol['id'];
                $fc= $getcol[$col];
                $onoc= $getcol[$col2];
                echo "here";

                    // search meal in food combination // get food category of combination // and no of chart from there and update
                  $q2search = "SELECT *   FROM `foodCombination_new`  WHERE `foodcombination_name` = '$fc' ";
                  $getfc = $this->cmm->custquery($q2search);
                  pr($getfc,'food combination data '.$tbid);

                  if(count($getfc) > 1 || count($getfc) < 0 ){
                    $message = 'Error :'.count($getfc)." entry found in foodcomb-new table";
                  }else{
                    $getfc = $getfc[0];
                    // Now update data into meal day table
                    $noofchart = $getfc['no_of_chart'];
              
                    $fdata = [$col2=> $noofchart];
                      echo $tbname;
                      pr($fdata);
                    $respUpdate =  $this->csm->update_common($fdata,$tbname,'id',$tbid);
                    if($respUpdate == false){

                      echo $message = 'failed to update data ';
                      
                    }else{
                      echo $message = 'Update Successfull ';
                    }

                  }


              }else{
                $message = "$tbname Row shift Empty  id=> $rowindex";
              }

              $err = $this->db->error();
              $mdata['message'] = $message.$err['message'];
              $mdata['tb']=$tbname;
              $mdata['row']=$rowindex;
              $mdata['shift']=$col;
              $mdata['old_noofchart']=$onoc;
              $mdata['newnoc']=$noofchart; 

          
              $jdata['history'][] = $mdata;
                #increment according to shift index::
              if($shiftindex == 6){
                echo " ** 6 **execute next row **";
                $shiftindex = 0;
                $rowindex++;
                
              }else{
                $shiftindex++;
              }
            }else{
              echo " ** execute next row **";
                $shiftindex = 0;
                $rowindex++;
            }



          }else{
            echo " ** execute next table **";
            // row index is greater to row count // means all rows done
            //when row count is 0 
            // that means table hass no data shift to next table
            $shiftindex = 0;
            $rowindex = 1;
            $tbindex = $tbindex +100;  
          }



          #===============================================
          $jdata['tbindex'] = $tbindex ;
          $jdata['rowindex'] = $rowindex; 
          $jdata['shiftindex'] =$shiftindex;
          $jdata['exetime'] = time();
          // pr($jdata , 'updating Jdata');
          echo  $this->putjson('updateNoOfChartIndaystb',$jdata) == 1 ? 'json updated' : 'json updation failed';
          sleep(2);
        }
        label: 
      }

      public function updateNoOfChartIndaystbBK($limit = 1){
        $cpath = $this->cpath ;
        $jdata = $this->getjson('updateNoOfChartIndaystb');
      
        $tbindex = $jdata['tbindex'];
        $rowindex = $jdata['rowindex'];
        $shiftindex = $jdata['shiftindex'];
        #table
        #check which table has to be updated
        
        if(!$tbindex || $tbindex < 601 ){    $tbindex = 601;  }
        if(!$rowindex){    $rowindex = 1;  }
        if(!$shiftindex ){     $shiftindex = 0;      }
      

        
 
        #===============================================
         $shiftarr = [ 'morning',  'breakfast' , 'midmeal' , 'lunch', 'evening','bedtime','dinnner'];
         $chartarr=['morning_no_of_chart','breakfast_no_of_chart','midmeal_no_of_chart','lunch_no_of_chart','evening_no_of_chart','bedtime_no_of_chart','dinnner_no_of_chart'];
        #===============================================


        $tbname = get_table_name($tbindex);
        // $tbname = 'final_chart_100_199_test'; ##test
        pr($tbname , 'tablename');
        // $tbname= "final_chart_100_199_test"; #test
        # get count from the table if count is 0 increase tb index 

        $where = "1=1";
        // $rows = $this->csm->count_common($tbname,$where);
        $maxidQ= "SELECT max(id) as 'maxid' FROM $tbname";
        $maxidresp = $this->cmm->custquery0($maxidQ);
        $rows = $maxidresp['maxid'];
        pr($rows,'Count of the selected table');

      
        if($rows > 0 && $rowindex <= $rows){
          if($shiftindex <=6){ # 0 to 6

            # one by one we pick column
            $col = $shiftarr[$shiftindex];
            $col2 =  $shiftarr[$shiftindex].'_no_of_chart';
            $message = "|";
            pr($shiftindex.' / '.$rowindex .' / '.$tbindex,'shift  / row / tb  index ');

            # get the row data ::

            $qget = "SELECT $col , id ,$col2  FROM $tbname WHERE `id` = $rowindex ";
            $getcol = $this->cmm->custquery0($qget);
            pr($getcol,'row data');

            if(!empty($getcol[$col])){
              $tbid = $getcol['id'];
              $fc= $getcol[$col];
              $onoc= $getcol[$col2];
               echo "here";

                  // search meal in food combination // get food category of combination // and no of chart from there and update
                $q2search = "SELECT *   FROM `foodCombination_new`  WHERE `foodcombination_name` = '$fc' ";
                $getfc = $this->cmm->custquery($q2search);
                pr($getfc,'food combination data '.$tbid);

                if(count($getfc) > 1 || count($getfc) < 0 ){
                  $message = 'Error :'.count($getfc)." entry found in foodcomb-new table";
                }else{
                  $getfc = $getfc[0];
                  // Now update data into meal day table
                  $noofchart = $getfc['no_of_chart'];
             
                  $fdata = [$col2=> $noofchart];
                    echo $tbname;
                    pr($fdata);
                  $respUpdate =  $this->csm->update_common($fdata,$tbname,'id',$tbid);
                  if($respUpdate == false){

                    echo $message = 'failed to update data ';
                    
                  }else{
                    echo $message = 'Update Successfull ';
                  }

                }


            }else{
              $message = "$tbname Row shift Empty  id=> $rowindex";
            }

            $err = $this->db->error();
            $mdata['message'] = $message.$err['message'];
            $mdata['tb']=$tbname;
            $mdata['row']=$rowindex;
            $mdata['shift']=$col;
            $mdata['old_noofchart']=$onoc;
            $mdata['newnoc']=$noofchart; 

        
            $jdata['history'][] = $mdata;
              #increment according to shift index::
            if($shiftindex == 6){
              echo " ** 6 **execute next row **";
              $shiftindex = 0;
              $rowindex++;
              
            }else{
              $shiftindex++;
            }
          }else{
            echo " ** execute next row **";
              $shiftindex = 0;
              $rowindex++;
          }



        }else{
          echo " ** execute next table **";
          // row index is greater to row count // means all rows done
          //when row count is 0 
          // that means table hass no data shift to next table
          $shiftindex = 0;
          $rowindex = 1;
          $tbindex = $tbindex +100;  
        }



        #===============================================
        $jdata['tbindex'] = $tbindex ;
        $jdata['rowindex'] = $rowindex; 
        $jdata['shiftindex'] =$shiftindex;
        $jdata['exetime'] = time();
        // pr($jdata , 'updating Jdata');
        echo  $this->putjson('updateNoOfChartIndaystb',$jdata) == 1 ? 'json updated' : 'json updation failed';
      }

 
}