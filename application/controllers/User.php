<?php
#============== User Controller======================#
# this controller controls User Panel Frontened : after registration and login
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class User extends BaseController {
	public $data = array();
	function __construct() {
    parent::__construct();
    // $this->load->model('Custommodel');
    // $this->load->model('Dietmodel'); // shifted to base controller
		$this->load->model('User_model','um');
    is_user();
		// prd($_SESSION);
		// track user activity
		$this->trackerpath = 'upload/userTracking/';
		$resp = $this->trackuser($_SESSION['id']);
		// get id from session
		$this->data['id'] = $_SESSION['id'];
		$this->data['first_name'] = $_SESSION['first_name'];
		$this->data['last_name'] = $_SESSION['last_name'];
		$gender = $this->db->select('gender')->where('id',$_SESSION['id'])->get('customers_info')->result();
		$this->data['gender']= $gender[0]->gender;
		$pimage = $this->db->select('profileimage')->where('id',$_SESSION['id'])->get('customers_info')->result();
		 if($pimage[0]->profileimage !== NULL){
			 $this->data['pimage'] = $pimage[0]->profileimage;
		 }
 
		$this->data['pagename']= 'Dashboard';
  }
	private function trackuser($id){
		
		#echo $this->trackerpath;
    
 		$userid = $id;
		$jsonString = file_get_contents($this->trackerpath.$userid.'.json');
		$data = json_decode($jsonString, true);
		$data[]= [
			'device'=> $_SERVER["HTTP_USER_AGENT"], 
			'time'=> date('d-m-Y H:i:s'),
			'fromUrl'=> $_SERVER['HTTP_REFERER'],
			'url'=> $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
			'ipv4'=> $_SERVER['HTTP_X_FORWARDED_FOR'],  
			'ipv6'=> $_SERVER['REMOTE_ADDR'],  
		];
 
		$newJsonString = json_encode($data);
		if(file_put_contents($this->trackerpath.$userid.'.json' , $newJsonString)){
			#echo 1;
		}
		// prd($id,'tracked user');
	}
	# view functions
  public function index(){ 
		// prd($_SESSION);
		$this->data['page'] = 'dashboard';

		$this->data['message']=$this->Custommodel->Select_common_where('customers_info','id',$this->data['id']);
		$this->data['plan']=$this->Custommodel->Select_common_where('Plan','id',$this->data['id']);
 		#prd($this->data['message']);
		$this->data['paiduser'] = $this->data['message'][0]['is_payment_done'];
		$this->data['meal_chart_id'] = $chart_id =  $this->data['message'][0]['meal_chart_id'];
		$this->data['meal_end_date'] = $chart_end_date =  $this->data['message'][0]['meal_end_date'];

		$this->data['totalincloss'] = $this->totalincloss();
		$this->data['totalweightloss']= $this->totalweightloss();
		$this->data['dietprogress']= $this->dietprogress();
		$this->data['getmealtime']= $this->getmealtime();
		$this->data['todaysmealitems']= $this->gettodaysmeal();
		#prd(	$this->data['todaysmealitems'],'meals items');
		# calculate expiry of the plan  expred = 1 , new =2  
		$plan_purchase = $this->check_cust_payment_eligiblity($this->data['id']);
		// prd($plan_purchase);
		$this->data['expiry_stat'] = $plan_purchase;


 		$this->load->view('User/index.php',$this->data);
  }
	private function gettodaysmeal(){
		$uid = $this->data['id'];
		$meal_chart_id = $this->data['meal_chart_id'];
		$meals = $this->Dietmodel->gettodaysmeal_fooditems($uid,$meal_chart_id);
		
		return $meals[0];
	}

	private function getmealtime(){
		$uid = $this->data['id'];
		// pr($uid);
		$ctime =  date('H:i:s');
		$mealtime = $this->Dietmodel->get_mealtime_user($uid);
		// pr($mealtime,'initial');
		$mealtime = $mealtime[0]; 
		
		$this->data['morningtime'] =date('h:i A',strtotime($mealtime['wakeup_time']));
		$this->data['breakfasttime'] =date('h:i A',strtotime($mealtime['breakfast_time']));

		$this->data['midmealtime'] =date('h:i A',strtotime($mealtime['midmeal_time']));
 

		// $this->data['midmealtime'] =date('h:i A',strtotime($mealtime['breakfast_time'])+7200);
		// $val = ['midmeal_time' => date('H:i:s',strtotime($mealtime['breakfast_time'])+7200) ];
		// $pos=2;
		// $mealtime = array_merge(array_slice($mealtime, 0, $pos), $val, array_slice($mealtime, $pos));

		$this->data['lunchtime'] =date('h:i A',strtotime($mealtime['lunch_time']));

		$this->data['eveningtime'] =date('h:i A',strtotime($mealtime['evening_time']));

		// $this->data['eveningtime'] =date('h:i A',strtotime($mealtime['lunch_time'])+10800);
		// $val2 = ['evening_time' => date('H:i:s',strtotime($mealtime['lunch_time'])+10800)];
		// $pos=4;
		// $mealtime = array_merge(array_slice($mealtime, 0, $pos), $val2, array_slice($mealtime, $pos));

		$this->data['dinnertime'] =date('h:i A',strtotime($mealtime['dinner_time']));
		$this->data['bedtime'] =date('h:i A',strtotime($mealtime['sleep_time']));
	 
		$nextmealcount = 0;
		$remglass = 5;
		foreach($mealtime as $i=>$mtime){
			if($mtime > $ctime){
				  // echo $i."<<>>";
				  // echo $mtime."<br>";
					if($nextmealcount == 0){
						$this->data['nextmeal'] = $i;
						$nextmealcount++;
					}
					

			}else{
				// echo "these already passed $i <br>";
	 

				switch ($i){
					case "wakeup_time":
						$remglass = '4 Glasses';
						break;
					case "breakfast_time":
						$remglass = '4 Glasses';
						break;
					case "midmeal_time":
						$remglass = '3 Glasses';
						break;
					case "lunch_time":
						$remglass = '2 Glasses';
						break;
					case "evening_time":
						$remglass = '1 Glass';
						break;
					case "dinner_time":
						$remglass = '1 Glass';
						break;
					case "sleep_time":
						$remglass = 0;
						break;
				}

			}

		}
		$this->data['rem_glass'] = $remglass;
		// pr($remglass);
		// pr($this->data['nextmeal']);
		// prd($mealtime);
		// prd('------------------------');
	}

	private function dietprogress(){
		$id = $this->data['id'];
		$resp1 = $this->Custommodel->Select_col_where('customers_info','meal_chart_id','id',$id);
		$chartid= $resp1[0]['meal_chart_id'];
		// pr($resp1);
		$resp2 = $this->um->get_dietprogress($id,$chartid);
		if($resp2['completed']==0 ||  $resp2['total']== 0 ):
			return 0;
		else:
		$dietprog = ($resp2['completed'] / $resp2['total']) * 100;
		return  number_format($dietprog, 0);
		endif;
	}
	private function totalincloss(){
		$resp =  $this->Custommodel->Select_common_where('history_measurement','cust_id',$this->data['id']);
		$iarr = reset($resp);
		$larr = end($resp);
		$initialinch = $iarr['totinch'];	
		$lastinch = $larr['totinch'];
		return	$totalinchloss = 	$initialinch - 	$lastinch;
	}

	private function totalweightloss(){
		$resp =  $this->Custommodel->Select_common_where('history_user_weight','cust_id',$this->data['id']);
		$iarr = reset($resp);
		$larr = end($resp);
		$initialweight = $iarr['weight'];	
		$lastweight = $larr['weight'];
		return	$totalweightloss = 	$initialweight - 	$lastweight;
	}


	// other pages ===========================================================================================
 
	//==========
	public function renew(){
		// choose plan
		$_SESSION['renew']  = 1;
 
		pr($_SESSION);
		$this->data['resp'] = 'data';
		$this->load->view('User/renew.php',$this->data);
	}

	public function payment_mode(){
		//  pr($_SESSION); // test
		//  pr($_POST); // test
		$data['amount'] = $_POST['amount'];
		$this->load->view('Stepper/payment_mode.php',$data);
	}

	//==============
  public function meal_plan(){
		$this->data['pagename']= 'Meal Plan';
		$uid = $this->data['id'];
 
	
		$plan_stat = $this->check_cust_payment_eligiblity($this->data['id']);
		// prd($plan_stat);
		$this->data['plan_stat'] = $plan_stat;
		if($plan_stat == 3 || $plan_stat == 4){
					// calculate meal time as user
					$this->getmealtime();
					// get chart id 
					$chartid =  $this->data['chart_id'];
					// $chart_resp = $this->cmn->custquery0("SELECT char");
					$resp =$this->Dietmodel->final_customer_chart('4',$uid,$chartid); // limit , cust id , chart id 
					$this->data['resp'] = $resp;
		}
		// prd($this->data['id']);
		$this->load->view('User/meal_plan2.php',$this->data);
	}
	


	public function recipe(){
		$this->data['pagename']= 'Recipes';
		//$data['rece'] = $this->Custommodel->get_receipe_data();
		// pr($data['message']);die;
		// $this->load->view('User/recipe.php',$this->data);
		$this->load->view('User/comingsoon.php',$this->data);
	}
	public function recipe_details(){
		$this->load->view('User/recipe_details.php',$this->data);
	}

	//public function recipe_details($id){
		//	$data['receipe']=$this->Custommodel->Select_common_where('food_master','id',$id);
		// pr($data['receipe']);die;
		//	$this->load->view('User/recipe_details.php',$data);
	//}

	public function video(){
		$this->data['pagename']= 'Videos';
		$this->data['id']= $this->data['id'];
		$this->data['list'] = $this->Dietmodel->allVideos();
		// pr($this->data);
		$this->load->view('User/video.php',$this->data);
		// $this->load->view('User/comingsoon.php',$this->data);
	}
	public function profile(){
		$this->data['pagename']= 'Profile';
		$this->data['message']['userdetails'] = $this->Dietmodel->Userdatadetails($this->data['id']);
		// pr($this->data['message']);
		$disease_ids = getdiseaseid($this->data['message']['userdetails']->disease_ids);
		// prd($disease_ids);
		$this->data['disname'] = $this->Custommodel->select_common_wherein_array('disease','id',$disease_ids );
	 
		//$data['message']['cust_info']=$this->Custommodel->Select_common_where('customers_info','id',$data['id']);
		$this->load->view('User/profile.php',$this->data);
	}

	public function saveProfileimage(){
		$image = $_POST['image'];
		$id = $_POST['id'];
 
    $output = explode(";",$image);
    $type = explode("/", $output[0]);
    $string = explode("base64,",$output[1]);
    // print_r($type);
    // print_r($string);
   
    $filename = "$id".".".$type[1];
    $imageDir ="upload/userProfile/";
    $filePath = $imageDir . $filename;
    // echo $filePath;
    $imgdata = base64_decode($string[1]);
		unlink($filePath);
    if(file_put_contents($filePath,$imgdata )){
     

			// update in to db
			$data = ['profileimage'=>$filePath];
			$resp1 = $this->Custommodel->update_common($data,'customers_info','id',$id);
			echo $resp1;
    }else{ echo 0;}
	}

	public function notifications(){
		$this->data['pagename']= 'Notifications';
		$data['id']= $this->data['id'];
		$data['message'] = $this->Dietmodel->Userdatadetails($_SESSION['id']);
		$this->load->view('User/notifications.php',$data);
	}

	public function history(){
		$this->data['pagename']= 'History';
		$data['id']= $this->data['id'];
		// direct calling of query without model ::
		#$data['login_history'] = $this->db->select('*')->where('user_id',$_SESSION['id'])->get('history_user_login')->result();
		$data['transaction_history'] = $this->db->select('*')->where('user_id',$_SESSION['id'])->get('transaction_history')->result();
		$data['order_history'] = $this->db->select('*')->where('user_id',$_SESSION['id'])->get('Plan')->result();

		$data['inch_history'] = $this->db->select('*')->where('cust_id',$_SESSION['id'])->get('history_measurement')->result();
		$data['weight_history'] = $this->db->select('*')->where('cust_id',$_SESSION['id'])->get('history_user_weight')->result();
		$data['chart_pur_history'] = $this->db->select('cch.*,ccp.*')->where('cch.cust_id',$_SESSION['id'])->join('customers_chart_purchase as ccp','cch.meal_chart_id =ccp.chart_id AND cch.cust_id =ccp.user_id','left')->get('customers_chart_history as cch')->result();
		// read lgin history from user json
		// prd($data['chart_pur_history'] );
		$userid = $this->data['id'];
		$jsonString = file_get_contents($this->trackerpath.$userid.'.json');
		$jsonArray = json_decode($jsonString,true);
		$jsonArray = array_reverse(array_slice($jsonArray, -5));
		// prd($jsonArray);
		if(empty($jsonArray)):
			$data['login_history'] = [];
		else:
			$data['login_history'] = $jsonArray;
		endif;
		$this->load->view('User/history.php',$data);
	}
	// function for meal chart download
	public function final_chart_download($chartid){
		$uid = $this->data['id'];
		// $uid = '604';
		// $respdata1 =$this->Dietmodel->Userdatadetails($uid);
		// pr($respdata1);
		$respdata2 =$this->Dietmodel->user_chart_history($uid,$chartid);

		if(empty($respdata2)){ 
			echo "History Not Found - No chart Alloted !  Contact Administrator !"; // set html for this
		}else{
			//
			// pr($respdata2 , 'history table data');

			$meal_chart_id = $respdata2[0]['meal_chart_id'];
			$days = $respdata2[0]['days'];
			// check if already purchased or not ::
			$respdata3 =$this->Dietmodel->user_chart_purchase_data($uid,$meal_chart_id,$days);

			$respdata4 =$this->um->getflags_for_cust();
				$chartpdf_free_flag = $respdata4['chartpdf_free'];
			//   pr($respdata4);
			//  prd($respdata3 , 'chart purchase data');

			if( ( empty($respdata3) || $respdata3[0]['p_status'] == 0 ) && $chartpdf_free_flag == 0 ){ 
				echo "Chart Not Purchased"; //  Set html for this ,
				// redirect to purchase the chart with setting the session // after 10-15 seconds
				// genral setting 
				if($days == 15){$amount = 50; $chart_days= 15;}elseif($days == 30){$amount = 100; $chart_days= 30;} // setting amount

				$time  = time(); // using same time val in diffreent places
				$data['orderid'] = $orderid = $merchant_orderid = "ORDERID_".$time;
				$custId  =  $uid; 
				$company_name = 'DietGhar';
				$company_logo = "https://dietghar.com/diet/dgassets/user/icons/52x52_Logo_1.png";
				$callback ="https://dietghar.com/diet/callback_razorpay_common";
				$desc = $days.'days-Meal Chart Download'; // description
				$notes = [ 
					"address" => '', // mandatory
					"merchant_order_id" => $merchant_orderid, // mandatory 
					"chart_days" => $chart_days,  // extra
					"meal_chart_id" => $meal_chart_id  // extra
				] ; // for razorpay array
				//load razorpay
				$resp_razorpay = $this->load_razorpay_module($custId,$time,$amount,$company_name,$company_logo,$merchant_orderid,$callback,$desc,$notes,'live'); // addd 'test' or blank for test mode
				

			}elseif( $chartpdf_free_flag == 1){
				// generate direct link of the chart //
				echo " pdf available for free";
				$this->meal_chart_pdf_creation($meal_chart_id,$uid);
			}else{
				// generate direct link of the chart //
				echo "User paid for the chart / or available for free";
				$this->meal_chart_pdf_creation($meal_chart_id,$uid);
			}
		}
		// $resp =$this->User_model->final_chart_download_status('4',$uid,$chartid);
		// check if already plan payment for chart done or not // 
	}
	
	private function meal_chart_pdf_creation($chartid,$user_id){
		require_once(APPPATH.'/third_party/snappy/vendor/autoload.php');
		$snappy = new Knp\Snappy\Pdf(APPPATH .'/third_party/snappy/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');
		header('Content-Type: application/pdf');
		echo $snappy->getOutput('https://dietghar.com/diet/UserApi/mealchartdownload/abcd/'.$chartid.'/'.$user_id, array('orientation'=>'Landscape'));
	}

	public function testpdf($chartid = 1662365160 ){
		require_once(APPPATH.'/third_party/snappy/vendor/autoload.php');

		$snappy = new Knp\Snappy\Pdf(APPPATH .'/third_party/snappy/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');

		// $snappy = new Pdf('/usr/local/bin/wkhtmltopdf');

		// or you can do it in two steps
		// $snappy = new Pdf();
		// $snappy->setBinary('/usr/local/bin/wkhtmltopdf');


		header('Content-Type: application/pdf');
		echo $snappy->getOutput('https://dietghar.com/diet/UserApi/mealchartdownload/abcd/'.$chartid, array('orientation'=>'Landscape'));
		 
	}

	/** Measurement View */
	public function male_measurement(){
		$this->data['pagename']= 'Measurements';
		$id = $this->data['id'];
		$this->data['user_details']=$this->Custommodel->Select_common_where('customers_info','id',$id);
		if($this->data['user_details'][0]['gender']==2){
			redirect('User/female_measurement');
			}
			// prd($this->data);
		$this->data['page'] = 'male_measurement';
		$this->load->view('User/male_measurement.php',$this->data);
		#old code
		// pr('check');
		// if($data['user_details'][0]['measurment_done']=='N'){
		// 	$data['page'] = 'male_measurement';
		// 	$this->load->view('User/male_measurement.php',$data);
		// 	//redirect('User/index/paymentSuccessful');
		// }else{
		// 	redirect('User/index');
		// }
		
	}
	public function female_measurement(){
		$this->data['pagename']= 'Measurements';
		$this->data['user_details']=$this->Custommodel->Select_common_where('customers_info','id',$this->data['id']);
    if($this->data['user_details'][0]['gender']==1){
    	redirect('User/male_measurement');
    }
		// prd($this->data);
		$this->data['page'] = 'female_measurement';
		$this->load->view('User/female_measurement.php',$this->data);
			#old code
    	//  if($data['user_details'][0]['measurment_done']=='N'){
			// 	$data['page'] = 'female_measurement';
    	//  	$this->load->view('User/female_measurement.php',$data);
			// 	// redirect('User/index/paymentSuccessful');
    	//  }else{
    	//  	redirect('User/index');
    	//  }
		
	}

	# functions for calculation or update data in db
	public function submitUserWeight(){
		$id = 	$this->data['id'];
		$url  = $this->input->post('url');
		$bburl  = base_url();

		//pr($_POST, $id);
		$history_wieght = array(
			'cust_id' => $id,
			'weight'  => $_POST['weight'],
			'recorded_date'  => date('Y-m-d'),
			'updated_dt' => date('Y-m-d H:i:s')
		);
		$resp1 = $this->Custommodel->update_common($_POST,'customers_info','id',$id);
		$resp2 = $this->Custommodel->insert_common('history_user_weight',$history_wieght);
		if($resp1 >0 && $resp2 > 0){
			echo "<script>alert('Weight successfully updated !!'); window.location.href='".$bburl."User/index';</script>";
		}else{
			echo "<script>alert('Weight updated unsuccesfull !! Error code :'".$resp1.$resp2."'); window.location.href='".$bburl."User/index';</script>";
		}


	}

	public function submitMeasurement(){
		$id = 	$this->data['id'];
		$url  = $this->input->post('url');
		$bburl  = base_url();
		unset($_POST['url']);
		// unset($_POST['datem']);
	
		if($_POST['weight'] && $_POST['neck'] && $_POST['chest'] && $_POST['Waist'] && $_POST['hip'] && $_POST['arm'] && $_POST['thigh'] ){
			$measur = 'Y';
		}else{
			$measur = 'N';			
		}
		$_POST['measurment_done'] = $measur;
		

		$resp1 = $this->Custommodel->update_common($_POST,'customers_info','id',$id);
	
		$measurement_history = array(
		'cust_id' => $id,
		'recorded_date'  => date('Y-m-d'),
		'neck'  => $_POST['neck'],
		'chest'  => $_POST['chest'],
		'waist'  => $_POST['Waist'],
		'hips'  => $_POST['hip'],
		'arm'  => $_POST['arm'],
		'thighs'  => $_POST['thigh'],
		'totinch' => $_POST['neck'] + $_POST['chest'] + $_POST['Waist'] + $_POST['hip'] + $_POST['arm'] + $_POST['thigh'],
		'updated_dt' => date('Y-m-d H:i:s')
		);
		$resp2 = $this->Custommodel->insert_common('history_measurement',$measurement_history);

		$history_wieght = array(
			'cust_id' => $id,
			'weight'  => $_POST['weight'],
			'recorded_date'  => date('Y-m-d'),
			'updated_dt' => date('Y-m-d H:i:s')
		);
		$resp3 = $this->Custommodel->insert_common('history_user_weight',$history_wieght);

 
		if($resp1 > 0 && $resp1 > 0 && $resp1 > 0):
		// sweet aleert  
		echo "<script>console.log('Measurement details successfully updated !!'); 
		window.location.href='".$bburl."User/index';</script>";
		else:
		echo "<script>alert('Measurement details updation unsuccesfull !! Error code :'".$resp1.$resp2.$resp3."); window.location.href='".$bburl."User/index';</script>";
		//redirect('User/index');
		endif;
	}

	public function submit_contact(){
		$data = array(
			'name'  => $_POST['name'],
			'mobile'  => $_POST['phone'],
			'city'  => $_POST['city'],
			'message' => 'From about',
			'created_at'  => date('Y-m-d')
		);
		$this->Custommodel->insert_common('contact',$data);
		redirect('User/about');
	}


	public function getdataforchart($param){
		// authenticate the user:: 

		// api for chart ajax
		if($param == 'wl'){
			// weight loss
			$data1 = $this->Custommodel->Select_common_where('history_user_weight','cust_id',$this->data['id']);
			foreach($data1 as $key => $val){
				$x = $val['recorded_date'];
				$y = $val['weight'];
				$data[] = array('x'=>$x, 'y'=>$y);

			}

		}else if($param == 'il'){
			$data1 = $this->Custommodel->Select_common_where('history_measurement','cust_id',$this->data['id']);
			foreach($data1 as $key => $val){
				$x = $val['recorded_date'];
				$y = $val['totinch'];
				$data[] = array('x'=>$x, 'y'=>$y);

			}
 
		}
		$data = json_encode($data);
		print_r($data);
	}

	public function logout(){
		session_destroy();
		redirect('Stepper/index');
	}
	public function upload_receipt(){
		$this->data['pagename']= 'Upload Reciept';
	  // pr($_SESSION);die;
		$this->load->view('User/upload_receipt.php');
	}
	public function upload_payment_receipt(){
		$id = $_SESSION['id'];
		$url = base_url();
    $image = time().$_FILES['file']['name'];
		$path = $url."offline_payment_receipt/".$image;
		move_uploaded_file($_FILES["file"]["tmp_name"], "./offline_payment_receipt/".$image);
		$upload_data = array(
					'receipt_upload' => $path
						);
		$this->db->where('user_id',$id);
		$this->db->update('Plan',$upload_data);
		redirect('User/index');
         
	}

	# extra functions
	public function chat(){
		// no page
		$this->load->view('User/chat.php');
	}
	
  public function about(){
		// no page found
 
			$this->data['pagename']= 'About';
			$this->load->view('User/comingsoon.php',$this->data);
			
	}
  public function fitness(){
		// no page found
 
			$this->data['pagename']= 'Fitness';
			$this->load->view('User/comingsoon.php',$this->data);
			
	}

	
} // class ends
	