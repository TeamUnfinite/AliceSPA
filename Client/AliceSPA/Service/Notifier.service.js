define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPANotifierService',[function(){
        var data = {};
        var register  = function(key,callback){
            if(data[key] === true || data[key] === false){ // notified
                callback(data[key]); // if load success
                return;
            }
            data[key] = data[key] || [];
            data[key].push(callback);
        }
        var notify  = function(key,isSuccess){
            var callbacks = data[key];
            data[key] = isSuccess;
            if(!_.isEmpty(callbacks)){
                _.each(callbacks,function(callback){
                    callback(isSuccess);
                });
            }
        }
        return {
                registerError: function(callback) { register('error',callback); },
                notifyError: function(isSuccess) { notify('error',isSuccess); },
                registerUserInfo:function(callback) { register('userInfo',callback); },
                notifyUserInfo:function(isSuccess) { notify('userInfo',isSuccess); },
                registerSessionId: function(callback){ register('sessionId',callback);},
                notifySessionId: function(isSuccess){ notify('sessionId',isSuccess);}
            };
        }
    ]);
});
