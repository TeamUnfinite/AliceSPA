define(['/AliceSPA/AliceSPA.module.js'],function(module){
    module.service('ASPAError',['ASPAAPIProtocol','ASPAData',function(ASPAAPIProtocol,ASPAData){
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
                    console.log(ASPAData.get('errors'));
                });
            }
        }
        return service;
    }]);
});