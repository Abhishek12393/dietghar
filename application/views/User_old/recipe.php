<?php 
// pr($results);die;
include('header.php');
?>
<style type='text/css'>.wrapper .sidebar ul li:nth-child(4) {border-right: 5px solid #667acd !important;border-radius: 5px;} .text-right {text-align: right !important;margin-right: 10px;}
.ngh {text-decoration: none !important;text-align: center;}
.search-container {display: flex;justify-content: space-evenly;align-items: center;background: #fff;border-radius: 500px;padding: 10px 25px 10px 25px;border: 1px solid #CCC;}
.fc {display: flex;flex-direction: column;justify-content: center;align-items: center;}
/*img {height: 30px;width: 30px;}*/
.search-bar {padding: 5px;margin-left: 15px;margin-right: 15px;width: 100%;border-radius: 5px;background: transparent;border: 1px solid transparent;outline: none;font-size: 1.2rem;overflow-x: scroll;}
button {background: transparent;border: none;i {font-size: 1.5rem;margin: 3px;} }
button:hover {cursor: pointer;}
.search-container:hover {box-shadow: 0px 1px 4px -1px rgba(79,78,79,1); }
@media only screen and (max-width: 570px) {.search-bar {width: 200px !important;} }
</style>
<?php  include('sidebar.php');?>
<div class="container p-viewport-devices" id="recipe_container">
<div class="row" style="text-align:center; margin-top:30px; margin-bottom:20px;">
<div class="col-xl-12 col-lg-12">
<h4 class="heading d-hidden-320">Find your Perfect Meal</h4>
</div>
</div>
<div class="col-xl-12 col-lg-12">
<div class="search-container">
<form action="<?=base_url('recipesearch/fetch/')?>" method="GET">
<input class="search-bar" type="text" placeholder="Type Recipe Name and Enter" name="query"/>
</form>
</div>
</div>
<div class="row mt-2" id="">

<?php 
if($results){
foreach($results as $row) {   ?>
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12  mt-3">
<div class="recipe-card recipe-card-shadow-sm" id="recipe_cards">
<img class="recipe-card-img-top" src="<?=base_url()?>user/new_assets/img/recipes/pic-1.png" alt="Card image cap">
<div class="recipe-card-body">
<a href="<?=base_url()?>User/recipe_details/<?=$row->id?>" class="ngh"><h6 class="card-title"><?=$row->food_name?></h5></a>
<span class="text-right d-flex justify-content-end"><img src="<?=base_url()?>user/new_assets/img/recipes/online-sign.png" alt="" style="width: 15px;height: 15px;"></span>
</div>
</div>
</div>
<?php } ?>
<center><?=$links?></center>
<?php }else{ ?>
<center>Content Not found</center>
<?php } ?>
</div>
</div>
<p><br/><br /></p>

</div>
<?php include('footer.php');?>