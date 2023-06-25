<link rel="icon" href="crontab.png">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
<style>
  body{
    /* color: white;
    background: black; */
    font-family: Lato; font-style: normal; font-variant: normal;line-height: 15px;
  }
  
  pre { 
    white-space: pre-wrap;
    /* background:grey;  */
  }
</style>
<?php

// create curl resource 
$ch = curl_init(); 

// set url 
// curl_setopt($ch, CURLOPT_URL, "https://dietghar.in/diet/DBManager/createnewfc/2"); 
curl_setopt($ch, CURLOPT_URL, "https://dietghar.in/diet/cron/updatefinacharttb"); 

//return the transfer as a string 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

// $output contains the output string 
$output = curl_exec($ch); 
echo $output;
// close curl resource to free up system resources 
curl_close($ch);  

 ?>