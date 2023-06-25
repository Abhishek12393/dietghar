<?php 
// pr($message);die;
?>
<!DOCTYPE html>
<html>
<head>
<title>Manuall Chart Entry</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}
.label-danger1 {
    background-color: red;
}
.label-danger {
    background-color: #d8d80d;
}
.form-check-label {
    margin-bottom: 0;
    font-size: 14px;
}
</style>
<script type="text/javascript">
   function changes(id,name){

    
    // console.log(val)

    var quan = $("#"+name+"_fod_quan_"+id).val();
      var food = $("#"+name+"_fod_data_"+id).val();
      var calories = $("#calo_"+food).val();
      var netcal = parseInt(quan*calories);
      $("#"+name+"_calspan_"+id).html(netcal);
      /*if($("#prev_"+name+"_quan").val() == quan && id==food){
        $("#"+name+"_change").val('1')
      }else{
        $("#"+name+"_change").val('2')

      } */
      $("#"+name+"_change").val('2');

      var inputs = $('.'+name);
      console.log(inputs);
      var total = 0;
    for(var i = 0; i < inputs.length; i++){
     total+= parseInt($(inputs[i]).html())
}
    $("."+name+"_total").html(total)
    }
    
    
</script>
</head>
<body style="overflow-x: hidden;">
  <div class="container">
    <div class="row">
      <h2 class="text-center">Chart Details</h2>
      <form method="post" action="<?=base_url('Admin/Submit_manual_chart')?>">
      <table style="width:100%">
  <tr>
    <th>Morning</th>
    <th>Breakfast</th> 
    <th>Mid Meal</th>
    <th>Lunch</th>
    <th>Evening</th>
    <th>Dinner</th>
    <th>Bed Time</th>
  </tr>
  <tr>
    <?php
    foreach ($all_food as $key => $value) { ?>
        <input type="hidden" id="calo_<?=$value['id']?>" value="<?=$value['calories']?>">
         <?php } ?>
  <?php
    $place_array = array('morning','breakfast','midmeal','lunch','evening','dinnner','bedtime');
    foreach ($place_array as  $name) {
      $total_cal = 0;
    $pl =  $name.'_data';
    ?>
    <td>
     <?php foreach ($message[0][$pl] as $value1) {

        ?>
        <input type="hidden" id="prev_<?=$name?>_quan" value="<?=$value1['quantity']?>">
       <select name="<?=$name?>_data_quantity[]" id="<?=$name?>_fod_quan_<?=$value1['foodId']?>"onchange="changes('<?=$value1['foodId']?>','<?=$name?>')">
        <option value="0">0</option>
        <option value="1" <?php if($value1['quantity']=='1'){ echo "Selected"; } ?> >1</option>
        <option value="1.5" <?php if($value1['quantity']=='1.5'){ echo "Selected"; } ?>>1.5</option>
        <option value="2" <?php if($value1['quantity']=='2'){ echo "Selected"; } ?>>2</option>
        <option value="2.5" <?php if($value1['quantity']=='2.5'){ echo "Selected"; } ?>>2.5</option>
        <option value="3" <?php if($value1['quantity']=='3'){ echo "Selected"; } ?>>3</option>
        <option value="4" <?php if($value1['quantity']=='4'){ echo "Selected"; } ?>>4</option>
      </select>
      <select class="select2" name="<?=$name?>_data_food[]" id="<?=$name?>_fod_data_<?=$value1['foodId']?>"onchange="changes('<?=$value1['foodId']?>','<?=$name?>')" style="width: 100% !important;">
      <?php
        foreach ($all_food as $key => $value) { ?>
          <option value="<?=$value['id']?>" <?php if($value['id']==$value1['foodId']){ echo "Selected"; } ?> ><?=$value['food_name']?></option> 
        <?php }
       ?>
      </select>
      <span class="label label-danger1" style="font-size: 16px;padding: 4px;float: right;">Calories:<span id="<?=$name?>_calspan_<?=$value1['foodId']?>" class="<?=$name?>"><?php echo  $value1["calories"]*$value1["quantity"] ?></span></span>
      <h1>+</h1>
      <?php
      $total_cal+=$value1["calories"]*$value1["quantity"];
       } ?>
      <span class="label label-danger" style="font-size: 16px;padding: 4px;float: right;">Total: <span class="<?=$name?>_total"> <?=$total_cal?> </span></span>
    </td>
    <?php } ?> 
    
   </tr>
</table>
<input type="hidden" name="chart_id" value="<?=$message[0]['fake_chart_id']?>">
<input type="hidden" name="morning_change" id="morning_change" value="1">
<input type="hidden" name="breakfast_change" id="breakfast_change" value="1">
<input type="hidden" name="midmeal_change" id="midmeal_change" value="1">
<input type="hidden" name="lunch_change" id="lunch_change" value="1">
<input type="hidden" name="evening_change" id="evening_change" value="1">
<input type="hidden" name="dinnner_change" id="dinnner_change" value="1">
<input type="hidden" name="bedtime_change" id="bedtime_change" value="1">
<input type="hidden" name="food_cat"  value="<?=$message[0]['food_cate']?>">
 <h1>Select Food Perfernce</h1>
<div class="row">
  <?php foreach($food_category as $cate){ ?> 
                            <div class="col-md-3">
                                 <div class="form-check">
                    <label class="form-check-label">
                      <div class="uniform-checker"><span><input type="radio" class="form-check-input-styled" name="Perfernce" value="<?=$cate['id']?>" data-fouc=""></span></div>
                       <?=$cate['name']?>
                    </label>
                </div><br>
                           
                            </div>
                            <?php }?>   
                            
                        </div><br>
                         <h1>Add Disease (In which not to be given)</h1>
 <div class="row"><br>
   <?php foreach($disease as $dis){ ?> 
                            <div class="col-md-3">

                                <div class="form-check">
                    <label class="form-check-label">
                      <div class="uniform-checker"><span><input type="checkbox" class="form-check-input-styled" name="disease[]" value="<?=$dis['id']?>" data-fouc=""></span></div>
                       <?=$dis['name']?>
                    </label>
                </div><br>
                            </div>
      <?php } ?>
                           
                            
                        </div><br>
<div class="text-center">
    <input type="submit" name="Accept" value="Accept" class="btn btn-success" style="margin-left: -8%;height: 40px;font-size: 16px;">
  </div>
    </form>
    </div>
    <div class="row" style="padding-top: 2%;">
      <div class="col-md-6"></div>
      <div class="col-md-3">
        <form method="post" action="<?=base_url('Admin/rejectMeal')?>">

          <input type="hidden" name="chart_id" value="<?=$message[0]['fake_chart_id']?>">
        <input type="submit" name="Reject" value="Reject" class="btn btn-danger" style="margin: 10px;height: 40px;font-size: 16px;margin-top: -36%;padding-left: 10px;margin-left: 15%;">
      </form>
      </div>
      <div class="col-md-1">
        <!-- <input type="submit" name="Accept" value="Accept" class="btn btn-success"> -->
      </div>
      
    </div>
  </div>
  <script>
    $('.select2').select2();

</script>
</body>
</html>