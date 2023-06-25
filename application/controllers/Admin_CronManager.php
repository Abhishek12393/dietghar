<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin_CronManager extends CI_Controller {
 
        /**
         * load list modal, library and helpers
         */
         function __Construct(){
           parent::__Construct();
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
        # all cron links ::
        pr(range(0, 12),'check success');
      }

 
      public function allCronView(){
            $data = [];
            $this->load->view('Admin/cron_manager/allCronView.php',$data);
      }

      public function ViewVerifiedtabledata(){
 
        $query = "SELECT * FROM final_chart_1_verified ORDER BY id DESC ";
 
          $resp = $this->cmm->custquery($query);
          if(!empty($resp)):
            foreach($resp as $index=>$data){
              #pr($data,$index);
            }
            $data = ['data'=>$resp];
            $this->load->view('Admin/cron_manager/Verifiedtableview.php',$data);
          else:
            echo "NO data present in the table<br>";
            echo '<a href="'.base_url().'cron_ci/log/sevenmealBreakdownCron">Breakdown Cron View</a>';
          endif;

      }

      
      public function ViewBreakdowndata(){
 
        $query = "SELECT * FROM final_chart_1_breakdown ORDER BY id DESC ";

        $resp = $this->cmm->custquery($query);
        if(!empty($resp)):
 
        $data = ['data'=>$resp];
        $this->load->view('Admin/cron_manager/breakdowntableview.php',$data);
      else:
        echo "NO data present in the table<br>";
        echo '<a href="'.base_url().'cron_ci/log/sevenmealBreakdownCron">Breakdown Cron View</a>';
      endif;

    }

    public function viewAlltabledata(){
      // echo $this->input->post('mydata');
      
 
        
      if( $this->input->post('table') && $this->input->post('table') ){
        $tableid =  $this->input->post('table');
        $qtype =  $this->input->post('qtype');
        $_SESSION['viewtable_id'] = $tableid;
        $_SESSION['viewtable_qtype'] = $qtype;
      }else{
        $tableid = $_SESSION['viewtable_id'];
        $qtype = $_SESSION['viewtable_qtype'];
      }

      if($tableid && $qtype){
        #pr($_POST);
        $table = get_table_name($tableid);

        if($qtype == 'btn_total') : $where = "";
        elseif($qtype == 'btn_sevenmeals'):$where = "WHERE morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0  ";

        elseif($qtype == 'btn_outmm'):$where = "WHERE morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart = 0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0 ";

        elseif($qtype == 'btn_outbt'):$where = "WHERE morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart =0  ";

        elseif($qtype == 'btn_outmmes'):$where = "WHERE morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart =0 AND lunch_no_of_chart !=0 AND evening_no_of_chart =0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0  ";

        elseif($qtype == 'btn_outmmesbt'):$where = "WHERE morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart =0 AND lunch_no_of_chart !=0 AND evening_no_of_chart =0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart =0  ";

        elseif($qtype == 'btn_outes'):$where = "WHERE morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart =0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0 ";

        elseif($qtype == 'btn_outmormmesbt'):$where = "WHERE morning_no_of_chart =0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart =0 AND lunch_no_of_chart !=0 AND evening_no_of_chart =0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart =0  ";
        
        elseif($qtype == 'btn_outbf'):$where = "WHERE morning_no_of_chart !=0 AND breakfast_no_of_chart =0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0 ";

        elseif($qtype == 'btn_outbfes'):$where = "WHERE morning_no_of_chart !=0 AND breakfast_no_of_chart =0 AND midmeal_no_of_chart !=0 AND lunch_no_of_chart !=0 AND evening_no_of_chart =0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart !=0 ";

        elseif($qtype == 'btn_outmmbt'):$where = "WHERE morning_no_of_chart !=0 AND breakfast_no_of_chart !=0 AND midmeal_no_of_chart =0 AND lunch_no_of_chart !=0 AND evening_no_of_chart !=0 AND dinnner_no_of_chart !=0 AND bedtime_no_of_chart =0 ";
        endif;

        $query = "SELECT * FROM $table $where ORDER BY id DESC ";
        // echo $query;
        $resp = $this->cmm->custquery($query);
        if(!empty($resp)):
          $data = ['data'=>$resp,'table'=> $table, 'count'=> count($resp)];
          $this->load->view('Admin/cron_manager/tableview.php',$data);
        else:
          echo "No data present in the table<br>";
        endif;
      }
    }


    public function viewcron(){
      
      if(isset($_GET['name'])){
       $name = $_GET['name'];
       $cpath = $this->cpath ;
        $resp = $this->getjson($name);
        $resp = array_reverse($resp,true);
        pr($resp , 'Cron Data');
      }else{
        echo " No cron selected";
      }

    }

 


    public function getjson($name = ''){
      $jsonString = file_get_contents($this->cpath.$name.'.json');
      $data = json_decode($jsonString, true);
      return $data;
    }





 


}