<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Form Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/form_helper.html
 */

 

if ( ! function_exists('pr'))
{
	function pr($array,$header='-')
	{
		echo "<br><fieldset><legend>$header</legend><br>";
		echo "<pre style='background:black;color:white;width: fit-content;padding: 0 23px;'>";
		print_r($array);
		echo '</pre>';
		echo "</fieldset><br>";
	}
}

//------------------------------------------------------------------------
function prh($array,$header='')
{
	echo "<br><fieldset><legend>$header</legend><br>";
	echo "<pre style='background:#181818;color:white;padding: 0 23px;'>";
	print_r($array);
	echo '</pre>';
	echo "<br>";
}
function prb($array,$header='')
{
	echo "<br><fieldset><legend>$header</legend><br>";
	echo "<pre style='background:black;color:white;width: fit-content;padding: 0 23px;'>";
	print_r($array);
	echo '</pre>';
	echo "</fieldset></fieldset><br>";
}
if ( ! function_exists('prd'))
{

	function prd($elem,$header='')
	{
		echo "<br><fieldset><legend>$header</legend><br>";
		echo "<pre style='background:black;color:white'>";
		print_r($elem);
		echo '</pre>';
		echo "</fieldset><br>";
		die();
	}
}
if ( ! function_exists('prp'))
{
	function prp($header='POST DATA')
	{
		$CI = &get_instance();
		$array = $CI->input->post();
		echo "<br><fieldset><legend>$header</legend><br>";
		echo "<pre style='background:black;color:white;width: fit-content;padding: 0 23px;'>";
		print_r($array);
		echo '</pre>';
		echo "</fieldset><br>";
	}
}



if ( ! function_exists('is_admin'))
{

	function is_admin()
	{
		$CI= &get_Instance();
		$userinfo=$CI->session->all_userdata();
		if(!isset($userinfo['session_iid']))
		{
			redirect('Admin');
		}
	}
}
if ( ! function_exists('is_protected'))
{
	
	function is_protected()
	{
		$CI= &get_Instance();
		$userinfo=$CI->session->all_userdata();
		if(!isset($userinfo['session_id']))
		{
			redirect('Admin/index');
		}
	}
}


if ( ! function_exists('is_user'))
{

	function is_user()
	{
		$CI= &get_Instance();
		$userinfo=$CI->session->all_userdata();
		if(!isset($userinfo['id']))
		{
			redirect('Stepper/index');
		}
	}
}

//function for getting latlong from address
/*function getLatLong($address){
    if(!empty($address)){
    	$add=$address;
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
        $output = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $data['latitude']  = isset($output->results[0]->geometry->location->lat)?$output->results[0]->geometry->location->lat:''; 
        $data['longitude'] = isset($output->results[0]->geometry->location->lng)?$output->results[0]->geometry->location->lng:'';
        //Return latitude and longitude of the given address
        if( !empty($data['latitude'] && $data['longitude'])){
        	
            return $data;
        }else
        {
			getLatLong($address);   
        }

 }else{
        return false;   
    }
}*/


function send_sms($mobil_num, $rand_num){
	$MobileApiKey ='971f34c0-1a9c-11e7-9462-00163ef91450';
	$api_sms_status = file_get_contents("https://2factor.in/API/V1/".$MobileApiKey."/SMS/+91".$mobil_num."/".$rand_num);
	$sms_status = json_decode($api_sms_status); 
	return $sms_status->Status; 
}


function send_sms_forgot_password($mobile_number,$message){

    $username='dietghar';
    $password='7777519';
    $sender='DIETGR';
    $url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($mobile_number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&&template_id=1207161738045671693";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function generate_otp(){
	// $otp = 123456;
	$otp = random_int(100000, 999999);
	return $otp;
}
function pincode_address($code){
 //	echo $code ;
 	$url="http://www.postalpincode.in/api/pincode/".urlencode($code);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $curl_scraped_page = curl_exec($ch);
    curl_close($ch);
    return $curl_scraped_page;
}
         
//    send_notification($token,$msg);
function send_notification($token,$msg){	
	define( 'API_ACCESS_KEY', 'AAAAwnSTQMQ:APA91bEBP5RdlLqCUC68ZfoJn7ITlkXbILi0FkqspPhyRBmQ4VxZSGXqD1c-gIuUNUGSf0SeBjnPu2INHLpX2jNoPgRfz9wMtuTfj0aK9jh7V0XXS4-6zrXcW8_CcdcFxyjvbT-tbQXq--WLH8i4L_Bs3N-kBCabLw');
      // $type= array(
      // 	'type' => 'offer'
      // 			);
	$fields = array(
				'to'		=> $token,
				'data'  => $msg
			 );
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);	

		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		
		curl_close( $ch );
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function postdata(){
	$jsondata = file_get_contents('php://input');
	$postdata = json_decode($jsondata);
	return $postdata;
}


function api_call($urls,$Auth,$data=false){
	// *call api when its authenticted //
 
	$url = BASE_URL.$urls;
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
	return json_decode($result);

}

function Admin_login_api($data){
 
	$url = BASE_URL.'Adminlogin/AdminLogin';
	$ch = curl_init($url);
 
	$payload = json_encode($data);

	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);


	//attach encoded JSON string to the POST fields
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	//$Auth='sz1NhB2yocUNQHsTFdkex8IZKZIn8LkM2sQq4gxCJtzoaXnrmjh9GFKoLRb9XGmDbHfZ63BuwRR';
	$header  = array(
	    'Content-Type:application/json',
	   // 'Auth:'.$Auth
	);
	//set the content type to application/json
	curl_setopt($ch, CURLOPT_HTTPHEADER,$header );

	//return response instead of outputting
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  
	//execute the POST request
	$result = curl_exec($ch);

	//close cURL resource
	curl_close($ch);
 
 return json_decode($result);
}
// age calculator func from DOB for client or user
function dobToDate($input ,$user = 'user'){
	$birth_date     = new DateTime($input);
	$current_date   = new DateTime();

	$diff           = $birth_date->diff($current_date);
	if ($user == 'user' ){$text = 'You are' ;}else{$text = 'Client is';}
	return  $years     = $text." ".$diff->y . " years " . $diff->m . " months " . $diff->d . " days old..";
}

// can break into years only or years plus month days
function dobsimple($input,$month = 1 , $days = 1){
	$birth_date     = new DateTime($input);
	$current_date   = new DateTime();

	$diff = $birth_date->diff($current_date);
	$string = $diff->y . " Years ";
	$string .= $month == 1 ? $diff->m . " months " : '';
	$string .= $days == 1 ? $diff->d . " days" : '';

	return  $string;
}



function twelve_twentyfour($time){
	$_a = $time;
    $_a = explode(':',$_a);
    $_time = "";                    //initialised the variable.
    if($_a[0] == 12 && $_a[1] <= 59 && strpos($_a[2],"PM") > -1)
    {
        $_rpl = str_replace("PM","",$_a[2]);
        $_time = $_a[0].":".$_a[1].":".$_rpl;
    }
    elseif($_a[0] < 12 && $_a[1] <= 59 && strpos($_a[2],"PM")>-1)
    {
        $_a[0] += 12;
        $_rpl = str_replace("PM","",$_a[2]);
        $_time = $_a[0].":".$_a[1].":".$_rpl;
    }
    elseif($_a[0] == 12 && $_a[1] <= 59 && strpos($_a[2],"AM" ) >-1)
    {
        $_a[0] = 00;
        $_rpl = str_replace("AM","",$_a[2]);
        $_time = $_a[0].":".$_a[1].":".$_rpl;
    }
    elseif($_a[0] < 12 && $_a[1] <= 59 && strpos( $_a[2],"AM")>-1)
    {
        $_rpl = str_replace("AM","",$_a[2]);
        $_time = $_a[0].":".$_a[1].":".$_rpl;
    }
    return $_time;
   
}


// function since($timestamp, $level=6) {
// display "X time" ago, $rcs is precision depth
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}





// helper to decide which table to be used for selection or insertion :: 
function get_table_name($cal){
	// other tables are over 
	$table='';

	if($cal>=600 && $cal<=699){
		$table= 'final_chart_600_699';
	}elseif($cal>=700 && $cal<=799){
		$table= 'final_chart_700_799';
	}elseif($cal>=800 && $cal<=899){
		$table= 'final_chart_800_899';
	}elseif($cal>=900 && $cal<999){
		$table= 'final_chart_900_1000';
	}elseif($cal>=1000 && $cal<1100){
		$table= 'final_chart_1000_1100';
	}elseif($cal>=1100 && $cal<1200){
		$table= 'final_chart_1100_1200';
	}elseif($cal>=1200 && $cal<1300){
		$table= 'final_chart_1200_1300';
	}elseif($cal>=1300 && $cal<1400){
		$table= 'final_chart_1300_1400';
	}elseif($cal>=1400 && $cal<1500){
		$table= 'final_chart_1400_1500';
	}elseif($cal>=1500 && $cal<1600){
		$table= 'final_chart_1500_1600';
	}elseif($cal>=1600 && $cal<1700){
		$table= 'final_chart_1600_1700';
	}elseif($cal>=1700 && $cal<1800){
		$table= 'final_chart_1700_1800';
	}elseif($cal>=1800 && $cal<1900){
		$table= 'final_chart_1800_1900';
	}elseif($cal>=1900 && $cal<2000){
		$table= 'final_chart_1900_2000';
	}elseif($cal>=2000 && $cal<2100){
		$table= 'final_chart_2000_2100';
	}elseif($cal>=2100 && $cal<2200){
		$table= 'final_chart_2100_2200';
	}elseif($cal>=2200 && $cal<2300){
		$table= 'final_chart_2200_2300';
	}elseif($cal>=2300 && $cal<2400){
		$table= 'final_chart_2300_2400';
	}elseif($cal>=2400 && $cal<2500){
		$table= 'final_chart_2400_2500';
	}elseif($cal>=2500 && $cal<2600){
		$table= 'final_chart_2500_2600';
	}elseif($cal>=2600 && $cal<2700){
		$table= 'final_chart_2600_2700';
	}elseif($cal>=2700 && $cal<2800){
		$table= 'final_chart_2700_2800';
	}elseif($cal>=2800 && $cal<2900){
		$table= 'final_chart_2800_2900';
	}elseif($cal>=2900 && $cal<3000){
		$table= 'final_chart_2900_3000';
	}elseif($cal>=3000 && $cal<3100){
		$table= 'final_chart_3000_3100';
	}elseif($cal>=3100 && $cal<3200){
		$table= 'final_chart_3100_3200';
		#above 3200 we have other tables 
	}elseif($cal>=3200 && $cal<3300){
		$table= 'final_chart_1_verified';
	}elseif($cal>=3300 && $cal<3400){
		$table= 'final_chart_1_breakdown';
	}elseif($cal>=3400 && $cal<3500){
		// $table= 'final_chart_1bk_verified';
		$table = 'final_chart_remaining';
	}else{
			$table = 'final_chart_remaining';
	}
	return $table;
}

function getchartname($key){
	$arr_shift = array('morning'=>'morning_no_of_chart',
			'breakfast'=>'breakfast_no_of_chart',
			'midmeal'=>'midmeal_no_of_chart',
			'lunch'=>'lunch_no_of_chart',
			'evening'=>'evening_no_of_chart',
			'dinnner'=>'dinnner_no_of_chart',
			'bedtime'=>'bedtime_no_of_chart'
		);
		return $chartname = $arr_shift[$key];
}

function getdiseaseid($string){
	$disease_ids = explode("+",trim($string ,"+"));
	return $disease_ids;
}

function arr0dlt($arr){
	unset($arr[0]);
	$arr = array_values($arr);
	return $arr;
}
if(! function_exists('adminloadview')){
	function adminloadview($filepath='',$data){
		$CI = &get_instance();
		$CI->load->view('Admin/header.php',$data);
		$CI->load->view('Admin/sidebar.php',$data);
		$CI->load->view('Admin/'.$filepath,$data);
		$CI->load->view('Admin/footer.php',$data);
	}
}