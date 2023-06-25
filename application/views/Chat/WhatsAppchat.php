<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Whatsapp</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>chat/style.css">
<style type="text/css">
		.chat-list-item:hover {
    background: hsl(174, 100%, 29%);
	}
	body {
    margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #fff;
    text-align: left;
    background-color: #333;
	}
	.chat-list-item.active {
    background: #28a745;
}
.frontChat{
	display: none !important;
}
.chat-list-item {
    background: #333;
    cursor: pointer;
}
.bg-white {
    background-color: #275a90!important;
}
.fa, .fas {
    font-weight: 900;
    color: #fff !important;
}
.text-muted {
    color: #fff!important;
}
.message-item.self {
    background: #275a90 !important;
}
#messages {
    flex: 1!important;
    background: #212529;
    overflow: auto;
}
#input-area {
    background: hsl(210, 11%, 15%);
}
#input-area #input {
    outline: none;
    background-color: #333;
    color: #fff !important;
}
::-webkit-input-placeholder { /* Edge */
  color: #fff !important;
}


::-webkit-scrollbar-track {
  background: #f1f1f1 !important; 
}
 
::-webkit-scrollbar-thumb {
  background: #888 !important; 
}


::-webkit-scrollbar-thumb:hover {
  background: #555 !important; 
}
#chat-list  div
{
padding:0 !important;
}
.image-upload > input
{
    display: none;
}

.image-upload img
{
    cursor: pointer;
}
	</style>
</head>

<body>
	
	<div class="container-fluid" id="main-container">
		<div class="row h-100">
			<div class="col-12 col-sm-5 col-md-4 d-flex flex-column" id="chat-list-area" style="position:relative;">

				<!-- Navbar -->
				<div class="row d-flex flex-row align-items-center p-2" id="navbar">
					<img alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px; cursor:pointer;" onclick="showProfileSettings()" id="display-pic" src="http://dietsoftware.tk/diet/chat/images/asdsd12f34ASd231.png">
					<div class="text-white font-weight-bold" id="username">Dietghar</div>
					<div class="nav-item dropdown ml-auto">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v text-white"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#">New Group</a>
							<a class="dropdown-item" href="#">Archived</a>
							<a class="dropdown-item" href="#">Starred</a>
							<a class="dropdown-item" href="#">Settings</a>
							<a class="dropdown-item" href="#">Log Out</a>
						</div>
					</div>-
				</div>
				<input id="myInput"  type="search" placeholder="Search" 
				class="main-list-users-main-4102" 
				style="background-color: #333;border: 2px solid #fff;border-radius: 20px;margin-top: 5px;color: #fff;">
			
				<!-- Chat User List -->
	<div class="row" id="chat-list" style="height: 90vh;overflow-y: scroll;    clear: both;">
		<!-- <div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom " onclick="generateMessageArea(this, 0)">
			<img src="http://dietsoftware.tk/diet/chat/images/0923102932_aPRkoW.jpg" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px;">
			<div class="w-50">
				<div class="name">Programmers</div>
				<div class="small last-message">+91 91231 40293: <i class="far fa-check-circle mr-1"></i> hii</div>
			</div>
			<div class="flex-grow-1 text-right">
				<div class="small time">12:11</div>
				
			</div>
		</div> -->
		
		<!-- <div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom " >
			<img src="http://dietsoftware.tk/diet/chat/images/dsaad212312aGEA12ew.png" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px;">
			<div class="w-50">
				<div class="name">Dee</div>
				<div class="small last-message"><i class="fas fa-check-circle mr-1"></i> if you go to the movie, then give me a call</div>
			</div>
			<div class="flex-grow-1 text-right">
				<div class="small time">27/03/2018</div>
				
			</div>
		</div> -->
		
		
	</div>
<div class="clearfix"></div>
				<!-- Profile Settings -->
				<div class="d-flex flex-column w-100 h-100" id="profile-settings">
					<div class="row d-flex flex-row align-items-center p-2 m-0" style="background:#009688; min-height:65px;">
						<i class="fas fa-arrow-left p-2 mx-3 my-1 text-white" style="font-size: 1.5rem; cursor: pointer;" onclick="hideProfileSettings()"></i>
						<div class="text-white font-weight-bold">Profile</div>
					</div>
					<div class="d-flex flex-column" style="overflow:auto;">
						<img alt="Profile Photo" class="img-fluid rounded-circle my-5 justify-self-center mx-auto" id="profile-pic">
						<input type="file" id="profile-pic-input" class="d-none">
						<div class="bg-white px-3 py-2">
							<div class="text-muted mb-2"><label for="input-name">Your Name</label></div>
							<input type="text" name="name" id="input-name" class="w-100 border-0 py-2 profile-input">
						</div>
						<div class="text-muted p-3 small">
							This is not your username or pin. This name will be visible to your WhatsApp contacts.
						</div>
						<div class="bg-white px-3 py-2">
							<div class="text-muted mb-2"><label for="input-about">About</label></div>
							<input type="text" name="name" id="input-about" value="" class="w-100 border-0 py-2 profile-input">
						</div>
					</div>
					
				</div>
			</div>
				<div class="d-none d-sm-flex flex-column col-12 col-sm-7 col-md-8 p-0 h-100" id="message-area1">
			
				</div>
			<!-- Message Area -->
			<div class="d-none d-sm-flex flex-column col-12 col-sm-7 col-md-8 p-0 h-100 frontChat" id="message-area">
				<div class="w-100 h-100 overlay d-none"></div>

				<!-- Navbar -->
				<div class="row d-flex flex-row align-items-center p-2 m-0 w-100 userDetails" id="navbar">
					<!-- <div class="d-block d-sm-none">
						<i class="fas fa-arrow-left p-2 mr-2 text-white" style="font-size: 1.5rem; cursor: pointer;" onclick="showChatList()"></i>
					</div>
					<a href="#"><img src="http://dietsoftware.tk/diet/chat/images/0923102932_aPRkoW.jpg" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px;" id="pic"></a>
					<div class="d-flex flex-column">
						<div class="text-white font-weight-bold" id="name">Programmers</div>
						<div class="text-white small" id="details">You, Nitin, Suvro Mobile</div>
					</div>
					<div class="d-flex flex-row align-items-center ml-auto">
						<a href="#"><i class="fas fa-search mx-3 text-white d-none d-md-block"></i></a>
						<a href="#"><i class="fas fa-paperclip mx-3 text-white d-none d-md-block"></i></a>
						<a href="#"><i class="fas fa-ellipsis-v mr-2 mx-sm-3 text-white"></i></a>
					</div> -->
				</div>

				<!--Chat Messages -->
				
<span  id="messages">
	
	
	
	
	
	
	
	
	
</span>

				<!-- Input -->
				<div class="justify-self-end align-items-center flex-row d-flex" id="input-area">
					<div class="image-upload">
						 <label for="file-input">
						 	
					<i class="fas fa-paperclip mx-3 text-white d-none d-md-block"></i>
				
					</label>
					  <input id="file-input" type="file" onchange="sendfiles()" accept="image/x-png,image/gif,image/jpeg"/>
					</div>
					<!-- <a href="#"><i class="far fa-smile text-muted px-3" style="font-size:1.5rem;"></i></a> -->
					<input type="text" name="message" id="input_message" placeholder="Type a message" onkeyup="sendMessageonenter(event)" class="flex-grow-1 border-0 px-3 py-2 my-3 rounded shadow-sm">
					<i class="fas fa-paper-plane text-muted px-3" style="cursor:pointer;" onclick="sendMessage()"></i>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	    crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
	    crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
		crossorigin="anonymous"></script>
	<script type="text/javascript">
		
		 var base_url = '<?=base_url()?>';
		  $(document).ready(function () {
		        firebase.initializeApp(config);
				//   sendmsg();
				// getUserdata();
				// getMessages();
				// userDataupdate();
				//getUserdata()
		 		getAllUserdata()
		 		// test()
   		 });
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
                               // var strDateNew = date.getFullYear() + "-" + stMonth + "-" + date.getDate() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds() + " " + am_pm;
                                var strDateNew = date.getFullYear() + "-" + stMonth + "-" + date.getDate() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds() ;
//                                var strSendDateNewTime = date.getHours() + ":" + date.getMinutes() + " " + am_pm;
                                return strDateNew;
                            }
                 
function updateTextmessages(){

      (ref(firebase)).getMessageRefById(batchId).child(childData1.messageId).update(childData1);
}


/* Send Files */

function sendfiles(){

var data = new FormData(); 
 
var file = $("#file-input")[0].files[0];
data.append('file', file, file.name);
var xhr = new XMLHttpRequest();     
 xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	var response = JSON.parse(this.responseText);
      if(response.status==1){ // Success
      	$("#file-input").val('');
      	$("#input_message").val(response.path);
      	sendMessage(2);
      }else{ //Old user
        alert(response.message);
      } 
    }
  };
var url = base_url+"Diet/uploadFiles";
xhr.open('POST', url, true);  
xhr.send(data);

 }

function addUser(){
  for (var i = 1; i <= 2; i++) {

userInfo.uniqueId =i;
userInfo.name ="test=="+i; 

(userRepo(firebase)).addUser(userInfo);

}

}



function getUserdata(id){
 var userId = id;
  (ref(firebase)).getchatroomInfoRef(userId).on('value', snap => {


                  childSnapshot = snap;
                   var childKey = childSnapshot.key;
                     var childData1 = childSnapshot.val();
                     var message_counter = childData1.message_counter;
                     if(message_counter!='undefined'){
                     	if(message_counter>0){
                     		$("#unread_count_"+userId).html(message_counter);

                     	}
                     }
                });
}

function getonlinestatus(id){
	var userId = id;
  (ref(firebase)).getchatroomInfoRef(userId).on('value', snap => {
  	var htm = '';

                  childSnapshot = snap;
                   var childKey = childSnapshot.key;
                     var childData1 = childSnapshot.val();
                 console.log(childData1);
                     var onlineStatus = childData1.onlineStatus;
                     var lastActivity = childData1.lastSeen;
                     var lastSeen = fncConvertDateTime(lastActivity);
                  		if(onlineStatus=='1'){
                  			var status = 'online';
                     		$("#online_status_"+userId).html(status);
                  		}else{
                  			var status = lastSeen;
                  			htm+= 'last seen '+status;
                     		$("#online_status_"+userId).html(htm);
                  		}

                });
}


function getAllUserdata(){
	// debugger;
	var htm;
   (ref(firebase)).getUsersRef().orderByChild("timespam").on('child_added', snap => {


                    childSnapshot = snap;
                    var childKey = childSnapshot.key;
                    var childData = childSnapshot.val();
                    // console.log(childData)
                    // console.log(childData);
                    var userId = childData.userInfo.uniqueId;
                     var time = fncConvertDateTime(childData.userInfo.timespam);
                     var message_counter = '';
                    htm='';
                    htm+='<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom " class="mainprofile" id="mainprofile_'+userId+'" onclick="loadChat('+userId+')" >';
                    htm+='<img src="'+childData.userInfo.profilePic+'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px;"><div class="w-50">';
                    htm+='<div class="name">'+childData.userInfo.name+'</div>';
                    htm+='<div class="small last-message" id="last_message_'+userId+'"><i class="fas fa-check-circle mr-1"></i>'+childData.userInfo.lastActivity+'</div></div><div class="flex-grow-1 text-right">';
                    htm+='<div class="small time">'+time+'</div>';
                    
                    		htm+='<div class="badge badge-success badge-pill small" id="unread_count_'+userId+'">'+message_counter+'</div>';	
                    	                
                    htm+='</div></div>';
                    htm+='<input type="hidden" id="user_name_'+userId+'" value="'+childData.userInfo.name+'">';
                    htm+='<input type="hidden" id="user_profile_'+userId+'" value="'+childData.userInfo.profilePic+'">';
                    htm+='<input type="hidden" id="user_is_online_'+userId+'" value="'+childData.userInfo.is_online+'">';

                   

                 	var inputId = userId+"_a";
						var val = $("#"+inputId).val();
						if(val !='1'){
							htm+='<input type="hidden" id="'+inputId+'" value="1">'
				         $("#chat-list").prepend(htm); 
				         	getUserdata(userId);
						}

                  
                 	htm='';
                });
  
  				(ref(firebase)).getUsersRef().orderByChild("timespam").on('child_changed', snap => {

  					childSnapshot = snap;
                    var childKey = childSnapshot.key;
                    var childData = childSnapshot.val();
                    var userId = childData.userInfo.uniqueId;
                    var time = fncConvertDateTime(childData.userInfo.timespam);
                      var message_counter = '';
                    htm='';
                  
                    htm+='<div class="chat-list-item d-flex flex-row w-100 p-2 border-bottom " id="mainprofile_'+userId+'" onclick="loadChat('+userId+')" >';
                    htm+='<img src="'+childData.userInfo.profilePic+'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px;"><div class="w-50">';
                    htm+='<div class="name">'+childData.userInfo.name+'</div>';
                    htm+='<div class="small last-message" id="last_message_'+userId+'"><i class="fas fa-check-circle mr-1"></i>'+childData.userInfo.lastActivity+'</div></div><div class="flex-grow-1 text-right">';
                    htm+='<div class="small time">'+time+'</div>';
                     htm+='<div class="badge badge-success badge-pill small"id="unread_count_'+userId+'">'+message_counter+'</div>';	
                       
                    htm+='</div></div>';
                    htm+='<input type="hidden" id="user_name_'+userId+'" value="'+childData.userInfo.name+'">';
                    htm+='<input type="hidden" id="user_profile_'+userId+'" value="'+childData.userInfo.profilePic+'">';
                    htm+='<input type="hidden" id="user_is_online_'+userId+'" value="'+childData.userInfo.is_online+'">';
                    var inputId = userId+"_a";
                    $("#mainprofile_"+userId).remove()
                    $("#"+inputId).remove()
                 		var val = $("#"+inputId).val();
						if(val !='1'){
							htm+='<input type="hidden" id="'+inputId+'" value="1">'
				         $("#chat-list").prepend(htm); 
				         getUserdata(userId);
						}
                    
                   
                });
  
   
}

function loadChat(id){
	var userId = id;
	var htm = '';
	var html = '';
	var userName = $("#user_name_"+userId).val();
	var profile = $("#user_profile_"+userId).val();
	var is_online = $("#user_is_online_"+userId).val();
	
	$("#message-area1").addClass('frontChat');
	$("#message-area").removeClass('frontChat');
	// alert(userName);
	/* User Info header Start */

	htm+='<div class="d-block d-sm-none"><i class="fas fa-arrow-left p-2 mr-2 text-white" style="font-size: 1.5rem; cursor: pointer;"></i>					</div>';
	htm+='<a href="#"><img src="'+profile+'" alt="Profile Photo" class="img-fluid rounded-circle mr-2" style="height:50px;" id="pic"></a>';
	htm+='<div class="d-flex flex-column"><div class="text-white font-weight-bold" id="name">'+userName+'</div>';
	// htm+='<div>online</div>';
	htm+='<div id="online_status_'+userId+'"> </div>';
	htm+='</div>';
	htm+='<div class="d-flex flex-row align-items-center ml-auto"><a href="#"><i class="fas fa-search mx-3 text-white d-none d-md-block"></i></a>						<a href="#"><i class="fas fa-paperclip mx-3 text-white d-none d-md-block"></i></a><a href="#"><i class="fas fa-ellipsis-v mr-2 mx-sm-3 text-white"></i></a></div>'
	htm+='<input type="hidden" id="active_user_chat_id" value="'+userId+'">';
	$(".userDetails").html(htm);
	var spanId = 'user_message_'+id;
	var span = '<div class="d-flex flex-column" id="'+spanId+'"></div>'
	$("#messages").html(span);
	// $("#userDetails").html(html);
	getonlinestatus(id);
	getMessages(id);
	  var child ={};
   var message_counter = $("#message_count").val();
                     child.message_counter = 0;
                     (ref(firebase)).getchatroomInfoRef(id).update(child);
                     $("#unread_count_"+id).html('');
  /*getBmiData(id);
  getBmrData(id);
  getWhrData(id);*/

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
         $("#user_message_"+id).html(htm);
        
      (ref(firebase)).getMessageRefById(batchId).orderByChild("timeStamp")
                .on('child_added', snap => {

                  childSnapshot = snap;
                    var childKey = childSnapshot.key;
                    var childData = childSnapshot.val();
                 
                 var time = fncConvertDateTime(childData.timeStamp);
                  htm='';
               			 /* User Chat start */

               			 if(childData.sentFromAdmin==false){
               			htm+='<div class="align-self-start p-1 my-1 mx-3 rounded bg-white shadow-sm message-item"><div class="options"><a href="#"><i class="fas fa-angle-down text-muted px-2"></i></a></div><div class="small font-weight-bold text-primary"></div><div class="d-flex flex-row">';
               			if(childData.Messagetype==2){

               				htm+='<div class="body m-1 mr-2"><img src="'+childData.msg+'" style="height:200px;width:200px;"></div>';
               			}else{
               				htm+='<div class="body m-1 mr-2">'+childData.msg+'</div>';
               			}
               			
               			htm+='<div class="time ml-auto small text-right flex-shrink-0 align-self-end text-muted" style="width: 128px;padding-top: 20px;color: #dccfcf !important;">'+time+'</div></div></div>';
						
						}else{
							htm+='<div class="align-self-end p-1 my-1 mx-3 rounded bg-white shadow-sm message-item"><div class="options"><a href="#"><i class="fas fa-angle-down text-muted px-2"></i></a></div><div class="small font-weight-bold text-primary"></div><div class="d-flex flex-row">';
							if(childData.Messagetype==2){

               				htm+='<div class="body m-1 mr-2"><img src="'+childData.msg+'" style="height:200px;width:200px;"></div>';
               			}else{
               				htm+='<div class="body m-1 mr-2">'+childData.msg+'</div>';
               			}
							htm+='<div class="time ml-auto small text-right flex-shrink-0 align-self-end text-muted" style="width: 128px;padding-top: 20px;color: #dccfcf !important;">'+time+'</div></div></div>';
						}
						var inputId = batchId+"_"+childData.messageId;
						var val = $("#"+inputId).val();
						if(val !='1'){
							htm+='<input type="hidden" id="'+inputId+'" value="1">'
				         $("#user_message_"+id).append(htm); 
						}
						

                }
                );
            
  }
  function sendMessage(type=0){
    var id = $("#active_user_chat_id").val();
  	var messageInfo = {};
	var msg = $("#input_message").val();
	var batchId = id;
	messageInfo.msg = msg;                                   
	messageInfo.msgStatus = 0;
	messageInfo.sentFromAdmin = true;
	messageInfo.Messagetype = type;
	console.log(batchId);
	console.log(messageInfo);
	(messageRepo(firebase)).sendMessgae(batchId,messageInfo);
 	userlastActivity(id,msg);
 	 $("#input_message").val('');
 /* $("#user_lastActivity_"+id).html(msg);
	$("#user_enter_message_"+id).val('');
	$("#user_enter_message_"+id).focus();*/
  }

  function userlastActivity(id,message){
  var child ={};
      var strTime = (new Date()).getTime()+"";
   child.timespam= strTime;
  child.lastActivity = message;
  //child.is_typing = false;
 // child.is_online = true;
    (ref(firebase)).getUserInfoRef(id).update(child);
}

function sendMessageonenter(e){
  var key = e.which;
 
    if(key == 13) {
      sendMessage();
     }
}

	</script>
	<script src="<?php echo base_url(); ?>chat/date-utils.js"></script>
	<script src="<?php echo base_url(); ?>chat/script.js"></script>
	<script src="https://www.gstatic.com/firebasejs/4.10.1/firebase.js"></script>  


<script type="text/javascript" src="<?=base_url('firebase')?>/reference.js" ></script> 
<script type="text/javascript" src="<?=base_url('firebase')?>/config.js" ></script> 	
<script type="text/javascript">
	var height = 0;
$('div div').each(function(i, value){
    height += parseInt($(this).height());
});

height += '';

$('div').animate({scrollTop: height});
</script>
<script>
/*$(document).ready(function(){

  $("#myInput").on("keyup", function() {

    var value = $(this).val().toLowerCase();
   $("#chat-list  div , #chat-list div img  " ).filter(function() {

    // return  $(this).toggle($(this).html().toLowerCase().indexOf(value) > -1).css("border","solid red 6pz");
     
      	 
	});
/*  $("#chat-list  div").each(function()
  {
     if($(this).html().toLowerCase()==value)
	 {
	 	 $(this).parent().parent().find("img").show();
		 $(this).parent().find("i").parent().show();
	 }
  });


  });
}); */
</script>
<script src="http://dietsoftware.tk/diet/chat/date-utils.js"></script>
	<script src="http://dietsoftware.tk/diet/chat/script.js"></script>
	<script>
$(document).ready(function(){

  $("#myInput").on("keyup", function() {

    var value = $(this).val().toLowerCase();
    $("#chat-list  div").find('.name').each(function()
    {
       // if(typeof $(this).html().toLowerCase() !='undefined' )
       // {
      //  let l=$(this).html().toLowerCase().match(/value/g);
     //  console.log(l); 
     if($(this).html().toLowerCase().indexOf(value) > -1)


//      if(l)
      {
         $(this).siblings().css('display','block');
         $(this).parent().siblings().css("display",'block');
         $(this).parent().css("display","block");
         $(this).parent().parent().css("display","block");

         $(this).css("display","block");
      }
      else{

            $(this).parent().parent().css("border","none");

         $(this).parent().siblings().css("display",'none');
                   $(this).siblings().css('display','none');
         $(this).parent().css("display","none");
        $(this).parent().parent().css(".d-flex","");
         $(this).parent().parent().css("display","none");
         $(this).css("display","none");
         
      }


    });
/*   $("#chat-list  div , #chat-list div img  " ).filter(function() {
     return  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1).css("border-style","none");
     
      	 
	});
  $("#chat-list  div").each(function()
  {
          console.log($(this).text());

     if($(this).text().toLowerCase()==value)
	 {

	 	 $(this).parent().parent().find("img").show();
		 $(this).parent().find("i").parent().show();
	 }
    // else
     {
         $(this).css("border-style","none");
     }
  });
*/
  
  });  
});
</script>

<script type="text/javascript">
	$(document).ready(function() {
$(".mainprofile").click(function() {
     $('html, body').animate({
         scrollTop: $("#messages").offset().top
     }, 1500);
 });
});
</script>
</body>

</html>