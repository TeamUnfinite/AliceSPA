define([],function () {
    var module = angular.module('AliceSPA',[]);
    module.run(['ASPAError','ASPAAccount','ASPANotifier','ASPAData',function(ASPAError,ASPAAccount,ASPANotifier,ASPAData){
        ASPAError.load();
        console.log(ASPAData.getAll());
    }]);
    
    return module;
});