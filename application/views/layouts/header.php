<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>:: DIET GHAR ::</title>
    <!-- favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
   
    <link href="<?=base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/css/bootstrap-theme.min.css" rel="stylesheet">
 
    <link href="<?=base_url()?>/assets/css/bootsnav.css" rel="stylesheet">

    <link href="<?=base_url()?>/assets/css/font-awesome.min.css" rel="stylesheet">
   
    <link href="<?=base_url()?>/assets/css/reset.css" rel="stylesheet">
   
<!--     <link href="css/animate.css" rel="stylesheet"> -->
 
    <link href="<?=base_url()?>/assets/css/aos.css" rel="stylesheet">
   
    <link href="<?=base_url()?>/assets/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/owl-carousel/owl.theme.css" rel="stylesheet">
  
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,900" rel="stylesheet">
  
    <script src="<?=base_url()?>/assets/js/modernizr.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.15.35/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/build/css/intlTelInput.css">
    



    <!-- custom style css -->
    <link href="<?=base_url()?>/assets/style.css" rel="stylesheet">
    <!-- responsive css -->
    <link href="<?=base_url()?>/assets/css/responsive.css" rel="stylesheet">
    
    
    <link href="<?=base_url()?>/assets/css/w3.css" rel="stylesheet">
    <style>
    .fishes
    {
        position: relative;
        top: 0;
        left: 0;
        height: 90px;
    }
    .fish
    {
        position: absolute;
        top: -15px;
        left: 4px;
        height: 120px;
    }
    .cap {
     text-transform: capitalize;
    }
    .btn-arrow{
    	    width: 120px;
    margin: 15px 2px;
    padding: 5px;
    height: 40px;
    background-color: #d24667;
    border: none;
    border-radius: 4px;
    color: #fff !important;
    float: right;
    }
    
    </style>

</head>
<body>
<!-- loader area  -->
<div id="loading">
    <img src="<?=base_url()?>/assets/images/footer-logo.png" alt="">
</div>
<!-- loader area  -->
<!-- menu area -->
<section id="menu-area">
    <!-- Start Navigation -->
    <nav class="navbar navbar-default bootsnav navbar-sticky">
        <div class="container">
            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <?php  if(@$_SESSION['id']){ ?>
                <ul>
                    <li>
                        <a href="<?=base_url('logout')?>">
                      <span class="text">Akarshit</span>
                        </a>
                    </li>
                    
                </ul>
            <?php } else{ ?>
                <ul>
                    <li>
                    <a href="#" onclick="return false;" data-toggle="modal" data-target="#sidebar-right" >
                        <span class="text">login/signup</span> <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </a>
                    </li>
                </ul>
            <?php } ?>
            </div>
            <!-- End Atribute Navigation -->
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#"><img src="images/footer-logo.png" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">home</a></li>
                    <li><a href="success-stories.html">success stories</a></li>
                    <li><a href="#">plans &amp; pricing</a></li>
                    <li><a href="#">blog</a></li>
                    <li><a href="#">faq</a></li>
                    <li><a href="#">contact us</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <!-- End Navigation -->
</section>
<script type="text/javascript">
    var baseURL= '<?=base_url()?>';

</script>