define([],function () {
    var app = angular.module('app',['ui.router']);
    app.config(['$stateProvider',function($stateProvider){
        $stateProvider.state('test',{
            url:'/',
            templateUrl:'/app/test.html'
        })
    }]);
    app.run([function(){
    }]);

    return app;
});
