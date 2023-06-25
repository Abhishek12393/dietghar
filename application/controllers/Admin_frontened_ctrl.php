<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
class Admin_frontened_ctrl extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Custommodel');
		$this->load->model('Dietmodel');
		#$this->load->model('Recipesearch_model' , 'rmmodel');
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
			adminloadview('frontend/recipe_master.php',$this->data);
		}else{
			redirect('Admin/Dashboard');
		}
		
	}
	public function loginhistory(){
		is_protected();
		$userid = $_GET['userid'];
		$this->trackerpath = 'upload/userTracking/';
		$jsonString = file_get_contents($this->trackerpath.$userid.'.json');
		$jsonArray = json_decode($jsonString,true);
		$jsonArray = array_reverse($jsonArray);
		$data['login_history'] = $jsonArray;

		// prd($data);
		adminloadview('frontend/loginHistory.php',$data);
	}
	public function manageGallery(){ // by at
		is_protected();
		$data['message'] = $this->Dietmodel->all_gallery_photos();
		// $this->load->view('Admin/frontend/manageblog.php',$data);
		adminloadview('frontend/galleryManage.php',$data);
	}
	public function addGallery(){ // by at
		is_protected();
		$data['message'] = $this->Dietmodel->all_gallery_photos();
		$data['gridno'] = $this->db->query('SELECT grid + 1 as grid FROM gallery_web ORDER BY id DESC LIMIT 1')->result_array()[0]['grid']; // grid number to be inserted
 
		// if(empty($gridno)){
		// 	$data['gridno'] = 1;	
		// }else{
		// 	$data['gridno'] = $gridno;
		// }
		// $this->load->view('Admin/frontend/manageblog.php',$data);
		adminloadview('frontend/galleryAddphotos.php',$data);
	}

	public function save_gallery_photos(){
		// pr($_POST);
		// pr($_FILES);
		$grid = $this->input->post('grid');
		for ($i=0; $i < 6 ; $i++) { 
			echo $i;
		 	$uploaddir = 'upload/gallery_images/';
 
			if($_FILES['file']['size'][$i] !=0 ){
				$path = $_FILES['file']['name'][$i];
			 	$newName = time().$i.".".pathinfo($path, PATHINFO_EXTENSION); 
				 $uploadfile = $uploaddir . $newName;
				 if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadfile) ){
					 echo "uploaded ".$uploadfile;
				 }else{
					 #die('failed to upload the image');
					//  echo "not uploaded";
					 //pr($_FILES['file']['error']);
				 }
				 $uploadfile = base_url().$uploadfile;
				}else{
					$uploadfile = $i;
				}
			 
				//$uploadfile = $uploaddir . basename($_FILES['file']['name']);
				// echo "--".$uploadfile."<br>";
				$data = array(
					'title' =>$this->input->post('title')[$i],
					'image' => $uploadfile,
					'grid' =>$grid,
					'updated_dt' =>date('Y-m-d H:i:s'),
				);
 
				$resp = $this->db->insert('gallery_web', $data);

				// echo $resp."<br>";

		}
			redirect('Admin/addGallery');
	}

	public function ajax_get_gallery_items(){
		// for frontened // by at
		$grid = $this->input->post('grid');
		// echo $grid;
		$data= $this->Dietmodel->gallery_photos_bygrid($grid);
		echo json_encode($data);
	}

	// by at

	public function manageblog(){
		is_protected();
		$data['message'] = $this->Dietmodel->allblogs();
		// $this->load->view('Admin/frontend/manageblog.php',$data);
		
		adminloadview('frontend/manageblog.php',$data);
	}
	public function addblog(){
		is_protected();
		$data = [];
		// $this->load->view('Admin/frontend/addblog.php');
		adminloadview('frontend/addblog.php',$data);
	}
	

	public function save_blog(){
		is_protected();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			 
			 $uploaddir = 'upload/blog_images/';
			$uploadfile = $uploaddir . basename($_FILES['file']['name']);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile) ){
				echo "uploaded at ".$uploadfile;
			}else{
				#die('failed to upload the image');
			}

				$question = $this->input->post('question');
				$answer = $this->input->post('answer');
				$data = array(
						'image' => base_url().$uploadfile,
						'title' =>$this->input->post('title'),
						'url_title' =>$this->createurltitle($this->input->post('title')),
						'description' =>$this->input->post('editor-full'),
						'date' =>date('Y-m-d'),
					);
					$this->db->insert('blog', $data);
					redirect('Admin/manageblog');
			}
	}

	public function editblog($id){
		is_protected();
		
		$resp = $this->Custommodel->Select_common_where('blog','id',$id);
		$data['data'] = $resp[0];
		adminloadview('frontend/editblog.php',$data);
	}
	
	public function update_blog(){
		is_protected();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if(!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])) {
				// echo 'No upload';
				$imgUrl = $this->input->post('oldimg');
			}else{
				$uploaddir = 'upload/blog_images/';
				$uploadfile = $uploaddir . basename($_FILES['file']['name']);
				if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile) ){
				#	echo "uploaded at ".$uploadfile;
				}else{
					#die('failed to upload the image');
				}			

				$imgUrl = base_url().$uploadfile;
			}


			 $id = $this->input->post('id');
			 $title = $this->input->post('title');
				$url_title = $this->createurltitle($title);
 
			 $data = array(
					 'image' => $imgUrl,
					 'title' =>$this->input->post('title'),
					 'url_title' =>$url_title,
					 'description' =>$this->input->post('editor-full'),
					 'date' =>date('Y-m-d'),
				 );
				 $this->Custommodel->update_common($data,'blog','id',$id );
				 redirect('Admin/manageblog');
		 }

	}
	#=========================================videos==================
	public function manage_videos( )
	{
		is_protected();
		$data['message'] = $this->Dietmodel->allVideos();
		// $this->load->view('Admin/frontend/manageblog.php',$data);
		adminloadview('frontend/videos_list.php',$data);
	}
	public function add_videos( )
	{
		is_protected();
		$data['message'] = $this->Dietmodel->allVideos();
		// $this->load->view('Admin/frontend/manageblog.php',$data);
		adminloadview('frontend/videos_add.php',$data);
	}
	public function delete_videos($id)
	{
		// need to add unlink of the image before delete
		$resp = $this->Dietmodel->del_Videos($id);
		if($resp== 1){
			redirect('Admin/manage_videos?m=success');
		}else{
			redirect('Admin/manage_videos?m=error');
		}
	}
	public function save_Videos(){
		is_protected();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			 
			 $uploaddir = 'upload/videos_tmbnl/';
			$uploadfile = $uploaddir . basename($_FILES['file']['name']);
			if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile) ){
				echo "uploaded at ".$uploadfile;
			}else{
				#die('failed to upload the image');
			}

				$question = $this->input->post('question');
				$answer = $this->input->post('answer');
				$data = array(
					'yt_link' =>$this->input->post('yt_link'),
					'thumbnail_link' => base_url().$uploadfile,
						'notes' =>$this->input->post('editor-full'),
						'updated_dt' =>date('Y-m-d H:i:s'),
					);
					$this->db->insert('videos', $data);
					redirect('Admin/manage_videos');
			}
	}
	#=========================================videos==================###


	public function createurltitle($text){

		$text = strtolower($text);
		$text = preg_replace('/[^A-Za-z0-9\-]/', ' ', $text);
		$text = trim($text," ");
		$text = preg_replace('#[ -]+#', '-', $text);

		return $text;
	}

	public function updateblogJson(){
		# "here i will send data to api of frontened with token then it will update the list of blogs";
		$data  = $this->Dietmodel->allblogs();
		 $jsonData = json_encode($data);
		#send data through api with token
		#function api_call($urls,$Auth,$data=false){
			// *call api when its authenticted //

			$Auth = ''; 
			$data = ['token'=>$this->createtoken('dietghar.com'), 'data'=>$jsonData];
			$url =  'https://dietghar.com/ManagerCtrl/updateBlogsJson_API';
			$ch = curl_init($url);
		
			if($data){
				$payload = json_encode($data);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
			}
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

			#print_r(json_decode($result));
			redirect('Admin/manageblog');
	}

	public	function createtoken($domain){
		!isset($domain) ? exit() : '';
		// custom token creation
		$salt = uniqid();
		
		$pass = $domain;
		$passhash = md5($pass);

		$len = strlen($salt); // get length

		$range = range('a', 'z'); // array to give each alphabet a number
		$lenhash = $range[$len+1]; // fake length

		$token = $salt.$passhash.'_'.$lenhash;
 
		return $token;
 
	}
 

} // class ends



