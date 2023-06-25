<?php $this->load->view('Stepper/header.php'); ?>
		<style>
.thankyou-wrapper{width:100%;}
.thankyou-wrapper h1{
  font:32px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
}
.thankyou-wrapper p{
  font:16px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
}
.thankyou-wrapper a{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:250px;
  background:#E47425;
 margin:10px auto 0px;
  padding:15px 20px 15px;
  border-bottom:5px solid #F96700;
}
.thankyou-wrapper a:hover{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:250px;
  background:#F96700;
  margin:10px auto 0px;
  padding:15px 20px 15px;
  border-bottom:5px solid #F96700;
}
</style>
<section id="main-sectoin">
<div class="container h-100" id="id2">
<div class="row justify-content-md-center my-auto">
<div class="col col-lg-8">
<div class="section-area">
<div class="thankyou-wrapper">
<h1 class="title-label text-center" style="margin-top:-50px;"> Thank You</h1>
<p><b>We have received your purchase request.</b></p>
<p>We'll be in touch shortly!</p>
<p>Please Note OrderId : <b><?=$orderid; ?></b></p> 
<?php if($process != 'chartPurchase') { ?>
  <p>Please check your email for further instructions on how to complete your account setup.</p>
<?php } ?>
<p>Having trouble? Contact us</p>
<?php if($process != 'chartPurchase') { ?>
  <a href="User/male_measurement">Back to home</a>
  <meta http-equiv="refresh" content="5; url=User/male_measurement">
<?php }else{  echo $meta; } ?>

</div>
</div>
</div>
</div>
</section> 
