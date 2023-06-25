<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");



class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
      
        $this->load->model('Custommodel');
        $this->load->model('Dietmodel');
    } 
	public function index(){
		if(@$_SESSION['Token']){
			redirect('Admin/Dashboard');
		}else{
			$this->load->view('Admin/index.php');
		}
		
	}
	public function foodchart(){
		$this->load->view('Admin/foodchart.php');
	}
	public function login(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
					);
		$res = Admin_login_api($data);

		if($res->response_code == 0){
			
			$_SESSION['username'] = $res->data->username;
			$_SESSION['Token'] = $res->data->Authtoken;
			redirect('Admin/Dashboard');

		}else{
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
	}
	public function Dashboard(){

		if($_SESSION['Token']){
			$this->load->view('Admin/dashboard.php');
		}else{
			redirect('Admin/index');
		}
		
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
	public function paid_users(){
		$url = 'Api/Userdata';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);
		if($res->response_code==0){
		$data['message'] = $res->Paiduser;
		$this->load->view('Admin/paid_users',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function unpaid_users(){
		$url = 'Api/Userdata';
		$Auth = $_SESSION['Token'];
		$res = api_call($url,$Auth);

		if($res->response_code==0){
		$data['message'] = $res->NonPaid;
		$this->load->view('Admin/unpaid_users',$data);
		}else{
			session_destroy();
			$this->session->set_flashdata('message', $res->response_message);
			redirect('Admin/index');
		}
		
	}
	public function formnotfilled(){
		$this->load->view('Admin/formnotfilled');
	}
	public function allusers(){
		$this->load->view('Admin/allusers');
	}
	public function expired_users(){
		$this->load->view('Admin/expired_users');
	}
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
		$this->load->view('Admin/addplacement');
	}
	public function addfood(){
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
	public function region(){
		$this->load->view('Admin/region');
	}
	public function manageregion(){
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
		
		$this->load->view('Admin/foodcombination',$data);
	}
	public function foodcombination_list(){
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

		$placement =  implode(",",$_POST['Placement']);

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
			 		'upperplacement' => $_POST['upperplacement'],
			 		'foodCategory' => $_POST['foodCategory'],

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
		redirect('Admin/foodCombinationList');
	}

	public function chartPreparation(){

		$this->load->view('Admin/chartpreparation.php');
	}
	public function edit_foodcombination($foodId,$combinationId)
	{
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
	public function test4(){
		print_r($_POST['time']);
		echo "Asddas";
		pr($_POST);
	}
}
