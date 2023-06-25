<?php

function get_seveth_day($f_date,$l_date){
	
	 $Date = $f_date;
	$c_date =  date('Y-m-d', strtotime($Date. ' + 7 days'));
	if($c_date<$l_date){
		echo "<br>=====";
		echo $c_date;
		return $c_date;
	}else{
		$c_d = '';
		return $c_d;
	}
}




function check_add($f_date,$l_date){
	
	$f_date = get_seveth_day($f_date,$l_date);
	if($f_date){
	 $f_date = get_seveth_day($f_date,$l_date);
	check_add($f_date,$l_date);
	}
}

echo "start date===" ; 
echo $f_date = '2020-01-01';
echo "    End date===  " ; 
echo $l_date = '2020-01-25';
echo "<br>";

check_add($f_date,$l_date);

		

