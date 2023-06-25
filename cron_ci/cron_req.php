<?php

// create curl resource 
$ch = curl_init(); 

// set url 
curl_setopt($ch, CURLOPT_URL, "https://dietghar.in/diet/Test/testcron"); 

//return the transfer as a string 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

// $output contains the output string 
$output = curl_exec($ch); 

// close curl resource to free up system resources 
curl_close($ch);  

		// $jsonString = file_get_contents('public_html/jsonFile.json');
		$jsonString = file_get_contents('public_html/jsonFile.json');
		$data = json_decode($jsonString, true);
		
		if($data){
			$val = $data['val'];
		}else{
			$val = 0;
		}
		$data= array('val'=>$val+1);
		print_r($data);
		$newJsonString = json_encode($data);
		file_put_contents('public_html/jsonFile.json', $newJsonString);
 ?>