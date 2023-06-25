<?php
include('header.php');
?>
  <!-- page-title -->
        <div class="ttm-page-title-row" style="    background-image: url(<?php echo base_url(); ?>web//images/ttm-pagetitle-bg.jpg);">
            <div class="ttm-page-title-row-bg-layer ttm-bg-layer"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center"> 
                        <div class="title-box ttm-textcolor-white">
                            <div class="page-title-heading ttm-textcolor-white">
                                <h1 class="title">Blog Details</h1>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="<?=base_url('Diet/index')?>"><i class="ti ti-home"></i> Home </a>
                                </span>
                                <span class="ttm-bread-sep"> &nbsp; :&nbsp;: &nbsp; </span>
                                <span><span class="ttm-textcolor-skincolor">Blog Details</span></span>
                            </div>  
                        </div>
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- page-title end-->
 <!--site-main start-->
    <!--site-main start-->
    <div class="site-main">
        <!-- sidebar -->
        <div class="sidebar ttm-sidebar-right ttm-bgcolor-white break-991-colum clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-9 content-area pb-0">
                        <!-- post -->
                         
                        <article class="post ttm-blog-classic box-shadow1">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-post ttm-box-view-top-image">
                                <div class="ttm-post-featured-outer mb-20">
                                    <div class="featured-thumbnail">
                                        <img class="img-fluid" src="<?php echo $blog[0]->image ?>" alt="">
                                    </div>
                                    <div class="ttm-box-post-date" style="    width: 142px;">
                                        <span class="entry-month"><?php echo $blog[0]->date ?></span>
                                       
                                    </div>
                                </div>
                            </div><!-- featured-imagebox end-->
                            <div class="ttm-blog-classic-content single-blog ttm-bgcolor-white">
                                <div class="post-meta above-title pb-13">
                                    <span class="ttm-meta-line byline"><i class="fa fa-user ttm-textcolor-skincolor"></i> Alex</span>
                                    <span class="ttm-meta-line comments-link"><i class="fa fa-comment ttm-textcolor-skincolor"></i> <?php echo $blog[0]->total_comment ?> Comments</span>
                                    <span class="ttm-meta-line byline"><i class="fa fa-thumbs-o-up ttm-textcolor-skincolor"></i> Fitness</span>
                                </div>
                                <div class="separator clearfix">
                                    <div class="sep-line mt_5 mb-30"></div>
                                </div>
                                <p><?php echo $blog[0]->description ?></p>
                                <div class="ttm-blog-classic-box-comment">
                                    <div id="comments" class="comments-area">
                                        <h2 class="comments-title">2 Replies to “7 Simple &amp; Healthy Gluten Free Cookie”</h2>
                                        <div class="comments-body">
                                            <div class="media p-3">
                                                <img src="<?php echo base_url(); ?>web/images/blog/blog-comment-01.jpg" alt="John Doe" class="">
                                                <div class="media-body">
                                                  <h4>Admin</h4>
                                                  <small><i>13 April 2019 at 4:49 am</i></small>
                                                  <p class="pt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                  <div class="reply"><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></div>      
                                                </div>
                                            </div>
                                            <div class="media p-3">
                                                <img src="<?php echo base_url(); ?>web/images/blog/blog-comment-02.jpg" alt="John Doe" class="">
                                                <div class="media-body">
                                                  <h4>Maria</h4>
                                                  <small><i>18 March 2019 at 5:25 pm</i></small>
                                                  <p class="pt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                  <div class="reply"><a rel="nofollow" class="comment-reply-link" href="#">Reply</a></div>      
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-respond">
                                            <h2 class="comment-reply-title">Leave a Reply</h2>
                                            <form action="#" method="post" id="commentform" class="comment-form">
                                                <p class="comment-notes">Your email address will not be published. </p>
                                                <p class="comment-form-comment">
                                                    <textarea id="comment" placeholder="Comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                </p>
                                                <p class="comment-form-author">
                                                    <input id="author" placeholder="Name (required)" name="author" type="text" value="" size="30" aria-required="true">
                                                </p>
                                                <p class="comment-form-email">
                                                    <input id="email" placeholder="Email (required)" name="email" type="text" value="" size="30" aria-required="true">
                                                </p>
                                                <p class="comment-form-url">
                                                    <input id="url" placeholder="Website" name="url" type="text" value="" size="30">
                                                </p>
                                                <p class="comment-form-cookies-consent">
                                                    <input id="comment-cookies-consent" name="comment-cookies-consent" type="checkbox" value="yes">
                                                    <label for="comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                                                </p>
                                                <p class="form-submit">
                                                    <input name="submit" type="submit" id="submit" class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-round ttm-btn-style-fill ttm-btn-bgcolor-skincolor" value="Post Comment">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article><!-- post end -->
                        
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