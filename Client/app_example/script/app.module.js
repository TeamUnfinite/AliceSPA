define([],function () {
    var app = angular.ASPAModule(AliceSPA.Config.App.moduleName,['AliceSPA','ui.router']);
    app.config(['$stateProvider',function($stateProvider){
        $stateProvider.state('test',{
            url:'',
            templateUrl:'/app_example/test.html',
            controller:function(ASPACaptchaService,$scope){
            }
        })
    }]);
    app.run(['ASPAAccountService',function(a){
        a.loginByUserName('1','1');
    }]);

    return app;
});
