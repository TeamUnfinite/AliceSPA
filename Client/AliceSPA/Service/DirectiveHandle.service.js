define(['/AliceSPA/AliceSPA.module.js','/AliceSPA/AngularExt.js'],function(module){
    module.service('ASPADirectiveHandleService',[function(){
        var handles = {};
        var serviceInterface = {
            setHandle:function(directiveName,handleName,data){
                    handles[directiveName] = handles[directiveName] || {};
                    handles[directiveName][handleName] = data;
            },
            getHandle:function(directiveName,handleName){
                if(!handles[directiveName]){
                    return undefined;
                }
                if(!handles[directiveName][handleName]){
                    return undefined;
                }
                return handles[directiveName][handleName];
            }
        };
        AliceSPA.DirectiveHandle.ServiceInterface = serviceInterface;

        return _.extend({

        },AliceSPA.DirectiveHandle.Functions);
    }]);
});
