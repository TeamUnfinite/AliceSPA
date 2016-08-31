define([],function () {
    var app = angular.ASPAModule('app',['AliceSPA','ui.router']);
    app.config(['$stateProvider',function($stateProvider){
        $stateProvider.state('test',{
            url:'',
            templateUrl:'/app/test.html',
            controller:function(ASPACaptchaService,$scope){
            }
        })
    }]);
    app.run([function(){
    }]);

    return app;
});
