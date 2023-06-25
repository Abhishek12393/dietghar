<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
class Admin_foodchart extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Custommodel');
		$this->load->model('Dietmodel');
		$this->load->model('User_model', 'Um');
		$this->load->model('Facebookreview_model');
		$this->time =  Date('Y-m-d H:i:s');
		$url = 'Api/Userdatadetails';
		$this->Auth = $_SESSION['Token'];
	
	} 
	
	public function user_foodchart_reset($id){
		echo "i am here $id";
		// reset the food chart 
		// $resp =  
	}
 
	// step :
	public function chartPreparation($id,$renew='new'){
 
		$url = 'Api/Userdatadetails';
		// $Auth = $this->$Auth;
		$Auth = $_SESSION['Token'];
 
		if($renew == "renew" ){ 
			$datas['renewchart'] = 1; 
			$data = array(
				'user_id' => $id	,
				'renew' => 1		
			);
		}else{
			$data = array(
				'user_id' => $id			
			);
		}
		$res = api_call($url,$Auth,$data);
		if(isset($_SESSION['Token']) && $res->response_code==0){
			$datas['message'] = $res->data;
			// prd($datas);
			$this->load->view('Admin/foodchart/chartpreparation.php',$datas);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function reallotchartPreparation($id,$renew='new'){
 
		if($renew == "renew" ){ $datas['renewchart'] = 1; }

		$url = 'Api/Userdatadetails';
		// $Auth = $this->$Auth;
		$Auth = $_SESSION['Token'];
		$data = array(
			'user_id' => $id			
		);
		$res = api_call($url,$Auth,$data);

		// get disease list 
		$url2 = 'Api/Listing';
		$data2 = array(
			'option' => 'Disease',
			'id' => ''
					);
		$resdiseases = api_call($url2,$Auth,$data2);
		
		// get list of customers where diseases are same
		$url3 = 'Api/User_list_by_disease';
			$data3 = [
							'is_thyroid' => $res->data->is_thyroid,
							'thyroid' => $res->data->c_thyroid,
							'is_diabetes' => $res->data->is_diabetes,
							'diabetes' => $res->data->c_diabetes,
							'heart_ailment' => $res->data->heart_ailment,
							'bp' => $res->data->bp,
							'pcos' => $res->data->pcos,
							'hypertension' => $res->data->hypertension,
							'food_prefrence' => $res->data->food_prefrence,
			];
		$resclist = api_call($url3,$Auth,$data3);

		$url4 = "Api/user_list";
			$data4 = ['type' => 'first_call_done'];
		$respUserlist = api_call($url4,$Auth,$data4);
		// prd($respUserlist);
		// prd($resclist);
	 
		if(isset($_SESSION['Token']) && $res->response_code==0 && $resdiseases->response_code==0){
			$datas['message'] = $res->data;
			$datas['diseases'] = $resdiseases->data;
			$datas['resclist'] = $resclist->data;
			$datas['respUserlist'] = $respUserlist->user_data;
			$datas['reallot'] = 1;
			// prd($datas);
			$this->load->view('Admin/foodchart/chartpreparation_reallot.php',$datas);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	
	
	//--- admin foodchart preparation page controllers 
	public function foodchart2(){
		// not using // see foodchart_new func  
		die();

		// add token authentication here :: 
		#prd($_POST); // here
		if($_POST['plan_type']==1){
			$limit = 15;
		}else{
			$limit = 30;
		}

		$table =	get_table_name($_POST['final_bmr']);
		$placement_arr = $_POST['Placement'];
		$foo_pre = $this->Custommodel->Select_common_where('customer_lifestyle','user_id',$_POST['id']);
		$food_type = $foo_pre[0]['food_prefrence'];
		$data['limit'] = $limit;

 
		// $data['message']=$this->Dietmodel->prepare_approved_chart($limit);
		$data['message']=$this->Dietmodel->prepare_approved_chart_upgrade($table ,$food_type,$placement_arr, $limit);

		 #prd($data['message']);
		$data['all_food']=$this->Dietmodel->all_food();
		$data['id']=$_POST['id'];
		$data['cust_id']=$_POST['id'];
		$data['plan'] = $_POST['plan'];
		prd($data['message'], 'message data');
		 //prd('---------------- final data for chart page ----------------');
		$this->load->view('Admin/foodchart_new.php',$data);

	}

	# step1 fetch relevent data from final meal days 
	public function foodchart_new(){
		// add token authentication here :: 
		//rd($_POST); // here
		if($_POST['plan_type']==1){
			$limit = 15;
			 	$copyday = [0,5,10];
		}else{
			$limit = 30; // 30
				$copyday = [0,7,14,21];
		}
		if($_POST['renewchart']==1){
			// renew process
			$data['renewchart'] = 1;
		}
		$table =	get_table_name($_POST['final_bmr']);
		// prd($limit);
		$foo_pre = $this->Custommodel->Select_common_where('customer_lifestyle','user_id',$_POST['id']);
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
			$bedtime1 = '';
      $bedtime2 = [];
			if(isset($_POST['entersameshift']) && $_POST['entersameshift'] == 3){
				for ($i=0; $i < $limit ; $i++) { 
					if (in_array($i, $copyday)) {
						// echo "Match found";
						$morning1 =  $message1[$i]['morning'];
						$morning2 =  $message1[$i]['morning_data'];
						
						$bedtime1 =  $message1[$i]['bedtime'];
						$bedtime2 =  $message1[$i]['bedtime_data'];
						// pr($morning1);
						// pr($morning2);
					}else{
						$message1[$i]['morning'] =  $morning1;
						$message1[$i]['morning_data'] =  $morning2 ;

						$message1[$i]['bedtime'] =  $bedtime1 ;
						$message1[$i]['bedtime_data'] = $bedtime2;
						// echo $i; echo "<br>";
					}
				}
			}elseif(isset($_POST['entersameshift']) && $_POST['entersameshift'] == 2){
				// pr('Blank Shift Chart');
				for ($i=0; $i < $limit ; $i++) { 
					$message1[$i]['morning'] =  '';
					$message1[$i]['morning_data'] =  [] ;
					$message1[$i]['bedtime'] =  '';
					$message1[$i]['bedtime_data'] =  [] ;
				}
				
			}else{
				// pr('Normal Chart');
			}

		$data['message'] = $message1;
		$data['entersameshift'] = $_POST['entersameshift'];
		#$message2=$this->Dietmodel->prepare_approved_chart_upgrade2($table,$food_type,$placement_arr, $limit);
		// pr($message1 ,'message 1');
		// pr($message2, 'message 2');
		// prd(array_merge($message1,$message2));
		// $data['message']  =array_merge($message1,$message2);
		
		$data['limit'] = $limit;
		$data['all_food']=$this->Dietmodel->all_food();
		$data['cust_id']=$_POST['id'];
		$data['plan'] = $_POST['plan'];
		$data['dbtable'] = $table;
		#prd($data['all_food'], 'message data');
		 //prd('---------------- final data for chart page ----------------');
		//  prd($data);
		$this->load->view('Admin/foodchart/foodchart_new.php',$data);
		
	}



	public function checkt(){
		$post = $this->input->post();
		pr(count($post));
		 pr($post);
	}
 
	# step 2 now save the relevant data into temp table 

	public function submit_food_chart_temp(){
		$post = $this->input->post();
 
		// get deses from customer info 
		$custid = $post['cust_id'];
		$food_cate = $post['food_cate'];

		$custinfo = $this->Custommodel->Select_common_where('customers_info','id',$custid);
		$custdata = $this->Dietmodel->Userdatadetails($custid);
		# CHECK IF FOOD COMBINATIONATION IS NEW OR OLD :
		# ARRANGE FOOD ITEMS : WITH UNIT CREATE FOOD COMBINATION
		$limit = $_POST['limit']; // limit should be 15 or 30 
		$days = range(1,	$limit);
		$chartId =  time();
 
		foreach($days as $day){
			#echo "$day -  day";
			$morning_array=[];$breakfast_array=[];$midmeal_array=[];$lunch_array=[];$evening_array=[];$dinnner_array=[];$bedtime_array=[];
			# morning data array
			if(is_array($_POST[$day.'_morning_data_food2'])){

				foreach ($_POST[$day.'_morning_data_food2'] as $key => $value) { # get id
					if($_POST[$day.'_morning_data_food2'][$key]!=0){
						$morning_array[$key]['foodId'] = $value;
					}
				}
				foreach ($_POST[$day.'_morning_data_food'] as $key => $value) { # get food name
					if($_POST[$day.'_morning_data_food'][$key]!=''){
						$morning_array[$key]['foodName'] = $value;
					}
				}
				foreach ($_POST[$day.'_morning_data_unit'] as $key => $value) { # get food unit
					if($value!= ''){
						$morning_array[$key]['unit'] = $value;	
					}	
				}
				foreach ($_POST[$day.'_morning_data_quantity'] as $key => $value) { # get food quantity
					if($value!=0 && $value != ''){
						$morning_array[$key]['quantity'] = $value;	
					}else{
						unset($morning_array[$key]);
					}
				}
			}	
			# repeat for breakfast midmeal lunch evening dinnner bedtime 
			if(is_array($_POST[$day.'_breakfast_data_food2'])){
				foreach ($_POST[$day.'_breakfast_data_food2'] as $key => $value) {
					if($_POST[$day.'_breakfast_data_food2'][$key]!=0){
						$breakfast_array[$key]['foodId'] = $value;
					}
				}
				foreach ($_POST[$day.'_breakfast_data_food'] as $key => $value) {
					if($_POST[$day.'_breakfast_data_food'][$key]!=''){
						$breakfast_array[$key]['foodName'] = $value;
					}
				}
			 
				foreach ($_POST[$day.'_breakfast_data_unit'] as $key => $value) {
					if($value!= ''){
						$breakfast_array[$key]['unit'] = $value;	
					}	
				}
				foreach ($_POST[$day.'_breakfast_data_quantity'] as $key => $value) {
					if($value!=0){
						$breakfast_array[$key]['quantity'] = $value;
					}else{
						unset($breakfast_array[$key]);
					}
				}
			}
			if(is_array($_POST[$day.'_midmeal_data_food2'])){	
				foreach ($_POST[$day.'_midmeal_data_food2'] as $key => $value) {
					if($_POST[$day.'_midmeal_data_food2'][$key]!=0){
						$midmeal_array[$key]['foodId'] = $value;
					}
				}
				foreach ($_POST[$day.'_midmeal_data_food'] as $key => $value) {
					if($_POST[$day.'_midmeal_data_food'][$key]!=''){
						$midmeal_array[$key]['foodName'] = $value;
					}
				}
				foreach ($_POST[$day.'_midmeal_data_unit'] as $key => $value) {
					if($value!= ''){
						$midmeal_array[$key]['unit'] = $value;	
					}	
				}
				foreach ($_POST[$day.'_midmeal_data_quantity'] as $key => $value) {
					if($value !=0){
						$midmeal_array[$key]['quantity'] = $value;
					}else{
						unset($midmeal_array[$key]);
					}
				}
			}
			if(is_array($_POST[$day.'_lunch_data_food2'])){
				foreach ($_POST[$day.'_lunch_data_food2'] as $key => $value) {
					if($_POST[$day.'_lunch_data_food2'][$key]!=0){
						$lunch_array[$key]['foodId'] = $value;
					}
				}
				foreach ($_POST[$day.'_lunch_data_food'] as $key => $value) {
					if($_POST[$day.'_lunch_data_food'][$key]!=''){
						$lunch_array[$key]['foodName'] = $value;
					}
				}
				
				foreach ($_POST[$day.'_lunch_data_unit'] as $key => $value) {
					if($value!= ''){
						$lunch_array[$key]['unit'] = $value;	
					}	
				}
				foreach ($_POST[$day.'_lunch_data_quantity'] as $key => $value) {
					if($value !=0){
						$lunch_array[$key]['quantity'] = $value;	
					}else{
						unset($lunch_array[$key]);
					}
				}
			}

			if(is_array($_POST[$day.'_evening_data_food2'])){
				foreach ($_POST[$day.'_evening_data_food2'] as $key => $value) {
					if($_POST[$day.'_evening_data_food2'][$key]!=0){
						$evening_array[$key]['foodId'] = $value;	
					}
				}
				foreach ($_POST[$day.'_evening_data_food'] as $key => $value) {
					if($_POST[$day.'_evening_data_food'][$key]!=''){
						$evening_array[$key]['foodName'] = $value;	
					}
				}
				foreach ($_POST[$day.'_evening_data_unit'] as $key => $value) {
					if($value!= ''){
						$evening_array[$key]['unit'] = $value;	
					}	
				}
				foreach ($_POST[$day.'_evening_data_quantity'] as $key => $value) {
					if($value !=0){
						$evening_array[$key]['quantity'] = $value;	
					}else{
						unset($evening_array[$key]);
					}
				}
			}
			if(is_array($_POST[$day.'_dinner_data_food2'])){
				foreach ($_POST[$day.'_dinner_data_food2'] as $key => $value) {
					if($_POST[$day.'_dinner_data_food2'][$key]!=0){
						$dinnner_array[$key]['foodId'] = $value;
					}				
				}
				foreach ($_POST[$day.'_dinner_data_food'] as $key => $value) {
					if($_POST[$day.'_dinner_data_food'][$key]!=''){
						$dinnner_array[$key]['foodName'] = $value;
					}				
				}
				foreach ($_POST[$day.'_dinner_data_unit'] as $key => $value) {
					if($value!= ''){
						$dinnner_array[$key]['unit'] = $value;	
					}	
				}
				foreach ($_POST[$day.'_dinner_data_quantity'] as $key => $value) {
					if($value !=0  && $value !=''){
						$dinnner_array[$key]['quantity'] = $value;
					}else{
						unset($dinnner_array[$key]);
					}
				}
			}
			if(is_array($_POST[$day.'_bedtime_data_food2'])){
				foreach ($_POST[$day.'_bedtime_data_food2'] as $key => $value) {
					if($_POST[$day.'_bedtime_data_food2'][$key]!=0){
						$bedtime_array[$key]['foodId'] = $value;	
					}
				}
				foreach ($_POST[$day.'_bedtime_data_food'] as $key => $value) {
					if($_POST[$day.'_bedtime_data_food'][$key]!=''){
						$bedtime_array[$key]['foodName'] = $value;	
					}
				}
				foreach ($_POST[$day.'_bedtime_data_unit'] as $key => $value) {
					if($value!= ''){
						$bedtime_array[$key]['unit'] = $value;	
					}	
				}
				foreach ($_POST[$day.'_bedtime_data_quantity'] as $key => $value) {
					if($value !=0){
						$bedtime_array[$key]['quantity'] = $value;
					}else{
						unset($bedtime_array[$key]);
					}
				}
			}
			// 	pr($morning_array);
			// 	pr($dinnner_array);
			//  die();
			// logic for 77 55 method
			if(isset($post['entersameshift']) && $post['entersameshift'] == 2){
				if($day == 1){
					$copy_morning_array = $morning_array;
				}
				if($day % 5 == 1 ){
					$copy_morning_array = $morning_array;
				}else{
					$copy_morning_array = $copy_morning_array;
				}
  
				$morning_array =  $copy_morning_array;

			} 
			#getcaldata_foodid_new($foodArray)
			#create final chart for insert
			#===
			#pr($morning_array,'morning array data');
			if(!empty($morning_array)){
				$morning_array_data = $this->getcaldata_foodid_new($morning_array); // getcaldata_foodid_new is a function 
				// pr($morning_array_data, 'morning_nutrients_data');
				if(empty($morning_array_data['no_of_chart'])){
					$morning_array_data = $this->addCombinationwith_foodid_new($morning_array);	
				}
	 
				$final_chart['morning'] = $morning_array_data['fc_name'];
				$final_chart['morning_no_of_chart'] = $morning_array_data['no_of_chart'];
				
			}else{
				$morning_array_data = [];
				$final_chart['morning'] = NULL;
				$final_chart['morning_no_of_chart'] = 0;
			}

			if(!empty($breakfast_array)){
				// if array is empty no need get chart no and cal data
				$breakfast_array_data = $this->getcaldata_foodid_new($breakfast_array); // getcaldata_foodid_new is a function
				if(empty($breakfast_array_data['no_of_chart'])){
					$breakfast_array_data = $this->addCombinationwith_foodid_new($breakfast_array);	
				}
				 $final_chart['breakfast'] = $breakfast_array_data['fc_name'];
				 $final_chart['breakfast_no_of_chart'] = $breakfast_array_data['no_of_chart'];
			}else{
				$breakfast_array_data = [];
				$final_chart['breakfast'] = NULL;
				$final_chart['breakfast_no_of_chart'] = 0;
			}

			if(!empty($midmeal_array)){
				$midmeal_array_data = $this->getcaldata_foodid_new($midmeal_array);
				if(empty($midmeal_array_data['no_of_chart'])){
					$midmeal_array_data = $this->addCombinationwith_foodid_new($midmeal_array);		
				}
				$final_chart['midmeal'] = $midmeal_array_data['fc_name'];
				$final_chart['midmeal_no_of_chart'] = $midmeal_array_data['no_of_chart'];
			}else{
				$midmeal_array_data =[];
				$final_chart['midmeal'] = NULL;
				$final_chart['midmeal_no_of_chart'] = 0;
			}

			if(!empty($lunch_array)){
				$lunch_array_data = $this->getcaldata_foodid_new($lunch_array);// getcaldata_foodid_new is a function 
				if(empty($lunch_array_data['no_of_chart'])){
					$lunch_array_data = $this->addCombinationwith_foodid_new($lunch_array);	
					
				}
				$final_chart['lunch'] = $lunch_array_data['fc_name'];
				$final_chart['lunch_no_of_chart'] = $lunch_array_data['no_of_chart'];
			}else{
				$lunch_array_data = [];
				$final_chart['lunch'] = NULL;
				$final_chart['lunch_no_of_chart'] = 0;
			}
			// pr($evening_array,'evening array data');
			if(!empty($evening_array)){
				$evening_array_data = $this->getcaldata_foodid_new($evening_array); // getcaldata_foodid_new is a function 
				if(empty($evening_array_data['no_of_chart'])){
					$evening_array_data = $this->addCombinationwith_foodid_new($evening_array);	
				}
				$final_chart['evening'] = $evening_array_data['fc_name'];
				$final_chart['evening_no_of_chart'] = $evening_array_data['no_of_chart'];
			}else{
				$evening_array_data = [];
				$final_chart['evening'] = NULL;
				$final_chart['evening_no_of_chart'] = 0;
			}
			// pr($evening_array_data,'evening array data u');

			#pr($dinnner_array,'dinner array data');
			if(!empty($dinnner_array)){
				$dinnner_array_data = $this->getcaldata_foodid_new($dinnner_array);
				if(empty($dinnner_array_data['no_of_chart'])){
					$dinnner_array_data = $this->addCombinationwith_foodid_new($dinnner_array);	
				}
				$final_chart['dinnner'] = $dinnner_array_data['fc_name'];
				$final_chart['dinnner_no_of_chart'] = $dinnner_array_data['no_of_chart'];
			}else{
				$dinnner_array_data =[];
				$final_chart['dinnner'] = NULL;
				$final_chart['dinnner_no_of_chart'] = 0;
			}

			if(!empty($bedtime_array)){
				$bedtime_array_data = $this->getcaldata_foodid_new($bedtime_array); // getcaldata_foodid_new is a function 
				if(empty($bedtime_array_data['no_of_chart'])){
					$bedtime_array_data = $this->addCombinationwith_foodid_new($bedtime_array);	
				}
				$final_chart['bedtime'] = $bedtime_array_data['fc_name'];
				$final_chart['bedtime_no_of_chart'] = $bedtime_array_data['no_of_chart'];
			}else{
				$bedtime_array_data=[];
				$final_chart['bedtime'] = NULL;
				$final_chart['bedtime_no_of_chart'] = 0;
			}


				#final-data
				//echo " morning=".$morning_array_data['totalcalories']."  | breakfast=".  $breakfast_array_data['totalcalories'] ." |midmeal=".$midmeal_array_data['totalcalories']."| lunch=". $lunch_array_data['totalcalories']."| evening=". $evening_array_data['totalcalories']." |dinnner=".$dinnner_array_data['totalcalories']."| bedtime=".$bedtime_array_data['totalcalories'];
					$final_chart['totalcalories'] = $morning_array_data['totalcalories'] + $breakfast_array_data['totalcalories'] +$midmeal_array_data['totalcalories'] + $lunch_array_data['totalcalories'] + $evening_array_data['totalcalories'] + $dinnner_array_data['totalcalories'] + $bedtime_array_data['totalcalories'];
			
					$final_chart['totalprotein'] = $morning_array_data['totalprotein'] + $breakfast_array_data['totalprotein'] +$midmeal_array_data['totalprotein'] + $lunch_array_data['totalprotein'] + $evening_array_data['totalprotein'] + $dinnner_array_data['totalprotein'] + $bedtime_array_data['totalprotein'] ;
					
					$final_chart['totalcarbohydrates'] = $morning_array_data['totalcarbohydrates'] + $breakfast_array_data['totalcarbohydrates'] +$midmeal_array_data['totalcarbohydrates'] + $lunch_array_data['totalcarbohydrates'] + $evening_array_data['totalcarbohydrates'] + $dinnner_array_data['totalcarbohydrates']+ $bedtime_array_data['totalcarbohydrates'];
					
					$final_chart['totalfat'] = $morning_array_data['totalfat'] + $breakfast_array_data['totalfat'] +$midmeal_array_data['totalfat'] + $lunch_array_data['totalfat'] + $evening_array_data['totalfat'] + $dinnner_array_data['totalfat'] + $bedtime_array_data['totalfat'];
					
					$final_chart['totalsodium'] = $morning_array_data['totalsodium'] + $breakfast_array_data['totalsodium'] +$midmeal_array_data['totalsodium'] + $lunch_array_data['totalsodium'] + $evening_array_data['totalsodium'] + $dinnner_array_data['totalsodium']+ $bedtime_array_data['totalsodium'];
					
					$final_chart['totaliron'] = $morning_array_data['totaliron'] + $breakfast_array_data['totaliron'] +$midmeal_array_data['totaliron'] + $lunch_array_data['totaliron'] + $evening_array_data['totaliron'] + $dinnner_array_data['totaliron']+ $bedtime_array_data['totaliron'] ;
					
					$final_chart['totald_fibre'] = $morning_array_data['totald_fibre'] + $breakfast_array_data['totald_fibre'] +$midmeal_array_data['totald_fibre'] + $lunch_array_data['totald_fibre'] + $evening_array_data['totald_fibre'] + $dinnner_array_data['totald_fibre']+ $bedtime_array_data['totald_fibre'] ;
					#pr($final_chart);
					$food_category = $this->input->post('Perfernce');
					if($food_category) {
						$final_chart['food_cate']  = $food_category ;
					}else{
						$final_chart['food_cate']  = 0 ; // Not updated by admin
					}
					$final_chart['status']  = 1; // Verified
					$final_chart['d_time']  = $this->time; // Verified
					$uniq_id = $final_chart['morning_no_of_chart'].'-'.$final_chart['breakfast_no_of_chart'].'-'.$final_chart['midmeal_no_of_chart'].'-'.$final_chart['lunch_no_of_chart'].'-'.$final_chart['evening_no_of_chart'].'-'.$final_chart['dinnner_no_of_chart'].'-'.$final_chart['bedtime_no_of_chart'];

						#$final_chart['Day']  = $day; // Day
					$final_chart["cust_id"] = $_POST['cust_id'];
					$final_chart["chart_id"] =	$chartId;
					$final_chart["uniq_id"] =	$uniq_id;
					$final_chart["food_cate"] =	$food_cate;
		 

				#pr($final_chart,'final chart - day'.$day);
				# now insert the chart data into the table temp table 
				$final_insert_resp[] = $this->Custommodel->insert_common('customers_chart_temp',$final_chart) >0 ?'ok':'Not inseted';
 
			}
 
 
			# after submitting into temporary table 
		#and updating disease into final table 
		# update chart id into customers table
		if($_POST['renewchart']== 1){
			// renew process // when it is for renew
			$data['renewchart'] = 1;
			$rmstartdate = $custinfo[0]['meal_end_date'];
			$endlimit = $limit+1; // for renew last day count
			$updatedata = [ 'renew_meal_chart_id' =>$chartId ,
			  						'renew_start_date'=>date('Y-m-d', strtotime($rmstartdate. ' + 1 days')),
			  						'renew_end_date'=>date('Y-m-d', strtotime($rmstartdate. ' + '.$endlimit.'days')),
									];
		}else{
			$updatedata = [ 'meal_chart_id' =>$chartId ];
		}

		$chartid_resp = $this->Custommodel->update_common($updatedata,'customers_info','id',$_POST['cust_id']);
			#pr($chartid_resp ,'chart id update resp');
		#show page
		$data['meal_chart_id']=$chartId;
		$data['cust_id']=$_POST['cust_id'];
		$data['temptb_iresp'] = $final_insert_resp;
 
		$this->load->view('Admin/foodchart/tempchart_submit.php',$data);
		
	}
 
	

	#foodchart
	public function submit_food_chart_final() {
		// this function is common for new chart preparation and reallot same chart
		 // add authentication 
		 $process ='';
		$post = $this->input->post();
		$cust_id =$post['cust_id'];
		$reallot =$post['reallot'];
		$chart_id =$post['meal_chart_id'];

		$cust_data = $this->Dietmodel->get_cust_chart_info($cust_id); // get customers selected data from lifstyle and info related to make chart
		$disease  = $cust_data->disease;
		
		// renew process // when it is for renew
		if($_POST['renewchart']== 1){
			$process .= "_Renew";
			// $sdate  = date('Y-m-d', strtotime($cust_data->meal_end_date. ' + 1 days'));
			$sdate  = $cust_data->renew_start_date;
		}else{
			$sdate  = $cust_data->meal_start_date;
		}
	 
	
		// when re issueing same chart from final table
		if(isset($reallot) && $reallot == 1) {
			$process .= "_Reallot";
			$table = "customers_chart_final";
			$newmealchartid = time();
			$chart_cust_id = $_POST['fromcust_id'];
		}else{
			$table = "customers_chart_temp";
			$chart_cust_id =  $cust_id;
		}
		//step 1: fetch old final alloted chart or temp chart from calories tables
		$tempChart =$this->Dietmodel->get_cust_temp_chart($table,$chart_cust_id,$chart_id);
	 
		$count = count($tempChart);
		$day=1;
		$tcalories = 0;
		// pr($tempChart);
 

		foreach($tempChart as $i=>$chartday){
				#==================================================
				# check if day present in the the table or not and save the data::
					// update disease in final tables if day already available or insert the day with disease
					$uniq_id= $chartday['uniq_id'];
					$final_table = get_table_name($chartday['totalcalories']);
					//$final_table = "final_chart_100_199_test"; // should be removed in production 
			
					$where = "uniq_id = '".$uniq_id."'";
					// $where = "admin_verify = 3";
					// $checkday_final = $this->Custommodel->count_common($final_table,$where);
					$selectcol = "disease" ;
					$checkday_final = $this->Dietmodel->get_col_finaltb($final_table,$selectcol,$where); // get disease if row exist
 
						unset($chartday['id']);
						
						$chartday_col = $chartday; // so that exact no . columns should be matched
						$chartday_col['admin_verify'] =1;
						
						unset($chartday_col['cust_id']);
						unset($chartday_col['chart_id']);
						
						// pr($chartday,'single chart day ');
						if($checkday_final == 0 ){ 
							# insert the new day
							# enter
							$chartday_col['disease'] = $disease;
 
							$final_insert_resp = $this->Custommodel->insert_common($final_table,$chartday_col) > 0 ?'ok':'Not inseted';
							#echo " << new day entry in the db or in json with disease submitted $final_insert_resp <br>" ;
						}else{
							#echo " merge with existing disease update the disease <br>";
							$disease =	explode("+",trim($disease,"+")); // make disease into array 
							$new_disease_ids = explode("+",trim($checkday_final[0]['disease'],"+")); // get array of new disease
							foreach($new_disease_ids as $dindex=> $d_id){
								if(!in_array($d_id,$disease)){
									array_push($disease,$d_id);
								}
							}  
							$disease_update = [
								'disease'=> $disease,
								'admin_verify'=> 1
							];
							// compare
							if($disease == $disease_update['disease']){ 
								// echo "no change in desease <br>" ;
							}else{
								$final_updt_resp[] = $this->Custommodel->update_common($disease_update,$final_table,$where,'') >0 ?'ok':'Not inseted';
							}
						}
				#==================================================
				// insert into final table//
 
				$chartday['day'] =$day;

				if(isset($reallot) && $reallot == 1) { 
					// updatenew meal chart when reissuing old chart 
					$chartday['chart_id'] =$newmealchartid;
					$chartday['cust_id'] =$cust_id;
					$chartday['d_time'] = date('Y-m-d h:i:s');
				}
				$chartdate  =  date('Y-m-d', strtotime($sdate. ' + '.$day.' days'));
				$chartday['meal_date'] = $chartdate;
				$final_cust_chart_resp[] = $this->Custommodel->insert_common('customers_chart_final',$chartday) >0 ?'ok':'Notok';
				$day++;
				$tcalories = $tcalories + $chartday['totalcalories'];
		}

		if(isset($reallot) && $reallot == 1) { 
			$mealchartid = $newmealchartid;
			if($_POST['renewchart']== 1){
				$chartidupdt = ['renew_meal_chart_id' => $mealchartid ];
			}else{
				$chartidupdt = ['meal_chart_id' => $mealchartid ];
			}
			$updtresp= $this->Custommodel->update_common($chartidupdt,'customers_info','id',$cust_id);
		}else{
			$mealchartid = $chart_id;
		}

		// pr($final_cust_chart_resp);

		if(in_array('Notok', $final_cust_chart_resp)==1){
			pr($final_cust_chart_resp);
		}else{
			// update customer charts history 
			$chdata = [
				'cust_id'=> $cust_id,
				'meal_chart_id'=>$mealchartid,
				'calories' => $tcalories / $count ,  
				'days'=>$count,
				'updated_dt' => date('Y-m-d h:i:s') ];
			$final_cust_chart_history = $this->Custommodel->insert_common('customers_chart_history',$chdata);

			redirect("Admin/paid_users?m=success".$process);  
		}
	 

	}
 

	
	public function Submit_client_chart(){
		# client chart submission
		# prd($_POST);
		//$days = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30);
		// $days = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14);
		$limit = $_POST['limit']; // limit should be 15 or 30 
		// prd($limit);
		$days = range(1,	$limit);
		// prd($days);
		foreach($days as $day){
			#breakdown array
				if(is_array($_POST[$day.'_morning_data_food2'])){
					foreach ($_POST[$day.'_morning_data_food2'] as $key => $value) {
						if($_POST[$day.'_morning_data_quantity'][$key]!=0){
							$morning_array[$key]['foodId'] = $value;
						}
					}
					foreach ($_POST[$day.'_morning_data_quantity'] as $key => $value) {
						if($value!=0){
							$morning_array[$key]['quantity'] = $value;	
						}	
					}
				}
				if(is_array($_POST[$day.'_breakfast_data_food2'])){
					foreach ($_POST[$day.'_breakfast_data_food2'] as $key => $value) {
						if($_POST[$day.'_breakfast_data_quantity'][$key]!=0){
							$breakfast_array[$key]['foodId'] = $value;
						}
					}
					foreach ($_POST[$day.'_breakfast_data_quantity'] as $key => $value) {
						if($value!=0){
							$breakfast_array[$key]['quantity'] = $value;
						}
					}
				}
				if(is_array($_POST[$day.'_midmeal_data_food2'])){	
					foreach ($_POST[$day.'_midmeal_data_food2'] as $key => $value) {
						if($_POST[$day.'_midmeal_data_quantity'][$key]!=0){
							$midmeal_array[$key]['foodId'] = $value;
						}
					}
					foreach ($_POST[$day.'_midmeal_data_quantity'] as $key => $value) {
						if($value !=0){
							$midmeal_array[$key]['quantity'] = $value;
						}
					}
				}
				if(is_array($_POST[$day.'_lunch_data_food2'])){
					foreach ($_POST[$day.'_lunch_data_food2'] as $key => $value) {
						if($_POST[$day.'_lunch_data_quantity'][$key]!=0){
							$lunch_array[$key]['foodId'] = $value;
						}
					}
					foreach ($_POST[$day.'_lunch_data_quantity'] as $key => $value) {
						if($value !=0){
							$lunch_array[$key]['quantity'] = $value;	
						}
					}
				}

				if(is_array($_POST[$day.'_evening_data_food2'])){
					foreach ($_POST[$day.'_evening_data_food2'] as $key => $value) {
						if($_POST[$day.'_evening_data_quantity'][$key]!=0){
							$evening_array[$key]['foodId'] = $value;	
						}
					}
					foreach ($_POST[$day.'_evening_data_quantity'] as $key => $value) {
						if($value !=0){
							$evening_array[$key]['quantity'] = $value;	
						}
					}
				}
				if(is_array($_POST[$day.'_dinner_data_food2'])){
					foreach ($_POST[$day.'_dinner_data_food2'] as $key => $value) {
						if($_POST[$day.'_dinner_data_quantity'][$key]!=0){
							$dinnner_array[$key]['foodId'] = $value;
						}				
					}foreach ($_POST[$day.'_dinner_data_quantity'] as $key => $value) {
						if($value !=0){
							$dinnner_array[$key]['quantity'] = $value;
							
						}
					}
				}
				if(is_array($_POST[$day.'_bedtime_data_food2'])){
					foreach ($_POST[$day.'_bedtime_data_food2'] as $key => $value) {
						if($_POST[$day.'_bedtime_data_quantity'][$key]!=0){
							$bedtime_array[$key]['foodId'] = $value;	
						}
					}foreach ($_POST[$day.'_bedtime_data_quantity'] as $key => $value) {
						if($value !=0){
							$bedtime_array[$key]['quantity'] = $value;
							
						}
					}
				}
			#getfina chart params
				$morning_array_data = $this->getcaldata_foodid($morning_array); // getcaldata_foodid is a function #line 2345 
				if(empty($morning_array_data['no_of_chart'])){
					$morning_array_data = $this->addCombinationwith_foodid($morning_array,'12');	
				}
				$final_chart['morning'] = $morning_array_data['foodcombination_name'];
				$final_chart['morning_no_of_chart'] = $morning_array_data['no_of_chart'];
				
				
				$breakfast_array_data = $this->getcaldata_foodid($breakfast_array);
				if(empty($breakfast_array_data['no_of_chart'])){
					$breakfast_array_data = $this->addCombinationwith_foodid($breakfast_array,'10');	
				}
				$final_chart['breakfast'] = $breakfast_array_data['foodcombination_name'];
				$final_chart['breakfast_no_of_chart'] = $breakfast_array_data['no_of_chart'];
				
				$midmeal_array_data = $this->getcaldata_foodid($midmeal_array);
				if(empty($midmeal_array_data['no_of_chart'])){
					$midmeal_array_data = $this->addCombinationwith_foodid($midmeal_array,'15');		
				}
				$final_chart['midmeal'] = $midmeal_array_data['foodcombination_name'];
				$final_chart['midmeal_no_of_chart'] = $midmeal_array_data['no_of_chart'];
				
				$lunch_array_data = $this->getcaldata_foodid($lunch_array);
				if(empty($lunch_array_data['no_of_chart'])){
					$lunch_array_data = $this->addCombinationwith_foodid($lunch_array,'14');	
					
				}
				$final_chart['lunch'] = $lunch_array_data['foodcombination_name'];
				$final_chart['lunch_no_of_chart'] = $lunch_array_data['no_of_chart'];
				
				$evening_array_data = $this->getcaldata_foodid($evening_array);
				if(empty($evening_array_data['no_of_chart'])){
					$evening_array_data = $this->addCombinationwith_foodid($evening_array,'13');	
					
				}
				$final_chart['evening'] = $evening_array_data['foodcombination_name'];
				$final_chart['evening_no_of_chart'] = $evening_array_data['no_of_chart'];
				
				$dinnner_array_data = $this->getcaldata_foodid($dinnner_array);
				if(empty($dinnner_array_data['no_of_chart'])){
					$dinnner_array_data = $this->addCombinationwith_foodid($dinnner_array,'11');	
				}
				$final_chart['dinnner'] = $dinnner_array_data['foodcombination_name'];
				$final_chart['dinnner_no_of_chart'] = $dinnner_array_data['no_of_chart'];
				
				$bedtime_array_data = $this->getcaldata_foodid($bedtime_array);
				if(empty($bedtime_array_data['no_of_chart'])){
					$bedtime_array_data = $this->addCombinationwith_foodid($bedtime_array,'9');	
					
				}
			#finalchart	
				$final_chart['bedtime'] = $bedtime_array_data['foodcombination_name'];
				$final_chart['bedtime_no_of_chart'] = $bedtime_array_data['no_of_chart'];
				
				$final_chart['totalcalories'] = $morning_array_data['totalcalories'] + $breakfast_array_data['totalcalories'] +$midmeal_array_data['totalcalories'] + $lunch_array_data['totalcalories'] + $evening_array_data['totalcalories'] + $dinnner_array_data['totalcalories'] + $bedtime_array_data['totalcalories'];
				
				$final_chart['totalprotein'] = $morning_array_data['totalprotein'] + $breakfast_array_data['totalprotein'] +$midmeal_array_data['totalprotein'] + $lunch_array_data['totalprotein'] + $evening_array_data['totalprotein'] + $dinnner_array_data['totalprotein'] + $bedtime_array_data['totalprotein'] ;
				
				$final_chart['totalcarbohydrates'] = $morning_array_data['totalcarbohydrates'] + $breakfast_array_data['totalcarbohydrates'] +$midmeal_array_data['totalcarbohydrates'] + $lunch_array_data['totalcarbohydrates'] + $evening_array_data['totalcarbohydrates'] + $dinnner_array_data['totalcarbohydrates']+ $bedtime_array_data['totalcarbohydrates'];
				
				$final_chart['totalfat'] = $morning_array_data['totalfat'] + $breakfast_array_data['totalfat'] +$midmeal_array_data['totalfat'] + $lunch_array_data['totalfat'] + $evening_array_data['totalfat'] + $dinnner_array_data['totalfat'] + $bedtime_array_data['totalfat'];
				
				$final_chart['totalsodium'] = $morning_array_data['totalsodium'] + $breakfast_array_data['totalsodium'] +$midmeal_array_data['totalsodium'] + $lunch_array_data['totalsodium'] + $evening_array_data['totalsodium'] + $dinnner_array_data['totalsodium']+ $bedtime_array_data['totalsodium'];
				
				$final_chart['totaliron'] = $morning_array_data['totaliron'] + $breakfast_array_data['totaliron'] +$midmeal_array_data['totaliron'] + $lunch_array_data['totaliron'] + $evening_array_data['totaliron'] + $dinnner_array_data['totaliron']+ $bedtime_array_data['totaliron'] ;
				
				$final_chart['totald_fibre'] = $morning_array_data['totald_fibre'] + $breakfast_array_data['totald_fibre'] +$midmeal_array_data['totald_fibre'] + $lunch_array_data['totald_fibre'] + $evening_array_data['totald_fibre'] + $dinnner_array_data['totald_fibre']+ $bedtime_array_data['totald_fibre'] ;
				
				// $data = $this->addCombinationwith_foodid($breakfast_array);
				$final_chart['status']  = 1; // Verified
				$final_chart['Day']  = $day; // Day
				$final_chart["client_id"] = $_POST['cust_id'];
			pr($final_chart);  
			// $this->Custommodel->update_common($final_chart,'final_customer_chart','id',$_POST['chart_id']);
			
			#saving final customer chart with for customer in the table
			$this->Custommodel->insert_common('final_customer_chart',$final_chart);
			
				unset($final_chart);
				unset($morning_array_data);
				unset($breakfast_array_data);
				unset($midmeal_array_data);
				unset($lunch_array_data);
				unset($evening_array_data);
				unset($evening_array_data);
				unset($bedtime_array_data);
				unset($morning_array);
				unset($breakfast_array);
				unset($midmeal_array);
				unset($lunch_array);
				unset($evening_array);
				unset($evening_array);
				unset($bedtime_array);
			echo "here";
			// redirect("Admin/Allmeal");
		}
		echo " end";
		// die("Chart Prepared of this client");
	#	echo "<script>window.close();</script>";
	}
	
	public function foodchart_dataEntry(){
		// day maker 
		//check authorization
		$Auth = $this->Auth;
		#prd($Auth);
 
		$data['all_food']=$this->Dietmodel->all_food();
		$this->load->view('Admin/foodchart_maker.php',$data);
		
	}
	public function Submit_single_chart_entry(){
		$day = 1 ; // static cause here is only one row
		$totalfooditemcount = $_POST['totalfooditemcount'];
		if($totalfooditemcount == 0){ #die();
			// redirect with message 
			redirect('Admin/foodchart_dataEntry?m=nofooditem');
		}

		if(is_array($_POST[$day.'_morning_data_food2'])){
				foreach ($_POST[$day.'_morning_data_food2'] as $key => $value) {
					if($_POST[$day.'_morning_data_quantity'][$key]!=0){
						$morning_array[$key]['foodId'] = $value;
					}
				}
				foreach ($_POST[$day.'_morning_data_quantity'] as $key => $value) {
					if($value!=0){
						$morning_array[$key]['quantity'] = $value;	
					}	
				}
		}

		if(is_array($_POST[$day.'_breakfast_data_food2'])){
			foreach ($_POST[$day.'_breakfast_data_food2'] as $key => $value) {
				if($_POST[$day.'_breakfast_data_quantity'][$key]!=0){
					$breakfast_array[$key]['foodId'] = $value;
				}
			}
			foreach ($_POST[$day.'_breakfast_data_quantity'] as $key => $value) {
				if($value!=0){
					$breakfast_array[$key]['quantity'] = $value;
				}
			}
		}

		if(is_array($_POST[$day.'_midmeal_data_food2'])){
				foreach ($_POST[$day.'_midmeal_data_food2'] as $key => $value) {
					if($_POST[$day.'_midmeal_data_quantity'][$key]!=0){
						$midmeal_array[$key]['foodId'] = $value;
					}
				}
				foreach ($_POST[$day.'_midmeal_data_quantity'] as $key => $value) {
					if($value !=0){
						$midmeal_array[$key]['quantity'] = $value;
					}
				}
		}

		if(is_array($_POST[$day.'_lunch_data_food2'])){
			foreach ($_POST[$day.'_lunch_data_food2'] as $key => $value) {
				if($_POST[$day.'_lunch_data_quantity'][$key]!=0){
					$lunch_array[$key]['foodId'] = $value;
				}
			}
			foreach ($_POST[$day.'_lunch_data_quantity'] as $key => $value) {
				if($value !=0){
					$lunch_array[$key]['quantity'] = $value;	
				}
			}
		}

		if(is_array($_POST[$day.'_evening_data_food2'])){		
			foreach ($_POST[$day.'_evening_data_food2'] as $key => $value) {
				if($_POST[$day.'_evening_data_quantity'][$key]!=0){
					$evening_array[$key]['foodId'] = $value;	
				}
			}
			foreach ($_POST[$day.'_evening_data_quantity'] as $key => $value) {
				if($value !=0){
					$evening_array[$key]['quantity'] = $value;	
				}
			}
		}

		if(is_array($_POST[$day.'_dinner_data_food2'])){	
			foreach ($_POST[$day.'_dinner_data_food2'] as $key => $value) {
				if($_POST[$day.'_dinner_data_quantity'][$key]!=0){
					$dinnner_array[$key]['foodId'] = $value;
				}				
			}foreach ($_POST[$day.'_dinner_data_quantity'] as $key => $value) {
				if($value !=0){
					$dinnner_array[$key]['quantity'] = $value;
					
				}
			}
		}

		if(is_array($_POST[$day.'_bedtime_data_food2'])){	
			foreach ($_POST[$day.'_bedtime_data_food2'] as $key => $value) {
				if($_POST[$day.'_bedtime_data_quantity'][$key]!=0){
					$bedtime_array[$key]['foodId'] = $value;	
				}
			}foreach ($_POST[$day.'_bedtime_data_quantity'] as $key => $value) {
				if($value !=0){
					$bedtime_array[$key]['quantity'] = $value;
					
				}
			}
		}
		
		//echo "*-----------------------------------*";
			#pr($morning_array,'morning');
			#pr($breakfast_array,'breakfast');
			#pr($midmeal_array,'midmeal');
			// pr($lunch_array,'lunch');
			// pr($evening_array,'evening');
			// pr($dinnner_array,'dinner');
			// pr($bedtime_array,'bedtime');
		//echo "*-----------------------------------*";

		if(!empty($morning_array)){
			$morning_array_data = $this->getcaldata_foodid_new($morning_array); // getcaldata_foodid is a function #for 
			if(empty($morning_array_data['no_of_chart'])){
				$morning_array_data = $this->addCombinationwith_foodid_new($morning_array);	
			}
			$final_chart['morning'] = $morning_array_data['foodcombination_name'];
			$final_chart['morning_no_of_chart'] = $morning_array_data['no_of_chart'];
			
		}else{
			$final_chart['morning'] = NULL;
			$final_chart['morning_no_of_chart'] = 0;
		}

		if(!empty($breakfast_array)){
			// if array is empty no need get chart no and cal data
			$breakfast_array_data = $this->getcaldata_foodid_new($breakfast_array);
		
			if(empty($breakfast_array_data['no_of_chart'])){
				$breakfast_array_data = $this->addCombinationwith_foodid_new($breakfast_array);	
			}
			$final_chart['breakfast'] = $breakfast_array_data['foodcombination_name'];
			$final_chart['breakfast_no_of_chart'] = $breakfast_array_data['no_of_chart'];
		}else{
			$final_chart['breakfast'] = NULL;
			$final_chart['breakfast_no_of_chart'] = 0;
		}
		
		if(!empty($midmeal_array)){
			$midmeal_array_data = $this->getcaldata_foodid_new($midmeal_array);
			if(empty($midmeal_array_data['no_of_chart'])){
				$midmeal_array_data = $this->addCombinationwith_foodid_new($midmeal_array);		
			}
			$final_chart['midmeal'] = $midmeal_array_data['foodcombination_name'];
			$final_chart['midmeal_no_of_chart'] = $midmeal_array_data['no_of_chart'];
		}else{
			$final_chart['midmeal'] = NULL;
			$final_chart['midmeal_no_of_chart'] = 0;
		}

		if(!empty($lunch_array)){
			$lunch_array_data = $this->getcaldata_foodid_new($lunch_array);
			if(empty($lunch_array_data['no_of_chart'])){
				$lunch_array_data = $this->addCombinationwith_foodid_new($lunch_array);	
				
			}
			$final_chart['lunch'] = $lunch_array_data['foodcombination_name'];
			$final_chart['lunch_no_of_chart'] = $lunch_array_data['no_of_chart'];
		}else{
			$final_chart['lunch'] = NULL;
			$final_chart['lunch_no_of_chart'] = 0;
		}

		if(!empty($evening_array)){
			$evening_array_data = $this->getcaldata_foodid_new($evening_array); 
			if(empty($evening_array_data['no_of_chart'])){
				$evening_array_data = $this->addCombinationwith_foodid_new($evening_array);	
				
			}
			$final_chart['evening'] = $evening_array_data['foodcombination_name'];
			$final_chart['evening_no_of_chart'] = $evening_array_data['no_of_chart'];
		}else{
			$final_chart['evening'] = NULL;
			$final_chart['evening_no_of_chart'] = 0;
		}

		if(!empty($dinnner_array)){
			$dinnner_array_data = $this->getcaldata_foodid_new($dinnner_array);
			if(empty($dinnner_array_data['no_of_chart'])){
				$dinnner_array_data = $this->addCombinationwith_foodid_new($dinnner_array);	
			}
			$final_chart['dinnner'] = $dinnner_array_data['foodcombination_name'];
			$final_chart['dinnner_no_of_chart'] = $dinnner_array_data['no_of_chart'];
		}else{
			$final_chart['dinnner'] = NULL;
			$final_chart['dinnner_no_of_chart'] = 0;
		}

		if(!empty($bedtime_array)){
			#calling ol and new function for comaparing
			// $bedtime_array_data = $this->getcaldata_foodid($bedtime_array);
			// pr($bedtime_array_data, 'get id old');
			$bedtime_array_data = $this->getcaldata_foodid_new($bedtime_array);
			pr($bedtime_array_data, 'get id new');

			if(empty($bedtime_array_data['no_of_chart'])){
				$bedtime_array_data = $this->addCombinationwith_foodid_new($bedtime_array);	
				pr($bedtime_array_data, 'combinatiuon with id new');
				
			}
			
			$final_chart['bedtime'] = $bedtime_array_data['foodcombination_name'];
			$final_chart['bedtime_no_of_chart'] = $bedtime_array_data['no_of_chart'];
		}else{
			$final_chart['bedtime'] = NULL;
			$final_chart['bedtime_no_of_chart'] = 0;
		}

	 
		#
			$final_chart['totalcalories'] = $morning_array_data['totalcalories'] + $breakfast_array_data['totalcalories'] +$midmeal_array_data['totalcalories'] + $lunch_array_data['totalcalories'] + $evening_array_data['totalcalories'] + $dinnner_array_data['totalcalories'] + $bedtime_array_data['totalcalories'];
			
			$final_chart['totalprotein'] = $morning_array_data['totalprotein'] + $breakfast_array_data['totalprotein'] +$midmeal_array_data['totalprotein'] + $lunch_array_data['totalprotein'] + $evening_array_data['totalprotein'] + $dinnner_array_data['totalprotein'] + $bedtime_array_data['totalprotein'] ;
			
			$final_chart['totalcarbohydrates'] = $morning_array_data['totalcarbohydrates'] + $breakfast_array_data['totalcarbohydrates'] +$midmeal_array_data['totalcarbohydrates'] + $lunch_array_data['totalcarbohydrates'] + $evening_array_data['totalcarbohydrates'] + $dinnner_array_data['totalcarbohydrates']+ $bedtime_array_data['totalcarbohydrates'];
			
			$final_chart['totalfat'] = $morning_array_data['totalfat'] + $breakfast_array_data['totalfat'] +$midmeal_array_data['totalfat'] + $lunch_array_data['totalfat'] + $evening_array_data['totalfat'] + $dinnner_array_data['totalfat'] + $bedtime_array_data['totalfat'];
			
			$final_chart['totalsodium'] = $morning_array_data['totalsodium'] + $breakfast_array_data['totalsodium'] +$midmeal_array_data['totalsodium'] + $lunch_array_data['totalsodium'] + $evening_array_data['totalsodium'] + $dinnner_array_data['totalsodium']+ $bedtime_array_data['totalsodium'];
			
			$final_chart['totaliron'] = $morning_array_data['totaliron'] + $breakfast_array_data['totaliron'] +$midmeal_array_data['totaliron'] + $lunch_array_data['totaliron'] + $evening_array_data['totaliron'] + $dinnner_array_data['totaliron']+ $bedtime_array_data['totaliron'] ;
			
			$final_chart['totald_fibre'] = $morning_array_data['totald_fibre'] + $breakfast_array_data['totald_fibre'] +$midmeal_array_data['totald_fibre'] + $lunch_array_data['totald_fibre'] + $evening_array_data['totald_fibre'] + $dinnner_array_data['totald_fibre']+ $bedtime_array_data['totald_fibre'] ;
			
			$food_category = $this->input->post('Perfernce');
			if($food_category) {
				$final_chart['food_cate']  = $food_category ;
			}else{
				$final_chart['food_cate']  = 0 ; // Not updated by admin
			}

			$final_chart['disease']  = 0 ; // Not updated by admin
			//$final_chart['disease']  = implode(",",$this->input->post('disease'));

			$final_chart['status']  = 1; // Verified
			$final_chart['admin_verify']  = 1; // Verified
			$final_chart['d_time']  = date('Y-m-d h:i:s'); // Verified

			// $data = $this->addCombinationwith_foodid($breakfast_array);
			// $final_chart["client_id"] = $_POST['cust_id']; 
			//$final_chart['Day']  = $day; // Day
			$final_chart['uniq_id'] = $final_chart['morning_no_of_chart'].'-'.$final_chart['breakfast_no_of_chart'].'-'.$final_chart['midmeal_no_of_chart'].'-'.$final_chart['lunch_no_of_chart'].'-'.$final_chart['evening_no_of_chart'].'-'.$final_chart['dinnner_no_of_chart'].'-'.$final_chart['bedtime_no_of_chart'];

			#$final_chart['status'] = 2;
			pr($final_chart,'finalchart');

			$final_chart_temp = ['uniq_id'=> $final_chart['uniq_id'] ]; #<= this will search only uniq id in table to verify if day combination already not present
			
			$resp = $this->Custommodel->Select_common_where_array('final_chart_1_verified',$final_chart_temp);

			if($resp == 'false'){
				$manual_chart_id = $this->Custommodel->insert_common('final_chart_1_verified',$final_chart);
				redirect("Admin/foodchart_dataEntry?m=success");
			}else{
				redirect("Admin/foodchart_dataEntry?m=sameday_already_in_db");
			}
		
			// note : it is same as the submit manul chart func ; check that too
	}

	public function user_finalfoodchart_edit($finalchartid){
		// $resp = $this->Custommodel->
		// echo $finalchartid;
		$message = $this->Dietmodel->userfinalchart_byid($finalchartid);
		$data['message'] = $message;
		$data['food_cate'] = 1;
		$data['limit'] = 1;
		$data['all_food']=$this->Dietmodel->all_food();
		// $data['id']=$_POST['id'];
		// $data['cust_id']=$_POST['id'];
		// $data['plan'] = $_POST['plan'];
		$table =	get_table_name($message[0]['totalcalories']);
		// pr($table);
		// pr($message);
		// $data['dbtable'] = $table;
		$_POST['Placement'] =  ['Early Morning','Evening Snack','Breakfast','Mid Meal','Lunch','Dinner','Bed Time'];
		$data['charttype'] = 'editchart'; // to differentiate if new chart or editing some day from submit chat
		$data['finalchartid'] = $finalchartid;
		$this->load->view('Admin/foodchart/foodchart_new.php',$data);
		

	}

	public function update_singleday_infinalchart(){
		// now mix the procedure which i am doing while creating final chart
		// pr($_POST);

		$day = 1; // here day is fixed
		$finalchartid = $_POST['finalchartid'];
		
 
		$morning_array=[];$breakfast_array=[];$midmeal_array=[];$lunch_array=[];$evening_array=[];$dinnner_array=[];$bedtime_array=[];
		# morning data array
		if(is_array($_POST[$day.'_morning_data_food2'])){

			foreach ($_POST[$day.'_morning_data_food2'] as $key => $value) { # get id
				if($_POST[$day.'_morning_data_food2'][$key]!=0){
					$morning_array[$key]['foodId'] = $value;
				}
			}
			foreach ($_POST[$day.'_morning_data_food'] as $key => $value) { # get food name
				if($_POST[$day.'_morning_data_food'][$key]!=''){
					$morning_array[$key]['foodName'] = $value;
				}
			}
			foreach ($_POST[$day.'_morning_data_unit'] as $key => $value) { # get food unit
				if($value!= ''){
					$morning_array[$key]['unit'] = $value;	
				}	
			}
			foreach ($_POST[$day.'_morning_data_quantity'] as $key => $value) { # get food quantity
				if($value!=0 && $value != ''){
					$morning_array[$key]['quantity'] = $value;	
				}else{
					unset($morning_array[$key]);
				}
			}
		}
	
		# repeat for breakfast midmeal lunch evening dinnner bedtime 
		if(is_array($_POST[$day.'_breakfast_data_food2'])){
			foreach ($_POST[$day.'_breakfast_data_food2'] as $key => $value) {
				if($_POST[$day.'_breakfast_data_food2'][$key]!=0){
					$breakfast_array[$key]['foodId'] = $value;
				}
			}
			foreach ($_POST[$day.'_breakfast_data_food'] as $key => $value) {
				if($_POST[$day.'_breakfast_data_food'][$key]!=''){
					$breakfast_array[$key]['foodName'] = $value;
				}
			}
		 
			foreach ($_POST[$day.'_breakfast_data_unit'] as $key => $value) {
				if($value!= ''){
					$breakfast_array[$key]['unit'] = $value;	
				}	
			}
			foreach ($_POST[$day.'_breakfast_data_quantity'] as $key => $value) {
				if($value!=0){
					$breakfast_array[$key]['quantity'] = $value;
				}else{
					unset($breakfast_array[$key]);
				}
			}
		}
		if(is_array($_POST[$day.'_midmeal_data_food2'])){	
			foreach ($_POST[$day.'_midmeal_data_food2'] as $key => $value) {
				if($_POST[$day.'_midmeal_data_food2'][$key]!=0){
					$midmeal_array[$key]['foodId'] = $value;
				}
			}
			foreach ($_POST[$day.'_midmeal_data_food'] as $key => $value) {
				if($_POST[$day.'_midmeal_data_food'][$key]!=''){
					$midmeal_array[$key]['foodName'] = $value;
				}
			}
			foreach ($_POST[$day.'_midmeal_data_unit'] as $key => $value) {
				if($value!= ''){
					$midmeal_array[$key]['unit'] = $value;	
				}	
			}
			foreach ($_POST[$day.'_midmeal_data_quantity'] as $key => $value) {
				if($value !=0){
					$midmeal_array[$key]['quantity'] = $value;
				}else{
					unset($midmeal_array[$key]);
				}
			}
		}
		if(is_array($_POST[$day.'_lunch_data_food2'])){
			foreach ($_POST[$day.'_lunch_data_food2'] as $key => $value) {
				if($_POST[$day.'_lunch_data_food2'][$key]!=0){
					$lunch_array[$key]['foodId'] = $value;
				}
			}
			foreach ($_POST[$day.'_lunch_data_food'] as $key => $value) {
				if($_POST[$day.'_lunch_data_food'][$key]!=''){
					$lunch_array[$key]['foodName'] = $value;
				}
			}
			
			foreach ($_POST[$day.'_lunch_data_unit'] as $key => $value) {
				if($value!= ''){
					$lunch_array[$key]['unit'] = $value;	
				}	
			}
			foreach ($_POST[$day.'_lunch_data_quantity'] as $key => $value) {
				if($value !=0){
					$lunch_array[$key]['quantity'] = $value;	
				}else{
					unset($lunch_array[$key]);
				}
			}
		}

		if(is_array($_POST[$day.'_evening_data_food2'])){
			foreach ($_POST[$day.'_evening_data_food2'] as $key => $value) {
				if($_POST[$day.'_evening_data_food2'][$key]!=0){
					$evening_array[$key]['foodId'] = $value;	
				}
			}
			foreach ($_POST[$day.'_evening_data_food'] as $key => $value) {
				if($_POST[$day.'_evening_data_food'][$key]!=''){
					$evening_array[$key]['foodName'] = $value;	
				}
			}
			foreach ($_POST[$day.'_evening_data_unit'] as $key => $value) {
				if($value!= ''){
					$evening_array[$key]['unit'] = $value;	
				}	
			}
			foreach ($_POST[$day.'_evening_data_quantity'] as $key => $value) {
				if($value !=0){
					$evening_array[$key]['quantity'] = $value;	
				}else{
					unset($evening_array[$key]);
				}
			}
		}
		if(is_array($_POST[$day.'_dinner_data_food2'])){
			foreach ($_POST[$day.'_dinner_data_food2'] as $key => $value) {
				if($_POST[$day.'_dinner_data_food2'][$key]!=0){
					$dinnner_array[$key]['foodId'] = $value;
				}				
			}
			foreach ($_POST[$day.'_dinner_data_food'] as $key => $value) {
				if($_POST[$day.'_dinner_data_food'][$key]!=''){
					$dinnner_array[$key]['foodName'] = $value;
				}				
			}
			foreach ($_POST[$day.'_dinner_data_unit'] as $key => $value) {
				if($value!= ''){
					$dinnner_array[$key]['unit'] = $value;	
				}	
			}
			foreach ($_POST[$day.'_dinner_data_quantity'] as $key => $value) {
				if($value !=0  && $value !=''){
					$dinnner_array[$key]['quantity'] = $value;
				}else{
					unset($dinnner_array[$key]);
				}
			}
		}
		if(is_array($_POST[$day.'_bedtime_data_food2'])){
			foreach ($_POST[$day.'_bedtime_data_food2'] as $key => $value) {
				if($_POST[$day.'_bedtime_data_food2'][$key]!=0){
					$bedtime_array[$key]['foodId'] = $value;	
				}
			}
			foreach ($_POST[$day.'_bedtime_data_food'] as $key => $value) {
				if($_POST[$day.'_bedtime_data_food'][$key]!=''){
					$bedtime_array[$key]['foodName'] = $value;	
				}
			}
			foreach ($_POST[$day.'_bedtime_data_unit'] as $key => $value) {
				if($value!= ''){
					$bedtime_array[$key]['unit'] = $value;	
				}	
			}
			foreach ($_POST[$day.'_bedtime_data_quantity'] as $key => $value) {
				if($value !=0){
					$bedtime_array[$key]['quantity'] = $value;
				}else{
					unset($bedtime_array[$key]);
				}
			}
		}
		// pr($morning_array);
		// pr($dinnner_array);
		if(!empty($morning_array)){
			$morning_array_data = $this->getcaldata_foodid_new($morning_array); // getcaldata_foodid_new is a function 
			// pr($morning_array_data, 'morning_nutrients_data');
			if(empty($morning_array_data['no_of_chart'])){
				$morning_array_data = $this->addCombinationwith_foodid_new($morning_array);	
			}
 
			$final_chart['morning'] = $morning_array_data['fc_name'];
			$final_chart['morning_no_of_chart'] = $morning_array_data['no_of_chart'];
			
		}else{
			$morning_array_data = [];
			$final_chart['morning'] = NULL;
			$final_chart['morning_no_of_chart'] = 0;
		}

		if(!empty($breakfast_array)){
			// if array is empty no need get chart no and cal data
			$breakfast_array_data = $this->getcaldata_foodid_new($breakfast_array); // getcaldata_foodid_new is a function
			if(empty($breakfast_array_data['no_of_chart'])){
				$breakfast_array_data = $this->addCombinationwith_foodid_new($breakfast_array);	
			}
			 $final_chart['breakfast'] = $breakfast_array_data['fc_name'];
			 $final_chart['breakfast_no_of_chart'] = $breakfast_array_data['no_of_chart'];
		}else{
			$breakfast_array_data = [];
			$final_chart['breakfast'] = NULL;
			$final_chart['breakfast_no_of_chart'] = 0;
		}

		if(!empty($midmeal_array)){
			$midmeal_array_data = $this->getcaldata_foodid_new($midmeal_array);
			if(empty($midmeal_array_data['no_of_chart'])){
				$midmeal_array_data = $this->addCombinationwith_foodid_new($midmeal_array);		
			}
			$final_chart['midmeal'] = $midmeal_array_data['fc_name'];
			$final_chart['midmeal_no_of_chart'] = $midmeal_array_data['no_of_chart'];
		}else{
			$midmeal_array_data =[];
			$final_chart['midmeal'] = NULL;
			$final_chart['midmeal_no_of_chart'] = 0;
		}

		if(!empty($lunch_array)){
			$lunch_array_data = $this->getcaldata_foodid_new($lunch_array);// getcaldata_foodid_new is a function 
			if(empty($lunch_array_data['no_of_chart'])){
				$lunch_array_data = $this->addCombinationwith_foodid_new($lunch_array);	
				
			}
			$final_chart['lunch'] = $lunch_array_data['fc_name'];
			$final_chart['lunch_no_of_chart'] = $lunch_array_data['no_of_chart'];
		}else{
			$lunch_array_data = [];
			$final_chart['lunch'] = NULL;
			$final_chart['lunch_no_of_chart'] = 0;
		}
		// pr($evening_array,'evening array data');
		if(!empty($evening_array)){
			$evening_array_data = $this->getcaldata_foodid_new($evening_array); // getcaldata_foodid_new is a function 
			if(empty($evening_array_data['no_of_chart'])){
				$evening_array_data = $this->addCombinationwith_foodid_new($evening_array);	
			}
			$final_chart['evening'] = $evening_array_data['fc_name'];
			$final_chart['evening_no_of_chart'] = $evening_array_data['no_of_chart'];
		}else{
			$evening_array_data = [];
			$final_chart['evening'] = NULL;
			$final_chart['evening_no_of_chart'] = 0;
		}
		// pr($evening_array_data,'evening array data u');

		#pr($dinnner_array,'dinner array data');
		if(!empty($dinnner_array)){
			$dinnner_array_data = $this->getcaldata_foodid_new($dinnner_array);
			if(empty($dinnner_array_data['no_of_chart'])){
				$dinnner_array_data = $this->addCombinationwith_foodid_new($dinnner_array);	
			}
			$final_chart['dinnner'] = $dinnner_array_data['fc_name'];
			$final_chart['dinnner_no_of_chart'] = $dinnner_array_data['no_of_chart'];
		}else{
			$dinnner_array_data =[];
			$final_chart['dinnner'] = NULL;
			$final_chart['dinnner_no_of_chart'] = 0;
		}

		if(!empty($bedtime_array)){
			$bedtime_array_data = $this->getcaldata_foodid_new($bedtime_array); // getcaldata_foodid_new is a function 
			if(empty($bedtime_array_data['no_of_chart'])){
				$bedtime_array_data = $this->addCombinationwith_foodid_new($bedtime_array);	
			}
			$final_chart['bedtime'] = $bedtime_array_data['fc_name'];
			$final_chart['bedtime_no_of_chart'] = $bedtime_array_data['no_of_chart'];
		}else{
			$bedtime_array_data=[];
			$final_chart['bedtime'] = NULL;
			$final_chart['bedtime_no_of_chart'] = 0;
		}


		$final_chart['totalcalories'] = $morning_array_data['totalcalories'] + $breakfast_array_data['totalcalories'] +$midmeal_array_data['totalcalories'] + $lunch_array_data['totalcalories'] + $evening_array_data['totalcalories'] + $dinnner_array_data['totalcalories'] + $bedtime_array_data['totalcalories'];
			
					$final_chart['totalprotein'] = $morning_array_data['totalprotein'] + $breakfast_array_data['totalprotein'] +$midmeal_array_data['totalprotein'] + $lunch_array_data['totalprotein'] + $evening_array_data['totalprotein'] + $dinnner_array_data['totalprotein'] + $bedtime_array_data['totalprotein'] ;
					
					$final_chart['totalcarbohydrates'] = $morning_array_data['totalcarbohydrates'] + $breakfast_array_data['totalcarbohydrates'] +$midmeal_array_data['totalcarbohydrates'] + $lunch_array_data['totalcarbohydrates'] + $evening_array_data['totalcarbohydrates'] + $dinnner_array_data['totalcarbohydrates']+ $bedtime_array_data['totalcarbohydrates'];
					
					$final_chart['totalfat'] = $morning_array_data['totalfat'] + $breakfast_array_data['totalfat'] +$midmeal_array_data['totalfat'] + $lunch_array_data['totalfat'] + $evening_array_data['totalfat'] + $dinnner_array_data['totalfat'] + $bedtime_array_data['totalfat'];
					
					$final_chart['totalsodium'] = $morning_array_data['totalsodium'] + $breakfast_array_data['totalsodium'] +$midmeal_array_data['totalsodium'] + $lunch_array_data['totalsodium'] + $evening_array_data['totalsodium'] + $dinnner_array_data['totalsodium']+ $bedtime_array_data['totalsodium'];
					
					$final_chart['totaliron'] = $morning_array_data['totaliron'] + $breakfast_array_data['totaliron'] +$midmeal_array_data['totaliron'] + $lunch_array_data['totaliron'] + $evening_array_data['totaliron'] + $dinnner_array_data['totaliron']+ $bedtime_array_data['totaliron'] ;
					
					$final_chart['totald_fibre'] = $morning_array_data['totald_fibre'] + $breakfast_array_data['totald_fibre'] +$midmeal_array_data['totald_fibre'] + $lunch_array_data['totald_fibre'] + $evening_array_data['totald_fibre'] + $dinnner_array_data['totald_fibre']+ $bedtime_array_data['totald_fibre'] ;
					$uniq_id = $final_chart['morning_no_of_chart'].'-'.$final_chart['breakfast_no_of_chart'].'-'.$final_chart['midmeal_no_of_chart'].'-'.$final_chart['lunch_no_of_chart'].'-'.$final_chart['evening_no_of_chart'].'-'.$final_chart['dinnner_no_of_chart'].'-'.$final_chart['bedtime_no_of_chart'];
					$final_chart["uniq_id"] =	$uniq_id;
					$final_chart["food_cate"] = $_POST['food_cate'];

					// pr($final_chart);

					$updateresp = $this->Custommodel->update_common($final_chart,'customers_chart_final','id',$finalchartid);
					if($updateresp == 1){
						// echo "Update Successful";
						echo "<script>alert('update successful');
							window.close();
						</script>";
					}else{
						echo "Something is  Wrong";
					}
					// pr($updateresp , 'Response');

					// add java script to close this page as it is opened in new tab
	}
	// view for check final chart submission charts

	public function user_foodchart_view($id,$renew='new'){
		$cust_id = $id;
		# fetch current chart id 
		$resp1 = $this->Um->userfinalchartid($cust_id);
		$chart_id = $resp1['meal_chart_id'];
		
		// incase of renew get renew mealchart id 
		if($renew == 'renew'){ $chart_id = $resp1['renew_meal_chart_id'];}
 
		$data['chartid'] = $chart_id;
		$data['final_userfoodchart']=$this->Dietmodel->final_customer_chart(0,$cust_id,$chart_id);
		// prd($data);
		// $data = [];
		$this->load->view('Admin/foodchart/user_foodchart_view.php',$data);
	}
	#foodchart
	public function foodchart_view_reallot(){
		// pr($_POST);
		$chart_id = $_POST['chartid'];
		$cust_id = $_POST['cust_id'];

		$from_cust_id2 = $_POST['from_cust_id']; // copy from 
	 	if(isset($_POST['renewchart']) && $_POST['renewchart'] == 1 ){ $data['renewchart'] = 1; } // if preparing for renew 

		$data['chartid'] = $chart_id;
		$data['cust_id'] = $cust_id;
		$data['fromcust_id'] = $from_cust_id2;
		$data['final_userfoodchart']=$this->Dietmodel->final_customer_chart_for_reallot(0,$from_cust_id2,$chart_id);
 
		$data['reallot'] = 1;
		$this->load->view('Admin/foodchart/user_foodchart_view.php',$data);
	}
	
	// helpers
	public function getcaldata_foodid($foodArray){
		// acording to food id get cal data
		// need to change 
		
		$calories = 0;
		$carbohydrates = 0;
		$fat = 0;
		$sodium = 0;
		$iron = 0;
		$fibre = 0;
		$protein = 0;
	
		foreach ($foodArray as $key => $value) {
			$quan = $foodArray[$key]['quantity'];
			$fooddata = $this->Custommodel->Select_common_where('food_master','id',$foodArray[$key]['foodId']);
			$calories += $quan * $fooddata[0]['calories'];
			$carbohydrates += $quan * $fooddata[0]['carbohydrates'];
			$fat += $quan * $fooddata[0]['fat'];
			$sodium +=$quan * $fooddata[0]['sodium'];
			$iron += $quan * $fooddata[0]['iron'];
			$fibre += $quan * $fooddata[0]['d_fibre'];
			$protein += $quan * $fooddata[0]['protein'];
			$foodName = $fooddata[0]['food_name']; // get food name from db
			$combinationfoodname .= "+".$quan." ". $foodName;
		}
		 $combinationfoodname = ltrim ($combinationfoodname,'+');
		 $chart_data = $this->Custommodel->Select_common_where('foodCombination','foodcombination_name',$combinationfoodname);
		 $totalval = array(
						'totalprotein' => $protein,
						 'totalcalories'  => $calories,
						 'totalcarbohydrates'  => $carbohydrates,
						 'totalfat'  => $fat,
						 'totalsodium'  => $sodium,
						 'totaliron'  => $iron,
						 'totald_fibre'  => $fibre,
						 'foodcombination_name' =>$combinationfoodname,
						 'no_of_chart' => $chart_data[0]['no_of_chart']
						 );
			unset($chart_data);
		 return $totalval;
	}

	public function addCombinationwith_foodid($foodArray,$plac){
		// old version 
		// addCombinationwith_foodid//
		$placement =  13;
		$foodCategory =  1;
		
		$chart = $this->Custommodel->Select_common_orderby_limit('foodCombination','no_of_chart',1);
		// get max chart number created in the database food id from db
		$maxFoodId = $chart[0]['no_of_chart']+1; 

		$noFood = count($foodArray);
		$calories = 0;
		$carbohydrates = 0;
		$fat = 0;
		$sodium = 0;
		$iron = 0;
		$fibre = 0;
		$protein = 0;

		$getMaxCombination = 1; //get from db

		

		foreach ($foodArray as $key => $value) {

		  $quan = $foodArray[$key]['quantity'];

		  if($quan=='0'){
		  	continue;
		  }

		  $current = (($key+1)%$noFood);

		  if($current ==0){
			 	$fooddata = $this->Custommodel->Select_common_where('food_master','id',$foodArray[$key]['foodId']);
			$calories += $quan * $fooddata[0]['calories'];
			$carbohydrates += $quan * $fooddata[0]['carbohydrates'];
			$fat += $quan * $fooddata[0]['fat'];
			$sodium +=$quan * $fooddata[0]['sodium'];
			$iron += $quan * $fooddata[0]['iron'];
			$fibre += $quan * $fooddata[0]['d_fibre'];
			$protein += $quan * $fooddata[0]['protein'];
			
			$foodName = $fooddata[0]['food_name']; // get food name from db
			$combinationfoodname .= "+".$foodArray[$key]['quantity']." ". $foodName;
			$combinationfoodname = ltrim ($combinationfoodname,'+');
			 // insert in to db
			 $data = array(

			 		'foodId'  => $foodArray[$key]['foodId'],
			 		'quantity'  => $foodArray[$key]['quantity'],
			 		'calories'  =>$quan * $fooddata[0]['calories'],
			 		'portion'  =>$quan * $fooddata[0]['protein'],
			 		'carbohydrates'  => $quan * $fooddata[0]['carbohydrates'],
			 		'fat'  => $quan * $fooddata[0]['fat'],
			 		'sodium'  => $quan * $fooddata[0]['sodium'],
			 		'iron'  => $quan * $fooddata[0]['iron'],
			 		'd_fibre'  => $quan * $fooddata[0]['d_fibre'],
			 		'food_combination_no' => $getMaxCombination,
			 		'no_of_chart' => $maxFoodId

			 				);
			 $this->Custommodel->insert_common('foodCombination',$data); // adding data into foodCombination table

			 //update all total entries in db in the basis of 
			  $totalval = array(
			  	'totalprotein' => $protein,
			 		'totalcalories'  => $calories,
			 		'totalcarbohydrates'  => $carbohydrates,
			 		'totalfat'  => $fat,
			 		'totalsodium'  => $sodium,
			 		'totaliron'  => $iron,
			 		'totald_fibre'  => $fibre,
			 		'foodcombination_name' =>$combinationfoodname,
			 		'creation_on'  => time(),
			 		'placement'    => $plac,
			 		'upperplacement' => $plac,
			 		'foodCategory' => $_POST['food_cat'],

			 				);
			 $this->Dietmodel->update_foodcombination($totalval,$getMaxCombination,$maxFoodId); // updatinng foodcombination
			  // $this->Dietmodel->update_foodcombination1($totalval,$getMaxCombination,$maxFoodId);
			    $calories = 0;
				$carbohydrates = 0;
				$fat = 0;
				$sodium = 0;
				$iron = 0;
				$fibre = 0;
				$protein =0;;
			    $getMaxCombination = $getMaxCombination+1; 
			    $combinationfoodname = '';

			
			}else{
				
				$combinationfoodname = '';
				$fooddata = $this->Custommodel->Select_common_where('food_master','id',$foodArray[$key]['foodId']);
				$calories += $quan * $fooddata[0]['calories'];
				$carbohydrates += $quan * $fooddata[0]['carbohydrates'];
				$fat += $quan * $fooddata[0]['fat'];
				$sodium +=$quan * $fooddata[0]['sodium'];
				$iron += $quan * $fooddata[0]['iron'];
				$fibre += $quan * $fooddata[0]['d_fibre'];
				$protein += $quan * $fooddata[0]['protein'];
				$foodName = $fooddata[0]['food_name']; // get food name from db
				$combinationfoodname .= "+".$foodArray[$key]['quantity']." ". $foodName;


				 // insert in to db
				 $data = array(

			 		'foodId'  => $foodArray[$key]['foodId'],
			 		'quantity'  => $foodArray[$key]['quantity'],
			 		'calories'  =>$quan * $fooddata[0]['calories'],
			 		'portion'  =>$quan * $fooddata[0]['protein'],
			 		'carbohydrates'  => $quan * $fooddata[0]['carbohydrates'],
			 		'fat'  => $quan * $fooddata[0]['fat'],
			 		'sodium'  => $quan * $fooddata[0]['sodium'],
			 		'iron'  => $quan * $fooddata[0]['iron'],
			 		'd_fibre'  => $quan * $fooddata[0]['d_fibre'],
			 		'food_combination_no' => $getMaxCombination,
			 		'no_of_chart' => $maxFoodId

			 				);
			   $this->Custommodel->insert_common('foodCombination',$data);
			}
		}
		$totalval['no_of_chart'] = $maxFoodId;

		return $totalval;
 		
		// redirect('Admin/foodCombinationList');
	}

	public function getcaldata_foodid_new($foodArray){
		# what it do 
		# it calculates total nutritional values of a foodcobinition 
		#by fetching each food item from food master
		$calories = 0;
		$carbohydrates = 0;
		$fat = 0;
		$sodium = 0;
		$iron = 0;
		$fibre = 0;
		$protein = 0;
		$combinationfoodname = '';
		$fc_name = '';
		 
		foreach ($foodArray as $key => $value) {
			$quan = $foodArray[$key]['quantity'];
			$fooddata = $this->Custommodel->Select_common_where('food_master','id',$foodArray[$key]['foodId']);
			$calories += $quan * $fooddata[0]['calories'];
			$carbohydrates += $quan * $fooddata[0]['carbohydrates'];
			$fat += $quan * $fooddata[0]['fat'];
			$sodium +=$quan * $fooddata[0]['sodium'];
			$iron += $quan * $fooddata[0]['iron'];
			$fibre += $quan * $fooddata[0]['d_fibre'];
			$protein += $quan * $fooddata[0]['protein'];
			$foodName = $fooddata[0]['food_name']; // get food name from db
			$combinationfoodname .= "+".$quan." ". $foodName;
			$fc_name .= "+".$quan." (".$foodArray[$key]['unit'].") ". $foodName;
			$fcidquan[] = "($quan+".$foodArray[$key]['foodId'].")";
		}
		$combinationfoodname = ltrim ($combinationfoodname,'+');
		$fc_name = ltrim ($fc_name,'+');
		# $chart_data = $this->Custommodel->Select_common_where('foodCombination_new','foodcombination_name',$combinationfoodname);
		# to find the exact food combination in fc table

		$chart_data = $this->Dietmodel->search_fc_in_fcnew('foodCombination_new',$fcidquan);

		//  pr($chart_data,'chart data');
		 $totalval = array(
						'totalprotein' => $protein,
						 'totalcalories'  => $calories,
						 'totalcarbohydrates'  => $carbohydrates,
						 'totalfat'  => $fat,
						 'totalsodium'  => $sodium,
						 'totaliron'  => $iron,
						 'totald_fibre'  => $fibre,
						 'foodcombination_name' =>$combinationfoodname,
						 'fc_name' =>$fc_name,
						 'no_of_chart' => $chart_data[0]['no_of_chart']
						 );
			unset($chart_data);
		 return $totalval;
 
	}

	public function addCombinationwith_foodid_new($foodArray){

		# get max chart number created in the database food id from db
		$chart = $this->Custommodel->Select_common_orderby_limit('foodCombination_new','no_of_chart',1);
		$maxFoodId = $chart[0]['no_of_chart']+1; 
 

		$noFood = count($foodArray);
		$calories = 0;
		$carbohydrates = 0;
		$fat = 0;
		$sodium = 0;
		$iron = 0;
		$fibre = 0;
		$protein = 0;
		$food_item_no = $noFood;
		
 
		
		$combinationfoodname = '';
		$fc_name = '';
		$foodId_quantity = array();
		$food_category = 1;
		$foodidquan = '';

		foreach($foodArray as $key => $value )
		{ #pr($foodArray);
			# quantity of food item 
			#if zero then move to next iteration
			$quan = $foodArray[$key]['quantity'];
		  if($quan=='0'){
		  	continue;
		  }
			$fooddata = $this->Custommodel->Select_common_where('food_master','id',$foodArray[$key]['foodId']);
 
			$calories += $quan * $fooddata[0]['calories'];
			
			$carbohydrates += $quan * $fooddata[0]['carbohydrates'];
			$fat += $quan * $fooddata[0]['fat'];
			$sodium +=$quan * $fooddata[0]['sodium'];
			$iron += $quan * $fooddata[0]['iron'];
			$fibre += $quan * $fooddata[0]['d_fibre'];
			$protein += $quan * $fooddata[0]['protein'];
			$foodName = $fooddata[0]['food_name']; // get food name from db

			$combinationfoodname .= "+".$foodArray[$key]['quantity']." ". $foodName;
			$fc_name .= "+".$foodArray[$key]['quantity']." (".$foodArray[$key]['unit'].") ". $foodName; // new col
			$foodidquan .= "(".$foodArray[$key]['quantity']."+".$foodArray[$key]['foodId'].")"; // new col

			$foodId_quantity[$foodArray[$key]['foodId']] = $quan;
			$food_category = $fooddata[0]['food_category'];

			if($fooddata[0]['food_category'] ==2 ){
				$food_category = $fooddata[0]['food_category']; 
			}elseif($fooddata[0]['food_category'] == 3 && $food_category == 1){
				$food_category = $fooddata[0]['food_category']; 
			}
			$mapdata[] = ['foodId' => $foodArray[$key]['foodId'] , 'quantiy' => $quan , 'foodCombinationId' => '' , 'no_of_chart' => '' ]; 
		}
		$combinationfoodname = ltrim ($combinationfoodname,'+');
		$fc_name  = ltrim ($fc_name ,'+');

		$data = array(
			'foodcombination_name' => $combinationfoodname,
			'fc_name' => $fc_name,
			'no_of_chart' => $maxFoodId ,
			'foodCategory'  => $food_category,
			'foodId_quantity'  => serialize($foodId_quantity),
			'fcidquan'  => $foodidquan,
			'food_item_no'  => $food_item_no,
			'totalcalories'  =>$calories,
			'totalprotein'  =>$protein,
			'totalcarbohydrates'  => $carbohydrates,
			'totalfat'  => $fat,
			'totalsodium'  => $sodium,
			'totaliron'  => $iron,
			'totald_fibre'  => $fibre,
			'verified' => 3 , # for testing
			'updated_dt' => date("Y-m-d H:i:s")
		);
 
		 $fcid = $this->Custommodel->insert_common('foodCombination_new',$data);
	 
		 if($fcid > 0 ){
			foreach($mapdata as $key => $value )
			{ 
				$idata = ['foodId'=> $value['foodId'] , 'quantiy'=> $value['quantiy'] , 'foodCombinationId'=> $fcid ,  'no_of_chart'=> $maxFoodId  ];
				$this->Custommodel->insert_common('foodCombination_new',$idata);
			}
		 }
		return $data;

	}



	# extra pages 
	# foodchart update check page

	public function foodchartCheck(){
		// check meals cobination calories tables wise

		$Auth = $this->Auth;
		// pr($Auth);
		if($Auth){
				// $data['all_food']=$this->Dietmodel->all_food();
				$data= [];
				$this->load->view('Admin/foodchart/daywiseentryCheck.php');
				// adminloadview('foodchart/daywiseentryCheck.php',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}

	}

	public function foodcombination_manage()	{	
			$data['all_food']=$this->Dietmodel->all_food();
			$data['message']=$this->Dietmodel->get_fc_data();
			$data['totalcount']=$this->Custommodel->count_common('foodCombination_new','verified=1');
			// prd($data['message']);
		 $this->load->view('Admin/foodchart/foodcombinationManageAT.php',$data);
		 
	}


	public function update_foodcombination_new( )	{	
		if(isset($_POST['delete'])){
			pr($_POST);
			if($_POST['fcid']){
				$fcid =$_POST['fcid'];
				# delete query 
			}

		}elseif(isset($_POST['submit'])){

			prd($_POST);
		 
		 if($_POST['fcid']){
			 $fcid =$_POST['fcid'];
			 $fc_cat =$_POST['fc_cat'];
			 $total_calorie =$_POST['total_calorie'];
			 $total_protein =$_POST['total_protein'];
			 $total_cabs =$_POST['total_cabs'];
			 $total_fat =$_POST['total_fat'];
			 $total_sodium =$_POST['total_sodium'];
			 $total_iron =$_POST['total_iron'];
			 $total_fibre =$_POST['total_fibre'];
 
	
 
			 foreach($_POST['1_morning_data_food2'] as $key=> $value){
				 if($_POST['1_morning_data_quantity'][$key] != 0){
					 $foodidquan[$value] =$_POST['1_morning_data_quantity'][$key];
				 }
			 }
		
			 $itemno = count($foodidquan);
			 $foodidquan = serialize($foodidquan);
			 // pr($foodidquan);
 
			 $data['foodCategory'] = $fc_cat;
			 $data['foodId_quantity '] = $foodidquan;
			 $data['food_item_no '] = $itemno;
 
			 $data['totalcalories'] = $total_calorie;
			 $data['totalprotein'] = $total_protein;
			 $data['totalcarbohydrates'] = $total_cabs;
			 $data['totalfat'] = $total_fat;
			 $data['totalsodium'] = $total_sodium;
			 $data['totaliron'] = $total_iron;
			 $data['totald_fibre'] = $total_fibre;
			 $data['verified'] = 1;
 
			 // $data
			 $data['updated_dt'] =  $this->time;
			 // pr($data);
			 $updateresp = $this->Custommodel->update_common($data,'foodCombination_new','id',$fcid);
			 // pr($updateresp);
			 if($updateresp == 1){
				 $_SESSION['fcupdatecount'] += 1;
				 
				 redirect('Admin/foodcombinationManage?success='.$fcid,'refresh');
				 
			 }else{
				 redirect('Admin/foodcombinationManage?error='.$fcid,'refresh');
			 }
		 }else{
			 redirect('Admin/foodcombinationManage?IDmissing=1','refresh');
	
		 }
		}



	}

} // class ends