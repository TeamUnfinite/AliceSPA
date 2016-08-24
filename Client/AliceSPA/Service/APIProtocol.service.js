define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPAAPIProtocol',['$http','ASPAData',function($http,ASPAData){
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
                promise.then(function(res){
                    console.log('success', res);
                },
                function(res){
                    console.log('error', res);
                });
            }
        }
        return {
            get:function(url,config,options){
                handle('GET',url,null,config,options);
            },
            post:function(url,data,config,options){
                handle('POST',url,data,config,options);
            }
        };
    }]);
});