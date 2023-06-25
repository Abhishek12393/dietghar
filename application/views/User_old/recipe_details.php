<?php include('header.php');?>
<?php include('sidebar.php');
$array = explode("\n", $receipe[0]['ingredients']);
$recipe = explode("\n", $receipe[0]['recipe']);
// pr($array);die;
?>

<div class="container p-viewport-devices" id="recipe_container">
<div class="row">
<div class="col-lg-12 text-center">
<img class="recipe-header-img" src="<?php echo base_url(); ?>user/new_assets/img/recipe/recipe.jpg" height="320px" />
</div>
</div>
<div class="row ml-1 mr-1 pl-lg-1 m-0 pl-sm-2 pr-sm-2" id="review_recipe">
<div class="col-sm-3 col-3 col-md-3 col-lg-2 sm_cont first_dev">
<img src="<?php echo base_url(); ?>user/new_assets/img/recipe/heart.svg" /><span>300</span>
</div>
<div class="col-sm-9 col-9 col-md-9 col-lg-10 sm_cont second_dev">
<img class="reviews_img_position" src="<?php echo base_url(); ?>user/new_assets/img/recipe/stars-4.svg" />
<span class="reviews_position">32 Reviews</span>
</div>
</div>
<div class="row">
<div class="col-12 text-center">
<a class="margin-mobile btn btn-primary" href="#menu_sm" id="toggle_sm"><h5>Ingredients</h5></a>
<div class="alert fade show alert_desktop" id="menu_sm" role="alert">
<ul>
<li class="p-0 m-0">
<div class="row">
<!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify mt-1">
                                    <img src="<?php echo base_url(); ?>user/new_assets/img/recipe/1hr.PNG" alt="" />
                                    <p class="custom_para d-inline">Prep time</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 m-0">
                            <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify mt-1">
                                    <img src="<?php echo base_url(); ?>user/new_assets/img/recipe/230ico.PNG" style="margin-left: 4px" alt="" />
                                    <p class="custom_para d-inline">Calories</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 m-0">
                            <div class="row mt-4">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify">
                                    <h3 class="ingre_cl" style="float: left">Ingredients</h3>
                                    <span class="float-right" style="font-size: 14px">Serves &nbsp;
                    <img
                        src="<?php echo base_url(); ?>user/new_assets/img/recipe/minun_sign.PNG"
                        width="13px"
                        height="13px"
                        alt="" />
                    &nbsp;<strong style="vertical-align: middle">1 </strong
                    >&nbsp;<img
                        src="<?php echo base_url(); ?>user/new_assets/img/recipe/plus_sign.PNG"
                        width="15px"
                        height="15px"
                        alt=""
                    /></span>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 m-0">
                            <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.863" height="10.937" viewBox="0 0 10.863 10.937">
                    <ellipse
                        id="Ellipse_46"
                        data-name="Ellipse 46"
                        cx="5.432"
                        cy="5.468"
                        rx="5.432"
                        ry="5.468"
                        fill="#58508d"
                    />
                    </svg>
                                    <p class="custom_para d-inline">
                                        3 tablespoons Oil, soybean, salad or cooking
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 m-0">
                            <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.863" height="10.937" viewBox="0 0 10.863 10.937">
                    <ellipse
                        id="Ellipse_46"
                        data-name="Ellipse 46"
                        cx="5.432"
                        cy="5.468"
                        rx="5.432"
                        ry="5.468"
                        fill="#ffa600"
                    />
                    </svg>

                                    <p class="custom_para d-inline">1½ cups Zucchini, raw</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 m-0">
                            <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.863" height="10.937" viewBox="0 0 10.863 10.937">
                    <ellipse
                        id="Ellipse_46"
                        data-name="Ellipse 46"
                        cx="5.432"
                        cy="5.468"
                        rx="5.432"
                        ry="5.468"
                        fill="#58508d"
                    />
                    </svg>
                                    <p class="custom_para d-inline">1½ cups Mushrooms, raw</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 m-0">
                            <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.863" height="10.937" viewBox="0 0 10.863 10.937">
                    <ellipse
                        id="Ellipse_46"
                        data-name="Ellipse 46"
                        cx="5.432"
                        cy="5.468"
                        rx="5.432"
                        ry="5.468"
                        fill="#ffa600"
                    />
                    </svg>
                                    <p class="custom_para d-inline">¾ cup Onions, raw</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 m-0">
                            <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.863" height="10.937" viewBox="0 0 10.863 10.937">
                    <ellipse
                        id="Ellipse_46"
                        data-name="Ellipse 46"
                        cx="5.432"
                        cy="5.468"
                        rx="5.432"
                        ry="5.468"
                        fill="#ffa600"
                    />
                    </svg>
                                    <p class="custom_para d-inline">1 clove Garlic, raw</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 m-0">
                            <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.863" height="10.937" viewBox="0 0 10.863 10.937">
                    <ellipse
                        id="Ellipse_46"
                        data-name="Ellipse 46"
                        cx="5.432"
                        cy="5.468"
                        rx="5.432"
                        ry="5.468"
                        fill="#58508d"
                    />
                    </svg>
                                    <p class="custom_para d-inline">2 cups cheese, cheddar</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 m-0">
                            <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.863" height="10.937" viewBox="0 0 10.863 10.937">
                    <ellipse
                        id="Ellipse_46"
                        data-name="Ellipse 46"
                        cx="5.432"
                        cy="5.468"
                        rx="5.432"
                        ry="5.468"
                        fill="#ffa600"
                    />
                    </svg>
                                    <p class="custom_para d-inline">1 teaspoon Salt, table</p>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 m-0">
                            <div class="row">
                                <!-- <div class="col-lg-1"></div> -->
                                <div class="col-lg-12 text-justify">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.863" height="10.937" viewBox="0 0 10.863 10.937">
                    <ellipse
                        id="Ellipse_46"
                        data-name="Ellipse 46"
                        cx="5.432"
                        cy="5.468"
                        rx="5.432"
                        ry="5.468"
                        fill="#58508d"
                    />
                    </svg>
                                    <p class="custom_para d-inline">
                                        ¼ teaspoon Spices, pepper, black
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- <span class="close" data-hide="alert">&times;</span> -->
                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position:relative; right: 40%;">
                       
                    </button> -->
                </div>
            </div>
            <a class="btn btn-primary" href="#menu" id="toggle" style="padding: 5px;">
                <h5>Ingredients</h5>
            </a>
            <div class="alert alert-dismissible fade show" id="menu" role="alert">
                <ul>
                    <li class="p-0 m-0">
                        <div class="row">
                            <!-- <div class="col-lg-1"></div> -->
                            <div class="col-lg-12 text-justify mt-1">
                                <img src="<?php echo base_url(); ?>user/new_assets/img/recipe/1hr.PNG" alt="" />
                                <p class="custom_para d-inline">Prep time</p>
                            </div>
                        </div>
                    </li>
                    <li class="p-0 m-0">
                        <div class="row">
                            <!-- <div class="col-lg-1"></div> -->
                            <div class="col-lg-12 text-justify mt-1">
                                <img src="<?php echo base_url(); ?>user/new_assets/img/recipe/230ico.PNG" style="margin-left: 4px" alt="" />
                                <p class="custom_para d-inline">Calories</p>
                            </div>
                        </div>
                    </li>
                    <li class="p-0 m-0">
                        <div class="row mt-4">
                            <!-- <div class="col-lg-1"></div> -->
                            <div class="col-lg-12 text-justify">
                                <h3 class="ingre_cl" style="float: left">Ingredients</h3>
                                <span class="float-right" style="font-size: 14px">Serves &nbsp;
                  <img
                    src="<?php echo base_url(); ?>user/new_assets/img/recipe/minun_sign.PNG"
                    width="13px"
                    height="13px"
                    alt="" />
                  &nbsp;<strong style="vertical-align: middle">1 </strong
                  >&nbsp;<img
                    src="<?php echo base_url(); ?>user/new_assets/img/recipe/plus_sign.PNG"
                    width="15px"
                    height="15px"
                    alt=""
                /></span>
                            </div>
                        </div>
                    </li>
                    <?php $i=1; foreach($array as $ing){ ?>
                    <li class="p-0 m-0">
                        <div class="row">
                            <!-- <div class="col-lg-1"></div> -->
                            <div class="col-lg-12 text-justify">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10.863" height="10.937" viewBox="0 0 10.863 10.937">
                  <ellipse
                    id="Ellipse_<?=$i?>"
                    data-name="Ellipse <?=$i?>"
                    cx="5.432"
                    cy="5.468"
                    rx="5.432"
                    ry="5.468"
                    fill="#58508d"
                  />
                </svg>
                                <p class="custom_para d-inline">
                                    <?=$ing?>
                                </p>
                            </div>
                        </div>
                    </li>
                    <?php $i++; } ?>
                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position:relative; right: 40%;">
                        <span class="close" data-hide="alert">&times;</span>
                    </button> -->
                </ul>
            </div>
        </div>


    </div>
    <div class="container p-viewport-devices" id="lower_recipe" style="margin-top: 30px;">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <h2>Mix the Flour</h2>
                <p>
                    Mix together the flour, salt, sugar and yeast in a large bowl. Make a well in the centre and set aside. With adult supervision, put the milk and butter in a small pan and warm over a low heat until the butter has just melted and the milk is steaming
                </p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <h2>Receipe</h2>
                <?php foreach($recipe as $re){ ?>
                <p>
                <?=$re?>        
                </p>
                <?php } ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <h2>Bake the buns</h2>
                <p>
                    Oil a large baking tray and place the dough on it in rows, leaving a 2cm gap between each piece. Lightly oil a piece of clingfilm and lay it over the buns.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <h2>Mix the Flour</h2>
                <p>
                    Mix together the flour, salt, sugar and yeast in a large bowl. Make a well in the centre and set aside. With adult supervision, put the milk and butter in a small pan and warm over a low heat until the butter has just melted and the milk is steaming
                </p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <h2>Knead the dough</h2>
                <p>
                    Dust a surface with flour and knead the dough for 10 mins. If it’s too sticky, add extra flour, a little at a time (adding up to 50g). When it’s ready, it should feel elastic, smooth and no longer sticky.
                </p>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <h2>Bake the buns</h2>
                <p>
                    Oil a large baking tray and place the dough on it in rows, leaving a 2cm gap between each piece. Lightly oil a piece of clingfilm and lay it over the buns.
                </p>
            </div>
        </div>
    </div>
<?php include('footer.php')?>