
<!-- FIREbase -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-database.js"></script>
<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-analytics.js"></script>
<script type="text/javascript">
  //--------
      //firbase config
			// create a token to fetch
      var firebaseConfig =  JSON.parse(callajax({'token':'true'},base_url2+'Config'));
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

  //---------
	var MyVar = {};
	MyVar.sendby = ''; 
	// MyVar.newmsg = 1;
  
	MyVar.userid = userid;
	let userphone = <?= $message->mobile_no; ?>;

	// get elements ::
 	let adminStat = document.getElementById('adminStat');
 	let lastseen = document.getElementById('lastseen');
 	// mesage box and  button 
 	let sendBtn = document.getElementById("sendMessagebtn");
  let messageSend = document.getElementById("text1");

  // define refrences ::
  this.database = firebase.database(); // database object
  let chatroomRef = this.database.ref('/chatroom/'+userphone); // refrence to node
  let messageRef = this.database.ref('/message/'+userphone); // refrence to node

  let adminRef = this.database.ref('/admin'); // refrence to node
// # wndow onload 
  window.onload = function() {
  	$('body').on('keydown', '#text1', function(e) {
        // console.log(this.value);
        if (e.which === 32 &&  e.target.selectionStart === 0) {
          return false;
        }  
      }); // disable the space from enter in text box

    //on click send message
    sendBtn.addEventListener("click", function() {
        sendmessage();
    });
    messageSend.addEventListener("keypress", function(event) {
        if (event.keyCode === 13) {
          sendmessage();
          console.log('enter keypress in message');
        }
    });


  	adminRef.once('child_added',snap=>{
  		console.log(snap.key+'=>' + snap.val());
  		updateOnlinestat(snap.key,snap.val());

  	})

  	adminRef.on('child_changed',snap=>{
        console.log(snap.key+'=>');
        console.log(snap.val());
        // set online status::
        updateOnlinestat(snap.key,snap.val()); 
    });

    messageRef.on('child_added', snap => {
    		console.log('Message Node=>')
         console.log('val=>');console.log(snap.val());

        	let resp = snap.val();
          var date = new Date(resp['timeStamp']);
          let msgDate = getMsgDate(date);
          let msg  = resp['msg'];
          let sentFromAdmin  = resp['sentFromAdmin'];
       	 updateChatScreen(msgDate,msg, sentFromAdmin);

       	  
    });
    
		// increment new message 
		function incrementUnread(){
			chatroomRef.child('unread').set(firebase.database.ServerValue.increment(1));

		}
    // set admin online offline for user
	  chatroomRef.update({
			userName:"<?=$first_name.' '.$last_name ; ?>",
	     onlineStatus: 'online',
	     lastSeen:false
	  }).then(()=>{
	  	console.log('Write succeeded!');
	  });
	  chatroomRef.onDisconnect().update({
	     onlineStatus: 'offline',
	     lastSeen:firebase.database.ServerValue.TIMESTAMP
	  });

  } // onload ends

  // general functions
  //send message
	function sendmessage(){
			console.log('Sending Message');
			
			var sentFromAdmin = false;
			var messageToSend = messageSend.value;
			
			if(messageToSend == '' || messageToSend == null || messageToSend == undefined){
				return 0;
			}else{
				// set or save send message 
					messageRef.push({
						"isMessageFromDRBRC":true,
						"messageId":'false',
						"msg":messageToSend,
						"msgStatus":0,
						"sentFromAdmin":sentFromAdmin,
						"timeStamp":firebase.database.ServerValue.TIMESTAMP
					});
					//update chatroom values 
					chatroomRef.child('message_counter')
							chatroomRef.update({
								"lastMessage":firebase.database.ServerValue.TIMESTAMP,
								"newmessage": 1,
								"message_counter" : firebase.database.ServerValue.increment(1),
								"uniqueId": MyVar.userid,
								"unread": firebase.database.ServerValue.increment(1)
							});

					messageSend.value= ''; // clearing message box 
					MyVar.sendby = 'User'; // to determine whether updation done by admin itself 
				}
	} // send message ends

  // update functions
  function updateChatScreen(msgDate,msg, sentFromAdmin){
	  if (sentFromAdmin == true) {
	     
	      $('#DZ_W_Contacts_Body3').append('  <div class="d-flex justify-content-end mb-4"> <div class="msg_cotainer_send">'+msg+'<span class="msg_time_send">'+msgDate+'Today</span></div> <div class="img_cont_msg"><img src="<?php echo base_url(); ?>dgassets/user/icons/52x52_Logo_1.png" class="rounded-circle user_img_msg" alt=""/></div> </div>');
	     }else{
	      $('#DZ_W_Contacts_Body3').append('  <div class="d-flex justify-content-start mb-4"> <div class="img_cont_msg"><img src="<?php echo base_url(); ?>dgassets/user/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/></div> <div class="msg_cotainer">'+msg+'<span class="msg_time">'+msgDate+'</span></div> </div> ');
	     }

	   updateScroll();
	}

  function updateOnlinestat(key,value){
  	if(key == 'lastSeen' && value != false){
    	 lastseen.textContent = 'LastSeen :'+ getMsgDate(value);
     }else if(key == 'lastSeen'){
     	lastseen.textContent = '-';
     }
    if(key == 'onlineStatus'){
    	statText = value;
    	if (statText == 'online'){ 
    		statclass='mb-0 text-success'
    	}else if(statText == 'offline'){
    		statclass='mb-0 text-danger'
    	}else if(statText == 'away'){statclass='mb-0 text-warning'}
    	adminStat.className = statclass;
    	adminStat.textContent = statText;
    }
  }

  // helper function
  function updateScroll(){
			    // $("#chat-history").animate({ scrollTop: $('.chat-history').height() }, "fast");
		    var element = document.getElementById("DZ_W_Contacts_Body3");
		    element.scrollTop = element.scrollHeight;
	}
  function getMsgDate(argTimeStamp) {
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
    var am_pm = date.getHours() >= 12 ? "PM" : "AM";
    var stMonth = date.getMonth() + 1;
    var strDateNew = date.getFullYear() + "-" + stMonth + "-" + date.getDate() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds() + " " + am_pm;
    return strDateNew;
  }
</script>