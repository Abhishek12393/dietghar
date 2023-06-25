<?php include('header.php');?>
 <link rel="stylesheet" href="<?php echo base_url(); ?>user/new_assets/css/about.css" />
 <style type="text/css">
 	button.footer_btn {
    font-weight: 600;
    color: #58508d;
    padding: 7px;
    font-size: 12px;
    border-radius: 4px;
    background-color: #fff;
}
 </style>
<?php include('sidebar.php');?>
<div class="container p-viewport-devices">
        <div class="row">
            <main role="main" class="col-xl-12">
                <div class="row first_con">
                    <div class="text-center">
                        <h1>Meet Sneha Kalra</h1>
                        <p class="mt-3 pl-xl-5 pl-md-5 pr-md-5 pr-sm-5 pl-sm-5 pr-xl-5">
                            Hero can be anyone. Even a man knowing something as simple and reassuring as putting a coat around a young boy shoulders to let him know the world hadn’t ended. You fight like a younger man, there’s nothing held back. It’s admirable, but mistaken. When
                            their enemies were at the gates the Romans would suspend democracy and appoint one man to protect the city. It wasn’t considered an honor, it was a public service.
                        </p>
                        <button class="btn text-white mr-4 first_child">Contact us</button>
                        <button class="btn bg-white second_child">Book a meeting</button>
                    </div>
                </div>
            </main>
            <section class="p-xl-5 p-md-5 p-sm-5">
                <div class="row second_con mt-5">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 h-set" style="align-self: flex-end">
                        <h2 class="mb-xl-4">YOGA Expert</h2>
                        <p class="mt-3">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center" id="for_none">
                        <img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/OBJECTS.svg" class="" alt="" width="500px" height="320px">
                    </div>
                </div>
                <div class="row second_con mt-3">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center" id="for_none">
                        <img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/Exercise.svg" alt="" width="500px" height="320px">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 h-set" style="align-self: flex-end">
                        <h2 class="mb-xl-4 text-right">Diet Plan</h2>
                        <p class="mt-2 text-right">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,
                            you need to be sure there isn't anything embarrassing hidden in the middle of text.
                        </p>
                    </div>
                </div>
                <div class="row second_con mt-3 mb-xl-5">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 h-set" style="align-self: flex-end">
                        <h2 class="mb-xl-4">Nutrition Plan</h2>
                        <p class="mt-4">
                            We believe in losing weight in a healthy way. A balanced diet with 45 minutes of exercise is just the right amount of efforts needed from your side to boost your metabolism. We provide simple yet effective exercise programs that are customized according
                            to your age and body weight. </p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center" id="for_none">
                        <img src="<?php echo base_url(); ?>user/new_assets/img/dashboard/Group 547.svg" alt="" width="500px" height="320px">
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer class="container-fluid mt-xl-5">
        <div class="row" style="height: 342px;">
            <div class="for_none_class col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 text-center m-auto footer_comp d-sm-none" id="d_none">
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 text-center m-auto footer_comp">
                <h3>Contact US</h3>
                <p>
                    Make an appointment and get all details on phone. Get best deals
                </p>

            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 m-auto">
                <form method="post" action="<?=base_url('User/submit_contact')?>">
                    <div class="form-group">
                        <label for="exampleFormControlFile1" class="text-white">Name</label>
                        <input type="text" class="form-control" name="name" required="" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile2" class="text-white">Phone Number</label>
                        <input type="number" class="form-control" name="phone" required="" id="exampleFormControlFile2">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile3" class="text-white">City</label>
                        <input type="text" class="form-control" name="city" required="" id="exampleFormControlFile3">
                    </div>
                    <div class="form-group">
                    	<!-- <input type="submit" class="btn btn-primary footer_btn" value="Submit"> -->
                        <button class="btn btn-primary footer_btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </footer>
<?php include('footer.php')?>