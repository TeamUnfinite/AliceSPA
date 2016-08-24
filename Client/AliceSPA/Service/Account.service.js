define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPAAccount',['ASPAAPIProtocol','ASPAData',function(ASPAAPIProtocol,ASPAData){
        var service = {
            register: function(){},
            login: function(){
                ASPAAPIProtocol.post('http://localhost:8080/api/account/login',{
                    user_name: 1,
                    password: '1'
                });
            },
            getUserInfo: function(){ return ASPAData.get('userInfo');},
            isLoggedIn: function(){},
            logout: function(){}
        }
        return service;
    }]);
});