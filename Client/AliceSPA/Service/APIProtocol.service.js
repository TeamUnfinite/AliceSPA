define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPAAPIProtocolService',['ConfigService','$q','$http','ASPADataService','ASPANotifierService',function(ConfigService,$q,$http,ASPADataService,ASPANotifierService){
        var handle = function(method,url,data,config,options,isAliceSPARequest,withUser,withSession,fullResponse){
            data = data || {};
            config = config || {};
            config.headers = config.headers || {};
            url = (isAliceSPARequest?ConfigService.getAliceSPAApiUrlPrefix():ConfigService.getApiUrlPrefix()) + url;
            if(withUser){
                var userInfo = ASPADataService.get('userInfo');
                if(!_.isEmpty(userInfo)){
                    config.headers['AliceSPA-UserID'] = userInfo.id;
                    config.headers['AliceSPA-WebToken'] = userInfo.web_token;
                }
            }
            var defered = $q.defer();
            var sendRequest = function(){
                var promise = null;
                if(method === 'GET'){
                    promise = $http.get(url,config);
                }
                if(method === 'POST'){
                    promise = $http.post(url,data,config);
                }
                if(promise !== null){
                    promise.then(function(res){
                        res = res.data;
                        if(withSession){
                            if(res.sessionID !== ASPADataService.get('sessionId')){
                                ASPADataService.set('sessionId',res.sessionID);
                            }
                        }
                        if(res.status === 'SUCCESS'){
                            if(!fullResponse){
                                res = res.data;
                            }
                            defered.resolve(res);
                        }
                        else{
                            defered .reject(res.errors);
                            if(res.APIPException){
                                console.error('! APIPException',method,url,mdata,config,options,res,res,APIPException);
                            }
                        }
                    },
                    function(res){
                        defered.reject(res.errors);
                    });
                }
            };
            if(withSession){
                ASPANotifierService.registerSessionId(function(isSuccess){
                    if(!isSuccess){
                        defered.reject({});
                        return;
                    }
                    var sessionId = ASPADataService.get('sessionId');
                    if(sessionId){
                        config.headers['AliceSPA-SessionID'] = sessionId;
                    }
                    sendRequest();
                });
            }
            else{
                sendRequest();
            }


            return defered.promise;
        }
        return {
            get:function(url,config,options){
                return handle('GET',url,null,config,options,false,true,true,false);
            },
            post:function(url,data,config,options){
                return handle('POST',url,data,config,options,false,true,true,false);
            },
            ASPAGet:function(url,config,options){
                return handle('GET',url,null,config,options,true,true,true,false);
            },
            ASPAPost:function(url,data,config,options){
                return handle('POST',url,data,config,options,true,true,true,false);
            },
            VanillaGet:function(url,isInternal,config,options){
                return handle('GET',url,null,config,options,isInternal,false,false,true);
            },
            VanillaPost:function(url,data,isInternal,config,options){
                return handle('POST',url,data,config,options,isInternal,false,false,true);
            }
        };
    }]);
});
