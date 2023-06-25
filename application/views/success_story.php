<?php
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
<style >

.main-success-stories-420 {
    width: 100%;
    display: block;
    background-image: url("<?php echo base_url(); ?>diet/assets/images/success-stories-back.svg");
    background-repeat: repeat;
    background-size: cover;
    padding: 40px 0;
}

.title-success-stories {
    display: block;
    text-align: center;
    padding: 0 0 40px 0;
}

#more {display: none;}
#more1 {display: none;}
#more2 {display: none;}
#more3 {display: none;}

.review-client-succes-stories {
    width: 100%;
    float: left;
    text-align: center;
    padding: 20px 40px;
    margin: 0 0 20px 0;
}

.review-client-succes-stories img {
    width: 120px;
    border-radius: 75%;
    height: 120px;
    margin: 0 auto 20px;
}

#myBtn {
    background: none;
    padding: 0;
    margin: 0;
    border: none;
    color: #000;
    font-size: 16px;
}
#myBtn1 {
    background: none;
    padding: 0;
    margin: 0;
    border: none;
    color: #000;
    font-size: 16px;
}

#myBtn2 {
    background: none;
    padding: 0;
    margin: 0;
    border: none;
    color: #000;
    font-size: 16px;
}

#myBtn3 {
    background: none;
    padding: 0;
    margin: 0;
    border: none;
    color: #000;
    font-size: 16px;
}

.list-descripation-review {
    font-size: 16px;
    margin: 0;
    color: #222;
    text-align: justify;
}

.review-icon-lis {
    font-size: 20px;
    margin: 0 0 10px 0;
    color: #ffa900;
}

.title-lit-review {
    font-size: 22px;
    font-weight: bold;
}

.review-icon-lis i {
    text-shadow: 0 0 5px #ffa900;
}

</style>
<!--site-main start-->
        <div class="site-main" style="margin: 0; padding: 0;">

            <!-- sample-pricing start --> 
            <section class="clearfix home3-post-section main-success-stories-420">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title-success-stories mt-5 mb-5"> DietGhar Reviews </h2>
                        </div>
                    </div>

                    <div class="row">
                        <?php  foreach($review as $detail){ ?>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="review-client-succes-stories">
                                <img src="<?php echo $detail['image']; ?>" alt="">
                                <h5 class="title-lit-review"> <?php echo $detail['name']; ?> </h5>
                                <p class="review-icon-lis"> 
                                   <?php    
                            for($i=1;$i<=5;$i++)
                            {
                              if($i<=$detail['rating'])
                                echo '<i class="fa fa-star" ></i>';
                              else
                                echo '<i class="fa fa-star" ></i>';
                            }
                        ?>
            <!-- 
                        <span class="review-date">  <?php echo date("dS-M-Y", strtotime($detail['review_on'])); ?>                  </span> -->
                                 </p>                                
                                <p class="list-descripation-review"><?php echo $detail['review']; ?></p>
                            </div>
                        </div>
<?php } ?>
                        <!-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="review-client-succes-stories">
                                <img src="<?php echo base_url(); ?>diet/assets/images/2.png" alt="">
                                <h5 class="title-lit-review">  Kaitlyn Kristy </h5>
                                <p class="review-icon-lis"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </p>                                
                                <p class="list-descripation-review">Lorem ipsum dolor sit amet, consectetur 
                                    adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem 
                                    egestas vitae scel erisque enim ligula venenatis dolor. Maecenas nisl est, 
                                    ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue 
                                    ut aliquet. <span id="dots1">...</span><span id="more1">Nunc sagittis 
                                    dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed 
                                    nunc venenatis imperdiet sed ornare turpis. Donec vitae dui eget 
                                    tellus gravida venenatis. Integer fringilla congue eros non fermentum. 
                                    Sed dapibus pulvinar nibh tempor porta.</span> 
                                    <button onclick="myFunction1()" id="myBtn1">Read more</button></p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="review-client-succes-stories">
                                <img src="<?php echo base_url(); ?>diet/assets/images/3.png" alt="">
                                <h5 class="title-lit-review">  Sally Selcen Stochliya </h5>
                                <p class="review-icon-lis"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </p>                                
                                <p class="list-descripation-review">Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem 
                                egestas vitae scel erisque enim ligula venenatis dolor. Maecenas nisl est, 
                                ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut 
                                aliquet. <span id="dots2">...</span><span id="more2">Nunc sagittis dictum nisi, 
                                sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis imperdiet 
                                sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. Integer 
                                fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor
                                porta.</span> 
                                <button onclick="myFunction2()" id="myBtn2">Read more</button></p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="review-client-succes-stories">
                                <img src="<?php echo base_url(); ?>diet/assets/images/4.png" alt="">
                                <h5 class="title-lit-review">  Abigail Akon Obro </h5>
                                <p class="review-icon-lis"> <i class="fa fa-star" ></i> <i class="fa fa-star" ></i> <i class="fa fa-star" ></i> <i class="fa fa-star" ></i> <i class="fa fa-star" ></i> </p>                                
                                <p class="list-descripation-review">Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem 
                                egestas vitae scel erisque enim ligula venenatis dolor. Maecenas nisl est, 
                                ultrices nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue 
                                ut aliquet. <span id="dots3">...</span><span id="more3">Nunc sagittis dictum 
                                nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc venenatis 
                                imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis. 
                                Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor 
                                porta.</span> 
                                <button onclick="myFunction3()" id="myBtn3">Read more</button></p>
                            </div>
                        </div> -->

                    </div>
                        <div class="pagination ttm-pagination">
                            <?php echo $links; ?>
                         </div>
                </div>
            </section> <!--./container-->
         
            <!-- sample-pricing end -->

        </div>
<?php
include('footer.php');
?>

       

<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>

<script>
function myFunction1() {
  var dots1 = document.getElementById("dots1");
  var moreText1 = document.getElementById("more1");
  var btnText1 = document.getElementById("myBtn1");

  if (dots1.style.display === "none") {
    dots1.style.display = "inline";
    btnText1.innerHTML = "Read more"; 
    moreText1.style.display = "none";
  } else {
    dots1.style.display = "none";
    btnText1.innerHTML = "Read less"; 
    moreText1.style.display = "inline";
  }
}
</script>

<script>
    function myFunction2() {
      var dots2 = document.getElementById("dots2");
      var moreText2 = document.getElementById("more2");
      var btnText2 = document.getElementById("myBtn2");
    
      if (dots2.style.display === "none") {
        dots2.style.display = "inline";
        btnText2.innerHTML = "Read more"; 
        moreText2.style.display = "none";
      } else {
        dots2.style.display = "none";
        btnText2.innerHTML = "Read less"; 
        moreText2.style.display = "inline";
      }
    }
</script>

<script>
    function myFunction3() {
      var dots3 = document.getElementById("dots3");
      var moreText3 = document.getElementById("more3");
      var btnText3 = document.getElementById("myBtn3");
    
      if (dots3.style.display === "none") {
        dots3.style.display = "inline";
        btnText3.innerHTML = "Read more"; 
        moreText3.style.display = "none";
      } else {
        dots3.style.display = "none";
        btnText3.innerHTML = "Read less"; 
        moreText3.style.display = "inline";
      }
    }
</script>
