<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");



class Api extends CI_Controller {

	function __construct() {
			parent::__construct();
		
			$this->load->model('Common_model' , 'cmm');
			$this->load->model('Custommodel');
			$this->load->model('Dietmodel');
			$this->load->model('User_model');

			// direct call to this controller  will be authenticated

			$auth= getallheaders();
			// print_r($auth);
			@$token = $auth['Auth'];
			//$token  = 'wCkSe8Wgptn6mlW4Y4QI08ScCBfjOAJkc4dqc9HBD4I0qE4oJV7K4ZWGAb0pLJKYNXpZ76BLajL';
			$this->Checkauth($token);
			$fi = "apidoc.txt";
			$m =  file_get_contents('php://input');
			$txt = $m;
			$txt.= json_encode($auth); # remove this has token value 
			#$myfile = file_put_contents($fi, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
			#$myfile = file_put_contents($fi, $txt.PHP_EOL);
        
    } 
 	

 	public function checkat2(){
 		echo "success check at 2";
 	}
	 // made by at --- 
	public function User_expired(){
		
		$paid_user = $this->User_model->user_expired();
		if($paid_user || $non_paid_user){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'expireduser' => $paid_user];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
			echo json_encode($response); 
			exit();

		}

	}
	public function User_all(){
		
		$all_user = $this->User_model->User_all();
		if($all_user){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'alluser' => $all_user];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
			echo json_encode($response); 
			exit();
		}
	}
	public function User_fornotfilled(){
		
		$user = $this->User_model->User_fornotfilled();
		if($user){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'formnotfilled' => $user];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
			echo json_encode($response); 
			exit();
		}
	}
	public function User_contactform(){
		
		$data = $this->User_model->user_contactform();
		if($data ){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'contactform' => $data];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
			echo json_encode($response); 
			exit();

		}

	 
	}

	public function User_list_by_disease(){
		// not in use
		$postdata = postdata();
		$diseases = json_decode(json_encode($postdata), true);
		$data = $this->User_model->user_list_by_disease($diseases);
  
		if($data ){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'data' => $data];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
			echo json_encode($response); 
			exit();

		}
	 
	}

	public function UserChartid_by_userid(){
		// calling from ajax // chart preparation reallot
		$post = $_POST;
		$cid = $post['cid'];
		$data1 = $this->User_model->UserCharthistory_by_userid($cid);
   
		$data2 = $this->User_model->userdata_by_id($cid);
  
		if($data1 && $data2 ){
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'charthistory' => $data1 , 'userdata' => $data2];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
			echo json_encode($response); 
			exit();

		}
	}


	 // made by at --- 
	public function user_pay_history(){
		$postdata = postdata();
		@$user_id = $postdata->user_id;
		$table='Plan'; $col= 'user_id'; $colvalue=$user_id;
		$data = $this->Custommodel->Select_common_where($table,$col,$colvalue);
		if($data ){
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'payhistory' => $data];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => FAILURE , 'response_message' => 'No  Data Found !' ];
			echo json_encode($response); 
			exit();

		}
	}
	public function finalchartreset(){
		$postdata = postdata();
		@$user_id = $postdata->user_id;

		$table = 'customers_info';
				$data = array(
					'meal_chart_id'  => '0',
				);
			$lastid = $this->Custommodel->update_common($data,$table,'id',$user_id);
			echo $lastid;
	}
	public function update_staartandend_date(){
		$postdata = postdata();
		// print_r($postdata);
		// exit();
		// die();
		@$user_id = $postdata->user_id;
		@$start_date = $postdata->start_date;
		@$plantype = $postdata->plantype;
		@$chartid = $postdata->chartid;
		if($plantype == 1){
			$loop= 15;
			$endate =  date('Y-m-d', strtotime($start_date. ' + 14 days'));
		}else{
			$loop= 30;
			$endate =  date('Y-m-d', strtotime($start_date. ' + 29 days'));
		}
		$finalresp = 1;
		if($chartid != 0){
			for ($i=0; $i < $loop ; $i++) { 
				$day = $i+1;
				$mealdate =  date('Y-m-d', strtotime($start_date. ' + '.$i.' days'));
	
			// $resp = $this->Custommodel->update_common($data,$table,'id',$user_id);
				
			$resp = $this->cmm->custqueryiud("UPDATE `customers_chart_final` SET meal_date = '$mealdate' where chart_id = $chartid && cust_id = $user_id && day = $day ");
			
				if($resp == 0 ){
					$finalresp = 0;
				}
			}
		}

		if($finalresp != 0 || $chartid == 0){ 	
			$table = 'customers_info';
					$data = array(
						'meal_start_date'  => $start_date,
						'meal_end_date'  => $endate,
					);
				$lastid = $this->Custommodel->update_common($data,$table,'id',$user_id);
				
				// update call schedule 7 day when update 
				// delete old schedule
				#update ::  now for updating call schedule manual button added to paid user screen
				// $this->db->where('user_id', $user_id);
				// $this->db->delete('call_schedule');
				// // add new schedule
				// $this->check_add($start_date,$endate,$user_id); 

				echo $lastid;
		}
	}
	// need to solve one extra day problem when month is of 31
	public function update_staartandend_date_renew(){
		$postdata = postdata();
		@$user_id = $postdata->user_id;
		@$start_date = $postdata->start_date;
		@$plantype = $postdata->plantype;
		@$chartid = $postdata->chartid;
		if($plantype == 1){
			$loop= 15;
			$endate =  date('Y-m-d', strtotime($start_date. ' + 14 days'));
		}else{
			$loop= 30;
			$endate =  date('Y-m-d', strtotime($start_date. ' + 29 days'));
		}
		$finalresp = 1;
		if($chartid != 0){
			for ($i=0; $i <$loop ; $i++) { 
				$day = $i+1;
				$mealdate =  date('Y-m-d', strtotime($start_date. ' + '.$i.' days'));
	
				$resp = $this->cmm->custqueryiud("UPDATE `customers_chart_final` SET meal_date = '$mealdate' where chart_id = $chartid && cust_id = $user_id && day = $day ");
				
					if($resp == 0 ){
						$finalresp = 0;
					}
			}
		}

		if($finalresp != 0 || $chartid == 0){ 	
			$table = 'customers_info';
				$data = array(
					'renew_start_date'  => $start_date,
					'renew_end_date'  => $endate,
				);
				$lastid = $this->Custommodel->update_common($data,$table,'id',$user_id);
			echo $lastid;
		}
		// now we add call schedule in cron when we shift renew data to main::
	}

	public function update_callschedule(){
		$postdata = postdata();
	 
		@$user_id = $postdata->user_id;
		@$start_date = $postdata->start_date;
		@$enddate = $postdata->enddate;
		// echo $user_id;
	 
		$this->db->where('user_id', $user_id);
		$this->db->delete('call_schedule');
		// $start_date = '2022-09-10';
		// $enddate = '2022-09-25';
		 echo $resp = $this->check_add($start_date,$enddate,$user_id); 

	}
	// extra function for call shedule // at 
	public function check_add($f_date,$l_date,$uid){	
		$f_date = $this->get_seveth_day($f_date,$l_date,$uid);
		if($f_date){
			$f_date = $this->get_seveth_day($f_date,$l_date,$uid);
			$this->check_add($f_date,$l_date,$uid);
		} 
		return $uid;
	}
	public function get_seveth_day($f_date,$l_date,$uid){
			
		$Date = $f_date;
		$c_date =  date('Y-m-d', strtotime($Date. ' + 7 days'));
		if($c_date<$l_date){
			$seven_day = array(
				'user_id' => $uid,
				'call_date' => $c_date,
				'status'  => 1,
				'updated_dt'=> date('Y-m-d H:i:s')
			);
			$this->Custommodel->insert_common('call_schedule',$seven_day);
			return $c_date;
		}else{
			$c_d = '';
			return $c_d;
		}
	}

 	// user notes by admin ::
	public function Userdata_notes(){	
		$postdata = postdata();
		@$user_id = $postdata->user_id;

		$res = $this->Custommodel->Select_common_where('customer_notes_byadmin' , 'user_id' , $user_id);
	 
			if($res){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'data' => $res];
				echo json_encode($response); 

				exit();

			}else{
				$response = ['response_code' => FAILURE , 'response_message' => 'No Data Found' ];
				echo json_encode($response); 
				exit();

			}
		echo json_encode($res); 
		exit();
 	}
 	public function Add_notes(){
 		$postdata = postdata();
 		@$user_id = $postdata->user_id;
 		@$note = $postdata->message;

 		$table = 'customer_notes_byadmin';
			$data = array(
				'user_id'  =>  $user_id,
				'title'  => 'NA',
				'note' => $note,
				'added_datetime' => ''.date('Y-m-d H:i:s'),
			);
		$lastid = $this->Custommodel->insert_common($table,$data);
		
		if($lastid){
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success'];
			echo json_encode($response); 
			exit();
		}else{
			$response = ['response_code' => FAILURE , 'response_message' => 'Something Went Wrong' ];
			echo json_encode($response); 
			exit();
		}
 
 	}
  // dashboard data :: 
	public function dashboard_data(){	
		$postdata = postdata(); // find and convert json
		
		$table = 'customers_info';
														// first call remaining
		// $where ="first_call_done = 0 AND is_payment_done = 1";   //same
		$where = array('first_call_done' => 0, 'is_payment_done' => 1 , 'user_type' => '1');
		$res_first_call = $this->Custommodel->count_common($table,$where);
														// plans to be sent 
		$where = array( 'is_payment_done' => 1 , 'first_call_done' => 1, 'user_type' => '1');
		$res_plans_to_sent = $this->Custommodel->count_common($table,$where);
		// revenue 
		$rev_queries = "SELECT ( SELECT SUM(`plan_amount`) FROM `Plan` ) as `total_rev` , 
		(SELECT SUM(plan_amount) FROM `Plan` WHERE DATE(updated_dt) = DATE(NOW()) ) as today_rev , 
		(SELECT SUM(plan_amount) FROM `Plan` WHERE DATE(updated_dt) >= DATE(NOW() - INTERVAL 7 DAY) AND DATE(updated_dt) <= DATE(NOW()) ) as week_rev , 
		(SELECT SUM(plan_amount) FROM `Plan` WHERE DATE(updated_dt) >= DATE(NOW() - INTERVAL 1 MONTH) AND DATE(updated_dt) <= DATE(NOW())) as month_rev,	
		(SELECT count(id) FROM `transaction_history` where `status` = 'TXN_FAILURE' ) as f_transaction ,
		(SELECT count(`id`) FROM `customers_info` where `is_payment_done`= 1 ) as paid_member,
		(SELECT count(`id`) FROM `customers_info` where `is_payment_done`= 0 ) as unpaid_member
		" ;

		$resp_rev = $this->cmm->custquery0($rev_queries);
		// pr($resp_rev);
		$response = [
			'response_code' => SUCCESS , 
			'response_message' => 'Success',
			'res_first_call' => $res_first_call,
			'res_plans_to_sent' => $res_plans_to_sent,
			'total_rev' => $resp_rev['total_rev'],
			'today_rev' => $resp_rev['today_rev'],
			'week_rev' => $resp_rev['week_rev'],
			'month_rev' => $resp_rev['month_rev'],
			'f_transaction' => $resp_rev['f_transaction'],
			'paid_member' => $resp_rev['paid_member'],
		];
		echo json_encode($response); 
		exit();
	}

	//--------made by old developer -------------
	public function Checkauth($token){
		// check token from admin table

		if(empty($token)){
			$response = ['response_code' => FAILURE , 'response_message' => 'Token Missing' ];
			echo json_encode($response);
			exit();
		}
		$table = 'admin_sessions';
		$where ='token';
		$id = $token;
		$result = $this->Custommodel->Select_common_where($table,$where,$id);
		if(empty($result)){
			$response = ['response_code' => FAILURE , 'response_message' => INVALID_AUTH ];
			echo json_encode($response); 
			exit();
		}
	}
	public function Checkauthpost(){
		// need to define the use of this function

			$postdata = postdata();
			@$token = $postdata->token;
			if(empty($token)){
				$response = ['response_code' => FAILURE , 'response_message' => 'Token Missing'.$token ];
				echo json_encode($response);
				exit();
			}

		$table = 'admin_sessions';
		$where ='token';
		$id = $token;
		$result = $this->Custommodel->Select_common_where($table,$where,$id);
		if(empty($result)){
			$response = ['response_code' => FAILURE , 'response_message' => INVALID_AUTH.$token2 ];
			
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'VALID_AUTH' ];
		}
		echo json_encode($response); 
			exit();

	}
	
	// user list with type filter ::
	public function user_list(){
		 $postdata = postdata();
		@$type = $postdata->type;
	 	// echo json_encode($type); 

	 	$table = 'customers_info';
	 	if ($type == 'first_call') {
			// remainig first call after payment 
	 		$where = array('ci.first_call_done' => 0, 'ci.is_payment_done' => 1);
	 	}elseif ($type == 'first_call_done') {
			// where user have their first call done
	 		$where = array( 'first_call_done' => 1);
	 	}elseif ($type == 'plan_to_sent') {
			$where = array( 'is_payment_done' => 1 , 'first_call_done' => 1);
		}
		$res_user_data = $this->User_model->user_list($where);
 		if($res_user_data){
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'user_data' => $res_user_data ];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ,  'user_data' => $res_user_data ];
			echo json_encode($response); 
			exit();
 		}
	}
	public function Userdata_paid(){
		
		$paid_user = $this->User_model->userdata(1);

		if($paid_user){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'Paiduser' => $paid_user];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
			echo json_encode($response); 
			exit();
		}
	}
	public function Userdata_nonpaid(){
		// $non_paid_user = $this->User_model->userdata(2);
		$non_paid_user = $this->User_model->userdata_unpaid();
		if($non_paid_user){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'NonPaid' => $non_paid_user];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
			echo json_encode($response); 
			exit();
		}
	}
	public function Userdata_renew(){
		// both active and expired user
		// $non_paid_user = $this->User_model->userdata(2);
		$renew_user = $this->User_model->userdata_forrenew();
		if($renew_user){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'ReNew' => $renew_user];
			echo json_encode($response);  
			exit();
		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
			echo json_encode($response); 
			exit();
		}
	}
	//------------------- old developer code -------
	
	// public function Userdata(){
	// 	// not using for paid user
	// 	$paid_user = $this->User_model->userdata(1);
	// 	$non_paid_user = $this->User_model->userdata(2);
	// 	if($paid_user || $non_paid_user){
	// 			$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'Paiduser' => $paid_user,'NonPaid' => $non_paid_user];
	// 		echo json_encode($response);  
	// 		exit();
	// 	}else{
	// 		$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
	// 		echo json_encode($response); 
	// 		exit();
	// 	}
	// }

	public function Userdatadetails(){
		$postdata = postdata();
		@$user_id = $postdata->user_id;
		@$renew = $postdata->renew;
		
		if($user_id){
			if($renew){
				$result = $this->Dietmodel->Userdatadetails($user_id,$renew);
			}else{
				$result = $this->Dietmodel->Userdatadetails($user_id);
			}

			if($result){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'data' => $result];
				echo json_encode($response); 

				exit();

			}else{
				$response = ['response_code' => SUCCESS , 'response_message' => 'No Data Found' ];
				echo json_encode($response); 
				exit();

			}
			
		}else{
			$response = ['response_code' => FAILURE , 'response_message' => 'Request Parameter Missing' ];
			echo json_encode($response); 
			exit();

		}
		
	 
	}
	public function UserAllPlanDetails(){
		$postdata = postdata();
		@$user_id = $postdata->user_id;
 
		if($user_id){
			 $result = $this->Dietmodel->UserPlans($user_id);

			if($result){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'data' => $result];
				echo json_encode($response); 

				exit();

			}else{
				$response = ['response_code' => SUCCESS , 'response_message' => 'No Data Found' ];
				echo json_encode($response); 
				exit();

			}
			
		}else{
			$response = ['response_code' => FAILURE , 'response_message' => 'Request Parameter Missing' ];
			echo json_encode($response); 
			exit();

		}
	}

	public function foodlist(){
		$postdata = postdata();
		if($postdata->id !=''){
			$id = $postdata->id;
		}else{
			$id='';
		}
		$result = $this->Dietmodel->foodlist($id);
		if($result){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'data' => $result];
				echo json_encode($response); 
				exit();

		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No Data Found' ];
			echo json_encode($response); 
			exit();

		}

	}

	public function Listing(){
		$postdata = postdata();
		if($postdata->option == 'Disease'){
			$table = 'disease';
		}elseif($postdata->option == 'Nutrition'){
			$table = 'Nutrition';
		}elseif($postdata->option == 'Units'){
			$table = 'Units';
		}elseif($postdata->option == 'Placement'){
			$table = 'Placement';
		}elseif($postdata->option == 'Foodcategory'){
			$table = 'food_category';
		}elseif($postdata->option == 'Foodtype'){
			$table = 'food_type';
		}
		if($postdata->id != ''){
			$id = $postdata->id;
			$where ='id';
			$result = $this->Custommodel->Select_common_where($table,$where,$id);
		}else{
			$result = $this->Custommodel->Select_common($table);			
		}
		
		if($result){
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'data' => $result];
			echo json_encode($response); 
			exit();

		}else{
			$response = ['response_code' => SUCCESS , 'response_message' => 'No Data Found' ];
			echo json_encode($response); 
			exit();

		}
	}

	public function AddUpdate(){

		$postdata = postdata();
		if($postdata->option == 'Disease'){
			$table = 'disease';
			$data = array(
				'name'  => $postdata->name,
				'description'  => $postdata->description,			
						);
		}elseif($postdata->option == 'Nutrition'){
			$table = 'Nutrition';
			$data = array(
				'name'  => $postdata->name,
				'description'  => $postdata->description,			
						);
		}elseif($postdata->option == 'Units'){
			$table = 'Units';
			$data = array(
				'name'  => $postdata->name,
				'description'  => $postdata->description,			
						);
		}elseif($postdata->option == 'Placement'){
			$table = 'Placement';
			$data = array(
				'name'  => $postdata->name,
				'description'  => $postdata->description,			
						);
		}elseif($postdata->option == 'Foodcategory'){
			$table = 'food_category';
			$data = array(
				'name'  => $postdata->name,
				'description'  => $postdata->description,			

						);
		}elseif($postdata->option == 'Foodtype'){
			$table = 'food_type';
			$data = array(
				'name'  => $postdata->name,
				'description'  => $postdata->description,
						);
		}
		if($postdata->id != ''){
			$id = $postdata->id;
			$where = 'id';
			$this->Custommodel->update_common($data,$table,$where,$id);
		}else{
			$this->Custommodel->insert_common($table,$data);
		}
		$response = ['response_code' => SUCCESS , 'response_message' => 'Success'];
			echo json_encode($response); 
			exit();
		
	}

	public function Delete(){

		$postdata = postdata();
		if($postdata->option == 'Disease'){
			$table = 'disease';
			
		}elseif($postdata->option == 'Nutrition'){
			$table = 'Nutrition';
			
		}elseif($postdata->option == 'Units'){
			$table = 'Units';
			
		}elseif($postdata->option == 'Placement'){
			$table = 'Placement';
			
		}elseif($postdata->option == 'Foodcategory'){
			$table = 'food_category';
		}elseif($postdata->option == 'Foodtype'){
			$table = 'food_type';
		}elseif($postdata->option == 'FoodMaster'){
			$table =  'food_master';
		}
		$id = $postdata->id;
		if($id != ''){

		$where = 'id';
		$this->Custommodel->delete_common($where,$id,$table);
		$response = ['response_code' => SUCCESS , 'response_message' => 'Success'];
			echo json_encode($response); 
			exit();

		}else{
			$response = ['response_code' => FAILURE , 'response_message' => 'Id is Missing' ];
			echo json_encode($response); 
			exit();

		}
	}

	public function Requestcall(){

		$postdata = postdata();	
		if($postdata->user_id == ''){
			$response = ['response_code' => FAILURE , 'response_message' => 'Id is Missing' ];
			echo json_encode($response); 
			exit();
		}else{
			$result = $this->Dietmodel->requestcall($postdata);
			if($result){
				// Already Requested For a call

				$response = ['response_code' => SUCCESS , 'response_message' => 'Success'];
			echo json_encode($response); 
			exit();

			}else{
				// Call completed or never requested
				$response = ['response_code' => FAILURE , 'response_message' => 'Id is Missing' ];
			echo json_encode($response); 
			exit();
			}
		}	
	}

	public function Foodmaster(){
			$postdata = postdata();
			
			$table = 'food_master';
			$data = array(
				'food_name'  => $postdata->food_name,
				'food_category'  => $postdata->food_category,
				'food_type'  => $postdata->food_type,
				'ingredients'  => $postdata->ingredients,
				'recipe'  => $postdata->recipe,
				'calories'  => $postdata->calories,
				'protein'  => $postdata->protein,
				'carbohydrates'  => $postdata->carbohydrates,
				'fat'  => $postdata->fat,
				'sodium'  => $postdata->sodium,
				'iron'  => $postdata->iron,
				'd_fibre'  => $postdata->d_fibre,
				'unit'  => $postdata->unit,
				'portion'  => 1,
						);
			if($postdata->id != ''){
			$id = $postdata->id;
			$where = 'id';
			$this->Custommodel->update_common($data,$table,$where,$id);
			$lastid ='11';
			}else{
			$lastid = $this->Custommodel->insert_common($table,$data);
			}
			if($lastid){
					$response = ['response_code' => SUCCESS , 'response_message' => 'Success'];
			echo json_encode($response); 
			exit();
		}else{
			$response = ['response_code' => FAILURE , 'response_message' => 'Something Went Wrong' ];
			echo json_encode($response); 
			exit();
		}
		
		
	}

	public function userPlanStart(){
		//$postdata = postdata();
		$userId = 4;
		$table = 'customer_diet_plan';
 		$data = array('customer_id' => $userId, );
		$this->Custommodel->insert_common($table,$data);
		$response = ['response_code' => SUCCESS , 'response_message' => 'Plan Created'];
			echo json_encode($response); 
			exit();
	}

	public function getSeventhDay(){
		$postdata = postdata();
		$day = $postdata->day;
		$table = 'customer_diet_plan'; 
		$column = 'day_'.$day ;
		$status = 1; // 0- upcoming,1- current ,2- complete
		$result = $this->Custommodel->getDay($table,$column,$status);
		
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success','day' => $day,'result' => $result];
			echo json_encode($response); 
			exit();
		
	}
	public function renewCustomer(){
		$postdata = postdata();
		$userId = $postdata->userId;

		$table = 'customer_diet_plan';
		$where ='customer_id';
		$result = $this->Custommodel->Select_common_where($table,$where,$userId);
		$renewal = $result[0]['renewal'] +1;
		$data = array(
			'day_1' => 0,
			'day_2' => 0 ,
			'day_3'=> 0 ,
			'day_4'=> 0 ,
			'day_5'=> 0 ,
			'day_6'=> 0 ,
			'day_7'=> 0 ,
			'day_8'=> 0 ,
			'day_9'=> 0 ,
			'day_10'=> 0 ,
			'day_11'=> 0 ,
			'day_12'=> 0 ,
			'day_13'=> 0 ,
			'day_14'=> 0 ,
			'day_15'=> 0 ,
			'day_16'=> 0 ,
			'day_17'=> 0 ,
			'day_18'=> 0 ,
			'day_19'=> 0 ,
			'day_20'=> 0 ,
			'day_21'=> 0 ,
			'day_22'=> 0 ,
			'day_23'=> 0 ,
			'day_24'=> 0 ,
			'day_25'=> 0 ,
			'day_26'=> 0 ,
			'day_27'=> 0 ,
			'day_28'=> 0 ,
			'day_29'=> 0 ,
			'day_30'=> 0 ,
			'renewal' => $renewal
					);


			$this->Custommodel->update_common($data,$table,$where,$userId);
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success'];
			echo json_encode($response); 
			exit();

	}

	public function foodPagi(){
		$postdata = postdata();
		$foodname_search = $postdata->foodname_search;
		$placement_search = $postdata->placement_search;
		$foodtype_search = $postdata->foodtype_search;
		$result = $this->Dietmodel->foodPagi($foodname_search,$placement_search,$foodtype_search);			
		
		
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success','result' => $result];
			echo json_encode($response); 
			exit();
	}
	public function getFoodcombination(){

		$postdata = postdata();
		//	pr($postdata);die;
		$table = 'foodCombination'; 
		$start = $postdata->start;
		$length = $postdata->length;
		$foodname_search = $postdata->foodname_search;
		$placement_search = $postdata->placement_search;
		$foodtype_search = $postdata->foodtype_search;

		$result = $this->Dietmodel->getFoodcombination($start,$length,$foodname_search,$placement_search,$foodtype_search);			
		
		
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success','result' => $result];
			echo json_encode($response); 
			exit();
		
	}

	public function editFoodCombination(){
	
		$postdata = postdata();	
		
		$foodId = $postdata->foodId;
		$combinationId = $postdata->combinationId;
		$result = $this->Dietmodel->getCombinationDetails($foodId,$combinationId);			
		
		
		$response = ['response_code' => SUCCESS , 'response_message' => 'Success','result' => $result];
		echo json_encode($response); 
		exit();
	}
	public function exerciseList(){
		$postdata = postdata();	
		$id = $postdata->id;
		$result = $this->Dietmodel->exerciseList($id);			
		$response = ['response_code' => SUCCESS , 'response_message' => 'Success','result' => $result];
		echo json_encode($response); 
		exit();
	}
 
 
}
