<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
class Admin_recipe extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Custommodel');
		$this->load->model('Recipesearch_model' , 'rmmodel');
		$this->data = array();
		$this->data['ctrl'] = 'Admin_recipe';

		$authurl = 'Api/Checkauthpost';
		$Auth = $_SESSION['Token'];
		$tokenParam = ['token'=> $Auth];
		$this->resAuth = api_call($authurl,$Auth,$tokenParam);

	} 

	#// view functions
	public function view(){
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
			
			$table = 'recipes_master';
			$res = $this->rmmodel->getrecipelist();
			$this->data['resp'] = $res;
			adminloadview('recipe/recipe_master.php',$this->data);
		}else{
			redirect('Admin/Dashboard');
		}
		
	}

	public function manage_tags(){
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
			$table = 'recipes_tags';
			$res = $this->Custommodel->Select_common($table);
			$this->data['resp'] = $res;
			adminloadview('recipe/recipe_tag_master.php',$this->data); // load view cHelper
		}else{
			redirect('Admin/Dashboard');
		}
	}

	public function addrecipe($id = 'NA'){
		// add auth
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
			if($id != 'NA'){
				$table = 'recipes_master';
				$res = $this->Custommodel->Select_common_where($table,'id',$id);
				$this->data['data'] = $res[0];
			} 
			$addfoodid = $this->data['addfoodid'] = $this->input->get('fdid');
			$allfood = $this->data['all_food']=$this->Custommodel->Select_common_where('food_master','recipe_id',0);
			adminloadview('recipe/recipe_add.php',$this->data);
		}else{
			redirect('Admin/Dashboard');
		}
	}
	public function recipeIngredientView($id,$recName='')
	{
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
 
				$table = 'recipes_ingredients';
				$res = $this->Custommodel->Select_common_where($table,'recipe_id',$id);
				$this->data['data'] = $res;
				$this->data['recipeId'] = $id;
				$this->data['recName'] = str_replace('%20', ' ', $recName);
 
			adminloadview('recipe/recipe_ingredients.php',$this->data);
		}else{
			redirect('Admin/Dashboard');
		}

	}
	public function recipeInstructionView($id,$recName='')
	{
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
 
				$table = 'recipes_instruction';
				$res = $this->Custommodel->Select_common_where($table,'recipe_id',$id);
				$this->data['data'] = $res;
				$this->data['recipeId'] = $id;
				if($recName != ''){
					$this->data['recName'] = str_replace('%20', ' ', $recName);
					$_SESSION['recName'] = $this->data['recName'];
					$_SESSION['recipeId'] = $id;
				}else{
					$this->data['recName'] = $_SESSION['recName'];
				}
				
			adminloadview('recipe/recipe_instructions.php',$this->data);
		}else{
			redirect('Admin/Dashboard');
		}

	}
	
	public function recipeTagsView($id,$recName)
	{
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
 
				$res = $this->rmmodel->getrecipetags($id);
				$this->data['data'] = $res;

				$res2 = $this->Custommodel-> Select_common('recipes_tags');
				$this->data['taglist'] = $res2;

				$this->data['recipeId'] = $id;
				$this->data['recName'] = str_replace('%20', ' ', $recName);

			adminloadview('recipe/recipe_tagsmapping.php',$this->data);
		}else{
			redirect('Admin/Dashboard');
		}

	}
	

	
	#// insert or add funcstions
	public function addnewrecipe(){
		pr($this->input->post());
		
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
			$fmid = $data['food_master_id'] = $this->input->post('food_master_id');
			$data['short_name'] = $this->input->post('short_name');
			$data['difficulty_type'] = $this->input->post('difficulty');
			$data['prep_time'] = $this->input->post('prep_time');
			$data['serving'] = $this->input->post('serving');
			$data['cuisine_type'] = $this->input->post('cuisine_type');
			$data['description'] = $this->input->post('description');
			$data['notes'] = $this->input->post('notes');
			$data['featured'] = $this->input->post('featured');
			$data['image_link']  = '';
			if(!empty($_FILES['recipeimage']['name'])){ 
					// Set preference 
					$config['upload_path'] ='upload/recipes/'; 
					$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
					$config['max_size'] = '50000'; // max_size in kb 
					$config['file_name'] = uniqid().'_'.$_FILES['recipeimage']['name']; 
 
					// Load upload library 
					$this->load->library('upload',$config); 
					 // File upload
					 if($this->upload->do_upload('recipeimage')){ 
            // Get data about the file
            $uploadData = $this->upload->data(); 
            $data['image_link'] = $config['upload_path'].$uploadData['file_name']; 
         }else{ 
            $response =  $this->upload->display_errors();
         }
				}
				$data['updated_dt'] = date('Y-m-d H:i:s');
				$table = 'recipes_master';
				$respupdt = $this->Custommodel->insert_common($table,$data);
	 
				if ($respupdt > 0) {
					// success redirect
					$udata = ['recipe_id' => $respupdt];
					$foodmasterid = $this->Custommodel->update_common($udata,'food_master','id',$fmid);
					if ($respupdt > 0) {
						$message = 'success';
					}else{
						$message = 'failed:2';

					}
				}else{
					// failed
					$message = 'failed';
				}
				redirect('Admin_recipe/view?msg='.$message);

		}else{
			redirect('Admin/Dashboard');
		}
	}
	
	public function addtagname(){
		pr($this->input->post());
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){

			$table  ='recipes_tags';
			$data = ['tag_name'=> $this->input->post('tag_name') ];
			$resp = $this->Custommodel->insert_common($table,$data);
			if($resp > 0){
				$message = 'Success';
			}else{
				$message = 'Failed';
			}
			redirect('Admin_recipe/manage_tags?msg='.$message);
		}else{
			redirect('Admin/index');
		}
	}
	public function addnewingr()	{
 
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
			$recpId = $this->input->post('recipe_id');
			$table  ='recipes_ingredients';
			$data = ['recipe_id'=> $this->input->post('recipe_id'), 'quantity'=> $this->input->post('quantity') , 'text'=> $this->input->post('text') ];
			$resp = $this->Custommodel->insert_common($table,$data);
			if($resp > 0){
				$message = 'Success';
			}else{
				$message = 'Failed';
			}
			redirect('Admin_recipe/recipeIngredientView/'.$recpId."?msg=".$message);
		}else{
			redirect('Admin/index');
		}
	}
	public function addnewins()	{
 
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
			$recpId = $this->input->post('recipe_id');
			$table  ='recipes_instruction';
			$data = ['recipe_id'=> $recpId, 'instruction'=> $this->input->post('itext') ];
			$resp = $this->Custommodel->insert_common($table,$data);
			if($resp > 0){
				$message = 'Success';
			}else{
				$message = 'Failed';
			}
			redirect('Admin_recipe/recipeInstructionView/'.$recpId."?msg=".$message);
		}else{
			redirect('Admin/index');
		}
	}

	public function addtagforRecipe()
	{
		// $resAuth = $this->resAuth;
		// if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
		$tags = array();
		$table = 'recipes_tags_mapping';


		$id = $this->input->post('recipe_id');
		$posttags = $this->input->post('tags');
		#get tags from database
		$res = $this->rmmodel->getrecipetags($id);
		$data  = $res;
		foreach ($data as  $datav) {
				$dbTags[] = $datav->id;
		}

		$respdelete =1;
		$respInsert =1;
		pr($dbTags, 'curentTags');
		pr($posttags,'tagstoupdate');
		
		if(!empty($dbTags)){
			echo "here";

			if(!empty($posttags)){
				echo "here";
				$resdelete=array_diff($dbTags,$posttags);
				print_r($resdelete); // for removing if db tags 
			}else{
				$resdelete = $dbTags;
			}
			# now delete if array comes
			if(!empty($resdelete)){
				$respdelete = $this->rmmodel->deletetagsfromRecipe($id,$resdelete);
				pr($respdelete,'delete resp');
			}


		}


		


		// for adding if post tags new items which are not db

		if(!empty($posttags)){
			# when post new tags is not empty

			if(!empty($dbtag)){
				$resAdd=array_diff($posttags,$dbTags);
				print_r($resAdd ,'diffrence Add');
			}else{
				$resAdd = $posttags;
			}

			if(!empty($resAdd)){
				foreach($resAdd as $val){
					$insert[] = ['recipe_id'=> $id , 'tag_id'=>$val];
				}
				$respInsert = $this->Custommodel->insert_common_batch($table,$insert);
			}
			pr($respInsert,'insert');

		}

		if($respInsert > 0 && $respdelete > 0){
			$message = " Succes";
		}else{
			$message = "Something failed";
		}
	
		redirect($_SERVER['HTTP_REFERER']);

	}

	// update function

	public function updatenewrecipe()
	{
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
			$id = $this->input->post('id');
			$data['short_name'] = $this->input->post('short_name');
			$data['difficulty_type'] = $this->input->post('difficulty');
			$data['prep_time'] = $this->input->post('prep_time');
			$data['serving'] = $this->input->post('serving');
			$data['cuisine_type'] = $this->input->post('cuisine_type');
			$data['description'] = $this->input->post('description');
			$data['notes'] = $this->input->post('notes');
			$data['featured'] = $this->input->post('featured');
			$cimage = $this->input->post('cimagelink');
			$data['image_link']  = $cimage;
			if(!empty($_FILES['recipeimage']['name'])){ 
				// Set preference 
				$config['upload_path'] ='upload/recipes/'; 
				$config['allowed_types'] = 'jpg|jpeg|png|gif'; 
				$config['max_size'] = '50000'; // max_size in kb 
				$config['file_name'] = uniqid().'_'.$_FILES['recipeimage']['name']; 

				// Load upload library 
				$this->load->library('upload',$config); 
				// File upload
				if($this->upload->do_upload('recipeimage')){ 
					// Get data about the file
					$uploadData = $this->upload->data(); 
					$data['image_link'] = $config['upload_path'].$uploadData['file_name'];
					
					# unlink old image if present
					if($cimage != ''){
						unlink($cimage) or die('old image deletion error');
					}
				}else{ 
						$response =  $this->upload->display_errors();
				}
				
			}
			$data['updated_dt'] = date('Y-m-d H:i:s');
				$table = 'recipes_master';
				$respupdt = $this->Custommodel->update_common($data,$table,'id',$id);
	 
				if ($respupdt > 0) {
					// success redirect
					$message = 'success';

				}else{
					// failed
					$message = 'failed';
				}
				redirect('Admin_recipe/view?msg='.$message);
		}else{
			redirect('Admin/index');
		}

	} // func ends


	// delete functions 
	public function deleterecipe($id)
	{
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
			pr('deletion is ok but also delete all from other Tables');
			$table  ='recipes_master';
			$resp = $this->Custommodel->delete_commonbyid('id',$id,$table);

			$table2  ='recipes_tags_mapping';
			$resp2 = $this->Custommodel->delete_commonbyid('recipe_id',$id,$table2);
			$table3  ='recipes_instruction';
			$resp3 = $this->Custommodel->delete_commonbyid('recipe_id',$id,$table3);
			$table4  ='recipe_likes';
			$resp4 = $this->Custommodel->delete_commonbyid('recipe_id',$id,$table4);
			$table5  ='recipes_ingredients';
			$resp5 = $this->Custommodel->delete_commonbyid('recipe_id',$id,$table5);
 
			if($resp == 'true'){
				$message = 'Success';
			}else{
				$message = 'Failed';
			}
			redirect('Admin_recipe/view?msg='.$message);
		}else{
			redirect('Admin/index');
		}
	}
 
	public function deleteIngr($id)
	{
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){

			$table  ='recipes_ingredients';
			$resp = $this->Custommodel->delete_commonbyid('id',$id,$table);
			if($resp == 'true'){
				$message = 'Success';
			}else{
				$message = 'Failed';
			}
			redirect('Admin_recipe/recipeIngredientView/'.$id."?msg=".$message);
		}else{
			redirect('Admin/index');
		}
	}
 
	public function deleteInstruc($id)
	{
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
			$table  ='recipes_instruction';
			$resp = $this->Custommodel->delete_commonbyid('id',$id,$table);
			if($resp == 'true'){
				$message = 'Success';
			}else{
				$message = 'Failed';
			}
			$recName=$_SESSION['recName'];
			$id=	$_SESSION['recipeId'] ;
			redirect('Admin_recipe/recipeInstructionView/'.$id."/".$recName."?msg=".$message);
		}else{
			redirect('Admin/index');
		}
	}


	public function deletetag($id)
	{
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){

			$table  ='recipes_tags';
			$resp = $this->Custommodel->delete_commonbyid('id',$id,$table);
			if($resp > 0){
				$message = 'Success';
			}else{
				$message = 'Failed';
			}
			redirect('Admin_recipe/manage_tags?msg='.$message);
		}else{
			redirect('Admin/index');
		}
	}
	

	// self API 

	public function makefeatured($id,$featured)
	{
		$resAuth = $this->resAuth;
		if($resAuth->response_code == 0 && $resAuth->response_message == 'VALID_AUTH' ){
			
			$table  ='recipes_master';
			$data = ['featured' => $featured];
			$resp = $this->Custommodel->update_common($data,$table,'id',$id);
		  
			$response = ['resp'=> $featured];
		}else{
			$response = ['resp'=> $resAuth];
		}

		
		echo json_encode($response);
	}


} // class ends



