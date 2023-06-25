<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

/**
 * Class : BaseController
 * Base Class to control over all the classes
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class BaseController extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Custommodel');
		$this->load->model('Dietmodel');
		$this->load->model('Common_model','cmn');
	}
	protected $role = '';
	protected $vendorId = '';
	protected $name = '';
	protected $roleText = '';
	protected $global = array ();
	protected $lastLogin = '';


	/** 
	 * this function check if the customer is expired or not
	 */
	
	function checkCustExpiry($id){
		return "$id";
	}

	function check_cust_payment_eligiblity($cust_id){
		
		// check if cust is eligible for payment:: to purchase a plan 
		// new customer can buy only once 
		// at the time of renew , cust can buy 5 days before the plan expire , only once
	 	// now check if chart it is going to expire in 5 days or not 

			$resp_cust = $this->cmn->custquery("SELECT `meal_start_date` , `meal_end_date`, `is_payment_done`, `meal_chart_id` , `plan_id` FROM `customers_info` Where `id` = $cust_id ");
 

			$chart_id =  $resp_cust['0']['meal_chart_id'];
			$chart_start_date =  $resp_cust['0']['meal_start_date'];
			$chart_end_date =  $resp_cust['0']['meal_end_date']; 
			$plan_id =  $resp_cust['0']['plan_id']; 
			$is_payment_done =  $resp_cust['0']['is_payment_done']; 
			$is_plan_expired =  $resp_cust['0']['is_plan_expired']; 
			$today =  date('Y-m-d');
			if($plan_id == 0 && $is_payment_done == 0){
				// new or in case of renew plan id if 0 means need purchase , or no plan active
				$status = 1;
			}elseif($chart_id	== 0 && 	 $chart_end_date == '0000-00-00' && $plan_id > 0 ){
				// plan purchased but chart not made
				$status = 0;
			}elseif(strtotime($today) > strtotime($chart_end_date) && $chart_id > 0 && $is_plan_expired == 1){
				 #	chart expired plan expired # we can renew
				 $status = 2;
			}elseif(strtotime($today) > strtotime($chart_end_date.'-5 day') && strtotime($today) <= strtotime($chart_end_date) && $chart_id > 0 ){
				// echo "chart going to expire"; he has to renew  while there is a active chart 
				$status =  3;
				$this->data['chart_id'] = $chart_id;
			}else{
				// echo "chart going on";
				$status = 4;
				$this->data['chart_id'] = $chart_id;
			}

		
		// echo $status;
		return $status;
	}
	function check_cust_payment_eligiblity_o($cust_id){
		
		// check if cust is eligible for payment:: to purchase a plan 
		// new customer can buy only once 
		// at the time of renew , cust can buy 5 days before the plan expire , only once
		$resp_plan = $this->cmn->custquery("SELECT * FROM `Plan` Where `user_id` = $cust_id && `plan_status` = 1 ");
 
		if(empty($resp_plan)){
			// no plan found can purchase new plan
			// "Plan not found or not active" ;
			$status  =  1 ;
			 
		}else{
 
			// now check if chart it is going to expire in 5 days or not 
			$resp_cust = $this->cmn->custquery("SELECT `meal_start_date` , `meal_end_date`, `is_payment_done`, `meal_chart_id` FROM `customers_info` Where `id` = $cust_id ");
 

			$chart_id =  $resp_cust['0']['meal_chart_id'];
			$chart_start_date =  $resp_cust['0']['meal_start_date'];
			$chart_end_date =  $resp_cust['0']['meal_end_date']; 
			$today =  date('Y-m-d');
			if($chart_id	== 0 && 	 $chart_end_date == '0000-00-00'){
				// chart not made
		 		 $status = 0; // plan already purchased
			}elseif(strtotime($today) > strtotime($chart_end_date) && $chart_id > 0 ){
				 #	chart expired plan expired # we can renew
				 $status = 2;
			}elseif(strtotime($today) > strtotime($chart_end_date.'-5 day') && strtotime($today) <= strtotime($chart_end_date) && $chart_id > 0 ){
				// echo "chart going to expire"; he has to renew  while there is a active chart 
				$status =  3;
				$this->data['chart_id'] = $chart_id;
			}else{
				// echo "chart going on";
				$status = 4;
				$this->data['chart_id'] = $chart_id;
			}
		}
		// echo $status;
		return $status;
	}

	// payment load modules
	function load_razorpay_module($custId,$time,$amount,$company_name,$company_logo,$merchant_orderid,$callback_url, $description='', $notes, $razorpaymode='test'){
		$data['orderid'] =$merchant_orderid ;
		$data['company_name'] =  $company_name;
		$data['company_logo'] = $company_logo;

		require_once(APPPATH . "/third_party/razorpay/config.php");
		require_once(APPPATH . "/third_party/razorpay/vendor/autoload.php");
		// use Razorpay\Api\Api;
		if($razorpaymode == 'test'){
			$razorpayKeyId = $testrazorpayKeyId ;
			$razorpayKeySecret = $testrazorpayKeySecret;
			$_SESSION['razorpaymode'] = 'test';
		}

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
		$razor_data = [
			"key"               => $razorpayKeyId,
			"amount"            => $amount,
			"name"              => $company_name,
			"description"       => $description ,
			"image"             => $company_logo,
			"callback_url"=> $callback_url,
			"prefill"           => [
				"name"  => $_SESSION['first_name'].''.$_SESSION ['last_name']	
			],
			// "notes" => [
			// 	"address" => '',
			// 	"merchant_order_id" => $merchant_orderid,
				   
			// 		],
			"notes" => $notes,
			"theme"=> [
				"color"=> "#009a43"
			],
			"order_id"=> $razorpayOrderId,
		];
		if($displayCurrency !== 'INR'){
				$razor_data['display_currency'] = $displayCurrency;
				$razor_data['display_Amount'] = $displayAmount;
		}
	
		$data['razor_data'] =  json_encode($razor_data);
			// pr($razor_data,'razorpay data');
		?><script src="https://checkout.razorpay.com/v1/checkout.js"></script>
		
			<script>
				var options = <?php echo $data['razor_data']?>;
				var rzp1 = new Razorpay(options);
				rzp1.open();
			</script>
		<?php
	}


	/**
	 * Takes mixed data and optionally a status code, then creates the response
	 *
	 * @access public
	 * @param array|NULL $data
	 *        	Data to output to the user
	 *        	running the script; otherwise, exit
	 */
	public function response($data = NULL) {
		$this->output->set_status_header ( 200 )->set_content_type ( 'application/json', 'utf-8' )->set_output ( json_encode ( $data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) )->_display ();
		exit ();
	}
	
	/**
	 * This function used to check the user is logged in or not
	 */
	function isLoggedIn() {
		$isLoggedIn = $this->session->userdata ( 'isLoggedIn' );
		
		if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
			redirect ( 'login' );
		} else {
			$this->role = $this->session->userdata ( 'role' );
			$this->vendorId = $this->session->userdata ( 'userId' );
			$this->name = $this->session->userdata ( 'name' );
			$this->roleText = $this->session->userdata ( 'roleText' );
			$this->lastLogin = $this->session->userdata ( 'lastLogin' );
			
			$this->global ['name'] = $this->name;
			$this->global ['role'] = $this->role;
			$this->global ['role_text'] = $this->roleText;
			$this->global ['last_login'] = $this->lastLogin;
		}
	}
	
	/**
	 * This function is used to check the access
	 */
	function isAdmin() {
		if ($this->role != ROLE_ADMIN) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * This function is used to check the access
	 */
	function isTicketter() {
		if ($this->role != ROLE_ADMIN || $this->role != ROLE_MANAGER) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * This function is used to load the set of views
	 */
	function loadThis() {
		$this->global ['pageTitle'] = 'CodeInsect : Access Denied';
		
		$this->load->view ( 'includes/header', $this->global );
		$this->load->view ( 'access' );
		$this->load->view ( 'includes/footer' );
	}
	
	/**
	 * This function is used to logged out user from system
	 */
	function logout() {
		$this->session->sess_destroy ();
		
		redirect ( 'login' );
	}

	/**
     * This function used to load views
     * @param {string} $viewName : This is view name
     * @param {mixed} $headerInfo : This is array of header information
     * @param {mixed} $pageInfo : This is array of page information
     * @param {mixed} $footerInfo : This is array of footer information
     * @return {null} $result : null
     */
    function loadViews($viewName = ""){
			//pr($headerInfo);die;
    
    	 //pr($headerInfo);die;
        $this->load->view('layouts/header');
        $this->load->view($viewName);
        $this->load->view('layouts/footer');
    }
	
	/**
	 * This function used provide the pagination resources
	 * @param {string} $link : This is page link
	 * @param {number} $count : This is page count
	 * @param {number} $perPage : This is records per page limit
	 * @return {mixed} $result : This is array of records and pagination data
	 */
	function paginationCompress($link, $count, $perPage = 10, $segment = SEGMENT) {
		$this->load->library ( 'pagination' );

		$config ['base_url'] = base_url () . $link;
		$config ['total_rows'] = $count;
		$config ['uri_segment'] = $segment;
		$config ['per_page'] = $perPage;
		$config ['num_links'] = 5;
		$config ['full_tag_open'] = '<nav><ul class="pagination">';
		$config ['full_tag_close'] = '</ul></nav>';
		$config ['first_tag_open'] = '<li class="arrow">';
		$config ['first_link'] = 'First';
		$config ['first_tag_close'] = '</li>';
		$config ['prev_link'] = 'Previous';
		$config ['prev_tag_open'] = '<li class="arrow">';
		$config ['prev_tag_close'] = '</li>';
		$config ['next_link'] = 'Next';
		$config ['next_tag_open'] = '<li class="arrow">';
		$config ['next_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a href="#">';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li class="arrow">';
		$config ['last_link'] = 'Last';
		$config ['last_tag_close'] = '</li>';
	
		$this->pagination->initialize ( $config );
		$page = $config ['per_page'];
		$segment = $this->uri->segment ( $segment );
	
		return array (
				"page" => $page,
				"segment" => $segment
		);
	}


}