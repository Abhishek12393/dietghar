<?php 
$callback ="https://dietghar.com/diet/payment_callback_paytm";

/* for Staging */
// $url = "https://securegw-stage.paytm.in";
// $website = "WEBSTAGING";
// $mid= "heHnRr06844388079293";
// $mkey ="r6PsA4zxrqFZbuvg";
 #mid=$mid&orderId=$orderid
 #$mid= "CfYSKe34170503159423";
 #$mkey ="9pZGpZV2LQg@ITvN";


/* for Production */

$url = "https://securegw.paytm.in";
#mid=$mid&orderId=$orderid

#// Merchant ID
#// ZeureT71050957203368
$mid= "ZeureT71050957203368";
#// Merchant Key
 $mkey ="yUPo1D99Ro@n3N6a";
#// yUPo1D99Ro@n3N6a
#// Website
$website = "DEFAULT";
  #DEFAULT
  #Industry Type
  #Retail
$it_url = $url."/theia/api/v1/initiateTransaction?";
 ?>