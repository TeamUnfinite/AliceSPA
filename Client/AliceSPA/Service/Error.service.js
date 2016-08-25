define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPAError',['ASPANotifier','ASPAAPIProtocol','ASPAData',function(ASPANotifier,ASPAAPIProtocol,ASPAData){
        var service = {
            getErrors: function(){ return ASPAData.get('errors');},
            getError:function(code){
                var errors = ASPAData.get('errors');
                return _.find($errors,function(error){
                    return error['CODE'] === code;
                });
            },
            load:function(){
                ASPAAPIProtocol.get('http://localhost:8080/api/environment/errors').then(function(errors){
                    ASPAData.set('errors',errors);
                    ASPANotifier.notifyError(true);
                },function(error){
                    ASPANotifier.notifyError(false);
                });
            }
        }
        return service;
    }]);
});