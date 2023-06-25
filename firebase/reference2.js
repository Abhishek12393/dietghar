
var table={
    batches: 'batches',
    chatRoom: 'chatRoom',
    message: 'message',
    users: 'users',
}

var batch={
    batchInfo: 'batchInfo',
    fcmTokens: 'fcmTokens',
    participants: 'participants',
    usersTyping: 'usersTyping',
    onlineParticipantsDetail:'onlineParticipantsDetail',  
    lastActivity:'lastActivity'    
}

var userInfo={
    uniqueId: 'uniqueId',
   
    userType: 'userType',
    email: 'email',
    mobile:'mobile',  
    name:'name',    
    profilePic:'profilePic',   
    batchId:'batchId'    
}

var user={
    connections:'connections',
    status: 'status',
    userInfo: 'userInfo'
}

var chatRoom={
    roomInfo: 'roomInfo',
    usersTyping:'usersTyping', 
}

var message={
    groupMessages: 'groupMessages' 
}

var ref =function (firebase){
    return {
        // batches  reference start

        getBatchesRef : function(){
            return firebase.database().ref().child(table.batches);
        },
        getBatchRef : function(batchId){
            return firebase.database().ref().child(table.batches).child(batchId);
        },
        getBatchLastActivityRef : function(batchId){
            return firebase.database().ref().child(table.batches).child(batchId).child(batch.lastActivity);
        },
        getBatchInfoRef : function(batchId){
            return firebase.database().ref().child(table.batches).child(batchId)
            .child(batch.batchInfo);
        },
        getBatchParticipentsRef : function(batchId){
            return firebase.database().ref().child(table.batches).child(batchId)
            .child(batch.participants);
        },
        getBatchFCMTokenRef : function(batchId){
            return firebase.database().ref().child(table.batches).child(batchId)
            .child(batch.fcmTokens);
        },
        getBatchUsersTypingRef : function(batchId){
            return firebase.database().ref().child(table.batches).child(batchId)
            .child(batch.usersTyping);
        },
        getBatchOnlineUsersRef : function(batchId){
            return firebase.database().ref().child(table.batches).child(batchId)
            .child(batch.onlineParticipantsDetail);
        },
    
        // batches  reference end
        
        // user reference start 

        getUsersRef : function(){
            return firebase.database().ref().child(table.users);
        },
        getUserRef : function(userId){
            return firebase.database().ref().child(table.users).child(userId);
        },
        getUserInfoRef : function(userId){
            return firebase.database().ref().child(table.users).child(userId)
            .child(user.userInfo);
        },
        getUserAddconnRef : function(){
            return firebase.database().ref().child(table.users)
            .child(user.connections);
        },

        // user reference end 
        
        // message reference start

        getMessagesRef:function(){
            return firebase.database().ref().child(table.message).child(message.groupMessages);
        },
        getMessageRefById:function(id){
            return firebase.database().ref().child(table.message).child(message.groupMessages).child(id);
        }
        // message reference end
    }
};



var batchRepo=function(firebase){
    return {
        addBatch:function(batchInfoModel){
                    var batchInfoRef=(ref(firebase)).getBatchInfoRef(batchInfoModel.batchId); 
                    batchInfoRef.set(batchInfoModel);
        },
        addParticipent:function(batchId,participentInfoModel){
                    var participentsRef=(ref(firebase))
                    .getBatchParticipentsRef(batchId).child(participentInfoModel.userId); 
                    participentsRef.set(participentInfoModel);
        },
        addFCMToken:function(batchId,fcmToken){
                    var batchFCMTokenRef=(ref(firebase))
                    .getBatchFCMTokenRef(batchId)
                    .child(fcmToken); 

                    batchFCMTokenRef.set(true);
        },
    };
};

var userRepo =function(firebase){
    return {
        addUser: function(userInfoModel){
               var userInfoRef=(ref(firebase)).getUsersRef(userInfoModel.uniqueId); 
               var strTime = (new Date()).getTime()+"";
                userInfoModel.timespam= strTime;
               userInfoRef.set(userInfoModel);
        },
        addConnection:function(connectionId){
           var userAddConnRef=(ref(firebase)).getUserAddconnRef(); 
           userAddConnRef.child(connectionId).set(true);
        }
    }
};

var messageRepo =function(firebase){
    return {
        sendMessgae: function(batchId, messageModel){
            var strTime = (new Date()).getTime()+"";
            messageModel.timeStamp=strTime;
               var groupMessagesRef=(ref(firebase)).getMessageRefById(batchId); 
               var messagesRef=groupMessagesRef.push();
               messageModel.messageId= messagesRef.key;
               messageModel.isMessageFromDRBRC = true;
               messagesRef.set(messageModel);
        },

        addConnection:function(userId, connectionId){
           var userAddConnRef=(ref(firebase)).getUserAddconnRef(userId); 
           userAddConnRef.child(connectionId).set(connectionId);
        }
    }
};