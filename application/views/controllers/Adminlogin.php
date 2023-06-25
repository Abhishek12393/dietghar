<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");



class Adminlogin extends CI_Controller {

	function __construct() {
        parent::__construct();
      
        $this->load->model('Custommodel');
        $this->load->model('Dietmodel');
      
    } 


	public function AdminLogin(){
		
		 $jsondata = file_get_contents('php://input');
		 $postdata = json_decode($jsondata);
		 $postdata = $postdata;
		
		if(!empty( $postdata->username && @$postdata->password )){
		$data = $this->Custommodel->Login($postdata);
		if($data){
			$token = generateRandomString(75);
			$table = 'admin_sessions';
			$id = $data->id;
			$where ='admin_id';
			$session = array(
				'token' => $token,
				'lastlogin' => time()
						);
			$this->Custommodel->update_common($session,$table,$where,$id);
			$data->Authtoken = $token;
			$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'data' => $data];
			echo json_encode($response); 
	}else{
		$response = ['response_code' => FAILURE , 'response_message' => 'Invalid Username or Password' ];
		echo json_encode($response); 
	}
		
	 }else{

		$response = ['response_code' => FAILURE , 'response_message' => 'Parameter Missing' ];
		echo json_encode($response);
	}

	}

	

}
