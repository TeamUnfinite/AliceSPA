define([],function () {
    var module = angular.module('AliceSPA',[]);
    module.run(['ASPAErrorService','ASPAAccountService','ASPANotifierService','ASPADataService',function(ASPAErrorService,ASPAAccountService,ASPANotifierService,ASPADataService){
        ASPAErrorService.load();
        ASPAAccountService.loginByUserName('1','1');
    }]);

    return module;
});
