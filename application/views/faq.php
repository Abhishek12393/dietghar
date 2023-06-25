<?php
include('header.php');
?>
<style type="text/css">
    .ttm-tabs-style-classic a span {
    margin-left: 0px!important;
}
</style>
<style type="text/css">
        .toggle-content p {
    margin-bottom: 0;
    line-height: 20px !important;
}
    </style>
  <!-- page-title -->
        <div class="ttm-page-title-row" style="background-image: url(<?php echo base_url(); ?>web//images/ttm-pagetitle-bg.jpg);">
            <div class="ttm-page-title-row-bg-layer ttm-bg-layer"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center"> 
                        <div class="title-box ttm-textcolor-white">
                            <div class="page-title-heading ttm-textcolor-white">
                                <h1 class="title">FAQ's</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="<?=base_url('Diet/index')?>"><i class="ti ti-home"></i> Home </a>
                                </span>
                                <span class="ttm-bread-sep"> &nbsp; :&nbsp;: &nbsp; </span>
                                <span><span class="ttm-textcolor-skincolor">FAQ's</span></span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->
   

    <!--site-main start-->
    <div class="site-main">

        <!--faqs-top-section-->
        <section class="ttm-row faqs-top-section clearfix">
            <div class="container">
                <!--row-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- section title -->
                        <div class="section-title text-center mb-10 clearfix">
                            <div class="title-header">
                                <h2 class="title">Get Your Answer Here</h2>
                            </div>
                            <div class="title-desc">Answer it should be</div>
                        </div><!-- section title end -->
                    </div>
                </div><!--row end-->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                       <p class="text-center">If you have any other questions <a href="#" class="ttm-textcolor-skincolor">support@dietghar.com</a></p>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                   <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-12" style="text-align: center;">

             <div class="ttm-tabs ttm-tabs-style-classic ttm-tabs-bgcolor-grey">
                                        <ul class="tabs">
                                            <li class="tab active"><a href="#" onclick="sub()"><span>Diet Related</span></a></li>
                                            <li class="tab"><a href="#" onclick="sub1()"><span>General</span></a></li>
                                            <li class="tab"><a href="#" onclick="sub2()"><span>Payment Related</span></a></li>
                                        </ul>
                                    </div>

          <span class="colap btn btn-success">Collapse All</span> 
        <span class="expand btn btn-success">Expand All</span>
        </div>
    </div>

         <div class="col-md-2"></div>
     </div>
            </div>
        </section>

    </div>
        <!--faqs-top-section end-->
        
                                       
        <!--faqs-top-section-->
        <div id="diet">
        <div class="ttm-row faqs-accordion-section clearfix tabcontent" >
            <div class="container">
                <!--row-->
                <div class="row">
                    <div class="col-md-12">
                     
                        <div class="accordion mb-20">
                            
                                <?php $i=1; foreach ($faq as  $value) {
                                    if($value['cat']==1){
                                ?>
                            <div class="toggle ttm-style-classic ttm-toggle-title-border ">
                                <div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#<?=$value['id']?>"><?=$value['question']?></a></div>
                                <div class="toggle-content">
                                    <p><?=$value['answer']?></p>
                                </div>
                            </div>
                                <?php } }?>
                                
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--faqs-top-section end-->
        <div id="gen">
         <div class="ttm-row faqs-accordion-section clearfix tabcontent" >
            <div class="container">
                <!--row-->
                <div class="row">
                    <div class="col-md-12">
                     
                        <div class="accordion mb-20">
                            
                                <?php $i=1; foreach ($faq as  $value) {
                                    if($value['cat']==2){
                                ?>
                            <div class="toggle ttm-style-classic ttm-toggle-title-border ">
                                <div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#<?=$value['id']?>"><?=$value['question']?></a></div>
                                <div class="toggle-content">
                                    <p><?=$value['answer']?></p>
                                </div>
                            </div>
                                <?php } }?>
                                
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pay">
         <div class="ttm-row faqs-accordion-section clearfix tabcontent" >
            <div class="container">
                <!--row-->
                <div class="row">
                    <div class="col-md-12">
                     
                       <div class="accordion mb-20">
                            
                                <?php $i=1; foreach ($faq as  $value) {
                                    if($value['cat']==3){
                                ?>
                            <div class="toggle ttm-style-classic ttm-toggle-title-border ">
                                <div class="toggle-title"><a data-toggle="collapse" data-parent="#accordion" href="#<?=$value['id']?>"><?=$value['question']?></a></div>
                                <div class="toggle-content">
                                    <p><?=$value['answer']?></p>
                                </div>
                            </div>
                                <?php } }?>
                                
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <section class="ttm-row faqs-cta-section ttm-bgcolor-skincolor clearfix">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="row-title style6 text-center">
                            <a class="ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-border ttm-btn-color-white mb-20" href="#">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!--site-main end-->
<?php
include('footer.php');
?>
<script>
    $(document).ready(function(){
        /*jQuery('.tablinks').click(function(){
            jQuery('.tablinks').removeClass('active');
            jQuery(this).addClass('active');
            var cat_id = jQuery(this).attr('data-catid');
            jQuery('.faqs-contents').hide();
            jQuery('.faq-cat-'+cat_id).show();
        });*/
        
        $('.expand').click(function(){
            $('.ttm-toggle-title-border').addClass('active');

            $('.toggle-content').show();
        });
        $('.colap').click(function(){
            $('.ttm-toggle-title-border').removeClass('active');

            $('.toggle-content').hide();
        });
    });
</script>
<script>
    $(document).ready(function(){
     $('#diet').show();
            $('#gen').hide();
            $('#pay').hide();
});
    function sub() {
      $('#diet').show();
            $('#gen').hide();
            $('#pay').hide();
}
      function sub1() {
      $('#diet').hide();
            $('#gen').show();
            $('#pay').hide();
}
   function sub2() {
      $('#diet').hide();
            $('#gen').hide();
            $('#pay').show();
}
</script>
