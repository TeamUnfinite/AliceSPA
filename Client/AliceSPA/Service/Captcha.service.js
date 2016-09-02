module.service('ASPACaptchaService',['ASPAAPIProtocolService',function(ASPAAPIProtocolService){
    return {
        getImageCaptcha:function(){
            return ASPAAPIProtocolService.ASPAGet('/captcha/image');
        }
    };
}]);
