<?php
include('header.php');
?>
<style >

.list-descripation-pricing-1 {
	line-height: 30px;
}

.pricing-list-frist-1 {
	width: 100%;
	text-align: center;
	display: block;
	box-shadow: 3px 3px 3px #216a177a;
	border-radius: 5px;
    background: #FFF;
}

.name-price {
	display: block;
	margin: 16px 0;
	font-size: 20px;
	color: #206b16;
}

.price-price-title {
	display: block;
	font-size: 60px;
	color: #609930;
	font-weight: bold;
	margin: 40px 0;
}

.price-price-title1 {
	display: block;
	font-size: 60px;
	color: #1f6613;
	font-weight: bold;
	margin: 40px 0;
}

.list-detials-main-section {
	display: block;
	margin: 0 0 50px 0px;
	padding: 0 0 20px 0;
	text-align: left;
}

.list-detials-main-section li {
	padding: 10px;
	border-top: 1px solid #969696;
	text-transform: capitalize;
	font-size: 14px;
	color: #000;
	font-weight: 500;
}

.frist-r {
	border-top: 5px solid #1f6613;
	border-right: 1px solid #1f6613;
    border-left: 1px solid #1f6613;
	border-bottom: 1px solid #1f6613;
	margin: 0 0 0 0;
    height: 100%;
}

.frist-l {
	border-top: 5px solid #609930;
	border-right: 1px solid #609930;
	border-left: 1px solid #609930;
	border-bottom: 1px solid #609930;
	background: #609930;
	color: #FFF !important;
    height: 100%;
}

.frist-l .name-price {
	color: #FFF;
}

.frist-l .date-price {
	color: #FFF;
}

.frist-l .list-detials-main-section li {
	color: #FFF;
	border-color: #FFF;
}

.frist-l .price-price-title {
	color: #FFF;
}

.btn-main-set-price {
	display: block;
	margin: 20px 0 20px 0;
}

.frist-l .main-btn-set1 {
	color: #24681b;
	background: #FFF;
}

.main-btn-set1 {
	padding: 15px 50px;
	border-radius: 35px !important;
	background: #24681b;
	color: #FFF;
}

.main-section-pricing-420 {
	width: 100%;
    display: block;
    background: url("<?php echo base_url(); ?>diet//assets/images/main-back.jpg");
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 40px 0;
}

.will-you-get-title {
	display: block;
	text-align: center;
	margin: 0 0 40px 0;
	font-size: 40px;
}

.main-get-set {
	width: 100%;
	display: block;
	background: #FFF;
	padding: 20px;
	text-align: center;
	height: 100%;
    border-radius: 15px;
    transition: 0.5s;
}

.main-get-set:hover {
	box-shadow: 0 0 16px #01b4bd;
	transition: 0.5s;
}

.img-1-get-42 {
	width: 130px;
	display: block;
	margin: 0 auto 20px;
    border: 2px solid #01b4bd;
    border-radius: 75%;
    padding: 20px;
    overflow: hidden;
}

.img-1-get-42 img {
    width: 100%;
}

.t-title {
	color: #fe8543;
	font-weight: bold;
	line-height: 30px;
}

.main-get-set:hover img {
	transform: scale(1.1);
}

.content-view-set-main {
	display: none;
}

.content-less-set-main {
	display: none;
}

.content-less-set-main2 {
	display: none;
}

.content-view-set-main2 {
	display: none;
}

@media only screen and (max-width: 1200px) {}

@media only screen and (max-width: 992px) {

    .btn-main-set-price {
	display: block;
	margin: 20px 0 20px 0;
}

.main-btn-set1 {
	padding: 10px 30px;
	border-radius: 35px !important;
	background: #24681b;
	color: #FFF;

}

}

@media only screen and (max-width: 768px) {

.main-section-pricing-420 .col-sm-6.col-md-3.col-lg-3.col-xl-3 {
	margin: 20px 0;
}

/* set */

.content-view-set-main {
	background: none;
	display: block;
	text-align: center;
	width: 100%;
	padding: 0px;
	color: #fe8543;
}

.content-less-set-main {
	display: none;
}

.list-detials-main-section {
	display: none;
	transition: 0.5s;
}

.intro1 .list-detials-main-section  {
	display: block;
    transition: 0.5s;
}

.intro1 .content-view-set-main {
	display: none;
}

.intro1 .content-less-set-main {
	display: block;
    transition: 0.5s;
    background: none;
	text-align: center;
	width: 100%;
	padding: 0px;
	color: #fe8543;
}

/* set */

/* set */

.content-view-set-main2 {
	display: block;
    background: none;
	display: block;
	text-align: center;
	width: 100%;
	padding: 0px;
	color: #fe8543;
}

.content-less-set-main2 {
	display: none;
}

.list-detials-main-section {
	display: none;
	transition: 0.5s;
}

.intro2 .list-detials-main-section  {
	display: block;
    transition: 0.5s;
}

.intro2 .content-view-set-main2 {
	display: none;
}

.intro2 .content-less-set-main2 {
	display: block;
    transition: 0.5s;
    background: none;
	text-align: center;
	width: 100%;
	padding: 0px;
	color: #fe8543;
}

/* set */

}

@media only screen and (max-width: 575px) {

.main-section-pricing-420 .col-sm-6.col-md-3.col-lg-3.col-xl-3 {
	margin: 20px 0;
}

.main-btn-set1 {
	padding: 15px 50px;
	border-radius: 35px !important;
	background: #24681b;
	color: #FFF;
}

.btn-main-set-price {
	display: block;
	margin: 20px 0 20px 0;
}

.frist-r {
	border-top: 5px solid #1f6613;
	border-right: 1px solid #1f6613;
	border-left: 1px solid #1f6613;
	border-bottom: 1px solid #1f6613;
	margin: 20px 0 0 0;
	height: 100%;
}

}

@media only screen and (max-width: 375px) {

.main-section-pricing-420 .col-sm-6.col-md-3.col-lg-3.col-xl-3 {
	margin: 20px 0;
}

.main-btn-set1 {
	padding: 15px 50px;
	border-radius: 35px !important;
	background: #24681b;
	color: #FFF;
}

.btn-main-set-price {
	display: block;
	margin: 20px 0 20px 0;
}

.frist-r {
	border-top: 5px solid #1f6613;
	border-right: 1px solid #1f6613;
	border-left: 1px solid #1f6613;
	border-bottom: 1px solid #1f6613;
	margin: 20px 0 0 0;
	height: 100%;
}

}

</style>
 <!--site-main start-->
        <div class="site-main" style="margin: 0; padding: 0;">

            <!-- sample-pricing start --> 
            <section class="clearfix home3-post-section main-section-pricing-420">

                <div class="container">

                    <div class="row mb-4">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h2 class="will-you-get-title"> What Will you Get! </h2>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="main-get-set">
                                <div class="img-1-get-42">
                                    <img src="<?php echo base_url(); ?>diet/assets/images/t-1.svg" alt="">
                                </div>
                                <h5 class="t-title"> Balanced and judicious eating </h5>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="main-get-set">
                                <div class="img-1-get-42">
                                    <img src="<?php echo base_url(); ?>diet/assets/images/t-2.svg" alt="">
                                </div>
                                <h5 class="t-title"> Amenable and Comfy Lifestyle </h5>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="main-get-set">
                                <div class="img-1-get-42">
                                    <img src="<?php echo base_url(); ?>diet/assets/images/t-3.svg" alt="">
                                </div>
                                <h5 class="t-title"> Fit Body Form </h5>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="main-get-set">
                                <div class="img-1-get-42">
                                    <img src="<?php echo base_url(); ?>diet/assets/images/t-4.svg" alt="">
                                </div>
                                <h5 class="t-title"> Adequate Nutrition </h5>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Start Pricing Table Section -->

                <div class="container">

                    <div class="row mt-50 mb-4">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h2 class="will-you-get-title"> Customized Nutritional Plans </h2>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4 pt-5">
                            <div class="section-title text-left clearfix">
                                <div class="title-header">
                                    <h5>Sample Pricing</h5>
                                    <h2 class="title">Choose Your Perfect Plan</h2>
                                </div>
                            </div>
                            <!--./section-title-->

                            <div class="switch6">
                                <label class="switch6-light" onclick="">
                                        <input type="checkbox">
                                        <span>
                                            <span>Yearly</span>
                                            <span>Monthly</span>
                                        </span>
                                        <a class="btn btn-success"></a>
                                </label>
                            </div>
                            <!--./switch6-->
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p>Have a question about plan? <a href="#" class="greenTitle">lets talk</a></p>
                        </div>
                        <!--./col-sm-3-->
                        <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4 set1562">
                            <div class="pricing-list-frist-1 frist-l">                                
                                <div class="set-6547979798798798">
                                    <h4 class="name-price"> Diet Primitive </h4>
                                    <h1 class="price-price-title"> <i class="fa fa-rupee"></i> 1180 </h1>
                                    <h6 class="date-price"> Per 30 Days </h6>
                                    <ul class="list-detials-main-section">
                                        <li> Well Managed 30 Days Meal Planner </li>
                                        <li> Balanced Eating With 3 Main Meals And 2 Mid - Meals Inclusive </li>
                                        <li> Do's And Dont's While Eating Out At A Party Or Vacation </li>
                                        <li> Exercises For Ton-Up </li>
                                        <li> Weekly Call Follow-up </li>
                                        <li> No Detox Diets </li>
                                        <li> Daily E-mail Catch Ups </li>
                                        <li> Weight Loss Up to 4 Kgs* In A Month </li>
                                        <button type="menu" class="content-less-set-main"> <i> - </i>  Less More </button>
                                    </ul>
                                </div>
                                <button type="menu" class="content-view-set-main"> <i class="fa fa-plus"></i> View More </button>
                                
                                <div class="btn-main-set-price">
                                    <button type="submit" class="main-btn-set1"> Purchase </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-xl-4 set156297987987">
                            <div class="pricing-list-frist-1 frist-r">                                
                                <div class="set-6547979798798798">
                                    <h4 class="name-price"> Diet Majestic </h4>
                                    <h1 class="price-price-title1"> <i class="fa fa-rupee"></i> 2950 </h1>
                                    <h6 class="date-price"> Per 70 Days </h6>
                                    <ul class="list-detials-main-section">
                                        <li> 70 Days Descriptive Diet Plan </li>
                                        <li> Balanced Eating With 3 Main Meals and 2 Mid-Meals Inclusive </li>
                                        <li> Do's And Dont's While Eating Out At A Pary or vacation </li>
                                        <li> customized exercises for overall weight and inchloss </li>
                                        <li> weekly call follow-up </li>
                                        <li> 8 detox diets inclusive </li>
                                        <li> daily e-mail catch ups </li>
                                        <li> weekly water reminders </li>
                                        <li> food items that satiate your taste buds </li>
                                        <li> diet tips </li>
                                        <li> detailed on-call discussion </li>
                                        <li> recipes on demands </li>
                                        <li> personalized planner booklet </li>
                                        <li> health and skin care tips </li>
                                        <li> weekly video call on demand </li>
                                        <li> weight loss up to 10 Kgs* in 70 Days </li>
                                        <button type="menu" class="content-less-set-main2"> <i> - </i> Less More </button>
                                    </ul>
                                </div>
                                <button type="menu" class="content-view-set-main2"> <i class="fa fa-plus"></i> View More </button>
                                
                                <div class="btn-main-set-price">
                                    <button type="submit" class="main-btn-set1"> Purchase </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--./row-->

                </div>

                <!-- End Pricing Table Section -->


                <!--./container-->
            </section>
            <!-- sample-pricing end -->
            </div>
<?php
include('footer.php');
?>