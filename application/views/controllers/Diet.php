<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Diet extends BaseController {

	function __construct() {
        parent::__construct();
        $this->load->model('Dietmodel');
        $this->load->model('Custommodel');
    }

 public function index(){
  
    $this->loadViews('index.php');

 }
 public function perfect_plan(){
    $this->load->view('perfect_plan.php');
 }
 public function registration(){

    $this->load->view('registration.php');
 }
 public function success_story(){
   
    $this->load->view('success_story.php');
 }

 public function checkmobile(){

 	$table = 'customers_info';
 	$where = 'mobile_no';
 	$mobile = $this->input->post('mobile'); 
 	//$opt =  mt_rand(100000,999999);
 	$otp = 123456;
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
 	}else{
 		$this->Custommodel->update_common($data,$table,$where,$mobile);
 	}

 }

 public function checkotp(){

 	$mobile = $this->input->post('mobile'); 
 	$otp = $this->input->post('otp').$this->input->post('otp1').$this->input->post('otp2').$this->input->post('otp3').$this->input->post('otp4').$this->input->post('otp5'); 

 	$details = $this->Dietmodel->checkotp($otp,$mobile);
 	if($details){
 		echo $details[0]['lastButtonId'];
 		$_SESSION['id'] = $details[0]['id'];
 	}else{
 		echo "Error";
 	}

 }

 public function logout(){
 	session_destroy();
 	redirect('index');
 }

 public function Update(){

 	$data = array(
 		$this->input->post('column') => $this->input->post('value'),
        'lastButtonId'   => $this->input->post('button')
 				);
 	$table =  $this->input->post('table');
 	$where = $this->input->post('where');
 	$id = $_SESSION['id'];
 	$this->Custommodel->update_common($data,$table,$where,$id);
 }

 public function Updates(){

    $id = $_SESSION['id'];
   // pr($_POST);die;
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
    }else{
    $data = array(
        $this->input->post('column') => $this->input->post('value'),
                );
    $table =  $this->input->post('table');
    $where = $this->input->post('where');
    
    $this->Custommodel->update_common($data,$table,$where,$id);
    }
    $data1 = array(

        'lastButtonId'   => $this->input->post('button')
                );
     $this->Custommodel->update_common($data1,'customers_info','id',$id);
 }
 public function UpdatePersonalInfo(){

 	$data = array(
 		'first_name' => $this->input->post('fname'),
 		'last_name' => $this->input->post('lname'),
 		
 				);
 	$table =  $this->input->post('table');
 	$where = $this->input->post('where');
 	$id = $_SESSION['id'];
 	$this->Custommodel->update_common($data,$table,$where,$id);
 	$table = 'customer_address';
	$code =  $this->input->post('pincode');
	$address =  pincode_address($code);
	$address = json_decode($address);
  
    $District =  $address->PostOffice[0]->District; 
    $State    =  $address->PostOffice[0]->State;  
    $Country  =  $address->PostOffice[0]->Country;

 	$data = array(
 		'customer_id'  => $id,
 		'pincode'  => $code,
 		'city'  => $District,
 		'state'  => $State,
 		'country' => $Country, 
 		'house_no' => $this->input->post('houses'), 
 		'address' => $this->input->post('address'), 
 				);
 	$this->Custommodel->insert_common($table,$data);

 }

public function InsertLifestyle(){

	$id = $_SESSION['id'];
	$table = $this->input->post('table');
	$data = array(
 		'user_id'  => $id,
 		'objective'  => $this->input->post('value'),
 	
 				);

 	$this->Custommodel->insert_common($table,$data);
}

public function testapi(){


	$url = 'https://dietsoftware.tk/diet/Api/foodlist';

//create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST
$data = array(
    'username' => 'admin',
    'password' => '123456'
);
$payload = json_encode($data);

//attach encoded JSON string to the POST fields
//curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
$Auth='sz1NhB2yocUNQHsTFdkex8IZKZIn8LkM2sQq4gxCJtzoaXnrmjh9GFKoLRb9XGmDbHfZ63BuwRR';
$header  = array(
    'Content-Type:application/json',
    'Auth:'.$Auth
);
//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER,$header );

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
//execute the POST request
$result = curl_exec($ch);

//close cURL resource
curl_close($ch);
echo $result;

}


public function test(){

    $data = array(
        'username' => 'admin',
        'password' => '123456'
                );
    $res = Admin_login_api($data);
    echo $res;
}
public function test2(){
   $auth =  'i7ivSu6zkkg6DcfS4zoliVnw5XuOVCGrMY4YWcA1v4TfbYkgy56vaCOWqKhLDQ84maIB9VyW4bj';
   $url = 'https://dietsoftware.tk/diet/Api/foodlist';
   $data = array(
    'id' => '97'
                );
  $res =  api_call($url,$auth);
  pr($res);
}

}
	