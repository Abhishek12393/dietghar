<?php defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
class Admin extends CI_Controller {
function __construct() {
	date_default_timezone_set('Asia/Kolkata');
	parent::__construct();
	$this->load->model('Custommodel');
	$this->load->model('Common_model','cmn');
	$this->load->model('User_model');
	$this->load->model('Dietmodel');
	$this->load->model('Facebookreview_model');
	//session autentication :: 
	// prd('session check');
}
// common functions :: =============
public function test(){
	 pr($_SESSION);
	 echo session_save_path();
}
public function logout(){
	session_destroy();
	redirect('Admin/index');
}
public function forgot(){
	$this->load->view('Admin/forgot.php');
}
public function error_404(){
	$this->load->view('Admin/error_404'); 
}
//::---------------------------------
public function index(){
	// pr($_SESSION);
	if(@$_SESSION['Token']){
		redirect('Admin/Dashboard');
	}else{
		$this->load->view('Admin/index.php');
	}
}
// step 1 login 
public function login(){
	$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'),
	);
	$res = Admin_login_api($data);
	#prd($res,'Api response');
	if($res->response_code == 0){
	$_SESSION['username'] = $res->data->username;
	$_SESSION['Token'] = $res->data->Authtoken;
	$_SESSION['role'] = $res->data->role;
	$_SESSION['session_id'] = $res->data->id;
	pr($_SESSION);
	//echo "check 1";
	if($res->data->role == 1){
		redirect('Admin/paid_users_diet');
	}else{
		redirect('Admin/Dashboard');
	}
	}else{
		$this->session->set_flashdata('message', $res->response_message);
		redirect('Admin/index');
		//echo "check 2";
	}
}
public function Dashboard(){
	is_protected();
  if($_SESSION['role'] == 1) {  die('Not accessible');}
	if($_SESSION['Token']){
		$data['call7'] = $this->Dietmodel->check_seven_day_call_dash();
 
		$url = 'Api/dashboard_data';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);

		 $resp_flags = $this->User_model->getflags_for_cust();
		 $data['flag_chartpdf_free'] = $resp_flags['chartpdf_free'];

		$data['first_call'] = $res->res_first_call;
		$data['plans_to_sent'] = $res->res_plans_to_sent;
		$data['total_rev'] = $res->total_rev;
		$data['today_rev'] = $res->today_rev;
		$data['week_rev'] = $res->week_rev;
		$data['month_rev'] = $res->month_rev;
		
		$data['f_transaction'] = $res->f_transaction;
		$data['paid_member'] = $res->paid_member;

		$rem_sms = json_decode($this->get_bulksms_count(),true);
		$data['rem_sms'] = $rem_sms['selectedRoute']."=><br>Remaining Credits :".$rem_sms['remainingcredits']."<br>Validity :".$rem_sms['validity'];
		$this->load->view('Admin/dashboard.php',$data);
		}else{
		redirect('Admin/index');
	 
	}
}

public function updateflag(){
	echo "here";
	$post =  $this->input->post();
	if(!empty($post) && $post['updateflag'] == 1){
		// pr('do the processing');

		if($post['pdfchart_freestat'] == 'on'){
			// pr('update 1');
			$data= ['chartpdf_free'=>  1 ]; 
		}else{
			// pr('update 0');
			$data= ['chartpdf_free'=>  0 ]; 
		}
		$respupdt =  $this->Custommodel->update_common($data,'customers_flags','id','1');
		pr( $respupdt, 'response');
		if($respupdt == 1){
			redirect('Admin/index?success');
		}else{
			redirect('Admin/index');

		}
	}
}


private function get_bulksms_count(){
	$username='dietghar';
	$password='7777519';
	$sender='DIETGR';
	// $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($mobile_number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&&template_id=1207161738045671693";
	$url= "https://login.bulksmsgateway.in/userbalance.php?user=dietghar&password=7777519&type=3";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	return $response;
}

// step 2 dashboard
//public function Dashboard(){ 
//#echo	$tokenstat = isset($_SESSION['Token']) ? "token found" : 'Not found';
//$url = 'Api/dashboard_data';
//$Auth = $_SESSION['Token'];
//$res = api_call($url,$Auth);
//#pr($res, 'Admin Control');
//#prd($_SESSION ,$tokenstat);
//if(isset($_SESSION['Token']) && $res->response_code == 0){
//$data['first_call'] = $res->res_first_call;
//$data['plans_to_sent'] = $res->res_plans_to_sent;
//$data['message'] = $this->Dietmodel->check_seven_day_call(); // <---- empty call 
// prd($data); 
//$this->load->view('Admin/dashboard.php',$data);
//}else{
//session_destroy();
//$this->session->set_flashdata('message', $res->response_message);
//redirect('Admin/index');
//}
//}

	//----user notes -----------------------------------------------//
	public function Notes($id){
		// prd($id);
		$url = 'Api/Userdata_notes';
		$Auth = $_SESSION['Token'];
		$data = array('user_id' => $id);
		$res = api_call($url,$Auth,$data);
		if($res->response_code==0){
			$data['message'] = $res->data;
			// prd($data);
			$this->load->view('Admin/notes.php',$data); 
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	// -------add user specific notes ----- ------ //
	public function add_notes(){
		$url = 'Api/Add_notes';
		$Auth = $_SESSION['Token'];
		// pr($_POST);
		$id = $this->input->post('user_id');
		$data = array( 
			"message" => $this->input->post('enter_message'),
			"user_id" => $this->input->post('user_id'),
				);
		$res = api_call($url,$Auth,$data);
		if($res->response_code==0){
			pr($res);
			redirect('Admin/notes/'.$id);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
	}


	// paid user -- okay :: 
	public function paid_users(){
		$url = 'Api/Userdata_paid';
		$Auth = $_SESSION['Token'];
		// $data = array('user_id' => $id);
		$res = api_call($url,$Auth);
		// prd($res);
		if($res->response_code==0){
			$data['message'] = $res->Paiduser;
			// prd($data); // testing
			$this->load->view('Admin/users/paid_users',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
	}
	public function paid_users_diet(){
		$url = 'Api/Userdata_paid';
		$Auth = $_SESSION['Token'];
		// $data = array('user_id' => $id);
		$res = api_call($url,$Auth);
		// prd($res);
		if($res->response_code==0){
			$data['message'] = $res->Paiduser;
			// prd($data); // testing
			$this->load->view('Admin/users/paid_users_dietician',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
	}


	public function payment_history($id){
		$url = 'Api/user_pay_history';
		$Auth = $_SESSION['Token'];
		$data = array('user_id' => $id);
		$res = api_call($url,$Auth,$data);
		prd($res);
		if($res->response_code==0){
			$data['message'] = $res->payhistory;
			// prd($data); // testing
			$this->load->view('Admin/users/payment_history',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
	}
	//---------------------- made by old developer --------------------- //
	public function first_call($id){
		$url = 'Api/Userdatadetails';
		$Auth = $_SESSION['Token'];
		$data = array('user_id' => $id);
		$res = api_call($url,$Auth,$data);
		if($res->response_code==0){
			$datas['message'] = $res->data;
			$this->load->view('Admin/first_call.php',$datas);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
	}

	public function userprofile($id){
		$datas['role'] = $_SESSION['role'];
		// view control for user profile page 
		$url = 'Api/Userdatadetails';
		$Auth = $_SESSION['Token'];

		$data = array('user_id' => $id);
		$res = api_call($url,$Auth,$data);

		// echo "<pre>";
		// print_r($res->data->dob); // getting date for checking total age
		if($res->response_code==0){
		$datas['user'] = $id;
		$datas['plan_name'] = $res->data->plan_name;
		if($res->data->profileimage == NULL){
			$datas['pimage'] = base_url('admin/global_assets/images/face11.jpg');
		}else{
			$datas['pimage'] = base_url('/'.$res->data->profileimage);
		}
		// prd($res->data );
		$datas['message'] = $res->data;
		// $datas['measurement_history'] = $this->Custommodel->Select_common_where('measurement_history','cust_id',$id);
		$datas['history_measurement'] = $this->Custommodel->Select_common_where('history_measurement','cust_id',$id);
		
			$this->load->view('Admin/users/userprofile.php',$datas);
		}else{
		session_destroy();
		$this->session->set_flashdata('message', $res->response_message);
		redirect('Admin/index');
		}
	}
	public function getLatestUpdate(){
		$userid = $_POST['user'];
		// pr($userid);
		#(SELECT SUM(plan_amount) FROM `Plan` WHERE DATE(updated_dt) = DATE(NOW()) ) as today_rev 

		$rev_queries = "SELECT 
										( SELECT `weight` FROM `history_user_weight` where cust_id = $userid  ORDER BY id ASC LIMIT 1 ) as `st_weight`,
										( SELECT `weight` FROM `customers_info` where id = $userid LIMIT 1 ) as `ct_weight`, 
										(SELECT `totinch` FROM `history_measurement` where cust_id = $userid  ORDER BY id ASC LIMIT 1 ) as `i_inches`,
										(SELECT `totinch` FROM `history_measurement` where cust_id = $userid  ORDER BY id DESC LIMIT 1 ) as `f_inches`,
										(SELECT  datediff(curdate(),str_to_date(meal_start_date,'%Y-%m-%d')) from `customers_info` where id = $userid LIMIT 1 ) as `currentday`
										" ;

		 $resp = $this->cmn->custquery0($rev_queries);

		 if(is_null($resp['st_weight'])) : $resp['st_weight'] = 0 ; endif;
		 if(is_null($resp['ct_weight'])) : $resp['ct_weight'] = 0 ; endif;
		 if(is_null($resp['f_inches'])) : $resp['f_inches'] = 0 ; endif;
		 if(is_null($resp['i_inches'])) : $resp['i_inches'] = 0 ; endif;
		 if(is_null($resp['currentday'])) : $resp['currentday'] = 0 ; endif;
		// print_r($resp);
		$arr = [
			'st_weight'=>$resp['st_weight'] ,
			'ct_weight'=>$resp['ct_weight'] ,
			'totkgloss' => $resp['st_weight'] - $resp['ct_weight'] ,
			'tot_inches'=> $resp['i_inches'] - $resp['f_inches']  ,
			'currentday'=>$resp['currentday'] ,
		];
		echo json_encode($arr);
	}
	public function notes_read(){
		$userid = $_POST['user'];
		$this->notespath = 'upload/adminNotes/';

		$jsonString = file_get_contents($this->notespath.$userid.'.json');
		$data = json_decode($jsonString, true);
		if(empty($data)):
			echo 0;
		else:
			echo $jsonString;
			// echo json_encode($arr);
		// print_r($data);
		endif;
	}

	public function notes_update(){
		$this->notespath = 'upload/adminNotes/';
		#echo $this->notespath;
		$message = $_POST['message'];
		$userid = $_POST['user'];
		$jsonString = file_get_contents($this->notespath.$userid.'.json');
		$data = json_decode($jsonString, true);
		$data[]= ['message'=> $message, 'time'=> date('d-m-Y H:i:s')];
		$newJsonString = json_encode($data);
		if(file_put_contents($this->notespath.$userid.'.json' , $newJsonString)){
			echo 1;
		}
	}

	// public function foodchart(){
	// 	if($_POST['plan']==1){
	// 		$limit = 15;
	// 	}else{
	// 		$limit = 25;
	// 	}
		
	// 	// pr($_POST);die;
	// 	$data['message']=$this->Dietmodel->prepare_approved_chart($limit);
	// 	$data['all_food']=$this->Dietmodel->all_food();
	// 	$data['id']=$_POST['id'];
	// 	$data['cust_id']=$_POST['id'];
	// 	$data['plan'] = $_POST['plan'];
	// 	// pr($data);die;
	// 	$this->load->view('Admin/foodcharttest.php',$data);

	// }

	// public function foodchart2(){
	// 	//: not using this function ::
	// 	if($_POST['plan_type']==1){
	// 		$limit = 15;
	// 	}else{
	// 		$limit = 30;
	// 	}
	// 	$table =	$this->get_table_name($_POST['final_bmr']);
	// 	$placement_arr = $_POST['Placement'];
	// 	$food_type = $foo_pre[0]['food_prefrence'];
	// 	$data['limit'] = $limit;

	// 	// $data['message']=$this->Dietmodel->prepare_approved_chart($limit);
	// 	$data['message']=$this->Dietmodel->prepare_approved_chart_upgrade($table ,$food_type,$placement_arr, $limit);
	// 	$data['all_food']=$this->Dietmodel->all_food();
	// 	$data['id']=$_POST['id'];
	// 	$data['cust_id']=$_POST['id'];
	// 	$data['plan'] = $_POST['plan'];
	// 	// echo "----------------final data for chart page -------------------";
	// 	// prd($data);
	// 	$this->load->view('Admin/foodchart_new.php',$data);

	// }


	// public function foodcharttest(){
	// 	is_protected();
	// 	if($_POST['plan']==1){
	// 	$limit = 15;
	// 	}else{
	// 		$limit = 30;
	// 	}
	// 	// static limit=14
	// 	$limit = 1;
	// 	$arr = $_POST['Placement'];
	// 	$foo_pre = $this->Custommodel->Select_common_where('customer_lifestyle','user_id',$_POST['id']);
	// 	$food_type = $foo_pre[0]['food_prefrence'];
	// 	$table = $this->get_table_name($_POST['final_bmr']);
	// 	//table name is static submit_manuall_chart just for testing needs to comment this tbl
	// 	// $table='submit_manuall_chart';
	// 	$data['message']=$this->Dietmodel->prepare_approved_charts($limit,$table,$food_type,$arr);
	// 	$data['all_food']=$this->Dietmodel->all_food();
	// 	$data['id']=$_POST['id'];
	// 	$data['cust_id']=$_POST['id'];
	// 	$data['plan'] = $_POST['plan'];
	// 	$this->load->view('Admin/foodcharttest.php',$data);
	// }

	//  manual chart entry :: 
	public function foodentry(){
		//is_protected();
		$data['disease'] = $this->Custommodel->Select_common('disease');
		$data['food_category'] = $this->Custommodel->Select_common('food_category');
		$res = $this->Dietmodel->Allmeal();
		$data["all_food"] = $this->Dietmodel->all_food();
		$data['count'] = $this->Dietmodel->record_count_accept_meal();
		$data['count_decline'] = $this->Dietmodel->record_count_decline_meal();
		$data['count_remaining'] = $this->Dietmodel->record_count_remainings_meal();	 
		$data["message"] = array_map("unserialize", array_unique(array_map("serialize", $res)));
		//prd($res);
		$this->load->view('Admin/foodentry.php',$data);
	}

	public function foodentry1(){
		//is_protected();
		$data['disease'] = $this->Custommodel->Select_common('disease');
		$data['food_category'] = $this->Custommodel->Select_common('food_category');
		$res = $this->Dietmodel->Allmeal1();
		$data["all_food"] = $this->Dietmodel->all_food();
		$data['count'] = $this->Dietmodel->record_count_accept_meal();
		$data['count_decline'] = $this->Dietmodel->record_count_decline_meal();
		$data['count_remaining'] = $this->Dietmodel->record_count_remainings_meal();	 
		$data["message"] = array_map("unserialize", array_unique(array_map("serialize", $res)));
		$this->load->view('Admin/foodentry1.php',$data);
	}

	public function update_weight(){
		$data = $this->Custommodel->Select_common_where('customers_info','id',$_POST['user_id']);
		$measurement_history = array(
		'weight'  => $_POST['Weight'],
		'totinch' => $data[0]['neck'] + $data[0]['chest'] + $data[0]['Waist'] +$data[0]['hip'] + $data[0]['arm'] + $data[0]['thigh'],
		'neck'  => $data[0]['neck'],
		'chest'  => $data[0]['chest'],
		'waist'  => $data[0]['Waist'],
		'hips'  => $data[0]['hip'],
		'arm'  => $data[0]['arm'],
		'thighs'  => $data[0]['thigh'],
		'c_date'  => date('Y-m-d'),
		'cust_id' => $_POST['user_id']
			);
		$this->Custommodel->insert_common('history_measurement',$measurement_history);
		$info['weight'] =$_POST['Weight'];
		$this->Custommodel->update_common($info,'customers_info','id',$_POST['user_id']);
		redirect('Admin/userprofile/'.$_POST['user_id']);
	}


	public function update_comment(){
		is_protected();
		$data = array('comment' => $_POST['comment']);
		$this->Custommodel->update_common($data,'call_schedule','id',$_POST['call_id']);
		redirect('Admin/Dashboard');
	}

	public function unpaid_users(){ //by at
		$url = 'Api/Userdata_nonpaid';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);

		if($res->response_code==0){
		$data['message'] = $res->NonPaid;
		$this->load->view('Admin/users/unpaid_users',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function renew_users(){ // by at
		// both active and expired user
		$url = 'Api/Userdata_renew';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);
		// $renew_user = $this->User_model->userdata_forrenew();
		// prd($renew_user);
		if($res->response_code==0){
		$data['message'] = $res->ReNew;
		$this->load->view('Admin/users/renew_users',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function add_offline_payment(){ // by at
 
			$userid = $this->input->post('huserid');
			$planname = $this->input->post('planname');
			$planprice = $this->input->post('planprice');
			$paymode = $this->input->post('paymode');
			$renew = $this->input->post('renew');
			$isexpired = $this->input->post('isexpired');

			if($planprice ==600){
				$plan = 'Diet Composite';
				$plantype = 1;
			}else{
				$plan = 'Diet Advanced';
				$plantype = 2;
			}
			$ORDERID= "ORDERID_".time();
			$data = array(
				'user_id' => $userid,
				'txn_date'  => date('Y-m-d'),
				'txn_details'  =>'',
				'order_id' =>$ORDERID,
				'pay_mode'=> $paymode,
				'status'=> 'TXN_SUCCESS'
			);
			$lid= $this->Custommodel->insert_common('transaction_history',$data);

			$idata = array(
				'user_id'  => $userid,
				'plan_name' => $planname,
				'plan_type' => $plantype,
				'purchase_date' => time(),
				'p_date' => date('Y-m-d H:i:s'),
				'plan_status' => 1,
				'plan_amount'=> $planprice,
				'order_id' =>$ORDERID,
				'admin_verified' => 2	,
				'updated_dt' => date('Y-m-d H:i:s')
			);
			$iresp = $this->Custommodel->insert_common('Plan',$idata);

   // now we will take some actions according if we are in renew mode or simple
			if($iresp>0):
				if($renew == 1){
						if($isexpired == 2 ){
							// user plan not expired
							$data1 = array(
								'is_payment_done' => 1,
								'user_type' => 1,
								// 'plan_id' => $iresp,
								'renew_plan_id'=> $iresp,
								'renew_wt_update' => 0
							);
						}else{

							$data1 = array(
								'is_payment_done' => 1,
								'user_type' => 1,
								'plan_id' => $iresp,
								'renew_plan_id'=> 0,
								'renew_wt_update' => 0
							);
						}

				}else{
					// new payment
					$data1 = array(
										'is_payment_done' => 1,
										'plan_id' => $iresp,
										'user_type' => 1,
										'renew_plan_id'=> 0,
										'renew_wt_update' => 0
									);
				}
			endif;
			//echo $lid;die;
			$this->Custommodel->update_common($data1,'customers_info','id',$userid);

			$bburl  = base_url();
			echo "<script>
				//window.close();
		 		//alert('First call completed !!');
		 		window.location.href='".$bburl."Admin/unpaid_users?success';</script>";
	}
	// retore previous plan of customer // by at //06092022
	public function previous_plan_restore($id){
		// echo "Admin $id";
		$query1 = "SELECT * FROM Plan where user_id = $id ORDER BY id DESC LIMIT 1  ";
    $plandata = $this->cmn->custquery($query1)[0];
		// pr($plandata);

		$planid = $plandata['id'];
		// update plan -> plan status = 1
		$qupdtplan = "UPDATE Plan SET plan_status = 1 WHERE id =  $planid";
		$updtresp1 = $this->cmn->custquery($qupdtplan);
		pr($updtresp1);
		// update customer info -> update payment as paid and plan id 
		$updtdata1 = [
			'user_type'=>1,
			'is_payment_done'=> 1,
			'plan_id'=> $planid,
		];
		$updtresp2  = $this->Custommodel->update_common($updtdata1,'customers_info','id',$id);
		pr($updtresp2);

		if($updtresp1 == 1 && $updtresp2 == 1){
			$bburl  = base_url();
			 echo "<script>window.location.href='".$bburl."/Admin/paid_users?restore_success';</script>";
 
		}else{
			echo "Error : $updtresp1$updtresp1 ; Check !";
		} 

	}


	public function expired_users(){
		is_protected();
		$url = 'Api/User_expired';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);
	 
		$this->data['message'] = $res->expireduser;
		adminloadview('users/expired_users',$this->data);
	 
	}
	public function allusers(){
		is_protected();
		// $this->load->view('Admin/allusers');
		$url = 'Api/User_all';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);
		// prd($res);
		$this->data['message'] = $res->alluser;
 
		// adminloadview('users/contactform',$this->data);
		$this->load->view('Admin/users/allusers',$this->data);
	}
	public function contactForm(){
		is_protected();
		$url = 'Api/User_contactform';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);
	 
		$this->data['message'] = $res->contactform;
 
		// adminloadview('users/contactform',$this->data);
		$this->load->view('Admin/users/contactform',$this->data);
	}

	public function formnotfilled(){
	 
		// $this->load->view('Admin/formnotfilled');
		is_protected();
 
		$url = 'Api/User_fornotfilled';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);
		// prd($res);
		$this->data['message'] = $res->formnotfilled;
 
		// adminloadview('users/contactform',$this->data);
		$this->load->view('Admin/users/formnotfilled',$this->data);
	}
	// updated by at------------------------------------------------------------------






	public function food_category(){
	
		$url = 'Api/Listing';
		$Auth = $_SESSION['Token'];
		$data = array(
			'option' => 'Foodcategory',
			'id' => ''
					);
		$res = api_call($url,$Auth,$data);
		if($res->response_code==0){
		$data['message'] = $res->data;
		$this->load->view('Admin/food_category',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function add_food_category(){
		is_protected();
		$this->load->view('Admin/add_food_category');
	}
	public function foodcategorytype(){
			$url = 'Api/Listing';
		$Auth = $_SESSION['Token'];
		$data = array(
			'option' => 'Foodtype',
			'id' => ''
					);
		$res = api_call($url,$Auth,$data);
		if($res->response_code==0){
		$data['message'] = $res->data;
		$this->load->view('Admin/foodcategorytype',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function addfoodcategorytype(){
		is_protected();
		$this->load->view('Admin/addfoodcategorytype');
	}
	public function managedisease(){
		$url = 'Api/Listing';
		$Auth = $_SESSION['Token'];
		$data = array(
			'option' => 'Disease',
			'id' => ''
					);
		$res = api_call($url,$Auth,$data);
		if($res->response_code==0){
		$data['message'] = $res->data;
		$this->load->view('Admin/managedisease',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function adddisease(){
		is_protected();
		$this->load->view('Admin/adddisease');
	}
	public function managenutrition(){
		$url = 'Api/Listing';
		$Auth = $_SESSION['Token'];
		$data = array(
			'option' => 'Nutrition',
			'id' => ''
					);
		$res = api_call($url,$Auth,$data);
		if($res->response_code==0){
		$data['message'] = $res->data;
		$this->load->view('Admin/managenutrition',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function addnutrition(){
		is_protected();
		$this->load->view('Admin/addnutrition');
	}
	public function manageunit(){
		$url = 'Api/Listing';
		$Auth = $_SESSION['Token'];
		$data = array(
			'option' => 'Units',
			'id' => ''
					);
		$res = api_call($url,$Auth,$data);
		if($res->response_code==0){
		$data['message'] = $res->data;
		$this->load->view('Admin/manageunit',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function addunit(){
		is_protected();
		$this->load->view('Admin/addunit');
	}
	public function manageplacement(){
				$url = 'Api/Listing';
		$Auth = $_SESSION['Token'];
		$data = array(
			'option' => 'Placement',
			'id' => ''
					);
		$res = api_call($url,$Auth,$data);
		if($res->response_code==0){
		$data['message'] = $res->data;
		$this->load->view('Admin/manageplacement',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function addplacement(){
		is_protected();
		$this->load->view('Admin/addplacement');
	}
	public function addfood(){
		
		$url = 'Api/Listing';
		$Auth = $_SESSION['Token'];
		$datas = array('option' => 'Foodcategory');
		$res = api_call($url,$Auth,$datas);
		
		if($res->response_code==0){
			$data['Foodcategory'] = $res->data;
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		$datas = array(
			'option' => 'Units'
					);
		$res = api_call($url,$Auth,$datas);
		if($res->response_code==0){
			$data['Units'] = $res->data;
		
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		$datas = array('option' => 'Foodtype');
		$res = api_call($url,$Auth,$datas);
		if($res->response_code==0){
			$data['Foodtype'] = $res->data;
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		$this->load->view('Admin/addfood',$data);
	}


	public function addfoodmaster(){
		$url = 'Api/Foodmaster';
		$Auth = $_SESSION['Token'];
		$data = array( 
			"food_name" => $this->input->post('food_name'),
			"food_category" =>$this->input->post('food_category'),
			"food_type" => $this->input->post('food_type'),
			"ingredients" => $this->input->post('method'),
			"recipe" => $this->input->post('recipes'),
			"calories" => $this->input->post('calories'),
			"protein" => $this->input->post('protein'),
			"carbohydrates" => $this->input->post('carbohydrates'),
			"fat" =>$this->input->post('fat'),
			"sodium" => $this->input->post('sodium'),
			"iron" => $this->input->post('iron'),
			"d_fibre" => $this->input->post('fibre'),
			"unit" => $this->input->post('foodunit'),
			"id" => $this->input->post('id'),
					);
		$res = api_call($url,$Auth,$data);
		if($res->response_code==0){
		
		redirect('Admin/foodlist');
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
	}

	public function foodlist(){
		$url = 'Api/foodlist';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);
		if($res->response_code==0){
			$data['message'] = $res->data;
			$this->load->view('Admin/foodlist',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
		
	}
	public function foodEdit($id){
		$url = 'Api/Listing';
		$Auth = $_SESSION['Token'];
		$datas = array(
			'option' => 'Foodcategory'
					);
		$res = api_call($url,$Auth,$datas);
		if($res->response_code==0){
		$data['Foodcategory'] = $res->data;
		
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		$datas = array(
			'option' => 'Units'
					);
		$res = api_call($url,$Auth,$datas);
		if($res->response_code==0){
		$data['Units'] = $res->data;
		
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		$datas = array(
			'option' => 'Foodtype'
					);
		$res = api_call($url,$Auth,$datas);
		if($res->response_code==0){
		$data['Foodtype'] = $res->data;
		
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		$url = 'Api/foodlist';
		$Auth = $_SESSION['Token'];
		$datas = array(
			'id' => $id
					);
		$res = api_call($url,$Auth,$datas);
		
		if($res->response_code==0){
		$data['message'] = $res->data;
		$this->load->view('Admin/addfood',$data);
		}
	}
	public function foodView($id){
		$url = 'Api/foodlist';
		$Auth = $_SESSION['Token'];
		$datas = array(
			'id' => $id
					);
		$res = api_call($url,$Auth,$datas);
		
		if($res->response_code==0){
		$data['message'] = $res->data;
		$this->load->view('Admin/foodview',$data);
		}
	}
	public function addfoodimageview(){
		if($_GET['id'] ){

			$id =  $_GET['id'];
			// echo $id;
			$data['id'] = $id; 
			$resp =	$this->db->select('food_image')->where('id',$id)->get('food_master')->result();
			$data['imgpath'] = $resp[0]->food_image;
			$this->load->view('Admin/tasks/uploadfooditemimage',$data);


		}else{
			echo "NULL";
		}

	}
	public function uploadfoodimage(){
		// pr($_FILES);
		// pr($_POST);

		if($_FILES['foodimage']['size'] >0 ){
			$id = $_POST['hid'];
			$type   = basename($_FILES["foodimage"]["name"]);
 
			$type = strtolower(pathinfo($type,PATHINFO_EXTENSION));
 
			$filename = "$id".".".$type;
			$imageDir ="upload/food_master_images/";
			$filepath = $imageDir . $filename;
			// pr($filepath);
			unlink($filePath);

			if (move_uploaded_file($_FILES["foodimage"]["tmp_name"], $filepath)) {
				echo "The file ". htmlspecialchars( basename( $_FILES["foodimage"]["name"])). " has been uploaded.";
				$data = ['food_image'=>$filepath];
				$resp1 = $this->Custommodel->update_common($data,'food_master','id',$id);

				echo $resp1;
				if($resp1 == 1){
					echo	"<script>setTimeout('',3000);</script>";
					$id++;
					redirect('Admin/addfoodimageview?success&&id='.$id,'refresh');
					
				}else{
					redirect('Admin/addfoodimageview?failed&&id='.$id,'refresh');
				}
			} else {
				echo "Sorry, there was an error uploading your file.";
			}

		}

	}


	public function region(){
		is_protected();
		$this->load->view('Admin/region');
	}
	public function manageregion(){
		is_protected();
		$this->load->view('Admin/manageregion');
	}
	public function foodcombination(){
		$url = 'Api/foodlist';
		$Auth = $_SESSION['Token'];
		
		$res = api_call($url,$Auth);
		$data['foodList'] = $res->data;
		$url = 'Api/Listing';
		$datas =array(
			'option' => 'Placement'
					);
		$res = api_call($url,$Auth,$datas);
		$data['placementList'] = $res->data;

		$datas =array(
			'option' => 'Foodcategory'
					);
		$res = api_call($url,$Auth,$datas);
		$data['foodCategoryList'] = $res->data;

		$datas =array(
			'option' => 'Units'
					);
		$res = api_call($url,$Auth,$datas);
		$data['unitList'] = $res->data;
		$datas =array(
			'option' => 'Disease'
					);
		$res = api_call($url,$Auth,$datas);
		$data['Disease'] = $res->data;
	 	$this->load->view('Admin/foodcombination',$data);
	}
	public function foodcombination_list(){
		is_protected();
		$this->load->view('Admin/foodcombination_list');
	}
	public function delete($id,$option){

		$url = 'Api/Delete';
		$Auth = $_SESSION['Token'];
		$data = array(
			'option' => $option,
			'id' => $id
					);
		$res = api_call($url,$Auth,$data);
		if($option =='Units'){
			
			redirect('Admin/manageunit');
		}elseif($option =='Disease'){
			redirect('Admin/managedisease');
		}elseif($option =='Nutrition'){
			redirect('Admin/managenutrition');
		}elseif($option =='Placement'){
			redirect('Admin/manageplacement');
		}elseif($option =='Foodcategory'){
			redirect('Admin/food_category');
		}elseif($option =='Foodtype'){
			redirect('Admin/foodcategorytype');
		}elseif($option =='FoodMaster'){
			redirect('Admin/foodlist');
		}
	}

	public function add(){
		$url = 'Api/AddUpdate';
		$Auth = $_SESSION['Token'];
		$data = array(
				"option" => $this->input->post('option'),
				"name" =>$this->input->post('name'),
				"description" => $this->input->post('description'),
				"id" => $this->input->post('id'),
					);
		$res = api_call($url,$Auth,$data);
		$option =$this->input->post('option');
		if($option =='Units'){
			
			redirect('Admin/manageunit');
		}elseif($option =='Disease'){
			redirect('Admin/managedisease');
		}elseif($option =='Nutrition'){
			redirect('Admin/managenutrition');
		}elseif($option =='Placement'){
			redirect('Admin/manageplacement');
		}elseif($option =='Foodcategory'){
			redirect('Admin/food_category');
		}elseif($option =='Foodtype'){
			redirect('Admin/foodcategorytype');
		}elseif($option =='FoodMaster'){
			redirect('Admin/foodlist');
		}
	}

	public function Edit($id,$option){
		// read this function 
		$url = 'Api/Listing';
		$Auth = $_SESSION['Token'];
		$datas = array(
		'option' => $option,
		'id' => $id
				);
		$res = api_call($url,$Auth,$datas);
		if($res->response_code==0){
		$data['message'] = $res->data;
		
			if($option =='Units'){
				$page = 'Admin/addunit.php';
			}elseif($option =='Disease'){
				$page = 'Admin/adddisease.php';
			}elseif($option =='Nutrition'){
				$page = 'Admin/addnutrition.php';
			}elseif($option =='Placement'){
				$page = 'Admin/addplacement.php';
			}elseif($option =='Foodcategory'){
				$page = 'Admin/add_food_category.php';
			}elseif($option =='Foodtype'){
				$page = 'Admin/addfoodcategorytype.php';
			}
			
		$this->load->view($page,$data);
		}else{

			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
	}

	public function foodData(){
		$id = $this->input->post('id');
		$url = 'Api/foodlist';
		$Auth = $_SESSION['Token'];
		$datas = array(
		'id' => $id
				);
		$res = api_call($url,$Auth,$datas);
		echo json_encode($res);
		//pr($res);

	}
	public function addFoodCombination(){
		foreach ($_POST['filterdisease'] as  $Disease) {
			$diseasearray[] = array(
					'disease'  => $Disease,
					'time'     => $_POST['awesomeness'.$Disease]
									);
		}
		//pr($diseasearray);die;
		$placements =  $_POST['Placement'];
		$foodCategorys =  $_POST['foodCategory'];
		
		$chart = $this->Custommodel->Select_common_orderby('foodCombination','no_of_chart');
		// get max food id from db
		$maxFoodId = $chart[0]['no_of_chart']+1; 

		$noFood = $_POST['no_of_food'];
		$calories = 0;
		$carbohydrates = 0;
		$fat = 0;
		$sodium = 0;
		$iron = 0;
		$fibre = 0;
		$protein = 0;
		$getMaxCombination = 1; //get from db

		foreach ($foodCategorys as  $foodCategory) {
			foreach ($placements as  $placement) {
				foreach ($_POST['quantity'] as $key => $value) {
					$current = (($key+1)%$noFood);
					if($current ==0){
						$calories += $_POST['calories'][$key];
						$carbohydrates += $_POST['carbohydrates'][$key];
						$fat += $_POST['fat'][$key];
						$sodium += $_POST['sodium'][$key];
						$iron += $_POST['iron'][$key];
						$fibre += $_POST['d_fibre'][$key];
						$protein += $_POST['portion'][$key];
						$fooddata = $this->Custommodel->Select_common_where('food_master','id',$_POST['foodId'][$key]);
						$foodName = $fooddata[0]['food_name']; // get food name from db
						$combinationfoodname .= "+".$_POST['quantity'][$key]." ". $foodName;
						$combinationfoodname = ltrim ($combinationfoodname,'+');
						// insert in to db
						$data = array(

								'foodId'  => $_POST['foodId'][$key],
								'quantity'  => $_POST['quantity'][$key],
								'calories'  => $_POST['calories'][$key],
								'portion'  => $_POST['portion'][$key],
								'carbohydrates'  => $_POST['carbohydrates'][$key],
								'fat'  => $_POST['fat'][$key],
								'sodium'  => $_POST['sodium'][$key],
								'iron'  => $_POST['iron'][$key],
								'd_fibre'  => $_POST['d_fibre'][$key],
								'food_combination_no' => $getMaxCombination,
								'no_of_chart' => $maxFoodId

										);
						$this->Custommodel->insert_common('foodCombination',$data);

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
							'placement'    => $placement,
							'upperplacement' => $placement,
							'foodCategory' => $foodCategory,

									);
						$this->Dietmodel->update_foodcombination($totalval,$getMaxCombination,$maxFoodId);
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
					
						$calories += $_POST['calories'][$key];
						$carbohydrates += $_POST['carbohydrates'][$key];
						$fat += $_POST['fat'][$key];
						$sodium += $_POST['sodium'][$key];
						$iron += $_POST['iron'][$key];
						$fibre += $_POST['d_fibre'][$key];
						$protein += $_POST['portion'][$key];
						$fooddata = $this->Custommodel->Select_common_where('food_master','id',$_POST['foodId'][$key]);
						$foodName = $fooddata[0]['food_name']; // get food name from db
						$combinationfoodname .= "+".$_POST['quantity'][$key]." ". $foodName;


						// insert in to db
						$data = array(
							'quantity'  => $_POST['quantity'][$key],
							'foodId'  => $_POST['foodId'][$key],
							'calories'  => $_POST['calories'][$key],
							'portion'  => $_POST['portion'][$key],
							'carbohydrates'  => $_POST['carbohydrates'][$key],
							'fat'  => $_POST['fat'][$key],
							'sodium'  => $_POST['sodium'][$key],
							'iron'  => $_POST['iron'][$key],
							'd_fibre'  => $_POST['d_fibre'][$key],
							'food_combination_no' => $getMaxCombination,
							'no_of_chart' => $maxFoodId
									);
						$this->Custommodel->insert_common('foodCombination',$data);
					}
				}

			} //placement end

		}// foodCategory end #foreach ends

		if(!empty($placements && $foodCategorys)){
				foreach ($diseasearray as  $value) {
					$insert_array = array(
						'food_chart_no' => $maxFoodId,
						'disease_id'    => $value["disease"],
						'frequency'     => $value["time"]
										);
					$this->Custommodel->insert_common('food_combination_disease',$insert_array);
			}
		}
		redirect('Admin/foodCombinationList');
	}

	public function edit_foodcombination($foodId,$combinationId){
		$url = 'Api/editFoodCombination';
		$Auth = $_SESSION['Token'];
		$datas = array(
		'foodId' => $foodId,
		'combinationId' => $combinationId
				);
		
		$res = api_call($url,$Auth,$datas);
		
		if($res->response_code==0){
		$data['message'] = $res->result;
		$this->load->view('Admin/edit_foodcombination',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}

	public function foodCombinationList(){
		$url = 'Api/getFoodcombination';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);
		if($res->response_code==0){
		$data['message'] = $res->result;
		$this->load->view('Admin/foodCombinationList.php',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
	}
	public function updateFoodCombination(){

		$calories = 0;
		$carbohydrates = 0;
		$fat = 0;
		$sodium = 0;
		$iron = 0;
		$fibre = 0;
		$protein =0;

		foreach ($_POST['quantity'] as $key => $value) {
			

			$calories += $_POST['calories'][$key];
			$carbohydrates += $_POST['carbohydrates'][$key];
			$fat += $_POST['fat'][$key];
			$sodium += $_POST['sodium'][$key];
			$iron += $_POST['iron'][$key];
			$fibre += $_POST['d_fibre'][$key];
			$protein += $_POST['portion'][$key];
				

			 	$data = array(

			 		'quantity'  => $_POST['quantity'][$key],
			 		'calories'  => $_POST['calories'][$key],
			 		'portion'  => $_POST['portion'][$key],
			 		'carbohydrates'  => $_POST['carbohydrates'][$key],
			 		'fat'  => $_POST['fat'][$key],
			 		'sodium'  => $_POST['sodium'][$key],
			 		'iron'  => $_POST['iron'][$key],
			 		'd_fibre'  => $_POST['d_fibre'][$key],			 

			 				);
			   	 $this->Custommodel->update_common($data,'foodCombination','id',$_POST['id'][$key]);
				// $this->Custommodel->insert_common('foodCombination',$data);

			 //update all total entries in db in the basis of 
			 
				$fooddata = $this->Custommodel->Select_common_where('food_master','id',$_POST['foodId'][$key]);
				$foodName = $fooddata[0]['food_name']; // get food name from db
				$combinationfoodname .= "+".$_POST['quantity'][$key]." ". $foodName;
		}
		 $combinationfoodname = ltrim ($combinationfoodname,'+');

		 $maxFoodId = $_POST['food_no'];
		 $getMaxCombination = $_POST['foodcombination'];
		 $totalval = array(
			  		'totalprotein' => $protein,
			 		'totalcalories'  => $calories,
			 		'totalcarbohydrates'  => $carbohydrates,
			 		'totalfat'  => $fat,
			 		'totalsodium'  => $sodium,
			 		'totaliron'  => $iron,
			 		'totald_fibre'  => $fibre,
			 		'foodcombination_name' =>$combinationfoodname

			 				);
			  $this->Dietmodel->update_foodcombination($totalval,$getMaxCombination,$maxFoodId);
			  redirect('Admin/foodCombinationList');

	}
	public function deleteFoodcombination($foodId,$combinationId){

			$this->Dietmodel->deleteCombination($foodId,$combinationId);
			redirect('Admin/foodCombinationList');

	}
	public function manageexercise(){
		$url = 'Api/exerciseList';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);
		if($res->response_code==0){			
		$data['message'] = $res->result;
		$this->load->view('Admin/manageexercise.php',$data);		
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function addexercise(){
		is_protected();
		$this->load->view('Admin/addexercise.php');
	}
	public function editexercise($id){
		$url = 'Api/exerciseList';
		$Auth = $_SESSION['Token'];
		$param = array(
			'id'  => $id
						);
		$res = api_call($url,$Auth,$param);
		//pr($res);die;
		if($res->response_code==0){			
		$data['message'] = $res->result;
		$this->load->view('Admin/editexercise.php',$data);		
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function chartexercise(){
		is_protected();
		$this->load->view('Admin/chartexercise.php');
	}


	# manage frontened  ::   
	public function manageglossary(){
		#note ::
		is_protected();
		$data['message'] = $this->Dietmodel->allglossary(); #faqs fro faq user
		$this->load->view('Admin/manageGlossary.php',$data);
	}
	public function addglossary(){
		is_protected();
		$this->load->view('Admin/addglossary');
	}
	public function save_glossary(){
		is_protected();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
			$title = $this->input->post('title');
			$desc_hindi = $this->input->post('desc_hindi');
			$desc_eng = $this->input->post('desc_eng');
 
			$data = array(
					'title' => $title,
					'desc_hindi' => $desc_hindi,
					'desc_eng' => $desc_eng,
				);
				$this->db->insert('glossary', $data);
				redirect('Admin/manageglossary');
			}
	}
	public function deleteglossary($id){
		is_protected();
		$this->db->where('id', $id);
		$this->db->delete('glossary');
		redirect('Admin/manageglossary');
	}

	public function editglossary($id){
		is_protected();
		$table = 'glossary';
		$where = 'id';
		$data['keywords'] = $this->Dietmodel->select_com_where($table, $where, $id);
		$this->load->view('Admin/editglossary',$data);
	}
	public function update_glossary(){
		is_protected();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$title = $this->input->post('title');
			$desc_eng = $this->input->post('desc_eng');
			$desc_hindi = $this->input->post('desc_hindi');
			//echo $answer;die();
			$id = $this->input->post('id');
			$data = array(
				'title' => $title,
				'desc_eng' => $desc_eng,
				'desc_hindi' => $desc_hindi,
			);
			//echo $data;die();
			$this->db->where('id', $id);
			$this->db->update(' glossary', $data);
			redirect('Admin/manageglossary');
		}
	}
	#====================================
	public function managefaqUser(){
		#note :: this admin manager is for registered user which they can access after regitering on site
		is_protected();
		$data['message'] = $this->Dietmodel->allfaqsUser(); #faqs fro faq user
		$this->load->view('Admin/managefaqUser.php',$data);
	}
	public function addfaqUser(){
		is_protected();
		$this->load->view('Admin/addfaqUser');
	}
	public function save_faqUser(){
		is_protected();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
			$question = $this->input->post('question');
			$question_hindi = $this->input->post('question_hindi');
			$answer_eng = $this->input->post('answer_eng');
			$answer_hindi = $this->input->post('answer_hindi');
			$data = array(
					'question' => $question,
					'question_hindi' => $question_hindi,
					'answer_eng' => $answer_eng,
					'answer_hindi' => $answer_hindi,
				);
				$this->db->insert('faqUser', $data);
				redirect('Admin/managefaqUser');
			}
	}
	public function editfaqUser($id){
		is_protected();
		$table = 'faqUser';
		$where = 'id';
		$data['faqUser'] = $this->Dietmodel->select_com_where($table, $where, $id);
		$this->load->view('Admin/editfaqUser',$data);
	}
	public function update_faqUser(){
		is_protected();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
			$question = $this->input->post('question');
			$question_hindi = $this->input->post('question_hindi');
			$answer_eng = $this->input->post('answer_eng');
			$answer_hindi = $this->input->post('answer_hindi');
			//echo $answer;die();
			$id = $this->input->post('id');
			$data = array(
				'question' => $question,
				'question_hindi' => $question_hindi,
				'answer_eng' => $answer_eng,
				'answer_hindi' => $answer_hindi,
 
			);
			// prd($data,$id);
			$this->db->where('id', $id);
			$this->db->update('faqUser', $data);
			redirect('Admin/managefaqUser');
		}
	}
	public function deletefaqUser($id){
		is_protected();
		$this->db->where('id', $id);
		$this->db->delete('faqUser');
		redirect('Admin/managefaqUser');
	}
	#====================
	public function managefaq(){
		is_protected();
		$data['message'] = $this->Dietmodel->allfaqs();
		$this->load->view('Admin/managefaq.php',$data);
	}
	public function addfaq(){
		is_protected();
		$this->load->view('Admin/addfaq');
	}
	public function save_faq(){
		is_protected();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$cat = $this->input->post('cat');
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');
			$data = array(
					'question' => $question,
					'answer' => $answer,
					'cat' => $cat,
				);
				$this->db->insert('faq', $data);
				redirect('Admin/managefaq');
			}
	}

	public function editfaq($id){
		is_protected();
		$table = 'faq';
		$where = 'id';
		$data['faq'] = $this->Dietmodel->select_com_where($table, $where, $id);
		$this->load->view('Admin/editfaq',$data);
	}
	public function update_faq(){
		is_protected();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$cat = $this->input->post('cat');
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');
			//echo $answer;die();
			$id = $this->input->post('id');
			$data = array(
				'question' => $question,
				'answer' => $answer,
				'cat' => $cat,
			);
			//echo $data;die();
			$this->db->where('id', $id);
			$this->db->update(' faq', $data);
			redirect('Admin/managefaq');
		}
	}
	public function deletefaq($id){
		is_protected();
		$this->db->where('id', $id);
		$this->db->delete('faq');
		redirect('Admin/managefaq');
	}


	#------------------------------
	public function deleteblog($id){
		is_protected();
		$this->db->where('id', $id);
		$this->db->delete('blog');
		redirect('Admin/manageblog');
	}
	public function myprofile(){
		is_protected();
		$this->load->view('Admin/myprofile.php');
	}
	public function managerole(){
		is_protected();
		$this->load->view('Admin/managerole.php');
	}
	public function addprofile(){
		is_protected();
		$this->load->view('Admin/addprofile.php');
	}
	public function contact(){
		is_protected();
		$data['message'] = $this->Dietmodel->allcontact();
		$this->load->view('Admin/contact.php',$data);
	}
	public function appointment(){
		is_protected();
		$data['message'] = $this->Dietmodel->allappointment();
		$this->load->view('Admin/appointment.php',$data);
	}
 
	public function ajax_fn(){

		$requestData = $_REQUEST;
        if (isset($_POST['input_json'])) {
            $requestData = json_decode($_POST['input_json'], true);
            if (ISSET($_POST['download_pdf'])) {
                $output_pdf = true;
            } else {
                $output_csv = true;
            }
        }
       
        $foodname_search = $requestData['columns'][1]['search']['value'];
        $placement_search = $requestData['columns'][2]['search']['value'];
        $foodtype_search = $requestData['columns'][3]['search']['value'];
       
         $url = 'Api/foodPagi';
		$Auth = $_SESSION['Token'];
		$d = array(
			'foodname_search' => $foodname_search,
			'placement_search' => $placement_search,
			'foodtype_search' => $foodtype_search
					);
		
        $res1 = api_call($url,$Auth,$d);
		

        $url = 'Api/getFoodcombination';
		$Auth = $_SESSION['Token'];
		$data = array(
			'start' => $requestData['start'],
			'length' =>  $requestData['length'],
			'foodname_search' => $foodname_search,
			'placement_search' => $placement_search,
			'foodtype_search' => $foodtype_search
					);
		
        $res = api_call($url,$Auth,$data);
		$result = $res->result;	
       	$totalData =  count($res1->result);
        $totalFiltered = $totalData;
       
     foreach ($result as $value) {  //preparing an array
            $nestedData = array();
            $nestedData[] = $value->foodcombination_name;;
            $nestedData[] = $value->placements;;
            $nestedData[] = $value->foodCategory;
            $nestedData[] = "<a data-toggle='modal' data-target='#myModalDisease_".$value->id."'  class='btn btn-primary' style='color: #fff';>Disease</a>";
            $nestedData[] =  "<a class='btn-sm btn btn-success btn-xs bold' href='" . base_url() . "Admin/edit_foodcombination/" .$value->no_of_chart ."/".$value->food_combination_no. "'>Edit</a>";
            $nestedData[] =  "<a class='btn-sm btn btn-danger btn-xs bold' href='" . base_url() . "Admin/deleteFoodcombination/" .$value->no_of_chart ."/".$value->food_combination_no. "'>Delete</a>";
           
            $data[] = $nestedData;
           
        }

        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data, // total data array
            "posted_data" => $_POST
        );

        echo json_encode($json_data);
	}

	public function Fb_review(){
		is_protected();
		$this->load->view('Admin/fb_review');
	}
	public	function addreview($url=''){
		is_protected();
		@$token = $this->input->post('token');
		if($token==''){
			die("Please Provide token Url");
		$token = 'https://graph.facebook.com/v3.2/DietGhar/ratings?access_token=EAASSyTGUnmcBACN0G0GWVr8Gd3DrWAYItRS8XDZCySdMKWwzxQJ9hHWAVsKe1zK4NuIanTXw2fDkfd6cFIoIWOeK3BEIkJGtYc3Ro5bDUaFDWPA76AFszlt5PodFy6eWxwWEGxCZBISJTwXLPHeijoakM16wL8oqCJnUzZBjLz2UVnOylX8ZC66yHVDaCUI9C3UHXRjc7AZDZD&limit=41000';	
		}
		
		$available = 0;
		if($url=='')
		{
			$this->db->truncate('fb_review'); //for truncate the database table
			
			$results = file_get_contents($token); 
			
		}
		else
		{
			$results = file_get_contents($url);
		}
		
		$a=json_decode($results,true); //Decode the results and convert into array by using true as second parameter
		$b=count($a['data']); //Count the no. of results to iterate over it

		for($i=0;$i<$b;$i++) //iterate over the data
		{ 
		
			if(!empty($a['data'][$i]['review_text']))
			{ 
				 
				 $data['name']= $a['data'][$i]['reviewer']['name'];  //Print reviewer name
				 $data['fb_id']= $a['data'][$i]['reviewer']['id'];  //Print reviewer id
				 $data['rating']= $a['data'][$i]['rating'];        
                       //Print ratings

                 if(is_null($data['rating'])){
                    $data['rating'] = 5;
                 }
                 $date = new DateTime( $a['data'][$i]['created_time']);
				 $new_date_format = $date->format('Y-m-d H:i:s');
				 $data['review_on']= $new_date_format;              //Print created Time
				 $data['image']= 'https://graph.facebook.com/'.$data['fb_id'].'/picture?type=normal';
				 $data['review']= $a['data'][$i]['review_text']; //Print description written by reviewer if available.
				 $data['status']=1;

                
				 $this->Facebookreview_model->insert_update($data); 
				
			}
			
		} 
		
		if(isset($a['paging']['next']) && $a['paging']['next'] != '' && $available!=1)
		{
			$next_url= $a['paging']['next'];
			$this->addreview($next_url);
		}

        $this->session->set_flashdata('message_name', 'Facebook Review Updated Successfully');
		die("Review Added");
	}
	public function managereview(){
		is_protected();
		$data['message'] = $this->Dietmodel->allreview();
		$this->load->view('Admin/managereview.php',$data);
	}
	public function editreview($id){
		is_protected();
		$table = 'fb_review';
		$where = 'id';
		$data['review'] = $this->Dietmodel->select_com_where($table, $where, $id);
		$this->load->view('Admin/editreview.php',$data);
	}
	public function update_review(){
		is_protected();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$rating = $this->input->post('rating');
			$review = $this->input->post('review');
			$status = $this->input->post('status');
			$name = $this->input->post('name');
			$id = $this->input->post('id');
			
			
			$data = array(
				'rating' => $rating,
				'review' => $review,
				'status' => $status,
				'name' => $name,
			);
			
			$this->db->where('id', $id);
			$this->db->update('fb_review', $data);
			redirect('Admin/managereview');
		}
	}

	public function submission_first(){
		// first call submission func
		is_protected();

		$customer_info = array(
				'heighest_weight_ever' => $_POST['highest_weight'],
				'occupation'  =>  $_POST['occupation'],
				'num_of_meal_suggested'  =>  $_POST['no_of_meals'],
				'meal_start_date'  => date('Y-m-d',strtotime($_POST['meal_startdate'])), 
				'meal_end_date'  =>  date('Y-m-d',strtotime($_POST['meal_enddate'])),
				'found_us_via'  =>  $_POST['found_us'],
				'first_call_done' =>1
		);

		$customer_lifestyle = array(
			'lifestyle'  =>	$_POST['lifestyle'],
			'wakeup_time' =>$_POST['wakeuptime'],
			//'wakeup_time' =>date('H:i:s',strtotime($_POST['wakeuptime'].":".$_POST['wakeuptime_min'].$_POST['wakeuptime_am_pm'])),
			'breakfast_time' =>$_POST['breakfasttime'],
			'midmeal_time' =>$_POST['midmealtime'],
			'lunch_time' => $_POST['lunchtime'],
			'evening_time' => $_POST['eveningtime'],
			'dinner_time' =>$_POST['dinnertime'],
			'sleep_time' => $_POST['sleeptime'],
			'usuall_diet' => $_POST['daydiet'],
			'food_allergy' => $_POST['food_allergies'],
			'food_liking' => $_POST['food_liking'],
			'any_prevous_diet_followed' => $_POST['previous_diet'],
			'previous_diet' => $_POST['previous_diet_yes'],
			'food_prefrence' => $_POST['food_preffrence'],
			'how_many_times_eat_in_week' => $_POST['many_time_week'],
			'is_thyroid' => $_POST['is_thyroid'],
			'thyroid' => $_POST['thyroid'],
			'is_diabetes' => $_POST['is_diabetes'],
			'diabetes' => $_POST['diabetes'],
			'pcos' => $_POST['pcos'],
			'hypertension' => $_POST['hypertension'],
			'bp' => $_POST['BloodPressure'],
			'body_pain' => $_POST['body_pain'],
			'medication_any' => $_POST['medication_any'],
		);
		// pr($customer_info);
		// pr($_POST['cust_id']);
		// prd($customer_lifestyle);
		$this->Custommodel->update_common($customer_info,'customers_info','id',$_POST['cust_id']);
		$this->Custommodel->update_common($customer_lifestyle,'customer_lifestyle','user_id',$_POST['cust_id']);

		//insert seven day Logic 

		$f_date = $_POST['meal_startdate'];
		$l_date = $_POST['meal_enddate'];
		$this->db->where('user_id', $_POST['cust_id']);
		$this->db->delete('call_schedule');

		$this->check_add($f_date,$l_date,$_POST['cust_id']); // adding call schedule of 7th day

		// reminder before 3 days on chart end .
		
		// $date = $_POST['meal_enddate']; // meal end date
		// $date = strtotime($date);
		// $date = strtotime("-3 day", $date);
		// $remind_date =  date('Y-m-d', $date);
		// $remind_array = array(
		// 									'user_id' => $_POST['cust_id'],
		// 									'reminder_date' => $remind_date,
		// 									'status' => 0
		// 								);
		// $this->db->where('user_id', $_POST['cust_id']);
		// $this->db->delete('renew_reminder');
		// $this->Custommodel->insert_common('renew_reminder',$remind_array);

		$this->session->set_flashdata('success', 'Data updated Successfully');
		$bburl  = base_url();
		
		echo "<script>
 		//window.close();
		//alert('First call completed !!');
		window.location.href='".$bburl."Admin/task_first_call';</script>";
		//redirect('Admin/paid_users');

	}

	public function chartPreTest(){
		// for making the kake chart data from foodcombination
		date_default_timezone_set('Asia/Kolkata');

		$table = 'foodCombination';
		$where = 'placement';
		
		$where2 = "foodCategory";
		$id2 = '1'; // veg

		
		$id = '13'; // evening
		$evening = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);
		$id = '12'; // mrng
		$mrng = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '9'; // bedtime
		$bedtime = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '10'; // breakfast
		$breakfast = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '11'; // dinner
		$dinnner = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '14'; // lunch
		$lunch = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '15'; // midmeal
		$midmeal = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);
		shuffle($evening);
		shuffle($mrng);
		shuffle($bedtime);
		shuffle($breakfast);
		shuffle($dinnner);
		shuffle($lunch);
		shuffle($midmeal);

		$i=0;
		$res = $this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
		if($res =='success'){
		$day[$i]['morning'] = array(

						'calories' => $mrng[0]['totalcalories'],
						'food_name' => $mrng[0]['foodcombination_name'],
						'no_of_chart' => $mrng[0]['no_of_chart'],
						'fileterdisease' => $mrng[0]['fileterdisease']
				
						);
		$day[$i]['breakfast'] = array(

						'calories' => $breakfast[0]['totalcalories'],
						'food_name' => $breakfast[0]['foodcombination_name'],
						'no_of_chart' => $breakfast[0]['no_of_chart'],
				
						);
		$day[$i]['midmeal'] = array(

						'calories' => $midmeal[0]['totalcalories'],
						'food_name' => $midmeal[0]['foodcombination_name'],
						'no_of_chart' => $midmeal[0]['no_of_chart'],
				
						);
		$day[$i]['lunch'] = array(

						'calories' => $lunch[0]['totalcalories'],
						'food_name' => $lunch[0]['foodcombination_name'],
						'no_of_chart' => $lunch[0]['no_of_chart'],
				
						);
		$day[$i]['evening'] = array(

						'calories' => $evening[0]['totalcalories'],
						'food_name' => $evening[0]['foodcombination_name'],
						'no_of_chart' => $evening[0]['no_of_chart'],
				
						);
		$day[$i]['dinnner'] = array(

						'calories' => $dinnner[0]['totalcalories'],
						'food_name' => $dinnner[0]['foodcombination_name'],
						'no_of_chart' => $dinnner[0]['no_of_chart'],
				
						);
		$day[$i]['bedtime'] = array(

						'calories' => $bedtime[0]['totalcalories'],
						'food_name' => $bedtime[0]['foodcombination_name'],
						'no_of_chart' => $bedtime[0]['no_of_chart'],
				
						);
		
		
		$totalcalories = $mrng[0]['totalcalories'] + $breakfast[0]['totalcalories'] + $midmeal[0]['totalcalories'] + $lunch[0]['totalcalories'] + $evening[0]['totalcalories'] + $dinnner[0]['totalcalories'] + $bedtime[0]['totalcalories'] ;

		$totalprotein = $mrng[0]['totalprotein'] + $breakfast[0]['totalprotein'] + $midmeal[0]['totalprotein'] + $lunch[0]['totalprotein'] + $evening[0]['totalprotein'] + $dinnner[0]['totalprotein'] + $bedtime[0]['totalprotein'] ;

		$totalcarbohydrates = $mrng[0]['totalcarbohydrates'] + $breakfast[0]['totalcarbohydrates'] + $midmeal[0]['totalcarbohydrates'] + $lunch[0]['totalcarbohydrates'] + $evening[0]['totalcarbohydrates'] + $dinnner[0]['totalcarbohydrates'] + $bedtime[0]['totalcarbohydrates'] ;

		$totalfat = $mrng[0]['totalfat'] + $breakfast[0]['totalfat'] + $midmeal[0]['totalfat'] + $lunch[0]['totalfat'] + $evening[0]['totalfat'] + $dinnner[0]['totalfat'] + $bedtime[0]['totalfat'] ;

		$totalsodium = $mrng[0]['totalsodium'] + $breakfast[0]['totalsodium'] + $midmeal[0]['totalsodium'] + $lunch[0]['totalsodium'] + $evening[0]['totalsodium'] + $dinnner[0]['totalsodium'] + $bedtime[0]['totalsodium'] ;

		$totaliron = $mrng[0]['totaliron'] + $breakfast[0]['totaliron'] + $midmeal[0]['totaliron'] + $lunch[0]['totaliron'] + $evening[0]['totaliron'] + $dinnner[0]['totaliron'] + $bedtime[0]['totaliron'] ;

		$totald_fibre = $mrng[0]['totald_fibre'] + $breakfast[0]['totald_fibre'] + $midmeal[0]['totald_fibre'] + $lunch[0]['totald_fibre'] + $evening[0]['totald_fibre'] + $dinnner[0]['totald_fibre'] + $bedtime[0]['totaliron'] ;
		$day[$i]['totalcalories'] = 		$totalcalories;
		
		
		$chart = array(

			'morning'  => $mrng[0]['foodcombination_name'],
			'morning_no_of_chart' =>$mrng[0]['no_of_chart'],
			'breakfast'  => $breakfast[0]['foodcombination_name'],
			'breakfast_no_of_chart' => $breakfast[0]['no_of_chart'],
			'lunch'  => $lunch[0]['foodcombination_name'],
			'lunch_no_of_chart' =>  $lunch[0]['no_of_chart'],
			'evening'  =>  $evening[0]['foodcombination_name'],
			'evening_no_of_chart'  => $evening[0]['no_of_chart'],
			'dinnner'  => $dinnner[0]['foodcombination_name'],
			'dinnner_no_of_chart'  => $dinnner[0]['no_of_chart'],
			'bedtime'   => $bedtime[0]['foodcombination_name'],
			'bedtime_no_of_chart' => $bedtime[0]['no_of_chart'],
			'dinnner'      => $dinnner[0]['foodcombination_name'],
			'dinnner_no_of_chart'  => $dinnner[0]['no_of_chart'],
			'midmeal' => $midmeal[0]['foodcombination_name'],
			'midmeal_no_of_chart' =>$midmeal[0]['no_of_chart'],
			'totalcalories'  => $totalcalories,
			'totalprotein' => $totalprotein,
			'totalcarbohydrates'=> $totalcarbohydrates,
			'totalfat'=> $totalfat,
			'totalsodium'=> $totalsodium,
			'totaliron'=> $totaliron,
			'totald_fibre'=> $totald_fibre,
			'd_time'  =>date('Y-m-d h:i:sa'),
			'food_cate'  => $id2
 						);
		pr($chart);
		$this->Custommodel->insert_common('fake_chart',$chart);
		die;
		}else{
			
			 $this->chartPreTest();
		}
	}

	public function compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal){

		if($evening[0]['no_of_chart']==$mrng[0]['no_of_chart']){

			shuffle($evening);
			shuffle($mrng);

			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);

		}elseif($evening[0]['no_of_chart']==$bedtime[0]['no_of_chart']){
			shuffle($bedtime);

			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($evening[0]['no_of_chart']==$breakfast[0]['no_of_chart']){
			shuffle($breakfast);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($evening[0]['no_of_chart']==$dinnner[0]['no_of_chart']){
			shuffle($dinnner);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($evening[0]['no_of_chart']==$lunch[0]['no_of_chart']){
			shuffle($lunch);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($evening[0]['no_of_chart']==$midmeal[0]['no_of_chart']){
			shuffle($midmeal);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($mrng[0]['no_of_chart']==$bedtime[0]['no_of_chart']){
			shuffle($bedtime);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($mrng[0]['no_of_chart']==$breakfast[0]['no_of_chart']){
			shuffle($breakfast);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($mrng[0]['no_of_chart']==$dinnner[0]['no_of_chart']){
			shuffle($dinnner);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($mrng[0]['no_of_chart']==$lunch[0]['no_of_chart']){
			shuffle($lunch);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($mrng[0]['no_of_chart']==$midmeal[0]['no_of_chart']){
			shuffle($midmeal);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($bedtime[0]['no_of_chart']==$breakfast[0]['no_of_chart']){
			shuffle($breakfast);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($bedtime[0]['no_of_chart']==$dinnner[0]['no_of_chart']){
			shuffle($dinnner);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($bedtime[0]['no_of_chart']==$lunch[0]['no_of_chart']){
			shuffle($lunch);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($bedtime[0]['no_of_chart']==$midmeal[0]['no_of_chart']){
			shuffle($midmeal);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($dinnner[0]['no_of_chart']==$lunch[0]['no_of_chart']){
			shuffle($lunch);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($dinnner[0]['no_of_chart']==$midmeal[0]['no_of_chart']){
			shuffle($midmeal);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}elseif($lunch[0]['no_of_chart']==$midmeal[0]['no_of_chart']){
			shuffle($midmeal);
			
			$this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
			
		}else{
			return "success";
		}
	}

	public function Allmeal(){
	
	 $res = $this->Dietmodel->Allmeal();
	 $data["all_food"] = $this->Dietmodel->all_food();
	 $data['count'] = $this->Dietmodel->record_count_accept_meal();
	 $data['count_decline'] = $this->Dietmodel->record_count_decline_meal();
	 $data['count_remaining'] = $this->Dietmodel->record_count_remainings_meal();
	 // pr($data['count']);die;
	 $data["message"] = array_map("unserialize", array_unique(array_map("serialize", $res)));
	 $this->load->view('Admin/meal1.php',$data);
	}
	public function skip_bedtime_meal(){
	
	 $res = $this->Dietmodel->skip_bedtime_meal();
	 $res = array_map("unserialize", array_unique(array_map("serialize", $res)));

	 pr($res);
	}
	public function skip_mrng_meal(){
	
	 $res = $this->Dietmodel->skip_mrng_meal();
	 $res = array_map("unserialize", array_unique(array_map("serialize", $res)));

	 pr($res);
	}
	public function skip_mrng_bedtime_meal(){
	
	 $res = $this->Dietmodel->skip_mrng_bedtime_meal();
	 $res = array_map("unserialize", array_unique(array_map("serialize", $res)));

	 pr($res);
	}

	public function skip_mrng_bedtime(){
		date_default_timezone_set('Asia/Kolkata');

		$table = 'foodCombination';
		$where = 'placement';
		
		$where2 = "foodCategory";
		$id2 = '1'; // veg

		
		$id = '13'; // evening
		$evening = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		// $id = '12'; // mrng
		// $mrng = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$mrng = ['no_of_chart' =>'a'];
		$bedtime = ['no_of_chart' =>'b'];
		// $id = '9'; // bedtime
		// $bedtime = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '10'; // breakfast
		$breakfast = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '11'; // dinner
		$dinnner = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '14'; // lunch
		$lunch = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '15'; // midmeal
		$midmeal = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);
		shuffle($evening);
		shuffle($mrng);
		shuffle($bedtime);
		shuffle($breakfast);
		shuffle($dinnner);
		shuffle($lunch);
		shuffle($midmeal);

		$i=0;
		$res = $this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
		if($res =='success'){
		$day[$i]['morning'] = array(

						'calories' => $mrng[0]['totalcalories'],
						'food_name' => $mrng[0]['foodcombination_name'],
						'no_of_chart' => $mrng[0]['no_of_chart'],
						'fileterdisease' => $mrng[0]['fileterdisease']
				
						);
		$day[$i]['breakfast'] = array(

						'calories' => $breakfast[0]['totalcalories'],
						'food_name' => $breakfast[0]['foodcombination_name'],
						'no_of_chart' => $breakfast[0]['no_of_chart'],
				
						);
		$day[$i]['midmeal'] = array(

						'calories' => $midmeal[0]['totalcalories'],
						'food_name' => $midmeal[0]['foodcombination_name'],
						'no_of_chart' => $midmeal[0]['no_of_chart'],
				
						);
		$day[$i]['lunch'] = array(

						'calories' => $lunch[0]['totalcalories'],
						'food_name' => $lunch[0]['foodcombination_name'],
						'no_of_chart' => $lunch[0]['no_of_chart'],
				
						);
		$day[$i]['evening'] = array(

						'calories' => $evening[0]['totalcalories'],
						'food_name' => $evening[0]['foodcombination_name'],
						'no_of_chart' => $evening[0]['no_of_chart'],
				
						);
		$day[$i]['dinnner'] = array(

						'calories' => $dinnner[0]['totalcalories'],
						'food_name' => $dinnner[0]['foodcombination_name'],
						'no_of_chart' => $dinnner[0]['no_of_chart'],
				
						);
		$day[$i]['bedtime'] = array(

						'calories' => $bedtime[0]['totalcalories'],
						'food_name' => $bedtime[0]['foodcombination_name'],
						'no_of_chart' => $bedtime[0]['no_of_chart'],
				
						);
		
		
		$totalcalories = 0 + $breakfast[0]['totalcalories'] + $midmeal[0]['totalcalories'] + $lunch[0]['totalcalories'] + $evening[0]['totalcalories'] + $dinnner[0]['totalcalories'] + 0 ;

		$totalprotein = 0+ $breakfast[0]['totalprotein'] + $midmeal[0]['totalprotein'] + $lunch[0]['totalprotein'] + $evening[0]['totalprotein'] + $dinnner[0]['totalprotein'] +0 ;

		$totalcarbohydrates = 0+ $breakfast[0]['totalcarbohydrates'] + $midmeal[0]['totalcarbohydrates'] + $lunch[0]['totalcarbohydrates'] + $evening[0]['totalcarbohydrates'] + $dinnner[0]['totalcarbohydrates'] + 0;

		$totalfat = 0 + $breakfast[0]['totalfat'] + $midmeal[0]['totalfat'] + $lunch[0]['totalfat'] + $evening[0]['totalfat'] + $dinnner[0]['totalfat'] +0;

		$totalsodium = 0 + $breakfast[0]['totalsodium'] + $midmeal[0]['totalsodium'] + $lunch[0]['totalsodium'] + $evening[0]['totalsodium'] + $dinnner[0]['totalsodium'] + 0 ;

		$totaliron = 0 + $breakfast[0]['totaliron'] + $midmeal[0]['totaliron'] + $lunch[0]['totaliron'] + $evening[0]['totaliron'] + $dinnner[0]['totaliron'] + 0 ;

		$totald_fibre = 0 + $breakfast[0]['totald_fibre'] + $midmeal[0]['totald_fibre'] + $lunch[0]['totald_fibre'] + $evening[0]['totald_fibre'] + $dinnner[0]['totald_fibre'] + 0 ;
		$day[$i]['totalcalories'] = 		$totalcalories;
		
		
		$chart = array(

			
			'breakfast'  => $breakfast[0]['foodcombination_name'],
			'breakfast_no_of_chart' => $breakfast[0]['no_of_chart'],
			'lunch'  => $lunch[0]['foodcombination_name'],
			'lunch_no_of_chart' =>  $lunch[0]['no_of_chart'],
			'evening'  =>  $evening[0]['foodcombination_name'],
			'evening_no_of_chart'  => $evening[0]['no_of_chart'],
			'dinnner'  => $dinnner[0]['foodcombination_name'],
			'dinnner_no_of_chart'  => $dinnner[0]['no_of_chart'],
			
			'dinnner'      => $dinnner[0]['foodcombination_name'],
			'dinnner_no_of_chart'  => $dinnner[0]['no_of_chart'],
			'midmeal' => $midmeal[0]['foodcombination_name'],
			'midmeal_no_of_chart' =>$midmeal[0]['no_of_chart'],
			'totalcalories'  => $totalcalories,
			'totalprotein' => $totalprotein,
			'totalcarbohydrates'=> $totalcarbohydrates,
			'totalfat'=> $totalfat,
			'totalsodium'=> $totalsodium,
			'totaliron'=> $totaliron,
			'totald_fibre'=> $totald_fibre,
			'd_time'  =>date('Y-m-d h:i:sa'),
			'food_cate'  => $id2
 						);
		pr($chart);
		$this->Custommodel->insert_common('skip_mrng_bedtime',$chart);
		die;
		}else{
			
			 $this->chartPreTest();
		}
	}

	public function skip_bedtime(){
		date_default_timezone_set('Asia/Kolkata');

		$table = 'foodCombination';
		$where = 'placement';
		
		$where2 = "foodCategory";
		$id2 = '1'; // veg

		
		$id = '13'; // evening
		$evening = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);
		$id = '12'; // mrng
		$mrng = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		// $id = '9'; // bedtime
		// $bedtime = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);
		$bedtime = ['no_of_chart' =>'b'];
		$id = '10'; // breakfast
		$breakfast = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '11'; // dinner
		$dinnner = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '14'; // lunch
		$lunch = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '15'; // midmeal
		$midmeal = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);
		shuffle($evening);
		shuffle($mrng);
		shuffle($bedtime);
		shuffle($breakfast);
		shuffle($dinnner);
		shuffle($lunch);
		shuffle($midmeal);

		$i=0;
		$res = $this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
		if($res =='success'){
			pr($lunch[0]);die;
		$day[$i]['morning'] = array(

						'calories' => $mrng[0]['totalcalories'],
						'food_name' => $mrng[0]['foodcombination_name'],
						'no_of_chart' => $mrng[0]['no_of_chart'],
						'fileterdisease' => $mrng[0]['fileterdisease']
				
						);
		$day[$i]['breakfast'] = array(

						'calories' => $breakfast[0]['totalcalories'],
						'food_name' => $breakfast[0]['foodcombination_name'],
						'no_of_chart' => $breakfast[0]['no_of_chart'],
				
						);
		$day[$i]['midmeal'] = array(

						'calories' => $midmeal[0]['totalcalories'],
						'food_name' => $midmeal[0]['foodcombination_name'],
						'no_of_chart' => $midmeal[0]['no_of_chart'],
				
						);
		$day[$i]['lunch'] = array(

						'calories' => $lunch[0]['totalcalories'],
						'food_name' => $lunch[0]['foodcombination_name'],
						'no_of_chart' => $lunch[0]['no_of_chart'],
				
						);
		$day[$i]['evening'] = array(

						'calories' => $evening[0]['totalcalories'],
						'food_name' => $evening[0]['foodcombination_name'],
						'no_of_chart' => $evening[0]['no_of_chart'],
				
						);
		$day[$i]['dinnner'] = array(

						'calories' => $dinnner[0]['totalcalories'],
						'food_name' => $dinnner[0]['foodcombination_name'],
						'no_of_chart' => $dinnner[0]['no_of_chart'],
				
						);
		$day[$i]['bedtime'] = array(

						'calories' => $bedtime[0]['totalcalories'],
						'food_name' => $bedtime[0]['foodcombination_name'],
						'no_of_chart' => $bedtime[0]['no_of_chart'],
				
						);
		
		
		$totalcalories = $mrng[0]['totalcalories'] + $breakfast[0]['totalcalories'] + $midmeal[0]['totalcalories'] + $lunch[0]['totalcalories'] + $evening[0]['totalcalories'] + $dinnner[0]['totalcalories'] + 0 ;

		$totalprotein = $mrng[0]['totalprotein'] + $breakfast[0]['totalprotein'] + $midmeal[0]['totalprotein'] + $lunch[0]['totalprotein'] + $evening[0]['totalprotein'] + $dinnner[0]['totalprotein'] + 0;

		$totalcarbohydrates = $mrng[0]['totalcarbohydrates'] + $breakfast[0]['totalcarbohydrates'] + $midmeal[0]['totalcarbohydrates'] + $lunch[0]['totalcarbohydrates'] + $evening[0]['totalcarbohydrates'] + $dinnner[0]['totalcarbohydrates'] + 0 ;

		$totalfat = $mrng[0]['totalfat'] + $breakfast[0]['totalfat'] + $midmeal[0]['totalfat'] + $lunch[0]['totalfat'] + $evening[0]['totalfat'] + $dinnner[0]['totalfat'] + 0 ;

		$totalsodium = $mrng[0]['totalsodium'] + $breakfast[0]['totalsodium'] + $midmeal[0]['totalsodium'] + $lunch[0]['totalsodium'] + $evening[0]['totalsodium'] + $dinnner[0]['totalsodium'] + 0 ;

		$totaliron = $mrng[0]['totaliron'] + $breakfast[0]['totaliron'] + $midmeal[0]['totaliron'] + $lunch[0]['totaliron'] + $evening[0]['totaliron'] + $dinnner[0]['totaliron'] +0 ;

		$totald_fibre = $mrng[0]['totald_fibre'] + $breakfast[0]['totald_fibre'] + $midmeal[0]['totald_fibre'] + $lunch[0]['totald_fibre'] + $evening[0]['totald_fibre'] + $dinnner[0]['totald_fibre'] + 0 ;
		$day[$i]['totalcalories'] = 		$totalcalories;
		
		
		$chart = array(

			'morning'  => $mrng[0]['foodcombination_name'],
			'morning_no_of_chart' =>$mrng[0]['no_of_chart'],
			'breakfast'  => $breakfast[0]['foodcombination_name'],
			'breakfast_no_of_chart' => $breakfast[0]['no_of_chart'],
			'lunch'  => $lunch[0]['foodcombination_name'],
			'lunch_no_of_chart' =>  $lunch[0]['no_of_chart'],
			'evening'  =>  $evening[0]['foodcombination_name'],
			'evening_no_of_chart'  => $evening[0]['no_of_chart'],
			'dinnner'  => $dinnner[0]['foodcombination_name'],
			'dinnner_no_of_chart'  => $dinnner[0]['no_of_chart'],
			'dinnner'      => $dinnner[0]['foodcombination_name'],
			'dinnner_no_of_chart'  => $dinnner[0]['no_of_chart'],
			'midmeal' => $midmeal[0]['foodcombination_name'],
			'midmeal_no_of_chart' =>$midmeal[0]['no_of_chart'],
			'totalcalories'  => $totalcalories,
			'totalprotein' => $totalprotein,
			'totalcarbohydrates'=> $totalcarbohydrates,
			'totalfat'=> $totalfat,
			'totalsodium'=> $totalsodium,
			'totaliron'=> $totaliron,
			'totald_fibre'=> $totald_fibre,
			'd_time'  =>date('Y-m-d h:i:sa'),
			'food_cate'  => $id2
 						);
		pr($chart);
		$this->Custommodel->insert_common('skip_bedtime',$chart);
		die;
		}else{
			
			 $this->chartPreTest();
		}
	}

	public function skip_mrng(){
		date_default_timezone_set('Asia/Kolkata');

		$table = 'foodCombination';
		$where = 'placement';
		
		$where2 = "foodCategory";
		$id2 = '1'; // veg

		
		$id = '13'; // evening
		$evening = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);
		// $id = '12'; // mrng
		// $mrng = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);
		$mrng = ['no_of_chart' =>'a'];
		$id = '9'; // bedtime
		$bedtime = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '10'; // breakfast
		$breakfast = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '11'; // dinner
		$dinnner = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '14'; // lunch
		$lunch = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);

		$id = '15'; // midmeal
		$midmeal = $this->Dietmodel->select_com_where_limit($table, $where, $id, $where2,$id2);
		shuffle($evening);
		shuffle($mrng);
		shuffle($bedtime);
		shuffle($breakfast);
		shuffle($dinnner);
		shuffle($lunch);
		shuffle($midmeal);

		$i=0;
		$res = $this->compare($evening,$mrng,$bedtime,$breakfast,$dinnner,$lunch,$midmeal);
		if($res =='success'){
		$day[$i]['morning'] = array(

						'calories' => $mrng[0]['totalcalories'],
						'food_name' => $mrng[0]['foodcombination_name'],
						'no_of_chart' => $mrng[0]['no_of_chart'],
						'fileterdisease' => $mrng[0]['fileterdisease']
				
						);
		$day[$i]['breakfast'] = array(

						'calories' => $breakfast[0]['totalcalories'],
						'food_name' => $breakfast[0]['foodcombination_name'],
						'no_of_chart' => $breakfast[0]['no_of_chart'],
				
						);
		$day[$i]['midmeal'] = array(

						'calories' => $midmeal[0]['totalcalories'],
						'food_name' => $midmeal[0]['foodcombination_name'],
						'no_of_chart' => $midmeal[0]['no_of_chart'],
				
						);
		$day[$i]['lunch'] = array(

						'calories' => $lunch[0]['totalcalories'],
						'food_name' => $lunch[0]['foodcombination_name'],
						'no_of_chart' => $lunch[0]['no_of_chart'],
				
						);
		$day[$i]['evening'] = array(

						'calories' => $evening[0]['totalcalories'],
						'food_name' => $evening[0]['foodcombination_name'],
						'no_of_chart' => $evening[0]['no_of_chart'],
				
						);
		$day[$i]['dinnner'] = array(

						'calories' => $dinnner[0]['totalcalories'],
						'food_name' => $dinnner[0]['foodcombination_name'],
						'no_of_chart' => $dinnner[0]['no_of_chart'],
				
						);
		$day[$i]['bedtime'] = array(

						'calories' => $bedtime[0]['totalcalories'],
						'food_name' => $bedtime[0]['foodcombination_name'],
						'no_of_chart' => $bedtime[0]['no_of_chart'],
				
						);
		
		
		$totalcalories = 0 + $breakfast[0]['totalcalories'] + $midmeal[0]['totalcalories'] + $lunch[0]['totalcalories'] + $evening[0]['totalcalories'] + $dinnner[0]['totalcalories'] + $bedtime[0]['totalcalories'] ;

		$totalprotein = 0 + $breakfast[0]['totalprotein'] + $midmeal[0]['totalprotein'] + $lunch[0]['totalprotein'] + $evening[0]['totalprotein'] + $dinnner[0]['totalprotein'] + $bedtime[0]['totalprotein'] ;

		$totalcarbohydrates = 0 + $breakfast[0]['totalcarbohydrates'] + $midmeal[0]['totalcarbohydrates'] + $lunch[0]['totalcarbohydrates'] + $evening[0]['totalcarbohydrates'] + $dinnner[0]['totalcarbohydrates'] + $bedtime[0]['totalcarbohydrates'] ;

		$totalfat = 0 + $breakfast[0]['totalfat'] + $midmeal[0]['totalfat'] + $lunch[0]['totalfat'] + $evening[0]['totalfat'] + $dinnner[0]['totalfat'] + $bedtime[0]['totalfat'] ;

		$totalsodium = 0 + $breakfast[0]['totalsodium'] + $midmeal[0]['totalsodium'] + $lunch[0]['totalsodium'] + $evening[0]['totalsodium'] + $dinnner[0]['totalsodium'] + $bedtime[0]['totalsodium'] ;

		$totaliron =0 + $breakfast[0]['totaliron'] + $midmeal[0]['totaliron'] + $lunch[0]['totaliron'] + $evening[0]['totaliron'] + $dinnner[0]['totaliron'] + $bedtime[0]['totaliron'] ;

		$totald_fibre = 0 + $breakfast[0]['totald_fibre'] + $midmeal[0]['totald_fibre'] + $lunch[0]['totald_fibre'] + $evening[0]['totald_fibre'] + $dinnner[0]['totald_fibre'] + $bedtime[0]['totaliron'] ;
		$day[$i]['totalcalories'] = 		$totalcalories;
		
		
		$chart = array(

		
			'breakfast'  => $breakfast[0]['foodcombination_name'],
			'breakfast_no_of_chart' => $breakfast[0]['no_of_chart'],
			'lunch'  => $lunch[0]['foodcombination_name'],
			'lunch_no_of_chart' =>  $lunch[0]['no_of_chart'],
			'evening'  =>  $evening[0]['foodcombination_name'],
			'evening_no_of_chart'  => $evening[0]['no_of_chart'],
			'dinnner'  => $dinnner[0]['foodcombination_name'],
			'dinnner_no_of_chart'  => $dinnner[0]['no_of_chart'],
			'bedtime'   => $bedtime[0]['foodcombination_name'],
			'bedtime_no_of_chart' => $bedtime[0]['no_of_chart'],
			'dinnner'      => $dinnner[0]['foodcombination_name'],
			'dinnner_no_of_chart'  => $dinnner[0]['no_of_chart'],
			'midmeal' => $midmeal[0]['foodcombination_name'],
			'midmeal_no_of_chart' =>$midmeal[0]['no_of_chart'],
			'totalcalories'  => $totalcalories,
			'totalprotein' => $totalprotein,
			'totalcarbohydrates'=> $totalcarbohydrates,
			'totalfat'=> $totalfat,
			'totalsodium'=> $totalsodium,
			'totaliron'=> $totaliron,
			'totald_fibre'=> $totald_fibre,
			'd_time'  =>date('Y-m-d h:i:sa'),
			'food_cate'  => $id2
 						);
		pr($chart);
		$this->Custommodel->insert_common('skip_mrng',$chart);
		die;
		}else{
			
			 $this->chartPreTest();
		}
	}
	public function submitAllmeal(){
		// pr($_POST);die;
		foreach ($_POST['morning_data_food'] as $key => $value) {
			if($_POST['morning_data_quantity'][$key]!=0){
				$morning_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['morning_data_quantity'] as $key => $value) {
			if($value!=0){
				$morning_array[$key]['quantity'] = $value;	
			}
			
		}

		foreach ($_POST['breakfast_data_food'] as $key => $value) {
			if($_POST['breakfast_data_quantity'][$key]!=0){
				$breakfast_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['breakfast_data_quantity'] as $key => $value) {
			if($value!=0){
			$breakfast_array[$key]['quantity'] = $value;

			}
		}

		foreach ($_POST['midmeal_data_food'] as $key => $value) {
			if($_POST['midmeal_data_quantity'][$key]!=0){
				$midmeal_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['midmeal_data_quantity'] as $key => $value) {
			if($value !=0){
				$midmeal_array[$key]['quantity'] = $value;

			}
		}

		foreach ($_POST['lunch_data_food'] as $key => $value) {
			if($_POST['lunch_data_quantity'][$key]!=0){
				$lunch_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['lunch_data_quantity'] as $key => $value) {
			if($value !=0){
				$lunch_array[$key]['quantity'] = $value;	
			}
			
		}

		foreach ($_POST['evening_data_food'] as $key => $value) {
			if($_POST['evening_data_quantity'][$key]!=0){
				$evening_array[$key]['foodId'] = $value;	
			}
			
		}foreach ($_POST['evening_data_quantity'] as $key => $value) {
			if($value !=0){
				$evening_array[$key]['quantity'] = $value;	
			}
			
		}

		foreach ($_POST['dinnner_data_food'] as $key => $value) {
			if($_POST['dinnner_data_quantity'][$key]!=0){
				$dinnner_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['dinnner_data_quantity'] as $key => $value) {
			if($value !=0){
			$dinnner_array[$key]['quantity'] = $value;

			}
		}

		// foreach ($_POST['bedtime_data_food'] as $key => $value) {
		// 	if($_POST['bedtime_data_quantity'][$key]!=0){
		// 		$bedtime_array[$key]['foodId'] = $value;	
		// 	}
			
		// }foreach ($_POST['bedtime_data_quantity'] as $key => $value) {
		// 	if($value !=0){
		// 	$bedtime_array[$key]['quantity'] = $value;
							
		// 	}
		// }
		
		if($_POST["morning_change"]==1){
			$morning_array_data = $this->getcaldata_foodid($morning_array);
		}else{
			$morning_array_data = $this->addCombinationwith_foodid($morning_array,'12');	
			$final_chart['morning'] = $morning_array_data['foodcombination_name'];
			$final_chart['morning_no_of_chart'] = $morning_array_data['no_of_chart'];
		}

		if($_POST["breakfast_change"]==1){
			$breakfast_array_data = $this->getcaldata_foodid($breakfast_array);
		}else{
			$breakfast_array_data = $this->addCombinationwith_foodid($breakfast_array,'10');	
			$final_chart['breakfast'] = $breakfast_array_data['foodcombination_name'];
			$final_chart['breakfast_no_of_chart'] = $breakfast_array_data['no_of_chart'];
		}

		if($_POST["midmeal_change"]==1){
			$midmeal_array_data = $this->getcaldata_foodid($midmeal_array);
		}else{
			$midmeal_array_data = $this->addCombinationwith_foodid($midmeal_array,'15');	
			$final_chart['midmeal'] = $midmeal_array_data['foodcombination_name'];
			$final_chart['midmeal_no_of_chart'] = $midmeal_array_data['no_of_chart'];
		}

		if($_POST["lunch_change"]==1){
			$lunch_array_data = $this->getcaldata_foodid($lunch_array);
		}else{
			$lunch_array_data = $this->addCombinationwith_foodid($lunch_array,'14');	
			$final_chart['lunch'] = $lunch_array_data['foodcombination_name'];
			$final_chart['lunch_no_of_chart'] = $lunch_array_data['no_of_chart'];
		}

		if($_POST["evening_change"]==1){
			$evening_array_data = $this->getcaldata_foodid($evening_array);
		}else{
			$evening_array_data = $this->addCombinationwith_foodid($evening_array,'13');	
			$final_chart['evening'] = $evening_array_data['foodcombination_name'];
			$final_chart['evening_no_of_chart'] = $evening_array_data['no_of_chart'];
		}

		if($_POST["dinnner_change"]==1){
			$dinnner_array_data = $this->getcaldata_foodid($dinnner_array);
		}else{
			$dinnner_array_data = $this->addCombinationwith_foodid($dinnner_array,'11');	
			$final_chart['dinnner'] = $dinnner_array_data['foodcombination_name'];
			$final_chart['dinnner_no_of_chart'] = $dinnner_array_data['no_of_chart'];
		}

		// if($_POST["bedtime_change"]==1){
		// 	$bedtime_array_data = $this->getcaldata_foodid($bedtime_array);
		// }else{
		// 	$bedtime_array_data = $this->addCombinationwith_foodid($bedtime_array,'9');	
		// 	$final_chart['bedtime'] = $bedtime_array_data['foodcombination_name'];
		// 	$final_chart['bedtime_no_of_chart'] = $bedtime_array_data['no_of_chart'];
		// }

		$final_chart['totalcalories'] = $morning_array_data['totalcalories'] + $breakfast_array_data['totalcalories'] +$midmeal_array_data['totalcalories'] + $lunch_array_data['totalcalories'] + $evening_array_data['totalcalories'] + $dinnner_array_data['totalcalories'];
		$final_chart['totalprotein'] = $morning_array_data['totalprotein'] + $breakfast_array_data['totalprotein'] +$midmeal_array_data['totalprotein'] + $lunch_array_data['totalprotein'] + $evening_array_data['totalprotein'] + $dinnner_array_data['totalprotein'] ;

		$final_chart['totalcarbohydrates'] = $morning_array_data['totalcarbohydrates'] + $breakfast_array_data['totalcarbohydrates'] +$midmeal_array_data['totalcarbohydrates'] + $lunch_array_data['totalcarbohydrates'] + $evening_array_data['totalcarbohydrates'] + $dinnner_array_data['totalcarbohydrates'];

		$final_chart['totalfat'] = $morning_array_data['totalfat'] + $breakfast_array_data['totalfat'] +$midmeal_array_data['totalfat'] + $lunch_array_data['totalfat'] + $evening_array_data['totalfat'] + $dinnner_array_data['totalfat'];

		$final_chart['totalsodium'] = $morning_array_data['totalsodium'] + $breakfast_array_data['totalsodium'] +$midmeal_array_data['totalsodium'] + $lunch_array_data['totalsodium'] + $evening_array_data['totalsodium'] + $dinnner_array_data['totalsodium'];

		$final_chart['totaliron'] = $morning_array_data['totaliron'] + $breakfast_array_data['totaliron'] +$midmeal_array_data['totaliron'] + $lunch_array_data['totaliron'] + $evening_array_data['totaliron'] + $dinnner_array_data['totaliron'] ;

		$final_chart['totald_fibre'] = $morning_array_data['totald_fibre'] + $breakfast_array_data['totald_fibre'] +$midmeal_array_data['totald_fibre'] + $lunch_array_data['totald_fibre'] + $evening_array_data['totald_fibre'] + $dinnner_array_data['totald_fibre'] ;

		// $data = $this->addCombinationwith_foodid($breakfast_array);
		$final_chart['status']  = 1; // Verified
		$this->Custommodel->update_common($final_chart,'skip_bedtime','id',$_POST['chart_id']);
		redirect("Admin/Allmeal");
	}

	public function getcaldata_foodid($foodArray){
		// available in helper too
		// acording to food id get cal data
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
						'no_of_chart'          => $chart_data[0]['no_of_chart']
						);
		return $totalval;
	}	

	public function addCombinationwith_foodid($foodArray,$plac){
 
		// addCombinationwith_foodid//
		$placement =  13;
		$foodCategory =  1;
		
		$chart = $this->Custommodel->Select_common_orderby('foodCombination','no_of_chart');
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
			 $this->Dietmodel->update_foodcombination($totalval,$getMaxCombination,$maxFoodId);
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

	public function rejectMeal(){
		$final_chart['status']  = 2; // Verified
		$this->Custommodel->update_common($final_chart,'final_chart_2700_2800','id',$_POST['chart_id']);
		redirect("Admin/foodentry");
	}

	public function rejectMeal1(){
		$final_chart['status']  = 2; // Verified
		$this->Custommodel->update_common($final_chart,'final_chart_2900_3000','id',$_POST['chart_id']);
		redirect("Admin/foodentry1");
	}

	
	public function data_tranfer_script(){
		// die;
		// die("Cron path");
		// $this->Dietmodel->truncate_table();die;
		$data = $this->Dietmodel->Allmeal_get_records();
		// pr($data);die;
		foreach ($data as  $value) {
			// $total= $this->get_total_calulated_data($value);
			// $value['totalcalories'] = $total['calories'];
			// $value['totalcarbohydrates'] = $total['carbohydrates'];
			// $value['totalfat'] = $total['fat'];
			// $value['totalsodium'] = $total['sodium'];
			// $value['totaliron'] = $total['iron'];
			// $value['totald_fibre'] = $total['fibre'];
			// $value['totalprotein'] = $total['protein'];
			$table= $this->get_table_name($value['totalcalories']);
			unset($value['id']);
			// unset($value['morning_data']);
			// unset($value['breakfast_data']);
			// unset($value['midmeal_data']);
			// unset($value['lunch_data']);
			// unset($value['evening_data']);
			// unset($value['dinnner_data']);
			// unset($value['bedtime_data']);
			// $value['type'] = 5;
			// $value['status'] = 1;

			// // skip section
			// unset($value['midmeal']);
			// unset($value['midmeal_no_of_chart']);
			// unset($value['evening']);
			// unset($value['evening_no_of_chart']);
			// pr($value);die;
			// 
			$this->Custommodel->insert_common($table,$value);
		}
		echo "jeet";
		//pr($data);die;
	}
	private function get_total_calulated_data($data){
		$calories = 0;
		$carbohydrates = 0;
		$fat = 0;
		$sodium = 0;
		$iron = 0;
		$fibre = 0;
		$protein =0;

		// $types = array('morning_data','breakfast_data','midmeal_data','lunch_data','dinnner_data','bedtime_data','evening_data');
		$types = array('morning_data','midmeal_data','lunch_data','dinnner_data','bedtime_data');
		foreach($types as $type){
			foreach($data[$type] as $morning){
				$quan  = $morning['quantity'];
				$fooddata = $this->Custommodel->Select_common_where('food_master','id',$morning['foodId']);
				$calories += $quan * $fooddata[0]['calories'];
				$carbohydrates += $quan * $fooddata[0]['carbohydrates'];
				$fat += $quan * $fooddata[0]['fat'];
				$sodium +=$quan * $fooddata[0]['sodium'];
				$iron += $quan * $fooddata[0]['iron'];
				$fibre += $quan * $fooddata[0]['d_fibre'];
				$protein += $quan * $fooddata[0]['protein'];
			}
		}

		$array = array(
			'calories' => $calories,
			'carbohydrates' => $carbohydrates,
			'fat' => $fat,
			'sodium' => $sodium,
			'iron' => $iron,
			'fibre' => $fibre,
			'protein' => $protein,
			);
		
		return $array;
	}

 
	public function get_seveth_day($f_date,$l_date,$uid){
		
		$Date = $f_date;
		$c_date =  date('Y-m-d', strtotime($Date. ' + 7 days'));
		if($c_date<$l_date){
			$seven_day = array(
				'user_id' => $uid,
				'call_date' => $c_date,
				'status'  => 1
							);
			$this->Custommodel->insert_common('call_schedule',$seven_day);
			return $c_date;
		}else{
			$c_d = '';
			return $c_d;
		}
	}

	public function check_add($f_date,$l_date,$uid){
		
		$f_date = $this->get_seveth_day($f_date,$l_date,$uid);
		if($f_date){
			$f_date = $this->get_seveth_day($f_date,$l_date,$uid);
			$this->check_add($f_date,$l_date,$uid);
		}
	}

	public function cron_update_call_schedule(){
		
		$date = date('Y-m-d');
		$data = array('status' => 1);
		$this->Custommodel->update_common($data,'call_schedule','call_date',$date);
		echo "Success";

	}

	public function cron_update_measurment(){
		$date = date('Y-m-d');
		$fooddata = $this->Custommodel->Select_common_where('call_schedule','call_date',$date);
		//pr($fooddata);
		foreach($fooddata as $val){
			$data = array('measurment_done' => 'N');
			$this->Custommodel->update_common($data,'customers_info','id',$val['id']);
		}
		echo "Success";
	}

	public function cron_plan_renewal_reminder(){
		$get_data = $this->Custommodel->Select_common('customers_info');
		foreach($fooddata as $val){

		$date = ''; // meal end date
			$date = strtotime($date);
			$date = strtotime("-7 day", $date);
			$startdate =  date('Y-m-d', $date);

		}
	}
 
	public function Submit_manual_chart(){
		// pr($_POST);die;
		foreach ($_POST['morning_data_food'] as $key => $value) {
			if($_POST['morning_data_quantity'][$key]!=0){
				$morning_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['morning_data_quantity'] as $key => $value) {
			if($value!=0){
				$morning_array[$key]['quantity'] = $value;	
			}
			
		}

		foreach ($_POST['breakfast_data_food'] as $key => $value) {
			if($_POST['breakfast_data_quantity'][$key]!=0){
				$breakfast_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['breakfast_data_quantity'] as $key => $value) {
			if($value!=0){
			$breakfast_array[$key]['quantity'] = $value;

			}
		}
		
		foreach ($_POST['midmeal_data_food'] as $key => $value) {
			if($_POST['midmeal_data_quantity'][$key]!=0){
				$midmeal_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['midmeal_data_quantity'] as $key => $value) {
			if($value !=0){
				$midmeal_array[$key]['quantity'] = $value;

			}
		}

		foreach ($_POST['lunch_data_food'] as $key => $value) {
			if($_POST['lunch_data_quantity'][$key]!=0){
				$lunch_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['lunch_data_quantity'] as $key => $value) {
			if($value !=0){
				$lunch_array[$key]['quantity'] = $value;	
			}
			
		}

		foreach ($_POST['evening_data_food'] as $key => $value) {
			if($_POST['evening_data_quantity'][$key]!=0){
				$evening_array[$key]['foodId'] = $value;	
			}
			
		}foreach ($_POST['evening_data_quantity'] as $key => $value) {
			if($value !=0){
				$evening_array[$key]['quantity'] = $value;	
			}
			
		}

		foreach ($_POST['dinnner_data_food'] as $key => $value) {
			if($_POST['dinnner_data_quantity'][$key]!=0){
				$dinnner_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['dinnner_data_quantity'] as $key => $value) {
			if($value !=0){
			$dinnner_array[$key]['quantity'] = $value;

			}
		}

		foreach ($_POST['bedtime_data_food'] as $key => $value) {
			if($_POST['bedtime_data_quantity'][$key]!=0){
				$bedtime_array[$key]['foodId'] = $value;	
			}
			
		}foreach ($_POST['bedtime_data_quantity'] as $key => $value) {
			if($value !=0){
			$bedtime_array[$key]['quantity'] = $value;
							
			}
		}
		// pr($bedtime_array);die;
		// if($_POST["morning_change"]==1){
		// 	$morning_array_data = $this->getcaldata_foodid($morning_array);
		// }else{
			$morning_array_data = $this->addCombinationwith_foodid($morning_array,'12');	
			$final_chart['morning'] = $morning_array_data['foodcombination_name'];
			$final_chart['morning_no_of_chart'] = $morning_array_data['no_of_chart'];
		//	}

		// if($_POST["breakfast_change"]==1){
		// 	$breakfast_array_data = $this->getcaldata_foodid($breakfast_array);
		// }else{
			$breakfast_array_data = $this->addCombinationwith_foodid($breakfast_array,'10');	
			$final_chart['breakfast'] = $breakfast_array_data['foodcombination_name'];
			$final_chart['breakfast_no_of_chart'] = $breakfast_array_data['no_of_chart'];
		// }

		// if($_POST["midmeal_change"]==1){
		// 	$midmeal_array_data = $this->getcaldata_foodid($midmeal_array);
		// }else{
			$midmeal_array_data = $this->addCombinationwith_foodid($midmeal_array,'15');	
			$final_chart['midmeal'] = $midmeal_array_data['foodcombination_name'];
			$final_chart['midmeal_no_of_chart'] = $midmeal_array_data['no_of_chart'];
		//}

		// if($_POST["lunch_change"]==1){
		// 	$lunch_array_data = $this->getcaldata_foodid($lunch_array);
		// }else{
			$lunch_array_data = $this->addCombinationwith_foodid($lunch_array,'14');	
			$final_chart['lunch'] = $lunch_array_data['foodcombination_name'];
			$final_chart['lunch_no_of_chart'] = $lunch_array_data['no_of_chart'];
		//}

		// if($_POST["evening_change"]==1){
		// 	$evening_array_data = $this->getcaldata_foodid($evening_array);
		// }else{
			$evening_array_data = $this->addCombinationwith_foodid($evening_array,'13');	
			$final_chart['evening'] = $evening_array_data['foodcombination_name'];
			$final_chart['evening_no_of_chart'] = $evening_array_data['no_of_chart'];
		//}

		// if($_POST["dinnner_change"]==1){
		// 	$dinnner_array_data = $this->getcaldata_foodid($dinnner_array);
		// }else{
			$dinnner_array_data = $this->addCombinationwith_foodid($dinnner_array,'11');	
			$final_chart['dinnner'] = $dinnner_array_data['foodcombination_name'];
			$final_chart['dinnner_no_of_chart'] = $dinnner_array_data['no_of_chart'];
		//}

		// if($_POST["bedtime_change"]==1){
		// 	$bedtime_array_data = $this->getcaldata_foodid($bedtime_array);
		// }else{
			$bedtime_array_data = $this->addCombinationwith_foodid($bedtime_array,'9');	
			$final_chart['bedtime'] = $bedtime_array_data['foodcombination_name'];
			$final_chart['bedtime_no_of_chart'] = $bedtime_array_data['no_of_chart'];
		//}

		$final_chart['totalcalories'] = $morning_array_data['totalcalories'] + $breakfast_array_data['totalcalories'] +$midmeal_array_data['totalcalories'] + $lunch_array_data['totalcalories'] + $evening_array_data['totalcalories'] + $dinnner_array_data['totalcalories'] + $bedtime_array_data['totalcalories'];

		$final_chart['totalprotein'] = $morning_array_data['totalprotein'] + $breakfast_array_data['totalprotein'] +$midmeal_array_data['totalprotein'] + $lunch_array_data['totalprotein'] + $evening_array_data['totalprotein'] + $dinnner_array_data['totalprotein'] + $bedtime_array_data['totalprotein'] ;

		$final_chart['totalcarbohydrates'] = $morning_array_data['totalcarbohydrates'] + $breakfast_array_data['totalcarbohydrates'] +$midmeal_array_data['totalcarbohydrates'] + $lunch_array_data['totalcarbohydrates'] + $evening_array_data['totalcarbohydrates'] + $dinnner_array_data['totalcarbohydrates'] + $bedtime_array_data['totalcarbohydrates'];

		$final_chart['totalfat'] = $morning_array_data['totalfat'] + $breakfast_array_data['totalfat'] +$midmeal_array_data['totalfat'] + $lunch_array_data['totalfat'] + $evening_array_data['totalfat'] + $dinnner_array_data['totalfat'] + $bedtime_array_data['totalfat'];

		$final_chart['totalsodium'] = $morning_array_data['totalsodium'] + $breakfast_array_data['totalsodium'] +$midmeal_array_data['totalsodium'] + $lunch_array_data['totalsodium'] + $evening_array_data['totalsodium'] + $dinnner_array_data['totalsodium'] + $bedtime_array_data['totalsodium'];

		$final_chart['totaliron'] = $morning_array_data['totaliron'] + $breakfast_array_data['totaliron'] +$midmeal_array_data['totaliron'] + $lunch_array_data['totaliron'] + $evening_array_data['totaliron'] + $dinnner_array_data['totaliron'] + $bedtime_array_data['totaliron'];

		$final_chart['totald_fibre'] = $morning_array_data['totald_fibre'] + $breakfast_array_data['totald_fibre'] +$midmeal_array_data['totald_fibre'] + $lunch_array_data['totald_fibre'] + $evening_array_data['totald_fibre'] + $dinnner_array_data['totald_fibre'] + $bedtime_array_data['totald_fibre'];

		// $data = $this->addCombinationwith_foodid($breakfast_array);
		
		$final_chart['food_cate']  = $this->input->post('Perfernce');
		$final_chart['disease']  = implode(",",$this->input->post('disease'));

		$final_chart['status']  = 1; // Verified
		$final_chart['d_time']  = date('Y-m-d h:i:s'); // Verified

		$manual_chart_id = $this->Custommodel->insert_common('submit_manuall_chart',$final_chart);

		foreach($this->input->post('disease') as $dis){
		$relation = array(
			'manuall_chart_id' => $manual_chart_id,
			'disease'  => $dis		);	
			$this->Custommodel->insert_common('relation_chart_disease',$relation);	
		}		

		// $this->Custommodel->update_common($final_chart,'skip_bedtime','id',$_POST['chart_id']);
		$previuos_db_update['status']  = 4; // Verified
		$this->Custommodel->update_common($previuos_db_update,'final_chart_2700_2800','id',$_POST['chart_id']);
		redirect("Admin/foodentry");
	}

	public function Submit_manual_chart1(){
		// pr($_POST);die;
		foreach ($_POST['morning_data_food'] as $key => $value) {
			if($_POST['morning_data_quantity'][$key]!=0){
				$morning_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['morning_data_quantity'] as $key => $value) {
			if($value!=0){
				$morning_array[$key]['quantity'] = $value;	
			}
			
		}

		foreach ($_POST['breakfast_data_food'] as $key => $value) {
			if($_POST['breakfast_data_quantity'][$key]!=0){
				$breakfast_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['breakfast_data_quantity'] as $key => $value) {
			if($value!=0){
			$breakfast_array[$key]['quantity'] = $value;

			}
		}
		
		foreach ($_POST['midmeal_data_food'] as $key => $value) {
			if($_POST['midmeal_data_quantity'][$key]!=0){
				$midmeal_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['midmeal_data_quantity'] as $key => $value) {
			if($value !=0){
				$midmeal_array[$key]['quantity'] = $value;

			}
		}

		foreach ($_POST['lunch_data_food'] as $key => $value) {
			if($_POST['lunch_data_quantity'][$key]!=0){
				$lunch_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['lunch_data_quantity'] as $key => $value) {
			if($value !=0){
				$lunch_array[$key]['quantity'] = $value;	
			}
			
		}

		foreach ($_POST['evening_data_food'] as $key => $value) {
			if($_POST['evening_data_quantity'][$key]!=0){
				$evening_array[$key]['foodId'] = $value;	
			}
			
		}foreach ($_POST['evening_data_quantity'] as $key => $value) {
			if($value !=0){
				$evening_array[$key]['quantity'] = $value;	
			}
			
		}

		foreach ($_POST['dinnner_data_food'] as $key => $value) {
			if($_POST['dinnner_data_quantity'][$key]!=0){
				$dinnner_array[$key]['foodId'] = $value;
			}
			
		}foreach ($_POST['dinnner_data_quantity'] as $key => $value) {
			if($value !=0){
			$dinnner_array[$key]['quantity'] = $value;

			}
		}

		foreach ($_POST['bedtime_data_food'] as $key => $value) {
			if($_POST['bedtime_data_quantity'][$key]!=0){
				$bedtime_array[$key]['foodId'] = $value;	
			}
			
		}foreach ($_POST['bedtime_data_quantity'] as $key => $value) {
			if($value !=0){
			$bedtime_array[$key]['quantity'] = $value;
							
			}
		}
		// pr($bedtime_array);die;
		// if($_POST["morning_change"]==1){
		// 	$morning_array_data = $this->getcaldata_foodid($morning_array);
		// }else{
			$morning_array_data = $this->addCombinationwith_foodid($morning_array,'12');	
			$final_chart['morning'] = $morning_array_data['foodcombination_name'];
			$final_chart['morning_no_of_chart'] = $morning_array_data['no_of_chart'];
		//	}

		// if($_POST["breakfast_change"]==1){
		// 	$breakfast_array_data = $this->getcaldata_foodid($breakfast_array);
		// }else{
			$breakfast_array_data = $this->addCombinationwith_foodid($breakfast_array,'10');	
			$final_chart['breakfast'] = $breakfast_array_data['foodcombination_name'];
			$final_chart['breakfast_no_of_chart'] = $breakfast_array_data['no_of_chart'];
		// }

		// if($_POST["midmeal_change"]==1){
		// 	$midmeal_array_data = $this->getcaldata_foodid($midmeal_array);
		// }else{
			$midmeal_array_data = $this->addCombinationwith_foodid($midmeal_array,'15');	
			$final_chart['midmeal'] = $midmeal_array_data['foodcombination_name'];
			$final_chart['midmeal_no_of_chart'] = $midmeal_array_data['no_of_chart'];
		//}

		// if($_POST["lunch_change"]==1){
		// 	$lunch_array_data = $this->getcaldata_foodid($lunch_array);
		// }else{
			$lunch_array_data = $this->addCombinationwith_foodid($lunch_array,'14');	
			$final_chart['lunch'] = $lunch_array_data['foodcombination_name'];
			$final_chart['lunch_no_of_chart'] = $lunch_array_data['no_of_chart'];
		//}

		// if($_POST["evening_change"]==1){
		// 	$evening_array_data = $this->getcaldata_foodid($evening_array);
		// }else{
			$evening_array_data = $this->addCombinationwith_foodid($evening_array,'13');	
			$final_chart['evening'] = $evening_array_data['foodcombination_name'];
			$final_chart['evening_no_of_chart'] = $evening_array_data['no_of_chart'];
		//}

		// if($_POST["dinnner_change"]==1){
		// 	$dinnner_array_data = $this->getcaldata_foodid($dinnner_array);
		// }else{
			$dinnner_array_data = $this->addCombinationwith_foodid($dinnner_array,'11');	
			$final_chart['dinnner'] = $dinnner_array_data['foodcombination_name'];
			$final_chart['dinnner_no_of_chart'] = $dinnner_array_data['no_of_chart'];
		//}

		// if($_POST["bedtime_change"]==1){
		// 	$bedtime_array_data = $this->getcaldata_foodid($bedtime_array);
		// }else{
			$bedtime_array_data = $this->addCombinationwith_foodid($bedtime_array,'9');	
			$final_chart['bedtime'] = $bedtime_array_data['foodcombination_name'];
			$final_chart['bedtime_no_of_chart'] = $bedtime_array_data['no_of_chart'];
		//}

		$final_chart['totalcalories'] = $morning_array_data['totalcalories'] + $breakfast_array_data['totalcalories'] +$midmeal_array_data['totalcalories'] + $lunch_array_data['totalcalories'] + $evening_array_data['totalcalories'] + $dinnner_array_data['totalcalories'] + $bedtime_array_data['totalcalories'];

		$final_chart['totalprotein'] = $morning_array_data['totalprotein'] + $breakfast_array_data['totalprotein'] +$midmeal_array_data['totalprotein'] + $lunch_array_data['totalprotein'] + $evening_array_data['totalprotein'] + $dinnner_array_data['totalprotein'] + $bedtime_array_data['totalprotein'] ;

		$final_chart['totalcarbohydrates'] = $morning_array_data['totalcarbohydrates'] + $breakfast_array_data['totalcarbohydrates'] +$midmeal_array_data['totalcarbohydrates'] + $lunch_array_data['totalcarbohydrates'] + $evening_array_data['totalcarbohydrates'] + $dinnner_array_data['totalcarbohydrates'] + $bedtime_array_data['totalcarbohydrates'];

		$final_chart['totalfat'] = $morning_array_data['totalfat'] + $breakfast_array_data['totalfat'] +$midmeal_array_data['totalfat'] + $lunch_array_data['totalfat'] + $evening_array_data['totalfat'] + $dinnner_array_data['totalfat'] + $bedtime_array_data['totalfat'];

		$final_chart['totalsodium'] = $morning_array_data['totalsodium'] + $breakfast_array_data['totalsodium'] +$midmeal_array_data['totalsodium'] + $lunch_array_data['totalsodium'] + $evening_array_data['totalsodium'] + $dinnner_array_data['totalsodium'] + $bedtime_array_data['totalsodium'];

		$final_chart['totaliron'] = $morning_array_data['totaliron'] + $breakfast_array_data['totaliron'] +$midmeal_array_data['totaliron'] + $lunch_array_data['totaliron'] + $evening_array_data['totaliron'] + $dinnner_array_data['totaliron'] + $bedtime_array_data['totaliron'];

		$final_chart['totald_fibre'] = $morning_array_data['totald_fibre'] + $breakfast_array_data['totald_fibre'] +$midmeal_array_data['totald_fibre'] + $lunch_array_data['totald_fibre'] + $evening_array_data['totald_fibre'] + $dinnner_array_data['totald_fibre'] + $bedtime_array_data['totald_fibre'];

		// $data = $this->addCombinationwith_foodid($breakfast_array);
		
		$final_chart['food_cate']  = $this->input->post('Perfernce');
		$final_chart['disease']  = implode(",",$this->input->post('disease'));

		$final_chart['status']  = 1; // Verified
		$final_chart['d_time']  = date('Y-m-d h:i:s'); // Verified

		$manual_chart_id = $this->Custommodel->insert_common('submit_manuall_chart',$final_chart);
		foreach($this->input->post('disease') as $dis){
		$relation = array(
			'manuall_chart_id' => $manual_chart_id,
			'disease'  => $dis
						);
						
		$this->Custommodel->insert_common('relation_chart_disease',$relation);	
		}		

		// $this->Custommodel->update_common($final_chart,'skip_bedtime','id',$_POST['chart_id']);
		$previuos_db_update['status']  = 4; // Verified
		$this->Custommodel->update_common($previuos_db_update,'final_chart_2900_3000','id',$_POST['chart_id']);
		redirect("Admin/foodentry1");
	}


	public function renewCallSubmit(){
		//insert seven day Logic 

			$f_date = $_POST['meal_startdate'];
			$l_date = $_POST['meal_enddate'];
			$this->db->where('user_id', $_POST['cust_id']);
			$this->db->delete('call_schedule');
			$this->check_add($f_date,$l_date,$_POST['cust_id']);

			// reminder before 3 days on chart end .
			date_default_timezone_set('Asia/Kolkata');
			$date = $_POST['meal_enddate']; // meal end date
			$date = strtotime($date);
			$date = strtotime("-3 day", $date);
			$remind_date =  date('Y-m-d', $date);
			$remind_array = array(
				'user_id' => $_POST['cust_id'],
				'reminder_date' => $remind_date,
				'status' => 0
								);
			$this->db->where('user_id', $_POST['cust_id']);
			$this->db->delete('renew_reminder');
			$this->Custommodel->insert_common('renew_reminder',$remind_array);
	}

	// --------------------------------------------------- task page controllers 
	public function task_call_schedule(){
		if($_SESSION['Token']){
 
			$data['message'] = $this->Dietmodel->check_seven_day_call();
			//  prd($data);
 
			$this->load->view('Admin/tasks/task-call-schdule.php',$data);
			}else{
			redirect('Admin/index');
		}
	}
	public function updateCall7status(){
		$data = array('status' => 2);
		$this->Custommodel->update_common($data,'call_schedule','id',$_GET['call_id']);
		// redirect('Admin/Dashboard');
		echo "updateCall7status";
		echo "<script>
				window.onunload = refreshParent;
				function refreshParent() {
						window.opener.location.reload();

				}
				close();
		</script>";
	}
	// public function task_plans_today(){
	// 	if($_SESSION['Token']){
	// 	$data['message'] = $this->Dietmodel->check_seven_day_call();
	// 	$this->load->view('Admin/task-plans-today.php',$data);
	// 	}else{
	// 	redirect('Admin/index');
	// 	}
	// }

	public function task_support(){
		if($_SESSION['Token']){
		$data['message'] = $this->Dietmodel->check_seven_day_call();
		$this->load->view('Admin/task-support-questions.php',$data);
		}else{
		redirect('Admin/index');
		}
	}

	public function task_weight_update(){
		if($_SESSION['Token']){
		$this->load->view('Admin/task-support-questions.php',$data);
		}else{
		redirect('Admin/index');
		}
	}

	public function task_inch_update(){
		if($_SESSION['Token']){
		$this->load->view('Admin/task-support-questions.php',$data);
		}else{
		redirect('Admin/index');
		}
	}

	public function task_weight_to_update(){
		if($_SESSION['Token']){
		$this->load->view('Admin/task-support-questions.php',$data);
		}else{
		redirect('Admin/index');
		}
	}

	public function task_inch_to_update(){
		if($_SESSION['Token']){
			$this->load->view('Admin/task-support-questions.php',$data);
		}else{
			redirect('Admin/index');
		}
	}
	public function test3(){
		// to load food combination 
		$url = 'Api/foodlist';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);
		if($res->response_code==0){
		$this->load->view('Admin/foodcombination_list3.php');
		
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
	}

} // class ends