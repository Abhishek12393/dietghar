<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Razorpay\Api\Errors\SignatureVerificationError;
require APPPATH . '/libraries/BaseController.php';

class PaymentCtrl extends BaseController {

	function __construct() {
        parent::__construct();
        //  $this->load->model('Custommodel');
				is_user();
				$this->data['id'] = $_SESSION['id'];

				//  check if user has not purchased a plan already  
				// or if going to expire in 5 days than only he can purchase a new one
				$plan_purchase = $this->check_cust_payment_eligiblity($this->data['id']);	
				if($plan_purchase ==  0 || $plan_purchase ==  4){ 
					redirect('User/index','refresh');
				}
				// for renew purchase 
				$this->renew = null;
				$this->isexpired = null;
		 
				if($plan_purchase == 2){
					$this->renew = 1;
					$this->isexpired = 1;
				}
				if($plan_purchase == 3){
					$this->renew = 1;
					$this->isexpired = 2;
				}
				
    }
	 public function index(){
			echo rand(100,1000);
	 }

	public function previous_plan_restore(){
		echo "done";
	}
	public function plan_selection(){
		#pr($_SESSION); // test
		$id = $_SESSION['id'];
		$message=$this->Custommodel->Select_common_where('customers_info','id',$id);
		$chart_id =  $message[0]['meal_chart_id'];
		$chart_end_date =  $message[0]['meal_end_date'];
		$_SESSION['gender'] = $gender =  $message[0]['gender'];
			# calculate expiry of the plan 
			$expiry_stat = 0;
			// echo $chart_id;
			 if($chart_id	== 0 && 	 $chart_end_date == '0000-00-00'){
				 # plan not purchased # chart not made
				 $expiry_stat = 2;
				 $_SESSION['expiry'] = 'New customer , no plan purchased';
			 }elseif($chart_id	> 0 && $chart_end_date < date('Y-m-d')){
					#	chart expired show renew notification 
					$expiry_stat = 1;
					$_SESSION['expiry'] = "Old plan expired , need to renew";
			 }
			 $_SESSION['expiry_stat'] = $expiry_stat;
			//  pr($expiry_stat);
		$this->load->view('Payment/plan_selection.php');
	}
	public function payment_mode(){
		#paytm 

		#print_r($_SESSION); // test
		//pr($_POST); // test
		$data['comapny_name'] = 'DietGhar';
		$data['comapny_logo'] = "https://dietghar.com/diet/dgassets/user/icons/52x52_Logo_1.png";
		// $data['amount'] = $amount = 1;
		$data['amount'] = $amount = $_POST['amount'];
		$_SESSION['plan_name'] = $plan_name = $_POST['plan'];
		$time  = time(); // using same time val in diffreent places
		$data['orderid'] = $orderid = $merchant_orderid = "ORDERID_".$time;
		$custId  =  $_SESSION['id'];
		// paytm setting
			require_once(APPPATH . "/third_party/paytmJsLib/config.php");
			require_once(APPPATH . "/third_party/paytmJsLib/PaytmChecksum.php");

			$data['paytm_url'] =$url;
			$data['mid'] = $mid;
			$it_url = $it_url."mid=$mid&orderId=$orderid"; // initiate transaction url
			$paytmParams = array();
			$paytmParams["body"] = array( 
				"requestType"=> "Payment",
				"mid" => $mid,
				"websiteName" => $website,
				"orderId" => $orderid ,
				"callbackUrl" => $callback,
				"txnAmount" => array(
												"value" => "$amount",
												"currency"=> "INR",
											),
				"userInfo" => array(
											"custId"  => "CUST_".$custId,
											),
			);

			// pr($mkey);
			// pr($amount);
			// pr($paytmParams);
			$response = $this->createtoken_paytm($paytmParams,$it_url,$mkey);
			// pr($response);
			$data['txnToken'] =$txnToken = $response ['body']['txnToken'];

		
		// razopay seeting 
			require_once(APPPATH . "/third_party/razorpay/config.php");
			require_once(APPPATH . "/third_party/razorpay/vendor/autoload.php");
			// use Razorpay\Api\Api;
			$razorapi = new Razorpay\Api\Api($razorpayKeyId, $razorpayKeySecret);

			$razororderData = [
					'receipt'         => 'recieptid_'.$time,
					'amount'          => $amount * 100,
					'currency'        => $displayCurrency,
					'payment_capture' => 1
			];

			$razorpayOrder = $razorapi->order->create($razororderData);
			$razorpayOrderId = $razorpayOrder['id'];
			$_SESSION['razorpay_order_id'] = $razorpayOrderId;
			$razorpayAmount = $razororderData['amount'];

			$callback2 ="https://dietghar.com/diet/payment_callback_razorpay";
			$razor_data = [
					"key"               => $razorpayKeyId,
					"amount"            => $amount,
					"name"              => $data['comapny_name'],
					"description"       => $_SESSION['plan_name'],
					"image"             => $data['comapny_logo'],
					"callback_url"=> $callback2,
					"prefill"           => [
						"name"  => $_SESSION['first_name'].''.$_SESSION ['last_name']	
					],
					"notes"             => [
																	"address"           => '',
																	"merchant_order_id" => $merchant_orderid,
																	],
					"theme"             => [
																	"color"             => "#009a43"
																	],
					"order_id"          => $razorpayOrderId,
			];
			if($displayCurrency !== 'INR'){
					$razor_data['display_currency'] = $displayCurrency;
					$razor_data['display_Amount'] = $displayAmount;
			}

			$data['razor_data'] =  json_encode($razor_data);
	 
		// prd($_SESSION);
		$this->load->view('Payment/payment_mode.php',$data);
	}

	public function callback_razorpay_common(){
		$post = $_POST; #pr($_POST);
		// pr($_SESSION);
		if($post && $post['razorpay_order_id'] == $_SESSION['razorpay_order_id']){
			require_once(APPPATH . "/third_party/razorpay/config.php");
			require_once(APPPATH . "/third_party/razorpay/vendor/autoload.php");
			$user_id = $_SESSION['id'];
			$paymentId = $_POST['razorpay_payment_id'];
			if($_SESSION['razorpaymode'] == 'test'){
				// echo 'testmode';
				$razorpayKeyId =  $testrazorpayKeyId;
				$razorpayKeySecret = $testrazorpayKeySecret;
			}
 
			$api = new Razorpay\Api\Api($razorpayKeyId, $razorpayKeySecret);
			$error = "Payment Failed";
			if (empty($paymentId) || $paymentId === false ){
				try{
						// Please note that the razorpay order ID must
						// come from a trusted source (session here, but
						// could be database or something else)
						$attributes = array(
								'razorpay_order_id' => $_SESSION['razorpay_order_id'],
								'razorpay_payment_id' => $_POST['razorpay_payment_id'],
								'razorpay_signature' => $_POST['razorpay_signature']
						);
	
						$api->utility->verifyPaymentSignature($attributes);
				}
				catch( SignatureVerificationError $e){
						$success = false;
						$error = 'Razorpay Error : ' . $e->getMessage();
				}
			}else{
				$paymentdata = $api->payment->fetch($paymentId);
				$paymentdata =	$this->getProtectedValue($paymentdata , 'attributes');
				$paymentdata['notes'] = $this->getProtectedValue($paymentdata['notes'] , 'attributes');
				$success = true;
			}
		 
			// now 
			if ($success === true){
				// echo "Success";
				$txnAmount = $paymentdata['amount'] / 100;
				$txn_date= date('Y-m-d');
				$merchant_orderid = $p_data['orderid'] = $paymentdata['notes']['merchant_order_id'];
				
				$pay_mode=$paymentdata['method'];
				$txnstatus = $paymentdata['status'];
				if($txnstatus == 'captured'){ $txnstatus = 'TXN_SUCCESS';}
				$payid = $paymentdata['id'];
				$lid = $this->insert_transaction_history($user_id,$txnAmount, $txn_date, json_encode($paymentdata), $merchant_orderid , $pay_mode , $txnstatus,'razorpay',$payid);
				if(empty($lid)){ 
					$edata['message'] =  "Database entry error ! Please contact Admin Soon !";
					$this->load->view('Payment/plan_sessionnotfound.php' , $edata);
				}else{
					if($txnstatus == 'TXN_SUCCESS'){
						$chart_days = $paymentdata['notes']['chart_days'];
						$meal_chart_id = $paymentdata['notes']['meal_chart_id'];
						// create plan on successful transaction
						$plantb_id = $this->insert_cust_chart_purchase($user_id,$merchant_orderid,$meal_chart_id,$chart_days,date('Y-m-d'),1);
							// prd($plantb_id, 'chart purchase tb insert resp');
							$p_data['meta'] = "<meta http-equiv='refresh' content='5; url=final_chart_download/1662365160'>";
							$p_data['process'] ='chartPurchase';
						 $this->load->view('Payment/plan_success.php',$p_data);
					}
				}
			}else{
				$html = "<p>Your payment failed</p>
										<p>{$error}</p>";
				$edata['message'] =  $html;
				$this->load->view('Payment/plan_sessionnotfound.php' , $edata);
		}
		unset($_SESSION['razorpay_order_id']);
		unset($_SESSION['razorpaymode']); // testmode or live mode

		}else{
			echo  "Razorpay order id Mismatched";
		}
	}


	// plan purchase modules with razorback and paytm // customized functions

	public function callback_razorpay(){
		require_once(APPPATH . "/third_party/razorpay/config.php");
		require_once(APPPATH . "/third_party/razorpay/vendor/autoload.php");
		//  use Razorpay\Api\Api;
		// use Razorpay\Api\Errors\SignatureVerificationError; /
		// pr($_POST);
		$user_id = $_SESSION['id'];
		$paymentId = $_POST['razorpay_payment_id'];
		$api = new Razorpay\Api\Api($razorpayKeyId, $razorpayKeySecret);
		$error = "Payment Failed";

		if (empty($paymentId) || $paymentId === false ){
			try{
					// Please note that the razorpay order ID must
					// come from a trusted source (session here, but
					// could be database or something else)
					$attributes = array(
							'razorpay_order_id' => $_SESSION['razorpay_order_id'],
							'razorpay_payment_id' => $_POST['razorpay_payment_id'],
							'razorpay_signature' => $_POST['razorpay_signature']
					);

					$api->utility->verifyPaymentSignature($attributes);
			}
			catch( SignatureVerificationError $e){
					$success = false;
					$error = 'Razorpay Error : ' . $e->getMessage();
			}
		}else{
			$paymentdata = $api->payment->fetch($paymentId);
			$paymentdata =	$this->getProtectedValue($paymentdata , 'attributes');
			$paymentdata['notes'] = $this->getProtectedValue($paymentdata['notes'] , 'attributes');
			$success = true;
		}

		if ($success === true){
			#pr($paymentdata , 'response payment data');
			// pr($paymentdata['id']);
			$txnAmount = $paymentdata['amount'] / 100;
			$txn_date= date('Y-m-d');
			$merchant_orderid = $p_data['orderid'] = $paymentdata['notes']['merchant_order_id'];
			if($txnAmount==600.00){
				$plan = 'Diet Composite';
				$plantype = 1;
				$call_loop  = 2;
			}else{
				$plan = 'Diet Advanced';
				$plantype = 2;
				$call_loop  = 4;
			}
			# in every case of success or failure we will capture the transaction
	 


			$pay_mode=$paymentdata['method'];
			$txnstatus = $paymentdata['status'];
			if($txnstatus == 'captured'){ $txnstatus = 'TXN_SUCCESS';}
			$payid = $paymentdata['id'];
			$lid = $this->insert_transaction_history($user_id,$txnAmount, $txn_date, json_encode($paymentdata), $merchant_orderid , $pay_mode , $txnstatus,'razorpay',$payid);
			#pr($lid, 'txn history tb insert resp');
			
			if(empty($lid)){ 
								$edata['message'] =  "Database entry error ! Please contact Admin Soon !";
								$this->load->view('Payment/plan_sessionnotfound.php' , $edata);
			}else{
				if($txnstatus == 'TXN_SUCCESS'){
					// create plan on successful transaction
					$plantb_id = $this->insert_plantb($user_id,$plan,$plantype,time(),date('Y-m-d H:i:s'),$txnAmount,$merchant_orderid);
					#pr($plantb_id, 'plan tb insert resp');
					if($plantb_id>0):
					 
						$finalresp = $this->update_customer_info_tb($user_id,$plantb_id);
						#pr($finalresp, 'customer info update resp');
					endif;

					 $this->load->view('Payment/plan_success.php',$p_data);
				}
			}
		}else{
				$html = "<p>Your payment failed</p>
										<p>{$error}</p>";
				$edata['message'] =  $html;
				$this->load->view('Payment/plan_sessionnotfound.php' , $edata);
		}
		
		// pr($_SESSION);
		unset($_SESSION['expiry'])  ;
		unset($_SESSION['expiry_stat'])  ;
		unset($_SESSION['plan_name'])  ;
		unset($_SESSION['razorpay_order_id']);

	}
 
	// private functions for internal use ::
	private function insert_transaction_history($user_id,$txn_amount,$txn_date,$txn_details,$order_id,$pay_mode,$status, $pay_gateway , $payid = null){
		//::helper::
		$data = array(
				'user_id' => $user_id,
				'txn_amount'=> $txn_amount,
				'txn_date'  => $txn_date,
				'txn_details'  => $txn_details,
				'order_id' => $order_id,
				'pay_mode'=>  $pay_mode,
				'Status'=>  $status,
				'pay_id'=>  $payid,
				'pay_gateway'=>  $pay_gateway
			);
			// pr($data,'thistory data');
			$lid= $this->Custommodel->insert_common('transaction_history',$data);
			return $lid ;
			// return 1;
	}
	private function insert_plantb($user_id,$plan_name,$plan_type,$purchase_date,$p_date,$plan_amount,$order_id){
		$idata = array(
			'user_id'  => $user_id,
			'plan_name' => $plan_name,
			'plan_type' => $plan_type,
			'purchase_date' => $purchase_date,
			'p_date' => $p_date,
			'plan_status' => 1,
			'plan_amount'=> $plan_amount,
			'order_id' =>$order_id,
			'admin_verified' => 2	,
			'updated_dt' => date('Y-m-d H:i:s')
		);
		// pr($idata,'idata');
		$iresp = $this->Custommodel->insert_common('Plan',$idata);
		return $iresp;
	}
	private function insert_cust_chart_purchase($user_id,$merchant_orderid,$chart_id,$chart_days,$p_date,$p_status){
	 
		$idata = array(
			'user_id'  => $user_id,
			'order_id'  => $merchant_orderid,
			'chart_id' => $chart_id,
			 'chart_days' => $chart_days,
			'p_date' => $p_date,
			'p_status' => 1,
			'updated_dt' => date('Y-m-d H:i:s')
		);
		// pr($idata,'idata');
		$iresp = $this->Custommodel->insert_common('customers_chart_purchase',$idata);
		return $iresp;
	}
	private function update_customer_info_tb($user_id,$planid){
		if($this->renew == 1){
			if($this->isexpired == 2 ){
				// user plan not expired //  renew
				$data = array(
					'is_payment_done' => 1,
					'user_type' => 1,
					'renew_plan_id'=> $planid,
				);
			}else{
				$data = array(
					'user_type' => 1,
					'is_payment_done' => 1,
					'plan_id' => $planid,
					'renew_plan_id'=> 0,
				);
			}

		}else{
			// new payment
			$data = array(
				'user_type' => 1,
				'is_payment_done' => 1,
				'plan_id' => $planid,
				'renew_plan_id'=> 0,
			);
		}

		$resp =  $this->Custommodel->update_common($data,'customers_info','id',$user_id);
		
		return $resp;
		
	}

	public function  getProtectedValue($obj, $name) {
		// ::helper function:: for razor pay | convert protected object data into array
		$array = (array)$obj;
		$prefix = chr(0).'*'.chr(0);
		return $array[$prefix.$name];
	}


	public function callback_paytm(){
		//::PAYTM::CALLBACK::
		require_once(APPPATH . "/third_party/paytmJsLib/config.php");
		require_once(APPPATH . "/third_party/paytmJsLib/PaytmChecksum.php");
		// echo $mkey;
		// pr($_POST);
		// pr($_SESSION);

		if(!empty($_POST)){
			$checksum = (!empty($_POST['CHECKSUMHASH'])) ? $_POST['CHECKSUMHASH'] : '';
			unset($_POST['CHECKSUMHASH']);
			$verifySignature = PaytmChecksum::verifySignature($_POST, $mkey, $checksum);

			if(!$verifySignature){
			 //Checksum is not verified. 
			 $checksum_status = 0;
	  	}else{
				$checksum_status = 1;
			}
			// make the entry
			
 
			$id = $user_id = $_SESSION['id'];
			// plan selection on the basis of plan price // update plan name should be dynamic
			if($_POST['TXNAMOUNT']==600.00){
				$plan = 'Diet Composite';
				$plantype = 1;
				$call_loop  = 2;
			}else{
				$plan = 'Diet Advanced';
				$plantype = 2;
				$call_loop  = 4;
			}
			# in every case of success or failure we will capture the transaction // update from here 
			// $data = array(
			// 	'user_id' => $id,
			// 	'txn_date'  => date('Y-m-d'),
			// 	'txn_details'  =>json_encode($this->input->post()),
			// 	'order_id' =>$_POST['ORDERID'],
			// 	'pay_mode'=> 'ONLINE '.$_POST['PAYMENTMODE'],
			// 	'status'=> $_POST['STATUS']
			// );
			// $lid= $this->Custommodel->insert_common('transaction_history',$data);
			$txn_date = date('Y-m-d');
			$pay_mode= 'ONLINE '.$_POST['PAYMENTMODE'];
			$merchant_orderid = $_POST['ORDERID'];
			$txnstatus = $_POST['STATUS'];
			$lid = $this->insert_transaction_history($user_id,$_POST['TXNAMOUNT'], $txn_date, json_encode($this->input->post()), $merchant_orderid , $pay_mode , $txnstatus,'Paytm');
 
			if(empty($id)){
				// $this->load->view() // load sorry for inconvience page
				$this->load->view('Payment/plan_sessionnotfound.php');
				// die("session not found - pg response !");
			}else{

				if($_POST['STATUS']=='TXN_SUCCESS'){
					$p_data['orderid'] =  $_POST['ORDERID'];
					
					# echo "TXN SUCCESSFUL";	

					// $idata = array(
					// 					'user_id'  => $id,
					// 					'plan_name' => $plan,
					// 					'plan_type' => $plantype,
					// 					'purchase_date' => time(),
					// 					'p_date' => date('Y-m-d H:i:s'),
					// 					'plan_status' => 1,
					// 					'plan_amount'=> $_POST['TXNAMOUNT'],
					// 					'order_id' =>$_POST['ORDERID'],
					// 					'admin_verified' => 2	,
					// 					'updated_dt' => date('Y-m-d H:i:s')
					// 				);

					// $iresp = $this->Custommodel->insert_common('Plan',$idata);
					
					$plantb_id = $this->insert_plantb($user_id,$plan,$plantype,time(),date('Y-m-d H:i:s'), $_POST['TXNAMOUNT'],$merchant_orderid);

					// new code  for renew 
					if($plantb_id > 0):
						// if($this->renew == 1){
						// 		if($this->isexpired == 2 ){
						// 			// user plan not expired
						// 			$data1 = array(
						// 				'is_payment_done' => 1,
						// 				'user_type' => 1,
						// 				// 'plan_id' => $iresp,
						// 				'renew_plan_id'=> $iresp,
						// 				'renew_wt_update' => 0
						// 			);
						// 		}else{
		
						// 			$data1 = array(
						// 				'is_payment_done' => 1,
						// 				'user_type' => 1,
						// 				'plan_id' => $iresp,
						// 				'renew_plan_id'=> 0,
						// 				'renew_wt_update' => 0
						// 			);
						// 		}
		
						// }else{
						// 	// new payment
						// 	$data1 = array(
						// 						'is_payment_done' => 1,
						// 						'plan_id' => $iresp,
						// 						'user_type' => 1,
						// 						'renew_plan_id'=> 0,
						// 						'renew_wt_update' => 0
						// 					);
						// }
						// $this->Custommodel->update_common($data1,'customers_info','id',$id);
						$finalresp = $this->update_customer_info_tb($user_id,$plantb_id);
					endif;

					$this->load->view('Payment/plan_success.php',$p_data);

 
				}else{
					$edata['message'] =  $_POST['RESPMSG'];
					$this->load->view('Payment/plan_sessionnotfound.php' , $edata);
					// load trasaction failure page 
					// $this->load->view('Payment/plan_success.php');
				}
					// unset  session 
					unset($_SESSION['expiry'])  ;
					unset($_SESSION['expiry_stat'])  ;
					unset($_SESSION['plan_name'])  ;
				

			
			} // session empty
		} else {
			//Empty call back response or POST Response/
			// show error page 
			// echo "Something happened wrong! Please contact customer Support.";
					$edata['message'] =  "Something happened wrong! Please contact customer Support.";
					$this->load->view('Payment/plan_sessionnotfound.php' , $edata);
		}

		// redirect('User/male_measurement');
	}
	// helper functions 
	private function createtoken_paytm($paytmParams,$url,$mkey){
		/*
		* Generate checksum by parameters we have in body
		* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
		*/
		$checksum = PaytmChecksum::generateSignature(json_encode($paytmParams["body"], JSON_UNESCAPED_SLASHES), $mkey);

		$paytmParams["head"] = array(
													"signature"=> $checksum
												);
											
		$post_data = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
		// pr($url);								

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
		$response = curl_exec($ch);
		$response = json_decode($response,true);
		// pr($response,'token resp');
		return $response;

	}
	


	 //=============old code for refrence can be deleted

	public function pgResponse(){
		pr($_POST);
		pr($_SESSION);
	
		$id = $_SESSION['id'];
		if(empty($id)){
			die("session not found - pg response  ");
		}else{
		}
		// plan selection on the basis of plan price // update plan name should be dynamic
		if($_POST['TXNAMOUNT']==599.00){
			$plan = 'Diet Composite';
			$plantype = 1;
		}else{
			$plan = 'Diet Advanced';
			$plantype = 2;
		}
		if($_POST['STATUS']=='TXN_SUCCESS'){
			$data = array(
				'user_id' => $id,
				'txn_date'  => date('Y-m-d'),
				'txn_details'  =>json_encode($this->input->post()),
				'order_id' =>$_POST['ORDERID']
			);
			// pr($data);die;
			$data1 = array(
				'is_payment_done' => 1,
				'user_type' => 1,
							);
			$lid= $this->Custommodel->insert_common('transaction_history',$data);
			//echo $lid;die;
			$this->Custommodel->update_common($data1,'customers_info','id',$id);

			$data1 = array(
				'user_id'  => $id,
				'plan_name' => $plan,
				'plan_type' => $plantype,
				'purchase_date' => time(),
				'plan_status' => 0,
				'order_id' =>$_POST['ORDERID'],
				'is_online' => 'Y',
				'admin_verified' => 1	);
			$this->Custommodel->insert_common('Plan',$data1);

			$redirection = $this->Custommodel->Select_common_where('customers_info','id',$id);
			if($redirection[0]['gender']==1){
				redirect('User/male_measurement');
			}else{
				redirect('User/female_measurement');
			}
			
		}else{
			redirect('Stepper/stepper_final');
		}
		
	}


 
}
	