define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.directive('aspaCaptchaImage',function(){
        return {
            template:'<img ng-src="data:image/png;base64,{{captcha.data}}"></img>',
            scope:true,
            transclude:true,
            controller:['$scope','ASPACaptchaService',function($scope,ASPACaptchaService){
                ASPACaptchaService.getImageCaptcha().then(function(captcha){
                    $scope.captcha = captcha;
                });
            }]
        };
    });
});
