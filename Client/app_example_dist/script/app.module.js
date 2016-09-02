var app = angular.ASPAModule('app_example_dist',['AliceSPA','ui.router']);
app.config(['$stateProvider',function($stateProvider){
    $stateProvider.state('test',{
        url:'',
        templateUrl:'/app_example/test.html',
        controller:function(ASPACaptchaService,$scope){
        }
    })
}]);
app.run(['ASPADirectDatabaseService',function(ASPADirectDatabaseService){



}]);
