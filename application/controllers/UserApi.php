<?php
#-----------User APi Controller----------------#
# : 

defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");



class UserApi extends CI_Controller {

	function __construct() {
		parent::__construct();
	
		$this->load->model('Custommodel');
		$this->load->model('Dietmodel');
		$this->load->model('User_model');

		// direct call to this controller is will be authenticated
		//$auth= getallheaders();
		//@$token = $auth['Auth'];
		// $resp = $this->Checkauth($token);
		// echo $resp;

		// $fi = "apidoc.txt";
		// $m =  file_get_contents('php://input');
		// $txt = $m;
		// 		// $myfile = file_put_contents($fi, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
		// $myfile = file_put_contents($fi, $txt.PHP_EOL);
        
  } 
 	

 	public function index(){
 		echo "No API FOUND !";
 	}

	// 17 10 2022 :: using this function for meal chart pdf download
	 public function mealchartdownload($token , $chartid ='' , $userid){
		// echo $chartid;
		if(isset($token) && $token == 'abcd') {
			// echo "this is the page we want to be captured";
			// pr('true',$chartid);
			$chart = $this->data['chart']=$this->Custommodel->Select_common_where('customers_chart_final','chart_id',$chartid);
			$user = $this->data['userdata']=$this->Custommodel->Select_common_where('customers_info','id',$userid)[0];
			$userlifestyle = $this->data['userlifestyle']=$this->Custommodel->Select_common_where('customer_lifestyle','user_id',$userid)[0];
			// prd($user);
			$this->load->view('User/mealchart/fullmealchart.php',$this->data);
		}
	}

  

 	// get client health  // in chat app 
 	public function client_profile(){

	    $id = $this->input->post('id');
		if($id){
	    $table = 'customers_info';
	    $where = 'id';
	    $details = $this->Custommodel->Select_common_where($table,$where,$id);
	    // echo $details[0]['bmi_value'];
	    echo json_encode($details[0]);
		}else{
			echo "required data not found";
		}
	 }

 	// to save the client message message from the frontened website
	 public function saveMessage()	 {  
		  // calling via ajax on main website
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$mobile = $this->input->post('mobile');
			$message = $this->input->post('message');

			if($fname && $lname && $mobile && $message){
				$data = [
					'name' => $fname.' '.$lname,
					'mobile' => $mobile,
					'message' => $message,
				
				];
				$table = 'contact';

					$ins = $this->Custommodel->insert_common($table,$data);
					if($ins > 0 ){
						$resp = 'Message Send!';
					}else{
						$resp = 'Message sending Failed';
					}
			}else{
				$resp = 'Data Missing In Form';
			}

			echo $resp;

	 }


}
