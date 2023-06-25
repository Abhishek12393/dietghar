<?php

$plan =  90; // days

$number_of_time_in_a_week = 2;

$food_name = 'Banana';

$food_chart = array();

for($i = 0; $i < $plan; $i++) 
    $food_chart[] = array(
    		'date' => date("Y-m-d", strtotime('+'. $i .' days')),
    		'food' => ''
    			); 

$food_array_week = array_chunk($food_chart,7);

foreach ($food_array_week as $key => $value) {

			foreach ($value as $key1 => $value1) {
				
				//if($key1<$number_of_time_in_a_week)

				$food_array_week[$key][$key1]['food'] =	Adjustarray($food_array_week,$key,$key1,$number_of_time_in_a_week,$food_name);
				// $food_array_week[$key][$key1]['food'] =	$food_name;
			
		}
	
}

echo "<pre>";print_r($food_array_week);die;


function Adjustarray($arr,$main_key,$current_key,$num,$val){

	$flag_val = '';
	
	if($num==1){
		if($current_key == 3){
			$flag_val = $val;
		}		
		
	}
	if($num==2){
		if($current_key == 1 || $current_key == 4){
			$flag_val = $val;
		}		
		
	}
	if($num==3){
		if($current_key == 0 || $current_key == 3 || $current_key == 6){
			$flag_val = $val;
		}		
		
	}
	if($num==4){
		if($current_key == 0 || $current_key == 2 || $current_key == 4 || $current_key == 6){
			$flag_val = $val;
		}		
		
	}
	if($num==7){

		$flag_val = $val;
		
		
	}

	return $flag_val;
}
?>
