<?php
//pr($blog);die();
include('header.php');
?>
<style type="text/css">
    .pagination a{
        padding: 10px !important;
    }
    .current{
            background-color: #609930;
    color: #fff !important;
    }
</style>
  <!-- page-title -->
        <div class="ttm-page-title-row" style="    background-image: url(<?php echo base_url(); ?>web//images/ttm-pagetitle-bg.jpg);">
            <div class="ttm-page-title-row-bg-layer ttm-bg-layer"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center"> 
                        <div class="title-box ttm-textcolor-white">
                            <div class="page-title-heading ttm-textcolor-white">
                                <h1 class="title">Blog</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="<?=base_url('Diet/index')?>"><i class="ti ti-home"></i> Home </a>
                                </span>
                                <span class="ttm-bread-sep"> &nbsp; :&nbsp;: &nbsp; </span>
                                <span><span class="ttm-textcolor-skincolor">Blog</span></span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->


        <!--site-main start-->
    <div class="site-main">
        <!-- sidebar -->
        <div class="sidebar ttm-sidebar-right ttm-bgcolor-white break-991-colum clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-9 content-area">
                        <!-- post -->
                          <?php $i=1; foreach ($blog as  $value) {
                                ?>
                        <article class="post ttm-blog-classic">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-post ttm-box-view-top-image box-shadow1">
                                <div class="ttm-post-featured-outer">
                                    <div class="featured-thumbnail">
                                        <img class="img-fluid" src="<?=$value['image']?>" alt="">
                                    </div>
                                    <div class="ttm-box-post-date" style="    width: 142px;">
                                        <span class="entry-month"><?=$value['date']?></span>
                                       
                                    </div>
                                </div>
                                <div class="featured-content featured-content-post">
                                    <div class="post-meta above-title pb-13">
                                        <span class="ttm-meta-line byline"><i class="fa fa-user ttm-textcolor-skincolor"></i> Admin</span>
                                        <span class="ttm-meta-line comments-link"><i class="fa fa-comment ttm-textcolor-skincolor"></i> <?=$value['total_comment']?></span>
                                        <span class="ttm-meta-line byline"><i class="fa fa-thumbs-o-up ttm-textcolor-skincolor"></i> Fitness</span>
                                    </div>
                                    <div class="separator clearfix">
                                        <div class="sep-line mt_5 mb-30"></div>
                                    </div>
                                    <div class="post-title featured-title">
                                        <h5><a href="<?php echo site_url('Diet/blog_details/'.$value['id']);?>" tabindex="-1"><?=$value['title']?></a></h5>
                                    </div>
                                    <div class="featured-desc">
                                        <p><?=$value['description']?></p>
                                    </div>
                                    <a class="ttm-btn ttm-btn-size-sm ttm-btn-color-skincolor btn-inline ttm-btn-underline mb-10" href="<?php echo site_url('Diet/blog_details/'.$value['id']);?>">Read More</a>
                                </div>
                            </div><!-- featured-imagebox end-->
                        </article><!-- post end -->
                         <?php }?>
                     <!--   <div class="ttm-pagination">
                            <span class="page-numbers current">1</span>
                            <a class="page-numbers" href="#">2</a>
                            <a class="next page-numbers" href="#"><i class="ti ti-arrow-right"></i></a>
                        </div> -->
                           <div class="pagination ttm-pagination" >
                                 <?php echo $links; ?>
                            </div>
                    </div>
                    <div class="col-lg-3 widget-area sidebar-right ttm-col-bgcolor-yes ttm-bg ttm-right-span ttm-bgcolor-grey">
                        <div class="ttm-col-wrapper-bg-layer ttm-bg-layer"></div>
                        <aside class="widget widget-text">
                            <div class="ttm-author-widget">
                                <div class="author-widget_img">
                                    <img class="author-img" src="<?php echo base_url(); ?>web/images/author-img.jpg" alt="author image">
                                </div>
                                <h4 class="author-name">John Doe</h4>
                               
                                <span class="about-autograph">
                                    <img class="author-img" src="<?php echo base_url(); ?>web/images/author-sign-skincolor.png" alt="author image">
                                </span>
                            </div>
                        </aside>
                        <aside class="widget widget-search">
                            <form role="search" method="get" class="search-form  box-shadow" action="#">
                                <label>
                                <span class="screen-reader-text">Search for:</span>
                                <i class="fa fa-search"></i>
                                <input type="search" class="input-text" placeholder="Search …" value="" name="s">
                                </label>
                            </form>
                        </aside>
                        <aside class="widget post-widget">
                            <h3 class="widget-title">Latest News</h3>
                            <ul class="widget-post ttm-recent-post-list">
                                <li>
                                    <a href="<?=base_url('Diet/blog_details')?>"><img src="<?php echo base_url(); ?>web/images/blog/post-1.jpg" alt="post-img"></a>
                                    <span class="post-date"><i class="fa fa-calendar"></i>20 April,2018</span>
                                    <a href="<?=base_url('Diet/blog_details')?>" class="clearfix">How Much Do Eat You Really Need Day?</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('Diet/blog_details')?>"><img src="<?php echo base_url(); ?>web/images/blog/post-2.jpg" alt="post-img"></a>
                                    <span class="post-date"><i class="fa fa-calendar"></i>01 August, 2018</span>
                                    <a href="<?=base_url('Diet/blog_details')?>" class="clearfix">7 Simple &amp; Healthy Gluten Free Cookie</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('Diet/blog_details')?>"><img src="<?php echo base_url(); ?>web/images/blog/post-3.jpg" alt="post-img"></a>
                                    <span class="post-date"><i class="fa fa-calendar"></i>13 March, 2018</span>
                                    <a href="<?=base_url('Diet/blog_details')?>" class="clearfix">Tips For Staying Healthy On Vacations</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('Diet/blog_details')?>"><img src="<?php echo base_url(); ?>web/images/blog/post-4.jpg" alt="post-img"></a>
                                    <span class="post-date"><i class="fa fa-calendar"></i>13 March, 2018</span>
                                    <a href="<?=base_url('Diet/blog_details')?>" class="clearfix">5 Ways to Maintain Health Blood Sugar</a>
                                </li>
                            </ul>
                        </aside>
                        <aside class="widget widget-categories">
                            <h3 class="widget-title">Categories</h3>
                            <ul>
                                <li><a href="#">Diet</a><span>1</span></li>
                                <li><a href="#">Fitness</a><span>3</span></li>
                                <li><a href="#">Health</a><span>2</span></li>
                                <li><a href="#">Weight Loss</a><span>2</span></li>
                            </ul>
                        </aside>
                       
                        <aside class="widget tagcloud-widget">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tagcloud">
                                <a href="#" class="tag-cloud-link">Diet</a>
                                <a href="#" class="tag-cloud-link">Fitness</a>
                                <a href="#" class="tag-cloud-link">Green Food</a>
                                <a href="#" class="tag-cloud-link">Health</a>
                                <a href="#" class="tag-cloud-link">Organic</a>
                                
                                <a href="#" class="tag-cloud-link">Suppliment</a>
                                <a href="#" class="tag-cloud-link">Yoga</a>
                            </div>
                        </aside>
                        
                    </div>
                </div><!-- row end -->
            </div>
        </div>
        <!-- sidebar end -->
    </div><!--site-main end-->


      

<?php
include('footer.php');
?>