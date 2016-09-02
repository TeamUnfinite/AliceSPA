module.service('ASPAAccountService',['ASPAAPIProtocolService','ASPADataService',function(ASPAAPIProtocolService,ASPADataService){
    var service = {
        register: function(fields,password){
            if(_.isEmpty(fields)){
                return false;
            }
            fields['password'] = new Hashes.SHA256().hex(password);
            return ASPAAPIProtocolService.ASPAPost('/account/register',fields).then(function(UserInfo){
                ASPADataService.set('userInfo',UserInfo);
                return UserInfo;
            });
        },
        registerByUserName:function(userName,password){
            var fields = {'user_name':userName};
            return this.register(fields,password);
        },
        registerByEmail:function(email,password){
            var fields = {'email':email};
            return this.register(fields,password);
        },
        registerByTelephone:function(telephone,password){
            var fields = {'telephone':telephone};
            return this.register(fields,password);
        },
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
            var fields = {'telephone':telephone};
            return this.login(fields,password);
        },
        loginByEmail:function(email,password){
            var fields = {'email':email};
            return this.login(fields,password);
        },
        getUserInfo: function(){
            var userInfo = ASPADataService.get('userInfo');
            if(!userInfo){
                return null;
            }
            return userInfo;
        },
        isLoggedIn: function(){
            var userInfo = ASPADataService.get('userInfo');
            return !!userInfo;
        },
        logout: function(){
            return ASPAAPIProtocolService.ASPAPost('/account/logout');
            ASPADataService.set('userInfo',null);
        }
    }
    return service;
}]);
