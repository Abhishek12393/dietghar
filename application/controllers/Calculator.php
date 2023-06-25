<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculator extends CI_Controller {
	function __construct() {
        parent::__construct();
       // $this->load->model('Organicmodel');
    }

    public function Bmi(){
    	
    	$heightcm = 165; //input
        $heightm = $heightcm/100;
        $weightkg = 11; //input
        return $Bmi = $weightkg / ($heightm * $heightm);

    }

    public function Bmr(){

    	$gender = 'Female'; //input
    	$heightcm = 180; //input
        $heightm = $heightcm/100;
        $weightkg = 72; //input
        $age = 27; //input
        if($gender == 'Male'){
        return  $BMR = 66 + ( 13.7 * $weightkg ) + ( 5 * $heightcm ) - ( 6.8 * $age);
        }elseif($gender == 'Female'){
        return 	$BMR = 655 + ( 9.6 * $weightkg ) + ( 1.8 * $heightcm ) - ( 4.7 * $age );
        }
    }

    public function Whr(){

    	$waistinch = 36.22; //input
        $waist =  round($waistinch/0.39370);

        $hipinch = 44; //input
        $hip =  round($hipinch/0.39370);

        return $WHR = round($waist/$hip,2);
    	

    }
    public function Bfp(){

      $weightkg = 86.01;

      $waistinch = 28;
      $Neckinch = 9;
      $heightinch = 68;   
      $gender = 'Female';
      //female
      $hipinch = 35;
    if($gender == 'Male'){

     echo  $BFP = round(86.01 * (log10($waistinch - $Neckinch)) - 70.041 * (log10($heightinch)) + 36.76,1);
    }
    else{
     echo    $BFP =  round(163.205 * (log10($waistinch + $hipinch - $Neckinch)) - 97.684 * (log10($heightinch)) - 78.387,1);
    }

   
}
public function sms(){

    $mobile_number = 8960866086;
    $rand_num =123456;
    //$test =  send_sms($mobil_num, $rand_num);
    //echo $test;
    $message='test';
    send_sms_forgot_password($mobile_number,$message);
}

public function pincode(){
   $code = 201014; 
   $address =  pincode_address($code);
   $address = json_decode($address);
  // pr($address);die;
   echo $District =  $address->PostOffice[0]->District;
   echo "<br>";
   echo $State    = $address->PostOffice[0]->State;
   echo "<br>";

   echo $Country    = $address->PostOffice[0]->Country;
}

public function test(){
    $this->load->library('mongo_db',array('activate' => 'default'),'mongo_db');
    echo "demo";
}
  public function test1(){
    $this->load->library('mongo_db',array('activate' => 'default'),'mongo_db');
  $a = $this->mongo_db->get('test');
  echo json_encode($a);die;
  echo "<pre>";
print_r($a);
die;
}

public function ftinchestoinches(){

  $ft = 5;
  $inches = 10;
  $inchesval = $ft*12 + $inches;
  echo $inchesval;
}

public function inchestometer(){
    $inches = 4;
    $meter = $inches/39.37;
    echo round($meter,4);
}
public function feetinchestocms(){

$input = $this->input->post('val');
$height_arr =  (explode("'",$input));
$ft = $height_arr[0];
$inchesss = $height_arr[1];
$inches = $ft*12 + $inchesss;
    $cmeter = $inches*2.54;
    echo round($cmeter,4);
}
public function cmtoftinch(){
    $centi = $this->input->post('val');
    $inch =$centi/2.54; 
     $feet = $inch/12;
     $feet =(int)$feet;

   $Inch = $inch - ($feet*12);
   echo $feet."'".$Inch.'"';
}
public function kgtolbs(){
    $kg = $this->input->post('val');
    $lbs = $kg*2.205;
    echo round($lbs,4);
}
public function lbstokg(){
  $lbs = $this->input->post('val');
    $kg = $lbs/2.205;
    echo round($kg,4);
}

public function tdee(){
  $bmr = 1768.8;

  $lifestyle = 'Lightly'; // needs to be dynamic
  if($lifestyle == 'Sedentary'){
    $tdeee = $bmr * 1.2;
  }elseif($lifestyle == 'Lightly'){
     $tdeee = $bmr * 1.375;
  }elseif($lifestyle == 'Moderately'){
     $tdeee = $bmr * 1.55;

  }elseif($lifestyle == 'Veryactive'){
     $tdeee = $bmr * 1.725;

  }

echo $tdeee;
}
}
	