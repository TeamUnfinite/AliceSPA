define(['/AliceSPA/AliceSPA.module.js'],function(module) {
    module.service('ASPACaptchaService',['ASPAAPIProtocolService',function(ASPAAPIProtocolService){
        return {
            getImageCaptcha:function(){
                return ASPAAPIProtocolService.ASPAGet('/captcha/image');
            }
        };
    }]);
});
