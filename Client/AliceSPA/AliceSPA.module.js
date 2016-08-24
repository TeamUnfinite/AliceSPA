define([],function () {
    var module = angular.module('AliceSPA',[]);
    module.run(['ASPAError',function(ASPAError){
        ASPAError.load();
    }]);
    return module;
});