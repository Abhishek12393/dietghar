<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

class Api_frontend extends CI_Controller {
	
	# frontend web api
	function __construct() {
			parent::__construct();
		
			$this->load->model('Custommodel');
			$this->load->model('Dietmodel');
			$this->load->model('User_model');

			$token = $this->input->post('token');
			if(empty($token)){
			 $this->post = postdata();
			 $token = $this->post->token;
			}
 
 
			$checktoken = $this->checktoken($token);
 


			if( $checktoken == 1	){
			
			}else{
				$response = ['authCode'=> 0 , 'authMessage'=>'Auth failed'];
				echo json_encode( $response);
				exit();

			}
      
    } 
 
 	public function index(){

		echo "\n <br>WRONG CALL!!";

 	}

	 # call blog
	 public function retriveblog($page){
			$limit = 5;
			$table = 'blog';
			$where = "";
		 $resp = $this->Custommodel->Select_common_limit_offset($table,'updated_dt',$limit,'0');
		
 
		 if(is_array($resp) ){
			 $response = ['authCode'=> 1 , 'authMessage'=>'Auth Success' , 'responseCode'=> 1 ,'response'=> $resp];
		 }else{
			$response = ['authCode'=> 1 , 'authMessage'=>'Auth Success' , 'responseCode'=> 0 ,'response'=> ''];
		 }

		
		echo json_encode( $response);
	 }




	 public function checkapi()
	 {	$data = array();
 
			$calorie = $this->post->calorie;
			$foodcat = $this->post->foodcat;
			$days = $this->post->chartdays;

			$table = get_table_name($calorie);

			# test creds
			// $table =  "final_chart_1200_1300";
			// $foodcat  = 1;
			// $days = 5;
	 
			$respdata = $this->Dietmodel->prepare_foodchart_forminidiet($table ,$foodcat, $days);
			//  pr($respdata);
		 

		 $data = ['days'=>$days ,'table'=>$table ,'calorie'=>$calorie ,'foodcat'=>$foodcat ,'respdata'=>$respdata ];
		 echo json_encode($data);

	 }




	 public function checktoken($token)
	 {
		#break the token
		#read the length
		#remove the salt
		#convert the remaing hash into string 
		#compare with the domain array 
		$domain = ['dietghar.com' , 'dietghar.in' , 'chat.dietghar.in'];
		$explodetoken = explode("_",$token);
		$len = end($explodetoken);
		$range = range('a', 'z');
		$len = array_search($len , $range);
		$len = $len-1;

		$removesalt = substr($explodetoken[0],$len);
		$stat = 0;
		foreach($domain as $str){
			if($removesalt == md5($str)){
				$stat =1;
			}
		}

		return $stat;
	 }

 
 


}
