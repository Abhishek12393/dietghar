<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class DBManager2 extends CI_Controller {
 
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
      $this->cpathdbm = 'cron_ci/log/dbm/';
      $this->time_start = microtime(true);
      $this->time =  Date('Y-m-d h:i:s');
      #echo "<style>body{color: white; background: black;font-family: Lato; font-style: normal; font-variant: normal;line-height: 15px; }</style>";
  }

      #case 2  : 
    // update food combination in any case of mismatch :: 
    public function updateByFoodCombination($tbindex = 601){
    
      // pr($cron , 'jdata');
      for ($loop =0; $loop < 1 ; $loop++) { 
        $jdata = $this->getjson('updateByFoodCombination_correction');
        // ====================================
        $limit = 1;
        $iserror = 0;
        $fmessage = ""; #finalmessage
        $offset = $jdata['offset'];
        # ====offset
        if(!$offset){ $offset = 0; }
        if(!empty($jdata['tbindex']  )){ $tbindex = $jdata['tbindex'];}
        if($tbindex > 3501){ echo "End"; exit; }
        #== tb index
        $tbname = get_table_name($tbindex);
        // $tbname = "`final_chart_1400_1500`";
        //$tbname = "`final_chart_remaining`";  // pr($tbname,"table working on $tbindex:");
        #queries::
        $query =  "SELECT  * FROM $tbname  Where `admin_verify` = 1  LIMIT $limit  OFFSET $offset";
        $resp = $this->cmm->custquery($query)[0];
        //pr($resp , 'dayshift table data ===='.$query);
  
        if(empty($resp)){ 
          $fcid = '';
          $fmessage = "No row found-change table";
          $message ="";
          $tbindex = $tbindex + 100;
          $jdata['offset'] = 0;
          
        }else{
          $fcid = $resp['id'];
          $days = $this->getdays();
          foreach( $days as $index=>$day){
            //echo "<br>::::::::".$day.":::::<br>";
            $fc_shift = $resp[$day];
            $noofchart =  $resp[$day.'_no_of_chart'];
            $message = "";
  
            if($noofchart == 0 ){
              if($fc_shift != '' || !empty($fc_shift)) { $error = 10 ; }  #no of chart 0 but shift is not emty has some data
                $message .= "Day zero. Error $error ";
            }else{
              $getfccomb =  "SELECT  * FROM `foodCombination_new` where  no_of_chart = $noofchart ";
              $getfccombr  = $this->cmm->custquery($getfccomb)[0]; 
             
              $orig_fc =$getfccombr['foodcombination_name'];
              $orig_fc_unit =$getfccombr['fc_name'];
  
              if($fc_shift == $orig_fc || $fc_shift == $orig_fc_unit){
                // echo $fc_shift." <== "; 
                 $message .= "fc string MATCHED"; 
                // echo "<br>";
              }else{
                  // $temparr['fc name'] = $orig_fc;                  // $temparr['fc name unit'] = $orig_fc_unit;                  // pr($temparr, 'fc name');
                  $message .= "fcString NOT MATCHED ";                  //echo "== ><br>";
       
                  //when there is mismatch we note it and update with the fc by noofchart
                  $uquery1 =  "UPDATE $tbname SET $day = '".$orig_fc_unit."'  WHERE id = $fcid ";
                  // pr($uquery1);
                  $uresp1 = $this->cmm->custquery($uquery1);
                  if($uresp1 == 1){
                    $message .= "|Updated $fcid|";
                  }else{
                    $message .= "|Update query 1 Error(newstring)|" ;
                    $error = 11;
                  }
              } # initial matching of string 

            } #no of chart not zero
            $shiftmessage[$day][] = $message;
            $case = json_encode($shiftmessage);
          } # end of foreach for days
    
          $jdata['offset'] = $offset + $limit; #no need to change this
        } #resp has data :: 
        #update json ::
          #pr($fmessage ,  'final message' );
        $fresp = [ 'rowid' => $fcid,
          'final message' => $fmessage,
          'shift message' => $shiftmessage
        ];
        $jdata[$tbname][] = $fresp;
        $jdata['tbindex'] = $tbindex;
        $jdata['rowindex'] = $fcid;
        // pr($jdata , 'updated json');
        $this->putjson('updateByFoodCombination_correction',$jdata) == 1 ? 'json updated' : 'json updation failed';
  
      } // for loop ends
      echo "DONE"; #script executed :: for ajax reponse;
    }

    
    # 17-12-2022
    // now check which atcheckis 0 and why 
    #case 1 : 
    // remove missing quantity from the string and update as it is
  public function remove_missing_quantiy($tbindex = 601){
    
    // pr($cron , 'jdata');
    for ($loop =0; $loop < 1 ; $loop++) { 
      $jdata = $this->getjson('remove_missing_quantiy');
      // ====================================
      $limit = 1;
      $iserror = 0;
      $fmessage = ""; #finalmessage
      $offset = $jdata['offset'];
      # ====offset
      if(!$offset){ $offset = 0; }
      if(!empty($jdata['tbindex']  )){ $tbindex = $jdata['tbindex'];}
      if($tbindex >= 3200){ echo "End";exit; }
      #== tb index
      $tbname = get_table_name($tbindex);
      
      // $tbname = "`final_chart_1400_1500_test`";
      $tbname = "`final_chart_remaining`";  // pr($tbname,"table working on $tbindex:");

      #queries::
      $query =  "SELECT  * FROM $tbname  Where `admin_verify` = 1  LIMIT $limit  OFFSET $offset";
      $resp = $this->cmm->custquery($query)[0];
      //pr($resp , 'dayshift table data ===='.$query);

      if(empty($resp)){ 
        $fcid = '';
        $fmessage = "No row found-change table";
        $message ="";
        $tbindex = $tbindex + 100;
        $jdata['offset'] = 0;
        
      }else{
        $fcid = $resp['id'];
        $days = $this->getdays();
        foreach( $days as $index=>$day){
          //echo "<br>::::::::".$day.":::::<br>";
          $fc_shift = $resp[$day];
          $noofchart =  $resp[$day.'_no_of_chart'];
          $message = "";

          if($noofchart == 0 ){
            if($fc_shift != '' || !empty($fc_shift)) { $error = 10 ; }  #no of chart 0 but shift is not emty has some data
              $message .= "Day zero. Error $error ";
          }else{
            $getfccomb =  "SELECT  * FROM `foodCombination_new` where  no_of_chart = $noofchart ";
            $getfccombr  = $this->cmm->custquery($getfccomb)[0]; 
           
            $orig_fc =$getfccombr['foodcombination_name'];
            $orig_fc_unit =$getfccombr['fc_name'];

            if($fc_shift == $orig_fc || $fc_shift == $orig_fc_unit){
              // echo $fc_shift." <== "; 
               $message .= "fc string MATCHED"; 
              // echo "<br>";
            }else{
                // $temparr['fc name'] = $orig_fc;
                // $temparr['fc name unit'] = $orig_fc_unit;
                // pr($temparr, 'fc name');
                $message .= "fcString NOT MATCHED ";
                //echo "== ><br>";
                $fimatch = 1;  #fooditem match flag
                $exp_shiftdatas =  explode("+", $fc_shift);
                // pr(exp_shiftdatas ,'Exploding data of dayshift table ');

                foreach($exp_shiftdatas as $i=>$exp_hiftdata){
                  if (preg_match('~[0-9]+~', $exp_hiftdata)) {
                      // echo 'string with numbers <br>';
                    }else{
                      $fimatch = 0;
                      #'|*string with NO numbers .Quantity missing.|';
                      unset($exp_shiftdatas[$i]);
                  }
                } #ends foreach

                if($fimatch == 0){
                  $message .= '( QuantityMissing ).';
                  #implode new array 
                  $new_fc_shift =  implode("+", $exp_shiftdatas);
                  // echo "$day New fc string : "; pr($new_fc_shift);
                  #again check if new string matched or not 
                  if($new_fc_shift == $orig_fc || $new_fc_shift == $orig_fc_unit){
                    // echo $new_fc_shift." <== "; 
                    $message .="New string MATCHED";
                    // echo "<br>";
                    //when new string is matched with the combination 
                    $uquery1 =  "UPDATE $tbname SET $day = '".$new_fc_shift."'  WHERE id = $fcid ";
                    // pr($uquery1);
                    $uresp1 = $this->cmm->custquery($uquery1);
                    if($uresp1 == 1){
                      $message .= "|Updated";
                    }else{
                      $message .= "|Update query 1 Error(newstring)|" ;
                      $error = 11;
                    }

                  }else{
                    // echo $new_fc_shift." <== "; 
                     $message .= "New string STILL NOT MATCHED";
                    // echo "<br>";
                    $error = 12;
                  } 
                  # Now update new string and if not matched set flag false 

                }else{
                  // this case when there is another error of mismatched #like glass != Glass or Glass is replaced by Bowl
                  # or no. of chart giving another food comb. .
                  $error = 13;
                   $message = "Another case of Mismatched"; 
                  // echo "<br>";
                }
                
            } # initial matching of string 

          } #no of chart not zero

          $shiftmessage[$day][] = $message;
          $case = json_encode($shiftmessage);
        } # end of foreach for days

        // pr($error , 'error code');
        #update here if all ok  error = 0 
        if($error ==  0 ){
          #update shift data/ same day from combination and mark atcheck = 1;
          $uquery2 =  "UPDATE $tbname SET atcheck = 1  WHERE id= $fcid";
          // pr($uquery2 ,'update query final');
          $respu = $this->cmm->custquery($uquery2);
          if($respu == 1){
              $fmessage = "Success. All OK.";
          }else{
              $fmessage =  "update query 2 Error.";
          }

        }else{
          $fmessage =  "Not updated. Error code : $error";
          // $uquery2 =  "UPDATE $tbname SET atcheck = 0 , atcheck_case = '$case' WHERE id= $fcid";
        }
        

        $jdata['offset'] = $offset + $limit; #no need to change this

      } #resp has data :: 
      
      
      #update json ::
        #pr($fmessage ,  'final message' );
      $fresp = [ 'rowid' => $fcid,
        'final message' => $fmessage,
        'shift message' => $shiftmessage
      ];
      $jdata[$tbname][] = $fresp;
      $jdata['tbindex'] = $tbindex;
      $jdata['rowindex'] = $fcid;
      // pr($jdata , 'updated json');
      $this->putjson('remove_missing_quantiy',$jdata) == 1 ? 'json updated' : 'json updation failed';

    } // for loop ends
    echo "DONE"; #script executed :: for ajax reponse;
  }
  
  // for correction null data in datbase 
  public function markok_fctable_atcheck($tbindex = 601){
    #loop 
    for ($i=0; $i < 2; $i++) { 
       
      
      $jdata = $this->getjson('markok_fctable_atcheck');
      // ====================================
      $error = 0;
      $limit = 1 ;
      $finalmessage = 'ok' ;
      $offset = $jdata['offset'];
      if(!$offset){ $offset = 0; }
      if(!empty($jdata['tbindex']  )){ $tbindex = $jdata['tbindex'];}
      if($tbindex >= 3200){ echo "End";exit; }
      # ====================================
        // pr($cron , 'jdata');
      $tbname = get_table_name($tbindex);
      $tbname = "`final_chart_remaining`";
      // $tbname = "`final_chart_1400_1500_test`"; 
        // pr($tbname,"table working on $tbindex:");
      $query =  "SELECT  * FROM $tbname Where 1=1 LIMIT $limit OFFSET $offset ";
      $resp = $this->cmm->custquery($query)[0];
        // pr($resp , 'final fc resp');
      if(empty($resp)){ 
        $fcid = '';
        $finalmessage = "No row found  change table";
        $tbindex = $tbindex + 100;
        $jdata['offset'] = 0;
      }else{
        $fcid = $resp['id']; //  id of fc calwise table
          // pr($fcid , 'row id');
        $days = $this->getdays();  // pr($days);
        $shiftmessage =[];
        foreach( $days as $index=>$day){
          $message2 = "";
          $match = 0;
          $noofchart =  $resp[$day.'_no_of_chart'];
          $fcname = $resp[$day];
          if($noofchart == 0 ){ 
            #in case when chartno is 0 , no item for shift
            $message2 .= "0 => Chart No.zero";
            if($fcname != '' || !empty($fcname)) { $error = 11 ; }
            goto jumpa; 
          }
          $getfccomb =  "SELECT  * FROM `foodCombination_new` where  no_of_chart = $noofchart ";
          $getfccombr  = $this->cmm->custquery($getfccomb);
          $count =  count( $getfccombr);
            #FC = food combination
          if($count == 0){  $error = 1; $message2 .= "FC not found"; }elseif($count > 1){  $error = 1; $message2 .= "FC multiple found"; }else{
            // pr($getfccombr[0]);
            $fccombrres= $getfccombr[0] ;
            if($fccombrres['foodcombination_name'] == $fcname  ){
              $message2 .= "Match without unit";
            }elseif($fccombrres['fc_name'] == $fcname){
              $message2 .= " Match with unit ";
            }else{
              $message2 .= "Not OK ";
              $error = 1;
              $match = 1;
            }
    
            if($match == 0){
              // update shift data :: when no of chart is ok and matched with shift combination
              $queryupdate =  "UPDATE $tbname SET $day = '".$fccombrres['fc_name']."'  WHERE id = $fcid ";
              $respu = $this->cmm->custquery($queryupdate);
              if($respu == 1){
                $message2 .= "| Updated";
              }else{
                $message2 .= "| Not updated" ;
                $error = 1;
              }
            }
          
          }
          jumpa:
          $shiftmessage[$day][] = $message2;
        } 
        // pr($error,'error final 0 => success');
  
          if($error == 0){
            
            // update shift data from combination and mark atcheck = 1;
              $query2 =  "UPDATE $tbname SET atcheck = 1 WHERE id= $fcid";
              $respu = $this->cmm->custquery($query2);
              if($respu == 1){
                 $finalmessage = " Error => 0 . Success ";
              }else{
                 $finalmessage =  "There is some update error";
              }
          }else{
             $finalmessage =  "Not updated - error $error";
          }
      
          $jdata['offset'] = $offset + $limit;
      }
      // pr($fcid , 'row id ');

      $fresp = [ 'rowid' => $fcid,
        'final message' => $finalmessage,
        'shift message' => $shiftmessage
      ];

      $jdata[$tbname][] = $fresp;
      $jdata['tbindex'] = $tbindex;
      $jdata['rowindex'] = $tbindex;
      // pr($jdata);
       $this->putjson('markok_fctable_atcheck',$jdata) == 1 ? 'json updated' : 'json updation failed';

    }
    echo "DONE";
  }

   # bottom to top approach so that lastest function will be on top 

  // for adding column :: 15-12-2022
  public function addcol($tbindex =2801){
    $tbname = get_table_name($tbindex);
    $query = "ALTER TABLE `$tbname` ADD `atcheck` INT(1) NOT NULL DEFAULT '0' COMMENT '0 not check , 1 ok' AFTER `id`;";
    $respu = $this->cmm->custquery($query);
    pr($query);
    pr($respu);
      if($respu == 1){
        $next = $tbindex - 100;
        echo "<a href = 'https://dietghar.com/diet/DBManager/addcol/$next' > Add column in Next table </a>";

      }else{
        echo "Not updated ";
        $error = 1;
      }

  }

  
  // helper 
  public function viewjson($name = '', $showjson = 0){
    echo $name;
    $jdata = $this->getjson($name);
    pr($jdata['tbindex'] , 'Current table');
    pr($jdata['rowindex'] , 'Current fc id');
    pr($jdata['offset'] , 'offset');
    if($showjson == 1){ pr($jdata);}
    $jdata = null;
  }
  // mandatory helpers 
  public function index(){
    // code check
      pr(range(0, 12),'check success');
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
    $jsonString = file_get_contents($this->cpathdbm.$name.'.json');
    $data = json_decode($jsonString, true);
    return $data;
  }
  // to put json into file data 
  public function putjson($name , $data){
    $newJsonString = json_encode($data);
    if(file_put_contents($this->cpathdbm .$name.'.json' , $newJsonString)){
      return 1;
    }
  }
 
}