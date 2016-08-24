define([],function () {
    var app = angular.module('app',['AliceSPA']);
    app.run(['ASPAAccount',function(ASPAAccount){
        ASPAAccount.login();
    }]);
    return app;
})