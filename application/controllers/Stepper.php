<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Stepper extends BaseController {

	function __construct() {
    parent::__construct();
    $this->load->model('Custommodel');
		$this->load->helper('url');

		if(!isset($_SESSION['id']) && ($this->uri->segment('2') != 'index' && $this->uri->segment('2') != 'fillotp'  && $this->uri->segment('2') != 'stepper_32') ){
			redirect('Stepper/index','refresh');
		}
		if(!isset($_SESSION['stepperfill']) && ( $this->uri->segment('2') != 'index'  && $this->uri->segment('2') != 'fillotp'  && $this->uri->segment('2') != 'stepper_32')){
			redirect('Stepper/index','refresh');
		}
		// print_r($_SESSION); 
  }

	 public function index(){
		//  print_r($_SESSION); 
	    //  $this->load->view('Stepper/index.php');
	    // $this->load->view('Stepper/steps/index.php');
	    $this->load->view('Stepper/steps/index2.php');

	 }
	 public function index2(){
		//  print_r($_SESSION); 
	    //  $this->load->view('Stepper/index.php');
	    $this->load->view('Stepper/steps/index2.php');

	 }
	 public function fillotp(){
		//  print_r($_SESSION); 
	    $this->load->view('Stepper/steps/otp.php');

	 }
	 public function smstest(){
		$resp = send_sms_forgot_password(7503242942,"	Dear Customer, Your OTP for Login is {#1234567#}. Regards, DietGhar.com");
		// pr($resp);
	}
	 public function stepper_2(){
	 	// print_r($_SESSION); 
		//  $this->load->view('Stepper/stepper_2.php');
		$this->load->view('Stepper/steps/step2.php');
	 }
	 public function stepper_3(){
	 	// $this->load->view('Stepper/stepper_3.php');
		 $this->load->view('Stepper/steps/step3.php');
	 }
	 public function stepper_4(){
	 	// $this->load->view('Stepper/stepper_4.php');
		 $this->load->view('Stepper/steps/step4.php');
	 }
	 public function stepper_5(){
	 	// $this->load->view('Stepper/stepper_5.php');
		 $this->load->view('Stepper/steps/step5.php');
		}
		public function stepper_6(){
			// $this->load->view('Stepper/stepper_6.php');
			$this->load->view('Stepper/steps/step6.php');
		}
	  public function stepper_7(){
			// $this->load->view('Stepper/stepper_7.php');
			$this->load->view('Stepper/steps/step7.php');
	 }
	public function stepper_8(){
		// $this->load->view('Stepper/stepper_8.php');
		$this->load->view('Stepper/steps/step8.php');
	}
	public function stepper_9(){
	// $this->load->view('Stepper/stepper_9.php');
		$this->load->view('Stepper/steps/step9.php');
	}
	  public function stepper_10(){
	 	// $this->load->view('Stepper/stepper_10.php');
		 $this->load->view('Stepper/steps/step10.php');
	 }
	 public function stepper_11(){
	 	// $this->load->view('Stepper/stepper_11.php');
		 $this->load->view('Stepper/steps/step11.php');
	 }
	 public function stepper_12(){
	 	// $this->load->view('Stepper/stepper_12.php');
		 $this->load->view('Stepper/steps/step12.php');
	 }
	  public function stepper_13(){
	  	$data['message'] = $this->Custommodel->Select_common_where('customers_info','id',$_SESSION['id']);
	 	// $this->load->view('Stepper/stepper_13.php',$data);
		 $this->load->view('Stepper/steps/step13.php',$data);
	 }
	  public function stepper_14(){
	 	// $this->load->view('Stepper/stepper_14.php');
		 $this->load->view('Stepper/steps/step14.php');
	 }
	  public function stepper_15(){
	 	// $this->load->view('Stepper/stepper_15.php');
		 $this->load->view('Stepper/steps/step15.php');
		}
	  public function stepper_16(){
			// $this->load->view('Stepper/stepper_16.php');
			$this->load->view('Stepper/steps/step16.php');
		}
	  public function stepper_17(){
			$this->load->view('Stepper/steps/step17.php');
			// $this->load->view('Stepper/stepper_17.php');
		}
		public function stepper_18(){
			// $this->load->view('Stepper/stepper_18.php');
			$this->load->view('Stepper/steps/step18.php');
		}
	  public function stepper_19(){
			// $this->load->view('Stepper/stepper_19.php');
			$this->load->view('Stepper/steps/step19.php');
		}
	  public function stepper_20(){
			// $this->load->view('Stepper/stepper_20.php');
			$this->load->view('Stepper/steps/step20.php');
		}
		public function stepper_21(){
			// $this->load->view('Stepper/stepper_21.php');
			$this->load->view('Stepper/steps/step21.php');
		}
	  public function stepper_22(){
			// $this->load->view('Stepper/stepper_22.php');
			$this->load->view('Stepper/steps/step22.php');
		}
		public function stepper_23(){
			// $this->load->view('Stepper/stepper_23.php');
			$this->load->view('Stepper/steps/step23.php');
		}
		public function stepper_24(){
			// $this->load->view('Stepper/stepper_24.php');
			$this->load->view('Stepper/steps/step24.php');
		}
		public function stepper_25(){
			$data['message'] = $this->Custommodel->Select_common_where('customers_info','id',$_SESSION['id']);
			// $this->load->view('Stepper/stepper_25.php',$data);
			$this->load->view('Stepper/steps/step25.php' , $data);
		}
		public function stepper_26(){
			// $this->load->view('Stepper/stepper_26.php');
			$this->load->view('Stepper/steps/step26.php');
		}
		public function stepper_27(){
			// $this->load->view('Stepper/stepper_27.php');
			$this->load->view('Stepper/steps/step27.php');
	 }
	 public function stepper_final_o(){ // name change so that no one can access
	 	//pr($_SESSION); // test
	 	$this->load->view('Stepper/stepper_final.php');
	 }

     public function stepper_28(){
			// $this->load->view('Stepper/stepper_27.php');
			$this->load->view('Stepper/steps/step28.php');
	 }
	 
	  public function stepper_29(){
			// $this->load->view('Stepper/stepper_27.php');
			$this->load->view('Stepper/steps/step29.php');
	 }
	 
	  public function stepper_30(){
			// $this->load->view('Stepper/stepper_27.php');
			$this->load->view('Stepper/steps/step30.php');
	 }
	 
	 public function stepper_31(){
			// $this->load->view('Stepper/stepper_27.php');
			$this->load->view('Stepper/steps/step31.php');
	 }
	 
	 public function stepper_32(){
			// $this->load->view('Stepper/stepper_27.php');
			$this->load->view('Stepper/steps/step32.php');
	 }
	 
	 public function stepper_33(){
			// $this->load->view('Stepper/stepper_27.php');
			$this->load->view('Stepper/steps/step33.php');
	 }

	 // old code not in use
	 public function payment_mode(){
		die('Wrong Url'); // currently not in use // developed by old devlopers
	 	print_r($_SESSION); // test
	 	//pr($_POST); // test
	 	$data['amount'] = $_POST['amount'];
	 	$this->load->view('Stepper/payment_mode.php',$data);
	 }
	public function check_payment(){
		die('Wrong Url');
	 	if($_POST['payment_mode']=='online'){
			print_r($_SESSION); // test
	 		$this->paytm();
	 	}else{
			// in case of offline payment ::
			$id = $_SESSION['id'];
			if(empty($id)){
				die("session not found -  check payment - error : at");
			}

			if($_POST['amount']== 599.00){
				$plan = 'Diet Composite';
				$plantype = 1;
			}else{
				$plan = 'Diet Advanced';
				$plantype = 2;
			}
			$ORDER_ID = "ORDS" . rand(10000,99999999);
			$data1 = array(
				'user_id'  => $id,
				'plan_name' => $plan,
				'plan_type' => $plantype,
				'purchase_date' => time(),
				'plan_status' => 0,
				'order_id' =>$ORDER_ID,
				 'updated_dt'=>date("Y-m-d H:i:s")
				 
							);
			$this->Custommodel->insert_common('Plan',$data1);

			$data1 = array(	'is_offline_done' => 1 );

			//echo $lid;die;
			$this->Custommodel->update_common($data1,'customers_info','id',$id);
			// $redirection = $this->Custommodel->Select_common_where('customers_info','id',$id);
			// if($redirection[0]['gender']==1){
			// 	redirect('User/male_measurement');
			// }else{
			// 	redirect('User/female_measurement');
			// }
			
			// redirect('User/upload_receipt'); // uncomment this 
	 	}
	}
	public function paytm(){ 
		die('Page Not Responding');
		#print_r($_SESSION);

		header("Pragma: no-cache");
		header("Cache-Control: no-cache");
		header("Expires: 0");

		// following files need to be included
		require_once(APPPATH . "/third_party/paytmlib/lib/config_paytm.php");
		require_once(APPPATH . "/third_party/paytmlib/lib/encdec_paytm.php");

		$checkSum = "";
		$paramList = array();

		$ORDER_ID = "ORDS" . rand(10000,99999999);
		$CUST_ID = '110'; /// check for this AT
		$INDUSTRY_TYPE_ID = 'Retail';
		$CHANNEL_ID = 'WEB';
		$TXN_AMOUNT = $this->input->post('amount');

		// Create an array having all required parameters for creating checksum.
		$paramList["MID"] = PAYTM_MERCHANT_MID;
		$paramList["ORDER_ID"] = $ORDER_ID;
		$paramList["CUST_ID"] = $CUST_ID;
		$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
		$paramList["CHANNEL_ID"] = $CHANNEL_ID;
		$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
		$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
		// $paramList["user_id"] = '1001';

		/*
		$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
		$paramList["EMAIL"] = $EMAIL; //Email ID of customer
		$paramList["VERIFIED_BY"] = "EMAIL"; //
		$paramList["IS_USER_VERIFIED"] = "YES"; //

		*/
		// $paramList["USER_ID"] = $_SESSION['id'];
		$paramList["CALLBACK_URL"] = base_url().'Stepper/pgResponse'; // var/www/html/WebPreparations/Paytm/PaytmKit/pgRedirect.php
		//Here checksum string will return by getChecksumFromArray() function.
		$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
		echo "<html>
				<head>
				<title>Merchant Check Out Page</title>
				</head>
				<body>
				<center><h1>Please do not refresh this page...</h1>";print_r($_SESSION); echo"
				</center>
				<form method='post' action='".PAYTM_TXN_URL."' name='f1'>
				<table border='1'>
				<tbody>";

		foreach($paramList as $name => $value) {
			echo '<input type="hidden" name="' . $name .'" value="' . $value .         '">';
		}
		
		echo "<input type='hidden' name='CHECKSUMHASH' value='". $checkSum . "'>
				</tbody>
				</table>
				<script type='text/javascript'>
				document.f1.submit();
				</script>
				</form>
				</body>
				</html>";
	}

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

	public function logout(){
		session_destroy();
		redirect("Stepper/index");
	}

}
	