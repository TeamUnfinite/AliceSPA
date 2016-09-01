define(['/AliceSPA/AngularExt.js'],function () {
    var module = angular.ASPAModule('AliceSPA',[]);
    module.config(['$injector',function($injector){
        if($injector.has('AliceSPAConfig') === false){
            console.error('ASPA: Not found AliceSPAConfig. Check /your_app/script/Config/ASPAConfig.js by default.');
            alert('ASPA: Not found AliceSPAConfig. Check /your_app/script/Config/ASPAConfig.js by default.');
        }
    }]);
    module.run(['ASPAErrorService','ASPAAccountService','ASPANotifierService','ASPADataService',function(ASPAErrorService,ASPAAccountService,ASPANotifierService,ASPADataService){
        ASPAErrorService.load();
    }]);
    return module;
});
