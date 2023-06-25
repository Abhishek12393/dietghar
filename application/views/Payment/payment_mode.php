<?php $this->load->view('Payment/header.php'); ?>

<script type="application/javascript"src="<?=$paytm_url?>/merchantpgpui/checkoutjs/merchants/<?=$mid; ?>.js"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<form  method="post" action="<?=base_url('Stepper/check_payment')?>">
<section id="main-sectoin">
    <div class="container h-100" id="id2">
        <div class="row justify-content-md-center my-auto">
            <div class="col col-lg-8">
                <div class="section-area">
                    <h4 class="title-label text-center" style="margin-top:-50px;">Payment modes?* </h4><style>.hiddenradio [type=radio] {position:absolute;opacity:0;width:0;height:0;}.hiddenradio [type=radio] + img {cursor: pointer;}.hiddenradio [type=radio]:checked + img {outline: 1px solid #f00;}</style>
                    <div class="hiddenradio text-center">
                        <div class="row">
                        <!-- <div class="col-lg-12">
                            <h1><b>Payment Not available for a while. Please Try again later! </b></h1>
                        </div> -->
                            <div class="col-lg-6">
                                <a href="#" id="rzp-button4" ><img src="<?php echo base_url(); ?>diet/paymentpage/nb.png" width="250" height="100"></a>
                            </div>
                            <div class="col-lg-6">
                                <a href="#" id="rzp-button3" > <img src="<?php echo base_url(); ?>diet/paymentpage/pp.png" width="250" height="100"></a>
                            </div>  
                            <div class="col-lg-6">
                                <a href="#" id="rzp-button2" > <img src="<?php echo base_url(); ?>diet/paymentpage/upi.png" width="250" height="100"></a>   
                            </div>
                            <div class="col-lg-6">
                                <a href="#" id="rzp-button1" ><img src="<?php echo base_url(); ?>diet/paymentpage/cc.png" width="250" height="100"></a>
                            </div>
                            <div class="col-lg-6">
                                <a href="#" id="paytmWithPaytm"><img src="<?php echo base_url(); ?>diet/paymentpage/pt.png" width="250" height="100"></a>
                            </div>
                            <input type="hidden" name="amount" value="<?=$amount?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>			  
<div class="next-and-back-arrow"><a href="<?=base_url('plan_selection')?>">  <img src="<?php echo base_url(); ?>dgassets/stepper/back-arrow.png"></a>
</div>
<?php $this->load->view('Stepper/footer.php'); ?>
<script type="text/javascript">
    //paytm script
        //here we will pass txn token which you get from initate transaction api, the your orderId and and the amount
        document.getElementById("paytmWithPaytm").addEventListener("click", function () {
            onScriptLoad("<?=$txnToken?>", "<?=$orderid?>", "<?=$amount?>");
        });

        function onScriptLoad(txnToken, orderId, amount) {
            var config = {
                "root": "",
                "flow": "DEFAULT",
                "merchant": {
                    "name": "<?=$comapny_name?>",
                    "logo": "<?=$comapny_logo?>"
                },
                "style": {
                    // "headerBackgroundColor": "#8dd8ff",
                    "headerBackgroundColor": "#2F983A",
                    "headerColor": "#ffffff"
                },
                "data": {
                    "orderId": orderId,
                    "token": txnToken,
                    "tokenType": "TXN_TOKEN",
                    "amount": amount
                },
                "handler": {
                    "notifyMerchant": function (eventName, data) {
                        if (eventName == 'SESSION_EXPIRED') {
                            alert("Your session has expired!!");
                            location.reload();
                        }
                    }
                }
            };

            if (window.Paytm && window.Paytm.CheckoutJS) {
                // initialze configuration using init method
                window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                    console.log('Before JS Checkout invoke');
                    // after successfully update configuration invoke checkoutjs
                    window.Paytm.CheckoutJS.invoke();
                }).catch(function onError(error) {
                    console.log("Error => ", error);
                });
            }
        }
    </script>
    <script>
        //razorpay script
        var options = <?php echo $razor_data?>;
        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function(e){
            rzp1.open();
            e.preventDefault();
        }
        document.getElementById('rzp-button2').onclick = function(e){
            rzp1.open();
            e.preventDefault();
        }
        document.getElementById('rzp-button3').onclick = function(e){
            rzp1.open();
            e.preventDefault();
        }
        document.getElementById('rzp-button4').onclick = function(e){
            rzp1.open();
            e.preventDefault();
        }
    </script>

