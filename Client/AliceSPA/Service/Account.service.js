define(['/AliceSPA/AliceSPA.module.js','jshashes'],function(module,Hashes){
    module.service('ASPAAccount',['ASPAAPIProtocol','ASPAData',function(ASPAAPIProtocol,ASPAData){
        var service = {
            register: function(){},
            login: function(fields,password){
                if(_.isEmpty(fields)){
                    return false;
                }
                fields['password'] = new Hashes.SHA256().hex(password);
                return ASPAAPIProtocol.post('http://localhost:8080/api/account/login',fields).then(function(UserInfo){
                    ASPAData.set('userInfo',UserInfo);
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
            getUserInfo: function(){ return ASPAData.get('userInfo');},
            isLoggedIn: function(){},
            logout: function(){}
        }
        return service;
    }]);
});