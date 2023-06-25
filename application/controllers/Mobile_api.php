<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");



class Mobile_api extends CI_Controller {

	function __construct() {
        parent::__construct();
      
        $this->load->model('Custommodel');
        $this->load->model('Dietmodel');
  //       $auth= getallheaders();
  //     	@$token = $auth['Auth'];
		// $this->Checkauth($token);
  //  	    $fi = "apidoc.txt";
	 //    $m =  file_get_contents('php://input');
  //       $txt = $m;
  //       //  $myfile = file_put_contents($fi, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
  //       $myfile = file_put_contents($fi, $txt.PHP_EOL);
        
        } 

	public function Checkauth($token){
		
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
	
	public function Userdata(){
		
		$paid_user = $this->Dietmodel->userdata(1);
		$non_paid_user = $this->Dietmodel->userdata(2);
		if($paid_user || $non_paid_user){
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'Paiduser' => $paid_user,'NonPaid' => $non_paid_user];
		echo json_encode($response); 
		exit();
	}else{
		$response = ['response_code' => SUCCESS , 'response_message' => 'No  Data Found !' ];
		echo json_encode($response); 
		exit();

	}
		
	 
	}

	public function user_login(){

	$table = 'customers_info';
 	$where = 'mobile_no';
 	$mobile = $this->input->post('mobile'); 
 	if(empty($mobile)){
 		$response = ['response_code' => FAILURE , 'response_message' => 'enter mobile number' ];

		echo json_encode($response); 
		exit();
 	}
 	//$opt =  mt_rand(100000,999999);
 	$otp = generate_otp();
 	$details = $this->Custommodel->Select_common_where($table,$where,$mobile);
 	$data = array(
 		'mobile_no' => $mobile,
 		'otp'  => $otp
 				);
 	//sms need to be implemented here

 	if(empty($details)){
        $lid = $this->Custommodel->insert_common($table,$data);
        $data1 = array(
        'customer_id' => $lid,
                );
 		$this->Custommodel->insert_common('customer_address',$data1);

 		$lifestyle = array(
 		'user_id'  => $lid		
 	
 				);

 		$this->Custommodel->insert_common('customer_lifestyle',$lifestyle);
       
 	}else{

 		$this->Custommodel->update_common($data,$table,$where,$mobile);
       
 	}
 	$details_data = $this->Custommodel->Select_common_where_object($table,$where,$mobile);
 	$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'data' => $details_data];
		echo json_encode($response); 
		exit();
	}

	
	public function form_fill(){
	$id = $_POST['user_id'];
	if(empty($id)){
		$response = ['response_code' => FAILURE , 'response_message' => 'enter user_id' ];

		echo json_encode($response); 
		exit();
	}
	if($this->input->post('column')=='pincode'){


    $table = 'customer_address';

    $code =  $this->input->post('value');
    $address =  pincode_address($code);
    $address = json_decode($address);
  
    $District =  $address->PostOffice[0]->District; 
    $State    =  $address->PostOffice[0]->State;  
    $Country  =  $address->PostOffice[0]->Country;

    $data = array(
       
        'pincode'  => $code,
        'city'  => $District,
        'state'  => $State,
        'country' => $Country, 
        
                );
    $this->Custommodel->update_common($data,$table,'customer_id',$id);
    $data1 = array(

        'lastButtonId'   => $this->input->post('button')
                );
     $this->Custommodel->update_common($data1,'customers_info','id',$id);
    }else{
 	$data = array(
 		$this->input->post('column') => $this->input->post('value'),
        'lastButtonId'   => $this->input->post('button')
 				);
 	$table =  'customers_info';
 	$where =  'id';
 	
 	$this->Custommodel->update_common($data,$table,$where,$id);
 	}
 	$response = ['response_code' => SUCCESS , 'response_message' => 'Success' ];
		echo json_encode($response); 
		exit();
 	

}
	
	public function update_address(){
	$id = $_POST['user_id'];
	if(empty($id)){
		$response = ['response_code' => FAILURE , 'response_message' => 'enter user_id' ];

		echo json_encode($response); 
		exit();
	}

	$data = array(
 		 'lastButtonId'   => $this->input->post('button')
 				);
 	$table =  'customers_info';
 	$where =  'id';
 	
 	$this->Custommodel->update_common($data,$table,$where,$id);
 	$data = array(
 		$this->input->post('column') => $this->input->post('value'),
        
 				);
 	$this->Custommodel->update_common($data,'customer_address','customer_id',$id);
 	$response = ['response_code' => SUCCESS , 'response_message' => 'Success' ];
		echo json_encode($response); 
		exit();
    }

    public function lifestyle(){
	$id = $_POST['user_id'];
	if(empty($id)){
		$response = ['response_code' => FAILURE , 'response_message' => 'enter user_id' ];

		echo json_encode($response); 
		exit();
	}

	$data = array(
 		 'lastButtonId'   => $this->input->post('button')
 				);
 	$table =  'customers_info';
 	$where =  'id';
 	
 	$this->Custommodel->update_common($data,$table,$where,$id);
 	$data = array(
 		$this->input->post('column') => $this->input->post('value'),
        
 				);
 	$this->Custommodel->update_common($data,'customer_lifestyle','user_id',$id);
 	$response = ['response_code' => SUCCESS , 'response_message' => 'Success' ];
		echo json_encode($response); 
		exit();
    }

}
