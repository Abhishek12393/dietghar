
function showlname(){


$("#fnamearrow").hide();
$("#lnamearrow").show();
$("#pincode").hide();
$("#hnamearrow").hide();
$("#addressarrow").hide();
}
function showpin(){
$("#fnamearrow").hide();
$("#lnamearrow").hide();
$("#pincode").show();
$("#hnamearrow").hide();
$("#addressarrow").hide();
}
function showhouse(){
$("#fnamearrow").hide();
$("#lnamearrow").hide();
$("#pincode").hide();
$("#hnamearrow").show();
$("#addressarrow").hide();
}
function showaddress(){
$("#fnamearrow").hide();
$("#lnamearrow").hide();
$("#pincode").hide();
$("#hnamearrow").hide();
$("#addressarrow").show();
}
// function showobjectives(){

//     $("#stepSeven").hide();
//      $("#stepEight").show();
// }
function fnames(){
    var str = $("#fname").val();
    $("#firstnames").html(str);
    var length = str.length;
    if(length>=3){
        
        $("#fnameshowarraow").show();
    }else{
        $("#fnameshowarraow").hide();

    }
}
function lnames(){
    var str = $("#lname").val();
    $("#lastnames").html(str);
    var length = str.length;
    if(length>=3){
        
        $("#lnameshowarraow").show();
    }else{
        $("#lnameshowarraow").hide();

    }
}
function pin(){
    var str = $("#uintTextBox8").val();
    $("#pincodes").html(str);
    var length = str.length;
    if(length>=6){
        
        $("#pinshowarraow").show();
    }else{
        $("#pinshowarraow").hide();

    }
}
function house(){
    var str = $("#houses").val();
    $("#housenos").html(str);
    var length = str.length;
    if(length>=3){
        
        $("#houseshowarraow").show();
    }else{
        $("#houseshowarraow").hide();

    }
}
function addr(){
    
    var str = $("#test1").val();
    $("#addresss").html(str);
    var length = str.length;
    if(length>=3){
        
        $("#addressshowarraow").show();
    }else{
        $("#addressshowarraow").hide();

    }
}
function mobiles(){
    
    var str = $("#uintTextBox").val();
    
    var length = str.length;
    if(length>=10){
        
        
         $.ajax({
           url:  baseURL + 'Diet/checkmobile',
           type: 'POST',
           data: {mobile: str},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
           
        $("#show_otp").show();
        document.getElementById("quantity").focus();
           }
        });
    }else{
        $("#show_otp").hide();
    }
}
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#quantity").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        //$("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});


function forward(first,second){
$("#incorrectotp").hide();
var str = $("#"+first).val();
var mobile = $("#uintTextBox").val();
    var length = str.length;
  
    if(length>=1){

        if(first == 'quantity5'){

            var otp = $("#quantity").val();
            var otp1 = $("#quantity1").val();
            var otp2 = $("#quantity2").val();
            var otp3 = $("#quantity3").val();
            var otp4 = $("#quantity4").val();
            var otp5 = $("#quantity5").val();

        $.ajax({
           url:  baseURL + 'Diet/checkotp',
           type: 'POST',
           data: {mobile: mobile,otp:otp,otp1:otp1,otp2:otp2,otp3:otp3,otp4:otp4,otp5:otp5},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
           if(data == 'Success'){
             $("#show_otp").show();
              $("#stepTwo").show();
        $("#first").hide();
          $("#incorrectotp").hide();
             document.getElementById("quantity").focus();
           }else{
            $("#incorrectotp").show();
             $("#stepTwo").hide();
        $("#first").show();
           }
       
           }
        });
        
       
        }
        
        document.getElementById(second).focus();
      
    }
}
function stepwiseshow(first,second,third){

     var where ;

     if(first == 'stepFour'){
            
            where = 'id';
            var dd = $("#dd").val();
            var mm = $("#showMM").val();
            var yy = $("#showYYYY").val();
            var value = yy+"-"+mm+"-"+dd;
            var table = 'customers_info';
            var column = 'dob';

             $.ajax({
           url:  baseURL + 'Diet/Update',
           type: 'POST',
           data: {table: table,column:column,value:value,where:where},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
             $("#"+first).hide();
             $("#"+second).show();
           }
        });
        } else if(first == 'stepTwo'){
            
           where = 'id';
          
           var table = 'customers_info';
           var column = 'gender';

             $.ajax({
           url:  baseURL + 'Diet/Update',
           type: 'POST',
           data: {table: table,column:column,value:third,where:where},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
             $("#"+first).hide();
             $("#"+second).show();
           }
        });
        }else if(first == 'stepFive'){
            where = 'id';
            var feet = parseInt($("#feet").val());
            var showinch = parseInt($("#showinch").val());

            var inches = feet*12 + showinch;
            var heightcm = inches*2.54;


            var table = 'customers_info';
            var column = 'height';
            var value = Math.round(heightcm);
            $("#heightincm").val(value);
           $.ajax({
           url:  baseURL + 'Diet/Update',
           type: 'POST',
           data: {table: table,column:column,value:value,where:where},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
             $("#"+first).hide();
             $("#"+second).show();
           }
        });
        }else if(first == 'stepSix'){
            where = 'id';
            var value = $("#weight").val();
         
            var table = 'customers_info';
            var column = 'weight';
           
             $.ajax({
           url:  baseURL + 'Diet/Update',
           type: 'POST',
           data: {table: table,column:column,value:value,where:where},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
              where = 'id';
            var height = parseInt($("#heightincm").val());
           var heightinm = height/100;
            var weight = parseInt($("#weight").val());
            var value = weight / (heightinm * heightinm );
            
             var table = 'customers_info';
            var column = 'bmi_value';
           
             $.ajax({
           url:  baseURL + 'Diet/Update',
           type: 'POST',
           data: {table: table,column:column,value:value,where:where},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
             $("#"+first).hide();
             $("#"+second).show();
           }
        });
           }
        });
        }else if(first == 'stepSeven'){
            where = 'id';

            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var pincode = $("#uintTextBox8").val();
            var houses = $("#houses").val();
            var address = $("#test1").val();

            var table = 'customers_info';
          

           
             $.ajax({
           url:  baseURL + 'Diet/UpdatePersonalInfo',
           type: 'POST',
           data: {table: table,fname:fname,lname:lname,pincode:pincode,houses:houses,address:address,where:where},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
             $("#"+first).hide();
             $("#"+second).show();
           }
        });
        }else if(first == 'stepEight'){
            
           where = 'id';
          
           var table = 'customer_lifestyle';
           var column = 'objective';

             $.ajax({
           url:  baseURL + 'Diet/InsertLifestyle',
           type: 'POST',
           data: {table: table,column:column,value:third,where:where},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
             $("#"+first).hide();
             $("#"+second).show();
           }
        });
        }else if(first == 'stepThree' ||  first == 'stepNine' || first == 'stepTen' || first == 'step13'){
            
           where = 'user_id';
          
           var table = 'customer_lifestyle';
           if(first == 'stepThree'){
            var column = 'lifestyle';
          }else if(first == 'stepNine'){
              var column = 'married';
          }else if(first == 'stepTen'){
              var column = 'kids_below_12_month';
          }else if(first == 'step13'){
              var column = 'looking_to_conceive';
          }

             $.ajax({
         
           url:  baseURL + 'Diet/Update',
           type: 'POST',
           data: {table: table,column:column,value:third,where:where},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
             $("#"+first).hide();
             $("#"+second).show();
           }
        });
        }else if(first == 'step12'){
            
           where = 'user_id';
          
           var table = 'customer_lifestyle';
           var column = 'no_kids';
           var kids = $("#no_of_kids").val();
             $.ajax({
           url:  baseURL + 'Diet/Update',
           type: 'POST',
           data: {table: table,column:column,value:kids,where:where},
           error: function() {
              alert('Something is wrong');
           },
           success: function(data) {
             $("#"+first).hide();
             $("#"+second).show();
           }
        });
        }else{
             $("#"+first).hide();
             $("#"+second).show();
        }
        //stepTwelve needs to done Workout out you follow
   
}
function showMM1(){

    $("#showMM").show();
}
function showYYYY1(){
    $("#showYYYY").show();
}
function showinches(){
    $("#showinch").show();
}
function stepfrwd(first){
    $("#"+first).show();
}
function refresh(){
   location.reload()
}