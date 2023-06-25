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
        $data['message'] = $this->Dietmodel->topreview();
        $this->load->view('index.php',$data);
    }
    public function about(){
        $this->load->view('about.php');
    }
    public function faq(){
      $data['faq'] = $this->Dietmodel->allfaqs();
      $this->load->view('faq.php',$data);
    }
  
    public function blog_details($id){
        $table = 'blog';
        $where = 'id';
        $data['blog'] = $this->Dietmodel->select_com_where($table, $where, $id);
        // pr($data);die();   
        $this->load->view('blog_details.php',$data);
    }
    public function contact(){
        $this->load->view('contact.php');
    }
    public function registration(){

        $this->load->view('registration.php');
    }
    public function error(){
        $this->load->view('error.php');
    }
 
 public function checkmobile(){
  
 	$table = 'customers_info';  
 	$where = 'mobile_no';
 	$mobile = $this->input->post('mobile'); 
 	//$opt =  mt_rand(100000,999999);
 	$otp = generate_otp();
 	$details = $this->Custommodel->Select_common_where($table,$where,$mobile);
 	$data = array(
 		'mobile_no' => $mobile,
 		'otp'  => $otp,
        'creation_date' => date('Y-m-d')
        );
 	#sms sending code
    if($mobile != 7503242942 ){
        $smsresp = send_sms_forgot_password($mobile,"Dear Customer, Your OTP for Login is $otp. Regards, DietGhar.com");
    }
                 
 	if(empty($details)){
        $lid = $this->Custommodel->insert_common($table,$data);
        $data1 = array(
        'customer_id' => $lid  );
 		$this->Custommodel->insert_common('customer_address',$data1);

 		$lifestyle = array( 'user_id'  => $lid	);

 		$this->Custommodel->insert_common('customer_lifestyle',$lifestyle);
         echo 1;
 	}else{
          // also here add if login session available no need for otp process
          if($details[0]['lastButtonId'] == 'stepper_final' && isset($_SESSION['id']) && $_SESSION['id'] ==  $details[0]['id']){
            //   echo "session available and all stepper filled ";
            //   print_r($_SESSION);
            //   print_r($details);
              echo 2;
          }else{
              $this->Custommodel->update_common($data,$table,$where,$mobile);  
              echo 1;
         
          }
 	}
     
 }

 public function checkmobile2(){
    // with new condition updated : direct login if meaal chart available
    $table = 'customers_info';  
    $where = 'mobile_no';
    $mobile = $this->input->post('mobile'); 
    //$opt =  mt_rand(100000,999999);
    $otp = generate_otp();
    $details = $this->Custommodel->Select_common_where($table,$where,$mobile);
    $data = array(
        'mobile_no' => $mobile,
        'otp'  => $otp,
       'creation_date' => date('Y-m-d')
       );

    if(empty($details)){
        // when user doesnt exist // new user
       $lid = $this->Custommodel->insert_common($table,$data);
       $data1 = array(
       'customer_id' => $lid  );
        $this->Custommodel->insert_common('customer_address',$data1);

        $lifestyle = array( 'user_id'  => $lid	);

        $this->Custommodel->insert_common('customer_lifestyle',$lifestyle);
        $message =  1;
    }else{
         // also here add if login session available no need for otp process
         if($details[0]['lastButtonId'] == 'stepper_final' && isset($_SESSION['id']) && $_SESSION['id'] ==  $details[0]['id']){
           //   echo "session available and all stepper filled ";
           //   print_r($_SESSION);
           //   print_r($details);
            $message = 2;
         }elseif($details[0]['lastButtonId'] == 'stepper_final' && date("Y-m-d") >= $details[0]['meal_start_date'] && date("Y-m-d") <= $details[0]['meal_end_date'] &&  $details[0]['meal_chart_id'] != 0){
            // this will drect login in case meal chart prepared and activated
            
            $_SESSION['id'] = $details[0]['id'];
            $_SESSION['first_name'] = $details[0]['first_name'];
            $_SESSION['last_name'] = $details[0]['last_name'];
            $message = 3;
         }else{
             $this->Custommodel->update_common($data,$table,$where,$mobile);  
             $message = 1;
         }
    }
 
   
    if($mobile != 7503242942 ){
            #sms sending code
        if( $message ==1 ){
            $smsresp = send_sms_forgot_password($mobile,"Dear Customer, Your OTP for Login is $otp. Regards, DietGhar.com");
        }
    }

    echo $message;
    
}
// user session creating here
public function checkotp(){
    date_default_timezone_set("Asia/Calcutta"); 
 	$mobile = $this->input->post('mobile'); 
 	$otp = $this->input->post('otp').$this->input->post('otp1').$this->input->post('otp2').$this->input->post('otp3').$this->input->post('otp4').$this->input->post('otp5'); 

 	$details = $this->Dietmodel->checkotp($otp,$mobile);

 	if($details){
        if($details[0]['lastButtonId'] == 'stepper_final'){
            if($details[0]['is_payment_done']==1){
                if($details[0]['measurment_done']== 'Y' ){
                    echo "Paid";
                }else{
                    echo "Paid".$details[0]['gender'];
                }
            }elseif($details[0]['is_offline_done']==1 ){
                echo "offline";
            }elseif($details[0]['lastButtonId']== 'stepper_final' ){ 
                echo 'nonpaid';
            
            } 
        }else{
          echo  $details[0]['lastButtonId'];
          $_SESSION['stepperfill'] = 'yes';
          
        }

        $_SESSION['id'] = $details[0]['id'];
        $_SESSION['first_name'] = $details[0]['first_name'];
        $_SESSION['last_name'] = $details[0]['last_name'];
        $this->db->insert('user_login_history',array('user_id'=>$details[0]['id'],'date' => date('Y-m-d H:i:s') ));
      //  redirect("Stepper/".$details[0]['lastButtonId']);
 	}else{
 		echo "Error";
 	}

 }

 public function logout(){
 	session_destroy();
 	redirect('index');
 }

 //=================================
 public function createDiseaseSess($col,$value){
    // $ids = trim($_SESSION['dis_id'],'+').'+';
    $disid =$this->Custommodel->Select_col_where('customer_lifestyle','disease_ids','user_id',$_SESSION['id']);
     $ids = $disid[0]['disease_ids'];
     $ids = getdiseaseid($ids);
     if($col == 'thyroid'){
         $key1  = array_search("20",$ids);
         if($key1){ unset($ids[$key1]); }
         $key2  = array_search("16",$ids);
         if($key2){ unset($ids[$key2]); }

        if($value == 1){
            array_push($ids,"20");
        }elseif( $value==2){
            array_push($ids,"16");
        }
    }
    if($col == 'diabetes'){
        $key1 = array_search(18,$ids);
        if($key1){unset($ids[$key1]);}

        $key2  = array_search(19,$ids);
        if($key2){ unset($ids[$key2]); }

 
         $key3  = array_search(23,$ids);
         if($key3){ unset($ids[$key3]);}

         $key4  = array_search(24,$ids);
         if($key4){  unset($ids[$key4]);}

        if($value == 1){
        //    $ids .= '18+';
           array_push($ids,"18");
        }elseif($value == 2){
            // $ids .= '19+';
            array_push($ids,"19");
        }elseif($value == 3){
            // $ids .= '23+';
            array_push($ids,"23");
       }else{
            // $ids .= '24+';
            array_push($ids,"24");
        }
    }
     if($col == 'heart_ailment'){
        $key1  = array_search("25",$ids);
         if($key1){ unset($ids[$key1]); }
         if($value == 1){ 
            array_push($ids,"25");
        } 
     }
     if($col == 'bp'){
        $key1  = array_search("22",$ids);
        if($key1){ unset($ids[$key1]); }
        if($value == 1){
            array_push($ids,"22");
       } 
    }
    if($col == 'pcos'){
        $key1  = array_search("21",$ids);
         if($key1){ unset($ids[$key1]); }
        if($value == 1){
            array_push($ids,"21");
       } 
    }
     $ids  = '+'.implode('+',$ids).'+';
     $data = ['disease_ids'=> $ids];
    //  Now update in database
    $resp = $this->Custommodel->update_common($data,'customer_lifestyle','user_id',$_SESSION['id']);

 }
 public function Update(){
    $id = $_SESSION['id'];
    if($this->input->post('column')=='weight'){

     $measur_history = array(
        'weight' => $this->input->post('value'),
        'cust_id'  => $id,
        'c_date'    => date('Y-m-d')
                            );
    $this->Custommodel->insert_common('measurement_history',$measur_history);

    }
 	$data = array(
 		$this->input->post('column') => $this->input->post('value'),
        'lastButtonId'   => $this->input->post('button')
 				);
 	$table =  $this->input->post('table');
 	$where = $this->input->post('where');
 	
 	$this->Custommodel->update_common($data,$table,$where,$id);

    $this->createDiseaseSess($this->input->post('column'),$this->input->post('value'));
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
    $data1 = array( 'lastButtonId'   => $this->input->post('button') );
     $this->Custommodel->update_common($data1,'customers_info','id',$id);

     $this->createDiseaseSess($this->input->post('column'),$this->input->post('value'));
    if($this->input->post('button') == 'stepper_final'){
        // call curl for sending hello message
        $this->sendInitialMessage($id);
    }
     
 }
 public function sendInitialMessage($id){
 
    $table = 'customers_info';
    $where = 'id';
    $p = $this->Custommodel->Select_common_where($table,$where,$id);
 
    $mobile= $p[0]['mobile_no'];
    $height=$p[0]['height'];
    $weight=$p[0]['weight'];
    $name=$p[0]['first_name'].''.$p[0]['last_name'];

    // calculate bmi
    $height_arr =  (explode("'",$height));
    $ft = $height_arr[0];
    $inches = $height_arr[1];
    $height_inchesval = $ft*12 + $inches;
    $heightm = round($height_inchesval*2.54/100,4);
    $bmi = $weight / ($heightm * $heightm);
    // echo $bmi;
     // $data = "id=".$id.'&mobile='.$mobile.'&bmi='.$bmi.'&name='.$name;
    $data =  array(
        'id'=> $id,
        'mobile'=> $mobile,
        'bmi'=> $bmi,
        'name'=> $name,
    );
    $url = "https://dietghar.com/chat/welcome/sendonemessage";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);                               
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
    $resp = curl_exec($ch);
    if(curl_errno($ch))
    { echo 'Curl error: ' . curl_error($ch);
    }
    curl_close($ch);
	//$resp = json_decode($resp);
    print_r($resp);
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

public function getBmidata(){
    $table = 'customers_info';
    $where = 'id';
    $id = $this->input->post('id'); 
    $details = $this->Custommodel->Select_common_where($table,$where,$id);
    echo $details[0]['bmi_value'];
}

public function getBmrData(){
    $table = 'customers_info';
    $where = 'id';
    $id = $this->input->post('id'); 
    $details = $this->Custommodel->Select_common_where($table,$where,$id);
    echo $details[0]['bmr'];
}
public function getWhrData(){
    $table = 'customers_info';
    $where = 'id';
    $id = $this->input->post('id'); 
    $details = $this->Custommodel->Select_common_where($table,$where,$id);
    echo $details[0]['whr'];
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


// public function test(){

//     $data = array(
//         'username' => 'admin',
//         'password' => '123456'
//                 );
//     $res = Admin_login_api($data);
//     echo $res;
// }
public function test2(){
   $auth =  'i7ivSu6zkkg6DcfS4zoliVnw5XuOVCGrMY4YWcA1v4TfbYkgy56vaCOWqKhLDQ84maIB9VyW4bj';
   $url = 'https://dietsoftware.tk/diet/Api/foodlist';
   $data = array(
    'id' => '97'
                );
  $res =  api_call($url,$auth);
  pr($res);
}

 public function blog(){
    $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "Diet/blog";  // your controller and your method
        $total_row = $this->Dietmodel->record_count_blog();  //get total record of table
      
        $config["total_rows"] = $total_row;
        $config["per_page"] = 1;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';

        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
            $page=$config["per_page"]*($page-1);
        }
        else{
            $page = 0;
        }
        $data["links"] = $this->pagination->create_links();  //$links use at view file
        $data['blog']= $this->Dietmodel->allblog($config["per_page"], $page);
   // $data['blog'] = $this->Dietmodel->allblog();
    $this->load->view('blog.php',$data);
 }
public function success_story(){

    $data['title']= 'Dietghar | Success Stories';
        $data['active_header']= 'success_stories';
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "Diet/success_story";  // your controller and your method
        $total_row = $this->Dietmodel->record_count();  //get total record of table
        $config["total_rows"] = $total_row;
        $config["per_page"] = 20;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';

        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
            $page=$config["per_page"]*($page-1);
        }
        else{
            $page = 0;
        }
        $data["links"] = $this->pagination->create_links();  //$links use at view file
        $data['review']= $this->Dietmodel->getAllData($config["per_page"], $page);
        
    $this->load->view('success_story.php',$data);
}
public function pricing_page(){
    $this->load->view('perfect_plan.php');
}
public function save_contact(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $this->input->post('name');
            $mobile = $this->input->post('mobile');
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            $data = array(
                    'name' => $name,
                    'mobile' => $mobile,
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message,
                );
                $this->db->insert('contact', $data);
                redirect('Diet/contact');
            }
    }
    public function save_appointment(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $this->input->post('name');
            $mobile = $this->input->post('mobile');
            $age = $this->input->post('age');
            $height = $this->input->post('height');
            $weight = $this->input->post('weight');
            $motive = $this->input->post('motive');
            $message = $this->input->post('message');
            $data = array(
                    'name' => $name,
                    'mobile' => $mobile,
                    'age' => $age,
                    'height' => $height,
                    'weight' => $weight,
                    'motive' => $motive,
                    'message' => $message,
                );
                $this->db->insert('appointment', $data);
                $this->session->set_flashdata('message_name2', 'Kindly wait, Our Health Experts will reach to you shortly!');
                redirect('Diet/index');
            }
    }
public function deletecontact($id)
{
    $this->db->where('id', $id);
    $this->db->delete('contact');
    redirect('Admin/contact');
}

public function deleteappointment($id)
{
    $this->db->where('id', $id);
    $this->db->delete('appointment');
    redirect('Admin/appointment');
}
public function checkdob(){
    $birth_date = new DateTime($this->input->post('value'));

    $bdate = $birth_date->format('Y'); // birth year
    $current_date   = new DateTime();
    $cdate = $current_date->format('Y'); // current year
    $ddate = "18";
    $fdate = "70";

    $edate = $cdate - $ddate;
    $qdate = $cdate - $fdate;

    $diff  = $birth_date->diff($current_date);
    // pr($birth_date);
    $agestring = "You are ". $diff->y."  years " . $diff->m . " months " . $diff->d . " days old.";
    // ($bdate <= $edate)
    if (($diff->y <= $fdate ) && ( $diff->y >= $ddate)) {
        echo $agestring;
        //echo "allowed";
    }else {
        
        //echo "<script type='text/javascript'>function call(){alert('Successfully Added!');}</script> <script>call();</script>";
        echo "<script>alert('Sorry, You are  below 18yrs or above 80+ yrs, Please contact us. '); window.location.href='https://dietghar.com/contact';</script>";
        // echo "current year $cdate , $edate , $qdate";
    }

    #echo phpinfo();
}

 public function checkmobileForChat(){

 	$table = 'customers_info';
 	$where = 'mobile_no';
 	$mobile = $this->input->post('mobile'); 
 	//$opt =  mt_rand(100000,999999);
 	$otp = 123456;
 	$details = $this->Custommodel->Select_common_where($table,$where,$mobile);
 	$data = array(
 		'mobile_no' => $mobile,
 				);
 	//sms need to be implemented here

 	if(empty($details)){
        $lid = $this->Custommodel->insert_common($table,$data);
        $data1 = array(
        'customer_id' => $lid,
                );
 		$this->Custommodel->insert_common('customer_address',$data1);

 		$lifestyle = array(
 		'user_id'  => $lid );

 		$this->Custommodel->insert_common('customer_lifestyle',$lifestyle);
 		$json = ['status' =>1,'id' => $lid,'response' => "New user"];
 		$uid = $lid;
       
 	}else{
        $uid = $details[0]['id'];        
 		$this->Custommodel->update_common($data,$table,$where,$mobile);
 		$json = ['status' =>2,'id' => $details[0]['id'],'response' => "old user"]; 		
       
 	}
    $_SESSION['user_id'] = $uid;
    echo json_encode($json);
 }

 public function uploadFiles(){
        $url = base_url();
        $image = time().$_FILES['file']['name'];

        $path = $url."chatInputImages/".$image;

        if(move_uploaded_file($_FILES["file"]["tmp_name"], "./chatInputImages/".$image)){
            $json = ['status' => 1,'path' => $path,'message' => 'Uploaded Successfully'];
        }else{
            $path = '';
            $json = ['status' => 2,'path' => $path,'message' => 'Error in uploading'];

        }

        echo json_encode($json);

 }
}
	