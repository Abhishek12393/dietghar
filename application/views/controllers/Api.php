<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");



class Api extends CI_Controller {

	function __construct() {
        parent::__construct();
      
        $this->load->model('Custommodel');
        $this->load->model('Dietmodel');
        $auth= getallheaders();
      //  pr($auth);die;
		@$token = $auth['Auth'];
		$this->Checkauth($token);
   	    $fi = "apidoc.txt";
	    $m =  file_get_contents('php://input');
        $txt = $m;
        //  $myfile = file_put_contents($fi, $txt.PHP_EOL , FILE_APPEND | LOCK_EX);
        $myfile = file_put_contents($fi, $txt.PHP_EOL);
        
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
		$response = ['response_code' => FAILURE , 'response_message' => 'No  Data Found !' ];
		echo json_encode($response); 
		exit();

	}
		
	 
	}

	public function Userdatadetails(){
		 $postdata = postdata();
		@$user_id = $postdata->user_id;
	
		if($user_id){
			$result = $this->Dietmodel->Userdatadetails($user_id);
			if($result){
				$response = ['response_code' => SUCCESS , 'response_message' => 'Success' , 'data' => $result];
				echo json_encode($response); 
				exit();

			}else{
				$response = ['response_code' => FAILURE , 'response_message' => 'No Data Found' ];
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
			$response = ['response_code' => FAILURE , 'response_message' => 'No Data Found' ];
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
			$response = ['response_code' => FAILURE , 'response_message' => 'No Data Found' ];
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
		
			$data = array(
				'customer_id' => $userId,
				

						);

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

	public function getFoodcombination(){

		$postdata = postdata();
		$table = 'foodCombination'; 
		$result = $this->Dietmodel->getFoodcombination($table);			
		
		
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
}
