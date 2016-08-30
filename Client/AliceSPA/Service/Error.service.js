define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPAErrorService',['ASPANotifierService','ASPAAPIProtocolService','ASPADataService',function(ASPANotifierService,ASPAAPIProtocolService,ASPADataService){
        var service = {
            getErrors: function(){ return ASPADataService.get('errors');},
            getError:function(code){
                var errors = ASPADataService.get('errors');
                return _.find($errors,function(error){
                    return error['CODE'] === code;
                });
            },
            load:function(){
                ASPAAPIProtocolService.get('/environment/errors').then(function(errors){
                    ASPADataService.set('errors',errors);
                    ASPANotifierService.notifyError(true);
                },function(error){
                    ASPANotifierService.notifyError(false);
                });
            }
        }
        return service;
    }]);
});
