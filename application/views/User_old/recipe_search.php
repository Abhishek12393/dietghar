
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Search by Recipe</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
  <div class="container">
   <br />
   <br />
   <br />
   <h2 align="center">Recipe Search</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Searchs</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Recipe" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result">
   <?php 
   pr($results);die;
foreach($results as $row)
{
  ?>
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12  mt-3">
<div class="recipe-card recipe-card-shadow-sm" id="recipe_cards">
<img class="recipe-card-img-top" src="'.$burl.'user/new_assets/img/recipes/pic-1.png" alt="Card image cap">
<div class="recipe-card-body">
<a href="'.$burl.'User/recipe_details/'.$row->id.'" class="ngh"><h6 class="card-title"><?=$row->food_name?></h5></a>
<!--<p class="card-text">'.$row->food_name.'</p>-->
<span class="text-right d-flex justify-content-end"><img src="'.$burl.'user/new_assets/img/recipes/online-sign.png" alt="" style="width: 15px;height: 15px;"></span>
</div>
</div>

</div>
 <?php } ?>

 <?=$links?>
   </div>
  </div>
  <div style="clear:both"></div>
  <br />
  <br />
  <br />
  <br />
 </body>
</html>

