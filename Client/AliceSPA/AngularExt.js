var AliceSPA = AliceSPA || {};
(function(angular){
    AliceSPA = _.extend({
        'DirectiveHandle':{
            'Functions':{
            },
            'ServiceInterface':null
        },
        'Modules':{
        }
    },AliceSPA);
    angular.ASPAModule = function(moduleName,deps){
        var module = angular.module(moduleName,deps);
        module.getAngular = function(){return angular;};

        var ext = AliceSPA;
        var extModule = ext.Modules[moduleName] = {};
        //ASPADirective
        module.ASPADirective = function(directiveName,defineFun,handleType){
            var DirectiveHandle = ext.DirectiveHandle;
            if(!handleType){
                handleType = directiveName;
            }
            DirectiveHandle['Functions']['set' + handleType + 'Handle'] = function(handleName,data){
                return DirectiveHandle['ServiceInterface'].setHandle(handleType,handleName,data);
            };
            DirectiveHandle['Functions']['get' + handleType + 'Handle'] = function(handleName){
                return DirectiveHandle['ServiceInterface'].getHandle(handleType,handleName);
            };
            return module.directive(directiveName,defineFun);
        };

        return module;
    };

})(angular);
