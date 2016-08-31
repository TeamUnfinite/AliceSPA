define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.ASPADirective('aspaCaptchaImage',function(){
        var style = null;
        var handle = null;
        return {
            template:'<img style="{{style}}" ng-click="load();" ng-src="data:image/png;base64,{{captcha.data}}"></img>',
            scope:true,
            controller:['$scope','ASPACaptchaService','ASPADirectiveHandleService',function($scope,ASPACaptchaService,ASPADirectiveHandleService){
                $scope.style = style;
                $scope.load = function(){
                    ASPACaptchaService.getImageCaptcha().then(function(captcha){
                        $scope.captcha = captcha;
                        if(handle){
                            ASPADirectiveHandleService.setASPACaptchaImageHandle(handle,{id:captcha.id});
                        }
                    });
                };
                $scope.load();
            }],
            compile:function(e,attrs){
                if(attrs['aspaStyle']){
                    style = attrs['aspaStyle'];
                }
                if(attrs['aspaHandle']){
                    handle = attrs['aspaHandle'];
                }
            }
        };
    },'ASPACaptchaImage');
});
