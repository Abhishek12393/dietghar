<!doctype html>
<html lang="en">
<head>
<title>Chat</title>
<link href="<?php echo base_url(); ?>chat/chat-assets/chat-style.css" rel="stylesheet" type="text/css">    
<link href="<?php echo base_url(); ?>chat/css/bootstrap.min.css" rel="stylesheet" type="text/css">  
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
body, html {
height: 100%;
background-size: cover;
}
@media only screen and (min-width: 1399px) {
.main-left-menu-list {
height:100%;
}
}
.tblbrd{
border: 1px solid black;
padding: 5px;
border-collapse: collapse;
}
.image-upload > input
{
display: none;
}

.image-upload img
{
cursor: pointer;
}
.uploadfile{
position: absolute;
right: 56px;
bottom: 30px;
padding: 3px;
background: none;
border: none;
text-align: center;
font-size: 25px;
color: green;
}
.img250{
height: 250px;
width: 250px;
}
</style>
</head>

<body>

<script> 
function scroll_to(div){
$('html, body').animate({
scrollTop: $("message").offset().top
},1000);
}


</script> 
<!-- <?=base_url('firebase')?> Hello -->
<section id="chat-main-page">
<div class="container-fluid">
<div class="row row-reverse">

<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" style="background: #d4d4d482">
<div class="main-left-menu-list">
<div class="main-user-search-section-4253">
<span style="display: flex;"><a href="#myModal3" data-toggle="modal"><i class="fa fa-paper-plane" style="padding: 10px;"></i></a>
<input id="search_contact" onkeyup="search_contacts()" type="search" placeholder="Search" class="main-list-users-main-4102"><span style="display: flex;"><a href="#myModal3" data-toggle="modal"></a></span>
</div>
<ul class="listing-users-chat1" id="userList">

</ul>
</div>
</div>

<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" style="background: #FFF" id="message">

<div class="chating-section-section-list-main" id="chatMessages">



</div>

</div>

<div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" style="background: #00a1ff12" id="userDetails">
<div class="particular-user-view-profile-145">

<div class="profile-picture-main-list-4586">
<!-- <img class="size-setting" src="<?php echo base_url(); ?>chat/chat-assets/7.png" alt="profile-image" style=" height: 250px;"> -->
</div>
<!-- 	<ul class="profile-detials-main-list-righ1245">
<li> <span> Name: </span> Awika Roy </li>
<li> <span> Age: </span> 23 </li>
<li> <span> Height: </span> 52 </li>
<li> <span> Weight: </span> 168.02 cm </li>
<li> <span> Membership </span> 6555 </li>
</ul> -->
<div class="main-table-list-set45896">
<!-- <h6 class="main-title-profile-list-410233"> Calculations </h6> -->
<table class="calculations-table-main">
<thead>
<tr>
<!--  <th>BMI &nbsp;<a href="#myModal" data-toggle="modal"><i class="fa fa-info-circle clrfff" aria-hidden="true"></i></a></th>
<th>BMR &nbsp;<a href="#myModal1" data-toggle="modal"><i class="fa fa-info-circle clrfff" aria-hidden="true"></i></a></th>
<th>WHR &nbsp;<a href="#myModal2" data-toggle="modal"><i class="fa fa-info-circle clrfff" aria-hidden="true"></i></a></th>
-->	</tr>
</thead>
<tbody>
<tr>
<!-- 	<td> 12 </td>
<td> 34 </td>
<td> 123 </td> -->
</tr>
</tbody>
</table>
</div>
</div>

</div>

</div>
</div>
</section>
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title">Sanjeev Gupta</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<h4>Body Mass Index</h4>
<hr>
<div class="row">
<div class="col-md-6">

<p class="chat-message">Your Body Weight : <strong>72 Kg</strong></p>
<p class="chat-message">Your Height : <strong>1.80 Meter</strong></p>
<p class="chat-message">Your BMI Calculation : <strong>22.13 kg/m2</strong></p>
</div>
<div class="col-md-6">
<p class="chat-message"><strong>Body Mass Index (BMI)</strong></p>
<p class="chat-message">BMI = x KG / (y M * y M) Where: x=bodyweight in KG y=height in m BMI Categories: Underweight = < 18.5 </p>
<p class="chat-message">Normal weight = 18.5-24.9 </p>
<p class="chat-message">Overweight = 25-29.9 </p>
<p class="chat-message">Obesity = BMI of 30 or greater </p>
</div>
</div>
</div>

</div>

</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal1" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title">Sanjeev Gupta</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<h4>Basal Metabolic Rate</h4>
<hr>
<div class="row">
<div class="col-md-6">

<p class="chat-message">Your BMR Calculation : <strong>1,770.70 Calories</strong></p>
<p class="chat-message">Your Body Weight : <strong>72 Kg</strong></p>
<p class="chat-message">Your Height : <strong>1.80 Meter</strong></p>
<p class="chat-message">Your gender : <strong>Male</strong></p>
<p class="chat-message">Your have Select : <strong>Is Very Active</strong></p>
<p class="chat-message">So Requires : <strong>Hard exercise/sports 6-7 days a week</strong></p>
<p class="chat-message">After BMR Calculation : <strong>3,054.45 Calories</strong></p>
</div>
<div class="col-md-6">
<p class="chat-message"><strong>(Basal Metabolic Rate)</strong></p>
<p class="chat-message">BMR Calculation</p>
<p class="chat-message">Men: BMR = 66 + ( 13.7 x weight in kilos ) + ( 5 x height in cm ) - ( 6.8 x age in years )</p>
<p class="chat-message">Women: BMR = 655 + ( 9.6 x weight in kilos ) + ( 1.8 x height in cm ) - ( 4.7 x age in years ) </p>
<p class="chat-message">Sedentary (little or no exercise)</p>
<p class="chat-message">Lightly active (light exercise/sports 1-3 days/week)</p>
<p class="chat-message">Moderately active (moderate exercise/sports 3-5 days/week)</p>
<p class="chat-message">Very active (hard exercise/sports 6-7 days a week)</p>
<p class="chat-message">Extremely active (very hard exercise/sports & physical job or 2x training)</p>
</div>
</div>
</div>

</div>

</div>
</div>
<div class="modal fade" id="myModal2" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title">Sanjeev Gupta</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<h4>Waist to Hip Ratio</h4>
<hr>
<div class="row">
<div class="col-md-3">

<p class="chat-message">General Waist Hip Ratio (WHR) </p>
<p class="chat-message">Standards : <strong>1.70</strong></p>
</div>
<div class="col-md-3">

<p class="chat-message"><strong>(Waist to Hip Ratio)</strong></p>
<p class="chat-message" style="text-align: justify;">WHR Calculation Formula :- a/b
General Waist Hip Ratio (WHR) Standards 
Men: WHR of 0.95 or higher indicates health risk 
Women: WHR of 0.80 or higher indicates health risk 
Female 
Male 
Health Risk</p>
</div>
<div class="col-md-6" >

<table style="width:100%;">
<tr>
<th class="tblbrd">Male</th>
<th class="tblbrd">Female</th> 
<th class="tblbrd">Health Risk On WHR</th>
</tr>
<tr>
<td class="tblbrd">0.95 or below</td>
<td class="tblbrd">0.80 or below</td>
<td class="tblbrd">Low Risk</td>
</tr>
<tr>
<td class="tblbrd">0.96-1.0</td>
<td class="tblbrd">0.81-0.85</td>
<td class="tblbrd">Maderate Risk </td>
</tr>
<tr>
<td class="tblbrd">1.0+</td>
<td class="tblbrd">0.86</td>
<td class="tblbrd">High Rish</td>
</tr>
</table>
</div>
</div>
</div>

</div>

</div>
</div>
<div class="modal fade" id="myModal3" role="dialog">
<div class="modal-dialog modal-lg">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Send Message To All</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>

</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12">
<textarea rows="3" name="msg" class="form-control"></textarea>
</div>
<div class="col-md-4">
<br>
<label>Choose File</label>
<input type="file" name="file" class="form-control">
</div>
<div class="col-md-8"></div>
<div class="col-md-3">
<br>
<input type="submit" class="btn btn-success" value="Send">
</div>
</div>
</div>

</div>

</div>
</div>
<script src="<?php echo base_url(); ?>chat/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>chat/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>chat/js/jquery-3.4.1.slim.min.js"></script>
<script>
  var base_url = '<?=base_url()?>';
  var contact =document.getElementsByClassName("contact");
  var contact_media =document.getElementsByClassName("contact_media");
  search_contact= document.getElementById("search_contact");  
  var message =document.getElementsByClassName("message");
  var message_body =document.getElementsByClassName("message_body");
  search_message= document.getElementById("search_message");  
  function search_contacts()
  {
  for( var i=0;i<contact.length;i++)
  {
  if(contact[i].innerText.toLowerCase().match(search_contact.value.toLowerCase()))
  {

  contact_media[i].style.display="block";
  //  contact_media[i].style.backgroundColor= "#5f982e";

  }
  else {

  contact_media[i].style.display="none";
  // contact_media[i].style.backgroundColor= "#fff";
  }
  }
  }
  function search_messages()
    {
    for( var i=0;i<message.length;i++)
    {
    if(message[i].innerText.toLowerCase().match(search_message.value.toLowerCase()))
    {

    message_body[i].style.display="block";

    }else {

     message_body[i].style.display="none";
    }
  }
  }
  $(document).ready(function () {
    firebase.initializeApp(config);
    //   sendmsg();
    // getUserdata();
    // getMessages();
    // userDataupdate();
    // getUserdata()
    getAllUserdata()

  });
</script>
<script type="text/javascript">
  function fncConvertDateTime(argTimeStamp) {
    strDateNew = "";
    var strDate = new Date((argTimeStamp / 1000));

    date = new Date(strDate * 1000),
    datevalues = [
    date.getFullYear(),
    date.getMonth() + 1,
    date.getDate(),
    date.getHours(),
    date.getMinutes(),
    date.getSeconds(),
    ];
    //                    alert(childData.timeStamp);
    var am_pm = date.getHours() >= 12 ? "PM" : "AM";
    var stMonth = date.getMonth() + 1;
    var strDateNew = date.getFullYear() + "-" + stMonth + "-" + date.getDate() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds() + " " + am_pm;
    //                                var strSendDateNewTime = date.getHours() + ":" + date.getMinutes() + " " + am_pm;
    return strDateNew;
  }

function updateTextmessages(){

(ref(firebase)).getMessageRefById(batchId).child(childData1.messageId).update(childData1);
}



function addUser(){
for (var i = 1; i <= 2; i++) {

userInfo.uniqueId =i;
userInfo.name ="test=="+i; 

(userRepo(firebase)).addUser(userInfo);

}

}



function getUserdata(){
userId = '1';
(ref(firebase)).getUserInfoRef(userId).on('value', snap => {


childSnapshot = snap;
var childKey = childSnapshot.key;
var childData = childSnapshot.val();

console.log(childData);

});

}

function getAllUserdata(){

var htm;
(ref(firebase)).getUsersRef().orderByChild("timespam").on('child_added', snap => {


childSnapshot = snap;
var childKey = childSnapshot.key;
var childData = childSnapshot.val();
console.log(childData)
var userId = childData.userInfo.uniqueId;
htm='';
htm+='<a id="user_id_"'+userId+' onclick="loadChat('+userId+')"><div class="list-user1 contact_media"><div class="media"><img src="'+childData.userInfo.profilePic+'" class="mr-3 rounded-circle" alt="profile-image" style="width: 35px;"><div class="media-body"><h6 class="user-name-title mt-0 contact"> '+childData.userInfo.name+'  <span style="margin-top: 10px;border: 2px solid #333;float: right;border-radius: 50%;height: 24px; width: 24px;padding-left: 6px;"><b>2</b></span></h6> <p class="chat-message" id="user_lastActivity_'+userId+'"> '+childData.userInfo.lastActivity.substr(0, 70)+'</p>	</div></div></div></a>';
htm+='<input type="hidden" id="user_name_'+userId+'" value="'+childData.userInfo.name+'">';
htm+='<input type="hidden" id="user_profile_'+userId+'" value="'+childData.userInfo.profilePic+'">';
htm+='<input type="hidden" id="user_is_online_'+userId+'" value="'+childData.userInfo.is_online+'">';

$("#userList").append(htm);
htm='';
});


}

function loadChat(id){
  var userId = id;
  var htm = '';
  var html = '';
  var userName = $("#user_name_"+userId).val();
  var profile = $("#user_profile_"+userId).val();
  var is_online = $("#user_is_online_"+userId).val();

  /* User Info header Start */

  htm+='<div class="main-user-chating-list-chating-1">';
  htm+='<a href="#" class="user-header-profile-name">';
  htm+='<img src="'+profile+'" alt="profile-image" style="width: 35px; margin: 0 10px 0 0;"> <span class="name-title-set256"> '+userName;
  if(is_online=='true'){
  htm+='<span style="color: green; font-size: xx-small"> Online </span> </span>';
  }

htm+='</a>';
htm+='<input type="search" id="search_message" onkeyup="search_messages()" placeholder="Search Message" class="main-search-input-search"></div>';
htm+='<br><br><br>';

/* User Info header Ends */

/* User Chat Design */
htm+='<span id="chatnewMessage_'+userId+'">'; 

htm+='</span>'; 

/* User Chat Footer Design */
htm+='<div class="main-chating-list-section-1436">';
htm+='<textarea placeholder="Enter Your Message" autofocus class="chat-main-input-sectoin user_message" onkeyup="sendMessageonenter(event,'+userId+')"  id="user_enter_message_'+userId+'"></textarea>';
htm+='<button type="submit" class="submit-chat-btn-main" onclick="sendMessage('+userId+')" ><i class="fa fa-paper-plane"></i></button>';
htm+='<span class="image-upload" style="display:none;">';
htm+='<label for="file-input"><i class="fa fa-paperclip uploadfile" aria-hidden="true"></i></label>';
htm+='<input id="file-input" type="file" accept="image/x-png,image/gif,image/jpeg"/>';
htm+='</span></div>';

$("#chatMessages").html(htm);

/* User Details Design */

html+='<div class="particular-user-view-profile-145"><div class="profile-picture-main-list-4586">';
html+='<img class="size-setting" src="'+profile+'" alt="profile-image" style=" height: 250px;">';
html+='<ul class="profile-detials-main-list-righ1245">							<li> <span> Name: </span> '+userName+' </li>							<li> <span> Age: </span> 23 </li>							<li> <span> Height: </span> 52 </li>							<li> <span> Weight: </span> 168.02 cm </li>							<li> <span> Membership </span> 6555 </li>						</ul>';
html+='</div>';
html+='<div class="main-table-list-set45896">							<h6 class="main-title-profile-list-410233"> Calculations </h6>							<table class="calculations-table-main">								<thead>									<tr>										 <th>BMI &nbsp;<a href="#myModal" data-toggle="modal"><i class="fa fa-info-circle clrfff" aria-hidden="true"></i></a></th>';   										
html+='<th>BMR &nbsp;<a href="#myModal1" data-toggle="modal"><i class="fa fa-info-circle clrfff" aria-hidden="true"></i></a></th>					 <th>WHR &nbsp;<a href="#myModal2" data-toggle="modal"><i class="fa fa-info-circle clrfff" aria-hidden="true"></i></a></th>									</tr>								</thead>								<tbody>									<tr>										<td id="bmi_'+userId+'"> 12 </td>										<td id="bmr_'+userId+'"> 34 </td>										<td id="whr_'+userId+'"> 123 </td>									</tr>								</tbody>							</table>						</div>';
html+='</div>';
$("#userDetails").html(html);
getMessages(id);
getBmiData(id);
getBmrData(id);
getWhrData(id);

}

function getBmiData(id){
  $.ajax({
  url: base_url+"Diet/getBmidata",
  cache: false,
  data: {id : id},
  type: "POST",
  success: function(res){
  $("#bmi_"+id).html(res);

  }
  });
}
function getBmrData(id){
  $.ajax({
  url: base_url+"Diet/getBmrData",
  cache: false,
  data: {id : id},
  type: "POST",
  success: function(res){
  $("#bmr_"+id).html(res);

  }
  });
}
function getWhrData(id){
  $.ajax({
    url: base_url+"Diet/getWhrData",
    cache: false,
    data: {id : id},
    type: "POST",
    success: function(res){
      //console.log("whr==="+res)
      $("#whr_"+id).html(res);

    }
  }); 
}

function getMessages(id) {

  var batchId = id;
  var htm = '';
  console.log('firebase=>');
  console.log(ref(firebase));
  (ref(firebase)).getMessageRefById(batchId).orderByChild("timeStamp")
  .on('child_added', snap => {
    console.log('=>fetch current added child=>'+batchId);
    childSnapshot = snap;
    var childKey = childSnapshot.key;
    var childData = childSnapshot.val();

    console.log(childData);
    var time = fncConvertDateTime(childData.timeStamp);
    /* User Chat start */
    htm ='';
    htm+='<div class="media message_body">';
    htm+='<div class="media-body">';

    if(childData.sentFromAdmin==true){
      /* Message From Admin Side */
      htm+='<p class="main-chat-text-sending-right-1 message" id="'+childData.messageId+'">'+childData.msg+'</p> ';
      htm+='<p class="main-chat-text-sending-right-1 " style="color: black; background: none; font-size: smaller;">'+time+'</p> ';
    }else{
      /* Message From User Side */
      htm+='<p class="main-chat-text-sending-1 message" id="'+childData.messageId+'">'+childData.msg+'</p> ';
      htm+='<p class="main-chat-text-sending-1 " style="color: black; background: none; font-size: smaller;">'+time+'</p> ';
    }



    htm+='</div></div>';

    /* User Chat End */

    $("#chatnewMessage_"+id).append(htm); 
    htm='';

  }
  );

}

function sendMessage(id){
// alert()
var messageInfo = {};
var msg = $("#user_enter_message_"+id).val();
var batchId = id;
messageInfo.msg = msg;                                   
messageInfo.msgStatus = 0;
messageInfo.sentFromAdmin = true;
(messageRepo(firebase)).sendMessgae(batchId,messageInfo);
userlastActivity(id,msg);
$("#user_lastActivity_"+id).html(msg);
$("#user_enter_message_"+id).val('');
$("#user_enter_message_"+id).focus();
}

function userlastActivity(id,message){
var child ={};
child.lastActivity = message;
//child.is_typing = false;
// child.is_online = true;
(ref(firebase)).getUserInfoRef(id).update(child);
}

function sendMessageonenter(e,id){
var key = e.which;

if(key == 13) {
sendMessage(id);
}
}

</script>
<script src="https://www.gstatic.com/firebasejs/4.10.1/firebase.js"></script>  


<script type="text/javascript" src="<?=base_url('firebase')?>/reference.js" ></script> 
<script type="text/javascript" src="<?=base_url('firebase')?>/config.js" ></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</body>
</html>