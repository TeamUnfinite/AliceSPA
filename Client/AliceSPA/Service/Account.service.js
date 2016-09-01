define(['/AliceSPA/AliceSPA.module.js','jshashes'],function(module,Hashes){
    module.service('ASPAAccountService',['ASPAAPIProtocolService','ASPADataService',function(ASPAAPIProtocolService,ASPADataService){
        var service = {
            register: function(){},
            login: function(fields,password){
                if(_.isEmpty(fields)){
                    return false;
                }
                fields['password'] = new Hashes.SHA256().hex(password);
                return ASPAAPIProtocolService.ASPAPost('/account/login',fields).then(function(UserInfo){
                    ASPADataService.set('userInfo',UserInfo);
                    return UserInfo;
                });
            },
            loginByUserName: function(userName,password){
                var fields = {'user_name':userName};
                return this.login(fields,password);
            },
            loginByTelephone:function(telephone,password){
                var fields = {'telephone':userName};
                return this.login(fields,password);
            },
            loginByEmail:function(email,password){
                var fields = {'email':userName};
                return this.login(fields,password);
            },
            getUserInfo: function(){ return ASPADataService.get('userInfo');},
            isLoggedIn: function(){},
            logout: function(){
                return ASPAAPIProtocolService.ASPAPost('/account/logout');
            }
        }
        return service;
    }]);
});
