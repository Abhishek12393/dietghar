<?php
include('header.php');
?>
    <!-- page-title -->
        <div class="ttm-page-title-row" style="background-image: url(<?php echo base_url(); ?>web//images/ttm-pagetitle-bg.jpg);">
            <div class="ttm-page-title-row-bg-layer ttm-bg-layer"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center"> 
                        <div class="title-box ttm-textcolor-white">
                            <div class="page-title-heading ttm-textcolor-white">
                                <h1 class="title">Contact Us</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="<?=base_url('Diet/index')?>"><i class="ti ti-home"></i> Home </a>
                                </span>
                                <span class="ttm-bread-sep"> &nbsp; :&nbsp;: &nbsp; </span>
                                <span><span class="ttm-textcolor-skincolor">Contact Us</span></span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->


    <!--site-main start-->
    <div class="site-main">

        <!--contact-top-section-->
        <section class="ttm-row contact-top-section ttm-bgcolor-grey clearfix">
            <div class="container">
                <!--row-->
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="featured-icon-box without-icon ttm-bgcolor-skincolor spacing-11">
                                    <div class="featured-title">
                                        <h5 class="mb-15">Quick Contact</h5>
                                    </div>
                                    <ul class="ttm-list ttm-list-style-icon ttm-textcolor-white">
                                        <li><i class="ti ti-mobile"></i><span class="ttm-list-li-content">+05 9875 654 32 <br> 123 456 7890</span></li>
                                        <li><a href="mailto:info@example.com"><i class="ti ti-comment"></i><span class="ttm-list-li-content">info@example.com</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div><!--roe end-->
            </div>
        </section>
        <!--contact-top-section end-->
        <!--contact-form-section-->
        <section class="ttm-row contact-form-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                       
                    </div>
                    <div class="col-md-4">
                        <div class="row  spacing-12 box-shadow1 ttm-bgcolor-white mb-25">
                            <div class="col-md-12">
                                <h4>Send Your Message</h4>
                                <p>Dont hesitate to send messge us, Our team will help you 24/7.</p>
                                <form class="ttm-contactform wrap-form clearfix" method="post" action="<?php echo base_url('Diet/save_contact');?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>
                                                <span class="text-input"><input name="name" type="text" value="" placeholder="Name" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>
                                                <span class="text-input"><input name="mobile" type="text" value="" placeholder="Phone" required="required"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>
                                                <span class="text-input"><input name="email" type="email" value="" placeholder="Email" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>
                                                <span class="text-input"><input name="subject" type="text" value="" placeholder="Subject" required="required"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label>
                                        <span class="text-input"><textarea name="message" rows="5" cols="40" placeholder="Tell us about your business" required="required"></textarea></span>
                                    </label>
                                    <input name="submit" type="submit" id="submit" class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-round  ttm-btn-style-fill ttm-btn-bgcolor-skincolor mb-5" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--contact-form-section end-->

     

    </div><!--site-main end-->
    <?php
    include('footer.php');
    ?>