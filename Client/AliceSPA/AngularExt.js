(function(angular){
    if(angular.AliceSPAExt){
        return;
    }
    angular.AliceSPAExt = {
        'DirectiveHandle':{
            'Functions':{
            },
            'ServiceInterface':null
        },
        'Modules':{
        }
    };
    angular.ASPAModule = function(moduleName,deps){
        var module = angular.module(moduleName,deps);
        module.getAngular = function(){return angular;};

        var ext = angular.AliceSPAExt;
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
