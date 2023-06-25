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
  <h1>From Shubham</h1>
  <label>Enter message </label>
  <input type="text" id="user_enter_message_3" onkeypress="sendMessageonenter(event,'3')">
  <input type="button" value="Send" onclick="sendMessage('3')">
<script src="<?php echo base_url(); ?>chat/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>chat/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>chat/js/jquery-3.4.1.slim.min.js"></script>
   <script>
    function sendMessageonenter(e,id){
  var key = e.which;
 
    if(key == 13) {
      sendMessage(id);
     }
}
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

           }
           else {
        
                         message_body[i].style.display="none";
           }
               }
      }
       $(document).ready(function () {
        firebase.initializeApp(config);
 

    });
</script>
<script type="text/javascript">
 
  function sendMessage(id){
    // alert()
  var messageInfo = {};
	var msg = $("#user_enter_message_"+id).val();
	var batchId = id;
	messageInfo.msg = msg;                                   
	messageInfo.msgStatus = 0;
	messageInfo.sentFromAdmin = false;
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
</script>
 <script src="https://www.gstatic.com/firebasejs/4.10.1/firebase.js"></script>  


<script type="text/javascript" src="<?=base_url('firebase')?>/reference.js" ></script> 
<script type="text/javascript" src="<?=base_url('firebase')?>/config.js" ></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</body>
</html>