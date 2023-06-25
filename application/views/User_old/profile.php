<?php 
include('header.php');
echo "<style type='text/css'>.wrapper .sidebar ul li:nth-child(5) {border-right: 5px solid #667acd !important;border-radius: 5px;}</style>";
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/profile.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/fontall.min.css" />
<?php include('sidebar.php');?>
   <div class="container-fluid pt-0 p-viewport-devices" id="profile">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 col-xl-3 mt-lg-5 mb-5">
                <div class="card p-3 mt-lg-3">
                    <div class="row">
                        <div class="col-5 col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-12" id="badge_container">
                            <span class="badge">PRO</span>
                            <img class="card-img-top p-2 custom_height" src="<?php echo base_url(); ?>user/new_assets/img/profile/man.png" alt="Card image cap">
                            <button class="attach" style="float: right;">

                
                <div class="image-upload" style="margin-top: -40px;position: relative;">
    <label for="file-input" style="margin-bottom: 0px;">
        <i class="fa fa-edit"></i>
    </label>

    <input id="file-input" type="file" accept="image/x-png,image/gif,image/jpeg"/>
</div>
            </button>
                        </div>
                        <div class="col-7 col-xs-6 col-sm-6 col-md-8 col-lg-8 col-xl-12">
                            <div class="card-body p-0">
                                <h5 class="card-title"><?=$message->first_name." ".$message->last_name;?></h5>
                                <div class="row pb-2">
                                    <div class="col-6 col-lg-6 text-center" style="border-right: 2px solid #58508d;">
                                        <h6>Delhi</h6>
                                        <p><?=$message->city;?></p>
                                    </div>
                                    <div class="col-6 col-lg-6 text-center">
                                    <?php
                                    $from = new DateTime($message->dob);
                                    $to   = new DateTime('today');
                                    $age= $from->diff($to)->y;
                                     ?>
                                        <h6><?=$age?></h6>
                                        <p>Age</p>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12 text-center d-flex d-inline" style="align-items: baseline;">
                                                <span style="margin: auto; display: flex;">
                                                    <img src="<?php echo base_url(); ?>user/new_assets/img/profile/twitter.svg" width="15px" height="15px">&nbsp;
                                                    <p>twitter.com/johndoe</p>
                                                </span>

                                            </div>
                                            <div class="col-lg-12 text-center d-flex d-inline" style="align-items: baseline;">
                                                <span style="margin: auto; display: flex;">
                                                    <img src="<?php echo base_url(); ?>user/new_assets/img/profile/facebook.svg" width="15px" height="15px">&nbsp;
                                                <p>facebook.com/johndoe123</p>
                                                </span>

                                            </div>
                                            <div class="col-lg-12 text-center d-flex d-inline" style="align-items: baseline;">
                                                <span style="margin: auto; display: flex;">
                                                    <img src="<?php echo base_url(); ?>user/new_assets/img/profile/insta.svg" width="15px" height="15px">&nbsp;
                                                <p>instagram.com/john_doe</p>
                                                </span>

                                            </div>
                                            <!-- <div class="col-lg-10 pl-0">
                                                <p style="font-size: 15px;">twitter.com/johndoe</p>
                                            </div> -->
                                        </div>
                                        <!-- <img src="assets/img/profile/facebook.svg" width="20px" height="20px">
                                        <img src="assets/img/profile/insta.svg" width="20px" height="20px"> -->
                                    </div>
                                </div>
                                <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12 col-xl-9">
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <a class="nav-item text-dark nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personal</a>
                        <a class="nav-item text-dark nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Medical</a>
                        <a class="nav-item text-dark nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Lifestyle</a>
                    </div>
                </nav>
                <form class="tab-content" id="nav-tabContent">
                    <div class="tab-pane active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container-fluid p-0" style="background-image: url('<?php echo base_url(); ?>user/new_assets/img/profile/bg-poster.png');">
                            <div class="row">
                                <div class="col-4 col-md-4 col-sm-4 text-right m-auto">
                                    <img src="<?php echo base_url(); ?>user/new_assets/img/profile/profile_poster_pen.svg" width="80px" height="80px" alt="">
                                </div>
                                <div class="col-8 col-md-8 col-sm-8 text-left sectionPadding">
                                    <h2>Personal Information</h2>
                                    <p>Lorem Ipsum is simply dummy text of printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <span id="personal_tab" class="mt-5">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <!-- <label id="custom_border_text">First Name</label> -->
                                        <input type="text" class="form-control" value="<?=$message->first_name?>" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" value="<?=$message->last_name?>" placeholder="Doe">
                                    </div>
                                </div>
                                <div class="form-group mt-lg-3">
                                    <input type="email" class="form-control" value="<?=$message->email?>" placeholder="JohnDoe@gmail.com">
                                </div>
                                <div class="form-row mt-lg-4">
                                    <div class="form-group col-md-6">
                                        <!-- <label for="inputEmail4">Email</label> -->
                                        <input type="number" class="form-control" value="<?=$message->mobile_no?>" placeholder="+91 9999998767">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="date" class="form-control" value="<?=$message->dob?>" placeholder="31/08/1989">
                                    </div>
                                </div>
                                <div class="form-group mt-lg-3">
                                    <input type="text" class="form-control" value="<?=$message->house_no.','.$message->address.','.$message->city.','.$message->state?>"  placeholder="House no., Street, Colony, District">
                                </div>
                                <div class="form-row mt-lg-5">
                                    <div class="form-group mt-lg-3 pr-3">
                                        <button type="button" class="btn gender_btn btn-lg" id="genderOne"><i class="fas fa-venus"></i></button>
                                    </div>
                                    <div class="form-group mt-lg-3">
                                        <button type="button" class="btn gender_btn-2 btn-lg " id="genderTwo"><i class="fas fa-mars"></i></button>
                                    </div>
                                </div>

                            </span>
                            <div class="container-fluid pl-0">
                                <!-- <img src="assets/img/profile/female.svg" alt="" width="100px" height="100px">
                                <img src="assets/img/profile/male.svg" alt="" width="100px" height="100px"> -->
                                <br>
                                <p>Make sure all the data you are entering are correct. <br/> You can change the data later also. Some of the features are only available in premium plan. <br/> Upgrade now to enjoy the benefite. <a href="#" style="text-decoration: underline;">CLICK HERE</a>
                                </p>
                                <div class="row">
                                    <div class="col-lg-7"></div>
                                    <div class="col-lg-5">
                                        <button class="btn text-white mr-2 profile_save_btn" style="background: #BC5090">Save</button>
                                        <button class="btn bg-white ml-2 text-dark profile_cancel_btn">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="container-fluid p-0" style="background-image: url('<?php echo base_url(); ?>user/new_assets/img/profile/bg-poster.png');">
                            <div class="row">
                                <div class="col-4 col-md-4 col-sm-4 text-right m-auto">
                                    <img src="<?php echo base_url(); ?>user/new_assets/img/profile/profile_poster_pen.svg" width="80px" height="80px" alt="">
                                </div>
                                <div class="col-8 col-md-8 col-sm-8 text-left sectionPadding">
                                    <h2>Medical Information</h2>
                                    <p>Lorem Ipsum is simply dummy text of printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid mt-4" id="defination_s">
                            <div class="row">
                                <div class="col-md-6" id="btns-1">
                                    <h5 class="mb-4">Do you have Thyroid?</h5>
                                    <button class="btn text-white mr-4 mr-md-0 profile_page" id="thyroid_yes">Yes</button>
                                    <button class="btn bg-white ml-4 profile_page_second" id="thyroid_no">No</button>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="mb-4">Do you have Blood Pressure problems?</h5>
                                    <button class="btn text-white mr-4 mr-md-0 profile_page" id="thyroid-2_yes">Yes</button>
                                    <button class="btn bg-white ml-4 profile_page_second" id="thyroid-2_no">No</button>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <h5 class="mb-4">Do you have Heart aliment?</h5>
                                    <button class="btn text-white mr-4 mr-md-0 profile_page" id="thyroid-3_yes">Yes</button>
                                    <button class="btn bg-white ml-4 profile_page_second" id="thyroid-3_no">No</button>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="mb-4">Do you have Heart Diabetes?</h5>
                                    <button class="btn text-white mr-4 mr-md-0 profile_page" id="thyroid-4_yes">Yes</button>
                                    <button class="btn bg-white ml-4 profile_page_second" id="thyroid-4_no">No</button>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6" id="pages_btn">
                                    <h5 class="mb-4">Outing per week</h5>
                                    <button class="btn mr-2 mr-md-2 week_btn active" id="weekOne">1</button>
                                    <button class="btn mr-2 mr-md-2 week_btn-2 " id="weekTwo">2</button>
                                    <button class="btn mr-2 mr-md-2 week_btn-3 " id="weekThree">3</button>
                                    <button class="btn mr-2 mr-md-2 week_btn-4 " id="weekFour">4</button>
                                    <button class="btn mr-2 mr-md-2 week_btn-5 " id="weekFive">5</button>
                                    <!-- <button class="btn bg-white ml-4 profile_page_second">No</button> -->
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-6" id="rounded_btn">

                                </div>
                                <div class="col-md-6">
                                    <button class="btn text-white mr-4 profile_save_btn" style="background: #BC5090">Save</button>
                                    <button class="btn bg-white ml-2 profile_cancel_btn text-dark">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="container-fluid p-0" style="background-image: url('<?php echo base_url(); ?>user/new_assets/img/profile/bg-poster.png');">
                            <div class="row">
                                <div class="col-4 col-md-4 col-sm-4 text-right m-auto">
                                    <img src="<?php echo base_url(); ?>user/new_assets/img/profile/profile_poster_pen.svg" width="80px" height="80px" alt="">
                                </div>
                                <div class="col-8 col-md-8 col-sm-8 text-left sectionPadding">
                                    <h2>Lifestyle Information</h2>
                                    <p>Lorem Ipsum is simply dummy text of printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <span id="lifestyle_tab" class="mt-5">
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label id="custom_border_text_lifestyle">Lifestyle Selection</label>
                                        <input type="text" class="form-control" placeholder="Active">
                                    </div>
                                    <div class="form-group col-md-5 offset-lg-2">
                                        <input type="text" class="form-control" placeholder="At Home">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <input type="text" class="form-control" placeholder="08:00 AM">
                                    </div>
                                    <div class="form-group col-md-5 offset-lg-2">
                                        <input type="text" class="form-control" placeholder="09:00 AM">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <input type="text" class="form-control" placeholder="01:00 PM">
                                    </div>
                                    <div class="form-group col-md-5 offset-lg-2">
                                        <input type="text" class="form-control" placeholder="09:00 PM">
                                    </div>
                                </div>
                                <div class="form-group mt-lg-3 P-5">
                                    <input type="text" class="form-control shots" placeholder="11:00 PM">
                                </div>
                            </span>
                            <div class="container-fluid pl-0">
                                <p>Make sure all the data you are entering are correct. <br/> You can change the data later also. Some of the features are only available in premium plan. <br/> Upgrade now to enjoy the benefite. <a href="#" style="text-decoration: underline;">CLICK HERE</a>
                                </p>
                                <div class="row">
                                    <div class="col-lg-7"></div>
                                    <div class="col-lg-5">
                                        <button class="btn text-white mr-2 profile_save_btn" style="background: #BC5090">Save</button>
                                        <button class="btn bg-white ml-2 profile_cancel_btn text-dark">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php include('footer.php')?>
<script type="text/javascript">
            // Get all buttons with class="btn" inside the container
        let btn_1 = document.getElementById("thyroid_yes");
        let btn_2 = document.getElementById("thyroid_no");
        let btn_3 = document.getElementById("thyroid-2_yes");
        let btn_4 = document.getElementById("thyroid-2_no");
        let btn_5 = document.getElementById("thyroid-3_yes");
        let btn_6 = document.getElementById("thyroid-3_no");
        let btn_7 = document.getElementById("thyroid-4_yes");
        let btn_8 = document.getElementById("thyroid-4_no");

        let btn_week_1 = document.getElementById("weekOne");
        let btn_week_2 = document.getElementById("weekTwo");
        let btn_week_3 = document.getElementById("weekThree");
        let btn_week_4 = document.getElementById("weekFour");
        let btn_week_5 = document.getElementById("weekFive");

        let gender_1 = document.getElementById("genderOne");
        let gender_2 = document.getElementById("genderTwo");

        // gender listners: 
        gender_1.addEventListener("click", function() {
            $("#genderTwo").removeClass("active-gender");
            $("#genderOne").addClass("active-gender");
        });
        gender_2.addEventListener("click", function() {
            $("#genderOne").removeClass("active-gender");
            $("#genderTwo").addClass("active-gender");
        });


        // Medical Questions 
        btn_2.addEventListener("click", function() {
            $("#thyroid_yes").removeClass("active-1");
            $("#thyroid_no").addClass("active-1");
        });
        btn_1.addEventListener("click", function() {
            $("#thyroid_no").removeClass("active-1");
            $("#thyroid_yes").addClass("active-1");
        });

        btn_4.addEventListener("click", function() {
            $("#thyroid-2_yes").removeClass("active-2");
            $("#thyroid-2_no").addClass("active-2");
        });
        btn_3.addEventListener("click", function() {
            $("#thyroid-2_no").removeClass("active-2");
            $("#thyroid-2_yes").addClass("active-2");
        });

        btn_6.addEventListener("click", function() {
            $("#thyroid-3_yes").removeClass("active-3");
            $("#thyroid-3_no").addClass("active-3");
        });
        btn_5.addEventListener("click", function() {
            $("#thyroid-3_no").removeClass("active-3");
            $("#thyroid-3_yes").addClass("active-3");
        });

        btn_8.addEventListener("click", function() {
            $("#thyroid-4_yes").removeClass("active-4");
            $("#thyroid-4_no").addClass("active-4");
        });
        btn_7.addEventListener("click", function() {
            $("#thyroid-4_no").removeClass("active-4");
            $("#thyroid-4_yes").addClass("active-4");
        });

        // Outing Per week
        btn_week_1.addEventListener("click", function() {
            $(this).addClass("active-w")
            $("#weekTwo").removeClass("active-w");
            $("#weekThree").removeClass("active-w");
            $("#weekFour").removeClass("active-w");
            $("#weekFive").removeClass("active-w");
        })
        btn_week_2.addEventListener("click", function() {
            $(this).addClass("active-w")
            $("#weekOne").removeClass("active-w");
            $("#weekThree").removeClass("active-w");
            $("#weekFour").removeClass("active-w");
            $("#weekFive").removeClass("active-w");
        })
        btn_week_3.addEventListener("click", function() {
            $(this).addClass("active-w")
            $("#weekTwo").removeClass("active-w");
            $("#weekOne").removeClass("active-w");
            $("#weekFour").removeClass("active-w");
            $("#weekFive").removeClass("active-w");
        })
        btn_week_4.addEventListener("click", function() {
            $(this).addClass("active-w")
            $("#weekTwo").removeClass("active-w");
            $("#weekThree").removeClass("active-w");
            $("#weekOne").removeClass("active-w");
            $("#weekFive").removeClass("active-w");
        })
        btn_week_5.addEventListener("click", function() {
            $(this).addClass("active-w")
            $("#weekTwo").removeClass("active-w");
            $("#weekThree").removeClass("active-w");
            $("#weekFour").removeClass("active-w");
            $("#weekOne").removeClass("active-w");
        })

        // $("button").click(function() {
        //     // $("button").removeClass("active");
        //     $(this).addClass("active");
        // });

        // $("#pages_btn button#weekOne").click(function() {
        //     $("#pages_btn button").removeClass("active");
        //     $(this).addClass("active");
        // });

        // $("#defination_s button#thyroid_yes").click(function() {
        //     // $("#pages_btn button").removeClass("active");
        //     $(this).addClass("active");
        // });
        // $("#defination_s button#thyroid-2_yes").click(function() {
        //     // $("#pages_btn button").removeClass("active");
        //     $(this).addClass("active");
        // });
</script>