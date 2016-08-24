define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPAAPIProtocol',['$q','$http','ASPAData',function($q,$http,ASPAData){
        var handle = function(method,url,data,config,options){
            data = data || {};
            config = config || {};
            config.headers = config.headers || {};
            var userInfo = ASPAData.get('userInfo');
            if(!_.isEmpty(userInfo)){
                config.headers['AliceSPA-UserID'] = userInfo.id;
                config.headers['AliceSPA-WebToken'] = userInfo.web_token;
            }
            var promise = null
            if(method === 'GET'){
                promise = $http.get(url,config);
            }
            if(method === 'POST'){
                promise = $http.post(url,data,config);
            }
            if(promise !== null){
                var defered = $q.defer();
                promise.then(function(res){
                    res = res.data;
                    if(res.status === 'SUCCESS'){
                        defered.resolve(res.data);
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
                return defered.promise;
            }
            return null;
        }
        return {
            get:function(url,config,options){
                return handle('GET',url,null,config,options);
            },
            post:function(url,data,config,options){
                return handle('POST',url,data,config,options);
            }
        };
    }]);
});