<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Test extends CI_Controller {
 
  /**
   * load list modal, library and helpers
   */
  function __Construct(){
    parent::__Construct();
    $this->load->helper(array('form', 'url'));
    $this->load->model('Custommodel','csm');
    $this->load->model('Common_model','cmm');
    $this->load->model('Dietmodel');
    // $this->load->library('asynclibrary');
  }
  
  /**
   *  @desc : Function to perform multiple task in background
   *  @param :void
   *  @return : void
   */

   


	public function foodchart_new_test(){
		// add token authentication here :: 
		pr($_POST); // here
		if($_POST['plan_type']==1){
			$limit = 15;
      $copyday = [0,5,10]; // copy day  divide 30/15 days to make same shift data
		}else{
      $limit = 30; // 30
      $copyday = [0,7,14,21];// copy day  divide 30/15 days to make same shift data
		}
    // $limit =  5;
    // $copyday = [0];

		if($_POST['renewchart']==1){
			// renew process
			$data['renewchart'] = 1;
		}
		$table =	get_table_name($_POST['final_bmr']);
		// prd($limit);
		$foo_pre = $this->csm->Select_common_where('customer_lifestyle','user_id',$_POST['id']);
		$food_type = $foo_pre[0]['food_prefrence'];
		# if food prefrence is 2 he can eat veg and eggitarian food 
		# fixing food type
		// $food_type = 1; // chnage later
		$data['food_cate'] = $food_type;
		// prd($foo_pre);
		$placement_arr = $_POST['Placement'];
		// prd($placement_arr);
		// $limit = 15;
		$message1=$this->Dietmodel->prepare_approved_chart_upgrade3($table,$food_type,$placement_arr, $limit);
    // 5-5  7-7 day same data in same shift ::
      $morning1 = '';
      $morning2 = [];
    if(isset($_POST['entersameshift']) && $_POST['entersameshift'] == 3){
      for ($i=0; $i < $limit ; $i++) { 
        if (in_array($i, $copyday)) {
          // echo "Match found";
          $morning1 =  $message1[$i]['morning'];
          $morning2 =  $message1[$i]['morning_data'];
          
          // pr($morning1);
          // pr($morning2);
        }else{
          $message1[$i]['morning'] =  $morning1;
          $message1[$i]['morning_data'] =  $morning2 ;
          // echo $i; echo "<br>";
        }
      }
    }elseif(isset($_POST['entersameshift']) && $_POST['entersameshift'] == 2){
      // pr('Blank Shift Chart');
      for ($i=0; $i < $limit ; $i++) { 
        $message1[$i]['morning'] =  '';
        $message1[$i]['morning_data'] =  [] ;
      }
    }else{
      // pr('Normal Chart');
    }


    $data['message'] = $message1;
    $data['copydays'] = $copyday;
		$data['limit'] = $limit;
		$data['all_food']=$this->Dietmodel->all_food();
		$data['cust_id']=$_POST['id'];
		$data['plan'] = $_POST['plan'];
		$data['dbtable'] = $table;
		#prd($data['all_food'], 'message data');
		 //prd('---------------- final data for chart page ----------------');
		//  prd($data);    
		$this->load->view('Admin/foodchart/foodchart_new_test.php',$data);
	 
	}
 
   



  public function updatetablesbyquery_(){
    if($_GET['cal'] && $_GET['cal'] != '') {  
        $cal = $_GET['cal'];
        // $_SESSION = $cal;
        $intotable = get_table_name($cal);
        echo $intotable;
        
        $query1 = "UPDATE $intotable SET `admin_verify`='0';";
        $query2 = "UPDATE $intotable SET `admin_verify`='1' Where d_time > '2022-07-10';";
       
        $resp = $this->cmm->custqueryiud($query2);
        pr($resp , 'response query 2');

        $cal = $cal +100;
        ?><a href="https://dietghar.com/diet/Test/updatetables?cal=<?=$cal;?>">Next Link <?=$cal;?></a><?php
      }


  }
  

  public function index(){
    // code check
      pr(range(0, 12));

      $arr = range(0, 12);
      $arr = array('id1'=>12345);
      $arr = array('id1'=>12345 , 'id21'=>123456);
      pr(serialize($arr));

  }

  public function testcron(){
    if($_GET['c'] == 'd')
    {
      $add = 10;
    }else{
      $add = 0;
    }
    // echo $add;
      $jsonString = file_get_contents('../jsonFile.json');
      $data = json_decode($jsonString, true);
      
      if($data){
        $val = $data['val'];
      }else{
        $val = 0;
      }
      $data= array('val'=>$val+1+$add);
      print_r($data);
      $newJsonString = json_encode($data);
      file_put_contents('../jsonFile.json', $newJsonString);
  }
 

  // for updating fc making correction in the data
  function updatefc_zeroquan_(){
    $getfcQ = "SELECT *   FROM `foodCombination_new`  where fcidquan LIKE '%(+%' ";
    $getfc = $this->cmm->custquery($getfcQ);
    // pr($getfc);
    $fcidquan = array();
    $i=1;
    foreach($getfc as $fci){
      // per combination
        // pr($fci,'item'); echo "<br>";
        $idquan =  $fci['foodId_quantity'];
        $food_item_no =  $fci['food_item_no'];
        $fc_name =  $fci['fc_name'];
        $fcid =  $fci['id'];
        
        $idarray = unserialize($idquan);
        $fc_namearr = explode("+" , $fc_name);

        pr($fc_namearr, 'fcid-'.$fcid);
        foreach($idarray as $id=>$quan){
          if($quan == NULL || $quan =='' ||$quan == 0 ){
            // echo "Null <br>";
            unset($idarray[$id]);
            // unset($fc_namearr[$id]);
          }else{
            $fcidquan[] = "(".$quan."+".$id.")";
          }
        }

      
        // pr($fc_namearr , 'new name ' .$i);
        pr($fcidquan , 'search combination ' .$i);

        // $fcidquan[] = "($quan+".$foodArray[$key]['foodId'].")";
      	$fcresp2 = $this->Dietmodel->search_fc_in_fcnew('foodCombination_new',$fcidquan);
       
        if(!empty($fcresp2)){
             pr($fcresp2[0],'chart resp duplicate entry');
        //     $fiid = $fcresp2[0]['id'];
        //     pr($fiid,'id matched');
        //     // delete this from food combination _new 
        //     //echo " | $i =>".$fcid; echo "<br>";
            $delresp = $this->csm->delete_common_r('id',$fcid,'foodCombination_new');
            pr($delresp);
         }else{
          
          pr($idarray, 'empty | update |to fetch array');

          $calories = 0;
          $carbohydrates = 0;
          $fat = 0;
          $sodium = 0;
          $iron = 0;
          $fibre = 0;
          $protein = 0;
          $combinationfoodname = '';
          $fc_name_u = '';
          foreach($idarray as $ufid=>$uquan){
            echo "$ufid $uquan";echo "<br>";
            $fooddata = $this->csm->Select_common_where('food_master','id',$ufid);
            pr($fooddata,'food item');
            $unitdata = $this->csm->Select_common_where('Units','id',$fooddata[0]['unit']);
            $funit = $unitdata[0]['name'];
       
            $calories += $uquan * $fooddata[0]['calories'];
            $carbohydrates += $uquan * $fooddata[0]['carbohydrates'];
            $fat += $uquan * $fooddata[0]['fat'];
            $sodium +=$uquan * $fooddata[0]['sodium'];
            $iron += $uquan * $fooddata[0]['iron'];
            $fibre += $uquan * $fooddata[0]['d_fibre'];
            $protein += $uquan * $fooddata[0]['protein'];
            $foodName = $fooddata[0]['food_name']; // get food name from db
            $combinationfoodname .= "+".$uquan." ". $foodName;
            $fc_name_u .= "+".$uquan." (".$funit.") ". $foodName;
            
            
          }	 
          $combinationfoodname = ltrim ($combinationfoodname,'+');
		      $fc_name_u = ltrim ($fc_name_u,'+');
          $totalval = array(
           
              'foodcombination_name' =>$combinationfoodname,
              'fc_name' =>$fc_name_u,
              'foodId_quantity'=> serialize($idarray), 
              'fcidquan' => implode('', $fcidquan),
              'food_item_no' =>  count($idarray),
            'totalprotein' => $protein,
             'totalcalories'  => $calories,
             'totalcarbohydrates'  => $carbohydrates,
             'totalfat'  => $fat,
             'totalsodium'  => $sodium,
             'totaliron'  => $iron,
             'totald_fibre'  => $fibre,
            
             );
    
            pr($totalval,'final val '.$fcid) ;

            $updtresp = $this->csm->update_common($totalval,'foodCombination_new','id',$fcid);
            pr($updtresp);
         }

        $i++;
        echo "<br>----------------------<br>";
        echo "END------------------------<br>";

        $fcidquan = array();
    }


     


  }
  public function update_foodcomb_foodid(){
    $getfcQ = "SELECT *   FROM `foodCombination_new`  ";
    $getfc = $this->cmm->custquery($getfcQ);
    // pr($getfc);
    
    foreach($getfc as $fcitem){
      $idquan =  $fcitem['foodId_quantity'];
      $idarray = unserialize($idquan);
      

        foreach($idarray as $id=>$quan){
           $sqlcheck = "SELECT * FROM `food_master` where id = $id ";
           $respcheck = $this->cmm->custquery($sqlcheck);
          //  pr($respcheck); echo "<br>";
           if(empty($respcheck)){
             echo "empty $id => ".$fcitem['id'];
             pr($fcitem['fcidquan']);echo "<br>";
           }else{
            // check if it matches in fcname 
           } 

        }
         
      // pr($fcitem['foodcombination_name']);
      // pr($fcitem['fc_id']);
      // pr($fcitem['foodId_quantity']);



    }

  }
}